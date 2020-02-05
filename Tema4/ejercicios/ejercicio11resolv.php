<?php

    $numero = $_POST['numero'];
    $numero2 = $numero+1;
    $numero3 = $numero2+1;
    $numero4 = $numero3+1;
    $numero5 = $numero4+1;

echo '<table border="1">
        <tr>
        <td>Numero</td>
        <td>Numero</td>
        <td>Numero</td>
        </tr>

        <tr>
        <td>'.pow($numero,3).'</td>
        <td>'.pow($numero2,3).'</td>
        <td>'.pow($numero3,3).'</td>
        <td>'.pow($numero4,3).'</td>
        <td>'.pow($numero5,3).'</td>
        </tr>
      </table>';

?>