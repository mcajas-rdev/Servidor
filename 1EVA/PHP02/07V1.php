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

    function color (){
        $numero = mt_rand(1,5);
                    switch ($numero) {
                        case 1: $color = "rgb(255,0,0)"; break;
                        case 2: $color = "rgb(0,0,255)"; break;
                        case 3: $color = "rgba(10, 97, 10, 1)"; break;
                        case 4: $color = "rgb(255,255,255)"; break;
                        case 5: $color = "rgb(0,0,0)"; break;
                    }
        return $color;
    }

    function generarHTMLTable ( $filas, $columnas){
         echo '<table border="2" cellpadding="0" cellspacing="2">';
            for ($i=0; $i < $filas ; $i++) { 
                echo '<tr>';
                for ($j=0; $j < $columnas ; $j++) {
                    echo '<td style = "background-color:'.color().';width:40px; height:40px;"></td>';
                }
                echo '</tr>';
            }
        echo '</table>';
    }

    generarHTMLTable ( $filas, $columnas);
    ?>
</body>
</html>