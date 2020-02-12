<?php
    require_once '../Model/AlumnoAsignatura.php';
    require_once '../Model/Alumno.php';
    require_once '../Model/Asignatura.php';
    $data['alumno'] = Alumno::getAlumnoById($_REQUEST['matricula']);
    $data['asignaturas'] = AlumnoAsignatura::asignaturasByAlumno($_REQUEST['matricula']);
    //var_dump($data['asignaturas']);
    require_once '../View/listadoAsignaturasAlumno.php';
?>