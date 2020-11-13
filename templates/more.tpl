{include file="header.tpl"}
{include file="nav.tpl"}

<div class="portada">

  <h3>{$producto->nombre}</h3>

</div>

<div class="card more shadow-lg p-3 mb-5 bg-white rounded">
  <div class="card-body">
    {if $producto->imagen ne null}
      <img src="../{$producto->imagen}" class="imagen-usuario"/>
    {/if}
    <h5 class="card-title">{$producto->nombre}</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item oculto" id="id"><span class="bolder">ID: </span>{$producto->id}</li>
    <li class="list-group-item "><span class="bolder">Detalle: </span>{$producto->descripcion}</li>
    <li class="list-group-item "><span class="bolder">Marca: </span>{$marca->nombre}</li>
    <li class="list-group-item "><span class="bolder">Origen: </span>{$marca->origen}</li>
    <li class="list-group-item "><span class="bolder">Precio: </span>${$producto->precio}</li>
    <li class="list-group-item " id="promedio"><span class="bolder">Calificacion general: </span>{$promedio}</li>
  </ul>
  <div class="card-body">
    <button type="button" class="btn btn-primary" onclick="history.back()">Volver</button>
  </div>
</div>

{if $logueado}
  <p id="usuario-id" class="oculto">{$usuario->id}</p>
  <p id="usuario-admin" class="oculto">{$usuario->admin}</p>
  {include file="vue/form-comentarios.tpl"}
  {else}
    <p id="usuario-id" class="oculto">null</p>
    <p id="usuario-admin" class="oculto">null</p>
{/if}

{include file="vue/lista-comentarios.tpl"}

{include file="footer.tpl"}