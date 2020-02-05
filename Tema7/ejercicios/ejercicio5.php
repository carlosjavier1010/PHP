<?php
    

        if (!isset($_POST['valor'])) {
        ?>
            <form action="ejercicio5.php" method="POST">
                <input type="text" name="valor" id="valor">
                <input type="submit" value="Guardar">
            </form>
        <?php
        }
    ?>
        
   
    <?php
        if (isset($_POST['valor'])) {
        
        $valor = $_POST['valor'];  
        $aux = "";
        $aux2 = "";
            
        while ($aux != $valor) {
            if ($aux == "") {
                 $aux = substr($valor,1,strlen($valor));
                //var_dump($aux);
                $aux = $aux.substr($valor,0,1);
                echo $aux."<br>";
            }else {
                $aux2 = $aux;
                $aux = substr($aux2,1,strlen($aux));
                //var_dump($aux);
                $aux = $aux.substr($aux2,0,1);
                echo $aux."<br>";
            }
            
        }

        }

    ?>