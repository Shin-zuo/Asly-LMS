<?php
require_once '../../../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Get current status
    $stmt = $conn->prepare("SELECT status FROM sterilechapters WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($currentStatus);
    $stmt->fetch();
    $stmt->close();

    if ($currentStatus) {
        // Toggle status
        $newStatus = ($currentStatus === 'active') ? 'inactive' : 'active';

        $update = $conn->prepare("UPDATE sterilechapters SET status = ? WHERE id = ?");
        $update->bind_param("si", $newStatus, $id);

        if ($update->execute()) {
            header("Location: ../centralSterile.php?success=Status updated");
            exit();
        } else {
            header("Location: ../centralSterile.php?error=" . urlencode("Failed to update status"));
            exit();
        }
    } else {
        header("Location: ../centralSterile.php?error=" . urlencode("Chapter not found"));
        exit();
    }
} else {
    header("Location: ../centralSterile.php?error=" . urlencode("Invalid request"));
    exit();
}
