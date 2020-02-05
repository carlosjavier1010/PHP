<?php

    $numero = $_POST['numero'];
   
    if ($numero%2 == 0) {
        echo "El numero ".$numero." es par.<br>";
        
    }else {
        echo "El numero ".$numero." es impar.<br>";
    }

    if ($numero%5 == 0) {
        echo "El numero ".$numero." es divisible entre 5."; 
    }else {
        echo "El numero ".$numero." no es divisible entre 5.";
    }

?>