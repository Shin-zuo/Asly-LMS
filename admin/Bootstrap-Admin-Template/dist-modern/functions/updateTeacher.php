<?php
require_once '../../../../config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id          = intval($_POST['id']);
    $employeeId  = trim($_POST['employeeId']);
    $firstName   = trim($_POST['firstName']);
    $middleName  = trim($_POST['middleName'] ?? '');
    $lastName    = trim($_POST['lastName']);

    if (empty($id) || empty($employeeId) || empty($firstName) || empty($lastName)) {
        $_SESSION['error'] = "All fields except Middle Name are required.";
        header("Location: ../teachersManagement.php");
        exit();
    }

    $stmt = $conn->prepare("
        UPDATE teachers 
        SET employeeId = ?, firstName = ?, middleName = ?, lastName = ?
        WHERE id = ?
    ");
    $stmt->bind_param("ssssi", $employeeId, $firstName, $middleName, $lastName, $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Teacher updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update teacher: " . $conn->error;
    }

    $stmt->close();
    header("Location: ../teachersManagement.php");
    exit();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: ../teachersManagement.php");
    exit();
}
