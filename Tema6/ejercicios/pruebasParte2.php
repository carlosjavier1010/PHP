<?php
require_once('parte2.php');

$comprueba = generaArrayInt(3,6);
echo "Funcion generaArrayInt tamaño:".count($comprueba)."<br>";

$array= array(0,1,2,3,4,5,6,7,8,9);
$comprueba = minimoArrayInt($array);
echo "Funcion minimoArrayInt el minimo es:".$comprueba."<br>";

$comprueba = maximoArrayInt($array);
echo "Funcion maximoArrayInt el maximo es:".$comprueba."<br>";

$comprueba = mediaArrayInt($array);
echo "Funcion mediaArrayInt el media es:".$comprueba."<br>";

$comprueba = estaEnArrayInt($array,8);
echo "Funcion estaEnArrayInt:".$comprueba."<br>";

$comprueba = posicionEnArray($array,8);
echo "Funcion poscionEnArray:".$comprueba."<br>";

$comprueba = volteaArrayInt($array);
echo "Funcion volteaArrayInt:".var_dump($comprueba)."<br>";

$comprueba = rotaDerechaArrayInt($array,2);
echo "Funcion rotaDerechaArrayInt:".var_dump($comprueba)."<br>";

$comprueba = rotaIzquierdaArrayInt($array,2);
echo "Funcion rotaIzquierdaInt:".var_dump($comprueba)."<br>";

?>