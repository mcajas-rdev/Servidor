<?php

    function elegirPalabra(){
        static $tpalabras = ["Madrid","Sevilla","Murcia","Málaga","Mallorca","Menorca"];
        $claveAleatoria = array_rand($tpalabras); 
        return $tpalabras[$claveAleatoria]; // Devuelve una palabra al azar    
    }

    function comprobarLetra($letra,$cadena): bool{
        // COMPLETAR
        
        $ocurrencia = strpos($cadena, $letra);

        return ($ocurrencia === false) ? false : true; // Devuelve true o false si la letra esta en la cadena  
        
        /*$length = strlen($cadena);
        
        for ($i=0; $i < $length-1; $i++) { 
            if($letra === $cadena[$i]){
                return true;
            }
        }*/
    }


/*
 * Devuelve una cadena donde aparecen las letras de la cadenapalabra en su posición    si cada letra se encuentra en la cadenaletras
 * 
 * Ej  generaPalabraconHuecos("aeiou"     ,"hola pepe") -->"-o-a--e-e"
 *     generaPalabraconHuecos("abcdefghi ","hola pepe") -->"h--a -e-e"
 * 
 */

function generaPalabraconHuecos ( $cadenaletras, $cadenapalabra) {
    
    // Genero una cadena resultado inicialmente con todas las posiciones con -
    $resu = $cadenapalabra;
    for ($i = 0; $i<strlen($resu); $i++){
        $resu[$i] = '-';
    }
    // COMPLETAR rellenado la cadena resu
    
    
    return $resu;
}


?>