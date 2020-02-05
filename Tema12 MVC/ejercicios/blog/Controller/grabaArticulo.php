<?php
    require_once '../Model/Articulo.php';
      // inserta el articulo en la base de datos
 if (!isset($_REQUEST['modificacion'])) {
  $fecha = date("Y-m-d");
  $articulo = new Articulo("", $_POST['titulo'], $fecha, $_POST['contenido']);
  $articulo->insert();
  header("Location: index.php");
 }else{
  $fecha = date("Y-m-d");
  $articulo = new Articulo("", $_POST['titulo'], $fecha, $_POST['contenido']);
  Articulo::setArticulosById($_REQUEST['id'],$_REQUEST['titulo'],$fecha,$_REQUEST['contenido']);
  header("Location: index.php");
 }
?>