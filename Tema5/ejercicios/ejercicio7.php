<?php
    $numeros = [];
    $aux = [];

    for ($i=0; $i < 20; $i++) { 
    $num = rand(0,100);
    array_push($numeros,$num);
    }

    foreach ($numeros as $n) {
        if ($n%2==0) {
            array_push($aux,$n);
        }
    }
    foreach ($numeros as $nn) {
        if ($nn%2!=0) {
            array_push($aux,$nn);
        }
    }
    foreach ($aux as $nnn) {
        echo $nnn."<br>";
    }

?>