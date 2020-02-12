<!doctype html>
<html lang="es">
  <head>
    <title>Login / Registro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="../View/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../View/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../View/css/bootstrap.min.css">
</head>
  <body>
      <h1>Login usuario</h1>
      <?php
       if (isset($_REQUEST['existe'])) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
           <strong>El usuario que has indicado para el registro ya existe!</strong> Por favor inicie sesion con su cuenta.
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>';
       } 
       if (isset($_REQUEST['noexiste'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
       <strong>El usuario y contraseña que has indicado para el login no existe!</strong> Por favor inicie sesion con otra cuenta o registrese.
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>';
   } 
      ?>
<form action="../Controller/login.php" method="post">
        
        <label for="usuario">usuario:</label>
        <input type="text" name="usuario" id="usuario">
        <label for="nombre">password:</label>
        <input type="password" name="pass" id="pass">

        <input type="submit" value="Login" class="btn btn-success">
</form>
   <br><br>
    <form action="../Controller/registro.php" method="post">
        
        <label for="usuario">usuario:</label>
        <input type="text" name="usuario" id="usuario">
        <label for="nombre">password:</label>
        <input type="password" name="pass" id="pass">

        <input type="submit" value="Registro" class="btn btn-success">
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../View/js/jquery-3.4.1.min.js"></script>
      <script src="../View/js/popper.min.js"></script>
      <script src="../View/js/bootstrap.bundle.min.js"></script>
      <script src="../View/js/bootstrap.min.js"></script>
    </body>
</html>