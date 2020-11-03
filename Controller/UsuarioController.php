<?php

require_once "ControllerAbs.php";
require_once "./Helpers/AuthHelper.php";

class UsuarioController{

    private $view;
    private $model;
    private $logueado;
    private $helper;

    function __construct()
    {
        $this->view = new View();
        $this->model = new UsuarioModel();
        $this->helper = new AuthHelper();
        $this->logueado = $this->helper->isLogged();
    }

    function agregarUsuario()
    {
        if (isset($_POST['user']) && isset($_POST['password'])) {
            $nombre = $_POST['user'];
            $busqueda_usuario = $this->model->getUsuarioPorNombre($nombre);
            if ($busqueda_usuario == false) {
                $password = $_POST['password'];
                $contraseña = password_hash($password, PASSWORD_DEFAULT);
                $this->model->addUsuario($nombre, $contraseña);
                header("Location: " . HOME);
            } else
                $this->view->showRegister($this->logueado, true);
        } else {
            header("Location: " . REGISTER);
        }
    }

    function Loguearse()
    {
        if (!$this->logueado) {
            if (isset($_POST['user']) && isset($_POST['password'])) {
                $nombre = $_POST['user'];
                $password = $_POST['password'];
                $user = $this->model->getUsuarioPorNombre($nombre);
                if ($user != null) {
                    if (password_verify($password, $user->contraseña)) {
                        $this->helper->login($user);
                        header("Location: " . HOME);
                    } else
                        $this->view->showLogin($this->logueado, true);
                } else {
                    $this->view->showLogin($this->logueado, true);
                }
            }
        } else {
            header("Location " . LOGIN);
        }
    }

    function cerrarSesion()
    {
        $this->helper->logout();
       header("Location: " . HOME);
    }

}