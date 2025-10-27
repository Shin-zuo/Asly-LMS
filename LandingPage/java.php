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
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
<div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="../index.php">HOME</a></li>
        <li class="nav-item"><a class="nav-link" href="Gallery.php">BLOG</a></li>
        <li class="nav-item"><a class="nav-link" href="Enroll.php">ADMISSION</a></li>
        <li class="nav-item"><a class="nav-link" href="#">ABOUT US</a></li>
        <li class="nav-item"><a class="nav-link" href="../index.php#contact">FAQs</a></li>
        <li class="nav-item">
            <a href="../auth/login.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Log In</a>
        </li>
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
      <h1 class="fw-bold">Asly International College Inc.: Advancing Java Programming NC III Training in San Jose del Monte, Bulacan</h1>
      <p class="text-muted mt-3">
        Empowering future software developers through hands-on coding and real-world programming experience.
      </p>
    </div>

    <!-- Featured Image -->
    <div class="mb-4 text-center">
      <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?q=80&w=1600&auto=format&fit=crop"
           class="img-fluid rounded-4 shadow-sm"
           alt="Students learning Java programming at Asly International College Inc.">
    </div>

    <!-- Blog Content -->
    <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
      <p class="lead">
        As technology continues to shape the modern world, mastering programming languages has become a key to success.
        At <strong>Asly International College Inc.</strong> in <strong>San Jose del Monte, Bulacan</strong>,
        we take pride in offering <strong>Java Programming NC III</strong> — a TESDA-accredited course that equips students
        with the essential skills to build software, applications, and digital solutions that meet today’s global standards.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">💡 Why Choose Java Programming?</h3>
      <p>
        Java is one of the most powerful and widely used programming languages in the world.
        From web and mobile apps to enterprise systems, Java powers millions of applications used every day.
        Learning Java means gaining the versatility to work in various IT fields — whether in software development,
        data analytics, or systems integration.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">👨‍💻 Hands-On Training with Real Projects</h3>
      <p>
        The <strong>Java Programming NC III</strong> program at Asly International College Inc. focuses on practical, hands-on learning.
        Students write real code, solve logical problems, and create working applications throughout the course.
        By the time they graduate, they’ve already built a portfolio of projects that demonstrate their skills to potential employers.
      </p>

      <div class="text-center my-5">
        <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=1600&auto=format&fit=crop"
             class="img-fluid rounded-4 shadow-sm"
             alt="Students collaborating on Java projects at Asly International College">
      </div>

      <h3 class="mt-5 mb-3 fw-semibold">⚙️ Modern Facilities and Updated Curriculum</h3>
      <p>
        Our computer laboratories are equipped with up-to-date systems and IDEs, giving students an authentic software development environment.
        The curriculum covers object-oriented programming (OOP), algorithms, database management, and Java frameworks,
        ensuring that learners understand both the fundamentals and the advanced concepts of software engineering.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">🚀 Career Opportunities Await</h3>
      <p>
        Graduates of the Java Programming NC III course are ready to step into careers as
        <strong>junior programmers, software developers, or systems analysts</strong>.
        With the continuous demand for Java specialists in local and international markets,
        Asly students gain an advantage in both employment and freelancing opportunities.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">🎓 Building the Future of Technology in Bulacan</h3>
      <p class="mb-0">
        Asly International College Inc. remains dedicated to providing world-class technical education in Bulacan.
        Through programs like <strong>Java Programming NC III</strong>, we empower students to become innovative thinkers,
        problem solvers, and leaders in the IT industry — shaping a future where technology drives progress and opportunity for all.
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
