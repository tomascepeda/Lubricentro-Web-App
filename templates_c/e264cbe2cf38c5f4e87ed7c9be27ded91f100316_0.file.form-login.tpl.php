<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-02 01:30:14
  from 'C:\xampp\htdocs\web2\lubricentro\templates\form-login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7666866d3fc0_27429022',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e264cbe2cf38c5f4e87ed7c9be27ded91f100316' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\form-login.tpl',
      1 => 1601595011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7666866d3fc0_27429022 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="form_log ">
    <form action="loguearse" class="shadow-lg p-3 mb-5 bg-white rounded" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="text" class="form-control" name="user" id="exampleInputEmail1">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Contraseña</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>
</div><?php }
}
