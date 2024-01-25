<?php
require_once("connection.php");
require_once("sql.php");
require_once("utils.php");

class Book{

    public static function getAllBooks()
    {
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getAllBooks);
        $stmt-> execute();
        $books = $stmt-> fetchAll();

        $conn = null;

        return $books;
    }

    public static function getBook($bookId)
    {
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getBook);
        $stmt->execute([$bookid]);
        $book = $stms->fetch();

        $conn = null;

        return $book;
    }

}
