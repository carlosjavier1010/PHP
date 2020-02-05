<?php
$contactos = array(
	array(//numero del array, en este caso el numero 0
		0 => 'Antonio', //nombre del campo y su valor, en este caso el nombre es un numero, el numero 0
		1 => 'antonio@antonio.com' //en este caso el nombre es un texto, en este caso email
	),
	array(
		0 => 'Luis',
		1 => 'luis@luis.com'
	),
	array(
		2 => 'Salvador',
		'email' => 'salva@salva.com'
	)
);


foreach ($contactos as $key => $email) { // email contiene el primer array, despues contendrá el segundo array, asi sucesivamente. key contiene el indice 0, luego el indice 1, etc...
	echo $email[$key]."<br>"; // En la primera vuelta le diremos que acceda dentro del array cargado(array 0 de antonio) con el indice 0, el indice es la llave $key
	
}

echo "<br><br>saltoss<br><br>";
$contactos = array(
	array(//numero del array, en este caso el numero 0
		0 => 'Antonio', //nombre del campo y su valor, en este caso el nombre es un numero, el numero 0
		1 => 'antonio@antonio.com' //en este caso el nombre es un texto, en este caso email
	),
	array(
		2 => 'Luis',
		3 => 'luis@luis.com'
	),
	array(
		4 => 'Salvador',
		5 => 'salva@salva.com'
	)
);


foreach ($contactos as $key) { //Esto es como si fuese el I de un for
	foreach ($key as $campo){  //Esto es como si fuese la j de un for dentro del for I
        echo $campo."<br>";
    }
}
?>
