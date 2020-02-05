<?php
    include 'ejercicio1.php';
    include 'ejercicio2.php';
    include 'ejercicio3.php';

     $miArray = obtenerArrNum('datosEjercicio.txt');
    
     for ($i=0; $i < count($miArray); $i++) { 
         echo "<br> Elemento ".$i." :".$miArray[$i]."\n";
     }
?>  