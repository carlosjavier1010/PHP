<?php

    require_once '../Model/AlumnoAsignatura.php';
    require_once '../Model/Alumno.php';
    
    $data['alumnos'] = AlumnoAsignatura::AlumnosByAsignatura($_REQUEST['codigo']);
    //var_dump($data['asignaturas']);
    require_once '../View/listadoAlumnosAsignatura.php';
?>