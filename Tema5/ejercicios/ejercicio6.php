<?php

    if (!isset($_POST['num'])) {
        
    
   
    echo '<form action="ejercicio6.php" method="POST">';
    for ($i=0; $i < 8 ; $i++) { 
        
    
    ?>
    
    
    Introduce el numero<?= ($i+1) ?>:<input type="number" name="num[]"><br>
    
    
     
    <?php
    }
    echo '<input type="submit" value="Enviar"></form>';
    
    }else {
       $num = $_POST['num'];
        foreach($num as $datos){
           if ($datos%2==0) {
            echo "<span style='color:blue;'>".$datos." "."</span>";
           }else {
            echo "<span style='color:red;'>".$datos." "."</span>";
           }
            
        }
    }
    ?>