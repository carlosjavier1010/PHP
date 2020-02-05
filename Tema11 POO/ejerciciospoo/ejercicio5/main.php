<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
   
<?php
    session_start();
    require_once 'Bombilla.php';
    $potencia;
    $ubicacion;
    if (isset($_SESSION['bombillas'])) {
        $bombillas = unserialize($_SESSION['bombillas']);
        
    }else {
        $bombillas = array();
    }
    var_dump(Bombilla::getGeneral());
    if (isset($_REQUEST['form'])) {
        $potencia = $_REQUEST['potencia'];
        $ubicacion = $_REQUEST['ubicacion'];

        $bombillas[] = new Bombilla($potencia,$ubicacion);
    }
    if (isset($_REQUEST['key'])) {
        $id = $_REQUEST['key'];
        if ($_REQUEST['estado']=="on") {
            $bombillas[$id]->setEstado(true);
        } else {
            $bombillas[$id]->setEstado(false);
        }
    }
    if (isset($_REQUEST['general'])) {
        
        if ($_REQUEST['general']=="on") {
            Bombilla::setGeneral(true);
        }else {
        Bombilla::setGeneral(false);
        }
         header('Location:main.php');
    }
    ?>
    
    
    <?php
    //PINTO LAS BOMBILLAS
    echo '<div class="container">';
    echo '<div class="row">';
    foreach ($bombillas as $key => $value) {
        
    
    ?>
    
    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
    <div class="card" style="width: 18rem;">
    <?php
        if ($value->getEstado() && Bombilla::getGeneral()) {
            echo '<img class="card-img-top" src="encendida.jpg" alt="Card image cap">';
        }else {
            echo '<img class="card-img-top" src="apagada.jpg" alt="Card image cap">';
        }
        ?>
        <div class="card-body">
        <h5 class="card-title">BOMBILLA</h5>
        <?php
        if (Bombilla::getGeneral()) {
            echo '<p class="card-text">'.$value->getPotenciaConsumida().'Kw</p>';
        } else {
            echo '<p class="card-text">0 Kw</p>';
        }
        
        ?>
        
        <p class="card-text"><?= $value->getUbicacion();?></p>
        <a href="main.php?estado=on&key=<?= $key ?>"><button type="button" class="btn btn-success">Encender</button></a>
        <a href="main.php?estado=off&key=<?= $key ?>"><button type="button" class="btn btn-danger">Apagar</button></a>
        </div>
        </div>
        </div>
        <?php
        
    }

    echo '</div></div>';
  

    //CREACION DE BOMBILLAS
    ?>
    <div class="container">
    <form action="main.php" method="POST">
  <div class="form-row">
  <div class="form-group">
      <label for="form"></label>
      <input type="hidden" class="form-control" name="form" id="form" placeholder="bici">
    </div>
    <div class="form-group col-md-6">
      <label for="modelo">Introduce Potencia Consumida:</label>
      <input type="number" class="form-control" name="potencia" id="potencia" placeholder="Potencia Consumida">
    </div>
    <div class="form-group col-md-6">
      <label for="color">Introduce Ubicacion:</label>
      <input type="text" class="form-control" name="ubicacion" id="ubicacion" placeholder="Ubicacion">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form></div>

<div class="container-fluid">
        <div class="row justify-content-center align-items-center">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: black;">
          <?php
            if (Bombilla::getGeneral()) {
                echo ' <p class="text-center" style="font-size: xx-large;color:white;margin: auto;">POTENCIA TOTAL:'.Bombilla::getPotenciaTotal().'Kw</p>';
            } else {
                echo ' <p class="text-center" style="font-size: xx-large;color:white;margin: auto;">POTENCIA TOTAL: 0 Kw</p>';            
            }
            
          ?>
            </div>
        </div>
      </div>
    <?php

    if (Bombilla::getGeneral()==true) {
        echo '<div class="container" style="margin:0 auto;">';
        echo '<a href="main.php?general=off"><button type="button" class="btn btn-danger">Apagar Interruptor General</button></a>';
        echo '</div>';
         
    }else {
        echo '<div class="container" style="margin:0 auto;">';
        echo '<a href="main.php?general=on"><button type="button" class="btn btn-success">Encender Interruptor General</button></a>';  
        echo '</div>';
    }

    $_SESSION['bombillas'] = serialize($bombillas);
?>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>