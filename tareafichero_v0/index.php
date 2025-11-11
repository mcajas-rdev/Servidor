<?php 
include_once 'util.php';
session_start();

$mensaje="";
if (!isset($_SESSION['usuario']) && !isset($_POST['orden'])){
    include_once 'vistas/acceso.php';
    die();
}

if ($_POST['orden'] ==  "entrar" ){
    // Campos de usuario y contraseña rellenos

    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $mensaje = 'Debe rellenar los campos';
        include_once 'vistas/acceso.php';
    }else{
        if (userOk($_REQUEST['username'], $_REQUEST['password'])) {
            $_SESSION['usuario'] = $_REQUEST['username'];
            include_once 'vistas/cambiarcontra.php';    
        }else{
            $mensaje = " Usuario y contraseña no validos ";
            include_once 'vistas/acceso.php';
        }
    // con valores correctos
    // Actualizo variable de sesión
    // Si falla muestro acceso.php
    }
 
}

if ($_POST['orden'] == 'cambiar'){
    // Comprobar que los campos están llenos
    if (empty($_POST['password']) || empty($_POST['password1']) || empty($_POST['password2'])) {
        $mensaje = "Debes rellenar todos los campos";
        include_once 'vistas/cambiarcontra.php';
    }else{
        if ($_POST['password1'] !== $_POST['password2']) {
            $mensaje = "Las nuevas contraseñas no coinciden";
            include_once 'vistas/cambiarcontra.php';
            exit;
        }
        if (!updatePasswd ($_SESSION['usuario'], $_POST['password'])){
            $mensaje = "Contraseña incorrecta";
            include_once 'vistas/cambiarcontra.php';
            exit;
        }else{
            include_once 'vistas/resultado.php';
            exit;
        }
    }
    // Se cambiar si la contraseña antigua es correcta
    // Y las nuevas contraseñas son iguales sino volvemos
    // a mostrar cambiarcontra y cerrar la sesión
    // si falla muestro cambiarcontra.php
  
}
    

