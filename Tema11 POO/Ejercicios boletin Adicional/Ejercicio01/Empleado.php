<?php 
	/**
	 * 
	 */
	class Empleado {
		private $nombre;
		private $sueldo;
		
		function __construct($nombre="", $sueldo=0) {
			$this->nombre=$nombre;
			$this->sueldo=$sueldo;
		}

		public function asigna($nombre, $sueldo) {
			if ($this->nombre==$nombre) {
				$this->sueldo = $sueldo;
			}
		}
		
		public function verSiPagaImpuestos() {
			echo $this->nombre." cobra ";
			if ($this->sueldo>3000) {
				echo $this->sueldo." y paga impuestos.";
			} else {
				echo $this->sueldo." y NO paga impuestos.";
			}
		}
	}
 ?>