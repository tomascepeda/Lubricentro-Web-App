<?php

require_once "ApiREST/Controller/ComentarioApiController.php";
require_once 'libs/RouterClass.php';

$router = new Router();

$router->addRoute('comentarios', 'GET', 'ComentarioApiController', 'getComentarios');
$router->addRoute('comentarios/:ID', 'GET', 'ComentarioApiController', 'getComentarios');
$router->addRoute('comentarios', 'POST', 'ComentarioApiController', 'addComentario');
$router->addRoute('comentarios/:ID', 'DELETE', 'ComentarioApiController', 'removeComentario');
$router->addRoute('comentarios/:ID', 'PUT', 'ComentarioApiController', 'editComentario');

//run
$router->route($_GET['action'], $_SERVER['REQUEST_METHOD']);