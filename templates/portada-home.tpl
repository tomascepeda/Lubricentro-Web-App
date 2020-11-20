  <div class="portada">

    <h3>Nuestros productos:</h3>

    <form action="browse" class="form-inline shadow-lg p-3 mb-5 bg-white rounded formulario-busqueda" method="GET">
      <div class="form-group mx-sm-3 mb-2">
        <label for="exampleFormControlSelect1">Buscar por:</label>
        <select class="form-control" id="exampleFormControlSelect1" name="criterio" required>
          <option value="nombre">Nombre / Código</option>
          <option value="marca">Marca</option>
          <option value="descripcion">Detalle</option>
          <option value="precio menor a">Precio menor a</option>
          <option value="precio mayor a">Precio mayor a</option>
          <option value="origen">Origen</option>
        </select>
        <input type="text" class="form-control" name='busqueda' required>
      </div>
      <button type="submit" class="btn btn-primary mb-2">Buscar</button>
    </form>
  </div>