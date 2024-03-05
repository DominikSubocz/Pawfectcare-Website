<?php

require_once("classes/connection.php");
require_once("classes/sql.php");
require_once("classes/utils.php");

class Basket{
    public static function getBasketArray(){
        $userId = $_SESSION["user_id"];

        if(isset($_COOKIE[$userId])){
            $basket = unserialize($_COOKIE[$userId]);

            return $basket;
        }

        return [];
    }

    public static function getFullBasketArray(){
        $basket = self::getBasketArray();
        if (!empty($basket)){
            $bookIds = array_keys($basket);

            $booksArray = [];

            $conn = Connection::connect();

            foreach ($bookIds as $id){
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

    public static function remove($id){
        $basket = self::getBasketArray();

        if(!empty($basket[$id])){
            unset($basket[$id]);

            setcookie($_SESSION["user_id"], serialize($basket), time() + (86400 * 30), "/" );
        }
    }

    public static function increaseQuantity($id){
        $basket = self::getBasketArray();

        if(!empty($basket[$id])){
            $basket[$id]["quantity"] += 1;

            setcookie($_SESSION["user_id"], serialize($basket), time() + (86400 * 30), "/");
        }
    }

    public static function decreaseQuantity($id){
        $basket = self::getBasketArray();

        if(!empty($basket[$id])){
            $basket[$id]["quantity"] -= 1;

            if($basket[$id][quantity] < 1){
                unset($basket[$id]);
            }

            setcookie($_SESSION["user_id"], serialize($basket), time() + (86400 * 30), "/");
        }
    }
}