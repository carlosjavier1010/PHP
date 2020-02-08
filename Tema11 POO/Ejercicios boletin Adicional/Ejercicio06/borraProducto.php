<?php 
require_once 'Producto.php';
try {
	    $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");
	} catch (Exception $e) {
	    echo ("Imposible acceder a la base de datos");
	    die("Error: " . $e->getMessage());
	}
$borrado = "DELETE FROM productos WHERE codigo=\"".$_POST['prod']."\"";
$conexion->exec($borrado);
header("Location: Carrito.php");