<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio5</title>
</head>
<body>
    <?php
    $numero1 = mt_rand(1,10);
    $numero2 = mt_rand(1,10);
    $potencia = 1;
    for ($i=0; $i < $numero2 ; $i++) { 
        $potencia *= $numero1;
    }
        echo '<table border="1" cellpadding="5" cellspacing="0">
            <tr style="background-color: lightgray; color: blue;">
                <th>Operacion</th>
                <th>resultado</th>
            </tr> 
            <tr>
                <td>' ."$numero1 + $numero2 = ".'</td>
                <td>'.($numero1+$numero2). '</td>
            </tr>
            <tr>
                <td>' ."$numero1 - $numero2 = ".'</td>
                <td>'.($numero1-$numero2). '</td>
            </tr>
            <tr>
                <td>' ."$numero1 * $numero2 = ".'</td>
                <td>'.($numero1*$numero2). '</td>
            </tr>
            <tr>
                <td>' ."$numero1 / $numero2 = ".'</td>
                <td>'.($numero1/$numero2). '</td>
            </tr>
            <tr>
                <td>' ."$numero1 % $numero2 = ".'</td>
                <td>'.($numero1%$numero2). '</td>
            </tr>
            <tr>
                <td>'."$numero1'&sup$numero2;".'</td>
                <td>'.$potencia.'</td>
            </tr>
            </table>';
    ?>
</body>
</html>