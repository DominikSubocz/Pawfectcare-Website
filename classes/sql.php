<?php

class SQL {
  public static $getAllBooks = "SELECT * FROM books";

  /**
   * Get the book with the id given in the URL parameter.
   * 
   * The ? indicates a placeholder value which we will supply 
   * when executing the statement.
   */
  public static $getBook = "SELECT * FROM books WHERE book_id = ?";
  public static $getUser = "SELECT user_id, username, password, user_role FROM users WHERE username = ?";
  public static $createUser = "INSERT INTO users (username,email,password VALUES WHERE (?, ?, ?)";


}