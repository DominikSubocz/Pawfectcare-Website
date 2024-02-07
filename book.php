<?php
session_start();

require("classes/user.php");



$username = Utils::escape($_SESSION["username"]);
$userId = Utils::escape($_SESSION["user_id"]);

$conn = Connection::connect();


if (isset($_GET['date'])) {
    $date = $_GET['date'];

    $stmt = $conn->prepare(SQL::$test2);
    $stmt->bindParam(1, $date, PDO::PARAM_INT);
    $bookings = array();
    if($stmt->execute()){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $bookings[] = $row['timeslot'];
        }
        $stmt->closeCursor(); // Close the statement cursor

    }


}

if (isset($_POST['submit'])) {


    

    $timeslot = $_POST['timeslot'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare(SQL::$createBooking);
    
    $stmt->bindParam(1, $userId, PDO::PARAM_INT);
    $stmt->bindValue(2, 1, PDO::PARAM_INT);
    $stmt->bindParam(3, $date, PDO::PARAM_STR);
    $stmt->bindParam(4, $timeslot, PDO::PARAM_STR);
    
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $msg = "<div class='alert alert-success'>Booking Successful</div>";
        echo $msg; // Output the success message
        
        // Redirect after 5 seconds
        echo '<script src="js\script.js"></script>';

    } else {
        $msg = "<div class='alert alert-danger'>Booking Failed</div>";
    }

    $bookings[]=$timeslot;


}

$duration = 30;
$cleanup = 0;
$start = "09:00";
$end = "18:00";

function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();

    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod > $end){
            break;
        }

        $slots[] = $intStart->format("H:iA")."-".$endPeriod->format("H:iA");
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

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <div class="container">
        <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1><hr>
        <div class="row">
            <div class="col-md-12">
                <?php echo (isset($msg))?$msg:"";?>
            </div>
            <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
                foreach($timeslots as $ts){
                ?>
                <div class="col-md-2">
                    <div class="form-group">
                        <?php if(in_array($ts, $bookings)){ ?>
                            <button class="btn btn-danger"><?php echo $ts;?></button>
                        <?php}else{?>
                            <button class="btn btn-success book" data-timeslot="<?php echo $ts;?>"><?php echo $ts;?></button>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
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
                        <form action=""method="post">
                            <div class="form-group">
                                <label for="">Timeslot</label>
                                <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Name</label>
                                <input required ype="text" readonly name="name" class="form-control" value="<?php echo $username; ?>">
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input required ype="email" readonly name="email" class="form-control">
                            </div>

                            <div class="form-group pull-right">
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
    <script>
        $(".book").click(function(){
            var timeslot = $(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");

        })
    </script>
</body>

</html>
