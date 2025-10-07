<?php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect input values
    $firstName     = trim($_POST['firstName'] ?? '');
    $middleInitial = trim($_POST['middleInitial'] ?? '');
    $lastName      = trim($_POST['lastName'] ?? '');
    $prefix        = trim($_POST['prefix'] ?? '');
    $email         = trim($_POST['email'] ?? '');
    $contactNumber = trim($_POST['contact'] ?? '');
    $lastSchool    = trim($_POST['lastSchool'] ?? '');
    $schoolYear    = trim($_POST['schoolYear'] ?? '');
    $birthdate     = trim($_POST['birthdate'] ?? '');
    $gender        = trim($_POST['gender'] ?? '');
    $courseId      = trim($_POST['course'] ?? '');
    $educationId   = trim($_POST['applyFor'] ?? '');
    $status        = "Pending";

    // ✅ Basic required fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($gender) || empty($courseId) || empty($educationId)) {
        header("Location: ../index.php?error=" . urlencode("Please fill in all required fields.") . "#enroll");
        exit();
    }

    // ✅ Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?error=" . urlencode("Invalid email format.") . "#enroll");
        exit();
    }

    // ✅ Contact number validation (optional but strict if given)
    if (!empty($contactNumber) && !preg_match('/^[0-9]{11,15}$/', $contactNumber)) {
        header("Location: ../index.php?error=" . urlencode("Invalid contact number format.") . "#enroll");
        exit();
    }

    // ✅ Birthdate validation (not in the future)
    if (!empty($birthdate) && strtotime($birthdate) > time()) {
        header("Location: ../index.php?error=" . urlencode("Birthdate cannot be in the future.") . "#enroll");
        exit();
    }

    // ✅ Duplicate email check
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

    // ✅ Insert query
    $sql = "INSERT INTO enrollees 
        (firstName, middleInitial, lastName, prefix, email, contactNumber, lastSchoolAttended, lastSchoolYr, 
         birthDate, gender, dateEnrolled, courseId, educationalAttainment, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        header("Location: ../index.php?error=" . urlencode("Database error: " . $conn->error) . "#enroll");
        exit();
    }

    // Bind parameters
    $stmt->bind_param(
        "ssssssssssiis",
        $firstName,
        $middleInitial,
        $lastName,
        $prefix,
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

    // Execute and redirect
    if ($stmt->execute()) {
        header("Location: ../index.php?success=1#enroll");
        exit();
    } else {
        header("Location: ../index.php?error=" . urlencode("Something went wrong: " . $stmt->error) . "#enroll");
        exit();
    }
}
?>
