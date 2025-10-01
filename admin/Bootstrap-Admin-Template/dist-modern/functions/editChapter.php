<?php
require_once '../../../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id          = intval($_POST['id']);
    $chapterNum  = intval($_POST['chapterNum']);
    $title       = trim($_POST['title']);
    $description = trim($_POST['description']);

    // First, get the current PDF filename
    $stmt = $conn->prepare("SELECT discussion FROM sterilechapters WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    $currentPdf = $row ? $row['discussion'] : null;

    $newPdf = $currentPdf; // default: keep the old one

    // Check if user uploaded a new file
    if (!empty($_FILES['pdfFile']['name'])) {
        $uploadDir = "../uploads/chapters/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName   = time() . "_" . basename($_FILES['pdfFile']['name']);
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['pdfFile']['tmp_name'], $targetFile)) {
            $newPdf = $fileName;

            // Optional: delete the old file if it exists
            if ($currentPdf && file_exists($uploadDir . $currentPdf)) {
                unlink($uploadDir . $currentPdf);
            }
        } else {
            header("Location: ../centralSterile.php?error=" . urlencode("Failed to upload new PDF"));
            exit();
        }
    }

    // Update chapter (with either old or new PDF)
    $stmtUpdate = $conn->prepare("
        UPDATE sterilechapters 
        SET chapterNum = ?, title = ?, description = ?, discussion = ?
        WHERE id = ?
    ");
    $stmtUpdate->bind_param("isssi", $chapterNum, $title, $description, $newPdf, $id);

    if ($stmtUpdate->execute()) {
        header("Location: ../centralSterile.php?success=1");
        exit();
    } else {
        header("Location: ../centralSterile.php?error=" . urlencode("Failed to update chapter"));
        exit();
    }
} else {
    header("Location: ../centralSterile.php?error=" . urlencode("Invalid request"));
    exit();
}
