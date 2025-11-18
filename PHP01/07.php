<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="2">
    <title>Ejercicio7</title>
</head>
<style>
    .caja{
        
        display: flex;
        justify-content: center; 
        align-items: center;
        width: 200px;
        height: 70px;
        
    }
</style>
<body>
    <?php
    $width1 = mt_rand(100,400);
    $width2 = mt_rand(100,400);
    $width3 = mt_rand(100,400);

    echo '<div class = "caja" style = "background-color:red; width:'.$width1.'px;font-size:20px">
        rojo'."(".$width1.")".'
    </div>';
    echo '<div class = "caja"  style = " background-color:green; width:'.$width2.'px;font-size:20px">
        verde'."(".$width2.")".'
    </div>';
    echo '<div class = "caja" style = " background-color:blue; width:'.$width3.'px;font-size:20px">
        azul'."(".$width3.")".'
    </div>';

    ?>
</body>
</html>