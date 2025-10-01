<?php
require_once '../../../config/database.php';
session_start();

if (!isset($_GET['id']) || !isset($_GET['examId'])) {
    die("Invalid request");
}

$questionId = intval($_GET['id']);
$examId     = intval($_GET['examId']);

// Fetch question
$question = $conn->query("SELECT * FROM questions WHERE id=$questionId")->fetch_assoc();
if (!$question) die("Question not found");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
    <h3>Edit Question</h3>
    <form action="functions/updateQuestion.php" method="POST">
        <input type="hidden" name="id" value="<?= $questionId ?>">
        <input type="hidden" name="examId" value="<?= $examId ?>">

        <div class="mb-3">
            <label class="form-label">Question Text</label>
            <textarea name="questionText" class="form-control" required><?= htmlspecialchars($question['questionText']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Points</label>
            <input type="number" name="points" class="form-control" value="<?= $question['points'] ?>" min="1">
        </div>

        <?php if ($question['questionType'] === 'MultipleChoice'): ?>
            <h5>Choices</h5>
            <?php
            $choices = $conn->query("SELECT * FROM choices WHERE questionId=$questionId");
            $i = 0;
            while ($c = $choices->fetch_assoc()): ?>
                <div class="mb-2">
                    <input type="text" name="choices[]" value="<?= htmlspecialchars($c['choiceText']) ?>" class="form-control mb-1">
                    <input type="radio" name="correctChoice" value="<?= $i ?>" <?= $c['isCorrect'] ? 'checked' : '' ?>> Correct
                </div>
            <?php $i++; endwhile; ?>
        <?php elseif ($question['questionType'] === 'TrueFalse' || $question['questionType'] === 'Identification' || $question['questionType'] === 'Enumeration'): ?>
            <div class="mb-3">
                <label class="form-label">Answer</label>
                <input type="text" name="answerKey" class="form-control" value="<?= htmlspecialchars($question['answerKey']) ?>">
            </div>
        <?php elseif ($question['questionType'] === 'Matching'): ?>
            <h5>Matching Pairs</h5>
            <?php
            $pairs = $conn->query("SELECT * FROM matching_pairs WHERE questionId=$questionId");
            while ($p = $pairs->fetch_assoc()): ?>
                <div class="d-flex mb-2">
                    <input type="text" name="left[]" value="<?= htmlspecialchars($p['leftText']) ?>" class="form-control me-2">
                    <input type="text" name="right[]" value="<?= htmlspecialchars($p['rightText']) ?>" class="form-control">
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary">Update Question</button>
        <a href="questions.php?examId=<?= $examId ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
