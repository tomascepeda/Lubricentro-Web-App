<?php

require_once('./libs/Smarty.class.php');

class View
{

    private $title;
    private $smarty;
    //private $user;

    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
    }

    function showHome($productos, $title, $user)
    {
        $user = "public";
        $this->title = "Lubricentro";
        $this->smarty->assign('productos' , $productos);
        $this->smarty->assign('titulo' , $title);
        $this->smarty->assign('user', $user);
        $this->smarty->display('templates/home.tpl');
    }










}