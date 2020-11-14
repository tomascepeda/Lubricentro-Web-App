<?php

require_once "./Model/ModelAbs.php";

class ComentarioModel extends ModelAbs
{

    function __construct()
    {
        parent::__construct();
    }

    function getComentarios()
    {
        $query = $this->db->prepare("SELECT comentario.*,producto.*,usuario.nombre,usuario.admin FROM comentario JOIN producto ON producto_id JOIN usuario ON usuario_id WHERE usuario_id=usuario.id && producto_id=producto.id ORDER BY fecha DESC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getComentarioPorID($id_comentario)
    {
        $query = $this->db->prepare("SELECT comentario.*,producto.*,usuario.nombre,usuario.admin FROM comentario JOIN producto ON producto_id JOIN usuario ON usuario_id WHERE usuario_id=usuario.id && producto_id=producto.id && comentario.id_comentario=?");
        $query->execute(array($id_comentario));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getComentariosPorIdProducto($producto_id)
    {
        $query = $this->db->prepare("SELECT comentario.*,producto.*,usuario.nombre,usuario.admin FROM comentario JOIN producto ON producto_id JOIN usuario ON usuario_id WHERE usuario_id=usuario.id && producto_id=producto.id && producto_id=? ORDER BY fecha DESC");
        $query->execute(array($producto_id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function addComentario($producto_id, $usuario_id, $texto, $puntaje)
    {
        $query = $this->db->prepare("INSERT INTO comentario (producto_id, usuario_id, texto, puntaje, fecha) VALUES (?,?,?,?,current_timestamp())");
        $query->execute(array($producto_id, $usuario_id, $texto, $puntaje));
    }

    function removeComentario($id_comentario)
    {
        $query = $this->db->prepare("DELETE FROM comentario WHERE id_comentario=?");
        $query->execute(array($id_comentario));
    }

    function editComentario($producto_id, $usuario_id, $texto, $puntaje, $id_comentario)
    {
        $query = $this->db->prepare("UPDATE comentario SET producto_id=?, usuario_id=?, texto=?, puntaje=?, fecha=current_timestamp() WHERE id_comentario=?");
        $query->execute(array($producto_id, $usuario_id, $texto, $puntaje, $id_comentario));
    }
    
}
