<?php

    $imponible = $_POST['imponible'];

    $resultado = $imponible * 1.21;

    echo "El total de la factura a partir del imponible ".$imponible."€ es:".$resultado."€";

?>