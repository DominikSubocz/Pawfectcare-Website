<?php

require_once("classes/connection.php");
require_once("classes/sql.php");
require_once("classes/utils.php");

class Article{

    public static function getAllArticles(){

        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getAllArticles);
        $stmt-> execute();
        $articles = $stmt-> fetchAll();

        $conn = null;

        return $articles;
    }

}