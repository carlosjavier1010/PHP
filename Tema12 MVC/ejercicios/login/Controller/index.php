<?php
    session_start();
    if (isset($_SESSION['usuario']) && isset($_SESSION['pass'])) {
        echo '<h1>Bienvenido: '.$_SESSION['usuario'].'</h1>';
        echo '<td><a href="../Controller/cerrarSesion.php"><input type="button" class="btn btn-danger" value="Cerrar Sesion"></a></td>
        ';
        require_once '../View/paginaPrincipal.php';
    }else {
        echo '<h1>Por favor inicie sesión o registrese si aún no tienes una cuenta</h1><a href="../Controller/formLogin.php">Click aquí</a>';
    }
?>