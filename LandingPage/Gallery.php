<?php
require 'C:\wamp64\www\Asly-LMS\config\database.php';

// Fetch education levels
$educationLevels = $conn->query("SELECT id, educationLevel FROM educationlevel");
?>
<!DOCTYPE html>
<html lang="en">

<!--
Page    : Features / Asly-LMS
Version : 1.0
Author  : Colorlib (Modified for Asly International College Inc.)
-->

<head>
    <title>Asly International College Inc.</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../images/ASLYLOGO3.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Asly International College Inc.">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <!-- Local CSS Files -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/themify-icons.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- Bootstrap CDN (Optional, ensures up-to-date support) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <style>
        .active-course {
            text-decoration: underline;
            font-weight: bold;
            color: #959094 !important;
        }

        .active-course:hover {
            color: #959094 !important;
        }

        .card-body .list-unstyled a:hover {
            font-weight: bold;
        }

        .text-decoration-none {
            color: #959094 !important;
        }
    </style>
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">

    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">Enrollment successful!</div>
    <?php endif; ?>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger">Error: <?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <!-- Nav Menu -->
    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" href="#"><img src="../images/AICI.png" class="img-fluid" alt="logo"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item"><a class="nav-link" href="../index.php">HOME</a></li>
                                <li class="nav-item"><a class="nav-link active" href="Gallery.php">BLOG</a></li>
                                <li class="nav-item"><a class="nav-link" href="Enroll.php">ADMISSION</a></li>
                                <li class="nav-item"><a class="nav-link" href="Features.php">ABOUT US</a></li>
                                <li class="nav-item"><a class="nav-link" href="../index.php#contact">FAQs</a></li>
                                <li class="nav-item">
                                    <a href="../auth/login.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Log In</a>
                                </li>
                            </ul>
                        </div>
                </nav>
                </div>
            </div>
        </div>
    </div>
    </br>
    </br>
<header id="home">
  <div class="container text-center mt-5">

    <div class="img-holder mt-4">
    </br>
      <img src="../images/ASLYLOGO3.png" alt="Asly" class="img-fluid" style="max-width: 250px;">
    </div>
  </div>
</header>

<style>
#home {
  height: 70vh; /* trimmed height but still full width */
  background: url('../images/grad.jfif') no-repeat center center / cover;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}

/* optional: make text readable if background is bright */
#home::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 74vh;
  background: rgba(0, 0, 0, 0.3); /* dark overlay */
  z-index: 0;
}

#home * {
  position: relative;
  z-index: 1;
}
</style>


        <div class="container my-5">
        <h1 style="color: #1b7420; text-align: center;">What we offer</h1>
        <br>
        <div class="row justify-content-center row-cols-1 row-cols-md-3 g-4">

            <!-- Card 1 -->
            <div class="col">
                <a href="empowering.php" class="text-decoration-none">
                    <div class="card h-100 hover-scale text-center gradient-bg border-0">
                        <img src="../images/asd.jpg" class="card-img-top rounded-top-4" alt="Central Sterile Processing Technology">
                        <div class="card-body">
                            <h5 class="card-title">Empowering Students Through Technology: Hands-On Computer Learning at Asly International College Inc.</h5>
                            <p class="card-text">In today’s fast-paced digital world, understanding technology isn’t just an advantage — it’s a necessity. At Asly International College Inc., we believe that learning should go beyond textbooks and theories. That’s why our computer-related courses are designed to give students real, hands-on experience using modern computer systems and software tools used by professionals today.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="col">
                <a href="precision.php" class="text-decoration-none">
                    <div class="card h-100 hover-scale text-center gradient-bg border-0">
                        <img src="../images/asds.avif" class="card-img-top rounded-top-4" alt="Central Sterile Services">
                        <div class="card-body">
                            <h5 class="card-title">Why Asly International College Leads in Central Sterile Services Education</h5>
                            <p class="card-text">At Asly International College Inc., our Central Sterile Services program equips students with the knowledge and hands-on training to become essential members of the healthcare team — the unseen professionals who make every operation possible</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="col">
                <a href="building.php" class="text-decoration-none">
                    <div class="card h-100 hover-scale text-center gradient-bg border-0">
                        <img src="../images/asd1.jpg" class="card-img-top rounded-top-4" alt="Computer Systems Servicing">
                        <div class="card-body">
                            <h5 class="card-title">Building the Future, One Website at a Time: Web Development at Asly International College Inc.</h5>
                            <p class="card-text">In today’s digital age, almost everything happens online — from communication and education to shopping and business. Behind every beautiful, functional website is a skilled web developer who brings ideas to life through creativity and code.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 4 -->
            <div class="col">
                <a href="mastering.php" class="text-decoration-none">
                    <div class="card h-100 hover-scale text-center gradient-bg border-0">
                        <img src="../images/12345.jpg" class="card-img-top rounded-top-4" alt="Web Development NC III">
                        <div class="card-body">
                            <h5 class="card-title">Asly International College Inc.: Advancing Java Programming NC III Training in San Jose del Monte, Bulacan</h5>
                            <p class="card-text">Behind every innovative app or digital solution is a skilled programmer who turns ideas into reality.
At Asly International College Inc., our Java Programming NC III program trains students to become proficient coders and problem solvers — the creative minds who power today’s technology and shape the future of software development.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 5 -->
            <div class="col">
                <a href="powering.php" class="text-decoration-none">
                    <div class="card h-100 hover-scale text-center gradient-bg border-0">
                        <img src="../images/DSC_1055.jpg" class="card-img-top rounded-top-4" alt="Java Programming NC III">
                        <div class="card-body">
                            <h5 class="card-title">Powering Innovation: Why Good Computers Matter in Coding Education</h5>
                            <p class="card-text">In the digital world we live in today, computers are more than just tools — they’re the gateway to creativity, logic, and innovation. At Asly International College Inc., we believe that students deserve the best possible resources to develop their skills and bring their ideas to life. That’s why our computer laboratories are equipped with modern, high-performance computers designed to keep up with the fast-paced world of coding and technology.</p>
                        </div>
                    </div>
                </a>
            </div>
                        <div class="col">
                <a href="learning.php" class="text-decoration-none">
                    <div class="card h-100 hover-scale text-center gradient-bg border-0">
                        <img src="../images/pop.jpg" class="card-img-top rounded-top-4" alt="Java Programming NC III">
                        <div class="card-body">
                            <h5 class="card-title">Learning Beyond the Classroom: Embracing Alternative Learning at Asly International College Inc.</h5>
                            <p class="card-text">Education is not a one-size-fits-all journey — every learner has a unique story, pace, and goal. At Asly International College Inc., we believe that everyone deserves the opportunity to learn, grow, and succeed, no matter their background or circumstances. That’s why we proudly offer Alternative Learning Programs designed to make education more flexible, accessible, and meaningful.</p>   
                    </div>
                    </div>
                </a>
            </div>


        </div>
    </div>


    <!-- Additional CSS -->
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Knewave&display=swap" rel="stylesheet">

<style>
    /* --- Card Container Styles --- */
    .gradient-bg {
        background: linear-gradient(135deg, #e8f5e9, #f5fff7); /* soft green gradient */
        border-radius: 20px;
        color: #333;
        transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.5s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    .gradient-bg:hover {
        transform: translateY(-10px) scale(1.05);
        box-shadow: 0 15px 30px rgba(27, 116, 32, 0.3);
        background: linear-gradient(135deg, #d0f5d8, #f5fff7);
    }

    /* --- Title Styles --- */
    .card-body h5 {
        font-family: 'Knewave', cursive;
        font-weight: 900;
        color: #464646ff;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        text-shadow: 2px 2px 5px rgba(27, 116, 32, 0.3);
        margin-bottom: 10px;
        transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    .gradient-bg:hover .card-body h5 {
        color: #136617;
        text-shadow: 3px 3px 10px rgba(27, 116, 32, 0.4);
    }

    /* --- Paragraph Styles --- */
    .card-body p {
        color: #5b5b5b;
        font-size: 15px;
        line-height: 1.6;
        transition: color 0.3s ease;
    }

    .gradient-bg:hover .card-body p {
        color: #333;
    }

    /* --- Image --- */
    .card-img-top {
        object-fit: cover;
        height: 220px;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        transition: transform 0.4s ease;
    }

    .gradient-bg:hover .card-img-top {
        transform: scale(1.05);
    }
</style>


    <!-- Contact & Footer -->
    <div class="light-bg py-5">
        <div class="container">
            <div class="row align-items-center text-center text-lg-start">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h6 class="mb-3" style="color:#f9a825;">Contact Us</h6>
                    <p><span class="ti-location-pin mr-2"></span> City of San Jose Del Monte, Bulacan, Philippines</p>
                    <p><span class="ti-email mr-2"></span> <a href="mailto:admin.aici@edu.ph">admin.aici@edu.ph</a></p>
                    <p><span class="ti-headphone-alt mr-2"></span> 044-2400353</p>
                    <p><span class="ti-headphone-alt mr-2"></span> +63955-8523707</p>
                </div>
                <div class="col-lg-6" id="contact">
                    <div
                        class="social-icons d-flex justify-content-center justify-content-lg-end gap-3 flex-lg-row flex-column align-items-center align-items-lg-end">
                        <a href="https://www.facebook.com/edu.aitci"><span class="ti-facebook"></span></a>
                        <a href="https://twitter.com/edu_aitci"><span class="ti-twitter-alt"></span></a>
                        <a href="https://www.instagram.com/edu.aitci"><span class="ti-instagram"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="my-5 text-center">
        <p class="mb-2"><small>Copyright © Asly International College Inc. All Rights
                Reserved. (2025)</small></p>
        <small>
            <a href="#" class="m-2">PRESS</a>
            <a href="#" class="m-2">TERMS</a>
            <a href="#" class="m-2">PRIVACY</a>
        </small>
    </footer>

    <!-- jQuery and Bootstrap (Local JS) -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Plugins -->
    <script src="../js/owl.carousel.min.js"></script>

    <!-- Custom JS -->
    <script src="../js/script.js"></script>

</body>

</html>