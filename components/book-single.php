

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
            echo "<input class='button' type='submit' name='updateButton' value='Update $name info'> 
            <input class='danger' type='submit' name='addToBasketButton' value='Delete $name '>"; 
        }

        else if ($_SESSION['user_role'] === "Member"){
          echo "<input class='button' type='submit' name='addToBasketButton' value='Adopt $name '>"; 
        }
    }

        ?>
    </form>
  </div>
</div>