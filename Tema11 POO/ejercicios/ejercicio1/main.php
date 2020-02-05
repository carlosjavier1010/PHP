<?php
    require_once 'Perro.php';
    require_once 'Gato.php';
    require_once 'Canario.php';

    $perro1 = new Perro("Macho","Pitbull");
    //var_dump($perro1);
    $gato1 = new Gato("Hembra","Siamés");
    $canario1 = new Canario("Macho","andaluz");
    echo $perro1->ladra();
    echo $perro1->lamer();
    echo $gato1->maulla();
    echo $canario1->canta();
?>