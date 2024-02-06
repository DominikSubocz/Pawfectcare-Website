<?php
require("classes/components.php");

// Handle booking submission if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve booking data from the form
    $userId = $_POST["user_id"];
    // Extract more booking data as needed

    // Perform validation and database insertion here
    // You can use your existing PHP logic for handling bookings
}

Components::pageHeader("Book Appointment", ["style"], ["mobile-nav"]);
?>

<!-- Include FullCalendar library -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      // Customize your calendar options as needed
    });
    calendar.render();
  });
</script>

<div id="main-content">
    <div id="calendar">
        <!-- Calendar component goes here -->
    </div>

    <div id="booking-form">
        <!-- Booking form component goes here -->
        <form method="POST" action="booking.php">
            <!-- Input fields for user selections -->
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" id="user_id">
            <!-- Add more input fields for vet selection, date, and time -->

            <input type="submit" value="Book Now">
        </form>
    </div>
</div>
