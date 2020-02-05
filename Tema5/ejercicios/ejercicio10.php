<?php

    $cartas = array(
	'As' => 11,
	'Tres' => 10,
    'Rey' => 4,
    'Caballo' => 3,
    'Sota' => 2,
    );
    
    $azar = [];
    $azarPalo = [];
    $carta = [];
    $aux = "";
    $puntuacion = 0;

    for ($i=0; $i < 10; $i++) { 
        array_push($azarPalo,rand(1,4));
    }

    for ($i=0; $i < 10 ; $i++) { 
        array_push($azar,rand(1,12));
    }

    for ($i=0; $i < 10; $i++) { 
        for ($j=0; $j < 10 ; $j++) { 
            if ($j != $i) {
                if ($azarPalo[$i] == $azarPalo[$j] && $azar[$i] == $azar[$j]) {
                    $azar[$j] = rand(1,12);

                    while ($azarPalo[$i] == $azarPalo[$j] && $azar[$i] == $azar[$j]) {
                       $azar[$j] = rand(1,12);
                    }
                    
                }
            }
        }
    }

    for ($i=0; $i < 10; $i++) { 
        if ($azarPalo[$i] == 1) {
            $aux = "bastos";
        }elseif ($azarPalo[$i] == 2) {
            $aux = "copa";
        }elseif ($azarPalo[$i] == 3) {
            $aux = "espada";
        }else {
            $aux = "oro";
        }
        $carta[$i] = "".$azar[$i]." de ".$aux;
    }

    for ($i=0; $i < 10; $i++) { 
        
           
                foreach ($cartas as $key => $value) {
                    
                    if ($key == 'As' && $azar[$i]==1) {
                        $auxiliar = $value;
                        $puntuacion = $puntuacion + $auxiliar;
                        echo("Puntua As:".$value." / ");
                    }
                    if ($key == 'Tres' && $azar[$i]==3) {
                        $auxiliar = $value;
                        $puntuacion = $puntuacion + $auxiliar;
                        echo("Puntua Tres:".$value." / ");
                    }
                    if ($key == 'Rey' && $azar[$i]==12) {
                        $auxiliar = $value;
                        $puntuacion = $puntuacion + $auxiliar;
                        echo("Puntua Rey:".$value." / ");
                    }
                    if ($key == 'Caballo' && $azar[$i]==11) {
                        $auxiliar = $value;
                        $puntuacion = $puntuacion + $auxiliar;
                        echo("Puntua Caballo:".$value." / ");
                    }
                    if ($key == 'Sota' && $azar[$i]==10) {
                        $auxiliar = $value;
                        $puntuacion = $puntuacion + $auxiliar;
                        echo("Puntua Sota:".$value." / ");
                    }
                }       
            
        
    }
echo "<br>";
    foreach ($carta as $key) {
        echo $key."<br>";
    }

    echo ("Puntuacion:".$puntuacion);
    
?>