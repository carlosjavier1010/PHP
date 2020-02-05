<?php
    require_once 'Zona.php';

    session_start();
    if (!isset($_SESSION['zonas'])) {
        $zona = array();
        $zona[] = new Zona("Sala Principal",1000);
        $zona[] = new Zona("Compra Venta",200);
        $zona[] = new Zona("Vip",25);
    }else {
        $zona = unserialize($_SESSION['zonas']);
       
    }

    if (isset($_REQUEST['zona'])) {
        if ($_REQUEST['elegida']==0) {
            $respuesta = $zona[0]->vender($_REQUEST['cantidad']);
            
        }elseif ($_REQUEST['elegida']==1) {
            $respuesta = $zona[1]->vender($_REQUEST['cantidad']);
            
        }else {
            $respuesta = $zona[2]->vender($_REQUEST['cantidad']);
            
        }
        if ($respuesta) {
            echo '<script>alert("Entradas Vendidas satisfactoriamente.")</script>';
        }else {
            echo '<script>alert("No se pueden vender mas entradas de las disponibles.")</script>';
        }
    }
?>

    <!doctype html>
    <html lang="es">
      <head>
        <title>Campanillas</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      </head>
      <body>
          <?php
            for ($i=0; $i < count($zona); $i++) { 
                echo '<h1>'.$zona[$i].'</h1>';
            }
            
            
            
          ?>
          <form action="main.php" method="post">
              <input type="hidden" name="zona">
              <label for="elegida">Selecciona Zona</label>
              <select name="elegida" id="elegida">
                  <option value="0" selected>Principal</option>
                  <option value="1">Compra</option>
                  <option value="2">Vip</option>
              </select>
              <label for="cantidad">Introduce cantidad de entradas a vender:</label>
              <input type="number" name="cantidad" id="cantidad">
              <input type="submit" value="Vender Entradas">
          </form>

          <?php
                $_SESSION['zonas'] = serialize($zona);
          ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
    </html>
