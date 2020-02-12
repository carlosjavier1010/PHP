<?php
    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['pass']);
    header('Location:../Controller/index.php');
?>