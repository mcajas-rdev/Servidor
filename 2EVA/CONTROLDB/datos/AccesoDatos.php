<?php
include_once "Cliente.php";
include_once "Pedido.php";

/*
 * Acceso a datos con BD Usuarios y Patrón Singleton 
 * Un único objeto para la clase
 * VERSION 1:  las sentencias precompiladas ser crean en cada función
 */
class AccesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    
    
    public static function getModelo(){
        // Si no existe lo crea el acceso de a la BD
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
    

   // Constructor privado  Patron singleton, se accede por getModelo
   
    private function __construct(){
        
        try {
            $dsn = "mysql:host=localhost;dbname=etienda;charset=utf8";
            // Creo el objeto PDO estableciendo la conexión a la BD
            $this->dbh = new PDO($dsn, "root", "");
            // Si falla genera una excepción
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }   
    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;
            $obj->dbh = null;     // Cierro la conexión
            self::$modelo = null; // Borro el objeto.
        }
    }


    // Devuelvo un array de objeto de Usuarios
    public function getPedidos ($codigo):array {
        $tpro = [];
        // Sobre la conexión PDO prepara la consulta;
        $stmt_productos  = $this->dbh->prepare("select * from pedidos where cod_cliente = :cod_cliente");
        // Los resultados se devuelven como objetos de la clase Usuarios
        $stmt_productos->setFetchMode(PDO::FETCH_CLASS, 'Pedido');
        $stmt_productos->bindParam(':cod_cliente', $codigo);
        
        // Ejecuto la sentencias 
        if ( $stmt_productos->execute() ){
            $tpro = $stmt_productos->fetchAll();
        }

        return $tpro;
    }
    
    // Devuelvo un usuario o false
    public function getCliente (String $nombre, String $clave) {
        $cli = false;
        $stmt_productos   = $this->dbh->prepare("select * from clientes where nombre=? AND clave=? ");
        $stmt_productos->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
        $stmt_productos->bindParam(1, $nombre);
        $stmt_productos->bindParam(2, $clave);
        if ( $stmt_productos->execute() ){
             // Solo hay un objeto
             if ( $obj = $stmt_productos->fetch()){
                $cli = $obj;
            }
        }
        return $cli;
    }
    
    // UPDATE
    public function incrementarVeces($cod_cliente):bool{
      
        $stmt_modcli   = $this->dbh->prepare("update clientes set veces=veces+1 where cod_cliente=?");
        $stmt_modcli->bindValue(1, $cod_cliente);
        $stmt_modcli->execute();
        // El número de filas modificadas debe ser 1
        $resu = ($stmt_modcli->rowCount () == 1);
        return $resu;
    }

    //INSERT
    public function addUsuario($user):bool{
        $stmt_creauser  = $this->dbh->prepare("insert into Usuarios (login,nombre,password,comentario) Values(?,?,?,?)");
        //$stmt_creauser->bindValue(1,$user->login);
        $stmt_creauser->execute( [$user->login, $user->nombre, $user->password, $user->comentario]);
        $resu = ($stmt_creauser->rowCount () == 1);
        return $resu;
    }

    //DELETE
    public function borrarUsuario(String $login):bool {
        $stmt_boruser = $this->dbh->prepare("delete from Usuarios where login =:login");
        $stmt_boruser->bindValue(':login', $login);
        $stmt_boruser->execute();
        $resu = ($stmt_boruser->rowCount () == 1);
        return $resu;
    }   
    
     // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
}

