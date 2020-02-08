<?php 
	class Menu {
		private $titulos;
		private $enlaces;

		public function __construct() {
			$this->titulos=[];
			$this->enlaces=[];
		}

		function aniadirElementos($titulos, $enlaces) {
			$this->titulos[]=$titulos;
			$this->enlaces[]=$enlaces;
		}

		public function mostrarMenuVertical() {
			for ($i=0; $i < count($this->titulos); $i++) {  ?>
				<a href="<?php echo $this->enlaces[$i]; ?>"><?php echo $this->titulos[$i]; ?></a><br>
			<?php 
			}
		}
		public function mostrarMenuOrizontal() {
			for ($i=0; $i < count($this->titulos); $i++) {  ?>
				<a href="<?php echo $this->enlaces[$i]; ?>"><?php echo $this->titulos[$i]; ?></a> -
			<?php 
			}
		}
	}
 ?>