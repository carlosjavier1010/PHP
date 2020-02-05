<?php
if (!isset($_SESSION['idContador'])) {
    $_SESSION['idContador'] = 0;
 }
    require_once 'Vehiculo.php';
    
    class Coche extends Vehiculo{
    
        private $marca = "";
        private $matricula ="";
        private $modelo = "";
        private $color = "";
        public function __construct($kmRecorrido,$marca,$matricula,$modelo,$color)
        {
            $_SESSION['idContador']++;
            $_SESSION['vehiculosCreados']++;
            parent::setKmRecorridos($kmRecorrido);
            $this->matricula = $matricula;
            $this->modelo = $modelo;
            $this->color = $color;
            $this->marca = $marca;
        }

        public function andar($km){
            parent::setKmRecorridos($km);
        }
        
        public function quemaRueda(){
            return "<br>Estoy quemando rueda con el coche: ".$this->marca."! con MATRICULA:".$this->matricula."<br>";
        }
        public static function getIdContador()
         {
                  return $_SESSION['idContador'];
         }
         public static function setIdContador($idContador)
         {
            $_SESSION['idContador'] = $idContador;
         }

        /**
         * Get the value of marca
         */ 
        public function getMarca()
        {
                return $this->marca;
        }

        /**
         * Set the value of marca
         *
         * @return  self
         */ 
        public function setMarca($marca)
        {
                $this->marca = $marca;

                return $this;
        }

        /**
         * Get the value of matricula
         */ 
        public function getMatricula()
        {
                return $this->matricula;
        }

        /**
         * Set the value of matricula
         *
         * @return  self
         */ 
        public function setMatricula($matricula)
        {
                $this->matricula = $matricula;

                return $this;
        }

        /**
         * Get the value of modelo
         */ 
        public function getModelo()
        {
                return $this->modelo;
        }

        /**
         * Set the value of modelo
         *
         * @return  self
         */ 
        public function setModelo($modelo)
        {
                $this->modelo = $modelo;

                return $this;
        }

        /**
         * Get the value of color
         */ 
        public function getColor()
        {
                return $this->color;
        }

        /**
         * Set the value of color
         *
         * @return  self
         */ 
        public function setColor($color)
        {
                $this->color = $color;

                return $this;
        }
    }
?>