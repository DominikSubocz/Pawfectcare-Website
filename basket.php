<?php

/// This must come first when we need access to the current session
session_start();

require("classes/components.php");
require("classes/utils.php");
require("classes/basket.php");

/**
 * Check if the user is logged in.
 * If the user is not logged in, redirect to the login page.
 */
if (!isset($_SESSION["loggedIn"])){
    header("Location: " . Utils::$projectFilePath . "/login.php");
}

/**
 * Checks if the request method is POST, and if the 'id' and 'action' parameters are set in the GET request.
 * Validates if the 'id' parameter is numeric.
 */
if($_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_GET["id"]) &&
    is_numeric($_GET["id"]) &&
    isset($_GET["action"])){

        /**
         * Perform actions based on the value of the 'action' parameter.
         */
        switch($_GET["action"]){
            case "remove":
                Basket::remove($_get["id"]);
                break;
            case "increase":
                Basket::increaseQuantity($_get["id"]);
                break;
            case "decrease":
                Basket::decreaseQuantity($_get["id"]);
                break;
        }

        header("Location: " . $_SERVER["PHP_SELF"]);
    }

    Components::pageHeader($_SESSION["username"] . "'s basket", ["style"], ["mobile-nav"]);

    ?>

    <h2>Basket</h2>

    <?php

    Components::basketTable(Basket::getFullBasketArray());
    Components::pageFooter();

    ?>