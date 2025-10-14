<?php
require_once '../../../../config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id'] ?? 0);

    if ($id <= 0) {
        $_SESSION['error'] = "Invalid teacher ID.";
        header("Location: ../teachersManagement.php");
        exit();
    }

    // Prepare delete statement
    $stmt = $conn->prepare("DELETE FROM teachers WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Teacher deleted successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete teacher: " . $conn->error;
    }

    $stmt->close();
    header("Location: ../teachersManagement.php");
    exit();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: ../teachersManagement.php");
    exit();
}
