<?php
    class Empleado{
        private $nombre;
        private $sueldo;

        public function __construct($nombre,$sueldo)
        {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
        }

        public function asigna($nombre,$sueldo){
            $this->nombre = $nombre;
            $this->sueldo = $sueldo;
        }
        public function imprimir(){
            echo "<br>Nombre:".$this->nombre."<br>";
            if ($this->sueldo > 3000) {
                echo "<br>Debe de pagar impuestos<br>";
            } else {
                echo "<br>No tiene que pagar impuestos<br>";
            }
            
        }
    }
?>