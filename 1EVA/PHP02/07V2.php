<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>
    <?php

    $filas = 10;
    $columnas = 10;

    function generarHTMLTable ( $filas, $columnas){
         echo '<table border="2" cellpadding="0" cellspacing="2">';
            for ($i=0; $i < $filas ; $i++) { 
                echo '<tr>';
                for ($j=0; $j < $columnas ; $j++) {
                    $color = [mt_rand(1,255),mt_rand(1,255),mt_rand(1,255)];
                    echo '<td style = "background-color: rgb'."(".$color[0].",".$color[1].",".$color[2].');width:40px; height:40px;"></td>';
                }
                echo '</tr>';
            }
        echo '</table>';
    }

    generarHTMLTable ( $filas, $columnas);
    ?>
</body>
</html>