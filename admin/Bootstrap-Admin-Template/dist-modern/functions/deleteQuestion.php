<?php
require_once '../../../../config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id     = intval($_POST['id']);
    $examId = intval($_POST['examId']);

    if ($id <= 0 || $examId <= 0) {
        die("Invalid request");
    }

    // Delete question (cascades to choices/matching_pairs if you use ON DELETE CASCADE in DB)
    $stmt = $conn->prepare("DELETE FROM questions WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../questions.php?examId=$examId&deleted=1");
        exit();
    } else {
        die("Error deleting: " . $stmt->error);
    }
} else {
    die("Invalid request method");
}
?>
