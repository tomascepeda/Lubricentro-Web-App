<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-28 00:28:56
  from 'C:\xampp\htdocs\web2\lubricentro\templates\editar-marca.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7112284c75e9_73289275',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35d638b3e8013ae8a0f60ce7cd2f8b06f47e4e4f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\editar-marca.tpl',
      1 => 1601245732,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:edit-marca-form.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f7112284c75e9_73289275 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <?php if ($_smarty_tpl->tpl_vars['current']->value == 'Catálogo') {?>
        <link rel="stylesheet" href="../css/catalogo.css">
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['current']->value == 'Administrar') {?>
        <link rel="stylesheet" href="../css/administrar.css">
    <?php }?>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"><?php echo '</script'; ?>
>
    <title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>
</head>

<body>

<nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="../images/logo.png" alt="logo">
        <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['current']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['current']->value;?>
</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['current1']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['current1']->value;?>
</a>
            </li>
            <?php if ($_smarty_tpl->tpl_vars['logueado']->value) {?>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['current2']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['current2']->value;?>
</a>
            </li>
            <?php } else { ?>
            <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php echo $_smarty_tpl->tpl_vars['current2']->value;?>
</a>
            </li>
            <?php }?>
        </ul>
        <?php if (!$_smarty_tpl->tpl_vars['logueado']->value) {?>
            <button type="button" class="btn btn-secondary" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
login'">Iniciar Sesión</button>
            <button type="button" class="btn btn-secondary" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
register'">Registrarse</button>
        <?php }?>
        </div>
    </nav>
</nav>

<?php $_smarty_tpl->_subTemplateRender("file:edit-marca-form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
