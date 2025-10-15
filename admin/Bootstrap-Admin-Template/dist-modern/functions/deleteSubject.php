<?php
require_once '../../../../config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id'] ?? 0);

    if ($id <= 0) {
        $_SESSION['error'] = "Invalid teacher ID.";
        header("Location: ../subjectManagement.php");
        exit();
    }

    // Prepare delete statement
    $stmt = $conn->prepare("DELETE FROM subjects WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Subject deleted successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete Subject: " . $conn->error;
    }

    $stmt->close();
    header("Location: ../subjectManagement.php");
    exit();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: ../subjectManagement.php");
    exit();
}
