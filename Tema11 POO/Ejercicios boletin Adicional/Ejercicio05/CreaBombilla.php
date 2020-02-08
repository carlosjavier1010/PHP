<?php 
	include_once 'Bombilla.php';
	if (isset($_POST['nuevaBombilla'])) {
		$_SESSION['bombillas'][]=serialize(new Bombilla($_POST['nuevaBombilla']['estaEncendida'], $_POST['nuevaBombilla']['potencia'], $_POST['nuevaBombilla']['nombre']));
	}
	header('Location:Prueba.php');
 ?>