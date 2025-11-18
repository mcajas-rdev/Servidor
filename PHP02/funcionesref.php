<?php
    function suma(int $numero1, int $numero2, int &$resultado_suma){
        $resultado_suma = $numero1 + $numero2;
        return $resultado_suma;
    }
    function resta(int $numero1, int $numero2, int &$resultado_resta){
        $resultado_resta = $numero1 - $numero2;
        return $resultado_resta;
    }
    function multiplicacion(int $numero1, int $numero2, int &$resultado_multiplicacion){
        $resultado_multiplicacion = $numero1 * $numero2;
        return $resultado_multiplicacion;
    }
    function division(int $numero1, int $numero2, int &$resultado_division){
        $resultado_division = $numero1 / $numero2;
        return $resultado_division;
    }
    function modulo(int $numero1, int $numero2, int &$resultado_modulo){
        $resultado_modulo = $numero1 % $numero2;
        return $resultado_modulo;
    }
    function potencia(int $numero1, int $numero2, int &$resultado_potencia){
        $resultado_potencia = 1;
        for ($i=0; $i < $numero2 ; $i++) { 
            $resultado_potencia *= $numero1;
        }
        return $resultado_potencia;
    }
?>