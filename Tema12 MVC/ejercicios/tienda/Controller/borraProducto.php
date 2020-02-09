<?php
    require_once '../Model/Producto.php';
    //Borrar producto de la BBDD
    if (isset($_REQUEST['borrado'])) {
        Producto::delete($_REQUEST['codigo']);
        header('Location:index.php');
    }
?>