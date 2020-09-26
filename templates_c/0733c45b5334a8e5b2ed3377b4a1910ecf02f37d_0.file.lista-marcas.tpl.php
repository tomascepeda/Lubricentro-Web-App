<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-25 21:04:33
  from 'C:\xampp\htdocs\web2\lubricentro\templates\lista-marcas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6e3f41b1f134_67046188',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0733c45b5334a8e5b2ed3377b4a1910ecf02f37d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\lista-marcas.tpl',
      1 => 1601048280,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6e3f41b1f134_67046188 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="lista">

    <h3>Lista de Marcas:</h3>

    <table class="table shadow-lg p-3 mb-5 bg-white rounded">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre</th>
          <?php if ($_smarty_tpl->tpl_vars['user']->value == 'root') {?>
            <th scope="col">Editar / Borrar</th>
          <?php }?>
        </tr>
      </thead>
      <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['marcas']->value, 'marca');
$_smarty_tpl->tpl_vars['marca']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['marca']->value) {
$_smarty_tpl->tpl_vars['marca']->do_else = false;
?>
        <tr>
          <td><?php echo $_smarty_tpl->tpl_vars['marca']->value->nombre;?>
</td>
          <?php if ($_smarty_tpl->tpl_vars['user']->value == 'root') {?>
            <td> <button type="button" class="btn btn-primary">Editar</button> <button type="button"
              class="btn btn-danger">Borrar</button> </td>
          <?php }?>
        </tr>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </tbody>
    </table>
  </div>
<?php }
}
