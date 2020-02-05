<?php
    function obtenerSuma($ruta){
        $fp = fopen($ruta,"r");
        $suma = 0;
        while(!feof($fp)) {
             $linea = fgets($fp);
             $linea = intval($linea);
            $suma+= $linea;
             }
             
           fclose($fp); 
           return $suma;
    }

    $totalSuma = obtenerSuma("datosEjercicio.txt");
    echo "El total de la suma de los numeros del archivo es:".$totalSuma."<br>";
?>