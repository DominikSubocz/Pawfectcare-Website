<?php

require_once("classes/connection.php");
require_once("classes/sql.php");
require_once("classes/utils.php");

/**
 * Class Basket
 * 
 * Represents a basket for storing items related to a user's shopping cart.
 */
class Basket{
    /**
     * Retrieve the basket array for the current user from the session and cookies.
     *
     * @return array $basket The basket array for the current user, or an empty array if not found.
     */
    public static function getBasketArray(){
        $userId = $_SESSION["user_id"];

        if(isset($_COOKIE[$userId])){
            $basket = unserialize($_COOKIE[$userId]);

            return $basket;
        }

        return [];
    }

    /**
     * Retrieves the full basket array containing details of pets in the basket.
     *
     * @return array $booksArray An array containing details of pets in the basket, including quantity.
     */
    public static function getFullBasketArray(){
        $basket = self::getBasketArray();
        if (!empty($basket)){
            $petIds = array_keys($basket);

            $booksArray = [];

            $conn = Connection::connect();

            foreach ($petIds as $id){
                $stmt = $conn->prepare(SQL::$getPet);
                $stmt->execute([$id]);
                $result = $stmt->fetch();
        

            if(!empty($result)){
                $result["quantity"] = $basket[$id]["quantity"];

                array_push($booksArray, $result);

            }
        }

        $conn = null;

        return $booksArray;

            
        }
        
        return [];

    }

    /**
     * Add an item to the basket with the given ID.
     *
     * @param int $id The ID of the item to add to the basket
     */
    public static function add($id){
        $basket = self::getBasketArray();

        if(!empty($basket)){
            if(!empty($basket[$id])){
                $basket[$id]["quantity"]+=1;
            } else {
                $basket[$id] = ["quantity" => 1];
            }
        } else {

            $basket = [$id => ["quantity" => 1]];
        }

        setcookie($_SESSION["user_id"], serialize($basket), time() + (86400 * 30), "/");
        
    }

    /**
     * Remove an item from the basket array based on the provided ID.
     *
     * @param int $id The ID of the item to be removed
     */
    public static function remove($id){
        $basket = self::getBasketArray();

        if(!empty($basket[$id])){
            unset($basket[$id]);

            setcookie($_SESSION["user_id"], serialize($basket), time() + (86400 * 30), "/" );
        }
    }

    /**
     * Increase the quantity of a specific item in the basket array by 1.
     *
     * @param int $id The ID of the item to increase quantity for.
     */
    public static function increaseQuantity($id){
        $basket = self::getBasketArray();

        if(!empty($basket[$id])){
            $basket[$id]["quantity"] += 1;

            setcookie($_SESSION["user_id"], serialize($basket), time() + (86400 * 30), "/");
        }
    }

    /**
     * Decreases the quantity of a specific item in the basket array.
     *
     * @param int $id The ID of the item to decrease quantity for.
     */
    public static function decreaseQuantity($id){
        $basket = self::getBasketArray();

        if(!empty($basket[$id])){
            $basket[$id]["quantity"] -= 1;

            if($basket[$id]["quantity"] < 1){
                unset($basket[$id]);
            }

            setcookie($_SESSION["user_id"], serialize($basket), time() + (86400 * 30), "/");
        }
    }
}