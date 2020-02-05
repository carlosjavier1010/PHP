<?php

    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];

    $resultado = ($nota1+$nota2+$nota3)/3;
    $calificacion = "";

    echo "La media de las tres notas es:".$resultado;

    if ($resultado >=5 && $resultado<6) {
        echo "Su calificacion es de suficiente.";
    }else if ($resultado>=6 && $resultado<7) {
        echo "Su calificacion es de un bien.";
    }elseif ($resultado >=7 && $resultado <8) {
        echo "Su calificacion es de un notable.";
    }elseif ($resultado >=8 && $resultado <9) {
        echo "Su calificacion es de un notable alto.";
    }elseif ($resultado<5) {
        echo "Su calificacion es de un insuficiente.";
    }
    else{
        echo "Su calificacion es de un sobresaliente.";
    }



?>