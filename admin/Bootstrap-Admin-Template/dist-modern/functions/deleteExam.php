<?php
require_once '../../../../config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $examId = intval($_POST['id']);
    if ($examId <= 0) {
        die("Invalid exam ID");
    }

    // --- STEP 1: Delete matching pairs linked to questions in this exam ---
    $conn->query("
        DELETE FROM matching_pairs 
        WHERE questionId IN (SELECT id FROM questions WHERE examId = $examId)
    ");

    // --- STEP 2: Delete questions linked to this exam ---
    $conn->query("DELETE FROM questions WHERE examId = $examId");

    // --- STEP 3: Delete exam questions (if used for your manage question feature) ---
    $conn->query("DELETE FROM exam_questions WHERE examId = $examId");

    // --- STEP 4: Finally, delete the exam itself ---
    $stmt = $conn->prepare("DELETE FROM exams WHERE id = ?");
    $stmt->bind_param("i", $examId);

    if ($stmt->execute()) {
        // Redirect back to the main page with success message
        header("Location: ../centralSterile.php?deleted=1");
        exit();
    } else {
        die("Error deleting exam: " . $stmt->error);
    }
} else {
    die("Invalid request method");
}
?>
