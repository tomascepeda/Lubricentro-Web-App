<?php

require_once "./ApiREST/Model/ComentarioModel.php";
require_once "./ApiREST/View/APIView.php";
require_once "ApiControllerAbs.php";

class ComentarioApiController extends ApiControllerAbs
{

    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new ComentarioModel();
    }

    function getComentarios($params = [])
    {
        if (empty($params)) {
            $comentarios = $this->model->getComentarios();
            return $this->view->response($comentarios, 200);
        } else {
            $producto_id = $params[":ID"];
            $comentarios = $this->model->getComentariosPorIdProducto($producto_id);
            return $this->view->response($comentarios, 200);
        }
    }

    public function addComentario()
    {
        $this->helper->checkLoggedIn();
        $body = $this->getData();
        $producto_id = $body->producto_id;
        $usuario_id = $body->usuario_id;
        $texto = $body->texto;
        $puntaje = $body->puntaje;
        $this->model->addComentario($producto_id, $usuario_id, $texto, $puntaje);
    }

    public function removeComentario($params = [])
    {
        $this->helper->checkLoggedIn();
        $this->helper->checkAdmin();
        $id_comentario = $params[':ID'];
        $comentario = $this->model->getComentarioPorID($id_comentario);
        if (!empty($comentario)) {
            $this->model->removeComentario($id_comentario);
            $this->view->response("Comentario id=$id_comentario eliminado con éxito", 200);
        } else
            $this->view->response("Comentario id=$id_comentario not found", 404);
    }

    public function editComentario($params = [])
    {
        $this->helper->checkLoggedIn();
        $this->helper->checkAdmin();
        $id_comentario = $params[':ID'];
        $producto = $this->model->getComentarioPorID($id_comentario);
        if (!empty($producto)) {
            $body = $this->getData();
            $producto_id = $body->producto_id;
            $usuario_id = $body->usuario_id;
            $texto = $body->texto;
            $puntaje = $body->puntaje;
            $this->model->editComentario($producto_id, $usuario_id, $texto, $puntaje, $id_comentario);
            $this->view->response("Comentario id=$id_comentario actualizado con éxito", 200);
        } else
            $this->view->response("Comentario id=$id_comentario not found", 404);
    }
}
