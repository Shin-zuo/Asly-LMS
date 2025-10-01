<?php
require_once '../../../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $chapterId  = intval($_POST['chapterId']);
    $title      = trim($_POST['title']);
    $description= trim($_POST['description']);
    $status     = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO exams (chapterId, title, description, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $chapterId, $title, $description, $status);

    if ($stmt->execute()) {
        header("Location: ../centralSterile.php?success=Exam added successfully");
        exit();
    } else {
        header("Location: ../centralSterile.php?error=" . urlencode("Failed to add exam"));
        exit();
    }
} else {
    header("Location: ../centralSterile.php?error=" . urlencode("Invalid request"));
    exit();
}
