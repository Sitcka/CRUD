<?php
namespace Nucleo;
/*

http://mvc.local/user/index
http://mvc.local/user/index.php?url=user/index

La peticion get:
    http://mvc.local/controlador/metodo/arg1/arg
    http://mvc.local/user/show/1

       Sin TRIM -> /user/show/1/, CON TRIM -> user/show/1 -> EXPLODE -> [user,show,1
*/
// require "../start.php";
    class App
    {
        function __construct()
        {
            //Transformacion para el controlador
            isset($_GET["url"]) ? $url = $_GET["url"]: $url = "inicio";
           $arguments = explode('/',trim($url,'/'));
            // var_dump($arguments);
           //Obtener controlador

           $controllerName = array_shift($arguments); //coge el primer elemento del array y lo quita
            $controllerName = ucwords($controllerName)."Controlador";

            //Transformacion para el metodo
            count($arguments) ? $method = array_shift($arguments) : $method = "inicio";
            // $method

            //Importar el controlador

            $file = "controladores/$controllerName" .".php";

            if (file_exists($file)) {
                require "$file";
            }else {
                http_response_code(404);
                echo "Recurso no encontrado";
                die();
            }

            //crear instancia del controlador y llamar al metodo
            $controllerName = "\\Controladores\\" . $controllerName;//Con use de namespace no se puede usar instancias dinamicas
            $controllerObject = new $controllerName;

            //verificar si existe el metodo de la peticion en la clase/controlador
            if (method_exists($controllerObject,$method)) {
               $controllerObject->$method($arguments);
            }else{
                http_response_code(404);
                echo "Funcion no encontrado";
                die();
            }
        }//fin_construct
    }//fin_clase