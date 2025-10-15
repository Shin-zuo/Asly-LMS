<?php
require_once '../../../../config/database.php'; // adjust path if needed
session_start();

// Check if form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize inputs
    $teacherId = intval($_POST['teacherId'] ?? 0);
    $courseId  = intval($_POST['courseId'] ?? 0);
    $subjectId = intval($_POST['subjectId'] ?? 0);
    $sectionId = intval($_POST['sectionId'] ?? 0);

    // Basic validation
    if (empty($teacherId) || empty($courseId) || empty($subjectId) || empty($sectionId)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: ../teachersManagement.php"); // change path if needed
        exit;
    }

    // Check if assignment already exists
    $checkSql = "SELECT id FROM teachers_subject 
                 WHERE teachersId = ? AND courseId = ? AND subjectId = ? AND sectionId = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("iiii", $teacherId, $courseId, $subjectId, $sectionId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "This teacher is already assigned to that course, subject, and section.";
        header("Location: ../teachersManagement.php");
        exit;
    }

    // Insert new assignment
    $insertSql = "INSERT INTO teachers_subject (teachersId, courseId, subjectId, sectionId) 
                  VALUES (?, ?, ?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param("iiii", $teacherId, $courseId, $subjectId, $sectionId);

    if ($insertStmt->execute()) {
        $_SESSION['success'] = "Teacher successfully assigned!";
    } else {
        $_SESSION['error'] = "Database error: " . $conn->error;
    }

    // Redirect back to page
    header("Location: ../assign_teacher_page.php");
    exit;
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: ../teachersManagement.php");
    exit;
}
?>
