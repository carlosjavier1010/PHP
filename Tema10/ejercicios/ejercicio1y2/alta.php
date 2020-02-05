<?php
    require_once 'conexion.php';
    $db = "banco";
    $conexion = conexion($db);

    // Comprueba si ya existe un cliente con el DNI introducido
    $consulta = $conexion->query('SELECT dni FROM usuarios WHERE dni="'.$_POST['dni'].'"');
if ($consulta->rowCount() > 0) {
?>
Ya existe un cliente con DNI <?= $_POST['dni'] ?><br>
Por favor, vuelva a la <a href="index.php">página de alta de cliente</a>.
<?php
} else {
    $insercion = "INSERT INTO usuarios (dni, nombre, telefono, direccion) VALUES ('$_POST[dni]','$_POST[nombre]',
    '$_POST[telefono]','$_POST[direccion]')";
//echo $insercion;
$conexion->exec($insercion);
header('Location:index.php?valido=valido');


}


?>