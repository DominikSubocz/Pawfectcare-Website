<?php

session_start();

require("classes/components.php");
require("classes/utils.php");
require("classes/basket.php");

if(!isset($_SESSION["loggedIn"])){
    header("Location: " . Utils::$projectFilePath . "/login.php");
}

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