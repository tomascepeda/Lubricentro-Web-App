<?php

abstract class ModelAbs
{

    protected $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=lubricentro;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
}