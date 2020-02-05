<?php
    include 'ejercicio5.php';
    include 'ejercicio6.php';

    $miArray = array(2,8,14);
    escribirNumerosMod($miArray,"sobreescribir");
    echo "Paso1<br>";
    leerContenidoFichero("datosEjercicio.txt");
    $miArray = array(33,11,16);
    escribirNumerosMod($miArray,"ampliar");
    echo "Paso2<br>";
    leerContenidoFichero("datosEjercicio.txt");
    $miArray = array(4,9,12);
    escribirNumerosMod($miArray,"sobreescribir");
    echo "Paso3<br>";
    leerContenidoFichero("datosEjercicio.txt");
    echo "<br>Hasta luego !";
?>