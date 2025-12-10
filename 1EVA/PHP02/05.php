<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    <?php

    $filas = mt_rand(5,15);
    $columnas = mt_rand(10,20);
    $borde = 1;
    $contenido = "hola";
    function generarHTMLTable ( $filas, $columnas, $borde,$contenido){
         echo '<table border="$borde" cellpadding="5" cellspacing="0">';
            for ($i=0; $i < $filas ; $i++) { 
                echo '<tr>';
                for ($j=0; $j < $columnas ; $j++) {
                    echo '<td>'." $contenido ".'</td>';
                }
                echo '</tr>';
            }
        echo '</table>';
    }

    generarHTMLTable ( $filas, $columnas, $borde,$contenido);
    ?>
</body>
</html>