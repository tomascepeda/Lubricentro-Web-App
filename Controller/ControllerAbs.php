<?php

require_once "./Helpers/AuthHelper.php";
require_once "./Model/ProductoModel.php";
require_once "./Model/MarcaModel.php";
require_once "./Model/UsuarioModel.php";

abstract class ControllerAbs{

    protected $helper;

    function __construct()
    {
        $this->helper = new AuthHelper();
    }
    
}