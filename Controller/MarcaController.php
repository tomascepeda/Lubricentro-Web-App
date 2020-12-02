<?php

require_once "ControllerAbs.php";
require_once "./View/View.php";
require_once "./Model/MarcaModel.php";
require_once "./Helpers/AuthHelper.php";

class MarcaController extends ControllerAbs
{

    private $model;

    function __construct()
    {
        parent::__construct();
        $this->model = new MarcaModel();
    }

    function agregarMarca()
    {
        $this->helper->checkLoggedIn();
        $this->helper->checkAdmin();
        if (isset($_POST['nombre_marca']) && isset($_POST['origen_marca'])) {
            $nombre = $_POST['nombre_marca'];
            $origen = $_POST['origen_marca'];
            $this->model->addMarca(strtoupper($nombre), strtoupper($origen));
        }
        header("Location: " . ADMIN);
    }

    function eliminarMarca($params = null)
    {
        $this->helper->checkLoggedIn();
        $this->helper->checkAdmin();
        $marca_id = $params[':ID'];
        $this->model->removeMarca($marca_id);
        header("Location: " . ADMIN);
    }

    function editarMarca()
    {
        $this->helper->checkLoggedIn();
        $this->helper->checkAdmin();
        if (isset($_POST['nombre_marca']) && isset($_POST['origen_marca']) && isset($_POST['id_marca'])) {
            $nombre = $_POST['nombre_marca'];
            $origen = $_POST['origen_marca'];
            $marca_id = $_POST['id_marca'];
            $this->model->editMarca($marca_id, strtoupper($nombre), strtoupper($origen));
            header("Location: " . ADMIN);
        } else {
            header("Location: " . ADMIN);
        }
    }
}
