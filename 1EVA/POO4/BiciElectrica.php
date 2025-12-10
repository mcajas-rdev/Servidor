<?php

    class Bicicleta{
        private $id; // Identificador de la bicicleta (entero)
        private $coordx; // Coordenada X (entero)
        private $coordy; // Coordenada Y (entero)
        private $bateria; // Carga de la batería en tanto por ciento (entero)
        private $operativa; // Estado de la bicleta ( true operativa- false no disponible)
    
        public function __get($name) {
            if (property_exists($this, $name)) {
                return $this->$name;
            }else{
                $this->infoError("Esta propiedad del objeto no es válida");
            }

        }
        
        public function __set($name, $value) {

            if (!property_exists($this, $name)) {
                $this->infoError("Esta propiedad del objeto no es válida");
                return;
            }

            if ($name == 'bateria') {
                if ($value < 0 || $value > 100) {
                    $this->infoError("No se ha podido establecer la bateria, ya que esta fuera de los valores posibles");
                    return;
                }
            }            
            $this->$name = $value;
        }

        public function infoError($msg) {
                    echo $msg . "<br>";
        }

        public function __toString() {
            return "Id de la Bicicleta: ".$this->id.", Batería de la bicicleta: ". $this->bateria. "<br>";
        }
        
        public function distancia($x, $y) {
            $dx = $x - $this->coordx;
            $dy = $y - $this->coordy;

            return sqrt($dx * $dx + $dy * $dy);
        }
    }

    
?>