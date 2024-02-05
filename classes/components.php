<?php

class Components {
    
    public static function pageHeader($pageTittle, $stylesheets, $scripts){
        require ("components/header.php");   
    }

    public static function pageHeaderAlt($pageTittle, $stylesheets, $scripts){
        require ("components/header-alt.php");   
    }

    public static function pageFooter(){
        require ("components/footer.php");   
    }

    public static function allPets($pets){

        if(!empty($pets)){
            foreach($pets as $pet){
                $petId = Utils::escape($pet["pet_id"]);
                $name = Utils::escape($pet["name_"]);
                $species = Utils::escape($pet["species"]);
                $age = Utils::escape($pet["age"]);
                $filename = Utils::escape($pet["filename"]);

                require("components/book-card.php");


            }


        }

        else{
                
            require("components/no-books-found.php");
        }

    }

    public static function singleBook($pet){
        if(!empty($pet)){
            $petId = Utils::escape($pet["pet_id"]);
            $name = Utils::escape($pet["name_"]);
            $species = Utils::escape($pet["species"]);
            $age = Utils::escape($pet["age"]);
            $filename = Utils::escape($pet["filename"]);
            $petStory = Utils::escape($pet["story_text"]);

            require("components/book-single.php");
        }

        else{
            require("components/no-single-book-found.php");
        }
    }

    public static function basketTable($booksArray){
        $userId = $_SESSION["user_id"];

        if(!empty($booksArray)){
            $totalPrice = 0;

            require("components/basket-header.php");

            foreach ($booksArray as $book){
                $currentId = Utils::escape($book["book_id"]);
                $title = Utils::escape($book["title"]);
                $author = Utils::escape($book["author"]);
                $price = Utils::escape($book["price"]);

            $quantity = Utils::escape($book["quantity"]);

            $totalPrice += $price * $quantity;

            require("components/basket-row.php");
        }
    

        require("components/basket-footer.php");
    } else{
        require("components/basket-empty.php");
    

    }
    
}

public static function orderList($userId, $orders){
    if(!empty($orders)){
    $previousOrderid = -1;

    foreach($orders as $order){
        $orderId = Utils::escape($order["order_id"]);
        $bookId = Utils::escape($order["book_id"]);
        $quantity = Utils::escape($order["quantity"]);
        $orderDate = Utils::escape($order["order_date"]);
        $title = Utils::escape($order["title"]);
        $author = Utils::escape($order["author"]);
        $price = Utils::escape($order["price"]);
        $filename = Utils::escape($order["filename"]);

        if($orderId === $previousOrderid){
            require("components/order-row.php");

        } else {
            if ($previousOrderid > -1){
                echo "</div>";
            }

            echo "<div class='order-group'>";

            $previousOrderid = $orderId;

            $totalPrice = User::getTotalOrderPrice($userId, $orderId);

            require("components/order-head.php");
            require("components/order-row.php");

        }
    }

    echo "</div>";

    } else {
        require("components/no-orders-found.php");
    }
}
}