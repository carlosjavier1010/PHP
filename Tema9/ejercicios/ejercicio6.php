<?php
    
        function leerContenidoFichero($ruta){
            $fp = fopen($ruta, "r");
            while(!feof($fp)) {
            $linea = fgets($fp);
            echo $linea."<br>";
            }
            fclose($fp); 
        }
        
        //leerContenidoFichero("datosEjercicio.txt");
?>