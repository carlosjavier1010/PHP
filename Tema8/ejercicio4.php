<?php
session_start();


if (isset($_GET['comprueba']) == "si") {
    echo "Error en el usuario y/o contraseña";
}
if (isset($_GET['comprueba']) == "unset") {
    unset($_SESSION['usuario']);
    unset($_SESSION['pass']);
}
?>
<form action="ejercicio3.php" method="POST">
    Introduzca el usuario:<input type="text" name="user">
    Introduzca la contrasena:<input type="text" name="passw">
    <input type="submit" value="Enviar">
</form>