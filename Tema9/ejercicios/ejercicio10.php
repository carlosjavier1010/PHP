<?php
     $fp = fopen($_POST['fichero1']."_sort.txt","w+");
     $fp1 = fopen(''.$_POST['fichero1'].'.txt',"r");
     $array = array();
     while (!feof($fp1)) {
         $linea = fgets($fp1);
         array_push($array,$linea);
     }

     fclose($fp1);
     sort($array);
     
     for ($i=0; $i < count($array); $i++) { 
         fputs($fp,$array[$i]);
     }
     fclose($fp);

     echo "Operacion realizada.";
     
?>