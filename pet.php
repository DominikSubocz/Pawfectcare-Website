<?php
require("classes/components.php");
require("classes/utils.php");
require("classes/pet.php");
require("classes/basket.php");

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

$pet = Pet::getPet($_GET["id"]);



$pageTitle = $pet["name_"];

var_dump($pageTitle);

Components::pageHeaderAlt($pageTitle, ["style"], ["mobile-nav"]);
Components::singlePet($pet);
Components::pageFooter();

?>