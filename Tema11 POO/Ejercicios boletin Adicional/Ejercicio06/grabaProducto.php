<?php 
require_once 'Producto.php';

  // sube la imagen al servidor
  move_uploaded_file($_FILES["imagen"]["tmp_name"], "estilo/" . $_FILES["imagen"]["name"]);

  // inserta la oferta en la base de datos
  $producto = new Producto(null, $_POST['nombre'], $_POST['precio'], $_FILES["imagen"]["name"]);

  try {
    $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");
} catch (Exception $e) {
    echo ("Imposible acceder a la base de datos");
    die("Error: " . $e->getMessage());
}
$insercion = "INSERT INTO productos (nombre, precio, imagen) VALUES (\"".$producto->getNombre()."\", \"".$producto->getPrecio()."\", \"".$producto->getImagen()."\")";
$conexion->exec($insercion);
header("Location: Carrito.php");