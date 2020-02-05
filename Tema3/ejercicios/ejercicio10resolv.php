<?php

    $dia = $_POST['dia'];
    $mes = $_POST['mes'];

    $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
    $banderaMes = false;

   for ($i=0; $i < 12 ; $i++) { 
       if ($i==$mes) {
           $mes = $meses[$i-1];
           $banderaMes = true;
       }
   }

    if ($banderaMes==true) {
        
        switch ($mes) {
            case 'Enero':
                if ($dia>=21 && $dia <=31) {
                    echo "Tu horoscopo es: Acuario.";
                }else {
                    echo "Tu horoscopo es: Capricornio.";
                }
                break;
            case 'Febrero':
                    if ($dia>=20) {
                    echo "Tu horoscopo es: Piscis.";
                    }
                break;
            case 'Marzo':
                    if ($dia<=20) {
                    echo "Tu horoscopo es: Piscis.";
                    }else {
                    echo "Tu horoscopo es: Aries.";
                    }
                break;
            case 'Abril':
                if ($dia<=20) {
                    echo "Tu horoscopo es: Aries.";
                }else {
                    echo "Tu horoscopo es: Tauro.";
                }
                break;
            case 'Mayo':
                if ($dia<=21) {
                    echo "Tu horoscopo es: Tauro.";
                }else {
                    echo "Tu horoscopo es: Geminis.";
                }
                break;
                
            case 'Junio':
                if ($dia<=21) {
                    echo "Tu horoscopo es: Geminis.";
                }else {
                    echo "Tu horoscopo es: Cancer.";
                }
                break;
            case 'Julio':
                if ($dia<=23) {
                    echo "Tu horoscopo es: Cancer.";
                }else {
                    echo "Tu horoscopo es: Leo.";
                }
                break;
            case 'Agosto':
                if ($dia<=23) {
                    echo "Tu horoscopo es: Leo.";
                }else {
                    echo "Tu horoscopo es: Virgo.";
                }
                break;
            case 'Septiembre':
                if ($dia<=23) {
                    echo "Tu horoscopo es: Virgo.";
                }else {
                    echo "Tu horoscopo es: Libra.";
                }
                break;
            case 'Octubre':
                if ($dia <=23) {
                    echo "Tu horoscopo es: Libra.";
                }else {
                    echo "Tu horoscopo es: Escorpio.";
                }
                break;
            case 'Noviembre':
                if ($dia <=22) {
                    echo "Tu horoscopo es: Escorpio.";
                }else {
                    echo "Tu horoscopo es: Sagitario.";
                }
                break;
            case 'Diciembre':
                if ($dia <=21) {
                    echo "Tu horoscopo es: Sagitario.";
                }else {
                    echo "Tu horoscopo es: Capricornio.";
                }
                break;
            default:
                    echo "No se ha podido realizar la consulta.";
                break;
        }
    }else {
                 echo "No se ha podido realizar la consulta.";
    }

?>