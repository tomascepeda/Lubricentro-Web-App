  <nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <img src="images/logo.png" alt="logo">
      <a class="navbar-brand" href="{$current}">{$current}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{$index-1}">{$index-1}<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
          {if $user eq root}
              <a class="nav-link" href="{$index-2}">{$index-2}</a>
          {else}
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">{$index-2}</a>
          {/if}
          </li>
        </ul>
        <button type="button" class="btn btn-secondary">Iniciar Sesión</button>
        <button type="button" class="btn btn-secondary">Registrarse</button>
      </div>
    </nav>
  </nav>