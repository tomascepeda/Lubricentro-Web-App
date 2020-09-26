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
        $sentencia = $this->db->prepare("SELECT * FROM producto");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getProductosPorNombre($nombre)
    {
        $sentencia = $this->db->prepare("SELECT * FROM producto WHERE nombre=?");
        $sentencia->execute(array($nombre));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getProductosPorMarca($marca)
    {
        $sentencia = $this->db->prepare("SELECT * FROM producto WHERE marca=?");
        $sentencia->execute(array($marca));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getMarcas()
    {
        $sentencia = $this->db->prepare("SELECT * FROM marca");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function addProducto($nombre, $marca, $detalle, $precio)
    {
        $sentencia = $this->db->prepare("INSERT INTO producto(nombre, marca, detalle, precio) VALUES(?,?,?,?)");
        $sentencia->execute(array($nombre, $marca, $detalle, $precio));
    }

    function addMarca($nombre)
    {
        $sentencia = $this->db->prepare("INSERT INTO marca(nombre) VALUES(?)");
        $sentencia->execute(array($nombre));
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
        $sentencia = $this->db->prepare("UPDATE producto SET nombre=$nombre marca=$marca detalle=$detalle precio=$precio WHERE id=?");
        $sentencia->execute(array($producto_id));
    }

    function aumentarProducto($producto_id, $precio){
        $sentencia = $this->db->prepare("UPDATE producto SET precio=$precio WHERE id=?");
        $sentencia->execute(array($producto_id));
    }

    function editMarca($marca_id, $nombre)
    {
        $sentencia = $this->db->prepare("UPDATE marca SET nombre=$nombre WHERE id=?");
        $sentencia->execute(array($marca_id));
    }

}
