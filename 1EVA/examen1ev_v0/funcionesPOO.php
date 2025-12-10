<?php


    /**
     * Devuelve una tabla de objetos a partir del fichero
     */
    function cargarTabla():array {
        $tuser = [];
        $fich = fopen("usuarios.dat", "r");
        while ($valores = fgetcsv($fich)) {
                $usr = new Usuario($valores[0], $valores[1], $valores[2]);
                $tuser[] = $usr;
            }
        
        @fclose($fich);
        return $tuser;
    }

    /**
     * Checks if the provided username and password are valid.
     *
     * @param string $username The username to validate.
     * @param string $password The password to validate.
     * @return bool Returns true if the username and password are valid, false otherwise.
     */
    function accesoValido($username, $password): bool
    {
        $tablauser = cargarTabla();
        foreach ($tablauser as $usr) {
            if ($usr->nombre == $username && password_verify($password, $usr->clave)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Records a new access for the given username.
     *
     * @param string $username The username for which to record the access.
     * @return int The result of the access recording operation.
     */
    function anotarNuevoAcceso($username):int{

        $tablauser = cargarTabla();

        $salvar = false;
        foreach ($tablauser as $usr) {
            if ($usr->name == $username) {
                $usr->acceso ++;
                $salvar = true;
            }
        }

        if ( $salvar ) {
            volcarDatos($tablauser);
        }
        return $salvar;
    }

    /**
     * Vuelca los datos el array de objetos usuarios en el fichero
     * 
     * 
     */

    function volcarDatos($tabla){

        $fich = fopen("usuarios.dat", "w");
        foreach ($tabla as $usr) {
            $valores = [ $usr->nombre, $usr->clave ,$usr->acceso ];
            fputcsv($fich, $valores);
        }
        fclose($fich);
    }

    /**
     * Registers a user with a given username and time.
     *
     * @param string $username The username of the user to register.
     * @param int $time The time associated with the registration.
     */
    function registra($username,$time){
        $ip = $_SERVER["REMOTE_ADDR"];
        $nombre = $username;
        return;
    }


?>