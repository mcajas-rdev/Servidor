<?php

    session_start();

    if ($_POST['Orden'] == 'Ingreso'){
        if ($_POST['importe'] <= 0) {
            $msg = " Importe Erróneo o importe menor de 0. ";
            header("Location: minibanco.php?msg=".urlencode($msg));
        } else {
            $_SESSION['importe'] = $_POST['importe'];
            $msg = " Operación realizada. ";
            header("Location: minibanco.php?msg=".urlencode($msg));
        }
    }
    if ($_POST['Orden'] == 'Reintegro'){
        if ($_POST['importe'] > $_SESSION['importe']) {
            $msg = " Importe Erróneo o importe superior al saldo. ";
            header("Location: minibanco.php?msg=".urlencode($msg));
        } else {
            $_SESSION['importe'] -= $_POST['importe'];
            $msg = " Operación realizada. ";
            header("Location: minibanco.php?msg=".urlencode($msg));
        }
    }
    if ($_POST['Orden'] == 'Ver saldo'){
            $msg = " Su saldo es de: ". $_SESSION['importe'] ;
            header("Location: minibanco.php?msg=".urlencode($msg));
    }
    if ($_POST['Orden'] == 'Terminar'){
        $msg = '' ;
        header("Location: minibanco.php?msg=".urlencode($msg));
        session_abort();
    }

?>