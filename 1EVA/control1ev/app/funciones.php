<?php
require_once ('dat/datos.php');
/**
 *  Devuelve true si el código del usuario y contraseña se 
 *  encuentra en la tabla de usuarios
 *  @param $login : Código de usuario
 *  @param $clave : Clave del usuario
 *  @return true o false
 */
function userOk($login,$clave):bool {
    global $usuarios;
    $length = count($usuarios);

    $codigo = array_keys($usuarios);
    for ($i=0; $i < $length ; $i++) { 
        if ($login == $codigo[$i] && $clave === $usuarios[$codigo[$i]][1] ) {
            return true;
        }
    }
    return false;
}

/**
 *  Devuelve el rol asociado al usuario
 *  @param $login: código de usuario
 *  @return ROL_ALUMNO o ROL_PROFESOR
 */
function getUserRol($login){
    global $usuarios;
    return ($usuarios[$login][2] == 100) ? ROL_PROFESOR : ROL_ALUMNO;
    
}

/**
 *  Muestra las notas del alumno indicado.
 *  @param $codigo: Código del usuario
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */
function verNotasAlumno($codigo):String{
    $msg="";
    global $nombreModulos;
    global $notas;
    global $usuarios;
    $alumno = $usuarios[$codigo][0];
    $msg .= " Bienvenido/a alumno/a: ". " $alumno";
    $msg .= "<table>";
    $msg .= '<tr><th>Modulo</th><th>Nota</th></tr>';
    for ($i=0; $i < count($nombreModulos); $i++) { 
        $msg .= '<tr> <td>'. $nombreModulos[$i] .'</td> <td>'. $notas[$codigo][$i] .'</td> </tr>';
    }
    $msg .= "</table>";
    return $msg;
}

/**
 *  Muestra las notas de todos alumnos. 
 *  @param $codigo: Código del profesor
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */
function verNotaTodas ($codigo): String {
    $msg="";
    global $nombreModulos;
    global $notas;
    global $usuarios;
    $profesor= $usuarios[$codigo][0];

    $codigos = array_keys($usuarios);
    

    $msg .= " Bienvenido Profesor: ". " $profesor";
    $msg .= "<table>";
    $msg .= '<tr><th>Nombre</th>';
    for ($i=0; $i < count($nombreModulos) ; $i++) { 
        $msg .= '<th>'. $nombreModulos[$i] .'</th>'; 
    }
    $msg .= '</tr>';

    for ($i=1; $i < count($usuarios) ; $i++) {
        $msg .= '<tr> <td>'. $usuarios[$codigos[$i]][0].' </td>';
        for ($j=0; $j < count($notas) - 1 ; $j++) { 
            $msg .= '<td>'. $notas[$codigos[$i]][$j].' </td>';
        }   
    }

    $msg .= "</table>";
    return $msg;
}