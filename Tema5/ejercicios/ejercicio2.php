<?php

    if (isset($_POST['num'])) {
        $num = $_POST['num'];
        $contador = $_POST['contador'];
        $numTotal = $_POST['numTotal'].$num.",";
        
    }
    //Inicializamos las variables la primera vez de ejecucion de este programa, si no, nos da error de undefined contador, etc...
    if (!isset($num)) {
        $contador = 0;
        $numTotal = "";
      }
    
    // Una vez tengamos todos los numeros recogidos, procesamos dichos numeros.
    if ($contador==10 ) {
        $longitud = strlen($numTotal);
        $numTotal = substr($numTotal,0,$longitud-1);
        $datos = explode(',',$numTotal);
        //var_dump($datos);
        $minimo = PHP_INT_MAX;
        $maximo = 0;
        foreach ($datos as $dato ) {
            $dato = (int)$dato;
           
            if ($dato < $minimo) {
                $minimo = $dato;
            }
            if ($dato > $maximo) {
                $maximo = $dato;
                
            }
            
            
            
        }

        foreach ($datos as $dato ) {
            $dato = (int)$dato;
           
            if ($dato == $minimo) {
                echo "MIN:".$dato."<br>";
            }
            elseif ($dato == $maximo) {
                echo "MAX:".$dato."<br>";
                
            }else {
                echo $dato."<br>";
            }
            
            
            
        }

    }

    // Recogida de numeros por form

    if ($contador<10)  {
        
    
    ?>
    <form action="ejercicio2.php" method="POST">
        Introduzca el numero:<input type="number" name="num" autofocus>
        <input type="hidden" name="contador" value="<?= ++$contador ?>">
        <input type="hidden" name="numTotal" value="<?= "".$numTotal ?>">
        <input type="submit" value="Enviar">
    </form>
    
    <?php
    }
    //echo "<br>".$contador;
?>