<?php

require_once("classes/connection.php");
require_once("classes/sql.php");
require_once("classes/utils.php");

/**
 * Class Article
 * 
 * Represents an Article object with methods to interact with the database.
 */
class Article{

    /**
     * Retrieves all articles from the database.
     *
     * @return array $pets An array containing all the articles retrieved from the database.
     */
    public static function getAllArticles()
    {
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getAllArticles);
        $stmt-> execute();
        $pets = $stmt-> fetchAll();

        $conn = null;

        return $pets;
    }

    /**
     * Retrieves a pet from the database based on the provided pet ID.
     *
     * @param int $petId The ID of the pet to retrieve.
     * @return array $pet The pet information if found, or null if not found.
     */
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