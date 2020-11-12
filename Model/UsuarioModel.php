<?php

require_once "ModelAbs.php";

class UsuarioModel extends ModelAbs{

    function __construct()
    {
        parent::__construct();
    }

    function getUsuarios($exception)
    {
        $query = $this->db->prepare("SELECT id,nombre,usuario.admin FROM usuario WHERE nombre != ?");
        $query->execute(array($exception));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getUsuarioPorNombre($nombre){
        $query = $this->db->prepare("SELECT * FROM usuario WHERE nombre=?");
        $query->execute(array($nombre));
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
    function addUsuario($nombre, $contraseña)
    {
        $query = $this->db->prepare("INSERT INTO usuario(nombre, contraseña) VALUES(?,?)");
        $query->execute(array($nombre, $contraseña));
    }

    function removeUsuario($usuario_id)
    {
        $query = $this->db->prepare("DELETE FROM usuario WHERE id=?");
        $query->execute(array($usuario_id));
    }

        function editUsuario($admin, $usuario_id)
    {
        $query = $this->db->prepare("UPDATE usuario SET admin=? WHERE id=?");
        $query->execute(array($admin, $usuario_id));
    }

}