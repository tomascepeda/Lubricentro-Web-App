<div class="portada">

    <h3>Editar</h3>

</div>
<form action="editar" class="editar_marcas shadow-lg p-3 mb-5 bg-white rounded" method="POST">
    <h6>Editar Marca</h6>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom01">Nombre</label>
            <input type="text" name="nombre_marca" class="form-control" id="validationCustom01" value="{$marca->nombre_marca}" required>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom01">Origen</label>
            <input type="text" name="origen_marca" class="form-control" id="validationCustom01" value="{$marca->origen}" required>
        </div>
    </div>
    <input type="number" class="oculto" name="id_marca" value="{$marca_id}">
    <button class="btn btn-primary" type="submit">Editar</button>
    <button type="button" id="cancelar_edicion" class="btn btn-danger" onclick="history.back()">Cancelar</button>
</form>