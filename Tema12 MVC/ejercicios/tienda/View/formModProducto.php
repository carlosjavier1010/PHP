<?php
//Formulario para modificar producto de la BBDD
if (isset($_REQUEST['accion']) && $_REQUEST['accion'] == "modificar") {
    ?>
    <form action="../Controller/grabaModProducto.php" method="post">
        <input type="hidden" name="formmod">
        <input type="hidden" name="codigo" value="<?= $_REQUEST['codigo'] ?>">
        <label for="moscod"></label>
        <input type="hidden" name="moscod" id="moscod">Modificar el producto con codigo:<strong><?= $_REQUEST['codigo'] ?></strong>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01">
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock">
        <input type="submit" value="Modificar" class="btn btn-info">
    </form>
    <?php
}
?>