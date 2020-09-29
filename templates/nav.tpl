  <nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <img src="./images/logo.png" alt="logo">
      <a class="navbar-brand" href="{$url}{$current}">{$current}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{$url}{$current1}">{$current1}</a>
          </li>
          {if $logueado or ($current eq "Iniciar Sesión") or ($current eq "Registrarse")}
          <li class="nav-item active">
              <a class="nav-link" href="{$url}{$current2}">{$current2}</a>
          </li>
          {else}
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">{$current2}</a>
          </li>
          {/if}
        </ul>
        {if !$logueado}
          <button type="button" class="btn btn-primary" onclick="window.location='{$url}login'">Iniciar Sesión</button>
          <button type="button" class="btn btn-primary" onclick="window.location='{$url}register'">Registrarse</button>
        {else}
          <button type="button" class="btn btn-danger" onclick="window.location='{$url}logout'">Cerrar sesión de: {$user->nombre}</button>
        {/if}
      </div>
    </nav>
  </nav>