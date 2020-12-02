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
        $_SESSION['LAST_ACTIVITY'] = time();
    }

    public function logout()
    {
        session_destroy();
        header("Location:" . LOGIN);
    }

    public function checkLoggedIn()
    {
        if (!$this->isLogged()) {
            $this->logout();
            die();
        }
    }

    public function checkAdmin()
    {
        if ($_SESSION['ADMIN'] == 0) {
            header("Location:" . HOME);
            die();
        }
    }

    public function getLoggedUserName()
    {
        return $_SESSION['USERNAME'];
    }

    public function isLogged()
    {
        if (isset($_SESSION["USERNAME"])) {
            if (
                isset($_SESSION['LAST_ACTIVITY']) &&
                (time() - $_SESSION['LAST_ACTIVITY'] > 1800)
            ) {
                $this->logout(); // destruye la sesión, y vuelve al login
            }

            $_SESSION['LAST_ACTIVITY'] = time(); // actualiza el último instante de actividad
            return true;
        } else
            return false;
    }

    public function isAdmin(){
        return $_SESSION["ADMIN"];
    }

}
