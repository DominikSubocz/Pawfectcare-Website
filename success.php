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
    header("Location: " . Utils::$projectFilePath . "/pet-list.php");
    $message = "Success message not found."; // Default message
}

// Include success page content
?>

<head>

<link rel="stylesheet" href="css/style.css">


</head>

<div class="register-success-content">
    <h2><?php echo $message; ?></h2>
    <p>Return to <a href="pet-list.php">home page</a>.</p>
    <p>Submit another message <a href="contact.php">here</a>.</p>
</div>

<?php
?>
