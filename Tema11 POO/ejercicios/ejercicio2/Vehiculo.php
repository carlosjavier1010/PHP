<?php

    if (!isset($_SESSION['kmTotales'])) {
        $_SESSION['kmTotales'] = 0;
     }
    if (!isset($_SESSION['vehiculosCreados'])) {
        $_SESSION['vehiculosCreados'] = 0;
     }
    abstract class Vehiculo{
        //atributos de la clase
        
        
        private $kmRecorridos = 0;
        
        //constructor
        public function __construct($kmRecorridos)
        {
            $this->kmRecorridos = $kmRecorridos;
        }
        //metodo de clase
        public static function getKmTotales(){
            return $_SESSION['kmTotales'];
        }
        public static function setKmTotales($kmTotales){
            $_SESSION['kmTotales'] = $kmTotales;
        }
        public static function getVehiculosCreados(){
            return $_SESSION['vehiculosCreados'];
        }
        //metodo de instancia
        public function getKmRecorridos()
        {
            return $this->kmRecorridos;
        }

        public function setKmRecorridos($kmRecorridos)
        {
                $this->kmRecorridos += $kmRecorridos;
                $_SESSION['kmTotales']+=$kmRecorridos;
                
        }
    }

?>