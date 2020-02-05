<?php
    if (isset($_POST['vocal'])) {
       
    
    require_once('ejercicio1.php');
    $frase = "Tengo una hormiguita en la patita, que me esta
    haciendo cosquillitas y no me puedo aguantar";
    $vocales = ['a','e','i','o','u'];
    $textoFinal = str_replace($vocales,$_POST['vocal'],$frase); //parametro 1:array de vocales a buscar, parametro 2: vocal por la que reemplazar, parametro 3: frase donde buscar
     // reemplazo todas las vocales que existan en la frase por la vocal pasada por POST en la frase $frase   
    echo $textoFinal;
    
}else {
    ?>
    <form action="ejercicio2.php" method="POST">
        Introduce una vocal:<input type="text" name="vocal">
        <input type="submit" value="Enviar">
    </form>
    <?php
}
?>