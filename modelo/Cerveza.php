<?php
namespace Modelo;

require "nucleo/Modelo.php";
use Nucleo\Modelo;
use PDO;

class Cerveza extends Modelo
{

    public static function todas()
    {
        $dbh = self::db();
        $sql = "SELECT * FROM cerveza";
        $statement = $dbh->query($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, Cerveza::class);
        $cervezas = $statement->fetchAll(PDO::FETCH_CLASS);
        return $cervezas;
    }

    public static function buscar($id)
    {
        // $db = Cerveza::db();
        // $stmt = $db->prepare('SELECT * FROM cerveza WHERE id=:id');
        // $stmt->execute(array(':id' => $id));
        // $stmt->setFetchMode(PDO::FETCH_CLASS, Cerveza::class);
        // $cerveza = $stmt->fetch(PDO::FETCH_CLASS);
        // return $cerveza;
        $dbh = self::db();
        $sql = "SELECT * FROM cerveza WHERE id = :id";
        //    Se puede hacer con Query o con prepare Execute
        $statement = $dbh->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, Cerveza::class);
        $cerveza = $statement->fetch(PDO::FETCH_CLASS);
        return $cerveza;
    }

    public static function borrar($id)
    {
        $db = Cerveza::db();
        $stmt = $db->prepare('DELETE FROM cerveza WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public static function insertar($nombre, $tipo, $graduacion, $pais, $precio, $ruta)
    {
        $db = Cerveza::db();
        $sql = "INSERT INTO cerveza (Nombre, Tipo, Graduacion_alcoholica, Pais, Precio, Ruta_imagen) VALUES (:nombre,:tipo,:graduacion,:pais,:precio,:ruta)";
        $statement = $db->prepare($sql);
        $statement->bindValue(':nombre', $nombre);
        $statement->bindValue(':tipo', $tipo);
        $statement->bindValue(':graduacion', $graduacion);
        $statement->bindValue(':pais', $pais);
        $statement->bindValue(':precio', $precio);
        $statement->bindValue(':ruta', $ruta);
        $statement->execute();
    }

    public static function nombreExistente($nombre)
    {
        $db = Cerveza::db();
        $sql = "SELECT  count(id)  FROM cerveza where nombre = ?";
        $statement = $db->prepare($sql);
        $statement->bindValue(1, $nombre);
        $statement->execute();
        $numero = $statement->fetchColumn();
        return $numero;
    }

    public static function guardar($Nombre, $Tipo, $Graduacion_alcoholica, $Pais, $Precio, $Ruta_imagen, $id)
    {
        $db = Cerveza::db();
        $sql = "UPDATE cerveza set Nombre = ?, Tipo = ?, Graduacion_alcoholica = ?, Pais = ?, Precio = ?, Ruta_imagen = ? WHERE id = ?";
        $statement = $db->prepare($sql);
        $statement->bindValue(1, $Nombre);
        $statement->bindValue(2, $Tipo);
        $statement->bindValue(3, $Graduacion_alcoholica);
        $statement->bindValue(4, $Pais);
        $statement->bindValue(5, $Precio);
        $statement->bindValue(6, $Ruta_imagen);
        $statement->bindValue(7, $id);
        $statement->execute();
    }
}
