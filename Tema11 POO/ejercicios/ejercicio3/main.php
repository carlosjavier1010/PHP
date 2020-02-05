<?php
    session_start();
    require_once 'DadoPoker.php';

    if (!isset($_SESSION['dado'])) {
        $dado = array();
    }else {
        $dado = $_SESSION['dado'];
    }
    echo '<div class="container-fluid">
      <div class="row justify-content-center align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: greenyellow;">
          <p class="text-center" style="font-size: xx-large;color:white;margin: auto;">Cartas al azar:</p>
        </div>
      </div>
    </div>';
    echo '<div class="container-fluid">';
      echo '<div class="row">';
    if (isset($_REQUEST['tirar'])) {
        for ($i=0; $i < 5; $i++) { 
            $dado[] = new DadoPoker();
            $dado[count($dado)-1]->tira();
            echo '<div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-12">';
            echo '<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="'.$dado[count($dado)-1]->getCara().'.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">'.DadoPoker::getNombreFigura().'</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
    <a href="#" class="btn btn-primary">Ver más...</a>
  </div>
</div></div>';
        }
    }
    echo '</div>';
    echo '</div>';
    echo '<div class="container-fluid">
      <div class="row justify-content-center align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: greenyellow;">
          <p class="text-center" style="font-size: xx-large;color:white;margin: auto;">Total Tiradas:'.DadoPoker::getTiradasTotales().'</p>
        </div>
      </div>
    </div>';
?>

    <!doctype html>
    <html lang="en">
      <head>
        <title>Dados</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      </head>
      <body>
          <form action="main.php" method="post">
          <input type="hidden" name="tirar" id="tirar">
          <button type="submit" class="btn btn-primary">TIRAR DADOS</button>
          </form>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
    </html>