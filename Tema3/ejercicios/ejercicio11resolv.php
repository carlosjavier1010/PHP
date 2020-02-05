<?php


    $minutos = 0;
    $segundos = 0;
    $hora = 0;

    $hora = $_POST['hora'];
    $minutos = $_POST['minutos'];

    $totalHorasSegundos = 86400;
    $horasegundos = ($hora*60)*60;
    $minutosegundos = $minutos*60;

    $sumatotalseg = $horasegundos + $minutosegundos;
    $calseg = $totalHorasSegundos - $sumatotalseg;

    echo "Esto es lo que queda en segundos para llegar a medianoche:".$calseg." segundos";
?>