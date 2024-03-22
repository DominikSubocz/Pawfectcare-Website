<div class="order-group-row">
    <a href="pet.php?id=<?php echo $petId; ?>">
        <img src="images/<?php echo $filename; ?>" alt="Image of <?php echo $name;?>" class="order-image">
    </a>

    <div>
        <a href="pet.php?id=<?php echo $petId; ?>"><b><?php echo $name; ?> </b> </a>
        <?php echo $species; ?><br>
        (x<?php echo $quantity; ?>, £<?php echo $quantity * $price; ?>)
    </div>
</div>