<?php

    // ---------- 1. Archivo de texto ----------
    $fichero = 'accesos.txt';

    // Si el archivo no existe, lo creamos con 0
    if (!file_exists($fichero)) {
        file_put_contents($fichero, "0");
    }

    // ---------- 2. Leer el número de accesos totales ----------
    $accesosTotales = (int) file_get_contents($fichero);
    $accesosTotales++;

    // ---------- 3. Guardar el nuevo número ----------
    file_put_contents($fichero, $accesosTotales);

    // ---------- 4. Gestionar cookie del usuario ----------
    if (isset($_COOKIE['accesos_usuario'])) {
        // Si ya existe la cookie, incrementamos
        $accesosUsuario = $_COOKIE['accesos_usuario'] + 1;
    } else {
        // Si no existe, es su primera visita
        $accesosUsuario = 1;
    }

    // Guardamos cookie válida por 3 meses
    setcookie('accesos_usuario', $accesosUsuario, time() + (60 * 60 * 24 * 90), "/");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="accesos-web">
       Desde este navegador ha accedido  <?= $accesosUsuario ?> veces <br>
       Usted ha accedido a este sitio un total de <?= $accesosTotales ?> veces
    </div>
</body>
</html>