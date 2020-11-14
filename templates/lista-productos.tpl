 <div class="lista">

    <h3>Lista de Productos:</h3>

    <table class="table shadow-lg p-3 mb-5 bg-white rounded">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre / Código</th>
          {if $current ne "Administrar"}
            <th scope="col">Marca</th>
          {/if}
          <th scope="col">Más Detalles</th>
          {if $current eq "Administrar" && $usuarioactual->admin eq 1}
            <th scope="col">Imagen</th>
          {/if}
          {if $current ne "Administrar"}
            <th scope="col">Precio</th>
          {/if}
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
              {if $marca->id eq $producto->id_marca && $current ne "Administrar"}
                <td>{$marca->nombre}</td>
              {/if}
            {/foreach}
            <td><button type="button" class="btn btn-primary" onclick="window.location='{$url}showmore/{$producto->id}'">Ver Más</button></td>
            {if $current eq "Administrar" && $usuarioactual->admin eq 1}
              {if $producto->imagen ne null}
                <td><button type="button" class="btn btn-danger" onclick="window.location='{$url}eliminarimagen/{$producto->id}'">Borrar</button></td>
                {else}
                <td><button type="button" class="btn btn-secondary" disabled>N/A</button></td>
              {/if}
            {/if}
            {if $current ne "Administrar"}
              <th scope="col">{$producto->precio}</th>
            {/if}
            {if $logueado && $current eq "Administrar"}
              <td> <button type="button" id="editar_prod" class="btn btn-primary" onclick="window.location='{$url}editarproducto/{$producto->id}'">Editar</button> <button type="button"
                class="btn btn-danger" onclick="window.location='{$url}eliminarproducto/{$producto->id}'">Borrar</button> 
              </td>
            {/if}
          </tr>
        {/foreach}
      </tbody>
    </table>
    {if $current eq 'Catálogo'}
      <div id="paginacion" aria-label="Page navigation example">
        <ul class="pagination">
          <form action="previous" method="POST">
            <input type="number" class="oculto" name="inicio" value="{$inicio}">
            <input type="number" class="oculto" name="fin" value="{$fin}">
            <li class="page-item">
              {if !$top}
                <button type="submit" class="page-link">Anterior</button>
                {else}
                <button type="button" class="page-link gris" disabled>Anterior</button>
              {/if}
            </li>
          </form>
          <form action="next" method="POST">
            <input type="number" class="oculto" name="inicio" value="{$inicio}">
            <input type="number" class="oculto" name="fin" value="{$fin}">
            <li class="page-item">
              {if !$bottom}
                <button type="submit" class="page-link">Siguiente</button>
                {else}
                <button type="button" class="page-link gris" disabled>Siguiente</button>
              {/if}
            </li>
          </form>
        </ul>
      </div>
    {/if}
  </div>