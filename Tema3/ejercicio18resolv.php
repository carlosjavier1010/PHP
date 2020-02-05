<?php

        $numero = $_POST['numero'];
        $contador = 0;
        $aux = $numero;
        $auxdos = 0;
        $numneg = $numero;

        if ($numero > 0) {
            while ($aux/10 > 0.99999999999) {
            
                $aux = $aux/10;
    
                $contador++;
                $auxdos = round($aux,0,PHP_ROUND_HALF_DOWN);
                //echo $auxdos."<br>";
            }
            echo "Numero introducido: ".$numero."<br>";
        }else {
            $numero = -($numero);
            $aux = $numero;
            
            while ($aux/10 > 0.99999999999) {
            
                $aux = $aux/10;
    
                $contador++;
                $auxdos = round($aux,0,PHP_ROUND_HALF_DOWN);
                //echo $auxdos."<br>";
            }
            echo "Numero introducido: ".$numneg."<br>";
        }
        

        
        
        echo "La primera cifra del numero que has introducido es: ".$auxdos;
?>