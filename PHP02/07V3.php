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

    $colorInicio = [rand(0,255), rand(0,255), rand(0,255)];
    $colorFin = [255,255,255];

function generarHTMLTable($filas, $columnas, $colorInicio, $colorFin) {
   echo '<table border="2" cellpadding="0" cellspacing="2">';
    $paso = [
        ($colorFin[0] - $colorInicio[0]) / max($filas-1,1),
        ($colorFin[1] - $colorInicio[1]) / max($filas-1,1),
        ($colorFin[2] - $colorInicio[2]) / max($filas-1,1)
    ];

    for ($i = 0; $i < $filas; $i++) {
        echo '<tr>';
        $r = round($colorInicio[0] + $paso[0] * $i);
        $g = round($colorInicio[1] + $paso[1] * $i);
        $b = round($colorInicio[2] + $paso[2] * $i);

        for ($j = 0; $j < $columnas; $j++) {
            echo '<td style="background-color: rgb('.$r.",".$g.",".$b.');width:40px; height:40px;"></td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

generarHTMLTable($filas, $columnas, $colorInicio, $colorFin);

    ?>
</body>
</html>