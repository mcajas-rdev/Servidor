<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <?php
        $periodicos = ["El Pais" => "https://elpais.com/", "ABC" => "https://www.abc.es/", "La Vanguardia" => "https://www.lavanguardia.com/", "El Español" => "https://www.elespanol.com/", "El Mundo" => "https://www.elmundo.es/"];
        
        $claves = array_keys($periodicos);
        $claveAleatoria = $claves[array_rand($claves)];
        
        echo 'La mejor decision es -> <a href='."$periodicos[$claveAleatoria]".'>'.$claveAleatoria.'</a>';
    ?>
</body>
</html>