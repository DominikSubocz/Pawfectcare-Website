<?php

session_start();

require("classes/components.php");
require("classes/pet.php");

Components::pageHeader("All Books", ["style"], ["mobile-nav"]);

?>
<main class="content-wrapper pets-content">
    <div class="pet-list-container">
        <h1>Find a Pet</h1>

        <div class="admin-buttonc-container">
            <?php
                if (isset($_SESSION['loggedIn'])) {

                    if ($_SESSION['user_role'] === "Admin") {
                        echo "<a class='button add-button' href='add-pet.php'>Add New Pet</a>";
                    }

                }
            ?>

        </div>

        
        <div class="book-list">

        
            <?php
        
            $pets = Pet::getAllPets();
            Components::allPets($pets);
        
            ?>
        </div>
    </div>
</main>

<?php

Components::pageFooter();

?>