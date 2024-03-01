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
        $pet = $stmt->fetch();

        $conn = null;

        return $pet;
    }

    public static function getStory($petId)
    {
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getStory);
        $stmt->execute([$petId]);
        $pet = $stmt->fetch();

        $conn = null;

        return $pet;
    }

    public static function validate(){
        if (Utils::postValuesAreEmpty(["name", "species", "age"])){
            return "<p class='error'>ERROR: One or more inputs are empty</p>";
        }

        $output = "";

        if(strlen($_POST["name"]) < 4 || strlen ($_POST["name"]) > 128){
            $output .= "<p class='error'>ERROR: Name must be between 4 and 128 characters long </p>";
        }

        if(strlen($_POST["species"]) < 2 || strlen ($_POST["species"]) > 48){
            $output .= "<p class='error'>ERROR: Spiecies must be between 4 and 48 characters long </p>";
        }

        if (!is_numeric($_POST["age"])) {
            $output .= "<p class='error'>ERROR: Age must be a numeric value</p>";
        }

        if ($output){
            return $output;
        }

        if(!empty($_FILES["coverImage"]["name"])){
            $filename = $_FILES["coverImage"]["name"];
            $filetype = Utils::getFileExtension($filename);
            $isValidImage = in_array($filetype, ["jpg", "jpeg", "png", "gif"]);

            $isValidSize = $_FILES["coverImage"]["size"] <= 1000000;

            if (!$isValidImage || !$isValidSize){
                return "<p class='error'>ERROR: Invalid file size/format</p>";
            }

            $tmpname = $_FILES["coverImage"]["tmp_name"];

            if(!move_uploaded_file($tmpname, "images/$filename")){
                return "<p class='error'>ERROR: File was not uploaded</p>";
            }
        }

        return "";
    }

    public static function create(){
        $filename = Utils::$defaultBookCover;

        if(!empty($_FILES["coverImage"]["name"])){
            $filename = $_FILES["coverImage"]["name"];
        }

        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$createBook);
        $stmt->execute([$_POST["name"], $_POST["species"], $_POST["age"], $filename]);

        $insertedId = $conn->lastInsertId();

        $conn = null;

        return $insertedId;
    }

    public static function update($petId){
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$updateBook);
        $stmt->execute([
            $_POST["name"],
            $_POST["species"],
            $_POST["age"],
            $filename = $_FILES["coverImage"]["name"],
            $petId
        ]);

        $conn = null;
    }

    public static function delete($bookId){
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$deleteBook);
        $stmt->execute([$bookId]);

        $conn = null;
    }


}
