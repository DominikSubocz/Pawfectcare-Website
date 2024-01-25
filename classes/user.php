<?php
require_once("classes/connection.php");
require_once("classes/sql.php");
require_once("classes/utils.php");

class User{
    public static function login(){
        if (Utils::postValuesAreEmpty(["username", "password"])){
            return "<p class='error'> ERROR: Not all form inputs filled</p>";

        }

        $conn = Connection::connect();
        $stmt = $conn->prepare(SQL::$getUser);
        $stmt-> execute([])
    }
}