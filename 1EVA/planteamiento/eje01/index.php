<?php
session_start();
include_once 'funciones.php';



if (isset($_SESSION['dni'])) {

    if (isset($_GET['orden'])) {
        if ($_GET['orden'] == 'salir') {
            // ALMACENAR LOS PUNTOS EN FICHERO Y CERRAR LA SESION
            // MOSTRAR VISTA DE INICIAL
            if (anotarPuntos($_SESSION['dni'], $_SESSION['puntos'])) {
                session_destroy();
                if (isset($_COOKIE['acceso'])) {
                    $acceso = false;
                }else{
                    $acceso = true;
                }
                setcookie("acceso", $acceso, time() + 60*10, "/");
                include_once 'vistas/login.php';
                exit();
            }
            
        }
        if ($_GET['orden'] == 'continuar' && $_SESSION['puntos'] > 0) {
            // CAMBIAR LOS  PUNTOS DE LA SESION CON VALORES ALEATORIA
            $rand = mt_rand(-50, 50);
            $_SESSION['puntos'] += $rand;
            if ($_SESSION['puntos'] <= 0) {
                $_SESSION['puntos'] = 0;
            }
        }
    } 
    include 'vistas/puntos.php';
}


if (isset($_COOKIE['acceso'])) {
    echo ' No puedes acceder hasta que pasen 10 minutos despues de tu ultima jugada ';
}else{
    if ($_SERVER['REQUEST_METHOD'] == "GET" && !isset($_SESSION['dni'])) {
            include 'vistas/login.php';
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && !isset($_COOKIE['acceso'])) {
    // PROCESAR FORMULARIO LOGIN
    // COMPROBAR QUE LOS PUNTOS SON NUMERICOS
    // COMPROBAR QUE DNI Y LA CLAVE SON CORRECTOS
    // SI NO ES CORRECTO MOSTRAR EL LOGIN CON UN 
    // MENSAJE DE ACCESO
    // ANOTAR PUNTOS Y DNI EN AL SESSION Y MOSTRAR LA VISTA DE PUNTOS
    if (!is_numeric($_POST['puntos']) || $_POST['puntos'] <= 0) {
        $msg = "Los puntos tienen que ser <br> un numero entero y positivo";
        include_once 'vistas/login.php';
    }else{
        if (!validarCliente($_POST['dni'], $_POST['clave'])) {
            $msg = "Usuario y/o contraseña invalidos";
            include_once 'vistas/login.php';
        }else{
            $_SESSION['dni'] = $_POST['dni'];
            $_SESSION['puntos'] = $_POST['puntos'];
            include 'vistas/puntos.php';
        }
    }
    
}



