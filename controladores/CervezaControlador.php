<?php
namespace Controladores;

require "modelo/Cerveza.php";
use Modelo\Cerveza;

class CervezaControlador
{
    public $ruta_documento;
    function __construct()
    {

    }

    function inicio()
    {
        $cervezas = Cerveza::todas();
        // return $cervezas;
        require "vistas/Cerveza/inicio.php";
    }

    function mostrar($args)
    {
        $id = (int) $args[0];
        $cerveza = Cerveza::buscar($id);
        require "vistas/Cerveza/mostrar.php";
        // var_dump($cerveza);
    }

    function antesBorrar()
    {
        $cervezas = Cerveza::todas();
        // return $cervezas;
        require "vistas/Cerveza/antesBorrar.php";
    }

    function borrar($arguments)
    {
        $id = (int) $arguments[0];
        $cerveza = Cerveza::buscar($id);
        $ruta = $cerveza->Ruta_imagen;
        if (is_dir($ruta)) {
            $imagenes = scandir($ruta); //scandir devuelve un array con los ficheros y los directorios que se encuentran bajo DIRECTORY
            foreach ($imagenes as $imagen) {
                if ($imagen != "." && $imagen != "..") {
                    unlink($ruta . $imagen); //Elimina archivos del directorio seleccionado
                }
            }
            rmdir($ruta);
        }
        //rmdir elimina un directorio si el mismo esta vacio, lo que me recomienda el manual de php es recorrer el directorio antes de eliminarlo.
        Cerveza::borrar($id);
        $_SESSION['message'] = 'Cerveza eliminada correctamente';
        $_SESSION['message_type'] = 'warning';
        header('Location:http://localhost/CRUD/cerveza/antesBorrar');
    }

    function crear()
    {
        require "vistas/Cerveza/crear.php";
    }

    public function almacenar()
    {
        if (isset($_POST['ienviar'])) {
            $nombre2 = $_POST['inombre'];
            $tipoCerveza = $_POST['itipo'];
            $graduacion = $_POST['igraduaccion'];
            $pais = $_POST['ipais'];
            $precio = $_POST['iprecio'];
            if (isset($_FILES["file"]) || isset($_FILES['documento'])) {
                $numero = Cerveza::nombreExistente($nombre2);
                if ($numero != 0) {
                    $_SESSION['message'] = 'Nombre de la cerveza ya existente';
                    $_SESSION['message_type'] = 'warning';
                    header('Location:http://localhost/CRUD/cerveza/crear');
                    die();
                }
                $carpeta = "vistas/imagenes/" . $nombre2 . "/";
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }
                $carpetaDocumento = "vistas/beer_desc/" . $nombre2 . "/";
                if (!file_exists($carpetaDocumento)) {
                    mkdir($carpetaDocumento, 0777, true);
                }
                $booleano = true;
                $file = $_FILES["file"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta = $file["tmp_name"];
                $tamaño = $file["size"];
                $carpeta2 = $carpeta;
                if ($tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/jpeg') {
                    $booleano = false;
                } else if ($tamaño > 1024 * 1024 * 10) {
                    $booleano = false;
                } else {
                    $nueva_ruta = $carpeta2 . $nombre;
                    move_uploaded_file($ruta, $nueva_ruta);
                }
                $booleano2 = true;
                $documento = $_FILES["documento"];
                $nombreDocumento = $documento["name"];
                $tipoDocumento = $documento["type"];
                $rutaDocumento = $documento["tmp_name"];
                $tamañoDocumento = $documento["size"];
                $carpeta2Documento = $carpetaDocumento;

                if ($tipoDocumento != 'application/pdf' && $tipoDocumento != 'application/docx') {
                    $booleano2 = false;
                    // break;
                } else if ($tamañoDocumento > 1024 * 1024 * 5) {
                    $booleano2 = false;
                    // break;
                } else {
                    $nueva_ruta_documento = $carpeta2Documento . $nombreDocumento;
                    move_uploaded_file($rutaDocumento, $nueva_ruta_documento);
                }
            }
        }
        if ($booleano) {
            Cerveza::insertar($nombre2, $tipoCerveza, $graduacion, $pais, $precio, $carpeta);
            $_SESSION['message'] = 'Cerveza añadida correctamente';
            $_SESSION['message_type'] = 'primary';
            header('Location:http://localhost/CRUD/cerveza/crear');
        } else{
            //Elimina la carpeta en caso de que los archivos enviados no tenga la extension correcta o se sobrepase los 10mb limites.
            rmdir($carpeta);
            rmdir($carpetaDocumento);
            $_SESSION['message'] = 'Revisa el tamaño o que la extension de la imagen sean las correctas.';
            $_SESSION['message_type'] = 'warning';
            header('Location:http://localhost/CRUD/cerveza/crear');
        }
    }

    public function editar($arguments)
    {
        $id = (int) $arguments[0];
        $cerveza = Cerveza::buscar($id);
        require "vistas/Cerveza/editar.php";
    }

    public function actualizar($arguments)
    {
        if (isset($_POST['ienviar'])) {
            $id = (int) $arguments[0];
            $cerveza = Cerveza::buscar($id);
            $original = $cerveza->Nombre;
            $ruta = $cerveza->Ruta_imagen;
            if (is_dir($ruta)) {
                $imagenes = scandir($ruta); //scandir devuelve un array con los ficheros y los directorios que se encuentran bajo DIRECTORY
                foreach ($imagenes as $imagen) {
                    if ($imagen != "." && $imagen != "..") {
                        copy($ruta . $imagen, $ruta . $imagen);
                        unlink($ruta . $imagen); //Elimina archivos del directorio seleccionado
                    }
                }
                rmdir($ruta);
            }
            $nombre2 = $_POST['inombre'];
            $tipoCerveza = $_POST['itipo'];
            $graduacion = $_POST['igraduaccion'];
            $pais = $_POST['ipais'];
            $precio = $_POST['iprecio'];
            if (isset($_FILES["file"])) {
                if ($nombre2 != $original) {
                    $numero = Cerveza::nombreExistente($nombre2);
                    if ($numero != 0) {
                        $_SESSION['message'] = 'Nombre de la cerveza ya existente';
                        $_SESSION['message_type'] = 'warning';
                        header('Location:http://localhost/CRUD/cerveza/crear');
                        die();
                    }
                }
                $carpeta = "vistas/imagenes/" . $nombre2 . "/";
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }
                $booleano = true;
                $file = $_FILES["file"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta = $file["tmp_name"];
                $tamaño = $file["size"];
                $carpeta2 = $carpeta;
                if ($tipo != 'image/jpg' && $tipo != 'image/png') {
                    $booleano = false;
                    // break;
                } else if ($tamaño > 1024 * 1024 * 10) {
                    $booleano = false;
                    // break;
                } else {
                    $nueva_ruta = $carpeta2 . $nombre;
                    move_uploaded_file($ruta, $nueva_ruta);
                }
            }
        }
        if ($booleano) {
            Cerveza::guardar($nombre2, $tipoCerveza, $graduacion, $pais, $precio, $carpeta, $id);
            $_SESSION['message'] = 'Cerveza modificada correctamente';
            $_SESSION['message_type'] = 'primary';
            header('Location:http://localhost/CRUD/cerveza');
        } else {
            //Elimina la carpeta en caso de que los archivos enviados no tenga la extension correcta o se sobrepase los 10mb limites.
            // rmdir($carpeta);
            $_SESSION['message'] = 'Revisa el tamaño o que la extension de la imagen sean las correctas';
            $_SESSION['message_type'] = 'warning';
            header('Location:http://localhost/CRUD/cerveza/modificarForzado/' . $id);
        }
    }

    function modificarForzado($arguments)
    {
        $id = (int) $arguments[0];
        $cerveza = Cerveza::buscar($id);
        require "vistas/Cerveza/modificarForzado.php";
    }



}
