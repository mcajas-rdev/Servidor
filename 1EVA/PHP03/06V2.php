<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6V2</title>
</head>
<body>
    <?php
    include_once("infopaises.php");

    $paises_length = count($paises);    
    $claves = array_keys($paises);
    $pais_mas_poblado = $claves[0];
    $cambios = 1;
    $habitantes_mas_poblado = 0;
    
    uasort($paises, function($a, $b){
        return $a['Poblacion'] - $b['Poblacion'];
    });

    while ($cambios != 0) {
            $cambios = 0;
        for ($i=0; $i < $paises_length ; $i++) {
            if ($paises ["$pais_mas_poblado"]["Poblacion"] < $paises["$claves[$i]"]["Poblacion"]) {
                $pais_mas_poblado = $claves[$i];
                $cambios++;
            }
        }
    }
    echo '<h3>Pais = ' .$pais_mas_poblado. ' </h3>';
    echo "Capital = ".implode(", Población = ", $paises[$pais_mas_poblado]);
    echo "<br>";
    if(isset($ciudades[$pais_mas_poblado])){
        echo "Ciudades = ".implode(", ", $ciudades[$pais_mas_poblado]);
    }
    echo ".";

    ?>
</body>
</html>