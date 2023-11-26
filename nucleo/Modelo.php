<?php
namespace Nucleo;
require "config/db.php";
use const Config\DSN;
use const Config\USUARIO;
use const Config\CONTRASEÑA;
use PDO;
use PDOException;

class Modelo
{
    public $dbh;
    static function db()
    {
        try {
            $dbh = new PDO(DSN, USUARIO, CONTRASEÑA);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbh;
        } catch (PDOException $ex) {
            echo "Fallo en la conexion: " . $ex->getMessage();
        }
    }

    static function disconnect()
    {
        $dbh = null;
    }
}
