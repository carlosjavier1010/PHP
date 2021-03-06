<?php
	class Zona {
		private $nombre;
		private $entradasTotales;
		private $entradasActuales;
		private $precioEntrada;

		public function __construct($nombre, $entradasTotales, $precioEntrada) {
			$this->nombre=$nombre;
			$this->entradasTotales = $entradasTotales;
			$this->entradasActuales = $entradasTotales;
			$this->precioEntrada = $precioEntrada;
		}

		public function getEntradasActuales() {
			return $this->entradasActuales;
		}
		public function getPrecioEntrada() {
			return $this->precioEntrada;
		}
		public function getNombre()
		{
			return $this->nombre;
		}

		public function venderEntradas($ventas) {
			if ($ventas <= $this->entradasActuales) {
				$this->entradasActuales -= $ventas;
				return true;
			} else {
				return false;
			}
		}
	}
 ?>