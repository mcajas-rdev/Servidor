<?php
session_start();
if (!isset($_SESSION['errores'])) {
  $_SESSION['errores'] = 0;
}

include_once('app/funciones.php');

if (  !empty( $_GET['login']) && !empty($_GET['clave'])){
    if ( userOk($_GET['login'],$_GET['clave'])){
        $_SESSION['errores'] = 0;
      if ( getUserRol($_GET['login']) == ROL_PROFESOR){
        $contenido = verNotaTodas($_GET['login']);
      } else {
        $contenido = verNotasAlumno($_GET['login']);
      }
      include_once ('app/resultado.php');
    } 
    // userOK falso
    else {
      $_SESSION['errores']++;

      if ($_SESSION['errores'] <= 5) {
          $contenido = "El número de usuario y la contraseña no son válidos";
          include_once('app/acceso.php');
      }else{
        $contenido = '<h1> SUPERADO EL NUMERO MAXIMO DE ACCESOS ERRONEOS</h1> <hr> <p> Reinicie el navegador para volverlo a intentar </p> ';
        include_once('app/acceso.php');
        $_SESSION['errores'] = 0;
      }
    }
} else {
    $contenido = " Introduzca su número de usuario y su contraseña";
    include_once('app/acceso.php');
}


