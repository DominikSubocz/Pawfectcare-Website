<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https:///fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https:///fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

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
                    <li><a href='index.php'>Home Page</a></li>
                    <li><a href='about.php'>About Us</a></li>
                    <li><a href="pet-list.php">Pets</a></li>
                    <li><a href='articles.php'>Blog</a></li>
                    <?php
                    /// Redirect user from this page if they're already logged in
                    if (isset($_SESSION['loggedIn'])) {
                        /// Site administrators can add new books
                        $username = $_SESSION["username"];

                        echo "<li><a href='calendar.php'>Book Appointment</a></li>
                              <li><a href='basket.php'>Basket</a></li>
                              <li><a href='contact.php'>Contact Us</a><li>
                              <li><a href='user.php'>$username's Account</a></li>
                              <li><a href='logout.php'>Logout</a></li>";
                    } else {
                        echo "<li><a href='login.php'>Login</a></li>";
                    }
                    ?>
                </ul>
            </nav>
      </div>
    </div>
    <div class='header-content-bot header-content'>
      <div class='wrap'>
        <div class='spotlight'>
          <div>
            <h2> Pawfect Care Adoption </h2>
            <p> Find your furry friend: Discover joy through pet adoption today. </p>
          </div>
          <div>
            <img id='header-img' class='header-img' src='images/dog-with-doctor.png' alt='Pawfect Care logo with green fox'>
          </div>
        </div>
      </div>
    </div>
    <div class='wave-container'>
      <div class='wrap'>
        <div class='wave'>

            <svg viewBox="0 0 450 200" preserveAspectRatio="none meet">
              <path d="M-50,100 L-1,100 C150,200 300,0 450,102 L600,100 L600,300 L-250,300 L-250,Z" style="fill:white;stroke:#dfe1ff;stroke-width:8;"></path>
            </svg>
        </div>
      </div>


    </div>



    <script>

    Index = Math.floor(Math.random() * 3) + 1;
    console.log(Index);

    if(Index == 1){
      document.getElementById("header-img").src = "images/black.png";
      document.getElementById("header-img").style.transform = "translate(50px,10px)";
    }

    else if (Index == 2){
      document.getElementById("header-img").src = "images/dog.png";
      document.getElementById("header-img").style.transform = "translate(75px,30px)";
    }

    else{

    }

    </script>
  </header>

