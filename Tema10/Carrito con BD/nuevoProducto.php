<?php 
session_start() 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
if (isset($_POST['nombre'])) {
	try {
        $conexion = new PDO("mysql:host=localhost;dbname=tienda2;charset=utf8", "root", "Tikitacto12");
    } catch (Exception $e) {
        echo ("Imposible acceder a la base de datos");
        die("Error: " . $e->getMessage());
    }
    $consulta = $conexion->query("SELECT * FROM productos WHERE nombre='$_POST[nombre]'");
    if ($consulta->rowCount() == 0) {
        $inserta = "INSERT INTO productos (nombre, precio, descripcion) VALUES ('$_POST[nombre]','$_POST[precio]','$_POST[descripcion]')";
        $conexion->exec($inserta);
        $_SESSION['productos'][$_POST['nombre']]=[$_POST['precio'],$_POST['descripcion']];

    }
	//echo "name: ".$_FILES['imagen']['name'];
	//echo "tmp_name: ".$_FILES['imagen']['tmp_name'];
	$ruta="";
	$fichero_subido = $ruta.basename($_FILES['imagen']['name']);
	move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido);
}
 ?>
<form action="#" method="post" enctype="multipart/form-data">
	<h3>Producto: </h3><input type="text" name="nombre">
	<br><h3>Precio: </h3><input type="text" name="precio">
	<br><h3>Descripcion: </h3><textarea name="descripcion" rows="2" cols="50"></textarea>
	<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
	<br><br>IMAGEN: <input name="imagen" type="file" />
	<br><br><input type="submit" name="aceptar" value="Aceptar">
</form>
<h2><a href="Carrito.php">Cerrar</a></h2>
</body>
</html>