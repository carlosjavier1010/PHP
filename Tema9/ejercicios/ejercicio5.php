<?php
    function escribirNumerosMod($array,$tipo){

        if ($tipo == "sobreescribir") {
            $fp = fopen("datosEjercicio.txt","w+");
            for ($i=0; $i < count($array); $i++) { 
                fputs($fp,$array[$i]."\n");
            }
               fclose($fp); 
            
        
        }else if($tipo == "ampliar"){
            $fp = fopen("datosEjercicio.txt","a");
            for ($i=0; $i < count($array); $i++) { 
                fputs($fp,$array[$i]."\n");
            }
               fclose($fp); 
        } 
        else {
            echo "El tipo indicado no es correcto.";
        }

    }

    //$miArray = array(5,9,3,22);
    //escribirNumerosMod($miArray,"ampliar");
    
?>