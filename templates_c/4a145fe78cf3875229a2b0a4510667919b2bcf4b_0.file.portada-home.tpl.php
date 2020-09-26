<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-26 22:10:28
  from 'C:\xampp\htdocs\web2\lubricentro\templates\portada-home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6fa03444d7d3_51919737',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a145fe78cf3875229a2b0a4510667919b2bcf4b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\portada-home.tpl',
      1 => 1601058152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6fa03444d7d3_51919737 (Smarty_Internal_Template $_smarty_tpl) {
?>  <div class="portada">

    <h3>Nuestros productos:</h3>

    <form action="buscar" class="form-inline shadow-lg p-3 mb-5 bg-white rounded formulario-busqueda" method="POST">
      <div class="form-group mx-sm-3 mb-2">
        <h6>Buscar por código:</h6>
        <input type="text" class="form-control" name='input_buscar' placeholder="Código / Nombre">
      </div>
      <button type="submit" class="btn btn-primary mb-2">Buscar</button>
    </form>
  </div><?php }
}
