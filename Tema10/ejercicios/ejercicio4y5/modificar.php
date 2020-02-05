<!doctype html>
<html lang="en">

<head>
    <title>GESTISIMAL</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<?php
     require_once 'conexion.php';
     $db = "gestisimal";
     $conexion = conexion($db);
     $codigo;
     $descripcion;
     $precioc;
     $preciov;
     $stock;
     if (isset($_GET['codigo']) || isset($_POST['codigo'])) {
         
     
     ?>
    <form action="modificar.php?codigo=<?=$_GET['codigo']?>&descripcion=<?=$_GET['descripcion']?>&precioc=<?=$_GET['precioc']?>&preciov=<?=$_GET['preciov']?>&stock=<?=$_GET['stock']?>" method="post">
        MODIFICACION DE DATOS DEL ARTICULO:<?=$_GET['descripcion']?>, con CODIGO:<?=$_GET['codigo']?><br>
        <button type="button" class="btn btn-primary">CODIGO</button><input type="text" name="codigo" id="codigo">
        <button type="button" class="btn btn-primary">DESCRIPCION</button><input type="text" name="descripcion" id="descripcion">
        <button type="button" class="btn btn-primary">PRECIO COMPRA</button><input type="text" name="precioc" id="precioc">
        <button type="button" class="btn btn-primary">PRECIOVENTA</button><input type="text" name="preciov" id="preciov">
        <button type="button" class="btn btn-primary">STOCK</button><input type="text" name="stock" id="stock">
        <input class="btn btn-success" type="submit" value="Modificar Articulo">
    </form>
     <?php
     }else {
        echo 'Ha ocurrido un error por favor vuelva a la<a href="index.php">página principal</a>';
    }
     if (isset($_POST['codigo']) && isset($_POST['descripcion']) && isset($_POST['precioc']) && isset($_POST['preciov']) && isset($_POST['stock'])) {
         
        if ($_POST['codigo']=="") {
            $codigo = $_GET['codigo'];
        }else {
            $codigo = $_POST['codigo'];
        }
        
        if ($_POST['descripcion']=="") {
            $descripcion = $_GET['descripcion'];
        } else {
            $descripcion = $_POST['descripcion'];
        }
        if ($_POST['precioc']=="") {
            $precioc = $_GET['precioc'];
        } else {
            $precioc = $_POST['precioc'];
        }
        if ($_POST['preciov']=="") {
            $preciov = $_GET['preciov'];
        } else {
            $preciov = $_POST['preciov'];
        }
        if ($_POST['stock']=="") {
            $stock = $_GET['stock'];
        } else {
            $stock = $_POST['stock'];
        }
        
    $modificacion = $conexion->query( "UPDATE articulos SET descripcion=\"$descripcion\",
    precompra=\"$precioc\", preventa=\"$preciov\" , codigo=\"$codigo\", stock=\"$stock\" WHERE
    codigo=\"$_GET[codigo]\""
    );
    $conexion->exec($modificacion);
    header('Location:index.php');
    }
?>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>