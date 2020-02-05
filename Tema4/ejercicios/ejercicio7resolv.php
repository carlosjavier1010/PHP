<?php

    $numero = $_POST['numero'];
    $contador = $_POST['contador'];
    
    $pass = 1234;

    if ($numero == $pass) {
        echo "COMBINACION CORRECTA. LA CAJA FUERTE SE ABRIÓ.";
    } else {
        if ($contador==0) {
            echo "Has perdido las 4 oportunidades que tenias... CAJA BLOQUEADA !";
        }else {

            echo "Te quedan ".--$contador." oportunidades."; //Se pone el signo de decremento antes que la variable contador para que disminuya la variable antes imprimirla,
            //de lo contrario la imprimiria y despues haría el decremento, por lo que imprimiria el valor sin quitarle 1 a dicho valor.
           echo ' <form action="ejercicio7resolv.php" method="POST">
             Introduzca combinacion de la caja fuerte: <input type="number" max="9999" name="numero">
             <input type="hidden" value="'.$contador.'" name="contador">
             <input type="submit" value="Enviar">
         </form>';

        }
    }
    

?>