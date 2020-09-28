<?php

class Model
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=lubricentro;charset=utf8', 'root', '');
    }

    function getProductos()
    {
        $sentencia = $this->db->prepare("SELECT * FROM producto ORDER BY `producto`.`nombre` ASC");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getProductosPorNombre($nombre)
    {
        $sentencia = $this->db->prepare("SELECT * FROM producto WHERE nombre=?");
        $sentencia->execute(array($nombre));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getProductoPorID($id_producto)
    {
        $sentencia = $this->db->prepare("SELECT * FROM producto WHERE id=?");
        $sentencia->execute(array($id_producto));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getProductosPorMarca($marca)
    {
        $sentencia = $this->db->prepare("SELECT * FROM producto WHERE id_marca=?");
        $sentencia->execute(array($marca));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getMarcas()
    {
        $sentencia = $this->db->prepare("SELECT * FROM marca ORDER BY `nombre` ASC");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getMarcaPorID($id_marca)
    {
        $sentencia = $this->db->prepare("SELECT * FROM marca WHERE id=?");
        $sentencia->execute(array($id_marca));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function addProducto($nombre, $detalle, $precio, $marca)
    {
        $sentencia = $this->db->prepare("INSERT INTO producto(nombre, descripcion, precio, id_marca) VALUES(?,?,?,?)");
        $sentencia->execute(array($nombre, $detalle, $precio, $marca));
    }

    function addMarca($nombre)
    {
        $sentencia = $this->db->prepare("INSERT INTO marca(nombre) VALUES(?)");
        $sentencia->execute(array($nombre));
    }

    function addUsuario($nombre, $contraseña)
    {
        $sentencia = $this->db->prepare("INSERT INTO usuario(nombre, contraseña) VALUES(?,?)");
        $sentencia->execute(array($nombre, $contraseña));
    }

    function removeProducto($producto_id)
    {
        $sentencia = $this->db->prepare("DELETE FROM producto WHERE id=?");
        $sentencia->execute(array($producto_id));
    }

    function removeMarca($marca_id)
    {
        $sentencia = $this->db->prepare("DELETE FROM marca WHERE id=?");
        $sentencia->execute(array($marca_id));
    }

    function editProducto($producto_id, $nombre, $marca, $detalle, $precio)
    {
        $sentencia = $this->db->prepare("UPDATE producto SET nombre='$nombre', descripcion='$detalle', precio='$precio', id_marca='$marca' WHERE id=?");
        $sentencia->execute(array($producto_id));
    }

    function aumentarProductos($marca_id, $porcentaje)
    {
        $sentencia = $this->db->prepare("UPDATE producto SET precio=precio+(precio*$porcentaje/100) WHERE id_marca=?");
        $sentencia->execute(array($marca_id));
    }

    function editMarca($marca_id, $nombre)
    {
        $sentencia = $this->db->prepare("UPDATE marca SET nombre='$nombre' WHERE id=?");
        $sentencia->execute(array($marca_id));
    }

    function getUsuarioPorNombre($nombre){
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE nombre=?");
        $sentencia->execute(array($nombre));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}