<?php

session_start();

require("classes/components.php");
require("classes/pet.php");

Components::pageHeader("All Books", ["style"], ["mobile-nav"]);

?>
<main class="content-wrapper pets-content">
    <div class="pet-list-container">
        <h1>Find a Pet</h1>
        
        <div class="book-list">
            <?php
        
            $pets = Book::getAllPets();
            Components::allPets($pets);
        
            ?>
        </div>
    </div>
</main>

<?php

Components::pageFooter();

?>