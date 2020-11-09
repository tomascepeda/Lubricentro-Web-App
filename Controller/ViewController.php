<?php

require_once "./View/View.php";
require_once "ControllerAbs.php";
require_once "./Model/ProductoModel.php";
require_once "./Model/MarcaModel.php";

class ViewController extends ControllerAbs
{

    private $view;
    private $logueado;
    private $user;
    private $productoModel;
    private $marcaModel;

    function __construct()
    {
        parent::__construct();
        $this->view = new View();
        $this->productoModel = new ProductoModel();
        $this->marcaModel = new MarcaModel();
        if ($this->helper->isLogged()) {
            $this->user = $this->helper->getLoggedUserName();
            $this->logueado = true;
        }
    }

    function Home()
    {
        $this->view->showHome(null, null, null, $this->user, $this->logueado);
    }

    function Buscar()
    {
        if (isset($_GET["producto"])) {
            $busqueda = $_GET["producto"];
            $productos = $this->productoModel->getProductosPorNombre($busqueda);
            if(empty($productos)){
                header("Location: " . HOME);
                die();
            }
            $marcas = $this->marcaModel->getMarcas();
            $this->view->showHome($productos, strtoupper($busqueda), $marcas, $this->user, $this->logueado);
        } else {
            header("Location: " . HOME);
        }
    }

    function Catalogo()
    {
        $productos = $this->productoModel->getProductos();
        $marcas = $this->marcaModel->getMarcas();
        $this->view->showCatalogo($productos, $marcas, $this->user, $this->logueado);
    }

    function Administrar()
    {
        //compruebo que es el usuario logeado
        $this->helper->checkLoggedIn();
        $productos = $this->productoModel->getProductos();
        $marcas = $this->marcaModel->getMarcas();
        $this->view->showAdministrator($productos, $marcas, $this->user, $this->logueado);
    }

    function showEditarProducto($params = null)
    {
        //compruebo que es el usuario logeado
        $this->helper->checkLoggedIn();
        $producto_id = $params[':ID'];
        $producto = $this->productoModel->getProductoPorID($producto_id);
        $marcas = $this->marcaModel->getMarcas();
        $this->view->showEditarProducto($producto_id, $marcas, $producto, $this->logueado);
    }

    function showEditarMarca($params = null)
    {
        //compruebo que es el usuario logeado
        $this->helper->checkLoggedIn();
        $marca_id = $params[':ID'];
        $marca = $this->marcaModel->getMarcaPorID($marca_id);
        $this->view->showEditarMarca($marca_id, $marca, $this->logueado);
    }

    function iniciarSesion()
    {
        if (!$this->logueado) {
            $this->view->showLogin($this->logueado, false);
        } else {
            header("Location: " . HOME);
        }
    }

    function Registrarse()
    {
        if (!$this->logueado) {
            $this->view->showRegister($this->logueado, false);
        } else {
            header("Location: " . HOME);
        }
    }

    function showVerMas($params = null)
    {
        $producto_id = $params[':ID'];
        $producto = $this->productoModel->getProductoPorID($producto_id);
        if (!empty($producto)) {
            $marca = $this->marcaModel->getMarcaPorID($producto->id_marca);
            $this->view->verMas($producto, $marca, $this->logueado, $this->user);
        } else {
            header("Location: " . CATALOGO);
        }
    }
}
