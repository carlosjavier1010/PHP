<?php

session_start();

// echo $variable_normal;

if ($_SESSION) {
    echo $_SESSION['variable_persistente'];
}else {
    echo 'Debes hacer login para acceder';
}
