<?php
require("classes/components.php");

Components::pageHeader("Book Appointment", ["style"], ["mobile-nav"]);
?>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include jQuery UI styles and scripts -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div id="main-content">
    <div id="calendar">
        <!-- Calendar component goes here -->
    </div>

    <div id="booking-form">
        <!-- Booking form component goes here -->
        <form method="POST" action="booking.php">
          <label for="bookingDate">Select Date:</label>
          <input type="text" id="bookingDate" name="bookingDate">

          <label for="bookingTime">Select Time:</label>
          <input type="text" id="bookingTime" name="bookingTime">
            <input type="submit" value="Book Now">
        </form>
    </div>
</div>

<?php

Components::pageFooter();

?>
