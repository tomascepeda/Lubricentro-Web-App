<div class="form_log ">
    <form action="addusuario" class="shadow-lg p-3 mb-5 bg-white rounded" method="POST">
        {if $error}
        <div class="alert alert-danger" role="alert">
            El usuario ya existe, pruebe con otro nombre!
        </div>
    {/if}
    <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="text" class="form-control" name="user" id="exampleInputEmail1" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Contraseña</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
</div>