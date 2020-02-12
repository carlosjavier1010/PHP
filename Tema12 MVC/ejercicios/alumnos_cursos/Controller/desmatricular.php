<?php
    require_once '../Model/AlumnoAsignatura.php';
    if ($_REQUEST['matricula'] && $_REQUEST['codigo']) {
        $desmatricula = new AlumnoAsignatura($_REQUEST['matricula'],$_REQUEST['codigo']);
        $desmatricula->delete();
        header('Location:'.getenv("HTTP_REFERER"));
    }
?>