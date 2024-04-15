<?php
/// This must come first when we need access to the current session
session_start();;
require("classes/components.php");

Components::pageHeader("Home Page", ["style"], ["mobile-nav"]);
?>

<main class="content-wrapper about-content">

<div class="about-container">

    <h2>PAWFECT CARE MISSION</h2>
    <p>At Pawfect Care, our hospital mission is deeply rooted in a commitment to providing exceptional veterinary care that extends
        beyond medical expertis. We strive to create a haven where pets and their families feel valued, supported and understood. Our
        dedicated team of compassionate professionals work tirelessly to ensure the physical well-being of every furry friend, but we go
        beyond that. We aim to foster an environment of trust, education, and collaboration, empowering pet owners to make informed
        decisions about their pets' health. Through cuttong-edge medical practices, genuine care, and a profound love for animals, we
        endevor to elevate the standard of pet healthcare, making a lasting and positive impact on the lives of our cherished companions.
    </p>

    <a class="button" href='calendar.php'>BOOK APPOINTMENT</a>


</div>

<div class="staff-card-container">

    <div>
        <h2> VETERINARIANS & STAFF </h2>
    </div>

    <div class="staff-card">

        <img src="images/pexels-tima-miroshnichenko-6235241.jpg" alt="Image of vet with doctor" class="staff-img">

        <div>
            <h3>ALEX MITCHEL, PET CARE SPECIALIST</h3>
            <p>
                As our Pet Care Specialist, Alex Mitches is the
                heartbeat of Pawfect Care. With a keen understanding
                of each pet's unique needs, Alex ensures that every
                every tail-wagger receives the attention, love, and playtime
                they deserve, creating an enriching environment for
                their stay.
            </p>
        </div>
    </div>


    <div class="staff-card">

            <img src="images/pexels-international-fund-for-animal-welfare-5486952.jpg" alt="Image of vet with doctor" class="staff-img">

            <div>
                <h3>SARAH RODRIGUEZ, VETERINARY NURSE</h3>
                <p>
                    Meet Sarah Rodriguez, our compassionate veterinary
                    nurse. With a tender touch and heart for healing,
                    Sarah plays a crucial role in ensuring the comfort and
                    well-being of our furry patients. Her dedication to
                    excellence and patient care shines through in every
                    interaction.
                </p>
            </div>
    </div>

    <div class="staff-card">

            <img src="images/pexels-tima-miroshnichenko-6234613.jpg" alt="Image of vet with doctor" class="staff-img">

            <div>
                <h3>DR.EMILY THOMPSON</h3>
                <p>
                    Dr.Emily Thompson, our esteemed veterinarian, brings
                    a wealth of experience and a genuine love for animals
                    to Pawfect Care. With a focus on preventive care and a
                    passion for nurturing the human-animal bond, Dr.
                    Thompson ensures each pet receives personalized and
                    comprehensive healthcare.
                </p>
            </div>
    </div>

    <div class="staff-card">

            <img src="images/pexels-mikhail-nilov-7407060.jpg" alt="Image of vet with doctor" class="staff-img">

            <div>
                <h3>RYAN PATEL, SURGICAL TECHNICIAN</h3>
                <p>
                    Precision meets care with Ryan Patel, our skilled
                    surgical technician. With meticulous attention to detail
                    and a dedication to the highest standards, Ryan plays a
                    crucial role in ensuring that surgical procedures at
                    Pawfect Care are conducted seamlessly and with the
                    utmost professionalism.
                </p>
            </div>
    </div>
</div>

<div class="community-container">

    <h2>COMMUNITY INVOLVEMENT</h2>
    <p>
        At Pawfect Care, community involvement is more than a commitment; it's a heart beat. We take pride in actively engaging with our
        local community through pet adoption drives, educational workshops, and partnerships with shelters. Our team volunteers time and
        resources to uplif the well-being of pets in need. Through collaboration and shared love for animals, we strive to create a
        harmonious community where eveyr pet is valued and cared for. Join us in making a positive impact on the lives of our furry friends,
        one paw at a time.
    </p>

    <a class="button" href='articles.php'>LEARN MORE</a>


</div>

</main>

<?php

Components::pageFooter();

?>