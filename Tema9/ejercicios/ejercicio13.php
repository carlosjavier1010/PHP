<?php
    include 'cabecera.html';
    session_start();

    
        //ficheros
        if (file_exists("productos.txt")) {
            
            $fp = fopen("productos.txt","r");//leer lo que tenga
            $fpp = fopen("productos.txt","r");
            $productos = array();
            $contador = 0;
            while (!feof($fp)) {
                
                    if (fgets($fpp) != "\n") {
                        $productos[$contador]['descripcion'] = fgets($fp);
                        $productos[$contador]['precio'] = fgets($fp);
                        $productos[$contador]['imagen'] = fgets($fp);
                        $productos[$contador]['desE'] = fgets($fp);
                        $contador++;
                    }
                    
                
            }
            
            //var_dump($productos);
           
        }
        
       
   
    
    //Productos añadidos por defecto, NO SE PODRAN ELIMINAR.. 
   
    if (!file_exists("productos.txt")) {
        
        $productos = array(
            array('descripcion'=> 'AFGHAN SKUN FEMINIZADA DE CALIDAD.',
                  'precio' => 3.20,
                  'imagen' => 'img1.jpg',
                  'desE'   => 'Afghan Skunk de Advanced Seeds es una planta.'
                ),
            array('descripcion'=> 'FAST FOOD AUTOFLOWERING.',
                  'precio' => 3.40,
                  'imagen' => 'img2.jpg',
                  'desE'   => 'FastFood Orgánico de BAC es un fertilizante todo en 1 para tus plantas autoflorecientes.'
                ),
            array('descripcion'=> 'AMNESIA FEMINIZADA DE CALIDAD.',
                  'precio' => 3.60,
                  'imagen' => 'img3.jpg',
                   'desE'  => 'Amnesia 100% feminizada a granel es una variedad despierta'
                ),
            array('descripcion'=> 'FOLIAR SPRAY 120ml.',
                  'precio' => 3.80,
                  'imagen' => 'img4.jpg',
                  'desE'   => 'Foliar Spray de BAC fortificará tus plantas'
                )
        );
       //ficheros
       //var_dump($productos);
        $fpw = fopen("productos.txt","w"); //escribir todo desde 0
        foreach ($productos as $key => $value) {
            if ($key==0) {
            fputs($fpw,$value['descripcion']);
            fputs($fpw,"\n".$value['precio']);
            fputs($fpw,"\n".$value['imagen']);
            fputs($fpw,"\n".$value['desE']);
            }else {
            fputs($fpw,"\n".$value['descripcion']);
            fputs($fpw,"\n".$value['precio']);
            fputs($fpw,"\n".$value['imagen']);
            fputs($fpw,"\n".$value['desE']);
            }
        }
        
    }
    
    $aCarrito = array();
    $bandera = false;
    // Obtengo productos anteriores que existan.
    if(isset($_COOKIE['carrito'])) {
        $aCarrito = unserialize($_COOKIE['carrito']);
    }
  
    //echo "count carro:".count($aCarrito);
    
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

    //Alta /BAJA /MODIFICACION de productos
    
    
    
    //El tiempo para las cookies de abajo
    $time = time() + (60 * 60);
    $banderaProductos = false;
    if (isset($_GET['altaDesc']) && $_GET['altaPrec'] && $_GET['altaImg'] && $_GET['altaDesE']) {
        foreach ($productos as $key => $value) {
            if (trim($_GET['altaDesc']) == trim($value['descripcion'])) {
                $banderaProductos = true;
            }
        }
        if ($banderaProductos == false) {
            $fpw = fopen("productos.txt","a");
            $countArray = count($productos);
            
            
            fputs($fpw,"\n".trim($_GET['altaDesc']));
            fputs($fpw,"\n".trim($_GET['altaPrec']));
            fputs($fpw,"\n".trim($_GET['altaImg']));
            fputs($fpw,"\n".trim($_GET['altaDesE']));
            $productos[$countArray]['descripcion'] =$_GET['altaDesc'];
            $productos[$countArray]['precio'] = $_GET['altaPrec'];
            $productos[$countArray]['imagen'] = $_GET['altaImg'];
            $productos[$countArray]['desE'] = $_GET['altaDesE'];

        }
        
        
        
    }
    //DAR DE BAJA UN PRODUCTO, BORRAMOS EL INDICE DEL PRODUCTO SELECCIONADO EN BAJAPRODUCTO.PHP, ya que descbaja contiene el indice del array del producto seleccionado a borrar.
    if (isset($_GET['descBaja'])) {
        $fpwb = fopen("productos.txt","w");
        foreach ($productos as $key => $value) {
            
                if ($key == $_GET['descBaja']) {
                    unset($productos[$key]);
                }
                    
                  
               
           
            }

            foreach ($productos as $key => $value) {
                    fwrite($fpwb,$value['descripcion']);
                    fwrite($fpwb,$value['precio']);
                    fwrite($fpwb,$value['imagen']);
                    fwrite($fpwb,$value['desE']);
            }
            
            //var_dump($productos); 
        }

        
    


    //Como ya he agregado los nuevos productos al array o aumentado su cantidad en caso de que exista, pues añado el array "serializo" en la cookie(string)
   
    setcookie('carrito', serialize($aCarrito), $time);

    //imprimimos el contenido del array
    if (isset($_SESSION['user'])) {
        echo '<a href="altaproducto.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Alta Nuevo Producto</a>';
    echo '<a href="bajaproducto.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Baja Producto</a>';
    echo '<a href="modificacion.php" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">Modificacion Producto</a>';
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
    
    echo '</tbody></table>';



  echo '<table class="table table-striped table-dark col-sm-2 position-relative" align="right">';
    echo '<thead>
      <tr>
      <th scope="col" width="30%">Total: '.$totalCarro.'€</th>
      </tr>
    </thead>';

    echo '<tbody>';
    
    echo '</tbody></table>';
}
    //var_dump($_SESSION['user']);
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
           if ($producto['descripcion'] != "") {
               
           
           echo '
           <div class="col-sm-6">
             <div class="card">
               <div class="card-body">
                 <h5 class="card-title">'."GROW SHOP".'</h5>
                 <p class="card-text">'.$producto['descripcion'].'</p>
                 <p class="card-text">'.$producto['precio'].'€</p>
                 
                 
               </div>
               <div class="text-center">
               <img src="'.$producto['imagen'].'" alt="" class="img w-40 h-40">
               </div>';
               echo '<a href="ejercicio13.php?descripcion='.$producto['descripcion'].'&precio='.$producto['precio'].'&imagen='.$producto['imagen'].'" class="btn btn-primary">Comprar</a>';
               echo '<a href="ejercicio13d.php?descripcion='.$producto['descripcion'].'&precio='.$producto['precio'].'&imagen='.$producto['imagen'].'&desE='.$producto['desE'].'" class="btn btn-dark">Ver Detalles del producto</a>';
            echo' </div>
           </div>
         ';
        }
    }
        echo '</div></div>';
    }
 
        if (isset($fp)) {
            fclose($fp);
        }
        if (isset($fpw)) {
            fclose($fpw);
        }
        if (isset($fpwb)) {
            fclose($fpwb);
        }
        if (isset($fpp)) {
            fclose($fpp);
        }
   
    include 'pie.html';
?>