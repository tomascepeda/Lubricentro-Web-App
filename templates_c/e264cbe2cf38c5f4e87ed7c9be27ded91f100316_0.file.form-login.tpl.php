<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-02 21:20:10
  from 'C:\xampp\htdocs\web2\lubricentro\templates\form-login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f777d6aadfd90_82842694',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e264cbe2cf38c5f4e87ed7c9be27ded91f100316' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\form-login.tpl',
      1 => 1601666404,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f777d6aadfd90_82842694 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="form_log ">
    <form action="loguearse" class="shadow-lg p-3 mb-5 bg-white rounded" method="POST">
    <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
        <div class="alert alert-danger" role="alert">
            Datos incorrectos!
        </div>
    <?php }?>
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
</div><?php }
}
