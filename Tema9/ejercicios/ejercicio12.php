<?php

    $fp = fopen("html.html","r");
    $fp1 = fopen("ejercicios12Sin.html","w+");
    

    while(!feof($fp)){
        $linea = fgets($fp,1024);
        echo "<br>LINEA".$linea."<br>";
        $menor = strpos($linea,"<");
        while ($menor !== false) {
        echo "<br>LINEA".$linea."<br>";
        
        echo "<br>MENOR".$menor."<br>";
        $mayor = strpos($linea,">");
        echo "<br>MAYOR".$mayor."<br>";
          $etiqueta = substr($linea,$menor,$mayor+1);
          echo "<br>Etiqueta:".$etiqueta;
          $linea = str_replace($etiqueta,"",$linea);
          echo "linea final:".$linea."<br>";
          fputs($fp1,$linea);
          $menor = strpos($linea,"<");
        }
    }
    
    fclose($fp);
    fclose($fp1);
    fclose($fp2);
?>