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
    <form action="ejercicio12.php" method="POST">
        <br>
        Introduce una palabra en español de la lista:<input type="text" name="palabra[]"><br>
        Introduce una palabra en español de la lista:<input type="text" name="palabra[]"><br>
        Introduce una palabra en español de la lista:<input type="text" name="palabra[]"><br>
        Introduce una palabra en español de la lista:<input type="text" name="palabra[]"><br>
        Introduce una palabra en español de la lista:<input type="text" name="palabra[]"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    }else {
        $palabra = $_POST['palabra'];
        
        for ($i=0; $i < 5; $i++) { 
            $palabra[$i] = strtolower($palabra[$i]);
        }

        foreach ($palabras as $key => $value) {
            foreach ($palabra as $dato) {
              
        if ($dato == $key) {
            echo ("La traducion a ingles de la palabra ".$dato." es:".$value."<br>");
        }
    }
    }
    }
?>