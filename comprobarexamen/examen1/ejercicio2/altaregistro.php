<?php
    session_start();
    $existe = false;
    $bandera = false;
    if (isset($_COOKIE['user'])) {
        $usuario = unserialize($_COOKIE['user']);
        $bandera = true;
    }

    if (isset($_POST['user'])) {
        $user = $_POST['user'];
        $fondo = $_POST['fondo'];
    }

    if ($bandera==true) {
        foreach ($usuario as $key => $value) {
           
            if ($value['usuario'] == $_POST['user']) {
                $existe = true;
                
            }
        }
    }
    

    if ($existe==true) {
        echo "El usuario existe, registrese de nuevo";
        include 'registro.php';
    }
    if($bandera==false) {
        $usuario = array();
        $dimension = count($usuario);
        $usuario[0]['usuario'] = $user;
        $usuario[0]['fondo'] = $fondo;
        $fecha = date("d-m-Y");
        $usuario[0]['fecha'] = $fecha;
    }else {
        
        $dimension = count($usuario);
        $usuario[$dimension]['usuario'] = $user;
        $usuario[$dimension]['fondo'] = $fondo;
        $fecha = date("d-m-Y");
        $usuario[$dimension]['fecha'] = $fecha;
    }


    $time = time() + (60 * 60 * 24 * 90);
    setcookie("user",serialize($usuario),$time);

    if ($existe==false) {
        header('Location:principal.php');
    }
    
?>