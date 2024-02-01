<?php

class SQL {
  public static $getAllPets = "SELECT * FROM petsinfo";

  /**
   * Get the book with the id given in the URL parameter.
   * 
   * The ? indicates a placeholder value which we will supply 
   * when executing the statement.
   */
  public static $getPet = "SELECT * FROM petsinfo WHERE pet_id = ?";
  public static $getStory = "SELECT * FROM petstories WHERE pet_id = ?";
  public static $getUser = "SELECT user_id, username, password, user_role FROM users WHERE username = ?";
  public static $createUser = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
  public static $createBook = "INSERT INTO petsinfo (name_, species, age, filename) VALUES (?,?,?,?)";
  public static $updateBook = "UPDATE petsinfo
        SET name_ = ?, species = ?, age = ?, filename = ?
        WHERE pet_id = ?";
        
  public static $updateBookNoFile = "UPDATE petsinfo
      SET name_ = ?, species = ?, age = ?
      WHERE pet_id = ?";
  public static $deleteBook = "DELETE FROM petsinfo WHERE pet_id = ?";

}