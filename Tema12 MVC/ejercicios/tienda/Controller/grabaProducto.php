<?php
require_once '../Model/Producto.php';
    if (isset($_REQUEST['form'])) {
        $producto = new Producto("",$_REQUEST['nombre'],$_REQUEST['precio'],$_REQUEST['stock']);
        $producto->insert();
        header('Location:index.php');
    }

?>