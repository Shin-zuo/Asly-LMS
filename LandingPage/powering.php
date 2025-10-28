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
      <h1 class="fw-bold">Powering Innovation: Why Good Computers Matter in Coding Education</h1>
      <p class="text-muted mt-3">
        How Asly International College Inc. equips students with the right technology for success.
      </p>
    </div>

    <!-- Featured Image -->
    <div class="mb-4 text-center">
      <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=1600&auto=format&fit=crop"
           class="img-fluid rounded-4 shadow-sm"
           alt="Students coding on computers in Asly International College Inc.">
    </div>

    <!-- Blog Content -->
    <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
      <p class="lead">
        In the world of programming, the quality of a student’s tools can make all the difference.
        At <strong>Asly International College Inc.</strong>, we understand that effective coding education requires more than just lessons — it requires <strong>reliable, high-performance computers</strong> that can handle the demands of modern development.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">💻 The Role of Technology in Learning</h3>
      <p>
        Coding is both an art and a science. Students need the speed and stability of well-equipped computers to write, test, and run programs efficiently.
        From simple applications to complex software projects, the right hardware ensures that learners can focus on logic and creativity, not technical limitations.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">⚙️ Asly’s Commitment to Quality Equipment</h3>
      <p>
        Our computer laboratories at Asly International College Inc. are powered by modern desktops with updated operating systems, high-speed processors, and professional software environments.
        These facilities are specifically designed to support the intensive requirements of courses like <strong>Java Programming NC III</strong> and <strong>Web Development NC III</strong>.
      </p>

      <div class="text-center my-5">
        <img src="https://images.unsplash.com/photo-1550439062-609e1531270e?q=80&w=1600&auto=format&fit=crop"
             class="img-fluid rounded-4 shadow-sm"
             alt="Modern computer lab setup at Asly International College Inc.">
      </div>

      <h3 class="mt-5 mb-3 fw-semibold">🚀 Empowering Students to Create Without Limits</h3>
      <p>
        By giving students access to powerful computers, Asly ensures that every learner can develop, design, and innovate without barriers.
        Whether building websites, mobile apps, or system programs, students are encouraged to explore and experiment freely — experiences that help them become confident and industry-ready professionals.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">🌐 Preparing for Real-World Challenges</h3>
      <p>
        In the professional tech world, efficiency and speed matter. Asly’s focus on strong computer infrastructure mirrors real workplace conditions,
        helping students gain the adaptability and technical discipline needed to succeed in IT careers both locally and internationally.
      </p>

      <h3 class="mt-5 mb-3 fw-semibold">🎯 Building a Foundation for Innovation</h3>
      <p class="mb-0">
        At <strong>Asly International College Inc.</strong>, we believe that innovation begins with the right tools.
        By investing in quality equipment and up-to-date technology, we empower students to transform ideas into functional digital solutions —
        preparing them to lead the next wave of innovation in the digital age.
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
