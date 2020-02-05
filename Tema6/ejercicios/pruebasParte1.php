<?php

require_once('parte1.php');

$comprueba = esCapicua(303); // 303 es capicua y dice que es capicua, 304 no es capicua y dice que no es capicua. TODO OK.
if ($comprueba == true) {
    echo "Funcion esCapicua: Si es capicua.<br>";
} else {
    echo "Funcion esCapicua: No es capicua.<br>";
}

$comprueba = esPrimo(2)."<br>";
echo "Funcion esPrimo:".$comprueba;

$comprueba = siguientePrimo(3);
echo "Funcion siguientePrimo:".$comprueba;

$comprueba = potencia(2,4);
echo "<br>Funcion potencia:".$comprueba;

$comprueba = digitos(12345);
echo "<br>Funcion digitos:".$comprueba;

$num = 1234;
$comprueba = voltea($num);
echo "<br>Funcion voltea:".$comprueba;

$comprueba = digitoN(1234,2);
echo "<br>Funcion digitoN:".$comprueba;

$comprueba = posicionDeDigito(1234,2);
echo "<br>Funcion posicionDeDigito:".$comprueba;

$comprueba = quitaPorDetras(1234,2);
echo "<br>Funcion quitaPorDetras:".$comprueba;

$comprueba = quitarPorDelante(1234,2);
echo "<br>Funcion quitaPorDelante:".$comprueba;

$comprueba = pegaPorDetras(1234,2);
echo "<br>Funcion pegaPorDetras:".$comprueba;

$comprueba = pegaPorDelante(1234,2);
echo "<br>Funcion pegaPorDelante:".$comprueba;

$comprueba = trozoDeNumero(1234,1,2);
echo "<br>Funcion trozoDeNumero:".$comprueba;

$comprueba = juntaNumeros(12,34);
echo "<br>Funcion juntaNumeros:".$comprueba;

    for ($i=0; $i <= 1000; $i++) { 
        if (esPrimo($i)) {
            echo "<br>Numero primo:".$i;
        }
    }

    for ($i=1; $i <= 99999; $i++) { 
        if (esCapicua($i)) {
            echo "<br>Numero Capicúa:".$i;
        }
    }   
    $binario = 1010010;
    $digitos = digitos($binario);
    $decimal = 0;
    for($i = 0; $i < $digitos; $i++) {
      $decimal += digitoN($binario, $digitos - $i - 1) *pow(2, $i);
    }
    echo "<br>Binario a Decimal:".$decimal;

    $comprueba = decimalBinario($decimal);
    echo "<br>Funcion Decimal a Binario:".$comprueba;
    

?>