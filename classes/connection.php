<?php

class Connection {
  /**
   * Return a new PDO database connection object.
   */
  public static function connect() {
    /// Include the credentials for DB connection
    require("includes/credentials.php");

    try {
      /// Create a new PDO connection object
      $conn = new PDO(
        "mysql:host=" . $credentials["server"] . ";dbname=" . $credentials["dbName"] . ";", 
        $credentials["user"], 
        $credentials["pass"]
      );

      /// Throw PDOExceptions instead of failing silently
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      /// Stop script execution and output error
      exit("Error: ". $e->getMessage());
    }

    return $conn;
  }
}