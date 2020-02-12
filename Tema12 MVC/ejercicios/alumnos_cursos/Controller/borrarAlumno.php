<?php
    require_once '../Model/Alumno.php';
    require_once '../Model/AlumnoAsignatura.php';

    if (isset($_REQUEST['matricula'])) {
        $matricula = new Alumno($_REQUEST['matricula'],null,null,null);
        $matricula->delete();
        $asignatura = new AlumnoAsignatura($_REQUEST['matricula'],0);
        $asignatura->deleteAlumno();
        header('Location:'.getenv("HTTP_REFERER"));
    }
?>