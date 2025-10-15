<?php
require_once '../../../../config/database.php'; // adjust path if needed
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sub = ($_POST['subjectName']);
    $code = ($_POST['courseCode']);
    $education = trim($_POST['educationId']);
    $desc = ($_POST['description']);


    // ✅ Check for duplicate subjects
    $check = $conn->prepare("SELECT courseCode FROM subjects WHERE courseCode = ?");
    $check->bind_param("s", $code);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $check->close();
        header("Location: ../subjectManagement.php?error=" . urlencode("Subject already existing!"));
        exit();
    } else {

        try {
            $sql = "INSERT INTO subjects (subject, courseCode, educationId, description) 
                VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare(query: $sql);
            $stmt->bind_param("ssss", $sub, $code, $education, $desc);

            if ($stmt->execute()) {
                $_SESSION['success'] = "Subject added successfully!";
            } else {
                $_SESSION['error'] = "Failed to add Subject.";
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
        }

        header("Location: ../subjectManagement.php"); // change to your actual teachers page
       

        $check->close();        
    }
}
