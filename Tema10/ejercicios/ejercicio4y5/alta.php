<?php
    require_once 'conexion.php';
    $db = "gestisimal";
    $conexion = conexion($db);

    // Comprueba si ya existe un articulo con el codigo introducido
    $consulta = $conexion->query('SELECT codigo FROM articulos WHERE codigo="'.$_POST['codigo'].'"');
if ($consulta->rowCount() > 0) {
?>
Ya existe un articulo con ese codigo <?= $_POST['codigo'] ?><br>
Por favor, vuelva a la <a href="index.php">página de alta de articulos</a>.
<?php
} else {
    $insercion = "INSERT INTO articulos (codigo, descripcion, precompra, preventa,stock) VALUES ('$_POST[codigo]','$_POST[descripcion]',
    '$_POST[precioc]','$_POST[preciov]','$_POST[stock]')";
//echo $insercion;
$conexion->exec($insercion);
header('Location:index.php?valido=valido');


}


?>