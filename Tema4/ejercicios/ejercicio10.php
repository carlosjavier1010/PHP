<?php

$num = $_POST['numero'];
$contador = $_POST['contador'];
$aux = $_POST['aux'];;
    if (isset($_POST['numero']) && $_POST['numero']>=0 ) 
     {
        
        if ($num>=0) {
            $aux = $aux+$_POST['numero'];
            $contador = $contador+1;
            echo $contador."<br>";
            echo ' <form action="ejercicio10.php" method="POST">
        Introduzca un numero. <input type="number" name="numero">
        <input type="hidden" name="contador" value="'.$contador.'">
        <input type="hidden" name="aux" value="'.$aux.'">                    
        <input type="submit" value="Enviar">
        </form>';
        }
    }elseif($num<0) {
            if ($contador>0) {
                echo "La media de los ".$contador." numeros introducidos es: ".($aux/$contador);
                
            }
        
    }
    

?>