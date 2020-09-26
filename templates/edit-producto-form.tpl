<div class="portada">

    <h3>Editar</h3>

</div>
<form action="editar" class="editar shadow-lg p-3 mb-5 bg-white rounded" method="POST">
    <h6>Editar Producto</h6>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom01">Nombre</label>
            <input type="text" name="edit_nombre" class="form-control" id="validationCustom01" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom02">Detalle</label>
            <input type="text" name="edit_descrip" class="form-control" id="validationCustom02" required>
        </div>
    </div>
    <div class="form-row">
        <div class=" col-md-6 mb-3">
            <label for="validationCustom03">Precio</label>
            <input type="number" name="edit_precio" class="form-control" id="validationCustom03" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom04">Marca</label>
            <select name="edit_marca" class="custom-select" id="validationCustom04" required>
                <option selected disabled>Seleccionar</option>
                {foreach from=$marcas item=marca}
                    <option value="{$marca->id}">{$marca->nombre}</option>
                {/foreach}
            </select>
        </div>
    </div>
    <input type="number" class="oculto" name="id_producto" value="{$producto_id}">
    <button class="btn btn-primary" type="submit">Editar</button>
    <button type="button" id="cancelar_edicion" class="btn btn-danger"  onclick="window.location='{$url}Administrar'">Cancelar</button>
</form>