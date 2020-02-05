<?php
    //caracter por caracter
    function char_at($str, $pos)
    {
      return $str{$pos};
    }

    $texto = "Esto es una frase.";
    
    for ($i=0; $i < strlen($texto); $i++) { 
        echo char_at($texto,$i)."<br>";
    }

?>