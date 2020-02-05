
    <?php
        function escribirTresNumeros($num1,$num2,$num3){
            $fp = fopen('datosEjercicio.txt','w+');
            fputs($fp,$num1."\n");
            fputs($fp,$num2."\n");
            fputs($fp,$num3);
            fclose($fp);
        }
        
        escribirTresNumeros(2,8,14);
 ?>