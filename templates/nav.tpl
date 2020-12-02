  <nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      {if $current eq 'Ver Más'}
        <img src="../assets/images/logo.png" alt="logo">
        {else}
          <img src="./assets/images/logo.png" alt="logo">
      {/if}
      <a class="navbar-brand" href="{$link1}">{$current}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{$link2}">{$current1}</a>
          </li>
          {if ($logueado && $admin eq 1) or ($current eq "Iniciar Sesión") or ($current eq "Registrarse") or ($current eq "Ver Más")}
          <li class="nav-item active">
              <a class="nav-link" href="{$link3}">{$current2}</a>
          </li>
          {/if}
        </ul>
        {if !$logueado}
          <button type="button" class="btn btn-primary" onclick="window.location='{$url}login'">Iniciar Sesión</button>
          <button type="button" class="btn btn-primary" onclick="window.location='{$url}registrarse'">Registrarse</button>
        {else}
          <button type="button" class="btn btn-danger" onclick="window.location='{$url}logout'">Cerrar sesión de: {$user}</button>
        {/if}
      </div>
    </nav>
  </nav>