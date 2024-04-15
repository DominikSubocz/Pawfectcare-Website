<?php

$usernameErr = $emailErr = $passwordErr = $passwordMatchErr = "";
$username = $email = $passwordOne = $passwordTwo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = test_input($_POST["username"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        /// check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["passwordOne"])) {
        $passwordErr = "Password is required";
    } else {
        $passwordOne = test_input($_POST["passwordOne"]);
        $passwordTwo = test_input($_POST["passwordTwo"]);

        if ($passwordOne != $passwordTwo) {
            $passwordMatchErr = "Passwords do not match!";
        }
    }

    if (empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($passwordMatchErr)) {
        /// Proceed with the registration logic here

        $_SESSION["successMessage"] = "Registration Successful!";
        header("Location: " . Utils::$projectFilePath . "/success.php");

        exit(); /// Make sure to exit after redirecting to prevent further execution
    }
}
