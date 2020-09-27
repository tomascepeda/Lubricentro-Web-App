<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-28 00:39:24
  from 'C:\xampp\htdocs\web2\lubricentro\templates\form-register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f71149c1f8a48_81487953',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af55354faae8ce9a5dfb1e223056fc4efe022a8a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\form-register.tpl',
      1 => 1601228177,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f71149c1f8a48_81487953 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="form_log ">
    <form action="registrarse" class="shadow-lg p-3 mb-5 bg-white rounded" method="POST">
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
