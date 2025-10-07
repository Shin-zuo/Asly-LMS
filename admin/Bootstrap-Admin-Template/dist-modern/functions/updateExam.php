<?php
require_once '../../../../config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $chapterId = intval($_POST['chapterId']);
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $timeLimit = intval($_POST['timeLimit']);
    $status = trim($_POST['status']);

    $stmt = $conn->prepare("UPDATE exams SET chapterId=?, title=?, description=?, timeLimit=?, status=? WHERE id=?");
    $stmt->bind_param("issisi", $chapterId, $title, $description, $timeLimit, $status, $id);

    if ($stmt->execute()) {
        header("Location: ../centralSterile.php?updated=1");
        exit;
    } else {
        die("Update failed: " . $stmt->error);
    }
}
?>
