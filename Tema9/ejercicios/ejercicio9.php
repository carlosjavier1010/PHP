<?php
    $fp = fopen(''.$_POST['ficherofinal'].'',"w+");
    $fp1 = fopen(''.$_POST['fichero1'].'',"r");
    $fp2 = fopen(''.$_POST['fichero2'].'',"r");
    while (!feof($fp1) || !feof($fp2)) {
        if (!feof($fp1)) {
            $linea1 = fgets($fp1);
            fputs($fp,$linea1);
        }else {
            fclose($fp1);
        }
        if (!feof($fp2)) {
            $linea2 = fgets($fp2);
            fputs($fp,$linea2);
        }else {
            fclose($fp1);
        }
    }
    echo "Se ha ralizado correctamente la escritura de ambos ficheros en el fichero resultante.";
    fclose($fp);
?>