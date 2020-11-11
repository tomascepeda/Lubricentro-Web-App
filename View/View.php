<?php

require_once('./libs/Smarty.class.php');

class View
{

    private $title;
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('url', BASE_URL);
    }

    function showHome($productos, $nombre, $marcas, $user, $logueado)
    {
        $this->title = "Lubricentro";
        $current = "Inicio";
        $current1 = "Catálogo";
        $current2 = "Administrar";
        $link1 = HOME;
        $link2 = CATALOGO;
        $link3 = ADMIN;
        $this->smarty->assign('nombre', $nombre); //de la busqueda
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('current', $current); 
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->assign('link1', $link1); 
        $this->smarty->assign('link2', $link2);
        $this->smarty->assign('link3', $link3);
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
        $link1 = CATALOGO;
        $link2 = HOME;
        $link3 = ADMIN;
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->assign('link1', $link1); 
        $this->smarty->assign('link2', $link2);
        $this->smarty->assign('link3', $link3);
        $this->smarty->display('templates/catalogo.tpl');
    }

    function showAdministrator($productos, $marcas, $usuarios, $user, $logueado, $usuarioactual)
    {
        $this->title = "Administrar | Lubricentro";
        $current = "Administrar";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $link1 = ADMIN;
        $link2 = HOME;
        $link3 = CATALOGO;
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->assign('usuarios', $usuarios);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('usuarioactual', $usuarioactual);
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->assign('link1', $link1); 
        $this->smarty->assign('link2', $link2);
        $this->smarty->assign('link3', $link3);
        $this->smarty->display('templates/admin.tpl');
    }

    function showEditarProducto($producto_id, $marcas, $producto, $logueado)
    {
        $this->title = "Editar Producto | Lubricentro";
        $current = "Administrar";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $link1 = ADMIN;
        $link2 = HOME;
        $link3 = CATALOGO;
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->assign('producto', $producto);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->assign('producto_id', $producto_id);
        $this->smarty->assign('link1', $link1); 
        $this->smarty->assign('link2', $link2);
        $this->smarty->assign('link3', $link3);
        $this->smarty->display('templates/editar-producto.tpl');
    }

    function showEditarMarca($marca_id, $marca, $logueado)
    {
        $this->title = "Editar Marca | Lubricentro";
        $current = "Administrar";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $link1 = ADMIN;
        $link2 = HOME;
        $link3 = CATALOGO;
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->assign('marca', $marca);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->assign('marca_id', $marca_id);
        $this->smarty->assign('link1', $link1); 
        $this->smarty->assign('link2', $link2);
        $this->smarty->assign('link3', $link3);
        $this->smarty->display('templates/editar-marca.tpl');
    }

    function showLogin($logueado, $error)
    {
        $this->title = "Iniciar Sesión | Lubricentro";
        $current = "Iniciar Sesión";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $link1 = LOGIN;
        $link2 = HOME;
        $link3 = CATALOGO;
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('link1', $link1); 
        $this->smarty->assign('link2', $link2);
        $this->smarty->assign('link3', $link3);
        $this->smarty->display('templates/login.tpl');
    }

    function showRegister($logueado, $error)
    {
        $this->title = "Registrarse | Lubricentro";
        $current = "Registrarse";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $link1 = REGISTER; 
        $link2 = HOME;
        $link3 = CATALOGO;
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('link1', $link1); 
        $this->smarty->assign('link2', $link2);
        $this->smarty->assign('link3', $link3);
        $this->smarty->display('templates/register.tpl');
    }

    function verMas($producto, $marca, $logueado, $user, $usuario, $promedio)
    {
        $this->title = "Ver Producto | Lubricentro";
        $current = "Ver Más";
        $current1 = "Inicio";
        $current2 = "Catálogo";
        $link1 = SHOWMORE . "/" . $producto->id;
        $link2 = HOME;
        $link3 = CATALOGO;
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->assign('producto', $producto);
        $this->smarty->assign('marca', $marca);
        $this->smarty->assign('current', $current);
        $this->smarty->assign('current1', $current1);
        $this->smarty->assign('current2', $current2);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('usuario', $usuario);
        $this->smarty->assign('link1', $link1); 
        $this->smarty->assign('link2', $link2);
        $this->smarty->assign('link3', $link3);
        $this->smarty->assign('promedio', $promedio);
        $this->smarty->display('templates/more.tpl');
    }
    
}
