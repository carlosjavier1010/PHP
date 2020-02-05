<?php
session_start();
    //simulacion de inicio sesión
    if (isset($_POST['login'])) {
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['pass'] = $_POST['pass'];
        header("Location:ejercicio13.php");
    }
    if (isset($_POST['unset'])) {
        unset($_SESSION['user']);
        unset($_SESSION['pass']);
        header("Location:ejercicio13.php");
    }
?>