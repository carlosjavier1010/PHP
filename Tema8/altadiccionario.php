<?php
 include 'cabecera.html';
 session_start();
 $numeros = array();
 $contador = 0;
 $acertada = 0;
 $fallida = 0;

 if(isset($_COOKIE['diccionario'])) {
     $diccionario = unserialize($_COOKIE['diccionario']);
     ?>
    <form action="altadiccionario.php" method="post">
        Valor español:<input type="text" name="español">
        Su traduccion en ingles del valor español:<input type="text" name="ingles">
        <input type="submit" value="Enviar">
    </form>
    <?php
 }
 if (isset($_POST['español'])) {
     echo "Se ha dado de alta correctamente el nuevo par de palabras en el diccionario.";
     echo '<br><br><a href="ejercicio8.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Volver al cuestionario</a>';
     $countArray = count($diccionario);
     $diccionario[$countArray]['español'] = $_POST['español'];
     $diccionario[$countArray]['ingles'] = $_POST['ingles'];
 }
    $time = time() + (60 * 60);
    setcookie('diccionario',serialize($diccionario),$time);

?>