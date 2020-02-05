<?php
    include 'Ave.php';

    class Canario extends Ave{
        private $raza;

        public function __construct($s,$raza)
        {
            parent::__construct($s);
            $this->raza = $raza;
        }
        public function canta(){
            return "<br><img src='canta.jpg'>Estoy cantando.</img><br>";
        }
        public function aseate()
        {
        return "No me gusta el agua, soy un Canario...";    
        }
    }
?>