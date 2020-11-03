<?php

require_once "ControllerAbs.php";
require_once "./View/View.php";
require_once "./Model/ProductoModel.php";

class ProductoController extends ControllerAbs
{

    private $model;

    function __construct()
    {
        parent::__construct();
        $this->model = new ProductoModel();
    }

    function agregarProducto()
    {
        //compruebo que es el usuario logeado
        $this->helper->checkLoggedIn();
        if (isset($_POST['nombre_prod']) && isset($_POST['descrip_prod']) && isset($_POST['precio_prod']) && isset($_POST['marca_prod'])) {
            $nombre = $_POST['nombre_prod'];
            $detalle = $_POST['descrip_prod'];
            $precio = $_POST['precio_prod'];
            $marca = $_POST['marca_prod'];
            $this->model->addProducto(strtoupper($nombre), strtoupper($detalle), $precio, $marca);
            header("Location: " . ADMIN);
        } else {
            header("Location: " . ADMIN);
        }
    }

    function eliminarProducto($params = null)
    {
        //compruebo que es el usuario logeado
        $this->helper->checkLoggedIn();
        $producto_id = $params[':ID'];
        $this->model->removeProducto($producto_id);
        header("Location: " . ADMIN);
    }

    function editarProducto()
    {
        //compruebo que es el usuario logeado
        $this->helper->checkLoggedIn();
        if (isset($_POST['edit_nombre']) && isset($_POST['edit_descrip']) && isset($_POST['edit_precio']) && isset($_POST['edit_marca']) && isset($_POST['id_producto'])) {
            $nombre = $_POST['edit_nombre'];
            $detalle = $_POST['edit_descrip'];
            $precio = $_POST['edit_precio'];
            $marca = $_POST['edit_marca'];
            $producto_id = $_POST['id_producto'];
            $this->model->editProducto($producto_id, strtoupper($nombre), $marca, strtoupper($detalle), $precio);
            header("Location: " . ADMIN);
        } else {
            header("Location: " . ADMIN);
        }
    }
}
