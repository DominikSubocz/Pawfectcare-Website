<?php

/// This must come first when we need access to the current session
session_start();;

require("classes/components.php");
require("classes/utils.php");
require("classes/basket.php");

/// Redirect user from this page if they're already logged in
if(!isset($_SESSION["loggedIn"])){
    header("Location: " . Utils::$projectFilePath . "/login.php");
}

/**
 * Process the POST request to perform actions like removing, increasing, or decreasing quantity of items in the basket.
 */
if($_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_GET["id"]) &&
    is_numeric($_GET["id"]) &&
    isset($_GET["action"])){

        switch ($_GET["action"]){
            case "remove":
                Basket::remove($_GET["id"]);
                break;
            
            case "increase":
                Basket::increaseQuantity($_GET["id"]);
                break;
            
            case "decrease":
                Basket::decreaseQuantity($_GET["id"]);
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