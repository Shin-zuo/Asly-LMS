<?php
require_once '../../../config/database.php';
session_start();

// Validate examId
$examId = intval($_GET['examId'] ?? 0);
if ($examId <= 0) {
    die("Invalid exam ID.");
}

// Fetch exam info
$exam = $conn->query("SELECT * FROM exams WHERE id = $examId AND status = 'active'")->fetch_assoc();
if (!$exam) {
    die("Exam not found or inactive.");
}

// Fetch questions for this exam
$questions = $conn->query("SELECT * FROM questions WHERE examId = $examId ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($exam['title']) ?> - Take Exam</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .timer-box {
            position: fixed;
            top: 20px;
            right: 30px;
            background-color: #fff;
            border: 2px solid #007bff;
            color: #007bff;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: bold;
            z-index: 1000;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container py-5">
    <h3 class="mb-3 text-primary"><?= htmlspecialchars($exam['title']) ?></h3>
    <p class="text-muted"><?= htmlspecialchars($exam['description']) ?></p>

    <?php if (!empty($exam['timeLimit'])): ?>
        <div class="timer-box" id="timerBox">
            Time Left: <span id="timer"></span>
        </div>
    <?php endif; ?>

    <form id="examForm" action="submitExam.php" method="POST">
        <input type="hidden" name="exam_id" value="<?= $examId ?>">

        <?php
        $i = 1;
        if ($questions && $questions->num_rows > 0):
            while ($q = $questions->fetch_assoc()):
        ?>
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h6>Question <?= $i++ ?>:</h6>
                    <p><?= htmlspecialchars($q['questionText']) ?></p>

                    <?php if ($q['questionType'] === 'MultipleChoice'): ?>
                        <?php
                        $choices = $conn->query("SELECT * FROM choices WHERE questionId = " . $q['id']);
                        while ($c = $choices->fetch_assoc()):
                        ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                       name="answers[<?= $q['id'] ?>]"
                                       value="<?= htmlspecialchars($c['choiceText']) ?>" required>
                                <label class="form-check-label"><?= htmlspecialchars($c['choiceText']) ?></label>
                            </div>
                        <?php endwhile; ?>
                    <?php elseif ($q['questionType'] === 'TrueFalse'): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                                   name="answers[<?= $q['id'] ?>]" value="True" required>
                            <label class="form-check-label">True</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                                   name="answers[<?= $q['id'] ?>]" value="False">
                            <label class="form-check-label">False</label>
                        </div>
                    <?php else: ?>
                        <input type="text" name="answers[<?= $q['id'] ?>]" class="form-control" placeholder="Your answer..." required>
                    <?php endif; ?>
                </div>
            </div>
        <?php
            endwhile;
        else:
            echo "<p>No questions found for this exam.</p>";
        endif;
        ?>

        <button type="submit" class="btn btn-primary mt-3">Submit Exam</button>
    </form>
</div>

<?php if (!empty($exam['timeLimit'])): ?>
<script>
let timeLimit = <?= intval($exam['timeLimit']) ?> * 60; // convert minutes to seconds
let timerDisplay = document.getElementById('timer');
let examForm = document.getElementById('examForm');

function updateTimer() {
    let minutes = Math.floor(timeLimit / 60);
    let seconds = timeLimit % 60;
    timerDisplay.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;

    if (timeLimit <= 0) {
        clearInterval(timerInterval);
        Swal.fire({
            icon: 'warning',
            title: 'Time is up!',
            text: 'Your exam will be automatically submitted.',
            showConfirmButton: false,
            timer: 2000,
            willClose: () => {
                examForm.submit();
            }
        });
    }

    timeLimit--;
}

updateTimer();
let timerInterval = setInterval(updateTimer, 1000);
</script>
<?php endif; ?>

</body>
</html>
