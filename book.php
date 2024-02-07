<?php
session_start();

require("classes/user.php");


$username = Utils::escape($_SESSION["username"]);
$userId = Utils::escape($_SESSION["user_id"]);


if (isset($_GET['date'])) {
    $date = $_GET['date'];
}

if (isset($_POST['submit'])) {

    $conn = Connection::connect();


    // Prepare and execute the SQL statement
    $stmt = $conn->prepare(SQL::$createBooking);
    
    $stmt->bindParam(1, $userId, PDO::PARAM_INT);
    $stmt->bindValue(2, 1, PDO::PARAM_INT);
    $stmt->bindParam(3, $date, PDO::PARAM_STR);
    $stmt->bindValue(4, '09:00:00', PDO::PARAM_STR);
    
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $msg = "<div class='alert alert-success'>Booking Successful</div>";
        echo $msg; // Output the success message
        
        // Redirect after 5 seconds
        echo '<script src="js\script.js"></script>';

    } else {
        $msg = "<div class='alert alert-danger'>Booking Failed</div>";
    }
    
}

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
  </head>

  <body>
    <div class="container">
        <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1><hr>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
               <?php echo isset($msg)?$msg:''; ?>
                <form action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $username; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email"readonly>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>

</html>
