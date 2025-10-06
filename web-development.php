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
        <h1 class="fw-bold">Web Development</h1>
        <h2 class="fw-bold" style="color: black;">(NC III)</h2>
        <!-- Picture Container before CSSD section -->
        <div class="container my-5">
          <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-center">
              <div style="width:900px; height:400px; overflow:hidden; border-radius:20px; box-shadow:0 4px 24px rgba(0,0,0,0.08); background:#fffef1; display:flex; align-items:center; justify-content:center;">
                <img src="images/image4.jpg" alt="Central Sterile Services Banner" style="width:100%; height:100%; object-fit:cover; border-radius:20px;">
              </div>
            </div>
          </div>
        </div>
        <!-- Post Content -->
<p><strong>Web Development NC III</strong> is a TESDA-registered qualification designed to equip learners with the skills needed to <strong>create, develop, and maintain professional websites and web applications</strong>. This program covers both <strong>front-end development</strong>, which focuses on designing visually appealing and user-friendly interfaces, and <strong>back-end development</strong>, which ensures that websites are functional, secure, and capable of handling data and user interactions.</p>

<p>Through this course, students gain a strong foundation in programming languages, coding practices, and design principles that are essential for building responsive and interactive websites. Learners are also trained in industry-standard tools, frameworks, and technologies used by web developers worldwide, preparing them for real-world projects and professional opportunities.</p>

<p>More than just coding, the program emphasizes <strong>problem-solving, creativity, and innovation</strong>, allowing graduates to design websites that are not only technically sound but also engaging and aligned with client or business goals. Whether for companies, organizations, or personal projects, students will develop the ability to bring ideas to life online.</p>

<p>By completing this program, learners are prepared to pursue careers as <strong>web developers, web designers, UI/UX specialists, or freelance professionals</strong>, with skills that are in demand both locally and internationally.</p>



<h2 id="ProgramCoverage">Program Coverage and Competencies</h2>
<h5>Through hands-on training, learners will develop skills in:</h5>

<ul style="color: #959094;">
  <li><strong>Computer Hardware Servicing</strong> – Assembling, disassembling, and troubleshooting computer components efficiently.</li>
  <li><strong>Networking</strong> – Installing, configuring, and maintaining computer networks (LAN/WAN) for stable and secure connectivity.</li>
  <li><strong>Software Installation and Configuration</strong> – Installing operating systems, applications, and security software for optimal performance.</li>
  <li><strong>System Maintenance</strong> – Performing preventive and corrective maintenance on computers and peripherals to ensure longevity.</li>
  <li><strong>Technical Support</strong> – Providing customer service and technical assistance for ICT-related issues, troubleshooting problems effectively.</li>
</ul>

<h2 id="Career">Career Paths and Opportunities</h2>
<h5>Graduates of Java Programming NC III can pursue careers as:</h5>

<ul style="color: #959094;">
  <li><strong>Java Programmer / Software Developer</strong></li>
  <li><strong>Application Support Specialist</strong></li>
  <li><strong>Junior Java Developer</strong></li>
  <li><strong>Database Programmer</strong></li>
  <li><strong>IT Programmer</strong></li>
  <li><strong>Systems Analyst</strong></li>
  <li><strong>Software Tester / QA Specialist</strong></li>
</ul>

<p>They may also explore <strong>freelance opportunities</strong> in web application development, mobile app creation (especially Android), and enterprise software projects for both local and international clients.</p>

<p>They can work in IT companies, digital marketing agencies, corporate IT departments, or as freelancers serving clients worldwide.</p>
<h2 id="Certification">Certification and Recognition</h2>
<p>After completing the Web Development NC III program, trainees will have the opportunity to undergo the <strong>national assessment</strong> conducted by <strong>TESDA (Technical Education and Skills Development Authority)</strong>. This assessment evaluates their proficiency in essential web development skills, including <strong>front-end development</strong> using HTML, CSS, and JavaScript, <strong>back-end development</strong> with PHP and MySQL, <strong>database integration</strong>, <strong>content management system customization</strong> such as WordPress or Joomla, <strong>testing and debugging</strong> across multiple browsers and devices, and <strong>website deployment and maintenance</strong>. The assessment ensures that trainees have acquired both the technical knowledge and practical hands-on experience necessary to meet industry standards in professional web development.</p>

<p>Those who successfully pass the assessment will be awarded the <strong>National Certificate III (NC III)</strong>, a credential that is <strong>recognized locally and internationally</strong> as proof of competence and readiness in the ICT industry. This certification is acknowledged by TESDA’s partner organizations, IT companies, digital agencies, and freelance clients, giving graduates credibility and validation of their web development expertise. It demonstrates that they are fully capable of handling complex web development projects, providing technical support, and contributing effectively in professional environments.</p>

<p>Holding the <strong>NC III certification</strong> enhances a graduate’s <strong>employability and professional reputation</strong>, giving them a competitive edge in securing roles such as <strong>front-end developer</strong>, <strong>back-end developer</strong>, <strong>full-stack developer</strong>, <strong>web designer</strong>, <strong>CMS developer/administrator</strong>, or as an independent <strong>freelance web developer</strong>. Additionally, the certification provides a strong foundation for pursuing <strong>advanced ICT qualifications</strong> or further studies in web technologies, empowering graduates to continuously grow in their careers and stay updated with evolving industry standards.</p>

<h2 id="WhyEnroll">Why Enroll in This Program?</h2>
<h5>The Web Development NC III program is ideal for those who want to:</h5>

<p>Start a career in the fast-growing <strong>web development industry</strong>, gaining expertise in designing, building, and maintaining modern websites and applications. By enrolling in this program, you will acquire <strong>hands-on skills</strong> in both <strong>front-end and back-end development</strong>, enabling you to create responsive, user-friendly, and professional web solutions that meet industry standards.</p>

<p>This program prepares you to work as a <strong>front-end developer</strong>, <strong>back-end developer</strong>, <strong>full-stack developer</strong>, <strong>web designer</strong>, or <strong>CMS administrator</strong>. These competencies are highly valued by <strong>IT companies</strong>, <strong>digital marketing agencies</strong>, and <strong>corporate IT departments</strong>, and they also provide opportunities for <strong>freelance work serving global clients</strong>.</p>

<p>Additionally, <strong>Web Development NC III</strong> empowers learners interested in <strong>entrepreneurship</strong> or building their own online presence. Whether you aim to launch a <strong>personal website</strong>, develop <strong>e-commerce platforms</strong>, or create <strong>digital solutions for small businesses</strong>, this program equips you with the <strong>practical skills and technical confidence</strong> to bring your ideas to life and succeed in the digital marketplace.</p>

<p>By completing this program, you gain a <strong>competitive edge</strong> in the ICT workforce, develop <strong>professional confidence</strong>, and open doors to a variety of <strong>career paths</strong> in the rapidly evolving technology-driven world. It is not only about mastering coding and web design—it is about preparing yourself for a <strong>future filled with opportunities</strong>, <strong>growth</strong>, and <strong>success in the web development field</strong>.</p>

      </div>
      <div class="col-md-3">
        <aside style="position:sticky; top:80px; z-index:1020;">
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="card-title" style="color:#959094;">Course Links</h5>
              <ul class="list-unstyled">
                <li><a href="sterile1.php" class="text-decoration-none">Central Sterile Processing Technology</a></li>
                <li><a href="sterile2.php" class="text-decoration-none">Central Sterile Services</a></li>
                <li><a href="computer-systems.php" class="text-decoration-none">Computer Systems Servicing NC II</a></li>
                <li>
                  <a href="web-development.php" class="text-decoration-none active-course" style="font-size:1.1rem;">Web Development NC III</a>
                  <ul class="list-unstyled ms-3">
                    <li><a href="#ProgramCoverage" style="color:#959094; font-size:0.98rem; text-decoration:none;">Program Coverage and Competencies</a></li>
                    <li><a href="#Career" style="color:#959094; font-size:0.98rem; text-decoration:none;">Career Paths and Opportunities</a></li>
                     <li><a href="#Certification" style="color:#959094; font-size:0.98rem; text-decoration:none;">Certification and Recognition</a></li>
                    <li><a href="#WhyEnroll" style="color:#959094; font-size:0.98rem; text-decoration:none;">Why Enroll in this Program?</a></li>
                  </ul>
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
