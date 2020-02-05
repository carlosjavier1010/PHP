<?php
    include 'cabecera.html';
    session_start();
    $numeros = array();
    $contador = 0;
    $acertada = 0;
    $fallida = 0;
    if (!isset($_COOKIE['diccionario'])) {
        $diccionario = array(
            array('español'=> 'casa',
                  'ingles' => 'house'
                  ),
            array('español'=> 'verde',
                   'ingles'=> 'green'
                  ),
            array('español'=> 'rojo',
                  'ingles'=> 'red'
                  ),
            array('español'=> 'amarillo',
                  'ingles'=> 'yellow'
                  ),
            array('español'=> 'purpura',
                  'ingles'=> 'purple'
                  )
        );
    }

    if(isset($_COOKIE['diccionario'])) {
        $diccionario = unserialize($_COOKIE['diccionario']);

        foreach ($diccionario as $key => $value) {
            if (isset($_POST[$key]) && $_POST[$key]==$diccionario[$key]['español']) {
                $acertada++;
            }elseif (isset($_POST[$key]) && $_POST[$key]!=$diccionario[$key]['español']) {
                $fallida++;
            }
        }
        echo '<br>Total acertadas:'.$acertada.' Total falladas:'.$fallida."<br>";
    }

    while ($contador<5) {
        $numero = rand(0,count($diccionario)-1);
        if (!in_array($numero,$numeros)) {
            array_push($numeros,$numero);
            $contador++;
        }
    }
  
    //Cuestionario de 5 palabras al azar del diccionario de ingles.
    ?>
    <form action="ejercicio8.php" method="post">
    
    
    <?php
    foreach ($numeros as $key => $value) {
        echo 'Introduzca la palabra en español correspondiente a la palabra:'.$diccionario[$value]['ingles'].'<input type="text" name="'.$value.'"><br>';
        //var_dump($diccionario[$value]['ingles']);

        }
    echo '<input type="submit" value="Enviar">';
    echo '</form>';

    echo '<br><br><a href="altadiccionario.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Alta Nueva palabra</a>';
   

    $time = time() + (60 * 60);
    setcookie("diccionario",serialize($diccionario),$time);

    include 'pie.html';
?>