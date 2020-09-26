<?php

require_once "./View/View.php";
require_once "./Model/Model.php";


class Controller
{

    private $view;
    private $model;

    function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
    }

    function Home($busqueda = null) //nombre de la busqueda
    {
        if ($busqueda == null) {
            $busqueda = " ";
        }
        $productos = $this->model->getProductosPorNombre($busqueda);
        $user = null;
        $marcas = $this->model->getMarcas();
        $this->view->showHome($productos, $user, $busqueda, $marcas);
    }

    function Filtrar()
    { //muestra la lista con las coincidencias de la busqueda
        $user = null;
        if (isset($_POST['input_buscar'])) {
            $busqueda = $_POST['input_buscar'];
            $productos = $this->model->getProductosPorNombre($busqueda);
            $marcas = $this->model->getMarcas();
            $this->view->showHome($productos, $user, $busqueda, $marcas);
        }
    }

    function Catalogo()
    {
        $productos = $this->model->getProductos();
        $marcas = $this->model->getMarcas();
        $this->view->showCatalogo($productos, $marcas);
    }

    function Administrar()
    {
        $productos = $this->model->getProductos();
        $marcas = $this->model->getMarcas();
        $this->view->showAdministrator($productos, $marcas);
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

    function showEditarProducto($params = null){
        $producto_id = $params[':ID'];
        $marcas = $this->model->getMarcas();
        $this->view->showEditarProducto($producto_id, $marcas);
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

    function showEditarMarca($params = null){
        $marca_id = $params[':ID'];
        $this->view->showEditarMarca($marca_id);
    }
}
