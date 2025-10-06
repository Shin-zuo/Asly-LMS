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
        <h1 class="fw-bold">Central Sterile Services</h1>
        <h2 class="fw-bold" style="color: black;">(1 year Course)</h2>
        <!-- Picture Container before CSSD section -->
        <div class="container my-5">
          <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-center">
              <div style="width:900px; height:400px; overflow:hidden; border-radius:20px; box-shadow:0 4px 24px rgba(0,0,0,0.08); background:#fffef1; display:flex; align-items:center; justify-content:center;">
                <img src="images/images2.png" alt="Central Sterile Services Banner" style="width:100%; height:100%; object-fit:cover; border-radius:20px;">
              </div>
            </div>
          </div>
        </div>
        <!-- Post Content -->
<p><strong>Central Sterile Services Department (CSSD)</strong>, also known as <strong>Central Supply</strong> or <strong>Sterile Processing Department</strong>, is a highly specialized and critical unit within hospitals and healthcare facilities. Its primary role is the <strong>cleaning, decontamination, sterilization, storage, and distribution</strong> of medical and surgical instruments, equipment, and supplies used across all areas of patient care. By ensuring that every instrument is thoroughly cleaned, sterilized, and maintained, CSSD serves as the backbone of infection control and plays a vital role in safeguarding both patients and healthcare professionals from infection risks. Without this department, healthcare operations would not be able to maintain the level of safety and efficiency required in clinical and surgical environments.</p>

<p>The CSSD operates behind the scenes but remains one of the most important departments in any medical institution. Every instrument used in surgeries, emergency care, and various medical procedures passes through this department for proper sterilization and inspection. The entire process involves strict adherence to infection control protocols and global sterilization standards. Through the expertise of CSSD personnel and the use of advanced sterilization technologies, hospitals are able to maintain a sterile environment that is essential for high-quality healthcare delivery and successful patient outcomes.</p>

<h2 id="KeyFunctions">Key Functions of CSSD</h2>
<h5>The CSSD performs a wide range of essential functions that directly contribute to hospital safety and operational efficiency:</h5>

<ul style="color: #959094;">
  <li><strong>Decontamination & Cleaning</strong> – Used instruments are carefully cleaned and decontaminated using specialized detergents and automated washers to remove organic matter, blood, and microorganisms. This is the most crucial first step in preventing infection and ensuring that instruments are ready for sterilization.</li>
  <li><strong>Inspection & Packaging</strong> – Each instrument is meticulously checked for cleanliness, functionality, and possible damage. Once verified, instruments are assembled, packed, and sealed in sterile wraps, trays, or pouches to prepare them for sterilization.</li>
  <li><strong>Sterilization</strong> – The CSSD uses various sterilization methods such as <strong>steam sterilization (autoclaving)</strong>, <strong>ethylene oxide (EtO)</strong>, <strong>hydrogen peroxide plasma</strong>, and <strong>low-temperature sterilization</strong> to eliminate all forms of microbial life. The chosen method depends on the type of instruments and materials to ensure safety and effectiveness.</li>
  <li><strong>Storage & Distribution</strong> – After sterilization, instruments are properly labeled, stored under controlled conditions, and distributed to <strong>operating rooms</strong>, <strong>wards</strong>, <strong>emergency departments</strong>, and other clinical areas. This ensures that sterile instruments are always available when needed for patient care and surgical procedures.</li>
  <li><strong>Documentation & Tracking</strong> – Each instrument and sterilization cycle is logged and tracked using detailed documentation systems. This ensures full traceability, compliance with hospital and government regulations, and accountability in case of any incidents or audits.</li>
</ul>

<h2 id="Importance">Importance in Healthcare</h2>

<p>The <strong>Central Sterile Services Department</strong> is indispensable to hospital operations and infection prevention. By maintaining the sterility of surgical and medical instruments, CSSD helps to prevent <strong>hospital-acquired infections (HAIs)</strong>, which can be life-threatening to patients and costly for healthcare institutions. It acts as a silent yet powerful force behind every successful operation, ensuring that clinical teams have safe and ready-to-use tools at all times. Without CSSD, even the most advanced hospitals would face challenges in maintaining hygiene standards and patient safety.</p>

<p>In addition to infection control, CSSD plays a vital role in supporting surgical and clinical teams by ensuring a continuous supply of sterile and functional instruments. The department’s work directly impacts the quality and timeliness of medical procedures, reducing delays and improving patient recovery outcomes. CSSD also ensures that all sterilization processes comply with strict international guidelines set by the <strong>World Health Organization (WHO)</strong>, the <strong>Centers for Disease Control and Prevention (CDC)</strong>, the <strong>Association of periOperative Registered Nurses (AORN)</strong>, and <strong>ISO standards</strong>. This global compliance highlights the professionalism and precision required to run a CSSD effectively.</p>

<p>By adhering to these standards, the department not only protects patients but also upholds the reputation and accreditation of the healthcare facility. Every successful medical or surgical procedure depends on the integrity of the instruments supplied by CSSD, making it one of the most vital components of hospital infrastructure.</p>

<h2 id="WhyEssential">Why is CSSD Essential?</h2>

<p>Without a properly functioning <strong>Central Sterile Services Department</strong>, hospitals and clinics would face critical challenges in delivering safe patient care. The absence of effective sterilization and decontamination processes would lead to higher infection rates, longer hospital stays, and potential outbreaks of infectious diseases. CSSD ensures that every instrument used—from scalpels and forceps to surgical trays and endoscopic tools—is safe, sterile, and ready for immediate use. This reliability is what allows doctors, nurses, and healthcare teams to perform their duties with confidence and precision.</p>

<p>CSSD is often referred to as the <strong>“heartbeat of hospital operations”</strong> because it supports every department where patient care is delivered. From the operating room to the emergency department, from dental clinics to maternity wards, every area depends on CSSD for sterile instruments and supplies. Its impact extends beyond infection control—it contributes directly to hospital efficiency, surgical success rates, and overall patient satisfaction.</p>

<p>In essence, a strong and well-managed CSSD represents the foundation of <strong>quality healthcare delivery</strong>. It ensures the protection of patients and staff, promotes trust in healthcare services, and reflects the commitment of a medical institution to the highest standards of safety and care. Through continuous innovation, training, and adherence to best practices, CSSD professionals uphold the integrity of healthcare systems and play a vital role in saving lives every single day.</p>
      </div>
      <div class="col-md-3">
        <aside style="position:sticky; top:80px; z-index:1020;">
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="card-title" style="color:#959094;">Course Links</h5>
              <ul class="list-unstyled">
                <li><a href="sterile1.php" class="text-decoration-none">Central Sterile Processing Technology</a></li>
                <li>
                  <a href="sterile2.php" class="text-decoration-none active-course" style="font-size:1.1rem;">Central Sterile Services</a>
        <ul class="list-unstyled ms-3">
                    <li><a href="#KeyFunctions" style="color:#959094; font-size:0.98rem; text-decoration:none;">Key Functions of CSSD</a></li>
                    <li><a href="#Importance" style="color:#959094; font-size:0.98rem; text-decoration:none;">Importance in Healthcare</a></li>
                     <li><a href="#WhyEssential" style="color:#959094; font-size:0.98rem; text-decoration:none;">Why is CSSD Essential?</a></li>
                </li>
              </ul>
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
