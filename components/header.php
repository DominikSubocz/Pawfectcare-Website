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
    <div class="header-content-top">
      <div class="content-wrapper desktop-header-row">
        <div class="mobile-top">
          <h1 class="page-title">PawFect Care</h1>
          <button class="nav-button" id="nav-button">
            <img src="icons/nav-button.png">
          </button>
        </div>
        <nav class="page-navigation" id="nav-list">
          <ul class="nav-links">
            <li><a href="book-list.php">Pets</a></li>
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
    <div class="waves">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00A385" fill-opacity="1" d="M0,64L60,90.7C120,117,240,171,360,165.3C480,160,600,96,720,90.7C840,85,960,139,1080,170.7C1200,203,1320,213,1380,218.7L1440,224L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
    </div>

  </header>

  <main class="content-wrapper main-content">