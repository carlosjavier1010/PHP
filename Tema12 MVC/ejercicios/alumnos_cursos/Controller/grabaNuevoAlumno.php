<?php
    require_once '../Model/Alumno.php';

    if (isset($_REQUEST['matricula'])) {
        $matricula = new Alumno($_REQUEST['matricula'],$_REQUEST['nombre'],$_REQUEST['apellidos'],$_REQUEST['curso']);
        $matricula->insert();
       
    }
?>