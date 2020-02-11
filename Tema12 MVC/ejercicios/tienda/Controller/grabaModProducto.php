<?php
require_once '../Model/Producto.php';
//Modificar producto de la BBDD
if (isset($_REQUEST['formmod'])) {
    $producto = new Producto($_REQUEST['codigo'],$_REQUEST['nombre'],$_REQUEST['precio'],$_REQUEST['stock']);
    $producto->update();
    header('Location:index.php');
    echo 'sdfdsfdsf';
}
?>