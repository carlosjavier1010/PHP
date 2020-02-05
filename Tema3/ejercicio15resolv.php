<?php

$contador = 0;
$texto = "r";
$indice = 1;
$valor = "";

for ($i=0; $i < 10; $i++) { 
    $ii = $i+1;

       $valor = $texto.$indice;
       $indice++;

    if ($_POST[''.$valor.''] >0) {
        $contador+= 3;
       
    }
    
}
echo "Respuestas correctas con indicio de infidelidad:".($contador/3)."<br>";
echo "Puntuacion:".$contador."<br>";
    if ($contador<11) {
        echo "Enhorabuena tu pareja parece ser totalmente fiel.";
    }else if ($contador>=11 && $contador<22) {
        echo "Quizás exista el peligro de otra persona en su vida o en su mente, aunque seguramente será algo sin importancia. No bajes la guardia.";
        
    }else {
        echo "Tu pareja tiene todos los ingredientes para estar viviendo un romance con otra persona. Te aconsejamos que indagues un poco más y averigües que es lo que está pasando por su cabeza.";

    }
    
?>