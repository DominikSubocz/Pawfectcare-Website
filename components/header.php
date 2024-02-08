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
                    /*
                    An example of conditional rendering.

                    If the user is logged in, replace the login link with a logout link.
                    */
                    if (isset($_SESSION['loggedIn'])) {
                        $user = $_SESSION['username'];
                        // Site administrators can add new books
                        if ($_SESSION['user_role'] === "Admin") {
                            echo "<li><a href='add-pet.php'>Add Book</a></li>";
                        }
                        echo "<li><a href='basket.php'>Basket</a></li>
                              <li><a href='user.php'>$user's Account</a></li>
                              <li><a href='calendar.php'>Book Appointment</a></li>
                              <li><a href='logout.php'>Logout</a></li>";
                    } else {
                        echo "<li><a href='login.php'>Login</a></li>";
                    }
                    ?>
                </ul>
            </nav>
      </div>
    </div>
    <div class="waves">

    <div class="header-content-bot header-content">

            <h2> Pawfect Care Adoption </h2>

            <p> Find your furry friend: Discover joy through pet adoption today. </p>


    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00A385" fill-opacity="1" d="M0,320L60,293.3C120,267,240,213,360,186.7C480,160,600,160,720,170.7C840,181,960,203,1080,197.3C1200,192,1320,160,1380,144L1440,128L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>    </div>

  </header>

