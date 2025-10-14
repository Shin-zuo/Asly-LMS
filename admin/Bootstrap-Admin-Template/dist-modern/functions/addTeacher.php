<?php
require_once '../../../../config/database.php'; // adjust path if needed
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim($_POST['firstName']);
    $middleName = trim($_POST['middleName']);
    $lastName = trim($_POST['lastName']);
    $employeeId = trim($_POST['employeeId']);
    $status = trim($_POST['status']);

    try {
        $sql = "INSERT INTO teachers (firstName, middleName, lastName, employeeId, status) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $firstName, $middleName, $lastName, $employeeId, $status);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Teacher added successfully!";
        } else {
            $_SESSION['error'] = "Failed to add teacher.";
        }
    } catch (Exception $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
    }

    header("Location: ../teachersManagement.php"); // change to your actual teachers page
    exit;
}
?>
