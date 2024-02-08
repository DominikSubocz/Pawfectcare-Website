<?php
session_start();

require("classes/components.php");

components::pageHeader("Home Page", ["style"], ["mobile-nav"]);
?>
<main class="content-wrapper index-content">

    <div class="feature-card-container">
        <div class="feature-card membership-feature-card">
            <img class="feature-icon" src="icons/icons8-smartphone-approve-96.png" alt="Black and white icon of mobile phone with approval tick mark on screen">
            <p>Pawfect Club Wellness Plans</p>
        </div>
        <div class="feature-card care-feature-card">
        <img class="feature-icon" src="icons/icons8-trust-100.png" alt="Black and white icon of mobile phone with approval tick mark on screen">

            <p>Certified Care</p>
        </div>
        <div class="feature-card shop-feature-card">
        <img class="feature-icon" src="icons/icons8-dog-bowl-96.png" alt="Black and white icon of mobile phone with approval tick mark on screen">

            <p>Shop Pet Essentials</p>
        </div>
        <div class="feature-card appointment-feature-card">
        <img class="feature-icon" src="icons/icons8-calendar-100.png" alt="Black and white icon of mobile phone with approval tick mark on screen">

            <p>Book Appointment Online</p>
        </div>
    </div>

    <div class='parent'><div class="magicpattern"/></div>
</main>

<?php

Components::pageFooter();
?>