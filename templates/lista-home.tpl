{if $nombre ne ''}
<div class="lista">

    <h3>Buscando productos que coincidan con: <span>{$nombre}</span></h3>

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
          <td>{$producto->nombre}</td>
          {foreach from=$marcas item=marca}
            {if $marca->id eq $producto->id_marca}
              <td>{$marca->nombre}</td>
            {/if}
          {/foreach}
          <td>{$producto->descripcion}</td>
          <th scope="col">{$producto->precio}</th>
        </tr>
      {/foreach}
      </tbody>
    </table>
  </div>
  {else}
    <div class="lista">
      <h1>¡Utilice nuestro buscador para encontrar su producto facilmente!</h1>
    </div>
{/if}