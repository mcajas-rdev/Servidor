<?php
    $img = '';
    if (isset($_GET['nuevatarjeta'])) {
        $tarjeta = $_GET['nuevatarjeta'];
        setcookie("tarjeta", $tarjeta, time() + 10, "/");
        header('Location: index.php');
        exit;
    }

    if (!isset($_COOKIE['tarjeta'])) {
        $msg = "NO TIENE FORMA DE PAGO ASIGNADA";
        
    }else{
        $msg = "SU FORMA DE PAGO ACTUAL ES";
        $img = '<img  src="../imagenes/'.$_COOKIE["tarjeta"].'.png" />';
    }

    require_once 'pagocookie.php';


?>