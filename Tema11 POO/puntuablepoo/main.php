<?php
    session_start();
    require_once 'Coche.php';
    require_once 'CocheLujo.php';
    
    $matricula = "";$modelo = "";$precio = 0;$suplemento = 0;
    if (!isset($_SESSION['coches'])) {
        $coches = array();
    }else {
        $coches = unserialize($_SESSION['coches']);
        //var_dump($coches);
        if (isset($_POST['coche'])) {

            $matricula = $_POST['matricula'];
            $modelo = $_POST['modelo'];
            $precio = $_POST['precio'];
            $suplemento = $_POST['suplemento'];

            if (isset($_POST['suplemento']) && $suplemento != "") {
                $coches[] = new CocheLujo($matricula,$modelo,$precio,$suplemento);
            } else {
                
                $coches[] = new Coche($matricula,$modelo,$precio);
            }
            
        }
    }
    ?>
    <!doctype html>
    <html lang="es">
      <head>
        <title>Coche y CocheLujo</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      </head>
      <body>
    <?php
    
    
?>

<form action="main.php" method="POST">
  <div class="form-row">
  <div class="form-group">
      <label for="coche"></label>
      <input type="hidden" class="form-control" name="coche" id="coche" placeholder="coche">
    </div>
    <div class="form-group col-md-6">
      <label for="matricula">Introduce Matricula:</label>
      <input type="text" class="form-control" name="matricula" id="matricula" placeholder="matricula">
    </div>
    <div class="form-group col-md-6">
      <label for="modelo">Introduce modelo:</label>
      <input type="text" class="form-control" name="modelo" id="modelo" placeholder="modelo">
    </div>
    <div class="form-group col-md-6">
      <label for="precio">Introduce precio:</label>
      <input type="number" class="form-control" name="precio" id="precio" placeholder="precio">
    </div>
    <div class="form-group col-md-6">
      <label for="suplemento">Introduce suplemento:</label>
      <input type="number" class="form-control" name="suplemento" id="suplemento" placeholder="suplemento">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php

if (count($coches)>0) {
    //var_dump($bici);
    //getKmRecorridos() es un metodo que hereda Bicicleta de su clase padre Vehiculo, por lo que podemos llamarlo directamente de su clase hija.
    echo '<div class="container-fluid">';
    echo '<div class="row">';
    echo '<table border="1" style="margin:0 auto;" class="table">';
    echo '<tr><th>Matricula</th><th>Modelo</th><th>Precio</th><th>Suplemento</th></tr>';
    foreach ($coches as $key => $value) {
        echo $value;
      ?>
        

    <?php
    }
    echo '</table>';
    echo '</div>';
    echo '</div>';
  }
  echo '<br><br>';
  echo '<div class="container-fluid">
      <div class="row justify-content-center align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: greenyellow;">
          <p class="text-center" style="font-size: xx-large;color:white;margin: auto;">Coche precio mas caro:'.Coche::getPrecioCaro().' €.</p>
        </div>
      </div>
    </div>';
    echo '<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: greenyellow;">
        <p class="text-center" style="font-size: xx-large;color:white;margin: auto;">Coche modelo mas caro:'.Coche::getModeloCaro().'.</p>
      </div>
    </div>
  </div>';

    $_SESSION['coches'] = serialize($coches);
?>

 <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
    </html>