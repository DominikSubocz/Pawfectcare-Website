<?php

/// This must come first when we need access to the current session
session_start();;

require("classes/components.php");
require("classes/utils.php");

/// if (!isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "Admin"){
///     header("Location: " . Utils::$projectFilePath . "/book-list.php");
/// }

$output = ""; ///< Variable to store output as a string.

/**
 * Validates the form submission and creates a new pet if the form data is valid.
 */
if ($_SERVER["REQUEST_METHOD"] ==="POST" && isset($_POST["addSubmit"])) {
    require("classes/pet.php");

    $output = Pet::validate();

    if(!$output){
        $petId = Pet::create();
        header("Location: " . Utils::$projectFilePath . "/pet.php?id=$petId");

    }
}

Components::pageHeader("Add book", ["style"], ["mobile-nav"]);

?>

<main class="content-wrapper addPet-content">


<h2>Add new Book</h2>

  <form 
    method="POST" 
    action="<?php echo $_SERVER["PHP_SELF"]; ?>" 
    enctype="multipart/form-data" 
    class="form"
  >
    <label>Name</label>
    <input type="text" name="name">

    <label>Species</label>
    <input type="text" name="species">

    <label>Price</label>
    <input type="text" name="age">
    
    <label>Cover image</label>
    <input type="file" name="coverImage" value="">

    <input class="button" type="submit" name="addSubmit" value="Add Book">

    <?php if ($output) { echo $output; } ?>
  </form>

<?php

Components::pageFooter();

?>
