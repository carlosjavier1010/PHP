<form action="../Controller/grabaProducto.php" method="post">
        <input type="hidden" name="form">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01">
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock">
        <input type="submit" value="Añadir producto" class="btn btn-success">
    </form>