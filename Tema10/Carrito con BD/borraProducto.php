<?php
session_start();
if (isset($_POST['prod'])) {
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=tienda2;charset=utf8", "root", "Tikitacto12");
    } catch (Exception $e) {
        echo ("Imposible acceder a la base de datos");
        die("Error: " . $e->getMessage());
    }
    $consulta = $conexion->query("SELECT * FROM productos WHERE nombre='$_POST[prod]'");
    if ($consulta->rowCount() > 0) {
        $ejecuta = "DELETE FROM productos WHERE nombre='$_POST[prod]'";
        $conexion->exec($ejecuta);
        unset($_SESSION['productos'][$_POST['prod']]);

    }
}
header('Location: productos.php');
