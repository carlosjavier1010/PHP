<?php

    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];

    $resultado = ($nota1+$nota2+$nota3)/3;

    echo "La media de las tres notas es:".$resultado;


?>