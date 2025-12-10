<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php

    function suma(int $numero1, int $numero2){
        $resultado_suma = $numero1 + $numero2;
        return $resultado_suma;
    }
    function resta(int $numero1, int $numero2){
        $resultado_resta = $numero1 - $numero2;
        return $resultado_resta;
    }
    function multiplicacion(int $numero1, int $numero2){
        $resultado_multiplicacion = $numero1 * $numero2;
        return $resultado_multiplicacion;
    }
    function division(int $numero1, int $numero2){
        $resultado_division = $numero1 / $numero2;
        return $resultado_division;
    }
    function modulo(int $numero1, int $numero2){
        $resultado_modulo = $numero1 % $numero2;
        return $resultado_modulo;
    }
    function potencia(int $numero1, int $numero2){
        $resultado_potencia = 1;
        for ($i=0; $i < $numero2 ; $i++) { 
            $resultado_potencia *= $numero1;
        }
        return $resultado_potencia;
    }
        $numero1 = mt_rand(1,10);
        $numero2 = mt_rand(1,10);

        
        echo " $numero1 + $numero2 = ".suma($numero1, $numero2)."<br>";
        echo " $numero1 - $numero2 = ".resta($numero1, $numero2)."<br>";
        echo " $numero1 * $numero2 = ".multiplicacion($numero1, $numero2)."<br>";
        echo " $numero1 / $numero2 = ".division($numero1, $numero2)."<br>";
        echo " $numero1 % $numero2 = ".modulo($numero1, $numero2)."<br>";
        echo " $numero1 ** $numero2 = ".potencia($numero1, $numero2)."<br>";

    ?>
</body>
</html>