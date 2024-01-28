<?php

session_start();

require("classes/components.php");
require("classes/utils.php");

if(!isset($_SESSION["justRegistered"])){
    header("Location: " . Utils::$projectFilePath . "/book-list.php");
}

unset($_SESSION["justRegistered"]);

Components::pageHeader("Registration Successful", ["style"], ["mobile-nav"]);

?>

<h2> User account registration was successful</h2>

<p>Return to <a href="book-list.php">home page</a>.</p>

<?php

Components::pageFooter();

?>