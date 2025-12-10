<?php
    $mensaje='';
    $cont = 0;
    $cadena = '';
    if (isset($_POST['enviar'])) {
        if (!is_dir($_POST['dir'])) {
            $mensaje = 'El nombre introducido no pertenece a una carpeta';
        }else{
            $ruta = $_POST['dir'];
            $mensaje = 'este si pertenece a una carpeta';
            if (!scandir($ruta)) {
                $mensaje = 'No se han podido escanear los archivos o subdirectorios de la carpeta indicada';
            }else{
                $into_dir =  scandir($ruta);
                $cadena = "<pre> <code> <br>";
                foreach ($into_dir as $archivos) {
                    if ($archivos != '.' && $archivos != '..') {
                        $archivo_completo = $ruta . DIRECTORY_SEPARATOR . $archivos;
                        if (is_file($archivo_completo)) {
                            $tipo = mime_content_type($archivo_completo);
                            $tamano = filesize($archivo_completo);
                        }elseif (is_dir($archivo_completo)) {
                            $tipo = 'Directory';
                            $tamano = '-';
                        }else{
                            $tipo = 'desconocido';
                            $tamano = '-';
                        }
                        $cadena .= $archivos . ' | ' . $tipo . ' | '. $tamano . "<br>"; 
                        $cont++;
                    }
                }
                $cadena .= "Numero de archivos y subdirectorios: ". $cont;
                $cadena .= "</code></pre>";
            }
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
    <h1>Lector de carpetas</h1>
    <?= $cadena; ?>
    <?php if($cont == 0): ?>
        <?= $mensaje; ?>
        <form method="post">
            <h3>Introduzca el nombre de una carpeta</h3>
            <label for="dir">Directorio:</label>
            <input type="text" name="dir">
            <br>
            <input type="submit" value="enviar" name="enviar">
        </form>
    <?php endif; ?>

</body>
</html>