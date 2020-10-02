<?php

require_once('./libs/Smarty.class.php');

class View
{

    private $title;
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('url', '//' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/');
    }

    function showHome($productos, $nombre, $marcas, $user, $logueado)
    {
        $this->title = "Lubricentro";
        $current = "Inicio";
        $current1 = "Catálogo";
        $current2 = "Administrar";
        $this->smarty->assign('nombre', $nombre); //de la busqueda
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('current', $current); //para el nav
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->display('templates/home.tpl');
    }

    function showCatalogo($productos, $marcas, $user, $logueado)
    {
        $this->title = "Catálogo | Lubricentro";
        $current = "Catálogo";
        $current1 = "Inicio";
        $current2 = "Administrar";
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->display('templates/catalogo.tpl');
    }

    function showAdministrator($productos, $marcas, $user, $logueado)
    {
        $this->title = "Administrar | Lubricentro";
        $current = "Administrar";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->display('templates/admin.tpl');
    }

    function showEditarProducto($producto_id, $marcas, $producto, $logueado)
    {
        $this->title = "Editar Producto | Lubricentro";
        $current = "Administrar";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->assign('producto', $producto);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->assign('producto_id', $producto_id);
        $this->smarty->display('templates/editar-producto.tpl');
    }

    function showEditarMarca($marca_id, $marca, $logueado)
    {
        $this->title = "Editar Marca | Lubricentro";
        $current = "Administrar";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->assign('marca', $marca);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->assign('marca_id', $marca_id);
        $this->smarty->display('templates/editar-marca.tpl');
    }

    function showLogin($logueado)
    {
        $this->title = "Iniciar Sesión | Lubricentro";
        $current = "Iniciar Sesión";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->display('templates/login.tpl');
    }

    function showRegister($logueado)
    {
        $this->title = "Registrarse | Lubricentro";
        $current = "Registrarse";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->display('templates/register.tpl');
    }

    function verMas($producto, $marca, $logueado, $user)
    {
        $this->title = "Ver Producto | Lubricentro";
        $current = "Ver Más";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->assign('producto', $producto);
        $this->smarty->assign('marca', $marca);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->assign('user', $user);
        $this->smarty->display('templates/more.tpl');
    }

    function showLocation($page)
    {
        header("Location: " . BASE_URL . $page);
    }
}
