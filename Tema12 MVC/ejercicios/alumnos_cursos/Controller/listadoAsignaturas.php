<?php

    require_once '../Model/Asignatura.php';
    $data['asignaturas'] = Asignatura::getAsignaturas();
    //var_dump($data['asignaturas']);
    require_once '../View/listadoAsignaturas.php';
?>