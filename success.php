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

<div class="success-content">
    <img src="images/tick.gif" alt="Animated green tick" class="animated-tick-icon">
    <h2><?php echo $message; ?></h2>
    <p>Return to <a href="pet-list.php">home page</a>.</p>

</div>

<?php
?>
