<?php

    session_start();
    $img = '';
    if (isset($_GET['nuevatarjeta'])) {
        $_SESSION['pago'] = $_GET['nuevatarjeta'];
        header('Location: index.php');
        exit;
    }

    if (!isset($_SESSION['pago'])) {
        $msg = "NO TIENE FORMA DE PAGO ASIGNADA";
        
    }else{
        $msg = "SU FORMA DE PAGO ACTUAL ES";
        $img = '<img  src="../imagenes/'.$_SESSION["pago"].'.png" />';
    }

    require_once 'pagosession.php';

?>


