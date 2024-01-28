<?php
require_once("connection.php");
require_once("sql.php");
require_once("utils.php");

class Book{

    public static function getAllPets()
    {
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getAllPets);
        $stmt-> execute();
        $pets = $stmt-> fetchAll();

        $conn = null;

        return $pets;
    }

    public static function getPet($petId)
    {
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getPet);
        $stmt->execute([$petId]);
        $pet = $stms->fetch();

        $conn = null;

        return $pet;
    }

}
