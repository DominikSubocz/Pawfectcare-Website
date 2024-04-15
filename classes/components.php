<?php

class Components {
    
    /**
     * Display the page header with the specified title, stylesheets, and scripts.
     *
     * @param string $pageTitle The title of the page
     * @param array $stylesheets An array of stylesheet URLs
     * @param array $scripts An array of script URLs
     */
    public static function pageHeader($pageTitle, $stylesheets, $scripts){
        require ("components/header.php");   
    }

    /**
     * Display an alternative page header with custom stylesheets and scripts.
     */
    public static function pageHeaderAlt($pageTitle, $stylesheets, $scripts){
        require ("components/header-alt.php");   
    }

    /**
     * Display the page footer by including the footer.php file.
     */
    public static function pageFooter(){
        require ("components/footer.php");   
    }

    /**
     * Display all pets by iterating through the given array of pets and including a template for each pet.
     *
     * @param array $pets An array containing information about pets
     */
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

    /**
     * Display information about a single pet.
     *
     * @param array $pet An array containing information about the pet.
     */
    public static function singlePet($pet){
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

    /**
     * Generates a table displaying the items in the basket for the current user.
     *
     * @param array $petsArray An array containing the pets in the basket
     */
    public static function basketTable($petsArray){
        $userId = $_SESSION["user_id"];

        if(!empty($petsArray)){
            $totalPrice = 0;

            require("components/basket-header.php");

            foreach ($petsArray as $pet){
                $currentId = Utils::escape($pet["pet_id"]);
                $name = Utils::escape($pet["name_"]);
                $species = Utils::escape($pet["species"]);
                $age = Utils::escape($pet["age"]);
                $price = Utils::escape($pet["price"]);

                $quantity = Utils::escape($pet["quantity"]);

                $totalPrice += $price * $quantity;

                require("components/basket-row.php");
            }
    

            require("components/basket-footer.php");
        } else{
            require("components/basket-empty.php");
        }

    }

    /**
     * Display all the articles passed in the $articles array.
     *
     * This function loops through each article in the $articles array, escapes the necessary fields,
     * and includes the "article-card.php" component to display the article information.
     * If the $articles array is empty, it includes the "no-books-found.php" component.
     *
     * @param array $articles An array containing articles to be displayed
     */
    public static function allArticles($articles){
        if(!empty($articles)){
            foreach($articles as $article){
                $articleId = Utils::escape($article["article_id"]);
                $articleTitle = Utils::escape($article["article_title"]);
                $articleCaption = Utils::escape($article["article_caption"]);
                $articleText = Utils::escape($article["article_text"]);
                $filename = Utils::escape($article["filename"]);

                require("components/article-card.php");
            }
        }

        else{     
            require("components/no-books-found.php");
        }
    }


    /**
     * Orders and displays a list of orders for a specific user.
     *
     * This method takes a user ID and an array of orders, loops through each order, and displays the order details.
     * If multiple orders have the same ID, they are grouped together. The total price for each order is calculated
     * and displayed. If no orders are found, a message indicating so is displayed.
     *
     * @param int $userId The ID of the user for whom the orders are being displayed.
     * @param array $orders An array of orders containing order details.
     */
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

    /**
     * Display the latest articles from the given array of articles.
     *
     * This method takes an array of articles and displays the latest 6 articles. If there are no articles, it displays a message indicating no articles found.
     *
     * @param array $articles An array of articles to display
     */
    public static function latestArticles($articles){
        $count = 0; /// Initialize a counter to keep track of the number of books displayed

        if(!empty($articles)){
            foreach($articles as $article){
                if ($count >= 6) {
                    break; /// Exit the loop once three books have been displayed
                }
                
                $postId = Utils::escape($article["article_id"]);
                $title = Utils::escape($article["title"]);
                $subTitle = Utils::escape($article["sub_title"]);
                $articleText = Utils::escape($article["article_text"]);
                $filename = Utils::escape($article["filename"]);
        
                require("components/article-card.php");
                
                $count++; /// Increment the counter after displaying each book

            }
        }

        else{
            require("components/no-books-found.php");
        }
    }
}