<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
        $numero1 = mt_rand(1,10);
        $numero2 = mt_rand(1,10);

        echo " $numero1 + $numero2 = ".($numero1+$numero2)."<br>";
        echo " $numero1 - $numero2 = ".($numero1-$numero2)."<br>";
        echo " $numero1 * $numero2 = ".($numero1*$numero2)."<br>";
        echo " $numero1 / $numero2 = ".($numero1/$numero2)."<br>";
        echo " $numero1 % $numero2 = ".($numero1%$numero2)."<br>";

        $potencia = 1;

        for ($i=0; $i < $numero2 ; $i++) { 
            $potencia *= $numero1;
        }
        echo " $numero1 ** $numero2 = $potencia <br>";

    ?>
</body>
</html>