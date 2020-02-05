<?php
    function obtenerArrNum($ruta){
        $fp = fopen($ruta,"r");
        $array = array();
        while(!feof($fp)) {
             $linea = fgets($fp);
             $linea = intval($linea);
             array_push($array,$linea);
             }
             
           fclose($fp); 
           return $array;
    }

    var_dump(obtenerArrNum('datosEjercicio.txt'));
?>