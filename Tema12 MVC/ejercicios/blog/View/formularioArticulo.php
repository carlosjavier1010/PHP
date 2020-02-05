<?php



  if (!isset($_REQUEST['id'])) {
    ?>
    <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <form action="../Controller/grabaArticulo.php"  enctype="multipart/form-data" method="POST">
      <h3>Título</h3>
      <input type="text" size="40" name="titulo">
      <br><h3>Contenido</h3>
      <textarea name="contenido" cols="60" rows="6">
      </textarea><hr>
      <input type="submit" value="Aceptar">
    </form>
  </body>
</html>
<?php
  }else {
    require_once '../Model/Articulo.php';
    $modificacion = Articulo::getArticulosById($_REQUEST['id']);

    ?>
    <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <form action="../Controller/grabaArticulo.php"  enctype="multipart/form-data" method="POST">
    <input type="hidden" name="modificacion">
    <input type="hidden" name="id" value="<?= $_REQUEST['id'] ?>">
      <h3>Título</h3>
      <input type="text" size="40" name="titulo" value="<?= $modificacion->getTitulo() ?>">
      <br><h3>Contenido</h3>
      <textarea name="contenido" cols="60" rows="6"><?= $modificacion->getContenido() ?>
      </textarea><hr>
      <input type="submit" value="Aceptar">
    </form>
  </body>
</html>
  <?php
  }
?>