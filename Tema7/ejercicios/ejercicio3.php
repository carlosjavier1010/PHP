<?php
    $frase = "Esto es una frase. Esta es la segunda frase.";
    
    $punto = strpos($frase,".");
    $fraseFinal = substr($frase,0,$punto+1);
    //echo $fraseFinal;
    //cojo la posicion del punto, extraigo de la cadena frase desde el inicio "0" hasta la posicion del punto+1, le sumo uno poque la ultima posicion no la incluye, es decir
    //si la posicion del punto es la 17, seria desde la 0 hasta la 16, por eso le sumo 1. en resumen: seria desde la 0 hasta la 17 no inclusive, no incluye el 17, entonces seria hasta el 16,
    //por tanto le sumo 1 y ya me coge el 17.

    //si quiero coger la segunda frase:
    $puntouno = strpos($frase,".");
    echo $puntouno."<br>";
    $punto = strpos($frase,".",$puntouno+1);
    echo $punto."<br>";
    $fraseFinal = substr($frase,$puntouno+1,$punto+1);
    echo $fraseFinal;
?>