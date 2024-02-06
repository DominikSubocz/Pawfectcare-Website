<?php
require("classes/components.php");

Components::pageHeader("Book Appointment", ["style"], ["mobile-nav"]);

function buildCalendar($month, $year){
    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

    $numberDays = date('t',$firstDayOfMonth);

    $dateComponents = getdate($firstDayOfMonth);

    $monthName = $dateComponents['month'];

    $daysOfWeek = $dateComponents['wday'];

    $calendar = "<table class='table table-bordered>";
    $calendar . = "<center><h2>$monthName $year </h2></center>";

    $calendar . = "<tr>"

    foreach($daysOfWeek as $day){
        $calendar . ="<th class='header'>$day</th>";
    }

    $calendar . = "</tr><tr>"

    if($daysOfWeek > 0){
        for($k=; $k<$daysOfWeek; $k++){
            $calendar = "<td></td>";
        }
    }

    $currentDay = 1;

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while($currentDay <= $numberDays){

        if($dayOfWeek == 7){
            $dayOfWeek = 0;
            $calendar . = "</tr><tr>";
        }


        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date="$year-$month-$currentDayRel";

        $calendar . = "<td><h4>$currentDay</h4>";

        $calendar . = "</td>";

        $currentDay++;
        $daysOfWeek++;
        
    }

    if($daysOfWeek !=7){
        $remainingDays = 7-$daysOfWeek;
        for($i=0; $i < $remainingDays; $i++){
            $calendar . = "<td></td>";
        }
    }

    $calendar . = "</tr>";
    $calendar . = "</table>";

    echo $calendar;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <?php
        $dateComponents = getdate();
        $month = $dateComponents['mon'];
        $year = $dateComponents['year'];
        echo buildCalendar($month, $year);
        ?>
        </div>
    </div>
</div>

<?php

Components::pageFooter();

?>
