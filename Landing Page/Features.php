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
<header id="home">
  <div class="container text-center mt-5 position-relative">
    <div class="img-holder mt-4">
      <br>
      <img src="../images/ASLYLOGO3.png" alt="Asly" class="img-fluid" style="max-width: 250px;">
    </div>
  </div>

  <!-- Title at bottom-left -->
  <div class="who-we-are">
    <h1>Who We Are</h1>
  </div>
</header>

<style>
#home {
  position: relative;
  height: 70vh;
  background: url('../images/grad.jfif') no-repeat center center / cover;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  overflow: hidden;
}

/* dark overlay */
#home::before {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.3);
  z-index: 0;
}

/* keep logo centered */
#home .container {
  position: relative;
  z-index: 2;
}

/* bottom-left title — fixed position */
.who-we-are {
  position: absolute;
  bottom: 20px;
  left: 40px;
  color: #fff;
  z-index: 3;
  text-align: left;
}

.who-we-are h1 {
  font-size: 2.5rem;
  font-weight: 700;
  margin: 0;
  text-transform: uppercase;
  letter-spacing: 1px;
  text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
}

@media (max-width: 768px) {
  .who-we-are {
    left: 20px;
    bottom: 15px;
  }
  .who-we-are h1 {
    font-size: 1.8rem;
  }
}
</style>

<!-- ===== ABOUT US SECTION START ===== -->
<section class="about-us bg-light py-5">

  <!-- WHO WE ARE TITLE -->
  <div class="about-title text-center py-5">
    <h1 class="fw-bold display-5" style="color: #797977ff;">Who We Are</h1>
  </div>

  <!-- OUR STORY / HISTORY -->
  <div class="hero-section">
    <!-- Left Image -->
    <div class="hero-left">
      <img src="../images/DSC_1055.jpg" alt="About Asly" class="img-fluid">
    </div>

    <!-- Right Text -->
    <div class="hero-right p-5 bg-white">
      <h3 class="fw-semibold mb-3">📖 Our Story</h3>
      <p class="text-secondary">
        <strong>Asly International College Inc.</strong> is a progressive educational institution located in
        <strong>San Jose del Monte, Bulacan</strong>, committed to shaping the future of learners through
        modern, industry-aligned education. We provide programs that blend academic knowledge with practical experience,
        preparing students for real-world success in various fields — from healthcare and computer studies to technical and vocational careers. 
        <br><br>
        At Asly, we believe that learning should be both engaging and purposeful. Our goal is to empower students not only with technical skills but also with the confidence, creativity, and character needed to thrive in today’s fast-changing world. 
        Through hands-on training, innovative teaching methods, and a strong sense of community, we help every student discover their potential and turn their passion into a meaningful career. 
        Whether in classrooms, laboratories, or industry partnerships, Asly International College Inc. stands as a trusted pathway toward excellence and lifelong learning.
        <br><br>
        Beyond academics, we are dedicated to nurturing well-rounded individuals who value integrity, collaboration, and service. Our students are guided to think critically, act responsibly, and adapt to the demands of global industries. 
        We continuously enhance our curriculum and facilities to meet international standards, ensuring our graduates are competitive wherever their journey takes them. 
        <br><br>
        Asly International College Inc. is more than just a school — it is a community of dreamers, innovators, and achievers working together to build a better future. Through passion, purpose, and progress, we continue to redefine education in San Jose del Monte, Bulacan and beyond.
      </p>
    </div>
  </div>
<!-- ===== ABOUT US SECTION ===== -->
<section class="vision-mission-philosophy bg-white py-5">

  <!-- ===== ROW 1: VISION, MISSION, PHILOSOPHY ===== -->
  <div class="vision-mission-row d-flex flex-column flex-lg-row text-center text-lg-start">

    <!-- Vision -->
    <div class="vmp-box flex-fill p-5 border-end border-light col-md-4">
      <h2 class="fw-bold mb-3" style="color: #f9a825;">Our Vision</h2>
      <p class="text-secondary">
        To be a leading center of excellence in technical education, where learners grow through guided instruction,
        real-world practice, and technology-integrated learning — a school where education meets innovation for the
        digital age.
      </p>
    </div>

    <!-- Mission -->
    <div class="vmp-box flex-fill p-5 border-end border-light col-md-4">
      <h2 class="fw-bold mb-3" style="color: #f9a825;">Our Mission</h2>
      <p class="text-secondary mb-2">We are committed to:</p>
      <ul class="text-secondary list-unstyled mb-0">
        <li>• Inspiring learners through guided, hands-on instruction</li>
        <li>• Creating a supportive, student-centered learning environment</li>
        <li>• Embedding modern tools and technology in training</li>
        <li>• Promoting personal growth, work ethics, and career readiness</li>
      </ul>
    </div>

    <!-- Philosophy -->
    <div class="vmp-box flex-fill p-5 col-md-4">
      <h2 class="fw-bold mb-3" style="color: #f9a825;">Our Philosophy</h2>
      <p class="text-secondary">
        At AITCI, we believe that learning should be personal, practical, and powered by technology. We guide students
        with care and expertise, offering hands-on experiences in a supportive environment where curiosity, confidence,
        and growth are encouraged. We don’t just teach — we guide, inspire, and prepare learners for the digital age.
      </p>
    </div>
  </div>

  <!-- ===== ROW 2: CORE VALUES ===== -->
  <div class="text-center py-5 bg-light">
    <h2 class="fw-bold mb-3" style="color: #f9a825;">Our Core Values</h2>
    <p class="text-secondary mb-0">
      At AITCI, our core values guide everything we do — from how we teach, how we learn, and how we grow together.
      These principles form the foundation of our culture and reflect what we stand for as an institution.
    </p>
  </div>

  <!-- Each Core Value in its own row -->
  <div class="core-value-row p-5">
    <h3 class="fw-bold mb-2" style="color: #f9a825;">A – Aspire</h3>
    <p class="text-secondary mb-0">
      We strive for excellence in all aspects of teaching and learning, encouraging our students to dream big, push
      boundaries, and grow continuously.
    </p>
  </div>

  <div class="core-value-row bg-light p-5">
    <h3 class="fw-bold mb-2" style="color: #f9a825;">I – Integrity</h3>
    <p class="text-secondary mb-0">
      We uphold honesty, accountability, and respect in everything we do — shaping individuals with strong moral
      character and ethical foundations.
    </p>
  </div>

  <div class="core-value-row p-5">
    <h3 class="fw-bold mb-2" style="color: #f9a825;">T – Technology Integration</h3>
    <p class="text-secondary mb-0">
      We embrace innovation by combining modern technology with real-world instruction, ensuring students are ready for
      tomorrow’s digital challenges.
    </p>
  </div>

  <div class="core-value-row bg-light p-5">
    <h3 class="fw-bold mb-2" style="color: #f9a825;">C – Competent</h3>
    <p class="text-secondary mb-0">
      We prepare capable and confident learners who are not only knowledgeable but skilled in applying their learning in
      professional settings.
    </p>
  </div>

  <div class="core-value-row p-5">
    <h3 class="fw-bold mb-2" style="color: #f9a825;">I – Innovation</h3>
    <p class="text-secondary mb-0">
      We promote creativity and continuous improvement, encouraging new ideas that advance learning and drive progress
      within our institution.
    </p>
  </div>

  <!-- ===== ROW 3: OUR SERVICES ===== -->
  <div class="hero-section">
    <div class="hero-left">
      <img src="../images/services.jpg" alt="Our Services" class="img-fluid">
    </div>
    <div class="hero-right p-5 bg-white">
      <h3 class="fw-semibold mb-3">💼 Our Services</h3>
      <ul class="list-unstyled text-secondary">
        <li class="mb-3">✔ <strong>Computer Studies:</strong> Hands-on programs in <em>Web Development NC III</em> and <em>Java Programming NC III</em>.</li>
        <li class="mb-3">✔ <strong>Healthcare:</strong> TESDA-accredited <em>Central Sterile Services</em> program for aspiring medical professionals.</li>
        <li class="mb-3">✔ <strong>Technical Training:</strong> <em>Computer Systems Servicing NC II</em> for hardware and network enthusiasts.</li>
        <li class="mb-3">✔ <strong>Alternative Learning System (ALS):</strong> Providing education opportunities for out-of-school youth and adults.</li>
        <li>✔ <strong>Professional Development:</strong> Short courses and certifications designed to enhance employability and skills mastery.</li>
      </ul>
    </div>
  </div>

  <!-- ===== ROW 4: SOCIAL PROOF ===== -->
  <div class="hero-section flex-md-row-reverse">
    <div class="hero-left">
      <img src="../images/socialproof.jpg" alt="Social Proof" class="img-fluid">
    </div>
    <div class="hero-right p-5 bg-white">
      <h3 class="fw-semibold mb-3">🌟 Our Social Proof</h3>
      <p class="text-secondary">
        Over the years, <strong>Asly International College Inc.</strong> has proudly trained and produced skilled graduates 
        who now contribute to various industries both locally and abroad. Our commitment to excellence is reflected through:
      </p>
      <ul class="text-secondary list-unstyled">
        <li>🏅 TESDA-accredited NC II & NC III programs</li>
        <li>💻 Recognized excellence in computer and healthcare training</li>
        <li>👩‍🎓 High employability rates among graduates</li>
        <li>🤝 Partnerships with local businesses and training institutions</li>
        <li>🌏 A growing network of alumni succeeding across industries</li>
      </ul>
    </div>
  </div>

</section>
<!-- ===== END OF ABOUT US SECTION ===== -->

<style>
/* ===== Vision, Mission, Philosophy Layout ===== */
.vision-mission-row {
  display: flex;
  align-items: stretch;
  justify-content: center;
  width: 100%;
}

.vmp-box {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  height: 100%;
  min-height: 400px;
  box-sizing: border-box;
}

/* ===== Core Values Section ===== */
.core-value-row {
  text-align: center;
}

/* ===== Hero Sections (Services & Social Proof) ===== */
.hero-section {
  display: block;
}

.hero-left img {
  width: 100%;
  height: auto;
  display: block;
}

.about-us img {
  object-fit: cover;
  height: 300px;
}

/* ===== Large screens: side-by-side layout ===== */
@media (min-width: 1025px) {
  .hero-section {
    display: flex;
    align-items: stretch;
  }

  .hero-left,
  .hero-right {
    flex: 1;
  }

  .hero-left img {
    object-fit: cover;
    width: 100%;
    height: 100%;
  }
}

@media (max-width: 991px) {
  .vision-mission-row {
    flex-direction: column;
  }

  .vmp-box {
    border: none !important;
    border-bottom: 1px solid #eee;
    min-height: auto;
  }
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
