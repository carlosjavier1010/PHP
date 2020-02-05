<?php

    $radio = $_POST['radio'];
    $radiop = $_POST['radio'];
    $altura = $_POST['altura'];
    define("PI", 3.14159);

    $radio = $radio * $radio;
    $resultado = (PI * $radio) * $altura;
    
    $resultado = $resultado / 3;

    echo "Radio introducido:".$radiop." // Altura introducida: ".$altura."<br>";
    echo "Volumen del cono: ".$resultado." m2.";


?>