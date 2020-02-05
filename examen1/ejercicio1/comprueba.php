<?php
    session_start();
    if ($_POST['user'] == "profesor") {
       
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['pass'] = $_POST['pass'];
        header('Location:pagina1.php');
    }elseif ($_POST['user'] == "alumno") {
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['pass'] = $_POST['pass'];
        header('Location:pagina2.php');
    }else {
        echo "El usuario introducido no existe";
    }
?>