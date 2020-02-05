<?php
    

        if (!isset($_POST['valor'])) {
        ?>
            <form action="ejercicio6.php" method="POST">
                Introduzca un parrafo con dos frases:<input type="text" name="valor" id="valor">
                
                <input type="submit" value="Guardar">
            </form>
        <?php
        }
    ?>
        
   
    <?php
        if (isset($_POST['valor'])) {
        
        $valor = $_POST['valor'];   
        $fraseuno = "";
        $frasedos = "";

        $puntouno = strpos($valor,".");
        
        //echo $puntouno."<br>";
        $puntodos = strpos($valor,".",$puntouno+1);
        $fraseuno = substr($valor,0,$puntouno);
        echo $fraseuno."<br>";
        $frasedos = substr($valor,$puntouno+1,$puntodos);
        $cFraseUno = str_word_count($fraseuno,1);
        $cFraseDos = str_word_count($frasedos,1);
        var_dump($cFraseUno);
        echo "<br>";
        var_dump($cFraseDos);
        echo "<br>La frase uno tiene una cantidad de palabras:".count($cFraseUno);
        echo "<br>La frase dos tiene una cantidad de palabras:".count($cFraseDos);

        //echo $punto."<br>";
        

        }

    ?>