<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
        $numero1 = mt_rand(1,100);
        $numero2 = mt_rand(1,100);

        if ($numero1 > $numero2){
            $maximo = $numero1;
        }else{
            $maximo = $numero2;
        }

        if ($numero1 < $numero2){
            $minimo = $numero1;
        }else{
            $minimo = $numero2;
        }
        $media = ($maximo +$minimo)/2;
        echo '<table border="1" cellpadding="5" cellspacing="0"> <tr style = "background-color: black; font-color: white"> <th colspan = "2" style = "color: white"> Generacion de 50 valores aleatorios </th> </tr>';
        echo '<tr> <td> Mínimo </td> <td>'.$minimo.'</td> </tr>';
        echo '<tr> <td> Máximo </td> <td>'.$maximo.'</td> </tr>';
        echo '<tr> <td> Media </td> <td>'.$media.'</td> </tr>';
    ?>
</body>
</html>