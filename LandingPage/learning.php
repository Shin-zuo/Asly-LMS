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
      <h1 class="fw-bold">Learning Beyond the Classroom: Embracing Alternative Learning at Asly International College Inc.</h1>
      <p class="text-muted mt-3">
        Redefining education through flexible, hands-on, and real-world learning experiences.
      </p>
    </div>

    <!-- Featured Image -->
    <div class="mb-4 text-center">
      <img src="https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?q=80&w=1600&auto=format&fit=crop"
           class="img-fluid rounded-4 shadow-sm"
           alt="Students engaged in alternative learning activities at Asly International College Inc.">
    </div>

    <!-- Blog Content -->
    <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
      <p class="lead">
        Education doesn’t only happen within the four walls of a classroom.
        At <strong>Asly International College Inc.</strong>, we believe that true learning extends into real experiences,
        personal growth, and community engagement. Through our <strong>Alternative Learning System (ALS)</strong> and innovative teaching methods,
        we empower students to learn in ways that best suit their goals, schedules, and individual learning styles.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">📚 What Is Alternative Learning?</h3>
      <p>
        Alternative learning provides flexible pathways for individuals who wish to complete their education or continue learning outside traditional settings.
        Whether students are balancing work, family, or personal responsibilities, ALS allows them to pursue education at their own pace — without compromising quality or opportunity.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">🎓 Asly’s Commitment to Inclusive Education</h3>
      <p>
        Asly International College Inc. proudly supports learners from all walks of life.
        Our programs are designed to be inclusive, ensuring that every student — regardless of background or circumstance —
        has access to meaningful, career-oriented education. We believe that education is a right, not a privilege.
      </p>

      <div class="text-center my-5">
        <img src="https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?q=80&w=1600&auto=format&fit=crop"
             class="img-fluid rounded-4 shadow-sm"
             alt="Alternative learning students collaborating at Asly International College">
      </div>

      <h3 class="mt-5 mb-3 fw-semibold">💡 Learning Through Experience</h3>
      <p>
        Our approach to alternative learning emphasizes practical experience and skill development.
        Students engage in community-based projects, hands-on activities, and real-world problem-solving
        that go beyond memorization — preparing them to apply knowledge in meaningful, impactful ways.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">🌏 Reaching Learners Anywhere</h3>
      <p>
        Asly’s use of technology makes learning accessible anytime and anywhere.
        Through blended learning, online resources, and flexible schedules,
        students can learn according to their own rhythm while staying connected with teachers and peers.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">🤝 Empowering Every Learner’s Journey</h3>
      <p class="mb-0">
        At <strong>Asly International College Inc.</strong>, we are more than an institution — we are a community of lifelong learners.
        Our <strong>Alternative Learning System</strong> is proof of our dedication to inclusivity, innovation, and empowerment.
        By embracing learning beyond the classroom, we help students build confidence, discover potential, and create brighter futures.
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
