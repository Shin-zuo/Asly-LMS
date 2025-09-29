<?php
require_once '../../../../config/database.php'; // adjust path if needed
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $courseId = $_POST['courseId'];

    if (!empty($courseId)) {
        $sql = "DELETE FROM course WHERE courseId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $courseId);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Course deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to delete course: " . $conn->error;
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = "Invalid course ID.";
    }

    header("Location: ../courseManagement.php");
    exit();
} else {
    header("Location: ../courseManagement.php");
    exit();
}
