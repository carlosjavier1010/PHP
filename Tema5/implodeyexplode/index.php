<?php

    // Vamos a usar explode para unir toda la cadena de la variable twitter pero sin la coma y almacenarla en un array cada elemente, es decir, supercodigo, en otra posiicon españa etc.. 
    $twitter = "#supercodigo,#españa,#php";
    $datos = explode(',',$twitter);

    foreach ($datos as $variable) {
        echo $variable."<br>";
    }
    
    // Vamos a usar implode para convertir el array anterior de nuevo en una cadena de texto separado por la coma igualmente que al principio.
    
    $datosdos = implode(',',$datos);

    echo $datosdos;
?>