<?php
namespace Controladores;
require "modelo/Cerveza.php";
use Modelo\Cerveza;

class InicioControlador
{
    function __construct()
    {
        // require "views/Home/index.php";
    }

    function inicio()
    {
        $cervezas = Cerveza::todas();
        require "vistas/Home/inicio.php";
    }
}
