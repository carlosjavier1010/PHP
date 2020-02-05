<?php

    $contador = 0;
    $respuestas = array("B", "B", "B", "A","C","A","A","B","C","A");
    $preg1 = $_POST['preg1'];
    $preg2 = $_POST['preg2'];
    $preg3 = $_POST['preg3'];
    $preg4 = $_POST['preg4'];
    $preg5 = $_POST['preg5'];
    $preg6 = $_POST['preg6'];
    $preg7 = $_POST['preg7'];
    $preg8 = $_POST['preg8'];
    $preg9 = $_POST['preg9'];
    $preg10 = $_POST['preg10'];
    
    for ($i=0; $i < 10; $i++) { 
        $ii = $i+1;
        if (${"preg".$ii} == $respuestas[$i]) {
            $contador++;
            
        }
        
    }

    echo "Has acertado un total de ".$contador." preguntas.";

?>