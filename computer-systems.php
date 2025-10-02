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
        <h1 class="fw-bold">Computer System Servicing</h1>
        <h2 class="fw-bold" style="color: black;">(NC II)</h2>
        <!-- Picture Container before CSSD section -->
        <div class="container my-5">
          <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-center">
              <div style="width:900px; height:400px; overflow:hidden; border-radius:20px; box-shadow:0 4px 24px rgba(0,0,0,0.08); background:#fffef1; display:flex; align-items:center; justify-content:center;">
                <img src="images/image3.jpg" alt="Central Sterile Services Banner" style="width:100%; height:100%; object-fit:cover; border-radius:20px;">
              </div>
            </div>
          </div>
        </div>
        <!-- Post Content -->
<p><strong>Computer System Servicing NC II (CSS NC II)</strong> is a TESDA-accredited technical-vocational course that trains students to install, configure, maintain, and repair computer systems and networks. The "NC II" means <strong>National Certificate Level II</strong>, which is a certification issued by TESDA to confirm that a graduate has met the national competency standards for this field.</p>

<p>This course focuses on giving students <strong>practical, hands-on skills</strong> in areas such as assembling and disassembling computers, installing operating systems and software, setting up and troubleshooting computer networks, and maintaining computer hardware and peripherals. It also includes lessons on safety procedures and proper documentation of technical work.</p>

<p>In simple terms, Computer System Servicing NC II prepares learners to become <strong>competent computer technicians</strong> who can work in schools, offices, businesses, and service centers. It provides them with both the technical know-how and the certification needed for employment or entrepreneurship in the ICT (Information and Communications Technology) industry.</p>

<p>With the rapid growth of technology and the increasing demand for skilled IT professionals, taking this course gives learners a strong advantage and opens doors to both local and international opportunities in the ICT sector.</p>



        <h2 id="Skills">Skills You'll Gain</h2>
        <h5>Learners under CSS NC II will gain practical knowledge and hands-on skills in areas such as</h5>
        <ul style="color: #959094;">
          <li><strong>Computer Hardware Servicing</strong> – Assembling, disassembling, and troubleshooting computer components.</li>
          <li><strong>Networking</strong> – Installing, configuring, and maintaining computer networks (LAN/WAN).</li>
          <li><strong>Software Installation and Configuration</strong> – Installing operating systems, applications, and security software.</li>
          <li><strong>System Maintenance</strong> – Performing preventive and corrective maintenance of computers and peripherals.</li>
          <li><strong>Technical Support </strong> – Providing customer service and technical assistance for ICT-related issues.</strong></li>
        </ul>
<h2 id="Career">Career Paths and Opportunities</h2>
<h5>Graduates of CSS NC II can work as:</h5>
<ul style="color: #959094;">
  <li><strong>Computer Technician</strong></li>
  <li><strong>Network Support Technician</strong></li>
  <li><strong>Technical Support Specialist</strong></li>
  <li><strong>IT Service Crew</strong></li>
  <li><strong>Computer Hardware Servicing Professional</strong></li>
</ul>

        <h2 id="Certification">Certification and Achievements</h2>
       <p>Upon completing the program, learners will have the opportunity to take the <strong>national assessment</strong> conducted by <strong>TESDA (Technical Education and Skills Development Authority)</strong>. This assessment evaluates the learners’ mastery of the technical and practical skills they acquired during the course, including <strong>computer hardware servicing</strong>, <strong>software installation</strong>, <strong>networking</strong>, <strong>system maintenance</strong>, and <strong>troubleshooting</strong>.</p>

<p>Those who successfully pass the assessment will be awarded the <strong>National Certificate II (NC II)</strong>, a credential that is <strong>recognized nationwide</strong> as proof of competency and professional readiness. This certification is also acknowledged by TESDA’s partner institutions, organizations, and companies, ensuring that graduates meet <strong>industry standards</strong> and are fully qualified to perform IT-related tasks in a professional environment.</p>

<p>Holding the <strong>NC II certification</strong> not only validates your <strong>technical expertise</strong> but also enhances your <strong>employability</strong>, giving you a competitive advantage in the job market. It opens doors to a wide range of career opportunities <strong>locally and abroad</strong>, whether as a <strong>computer technician</strong>, <strong>network support specialist</strong>, <strong>technical support professional</strong>, or <strong>IT entrepreneur</strong>. Furthermore, it serves as a strong foundation for pursuing <strong>higher-level certifications</strong> or further education in <strong>information and communications technology (ICT)</strong>, empowering graduates to continually grow in their chosen careers.</p>

      <h2 id="WhyEnroll">Why Enroll in This Program?</h2>
  <p>The <strong>Computer Systems Servicing NC II (CSS NC II)</strong> program is an excellent choice for students, graduates, and professionals who want to develop a strong foundation in <strong>information and communications technology (ICT)</strong>. By enrolling in this program, you will acquire <strong>hands-on, practical skills</strong> that are highly sought after in today’s <strong>digital world</strong>.</p>

<p>This program prepares you to build a <strong>rewarding career in the ICT industry</strong>, equipping you with the <strong>knowledge</strong> and <strong>technical expertise</strong> needed to work as a <strong>computer technician</strong>, <strong>network support specialist</strong>, <strong>technical support professional</strong>, or <strong>IT service crew member</strong>. These skills are not only applicable in <strong>local businesses</strong> but are also <strong>recognized internationally</strong>, providing opportunities for <strong>overseas employment</strong>.</p>

<p>Additionally, <strong>CSS NC II</strong> empowers learners who are interested in <strong>entrepreneurship</strong> or starting their own <strong>IT-related business</strong>. Whether you dream of running a <strong>computer repair shop</strong>, offering <strong>technical support services</strong>, or providing <strong>network setup solutions</strong> for small businesses, this program gives you the <strong>practical know-how</strong> to confidently launch and manage your own venture.</p>

<p>By completing this program, you gain a <strong>competitive edge</strong> in the workforce, develop <strong>professional confidence</strong>, and open doors to a variety of <strong>career paths</strong> in an ever-growing <strong>technology-driven world</strong>. It is not just about learning technical skills—it is about preparing yourself for a <strong>future of opportunities</strong>, <strong>growth</strong>, and <strong>success in the ICT field</strong>.</p>

      </div>
      <div class="col-md-3">
        <aside style="position:sticky; top:80px; z-index:1020;">
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="card-title" style="color:#959094;">Course Links</h5>
              <ul class="list-unstyled">
                <li><a href="sterile1.php" class="text-decoration-none">Central Sterile Processing Technology</a></li>
                <li><a href="sterile2.php" class="text-decoration-none">Central Sterile Services</a></li>
                <li>
                  <a href="computer-systems.php" class="text-decoration-none active-course" style="font-size:1.1rem;">Computer Systems Servicing NC II</a>
                  <ul class="list-unstyled ms-3">
                    <li><a href="#Skills" style="color:#959094; font-size:0.98rem; text-decoration:none;">Skills You'll Gain</a></li>
                    <li><a href="#Career" style="color:#959094; font-size:0.98rem; text-decoration:none;">Career path and Opportunities</a></li>
                     <li><a href="#Certification" style="color:#959094; font-size:0.98rem; text-decoration:none;">Certification and Achievements</a></li>
                    <li><a href="#WhyEnroll" style="color:#959094; font-size:0.98rem; text-decoration:none;">Why Enroll in this Program?</a></li>
                  </ul>
                </li>
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
