<?php
require_once '../../../../config/database.php'; 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $examId       = intval($_POST['examId']);
    $questionType = $_POST['questionType'];
    $questionText = trim($_POST['questionText']);
    $points       = intval($_POST['points'] ?? 1);

    if (empty($examId) || empty($questionType) || empty($questionText)) {
        die("Missing required fields");
    }

    // Default
    $answerKey = null;

    // Insert question first
    $stmt = $conn->prepare("INSERT INTO questions (examId, questionType, questionText, answerKey, points) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isssi", $examId, $questionType, $questionText, $answerKey, $points);
    $stmt->execute();
    $questionId = $stmt->insert_id;
    $stmt->close();

    // Handle based on type
    if ($questionType === 'MultipleChoice') {
        if (!isset($_POST['choices']) || !is_array($_POST['choices'])) {
            die("Choices required");
        }

        $choices = $_POST['choices'];
        $correctIndex = intval($_POST['correctChoice']); 

        foreach ($choices as $i => $choiceText) {
            $choiceText = trim($choiceText);
            if ($choiceText === "") continue;

            $isCorrect = ($i === $correctIndex) ? 1 : 0;
            $stmt = $conn->prepare("INSERT INTO choices (questionId, choiceText, isCorrect) VALUES (?, ?, ?)");
            $stmt->bind_param("isi", $questionId, $choiceText, $isCorrect);
            $stmt->execute();
            $stmt->close();

            if ($isCorrect) {
                // Save correct answer into main table for easier lookup
                $conn->query("UPDATE questions SET answerKey='".$conn->real_escape_string($choiceText)."' WHERE id=$questionId");
            }
        }
    } elseif ($questionType === 'TrueFalse' || $questionType === 'Identification' || $questionType === 'Enumeration') {
        $answerKey = trim($_POST['answerKey']);
        $stmt = $conn->prepare("UPDATE questions SET answerKey=? WHERE id=?");
        $stmt->bind_param("si", $answerKey, $questionId);
        $stmt->execute();
        $stmt->close();
    } elseif ($questionType === 'Matching') {
        if (!isset($_POST['left']) || !isset($_POST['right'])) {
            die("Matching pairs required");
        }
        foreach ($_POST['left'] as $i => $leftText) {
            $leftText = trim($leftText);
            $rightText = trim($_POST['right'][$i] ?? "");
            if ($leftText === "" || $rightText === "") continue;

            $stmt = $conn->prepare("INSERT INTO matching_pairs (questionId, leftText, rightText) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $questionId, $leftText, $rightText);
            $stmt->execute();
            $stmt->close();
        }
    }

    header("Location: ../questions.php?examId=$examId&success=1");
    exit();
} else {
    die("Invalid request");
}
?>
