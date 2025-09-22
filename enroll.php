<?php
require 'config/database.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $middleInitial = $_POST['middleInitial'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $applyFor = $_POST['applyFor'];
    $course = $_POST['course'];
    $lastSchool = $_POST['lastSchool'];
    $schoolYear = $_POST['schoolYear'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];

    // Insert into database
    $sql = "INSERT INTO enrollment (firstName, middleInitial, lastName, email, contact, applyFor, course, lastSchool, schoolYear, birthdate, gender)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss", $firstName, $middleInitial, $lastName, $email, $contact, $applyFor, $course, $lastSchool, $schoolYear, $birthdate, $gender);

    if ($stmt->execute()) {
        echo "<script>alert('Enrollment submitted successfully!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
