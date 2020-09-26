 <div class="lista">

    <h3>Lista de Productos:</h3>

    <table class="table shadow-lg p-3 mb-5 bg-white rounded">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre / Código</th>
          <th scope="col">Marca</th>
          <th scope="col">Detalle</th>
          <th scope="col">Precio</th>
          {if $user eq root}
            <th scope="col">Editar / Borrar</th>
          {/if}
        </tr>
      </thead>
      <tbody>
        {foreach from=$productos item=producto}
        <tr>
          <td>$producto->nombre</td>
          <td>$producto->marca</td>
          <td>$producto->detalle</td>
          <th scope="col">$producto->precio</th>
          {if $user eq root}
            <td> <button type="button" class="btn btn-primary">Editar</button> <button type="button"
              class="btn btn-danger">Borrar</button> </td>
          {/if}
        </tr>
      {/foreach}
      </tbody>
    </table>
  </div>