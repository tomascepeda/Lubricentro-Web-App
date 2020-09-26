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

    function Home(){
        $productos = $this->model->getProductos();
        $user = null;
        $title = "Lubricentro";
        $this->view->showHome($productos, $title, $user);
    }
}