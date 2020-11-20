<div class="lista" id="pdf">
    <h3>Lista de Productos por marca:</h3>
    <button class="btn btn-primary download" id="download">Descargar PDF</button>
    {foreach from=$marcas item=marca}
        <table class="table shadow-lg p-3 mb-5 bg-white rounded">
        <thead class="thead-dark">
            <tr>
            <th scope="col">{$marca->nombre_marca}</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <thead class="thead-light">
            <tr>
            <th scope="col">Nombre / Codigo</th>
            <th scope="col">Detalle</th>
            <th scope="col">Precio</th>
            </tr>
        </thead>
        <tbody>
        {foreach from=$allproductos item=producto}
            <tr>
                {if $producto->id_marca eq $marca->id}
                    <td>{$producto->nombre}</td>
                    <td>{$producto->descripcion}</td>
                    <th scope="col">{$producto->precio}</th>
                {/if}
            </tr>
        {/foreach}
        </tbody>
        </table>
    {/foreach}
</div>
