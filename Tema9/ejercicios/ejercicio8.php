<?php
    $fp = fopen("ejercicio8.txt","a+");
    if (isset($_GET['fin'])) {
        echo "Has terminado de escribir en el archivo<br>";
        while(!feof($fp)) {
            $linea = fgets($fp);
            echo $linea."<br>";
            }
            fclose($fp); 
    }elseif(isset($_POST['escribir']) && $_POST['escribir'] != "") {
        fputs($fp,$_POST['escribir']."\n");
        header("Location:ejercicio8.html");
    }else {
        echo "Has terminado de escribir en el archivo<br>";
        fclose($fp);
    }
?>