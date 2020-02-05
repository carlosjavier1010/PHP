    <?php
    include 'cabecera.html';
    session_start();
    if(isset($_COOKIE['productos'])) {
        $productos = unserialize($_COOKIE['productos']);
    }
    ?>
    <h1>BAJA DE PRODUCTOS</h1>
<form action="ejercicio5.php" method="get">
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