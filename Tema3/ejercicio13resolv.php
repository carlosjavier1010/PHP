<?php

    $num1 = $_POST['numero1'];
    $num2 = $_POST['numero2'];
    $num3 = $_POST['numero3'];
    
    if (isset($num1) && isset($num2) && isset($num3)) {
        $array = array($num1,$num2,$num3);

        sort($array,1);
    
        foreach ($array as $key) {
            
            echo $key."<br>";
        }
    }

    
    
?>