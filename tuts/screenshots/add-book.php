<?php

/// This must come first when we need access to the current session
session_start();;

require("classes/components.php");
require("classes/utils.php");



Components::pageHeader("Add book", ["style"], ["mobile-nav"]);

?>

<h2>Add new Book</h2>

<form 
  method="POST" 
  action="<?php echo $_SERVER["PHP_SELF"]; ?>" 
  enctype="multipart/form-data" 
  class="form"
>
  <label>Title</label>
  <input type="text" name="title">

  <label>Author</label>
  <input type="text" name="author">

  <label>Price</label>
  <input type="text" name="price">
  
  <label>Cover image</label>
  <input type="file" name="coverImage" value="">

  <input class="button" type="submit" name="addSubmit" value="Add Book">

  <?php if ($output) { echo $output; } ?>
</form>

<?php

Components::pageFooter();

?>