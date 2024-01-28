<div class="book-container">
  <img src="images/<?php echo $filename; ?>" alt="Cover of <?php echo $name; ?>" class="book-image">

  <div class="book-info">
    <h2><?php echo $name; ?></h2>

    <h3><?php echo $species; ?></h3>

    <p class="book-age">£<?php echo $age; ?></p>

    <form
      method="POST"
      action="<?php echo $_SERVER["PHP_SELF"]; ?>?id=<?php echo $petId; ?>&action=add"
      class="button-form"
    >
      <input class="button" value="Add to Basket">
    </form>

    <p class="description">
      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
      Vero illo et sit aliquam quae dolore tempore debitis alias
      explicabo. Nostrum, eum amet sed necessitatibus harum quae
      reprehenderit, tempora minima voluptatem aliquam ducimus!
      Perspiciatis repudiandae aliquid fuga voluptates ipsum aliquam
      nulla.
    </p>
  </div>
</div>