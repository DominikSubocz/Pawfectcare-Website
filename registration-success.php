<?php

session_start();

require("classes/components.php");
require("classes/utils.php");

if(!isset($_SESSION["justRegistered"])){
    header("Location: " . Utils::$projectFilePath . "/book-list.php");
}

unset($_SESSION["justRegistered"]);

Components::pageHeaderAlt("Registration Successful", ["style"], ["mobile-nav"]);

?>

<div class="register-success-content">
    <h2> User account registration was successful</h2>

    <img class="animated-tick-icon" src="images/tick.gif" alt="Animation of green box being ticked">
    
    <p>Return to <a href="pet-list.php">home page</a>.</p>
</div>

<?php

Components::pageFooter();

?>