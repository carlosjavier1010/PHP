<?php
    session_start();
    include 'cabecera.html';
    $fp = fopen("mascotas.txt","a");
    $contador = 0;
    if (isset($_SESSION['mascotas'])) {
        echo '<table class="table table-dark"><thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Animal</th>
          <th scope="col">Edad</th>
        </tr>
      </thead>';
      $indice = 0;
       foreach ($_SESSION['mascotas'] as $key => $value) {
        
        $indice++;
         
          echo '
          <tbody>
            <tr>
              <th scope="row">'.$indice.'</th>
              <td>'.$key.'</td>
              <td>'.$value['animal'].'</td>
              <td>'.$value['edad'].'</td>
            </tr>';
          
          if (isset($_GET['grabar'])) {
              if ($contador == 0) {
                  $time = time();
                  $dia = date("d",$time);
                  $mes = date('m',$time);
                  $ano = date('Y',$time);

                  fputs($fp,"#".$dia."-".$mes."-".$ano."\n");
                  $contador++;
              }
              fputs($fp,$key."-".$value['animal']."-".$value['edad']."\n");
          }
         
       }
       echo '</tbody>
       </table>';
    }else {
        $_SESSION['mascotas'] = array();
        
    }

    if (isset($_POST['nombre'])) {
        
        $_SESSION['mascotas'][$_POST['nombre']] = array('animal' => $_POST['animal'],'edad' => $_POST['edad']);
        header('Location:ejercicio1.php');
    }

    echo '<form action="ejercicio1.php" method="POST">
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre Mascota</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Nombre Mascota" name="nombre">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Animal</label>
      <input type="text" step="0" class="form-control" id="inputPassword4" placeholder="Animal" name="animal">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Edad</label>
    <input type="number" class="form-control" id="inputAddress" placeholder="Edad del animal" name="edad">
  </div>
  
  <button type="submit" class="btn btn-primary">Añadir mascota</button>
    </form>';
    echo '<a href="ejercicio1.php?grabar=grabar"><button>Grabar datos</button></a>';
    echo '<a href="cerrarsesion.php"><button>Cerrar Sesion</button></a>';
    fclose($fp);
    include 'pie.html';
?>