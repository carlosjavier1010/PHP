<?php
    $time = time() + (60 * 60);
    
   
    if (!isset($_COOKIE['color'])) {
        setcookie("color","white",$time);
        $color = "white";
    }else {
        $color = $_COOKIE['color'];
       
    }
    
    if (isset($_POST['color'])) {
        $color = $_POST['color'];
        setcookie("color",$color,$time);
    }
    ?>
    
    <div id="body">
   
        <form action="ejercicio7.php" method="post">
        <input type="color" name="color" value="<?=$color?>"><br><br>
        <input type="submit" value="Enviar">
        </form>
    
    </div>
     <?php   
    include 'pie.html';
    
?>
<script>document.getElementById("body").style.background="<?=$color?>";</script>