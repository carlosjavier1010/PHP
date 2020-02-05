<?php

    if (!isset($_POST['mes'])) {
        
    
    $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
    $auxmeses = implode(",",$meses);    
    echo '<form action="ejercicio5.php" method="POST">';
    for ($i=0; $i < 12 ; $i++) { 
        
    
    ?>
    
    
    Temperatura media del mes de: <?= $meses[$i] ?><input type="number" name="mes[]"><br>
    <input type="hidden" name="meses" value="<?= $auxmeses ?>">
    
     
    <?php
    }
    echo '<input type="submit" value="Enviar"></form>';
    
    }else {
        $mes = $_POST['mes'];
        $meses = $_POST['meses'];
        $meses = explode(",",$meses);
        $contador = 0;
        $aux = "";
        foreach($mes as $datos){
           $aux = "Temperatura media del mes de ".$meses[$contador].":".$datos;
            for ($i=0; $i < $datos; $i++) { 
                $aux = $aux."<img src='barra.jpg' width='1%' height='1%'></img>";
            }
            echo $aux."<br>";
           $contador++; 
        }
    }
    ?>