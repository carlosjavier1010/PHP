<?php
require_once '../Model/Producto.php';
$carrito = unserialize($_COOKIE['carrito']); 
    if (isset($_REQUEST['cesta'])) {
        foreach ($carrito as $key => $value) {
            $compra = new Producto($value['codigo'],$value['nombre'],$value['precio'],$value['stock']);
            $compra = $compra->vender($compra->getStock(),$value['cantidad']);
            var_dump($compra);
            unset($carrito[$key]);
            
        }
        header('Location:../Controller/index.php');
    }
    setcookie('carrito',serialize($carrito),$time);
?>