<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio6</title>
</head>
<body>
    <?php
    $numero = mt_rand(1,10);

        echo '<table border = "1" celpadding="5" cellspacing="0">';
        echo '<tr>
        <th> Tabla del'." $numero".'</th>
        <th></th>
        </tr>';
        echo '<tr>
        <td>'." $numero ".'x 1</td>
        <td>'.($numero*1).'</td>
        </tr>';
        echo '<tr>
        <td>'." $numero ".'x 2</td>
        <td>'.($numero*2).'</td>
        </tr>';
        echo '<tr>
        <td>'." $numero ".'x 3</td>
        <td>'.($numero*3).'</td>
        </tr>';
        echo '<tr>
        <td>'." $numero ".'x 4</td>
        <td>'.($numero*4).'</td>
        </tr>';
        echo '<tr>
        <td>'." $numero ".'x 5</td>
        <td>'.($numero*5).'</td>
        </tr>';
        echo '<tr>
        <td>'." $numero ".'x 6</td>
        <td>'.($numero*6).'</td>
        </tr>';
        echo '<tr>
        <td>'." $numero ".'x 7</td>
        <td>'.($numero*7).'</td>
        </tr>';
        echo '<tr>
        <td>'." $numero ".'x 8</td>
        <td>'.($numero*8).'</td>
        </tr>';
        echo '<tr>
        <td>'." $numero ".'x 9</td>
        <td>'.($numero*9).'</td>
        </tr>';
        echo '<tr>
        <td>'." $numero ".'x 10</td>
        <td>'.($numero*10).'</td>
        </tr>';
        
        
        
        echo '</table>';
    ?>
</body>
</html>