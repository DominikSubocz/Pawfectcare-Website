<?php

require_once("classes/connection.php");
require_once("classes/sql.php");
require_once("classes/utils.php");

class Article{

    public static function getAllArticles()
    {
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getAllArticles);
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
        $pet = $stmt->fetch();

        $conn = null;

        return $pet;
    }


}