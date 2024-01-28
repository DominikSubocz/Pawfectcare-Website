<?php

require_once("classes/connection.php");
require_once("classes/sql.php");
require_once("classes/utils.php");

class User {
    public static function login() {
        if (Utils::postValuesAreEmpty(["username", "password"])) {
            return "<p class='error'>ERROR: Not all form inputs filled</p>";
        }

        $conn = Connection::connect();
        $stmt = $conn->prepare(SQL::$getUser);
        $stmt->execute([$_POST["username"]]);
        $user = $stmt->fetch();

        // Null the connection object
        $conn = null;

        // No user found so return an error
        if (empty($user)) {
            return "<p class='error'>ERROR: User does not exist</p>";
        }

        // Error if given password does not match the one in the database
        if (!password_verify($_POST["password"], $user["password"])) {
            return "<p class='error'>ERROR: Incorrect password</p>";
        }

        // Set session variables
        $_SESSION["logged_in"] = true;
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["user_role"] = $user["user_role"];

        return "";
    }

    public static function register() {
        if (Utils::postValuesAreEmpty(["username", "email", "passwordOne", "passwordTwo"])) {
            return "<p class='error'>ERROR: Not all form inputs filled</p>";
        }

        $errors = "";
        $username = $_POST["username"];
        $email = $_POST["email"];
        $passwordOne = $_POST["passwordOne"];
        $passwordTwo = $_POST["passwordTwo"];

        // Validate username
        if (strlen($username) < 4 || strlen($username) > 32) {
            $errors .= "<p class='error'>ERROR: Username must be between 4 and 32 characters long</p>";
        }

        // Validate email address
        $filteredEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$filteredEmail) {
            $errors .= "<p class='error'>ERROR: Email address is invalid</p>";
        }

        // Validate password
        if ($passwordOne !== $passwordTwo) {
            $errors .= "<p class='error'>ERROR: Passwords do not match</p>";
        } else if (strlen($passwordOne) < 12) {
            $errors .= "<p class='error'>ERROR: Password must be at least 12 characters long</p>";
        }

        // There were validation errors
        if ($errors) {
            return $errors;
        }

        $conn = Connection::connect();

        // Check if the given username already exists in the database
        $stmt = $conn->prepare(SQL::$getUser);
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        // If we got data, that user already exists
        if (!empty($user)) {
            return "<p class='error'>ERROR: User already exists</p>";
        }

        // Hash the user's password
        $BCRYPT = PASSWORD_BCRYPT;
        $hashedPassword = password_hash($_POST["passwordOne"], $BCRYPT);

        // Prepare and execute the query
        $stmt = $conn->prepare(SQL::$createUser);
        $stmt->execute([$username, $filteredEmail, $hashedPassword]);

        // Get the ID of the just inserted record
        $insertedId = $conn->lastInsertId();

        // Null the connection object
        $conn = null;

        // Set session variables
        $_SESSION["logged_in"] = true;
        $_SESSION["user_id"] = $insertedId;
        $_SESSION["username"] = $username;
        $_SESSION["user_role"] = "Member";
        // Ensures the new user can see the registration success page
        $_SESSION["justRegistered"] = true;

        return "";
    }
}
?>
