<?php
    require_once 'Controller/Controller.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("Inicio", "GET", "Controller", "Home");
    $r->addRoute("buscar", "POST", "Controller", "Filtrar");
    $r->addRoute("Catálogo", "GET", "Controller", "Catalogo");
    $r->addRoute("Administrar", "GET", "Controller", "Administrar");
    $r->addRoute("agregarMarca", "POST", "Controller", "agregarMarca");
    $r->addRoute("eliminarMarca/:ID", "GET", "Controller", "eliminarMarca");
    $r->addRoute("eliminarProducto/:ID", "GET", "Controller", "eliminarProducto");
    $r->addRoute("agregarProducto", "POST", "Controller", "agregarProducto");
    $r->addRoute("aumentarProductos", "POST", "Controller", "aumentarProductos");
    $r->addRoute("editarProducto/:ID", "GET", "Controller", "showEditarProducto");
    $r->addRoute("editarProducto/editar", "POST", "Controller", "editarProducto");
    $r->addRoute("editarMarca/:ID", "GET", "Controller", "showEditarMarca");
    $r->addRoute("editarMarca/editar", "POST", "Controller", "editarMarca");
    $r->addRoute("login", "GET", "Controller", "iniciarSesion");
    $r->addRoute("register", "GET", "Controller", "Registrarse");
    $r->addRoute("registrarse", "POST", "Controller", "agregarUsuario");

    //Ruta por defecto.
    $r->setDefaultRoute("Controller", "Home");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>