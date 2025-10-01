<?php
require_once '../../../../config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id          = intval($_POST['id']);
    $examId      = intval($_POST['examId']);
    $questionText= trim($_POST['questionText']);
    $points      = intval($_POST['points'] ?? 1);

    if ($id <= 0 || empty($questionText)) {
        die("Invalid request");
    }

    // Update base question
    $stmt = $conn->prepare("UPDATE questions SET questionText=?, points=? WHERE id=?");
    $stmt->bind_param("sii", $questionText, $points, $id);
    $stmt->execute();
    $stmt->close();

    // Detect type
    $q = $conn->query("SELECT questionType FROM questions WHERE id=$id")->fetch_assoc();
    $type = $q['questionType'];

    if ($type === 'MultipleChoice') {
        $conn->query("DELETE FROM choices WHERE questionId=$id");

        $choices = $_POST['choices'] ?? [];
        $correct = intval($_POST['correctChoice']);

        foreach ($choices as $i => $choiceText) {
            $choiceText = trim($choiceText);
            if ($choiceText === "") continue;

            $isCorrect = ($i === $correct) ? 1 : 0;
            $stmt = $conn->prepare("INSERT INTO choices (questionId, choiceText, isCorrect) VALUES (?, ?, ?)");
            $stmt->bind_param("isi", $id, $choiceText, $isCorrect);
            $stmt->execute();
            $stmt->close();

            if ($isCorrect) {
                $conn->query("UPDATE questions SET answerKey='".$conn->real_escape_string($choiceText)."' WHERE id=$id");
            }
        }
    } elseif ($type === 'TrueFalse' || $type === 'Identification' || $type === 'Enumeration') {
        $answerKey = trim($_POST['answerKey']);
        $stmt = $conn->prepare("UPDATE questions SET answerKey=? WHERE id=?");
        $stmt->bind_param("si", $answerKey, $id);
        $stmt->execute();
        $stmt->close();
    } elseif ($type === 'Matching') {
        $conn->query("DELETE FROM matching_pairs WHERE questionId=$id");

        $lefts  = $_POST['left'] ?? [];
        $rights = $_POST['right'] ?? [];

        foreach ($lefts as $i => $leftText) {
            $leftText  = trim($leftText);
            $rightText = trim($rights[$i] ?? "");
            if ($leftText === "" || $rightText === "") continue;

            $stmt = $conn->prepare("INSERT INTO matching_pairs (questionId, leftText, rightText) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $id, $leftText, $rightText);
            $stmt->execute();
            $stmt->close();
        }
    }

    header("Location: ../questions.php?examId=$examId&updated=1");
    exit();
}
?>
