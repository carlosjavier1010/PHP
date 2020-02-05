<?php
    session_start();

    function calcularPeriodo($fecha){
        $dia = date('d');
        $mes = date('n');
        $anio = date('Y');
        $array = array('Enero','Febrero','Marzo','Abril','Mayo','Juno','Julio','Agosto','Septiembre','octubre','Noviembre','Diciembre');
        $mes = $array[$mes-1];
        return $dia." de ".$mes." de ".$anio;
    }

    include 'cabecera.html';
    if (isset($_COOKIE['user'])) {
        $usuario = unserialize($_COOKIE['user']);
    }
    if (!isset($_SESSION['user'])) {
        header("Location:acceso.php");
    }else{
        foreach ($usuario as $key => $value) { // LO MISMO ES PONER $USUARIO[$KEY] KE $VALUE[$KEY] 
            if ($usuario[$key]['usuario'] == $_SESSION['user']) {
                echo '<body style="background-image:url('.$usuario[$key]['fondo'].')"';
                
                echo '<br>Se registro el:'.calcularPeriodo($usuario[$key]['fecha']."<br>");
                echo '<br>Bienvenido usuario:'.$usuario[$key]['usuario'];
            }
            
        }
    }
    
   

    include 'pie.html';
?>
