<?php
    $productos = array('nombre'=>array('precio'=>0,'cantidad'=>0));

    $productos['carlos']['precio'] = 18;
    $productos['carlos']['cantidad'] = 30;

    $productoss []= array('nombre'=>"carlos",'precio'=>2,'cantidad'=>4);
    $productoss [] = array('nombre'=>"antonio",'precio'=>8,'cantidad'=>16);
      for ($i=0; $i < count($productoss); $i++) { 
        echo $productoss[$i]['nombre'];
        echo $productoss[$i]['precio'];
        echo $productoss[$i]['cantidad'];
      }
    
    
?>