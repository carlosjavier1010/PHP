<?php
    
    if (!isset($_SESSION['modeloCaro'])) {
        $_SESSION['modeloCaro'] = 0;
     }
     if (!isset($_SESSION['precioCaro'])) {
        $_SESSION['precioCaro'] = 0;
     }

    class Coche{
        private $matricula;
        private $modelo;
        private $precio;

        public function __construct($matricula,$modelo,$precio)
        {
            $this->matricula = $matricula;
            $this->modelo = $modelo;
            $this->precio = $precio;
            if ($this->precio > $_SESSION['precioCaro']) {
                $_SESSION['precioCaro'] = $this->precio;
                $_SESSION['modeloCaro'] = $this->modelo;
            }

            

        }

        public function getMatricula()
        {
                return $this->matricula;
        }


        public function setMatricula($matricula)
        {
                $this->matricula = $matricula;

                return $this;
        }


        public function getModelo()
        {
                return $this->modelo;
        }
        public function setModelo($modelo)
        {
                $this->modelo = $modelo;

                return $this;
        }
        public function getPrecio()
        {
                return $this->precio;
        }
        public function setPrecio($precio)
        {
                $this->precio = $precio;

                return $this;
        }
        public static function getModeloCaro(){
            return $_SESSION['modeloCaro'];
        }
        public static function setModeloCaro($modeloCaro){
            $_SESSION['modeloCaro'] = $modeloCaro;
        }
        public static function getPrecioCaro(){
           return $_SESSION['precioCaro'];
        }
        public static function setPrecioCaro($precioCaro){
            $_SESSION['precioCaro'] = $precioCaro;
         }
        public function __toString()
        {
           
            return  '<tr>
            <td>'.$this->matricula.'</td>
            <td>'.$this->modelo.'</td>
            <td>'.$this->precio.'</td>
            <td>No procede</td>
            </tr>';
        }
        public static function masCaro(){
            return "El modelo mas caro :".Coche::getModeloCaro().". El precio mas caro:".Coche::getPrecioCaro();
        }
    }
?>