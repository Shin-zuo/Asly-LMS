<?php
require_once '../config/database.php'; // make sure this connects to your DB

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

    // Optional columns
    $dateEnrolled = date('Y-m-d'); // current date
    $status = 'Pending'; // default status

    // -------------------------------
    // ✅ Basic validation
    // -------------------------------
    if (empty($firstName) || empty($lastName) || empty($email) || empty($gender) || empty($birthdate) || empty($course)) {
        header("Location: ../index.php?error=" . urlencode("Please fill in all required fields.") . "#enroll");
        exit();
    }

    // ✅ Email format validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?error=" . urlencode("Invalid email format.") . "#enroll");
        exit();
    }

    // ✅ Contact number validation (10–15 digits)
    if (!empty($contactNumber) && !preg_match('/^[0-9]{10,15}$/', $contactNumber)) {
        header("Location: ../index.php?error=" . urlencode("Invalid contact number format.") . "#enroll");
        exit();
    }

    // ✅ Birthdate validation (must not be in the future)
    if (strtotime($birthdate) > time()) {
        header("Location: ../index.php?error=" . urlencode("Birthdate cannot be in the future.") . "#enroll");
        exit();
    }

    // ✅ Check for duplicate email
    $check = $conn->prepare("SELECT id FROM enrollees WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $check->close();
        header("Location: ../index.php?error=" . urlencode("Email already registered!") . "#enroll");
        exit();
    }
    $check->close();

    // -------------------------------
    // ✅ Prepare SQL statement
    // -------------------------------
    $sql = "INSERT INTO enrollees 
        (firstName, middleInitial, lastName, prefix, street, barangay, district, city, province, region, 
        civilStatus, employmentStatus, email, contactNumber, lastSchoolAttended, lastSchoolYr, 
        birthDate, gender, dateEnrolled, courseId, educationalAttainment, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Use prepared statement to prevent SQL injection
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
        header("Location: ../index.php?success=1#enroll");
        exit();
    } else {
        header("Location: ../index.php?error=" . urlencode("Something went wrong: " . $stmt->error) . "#enroll");
        exit();
    }
}
?>
