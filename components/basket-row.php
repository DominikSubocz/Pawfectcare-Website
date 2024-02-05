<tr>
  <td>
    <b><a href="book.php?id=<?php echo $currentId; ?>"><?php echo $title; ?></a></b>
    <br>By <?php echo $author; ?>
  </td>
  <td><?php echo $quantity; ?></td>
  <td>£<?php echo $price * $quantity ?></td>
</tr>

<tr>
  <!-- This table cell will take up 3 columns -->
  <td colspan="3">
    <div class="basket-controls">
      <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>?id=<?php echo $currentId; ?>&action=increase" class="button-form">
        <input class="button" type="submit" name="increaseButton" value="+">
      </form>

      <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>?id=<?php echo $currentId; ?>&action=decrease" class="button-form">
        <input class="button danger" type="submit" name="decreaseButton" value="-">
      </form>

      <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>?id=<?php echo $currentId; ?>&action=remove" class="button-form">
        <input class="button danger" type="submit" name="removeButton" value="Remove">
      </form>
    </div>
  </td>
</tr>