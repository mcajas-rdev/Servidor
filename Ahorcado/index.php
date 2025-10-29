<?php
// Metemos dentro las funciones
require_once "funciones.php";

    // Se inicia la sesion
    session_start();

    // Si no existe una palabra secreta se elige la palabra
    if (!isset($_SESSION['palabrasecreta'])) {
        $_SESSION['palabrasecreta'] = elegirPalabra();
        $_SESSION['letrausuario'] = ""; //Inicialmente no hay ninguna letra introducida
        $_SESSION['fallos'] = 0; // Inicialmente el usuario no tiene fallos
    }

    // Si el usuario introduce una letra se comprueba que haya acertado o fallado
    if (isset($_GET['letra'])) {
        $letra = $_GET['letra'];
        if (comprobarLetra($letra, $_SESSION['palabrasecreta'])) {
            $_SESSION['letrausuario'] .= $letra;
        }else{
            $_SESSION['fallos'] ++;
            if ($_SESSION['fallos'] > 5) {
                $msg = "Superado el numero de intentos permitidos";
                session_destroy();
            }
        }
    }
    //Se muestra la palabra con guiones y se va desbloqueando la palabra a medida que el usuario va acertando
    $palabraoculta = generaPalabraconHuecos($_SESSION['letrausuario'], $_SESSION['palabrasecreta']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <?= $msg ?>
        PALABRA: <?= $palabraoculta; ?> <br>
        HAS COMETIDO <?= $_SESSION['fallos']; ?> fallos
        Introduzca una letra: 
        <input type="text" name="letra" size="1">

    </form>
</body>
</html>