<?php
require_once '../Model/Producto.php';
$carrito = unserialize($_COOKIE['carrito']); 
 //Cargar al carro nuevo producto añadido al carrito.
 if (isset($_REQUEST['accion']) && $_REQUEST['accion'] == "adcarro") {
       
    
    $encontrado = false;
    $maximo = false;
    foreach ($carrito as $key => $value) {
        //echo $value['codigo']."<br>";
        //echo $_REQUEST['codigo']."<br>";
        if ($value['codigo'] == $_REQUEST['codigo']) {
            //echo $value['cantidad']."<br>";
            $comprobar = new Producto($value['codigo'],$value['nombre'],$value['precio'],$value['stock']);
            $cod = $comprobar->getCodigo();
            $comprobar = $comprobar->getProducto($cod);
            
            if ($comprobar) {
                $comprobar = $comprobar->getStock();
                var_dump($_REQUEST['stock']);
                if ($comprobar - $value['cantidad'] - 1 >= 0 ) {
                    if ($_REQUEST['stock'] != 0) {
                        var_dump($_REQUEST['stock']);
                        $carrito[$key]['cantidad']++;
                    }
                    
                }else {
                    header('Location:../Controller/index.php?maximo=true');
                    $maximo = true;
                }
            }
            
            //echo $value['cantidad']."<br>";
            $encontrado = true;
        }
    }
    
    if(!$encontrado && $_REQUEST['stock'] != 0) {
            
        $codigoCarro = $_REQUEST['codigo'];
        $nombreCarro = $_REQUEST['nombre'];
        $precioCarro = $_REQUEST['precio'];
        $stockCarro = $_REQUEST['stock'];
        $carrito[] = array(
            'codigo' => $codigoCarro,
            'nombre' => $nombreCarro,
            'precio' => $precioCarro,
            'cantidad' => 1,
            'stock' => $stockCarro  
        );
            }

    if (!$maximo || $_REQUEST['stock']==0) {
        if ($_REQUEST['stock'] != 0) {
            header('Location:../Controller/index.php');
        } else {
            header('Location:../Controller/index.php?sinstock');
        }
        
       
    } 
    setcookie('carrito',serialize($carrito),$time);

}
?>