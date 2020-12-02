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
        $this->helper->checkLoggedIn();
        $this->helper->checkAdmin();
        if (isset($_POST['nombre_prod']) && isset($_POST['descrip_prod']) && isset($_POST['precio_prod']) && isset($_POST['marca_prod'])) {
            $nombre = $_POST['nombre_prod'];
            $detalle = $_POST['descrip_prod'];
            $precio = $_POST['precio_prod'];
            $marca = $_POST['marca_prod'];
            if (
                $_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg"
                || $_FILES['input_name']['type'] == "image/png"
            ) {
                //como en la view el input esta oculto para el usuario sin permisos, compruebo que realmente es un usuario admin
                $this->helper->checkAdmin();
                $this->model->addProducto(strtoupper($nombre), strtoupper($detalle), $precio, $_FILES['input_name']['tmp_name'], $marca);
            } else
                $this->model->addProducto(strtoupper($nombre), strtoupper($detalle), $precio, null, $marca);
            header("Location: " . ADMIN);
        } else {
            header("Location: " . ADMIN);
        }
    }

    function eliminarProducto($params = null)
    {
        $this->helper->checkLoggedIn();
        $this->helper->checkAdmin();
        $producto_id = $params[':ID'];
        $this->model->removeProducto($producto_id);
        header("Location: " . ADMIN);
    }

    function eliminarProductos()
    {
        $this->helper->checkLoggedIn();
        $this->helper->checkAdmin();
        if (isset($_GET["mischecks"])) {
            $valoresCheck = $_GET["mischecks"];
            foreach ($valoresCheck as $i) {
                $this->model->removeProducto($i);
            }
            header("Location: " . ADMIN);
        } else
            header("Location: " . ADMIN);
    }

    function eliminarImagen($params = null)
    {
        $this->helper->checkLoggedIn();
        $this->helper->checkAdmin();
        $producto_id = $params[':ID'];
        $producto = $this->model->getProductoPorID($producto_id);
        $path = $producto->imagen;
        unlink($path);
        $this->model->removeImagen($producto_id);
        header("Location: " . ADMIN);
    }

    function editarProducto()
    {
        $this->helper->checkLoggedIn();
        $this->helper->checkAdmin();
        if (isset($_POST['edit_nombre']) && isset($_POST['edit_descrip']) && isset($_POST['edit_precio']) && isset($_POST['edit_marca']) && isset($_POST['id_producto'])) {
            $nombre = $_POST['edit_nombre'];
            $detalle = $_POST['edit_descrip'];
            $precio = $_POST['edit_precio'];
            $marca = $_POST['edit_marca'];
            $producto_id = $_POST['id_producto'];
            if (
                $_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg"
                || $_FILES['input_name']['type'] == "image/png"
            ) {
                //como en la view el input esta oculto para el usuario sin permisos, compruebo que realmente es un usuario admin
                $this->helper->checkAdmin();
                $this->model->editProducto($producto_id, strtoupper($nombre), strtoupper($detalle), $precio, $_FILES['input_name']['tmp_name'], $marca);
            } else {
                //si no me setea una imagen pero el producto ya tiene una, le paso la misma a la query
                $imagen = $this->model->getProductoPorID($producto_id)->imagen;
                $this->model->editProducto($producto_id, strtoupper($nombre), strtoupper($detalle), $precio, $imagen, $marca);
            }
            header("Location: " . ADMIN);
        } else {
            header("Location: " . ADMIN);
        }
    }

    function aumentarProductos()
    {
        $this->helper->checkLoggedIn();
        $this->helper->checkAdmin();
        if (isset($_POST['marca_aumentar']) && isset($_POST['porcentaje_aumento'])) {
            $marca_id = $_POST['marca_aumentar'];
            $porcentaje = $_POST['porcentaje_aumento'];
            $porcentaje = $porcentaje / 100;
            $this->model->aumentarProductos($marca_id, $porcentaje);
            header("Location: " . ADMIN);
        } else {
            header("Location: " . ADMIN);
        }
    }
}
