<?php

    session_start();
    $btn = '';
    $msg = '';

    if ( isset($_GET['volver'])) {
        session_unset();

    }

    if (!isset($_SESSION['rand'])) {
        $_SESSION['rand'] = mt_rand(1,20);
        $_SESSION['oportunidades'] = 5;
    }else{

        $rand = $_SESSION['rand'];

        if (isset($_GET['numero'])) {
            $_SESSION['numero'] = $_GET['numero'];
        }
        $numero = $_SESSION['numero'];
        if (isset($numero) && $_SESSION['oportunidades'] > 0) {
            if ($numero > $rand ) {
                $msg = "El numero introducido es mayor";
                $_SESSION['oportunidades']--;
            }elseif ($numero < $rand) {
                $msg = "El numero introducido es menor";
                $_SESSION['oportunidades']--;
            }else{
                $msg = "El numero es Correcto!!";
                $btn = '<input type="submit" value="volver a jugar" name="volver">';
            }
        }
            if ($_SESSION['oportunidades'] == 0) {
                $msg = "Has perdido!!";
                $btn = '<input type="submit" value="volver a jugar" name="volver">';
            }
        }
        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">

        <label for="numero"> Adivina el numero: </label>
        <input type="number" name="numero" id="numero"> <br>
        <?php echo $btn ?>
    </form>

    <div class="hud">
    Te quedan <?php echo $_SESSION['oportunidades'] ?> oportunidades <br>
    <?php echo $msg ?> <br>
    <?php echo $rand ?> <br>
    </div>
</body>
</html>