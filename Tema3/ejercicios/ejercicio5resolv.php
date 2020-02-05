<?php

    $a = $_POST['a'];
    $b = $_POST['b'];
    if ($a == 0) {
        echo "La ecuación es imposible.";
    } else {
        echo "Ecuación:".$a."x+".$b."=0<br>";
       echo "Resultado: x = ".(-$b/$a);
    }

?>