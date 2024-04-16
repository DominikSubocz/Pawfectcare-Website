<?php

require_once("classes/connection.php");
require_once("classes/sql.php");
require_once("classes/utils.php");

/// Represents an order with validation and creation methods.
class Order{
    /**
     * Validates the form input fields for address, card details, and security number.
     * Returns an error message if any input is invalid or empty.
     *
     * @return string $output Error message if any input is invalid or empty.
     */
    public static function validate(){
        if(Utils::postValuesAreEmpty(
            ["address_line", "town", "county", "postcode", "card_number", "month", "year", "security_number"]
        )){
            return "<p class='error'>ERROR: One or more inputs are empty</p>";
        }

        $output = "";

        if(strlen($_POST["address_line"]) < 4 || strlen($_POST["address_line"]) > 64 ){
            $output .= "<p class='error'>ERROR: Address line must be between 4 and 64 characters long</p>";
        }

        if(strlen($_POST["town"]) < 3 || strlen($_POST["town"]) > 32 ){
            $output .= "<p class='error'>ERROR: Town must be between 3 and 32 characters long</p>";
        }    

        if(strlen($_POST["county"]) < 3 || strlen($_POST["town"]) > 32 ){
            $output .= "<p class='error'>ERROR: County must be between 3 and 32 characters long</p>";
        }    

        if(strlen($_POST["postcode"]) < 7 || strlen($_POST["postcode"]) > 8 ){
            $output .= "<p class='error'>ERROR: Postcode must be between 3 and 32 characters long</p>";
        }    

        $cardNumber = filter_var($_POST["card_number"], FILTER_VALIDATE_INT);
        $month = filter_var($_POST["month"], FILTER_VALIDATE_INT);
        $year = filter_var($_POST["year"], FILTER_VALIDATE_INT);
        $securityNumber = filter_var($_POST["security_number"], FILTER_VALIDATE_INT);

        if(!$cardNumber || strlen(strval($cardNumber)) > 16){
            $output .= "<p class='error'>ERROR: Card number is invalid</p>";
        }

        if(!$month || $month < 1 || $month > 12){
            $output .= "<p class='error'>ERROR: Month is invalid</p>";
        }

        if(!$year || strlen(strval($year)) !== 2 || $year < date("y")){
            $output .= "<p class='error'>ERROR: Year is invalid</p>";
        }

        if(!$securityNumber || strlen(strval($securityNumber)) !== 3 ){
            $output .= "<p class='error'>ERROR: Security number is invalid</p>";
        }

        return $output;
    }

    /**
     * Creates a new order based on the provided basket items.
     *
     * @param array $basket An array containing the items in the basket.
     */
    public static function create($basket){
        date_default_timezone_set('UTC');
        $date = date("Y-m-d H:i:s");
        $petIds = array_keys($basket);
        $orderId = 1;

        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getPostcode);
        $stmt->execute([$_POST["postcode"]]);
        $result = $stmt->fetch();

        if(empty($result)){
            $stmt = $conn->prepare(SQL::$createPostcode);
            $stmt->execute([$_POST["postcode"], $_POST["town"], $_POST["county"]]);
        }

        $stmt = $conn->prepare(SQL::$getMaxOrderID);
        $stmt->execute();

        $result = $stmt->fetch();

        if(!empty($result)){
            $orderId = $result[0] + 1;
        }

        for ($i = 0; $i < count($basket); $i++){
            $petId = $petIds[$i];

            $quantity = $basket[$petId]["quantity"];

            $stmt = $conn->prepare(SQL::$createOrder);
            $stmt->execute([
                $orderId,
                $petId,
                $_SESSION["user_id"],
                $quantity,
                $date,
                $_POST["address_line"],
                $_POST["postcode"]
            ]);
        }
        $conn = null;

        setcookie($_SESSION["user_id"], "", time() + (86400 * 30), "/");
    }
}