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
          <td>{$producto->nombre}</td>
          {foreach from=$marcas item=marca}
            {if $marca->id eq $producto->id_marca}
              <td>{$marca->nombre}</td>
            {/if}
          {/foreach}
          <td>{$producto->descripcion}</td>
          <th scope="col">{$producto->precio}</th>
          {if $user eq 'root'}
            <td> <button type="button" id="editar_prod" class="btn btn-primary" onclick="window.location='{$url}editarProducto/{$producto->id}'">Editar</button> <button type="button"
              class="btn btn-danger" onclick="window.location='{$url}eliminarProducto/{$producto->id}'">Borrar</button> 
            </td>
          {/if}
        </tr>
      {/foreach}
      </tbody>
    </table>
  </div>