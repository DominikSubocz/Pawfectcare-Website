<?php
session_start();

require("classes/components.php");
require("classes/utils.php");
require("components/form-validation.php");



components::pageHeaderAlt("Checkout", ["style"], ["mobile-nav"]);
?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="name">First name:</label><br>
  <input type="text" name="name" value="<?php echo $name;?>"><br>
  <label for="email">Email:</label><br>
  <input type="text" name="email" value="<?php echo $email;?>"><br>
  <label for="website">Website:</label><br>
  <input type="text" name="website" value="<?php echo $website;?>">
  <label for="comment">Comment:</label><br>
  <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
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