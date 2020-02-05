<?php

$argumentos = $argv;

    $fichero = $argv[1];
    $palabra = $argv[2];
    $contador = 0;
    
    $fp = fopen($fichero,"r");        

    while (!feof($fp)) {
        $linea = fgets($fp);
        echo $linea;
        $pos = stripos($linea,$palabra);

        if ($pos!==false) { //importante usar los dos iguales
           
            $contador++;
        }
    }

    print_r( "Hay un total de: ".$contador." ocurrencias.");
    fclose($fp);
    //PS C:\xampp\htdocs\DES\Tema9\ejercicios> php ejercicio11.php ejercicio11.txt "carlos"
    //Hay un total de: 3 ocurrencias.
    //PS C:\xampp\htdocs\DES\Tema9\ejercicios>
?>
