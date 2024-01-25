<?php

class Utils {
  public static $projectFilePath = "http://localhost/bookstore";
  public static $defaultBookCover = "default.png";

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

  // Get the file extension of a given file
  public static function getFileExtension($filename) {
    $parts = explode(".", $filename);
    // end() must receive a variable
    return end($parts);
  }
}