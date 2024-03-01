<?php

if (isset($_POST["removeSubmit"])){
  Pet::delete($bookId);
}

?>

<main class="content-wrapper pet-content">

<div class="book-container">
  <img src="images/<?php echo $filename; ?>" alt="Cover of <?php echo $name; ?>" class="book-image">

  <div class="book-info">
    <h2><?php echo $name; ?></h2>

    <h3>Species: <?php echo $species; ?></h3>

    <p class="book-age">Age: <?php echo $age; ?> years old.</p>



    <h2><?php echo $name; ?>'s story</h2>

    <p class="description">
      <p><?php echo $petStory?></p>
    </p>

    <form
      method="POST"
      action="<?php echo $_SERVER["PHP_SELF"]; ?>?id=<?php echo $petId; ?>&action=add"
      class="button-form"
    >
      <?php
      
      if (isset($_SESSION['loggedIn'])) {

        // Site administrators can add new books
        if ($_SESSION['user_role'] === "Admin") {
            echo "<a class='button' href='update-book.php'>Update $name info</a>
            <input class='danger' id='deleteBtn' type='button' name='addToBasketButton' value='Delete $name '>"; 
        }

        else if ($_SESSION['user_role'] === "Member"){
          echo "<input class='button' type='submit' name='addToBasketButton' value='Adopt $name '>"; 
        }
    }
  
        ?>
    </form>
  </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Are you sure you want to remove <?php echo $name ?>?</p>
    <br>
    <input class="danger" type="submit" name="removeSubmit" value="Yes">
    <input class="button" type="button" id="cancelBtn" value="No">

  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("deleteBtn");
var cancelBtn = document.getElementById("cancelBtn");



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

cancelBtn.onclick = function() {
  modal.style.display = "none";
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>