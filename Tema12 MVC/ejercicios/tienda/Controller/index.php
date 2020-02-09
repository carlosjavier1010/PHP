<?php
    require_once '../Model/Producto.php';
    $data['productos'] = Producto::getProductos();
    require_once '../View/listado.php';
    
?>