<?php
    if (!$_SESSION['iva']) {
        $_SESSION['iva'] = 21;
    }
    class Factura{
        private $importeBase;
        private $fecha;
        private $estado;
        private $productos = array();
        
        public function __construct($estado)
        {
            $this->importeBase = 0;
            $this->fecha = date("d/m/Y");
            $this->productos=array();
            $this->estado = $estado;
        }
        
        public function añadeProductos($nombre,$precio,$cantidad){
            $this->productos[] = array('nombre'=>$nombre,'precio'=>$precio,'cantidad'=>$cantidad);
        }

        public function imprimeFactura(){
            echo '<h1>Factura:</h1>';
            
            foreach ($this->productos as $key => $value) {
               
            }
        }

        public function getImporteBase()
        {
                return $this->importeBase;
        }
    }
   
?>