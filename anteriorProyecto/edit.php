<?php
require "config/db.php";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM cerveza WHERE ID=$id";
    try {
        $statement = $dbh->query($sql);
        $cerveza = $statement->fetch(PDO::FETCH_ASSOC);
        if ($statement->rowCount() > 0) {
            $nombre = $cerveza['Nombre'];
            $tipo = $cerveza['Tipo'];
            $graduacion = $cerveza['Graduacion_alcoholica'];
            $pais = $cerveza['Pais'];
            $precio = $cerveza['Precio'];
            $ruta = $cerveza['Ruta_imagen'];

        }
    } catch (PDOException $ex) {
        echo "Error al buscar la fila de la tabla: " . $ex->getMessage();
    }
}
if (isset($_POST['ienviar']) && !empty($_POST['ienviar'])) {
    $nombre = $_POST['inombre'];
    $tipo = $_POST['itipo'];
    $graduacion = $_POST['igraduaccion'];
    $pais = $_POST['ipais'];
    $precio = $_POST['iprecio'];
    $ruta = $_POST['iruta'];

    $sql = "UPDATE cerveza set Nombre = ?, Tipo = ?, Graduacion_alcoholica = ?, Pais = ?, Precio = ?, Ruta_imagen = ? WHERE id = ?";
    try {
        $statement = $dbh->prepare($sql);
        $statement->bindValue(1, $nombre);
        $statement->bindValue(2, $tipo);
        $statement->bindValue(3, $graduacion);
        $statement->bindValue(4, $pais);
        $statement->bindValue(5, $precio);
        $statement->bindValue(6, $ruta);
        $statement->bindValue(7, $id);
        //Ejecutamos la sentencia
        $statement->execute();
        $_SESSION['message'] = "Cerveza actualizada con exito";
        $_SESSION['message_type'] = 'dark';
        header("Location:index.php");

    } catch (PDOException $ex) {
        echo "Error al actualizar la fila de la tabla: " . $ex->getMessage();
    }
}
?>

<?php require "includes/header.php"; ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $id; ?>" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Nuevo Nombre de la cerveza:</label>
                        <input type="text" class="form-control" name="inombre" value="<?php echo $nombre ?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Nuevo Tipo:</label>
                        <input type="text" class="form-control" name="itipo" value="<?php echo $tipo ?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Graduaccion alcoholica:</label>
                        <input type="text" class="form-control" name="igraduaccion" value="<?php echo $graduacion ?>"
                            autofocus>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Pais:</label>
                        <input type="text" class="form-control" name="ipais" value="<?php echo $pais ?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label"> Nuevo Precio:</label>
                        <input type="text" class="form-control" name="iprecio" value="<?php echo $precio ?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Ruta de imagen:</label>
                        <textarea class="form-control" rows="2" name="iruta"><?php echo $ruta ?></textarea>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success btn-block" value="Enviar" name="ienviar">
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "includes/footer.php"; ?>