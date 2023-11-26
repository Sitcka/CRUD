<?php
require "config/db.php";
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM cerveza WHERE ID=$id";
    try {
        $statement = $dbh->query($sql);
        $statement->execute();
        $_SESSION['message'] = 'Cerveza eliminada correctamente';
        $_SESSION['message_type'] = 'danger';
        header("Location:index.php");
    } catch (PDOException $ex) {
        echo "Error al eliminar la tabla: " . $ex->getMessage();
    }
}
?>