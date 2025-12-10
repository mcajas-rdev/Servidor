<?php
session_start();
    if (isset($_COOKIE["visitas"])) {
        $visitas = $_COOKIE["visitas"] + 1;
    }else{
        $visitas = 1;
    }

    setcookie("visitas", $visitas, time()+ 2592000, "/");
    
    if (!isset($_SESSION["dinero"])) {
        require_once 'entrada.php';
    }else{
        require_once 'apuesta.php';
    }

?>