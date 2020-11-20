 <div class="lista">

    <h3>Lista de Productos:</h3>
    {if $current eq "Catálogo"}
    <form action="setnpaginacion" class="formpaginacion shadow-lg p-3 mb-5 bg-white rounded" method="POST">
      <h5>Mostrando</h5>
      <input type="number" class="form-control" name="cantpaginas" value="{$npaginacion}">
      <h5> productos por pagina </h5>
      <button class="btn btn-primary" type="submit">OK</button>
    </form>
    {/if}
    <table class="table shadow-lg p-3 mb-5 bg-white rounded">
      <thead class="thead-dark">
        <tr>
          {if $current eq "Administrar"}
            <th></th>
          {/if}
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
        {if $current eq "Administrar"}
          <form action="eliminarproductos" method="GET">
        {/if}
        {foreach from=$productos item=producto}
          <tr>
            {if $current eq "Administrar"}
            <td><div class="form-group form-check">
              <input type="checkbox" class="form-check-input" name=mischecks[] value={$producto->id}>
            </div></td>
            {/if}
            <td>{$producto->nombre}</td>
            {foreach from=$marcas item=marca}
              {if $marca->id eq $producto->id_marca && $current ne "Administrar"}
                <td>{$marca->nombre_marca}</td>
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
            <form action="navigation" method="GET">
              {if $pagina <= 1}
                <li class="page-item disabled"><button class="page-link" disabled>Anterior</button></li>
                {else}
                  <li class="page-item"><button class="page-link" type="submit"><input type="number" class="oculto" name="page" value="{$pagina-1}"/>Anterior</button></li>
              {/if}
            </form>
            {for $i=1 to $cantpag}
              <form action="navigation" method="GET">
                {if $i eq $pagina}
                  <li class="page-item active"><button class="page-link" type="submit"><input type="number" class="oculto" name="page" value="{$i}"/>{$i}</button></li>
                  {else}
                    <li class="page-item"><button class="page-link" type="submit"><input type="number" class="oculto" name="page" value="{$i}"/>{$i}</button></li>
                {/if}
              </form>
            {/for}
            <form action="navigation" method="GET">
            {if $pagina >= $cantpag}
              <li class="page-item disabled"><button class="page-link" disabled>Siguiente</button></li>
              {else}
                <li class="page-item"><button class="page-link" type="submit"><input type="number" class="oculto" name="page" value="{$pagina+1}"/>Siguiente</button></li>
            {/if}
            </form>
          </ul>
      </div>
    {/if}
    {if $current eq "Administrar"}
    <h4>Para los productos seleccionados: 
      <button type="submit" class="btn btn-danger">Borrar</button>
    </h4>
    </form>
    {/if}
  </div>