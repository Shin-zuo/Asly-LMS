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
        <p>
In the Central Sterile Processing Technology (CSPT) program, students study a wide range of subjects that prepare them 
to become skilled professionals in the healthcare field. The curriculum begins with Microbiology and Infection Control, 
which teaches the science of microorganisms and the principles of preventing the spread of infection in medical settings. 
Students also take Decontamination and Cleaning, where they learn safe handling of surgical instruments and effective 
cleaning methods. Another key subject is sterilization technologies, focusing on the operation and validation of 
sterilization equipment such as autoclaves, ultrasonic cleaners, and other advanced systems. In Instrument Identification 
and Assembly, students develop the ability to recognize, sort, and properly assemble surgical instruments for different 
procedures. This is complemented by Packaging and Storage, which emphasizes the correct methods of wrapping, labeling,
and storing instruments to maintain sterility until use. The program also includes documentation and tracking, where 
students practice accurate record-keeping and the use of tracking systems to monitor sterile supplies. Finally, safety and 
compliance are covered to ensure that students understand and follow national and international standards such as OSHA, 
AAMI, CDC, and TESDA guidelines. Together, these subjects provide both theoretical knowledge and practical skills, preparing 
graduates for real-world responsibilities in hospitals and healthcare facilities.
        </p>
        <div id="Functions">
        <h2>Functions of CSSD</h2>
        <p>Functions of Central Sterile Processing Technology

The main function of Central Sterile Processing Technology is to ensure that all surgical instruments, medical devices, and equipment are safe, sterile, and ready for patient care. This role is crucial to preventing infections, supporting surgical teams, and maintaining the smooth operation of healthcare facilities.

Key functions include:
        <ul>
          <li>Decontamination and Cleaning – Receiving used medical instruments, removing contaminants such as blood or tissue, 
             and applying proper cleaning techniques to prepare them for sterilization.</li>
          <li>Sterilization of Instruments – Operating sterilization equipment such as autoclaves, gas sterilizers, and ultrasonic
             cleaners to destroy microorganisms and make instruments safe for reuse.</li>
          <li>Inspection and Assembly – Checking instruments for damage or wear, ensuring functionality, and assembling sets of 
             instruments required for specific surgical procedures.</li>
          <li>Packaging and Storage – Wrapping or packaging instruments according to standards, labeling them properly, and storing 
             them in sterile conditions until needed.</li>
          <li>Inventory Management—Maintaining accurate records, tracking instruments through barcoding or digital systems, and ensuring
             a consistent supply of sterile equipment.</li>
          <li>Distribution—Delivering sterile instruments and equipment to operating rooms, clinics, and other healthcare departments
            on time and in the correct condition.</li>
          <li>Compliance with Standards—Following strict infection control protocols and healthcare regulations (TESDA, DOH, OSHA, AAMI, CDC)
             to guarantee patient safety and institutional quality assurance.</li>  
          <li>Support for Patient Safety—Serving as the first line of defense against healthcare-associated infections by ensuring every
             tool used in medical care is safe and sterile.</li>
        </ul>
        </div>
        <h2 id="Importance">Importance of Central Sterile Processing Technology</h2>
        <p>
          Taking the Central Sterile Processing Technology (CSPT) course is highly important because it trains you for a critical role in the healthcare system. While doctors and nurses are often seen at the forefront of patient care, sterile processing technicians work behind the scenes to make sure that every surgical instrument and medical device is clean, safe, and ready to use. Without this role, surgeries and other medical procedures would carry a high risk of infection and complications.

        <h4 class="mt-4" style="color:#959094;">Functions of CSSD</h4>
        <p>
          Cleaning and decontaminating surgical instruments<br>
          Performing sterilization using steam, gas, or chemical methods<br>
          Packaging and labeling sterile items for storage<br>
          Distributing sterile equipment to operating rooms and wards
        </p>
        <h4 class="mt-4" style="color:#959094;">Importance of Central Sterile Processing Technology</h4>
        <p>
          By studying this course, you will understand the science of infection control, learn how to operate sterilization equipment, and gain the skills to handle medical instruments with precision. This ensures that you can directly contribute to patient safety and the smooth operation of hospitals and clinics.<br><br>
          The importance of this course also lies in the growing demand for sterile processing technicians worldwide. As healthcare facilities continue to expand, there is an increasing need for trained professionals who can ensure compliance with international safety standards. Graduating from this program not only gives you the technical expertise to support surgical teams but also provides career opportunities in hospitals, surgical centers, and other healthcare institutions locally and abroad.<br><br>
          In short, taking Central Sterile Processing Technology is important because it equips you with the knowledge and skills to protect patients, support healthcare workers, and build a stable career in the medical field.
        </p>
        </p>
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
