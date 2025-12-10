<?php

    session_start();

    define('CUENTAFICHERO', 'misaldo.txt');

    // NO está definido el token
    if (!isset($_SESSION['token'])) {
        header('Location: acceso.php?msg=Error+de+acceso 1');
        exit();
}

if ($_SESSION['token'] != $_POST['token']) {
    $msg = "Error de acceso";
    header("Location: acceso.php?msg=".urlencode($msg));
    exit();
}

$saldo = file_get_contents(CUENTAFICHERO);

if ($_POST['Orden'] == "Ver saldo") {
    $msg = "Su saldo actual es: ".number_format($saldo, 2, ',','.');
    header("Location: acceso.php?msg=".urlencode($msg));
    exit();

}

if (empty($_POST['importe']) || !is_numeric($_POST['importe']) || $_POST['importe'] <= 0) {
    $msg = "El valor de importe es erróneo";
    header("Location: acceso.php?msg=".urlencode($msg));
    exit();
}

$importe = $_POST['Importe'];

if ($_POST['Orden'] == "Ingreso") {
    $saldo = $saldo + $importe;
    file_put_contents(CUENTAFICHERO, $saldo);
    $msg = "Operación realizada";
    header("Location: acceso.php?msg=".urlencode($msg));
    exit();
}

if ($_POST['Orden'] == "Reintegro") {
    if ($importe <= $saldo) {
        $saldo -= $importe;
        file_put_contents(CUENTAFICHERO, $saldo);
        $msg = "Operación realizada";
    }else{
        $msg = "Importe erróneo o importe superior al saldo";
        exit();
    }
    header("Location: acceso.php?msg=".urlencode($msg));
    exit();

}