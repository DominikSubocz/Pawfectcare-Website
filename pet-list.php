<?php

/// This must come first when we need access to the current session
session_start();

require("classes/components.php");
require("classes/pet.php");

Components::pageHeader("All Books", ["style"], ["mobile-nav"]);

?>
<main class="content-wrapper main-content">
    <div class="pet-list-container">
        <h1>Find a Pet</h1>
        
        <div class="book-list">
            <?php
        
            /**
             * Retrieves all pets from the Book class.
             * Passes them to the allPets method in the Components class.
             */
            $pets = Book::getAllPets();
            Components::allPets($pets);
        
            ?>
        </div>
    </div>
</main>

<?php

Components::pageFooter();

?>