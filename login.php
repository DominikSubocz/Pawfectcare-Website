<?php

// This must come first when we need access to the current session
session_start();

require("classes/components.php");

/**
 * Included for the postValuesAreEmpty() and
 * escape() functions and the project file path.
 */
require("classes/utils.php");

// Redirect user from this page if they're already logged in
if (isset($_SESSION["loggedIn"])) {
    header("Location: " . Utils::$projectFilePath . "/book-list.php");
}

$output = "";

// Detect if this page has received a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require("classes/user.php");

    // Determine which form to work with using the submit button's name
    if (isset($_POST["loginSubmit"])) {
        $output = User::login();
    } elseif (isset($_POST["registerSubmit"])) {
        $output = User::register();
    }

    if ($output) {
        header("Location: " . Utils::$projectFilePath . "/book-list.php");
    } else if (isset($_POST["registerSubmit"])) {
        $output = User::register();
    }

    if ($output) {
        header("Location: " . Utils::$projectFilePath . "/registration-success.php");
    }
}

Components::pageHeader("Login", ["style"], ["mobile-nav"]);

?>

<h2>Log in to an existing account</h2>

<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="form">
    <label>Username</label>
    <input
        type="text"
        name="username"
        value="<?php

        /**
         * If there is an error, then the login form was submitted and the username
         * exists, so we can preserve the username in the form.
         *
         * We need to check if the username is set since the previous form
         * submission may have omitted it.
         */
        if ($output && isset($_POST["loginSubmit"]) && isset($_POST["username"])) {
            echo Utils::escape($_POST["username"]);
        }

        ?>"
    >

    <label>Password</label>
    <input type="password" name="password">

    <input class="button" type="submit" name="loginSubmit" value="Log in">

    <!-- Only output if there is an error in the registration form -->
    <?php if ($output && isset($_POST["loginSubmit"])) { echo $output; } ?>
</form>

<hr>

<h2>Register a new account</h2>

<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="form">
    <label>Username</label>
    <input
        type="text"
        name="username"
        value="<?php

        if ($output && isset($_POST["registerSubmit"]) && isset($_POST["username"])) {
            echo Utils::escape($_POST["username"]);
        }

        ?>"
    >

    <label>Email address</label>
    <input
        type="email"
        name="email"
        value="<?php

        if ($output && isset($_POST["registerSubmit"]) && isset($_POST["email"])) {
            echo Utils::escape($_POST["email"]);
        }

        ?>"
    >

    <label>Password</label>
    <input type="password" name="passwordOne">

    <label>Password (retype)</label>
    <input type="password" name="passwordTwo">

    <input class="button" type="submit" name="registerSubmit" value="Register account">

    <!-- Only output if there is an error in the registration form -->
    <?php if ($output && isset($_POST["registerSubmit"])) { echo $output; } ?>
</form>

<?php

Components::pageFooter();

?>
