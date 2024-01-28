<?php
require("classes/components.php");
require("classes/utils.php");
require("classes/book.php");

if(!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: " .utils::$projectFilePath . "/book-list.php");

}

$pet = Book::getPet($_GET["id"]);

$pageTitle = "Book not found";

if(!empty($book)){
    $pageTitle = $pet["title"] . " - " . $pet["author"];
}

Components::pageHeader($pageTitle, ["style"], ["mobile-nav"]);
Components::singleBook($pet);
Components::pageFooter();

?>