<?php
    require_once('parte2.php');

    function generaArrayBiInt($n,$m,$minimo,$maximo){
        $miArray = array();
        for ($i=0; $i < $n; $i++) { 
            for ($j=0; $j < $m; $j++) { 
                $miArray[$i][$j] = rand($minimo,$maximo);
            }
        }
        return $miArray;
    }

    function filaDeArrayBiInt($array,$fila){
        $filaArray = array();
       // echo "contador array:".count($array)."<br><br><br>";
        for ($i=0; $i < count($array); $i++) { 
           array_push($filaArray,$array[$fila][$i]);
        }
        return $filaArray;
    }

    function columnaDeArrayBiInt($array,$columna){
        $filaArray = array();
        $contador = 0;

       // echo "contador array:".count($array)."<br><br><br>";

        foreach ($array as $key) {
            $contador++;
            
        }
        
        for ($i=0; $i < $contador; $i++) { 
            for ($j=0; $j < count($array); $j++) { 
                if ($j==$columna) {
                    array_push($filaArray,$array[$i][$j]);
                }
            }
        }
       
        return $filaArray;
    }

    function coordenadasEnArrayBiInt($array,$num){

        $contador = 0;
        $aux = [];
        $encontrado = false;
        foreach ($array as $key) {
            $contador++;
            
        }

        for ($i=0; $i < $contador; $i++) { 
            for ($j=0; $j < count($array); $j++) { 
                if ($array[$i][$j]==$num) {
                    array_push($aux,$i);
                    array_push($aux,$j);
                    $encontrado = true;
                }
            }
               
        }

        if ($encontrado==false) {
            array_push($aux,-1);
            array_push($aux,-1);
        }
        return $aux;
    }

    function esPuntoDeSilla($array,$fila,$columna){
        
        $filaAux = filaDeArrayBiInt($array,$fila);
        $columnaAux = columnaDeArrayBiInt($array,$columna);

        $minimoFila = minimoArrayInt($filaAux);
        $maximoFila = maximoArrayInt($columnaAux);

        if ($minimoFila == $array[$fila][$columna] && $maximoFila == $array[$fila][$columna]) {
            return $array[$fila][$columna];
        }else {
            return -1;
        }
    }

    function diagonal(){

    }
?>