<?php
    require_once '../Model/Alumno.php';

    $data['alumnos'] = Alumno::getAlumnos();

    require_once '../View/listadoAlumnos.php';
?>