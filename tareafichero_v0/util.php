<?php 
define ('FILEUSER','dat/usuarios.txt');
/**
 * 
 * Compruba que la usuario y la contraseña son correctos consultando
 * el archivo de datos
 * @param mixed $login
 * @param mixed $passwd
 * @return bool
 */
function userOk ( $login, $passwd):bool {
    if (!is_readable(FILEUSER)) {
        die("Error al crear el fichero");
    }
        $filearray = file(FILEUSER);
        foreach ($filearray as &$linea) {
            $partes = explode('|', $linea);
            if ($partes[0] === $login && password_verify($passwd, $partes[1])){
                return true;
            }
        }
    
    return false;
}

/**
 *  Actualiza la password de un usuario en el archivo de datos
 * @param mixed $login
 * @param mixed $passwd
 * @return bool true si el usuarios existe en el fichero
 */
function updatePasswd($login, $passwd): bool {
    if (!is_readable(FILEUSER)) {
        die("Error al leer el fichero");
    }

    // Leer el archivo en un array
    $filearray = file(FILEUSER);
    $modificado = false;

    foreach ($filearray as &$linea) {
        $partes = explode('|', trim($linea));

        // Si el usuario coincide y la contraseña antigua es correcta
        if ($partes[0] == $login && password_verify($passwd, $partes[1])) {
            // Cambiar la contraseña por el nuevo hash
            $partes[1] = password_hash($_POST['password1'], PASSWORD_DEFAULT);
            $linea = implode('|', $partes) . "\n";
            $modificado = true;
            break; // Ya lo encontramos, salimos del bucle
        }
    }

    // Si se modificó, guardar el nuevo contenido en el archivo
    if ($modificado) {
        // LOCK_EX evita que se escriba al mismo tiempo desde otro proceso
        $resultado = file_put_contents(FILEUSER, implode('', $filearray), LOCK_EX);

        // Devuelve true si se guardó correctamente
        return $resultado !== false;
    }

    // Si no se encontró el usuario o no coincidía la contraseña
    return false;
}


