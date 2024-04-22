<?php
require("classes/components.php");
require("classes/utils.php");
require("classes/pet.php");
require("classes/basket.php");

/// This must come first when we need access to the current session
session_start();;

if(!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: " . utils::$projectFilePath . "/book-list.php");

}

/**
 * Checks if the request method is POST, the 'action' parameter is set to 'add' in the GET request,
 */
if(
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($GET["action"]) &&
    $GET["action"] === "add"
) {
    /// Redirect user from this page if they're already logged in
    if(!isset($_SESSION["loggedIn"])){
        header("Location: " . Utils::$projectFilePath . "/login.php");
    }

    /**
     * Add item to basket and redirect.
     * 
     * For some reason it doesn't redirect, so will have a look at this later on.
     */

    require ("classes/basket.php");

    Basket::add($GET["id"]);
    header("Location: " . Utils::$projectFilePath . "/basket.php");
}

$pet = Pet::getPet($_GET["id"]); ///< Get pet's details by its ID number

$pageTitle = $pet["name_"]; ///< Set pet's name as title of the page

var_dump($pageTitle); ///< Debugging

Components::pageHeaderAlt($pageTitle, ["style"], ["mobile-nav"]);
Components::singlePet($pet);
Components::pageFooter();

?>