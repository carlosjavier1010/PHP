<?php
$palabras = array(
	'cama' => 'bed',
	'rojo' => 'red',
    'azul' => 'blue',
    'amarillo' => 'yellow',
    'verde' => 'green',
    'puerta' => 'door',
	'ordenador' => 'computer',
    'rosa' =>'pink',
    'lila' => 'purple',
    'casa' => 'house',
    'naranja' => 'orange',
	'ventana' => 'window',
    'llave' => 'key',
    'poder' => 'can',
    'papel' => 'paper',
    'habitacion' => 'room',
	'pescado' => 'fish',
    'cancion' => 'song',
    'caballo' => 'horse',
    'fuego' => 'fire',
    );
    foreach ($palabras as $key => $value) {
        echo($key."<br>");
    }
    if (!isset($_POST['palabra'])) {
        
    
    ?>
    <form action="ejercicio11.php" method="POST">
        Introduce una palabra en español de la lista:<input type="text" name="palabra">
        <input type="submit" value="Enviar">
    </form>
    <?php
    }else {
        $palabra = $_POST['palabra'];
        $palabra = strtolower($palabra);
        foreach ($palabras as $key => $value) {
        if ($palabra == $key) {
            echo ("La traducion a ingles de la palabra ".$palabra." es:".$value);
        }
    }
    }
?>