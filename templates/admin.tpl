{include file="header.tpl"}
{include file="nav.tpl"}
{include file="portada-admin.tpl"}
{if $usuarioactual->admin == 1}
    {include file="lista-usuarios.tpl"}
{/if}
{include file="lista-productos.tpl"}
{include file="lista-marcas.tpl"}
{include file="footer.tpl"}