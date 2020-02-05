<?php
    include 'cabecera.html';
    session_start();
    //ficheros
    $fp = fopen("productos.txt","r");
    $linea = fgets($fp);
    
    //cookie carrito
    $aCarrito = array();
    $bandera = false;
    // Obtengo productos anteriores que existan.
    if(isset($_COOKIE['carrito'])) {
        $aCarrito = unserialize($_COOKIE['carrito']);
    }
    //cookie productos sustituido por fichero
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
     //Añado nuevo producto al carrito
     if(isset($_GET['descripcion']) && isset($_GET['precio']) && isset($_GET['imagen']) && !isset($_GET['desE'])) {
        //Comprobamos si el articulo a añadir ya existe en nuestro carrito, así solo incrementaremos unicamente la unidad.
       if (count($aCarrito)>0) {
        foreach ($aCarrito as $key => $value) {
            if ($value['descripcion']==$_GET['descripcion']) {
               $aCarrito[$key]['cantidad']++;
               $bandera=true;
            }
        }
       }
       if ($bandera==false) {
        $iUltimaPos = count($aCarrito);
        $aCarrito[$iUltimaPos]['descripcion'] = $_GET['descripcion'];
        $aCarrito[$iUltimaPos]['precio'] = $_GET['precio'];
        $aCarrito[$iUltimaPos]['imagen'] = $_GET['imagen'];
        $aCarrito[$iUltimaPos]['cantidad'] = 1;
        
       }
       
       
        
    }

    $time = time() + (60 * 60);
    //dsfdsf
    setcookie('carrito', serialize($aCarrito), $time);

    //imprimimos el contenido del array
    if (isset($_SESSION['user'])) {
        echo "<h1>Carrito de la compra</h1>";

    echo '<table class="table table-striped table-dark position-relative">';
    echo '<thead>
      <tr>
      <th scope="col">Articulo Nº</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Precio</th>
        <th scope="col">Cantidad</th>
        
      </tr>
    </thead>';

    echo '<tbody>';
    $i = 0;
    //Calculo el total del carrito en cada momento.
    $totalCarro = 0;
    foreach ($aCarrito as $key => $value) {
        $totalCarro += $value['precio']*$value['cantidad'];
    }
    foreach ($aCarrito as $key => $value) {
        echo '<tr>
        <th scope="row">'.($i+1).'</th>
        <td>'.$value['descripcion'].'</td>
        <td>'.$value['precio'].'€</td>
        <td>'.$value['cantidad'].'</td>
        <td><img src="'.$value['imagen'].'" width="50px"></td>
        </tr>';

        $i++;
    }
    }
    
    echo '</tbody></table>';



  echo '<table class="table table-striped table-dark col-sm-2 position-relative" align="right">';
    echo '<thead>
      <tr>
      <th scope="col" width="30%">Total: '.$totalCarro.'€</th>
      </tr>
    </thead>';

    echo '<tbody>';
    
    echo '</tbody></table>';
    if (!isset($_SESSION['user'])) {
        ?>
        <form action="cerrarsesion.php" method="POST">
            <input type="submit" name="cerrar" value="cerrar">
        </form>
        <form action="ejercicio5login.php" method="POST">
            Usuario:<input type="text" name="user">
            Contraseña:<input type="password" name="pass">
            <input type="submit" name="login" value="Iniciar Sesion">
        </form>
        <?php
    }else {
        ?>
        <div class="container-fluid" display="block">
        <form action="ejercicio5login.php" method="POST">
            <input type="submit" name="unset" value="Cerrar Sesión" style="margin-top:3%;">
        </form>
        <?php
        
        
        echo '<div class="row">';
        foreach ($productos as $key => $producto) {
           //var_dump($producto['descripcion']).".<br>";
           //var_dump("<br>".$_GET['descripcion']).".<br>";
           $prueba = "".$producto['descripcion'];
           //var_dump($prueba."<br>");
           //var_dump("<br>".$_GET['descripcion'])."<br>";
           if (trim($prueba) == $_GET['descripcion']) {
            echo '
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">'."GROW SHOP".'</h5>
                  <p class="card-text">'.$producto['descripcion'].'</p>
                  <p class="card-text">'.$producto['desE'].'</p>
                  <p class="card-text">'.$producto['precio'].'€</p>
                  
                  
                </div>
                <div class="text-center">
                <img src="'.$producto['imagen'].'" alt="" class="img w-40 h-40">
                </div>';
                echo '<a href="ejercicio13d.php?descripcion='.trim($producto['descripcion']).'&precio='.trim($producto['precio']).'&imagen='.trim($producto['imagen']).'" class="btn btn-primary">Añadir al carro</a>';
                echo '<a href="ejercicio13.php" class="btn btn-dark">Volver al Catalogo de Productos</a>';
             echo' </div>
            </div>
          ';
           }
          
        }
        echo '</div></div>';
    }
    fclose($fp);
    include 'pie.html';
?>

