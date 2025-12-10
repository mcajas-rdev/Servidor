<?php
// DATOS DE PRUEBA
$datos = [20,30,34,34,49,8,15,50,48,9,954,12,49,4,3,9,5,7,14,21];
$divisores = [3,5,7];

// Divisores de 3, 5, 7 
$tdivisores       = obtenerDivisoresTodos ($datos,$divisores);

// Divisores de 3, 5, 7 sin repetir 
$tdivisoresSinRep = obtenerDivisoresNoRepes($datos,$divisores);


/**
 *  Devuelve un array asociativo con los números que son divisibles 
 *  de la tabla de datos por los números de la tabla divisores.
 *
 *  EJEMPLO:
 *  [3] => [30,15,48,9,954,12,3,9,21]
 *
 * @param array $datos      Lista de números
 * @param array $divisores  Lista de divisores
 * @return array
 */
function obtenerDivisoresTodos ($datos, $divisores): array {
    
    $resu = [];  // array resultado asociativo: divisor => lista de números

    // Recorremos la lista de divisores
    foreach ($divisores as $d) {

        // Inicializamos el array del divisor como vacío
        $resu[$d] = [];

        // Recorremos todos los números de datos
        foreach ($datos as $n) {

            // Si el número es divisible (resto 0)
            if ($n % $d == 0) {
                // Lo añadimos a la lista de ese divisor
                $resu[$d][] = $n;
            }
        }
    }

    return $resu;
}



/**
 * Devuelve un array asociativo similar al anterior pero evitando repeticiones:
 * un mismo número NO puede estar en más de un divisor.
 *
 * Ejemplo:
 * si 30 es divisible entre 3 y 5, solo se coloca en el primer divisor (3).
 *
 * @param array $datos
 * @param array $divisores
 * @return array
 */
function obtenerDivisoresNoRepes ($datos, $divisores): array {

    $resu = [];      // array resultado
    $usados = [];    // números que ya han sido almacenados (para evitar repes)

    // Recorremos los divisores en orden
    foreach ($divisores as $d) {

        $resu[$d] = [];  // inicializamos la lista del divisor

        // Recorremos todos los datos
        foreach ($datos as $n) {

            // Si el número es divisible entre d Y no se usó antes
            if ($n % $d == 0 && !in_array($n, $usados)) {

                // Lo añadimos a este divisor
                $resu[$d][] = $n;

                // Marcamos el número como "usado"
                $usados[] = $n;
            }
        }
    }

    return $resu;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
    <h2> Tabla de divisores </h2>
    <?=  print_r($tdivisores) ?>
    <hr>
    <h2> Tabla de divisores sin repes </h2>
    <?= print_r($tdivisoresSinRep); ?>
    </pre>
</body>
</html>