<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-28 00:12:14
  from 'C:\xampp\htdocs\web2\lubricentro\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f710e3e40e396_34699925',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27c62597e45fcfd90fb0c256ddc2f826ce7fe25c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\lubricentro\\templates\\header.tpl',
      1 => 1601226041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f710e3e40e396_34699925 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <?php if ($_smarty_tpl->tpl_vars['current']->value == 'Catálogo') {?>
        <link rel="stylesheet" href="./css/catalogo.css">
        <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="./main.js"><?php echo '</script'; ?>
>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['current']->value == 'Administrar') {?>
        <link rel="stylesheet" href="./css/administrar.css">
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['current']->value == 'Iniciar Sesión' || $_smarty_tpl->tpl_vars['current']->value == 'Registrarse') {?>
        <link rel="stylesheet" href="./css/log.css">
    <?php }?>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"><?php echo '</script'; ?>
>
    <title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>
</head>

<body><?php }
}
