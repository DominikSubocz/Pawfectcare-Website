<?php
require("classes/components.php");
require("classes/utils.php");
require("classes/pet.php");

session_start();

if(!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: " . utils::$projectFilePath . "/book-list.php");

}

if(
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($GET["action"]) &&
    $GET["action"] === "add"
) {
    if(!isset($_SESSION["loggedIn"])){
        header("Location: " . Utils::$projectFilePath . "/login.php");
    }

    require ("classes/basket.php");

    Basket::add($GET["id"]);
    header("Location: " . Utils::$projectFilePath . "/basket.php");
}

$pet = Book::getPet($_GET["id"]);



$pageTitle = "Book not found";

if (!empty($pet)) {
    $pageTitle = $pet["name_"] . " - " . $pet["species"];
}


Components::pageHeaderAlt($pageTitle, ["style"], ["mobile-nav"]);
Components::singleBook($pet);
Components::pageFooter();

?>