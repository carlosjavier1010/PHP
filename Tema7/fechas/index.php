<?php

    //timestamp es el formato usado para fechas, que cuenta la cantidad de segundos desde 1 enero 1970 hasta x fecha

    //para obtener el valor de timestamp usamos time(), nos devuelve la cantidad de segundos desde 1970 hasta que es ejecutado. Ejemplo:

        $ahora = time();
        echo ("ahora time".$ahora);

        
//timestamp a formato mas humano
        echo "<br>";
        //ejemplo de imprimir dia mes y año actual
        echo ("Hoy es ".date("d")." de ".date("m")." de ".date("Y"));

        echo "<br>";

        //usando un valor timestamp, es decir un valor en segundos desde 1970.... pasarlo a formato hora
        $hora = date("H:i:s:d:m:Y",1451606399); //con esto sacamos la hora, minutos,segundos,dia,mes y año de un valor timestamp
        echo $hora;

        //de dia mes y año a valor de timestamp
        echo "<br>";

        $navidad = mktime(23,59,59,12,24,2020);
        echo "La navidad de 2020 sucederá en el instante:".$navidad." Valor en timestamp segundos";

        //de valor de timestamp a dia mes y año
        echo "<br>";
        $diamesano = date("d/m/Y",$navidad);
        echo "Fecha de navidad 2020 es:".$diamesano;

        echo "<br>";
        //RESUMEN:
        //CON DATE SACAMOS LA HORA MINUTOS Y SEGUNDOS, APARTE EL DIA MES Y AÑO TAMBIEN: ejemplo
        $hora = date("H:i:s:d/m/Y",$navidad); //con esto sacamos la hora, minutos,segundos,dia,mes y año de un valor timestamp
        echo $hora;
        
        echo "<br>";
        //CON mktime SACAMOS EL VALOR TIMESTAMP de CIERTA HORA,MINUTOS,SEGUNDOS,DIA,MES Y AÑO (FECHA COMPLETA) ejemplo:
        $navidad = mktime(23,59,59,12,24,2020);
        echo "La navidad de 2020 sucederá en el instante:".$navidad." Valor en timestamp segundos";

        
?>