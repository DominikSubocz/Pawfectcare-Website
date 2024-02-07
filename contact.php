<?php
session_start();

require("classes/components.php");
require("classes/utils.php");
require("components/form-validation.php");

$_SESSION["successMessage"] = "Your message has been submitted successfully!";
header("Location: " . Utils::$projectFilePath . "/success.php");

components::pageHeaderAlt("Checkout", ["style"], ["mobile-nav"]);
?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php





//Testing if it works

// echo "<h2>Your Input:</h2>";
// echo "<pre>";
// echo $message;
// echo "</pre>";

?>