<?php
require_once '../../../../config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id     = $_POST['id'] ?? '';
    $status = $_POST['status'] ?? '';

    if (!empty($id) && !empty($status)) {
        $sql = "UPDATE teachers SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $status, $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Teacher status updated to '$status' successfully!";
        } else {
            $_SESSION['error'] = "Database error: " . $conn->error;
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = "Invalid data received.";
    }

    // ✅ Redirect back to teacher management page
    header("Location: ../teachersManagement.php");
    exit();
} else {
    $_SESSION['error'] = "Invalid request method.";
    header("Location: ../teachersManagement.php");
    exit();
}