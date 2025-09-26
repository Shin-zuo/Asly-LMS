<?php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName     = $_POST['firstName'] ?? '';
    $middleInitial = $_POST['middleInitial'] ?? '';
    $lastName      = $_POST['lastName'] ?? '';
    $email         = $_POST['email'] ?? '';
    $contactNumber = $_POST['contact'] ?? '';
    $lastSchool    = $_POST['lastSchool'] ?? '';
    $schoolYear    = $_POST['schoolYear'] ?? '';
    $birthdate     = $_POST['birthdate'] ?? '';
    $gender        = $_POST['gender'] ?? '';
    $courseId      = $_POST['course'] ?? '';
    $educationId   = $_POST['applyFor'] ?? '';
    $status        = "Pending";

    // ✅ Basic validation
    if (empty($firstName) || empty($lastName) || empty($email) || empty($gender)) {
        header("Location: ../index.php?error=" . urlencode("Please fill in all required fields.") . "#enroll");
        exit();
    }

    // ✅ Check if email already exists
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

    // ✅ Insert into database
    $sql = "INSERT INTO enrollees 
        (firstName, middleInitial, lastName, email, contactNumber, lastSchoolAttended, lastSchoolYr, 
         birthDate, gender, dateEnrolled, courseId, educationalAttainment, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "sssssssssiis",   // 9 strings, 2 ints, 1 string
        $firstName,
        $middleInitial,
        $lastName,
        $email,
        $contactNumber,
        $lastSchool,
        $schoolYear,
        $birthdate,
        $gender,
        $courseId,       // int
        $educationId,    // int
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
