<?php

session_start();

require("classes/components.php");
require("classes/utils.php");



Components::pageHeader("Update $title", ["style"], ["mobile-nav"]);

?>

<h2>Edit <?php echo $title; ?></h2>

<!--
  When we submit the form, send the id back through as a URL parameter. 
  If this were not included and there was an error, the guard on line 16 
  would trigger the else block, sending us back to the product list page.
-->
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>?id=<?php echo $book["pet_id"]; ?>" enctype="multipart/form-data" class="form">
  <label>Title</label>
  <input type="text" name="title" value="<?php echo $title; ?>">

  <label>Author</label>
  <input type="text" name="author" value="<?php echo $author; ?>">

  <label>Price</label>
  <input type="text" name="price" value="<?php echo $price; ?>">

  <label>Cover image</label>
  <input type="file" name="coverImage" value="">

  <input class="button" type="submit" name="updateSubmit" value="Update Book Details">

  <?php if ($output) { echo $output; } ?>
</form>

<?php

Components::pageFooter();

?>