
<?php

  $i = 0;
  do {
    $n = rand(100, 999);
    $lineal = [];

    for ($i=0; $i < 54; $i++) { 
        $n = rand(100, 999);
        $lineal[$i] = $n;
        for ($j=0; $j < $i ; $j++) { 
            while ($lineal[$i] == $lineal[$j]) {
                $n = rand(100, 999);
                $lineal[$j] = $n;
            }
        }
    }


  } while ($i < 54);

  $minimo = 999;
  $i = 0;
  for ($x = 0; $x < 6; $x++) {
    for ($y = 0; $y < 9; $y++) {
      $numero[$x][$y] = $lineal[$i];
      $i++;              
      if ($numero[$x][$y] < $minimo) {
        $minimo = $numero[$x][$y];
        $xMinimo = $x;
        $yMinimo = $y;
      }
    }
  }

  echo "<table>";
  for ($x = 0; $x < 6; $x++) {
    echo "<tr>";
    for ($y = 0; $y < 9; $y++) {
      if ($numero[$x][$y] == $minimo) {
           echo '<td><span style="color: blue; font-weight:bold">'.$numero[$x][$y].' </span></td>';
      } else if (abs((abs($x) - abs($xMinimo))) == abs((abs($y) - abs($yMinimo)))) {
        echo '<td><span style="color: green; font-weight:bold">'.$numero[$x][$y].' </span></td>';
      } else {
        echo '<td>'.$numero[$x][$y].'</td>';
      }
    }
    echo "</tr>";  
  }
  echo "</table>";