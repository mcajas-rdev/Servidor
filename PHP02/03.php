<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    
</head>

<body>
    
    <?php
    include_once("funcionesref.php");

        $val1 = mt_rand(1,29);
        $val2 = mt_rand(1,29);
        $resu = 0;

        suma($val1, $val2, $resu);
        echo "$val1 + $val2 = $resu<br>";

        resta($val1, $val2, $resu);
        echo "$val1 - $val2 = $resu<br>";

        multiplicacion($val1, $val2, $resu);
        echo "$val1 * $val2 = $resu<br>";

        division($val1, $val2, $resu);
        echo "$val1 / $val2 = $resu<br>";

        modulo($val1, $val2, $resu);
        echo "$val1 % $val2 = $resu<br>";

        potencia($val1, $val2, $resu);
        echo "$val1 ** $val2 = $resu<br>";
        

    ?>
</body>
</html>