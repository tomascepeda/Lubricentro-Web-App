<?php

require_once "ModelAbs.php";

class MarcaModel extends ModelAbs{
    
    function __construct()
    {
        parent::__construct();
    }

    function getMarcas()
    {
        $query = $this->db->prepare("SELECT * FROM marca ORDER BY `nombre_marca` ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getMarcaPorID($id_marca)
    {
        $query = $this->db->prepare("SELECT * FROM marca WHERE id=?");
        $query->execute(array($id_marca));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function addMarca($nombre, $origen)
    {
        $query = $this->db->prepare("INSERT INTO marca(nombre_marca, origen) VALUES(?,?)");
        $query->execute(array($nombre, $origen));
    }

    function removeMarca($marca_id)
    {
        $query = $this->db->prepare("DELETE FROM marca WHERE id=?");
        $query->execute(array($marca_id));
    }

    function editMarca($marca_id, $nombre, $origen)
    {
        $query = $this->db->prepare("UPDATE marca SET nombre_marca=?, origen=? WHERE id=?");
        $query->execute(array($nombre, $origen, $marca_id));
    }

}