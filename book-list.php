<?php

require("classes/components.php");
require("classes/book.php");

Components::pageHeader("All Books", ["style"], ["mobile-nav"]);

?>

<h2>Book List</h2>

<div class="book-list">
    <?php

    $books = Book::getAllBooks();
    Components::allBooks($books);

    ?>
</div>

<?php

Components::pageFooter();

?>