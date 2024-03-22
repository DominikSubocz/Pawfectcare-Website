<?php

session_start();

require("classes/components.php");
require("classes/utils.php");
require("classes/basket.php");


$basket = Basket::getBasketArray();

if(!isset($_SESSION["loggedIn"])){
    header("Location: " . Utils::$projectFilePath . "/login.php");
}

if(empty($basket)){
    header("Location: " . Utils::$projectFilePath . "/book-list.php");
}

$output = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    require("classes/order.php");

    $output = Order::validate();

    if(!$output){
        Order::create($basket);
        header("Location: " . Utils::$projectFilePath . "/user.php");
    }
}

Components::pageHeader("Checkout", ["style"], ["mobile-nav"]);

?>

<h2>Checkout</h2>

<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data" class="form">
  <h3>Shipping Address</h3>

  <label>Address Line</label>
  <input type="text" name="address_line" value="<?php if ($output) {
    echo $_POST["address_line"];
  } ?>">

  <label>Town</label>
  <input type="text" name="town" value="<?php if ($output) {
    echo $_POST["town"];
  } ?>">

  <label>County</label>
  <input type="text" name="county" value="<?php if ($output) {
    echo $_POST["county"];
  } ?>">

  <label>Postcode</label>
  <input type="text" name="postcode" value="<?php if ($output) {
    echo $_POST["postcode"];
  } ?>">

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

  <input class="button" type="submit" value="Complete order">

  <?php if ($output) { echo $output; } ?>
</form>

<?php

Components::pageFooter();

?>