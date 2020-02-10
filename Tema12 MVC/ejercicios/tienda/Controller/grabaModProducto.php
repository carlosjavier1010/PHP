<?php
require_once '../Model/Producto.php';
//Modificar producto de la BBDD
if (isset($_REQUEST['formmod'])) {
    Producto::modProducto($_REQUEST['codigo'],$_REQUEST['nombre'],$_REQUEST['precio'],$_REQUEST['stock']);
    header('Location:index.php');
    echo 'sdfdsfdsf';
}
?>