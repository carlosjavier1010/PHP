<?php

    if (isset($_POST['num'])) {
        $num = $_POST['num'];
        $contador = $_POST['contador'];
    }

    if (!isset($num)) {
        $contador = 0;
      }
    
    if ($contador == 15) {
        $ultimoPrimero = $num[14];
        $aux = [15];
        for ($i=0; $i < 15; $i++) {
            if ($i==0) {
                $aux[$i] = $ultimoPrimero;
            }
            if ( $i != 0) 
            $aux[$i] = $num[$i-1];
            
        }
        
       foreach ($aux as $digitos) {
           echo $digitos."<br>";                            
       }

    }
    if (!isset($_POST['num'])) {
    echo '<form action="ejercicio3.php" method="POST">';
    }
    if ($contador<15)  {
        
        for ($i=0; $i < 15; $i++) { 
            # code...
        
        ?>
            Introduzca el numero:<input type="number" name="num[]" autofocus><br>
                      
        <?php
        }
    }
    if (!isset($_POST['num'])) {
        echo '<input type="hidden" name="contador" value="15"><input type="submit" value="Enviar"></form>';
    }
    
?>