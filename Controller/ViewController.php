<?php

require_once "./View/View.php";
require_once "ControllerAbs.php";
require_once "./Model/ProductoModel.php";
require_once "./Model/MarcaModel.php";
require_once "./Model/UsuarioModel.php";
require_once "./ApiREST/Model/ComentarioModel.php";

class ViewController extends ControllerAbs
{

    private $view;
    private $logueado;
    private $user;
    private $productoModel;
    private $marcaModel;
    private $userModel;
    private $comentarioModel;
    private $npaginacion;

    function __construct()
    {
        parent::__construct();
        $this->view = new View();
        $this->productoModel = new ProductoModel();
        $this->marcaModel = new MarcaModel();
        $this->userModel = new UsuarioModel();
        $this->comentarioModel = new ComentarioModel();
        if ($this->helper->isLogged()) {
            $this->user = $this->helper->getLoggedUserName();
            $this->logueado = true;
        }
        $this->npaginacion = 5; //es "constante", sirve para cambiar la cantidad de items que se muestran en la paginacion
    }

    function
    default()
    {
        //sirve para limpiar la url y redirigir a home en caso de encontrar una ruta sin setear
        header("Location: " . HOME);
    }

    function Home()
    {
        $this->view->showHome(null, null, null, $this->user, $this->logueado);
    }

    function Buscar()
    {
        if (isset($_GET["producto"])) {
            $busqueda = $_GET["producto"];
            $productos = $this->productoModel->getProductosPorNombre($busqueda);
            if (empty($productos)) {
                $this->default();
                die();
            }
            $marcas = $this->marcaModel->getMarcas();
            $this->view->showHome($productos, strtoupper($busqueda), $marcas, $this->user, $this->logueado);
        } else {
            $this->default();
        }
    }

    function Catalogo()
    {
        $marcas = $this->marcaModel->getMarcas();
        //valores default de la paginacion
        $inicio = 0;
        $fin = $this->npaginacion;
        //la consulta devuelve $npaginacion elementos, partiendo del elemento en la posicion $inicio de la db
        $productos = $this->productoModel->getProductosLimitados($inicio, $this->npaginacion);
        $allproductos = $this->productoModel->getProductos();
        $this->view->showCatalogo($productos, $allproductos, $inicio, $fin, true, false, $marcas, $this->user, $this->logueado);
    }

    function CatalogoPaginadoPrevious()
    {
        $marcas = $this->marcaModel->getMarcas();
        if (isset($_POST["inicio"]) && isset($_POST["fin"])) {
            $inicio = $_POST["inicio"];
            $fin = $_POST["fin"];
            //disminuyo los valores de inicio y fin
            $inicio -= $this->npaginacion;;
            $fin -= $this->npaginacion;;
            //compruebo el rango, si se pasan los seteo en default
            if (($inicio - $this->npaginacion) < 0)
                $inicio = 0;
            if (($fin - $this->npaginacion) < $this->npaginacion)
                $fin = $this->npaginacion;
        } else {
            //si no estan seteados los seteo a default
            $inicio = 0;
            $fin = $this->npaginacion;
        }
        //la consulta devuelve $npaginacion elementos, partiendo del elemento en la posicion $inicio de la db
        $productos = $this->productoModel->getProductosLimitados($inicio, $this->npaginacion);
        //compruebo si es la primer pagina
        $top = false;
        if ($inicio == 0)
            $top = true; //se lo paso a smarty y este bloquea el boton
        $allproductos = $this->productoModel->getProductos();
        $this->view->showCatalogo($productos, $allproductos, $inicio, $fin, $top, false, $marcas, $this->user, $this->logueado);
    }

    function CatalogoPaginadoNext()
    {
        $marcas = $this->marcaModel->getMarcas();
        if (isset($_POST["inicio"]) && isset($_POST["fin"])) {
            $inicio = $_POST["inicio"];
            $fin = $_POST["fin"];
            //aumento los indices 
            $inicio += $this->npaginacion;
            $fin += $this->npaginacion;
        } else {
            //si no estan seteados los seteo a default
            $inicio = 0;
            $fin = $this->npaginacion;
        }
        //la consulta devuelve $npaginacion elementos, partiendo del elemento en la posicion $inicio de la db
        $productos = $this->productoModel->getProductosLimitados($inicio, $this->npaginacion);
        //compruebo si es la ultima pagina
        $bottom = false;
        if (count($productos) < $this->npaginacion)
            $bottom = true; //se lo paso a smarty y este bloquea el boton
        //si no encontro elementos le paso la ultima pagina que visito
        if (empty($productos)) {
            $inicio -= $this->npaginacion;
            $fin -= $this->npaginacion;
            $productos = $this->productoModel->getProductosLimitados($inicio, $this->npaginacion);
            //esta en la ultima pagina
            $bottom = true;
        }
        $allproductos = $this->productoModel->getProductos();
        $this->view->showCatalogo($productos, $allproductos, $inicio, $fin, false, $bottom, $marcas, $this->user, $this->logueado);
    }

    function Administrar()
    {
        //compruebo que es el usuario logeado
        $this->helper->checkLoggedIn();
        $productos = $this->productoModel->getProductos();
        $marcas = $this->marcaModel->getMarcas();
        $usuarios = $this->userModel->getUsuarios($this->user);
        $usuarioactual = $this->userModel->getUsuarioPorNombre($this->user);
        $this->view->showAdministrator($productos, $marcas, $usuarios, $this->user, $this->logueado, $usuarioactual);
    }

    function showEditarProducto($params = null)
    {
        //compruebo que es el usuario logeado
        $this->helper->checkLoggedIn();
        $producto_id = $params[':ID'];
        $producto = $this->productoModel->getProductoPorID($producto_id);
        $marcas = $this->marcaModel->getMarcas();
        $usuarioactual = $this->userModel->getUsuarioPorNombre($this->user);
        $this->view->showEditarProducto($producto_id, $marcas, $producto, $this->logueado, $usuarioactual);
    }

    function showEditarMarca($params = null)
    {
        //compruebo que es el usuario logeado
        $this->helper->checkLoggedIn();
        $marca_id = $params[':ID'];
        $marca = $this->marcaModel->getMarcaPorID($marca_id);
        $this->view->showEditarMarca($marca_id, $marca, $this->logueado);
    }

    function iniciarSesion()
    {
        if (!$this->logueado) {
            $this->view->showLogin($this->logueado, false);
        } else {
            $this->default();
        }
    }

    function Registrarse()
    {
        if (!$this->logueado) {
            $this->view->showRegister($this->logueado, false);
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
            $this->view->verMas($producto, $marca, $this->logueado, $this->user, $usuario, round($promedio));
        } else {
            header("Location: " . CATALOGO);
        }
    }
}
