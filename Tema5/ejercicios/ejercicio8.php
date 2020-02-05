<?php

    if (!isset($_POST['num'])) {
        
    echo '<form action="ejercicio8.php" method="POST">';
    for ($i=0; $i < 10 ; $i++) { 
        
    ?>
    
    Introduce el numero<?= ($i+1) ?>:<input type="number" name="num[]"><br>
    
    <?php
    }
    echo '<input type="submit" value="Enviar"></form>';
    
    }else {
       $num = $_POST['num'];
       echo "<table border='1px solid black'>";
       echo "<h1> ARRAY INICIAL</h1>";
       echo "<tr><td>0</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td></tr>";
       echo "<tr>";
       foreach($num as $datos){
          echo "<td>".$datos."</td>";
        }
        echo "</tr>";
        echo "</table>";

        $aux = [];
        foreach ($num as $datos) {
            if ($datos%2==0) {
                array_push($aux,$datos);
            }
        }
        foreach ($num as $datos) {
            if ($datos%2!=0) {
                array_push($aux,$datos);
            }
        }

       echo "<table border='1px solid black'>";
       echo "<h1> ARRAY FINAL</h1>";
       echo "<tr><td>0</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td></tr>";
       echo "<tr>";
       foreach($aux as $datos){
          echo "<td>".$datos."</td>";
        }
        echo "</tr>";
        echo "</table>";
    }
    ?>