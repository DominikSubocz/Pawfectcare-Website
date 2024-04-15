<?php

/// If a file has already been included, do not do so again
require_once("classes/connection.php");
require_once("classes/sql.php");
require_once("classes/utils.php");

/**
 * Class User
 * 
 * Represents a user with login, registration, and order-related functionalities.
 */
class User {
    /**
     * Logs in the user by verifying the username and password.
     *
     * @return string $output Error message if login fails, otherwise an empty string
     */
    public static function login() {
        if (Utils::postValuesAreEmpty(["username", "password"])) {
            return "<p class='error'>ERROR: Not all form inputs filled</p>";
        }

        $conn = Connection::connect();

        /*  is a variable used to prepare and execute SQL statements in the User class methods. It
        is an instance of a PDOStatement object, which is used to interact with the database by
        binding parameters and executing queries. */
        $stmt = $conn->prepare(SQL::$getUser);
        $stmt->execute([$_POST["username"]]);
        $user = $stmt->fetch();

        /// Null the connection object
        $conn = null;

        /// No user found so return an error
        if (empty($user)) {
            return "<p class='error'>ERROR: User does not exist</p>";
        }

        /// Error if given password does not match the one in the database
        if (!password_verify($_POST["password"], $user["password"])) {
            return "<p class='error'>ERROR: Incorrect password</p>";
        }

        $_SESSION["loggedIn"] = true;
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["user_role"] = $user["user_role"];

        return "";
    }

    /**
     * Registers a new user based on the form input values.
     *
     * This method validates the form input values.
     * If any validation fails, it returns an error message.
     *
     * @return string $output Returns an error message if any validation fails, or an empty
     */
    public static function register() {
        if (Utils::postValuesAreEmpty(["username", "email", "passwordOne", "passwordTwo"])) {
            return "<p class='error'>ERROR: Not all form inputs filled</p>";
        }

        $errors = "";
        $username = $_POST["username"];
        $email = $_POST["email"];
        $passwordOne = $_POST["passwordOne"];
        $passwordTwo = $_POST["passwordTwo"];

        /// Validate username
        if (strlen($username) < 4 || strlen($username) > 32) {
            $errors .= "<p class='error'>ERROR: Username must be between 4 and 32 characters long</p>";
        }

        /// Validate email address
        $filteredEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (!$filteredEmail) {
            $errors .= "<p class='error'>ERROR: Email address is invalid</p>";
        }

        /// Validate password
        if ($passwordOne != $passwordTwo) {
            $errors .= "<p class='error'>ERROR: Passwords do not match</p>";
        } else if (strlen($passwordOne) < 12) {
            $errors .= "<p class='error'>ERROR: Password must be at least 12 characters long</p>";
        }

        /// There were validation errors
        if ($errors) {
            return $errors;
        }

        $conn = Connection::connect();

        /// Check if the given username already exists in the database
        $stmt = $conn->prepare(SQL::$getUser);
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        /// If we got data, that user already exists
        if (!empty($user)) {
            return "<p class='error'>ERROR: User already exists</p>";
        }

        /// Hash the user's password
        /// BCRYPT will always result in a 60 char hash
        $hashedPassword = password_hash($passwordOne, PASSWORD_BCRYPT);

        /// Prepare and execute the query
        $stmt = $conn->prepare(SQL::$createUser);
        $stmt->execute([$username, $filteredEmail, $hashedPassword]);

        /// Get the ID of the just inserted record
        $insertedId = $conn->lastInsertId();

        /// Null the connection object
        $conn = null;

        /// Set session variables
        $_SESSION["loggedIn"] = true;
        $_SESSION["user_id"] = $insertedId;
        $_SESSION["username"] = $username;
        $_SESSION["user_role"] = "Member";
        $_SESSION["justRegistered"] = true;

        return "";
    }

    /**
     * Retrieves orders for a specific user from the database.
     *
     * @param int $userId The ID of the user to retrieve orders for
     * @return array $orders An array of orders associated with the user
     */
    public static function getOrders($userId) {
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getUserOrders);
        $stmt->execute([$userId]);
        $orders = $stmt->fetchAll();

        $conn = null;

        return $orders;
    }

    /**
     * Get the total order price for a specific user and order.
     *
     * @param int $userId The ID of the user
     * @param int $orderId The ID of the order
     * @return float $result The total order price
     */
    public static function getTotalOrderPrice($userId, $orderId) {
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getTotalOrderPrice);
        $stmt->execute([$userId, $orderId]);
        $result = $stmt->fetch();

        $conn = null;

        return $result[0];
    }
}

?>
