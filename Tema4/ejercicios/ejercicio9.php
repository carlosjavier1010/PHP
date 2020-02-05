<?php

echo ' <form action="ejercicio8.php" method="POST">
Introduzca un numero. <input type="number" name="numero">
<input type="submit" value="Enviar">
</form>';

    if (isset($_POST['numero'])) {
        $numero = $_POST['numero'];
        for ($i=0; $i <= 10; $i++) { 
        
            echo '<table border="1px">
                <tr>
                <td>'.$numero." * ".$i."=".($numero*$i).'</td>
                </tr>
            </table>';
    
        }
    }
    




    if (isset($_POST['numero'])) {
        $numero = $_POST['numero'];
        $digitos = strlen($numero);
        echo "El numero que has introducido:".$numero." tiene un total de ".$digitos." digitos.";
    }else {
        echo "Introduce un numero...";
    }
    
?>