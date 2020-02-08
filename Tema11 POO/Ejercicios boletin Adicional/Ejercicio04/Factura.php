<?php 
	class Factura {
		private static $IVA=0.21;

		public static function getIVA() {
			return Factura::$IVA;
		}
		public static function setIVA($iva) {
			Factura::$IVA=$iva;
		}

		private $importeBase;
		private $fecha;
		private $estaPagada;
		private $productos;

		function __construct($fecha) {
			$this->importeBase=0;
			$this->fecha=$fecha;
			$this->estaPagada=false;
			$this->productos=[];
		}

    public function getImporteBase() {
      return $this->importeBase;
    }
    public function getFecha() {
      return $this->fecha;
    }
    public function getEstaPagada() {
      return $this->estaPagada;
    }
    public function getProductos() {
      return $this->productos;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function setEstaPagada($estaPagada) {
        $this->estaPagada = $estaPagada;
    }


    public function aniadeProducto($nombre, $precio, $cantidad) {
    	$this->productos[]=[$nombre, $precio, $cantidad];
    	$this->importeBase+=$precio*$cantidad;
    }

    public function imprimirFactura() { ?>
			<table>
				<tr>
					<th colspan="4">Factura con fecha: <?php echo $this->fecha; ?></th>
				</tr>
				<tr>
					<th>Producto</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Total</th>
				</tr>
				<?php foreach ($this->productos as $producto) { ?>
					<tr>
						<td><?php echo $producto[0] ?></td>
						<td><?php echo $producto[1] ?>€</td>
						<td align="center"><?php echo $producto[2] ?></td>
						<td align="right"><?php echo ($producto[2]*$producto[1]) ?>€</td>
					</tr>
				<?php } ?>
				<tr>
					<td colspan="2"></td>
					<td>Importe base: </td>
					<td align="right"><?php echo $this->importeBase ?>€</td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td>Total (+IVA): </td>
					<td align="right"><?php echo ($this->importeBase*(1+Factura::getIVA())) ?>€</td>
				</tr>
				<tr>
					<td colspan="4">
						<?php if ($this->estaPagada): ?>
							<h2 align="right"><font color="green">PAGADA</font></h2>
						<?php else: ?>
							<h2 align="right"><font color="red">PENDIENTE DE PAGO</font></h2>
						<?php endif ?>
					</td>
				</tr>
			</table>
    <?php }
	}
 ?>