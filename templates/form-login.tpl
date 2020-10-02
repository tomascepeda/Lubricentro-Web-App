<div class="form_log ">
    <form action="loguearse" class="shadow-lg p-3 mb-5 bg-white rounded" method="POST">
    {if $error}
        <div class="alert alert-danger" role="alert">
            Datos incorrectos!
        </div>
    {/if}
    <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="text" class="form-control" name="user" id="exampleInputEmail1" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Contraseña</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
    </div>
    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>
</div>