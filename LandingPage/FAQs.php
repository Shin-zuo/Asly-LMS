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
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

body {
    font-family: 'Inter', sans-serif;
    line-height: 1.6;
}

/* Animation for FAQ items */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.faq-animate {
    animation: fadeIn 0.3s ease-out forwards;
}

/* Custom scrollbar for FAQ answers */
.faq-answer::-webkit-scrollbar {
    width: 6px;
}

.faq-answer::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.faq-answer::-webkit-scrollbar-thumb {
    background: #c7d2fe;
    border-radius: 10px;
}

.faq-answer::-webkit-scrollbar-thumb:hover {
    background: #a5b4fc;
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
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item"><a class="nav-link" href="../index.php">HOME</a></li>
                                <li class="nav-item"><a class="nav-link active" href="Gallery.php">BLOG</a></li>
                                <li class="nav-item"><a class="nav-link" href="Enroll.php">ADMISSION</a></li>
                                <li class="nav-item"><a class="nav-link" href="Features.php">ABOUT US</a></li>
                                <li class="nav-item"><a class="nav-link" href="../index.php#contact">FAQs</a></li>
                                <li class="nav-item">
                                    <a href="../auth/login.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Log In</a>
                                </li>
                            </ul>
                        </div>
                </nav>
                </div>
            </div>
        </div>
    </div>
    </br>
    </br>
    <main class="container mx-auto px-4 py-12">
        <section class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Find answers to common questions about our school, programs, admissions, and more.</p>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <faq-item 
                    question="What are the school hours?" 
                    answer="Our school operates from 8:00 AM to 3:00 PM, Monday through Friday. Early drop-off is available starting at 7:30 AM, and after-school care is offered until 5:30 PM.">
                </faq-item>
                
                <faq-item 
                    question="What is the admission process?" 
                    answer="Admission involves four steps: 1) Submit an online application, 2) Attend an interview, 3) Complete an assessment test, and 4) Provide previous school records. The entire process typically takes 2-3 weeks.">
                </faq-item>
                
                <faq-item 
                    question="What extracurricular activities are offered?" 
                    answer="We offer a wide range of activities including sports (soccer, basketball, swimming), arts (drama, painting, choir), STEM clubs, debate team, and community service programs. New activities are added each semester based on student interest.">
                </faq-item>
                
                <faq-item 
                    question="How does the school handle bullying?" 
                    answer="We have a zero-tolerance policy for bullying. Our approach includes prevention programs, immediate intervention, counseling for all involved parties, and progressive disciplinary measures. All incidents are documented and parents are notified.">
                </faq-item>
                
                <faq-item 
                    question="What technology is used in classrooms?" 
                    answer="Each classroom is equipped with interactive smart boards, tablets for student use, and a 1:1 laptop program for grades 5-12. We use various educational platforms including Google Classroom, Khan Academy, and specialized subject-specific software.">
                </faq-item>
                
                <faq-item 
                    question="Is financial aid available?" 
                    answer="Yes, we offer need-based financial aid to approximately 30% of our student body. Applications are reviewed annually and awards range from 25% to full tuition coverage based on demonstrated need and available funds.">
                </faq-item>
                
                <faq-item 
                    question="What are the lunch options?" 
                    answer="Our cafeteria offers daily hot meals (including vegetarian options), a salad bar, and à la carte items. Menus are planned by a nutritionist and posted monthly. Students may also bring lunch from home.">
                </faq-item>
                
                <faq-item 
                    question="How are parents involved in school activities?" 
                    answer="Parents can join our PTA, volunteer in classrooms, chaperone field trips, participate in parent-teacher conferences, and attend various school events throughout the year. We also have a parent portal for ongoing communication.">
                </faq-item>
            </div>
        </section>
    </main>
    </br>
        <script>
            
document.addEventListener('DOMContentLoaded', () => {
    console.log('EduQuest Answers Explorer is ready!');
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Close all FAQs when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('faq-item')) {
            document.querySelectorAll('faq-item').forEach(item => {
                if (item.isOpen) {
                    item.isOpen = false;
                    const answer = item.shadowRoot.querySelector('.faq-answer');
                    const toggle = item.shadowRoot.querySelector('.faq-toggle');
                    if (answer && toggle) {
                        answer.style.maxHeight = '0';
                        toggle.classList.remove('open');
                    }
                }
            });
        }
    });
});

        </script>

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

    <!-- jQuery and Bootstrap (Local JS) -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Plugins -->
    <script src="../js/owl.carousel.min.js"></script>

    <!-- Custom JS -->
    <script src="../js/script.js"></script>

    <Script src="faqitem.js"></Script>

</body>

</html>