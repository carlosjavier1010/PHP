
    <?php
    

        if (!isset($_POST['valor'])) {
        ?>
            <form action="ejercicio4.php" method="POST">
                <input type="text" name="valor" id="valor">
                <input type="submit" value="Guardar">
            </form>
        <?php
        }
    ?>
        
   
    <?php
        if (isset($_POST['valor'])) {
        
        $valor = $_POST['valor'];   
        $array = str_word_count($valor,1); // str word count sirve para: meter todas las palabras en un array, en cada posicion una palabra..
        var_dump($array);
        $elementosArray = count($array);
        //var_dump($array);

        if ($array[0] == $array[$elementosArray-1]) {
            echo "La frase empieza con la misma palabra en la que termina";
        }else {
            echo "La frase NO empieza con la misma palabra en la que termina";
        }
    }
    ?>