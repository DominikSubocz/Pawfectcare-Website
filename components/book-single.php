

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
      <input class="button" type="submit" name="addToBasketButton" value="Adopt <?php echo $name; ?>">  
    </form>
  </div>
</div>