<?php
//Formulario para modificar producto de la BBDD
if (isset($_REQUEST['matricula'])) {
    ?>
    <form action="../Controller/grabaModAlumno.php" method="post">
        <input type="hidden" name="matricula" value="<?= $_REQUEST['matricula'] ?>">
        <label for="alumno"></label>
        <input type="hidden" name="alumno" id="alumno">Modificar el alumno con la matricula:<strong><?= $_REQUEST['matricula'] ?></strong>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= $_REQUEST['nombre'] ?>">
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" value="<?= $_REQUEST['apellidos'] ?>">
        <label for="curso">Curso:</label>
        <input type="text" name="curso" id="curso" value="<?= $_REQUEST['curso'] ?>">
        <input type="submit" value="Modificar Alumno" class="btn btn-info">
    </form>
    <?php
}
?>