<?php
require_once('parte3.php');
$arrayBi = generaArrayBiInt(5,6,1,200);


echo "array original:";
var_dump($arrayBi);
$comprueba = filaDeArrayBiInt($arrayBi,2);
echo "<br><br>Funcion filaDeArrayBiInt:<br>";
echo var_dump($comprueba);

$comprueba = columnaDeArrayBiInt($arrayBi,2);
echo "<br><br>Funcion columnaDeArrayBiInt:<br>";
echo var_dump($comprueba);

$comprueba = coordenadasEnArrayBiInt($arrayBi,24);
echo "<br><br>Funcion coordenadasEnArrayBiInt:<br>";
echo var_dump($comprueba)."<br><br>";
//Inicio de esPuntoDeSilla, generamos array para comprobar esPuntoDeSilla
$arrayBi = generaArrayBiInt(3,3,1,10);
echo "<br><br>Funcion esPuntoDeSilla:<br>";
echo var_dump($arrayBi)."<br>";
//Comprobamos si el valor de la fila 1 y columna 1 es punto de silla en el array que generamos o no es punto de silla.

$comprueba = esPuntoDeSilla($arrayBi,1,1);
if ($comprueba != -1) {
    echo "<br>Es punto de silla";
}else {
    echo "<br>No es punto de silla";
}
echo "<br><br>Fin esPuntoDeSilla:<br>";
echo var_dump($comprueba);
//Fin de esPuntoDeSilla
?>