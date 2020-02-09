<?php
require_once '../Model/Producto.php';
$time = time() + (60 * 60);
$carrito = unserialize($_COOKIE['carrito']); 
 //Cargar al carro nuevo producto añadido al carrito.
 if (isset($_REQUEST['quitarUnidad'])) {
       
   
    foreach ($carrito as $key => $value) {
        //echo $value['codigo']."<br>";
        //echo $_REQUEST['codigo']."<br>";
        if ($value['codigo'] == $_REQUEST['quitarUnidad']) {
            //echo $value['cantidad']."<br>";
            if ($value['cantidad']>0) {
                $carrito[$key]['cantidad']--;
            }
            
       
        }
    }
    
    

}
setcookie('carrito',serialize($carrito),$time);
header('Location:../Controller/index.php');
?>