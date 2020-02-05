<?php

    if (!isset($_POST['num']) && !isset($_POST['uno'])) {
        
    echo '<form action="ejercicio9.php" method="POST">';
    for ($i=0; $i < 10 ; $i++) { 
        
    ?>
    
    Introduce el numero<?= ($i+1) ?>:<input type="number" name="num[]"><br>
    
    <?php
    }


    echo '<input type="submit" value="Enviar"></form>';
    
    }else {

        if (!isset($_POST['uno'])) {
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
             $num = implode(",",$num);
             ?>
        <form action="ejercicio9.php" method="POST">
            Posicion Inicial:<input type="number" name="uno" min="0" max="9">
            Posicion final:<input type="number" name="dos" min="0" max="9">
            <input type="hidden" name="num" value="<?= $num ?>">
            <input type="submit" value="Enviar">
        </form>
        <?php
         

        }else {
            if ($_POST['uno']< $_POST['dos']) {
                $num = $_POST['num'];
                $num = explode(",",$num);
                $inicial = $_POST['uno'];
                $final = $_POST['dos'];
                $aux = [];
                $auxfinal = 0;
                $contador = 0;
                
                
                for ($i=0; $i < 10; $i++) { 
                        array_push($aux,0);
                    }

                for ($i=$inicial+1; $i < 10; $i++) { 
                   
                    if ($i != $final) {
                        $aux[$i] = $num[$i-1];
                    }else {
                        $aux[$i+1] = $num[$i];
                        
                    }
                    if ($i == 9) {
                        $auxfinal = $num[$i];
                        $aux[$i] = $num[$i-1];
                    }
                }

                for ($i=0; $i < $inicial ; $i++) { 
                    
                    if ($i==0 && $i != $inicial) {
                        $aux[$i] = $auxfinal;
                    }else {
                        $aux[$i] = $num[$i-1];
                    }
                    
                }   
                    $aux[$final] = $num[$inicial];
                    $aux[$inicial] = $num[$inicial-1];
                    
                echo "<table border='1px solid black'>";
                echo "<h1> ARRAY INICIAL</h1>";
                echo "<tr><td>0</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td></tr>";
                echo "<tr>";
                foreach($num as $datos){
                   echo "<td>".$datos."</td>";
                 }
                 echo "</tr>";
                 echo "</table>";

                 echo "<table border='1px solid black'>";
                 echo "<h1> ARRAY FINAL</h1>";
                 echo "<tr><td>0</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td></tr>";
                 echo "<tr>";
                 foreach($aux as $datos){
                    echo "<td>".$datos."</td>";
                  }
                  echo "</tr>";
                  echo "</table>";

            }else {
                $num = $_POST['num'];
                echo "<h1>Introduce por favor la posicion inicial de forma que sea menor que la posicion final.</h1>";
                echo ' <form action="ejercicio9.php" method="POST">
                Posicion Inicial:<input type="number" name="uno" min="0" max="9">
                Posicion final:<input type="number" name="dos" min="0" max="9">
                <input type="hidden" name="num" value="<?= $num ?>">
                <input type="submit" value="Enviar">
                </form>';
            }
            
        }

        
    }
    ?>