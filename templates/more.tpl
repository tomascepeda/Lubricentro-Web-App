{include file="header.tpl"}
{include file="nav.tpl"}

<div class="portada">

  <h3>{$producto->nombre}</h3>

</div>
<div class="card more shadow-lg p-3 mb-5 bg-white rounded border-primary">
  <div class="card-body">
    <h5 class="card-title">{$producto->nombre}</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item border-primary">Detalle: {$producto->descripcion}</li>
    <li class="list-group-item border-primary">Marca: {$marca->nombre}</li>
    <li class="list-group-item border-primary">Origen: {$marca->origen}</li>
    <li class="list-group-item border-primary">Precio: ${$producto->precio}</li>
  </ul>
  <div class="card-body">
    <button type="button" class="btn btn-primary" onclick="window.location='{$url}Catálogo'">Volver</button>
  </div>
</div>

{include file="footer.tpl"}