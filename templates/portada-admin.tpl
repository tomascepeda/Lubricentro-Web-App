    <div class="forms">
        <div class="formularios">
            <form action="agregarproducto" class="shadow-lg p-3 mb-5 bg-white rounded" method="POST" enctype="multipart/form-data">
                <h6>Agregar Producto</h6>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">Nombre</label>
                        <input type="text" class="form-control"  name="nombre_prod" id="validationCustom01" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Detalle</label>
                        <input type="text" class="form-control" name="descrip_prod" id="validationCustom02" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Precio</label>
                        <input type="number" class="form-control" name="precio_prod" id="validationCustom03" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom04">Marca</label>
                        <select class="custom-select" name="marca_prod" id="validationCustom04" required>
                            <option selected disabled>Seleccionar</option>
                            {foreach from=$marcas item=marca}
                                <option value="{$marca->id}">{$marca->nombre_marca}</option>
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
                            <input type="file" name="input_name" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Seleccionar Archivo</label>
                        </div>
                    </div>
                    {else}
                        <div class="input-group mb-3 oculto">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Subir Imagen</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="input_name" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Seleccionar Archivo</label>
                            </div>
                        </div>
                {/if}
                <button class="btn btn-primary" type="submit">Agregar</button>
            </form>

            <form action="agregarmarca" class="shadow-lg p-3 mb-5 bg-white rounded" method="POST">
                <div class="form-group">
                    <h6>Agregar Marca</h6>
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nombre_marca" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Origen</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="origen_marca" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>

        <div class="formulario-aumentos">
            <form action="aumentarProductos" class="shadow-lg p-3 mb-5 bg-white rounded" method="POST">
                <h6>Aumentar Productos</h6>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom04">Marca</label>
                        <select name="marca_aumentar" class="custom-select" id="validationCustom04" required>
                            <option selected disabled>Seleccionar</option>
                            {foreach from=$marcas item=marca}
                                <option value="{$marca->id}">{$marca->nombre_marca}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">% Aumento</label>
                    <input type="number" name="porcentaje_aumento" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Aumentar Precio</button>
            </form>
        </div>

    </div>