<?php
session_start();
require("classes/components.php");
require("classes/utils.php");

// Default heading
$heading = "Success!"; 

if (isset($_SESSION["successMessage"])) {
    $message = $_SESSION["successMessage"];
    unset($_SESSION["successMessage"]); // Remove the session variable
} else {
    $message = "Success message not found."; // Default message
}

// Include success page content
components::pageHeaderAlt($heading, ["style"], ["mobile-nav"]);
?>

<div class="register-success-content">
    <h2><?php echo $message; ?></h2>
    <p>Return to <a href="pet-list.php">home page</a>.</p>
    <p>Submit another message <a href="contact.php">here</a>.</p>
</div>

<?php
components::pageFooter();
?>
