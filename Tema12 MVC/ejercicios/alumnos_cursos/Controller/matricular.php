<?php
    require_once '../Model/AlumnoAsignatura.php';
    if ($_REQUEST['matricula'] && $_REQUEST['codigo']) {
        $matricula = new AlumnoAsignatura($_REQUEST['matricula'],$_REQUEST['codigo']);
        $matricula->insert();
        header('Location:'.getenv("HTTP_REFERER"));
    }
?>