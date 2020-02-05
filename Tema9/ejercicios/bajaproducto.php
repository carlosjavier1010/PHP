    <?php
    include 'cabecera.html';
    session_start();
    if (file_exists("productos.txt")) {
            
        $fp = fopen("productos.txt","r");//leer lo que tenga
        $productos = array();
        $contador = 0;
        while (!feof($fp)) {
            
                
                $productos[$contador]['descripcion'] = fgets($fp);
                $productos[$contador]['precio'] = fgets($fp);
                $productos[$contador]['imagen'] = fgets($fp);
                $productos[$contador]['desE'] = fgets($fp);
                $contador++;
            
        }
        
        //var_dump($productos);
       
    }
    ?>
    <h1>BAJA DE PRODUCTOS</h1>
<form action="ejercicio13.php" method="get">
    <select class="custom-select" name="descBaja">
    <?php
 echo '<option>Open this select menu</option>';

        foreach ($productos as $key => $value) {
           echo '<option  value="'.$key.'">'.$value['descripcion'].'</option>';
        }
        ?>
        

  ?>
  </select>
  <button type="submit" class="btn btn-primary">Baja de Producto</button>
    </form>
<?php
include 'pie.html';
?>