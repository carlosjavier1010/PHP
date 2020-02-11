<?php
    require_once '../Model/Producto.php';
    //Borrar producto de la BBDD
    if (isset($_REQUEST['borrado'])) {
        $producto = new Producto($_REQUEST['codigo'],null,null,null);
        $producto->delete();
        header('Location:index.php');
    }
?>