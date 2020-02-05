<?php

$n = $_POST['numero'];
$capicua = false;
// número de una cifra
if ( $n < 10 ) {
  $capicua = true;
}
// número de dos cifras
if (( $n >= 10 ) && ( $n < 100 )) {
  if ( floor($n / 10) == ($n % 10) ) {
    $capicua = true;
  }
}
// número de tres cifras
if (( $n >= 100 ) && ( $n < 1000 )) {
  if ( floor($n / 100) == ($n % 10) ) {
    $capicua = true;
  }
}
// número de cuatro cifras
if (( $n >= 1000 ) && ( $n < 10000 )) {
  if ((floor( $n / 1000 ) == ($n % 10) ) && ( (floor( $n / 100 ) % 10 )== (floor( $n / 10) % 10 ))) {
    $capicua = true;
  }
}
// número de cinco cifras
if ( $n >= 10000) {
  if ((floor( $n / 10000 ) == ($n % 10) ) && ( ( (floor($n / 1000) % 10) ) == (floor( $n / 10) % 10))) {
    $capicua = true;
  }
}
if ( $capicua ) {
  echo "El número introducido es capicúa.";
} else {
  echo "El número introducido no es capicúa.";
}
?>