<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4</title>
</head>
<body>
    <?php
        $numero = mt_rand(1,9);
        echo "numero = $numero <br> <br> <br> <br>";
        $espacios = $numero;
        $asteriscos = 1;
        echo "<code>";
        for ($i=0; $i < $numero ; $i++) { 

            for ($j=$espacios; $j > 0 ; $j--) {
                echo "&nbsp;"; 
            }
            $espacios--;

            for ($k=0; $k < $asteriscos; $k++) { 
                echo "*";
            }
            $asteriscos+=2;
            echo "<br>";
        }
        echo "</code>";
    ?>
</body>
</html>