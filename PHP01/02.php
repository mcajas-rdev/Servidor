<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejericio2</title>
</head>
<body>
    <?php
  $numero1 = mt_rand(1,9);
        
        for ($i=1; $i <= $numero1; $i++) {
            $color = ($i % 2 == 0) ? "red" : "blue"; 
            for ($j=0; $j < $i ; $j++) { 
                 echo '<span style = "color:'. $color.';">'.$i.'</span> ';
            }
            echo "<br>";
        }

    ?>

</body>
</html>