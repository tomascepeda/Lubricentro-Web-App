<?php

require_once "./ApiREST/View/APIView.php";
require_once "./Helpers/AuthHelper.php";

abstract class ApiControllerAbs
{
    
    protected $view;
    protected $helper;

    private $data;

    public function __construct()
    {
        $this->helper = new AuthHelper();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    function getData()
    {
        return json_decode($this->data);
    }
    
}
