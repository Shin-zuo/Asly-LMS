<?php
require_once '../../../../config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $courseId    = $_POST['courseId'];
    $educationId = $_POST['educationId'];
    $courseCode  = trim($_POST['courseCode']);
    $courseName  = trim($_POST['course']);

    if (!empty($courseId) && !empty($educationId) && !empty($courseCode) && !empty($courseName)) {
        $sql = "UPDATE course 
                SET educationId = ?, courseCode = ?, course = ?
                WHERE courseId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issi", $educationId, $courseCode, $courseName, $courseId);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Course updated successfully!";
        } else {
            $_SESSION['error'] = "Failed to update course: " . $conn->error;
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = "All fields are required.";
    }

    header("Location: ../courseManagement.php");
    exit();
}
