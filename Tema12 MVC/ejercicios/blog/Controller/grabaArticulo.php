<?php
    require_once '../Model/Articulo.php';
      // inserta el articulo en la base de datos
      $fecha = date("Y-m-d");
  $articulo = new Articulo("", $_POST['titulo'], $fecha, $_POST['contenido']);
  $articulo->insert();
  header("Location: index.php");
?>