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
        <li class="nav-item"><a class="nav-link" href="Features.php">ABOUT US</a></li>
        <li class="nav-item"><a class="nav-link" href="FAQs.php">FAQs</a></li>
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
<!-- ===== BLOG BODY START ===== -->
<section class="py-5 bg-light">
  <div class="container">
    <!-- Header -->
    <div class="text-center mb-5">
      <h1 class="fw-bold">Asly International College Inc.: The Only School Offering Web Development NC III in San Jose del Monte, Bulacan</h1>
      <p class="text-muted mt-3">
        Leading the way in digital education and hands-on computer training in CSJDM.
      </p>
    </div>

    <!-- Featured Image -->
    <div class="mb-4 text-center">
      <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=1600&auto=format&fit=crop"
           class="img-fluid rounded-4 shadow-sm"
           alt="Students learning web development at Asly International College Inc.">
    </div>

    <!-- Blog Content -->
    <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
      <p class="lead">
        In the fast-growing city of <strong>San Jose del Monte, Bulacan</strong>, opportunities in technology are expanding — and <strong>Asly International College Inc.</strong> proudly leads the way.
        As the <strong>only school in CSJDM that offers Web Development NC III training</strong>, Asly is committed to helping students master the digital skills needed to thrive in today’s online world.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">💻 Pioneering Web Development Training in CSJDM</h3>
      <p>
        The <strong>Web Development NC III</strong> program at Asly International College Inc. is designed to equip learners with both technical knowledge and real-world experience.
        From designing responsive websites to developing functional web applications, students gain the skills that employers in the tech industry are looking for.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">🖥️ Hands-On Learning with Modern Tools</h3>
      <p>
        At Asly, learning happens beyond the classroom. Our computer laboratories are equipped with the latest technology and software tools used by professionals.
        Students are trained in HTML, CSS, JavaScript, PHP, and modern frameworks — all while working on real projects that prepare them for the fast-paced web development industry.
      </p>

      <div class="text-center my-5">
        <img src="https://images.unsplash.com/photo-1484417894907-623942c8ee29?q=80&w=1600&auto=format&fit=crop"
             class="img-fluid rounded-4 shadow-sm"
             alt="Web development students collaborating on projects">
      </div>

      <h3 class="mt-5 mb-3 fw-semibold">🌐 Empowering Local Talent for Global Opportunities</h3>
      <p>
        Web developers are in demand across the world — and Asly International College Inc. ensures that students from Bulacan can compete globally while building strong foundations locally.
        With TESDA-accredited training and a curriculum aligned with industry needs, graduates are equipped to pursue careers as web designers, front-end or back-end developers, or freelance professionals.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">🎯 A Commitment to Accessible, Quality Education</h3>
      <p>
        As the <strong>sole provider of Web Development NC III in San Jose del Monte</strong>, Asly takes pride in making quality technical education accessible to every aspiring developer.
        Our goal is to empower students — not only to build websites but to build their future in technology.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">🚀 Shaping the Future of Digital Innovation in Bulacan</h3>
      <p class="mb-0">
        With technology continuously evolving, Asly International College Inc. remains committed to updating its programs and resources.
        The college stands as a beacon of innovation in CSJDM, nurturing the next generation of Filipino web developers who will shape the digital world of tomorrow.
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
