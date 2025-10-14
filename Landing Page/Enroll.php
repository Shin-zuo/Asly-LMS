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
        <li class="nav-item"><a class="nav-link" href="Features.php">FEATURES</a></li>
        <li class="nav-item"><a class="nav-link" href="Gallery.php">GALLERY</a></li>
        <li class="nav-item"><a class="nav-link active" href="../index.php#enroll">ENROLL</a></li>
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
  <!-- // end .section -->
    </br>
    </br>
        <div class="section" id="enroll">
            <div class="container">
                <div class="section-title">
                    <!-- <small>Enroll</small> -->
                    <h1 style="color: #f9a82f">Enroll Now</h3>
                </div>

                <!-- ✅ Display Messages -->
                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger">
                        <?= htmlspecialchars($_GET['error']) ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success">
                        Enrollment successful!
                    </div>
                <?php endif; ?>

                <!-- ✅ Enrollment Form -->
            <form action="../functions/enroll.php" method="POST" id="enrollmentForm">
                <div class="mb-3 row">
                    <div class="col-md-5">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" class="form-control" required>
                    </div>
                    <div class="col-md-1">
                        <label for="middleInitial">M.I.</label>
                        <input type="text" id="middleInitial" name="middleInitial" class="form-control text-center" maxlength="2">
                    </div>
                    <div class="col-md-5">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" class="form-control" required>
                    </div>
                    <div class="col-md-1">
                        <label for="prefix">Prefix</label>
                        <input type="text" id="prefix" name="prefix" class="form-control text-center" maxlength="3">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-5">
                        <label for="street" class="form-label">Number, Street</label>
                        <input type="text" name="street" class="form-control" id="street" required>
                    </div>
                    <div class="col-md-4">
                        <label for="barangay" class="form-label">Barangay</label>
                        <input type="text" name="barangay" class="form-control" id="barangay" required>
                    </div>
                    <div class="col-md-3">
                        <label for="district" class="form-label">District</label>
                        <input type="text" name="district" class="form-control" id="district" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-5">
                        <label for="city" class="form-label">City/Municipality</label>
                        <input type="text" name="city" class="form-control" id="city" required>
                    </div>
                    <div class="col-md-4">
                        <label for="province" class="form-label">Province</label>
                        <input type="text" name="province" class="form-control" id="province" required>
                    </div>
                    <div class="col-md-3">
                        <label for="region" class="form-label">Region</label>
                        <input type="text" name="region" class="form-control" id="region" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="col-md-6">
                        <label for="contact" class="form-label">Contact Number</label>
                        <input type="text" name="contact" class="form-control" id="contact">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select id="gender" name="gender" class="form-select" required>
                            <option value="" disabled selected>-- Select Gender --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="civilStatus" class="form-label">Civil Status</label>
                        <select id="civilStatus" name="civilStatus" class="form-select" required>
                            <option value="" disabled selected>-- Select Civil Status --</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                            <option value="Divorced">Divorced</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="EmploymentStatus" class="form-label">Employment Status</label>
                        <select id="EmploymentStatus" name="EmploymentStatus" class="form-select" required>
                            <option value="" disabled selected>-- Select Employment Status --</option>
                            <option value="Employed">Employed</option>
                            <option value="Unemployed">Unemployed</option>
                            <option value="Self-Employed">Self-Employed</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="applyFor" class="form-label">Apply For</label>
                        <select id="applyFor" name="applyFor" class="form-select" required>
                            <option value="" disabled selected>-- Select Admission --</option>
                            <?php while ($row = $educationLevels->fetch_assoc()): ?>
                                <option value="<?= $row['id'] ?>">
                                    <?= htmlspecialchars($row['educationLevel']) ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="course" class="form-label">Course</label>
                        <select id="course" name="course" class="form-select" required>
                            <option value="" disabled selected>-- Select Course --</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="lastSchool" class="form-label">Last School Attended</label>
                        <input type="text" name="lastSchool" class="form-control" id="lastSchool">
                    </div>
                    <div class="col-md-6">
                        <label for="schoolYear" class="form-label">Last School Year</label>
                        <input type="text" name="schoolYear" class="form-control" id="schoolYear">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="birthdate" class="form-label">Birth Date</label>
                        <input type="date" name="birthdate" class="form-control" id="birthdate">
                    </div>
                    <div class="col-md-6">
                        <label for="birthplace" class="form-label">Place of Birth</label>
                        <input type="text" name="birthplace" class="form-control" id="birthplace">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>

        </div>

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
            <!-- JavaScript to dynamically load courses -->
            <script>
                document.getElementById('applyFor').addEventListener('change', function() {
                    let educationId = this.value;

                    fetch('../functions/get_courses.php?educationId=' + educationId)
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

</body>
</html>
