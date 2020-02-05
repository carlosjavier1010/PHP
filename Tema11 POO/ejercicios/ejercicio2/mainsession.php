<?php
session_start();
    ?>
    <!doctype html>
    <html lang="es">
      <head>
        <title>Vehiculos</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      </head>
      <body>
    <?php
    
    require_once 'Bicicleta.php';
    require_once 'Coche.php';
    
    if (!isset($_SESSION['bici'])) {
        $bici = array();
        
    }else {
        $bici = unserialize($_SESSION['bici']);
        if (isset($_POST['bici'])) {
          //Bicicleta::setIdContador($_SESSION['id']);  º   º
          //Vehiculo::setKmTotales($_SESSION['kmTotales']);
          //$_SESSION['id']++;
          $bici[] = new Bicicleta($_POST['kmrecorrido'],''.$_POST['nombre'].'',''.$_POST['modelo'].'',''.$_POST['color'].'');
         //$_SESSION['kmTotales'] = Vehiculo::getKmTotales();
        
        }

        if (isset($_POST['idandar'])) {
          $bici[$_POST['idandar']]->andar(5);
         
        }
        if (isset($_POST['idcaballito'])) {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>El Caballito !!!</strong><br>'.$bici[$_POST['idcaballito']]->caballito().
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>';
        }
    }
    if (!isset($_SESSION['coche'])) {
        $coche = array();
        
    }else {
        $coche = unserialize($_SESSION['coche']);
        if (isset($_POST['coche'])) {
          $coche[$_POST['matricula']] = new Coche($_POST['kmrecorrido'],''.$_POST['marca'].'',''.$_POST['matricula'].'',''.$_POST['modelo'].'',''.$_POST['color'].'');
         header("Refresh:0"); 
        }
        
        if (isset($_POST['matriculac'])) {
          $coche[$_POST['matriculac']]->andar(5);
          header("Refresh:0"); 
        }
        if (isset($_POST['matricularueda'])) {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Quemando rueda !!!</strong><br>'.$coche[$_POST['matricularueda']]->quemaRueda().
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>';
        }
    }
    /*
    if (!isset($_SESSION['id'])) {
      $_SESSION['id'] = 0;
    }
    if (!isset($_SESSION['kmTotales'])) {
      $_SESSION['kmTotales'] = 0;
    }
    */
  
    ?>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: black;">
            <p class="text-center" style="font-size: xx-large;color:white;margin: auto;">CREA UNA BICI NUEVA O UN COCHE NUEVO</p>
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: greenyellow;">
            <p class="text-center" style="font-size: xx-large;color:white;margin: auto;">CREAR BICI NUEVA:</p>
          </div>
        </div>
      </div>
    <form action="mainsession.php" method="POST">
  <div class="form-row">
  <div class="form-group">
      <label for="bici"></label>
      <input type="hidden" class="form-control" name="bici" id="bici" placeholder="bici">
    </div>
    <div class="form-group col-md-6">
      <label for="KmRecorridos">Introduce KmRecorridos:</label>
      <input type="number" class="form-control" name="kmrecorrido" id="kmrecorrido" placeholder="kmrecorrido">
    </div>
    <div class="form-group col-md-6">
      <label for="nombre">Introduce nombre:</label>
      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre">
    </div>
    <div class="form-group col-md-6">
      <label for="modelo">Introduce modelo:</label>
      <input type="text" class="form-control" name="modelo" id="modelo" placeholder="modelo">
    </div>
    <div class="form-group col-md-6">
      <label for="color">Introduce color:</label>
      <input type="color" class="form-control" name="color" id="color" placeholder="color">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<div class="container-fluid">
        <div class="row justify-content-center align-items-center">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: greenyellow;">
            <p class="text-center" style="font-size: xx-large;color:white;margin: auto;">CREAR COCHE NUEVO:</p>
          </div>
        </div>
      </div>
    <form action="mainsession.php" method="POST">
  <div class="form-row">
  <div class="form-group">
      <label for="coche"></label>
      <input type="hidden" class="form-control" name="coche" id="coche" placeholder="coche">
    </div>
    <div class="form-group col-md-6">
      <label for="KmRecorridos">Introduce KmRecorridos:</label>
      <input type="number" class="form-control" name="kmrecorrido" id="kmrecorrido" placeholder="kmrecorrido">
    </div>
    <div class="form-group col-md-6">
      <label for="marca">Introduce marca:</label>
      <input type="text" class="form-control" name="marca" id="marca" placeholder="marca">
    </div>
    <div class="form-group col-md-6">
      <label for="matricula">Introduce matricula:</label>
      <input type="text" class="form-control" name="matricula" id="matricula" placeholder="matricula">
    </div>
    <div class="form-group col-md-6">
      <label for="modelo">Introduce modelo:</label>
      <input type="text" class="form-control" name="modelo" id="modelo" placeholder="modelo">
    </div>
    <div class="form-group col-md-6">
      <label for="color">Introduce color:</label>
      <input type="color" class="form-control" name="color" id="color" placeholder="color">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
    
  <?php

    if (count($bici)>0) {
      //var_dump($bici);
      //getKmRecorridos() es un metodo que hereda Bicicleta de su clase padre Vehiculo, por lo que podemos llamarlo directamente de su clase hija.
      echo '<div class="container-fluid">';
      echo '<div class="row">';
      echo '<div class="container-fluid"><div class="row">';
      foreach ($bici as $key => $value) {
        ?>
        
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="card" style="width: 18rem;">
        <img src="bicicleta.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Nombre:<?=$value->getNombre()?> Id:<?=$value->getId()?></h5>
          <p class="card-text"><a>Andar con la bicicleta</a></p>
          <p class="card-text">Color:<?=$value->getColor()?></p>
          <p class="card-text">Modelo:<?=$value->getModelo()?></p>
          <p class="card-text">Km Recorrido:<?=$value->getKmRecorridos()?></p>
          <form action="mainsession.php" method="post">
          <input type="hidden" name="idandar" value="<?=$value->getId()-1?>">
          <input type="submit" value="Andar con la bici" class="btn btn-primary">
          </form>
          <form action="mainsession.php" method="post">
          <input type="hidden" name="idcaballito" value="<?=$value->getId()-1?>">
          <input type="submit" value="Hacer el caballito" class="btn btn-primary">
          </form>
        </div>
      </div>
      </div>
      
      <?php
      }
      echo '</div></div>';
      echo '<div class="container-fluid">
      <div class="row justify-content-center align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: greenyellow;">
          <p class="text-center" style="font-size: xx-large;color:white;margin: auto;">KmTotalesVehiculos:'.Vehiculo::getKmTotales().' Kms.</p>
        </div>
      </div>
    </div>';
    echo '<div class="container-fluid">
      <div class="row justify-content-center align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: greenyellow;">
          <p class="text-center" style="font-size: xx-large;color:white;margin: auto;">Total Vehiculos Creados:'.Vehiculo::getVehiculosCreados().'.</p>
        </div>
      </div>
    </div>';
      echo '</div>';
      echo '</div>';
    }
    if (count($coche)>0) {
      //var_dump($bici);
      //getKmRecorridos() es un metodo que hereda Bicicleta de su clase padre Vehiculo, por lo que podemos llamarlo directamente de su clase hija.
      echo '<div class="container-fluid">';
      echo '<div class="row">';
      foreach ($coche as $key => $value) {
        ?>
        <div class="col-xl-3">
        <div class="card" style="width: 18rem;">
        <img src="coche.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Matricula:<?=$value->getMatricula()?></h5>
          <p class="card-text">Modelo:<?=$value->getModelo()?></p>
          <p class="card-text">Color:<?=$value->getColor()?></p>
          <p class="card-text">Marca:<?=$value->getMarca()?></p>
          <p class="card-text">Km Recorrido:<?=$value->getKmRecorridos()?></p>
          <form action="mainsession.php" method="post">
          <input type="hidden" name="matriculac" value="<?=$value->getMatricula()?>">
          <input type="submit" value="Andar con el coche" class="btn btn-primary">
          </form>
          <form action="mainsession.php" method="post">
          <input type="hidden" name="matricularueda" value="<?=$value->getMatricula()?>">
          <input type="submit" value="Quemar Rueda" class="btn btn-primary">
          </form>
        </div>
      </div>
      </div>
      <?php
      }

      echo '</div>';
      echo '</div>';
    }
    $_SESSION['bici'] = serialize($bici);
    $_SESSION['coche'] = serialize($coche);
    
  ?>
    
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
    </html>
