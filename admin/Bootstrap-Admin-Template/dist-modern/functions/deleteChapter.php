<?php
require_once '../../../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // First, delete the PDF file if exists
    $stmt = $conn->prepare("SELECT discussion FROM sterilechapters WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        if (!empty($row['discussion'])) {
            $filePath = "../uploads/chapters/" . $row['discussion'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }
    $stmt->close();

    // Delete from DB
    $stmt = $conn->prepare("DELETE FROM sterilechapters WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../centralSterile.php?success=Chapter+deleted");
        exit();
    } else {
        header("Location: ../centralSterile.php?error=Failed+to+delete+chapter");
        exit();
    }
} else {
    header("Location: ../centralSterile.php?error=Invalid+request");
    exit();
}
