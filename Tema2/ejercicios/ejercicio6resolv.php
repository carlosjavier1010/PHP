<?php

    $base = $_POST['base'];
    $altura = $_POST['altura'];

    $resultado = $base * $altura;
    $resultado = $resultado / 2;

    echo "El área de este triangulo es: ".$resultado." m2.";

?>