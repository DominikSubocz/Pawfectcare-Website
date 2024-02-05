<div class="order-group-row">
    <a href="book.php?id=<?php echo $bookId; ?>">
        <img src="images/<?php echo $filename; ?>" alt="Image of <?php echo $title;?>" class="order-image">
    </a>

    <div>
        <a href="book.php?id=<?php echo $bookId; ?>"><b><?php echo $title; ?> </b> </a>
        by <?php echo $author; ?>
        (x<?php echo $quantity; ?>, £<?php echo $quantity * $price; ?>)
    </div>
</div>