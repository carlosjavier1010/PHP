<?php

    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];

    $multiplicacion = $numero1 * $numero2;
    $division = $numero1 / $numero2;
    $resta = $numero1 - $numero2;
    $suma = $numero1 + $numero2;

    echo "La suma de ".$numero1." + ".$numero2." es: ".$suma."<br>";
    echo "La resta de ".$numero1." - ".$numero2." es: ".$resta."<br>";
    echo "La multiplicacion de ".$numero1." * ".$numero2." es: ".$multiplicacion."<br>";
    echo "La division de ".$numero1." / ".$numero2." es: ".$division;
    
?>