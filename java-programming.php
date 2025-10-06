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
        <h1 class="fw-bold">Java-Programming</h1>
        <h2 class="fw-bold" style="color: black;">(NC III)</h2>
        <!-- Picture Container before CSSD section -->
        <div class="container my-5">
          <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-center">
              <div style="width:900px; height:400px; overflow:hidden; border-radius:20px; box-shadow:0 4px 24px rgba(0,0,0,0.08); background:#fffef1; display:flex; align-items:center; justify-content:center;">
                <img src="images/image5.png" alt="Central Sterile Services Banner" style="width:100%; height:100%; object-fit:cover; border-radius:20px;">
              </div>
            </div>
          </div>
        </div>
        <!-- Post Content -->
<p><strong>Java Programming NC III</strong> is a TESDA-registered qualification designed to equip learners with the knowledge and hands-on skills needed to <strong>develop, test, and maintain Java-based applications and systems</strong>. This program focuses on <strong>object-oriented programming (OOP)</strong> principles, empowering students to build robust, efficient, and scalable software solutions used in real-world business, education, and technology environments.</p>

<p>The course provides comprehensive training in <strong>Java syntax, programming structures, and advanced coding techniques</strong> that are essential for creating both desktop and enterprise-level applications. Learners are introduced to <strong>integrated development environments (IDEs)</strong>, database connectivity, and modern frameworks, giving them the tools needed to develop programs that meet industry standards and client requirements.</p>

<p>Beyond technical coding skills, students are also taught <strong>problem-solving, analytical thinking, and software design methodologies</strong>. They learn how to apply Java in areas such as <strong>web development, mobile app creation (Android), and enterprise systems integration</strong>, ensuring that their skills remain versatile and adaptable in today’s fast-changing IT landscape.</p>

<p>Throughout the program, learners gain exposure to <strong>real-world projects and collaborative development environments</strong>, preparing them to work effectively in teams and adapt to professional software development practices. Emphasis is also placed on writing clean, reusable, and well-documented code that enhances both functionality and maintainability.</p>

<p>By completing this qualification, graduates will be prepared to pursue careers as <strong>Java developers, software engineers, application programmers, or systems analysts</strong>. With skills recognized both locally and internationally, they will be capable of designing and implementing innovative Java-based solutions that drive digital transformation across various industries.</p>

<h2 id="ProgramCoverage">Program Coverage and Competencies</h2>
<h5>Through hands-on training, learners will develop skills in:</h5>

<ul style="color: #959094;">
  <li><strong>Object-Oriented Programming (OOP)</strong> – Applying core concepts such as classes, objects, inheritance, encapsulation, and polymorphism to create modular and reusable code.</li>
  <li><strong>Java Fundamentals</strong> – Understanding Java syntax, data types, control structures, methods, and exception handling to build reliable applications.</li>
  <li><strong>Graphical User Interface (GUI) Development</strong> – Designing and developing interactive and user-friendly interfaces using Java frameworks like JavaFX or Swing.</li>
  <li><strong>Database Integration</strong> – Connecting applications to databases such as MySQL or Oracle using JDBC for data-driven functionality and management.</li>
  <li><strong>Application Development</strong> – Creating, testing, and deploying both stand-alone and client-server applications that meet business and user requirements.</li>
  <li><strong>Debugging and Documentation</strong> – Identifying and resolving code errors, optimizing performance, and maintaining proper software documentation and version control.</li>
  <li><strong>Software Design and Problem-Solving</strong> – Applying logical and analytical approaches to design effective, efficient, and scalable Java-based solutions.</li>
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

<h2 id="Certification">Certification and Recognition</h2>
<p>Upon completing the <strong>Java Programming NC III</strong> program, trainees will have the opportunity to undergo the <strong>national competency assessment</strong> administered by the <strong>Technical Education and Skills Development Authority (TESDA)</strong>. This assessment measures the learner’s ability to apply core Java programming concepts, such as <strong>object-oriented programming (OOP)</strong>, <strong>application development</strong>, <strong>database integration</strong>, <strong>GUI creation</strong>, and <strong>software testing</strong>. It ensures that students are not only knowledgeable in theory but also capable of performing practical tasks aligned with current industry standards.</p>

<p>The evaluation process simulates real-world programming scenarios, allowing trainees to demonstrate their competence in designing, developing, debugging, and maintaining Java-based software solutions. It also covers essential skills such as <strong>code optimization</strong>, <strong>problem-solving</strong>, and <strong>documentation</strong>—key competencies required in today’s professional software development environments. The assessment verifies a learner’s readiness to contribute effectively to projects involving desktop, web, or enterprise-level Java applications.</p>

<p>Candidates who successfully pass the assessment will be awarded the <strong>National Certificate III (NC III)</strong> in Java Programming, a credential that is <strong>nationally and internationally recognized</strong> as proof of technical expertise and job readiness in the IT and software development fields. This certification enhances the credibility of graduates when applying for roles in <strong>software companies</strong>, <strong>IT departments</strong>, <strong>digital solution providers</strong>, and <strong>global outsourcing firms</strong>.</p>

<p>Holding the <strong>NC III certification</strong> greatly increases a graduate’s <strong>career opportunities and professional standing</strong>. It signifies mastery of Java programming skills, adherence to best coding practices, and competence in developing real-world software solutions. Graduates with this certification are well-prepared to pursue positions such as <strong>Java developer</strong>, <strong>software engineer</strong>, <strong>application programmer</strong>, or <strong>systems analyst</strong>. Moreover, it serves as a solid foundation for advancing into higher-level IT specializations or continuing studies in <strong>software engineering</strong>, <strong>mobile development</strong>, or <strong>enterprise systems</strong>.</p>

<p>With the <strong>TESDA-recognized NC III credential</strong>, graduates not only validate their programming proficiency but also gain a competitive edge in the rapidly growing technology sector—both in the Philippines and abroad. This certification empowers them to confidently take on complex programming tasks, deliver quality software products, and continuously grow as skilled professionals in the global IT industry.</p>
<h2 id="WhyEnroll">Why Enroll in This Program?</h2>
<h5>The Java Programming NC III program is ideal for those who want to:</h5>

<p>Begin a rewarding career in the dynamic world of <strong>software development</strong>, gaining in-depth knowledge and practical experience in <strong>object-oriented programming (OOP)</strong> using Java technology. By enrolling in this program, learners will develop <strong>hands-on skills</strong> in designing, coding, testing, and maintaining robust software applications that meet the demands of today’s IT industry.</p>

<p>This program prepares learners for roles such as <strong>Java developer</strong>, <strong>software engineer</strong>, <strong>application programmer</strong>, or <strong>systems analyst</strong>. The skills acquired through this qualification are highly sought after by <strong>IT companies</strong>, <strong>software development firms</strong>, <strong>business process outsourcing (BPO) organizations</strong>, and <strong>corporate IT departments</strong> worldwide. Graduates can also take advantage of <strong>freelance and remote work opportunities</strong> in web, desktop, or mobile application development.</p>

<p>Additionally, <strong>Java Programming NC III</strong> is an excellent choice for individuals who want to <strong>upgrade their technical skills</strong> or pursue a <strong>career transition into software engineering</strong>. Whether you’re an aspiring programmer, a working professional in the IT field, or a tech enthusiast aiming to expand your coding expertise, this program provides the <strong>structured training and industry-relevant knowledge</strong> to help you succeed.</p>

<p>By completing this qualification, learners gain a <strong>competitive edge</strong> in the global technology workforce, enhance their <strong>problem-solving and analytical skills</strong>, and open doors to diverse career paths in software development and IT innovation. It’s not just about learning how to code—it’s about mastering one of the world’s most powerful programming languages and preparing yourself for a <strong>future full of opportunities, growth, and success</strong> in the ever-evolving field of technology.</p>

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
                <li><a href="web-development.php" class="text-decoration-none">Web Development NC III</a></li>
                <li>
                  <a href="java-programming.php" class="text-decoration-none active-course" style="font-size:1.1rem;">Java Programming NC III</a>
                  <ul class="list-unstyled ms-3">
                    <li><a href="#ProgramCoverage" style="color:#959094; font-size:0.98rem; text-decoration:none;">Program Coverage and Competencies</a></li>
                    <li><a href="#Career" style="color:#959094; font-size:0.98rem; text-decoration:none;">Career Paths and Opportunities</a></li>
                     <li><a href="#Certification" style="color:#959094; font-size:0.98rem; text-decoration:none;">Certification and Recognition</a></li>
                    <li><a href="#WhyEnroll" style="color:#959094; font-size:0.98rem; text-decoration:none;">Why Enroll in this Program?</a></li>
                  </ul>
                </li>
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
