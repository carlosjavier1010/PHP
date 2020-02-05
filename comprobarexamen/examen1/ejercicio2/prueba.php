<?php
$fecha_actual = date("d-m-Y");
$time = date("d-m-Y",strtotime($fecha_actual."+ 3 month"));
$dia = date("d",strtotime($fecha_actual."+ 3 month"));
echo $time; 
$time = mktime($time);
echo $time;
?>