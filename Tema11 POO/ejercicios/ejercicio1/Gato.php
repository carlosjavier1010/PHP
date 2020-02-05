<?php
    require_once 'Mamifero.php';

    class Gato extends Mamifero{
        private $raza;

        public function __construct($s,$raza)
        {
            parent::__construct($s);
            $this->raza = $raza;

        }
        public function maulla(){
            return "<br><img src='maulla.jpg'>Estoy maullando.</img><br>";
        }
        public function ronronea(){
            return "mrrrrrr<br>";
        }
        public function come($comida){
            if ($comida == "pescado") {
            return "Hmmm, gracias<br>";
            } else {
                return "Lo siento, yo solo como pescado";
            }
            
        }
        public function __toString()
        {
            return parent::__toString().", Gato de raza:".$this->raza.".<br>";
        }
        //Sobrescribo el metodo aseate de su clase padre "Animal".
        public function aseate()
        {
        return "No me gusta el agua, soy un gato...";    
        }
    }
?>