<?php
    session_start();

    if (!isset($_POST['numero']) || $_POST['numero']>=0) {
        ?>
    <form action="ejercicio2.php" method="POST">
        <input type="number" name="numero">
        <input type="submit" value="Enviar">
    </form>
    <form action="cerrarsesion.php" method="POST">
    <input type="submit" name="cerrar" value="cerrar">
    </form>
    <?php
    } 

    if (isset($_POST['numero'])) {
        
    
        if (!isset($_SESSION['numeropar'])) {
            if ($_POST['numero']%2==0) {
                $_SESSION['numeropar'] = $_POST['numero'];
                $_SESSION['contadorpar'] = 1;
            }else {
                $_SESSION['numeropar'] = 0;
                $_SESSION['contadorpar'] = 0;
            }
            if ($_POST['numero']%2!=0) {
                $_SESSION['numeroimp'] = $_POST['numero'];
                $_SESSION['contadorpar'] = 1;
            }else {
                $_SESSION['numeroimp'] = 0;
                $_SESSION['contadorimpar'] = 0;
            }
            
            

        }else {
            if($_POST['numero'] >=0){
                if ($_POST['numero']%2==0) {
                    $_SESSION['numeropar']+=$_POST['numero'];
                    $_SESSION['contadorpar']++;
                }else {
                    $_SESSION['numeroimp']+=$_POST['numero'];
                    $_SESSION['contadorimpar']++;
                }
            
            }else {
                echo "La cantidad de numeros introducidos es:".($_SESSION['contadorpar']+$_SESSION['contadorimpar']);   
                echo "<br>La media de numeros pares introducidos es:".($_SESSION['numeropar']/$_SESSION['contadorpar']);
                echo "<br>La media de numeros impares introducidos es:".($_SESSION['numeroimp']/$_SESSION['contadorimpar']);
            }
        }
    }
    
?>