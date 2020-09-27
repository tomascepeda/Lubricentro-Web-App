<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-27 17:13:00
  from 'C:\xampp\htdocs\web2\lubricentro\templates\lista-productos-por-marca.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f70abfc48b995_07836413',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efc70a337315c0790b645e7b0485359b05190772' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\lista-productos-por-marca.tpl',
      1 => 1601219330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f70abfc48b995_07836413 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="lista" id="pdf">
    <h3>Lista de Productos por marca:</h3>
    <button class="btn btn-primary download" id="download">Descargar PDF</button>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['marcas']->value, 'marca');
$_smarty_tpl->tpl_vars['marca']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['marca']->value) {
$_smarty_tpl->tpl_vars['marca']->do_else = false;
?>
        <table class="table shadow-lg p-3 mb-5 bg-white rounded">
        <thead class="thead-dark">
            <tr>
            <th scope="col"><?php echo $_smarty_tpl->tpl_vars['marca']->value->nombre;?>
</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <thead class="thead-light">
            <tr>
            <th scope="col">Nombre / Codigo</th>
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
                <?php if ($_smarty_tpl->tpl_vars['producto']->value->id_marca == $_smarty_tpl->tpl_vars['marca']->value->id) {?>
                    <td><?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['producto']->value->descripcion;?>
</td>
                    <th scope="col"><?php echo $_smarty_tpl->tpl_vars['producto']->value->precio;?>
</th>
                <?php }?>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
        </table>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php }
}
