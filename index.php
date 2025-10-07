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
                <img src="images/7HKFErFF.jpg" alt="perspective phone" class="img-fluid" style="width:600px; height:auto;">
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

                            <h2>Our Vision</h2>
                            <p class="lead">To be a leading center of excellence in technical education, where learners
                                grow through guided instruction, real-world practice, and technology integrated learning,
                                "A school where education meets technology for the digital age."
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="OurMission">
                    <div class="d-flex flex-column flex-lg-row">
                        <div>
                            <h2>Our Mission</h2>
                            <p class="lead">We are committed to:
                                </br>
                                • Inspiring learners through
                                guided, hands-on instruction
                                </br>
                                •Creating a support and
                                student-centered learning
                                environment
                                </br>
                                • Embedding modern tools and
                                technology in training
                                Promoting personal growth,
                                work ethics, and career
                                readiness
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
                            <h2>Our Philosophy</h2>
                            <p class="lead">At AITCI, we believe the be learning is personal, practical
                                powered by technology.
                                We guide students with care and
                                expertise, offering real-world
                                inclusive environment where
                                hands-on experiences in a safe and curiosity, confidence, and growth are encouraged. By embedding modern tools and industryrelevant practices into our
                                teaching, we prepare learners to
                                thrive in today's fast-paced digital
                                world.
                                We don't just teach - we guide,
                                inspire, and prepare you for the digital
                                age.</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="SHSStrand">
                    <div class="d-flex flex-column flex-lg-row">
                        <div>
                            <h2>Our Core Values</h2>
                            <p class="lead">At AITCI, our core values guide everything we do-from how we teach
                                how we learn and grow together. These values form the foundation of
                                our culture and represent what we stand for as an institution.
                            </p>
                            <p class="lead">A- Aspire</p>
                            <p>We strive for excellence in all aspects of teaching and learning. Students and staff are encouraged to set high goals, push boundaries, and pursue continuous growth-academically, professionally, and personally.
                            </p>
                            <p class="lead">I- Integrity</p>
                            <p>We believe that strong character and ethical behavior are essential to lifelong success. We promote honesty, accountability, and respect in our classrooms, workplaces, and communities.
                            </p>
                            <p class="lead">T-Technology Integration</p>
                            <p>We are committed to blending modern technology with hands-on
                                instruction. Our learning environment reflects the tools, platforms, and
                                practices of today's digital world to prepare students for tomorrow's
                                careers.
                            </p>
                            <p class="lead">C- Competent</p>
                            <p>We empower learners to become capable, confident, and career-ready
                                individuals. Our commitment to competence ensures that every student is not only knowledgeable but also able to apply what they've learned effectively in professional settings.
                            </p>
                            <p class="lead">I-Innovatlon</p>
                            <p>We embrace creativity and encourage new ideas that improve learning and training outcomes. Innovation is at the heart of our approach-driving us to adapt, evolve, and lead in an ever-changing digital landscape.
                                <img src="images/philosophy.png" alt="graphic"
                                    class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0 recolor"
                                    style="width: 223px; height: auto;">
                        </div>
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
                        <img src="images/DSC_1055.jpg" alt="dual phone" class="img-fluid" style="width:600px; height:auto;">
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
                        <img src="images/bossatanorig.png" alt="school" class="img-fluid">
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
            <form action="functions/enrolldummy.php" method="POST" id="enrollmentForm">
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
                        <p class="light-font mb-5"> AICI offers specialized programs in Healthcare and Information Technology.
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
                            <a href="https://www.facebook.com/profile.php?id=61563804450972"><span class="ti-facebook"></span></a>
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
            <H1 style="color: white;">KANEKI(FE)</H1>
            <h1 style="color: white;">ShinzuoDEV</h1>
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