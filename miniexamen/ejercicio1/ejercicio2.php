<?php
    session_start();
    include 'cabecera.html';
    if (file_exists("mascotas.txt")) {
        # code...
    
    $fp = fopen("mascotas.txt","r");
    echo '<form action="ejercicio2.php" method="post"><div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select class="form-control" id="exampleFormControlSelect1" name="opcion">';
    while (!feof($fp)) {
        $linea = trim(fgets($fp));

        if(substr($linea,0,1)=="#"){
            echo '<option>'.$linea.'</option>';
      
    
        }
    }
    echo '</select>
    </div><input type="submit" value="Mostrar mascotas de la fecha seleccionada"></form>';

    if (isset($_POST['opcion'])) {
        
        rewind($fp);
        $linea = fgets($fp);
        
        $bandera = false;
        while (!feof($fp) && $bandera == false) { //recorro hasta llegar con el fgets a la fecha indicada
            if (trim($_POST['opcion']) == trim($linea)) {
              
                $bandera = true;
                
               
        }
        $linea = fgets($fp);
    }
    //ahora recorro con fgets el archivo y voy imprimiendo las lineas mientras la bandera sea true
    //en cuanto llegue a una linea que empieze por almohadilla pues la bandera se pondra en false y dejara de imprimir
    //en el ultimo if dentro del while, es porque siempre la ultima linea apunta al end of file, por tanto no me
    //imprime la ultima linea, entonces cuando lea una linea que contena el end of file pues que me imprima esa ultima linea
    //que contendrá un linea de mascota.
    while(!feof($fp) && $bandera==true){
        if ($bandera == true) {
                    
            echo $linea;
            
           
        }
        $linea = fgets($fp);
        //echo "<br>Soy linea fgets".$linea;
        if(substr(trim($linea),0,1)=="#"){
            $bandera = false;
            
        }
        if (feof($fp)) {
            echo $linea;
        }
    }
   
    }
  fclose($fp);
  include 'pie.html';
}else {
    echo "no existe el archivo mascotas, por lo que no podemos rescatar mascotas de ninguna fecha.";
}
?>