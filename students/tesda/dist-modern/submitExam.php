<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

require_once '../../../config/database.php';
session_start();

// 1️⃣ Check if user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['userId'])) {
    die("You must be logged in to submit an exam.");
}

// 2️⃣ Get the student userId
$userId = $_SESSION['userId'];

// 3️⃣ Validate POST data
$examId = intval($_POST['exam_id'] ?? 0);
$answers = $_POST['answers'] ?? [];

if ($examId <= 0 || empty($answers)) {
    die("Missing exam ID or answers.");
}

// 4️⃣ Fetch questions and their correct answers
$stmt = $conn->prepare("SELECT id, answerKey FROM questions WHERE examId = ?");
$stmt->bind_param("i", $examId);
$stmt->execute();
$result = $stmt->get_result();

$correctAnswers = [];
while ($row = $result->fetch_assoc()) {
    $correctAnswers[$row['id']] = $row['answerKey'];
}

// 5️⃣ Compute score
$totalQuestions = count($correctAnswers);
$score = 0;

foreach ($answers as $qId => $ans) {
    if (isset($correctAnswers[$qId]) && strtolower(trim($ans)) === strtolower(trim($correctAnswers[$qId]))) {
        $score++;
    }
}
$percentage = ($totalQuestions > 0) ? ($score / $totalQuestions) * 100 : 0;

// 6️⃣ Insert result into exam_results table
$stmt = $conn->prepare("
    INSERT INTO exam_results (exam_id, userId, total_items, score, percentage, submitted_at)
    VALUES (?, ?, ?, ?, ?, NOW())
");
$stmt->bind_param("iiiid", $examId, $userId, $totalQuestions, $score, $percentage);
if ($stmt->execute()) {
    echo "Exam submitted successfully! Score: $score / $totalQuestions, Percentage: " . round($percentage, 2) . "%";
} else {
    echo "Error submitting exam: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exam Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-body text-center">
            <h3 class="text-primary mb-4">Exam Submitted Successfully!</h3>
            <p><strong>Score:</strong> <?= $score ?> / <?= $totalQuestions ?></p>
            <p><strong>Percentage:</strong> <?= number_format($percentage, 2) ?>%</p>
            <a href="modules.php" class="btn btn-outline-primary mt-3">Back to Modules</a>
        </div>
    </div>
</div>

</body>
</html>
