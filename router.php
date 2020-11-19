<?php

    require_once 'Controller/ViewController.php';
    require_once 'Controller/ProductoController.php';
    require_once 'Controller/MarcaController.php';
    require_once 'Controller/UsuarioController.php';
    require_once 'libs/RouterClass.php';
    
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

    //                                ViewController
    $r->addRoute("home", "GET", "ViewController", "Home");
    $r->addRoute("browse", "GET", "ViewController", "Buscar");
    $r->addRoute("catalogo", "GET", "ViewController", "Catalogo");
    $r->addRoute("previous", "POST", "ViewController", "CatalogoPaginadoPrevious");
    $r->addRoute("next", "POST", "ViewController", "CatalogoPaginadoNext");
    $r->addRoute("administrar", "GET", "ViewController", "Administrar");
    $r->addRoute("editarproducto/:ID", "GET", "ViewController", "showEditarProducto");
    $r->addRoute("editarmarca/:ID", "GET", "ViewController", "showEditarMarca");
    $r->addRoute("login", "GET", "ViewController", "iniciarSesion");
    $r->addRoute("registrarse", "GET", "ViewController", "Registrarse");
    $r->addRoute("showmore/:ID", "GET", "ViewController", "showVerMas");

    //                                ProductoController
    $r->addRoute("eliminarproducto/:ID", "GET", "ProductoController", "eliminarProducto");
    $r->addRoute("eliminarproductos", "GET", "ProductoController", "eliminarProductos");
    $r->addRoute("eliminarimagen/:ID", "GET", "ProductoController", "eliminarImagen");
    $r->addRoute("agregarproducto", "POST", "ProductoController", "agregarProducto");
    $r->addRoute("editarproducto/editar", "POST", "ProductoController", "editarProducto");
    $r->addRoute("aumentarProductos", "POST", "ProductoController", "aumentarProductos");
    
    //                                MarcaController
    $r->addRoute("editarmarca/editar", "POST", "MarcaController", "editarMarca");
    $r->addRoute("agregarmarca", "POST", "MarcaController", "agregarMarca");
    $r->addRoute("eliminarmarca/:ID", "GET", "MarcaController", "eliminarMarca");

    //                                UsuarioController
    $r->addRoute("addusuario", "POST", "UsuarioController", "agregarUsuario");
    $r->addRoute("loguearse", "POST", "UsuarioController", "Loguearse");
    $r->addRoute("logout", "GET", "UsuarioController", "cerrarSesion");
    $r->addRoute("eliminarusuario/:ID", "GET", "UsuarioController", "eliminarUsuario");
    $r->addRoute("modificarpermisos/:ID", "GET", "UsuarioController", "modificarPermisos");

    //Ruta por defecto.
    $r->setDefaultRoute("ViewController", "default");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>