<?php
    function generaArrayInt($minimo,$maximo){
        $azar = rand($minimo,$maximo);

        $miArray = [];
        for ($i=0; $i < $azar; $i++) { 
            array_push($miArray,0);
        }
       
        return $miArray;
    }

    function minimoArrayInt($array){
        $aux = 0;
        $minimo = PHP_INT_MAX;
        
        foreach ($array as $key ) {
            if ($key<$minimo) {
                $minimo = $key;
            }
        }
        return $minimo;
    }

    function maximoArrayInt($array){
        $aux = 0;
        $maximo = 0;
        
        foreach ($array as $key ) {
            if ($key>$maximo) {
                $maximo = $key;
            }
        }
        return $maximo;
    }

    function mediaArrayInt($array){
        $media = 0;
        
        foreach ($array as $key ) {
            $media += $key;
        }
        return $media/count($array);
    }

    function estaEnArrayInt($array,$num){
        $bandera = false;
        foreach ($array as $key) {
            if ($num == $key) {
                $bandera = true;
            }
        }
        if ($bandera) {
            echo "El numero indicado esta dentro del array";
        }else {
            echo "El numero indicado no esta dentro del array"; 
        }
    }

    function posicionEnArray($array,$num){
        $i=0;
        $aux = 0;
        foreach ($array as $key) {
            if ($key == $num) {
                $aux = $i;
            }
            $i++;
        }
        return $i;
    }

    function volteaArrayInt($array){

        $aux = [];

        for ($i=count($array)-1; $i >= 0; $i--) { 
            
            array_push($aux,$array[$i]);
        }
        return $aux;
    }

    function rotaDerechaArrayInt($array,$pos){
        
        $aux = [];

        for ($i=0; $i < count($array); $i++) { 
            array_push($aux,0);
        }   

        $contador = 0;

            for ($i=$pos; $i < count($array); $i++) { 
                $aux[$i] = $array[$contador];  
                $contador++;              
            }
            
            for ($i=0; $i < $pos; $i++) { 
              $aux[$i] = $array[$contador];
              $contador++;
            }

            return $aux;
    }

    function rotaIzquierdaArrayInt($array,$pos){
        
        $aux = [];

        for ($i=0; $i < count($array); $i++) { 
            array_push($aux,0);
        }   
        
        $contador = 0;
        //$array = volteaArrayInt($array);
        $pos = count($array) - $pos; //8

            for ($i=$pos; $i < count($array); $i++) { 
                $aux[$i] = $array[$contador];  
                $contador++;              
            }
            
            for ($i=0; $i < $pos; $i++) { 
              $aux[$i] = $array[$contador];
              $contador++;
            }

            //$aux = volteaArrayInt($aux);
            return $aux;
    }
    
?>

