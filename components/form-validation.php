<?php

// define variables and set to empty values
$nameErr = $emailErr = $websiteErr = $commentErr = "";
$name = $email = $website = $comment = $gender = "";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    $message .= $name . "\n";
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    $message .= $email . "\n";
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["comment"])) {
    $commentErr = "Comment is required";
  } else {
    $comment = test_input($_POST["comment"]);
    $message .= $comment . "\n";
  }

  if (empty($nameErr) && empty($emailErr) && empty($websiteErr) && empty($commentErr)) {
    // Form is correct, perform further actions (e.g., send email)

    // Redirect to success page
    header("Location: success.php");
    exit(); // Make sure to exit after redirecting to prevent further execution
}
  

  // Sending mails doesn't work yet.

//   $emailMessage = $message;

//   // use wordwrap() if lines are longer than 70 characters
//   $emailMessage = wordwrap($emailMessage,70);
  
//   // send email
//   mail("thrusosfilms@gmail.com", "Ticket Submited!", $emailMessage);
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}