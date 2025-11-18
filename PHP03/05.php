<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    <?php

        $numeros = [mt_rand(1,49), mt_rand(1,49), mt_rand(1,49), mt_rand(1,49), mt_rand(1,49), mt_rand(1,49)];

        print_r($numeros);
        $cambios = 1;
        while ($cambios != 0) {
            $cambios = 0;
            for ($i=0; $i < 6 ; $i++) {
                for ($j=1; $j < 6 ; $j++) {
                    if($i != $j){ 
                        if ($numeros[$i] == $numeros[$j]) {
                            $numeros[$i] = mt_rand(1,49);
                            $cambios++;
                        }
                    }
                }
            }
        }
        $temp = 0;
        $cambios = 1;
        while ($cambios != 0) {
            $cambios = 0;
            for ($i=0; $i < 5 ; $i++) {
                if($i < 4){
                    if($numeros[$i+1] < $numeros[$i]){
                        $temp = $numeros[$i+1];
                        $numeros[$i+1] = $numeros[$i];
                        $numeros[$i] = $temp;
                        $cambios++;
                    }
                }
            }
        }
        echo "<br>";
        print_r($numeros);

    ?>
</body>
</html>