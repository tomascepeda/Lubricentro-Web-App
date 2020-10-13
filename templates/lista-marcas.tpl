<div class="lista">

    <h3>Lista de Marcas:</h3>

    <table class="table shadow-lg p-3 mb-5 bg-white rounded">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Origen</th>
          {if $logueado && $current eq "Administrar"}
            <th scope="col">Editar / Borrar</th>
          {/if}
        </tr>
      </thead>
      <tbody>
        {foreach from=$marcas item=marca}
        <tr>
          <td>{$marca->nombre}</td>
          <td>{$marca->origen}</td>
          {if $logueado && $current eq "Administrar"}
            <td> <button type="button" id="editar_marca" class="btn btn-primary" onclick="window.location='{$url}editarMarca/{$marca->id}'">Editar</button> <button type="button"
              class="btn btn-danger" onclick="window.location='{$url}eliminarMarca/{$marca->id}'">Borrar</button> </td>
          {/if}
        </tr>
      {/foreach}
      </tbody>
    </table>
  </div>
