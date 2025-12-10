<?php
    $cadena = '';
    if (isset($_GET['fichero'])) {
        $nombreFichero = $_GET['fichero'];
        if (is_readable($nombreFichero)) {
            $tlinea = file($nombreFichero);
            $cont = 1;
            $cadena = "<code> <pre>";
            foreach ($tlinea as $linea) {
                $cadena .= $cont . ' : '  . htmlspecialchars($linea);
                $cont ++;
            }
            $cadena .= "</pre> </code>";
            $cadena .= " Nº de lineas: ". $cont;
            $cadena .= " <br> Nº de caracteres: ". filesize($nombreFichero);
        }else{
            $cadena = "El fichero no existe o no se pude leer";
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
    <h1>MOSTRANDO UN FICHERO</h1>
    <?= $cadena ?>
    <?php if ( !isset($_GET['fichero']) || !is_readable($nombreFichero)): ?>
        <form>
            Fichero a mostrar: <input type="text" name="fichero">
        </form>
    <?php endif; ?>
</body>
</html>