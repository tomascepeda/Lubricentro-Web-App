<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-26 23:49:12
  from 'C:\xampp\htdocs\web2\lubricentro\templates\edit-marca-form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6fb758f2b4d5_73080264',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41908b457926de7e33ffa92e13fa0c07d0ff4a3f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\edit-marca-form.tpl',
      1 => 1601156947,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6fb758f2b4d5_73080264 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="portada">

    <h3>Editar</h3>

</div>
<form action="editar" class="editar_marcas shadow-lg p-3 mb-5 bg-white rounded" method="POST">
    <h6>Editar Marca</h6>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom01">Nombre</label>
            <input type="text" name="nombre_marca" class="form-control" id="validationCustom01" value="<?php echo $_smarty_tpl->tpl_vars['marca']->value[0]->nombre;?>
" required>
        </div>
    </div>
    <input type="number" class="oculto" name="id_marca" value="<?php echo $_smarty_tpl->tpl_vars['marca_id']->value;?>
">
    <button class="btn btn-primary" type="submit">Editar</button>
    <button type="button" id="cancelar_edicion" class="btn btn-danger" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
Administrar'">Cancelar</button>
</form><?php }
}
