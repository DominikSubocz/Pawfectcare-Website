<?php

if (isset($_POST["removeSubmit"])){
  Book::delete($petId);
}

if(isset($_POST["updateSubmit"])){
  Book::update($petId);
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
            echo "<input class='button' id='updateBtn' type='button' value='Update $name info'>
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
    <div class="modal-confirmation-container">
      <form action="" method="POST">
        <input class="danger" type="submit" name="removeSubmit" value="Yes">
      </form>
      <input class="button" type="button" id="cancelBtn" value="No">
    </div>

  </div>

</div>

<!-- The Modal -->
<div id="updateModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  <span class="close">&times;</span>

  <form method="POST" action="" enctype="multipart/form-data" class="form">
    <label>Name</label>
    <input type="text" name="name" value="<?php echo $name; ?>">

    <label>Species</label>
    <input type="text" name="species" value="<?php echo $species; ?>">

    <label>Age</label>
    <input type="text" name="age" value="<?php echo $age; ?>">

    <label>Cover image</label>
    <input type="file" name="coverImage" value="<?php echo $filename; ?>">

    <input class="button" type="submit" name="updateSubmit" value="Update Book Details">
  </form>

  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("deleteBtn");
var cancelBtn = document.getElementById("cancelBtn");
var updateBtn = document.getElementById("updateBtn");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  updateModal.style.display = "none";
}

cancelBtn.onclick = function() {
  modal.style.display = "none";
}

updateBtn.onclick = function(){
  updateModal.style.display = "block";
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>