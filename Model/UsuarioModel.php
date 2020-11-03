<?php

require_once "ModelAbs.php";

class UsuarioModel extends ModelAbs{

    function __construct()
    {
        parent::__construct();
    }

    function addUsuario($nombre, $contraseña)
    {
        $query = $this->db->prepare("INSERT INTO usuario(nombre, contraseña) VALUES(?,?)");
        $query->execute(array($nombre, $contraseña));
    }

    function getUsuarioPorNombre($nombre){
        $query = $this->db->prepare("SELECT * FROM usuario WHERE nombre=?");
        $query->execute(array($nombre));
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
}