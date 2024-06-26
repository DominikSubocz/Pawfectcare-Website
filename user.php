<?php

/// This must come first when we need access to the current session
session_start();;

require("classes/components.php");
require("classes/utils.php");
require("classes/user.php");

/// Redirect user from this page if they're already logged in
if (!isset($_SESSION["loggedIn"])){
    header("Location: " . Utils::$projectFilePath . "/login.php");
    
}

$userId = Utils::escape($_SESSION["user_id"]); ///< Get user's ID number.


Components::pageHeader("Your Orders", ["style"], ["mobile-nav"]);

?>

<h2>Your Orders</h2>


<?php

Components::orderList($userId, User::getOrders($userId));
Components::pageFooter();

?>