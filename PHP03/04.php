<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    
    <?php

    $deportes = ["futbol" => "img/futbol.JPG", "basket" => "img/basket.jpg", "criquet" => "img/criquet.jpg", "hockey hierba" => "img/hockey_hierba.JPG", "tenis" => "img/renis.jpg"];
        
        echo '<table border="1" cellpadding="10" cellspacing="0">
              <th> Sport </th> <th> Logo </th>';
        
            foreach ($deportes as $sport => $image) {
                echo '<tr>
                    <td>'. $sport .'</td> <td> <img src="'.$image.'" alt="'.$sport.'" style="width:300px; height:250px;" > </td>
                </tr>';
            }
        
        echo '</table>';
    ?>
</body>
</html>