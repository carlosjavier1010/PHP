<?php
    

        if (!isset($_POST['valor'])) {
        ?>
            <form action="ejercicio7.php" method="POST">
                Introduzca un parrafo con dos frases:<input type="text" name="valor" id="valor">
                
                <input type="submit" value="Guardar">
            </form>
        <?php
        }
    ?>
 <?php
        if (isset($_POST['valor'])) {
            $frase = "esto es una frase.";
            $valor = $_POST['valor'];
            $encontrado = strpos($frase,$valor);
            echo $encontrado."<br>";
            if ($encontrado != "") {
                echo "si esta la palabra en la frase";
            }else {
                echo "no existe la plabra en la frase";
            }
        }

    ?>