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
<h1>PRODUCTOS</h1>
<table class="table table-dark">
        <thead>
            <tr>
                <td>ID</td>
                <td>Descripcion</td>
                <td>Precio</td>
                <td>Imagen</td>
            </tr>
        </thead>
        <tbody>
    <?php
    $time = time() + (60 * 60);
    $productosCarro = array();
    if (isset($_COOKIE['carrito'])) {
        $productosCarro = unserialize($_COOKIE['carrito']);
    }

    
    require_once 'conexion.php';
    $db = "tienda";
    $conexion = conexion($db);
    $consulta = $conexion->query('SELECT id,descripcion,precio,imagen from productos');
    $totalCarro = 0;
    while ($productos = $consulta->fetchObject()) {
          
        ?>
        <tr>
            <th scope="row"><?= $productos->id ?></th>
            <td><?= $productos->descripcion ?></td>
            <td><?= $productos->precio ?></td>
            <td><img src="<?=$productos->imagen?>.jpg"></td>
            
            <td><form action="index.php" method="post">
            <input type="hidden" name="id" value="<?=$productos->id?>">
            <input type="hidden" name="descripcion" value="<?=$productos->descripcion?>">
            <input type="hidden" name="precio" value="<?=$productos->precio?>">
            <input type="hidden" name="imagen" value="<?=$productos->imagen?>">
            <input type="submit" class="btn btn-success" value="Comprar">
            </form>
            </td>
        </tr>
    <?php
        
    
    }
    
    ?>
</tbody>
</table>

    <?php
    echo "<h1>CARRITO</h1>";
    
    //var_dump(array_key_exists($_GET['id'],$productosCarro));
    if (isset($_GET['id']) && isset($_GET['eliminar'])) {
        unset($productosCarro[$_GET['id']]);
    }
    if (isset($_REQUEST['id'])) {
        if (!array_key_exists($_REQUEST['id'],$productosCarro) && !isset($_GET['eliminar'])) {
            $productosCarro[$_REQUEST['id']]['descripcion'] = $_REQUEST['descripcion'];
            $productosCarro[$_REQUEST['id']]['precio'] = $_REQUEST['precio'];
            $productosCarro[$_REQUEST['id']]['imagen'] = $_REQUEST['imagen'];
            $productosCarro[$_REQUEST['id']]['cantidad'] = 1;
        }elseif(array_key_exists($_REQUEST['id'],$productosCarro) && !isset($_GET['eliminar'])) {
            $productosCarro[$_REQUEST['id']]['cantidad']++;
            
        }
    }
    
    echo '<table class="table table-dark">
    <thead>
        <tr>
            <td>ID</td>
            <td>Descripcion</td>
            <td>Precio</td>
            <td>Imagen</td>
            <td>Cantidad</td>
        </tr>
    </thead>
    <tbody>';
    $total = count($productosCarro);
    if ($total > 0) {
        foreach ($productosCarro as $key => $value) {
            $totalCarro+=$value['precio']*$value['cantidad'];
            ?>
            <tr>
                 <th scope="row"><?= $key ?></th>
                 <td><?= $value['descripcion'] ?></td>
                 <td><?= $value['precio'] ?></td>
                 <td><?= $value['imagen'] ?></td>
                 <td><?= $value['cantidad'] ?></td>
                 <td><a href="index.php?id=<?=$key?>&eliminar=true"><input type="button" class="btn btn-danger" value="Eliminar"></a></td>
            </tr>
            <?php
         }
         echo '<h1>Total:'.$totalCarro.'€</h1>';
    }
    
    ?>
    </tbody>
</table>
    <?php
    setcookie('carrito',serialize($productosCarro),$time);
    ?>
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>