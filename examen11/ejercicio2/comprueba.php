<?php
    session_start();
    $existe = false;
    if (isset($_COOKIE['user'])) {
        $usuario = unserialize($_COOKIE['user']);
    }
    if (isset($_POST['user'])) {
        $user = $_POST['user'];
        if (isset($_COOKIE['user'])) {
            $_SESSION['user'] = $_POST['user'];
           foreach ($usuario as $key => $value) {
            if ($usuario[$key]['usuario']==$user) {
                header("Location:principal.php");
            }
                
            
           }
           echo '<h1>No existe el usuario</h1>';
           include 'acceso.php';
         }else {
            echo '<h1>No existe el usuario</h1>';
            include 'acceso.php';
        }
        }
   
?>