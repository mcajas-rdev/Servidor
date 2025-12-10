<?php
include_once 'funciones.php';
session_start();

// COMPLETAR  +++++++++++++++++++++++++++++++
if ( isset($_SESSION['tiempolimite']) ){
    if (time() > $_SESSION['tiempolimite']) {
        session_destroy();
        header("Location: acceso.php");
        exit();
    }else{
        $_SESSION['tiempo'] = $_SESSION['tiempolimite'] - time();
        include "bienvenido.php";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include "acceso.php";
}else{
    $nombre = $_POST['username'];
    $contraseña = $_POST['password'];
    $tiempo = $_POST['time'];
    if (!accesoValido($nombre, $contraseña)) {
        $msg = "Acceso no valido, nombre y/o contraseña invalidos";
        include_once 'acceso.php';
    }else{
        $_SESSION['nombre'] = $nombre;
        $_SESSION['tiempo'] = $tiempo;
        $_SESSION['tiempolimite'] = time() + $tiempo;
        anotarNuevoAcceso($nombre);
        registra($nombre, time());
        include "bienvenido.php";
    }

}

