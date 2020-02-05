<?php
if (isset($_POST['hora']) && $_POST['hora'] != "") {
    $hora = $_POST['hora'];
    
    if ($hora <= 12 && $hora>= 6) {
        echo "Buenos dias.";
    }
    else if ($hora >= 13 && $hora <= 20) {
        echo "Buenas tardes.";
    }else {
        echo "Buenas noches.";
    }
}else {
    echo "Vuelve a la anterior página e introduce algún numero.";
}
?>