<div class="lista">

    <h3>Lista de Usuarios:</h3>

    <table class="table shadow-lg p-3 mb-5 bg-white rounded">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Admin</th>
          <th scope="col">Borrar</th>
        </tr>
      </thead>
      <tbody>
        {foreach from=$usuarios item=usuario}
        <tr>
          <td>{$usuario->nombre}</td>
          {if $usuario->admin eq 1}
          <td><div class="col-sm-5">
            <button type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="true" autocomplete="off" onclick="window.location='{$url}modificarpermisos/{$usuario->nombre}'">
            <div class="handle"></div>
            </button>
          </div></td>
            {else}
              <td><div class="col-sm-5">
              <button type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="window.location='{$url}modificarpermisos/{$usuario->nombre}'">
              <div class="handle"></div>
              </button>
              </div></td>
          {/if}
          <td><button type="button" class="btn btn-danger" onclick="window.location='{$url}eliminarusuario/{$usuario->id}'">Borrar</button> </td>
        </tr>
      {/foreach}
      </tbody>
    </table>
  </div>