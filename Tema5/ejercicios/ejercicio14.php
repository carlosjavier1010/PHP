
<?php

    if (isset($_POST['posicion1'])) {
        
    $posicionColumna = $_POST['posicion2']; 
    $posicionFila = $_POST['posicion1']; 

  $i = 0;
  do {
    
    $lineal = [];

    for ($i=0; $i < 64; $i++) { 
        $n = "x";
        $lineal[$i] = $n;
       
    }


  } while ($i < 64);

  
  $i = 0;
  
  for ($x = 0; $x < 8; $x++) {
    for ($y = 0; $y < 8; $y++) {
      if ($x == $posicionColumna && $y == $posicionFila) {
          $numero[$x][$y] = ""."<img border='0' width='40' height='40' src='alfil.jpg' ;'";
          $i++;  
      }else {
          $numero[$x][$y] = $lineal[$i];
          $i++;  
      }
                  
      
    }
  }

  echo "<table border='1px solid black' frame='void' rules='none'  align='center' cellspacing='0' cellpadding='0'>";
  for ($x = 0; $x < 8; $x++) {
    echo "<tr>";
    for ($y = 0; $y < 8; $y++) {
      if ($x == $posicionColumna && $y == $posicionFila) {
           echo '<td><span style="color: blue; font-weight:1000;font-size:22px;">'.$numero[$x][$y].' </span></td>';
      } else if (abs((abs($x) - abs($posicionColumna))) == abs((abs($y) - abs($posicionFila)))) {
        echo '<td><span style="color: green; font-weight:1000;font-size:22px;">'.$numero[$x][$y].' </span></td>';
      } else {
        echo '<td>'.$numero[$x][$y].'</td>';
      }
    }
    echo "</tr>";  
  }
  echo "</table>";
}else {
    
    ?>
    <form action="ejercicio14.php" method="POST">
        Introduzca fila<input type="number" name="posicion1">
        Introduzca columna<input type="number" name="posicion2">
        <input type="submit" value="Enviar">
    </form>
    <?php

}

?>