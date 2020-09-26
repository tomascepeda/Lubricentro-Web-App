<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-25 21:35:24
  from 'C:\xampp\htdocs\web2\lubricentro\templates\portada-admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6e467c8b7043_23784490',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4a6e815e0b727e5ec3f7d6cab4c4d0a853881e0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\portada-admin.tpl',
      1 => 1600993508,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6e467c8b7043_23784490 (Smarty_Internal_Template $_smarty_tpl) {
?>    <div class="forms">
        <div class="formularios">
            <form class="shadow-lg p-3 mb-5 bg-white rounded">
                <h6>Agregar Producto</h6>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">Nombre</label>
                        <input type="text" class="form-control" id="validationCustom01" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Detalle</label>
                        <input type="text" class="form-control" id="validationCustom02" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Precio</label>
                        <input type="number" class="form-control" id="validationCustom03" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom04">Marca</label>
                        <select class="custom-select" id="validationCustom04" required>
                            <option selected disabled>Seleccionar</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Agregar</button>
            </form>

            <form class="shadow-lg p-3 mb-5 bg-white rounded">
                <div class="form-group">
                    <h6>Agregar Marca</h6>
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>

        <div class="formulario-aumentos">
            <form class="shadow-lg p-3 mb-5 bg-white rounded">
                <h6>Aumentar Productos</h6>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom04">Marca</label>
                        <select class="custom-select" id="validationCustom04" required>
                            <option selected disabled>Seleccionar</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">% Aumento</label>
                    <input type="number" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Aumentar Precio</button>
            </form>
        </div>

    </div><?php }
}
