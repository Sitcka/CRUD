<?php
require "CORE/Model.php";
if (isset($_POST['ienviar']) && !empty($_POST['ienviar'])) {
    if (isset($_POST['inombre']) && !empty($_POST['inombre'])) {
        $nombre = $_POST['inombre'];
    }
    if (isset($_POST['itipo']) && !empty($_POST['itipo'])) {
        $tipo = $_POST['itipo'];
    }
    if (isset($_POST['igraduaccion']) && !empty($_POST['igraduaccion'])) {
        $graduacion = $_POST['igraduaccion'];
    }
    if (isset($_POST['ipais']) && !empty($_POST['ipais'])) {
        $pais = $_POST['ipais'];
    }
    if(isset($_POST['iprecio']) && !empty($_POST['iprecio'])){
        $precio = $_POST['iprecio'];
    }
    if (isset($_POST['iruta']) && !empty($_POST['iruta'])) {
        $ruta = $_POST['iruta'];
    }
    else{
        $ruta = " ";
    }
    $sql = "INSERT INTO cerveza (ID, Nombre, Tipo, Graduacion_alcoholica, Pais, Precio, Ruta_imagen) VALUES (?,?,?,?,?,?,?)";
    try{    
        $statement = Model::db() ->prepare($sql);
        $statement -> bindValue(1,"NULL");
        $statement -> bindValue(2,$nombre);
        $statement -> bindValue(3,$tipo);
        $statement -> bindValue(4,$graduacion);
        $statement -> bindValue(5,$pais);
        $statement -> bindValue(6,$precio);
        $statement -> bindValue(7,$ruta);
        $statement->execute();
        //Para que aparezca en la misma pagina un mensaje de exito de inserccion
        $_SESSION['message'] = 'Se añadio la cerveza correctamente';
        $_SESSION['message_type'] = 'success';
        //Redirige a la misma pagina
        header("Location:index.php");
    }catch(PDOException $ex){
        echo "Error en la iserccion de datos: " . $ex->getMessage();
    }
    Model::disconnect();
}