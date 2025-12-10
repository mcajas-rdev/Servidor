<?php

include "dat/Cliente.php";

/**
 *  Lee el fichero de clientes y lo carga en un Array de objetos clientes
 *  @return array - tabla asociativa con clave dni.
 */

function cargarTablaClientes (): array {

    $tclientes = [];
     // COMPLETAR
    $fich = fopen("dat/clientes.csv", "r");
    while ($valores = fgetcsv($fich)) {
        $clt = new Cliente($valores[0], $valores[1], $valores[2], $valores[3]);
        $tclientes[] = $clt;
    }
        
    @fclose($fich);

    return $tclientes;

}

/**
 * Escribe la tabla de objectos clientes en el fichero csv
 * @param  $tabla - array de objectos
 */

function salvarTablaClientes(array $tabla){

    $fich = fopen('dat/clientes.csv','w');
    // COMPLETAR
    foreach ($tabla as $clt) {
        $valores = [$clt->dni, $clt->nombre, $clt->clavehash, $clt->puntos];
        fputcsv($fich, $valores);
    }
    fclose($fich);

}

/**
 * Valida usuario y contraseña contra clientes.csv
 * @param string $dni DNI del cliente
 * @param string $clave Contraseña en texto plano
 * @return true Si el usuario y la contraseña son correctas
 */
function validarCliente($dni, $clave) :bool{
    
    $tablacli = cargarTablaClientes();
    // COMPLETAR
    foreach ($tablacli as $clt) {
            if ($clt->dni == $dni && password_verify($clave, $clt->clavehash)) {
                return true;
            }
        }
    return false;
}

/**
 * Anota los puntos logrados en la última partida 
 * @param string $dni DNI del cliente a modificar
 * @param int $puntos Puntos a almacenar
 * @return true si han anotado los datos
*/
function anotarPuntos($dni,$puntos): bool {
    $tablaCli = cargarTablaClientes();
    // COMPLETAR
    $salvar = false;
        foreach ($tablaCli as $clt) {
            if ($clt->dni == $dni) {
                $clt->puntos = $puntos;
                $salvar = true;
            }
        }

        if ( $salvar ) {
            volcarDatos($tablaCli);
        }
    return $salvar;
}

/**
 * Vuelca los datos de una tabla al fichero
 */
function volcarDatos($tabla) {
    $fich = fopen("dat/clientes.csv", "w");
        foreach ($tabla as $clt) {
            $valores = [ $clt->dni, $clt->nombre ,$clt->clavehash, $clt->puntos];
            fputcsv($fich, $valores);
        }
        fclose($fich);
}



