<?php
    include 'cabecera.html';
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location:acceso.php');
    }elseif (isset($_SESSION['user']) && $_SESSION['user'] == "profesor" 
    && $_SESSION['pass'] == "123"){
        echo '<body bgcolor="grey">';
        echo '<a href="cerrarsesion.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Cerrar Sesion</a>';
   
        echo '<h1>Bienvenido a su pagina restringida</h1>';
    }
    else {
        echo "El usuario o contraseña es/son incorrecto/s";
        echo '<a href="acceso.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Iniciar Sesion</a>';
   
    }


    include 'pie.html';
?>


