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
 if (!isset($_COOKIE['carrito'])) {
    $carrito = array();
} else {
    $carrito = unserialize($_COOKIE['carrito']);
}
 $time = time() + (60 * 60);

 if (isset($_REQUEST['maximo'])) {
     echo '<script>alert("No puedes añadir mas unidades de este producto porque se ha alcando su maximo en stock");</script>';
 }
 $inicio = 0;

      //**** */ Mensajes usuario //**** */
            //Mensaje de no se puede añadir producto al carro porque no tiene stock
    if (isset($_REQUEST['sinstock'])) {
        echo '<script>alert("No se puede añadir unidades de este producto al carrito, ya que no tenemos stock.");</script>';
    }

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
 foreach ( $data['productos'] as $value) {
     
 
 ?>
      <tr>
      <th scope="row"><?=$inicio?>
      <td><?= $value->getCodigo()?></td>
      <td><?= $value->getNombre()?></td>
      <td><?= $value->getPrecio()?>€</td>
      <td><?= $value->getStock()?></td>
      <td><a href="../Controller/borraProducto.php?codigo=<?=$value->getCodigo()?>&borrado=true"><input type="button" class="btn btn-danger" value="Eliminar"></a></td>
      <td><a href="../Controller/modProducto.php?codigo=<?=$value->getCodigo()?>&nombre=<?=$value->getNombre()?>&precio=<?=$value->getPrecio()?>&stock=<?=$value->getStock()?>&accion=modificar"><input type="button" class="btn btn-info" value="Modificar"></a></td>                                        
      <td><a href="../Controller/meteCarro.php?codigo=<?=$value->getCodigo()?>&nombre=<?=$value->getNombre()?>&precio=<?=$value->getPrecio()?>&stock=<?=$value->getStock()?>&accion=adcarro"><input type="button" class="btn btn-success" value="Añadir al Carrito"></a></td>                                        
     </tr>
<?php 
$inicio++;

}
?>
 </tbody>
 </table>
 </div>
<!-- //Mostrar Carrito de la compra con cookie -->
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
    var_dump($carrito);
    foreach ($carrito as $key => $value) {
        
    
    ?>
         <tr>
         <th scope="row"><?=$inicio?>
         <td><?= $value['codigo']?></td>
         <td><?= $value['nombre']?></td>
         <td><?= $value['precio']?></td>
         <td><?= $value['cantidad']?></td>
         <td><a href="../Controller/quitarUnidad.php?quitarUnidad=<?= $value['codigo'] ?>"><input type="button" value="Quitar cantidad de este producto" class="btn btn-danger"></a></td>
         </tr>
   <?php 
   $inicio++;
   }
   ?>


    <td><a href="../Controller/comprar.php?cesta=vaciar"><input type="button" value="Finalizar Compra" class="btn btn-success justify-content-end" ></td></a>
        
    </tbody>
    </table>
    
    </div>

    <?php

    setcookie('carrito',serialize($carrito),$time);

?>
    <a href="../Controller/nuevoProducto.php" style="margin: 0 auto;"><input type="button" value="Nuevo Producto" class="btn btn-success"></a>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>