<?php
require_once '../../../config/database.php'; // adjust if db connection is elsewhere

if (!isset($_GET['examId'])) {
    die("Exam ID required");
}

$examId = intval($_GET['examId']);

// Fetch exam info
$exam = $conn->query("SELECT * FROM exams WHERE id=$examId")->fetch_assoc();
if (!$exam) die("Exam not found");

// Fetch questions
$questions = $conn->query("SELECT * FROM questions WHERE examId=$examId");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Questions - <?= htmlspecialchars($exam['title']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>
<body class="p-4">

<div class="container">
    <h3>Manage Questions for: <span class="text-primary"><?= htmlspecialchars($exam['title']) ?></span></h3>
    <p class="text-muted"><?= htmlspecialchars($exam['description']) ?></p>

    <!-- Add Question Button -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addQuestionModal">
        <i class="bi bi-plus-lg me-2"></i> Add Question
    </button>
    <a href="centralSterile.php" class="btn btn-secondary mb-3">
    <i class="bi bi-arrow-left me-2"></i> Go Back
</a>


    <!-- Questions Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Question</th>
                <th>Answer / Choices</th>
                <th>Points</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($questions->num_rows > 0): ?>
            <?php while ($q = $questions->fetch_assoc()): ?>
                <tr>
                    <td><?= $q['id'] ?></td>
                    <td><?= $q['questionType'] ?></td>
                    <td><?= nl2br(htmlspecialchars($q['questionText'])) ?></td>
                    <td>
                        <?php if ($q['questionType'] === 'MultipleChoice'): ?>
                            <?php
                            $choices = $conn->query("SELECT * FROM choices WHERE questionId=".$q['id']);
                            while ($c = $choices->fetch_assoc()):
                            ?>
                                <?= $c['isCorrect'] ? "<b>" : "" ?>
                                <?= htmlspecialchars($c['choiceText']) ?>
                                <?= $c['isCorrect'] ? " (Correct)</b>" : "" ?><br>
                            <?php endwhile; ?>
                        <?php elseif ($q['questionType'] === 'Matching'): ?>
                            <?php
                            $pairs = $conn->query("SELECT * FROM matching_pairs WHERE questionId=".$q['id']);
                            while ($p = $pairs->fetch_assoc()):
                            ?>
                                <?= htmlspecialchars($p['leftText']) ?> → <?= htmlspecialchars($p['rightText']) ?><br>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <?= htmlspecialchars($q['answerKey']) ?>
                        <?php endif; ?>
                    </td>
                    <td><?= $q['points'] ?></td>
                    <td>
                        <!-- Edit -->
                        <a href="editQuestion.php?id=<?= $q['id'] ?>&examId=<?= $examId ?>" 
                           class="btn btn-sm btn-outline-primary">Edit</a>

                        <!-- Delete -->
                        <form action="functions/deleteQuestion.php" method="POST" style="display:inline;"
                              onsubmit="return confirm('Delete this question?');">
                            <input type="hidden" name="id" value="<?= $q['id'] ?>">
                            <input type="hidden" name="examId" value="<?= $examId ?>">
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6" class="text-center text-muted">No questions yet</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Add Question Modal -->
<div class="modal fade" id="addQuestionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="functions/addQuestion.php" method="POST" class="modal-content">
            <input type="hidden" name="examId" value="<?= $examId ?>">
            <div class="modal-header">
                <h5 class="modal-title">Add Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Question Type</label>
                    <select name="questionType" id="questionType" class="form-select" required>
                        <option value="">Select...</option>
                        <option value="MultipleChoice">Multiple Choice</option>
                        <option value="TrueFalse">True/False</option>
                        <option value="Identification">Identification</option>
                        <option value="Enumeration">Enumeration</option>
                        <option value="Matching">Matching</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Question Text</label>
                    <textarea name="questionText" class="form-control" required></textarea>
                </div>

                <!-- Container that changes based on type -->
                <div id="dynamicFields"></div>

                <div class="mb-3">
                    <label class="form-label">Points</label>
                    <input type="number" name="points" class="form-control" value="1" min="1">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Question</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// JS to show fields dynamically depending on question type
document.getElementById("questionType").addEventListener("change", function() {
    const container = document.getElementById("dynamicFields");
    container.innerHTML = "";

    if (this.value === "MultipleChoice") {
        container.innerHTML = `
            <label class="form-label">Choices</label>
            <div class="mb-2">
                <input type="text" name="choices[]" class="form-control mb-1" placeholder="Choice 1" required>
                <input type="radio" name="correctChoice" value="0" required> Correct
            </div>
            <div class="mb-2">
                <input type="text" name="choices[]" class="form-control mb-1" placeholder="Choice 2" required>
                <input type="radio" name="correctChoice" value="1"> Correct
            </div>
            <div id="extraChoices"></div>
            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addChoice()">+ Add Choice</button>
        `;
    } else if (this.value === "TrueFalse") {
        container.innerHTML = `
            <label class="form-label">Answer</label>
            <select name="answerKey" class="form-select" required>
                <option value="True">True</option>
                <option value="False">False</option>
            </select>
        `;
    } else if (this.value === "Identification" || this.value === "Enumeration") {
        container.innerHTML = `
            <label class="form-label">Answer Key</label>
            <input type="text" name="answerKey" class="form-control" required>
        `;
    } else if (this.value === "Matching") {
        container.innerHTML = `
            <label class="form-label">Matching Pairs</label>
            <div id="pairsContainer">
                <div class="d-flex mb-2">
                    <input type="text" name="left[]" class="form-control me-2" placeholder="Left" required>
                    <input type="text" name="right[]" class="form-control" placeholder="Right" required>
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addPair()">+ Add Pair</button>
        `;
    }
});

function addChoice() {
    const div = document.createElement("div");
    div.classList.add("mb-2");
    const index = document.querySelectorAll('[name="choices[]"]').length;
    div.innerHTML = `
        <input type="text" name="choices[]" class="form-control mb-1" placeholder="Choice ${index+1}" required>
        <input type="radio" name="correctChoice" value="${index}"> Correct
    `;
    document.getElementById("extraChoices").appendChild(div);
}

function addPair() {
    const div = document.createElement("div");
    div.classList.add("d-flex","mb-2");
    div.innerHTML = `
        <input type="text" name="left[]" class="form-control me-2" placeholder="Left" required>
        <input type="text" name="right[]" class="form-control" placeholder="Right" required>
    `;
    document.getElementById("pairsContainer").appendChild(div);
}
</script>

</body>
</html>
