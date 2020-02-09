<!doctype html>
<html lang="en">
  <head>
    <title>EJERCICIO 6</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
   
<?php

    require_once 'Producto.php';
    $time = time() + (60 * 60);

    if (isset($_REQUEST['maximo'])) {
        echo '<script>alert("No puedes añadir mas unidades de este producto porque se ha alcando su maximo en stock");</script>';
    }
        
        
    $productos = Producto::getProductos();
    $inicio = 0;
    //Mostrar listado de productos con su información y su boton de comprar
    ?>  
    <div class="container-fluid">
    <h1>TIENDA</h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <td>#</td>
                <td>CODIGO</td>
                <td>NOMBRE</td>
                <td>PRECIO</td>
                <td>STOCK</td>
            </tr>
        </thead>
        <tbody>
            
    <?php
    //MUESTRO TODOS LOS PRODUCTOS
    foreach ($productos as $key => $value) {
        
    
    ?>
         <tr>
         <th scope="row"><?=$inicio?>
         <td><?= $value->getCodigo()?></td>
         <td><?= $value->getNombre()?></td>
         <td><?= $value->getPrecio()?>€</td>
         <td><?= $value->getStock()?></td>
         <td><a href="index.php?codigo=<?=$value->getCodigo()?>&borrado=true"><input type="button" class="btn btn-danger" value="Eliminar"></a></td>
         <td><a href="index.php?codigo=<?=$value->getCodigo()?>&nombre=<?=$value->getNombre()?>&precio=<?=$value->getPrecio()?>&stock=<?=$value->getStock()?>&accion=modificar"><input type="button" class="btn btn-info" value="Modificar"></a></td>                                        
         <td><a href="index.php?codigo=<?=$value->getCodigo()?>&nombre=<?=$value->getNombre()?>&precio=<?=$value->getPrecio()?>&stock=<?=$value->getStock()?>&accion=adcarro"><input type="button" class="btn btn-success" value="Añadir al Carrito"></a></td>                                        
        </tr>
   <?php 
   $inicio++;
  
   }
   ?>
    </tbody>
    </table>
    </div>
   <?php
    if (!isset($_COOKIE['carrito'])) {
        $carrito = array();
    } else {
        $carrito = unserialize($_COOKIE['carrito']);
    }
    
    //Insertar producto en la BBDD
    if (isset($_REQUEST['form'])) {
        $producto = new Producto("",$_REQUEST['nombre'],$_REQUEST['precio'],$_REQUEST['stock']);
        Producto::setProductos($producto);
        header('Location:index.php');
    }

    //Borrar producto de la BBDD
    if (isset($_REQUEST['borrado'])) {
        Producto::delete($_REQUEST['codigo']);
        header('Location:index.php');
    }
    //Formulario para modificar producto de la BBDD
    if (isset($_REQUEST['accion']) && $_REQUEST['accion'] == "modificar") {
        ?>
        <form action="index.php" method="post">
            <input type="hidden" name="formmod">
            <input type="hidden" name="codigo" value="<?= $_REQUEST['codigo'] ?>">
            <label for="moscod"></label>
            <input type="hidden" name="moscod" id="moscod">Modificar el producto con codigo:<strong><?= $_REQUEST['codigo'] ?></strong>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" step="0.01">
            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock">
            <input type="submit" value="Modificar" class="btn btn-info">
        </form>
        <?php
    }
    //Modificar producto de la BBDD
    if (isset($_REQUEST['formmod'])) {
        Producto::modProducto($_REQUEST['codigo'],$_REQUEST['nombre'],$_REQUEST['precio'],$_REQUEST['stock']);
        header('Location:index.php');
    }

    //Finalizar compra

    if (isset($_REQUEST['cesta'])) {
        foreach ($carrito as $key => $value) {
            $compra = new Producto($value['codigo'],$value['nombre'],$value['precio'],$value['stock']);
            $compra = $compra->vender($compra->getStock(),$value['cantidad']);
            var_dump($compra);
            unset($carrito[$key]);
            
        }
        header('Location:index.php');
    }
    
    //Mensaje de no se puede añadir producto al carro porque no tiene stock
    if (isset($_REQUEST['sinstock'])) {
        echo '<script>alert("No se puede añadir unidades de este producto al carrito, ya que no tenemos stock.");</script>';
    }
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
                        header('Location:index.php?maximo=true');
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
                header('Location:index.php');
            } else {
                header('Location:index.php?sinstock');
            }
            
           
        } 
    }

    //Mostrar Carrito de la compra con cookie
    ?>
    <div class="container-fluid">
    <h1>CARRITO DE LA COMPRA</h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <td>#</td>
                <td>CODIGO</td>
                <td>NOMBRE</td>
                <td>PRECIO</td>
                <td>CANTIDAD</td>
            </tr>
        </thead>
        <tbody>
            
    <?php
    $inicio = 0;
    //var_dump($carrito);
    foreach ($carrito as $key => $value) {
        
    
    ?>
         <tr>
         <th scope="row"><?=$inicio?>
         <td><?= $value['codigo']?></td>
         <td><?= $value['nombre']?></td>
         <td><?= $value['precio']?></td>
         <td><?= $value['cantidad']?></td>
         <td><a href="index.php?quitarUnidad=si"><input type="button" value="Quitar cantidad de este producto" class="btn btn-danger"></a></td>
         </tr>
   <?php 
   $inicio++;
   }
   ?>


    <td><a href="index.php?cesta=vaciar"><input type="button" value="Finalizar Compra" class="btn btn-success justify-content-end" ></td></a>
        
    </tbody>
    </table>
    
    </div>

    <?php

    setcookie('carrito',serialize($carrito),$time);

?>
    <form action="index.php" method="post">
        <input type="hidden" name="form">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01">
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock">
        <input type="submit" value="Añadir producto" class="btn btn-success">
    </form>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>