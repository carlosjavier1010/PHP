<?php
session_start();

if (isset($_POST['cerrar'])) {

    header("Location:ejercicio4.php?comprueba=unset");
}


if (isset($_POST['passw'])) {
    $_SESSION['passwpost'] = $_POST['passw'];
    $_SESSION['userw'] = $_POST['user'];
    $_SESSION['usuario'] = "carlos";
    $_SESSION['pass'] = "php";
}

if (isset($_SESSION['usuario'])) {
    if (isset($_SESSION['pass']) && isset($_SESSION['usuario'])) {
        if ($_SESSION['pass'] == $_SESSION['passwpost'] && $_SESSION['usuario'] == $_SESSION['userw']) {
            if (!isset($_POST['numero'])) {
                ?>
                <form action="ejercicio3.php" method="POST">
                    <input type="number" name="numero" autofocus="autofocus">
                    <input type="submit" value="Enviar">
                </form>
                <form action="ejercicio3.php" method="POST">
                    <input type="submit" name="cerrar" value="cerrarsesion">
                </form>
                <form action="ejercicio3.php" method="POST">
                    <input type="submit" name="reset" value="Resetear numeros introducidos anteriormente.">
                </form>
                <?php
                                $_SESSION['numero'] = 0;
                                $_SESSION['contador'] = 0;
                            } elseif (isset($_SESSION['numero'])) {
                                if ($_SESSION['numero'] < 10000) {
                                    ?>
                    <form action="ejercicio3.php" method="POST">
                        <input type="number" name="numero" autofocus="autofocus">
                        <input type="submit" value="Enviar">
                    </form>
                    <form action="ejercicio3.php" method="POST">
                        <input type="submit" name="cerrar" value="cerrarsesion">
                    </form>
                    <form action="ejercicio3.php" method="POST">
                        <input type="submit" name="reset" value="Resetear numeros introducidos anteriormente.">
                    </form>
<?php
                    $_SESSION['numero'] += $_POST['numero'];
                    $_SESSION['contador']++;
                } else {
                    echo "<br>El total acumulado es = " . $_SESSION['numero'] . "<br>El contador es = " . $_SESSION['contador'] . "<br>La media es:" . ($_SESSION['numero'] / $_SESSION['contador']);
                }
            }
        } else {

            header("Location:ejercicio4.php?comprueba=si");
        }
    }
} else {

    header("Location:ejercicio4.php");
}

?>