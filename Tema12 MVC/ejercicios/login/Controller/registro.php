<?php
session_start();
    require_once '../Model/Usuario.php';
    if (isset($_REQUEST['usuario']) && isset($_REQUEST['pass'])) {
        $usuario = $_REQUEST['usuario'];
        $pass = $_REQUEST['pass'];
        $registro = new Usuario($usuario,$pass);
        $comprueba = $registro->comprobarUsuario();

        if ($comprueba) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['pass'] = $pass;
            $registro->insert();
            header('Location:../Controller/index.php');

        }else {
            header('Location:../View/formLogin.php?existe=si');
        }
    }
?>