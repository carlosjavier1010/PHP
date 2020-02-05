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
    if (isset($_GET['paginado'])) {
        $inicio = $_GET['paginado'];//pagina 1 o pagina2 o pagina 3,etc...
        $fin = $inicio*7;//si es la pagina 1, pues empieza desde el primer registro hasta 7, si es pagina 2, pues hasta 14..
        $inicio = $fin -7;//el inicio si es la pagina uno empezara en el 0, si es la pagina 2, pues empieza en el 7,etc..
    }else {
        $inicio = 0;
        $fin = 7;
    }
    //cuento los registros totales
    $totalRegistros = 0;
    $consulta2 = $conexion->query('SELECT dni,nombre,telefono,direccion from usuarios');
    while($cliente = $consulta2->fetchObject()){
        $totalRegistros++;
    }
    
    // Listado de todos los usuarios paginado desde inicio hasta fin segun pagina y de cada 7 registros
    //Dejar claro que el limit lo que hace es empezar en el registro inicio y devolver los siguientes X registros despues de iniicio
    //En este caso seria desde inicio nos devuelve los siguientes 7 registros a partir de inicio.
    $consulta = $conexion->query('SELECT dni,nombre,telefono,direccion from usuarios LIMIT '.$inicio.','.$fin.'');
    ?>
    <table class="table table-dark">
        <thead>
            <tr>
                <td>#</td>
                <td>DNI</td>
                <td>NOMBRE</td>
                <td>DIRECCION</td>
                <td>TELEFONO</td>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($cliente = $consulta->fetchObject()) {
                
                    
                
                ?>
                <tr>
                    <th scope="row"><?= $inicio ?></th>
                    <td><?= $cliente->dni ?></td>
                    <td><?= $cliente->nombre ?></td>
                    <td><?= $cliente->direccion ?></td>
                    <td><?= $cliente->telefono ?></td>
                    
                    <td><a href="borrado.php?dni=<?=$cliente->dni?>"><input type="button" class="btn btn-danger" value="Eliminar"></a></td>
                    <td><a href="modificar.php?dni=<?=$cliente->dni?>&nombre=<?=$cliente->nombre?>&direccion=<?=$cliente->direccion?>&telefono=<?=$cliente->telefono?>"><input type="button" class="btn btn-warning" value="Modificar"></a></td>
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
            <strong>Dado de alta correctamente.</strong>
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
    /* Esto es para el borrado del ejercicio1, se ha modificado para realizar la confirmacion del ejercicio2, por lo que utilizo borrado.php
    if (isset($_GET['eliminar'])) {
        $eliminar = $conexion->query('DELETE FROM usuarios WHERE dni="'.$_GET['eliminar'].'"');
        $conexion->exec($eliminar);
        header('Location:index.php');
    }
    */
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
    <form action="alta.php" method="post">
        <button type="button" class="btn btn-primary">DNI</button><input type="text" name="dni" id="dni">
        <button type="button" class="btn btn-primary">NOMBRE</button><input type="text" name="nombre" id="nombre">
        <button type="button" class="btn btn-primary">DIRECCION</button><input type="text" name="direccion" id="direccion">
        <button type="button" class="btn btn-primary">TELEFONO</button><input type="text" name="telefono" id="telefono">
        <input class="btn btn-success" type="submit" value="Nuevo Cliente">
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>