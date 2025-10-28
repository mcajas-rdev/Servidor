<?php

    session_start();

    $dinero = $_SESSION["dinero"];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="resultado card">

        <p>Muchas gracias por jugar con nosotros.</p>
        <p>Su dinero final es de <strong class="resaltar"><?php echo $dinero; session_destroy();?></strong> euros</p>
        <a href="index.php" class="boton boton-principal">Volver</a>

    </div>

</body>
</html>
