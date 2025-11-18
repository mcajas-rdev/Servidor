<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php
        $periodicos = ["El Pais" => "https://elpais.com/", "ABC" => "https://www.abc.es/", "La Vanguardia" => "https://www.lavanguardia.com/", "El Español" => "https://www.elespanol.com/", "El Mundo" => "https://www.elmundo.es/"];
        foreach ($periodicos as $periodico => $url){
            echo '<ul>
                    <li> <a href='."$url".'>'.$periodico.'</a> </li>
                </ul>';
        }
    ?>
</body>
</html>