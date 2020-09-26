<h3>Lista de Productos por marca:</h3>

{foreach from=$marcas item=marca}
    <div class="lista">

        <table class="table shadow-lg p-3 mb-5 bg-white rounded">
        <thead class="thead-dark">
            <tr>
            <th scope="col">$marca->nombre</th>
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
        {foreach from=$productos item=producto}
            <tr>
            <td>$producto->nombre</td>
            <td>$producto->detalle</td>
            <th scope="col">$producto->precio</th>
            </tr>
        {/foreach}
        </tbody>
        </table>
    </div>

{/foreach}