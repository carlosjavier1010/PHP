<?php
require_once '../Model/Asignatura.php';
$asignatura = new Asignatura(0,$_REQUEST['nombre']);
$asignatura->insert();
header('Location:../Controller/listadoAsignaturas.php');
?>