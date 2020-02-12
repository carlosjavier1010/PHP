<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
        header('Location:Controller/index.php');
    }else {
        header('Location:Controller/formLogin.php');
    }
?>