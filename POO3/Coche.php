<?php
namespace POO3;

class Coche
{
    // Definir los atributos
    private $modelo;
    private $distancia_total;
    private $distancia_parcial; 
    private $motor;
    private $velocidad;
    private $velocidadMax;  
    
    // Completar los métodos
    
    function __construct ( String $modelo, int $velocidadMax){
        $this-> modelo = $modelo;
        $this -> velocidadMax = $velocidadMax;
        $this-> distancia_total = 0;
        $this-> distancia_parcial = 0;
        $this-> motor = 0;
        $this-> velocidad = 0;
        
    }
    
    public function  arrancar():bool{
        if ($this->motor) {  
            $this->infoError("No se puede arrancar ya que ya esta arrancado");
            return false;
        }else {
            $this->motor = true;
            return true;
        }
    }
    
    public function parar():bool{
        if (!$this->motor) {  
            $this->infoError("No se puede parar ya que ya esta parado");
            return false;
        }else {
            $this->motor = false;
            $this->distancia_parcial = 0;
            $this->velocidad = 0;
            return true;
        }
    }
    
    public function acelera( int $cantidad):bool{
        if (!$this->motor) {  
            $this->infoError("No se puede acelerar porque el motor no esta arrancado");
            return false;
        }
        if ($this->velocidad+$cantidad > $this->velocidadMax) {  
            $this->infoError("No se puede acelerar porque ya se ha superado la velocidad maxima");
            return false;
        }
        $this->velocidad += $cantidad;
        return true;
    }
    
    public function frena ( int $cantidad):bool{
        if (!$this->motor || $this->velocidad == 0 ||$this->velocidad-$cantidad < 0) {  
            $this->infoError("No se puede frenar ya que el coche esta parado");
            return false;
        }
        if ($this->velocidad == 0) {  
            $this->infoError("No se puede frenar ya que el coche ya esta a 0 km");
            return false;
        }
        if ($this->velocidad-$cantidad < 0) {  
            $this->infoError("No se puede frenar tanta velocidad");
            return false;
        }
        $this->velocidad -= $cantidad;
        return true;
    }
    
    public function recorre ():bool{
        if (!$this->motor) {
            $this->infoError("No se puede recorrer ya que el motor esta parado");
            return false;
        }
        $this->distancia_total += $this->velocidad;
        $this->distancia_parcial += $this->velocidad;
        return true;
    }
    
    public function info():string{
        return $this->modelo . " | ". $this->velocidad ." | ". $this->distancia_parcial ." | ". $this->distancia_total;
    }
    
    public function getKilometros():int{
        return $this->distancia_parcial;
    }
    
    private function infoError( String $mensaje):void{
        echo "<br>". $mensaje ."<br>";
    }	
}