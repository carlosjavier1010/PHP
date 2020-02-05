<?php
    session_start();

    if (!isset($_POST['numero']) || $_POST['numero']>=0) {
        ?>
    <form action="ejercicio1.php" method="POST">
        <input type="number" name="numero">
        <input type="submit" value="Enviar">
    </form>
    <form action="cerrarsesion.php" method="POST">
    <input type="submit" name="cerrar" value="cerrar">
    </form>
    <?php
    } 

    if (isset($_POST['numero'])) {
        
    
        if (!isset($_SESSION['numero'])) {
            $_SESSION['numero'] = $_POST['numero'];
            $_SESSION['contador'] = 1;
        }else {
            if($_POST['numero'] >=0){
            $_SESSION['numero']= $_SESSION['numero']+$_POST['numero'];
            echo $_SESSION['numero']."<br>";
            $_SESSION['contador']++;
            }else {
                echo $_SESSION['numero']."<br>";
                $media =  $_SESSION['numero'] / $_SESSION['contador'];
                echo "La media es:".$media;
            }
        }
    }
    
?>