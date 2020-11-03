<?php

require_once "ModelAbs.php";

class ProductoModel extends ModelAbs{

    function __construct()
    {
        parent::__construct();
    }

    function getProductos()
    {
        $query = $this->db->prepare("SELECT * FROM producto ORDER BY `producto`.`nombre` ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProductosPorNombre($nombre)
    {
        $query = $this->db->prepare("SELECT * FROM producto WHERE nombre=?");
        $query->execute(array($nombre));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProductoPorID($id_producto)
    {
        $query = $this->db->prepare("SELECT * FROM producto WHERE id=?");
        $query->execute(array($id_producto));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getProductosPorMarca($marca)
    {
        $query = $this->db->prepare("SELECT * FROM producto WHERE id_marca=?");
        $query->execute(array($marca));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function addProducto($nombre, $detalle, $precio, $marca)
    {
        $query = $this->db->prepare("INSERT INTO producto(nombre, descripcion, precio, id_marca) VALUES(?,?,?,?)");
        $query->execute(array($nombre, $detalle, $precio, $marca));
    }

    function removeProducto($producto_id)
    {
        $query = $this->db->prepare("DELETE FROM producto WHERE id=?");
        $query->execute(array($producto_id));
    }

    function editProducto($producto_id, $nombre, $marca, $detalle, $precio)
    {
        $query = $this->db->prepare("UPDATE producto SET nombre=?, descripcion=?, precio=?, id_marca=? WHERE id=?");
        $query->execute(array($nombre, $detalle, $precio, $marca, $producto_id));
    }

}