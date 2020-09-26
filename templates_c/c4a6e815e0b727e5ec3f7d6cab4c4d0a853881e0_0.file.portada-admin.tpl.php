<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-26 22:12:49
  from 'C:\xampp\htdocs\web2\lubricentro\templates\portada-admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6fa0c1de7bf6_45430110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4a6e815e0b727e5ec3f7d6cab4c4d0a853881e0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\portada-admin.tpl',
      1 => 1601071234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6fa0c1de7bf6_45430110 (Smarty_Internal_Template $_smarty_tpl) {
?>    <div class="forms">
        <div class="formularios">
            <form action="agregarProducto" class="shadow-lg p-3 mb-5 bg-white rounded" method="POST">
                <h6>Agregar Producto</h6>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">Nombre</label>
                        <input type="text" class="form-control"  name="nombre_prod" id="validationCustom01" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Detalle</label>
                        <input type="text" class="form-control" name="descrip_prod" id="validationCustom02" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Precio</label>
                        <input type="number" class="form-control" name="precio_prod" id="validationCustom03" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom04">Marca</label>
                        <select class="custom-select" name="marca_prod" id="validationCustom04" required>
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
                <button class="btn btn-primary" type="submit">Agregar</button>
            </form>

            <form action="agregarMarca" class="shadow-lg p-3 mb-5 bg-white rounded" method="POST">
                <div class="form-group">
                    <h6>Agregar Marca</h6>
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nombre_marca" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>

        <div class="formulario-aumentos">
            <form action="aumentarProductos" class="shadow-lg p-3 mb-5 bg-white rounded" method="POST">
                <h6>Aumentar Productos</h6>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom04">Marca</label>
                        <select name="marca_aumentar" class="custom-select" id="validationCustom04" required>
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
                <div class="form-group">
                    <label for="exampleInputPassword1">% Aumento</label>
                    <input type="number" name="porcentaje_aumento" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Aumentar Precio</button>
            </form>
        </div>

    </div><?php }
}
