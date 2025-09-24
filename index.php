<?php
require 'config/database.php';

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
    <link href="css/style15.css" rel="stylesheet">
</head>


<body data-spy="scroll" data-target="#navbar" data-offset="30">

    <!-- Nav Menu -->

    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" href="index.html"><img src="images/AICI.png" class="img-fluid"
                                alt="logo"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span
                                class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link active" href="#home">HOME <span
                                            class="sr-only">(current)</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#features">FEATURES</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#gallery">GALLERY</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#pricing">ENROLL</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#contact">CONTACT</a> </li>
                                <li class="nav-item"><a href="auth/login.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Log
                                        In</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <header class="bg-gradient" id="home">
        <div class="container mt-5">
            </br>
            </br>
            </br>
            </br>
            <p class="tagline">A school where education meets technology for the digital age.</p>
        </div>
        <div class="img-holder mt-3"><img src="images/ASLYLOGO3.png" alt="phone" class="img-fluid"></div>
    </header>

    <div class="client-logos my-5">
        <div class="container text-center">
            <img src="images/deped.png" alt="client logos" class="img-fluid" style="margin-right: 20px;">
            <img src="images/ched-logo.png" alt="client logos" class="img-fluid" style="margin-right: 20px;">
            <img src="images/tesda.png" alt="client logos" class="img-fluid" style="margin-right: 20px;">
            </br>
            </br>
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
                                    <p class="card-text">Asly International College Inc. offers the Information and Communications Technology strand under
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
                                    <p class="card-text">Asly International College Inc. also offers computer-related courses in college,
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
                                    <p class="card-text">Asly International College Inc. offers a variety of TESDA-accredited training programs
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
    <div class="section">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="box-icon"><span class="ti-mobile gradient-fill ti-3x"></span></div>
                    <h2>Learning Today, Leading Tomorrow</h2>
                    <p class="mb-4">At Asly International College Inc., this belief inspires our
                         Vision and Mission to shape learners into future leaders. </p>
                    <a href="#featuress" class="btn btn-primary">Read more</a>
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
                    <a class="nav-link" data-toggle="tab" href="#TesdaTraining"> Tesda </br> Training</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#SHSStrand"> SHS </br> Strand</a>
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
                        <img src="images/OurMission.png" alt="graphic"
                            class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0 recolor"
                            style="width: 223px; height: auto;">
                    </div>
                </div>
                <div class="tab-pane fade" id="TesdaTraining">
                    <div class="d-flex flex-column flex-lg-row">
                        <img src="images/graphic.png" alt="graphic"
                            class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0">
                        <div>
                            <h2>Realtime Messaging service</h2>
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
                        <img src="images/graphic.png" alt="graphic"
                            class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0">
                    </div>
                </div>
            </div>


        </div>
    </div>
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
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati vel
                            exercitationem eveniet vero maxime ratione </p>
                        <a href="#steps" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- // end .section -->


    <div class="section light-bg">

        <div class="container" id ="steps">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <ul class="list-unstyled ui-steps">
                        <li class="media">
                            <div class="circle-icon mr-4">1</div>
                            <div class="media-body">
                                <h5>Learn with us</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu
                                    pellentesque pretium obcaecati vel exercitationem </p>
                            </div>
                        </li>
                        <li class="media my-4">
                            <div class="circle-icon mr-4">2</div>
                            <div class="media-body">
                                <h5>Build your future</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu
                                    pellentesque pretium obcaecati vel exercitationem eveniet</p>
                            </div>
                        </li>
                        <li class="media">
                            <div class="circle-icon mr-4">3</div>
                            <div class="media-body">
                                <h5>Achieve your dreams</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu
                                    pellentesque pretium obcaecati vel exercitationem </p>
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
    <!-- // end .section -->


    <div class="section light-bg" id="gallery">
        <div class="container">
            <div class="section-title">
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
    <!-- // end .section -->




    <!-- // end .section -->
    <div class="section" id="pricing">
        <div class="container">
            <div class="section-title">
                <!-- <small>PRICING</small> -->
                <h3>Enroll Now</h3>
            </div>


            <form action="enroll.php" method="POST">
                <div class="mb-3 row">
                    <!-- First Name -->
                    <div class="col-md-5">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" class="form-control" required>
                    </div>

                    <!-- Middle Initial -->
                    <div class="col-md-2">
                        <label for="middleInitial">M.I.</label>
                        <input type="text" id="middleInitial" name="middleInitial" class="form-control text-center" maxlength="2">
                    </div>

                    <!-- Last Name -->
                    <div class="col-md-5">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" class="form-control" required>
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
                            <option selected disabled>-- Select Application Type --</option>
                            <option value="college">College Admission</option>
                            <option value="scholarship">Scholarship</option>
                            <option value="transfer">Transfer Student</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="course" class="form-label">Course</label>
                        <select id="course" name="course" class="form-select" required>
                            <option selected disabled>-- Select Course --</option>
                            <option value="bsit">BS Information Technology</option>
                            <option value="bsba">BS Business Administration</option>
                            <option value="bshm">BS Hospitality Management</option>
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
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <!-- // end .pricing -->


        </div>

    </div>
    <!-- // end .section -->


    <div class="section pt-0">
        <div class="container">
            <div class="section-title">
                <small>FAQ</small>
                <h3>Frequently Asked Questions</h3>
            </div>

            <div class="row pt-4">
                <div class="col-md-6">
                    <h4 class="mb-3">Can I try before I buy?</h4>
                    <p class="light-font mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum,
                        urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien.
                        Vestibulum sit amet mattis ante. </p>
                    <h4 class="mb-3">What payment methods do you accept?</h4>
                    <p class="light-font mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum,
                        urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien.
                        Vestibulum sit amet mattis ante. </p>

                </div>
                <div class="col-md-6">
                    <h4 class="mb-3">Can I change my plan later?</h4>
                    <p class="light-font mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum,
                        urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien.
                        Vestibulum sit amet mattis ante. </p>
                    <h4 class="mb-3">Do you have a contract?</h4>
                    <p class="light-font mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum,
                        urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien.
                        Vestibulum sit amet mattis ante. </p>

                </div>
            </div>
        </div>

    </div>
    <!-- // end .section -->



    <div class="section bg-gradient">
        <div class="container">
            <div class="call-to-action">

                <div class="box-icon"><span class="ti-mobile gradient-fill ti-3x"></span></div>
                <h2>Download Anywhere</h2>
                <p class="tagline">Available for all major mobile and desktop platforms. Rapidiously visualize optimal
                    ROI rather than enterprise-wide methods of empowerment. </p>
                <div class="my-4">

                    <a href="#" class="btn btn-light"><img src="images/appleicon.png" alt="icon"> App Store</a>
                    <a href="#" class="btn btn-light"><img src="images/playicon.png" alt="icon"> Google play</a>
                </div>
                <p class="text-primary"><small><i>*Works on iOS 10.0.5+, Android Kitkat and above. </i></small></p>
            </div>
        </div>

    </div>
    <!-- // end .section -->

    <div class="light-bg py-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <p class="mb-2"> <span class="ti-location-pin mr-2"></span> 1485 Pacific St, Brooklyn, NY 11216 USA
                    </p>
                    <div class=" d-block d-sm-inline-block">
                        <p class="mb-2">
                            <span class="ti-email mr-2"></span> <a class="mr-4"
                                href="mailto:support@mobileapp.com">support@mobileapp.com</a>
                        </p>
                    </div>
                    <div class="d-block d-sm-inline-block">
                        <p class="mb-0">
                            <span class="ti-headphone-alt mr-2"></span> <a href="tel:51836362800">518-3636-2800</a>
                        </p>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="social-icons">
                        <a href="#"><span class="ti-facebook"></span></a>
                        <a href="#"><span class="ti-twitter-alt"></span></a>
                        <a href="#"><span class="ti-instagram"></span></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- // end .section -->
    <footer class="my-5 text-center">
        <!-- Copyright removal is not prohibited! -->
        <p class="mb-2"><small>COPYRIGHT © 2017. ALL RIGHTS RESERVED. MOBAPP TEMPLATE BY <a
                    href="https://colorlib.com">COLORLIB</a></small></p>

        <small>
            <a href="#" class="m-2">PRESS</a>
            <a href="#" class="m-2">TERMS</a>
            <a href="#" class="m-2">PRIVACY</a>
        </small>
    </footer>

    <!-- jQuery and Bootstrap -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Plugins JS -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>

</body>

</html>