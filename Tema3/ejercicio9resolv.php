<?php

    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];

    $bcuad = pow($b,2);
    echo "La raiz cuadrada de b es:".$bcuad;
    $cuatro = 4 *$a;
    echo "<br>4 *".$a."(a)es:".$cuatro;
    $cuatro2 = 4*$c;
    echo "<br>4 *".$c."(c)es:".$cuatro2;
    $cuatro3 = $bcuad - $cuatro2;
    echo "<br>".$b."elevado a 2(".$bcuad.") menos (4*".$c."=".$cuatro2.") es:".$cuatro3;
    $raiz = sqrt($cuatro3);
    echo "<br>La raiz cuadrada del resultado anterior es:".$raiz;

    $x = (-$b+$raiz)/(2*$a);

    echo "<br>El resultado de x es:".$x;
?>