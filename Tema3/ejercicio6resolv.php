<?php

    define("G",9.81);
    $h = $_POST['altura'];
    $hform = 0.0;

    $hform = (2*$h)/G;
    $raiz = sqrt($hform);
    echo "El objeto que cae desde una altura de : ".$h." tardara en caer: ".$raiz."m/s al cuadrado.";
?>