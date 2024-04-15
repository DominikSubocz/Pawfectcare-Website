<?php

/// This must come first when we need access to the current session
session_start();;

require("classes/components.php");

/**
 * Included for the postValuesAreEmpty() and
 * escape() functions and the project file path.
 */
require("classes/utils.php");

/// Redirect user from this page if they're already logged in
if (isset($_SESSION["loggedIn"])) {
    header("Location: " . Utils::$projectFilePath . "/pet-list.php");
}

$output = "";

/// Detect if this page has received a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require("classes/user.php");

    /// Determine which form to work with using the submit button's name
    if (isset($_POST["loginSubmit"])) {
        $output = User::login();
    }
    
    if(stripos($output, "error") != true){
        $_SESSION["successMessage"] = "Registration Successful!";
        header("Location: " . Utils::$projectFilePath . "/success.php");
    }

}

Components::pageHeader("Login", ["style"], ["mobile-nav"]);

?>


<main class="content-wrapper login-content">


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

        <input class="button" type="submit" onclick="return validateLogin()" name="loginSubmit" value="Log in">

        <!-- Only output if there is an error in the registration form -->
        <?php if ($output && isset($_POST["loginSubmit"])) { echo $output; } ?>
    </form>

    <a href="register.php">Register New Account</a>
</main> 

<script>
    /**
     * Validates the login form by checking if the username and password fields are filled out.
     */
    function validateLogin() {
        let formName = document.forms[0]["username"].value.trim();
        let formPassword = document.forms[0]["password"].value.trim();




        if (formName === "") {
            alert("Username must be filled out");
            return false;
        }

        if (formPassword === "") {
            alert("Password must be filled out");
            return false;
        }


        
        return true;
    }
</script>

<?php

Components::pageFooter();

?>
