<?php

require_once "ModelAbs.php";

class ProductoModel extends ModelAbs
{

    function __construct()
    {
        parent::__construct();
    }

    function getProductos()
    {
        $query = $this->db->prepare("SELECT * FROM producto ORDER BY producto.nombre ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProductosLimitados($inicio, $npaginacion)
    {
        $query = $this->db->prepare("SELECT * FROM producto ORDER BY producto.nombre ASC LIMIT :inicio, :npaginacion");
        $query->bindParam(":inicio", $inicio, PDO::PARAM_INT);
        $query->bindParam(":npaginacion", $npaginacion, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProductosFiltrados($columna, $busqueda)
    {
        switch ($columna) {
            case 'nombre':
                $busqueda = "%" . $busqueda . "%";
                $query = $this->db->prepare("SELECT * FROM producto JOIN marca ON producto.id_marca WHERE nombre LIKE ? && marca.id = producto.id_marca ORDER BY nombre ASC");
                break;
            case 'descripcion':
                $busqueda = "%" . $busqueda . "%";
                $query = $this->db->prepare("SELECT * FROM producto JOIN marca ON producto.id_marca WHERE descripcion LIKE ? && marca.id = producto.id_marca ORDER BY nombre ASC");
                break;
            case 'precio menor a':
                $query = $this->db->prepare("SELECT * FROM producto JOIN marca ON producto.id_marca WHERE precio<=? && marca.id = producto.id_marca ORDER BY precio DESC");
                break;
            case 'precio mayor a':
                $query = $this->db->prepare("SELECT * FROM producto JOIN marca ON producto.id_marca WHERE precio>=? && marca.id = producto.id_marca ORDER BY precio ASC");
                break;
            case 'marca':
                $busqueda = "%" . $busqueda . "%";
                $query = $this->db->prepare("SELECT * FROM producto JOIN marca ON producto.id_marca WHERE marca.nombre_marca LIKE ? && marca.id = producto.id_marca ORDER BY marca.nombre_marca ASC");
                break;
            case 'origen':
                $busqueda = "%" . $busqueda . "%";
                $query = $this->db->prepare("SELECT * FROM producto JOIN marca ON producto.id_marca WHERE marca.origen LIKE ? && marca.id = producto.id_marca ORDER BY marca.nombre_marca ASC");
                break;
            default:
                return null;
                break;
        }
        $query->execute(array($busqueda));
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

    function addProducto($nombre, $detalle, $precio, $imagen = null, $marca)
    {
        $pathImg = null;
        if ($imagen != null)
            $pathImg = $this->uploadImage($imagen);
        $query = $this->db->prepare("INSERT INTO producto(nombre, descripcion, precio, imagen, id_marca) VALUES(?,?,?,?,?)");
        $query->execute(array($nombre, $detalle, $precio, $pathImg, $marca));
    }

    function removeImagen($producto_id)
    {
        $query = $this->db->prepare("UPDATE producto SET imagen=null WHERE id=?");
        $query->execute(array($producto_id));
    }

    function removeProducto($producto_id)
    {
        $query = $this->db->prepare("DELETE FROM producto WHERE id=?");
        $query->execute(array($producto_id));
    }

    function editProducto($producto_id, $nombre, $detalle, $precio, $imagen = null, $marca)
    {
        $pathImg = null;
        if ($imagen != null) {
            if (substr($imagen, 0, -32) == "assets")
                //si ya tiene una cargada la dejo
                $pathImg = $imagen;
            else
                $pathImg = $this->uploadImage($imagen);
        }
        $query = $this->db->prepare("UPDATE producto SET nombre=?, descripcion=?, precio=?, imagen=?, id_marca=? WHERE id=?");
        $query->execute(array($nombre, $detalle, $precio, $pathImg, $marca, $producto_id));
    }

    private function uploadImage($image)
    {
        $target = 'assets/client/images/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }

    function aumentarProductos($marca_id, $porcentaje)
    {
        $sentencia = $this->db->prepare("UPDATE producto SET precio=precio+(precio*?) WHERE id_marca=?");
        $sentencia->execute(array($porcentaje, $marca_id));
    }
}
