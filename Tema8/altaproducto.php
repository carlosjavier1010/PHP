<form action="ejercicio13.php" method="get">
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Titulo producto</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Titulo Producto" name="altaDesc">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Precio producto</label>
      <input type="number" step="0.01" class="form-control" id="inputPassword4" placeholder="Precio del producto" name="altaPrec">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Imagen del producto</label>
    <input type="file" class="form-control" id="inputAddress" placeholder="Imagen del producto" name="altaImg">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Descripcion Exhaustiva</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Descripcion Exhaustiva" name="altaDesE">
  </div>
  
  <button type="submit" class="btn btn-primary">Añadir Producto</button>
    </form>
