<?php

class Utils {
  /// Uncomment this and comment line below to switch to localhost
  /// public static $projectFilePath = "http:///localhost/Pawfectcare-Website/";

  public static $projectFilePath = "http:///192.168.0.14:8080/Pawfectcare-Website/";


  public static $defaultPetCover = "default.png";

  /**
   * Takes an array of $_POST[] keys and checks if any 
   * are empty.
   *
   * Returns true if any values are missing.
   */
  public static function postValuesAreEmpty($arrayOfKeys) {
    foreach ($arrayOfKeys as $key) {
      if (empty($_POST[$key])) {
        return true;
      }
    }
    return false;
  }

  /**
   * Escape input string to prevent accidental evaluation of HTML 
   * or JavaScript
   */
  public static function escape($input) {
    return trim(htmlspecialchars($input));
  }

  /// Get the file extension of a given file
  public static function getFileExtension($filename) {
    $parts = explode(".", $filename);
    /// end() must receive a variable
    return end($parts);
  }
}