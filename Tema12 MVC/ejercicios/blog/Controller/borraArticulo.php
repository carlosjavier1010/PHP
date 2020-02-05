<?php
  require_once '../Model/Articulo.php';
  $articuloAux = new Articulo($_GET['id'],null,null,null);
  $articuloAux->delete();
  header("Location: index.php");