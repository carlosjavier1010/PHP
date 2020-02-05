<?php
    

    if (!isset($_POST['uno'])) {
        $array = [];

    for ($i=0; $i < 20 ; $i++) { 
        array_push($array,rand(0,20));
    }

    foreach ($array as $miarray) {
        echo "<span style='color:red;'>".$miarray." "."</span>";
    }
    
    $texto = implode(",",$array);
    
    ?>
    <form action="ejercicio4.php" method="POST">
        Introduzca valor 1:<input type="number" name="uno">
        Introduzca valor 2: <input type="number" name="dos">
        <input type="hidden" value="<?= $texto ?>" name="texto">
        <input type="submit" value="Enviar">
    </form>
    <?php
    }

    if (isset($_POST['uno'])) {
        $uno = $_POST['uno'];
        $dos = $_POST['dos'];
        $texto = $_POST['texto'];
        $array = explode(",",$texto);

        foreach ($array as $miarray) {
            if ($miarray==$uno) {
                $miarray = $dos;
                echo "<span style='color:blue;'>".$miarray." "."</span>";
            }else {
                echo "<span style='color:red;'>".$miarray." "."</span>";
            }
           
        }

    }
?>