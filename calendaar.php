<?php
require_once("classes/connection.php");
require_once("classes/sql.php");
require_once("classes/utils.php");
require("classes/components.php");

Components::pageHeader("Book Appointment", ["style"], ["mobile-nav"]);

function build_calendar($month, $year){


    $conn = Connection::connect();

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare(SQL::$test);
    
    // Bind parameters
    $stmt->bindParam(1, $month, PDO::PARAM_INT);
    $stmt->bindParam(2, $year, PDO::PARAM_INT);
    
    $bookings = array();
    
    // Execute the statement
    if ($stmt->execute()) {
        $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Handle errors here if necessary
        print_r($stmt->errorInfo());
    }
    
    $stmt->closeCursor(); // Close the statement cursor
    
    // Further code using $bookings goes here
    

    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
    $numberDays = date('t',$firstDayOfMonth);
    $dateComponents = getdate($firstDayOfMonth);
    $monthName = $dateComponents['month'];
    $dayOfWeek = $dateComponents['wday'];
    $dateToday = date('Y-m-d');
    $calendar = "<center>$monthName $year</center>";
    $prev_month = date('m', mktime(0,0,0,$month-1,1,$year));
    $prev_year = date('Y', mktime(0,0,0,$month-1,1,$year));
    $next_month = date('m', mktime(0,0,0,$month+1,1,$year));
    $next_year = date('y', mktime(0,0,0,$month+1,1,$year));

    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar .= "<a class='btn btn-primary btn-xs' href='?month=".$prev_month."&year=".$prev_year."'>Prev Month</a>";
    $calendar .= "<a class='btn btn-primary btn-xs' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a>";
    $calendar .= "<a class='btn btn-primary btn-xs' href='?month=".$next_month."&year=".$next_year."'>Next Month</a>";
    $calendar .= "<br><table class='table table-bordered'>";
    $calendar .= "<tr>";

    foreach($daysOfWeek as $day){
        $calendar .= "<th class='day-names'>$day</th>";
    }

    $calendar .= "</tr><tr>";
    $currentDay = 1;
    if($dayOfWeek > 0){
        for($k = 0; $k < $dayOfWeek; $k++){
            $calendar .= "<td class='empty'></td>";
        }
    }

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    while($currentDay <= $numberDays){
        if($dayOfWeek == 7){
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay,2,"0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        $dayName = strtolower(date('I',strtotime($date)));
        $today = $date == date('Y-m-d') ? 'today' : '';

        $bookedDates = array_column($bookings, 'booking_date'); // Extracting booking dates from $bookings array

        if (in_array($date, $bookedDates)) {
            $calendar .= "<td class='day-row booked'><h4>$currentDayRel</h4><a class='btn btn-danger btn-xs'>Booked</a></td>";
        } else {
            $calendar .= "<td class='day-row'><h4>$currentDayRel</h4><a href='book.php?date=$date' class='btn btn-success btn-xs'>Book</a></td>";
        }
        $currentDay++;
        $dayOfWeek++;
    }

    if($dayOfWeek < 7){
        $remainingDays =  7 - $dayOfWeek;
        for($i=0; $i < $remainingDays; $i++){
            $calendar.="<td class='empty'></td>";
        }
    }

    $calendar .= "</tr></table>";
    $calendar .= "</center>";

    return $calendar;
}

?>

<style>

    @media only screen and (max-width:760px),
    (min-device-width:802px) and (max-device-width: 1020px){
        table,
        thead,
        tbody,
        th,
        td,
        tr{
            display: block;
        }

        .empty{
            display:none;
        }

        .th{
            position:absolute;
            top:-9999px;
            left:-9999px;
        }

        tr{
            border: 1px solid #ccc;
        }

        td{
            border:none;
            border-bottom: 1px solid #eee;
            position:relative;
        }

        td:nth-of-type(1):before{
            content:"Sunday";
        }

        td:nth-of-type(2):before{
            content:"Monday";
        }

        td:nth-of-type(3):before{
            content:"Tuesday";
        }

        td:nth-of-type(4):before{
            content:"Wednesday";
        }

        td:nth-of-type(5):before{
            content:"Thursday";
        }

        td:nth-of-type(6):before{
            content:"Friday";
        }

        td:nth-of-type(7):before{
            content:"Saturday";
        }
    }

    @media only screen and (min-device-width:320px) and (max-device-width:480px){
            body{
                padding:0;
                margin:0;
            }
    }

    @media (min-width:641px){

table{
    table-layout:fixed;
}

td{
    width:33%;
}

}

.row{
margin-top:20px;
}

.today{
background:yellow;
}

.btn-primary{
    margin:0 15px;
}

.table-bordered{
    margin:25px 0;
}

.day-row, .empty, .day-names{
    border: 1px solid lightgray;
}

.btn{
    padding:5px;
    border-radius:8px;
}

.btn-success{
    background:green;
    color:#fff;

}

.btn-danger{
    background:red;
    color:#fff;

}


    


</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <?php
        $dateComponents = getdate();
        if(isset($_GET['month'])&&($_GET['year'])){
            $month = $_GET['month'];
            $year = $_GET['year'];
        } else {
            $month = $dateComponents['mon'];
            $year = $dateComponents['year'];
        }

        echo build_calendar($month, $year);
        ?>
        </div>
    </div>
</div>

<?php

Components::pageFooter();

?>
