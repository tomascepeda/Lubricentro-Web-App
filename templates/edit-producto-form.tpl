<div class="portada">

    <h3>Editar</h3>

</div>
<form action="editar" class="editar shadow-lg p-3 mb-5 bg-white rounded" method="POST" enctype="multipart/form-data">
    <h6>Editar Producto</h6>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom01">Nombre</label>
            <input type="text" name="edit_nombre" class="form-control" id="validationCustom01" value="{$producto->nombre}" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom02">Detalle</label>
            <input type="text" name="edit_descrip" class="form-control" id="validationCustom02" value="{$producto->descripcion}" required>
        </div>
    </div>
    <div class="form-row">
        <div class=" col-md-6 mb-3">
            <label for="validationCustom03">Precio</label>
            <input type="number" name="edit_precio" class="form-control" id="validationCustom03" value="{$producto->precio}" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom04">Marca</label>
            <select name="edit_marca" class="custom-select" id="validationCustom04" required>
                {$nombre_marca = null}
                {foreach from=$marcas item=marca}
                    {if $marca->id eq $producto->id_marca}
                        {$nombre_marca = $marca->nombre_marca}
                        {break} 
                    {/if}
                {/foreach}
                <option value="{$producto->id_marca}">{$nombre_marca}</option>
                {foreach from=$marcas item=marca}
                    {if $marca->nombre ne $nombre_marca}
                        <option value="{$marca->id}">{$marca->nombre_marca}</option>
                    {/if}
                {/foreach}
            </select>
        </div>
    </div>
    {if $usuarioactual->admin == 1}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Subir Imagen</span>
            </div>
            <div class="custom-file">
                <input type="file" name="input_name" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" value="{$producto->imagen}">
                <label class="custom-file-label" for="inputGroupFile01">Seleccionar Archivo</label>
            </div>
        </div>
        {else}
            <div class="input-group mb-3 oculto">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Subir Imagen</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="input_name" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" value="{$producto->imagen}">
                    <label class="custom-file-label" for="inputGroupFile01">Seleccionar Archivo</label>
                </div>
            </div>
    {/if}
    <input type="number" class="oculto" name="id_producto" value="{$producto_id}">
    <button class="btn btn-primary" type="submit">Editar</button>
    <button type="button" id="cancelar_edicion" class="btn btn-danger" onclick="history.back()">Cancelar</button>
</form>