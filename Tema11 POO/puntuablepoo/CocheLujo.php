<?php

    class CocheLujo extends Coche{
        private $suplemento;
        public function __construct($matricula,$modelo,$precio,$suplemento)
        {
            parent::__construct($matricula,$modelo,$precio);
            if ($precio > $_SESSION['precioCaro']) {
                $_SESSION['precioCaro'] = $precio;
                $_SESSION['modeloCaro'] = $modelo;
            }
            $this->suplemento = $suplemento;
        }

        public function getPrecio()
        {   
                //$total = $this->precio+$this->suplemento;
                return (parent::getPrecio()+$this->suplemento);
        }
        public function __toString()
        {
            return  '<tr>
            <td>'.parent::getMatricula().'</td>
            <td>'.parent::getModelo().'</td>
            <td>'.$this->getPrecio().'</td>
            <td>'.$this->suplemento.'</td>
            </tr>';
        }
    }
?>