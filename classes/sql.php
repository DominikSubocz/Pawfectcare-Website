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
  public static $getUser = "SELECT user_id, username, password, user_role FROM users WHERE username = ?";
  public static $createUser = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";


}