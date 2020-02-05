<?php

    $kilobytes = $_POST['kb'];

    $resultado = $kilobytes / 1000;

    echo $kilobytes." Kilobytes son ".$resultado." Megabytes.";

?>