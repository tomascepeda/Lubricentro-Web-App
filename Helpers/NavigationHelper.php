<?php

class NavigationHelper
{
    public function setNpaginacion($npaginacion)
    {
        $_SESSION["NPAGINACION"] = $npaginacion;
    }

    public function getNpaginacion()
    {
        if (isset($_SESSION["NPAGINACION"]))
            return $_SESSION["NPAGINACION"];
        else
            return 5;
    }
}
