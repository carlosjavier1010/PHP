<?php
    if (!isset($_SESSION['figura'])) {
        $_SESSION['figura'] = 0;
     }
     if (!isset($_SESSION['tiradasTotales'])) {
        $_SESSION['tiradasTotales'] = 0;
     }

    class DadoPoker{

        private $cara;
        private $imagen;
        public function __construct($cara=null)
        {
            $this->cara = $cara;
        }
        
        public function tira(){
            $azar = rand(0,5);
            self::setTiradasTotales(1);
            switch ($azar) {
                case 0:
                    $this->cara = "As";
                    $this->imagen = "as";
                    self::setNombreFigura($this->cara); 
                    break;
                case 1:
                    $this->cara = "K";
                    $this->imagen = "k";
                    self::setNombreFigura($this->cara); 
                    break;
                case 2:
                    $this->cara = "Q";
                    $this->imagen = "q";
                    self::setNombreFigura($this->cara); 
                    break;
                case 3:
                    $this->cara = "J";
                    $this->imagen = "j";
                    self::setNombreFigura($this->cara); 
                    break;
                case 4:
                    $this->cara = "7";
                    $this->imagen = "7";
                    self::setNombreFigura($this->cara); 
                    break;
                case 5:
                    $this->cara = "8";
                    $this->imagen = "8";
                    self::setNombreFigura($this->cara); 
                    break;
            }
        }
        public static function setNombreFigura($figura){
            $_SESSION['figura'] = $figura;
        }
        public static function getNombreFigura(){
            return $_SESSION['figura'];
        }
        public static function getTiradasTotales()
        {
            return $_SESSION['tiradasTotales'];
        }
        public static function setTiradasTotales($tiradasTotales)
        {
            $_SESSION['tiradasTotales'] += $tiradasTotales;
        }
        public function getImagen()
        {
                return $this->imagen;
        }
        public function setImagen($imagen)
        {
                $this->imagen = $imagen;

               
        }
        public function getCara()
        {
                return $this->cara;
        }
        public function setCara($cara)
        {
                $this->cara = $cara;

                return $this;
        }
    }
?>