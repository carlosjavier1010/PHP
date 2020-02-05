<!doctype html>
<html lang="en">
  <head>
    <title>Blog</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <h1 style="margin: 0 auto;text-align: center;">BLOG</h1>
  <a href="../Controller/nuevoArticulo.php" style="margin: 0 auto;">Nuevo Articulo</a>
  <hr>
  <?php
  
    foreach($data['articulos'] as $articulos)  {
        $fecha = strtotime($articulos->getFecha());
        $fecha = date("d-m-Y",$fecha);
    ?>
    <div style="padding: 1%; border: 1px solid green;margin:1%;">
      <h3>TITULO: <?=$articulos->getTitulo()?></h3>
      
      <p>Fecha:<?= $fecha ?></p><br>
      <p style="border: 1px solid black">Contenido:<?=$articulos->getContenido()?></p>
      
      <a href="../Controller/borraArticulo.php?id=<?=$articulos->getId()?>">Borrar</a>
      <a href="../Controller/nuevoArticulo.php?id=<?=$articulos->getId()?>">Modificar</a>
      </div>
    <?php
    }
  ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>