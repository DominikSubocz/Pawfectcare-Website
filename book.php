<?php
require("classes/components.php");
require("classes/utils.php");
require("classes/book.php");

if(!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: " . utils::$projectFilePath . "/book-list.php");

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