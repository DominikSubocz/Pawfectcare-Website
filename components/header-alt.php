<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>

  <?php

  if (!empty($stylesheets)) {
    foreach ($stylesheets as $sheet) {
      echo "<link rel=\"stylesheet\" href=\"css/$sheet.css\">";
    }
  }

  if (!empty($scripts)) {
    foreach ($scripts as $script) {
      echo "<script src=\"js/$script.js\" defer></script>";
    }
  }

  ?>

</head>
<body>
  <header class="page-header">
    <div class="header-content-top header-content">
      <div class="content-wrapper desktop-header-row">
        <div class="mobile-top">
          <div class="logo-mobile">
            <img class="logo" src="images/logo-mobile.png" alt="Pawfect Care logo with green fox">
            <h1 class="page-title">PawFect Care</h1>
          </div>

          <div class="logo-desktop">
            <img class="logo" src="images/logo.png" alt="Pawfect Care logo with green fox">
            <h1 class="page-title">PawFect Care</h1>
          </div>
          <button class="nav-button" id="nav-button">
            <img src="icons/nav-button.png">
          </button>
        </div>
        <nav class="page-navigation" id="nav-list">
        <ul class="nav-links">
            <li><a href="pet-list.php">Pets</a></li>
            <?php
            if(isset($_SESSION["loggedIn"])){
              $user = $_SESSION["username"];
              if($_SESSION["user_role"] === "Admin"){
                echo "<li><a href='add-book.php'>AddBook</a></li>";
              }
              echo "<li><a href='basket.php'>Basket</a></li>
                <li><a href='user.php'>$user's Account </a></li>
                <li><a href='logout.php'>Logout</a></li>";
            }
            else{
              echo "<li><a href='login.php'>Login</a></li>";
            }
            ?>
          </ul>
        </nav>
      </div>
    </div>

    <div class="header-content-bot header-content">

            <h2> Pawfect Care Adoption </h2>

            <p> Find your furry friend: Discover joy through pet adoption today. </p>


    </div>

  </header>

  <main class="content-wrapper main-content">