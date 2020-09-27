<?php

require_once('./libs/Smarty.class.php');

class View
{

    private $title;
    private $smarty;
    //private $user;

    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('url', '//' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/');
    }

    function showHome($productos, $user, $nombre, $marcas)
    {
        $user = "public";
        $this->title = "Lubricentro";
        $current = "Inicio";
        $current1 = "Catálogo";
        $current2 = "Administrar";
        $this->smarty->assign('nombre', $nombre); //de la busqueda
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('current', $current); //para el nav
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->display('templates/home.tpl');
    }

    function showCatalogo($productos, $marcas)
    {
        $user = "public";
        $this->title = "Catálogo | Lubricentro";
        $current = "Catálogo";
        $current1 = "Inicio";
        $current2 = "Administrar";
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->display('templates/catalogo.tpl');
    }

    function showAdministrator($productos, $marcas)
    {
        $user = "root";
        $this->title = "Administrar | Lubricentro";
        $current = "Administrar";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->display('templates/admin.tpl');
    }

    function showEditarProducto($producto_id, $marcas, $producto)
    {
        $user = "public";
        $this->title = "Editar Producto | Lubricentro";
        $current = "Administrar";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('producto', $producto);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->assign('producto_id', $producto_id);
        $this->smarty->display('templates/editar-producto.tpl');
    }

    function showEditarMarca($marca_id, $marca)
    {
        $user = "public";
        $this->title = "Editar Marca | Lubricentro";
        $current = "Administrar";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('marca', $marca);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->assign('marca_id', $marca_id);
        $this->smarty->display('templates/editar-marca.tpl');
    }

    function showLogin(){
        $user = "public";
        $this->title = "Iniciar Sesión | Lubricentro";
        $current = "Iniciar Sesión";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $this->smarty->assign('user', $user);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->display('templates/login.tpl');
    }

    function showRegister(){
        $user = "public";
        $this->title = "Registrarse | Lubricentro";
        $current = "Registrarse";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $this->smarty->assign('user', $user);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->display('templates/register.tpl');
    }

    function showLocation($page)
    {
        header("Location: " . BASE_URL . $page);
    }

}
