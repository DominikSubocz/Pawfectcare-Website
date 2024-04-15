<?php
/// This must come first when we need access to the current session
session_start();

require("classes/components.php");
require("classes/utils.php");
require("components/form-validation.php");



components::pageHeaderAlt("Checkout", ["style"], ["mobile-nav"]); ///< Alternative page header (no wave)
?>
<main class="content-wrapper form-content">
<h2>Contact Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="name">First name:</label><br>
  <input type="text" name="name" value="<?php echo $name;?>"><br>
  <label for="email">Email:</label><br>
  <input type="text" name="email" value="<?php echo $email;?>"><br>
  <label for="website">Website:</label><br>
  <input type="text" name="website" value="<?php echo $website;?>">
  <label for="comment">Comment:</label><br>
  <textarea name="comment" rows="5"><?php echo $comment;?></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<iframe width="425" height="350" src="https://www.openstreetmap.org/export/embed.html?bbox=-2.993334531784058%2C56.49000188262805%2C-2.9796874523162846%2C56.49539753638916&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/#map=17/56.49270/-2.98651">View Larger Map</a></small>

<?php





///Testing if it works

/// echo "<h2>Your Input:</h2>";
/// echo "<pre>";
/// echo $message;
/// echo "</pre>";

?>