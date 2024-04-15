<?php

/// This must come first when we need access to the current session
session_start();

require("classes/components.php");
require("classes/utils.php");
require("classes/basket.php");

/**
 * Retrieve the basket array from the Basket class.
 */
$basket = Basket::getBasketArray();

/**
 * Check if the user is logged in.
 * If the user is not logged in, redirect to the login page.
 */
if(!isset($session["loggedIn"])) {
    header("Location: " . Utils::$projectFilePath . "/login.php");
}

$output = ""; ///< Variable to store an empty string.

/**
 * Validates the order and creates a new order if validation passes.
 */
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    require("classes/order.php");

    $output = Order::validate();

    if(!$output){
        Order::create($basket);
        header("Location: " . Utils::$projectFilePath . "/user.php");
    }
}

components::pageHeader("Checkout", ["style"], ["mobile-nav"]);

?>

<h2>Checokout</h2>

<form
    method="POST"
    action="<?php echo $_SERVER["PHP_SELF"]; ?>"
    enctype="multipart/form-data"
    class="form"
>
    <h3>Shipping Address</h3>
    <label>Address Line</label>
    <input type="text" name="address_line" value="<?php if ($output){
        echo $_POST["address_line"];
    }  ?>">
    
    <input type="text" name="town" value="<?php if ($output){
        echo $_POST["town"];
    }  ?>">

    <input type="text" name="county" value="<?php if ($output){
        echo $_POST["county"];
    }  ?>">

    <input type="text" name="postcode" value="<?php if ($output){
        echo $_POST["postcode"];
    }  ?>">

    <h3>Payment Details</h3>

    <label>Card Number</label>
    <input type="text" name="card_number">

    <div class="form-row">
        <div>
            <label>Expiry</label>

            <div class="inline-inputs">
                <input type="text" name="month" placeholder="month">
                <input type="text" name="year" placeholder="year">
            </div>
        </div>

        <div>
            <labeL>Security Number</label>
            <input type="text" name="security_number">
        </div>
    </div>
        <input class="button" type="submit" value="Complete order">
        <?php if($oputput) { echo $output;} ?>
</form>

<?php

Components::pageFooter();

?>



