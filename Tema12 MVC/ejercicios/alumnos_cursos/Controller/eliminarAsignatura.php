<?php
    require_once '../Model/Asignatura.php';
    require_once '../Model/AlumnoAsignatura.php';
    //importante borrar antes los alumnos con dicha asignatura en la tabla alumnos-asignatura y despues borrar la asignatura para que luego no de fallo
    if (isset($_REQUEST['codigo'])) {
        $asignaturaDelete = new Asignatura($_REQUEST['codigo'],"");
        $asignatura = new AlumnoAsignatura("delete",$_REQUEST['codigo']);
        $asignatura->deleteAsignatura();
        $asignaturaDelete->delete();
        header('Location:'.getenv("HTTP_REFERER"));
    }
?>