<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejrecicio 1</title>
</head>
<body>
    <?php
        for ($i=0; $i < 20; $i++) { 
            $arr[] = mt_rand(1,10);
        }
        
        $maximo = max($arr);
        $minimo = min($arr);
        echo "El maximo de este array es $maximo <br> El minimo de este array es $minimo <br>";

        $frecuencias = array_count_values($arr);

        arsort($frecuencias);

        $valorMasRepetido = array_key_first($frecuencias);
        $veces = $frecuencias[$valorMasRepetido];

        echo "El valor que más se repite es: $valorMasRepetido (se repite $veces veces)";
        
    ?>
</body>
</html>