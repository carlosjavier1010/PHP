<?php
    $valor = $_POST['dia'];
    $esTexto =  is_string($valor);
    $bandera = false;
   if ($esTexto) {
       $esTexto = $valor;
      if ($esTexto == "Lunes" || $esTexto == "lunes" || $esTexto == "LUNES") {
          echo "El día 1 de la semana (Lunes) a primera hora tenemos EIE.";
          $bandera = true;
      }
      if ($esTexto == "Martes" || $esTexto == "martes" || $esTexto == "MARTES") {
        echo "El día 2 de la semana (Martes) a primera hora tenemos DIW.";
        $bandera = true;
    }
    if ($esTexto == "Miercoles" || $esTexto == "miercoles" || $esTexto == "MIERCOLES") {
        echo "El día 3 de la semana (Miercoles) a primera hora tenemos DWES.";
        $bandera = true;
    }
    if ($esTexto == "Jueves" || $esTexto == "jueves" || $esTexto == "JUEVES") {
        echo "El día 4 de la semana (Jueves) a primera hora tenemos DWEC.";
        $bandera = true;
    }
    if ($esTexto == "Viernes" || $esTexto == "viernes" || $esTexto == "VIERNES") {
        echo "El día 5 de la semana (Viernes) a primera hora tenemos LC.";
        $bandera = true;
    }}
    if ($esTexto) { 
        $valor = (int)($valor);
        if ($valor == 1) {
         echo "El día 1 de la semana (Lunes) a primera hora tenemos EIE.";
         $bandera = true;
        }
        if ($valor == 2) {
         echo "El día 2 de la semana (Martes) a primera hora tenemos DIW.";
         $bandera = true;
        }
        if ($valor == 3) {
         echo "El día 3 de la semana (Miercoles) a primera hora tenemos DWES.";
         $bandera = true;
        }
        if ($valor == 4) {
         echo "El día 4 de la semana (Jueves) a primera hora tenemos DWEC.";
         $bandera = true;
        }
        if ($valor == 5) {
         echo "El día 5 de la semana (Viernes) a primera hora tenemos LC.";
         $bandera = true;
        }
        
   }

   if ($bandera == false) {
       echo "Error en la introducion de caracteres, o esta aplicacion no los reconoce.."; 
      }
?>