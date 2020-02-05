<?php

    $horas = $_POST['horas'];

    $extras = $horas - 40;
    $horas = 40;
    $horasN = $horas * 12;
    $horasE = $extras * 16;
    $horasTotal = $extras + $horas;
    $salarioTotal = $horasN + $horasE;
    echo "Has realizado un total de:".$horasTotal." horas en total esta semana."."<br>";
    echo "Salario esta semana en las primeras 40 horas:".$horasN."€"."<br>";
    echo "Salario esta semana correspondiente a horas extras:".$horasE."€"."<br>";
    echo "Salario total a cobrar:".$salarioTotal."€";

?>