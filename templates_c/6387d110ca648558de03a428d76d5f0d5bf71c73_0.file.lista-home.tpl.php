<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-26 22:10:28
  from 'C:\xampp\htdocs\web2\lubricentro\templates\lista-home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6fa0344d9b76_64470375',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6387d110ca648558de03a428d76d5f0d5bf71c73' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\lista-home.tpl',
      1 => 1601060500,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6fa0344d9b76_64470375 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="lista">

    <h3>Buscando productos que coincidan con: <span><?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
</span></h3>

    <table class="table shadow-lg p-3 mb-5 bg-white rounded">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre / Código</th>
          <th scope="col">Marca</th>
          <th scope="col">Detalle</th>
          <th scope="col">Precio</th>
        </tr>
      </thead>
      <tbody>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'producto');
$_smarty_tpl->tpl_vars['producto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->do_else = false;
?>
        <tr>
          <td><?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre;?>
</td>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['marcas']->value, 'marca');
$_smarty_tpl->tpl_vars['marca']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['marca']->value) {
$_smarty_tpl->tpl_vars['marca']->do_else = false;
?>
            <?php if ($_smarty_tpl->tpl_vars['marca']->value->id == $_smarty_tpl->tpl_vars['producto']->value->id_marca) {?>
              <td><?php echo $_smarty_tpl->tpl_vars['marca']->value->nombre;?>
</td>
            <?php }?>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          <td><?php echo $_smarty_tpl->tpl_vars['producto']->value->descripcion;?>
</td>
          <th scope="col"><?php echo $_smarty_tpl->tpl_vars['producto']->value->precio;?>
</th>
        </tr>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </tbody>
    </table>
  </div><?php }
}
