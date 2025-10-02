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
                                <li class="nav-item"> <a class="nav-link active" href="#">HOME <span
                                            class="sr-only">(current)</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#features">FEATURES</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#gallery">GALLERY</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#enroll">ENROLL</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#contact">FAQs</a> </li>
                                <li class="nav-item"><a href="auth/login.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Log
                                        In</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <header id="home" style="background-color: white;">
        <div class="container mt-5">
            </br>

            <p class="tagline">A school where education meets technology for the digital age.</p>
            </br>
            </br>

        </div>
        <div class="img-holder mt-3">
            <img src="images/ASLYLOGO3.png" alt="Asly" class="img-fluid">
        </div>
    </header>
 </br>
    <div class="client-logos">
        <div class="container text-center">
            <img src="images/deped.png" alt="client logos" class="img-fluid mr-3">
            <img src="images/ched-logo.png" alt="client logos" class="img-fluid mr-3">
            <img src="images/tesda.png" alt="client logos" class="img-fluid mr-3">
            </br>
                </br>
        </div>
    </div>

    <div class="section light-bg" id="features">
        <div class="container">
            <div class="section-title">
                <h3 style="color: #f9a825;">What we offer</h3>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <img src="images/deped.png" alt="DepEd Logo" style="height:25px; width:auto;">
                                </span>
                                <div class="media-body">
                                    <h4 class="card-title">Senior High School</h4>
                                    <p class="card-text" style="color:#959094">Asly International College Inc. offers the Information and Communications Technology strand under
                                        its Senior High School program. The ICT strand provides students with a strong foundation in computer systems,
                                        programming, networking, and digital applications. It is designed to equip learners with both theoretical knowledge
                                        and practical skills that are essential in today’s technology-driven world.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <img src="images/ched-logo.png" alt="CHED Logo" style="height:35px; width:auto;">
                                </span>
                                <div class="media-body">
                                    <h4 class="card-title">College</h4>
                                    <p class="card-text" style="color:#959094">Asly International College Inc. also offers computer-related courses in college,
                                        designed to provide students with advanced knowledge and practical skills in the field of information technology.
                                        These programs focus on areas such as computer systems, programming, networking, and software development,
                                        ensuring that graduates are well-prepared to meet the demands of the modern digital workplace.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <img src="images/tesda.png" alt="CHED Logo" style="height:35px; width:auto;">
                                </span>
                                <div class="media-body">
                                    <h4 class="card-title">Tesda Training</h4>
                                    <p class="card-text" style="color:#959094">Asly International College Inc. offers a variety of TESDA-accredited training programs
                                        that provide students with practical skills and nationally recognized certifications. Among these programs
                                        are Web Development, Java Programming, Computer Systems Servicing, and Central Sterile Services. Each course
                                        is designed to equip learners with industry-relevant competencies through hands-on training.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- // end .section -->
<div class="container my-5">
    <h3 style="color: #f9a825; text-align: center;">What we offer</h3>
    <br>
    <div class="row justify-content-center row-cols-1 row-cols-md-3 g-4">
        
        <!-- Card 1 -->
        <div class="col">
            <a href="sterile1.php" class="text-decoration-none">
                <div class="card h-100 hover-scale text-center gradient-bg border-0">
                    <img src="images/images.jpg" class="card-img-top rounded-top-4" alt="Central Sterile Processing Technology">
                    <div class="card-body">
                        <h5 class="card-title">Central Sterile Processing Technology</h5>
                        <p class="card-text">An advanced program that provides in-depth knowledge of sterile processing, infection control, and healthcare standards. This course prepares students for leadership roles in hospital central service departments, both locally and internationally.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card 2 -->
        <div class="col">
            <a href="sterile2.php" class="text-decoration-none">
                <div class="card h-100 hover-scale text-center gradient-bg border-0">
                    <img src="images/images2.png" class="card-img-top rounded-top-4" alt="Central Sterile Services">
                    <div class="card-body">
                        <h5 class="card-title">Central Sterile Services</h5>
                        <p class="card-text">Specialized training focused on the proper sterilization, handling, and maintenance of medical instruments. Graduates are prepared to support safe healthcare practices in hospitals and medical facilities.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card 3 -->
        <div class="col">
            <a href="computer-systems.php" class="text-decoration-none">
                <div class="card h-100 hover-scale text-center gradient-bg border-0">
                    <img src="images/image3.jpg" class="card-img-top rounded-top-4" alt="Computer Systems Servicing">
                    <div class="card-body">
                        <h5 class="card-title">Computer Systems Servicing</h5>
                        <p class="card-text">Develop the skills to install, configure, maintain, and troubleshoot computer systems and networks. This course provides the foundation for IT support and technical careers locally and abroad.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card 4 -->
        <div class="col">
            <a href="web-development.php" class="text-decoration-none">
                <div class="card h-100 hover-scale text-center gradient-bg border-0">
                    <img src="images/image4.jpg" class="card-img-top rounded-top-4" alt="Web Development NC III">
                    <div class="card-body">
                        <h5 class="card-title">Web Development NC III</h5>
                        <p class="card-text">Master the art of designing and building dynamic, user-friendly websites. Students learn both front-end and back-end development, preparing them for careers in the fast-growing digital industry.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card 5 -->
        <div class="col">
            <a href="java-programming.php" class="text-decoration-none">
                <div class="card h-100 hover-scale text-center gradient-bg border-0">
                    <img src="images/image5.png" class="card-img-top rounded-top-4" alt="Java Programming NC III">
                    <div class="card-body">
                        <h5 class="card-title">Java Programming NC III</h5>
                        <p class="card-text">Gain expertise in one of the world’s most widely used programming languages. This course equips learners with the skills to develop robust, secure, and scalable applications for business and enterprise needs.</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>


    <!-- Additional CSS -->
    <style>
        .gradient-bg {
            background-color: #fffef1;
            color: #fff;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-scale:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card-body h5 {
            font-weight: 600;
            color: #f9a825;
        }

        .card-body p {
            color: #959094;
        }

        .card-img-top {
            object-fit: cover;
            height: 200px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
    </style>

    <div class="section">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    </br>
                    <h2>Learning Today, Leading Tomorrow</h2>
                    <p class="mb-4">At Asly International College Inc., this belief inspires our
                        Vision and Mission to shape learners into future leaders. </p>
                    <a href="#featuress" class="btn btn-primary">Read more</a>
    </br>
    </br>
                </div>
            </div>
            <div class="perspective-phone">
                <img src="images/Graduation.png" alt="perspective phone" class="img-fluid" style="width:600px; height:auto;">
            </div>
        </div>

    </div>
    <!-- // end .section -->


    <div class="section light-bg" id="featuress">
        <div class="container">
            <div class="section-title">

                <h3>Driven by values, </br>defined by excellence.</h3>
            </div>

            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#OurVision">Our </br> Vision</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#OurMission">Our </br> Mission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#TesdaTraining"> Our </br> Philosophy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#SHSStrand"> Our </br> Core Values</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="OurVision">
                    <div class="d-flex flex-column flex-lg-row">
                        <img src="images/Our Vision.png" alt="graphic"
                            class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0 recolor"
                            style="width: 223px; height: auto;">
                        <div>

                            <h2>Communicate with ease</h2>
                            <p class="lead">Uniquely underwhelm premium outsourcing with proactive leadership skills.
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu
                                pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien.
                                Vestibulum sit amet mattis ante. Ut placerat dui eu nulla
                                congue tincidunt ac a nibh. Mauris accumsan pulvinar lorem placerat volutpat. Praesent
                                quis facilisis elit. Sed condimentum neque quis ex porttitor,
                            </p>
                            <p> malesuada faucibus augue aliquet. Sed elit est, eleifend sed dapibus a, semper a eros.
                                Vestibulum blandit vulputate pharetra. Phasellus lobortis leo a nisl euismod, eu
                                faucibus justo sollicitudin. Mauris consectetur, tortor
                                sed tempor malesuada, sem nunc porta augue, in dictum arcu tortor id turpis. Proin
                                aliquet vulputate aliquam.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="OurMission">
                    <div class="d-flex flex-column flex-lg-row">
                        <div>
                            <h2>Scheduling when you want</h2>
                            <p class="lead">Uniquely underwhelm premium outsourcing with proactive leadership skills.
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu
                                pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien.
                                Vestibulum sit amet mattis ante. Ut placerat dui eu nulla
                                congue tincidunt ac a nibh. Mauris accumsan pulvinar lorem placerat volutpat. Praesent
                                quis facilisis elit. Sed condimentum neque quis ex porttitor,
                            </p>
                            <p> malesuada faucibus augue aliquet. Sed elit est, eleifend sed dapibus a, semper a eros.
                                Vestibulum blandit vulputate pharetra. Phasellus lobortis leo a nisl euismod, eu
                                faucibus justo sollicitudin. Mauris consectetur, tortor
                                sed tempor malesuada, sem nunc porta augue, in dictum arcu tortor id turpis. Proin
                                aliquet vulputate aliquam.
                            </p>
                        </div>
                        <img src="images/Ourmission.png" alt="graphic"
                            class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0 recolor"
                            style="width: 225px; height: auto;">
                    </div>
                </div>
                <div class="tab-pane fade" id="TesdaTraining">
                    <div class="d-flex flex-column flex-lg-row">
                        <img src="images/CoreValues.png" alt="graphic"
                            class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0 recolor"
                            style="width: 223px; height: auto;">
                        <div>
                            <h2>Realtime Messaging service</h2>
                            <p class="lead">Uniquely underwhelm premium outsourcing with proactive leadership skills.
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu
                                pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien.
                                Vestibulum sit amet mattis ante. Ut placerat dui eu nulla
                                congue tincidunt ac a nibh. Mauris accumsan pulvinar lorem placerat volutpat. Praesent
                                quis facilisis elit. Sed cwondimentum neque quis ex porttitor,
                            </p>
                            <p> malesuada faucibus augue aliquet. Sed elit est, eleifend sed dapibus a, semper a eros.
                                Vestibulum blandit vulputate pharetra. Phasellus lobortis leo a nisl euismod, eu
                                faucibus justo sollicitudin. Mauris consectetur, tortor
                                sed tempor malesuada, sem nunc porta augue, in dictum arcu tortor id turpis. Proin
                                aliquet vulputate aliquam.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="SHSStrand">
                    <div class="d-flex flex-column flex-lg-row">
                        <div>
                            <h2>Live chat when you needed</h2>
                            <p class="lead">Uniquely underwhelm premium outsourcing with proactive leadership skills.
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu
                                pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien.
                                Vestibulum sit amet mattis ante. Ut placerat dui eu nulla
                                congue tincidunt ac a nibh. Mauris accumsan pulvinar lorem placerat volutpat. Praesent
                                quis facilisis elit. Sed condimentum neque quis ex porttitor,
                            </p>
                            <p> malesuada faucibus augue aliquet. Sed elit est, eleifend sed dapibus a, semper a eros.
                                Vestibulum blandit vulputate pharetra. Phasellus lobortis leo a nisl euismod, eu
                                faucibus justo sollicitudin. Mauris consectetur, tortor
                                sed tempor malesuada, sem nunc porta augue, in dictum arcu tortor id turpis. Proin
                                aliquet vulputate aliquam.
                            </p>
                        </div>
                        <img src="images/philosophy.png" alt="graphic"
                            class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0 recolor"
                            style="width: 223px; height: auto;">
                    </div>
                </div>
            </div>


        </div>
    </div>
    </br>
    </br>
    </br>


    <!-- // end .section -->
    <div class="section">

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/walking.png" alt="dual phone" class="img-fluid" style="width:600px; height:auto;">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <h2>Unlock your full potential with us - your future starts here!</h2>
                        <p class="mb-4"> Unlock your full potential with us, where learning meets innovation, and every
                            step takes you closer to shaping a brighter tomorrow filled with success. </p>
                        <a href="#steps" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- // end .section -->


    <div class="section light-bg">

        <div class="container" id="steps">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <ul class="list-unstyled ui-steps">
                        <li class="media">
                            <div class="circle-icon mr-4">1</div>
                            <div class="media-body">
                                <h5>Learn with us</h5>
                                <p>"Learn with us and discover a community where knowledge, innovation,
                                    and growth come together to prepare you for the future." </p>
                            </div>
                        </li>
                        <li class="media my-4">
                            <div class="circle-icon mr-4">2</div>
                            <div class="media-body">
                                <h5>Build your future</h5>
                                <p>Build your future with us through quality education, innovation, and
                                    technology that empower you to achieve success in the digital age.</p>
                            </div>
                        </li>
                        <li class="media">
                            <div class="circle-icon mr-4">3</div>
                            <div class="media-body">
                                <h5>Achieve your dreams</h5>
                                <p>"Achieve your dreams through a learning journey that combines excellence, technology,
                                    and opportunities designed to shape your brighter tomorrow." </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <img src="images/Marin_Kitagawa_Anime_Infobox.png" alt="school" class="img-fluid">
                </div>

            </div>

        </div>

    </div>
    <!-- // end .section -->
    <div id="gallery">
        <div class="container">
            <div class="section-title">
                </br>
                </br>
                </br>
                <h3>Our Facilities
                </h3>
            </div>

            <div class="img-gallery owl-carousel owl-theme">
                <img src="images/1.png" alt="image">
                <img src="images/2.png" alt="image">
                <img src="images/3.png" alt="image">
                <img src="images/4.png" alt="image">
            </div>

        </div>

    </div>
    </br>
    </br>
    </br>
    <div class="section light-bg">
        <div class="section">
            <div class="container">
                <div class="section-title">
                    </br>
                    <h3>Our Students Feedback</h3>
                </div>

                <div class="testimonials owl-carousel">
                    <div class="testimonials-single">
                        <img src="images/client.png" alt="client" class="client-img">
                        <blockquote class="blockquote">Uniquely streamline highly efficient scenarios and 24/7 initiatives.
                            Conveniently embrace multifunctional ideas through proactive customer service. Distinctively
                            conceptualize 2.0 intellectual capital via user-centric partnerships.</blockquote>
                        <h5 class="mt-4 mb-2">Crystal Gordon</h5>
                        <p class="text-primary">United States</p>
                    </div>
                    <div class="testimonials-single">
                        <img src="images/client.png" alt="client" class="client-img">
                        <blockquote class="blockquote">Uniquely streamline highly efficient scenarios and 24/7 initiatives.
                            Conveniently embrace multifunctional ideas through proactive customer service. Distinctively
                            conceptualize 2.0 intellectual capital via user-centric partnerships.</blockquote>
                        <h5 class="mt-4 mb-2">Crystal Gordon</h5>
                        <p class="text-primary">United States</p>
                    </div>
                    <div class="testimonials-single">
                        <img src="images/client.png" alt="client" class="client-img">
                        <blockquote class="blockquote">Uniquely streamline highly efficient scenarios and 24/7 initiatives.
                            Conveniently embrace multifunctional ideas through proactive customer service. Distinctively
                            conceptualize 2.0 intellectual capital via user-centric partnerships.</blockquote>
                        <h5 class="mt-4 mb-2">Crystal Gordon</h5>
                        <p class="text-primary">United States</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- // end .section -->

    <!-- // end .section -->




    <!-- // end .section -->
    <div class="section" id="enroll">
        <div class="container">
            <div class="section-title">
                <!-- <small>Enroll</small> -->
                <h3>Enroll Now</h3>
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
            <form action="functions/enroll.php" method="POST" id="enrollmentForm">
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
                        <label class="form-label">Gender</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female" required>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


            <!-- // end .enroll -->


        </div>

    </div>
    <!-- // end .section -->


    <div class="section pt-0">
        <div class="container">
            <div class="section-title">
                <small>FAQs</small>
                <h3>Frequently Asked Questions</h3>
            </div>

            <div class="row pt-4">
                <div class="col-md-6">
                    <h4 class="mb-3">What courses does AICI offer?</h4>
                    <p class="light-font mb-5">   AICI offers specialized programs in Healthcare and Information Technology. 
  These include <strong>Central Sterile Services (1-year program)</strong>, 
  <strong>Central Sterile Processing Technology (2-year program)</strong>, 
  <strong>Computer Systems Servicing NC II</strong>, 
  <strong>Java Programming NC III</strong>, and 
  <strong>Web Development NC III</strong>. 
  All programs are TESDA-Accredited, ensuring that graduates receive nationally recognized certifications aligned with industry standards.
</p>
                    <h4 class="mb-3">Who can enroll in AICI programs?</h4>
                    <p class="light-font mb-5">Our programs are open to high school graduates, college undergraduates, 
                        professionals, out of school youth, and overseas Filipino workers (OFWs) who wish to gain new skills,
                        upgrade their credentials, or pursue career advancement.</p>

                </div>
                <div class="col-md-6">
                    <h4 class="mb-3">Do you recognize prior learning or work experince?</h4>
                    <p class="light-font mb-5">
                    AICI is commited to providing globally aligned, competency-based training rooted in values of honestly,
                        integrity, and service. We are recognized as the only Institution in the Philippines offering specialized
                        Central Sterile programs, alongside ICT courses, experienced instructor, and strong industry partnerships, students are 
                        assured of quality education and better employment opportunities.</p>
                        
                    <h4 class="mb-3">Why should I choose AICI?</h4>
                    <p class="light-font mb-5">Yes, Through TESDA's Recognition of Prior Learning(RPL), relevant work experience
                        and previously acquired skills may be credit toward certification, allowing learners to complete programs more efficiently.
                    </p>

                </div>
            </div>
        </div>

    </div>
    <!-- // end .section -->
<div class="light-bg py-5">
  <div class="container">
    <div class="row align-items-center text-center text-lg-start">
      <!-- Contact Info -->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <h6 class="mb-3" style="color:#f9a825;">Contact Us</h6>
        <p class="mb-2">
          <span class="ti-location-pin mr-2"></span>
          Purok 7, Brgy. Bagong Buhay I, City of San Jose Del Monte, Bulacan, Philippines
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
       <h1 style="color:white;">Shinzuo</h1>
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