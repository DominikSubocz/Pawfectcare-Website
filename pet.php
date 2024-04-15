<?php

/// This must come first when we need access to the current session
session_start();

require("classes/components.php");
require("classes/utils.php");
require("classes/pet.php");


/**
 * Redirects the user to the book list page if the 'id' parameter is not set in the GET request or is not numeric.
 */
if(!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: " . utils::$projectFilePath . "/book-list.php");

}

/**
 * If the action is 'add' and the user is logged in, the item with the specified ID is added to the basket.
 */
if(
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($GET["action"]) &&
    $GET["action"] === "add"
) {
    /// If the user is not logged in, the user is redirected to the login page.
    if(!isset($_SESSION["loggedIn"])){
        header("Location: " . Utils::$projectFilePath . "/login.php");
    }


    require ("classes/basket.php");

    Basket::add($GET["id"]);
    header("Location: " . Utils::$projectFilePath . "/basket.php");
}

$pet = Book::getPet($_GET["id"]); ///< Get pet's details based on ID



$pageTitle = "Book not found"; ///< Default page title

/**
 * Set the page title based on the pet's name and species if the $pet array is not empty.
 */
if (!empty($pet)) {
    $pageTitle = $pet["name_"] . " - " . $pet["species"];
}


Components::pageHeaderAlt($pageTitle, ["style"], ["mobile-nav"]);
Components::singleBook($pet);
Components::pageFooter();

?>