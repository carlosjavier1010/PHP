<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    if (isset($_REQUEST['c'])) {

      $f = $_REQUEST['f'];
      $c = $_REQUEST['c'];

      // Crea el array con los valores de la cadena
      $ojos = explode(";", $_REQUEST['cadenaOjos']);
      for ($i=0; $i < 10; $i++) {
        $ojos[$i] = explode(" ", $ojos[$i]);
      }

      if ($ojos[$f][$c] == 0) {
        $ojos[$f][$c] = 1;
      }else{
        $ojos[$f][$c] = 0;
      }

    }else{
      for ($i=0; $i < 10; $i++) {

        for ($j=0; $j < 10; $j++) {
          $ojos[$i][$j] = 0;
        }
      }

    }

    $cadenaOjos = "";
    foreach ($ojos as $fila) {
       
      echo $fila[0]."<br>";
      $cadenaOjos = $cadenaOjos.implode(" ", (array)$fila).";";
    }

    //Pinta la tabla de los ojos
    echo "<table border='1'>";
    for ($i=0; $i < 10; $i++) {
      echo "<tr>";
      for ($j=0; $j < 10; $j++) {
        echo "<td>";

      if ($ojos[$i][$j]==1) {
          echo "<a href='berto.php?f=$i&c=$j&cadenaOjos=$cadenaOjos'><img src='abierto.png' style='max-width: 50px;'></a>";
        }else{
          echo "<a href='berto.php?f=$i&c=$j&cadenaOjos=$cadenaOjos'><img src='cerrado.png' style='max-width: 50px;'></a>";
        }

        echo "</td>";
      }
      echo "</tr>";
    }

    echo "</table>";

     ?>
  </body>
</html>