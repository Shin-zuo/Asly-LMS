<?php
require 'config/database.php';

// Fetch education levels
$educationLevels = $conn->query("SELECT id, educationLevel FROM educationlevel");
?>
<html lang="en">
<!--

Page    : index / MobApp
Version : 1.0
Author  : Colorlib
URI     : https://colorlib.com

 -->

<head>
    <title>Asly International College Inc.</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="ASLYLOGO3.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Asly International College Inc.">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">

    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Main css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet">
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
      .text-decoration-none{
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
                        <a class="navbar-brand" href="#"><img src="images/AICI.png" class="img-fluid"
                                alt="logo"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span
                                class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link" href="index.php">HOME <span
                                            class="sr-only">(current)</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" href="index.php#features">FEATURES</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="index.php#gallery">GALLERY</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="index.php#enroll">ENROLL</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="index.php#contact">FAQs</a> </li>
                                <li class="nav-item"><a href="auth/login.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Log
                                        In</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- // end .section -->
     
  <!-- Blog Post Content -->
  <div class="container my-5 pt-5">
    <div class="row">
      <div class="col-md-9">
        <h1 class="fw-bold">Central Sterile Processing Technology</h1>
        <h2 class="fw-bold" style="color: black;">(2years Course)</h2>
        <!-- Picture Container before CSSD section -->
        <div class="container my-5">
          <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-center">
              <div style="width:900px; height:400px; overflow:hidden; border-radius:20px; box-shadow:0 4px 24px rgba(0,0,0,0.08); background:#fffef1; display:flex; align-items:center; justify-content:center;">
                <img src="images/images.jpg" alt="Central Sterile Services Banner" style="width:100%; height:100%; object-fit:cover; border-radius:20px;">
              </div>
            </div>
          </div>
        </div>
        <!-- Post Content -->
 <h2 id="AboutCSPT">Central Sterile Processing Technology (CSPT)</h2>

<p>The <strong>Central Sterile Processing Technology (CSPT)</strong> program is an advanced-level qualification that builds upon the foundational skills learned in <strong>Central Sterile Services (CSS)</strong>. It is designed to equip learners with both technical expertise and leadership abilities, preparing graduates for supervisory, managerial, and quality assurance roles within the sterile services field. By integrating practical sterilization skills with professional development in leadership and management, this program ensures that graduates can take on more responsible positions and contribute effectively to healthcare operations.</p>

<p>In addition to mastering advanced sterilization procedures, CSPT students receive comprehensive training in essential administrative and managerial competencies. These include:</p>

<ul style="color: #959094;">
  <li><strong>Departmental Management and Supervision</strong> – Learning how to oversee day-to-day operations of the CSSD, coordinate staff tasks, and maintain workflow efficiency.</li>
  <li><strong>Leadership and Staff Coordination</strong> – Developing skills to guide, motivate, and manage teams of sterile processing technicians, ensuring high standards of performance and accountability.</li>
  <li><strong>Inventory Control and Quality Assurance</strong> – Managing medical and surgical instruments, supplies, and equipment while implementing quality control measures to maintain compliance with healthcare standards.</li>
  <li><strong>Documentation, Recordkeeping, and Compliance</strong> – Maintaining accurate records of sterilization cycles, instrument tracking, and regulatory compliance to ensure safety, traceability, and accountability.</li>
  <li><strong>Risk Management and Patient Safety Systems</strong> – Identifying potential hazards, implementing preventive measures, and maintaining systems to enhance patient safety and infection control.</li>
</ul>

<p>This program is ideal for individuals aspiring to advance into senior or supervisory positions within healthcare facilities. Graduates are well-prepared for roles such as <strong>CSSD Supervisor</strong>, <strong>Sterile Processing Coordinator</strong>, or <strong>Infection Control Officer</strong>, where they oversee operations, enforce standards, and ensure that sterile processing practices meet the highest level of quality and patient safety.</p>

<h2 id="DifferenceCSS_CSPT">Difference Between Central Sterile Services (CSS) and Central Sterile Processing Technology (CSPT)</h2>

<p><strong>Central Sterile Services (CSS)</strong> is a foundational program that focuses on developing the knowledge, practical skills, and professional work ethics required of a Central Sterile Technician. It emphasizes the workflow and hands-on operations within the Central Sterile Supply Department (CSSD), including <strong>cleaning, disinfecting, sterilizing, and proper distribution</strong> of medical and surgical instruments. CSS prepares learners for entry-level roles in hospitals and healthcare facilities, where their work is critical for infection prevention and patient safety.</p>

<p>On the other hand, <strong>Central Sterile Processing Technology (CSPT)</strong> is an advanced program that goes beyond the technical aspects of sterilization. It incorporates supervisory, administrative, and management training, preparing graduates to take on leadership responsibilities within the CSSD. Students gain deeper expertise in <strong>quality assurance, inventory control, documentation, and staff supervision</strong>, equipping them for higher-level roles that oversee operations, enforce standards, and ensure compliance across the department.</p>

<p>In essence, <strong>CSS focuses on performing the work</strong>—ensuring that sterilization procedures are executed safely and effectively—while <strong>CSPT focuses on leading and managing the work</strong>—ensuring that processes, staff, and quality standards are maintained at a higher operational and strategic level. Both programs are essential for maintaining the highest standards of hospital sterilization, infection control, and patient safety, creating a seamless and efficient sterile services system within healthcare institutions.</p>

      </div>
      <div class="col-md-3">
        <aside style="position:sticky; top:80px; z-index:1020;">
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="card-title" style="color:#959094;">Course Links</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="sterile1.php" class="text-decoration-none active-course" style="font-size:1.1rem;">Central Sterile Processing Technology</a>
                  <ul class="list-unstyled ms-3">
                    <li><a href="#Functions" style="color:#959094; font-size:0.98rem; text-decoration:none;">Functions of CSSD</a></li>
                    <li><a href="#Importance" style="color:#959094; font-size:0.98rem; text-decoration:none;">Importance of Central Sterile Processing Technology</a></li>
    <style>
      .ms-3 a:hover {
        font-weight: bold;
      }
    </style>
                  </ul>
                </li>
                <li><a href="sterile2.php" class="text-decoration-none">Central Sterile Services</a></li>
                <li><a href="computer-systems.php" class="text-decoration-none">Computer Systems Servicing NC II</a></li>
                <li><a href="web-development.php" class="text-decoration-none">Web Development NC III</a></li>
                <li><a href="java-programming.php" class="text-decoration-none">Java Programming NC III</a></li>
              </ul>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>

<div class="light-bg py-5">
  <div class="container">
    <div class="row align-items-center text-center text-lg-start">
      <!-- Contact Info -->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <h6 class="mb-3" style="color:#f9a825;">Contact Us</h6>
        <p class="mb-2">
          <span class="ti-location-pin mr-2"></span>
         City of San Jose Del Monte, Bulacan, Philippines
        </p>
        <p class="mb-2">
          <span class="ti-email mr-2"></span>
          <a href="mailto:support@mobileapp.com">admin.aici@edu.ph</a>
        </p>
        <p class="mb-1">
          <span class="ti-headphone-alt mr-2"></span> 044-2400353
        </p>
        <p class="mb-0">
          <span class="ti-headphone-alt mr-2"></span> +63955-8523707
        </p>
      </div>

      <!-- Social Icons -->
      <div class="col-lg-6" id="contact">
                <div class="social-icons d-flex justify-content-center justify-content-lg-end gap-3 flex-lg-row flex-column align-items-center align-items-lg-end">
                    <a href="https://www.facebook.com/edu.aitci"><span class="ti-facebook"></span></a>
                    <a href="https://twitter.com/edu_aitci"><span class="ti-twitter-alt"></span></a>
                    <a href="https://www.instagram.com/edu.aitci"><span class="ti-instagram"></span></a>
                </div>
      </div>
    </div>
  </div>
</div>

    <!-- // end .section -->
    <footer class="my-5 text-center">
        <!-- Copyright removal is not prohibited! -->
        <p class="mb-2"><small>Copyright © Asly International College Inc. All Rights Reserved. (2025)</small></p>

        <small>
            <a href="#" class="m-2">PRESS</a>
            <a href="#" class="m-2">TERMS</a>
            <a href="#" class="m-2">PRIVACY</a>
        </small>
    </footer>

    <!-- JavaScript to dynamically load courses -->
    <script>
        document.getElementById('applyFor').addEventListener('change', function() {
            let educationId = this.value;

            fetch('functions/get_courses.php?educationId=' + educationId)
                .then(response => response.json())
                .then(data => {
                    let courseSelect = document.getElementById('course');
                    courseSelect.innerHTML = '<option value="" disabled selected>-- Select Course --</option>';
                    data.forEach(course => {
                        let option = document.createElement('option');
                        option.value = course.courseId;
                        option.textContent = course.courseCode + " - " + course.course;
                        courseSelect.appendChild(option);
                    });
                });
        });
    </script>

    <!-- jQuery and Bootstrap -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Plugins JS -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>

</body>

</html>
