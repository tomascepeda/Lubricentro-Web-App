<?php
    require_once 'Controller/Controller.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "Controller", "Home");
    $r->addRoute("", "GET", "Controller", "Home");
    $r->addRoute(" ", "GET", "Controller", "Home");

    //Esto lo veo en View
    $r->addRoute("insert", "POST", "Controller", "InsertTask");

    $r->addRoute("borrar/:ID", "GET", "Controller", "DeleteTask");
    $r->addRoute("completar/:ID", "GET", "Controller", "UpdateTask");

    //Ruta por defecto.
    $r->setDefaultRoute("Controller", "Home");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>