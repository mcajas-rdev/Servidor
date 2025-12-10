<?php

/**
 * Checks if the provided username and password are valid.
 *
 * @param string $username The username to validate.
 * @param string $password The password to validate.
 * @return bool Returns true if the username and password are valid, false otherwise.
 */
function accesoValido($username, $password): bool
{
    // COMPLETAR  +++++++++++++++++++++++++++++++
    $file = fopen("usuarios.dat", "r");
    if ($file) {
        while (($linea = fgets($file)) !== false ) {
            $partes = explode(',', $linea);
            if ($username == $partes[0] && password_verify($password, $partes[1])){
                return true;
            }
        }
        fclose($file);
    }
    return false;
}

/**
 * Records a new access for the given username.
 *
 * @param string $username The username for which to record the access.
 * @return int The result of the access recording operation.
 */
function anotarNuevoAcceso($username):int{

     // COMPLETAR  +++++++++++++++++++++++++++++++
    $file = fopen("usuarios.dat", "r+"); // abrimos el archivo y se almacena en variable con modo lectura
    $resu = false; // hacemos una variable para cuando se modofique un archivo
    $usuarios = []; // Almacenaremos todos los usarios linea por linea, si hay uno modificado se almacenara aqui ya modficado
    if ($file) {

        while (($linea = fgetcsv($file)) !== false) {    
            if ($username == $linea[0]){ // si el usuario coincide
                $linea[2] = $linea[2]+1; // el valor 2 de linea el valor de accesos asique se le añade 1
                $resu = true; // ponemos a true porque ha habido un cambio
            }
            $usuarios[] = $linea; // y se vuelve a almacenar la linea con los cambios
        }
        fclose($file); // cerramos el fichero
        
        if ( $resu ) { // si ha habido algun cambio resu es true
            volcarDatos($usuarios); // funcion para volcar los datos nuevos del array usuarios al fichero
        }
    }
    return $resu;
}

function volcarDatos($tabla) {
    $file = fopen("usuarios.dat", "w"); // se abre en modo escritura el archivo

    foreach ($tabla as $valores) { // recorremos el array de usuarios entero y se muestra linea por linea
        fputcsv($file, $valores); // metemos linea a linea el array en el fichero
    }
    fclose($file); // se cierra el archivo
}

/**
 * Registers a user with a given username and time.
 *
 * @param string $username The username of the user to register.
 * @param int $time The time associated with the registration.
 */
function registra($username,$time){
     // COMPLETAR  +++++++++++++++++++++++++++++++
    return;
}
