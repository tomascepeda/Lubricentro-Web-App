<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-02 21:57:06
  from 'C:\xampp\htdocs\web2\lubricentro\templates\form-register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f778612a93445_06320023',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af55354faae8ce9a5dfb1e223056fc4efe022a8a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\form-register.tpl',
      1 => 1601668611,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f778612a93445_06320023 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="form_log ">
    <form action="registrarse" class="shadow-lg p-3 mb-5 bg-white rounded" method="POST">
        <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
        <div class="alert alert-danger" role="alert">
            El usuario ya existe, pruebe con otro nombre!
        </div>
    <?php }?>
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
</div><?php }
}
