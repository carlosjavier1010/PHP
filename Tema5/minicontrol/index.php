<?php

   

    echo "<h1>Abre el Ojo</h1>";
    

    if (isset($_REQUEST['fila'])) {
        
        $fila = $_REQUEST['fila'];
        $columna = $_REQUEST['columna'];
        

        
        $matriz = explode(";", $_REQUEST['cadena']);
        for ($i=0; $i < 10; $i++) {
          $matriz[$i] = explode(',', $matriz[$i]);
        }
        

        

        if ($matriz[$fila][$columna]==0) {
          $matriz[$fila][$columna] = 1;
        }else {
          $matriz[$fila][$columna] = 0;
        }

    }else {
      
        for ($i=0; $i < 10; $i++) { 
        
            for ($j=0; $j < 10 ; $j++) { 
              
              $matriz[$i][$j] = 0;
              
            }
          }
      
    }
    $cadena = "";
    foreach ($matriz as $datos) {
      
      $cadena = $cadena.implode(',',(array)$datos).";";

    }

    echo "<table border='1'>";
        
        for ($i=0; $i < 10; $i++) { 
          echo "<tr>";
            for ($j=0; $j < 10 ; $j++) { 
              
             if ($matriz[$i][$j] == 0) {
             
              echo '<td><a href="index.php?fila='.$i.'&columna='.$j.'&cadena='.$cadena.'"><img src="cerrado.png"></img></a></td>';

             }else {
              echo '<td><a href="index.php?fila='.$i.'&columna='.$j.'&cadena='.$cadena.'"><img src="abierto.png"></img></a></td>';
             }
              
            }
           
            echo "</tr>";
          }
          echo "</table>";

    
    

?>