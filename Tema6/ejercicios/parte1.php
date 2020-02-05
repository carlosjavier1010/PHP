<?php

    function esCapicua($num){

        $num = intval($num); 
        $aux = 0;
        $inverso = 0;
        $cifra = 0;
    
        $aux = $num;

        while($aux > 0.5){
            $cifra = $aux % 10;
            //echo "cifra:".$cifra."<br>";
            $inverso = ($inverso * 10) + $cifra;
            //echo "inverso:".$inverso."<br>";
            $aux = $aux / 10;
            //echo "aux:".$aux."<br>";
         }
           
            if ($num == $inverso) {
                return true;
            } else {
                return false;
            }
            
           
    }

    function esPrimo($num){

       
        $contador = 0;

        for ($i=1; $i < 200; $i++) { 
            if ($num % $i == 0) {
                $contador++;
                
            } 
        }

        if ($contador == 2) {
            return true;
        } else {
            return false;
        }
        
    }

    function siguientePrimo($num){

        $num++;

        while (esPrimo($num)==false) {
            $num++;
        }
        return $num;
    }

    function potencia($base,$exponente){
        $potencia = pow($base,$exponente);
        return $potencia;
    }

    function digitos($num){
        $aux = $num;
        $contador = 0;
        while($aux > 1){
           $aux = $aux / 10;
           $contador++;
        }
        return $contador;
    }

    function voltea($num){
        $num = intval($num); 
        $aux = 0;
        $inverso = 0;
        $cifra = 0;
    
        $aux = $num;

        while($aux > 0.5){
            $cifra = $aux % 10;
            //echo "cifra:".$cifra."<br>";
            $inverso = ($inverso * 10) + $cifra;
            //echo "inverso:".$inverso."<br>";
            $aux = $aux / 10;
            //echo "aux:".$aux."<br>";
         }
           
            return $inverso;
    }

    function digitoN($n,$x){ 
        
        $n = voltea($n);

        while ($x > 0) {
          $n = $n / 10;
          $x--;
        }
    
        return (int)$n % 10;

    }
     
    function posicionDeDigito($x,$d){
         $i = 0;

        for ($i = 0; ($i < digitos($x)) && (digitoN($x, $i) != $d); $i++) {

        };
    
        if ($i == digitos($x)) {
          return -1;
        } else {
          return $i;
        }
      }
    
    function quitaPorDetras($num,$digitos){
        for ($i=0; $i < $digitos; $i++) { 
            $num = $num /10;
            $num = intval($num);
        }
        return $num;
    }

    function quitarPorDelante($num,$digitos){
        
        $num = voltea($num);
        $num = quitaPorDetras($num,$digitos);
        $num = voltea($num);
        return $num;

    }

    function pegaPorDetras($num,$digito){
        $texto = "".$num;
        $texto = "".$num.$digito;
        $num = intval($texto);
        return $num;
    }

    function pegaPorDelante($num,$digito){
        $num = voltea($num);
        $num = pegaPorDetras($num,$digito);
        $num = voltea($num);
        return $num;
    }

    function trozoDeNumero($num,$inicial,$final){
        $num = quitarPorDelante($num,$inicial);
        $num = quitaPorDetras($num,$final);
        return $num;
    }

    function juntaNumeros($num1,$num2){
        $num = "".$num1.$num2;
        $num = intval($num);
        return $num;

    }

    function decimalBinario($decimal){
        if ($decimal == 0) {
            return 0;
          }
            
          $binario = 1;
          
          while ($decimal > 1) {
            $binario = pegaPorDetras($binario, $decimal % 2);
            $decimal = $decimal / 2;
          }
          
          $binario = voltea($binario);
          $binario = quitaPorDetras($binario, 1);
          
          return $binario;
    }

    