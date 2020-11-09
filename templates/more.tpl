{include file="header.tpl"}
{include file="nav.tpl"}

<div class="portada">

  <h3>{$producto->nombre}</h3>

</div>

<div class="card more shadow-lg p-3 mb-5 bg-white rounded">
  <div class="card-body">
    <h5 class="card-title">{$producto->nombre}</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item oculto" id="id"><span class="bolder">ID: </span>{$producto->id}</li>
    <li class="list-group-item "><span class="bolder">Detalle: </span>{$producto->descripcion}</li>
    <li class="list-group-item "><span class="bolder">Marca: </span>{$marca->nombre}</li>
    <li class="list-group-item "><span class="bolder">Origen: </span>{$marca->origen}</li>
    <li class="list-group-item "><span class="bolder">Precio: </span>${$producto->precio}</li>
  </ul>
  <div class="card-body">
    <button type="button" class="btn btn-primary" onclick="window.location='{$url}catalogo'">Volver</button>
  </div>
</div>

{if $logueado}
  {include file="vue/form-comentarios.tpl"}
{/if}

{include file="vue/lista-comentarios.tpl"}

{include file="footer.tpl"}