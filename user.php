<?php

session_start();

require("classes/components.php");
require("classes/utils.php");
require("classes/user.php");

if (!isset($_SESSION["loggedIn"])){
    header("Location: " . Utils::$projectFilePath . "/login.php");
    
}

$userId = Utils::escape($_SESSION["user_id"]);


Components::pageHeader("Your Orders", ["style"], ["mobile-nav"]);

?>

<h2>Your Orders</h2>


<?php

Components::orderList($userId, User::getOrders($userId));
Components::pageFooter();

?>