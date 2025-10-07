<?php
require_once '../../../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $chapterId = $_POST['chapterId'];
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $status = $_POST['status'];
    $timeLimit = intval($_POST['timeLimit']);
    
    $stmt = $conn->prepare("INSERT INTO exams (chapterId, title, description, status, timeLimit, totalItems, created_at)
                            VALUES (?, ?, ?, ?, ?, 0, NOW())");
    $stmt->bind_param("isssi", $chapterId, $title, $description, $status, $timeLimit);

    if ($stmt->execute()) {
        header("Location: ../centralSterile.php?success=1");
    } else {
        echo "Error: " . $stmt->error;
    }
}
