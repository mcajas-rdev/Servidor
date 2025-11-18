<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php
    include_once("infopaises.php");
    $claves = array_keys($paises);
    
    $paises_length = count($paises);
    $pais_mas_poblado = $claves[0];
    for ($i=0; $i < $paises_length ; $i++) { 
        if ($paises ["$pais_mas_poblado"]["Poblacion"] < $paises["$claves[$i]"]["Poblacion"]) {
            $pais_mas_poblado = $claves[$i];
        }
    }
    echo "$pais_mas_poblado => ";

    $total_ciudades = count($ciudades[$pais_mas_poblado]);
    $contador = 0; 
    foreach ($ciudades[$pais_mas_poblado] as $country => $cities) {
        $contador++;
        if ($contador == $total_ciudades){
            echo "$cities ";
        } else {
            echo "$cities,&nbsp; ";
        }
        
    }

    ?>
</body>
</html>