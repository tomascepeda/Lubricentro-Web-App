<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    {if $current eq 'Catálogo'}
        <link rel="stylesheet" href="../css/catalogo.css">
    {/if}
    {if $current eq 'Administrar'}
        <link rel="stylesheet" href="../css/administrar.css">
    {/if}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <title>{$titulo}</title>
</head>

<body>

<nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="../images/logo.png" alt="logo">
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
        <li class="nav-item">
        {if $user eq 'root'}
            <a class="nav-link" href="{$url}{$current2}">{$current2}</a>
        {else}
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">{$current2}</a>
        {/if}
        </li>
    </ul>
    <button type="button" class="btn btn-secondary">Iniciar Sesión</button>
    <button type="button" class="btn btn-secondary">Registrarse</button>
    </div>
</nav>
</nav>

{include file="edit-marca-form.tpl"}

{include file="footer.tpl"}