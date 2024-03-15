<?php

session_start();

require("classes/components.php");
require("classes/utils.php");
require("classes/basket.php");

$basket = Basket::getBasketArray();

// if(!isset($session["loggedIn"])) {
//     header("Location: " . Utils::$projectFilePath . "/login.php");
// }

$output = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submitOrder"])) {
    require("classes/order.php");

    $output = Order::validate();

    if (!$output) {
        Order::create($basket);
        header("Location: " . Utils::$projectFilePath . "/user.php");
        exit; // Add exit after header redirection
    }
}

components::pageHeader("Checkout", ["style"], ["mobile-nav"]);

?>

<main class="content-wrapper home-content">

    <h2>Checkout</h2>

    <form
        method="POST"
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
        enctype="multipart/form-data"
        class="form"
    >
        <h3>Shipping Address</h3>
        <label>Address Line</label>
        <input type="text" name="address_line" value="<?php echo htmlspecialchars($_POST["address_line"] ?? ''); ?>"> 
        <input type="text" name="town" value="<?php echo htmlspecialchars($_POST["town"] ?? ''); ?>"> 
        <input type="text" name="county" value="<?php echo htmlspecialchars($_POST["county"] ?? ''); ?>"> 
        <input type="text" name="postcode" value="<?php echo htmlspecialchars($_POST["postcode"] ?? ''); ?>"> 

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
                <label>Security Number</label>
                <input type="text" name="security_number">
            </div>
        </div>

        <input class="button" type="submit" name="submitOrder" value="Complete order"> <!-- Fix type attribute -->
        <?php if($output) { echo htmlspecialchars($output); } ?> <!-- Sanitize output -->
    </form>

</main>

<?php

Components::pageFooter();

?>
