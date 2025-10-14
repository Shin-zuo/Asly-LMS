<?php
require_once '../config/database.php'; // ✅ correct path to database

require __DIR__ . '/../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ . '/../vendor/phpmailer/phpmailer/src/SMTP.php';
require __DIR__ . '/../vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect all inputs
    $firstName         = $_POST['firstName'] ?? '';
    $middleInitial     = $_POST['middleInitial'] ?? '';
    $lastName          = $_POST['lastName'] ?? '';
    $prefix            = $_POST['prefix'] ?? '';
    $street            = $_POST['street'] ?? '';
    $barangay          = $_POST['barangay'] ?? '';
    $district          = $_POST['district'] ?? '';
    $city              = $_POST['city'] ?? '';
    $province          = $_POST['province'] ?? '';
    $region            = $_POST['region'] ?? '';
    $email             = $_POST['email'] ?? '';
    $contactNumber     = $_POST['contact'] ?? '';
    $gender            = $_POST['gender'] ?? '';
    $civilStatus       = $_POST['civilStatus'] ?? '';
    $employmentStatus  = $_POST['EmploymentStatus'] ?? '';
    $applyFor          = $_POST['applyFor'] ?? '';
    $course            = $_POST['course'] ?? '';
    $lastSchool        = $_POST['lastSchool'] ?? '';
    $schoolYear        = $_POST['schoolYear'] ?? '';
    $birthdate         = $_POST['birthdate'] ?? '';
    $birthplace        = $_POST['birthplace'] ?? '';

    $dateEnrolled = date('Y-m-d');
    $status = 'Pending';

    // -------------------------------
    // ✅ Basic validation
    // -------------------------------
    if (empty($firstName) || empty($lastName) || empty($email) || empty($gender) || empty($birthdate) || empty($course)) {
        header("Location: ../Landing Page/Enroll.php?error=" . urlencode("Please fill in all required fields.") . "#enroll");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../Landing Page/Enroll.php?error=" . urlencode("Invalid email format.") . "#enroll");
        exit();
    }

    if (!empty($contactNumber) && !preg_match('/^[0-9]{10,15}$/', $contactNumber)) {
        header("Location: ../Landing Page/Enroll.php?error=" . urlencode("Invalid contact number format.") . "#enroll");
        exit();
    }

    if (strtotime($birthdate) > time()) {
        header("Location: ../Landing Page/Enroll.php?error=" . urlencode("Birthdate cannot be in the future.") . "#enroll");
        exit();
    }

    // ✅ Check for duplicate email
    $check = $conn->prepare("SELECT id FROM enrollees WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $check->close();
        header("Location: ../Landing Page/Enroll.php?error=" . urlencode("Email already registered!") . "#enroll");
        exit();
    }
    $check->close();

    // -------------------------------
    // ✅ Insert data
    // -------------------------------
    $sql = "INSERT INTO enrollees 
        (firstName, middleInitial, lastName, prefix, street, barangay, district, city, province, region, 
        civilStatus, employmentStatus, email, contactNumber, lastSchoolAttended, lastSchoolYr, 
        birthDate, gender, dateEnrolled, courseId, educationalAttainment, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param(
        "ssssssssssssssssssssss",
        $firstName,
        $middleInitial,
        $lastName,
        $prefix,
        $street,
        $barangay,
        $district,
        $city,
        $province,
        $region,
        $civilStatus,
        $employmentStatus,
        $email,
        $contactNumber,
        $lastSchool,
        $schoolYear,
        $birthdate,
        $gender,
        $dateEnrolled,
        $course,
        $applyFor,
        $status
    );

    if ($stmt->execute()) {
<<<<<<< HEAD
        // -------------------------------
        // ✅ Automatic weekday schedule
        // -------------------------------
        $assignedDate = new DateTime('now +1 week');
        $dayOfWeek = $assignedDate->format('N');
        if ($dayOfWeek >= 6) {
            $assignedDate->modify('next Monday');
        }
        $assignedTime = '10:00 AM';

        // -------------------------------
        // ✅ Send email using PHPMailer
        // -------------------------------
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'mail.aici.edu.ph';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'jeff-ict@aici.edu.ph';       // your dummy Gmail
            $mail->Password   = 'nksk mblr yciy xvxd ';    // Gmail app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('torlaokenneth35@gmail.com', 'AITCI');
            $mail->addAddress($email, $firstName);

            // Content
            $mail->isHTML(false);
            $mail->Subject = 'AITCI Enrollment Schedule';
            $mail->Body = "Hi $firstName,\n\n"
                . "Thank you for enrolling at AITCI!\n\n"
                . "Please be informed that your scheduled visit for the submission of enrollment requirements is on "
                . $assignedDate->format('l, F j, Y') . " at $assignedTime.\n\n"
                . "Kindly bring all the necessary documents for verification.\n\n"
                . "We look forward to seeing you soon!\n\n"
                . "- AITCI Admissions Office";
            $mail->send();
        } catch (Exception $e) {
            error_log("Mailer Error: " . $mail->ErrorInfo);
        }

        // -------------------------------
        // Redirect to success
        // -------------------------------
        header("Location: ../index.php?success=1#enroll");
=======
        header("Location: ../Landing Page/Enroll.php?success=1#enroll");
>>>>>>> 02e5f753f12623a395d822a7bad1e5854a2a9172
        exit();
    } else {
        header("Location: ../Landing Page/Enroll.php?error=" . urlencode("Something went wrong: " . $stmt->error) . "#enroll");
        exit();
    }
}
