<?php

// DATOS DE PRUEBA
$precios = [250, 10, 50, 100, 50, 25, 5, 200, 10, 300, 50];
// Definimos rangos: 'Barato' hasta 20 inclusive, 'Medio' hasta 100, 'Caro' más de 100
$categorias = ['Barato','Medio','Caro'];

// LLAMADAS A FUNCIONES


$res1 = agruparPorCategoria($precios, $categorias);
echo '<code> <pre>';
    print_r($res1);
echo ' </pre> </code>';
echo '<br>';
$preciosRandom = generarDatos(1,500,20);
$res2 = agruparPorCategoria($preciosRandom, $categorias);
echo '<code> <pre>';
print_r($res2);
echo ' </pre> </code>';



/**
 * Agrupa los precios según si son menores o iguales al valor de la categoría
 * En array tiene que estar los datos ORDENADOS de mas baratos a más caros
 * @param array $precios Lista numérica
 * @param array $categorias Array asociativo con los nombre de las categorias
 * @return array Array multidimensional
 */
function agruparPorCategoria($precios, $categorias): array {
    $resu = [];
    
    // Recorremos la lista de divisores
    foreach ($categorias as $cat) {

        // Inicializamos el array del divisor como vacío

        // Recorremos todos los números de datos
        foreach ($precios as $p) {

            // Si el número es divisible (resto 0)
            if ($cat == 'Barato' && $p <= 20) {
                // Lo añadimos a la lista de ese divisor
                $resu[$cat][] = $p;
            }else if($cat == 'Medio' && $p > 20 && $p <=100 ) {
                $resu[$cat][] = $p;
            }else if ($cat == 'Caro' && $p > 100 ) {
                $resu[$cat][] = $p;
            }
            
        }
    }

    return $resu;
}

function generarDatos($min,$max, $nunelementos): array {
    $resultado = [];
    $rand = 0;
    for ($i=0; $i < $nunelementos; $i++) {
        $rand = mt_rand($min, $max); 
        $resultado[] = $rand; 
    }
    
    return $resultado;
}
