<?php

class Components {
    
    public static function pageHeader($pageTitle, $stylesheets, $scripts){
        require ("components/header.php");   
    }

    public static function pageHeaderAlt($pageTitle, $stylesheets, $scripts){
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
                $currentId = Utils::escape($book["pet_id"]);
                $name = Utils::escape($book["name_"]);
                $species = Utils::escape($book["species"]);
                $age = Utils::escape($book["age"]);
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

    public static function allArticles($articles){
        if(!empty($articles)){
            foreach($articles as $article){
                $articleId = Utils::escape($article["article_id"]);
                $articleTitle = Utils::escape($article["article_title"]);
                $articleCaption = Utils::escape($article["article_caption"]);
                $articleText = Utils::escape($article["article_text"]);
                $filename = Utils::escape($article["filename"]);

                require("components/article-slide.php");
            }
        }

        else{     
            require("components/no-books-found.php");
        }
    }


    public static function orderList($userId, $orders){
        if(!empty($orders)){
        $previousOrderid = -1;

        foreach($orders as $order){
            $orderId = Utils::escape($order["order_id"]);
            $petId = Utils::escape($order["pet_id"]);
            $quantity = Utils::escape($order["quantity"]);
            $orderDate = Utils::escape($order["order_date"]);
            $name = Utils::escape($order["name_"]);
            $species = Utils::escape($order["species"]);
            $age = Utils::escape($order["age"]);
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

    public static function latestArticles($articles){
        $count = 0; // Initialize a counter to keep track of the number of books displayed

        if(!empty($articles)){
            foreach($articles as $article){
                if ($count >= 6) {
                    break; // Exit the loop once three books have been displayed
                }
                
                $postId = Utils::escape($article["article_id"]);
                $title = Utils::escape($article["title"]);
                $subTitle = Utils::escape($article["sub_title"]);
                $articleText = Utils::escape($article["article_text"]);
                $filename = Utils::escape($article["filename"]);
        
                require("components/article-card.php");
                
                $count++; // Increment the counter after displaying each book

            }
        }

        else{
            require("components/no-books-found.php");
        }
    }
}