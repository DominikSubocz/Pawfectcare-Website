<?php

/// Contains static SQL queries for various database operations.
class SQL {
  /**
   * Retrieve all records from the 'petsinfo' table.
   */
  public static $getAllPets = "SELECT * FROM petsinfo";
  
  /**
   * Retrieve pet information and associated story text based on the provided pet ID.
   */
  public static $getPet = "SELECT p.*, s.story_text FROM petsinfo p LEFT JOIN petstories s ON p.pet_id = s.pet_id WHERE p.pet_id = ?";
  
  /**
   * Retrieve user information based on the provided username.
   */
  public static $getUser = "SELECT user_id, username, password, user_role FROM users WHERE username = ?";
  
  /**
   * Create a new user in the database.
   */
  public static $createUser = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
  
  /**
   * Create a new record in the 'petsinfo' table with the provided values.
   */
  public static $createPet = "INSERT INTO petsinfo (name_, species, age, filename) VALUES (?,?,?,?)";
  
  /**
   * Update pet information in the petsinfo table.
   */
  public static $updatePet = "UPDATE petsinfo SET name_ = ?, species = ?, age = ?, filename = ? WHERE pet_id = ?";
      
  /**
   * Delete a pet and its related information from the database.
   */
  public static $deletePet = "DELETE petstories, petsinfo
  FROM petstories
  LEFT JOIN petsinfo ON petstories.pet_id = petsinfo.pet_id
  WHERE petstories.pet_id = ?";

  /**
   * Create a new order in the database.
   */
  public static $createOrder = "INSERT INTO orders
      (order_id, pet_id, user_id, quantity, order_date, address_line, postcode) VALUES
      (?, ?, ?, ?, ?, ?, ?)";

  /**
   * Retrieve the maximum order ID from the orders table.
   */
  public static $getMaxOrderID = "SELECT MAX(order_id) FROM orders";

  /**
   * Retrieve data from the 'postcodes' table based on the provided postcode.
   */
  public static $getPostcode = "SELECT * FROM postcodes WHERE postcode = ?";

  /**
   * Create a new postcode entry in the 'postcodes' table.
   */
  public static $createPostcode = "INSERT INTO postcodes (postcode, town, county) VALUES (?, ?, ?)";

  /**
   * Retrieve all orders for a specific user, including pet information, ordered by order date in descending order.
   */
  public static $getUserOrders = "SELECT * FROM orders INNER JOIN petsinfo
    ON orders.pet_id = petsinfo.pet_id
    WHERE user_id = ?
    ORDER BY orders.order_date DESC";

  /**
   * Retrieve total order price by summing the product of quantity and price for a specific user and order.
   */
  public static $getTotalOrderPrice = "SELECT SUM(orders.quantity * petsinfo.price)
      FROM orders
      INNER JOIN petsinfo
      ON orders.pet_id = petsinfo.pet_id
      WHERE orders.user_id = ? AND orders.order_id = ?";

  /**
   * Create a new booking in the bookings table.
   */
  public static $createBooking = "INSERT INTO bookings (user_id, vet_id, booking_date, booking_time) VALUES (?,?,?,?)";
  
  /**
   * Retrieve bookings based on month and year.
   */
  public static $getBookingsByMonthAndYear = "SELECT * FROM bookings WHERE month(booking_date) = ? AND year(booking_date) = ?";
  
  /**
   * Retrieve bookings by a specific booking date.
   */
  public static $getBookingsByDate = "SELECT * FROM bookings WHERE booking_date = ?";
  
  /**
   * Retrieve bookings based on booking date and time.
   */
  public static $getBookingsByDateAndTime = "SELECT * FROM bookings WHERE booking_date = ? AND booking_time = ?";

  /**
   * Retrieve all articles from the 'pets' database table.
   */
  public static $getAllArticles = "SELECT * FROM pets.articles";

}