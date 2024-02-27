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
                    <li><a href="contact.php">Contact Us</a></li>
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
                              <li><a href='user.php'>Account</a></li>
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

    <div class="header-content-bot header-content">

            <div>
              <div>
                <h2> Pawfect Care Adoption </h2>
                <p> Find your furry friend: Discover joy through pet adoption today. </p>
              </div>
            </div>

    </div>

    <div class="demo">
    <svg class="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" width="400" height="400">
        <defs>  
            <clipPath id="blob">
            <path fill="#00cba9" d="M0,160L48,186.7C96,213,192,267,288,277.3C384,288,480,256,576,218.7C672,181,768,139,864,138.7C960,139,1056,181,1152,208C1248,235,1344,245,1392,250.7L1440,256L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
            </clipPath>
        </defs>
        <image xlink:href="images/healthcare-gigapixel.png" x="0" y="0" height="100%" width="500px" clip-path="url(#blob)"/>
      </svg>
</div>

  

  </header>

