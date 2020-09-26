<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-26 23:12:27
  from 'C:\xampp\htdocs\web2\lubricentro\templates\nav.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6faebb25c6c3_73450209',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3031202beebe3663929413af9b8e35a5df06b259' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\nav.tpl',
      1 => 1601154746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6faebb25c6c3_73450209 (Smarty_Internal_Template $_smarty_tpl) {
?>  <nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <img src="./images/logo.png" alt="logo">
      <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['current']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['current']->value;?>
</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['current1']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['current1']->value;?>
</a>
          </li>
          <?php if ($_smarty_tpl->tpl_vars['user']->value == 'root') {?>
          <li class="nav-item active">
              <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['current2']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['current2']->value;?>
</a>
          </li>
          <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php echo $_smarty_tpl->tpl_vars['current2']->value;?>
</a>
          </li>
          <?php }?>
        </ul>
        <button type="button" class="btn btn-secondary">Iniciar Sesión</button>
        <button type="button" class="btn btn-secondary">Registrarse</button>
      </div>
    </nav>
  </nav><?php }
}
