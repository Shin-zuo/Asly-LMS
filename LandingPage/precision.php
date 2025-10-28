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
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link" href="../index.php">HOME</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="Gallery.php">BLOG</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="Enroll.php">ADMISSION  </a> </li>
                                <li class="nav-item"> <a class="nav-link" href="Features.php">ABOUT US</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="../index.php#contact">FAQs</a> </li>
                                <li class="nav-item"><a href="../auth/login.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Log
                                        In</a></li>
                            </ul>
                        </div>

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
    </br>

<!-- ===== BLOG BODY START ===== -->
<section class="py-5 bg-light">
  <div class="container">
    <!-- Header -->
    <div class="text-center mb-5">
      <h1 class="fw-bold">Why Asly International College Leads in Central Sterile Services Education</h1>
      <p class="text-muted mt-3">
        Building the next generation of skilled healthcare professionals through hands-on training and world-class education.
      </p>
    </div>

    <!-- Featured Image -->
    <div class="mb-4 text-center">
      <img src="https://images.unsplash.com/photo-1629909613654-27d71eb0585a?q=80&w=1600&auto=format&fit=crop" 
           class="img-fluid rounded-4 shadow-sm" alt="Central Sterile Services Training at Asly International College">
    </div>

    <!-- Blog Content -->
    <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
      <p class="lead">
        In the evolving world of healthcare, few roles are as crucial yet underappreciated as those in 
        <strong>Central Sterile Services</strong>. Every surgical instrument, medical tray, and reusable device that touches a patient
        must first pass through the hands of skilled sterilization professionals. At 
        <strong>Asly International College Inc.</strong>, we take pride in being one of the few schools in the Philippines that offers
        this specialized and in-demand program.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">🎯 Training the Unsung Heroes of Healthcare</h3>
      <p>
        Central Sterile professionals play a vital role in preventing infection and ensuring patient safety.
        Through our <strong>Central Sterile Services course</strong>, students learn the science and precision behind sterilization techniques,
        instrument processing, and quality assurance in healthcare facilities.
        Our curriculum blends theory with hands-on training — allowing students to experience real sterilization setups,
        handle medical tools, and practice using modern autoclave and disinfection equipment.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">🧠 Quality Education and Industry-Standard Facilities</h3>
      <p>
        Asly International College ensures that learning goes beyond the classroom.
        Our state-of-the-art training laboratories are designed to simulate real hospital environments,
        giving students the confidence and skills needed in actual clinical settings.
        With guidance from certified instructors and experienced healthcare professionals,
        learners gain not only knowledge but also the discipline and attention to detail that the profession demands.
      </p>

      <div class="text-center my-5">
        <img src="https://images.unsplash.com/photo-1629904853694-1c6e0e08f2e3?q=80&w=1600&auto=format&fit=crop"
             class="img-fluid rounded-4 shadow-sm" alt="Healthcare students in training">
      </div>

      <h3 class="mt-5 mb-3 fw-semibold">👩‍⚕️ Preparing Students for a Global Career</h3>
      <p>
        Graduates of the Central Sterile Services program are in demand both locally and abroad.
        Hospitals, surgical centers, and healthcare institutions continuously seek competent sterile processing technicians
        who can uphold high standards of infection control. At Asly International College, we prepare our students for
        <strong>local employment and international opportunities</strong>, giving them a strong foundation to pursue a fulfilling career in healthcare.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">💻 Beyond Healthcare: Expanding Opportunities</h3>
      <p>
        While Central Sterile Services remains one of our flagship programs, Asly International College also offers a range of
        <strong>computer-related and technical courses</strong> — empowering students to succeed in the fast-growing fields of
        information technology, web development, and digital innovation. Our diverse course offerings make Asly a hub for
        students seeking both medical and technical career paths.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">🌟 Committed to Excellence</h3>
      <p class="mb-0">
        At the heart of Asly International College Inc. is a commitment to 
        <strong>academic excellence, practical training, and holistic student development</strong>.
        We believe that education should empower students not just with skills, but with purpose —
        to serve their communities, uplift the healthcare system, and make a difference wherever they go.
      </p>
    </div>
  </div>
</section>
<!-- ===== BLOG BODY END ===== -->


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
