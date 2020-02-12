<!doctype html>
<html lang="en">
  <head>
    <title>Listado Asignaturas </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
   
<?php
 
 $inicio = 0;

     //Mostrar listado de Asignaturas de un Alumno
 ?>  
 <div class="container-fluid">
 <h1>ASIGNATURAS DISPONIBLES EN EL CENTRO:</h1>
 <table class="table table-dark">
     <thead>
         <tr>
             <td>#</td>
             <td>Codigo</td>
             <td>Asignatura</td>
         </tr>
     </thead>
     <tbody>

 <?php
 //MUESTRO TODas las asignaturas del centro

    
 if ($data['asignaturas'] != 0) {


 foreach ($data['asignaturas'] as $value) {
     
 
 ?>
      <tr>
      <th scope="row"><?=$inicio?>
      <td><?= $value->getCodigo()?></td>
      <td><?= $value->getNombre()?></td>
      <td><a href="../Controller/listadoAlumnosAsignatura.php?codigo=<?=$value->getCodigo()?>&nombre=<?=$value->getNombre()?>"><input type="button" class="btn btn-info" value="Ver alumnos"></a></td>
      <td><a href="../Controller/eliminarAsignatura.php?codigo=<?=$value->getCodigo()?>"><input type="button" class="btn btn-danger" value="Eliminar"></a></td>
    </tr>
<?php 
$inicio++;
  
}
}
?>
 </tbody>
 </table>
 </div>



        
    </tbody>
    </table>
    
    </div>

    
    <a href="../Controller/index.php" style="margin: 0 auto;"><input type="button" value="Volver" class="btn btn-info"></a>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>