<?php
    require_once 'Mamifero.php';

    class Perro extends Mamifero{
        private $raza;

        public function __construct($s,$raza)
        {
         parent::__construct($s);
         $this->raza = $raza;   
        }
        public function ladra(){
            return "<br><img src='ladra.jpg'>Estoy ladrando.</img><br>";
        }
        //Sobrescribo el metodo aseate de su clase padre "Animal".
        public function aseate()
        {
        return "No me gusta el agua, soy un perro...";    
        }
        public function lamer(){
            return "Te estoy lamiendo";
        }
    }
?>