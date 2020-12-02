<?php

require_once "./View/View.php";
require_once "ControllerAbs.php";
require_once "./Model/ProductoModel.php";
require_once "./Model/MarcaModel.php";
require_once "./Model/UsuarioModel.php";
require_once "./ApiREST/Model/ComentarioModel.php";
require_once "./Helpers/NavigationHelper.php";

class ViewController extends ControllerAbs
{

    private $view;
    private $logueado;
    private $admin;
    private $user;
    private $productoModel;
    private $marcaModel;
    private $userModel;
    private $comentarioModel;
    private $navigationHelper;

    //paginacion
    private $npaginacion;
    private $cantpag;

    function __construct()
    {
        parent::__construct();
        $this->view = new View();
        $this->productoModel = new ProductoModel();
        $this->marcaModel = new MarcaModel();
        $this->userModel = new UsuarioModel();
        $this->comentarioModel = new ComentarioModel();
        $this->navigationHelper = new NavigationHelper();
        if ($this->helper->isLogged()) {
            $this->user = $this->helper->getLoggedUserName();
            $this->logueado = true;
            $this->admin = $this->helper->isAdmin();
        }
        $this->npaginacion = $this->navigationHelper->getNpaginacion(); //sirve para cambiar la cantidad de items que se muestran en la paginacion
        $this->cantpag = 0; //se modifica dinamicamente
    }

    function
    default()
    {
        //sirve para limpiar la url y redirigir a home en caso de encontrar una ruta sin setear
        header("Location: " . HOME);
    }

    function Home()
    {
        $this->view->showHome(null, null, null, $this->user, $this->logueado, $this->admin);
    }

    function Buscar()
    {
        if (isset($_GET["busqueda"]) && isset($_GET["criterio"])) {
            $busqueda = $_GET["busqueda"];
            $criterio = $_GET["criterio"];
            $productos = $this->productoModel->getProductosFiltrados(strtolower($criterio), $busqueda);
            if (empty($productos)) {
                $this->default();
                die();
            }
            $marcas = $this->marcaModel->getMarcas();
            $busqueda = $criterio . " " . strtoupper($busqueda);
            $this->view->showHome($productos, $busqueda, $marcas, $this->user, $this->logueado, $this->admin);
        } else {
            $this->default();
        }
    }

    function Catalogo()
    {
        $marcas = $this->marcaModel->getMarcas();
        //valores default de la paginacion
        $inicio = 0;
        $pagina = 1;
        //la consulta devuelve $npaginacion elementos, partiendo del elemento en la posicion $inicio de la db
        $productos = $this->productoModel->getProductosLimitados($inicio, $this->npaginacion);
        $allproductos = $this->productoModel->getProductos();
        $this->cantpag = floor(count($allproductos) / $this->npaginacion);
        if ($this->cantpag > 12) {
            $this->setNpaginacionPrivate(floor(count($allproductos) / 12));
            $this->cantpag = floor(count($allproductos) / $this->npaginacion);
        }
        $this->view->showCatalogo($productos, $allproductos, $pagina, $this->cantpag, $this->npaginacion, $marcas, $this->user, $this->logueado, $this->admin);
    }

    function navegacionCatalogo()
    {
        if (isset($_GET["page"])) {
            $marcas = $this->marcaModel->getMarcas();
            $allproductos = $this->productoModel->getProductos();
            $this->cantpag = floor(count($allproductos) / $this->npaginacion);
            if ($this->cantpag > 12) {
                $this->setNpaginacionPrivate(floor(count($allproductos) / 12));
                $this->cantpag = floor(count($allproductos) / $this->npaginacion);
            }
            $pagina = $_GET["page"];
            if ($pagina == null || !is_numeric($pagina))
                $pagina = 1;
            else
                $pagina = intval($pagina);
            if ($pagina <= 1) {
                $pagina = 1;
                $inicio = 0;
            } else if ($pagina >= $this->cantpag) {
                $pagina = $this->cantpag;
                $inicio = $this->npaginacion * $this->cantpag;
            } else
                $inicio = $this->npaginacion * $pagina;
            $productos = $this->productoModel->getProductosLimitados($inicio, $this->npaginacion);
            $this->view->showCatalogo($productos, $allproductos, $pagina, $this->cantpag, $this->npaginacion, $marcas, $this->user, $this->logueado, $this->admin);
        } else
            header("Location: " . CATALOGO);
    }

    function setNpaginacion()
    {
        if (isset($_POST["cantpaginas"])) {
            if ($_POST["cantpaginas"] <= 0 || !is_numeric($_POST["cantpaginas"])) {
                $_POST["cantpaginas"] = 5;
            }
            $this->navigationHelper->setNpaginacion(floor($_POST["cantpaginas"]));
        }
        header("Location: " . CATALOGO);
    }

    private function setNpaginacionPrivate($paginas)
    {
        $this->navigationHelper->setNpaginacion(floor($paginas));
        header("Location: " . CATALOGO);
    }

    function Administrar()
    {
        $this->helper->checkLoggedIn();
        $this->helper->checkAdmin();
        $productos = $this->productoModel->getProductos();
        $marcas = $this->marcaModel->getMarcas();
        $usuarios = $this->userModel->getUsuarios($this->user);
        $usuarioactual = $this->userModel->getUsuarioPorNombre($this->user);
        $this->view->showAdministrator($productos, $marcas, $usuarios, $this->user, $this->logueado, $this->admin, $usuarioactual);
    }

    function showEditarProducto($params = null)
    {
        $this->helper->checkLoggedIn();
        $this->helper->checkAdmin();
        $producto_id = $params[':ID'];
        $producto = $this->productoModel->getProductoPorID($producto_id);
        $marcas = $this->marcaModel->getMarcas();
        $usuarioactual = $this->userModel->getUsuarioPorNombre($this->user);
        $this->view->showEditarProducto($producto_id, $marcas, $producto, $this->logueado, $this->admin, $usuarioactual);
    }

    function showEditarMarca($params = null)
    {
        $this->helper->checkLoggedIn();
        $this->helper->checkAdmin();
        $marca_id = $params[':ID'];
        $marca = $this->marcaModel->getMarcaPorID($marca_id);
        $this->view->showEditarMarca($marca_id, $marca, $this->logueado, $this->admin);
    }

    function iniciarSesion()
    {
        if (!$this->logueado) {
            $this->view->showLogin($this->logueado, $this->admin, false);
        } else {
            $this->default();
        }
    }

    function Registrarse()
    {
        if (!$this->logueado) {
            $this->view->showRegister($this->logueado, $this->admin, false);
        } else {
            $this->default();
        }
    }

    function showVerMas($params = null)
    {
        $producto_id = $params[':ID'];
        $producto = $this->productoModel->getProductoPorID($producto_id);
        if (!empty($producto)) {
            $marca = $this->marcaModel->getMarcaPorID($producto->id_marca);
            $usuario = $this->userModel->getUsuarioPorNombre($this->user);
            $comentarios = $this->comentarioModel->getComentariosPorIdProducto($producto_id);
            if (!empty($comentarios)) {
                $suma = 0;
                $cant = 0;
                foreach ($comentarios as $i) {
                    $suma += $i->puntaje;
                    $cant++;
                }
                $promedio = $suma / $cant;
            } else
                $promedio = 0;
            $this->view->verMas($producto, $marca, $this->logueado, $this->admin, $this->user, $usuario, round($promedio));
        } else {
            header("Location: " . CATALOGO);
        }
    }
}
