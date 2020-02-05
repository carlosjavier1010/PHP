<?php
    class Cubo{
        private $capacidad;
        private $litros;
        public function __construct($capacidad,$litros)
        {
            $this->capacidad = $capacidad;
            $this->litros = $litros;
        }

        public function getCapacidad()
        {
                return $this->capacidad;
        }

        
        public function setCapacidad($capacidad)
        {
                $this->capacidad = $capacidad;

                return $this;
        }

       
        public function getLitros()
        {
                return $this->litros;
        }

       
        public function setLitros($litros)
        {
                $this->litros = $litros;

                return $this;
        }
        public function verter(Cubo $cubo){
            if ($this->litros+$cubo->litros > $cubo->capacidad) {
                $cabe = $cubo->capacidad-$cubo->litros;
                $this->litros-=$cabe;
                $cubo->litros+= $cabe;
            }else {
                $cubo->litros += $this->litros;
                $this->litros = 0;
            }
        }
        public function __toString()
        {
            echo '<br>Capacidad:'.$this->capacidad.' Litros:'.$this->litros.'.<br>';
        }
    }
?>