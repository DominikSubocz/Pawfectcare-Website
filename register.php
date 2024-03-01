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
    header("Location: " . Utils::$projectFilePath . "/pet-list.php");
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

    if(stripos($output, "error") != true){
        $_SESSION["successMessage"] = "Registration Successful!";
        header("Location: " . Utils::$projectFilePath . "/success.php");
    }

}

Components::pageHeader("Register", ["style"], ["mobile-nav"]);

?>

<main class="content-wrapper login-content">


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

        <input class="button" type="submit" onclick="return validateRegister()" name="registerSubmit" value="Register account">

        <!-- Only output if there is an error in the registration form -->
        <?php if ($output && isset($_POST["registerSubmit"])) { echo $output; } ?>
    </form>
</main>

<script>
    function validateRegister() {
        let formName = document.forms[0]["username"].value.trim();
        let formEmail = document.forms[0]["email"].value.trim();
        let formPasswordOne = document.forms[0]["passwordOne"].value.trim();
        let formPasswordTwo = document.forms[0]["passwordTwo"].value.trim();



        if (formName === "") {
            alert("Name must be filled out");
            return false;
        }

        if((formName.length < 4) || (formName.length >32)){
            alert("Username must be between 4 and 32 characters long!");
        }

        if (formEmail === "") {
            alert("Email must be filled out");
            return false;
        }

        if (formPasswordOne === "") {
            alert("Password must be filled out");
            return false;
        }

        if (formPasswordTwo === "") {
            alert("Password two must be filled out");
            return false;
        }

        if (formPasswordOne !== formPasswordTwo){
            alert("Passwords do not match");
        }

        
        return true;
    }
</script>


<?php

Components::pageFooter();

?>
