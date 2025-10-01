<?php
require_once '../../../../config/database.php'; // adjust path if needed

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Get current status
    $stmt = $conn->prepare("SELECT status FROM exams WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $exam = $result->fetch_assoc();

    if ($exam) {
        // Flip status
        $newStatus = ($exam['status'] === 'active') ? 'inactive' : 'active';

        // Update
        $update = $conn->prepare("UPDATE exams SET status = ? WHERE id = ?");
        $update->bind_param("si", $newStatus, $id);
        $update->execute();

        // Redirect back to exams list page
   header("Location: ../centralSterile.php#examTable");
        exit();
    } else {
        echo "Exam not found.";
    }
} else {
    echo "Invalid request.";
}
