<?php
namespace Config;
session_start();
define("url", "http://localhost/CRUD/");
const DSN = "mysql:localhost=db;dbname=trabajo_practico;charset=utf8";
const USUARIO = "root";
const CONTRASEÑA = "";

    //Conexion establecida
    // $dbh = new PDO(DSN, USER, PASSWORD);
    // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // //Primera forma : NAMED PLACEHOLDER
    // $SQL = " INSERT INTO Clientes (ID,Name, Adress,Age,Telephone) VALUES(:id,:nombre,:direccion,:edad,:telefono)";
    // //Segunda forma : QUESTIN MARK PLACEHOLDER 
    // $SQL2 = "INSERT INTO " . TABLACLIENTES .  " (ID,Name,Adress,Age,Telephone) VALUES(?,?,?,?,?)";
    // $statement = $dbh->prepare($SQL2);
    // //HASTA AQUI SOLO HEMOS ECHO HASTA EL PRIMER PUNTO DE 3

    // //2.-

    // //Opcion 1: bindParam -> variable es una referencia
    // $id = null;
    // $nombre = "Fulano";
    // $direccion = "Avenida Navarra";
    // $edad = 43;
    // $telefono = 123456789;

    // // $statement -> bindParam(":id", $id);
    // // $statement -> bindParam(":direccion", $direccion);
    // // $statement -> bindParam(":edad", $edad);
    // // $statement -> bindParam(":nombre", $nombre);
    // // $statement -> bindParam(":telefono", $telefono);

    // //$edad = 64 bindParam tomara el valor 64 de edad y no 43, porque sera el ultimo valor que tomo
    // //si la variable edad esta definida despues del execute no sucedera lo mismo




    // //OPCION 2: bindValue -> asocio los vlaores
    // // $statement -> bindValue(":id", $id);
    // // $statement -> bindValue(":direccion", $direccion);
    // // $statement -> bindValue(":edad", $edad);
    // // $statement -> bindValue(":nombre", $nombre);
    // // $statement -> bindValue(":telefono", $telefono);


    // // $edad = 64; este caso es lo contrario de bindParam

    // /**
    //  * Con Question mark placeholder
    //  *$statement -> bindParam(1, $id);
    //  *$statement -> bindParam(2, $nombre);
    //  *$statement -> bindParam(3, $direccion);
    //  *$statement -> bindParam(4, $edad);
    //  *$statement -> bindParam(5, $telefono);
    //  */
    // // $statement->bindValue(1, $id);
    // // $statement->bindValue(2, $nombre);
    // // $statement->bindValue(3, $direccion);
    // // $statement->bindValue(4, $edad);
    // // $statement->bindValue(5, $telefono);

    // // $nombre = "Karina";

    // // //Ejecutamos la sentencia
    // // $statement->execute();

    // echo "<h4>Conexion Establecida</h4>";
// } catch (Exception $ex) {
//     //En caso de que falle la conexion
//     echo "Fallo en la conexion: " . $ex->getMessage();
// } finally {
//     $dbh = null; //Cierro la conexion(Recordar que siempre es aconsejable cerrar la conexion)
//     // echo "<br> Conexion cerrada";
// }
