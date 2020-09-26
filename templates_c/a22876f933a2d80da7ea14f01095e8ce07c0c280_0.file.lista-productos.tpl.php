<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-26 22:12:49
  from 'C:\xampp\htdocs\web2\lubricentro\templates\lista-productos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6fa0c1e74887_65851112',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a22876f933a2d80da7ea14f01095e8ce07c0c280' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\lista-productos.tpl',
      1 => 1601149683,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6fa0c1e74887_65851112 (Smarty_Internal_Template $_smarty_tpl) {
?> <div class="lista">

    <h3>Lista de Productos:</h3>

    <table class="table shadow-lg p-3 mb-5 bg-white rounded">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre / Código</th>
          <th scope="col">Marca</th>
          <th scope="col">Detalle</th>
          <th scope="col">Precio</th>
          <?php if ($_smarty_tpl->tpl_vars['user']->value == 'root') {?>
            <th scope="col">Editar / Borrar</th>
          <?php }?>
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
          <?php if ($_smarty_tpl->tpl_vars['user']->value == 'root') {?>
            <td> <button type="button" id="editar_prod" class="btn btn-primary" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
editarProducto/<?php echo $_smarty_tpl->tpl_vars['producto']->value->id;?>
'">Editar</button> <button type="button"
              class="btn btn-danger" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
eliminarProducto/<?php echo $_smarty_tpl->tpl_vars['producto']->value->id;?>
'">Borrar</button> 
            </td>
          <?php }?>
        </tr>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </tbody>
    </table>
  </div><?php }
}
