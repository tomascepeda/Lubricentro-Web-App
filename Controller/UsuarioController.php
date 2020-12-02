<?php

require_once "ControllerAbs.php";
require_once "./Helpers/AuthHelper.php";

class UsuarioController
{

    private $view;
    private $model;
    private $logueado;
    private $admin;
    private $helper;

    function __construct()
    {
        $this->view = new View();
        $this->model = new UsuarioModel();
        $this->helper = new AuthHelper();
        $this->logueado = $this->helper->isLogged();
        $this->admin = $this->helper->isAdmin();
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
                $this->helper->login($this->model->getUsuarioPorNombre($nombre));
                header("Location: " . HOME);
            } else
                $this->view->showRegister($this->logueado, $this->admin, true);
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
                        $this->view->showLogin($this->logueado, $this->admin, true);
                } else {
                    $this->view->showLogin($this->logueado, $this->admin, true);
                }
            }
        } else {
            header("Location " . HOME);
        }
    }

    function cerrarSesion()
    {
        $this->helper->logout();
        header("Location: " . LOGIN);
    }

    function eliminarUsuario($params = null)
    {
        //compruebo que es el usuario logeado
        $this->helper->checkLoggedIn();
        //compruebo permisos
        $this->helper->checkAdmin();
        $usuario_id = $params[':ID'];
        $this->model->removeUsuario($usuario_id);
        header("Location: " . ADMIN);
    }

    function modificarPermisos($params = null)
    {
        //compruebo que es el usuario logeado
        $this->helper->checkLoggedIn();
        //compruebo permisos
        $this->helper->checkAdmin();
        $user = $params[':ID'];
        $usuario = $this->model->getUsuarioPorNombre($user);
        if ($usuario->admin == 1) {
            $this->model->editUsuario(0, $usuario->id);
        } else {
            $this->model->editUsuario(1, $usuario->id);
        }
        header("Location: " . ADMIN);
    }
}
