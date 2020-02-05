<!doctype html>
<html lang="en">

<head>
    <title>TIENDA VIRTUAL</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<?php
     require_once 'conexion.php';
     $db = "banco";
     $conexion = conexion($db);
     $dni;
     $nombre;
     $direccion;
     $telefono;
     if (isset($_GET['dni']) || isset($_POST['dni'])) {
         
     
     ?>
    <form action="modificar.php?dni=<?=$_GET['dni']?>&nombre=<?=$_GET['nombre']?>&direccion=<?=$_GET['direccion']?>&telefono=<?=$_GET['telefono']?>" method="post">
        MODIFICACION DE DATOS DEL CLIENTE:<?=$_GET['nombre']?>, con DNI:<?=$_GET['dni']?><br>
        <button type="button" class="btn btn-primary">DNI</button><input type="text" name="dni" id="dni">
        <button type="button" class="btn btn-primary">NOMBRE</button><input type="text" name="nombre" id="nombre">
        <button type="button" class="btn btn-primary">DIRECCION</button><input type="text" name="direccion" id="direccion">
        <button type="button" class="btn btn-primary">TELEFONO</button><input type="text" name="telefono" id="telefono">
        <input class="btn btn-success" type="submit" value="Modificar Cliente">
    </form>
     <?php
     }else {
        echo 'Ha ocurrido un error porfavor vuelva a la<a href="index.php">página principal</a>';
        echo 'El error seguramente se deba a que has dejado algún campo sin modificar.';
    }
     if (isset($_POST['dni']) && isset($_POST['nombre']) && isset($_POST['direccion']) && isset($_POST['telefono'])) {
         
        if ($_POST['dni']=="") {
            $dni = $_GET['dni'];
        }else {
            $dni = $_POST['dni'];
        }
        
        if ($_POST['nombre']=="") {
            $nombre = $_GET['nombre'];
        } else {
            $nombre = $_POST['nombre'];
        }
        if ($_POST['direccion']=="") {
            $direccion = $_GET['direccion'];
        } else {
            $direccion = $_POST['direccion'];
        }
        if ($_POST['telefono']=="") {
            $telefono = $_GET['telefono'];
        } else {
            $telefono = $_POST['telefono'];
        }
        
    $modificacion = $conexion->query( "UPDATE usuarios SET nombre=\"$nombre\",
    direccion=\"$direccion\", telefono=\"$telefono\" , dni=\"$dni\" WHERE
    dni=\"$_GET[dni]\""
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