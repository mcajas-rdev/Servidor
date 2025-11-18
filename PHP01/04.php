<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4</title>
</head>
<body>
    <?php
    $inicio = microtime(true);
        $condicion = false;
        $contador6 = 0;
        $indice = 0;
        while (!$condicion) {
            $numeros = mt_rand(1,10);
            $indice++;
            if ($numeros == 6) {
                $contador6++;
            }else{
                $contador6 = 0;
            }
            if ($contador6 == 3) {
                $condicion = true;
            }
        }
        $fin = microtime(true);
        $tiempo = ($fin-$inicio) * 1000;
        echo "Han salido tres 6 seguidos tras generar $indice numeros en ". number_format($tiempo, 3). " milisegundos";
    ?>
</body>
</html>