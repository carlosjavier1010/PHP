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
    $db = "gestisimal";
    $conexion = conexion($db);
    
    if (isset($_GET['paginado'])) {
        $inicio = $_GET['paginado'];//pagina 1 o pagina2 o pagina 3,etc...
        $fin = $inicio*7;//si es la pagina 1, pues empieza desde el primer registro hasta 7, si es pagina 2, pues hasta 14..
        $inicio = $fin -7;//el inicio si es la pagina uno empezara en el 0, si es la pagina 2, pues empieza en el 7,etc..
    }else {
        $inicio = 0;
        $fin = 7;
    }
    $consulta = $conexion->query('SELECT codigo,descripcion,precompra,preventa,stock from articulos LIMIT '.$inicio.',7');
    $totalRegistros = 0;
    $accion = 0;
    $consulta2 = $conexion->query('SELECT codigo,descripcion,precompra,preventa,stock from articulos');
    while($cliente = $consulta2->fetchObject()){
        $totalRegistros++;
    }
    //ACCION DE ENTRADA Y SALIDA DE MERCANCIA
    if (isset($_GET['accion'])) {
        if ($_GET['accion']=="entrada") {
            $accion = $_GET['stock']+1;
            $modificacion = $conexion->query( "UPDATE articulos SET stock=\"$accion\" WHERE codigo=\"$_GET[codigo]\"");
             
        } else {
            if ($_GET['stock']-1 >= 0) {
                $accion = $_GET['stock']-1;
                $modificacion = $conexion->query( "UPDATE articulos SET stock=\"$accion\" WHERE codigo=\"$_GET[codigo]\"");
            }
           
        }
        $conexion->exec($modificacion);
        header('Location:index.php');   
    }
    ?>
    <h1>GESTISIMAL</h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <td>#</td>
                <td>CODIGO</td>
                <td>DESCRIPCION</td>
                <td>PRECIO COMPRA</td>
                <td>PRECIO VENTA</td>
                <td>STOCK</td>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($articulo = $consulta->fetchObject()) {
                               
                ?>
                <tr>
                    <th scope="row"><?= $inicio ?></th>
                    <td><?= $articulo->codigo ?></td>
                    <td><?= $articulo->descripcion ?></td>
                    <td><?= $articulo->precompra ?>€</td>
                    <td><?= $articulo->preventa ?>€</td>
                    <td><?= $articulo->stock ?></td>
                    <td><a href="borrado.php?codigo=<?=$articulo->codigo?>"><input type="button" class="btn btn-danger" value="Eliminar"></a></td>
                    <td><a href="modificar.php?codigo=<?=$articulo->codigo?>&descripcion=<?=$articulo->descripcion?>&precioc=<?=$articulo->precompra?>&preciov=<?=$articulo->preventa?>&stock=<?=$articulo->stock?>"><input type="button" class="btn btn-warning" value="Modificar"></a></td>
                    <td><a href="index.php?codigo=<?=$articulo->codigo?>&accion=entrada&stock=<?=$articulo->stock?>"><input type="button" class="btn btn-primary" value="Entrada"></a></td>
                    <td><a href="index.php?codigo=<?=$articulo->codigo?>&accion=salida&stock=<?=$articulo->stock?>"><input type="button" class="btn btn-primary" value="Salida"></a></td>
                </tr>
            <?php
                $inicio++;
            
            }
            
            ?>
        </tbody>
    </table>
    <?php  
    //compruebo si se ha dado de alta correctamente desde alta.php
    if (isset($_GET['valido'])) {
        ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Articulo dado de alta correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php
    }

    //Comprueba si se ha modificado correctamente desde modificar.php
    if (isset($_GET['modificacion'])) {
        ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Modificacion realizada correctamente..</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
         
        }
         //Compruebo que se haya borrado correctamente desde borrado.php
    if (isset($_GET['borrado'])=="true") {
        ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Accion de Borrado realizado correctamente..</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
    //Imprimo el paginado de 7 en 7
    $totalPaginas = $totalRegistros / 7;
     echo "Paginas:";
     for ($i=0; $i < $totalPaginas; $i++) { 
         echo '<a href="index.php?paginado='.($i+1).'"><button type="button" class="btn btn-primary">'.($i+1).'</button></a>';
     }
    ?>
    <div class="form-row">
        <div class="col">
    <form action="alta.php" method="post">
        <button type="button" class="btn btn-primary">CODIGO</button><input type="text" name="codigo" id="codigo">
        <button type="button" class="btn btn-primary">DESCRIPCION</button><input type="text" name="descripcion" id="descripcion">
        <button type="button" class="btn btn-primary">PRECIO COMPRA</button><input type="number" name="precioc" id="precioc" min="0" max="100000">
        <button type="button" class="btn btn-primary">PRECIO VENTA</button><input type="number" name="preciov" id="preciov" min="0" max="100000"><br><br>
        <button type="button" class="btn btn-primary">STOCK</button><input type="number" name="stock" id="stock" min="0" max="100000">
        <input class="btn btn-success" type="submit" value="Nuevo Articulo">
    </form>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
