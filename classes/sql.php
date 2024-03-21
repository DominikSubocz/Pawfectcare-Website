<?php

class SQL {
  public static $getAllPets = "SELECT * FROM petsinfo";
  /**
   * Get the book with the id given in the URL parameter.
   * 
   * The ? indicates a placeholder value which we will supply 
   * when executing the statement.
   */
  // public static $getPet = "SELECT * FROM petsinfo WHERE pet_id = ?";
  public static $getPet = "SELECT p.*, s.story_text FROM petsinfo p LEFT JOIN petstories s ON p.pet_id = s.pet_id WHERE p.pet_id = ?";
  public static $getUser = "SELECT user_id, username, password, user_role FROM users WHERE username = ?";
  public static $createUser = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
  public static $createBook = "INSERT INTO petsinfo (name_, species, age, filename) VALUES (?,?,?,?)";
  public static $updateBook = "UPDATE petsinfo SET name_ = ?, species = ?, age = ?, filename = ? WHERE pet_id = ?";
      
  public static $deleteBook = "DELETE petstories, petsinfo
  FROM petstories
  LEFT JOIN petsinfo ON petstories.pet_id = petsinfo.pet_id
  WHERE petstories.pet_id = ?";

  public static $createOrder = "INSERT INTO orders
      (order_id, book_id, user_id, quantity, order_date, address_line, postcode) VALUES
      (?, ?, ?, ?, ?, ?, ?)";
  public static $getMaxOrderID = "SELECT MAX(order_id) FROM orders";
  public static $getPostcode = "SELECT * FROM postcodes WHERE postcode = ?";
  public static $createPostcode = "INSERT INTO postcodes (postcode, town, county) VALUES (?, ?, ?,)";
  public static $getUserOrders = "SELECT * FROM orders INNER JOIN petsinfo
    ON orders.pet_id = petsinfo.pet_id
    WHERE user_id = ?
    ORDER BY orders.order_date DESC";

  public static $getTotalOrderPrice = "SELECT SUM(orders.quantity * books.price)
      FROM orders
      INNER JOIN books
      ON orders.book_id = books.book_id
      WHERE orders.user_id = ? AND orders.order_id = ?";
  public static $createBooking = "INSERT INTO bookings (user_id, vet_id, booking_date, booking_time) VALUES (?,?,?,?)";
  public static $test = "SELECT * FROM bookings WHERE month(booking_date) = ? AND year(booking_date) = ?";
  public static $test2 = "SELECT * FROM bookings WHERE booking_date = ?";
  public static $test3 = "SELECT * FROM bookings WHERE booking_date = ? AND booking_time = ?";

  public static $getAllArticles = "SELECT * FROM pets.articles";

}