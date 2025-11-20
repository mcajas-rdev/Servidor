<?php
include_once 'funciones.php';
session_start();

if (isset ($_SESSION["timepolimite"])) {
    if (time() > $_SESSION["timepolimite"]) {
        session_destroy();
    }else{
        $_SESSION["timepo"] = $_SESSION["timepo"] - $_SESSION["timepolimite"];
        include "bienvenido.php";
        exit();
    }
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include "acceso.php";
}else{
    $nombre = $_POST["username"];
    $clave = $_POST["password"];
    $tiempo = $_POST["time"];
    if (accesoValido($nombre, $clave)) {
        $_SESSION['nombre'] = $nombre;
        $_SESSION['tiempo'] = $tiempo;
        $_SESSION['tiempolimite'] = time() + $tiempo;
        anotarNuevoAcceso($nombre);
        registra($nombre, time());
        include "bienvenido.php";
    }else{
        $msg = "Nombre y contraseña incorrectos";
        include "acceso.php";
    }
}

