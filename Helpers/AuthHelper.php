<?php

class AuthHelper
{

    function __construct()
    {
        session_start();
    }

    public function login($user)
    {
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['USERNAME'] = $user->nombre;
        $_SESSION['ADMIN'] = $user->admin;
    }

    public function logout()
    {
        session_destroy();
    }

    public function checkLoggedIn()
    {
        if (!isset($_SESSION["USERNAME"])) {
            header("Location:" . LOGIN);
            die();
        }
    }

    public function checkAdmin(){
        if($_SESSION['ADMIN'] == 0){
            header("Location:" . ADMIN);
            die();
        }
    }

    public function getLoggedUserName()
    {
        return $_SESSION['USERNAME'];
    }

    public function isLogged()
    {
        return isset($_SESSION['USERNAME']);
    }
}
