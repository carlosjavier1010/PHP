   <?php
    include 'cabecera.html';
    session_start();
    $time = time() + (60 * 60);
    if(isset($_COOKIE['productos'])) {
        $productos = unserialize($_COOKIE['productos']);
    }
    ?>
 
    <?php
    if (!isset($_GET['descMod']) && !isset($_GET['modDesc'] )) {
       echo'<h1>MODIFICACION DE PRODUCTOS</h1>
        <form action="modificacion.php" method="get">
            <select class="custom-select" name="descMod">
        <option>Open this select menu</option>';

        foreach ($productos as $key => $value) {
           echo '<option  value="'.$value['descripcion'].'">'.$value['descripcion'].'</option>';
        }
    
        ?>
        

  ?>
  </select>
  
  <button type="submit" class="btn btn-primary">Modificar el producto seleccionado(IR AL FORMULARIO PARA SU MODIFICACION)</button>
    </form>
<?php
    }elseif(isset($_GET['descMod'])) {
            foreach ($productos as $key => $value) {
               
                echo '<form action="modificacion.php" method="get">';
               
               if ($value['descripcion']==$_GET['descMod']) {
                echo "Vamos a modificar el producto:".$value['descripcion'];
                   echo'<div class="form-row">
                   <div class="form-group col-md-6">
                     <label for="inputEmail4">Titulo producto</label>
                     <input type="text" class="form-control" id="inputEmail4" placeholder="Titulo Producto" name="modDesc">
                   </div>
                   <div class="form-group col-md-6">
                     <label for="inputPassword4">Precio producto</label>
                     <input type="number" step="0.01" class="form-control" id="inputPassword4" placeholder="Precio del producto" name="modPrec">
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="inputAddress">Imagen del producto</label>
                   <input type="file" class="form-control" id="inputAddress" placeholder="Imagen del producto" name="modImg">
                 </div>
                 <div class="form-group">
                   <label for="inputAddress2">Descripcion Exhaustiva</label>
                   <input type="text" class="form-control" id="inputAddress2" placeholder="Descripcion Exhaustiva" name="modDesE">
                 </div>
                
                  
                   <input type="hidden" name="modDescN" value="'.$value['descripcion'].'">
                 
                 <button type="submit" class="btn btn-primary">Modificar Producto</button>
                   </form>';
               }
             }
        }
        
            if (isset($_GET['modDesc'])) {
                foreach ($productos as $key => $value) {
                    if ($value['descripcion']==$_GET['modDescN']) {
                        
                        $productos[$key]['descripcion'] = $_GET['modDesc'];
                        $productos[$key]['precio'] = $_GET['modPrec'];
                        $productos[$key]['imagen'] = $_GET['modImg'];
                        $productos[$key]['desE'] = $_GET['modDesE'];
                        header('Location:ejercicio6.php?descripcion='.$_GET['modDesc'].'&precio='.$_GET['modPrec'].'&imagen='.$_GET['modImg'].'&desE='.$_GET['modDese'].'');
                    }
                    
                }
                
               
            }
        
            setcookie('productos',serialize($productos),$time);
            include 'pie.html';
?>