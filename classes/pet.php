<?php
require_once("connection.php");
require_once("sql.php");
require_once("utils.php");


/**
 * Class Pet
 * 
 * Represents a pet with with methods to interact with the database.
 */
class Pet{

    /**
     * Retrieves all pets from the database.
     *
     * @return array $pets An array containing all the pets retrieved from the database.
     */
    public static function getAllPets()
    {
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getAllPets);
        $stmt-> execute();
        $pets = $stmt-> fetchAll();

        $conn = null;

        return $pets;
    }

    /**
     * Retrieves a pet from the database based on the provided pet ID.
     *
     * @param int $petId The ID of the pet to retrieve.
     * @return array $pet Pet information if found, or null if not found.
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

    /**
     * Retrieves the story of a pet based on the provided pet ID.
     *
     * @param int $petId The ID of the pet whose story is to be retrieved.
     * @return array $pet The story of the pet identified by the given ID.
     */
    public static function getStory($petId)
    {
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getStory);
        $stmt->execute([$petId]);
        $pet = $stmt->fetch();

        $conn = null;

        return $pet;
    }

    /**
     * Validates the input data for name, species, age, and cover image.
     * Returns an error message if any validation fails.
     *
     * @return string $output Error message if validation fails, empty string if validation passes.
     */
    public static function validate(){
        if (Utils::postValuesAreEmpty(["name", "species", "age"])){
            return "<p class='error'>ERROR: One or more inputs are empty</p>";
        }

        $output = "";

        /**
         * Validates the length of the input name from the $_POST array.
         * If the length is less than 4 or greater than 128 characters, an error message is appended to the output.
         */
        if(strlen($_POST["name"]) < 4 || strlen ($_POST["name"]) > 128){
            $output .= "<p class='error'>ERROR: Name must be between 4 and 128 characters long </p>";
        }

        /**
         * Validates the length of the species input from the $_POST array.
         * If the length is less than 2 or greater than 48 characters, an error message is appended to the $output variable.
         */
        if(strlen($_POST["species"]) < 2 || strlen ($_POST["species"]) > 48){
            $output .= "<p class='error'>ERROR: Spiecies must be between 4 and 48 characters long </p>";
        }

        /**
         * Validates if the input age value is numeric.
         */
        if (!is_numeric($_POST["age"])) {
            $output .= "<p class='error'>ERROR: Age must be a numeric value</p>";
        }



        /**
         * Handles the upload of a cover image file.
         *
         * This function checks if a cover image file is uploaded, validates its format and size,
         * and moves the file to the "images" directory if it meets the criteria.
         *
         * @return string Returns an error message if the file is invalid or not uploaded.
         */
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
        } else {
            $output .= "<p class='error'>ERROR: Please upload a valid image.</p>";
        }

        if ($output){
            return $output;
        }

        return "";
    }

    /**
     * Create a new pet record in the database based on the form data.
     *
     * If a cover image is uploaded, it will be used as the filename for the pet's cover.
     * Otherwise, the default cover image will be used.
     *
     * @return int The ID of the newly inserted pet record
     */
    public static function create(){
        $filename = Utils::$defaultPetCover;

        if(!empty($_FILES["coverImage"]["name"])){
            $filename = $_FILES["coverImage"]["name"];
        }

        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$createPet);
        $stmt->execute([$_POST["name"], $_POST["species"], $_POST["age"], $filename]);

        $insertedId = $conn->lastInsertId();

        $conn = null;

        return $insertedId;
    }

    /**
     * Update the pet information in the database based on the provided pet ID.
     *
     * @param int $petId The ID of the pet to update.
     * @throws \PDOException If there is an error with the database operation.
     */
    public static function update($petId){
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$updatePet);
        $stmt->execute([
            $_POST["name"],
            $_POST["species"],
            $_POST["age"],
            $filename = $_FILES["coverImage"]["name"],
            $petId
        ]);

        $conn = null;
    }

    /**
     * Deletes a pet from the database based on the provided pet ID.
     *
     * @param int $petId The ID of the pet to be deleted.
     * @return void
     */
    public static function delete($petId){
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$deletePet);
        $stmt->execute([$petId]);

        $conn = null;
    }


}
