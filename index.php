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

    <div class="story-container">
        <div>
            <img src="images/blob1.png" alt="Image of vet with doctor" class="blob-img">
        </div>

        <div class="story-paragraph">
            <h2>Our Story</h2>

            <p> 
                From a love for animals to a passion for their well-being, our journey began
                with a simple mission: providing top-notch care and knowledge to enrich the
                lives of pets and their owners. Join us in celebrating the joy of companionship
                and the art of responsible pet ownership. This is Our Story, a tale woven with 
                dedication, compassion, and countless furry friends.
            </p>

            <a href='about.php'>About Us</a>
        </div>
    </div>
    
    <div class="services-container">    
        <div>
            <div><img src="images/pexels-pranidchakan-boonrom-1350593.jpg" alt="Image of vet with doctor" class="services-img"></div>
            <div><img src="images/blob2.png" alt="Image of vet with doctor" class="blob-img2"></div>
        
            <h2>
                Surgical & Anesthetic Care
            </h2>
        </div>

        <div>
            <div><img src="images/pexels-tima-miroshnichenko-6235241.jpg" alt="Image of vet with doctor" class="services-img"></div>
            <div><img src="images/blob2.png" alt="Image of vet with doctor" class="blob-img2"></div>
            <h2>
                Pet Behaviour Support
            </h2>
        </div>

        <div>
            <div><img src="images/pexels-international-fund-for-animal-welfare-5486952.jpg" alt="Image of vet with doctor" class="services-img"></div>
            <div><img src="images/blob2.png" alt="Image of vet with doctor" class="blob-img2"></div>
            <h2>
                Pet Daycare & Lodging
            </h2>
        </div>

        <div>
            <div><img src="images/pexels-gustavo-fring-6816865.jpg" alt="Image of vet with doctor" class="services-img"></div>
            <div><img src="images/blob2.png" alt="Image of vet with doctor" class="blob-img2"></div>
            <h2>
                Dental Health & Surgical Services
            </h2>
        </div>

        <div class="testimonial-container">
            <h2> Customer Reviews </h2>
            <div class="testimonial-card">
                <p> 
                    "This website is a one-stop shop for a pet enthusiasts! The 
                    detailed articles on pet health have been a lifesaver for me.
                    Finding local vets and the adoption section are added bonuses.
                    It's like having a virtual pet care encyclopedia - informative,
                    engaging, and incredibly useful!"
                </p>
                <p>Written by Sarah P.</p>
            </div>

        <div class="testimonial-svg">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255 250">
                <!-- Top wavy curve -->
                <path d="M0,0 Q50,20 100,0 Q150,-20 200,0 Q250,20 300,0 Q350,-20 400,0 H400 V100 H0 Z" fill="#0099ff" />
                <!-- Bottom wavy curve -->
                <path d="M0,200 Q50,180 100,200 Q150,220 200,200 Q250,180 300,200 Q350,220 400,200 H400 V100 H0 Z" fill="#0099ff" />
            </svg>
        </div>

        </div>

    </div>

</main>

<?php

Components::pageFooter();
?>
<!-- 
//1.update
//2.deletion
//3.js form validation
// 4.testing -->

