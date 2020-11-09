<?php

require_once "./ApiREST/View/APIView.php";

abstract class ApiControllerAbs
{
    
    protected $view;

    private $data;

    public function __construct()
    {
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    function getData()
    {
        return json_decode($this->data);
    }
    
}
