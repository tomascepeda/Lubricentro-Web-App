<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-26 22:32:25
  from 'C:\xampp\htdocs\web2\lubricentro\templates\edit-producto-form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6fa559b226a0_27219029',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '52ea72f882074ad592a3694ed2638e3185cfed97' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\edit-producto-form.tpl',
      1 => 1601152336,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6fa559b226a0_27219029 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="portada">

    <h3>Editar</h3>

</div>
<form action="editar" class="editar shadow-lg p-3 mb-5 bg-white rounded" method="POST">
    <h6>Editar Producto</h6>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom01">Nombre</label>
            <input type="text" name="edit_nombre" class="form-control" id="validationCustom01" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom02">Detalle</label>
            <input type="text" name="edit_descrip" class="form-control" id="validationCustom02" required>
        </div>
    </div>
    <div class="form-row">
        <div class=" col-md-6 mb-3">
            <label for="validationCustom03">Precio</label>
            <input type="number" name="edit_precio" class="form-control" id="validationCustom03" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom04">Marca</label>
            <select name="edit_marca" class="custom-select" id="validationCustom04" required>
                <option selected disabled>Seleccionar</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['marcas']->value, 'marca');
$_smarty_tpl->tpl_vars['marca']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['marca']->value) {
$_smarty_tpl->tpl_vars['marca']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['marca']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['marca']->value->nombre;?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </div>
    </div>
    <input type="number" name="id_producto" value="<?php echo $_smarty_tpl->tpl_vars['producto_id']->value;?>
">
    <button class="btn btn-primary" type="submit">Editar</button>
    <button type="button" id="cancelar_edicion" class="btn btn-danger"  onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
Administrar'">Cancelar</button>
</form><?php }
}
