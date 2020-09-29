<?php

require_once "./View/View.php";
require_once "./Model/Model.php";


class Controller
{

    private $view;
    private $model;
    private $logueado;
    private $user;

    function __construct()
    {
        session_start();
        $this->view = new View();
        $this->model = new Model();
        if (isset($_SESSION["user"])) {
            $this->logueado = true;
            $this->user = $_SESSION["user"];
        } else {
            $this->logueado = false;
        }
    }

    function Home($busqueda = null) //nombre de la busqueda
    {
        if ($busqueda == null) {
            $busqueda = " ";
        }
        $productos = $this->model->getProductosPorNombre($busqueda);
        $marcas = $this->model->getMarcas();
        $this->view->showHome($productos, $busqueda, $marcas, $this->user, $this->logueado);
    }

    function Filtrar()
    { //muestra la lista con las coincidencias de la busqueda
        if (isset($_POST['input_buscar'])) {
            $busqueda = $_POST['input_buscar'];
            $productos = $this->model->getProductosPorNombre($busqueda);
            $marcas = $this->model->getMarcas();
            $this->view->showHome($productos, $busqueda, $marcas, $this->user, $this->logueado);
        }
    }

    function Catalogo()
    {
        $productos = $this->model->getProductos();
        $marcas = $this->model->getMarcas();
        $this->view->showCatalogo($productos, $marcas, $this->user, $this->logueado);
    }

    function Administrar()
    {
        if ($this->logueado) {
            $productos = $this->model->getProductos();
            $marcas = $this->model->getMarcas();
            $this->view->showAdministrator($productos, $marcas, $this->user, $this->logueado);
        }else{
            $this->view->showLocation("Inicio");
        }
    }

    function eliminarMarca($params = null)
    {
        $marca_id = $params[':ID'];
        $this->model->removeMarca($marca_id);
        $this->view->showLocation("Administrar");
    }

    function eliminarProducto($params = null)
    {
        $producto_id = $params[':ID'];
        $this->model->removeProducto($producto_id);
        $this->view->showLocation("Administrar");
    }

    function agregarMarca()
    {
        if (isset($_POST['nombre_marca'])) {
            $nombre = $_POST['nombre_marca'];
            $this->model->addMarca($nombre);
        }
        $this->view->showLocation("Administrar");
    }

    function agregarProducto()
    {
        if (isset($_POST['nombre_prod']) && isset($_POST['descrip_prod']) && isset($_POST['precio_prod']) && isset($_POST['marca_prod'])) {
            $nombre = $_POST['nombre_prod'];
            $detalle = $_POST['descrip_prod'];
            $precio = $_POST['precio_prod'];
            $marca = $_POST['marca_prod'];
            $this->model->addProducto($nombre, $detalle, $precio, $marca);
            $this->view->showLocation("Administrar");
        } else {
            $this->view->showLocation("Administrar");
        }
    }

    function aumentarProductos()
    {
        if (isset($_POST['marca_aumentar']) && isset($_POST['porcentaje_aumento'])) {
            $marca_id = $_POST['marca_aumentar'];
            $porcentaje = $_POST['porcentaje_aumento'];;
            $this->model->aumentarProductos($marca_id, $porcentaje);
            $this->view->showLocation("Administrar");
        } else {
            $this->view->showLocation("Administrar");
        }
    }

    function editarProducto()
    {
        if (isset($_POST['edit_nombre']) && isset($_POST['edit_descrip']) && isset($_POST['edit_precio']) && isset($_POST['edit_marca']) && isset($_POST['id_producto'])) {
            $nombre = $_POST['edit_nombre'];
            $detalle = $_POST['edit_descrip'];
            $precio = $_POST['edit_precio'];
            $marca = $_POST['edit_marca'];
            $producto_id = $_POST['id_producto'];
            $this->model->editProducto($producto_id, $nombre, $marca, $detalle, $precio);
            $this->view->showLocation("Administrar");
        } else {
            $this->view->showLocation("Administrar");
        }
    }

    function showEditarProducto($params = null)
    {
        $producto_id = $params[':ID'];
        $producto = $this->model->getProductoPorID($producto_id);
        $marcas = $this->model->getMarcas();
        $this->view->showEditarProducto($producto_id, $marcas, $producto, $this->logueado);
    }

    function editarMarca()
    {
        if (isset($_POST['nombre_marca']) && isset($_POST['id_marca'])) {
            $nombre = $_POST['nombre_marca'];
            $marca_id = $_POST['id_marca'];
            $this->model->editMarca($marca_id, $nombre);
            $this->view->showLocation("Administrar");
        } else {
            $this->view->showLocation("Administrar");
        }
    }

    function showEditarMarca($params = null)
    {
        $marca_id = $params[':ID'];
        $marca = $this->model->getMarcaPorID($marca_id);
        $this->view->showEditarMarca($marca_id, $marca, $this->logueado);
    }

    function iniciarSesion()
    {
        $this->view->showLogin($this->logueado);
    }

    function Registrarse()
    {
        $this->view->showRegister($this->logueado);
    }

    function agregarUsuario()
    {
        if (isset($_POST['user']) && isset($_POST['password'])) {
            $nombre = $_POST['user'];
            $password = $_POST['password'];
            $contraseña = password_hash($password, PASSWORD_DEFAULT);
            $this->model->addUsuario($nombre, $contraseña);
            $this->view->showLocation("Inicio");
        } else {
            $this->view->showLocation("register");
        }
    }

    function Loguearse()
    {
        if (isset($_POST['user']) && isset($_POST['password'])) {
            $nombre = $_POST['user'];
            $password = $_POST['password'];
            $user = $this->model->getUsuarioPorNombre($nombre);
            if (password_verify($password, $user->contraseña)) {
                $_SESSION["user"] = $user;
                $this->logueado = true;
                $this->view->showLocation("Inicio");
            } else
                $this->view->showLocation("login");
        } else {
            $this->view->showLocation("login");
        }
    }

    function cerrarSesion()
    {
        session_destroy();
        $this->view->showLocation("Inicio");
    }
}
