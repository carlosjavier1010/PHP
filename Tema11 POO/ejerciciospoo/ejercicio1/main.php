<?php
    require_once 'Empleado.php';
    $empleado1 = new Empleado("carlos",3500);
    $empleado2 = new Empleado("Jose",2700);

    $empleado1->imprimir();
    $empleado2->imprimir();

    $empleado1->asigna("carlos modificado",3000);
    $empleado2->asigna("Jose modificado",3500);

    $empleado1->imprimir();
    $empleado2->imprimir();
?>