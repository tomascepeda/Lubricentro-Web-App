<div class="lista">

    <h3>Buscando productos que coincidan con: <span>$nombre</span></h3>

    <table class="table shadow-lg p-3 mb-5 bg-white rounded">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre / Código</th>
          <th scope="col">Marca</th>
          <th scope="col">Detalle</th>
          <th scope="col">Precio</th>
        </tr>
      </thead>
      <tbody>
      {foreach from=$productos item=producto}
        <tr>
          <td>$producto->nombre</td>
          <td>$producto->marca</td>
          <td>$producto->detalle</td>
          <th scope="col">$producto->precio</th>
        </tr>
      {/foreach}
      </tbody>
    </table>
  </div>