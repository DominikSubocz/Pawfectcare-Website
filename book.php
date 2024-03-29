<?php
session_start();

require("classes/user.php");

$username = Utils::escape($_SESSION["username"]);
$userId = Utils::escape($_SESSION["user_id"]);

$conn = Connection::connect();

if (isset($_GET['date'])) {
    $date = $_GET['date'];

    // Prepare the SQL statement to fetch existing bookings for the given date
    $stmt = $conn->prepare(SQL::$getBookingsByDate);
    $stmt->bindParam(1, $date, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the existing bookings and populate the $bookings array
    $bookings = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $bookings[] = $row['booking_time']; // Adjust 'booking_time' as needed to match your DB column
    }
}

if (isset($_POST['submit'])) {
    $timeslot = $_POST['timeslot'];

    // Check if the selected timeslot is available
    $stmt = $conn->prepare(SQL::$getBookingsByDateAndTime);
    $stmt->bindParam(1, $date, PDO::PARAM_STR);
    $stmt->bindParam(2, $timeslot, PDO::PARAM_STR);
    $stmt->execute();
    
    // If the timeslot is available, proceed with creating the booking
    if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
        $stmt = $conn->prepare(SQL::$createBooking);
        $stmt->bindParam(1, $userId, PDO::PARAM_INT);
        $stmt->bindValue(2, 1, PDO::PARAM_INT);
        $stmt->bindParam(3, $date, PDO::PARAM_STR);
        $stmt->bindParam(4, $timeslot, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            $msg = "<div class='alert alert-success'>Booking Successful</div>";
            echo $msg;
            // Redirect after 5 seconds
            $_SESSION["successMessage"] = "Appointment Booked!";

            echo '<script src="js\script.js"></script>';
        } else {
            $msg = "<div class='alert alert-danger'>Booking Failed</div>";
            echo $msg;
        }
    } else {
        $msg = "<div class='alert alert-danger'>Timeslot already booked</div>";
        echo $msg;
    }
}

$duration = 30;
$cleanup = 0;
$start = "09:00";
$end = "18:00";

function timeslots($duration, $cleanup, $start, $end) {
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();

    for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)) {
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if ($endPeriod > $end) {
            break;
        }

        $slots[] = $intStart->format("H:i")."-".$endPeriod->format("H:i");
    }

    return $slots;
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1>
        <hr>
        <div class= "row msg-row">
            <div class="col-md-12">
                <?php echo(isset($msg))?$msg:"";?>
            </div>
        </div>


        <div class="row timeslot-row">

            <?php 
            $timeslots = timeslots($duration, $cleanup, $start, $end);
            foreach($timeslots as $ts): ?>
                <div class="col-md-2 col-test">
                    <div class="form-group group-test">
                        <?php $isBooked = in_array($ts, $bookings); ?>
                        <button class="btn <?php echo $isBooked ? 'btn-danger' : 'btn-success book'; ?>" data-timeslot="<?php echo $ts; ?>">
                            <?php echo $ts; ?>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Booking: <span id="slot"></span> </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Timeslot</label>
                                    <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input required type="text" readonly name="name" class="form-control" value="<?php echo $username; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input required type="email" readonly name="email" class="form-control">
                                </div>
                                <div class="form-group pull-right">
                                    <button class="btn btn-submit-appt btn-primary" type="submit" name="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(".book").click(function() {
            var timeslot = $(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");
        });
    </script>
</body>

</html>