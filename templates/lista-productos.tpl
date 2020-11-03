 <div class="lista">

    <h3>Lista de Productos:</h3>

    <table class="table shadow-lg p-3 mb-5 bg-white rounded">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre / Código</th>
          <th scope="col">Marca</th>
          {if $current ne 'Administrar'}
            <th scope="col">Más Detalles</th>
            {else}
              <th scope="col">Detalle</th>
          {/if}
          <th scope="col">Precio</th>
          {if $logueado && $current eq "Administrar"}
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
            {if $current ne 'Administrar'}
              <td><button type="button" class="btn btn-primary" onclick="window.location='{$url}showmore/{$producto->id}'">Ver Más</button></td>
              {else}
                <td>{$producto->descripcion}</td>
            {/if}
            <th scope="col">{$producto->precio}</th>
            {if $logueado && $current eq "Administrar"}
              <td> <button type="button" id="editar_prod" class="btn btn-primary" onclick="window.location='{$url}editarproducto/{$producto->id}'">Editar</button> <button type="button"
                class="btn btn-danger" onclick="window.location='{$url}eliminarproducto/{$producto->id}'">Borrar</button> 
              </td>
            {/if}
          </tr>
        {/foreach}
      </tbody>
    </table>
  </div>