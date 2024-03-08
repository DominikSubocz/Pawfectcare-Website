<?php
session_start();

require("classes/components.php");

components::pageHeader("Home Page", ["style"], ["mobile-nav"]);
?>

<head>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Include Owl Carousel CSS and JS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</head>
<main class="content-wrapper index-content">

<script>
  // Include the provided JavaScript code here
  $(document).ready(function () {
    $(".owl-carousel1").owlCarousel({
      loop: true,
      center: true,
      margin: 0,
      responsiveClass: true,
      nav: false,
      responsive: {
        0: { items: 1, nav: false },
        680: { items: 2, nav: false, loop: false },
        1000: { items: 3, nav: true }
      }
    });
  });
</script>

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
        <div class="story-card">
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
                <a class="button" href='about.php'>About Us</a>
            </div>
        </div>

        <div class="team-card">
            <div>
                <img src="images/magicpattern-blob-1709222087209.png" alt="Image of three vet doctors cut in a sphere shape." class="blob-img">
            </div>
            <div class="story-paragraph">
                <h2>MEET OUR TEAM</h2>
                <p>
                    Meet our passionate team - veterinary experts, content creators, and tech
                    enthusiasts united by a love for pets. Commited to providing you with
                    top-notch resources and support, we're here to enhance the well-being of your
                    furry companions. Get to know the faces behind the care.
                </p>
                <a class="button" href="login.php"> MEET THE TEAM </a>
            </div>
        </div>
    </div>

    <div class="meet-team-container">





    </div>
    

    
    <div class="services-container">

        <h2>Services We Offer</h2>

        <div class="services">
            <div>
                <div><img src="images/pexels-pranidchakan-boonrom-1350593.jpg" alt="Image of vet with doctor" class="services-img"></div>
                <div><img src="images/blob2.png" alt="Image of vet with doctor" class="blob-img2"></div>
        
                <h3>
                    Surgical & Anesthetic Care
                </h3>
            </div>
            <div>
                <div><img src="images/pexels-tima-miroshnichenko-6235241.jpg" alt="Image of vet with doctor" class="services-img"></div>
                <div><img src="images/blob2.png" alt="Image of vet with doctor" class="blob-img2"></div>
                <h3>
                    Pet Behaviour Support
                </h3>
            </div>
            <div>
                <div><img src="images/pexels-international-fund-for-animal-welfare-5486952.jpg" alt="Image of vet with doctor" class="services-img"></div>
                <div><img src="images/blob2.png" alt="Image of vet with doctor" class="blob-img2"></div>
                <h3>
                    Pet Daycare & Lodging
                </h3>
            </div>
            <div>
                <div><img src="images/pexels-gustavo-fring-6816865.jpg" alt="Image of vet with doctor" class="services-img"></div>
                <div><img src="images/blob2.png" alt="Image of vet with doctor" class="blob-img2"></div>
                <h3>
                    Dental Health & Surgical Services
                </h3>
            </div>
        </div>
    </div>

    <div class="gtco-testimonials">

        <h2> Client Reviews </h2>
        <div class="owl-carousel owl-carousel1 owl-theme">
            <div>
            <div class="card text-center"><img class="card-img-top" src="https://images.unsplash.com/photo-1572561300743-2dd367ed0c9a?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=300&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=300" alt="">
                <div class="card-body">
                <h5>Ronne Galle <br />
                    <span> Project Manager </span>
                </h5>
                <p class="card-text">“ Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                    impedit quo minus id quod maxime placeat ” </p>
                </div>
            </div>
            </div>
            <div>
            <div class="card text-center"><img class="card-img-top" src="https://images.unsplash.com/photo-1588361035994-295e21daa761?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=301" alt="">
                <div class="card-body">
                <h5>Missy Limana<br />
                    <span> Engineer </span>
                </h5>
                <p class="card-text">“ Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                    impedit quo minus id quod maxime placeat ” </p>
                </div>
            </div>
            </div>
            <div>
            <div class="card text-center"><img class="card-img-top" src="https://images.unsplash.com/photo-1575377222312-dd1a63a51638?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=302&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=302" alt="">
                <div class="card-body">
                <h5>Martha Brown<br />
                    <span> Project Manager </span>
                </h5>
                <p class="card-text">“ Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                    impedit quo minus id quod maxime placeat ” </p>
                </div>
            </div>
            </div>
            <div>
            <div class="card text-center"><img class="card-img-top" src="https://images.unsplash.com/photo-1549836938-d278c5d46d20?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=303" alt="">
                <div class="card-body">
                <h5>Hanna Lisem<br />
                    <span> Project Manager </span>
                </h5>
                <p class="card-text">“ Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                    impedit quo minus id quod maxime placeat ” </p>
                </div>
            </div>
            </div>
        </div>
        </div>

    </div>



</main>

<?php

Components::pageFooter();
?>
<!-- 
// 4.testing -->

