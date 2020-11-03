<?php

    require_once 'Controller/ViewController.php';
    require_once 'Controller/ProductoController.php';
    require_once 'Controller/MarcaController.php';
    require_once 'Controller/UsuarioController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("HOME", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/home');
    define("CATALOGO", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/catalogo');
    define("ADMIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/administrar');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("REGISTER", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/registrarse');
    define("SHOWMORE", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/showmore');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "ViewController", "Home");
    $r->addRoute("buscar", "POST", "ViewController", "Filtrar");
    $r->addRoute("catalogo", "GET", "ViewController", "Catalogo");
    $r->addRoute("administrar", "GET", "ViewController", "Administrar");
    $r->addRoute("editarproducto/:ID", "GET", "ViewController", "showEditarProducto");
    $r->addRoute("editarmarca/:ID", "GET", "ViewController", "showEditarMarca");
    $r->addRoute("login", "GET", "ViewController", "iniciarSesion");
    $r->addRoute("registrarse", "GET", "ViewController", "Registrarse");
    $r->addRoute("showmore/:ID", "GET", "ViewController", "showVerMas");

    $r->addRoute("eliminarproducto/:ID", "GET", "ProductoController", "eliminarProducto");
    $r->addRoute("agregarproducto", "POST", "ProductoController", "agregarProducto");
    $r->addRoute("editarproducto/editar", "POST", "ProductoController", "editarProducto");
    
    $r->addRoute("editarmarca/editar", "POST", "MarcaController", "editarMarca");
    $r->addRoute("agregarmarca", "POST", "MarcaController", "agregarMarca");
    $r->addRoute("eliminarmarca/:ID", "GET", "MarcaController", "eliminarMarca");

    $r->addRoute("addusuario", "POST", "UsuarioController", "agregarUsuario");
    $r->addRoute("loguearse", "POST", "UsuarioController", "Loguearse");
    $r->addRoute("logout", "GET", "UsuarioController", "cerrarSesion");

    //Ruta por defecto.
    $r->setDefaultRoute("Controller", "Home");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>