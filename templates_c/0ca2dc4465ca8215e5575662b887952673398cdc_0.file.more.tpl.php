<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-02 03:19:15
  from 'C:\xampp\htdocs\web2\lubricentro\templates\more.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f768013403d62_28875038',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ca2dc4465ca8215e5575662b887952673398cdc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\more.tpl',
      1 => 1601601553,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:nav.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f768013403d62_28875038 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="portada">

  <h3><?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre;?>
</h3>

</div>
<div class="card more shadow-lg p-3 mb-5 bg-white rounded border-primary">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre;?>
</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item border-primary">Detalle: <?php echo $_smarty_tpl->tpl_vars['producto']->value->descripcion;?>
</li>
    <li class="list-group-item border-primary">Marca: <?php echo $_smarty_tpl->tpl_vars['marca']->value->nombre;?>
</li>
    <li class="list-group-item border-primary">Origen: <?php echo $_smarty_tpl->tpl_vars['marca']->value->origen;?>
</li>
    <li class="list-group-item border-primary">Precio: $<?php echo $_smarty_tpl->tpl_vars['producto']->value->precio;?>
</li>
  </ul>
  <div class="card-body">
    <button type="button" class="btn btn-primary" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
Catálogo'">Volver</button>
  </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
