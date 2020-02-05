<?php
    require_once 'Cubo.php';

    $cubo1 = new Cubo(20,10);
    $cubo2 = new Cubo(40,20);
    echo 'Cubo1';
    $cubo1->__toString();
    echo 'Cubo2';
    $cubo2->__toString();
    $cubo2->verter($cubo1);
    echo '<h1>Vierto el cubo2 en el cubo1</h1>';
    echo 'Cubo1';
    $cubo1->__toString();
    echo 'Cubo2';
    $cubo2->__toString();
    $cubo2->verter($cubo1);
    echo '<h1>Intento verter el cubo2 en el cubo1, PERO NO DEJA PORKE ES MAS GRANDE Y YA NO CABE NADA</h1>';
    echo 'Cubo1';
    $cubo1->__toString();
    echo 'Cubo2';
    $cubo2->__toString();
    
    echo '<h1>Vierto el cubo1 en el cubo2</h1>';
    $cubo1->verter($cubo2);
    echo 'Cubo1';
    $cubo1->__toString();
    echo 'Cubo2';
    $cubo2->__toString();

    echo '<h1>Vierto DE NUEVO EL CUBO 2 EN EL CUBO 1</h1>';
    $cubo2->verter($cubo1);
    echo 'Cubo1';
    $cubo1->__toString();
    echo 'Cubo2';
    $cubo2->__toString();
?>