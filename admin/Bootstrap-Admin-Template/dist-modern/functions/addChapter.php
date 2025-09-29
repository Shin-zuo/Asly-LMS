<?php
require_once '../../../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdfFile'])) {

    $chapterNum  = intval($_POST['chapterNum']);
    $title       = trim($_POST['title']);
    $description = trim($_POST['description']);
    $status      = $_POST['status'];

    // Folder to save PDFs
    $uploadDir = __DIR__ . "/../uploads/chapters/"; // points to dist-modern/uploads/chapters/
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName   = time() . "_" . basename($_FILES['pdfFile']['name']);
    $targetFile = $uploadDir . $fileName;

    // Move uploaded file
    if (move_uploaded_file($_FILES['pdfFile']['tmp_name'], $targetFile)) {

        // Insert record into database
        $stmt = $conn->prepare("INSERT INTO sterilechapters (chapterNum, title, description, discussion, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $chapterNum, $title, $description, $fileName, $status);

        if ($stmt->execute()) {
            header("Location: ../centralSterile.php?success=1");
            exit();
        } else {
            header("Location: ../centralSterile.php?error=" . urlencode("Database insert failed: " . $stmt->error));
            exit();
        }

    } else {
        // Error moving file
        $uploadError = $_FILES['pdfFile']['error'];
        $errorMsg = "Failed to upload PDF. Error code: $uploadError";
        header("Location: ../centralSterile.php?error=" . urlencode($errorMsg));
        exit();
    }

} else {
    header("Location: ../centralSterile.php?error=" . urlencode("Invalid request or no file uploaded"));
    exit();
}
?>
