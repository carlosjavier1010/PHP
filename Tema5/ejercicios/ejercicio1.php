<?php

    $numeros = [20];
    $cuadrado = [20];
    $cubo = [20];
    $contador = 0;

    for($i = 0; $i < 20;$i++){
        $numeros[$i] = rand(0,100);
    }

    foreach($numeros as $num){
        $cuadrado[$contador] = $num * $num;
        $cubo[$contador] = $cuadrado[$contador] * $cuadrado[$contador];
        $contador++;
    }
    echo "<table border='1px solid black'>";
    echo "<tr>";
    echo "<td>Numeros:</td>";
    echo "<td>Cuadrado:</td>";
    echo "<td>Cubo:</td>";
    echo "</tr>";
    
    for ($i=0; $i < 20 ; $i++) { 
        echo "<tr>";
        echo "<td>";
        echo $numeros[$i];
        echo "</td>";
        echo "<td>";
        echo $cuadrado[$i];
        echo "</td>";
        echo "<td>";
        echo $cubo[$i];
        echo "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
?>