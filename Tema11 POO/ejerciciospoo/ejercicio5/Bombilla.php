<?php
if (!isset($_SESSION['general'])) {
    $_SESSION['general'] = true;
 }
 if (!isset($_SESSION['potenciaTotal'])) {
    $_SESSION['potenciaTotal'] = 0;
 }
    class Bombilla{
        private $estado;
        private $potenciaConsumida;
        private $ubicacion;
        
        public function __construct($potenciaConsumida,$ubicacion)
        {
            $this->estado = false;
            $this->potenciaConsumida = $potenciaConsumida;
            $_SESSION['potenciaTotal']+=$potenciaConsumida;
            $this->ubicacion = $ubicacion;
        }

        public function isEncendida(){
            if ($this->estado) {
                return true;
            }else {
                return false;
            }
        }

        public function getEstado()
        {
                return $this->estado;
        }

        public function setEstado($estado)
        {       
                
                if ($this->estado==false && $estado==true) {
                    $_SESSION['potenciaTotal']+=$this->potenciaConsumida;
                } else if($this->estado==true && $estado==false) {
                    $_SESSION['potenciaTotal']-=$this->potenciaConsumida;
                }
                $this->estado = $estado;
        }

        public function getPotenciaConsumida()
        {
                return $this->potenciaConsumida;
        }

        public function setPotenciaConsumida($potenciaConsumida)
        {       
                $_SESSION['potenciaTotal'] += $this->potenciaConsumida-$potenciaConsumida;
                $this->potenciaConsumida = $potenciaConsumida;

        }

        public function getUbicacion()
        {
                return $this->ubicacion;
        }

        public function setUbicacion($ubicacion)
        {
                $this->ubicacion = $ubicacion;

        }
        public static function getGeneral()
        {
                return $_SESSION['general'];
        }
        public static function setGeneral($general)
        {
                $_SESSION['general'] = $general;
        }
        public static function getPotenciaTotal()
        {
                return $_SESSION['potenciaTotal'];
        }
        public static function setPotenciaTotal($total)
        {
                $_SESSION['potenciaTotal'] = $total;
        }
    }
        
     

?>