<?php 
	class Cubo {
		private $capacidad;
		private $contenido;

		function __construct($capacidad, $contenido) {
            $this->capacidad=$capacidad;
    		if ($capacidad>=$contenido) {
    			$this->contenido=$contenido;
        	}else{
    			$this->contenido=$capacidad;
        	}
		}


    public function getCapacidad() {
        return $this->capacidad;
    }
    public function getContenido() {
        return $this->contenido;
    }
    public function setCapacidad($capacidad) {
        $this->capacidad = $capacidad;
    }
    public function setContenido($contenido) {
    	if ($this->capacidad>=$contenido) {
            $this->contenido = $contenido;
    	}else{
            $this->contenido=$capacidad;
        }
    }

    function verter($otro) {
    	$resto=$this->capacidad-$this->contenido;
    	if ($resto>=$otro->contenido) {
    		$this->contenido+=$otro->getContenido();
    		$otro->setContenido(0);
    	} else {
    		$this->contenido=$this->capacidad;
    		$otro->setContenido(($otro->getContenido()-$resto));
    	}
    }

    function __toString() {
    	return "Capacidad: ".$this->capacidad." Contenido:".$this->contenido;
    }
  }
 ?>