<?php

$requiredRole = 'Admin'; // only Admins can access this page
require_once '../../../auth/auth_check.php';

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require_once '../../../config/database.php';

// chapter query for exam form
$chapters = $conn->query("SELECT id, chapterNum, title FROM sterilechapters ORDER BY chapterNum ASC");


// --- Pagination Settings ---
$limit = 10; // rows per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// Count total chapters
$totalResult = $conn->query("SELECT COUNT(*) as total FROM sterilechapters");
$totalRow = $totalResult->fetch_assoc();
$totalChapters = $totalRow['total'];
$totalPages = ceil($totalChapters / $limit);

// Fetch paginated chapters
$sql = "SELECT id, chapterNum, title, description, discussion, status 
        FROM sterilechapters 
        ORDER BY chapterNum ASC 
        LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);


// Exams Pagination
$limit = 5; // how many exams per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1); // no negative page
$offset = ($page - 1) * $limit;

// Count total exams
$totalResult = $conn->query("SELECT COUNT(*) as total FROM exams");
$totalRow = $totalResult->fetch_assoc();
$totalExams = $totalRow['total'];
$totalPages = ceil($totalExams / $limit);

// Fetch exams with limit
$sql = "SELECT e.*, c.title as chapterTitle 
        FROM exams e 
        JOIN sterilechapters c ON e.chapterId=c.id 
        LIMIT $limit OFFSET $offset";
$exams = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body>

    <body data-page="dashboard" class="admin-layout">
        <!-- Loading Screen -->
        <div id="loading-screen" class="loading-screen">
            <div class="loading-spinner">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <!-- Main Wrapper -->
        <div class="admin-wrapper" id="admin-wrapper">

            <?php include 'topAndSidebar.php'; ?>

            <!-- Main Content -->
            <main class="admin-main">
                <div class="container-fluid p-4 p-lg-5">
                    <!-- Page Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h1 class="h3 mb-0">Central Sterile Management</h1>

                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addChapterModal">
                                <i class="bi bi-plus-lg me-1"></i>
                                Add Chapter
                            </button>
                            <!-- Search Bar -->
                            <div class="mb-3">
                                <input type="text" id="chapterSearch" class="form-control" placeholder="Search chapters...">
                            </div>
                        </div>
                    </div>

                    <!-- Stats Cards with Alpine.js -->
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3"></div>

                        <!-- 
                    Central Sterile Chapters Management Table -->

                        <table class="table table-striped" id="chapterTable">
                            <thead>
                                <tr>
                                    <th>Chapter #</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Discussion (PDF)</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($result && $result->num_rows > 0): ?>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['chapterNum']) ?></td>
                                            <td><?= htmlspecialchars($row['title']) ?></td>
                                            <td><?= htmlspecialchars($row['description']) ?></td>
                                            <td>
                                                <?php if (!empty($row['discussion'])): ?>
                                                    <a href="uploads/chapters/<?= htmlspecialchars($row['discussion']) ?>" target="_blank" class="btn btn-sm btn-info">
                                                        View PDF
                                                    </a>
                                                <?php else: ?>
                                                    <span class="text-muted">No PDF</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($row['status'] === 'active'): ?>
                                                    <span class="badge bg-success">Active</span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary">Inactive</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <!-- Toggle Status -->
                                                <form action="functions/toggleChapter.php" method="POST" style="display:inline;">
                                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                    <button type="submit"
                                                        class="btn btn-sm <?= ($row['status'] === 'active') ? 'btn-outline-warning' : 'btn-outline-success' ?>">
                                                        <?= ($row['status'] === 'active') ? 'Deactivate' : 'Activate' ?>
                                                    </button>
                                                </form>

                                                <!-- Edit -->
                                                <button type="button" class="btn btn-sm btn-outline-primary editBtn"
                                                    data-id="<?= $row['id'] ?>"
                                                    data-chapternum="<?= htmlspecialchars($row['chapterNum']) ?>"
                                                    data-title="<?= htmlspecialchars($row['title']) ?>"
                                                    data-description="<?= htmlspecialchars($row['description']) ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editChapterModal">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>

                                                <!-- Delete -->
                                                <form action="functions/deleteChapter.php" method="POST" style="display:inline;"
                                                    onsubmit="return confirm('Are you sure you want to delete this chapter?');">
                                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No chapters found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>


                        <!-- Pagination -->
                        <?php if ($totalPages > 1): ?>
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <!-- Previous -->
                                    <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
                                    </li>

                                    <!-- Page numbers -->
                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                        </li>
                                    <?php endfor; ?>

                                    <!-- Next -->
                                    <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        <?php endif; ?>



                    </div>

                    </br>
                    </br>
                    </br>
                    </br>
                    </br>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h1 class="h3 mb-0">Exams Management</h1>

                        </div>
                        <div class="d-flex gap-2 ">
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addExamModal">
                                <i class="bi bi-plus-lg me-2"></i> Add Exam
                            </button>
                            <!-- Search Bar -->
                            <div class="mb-3">
                                <input type="text" id="examSearch" class="form-control" placeholder="Search exams...">
                            </div>
                        </div>
                    </div>

                    <!-- Stats Cards with Alpine.js -->
                    <div class="row g-3 align-items-end">
                        <!-- <div class="col-md-3"></div> -->

                        <!-- 
                    Central Sterile Chapters Management Table -->


                        <!-- Exams Table -->
<!-- Exams Table -->
<table class="table table-striped" id="examTable">
    <thead>
        <tr>
            <th>Chapter</th>
            <th>Exam Title</th>
            <th>Description</th>
            <th>Time Limit</th>
            <th>Total Items</th>
            <th>Status</th>
            <th>Questions</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Query exams with question count
       $exams = $conn->query("SELECT * FROM exams");

        if ($exams && $exams->num_rows > 0):
            while ($exam = $exams->fetch_assoc()):
        ?>
                <tr>
                    <td>Chapter <?= htmlspecialchars($exam['chapterId'] ?? '') ?></td>
                    <td><?= htmlspecialchars($exam['title'] ?? '') ?></td>
                    <td><?= htmlspecialchars($exam['description'] ?? '') ?></td>
                    <td><?= htmlspecialchars($exam['timeLimit'] ?? '') ?><?= $exam['timeLimit'] ? ' Minutes' : '' ?></td>
                   <td><?= htmlspecialchars($exam['totalItems'] ?? 0) ?></td>

                    <td>
                        <?php if (($exam['status'] ?? '') === 'active'): ?>
                            <span class="badge bg-success">Active</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Inactive</span>
                        <?php endif; ?>
                    </td>

                    <td>
                        <a href="questions.php?examId=<?= $exam['id'] ?>" class="btn btn-sm btn-outline-info">
                            Manage Questions
                        </a>
                    </td>

                    <td>
                        <form action="functions/toggleExam.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $exam['id'] ?>">
                            <button type="submit"
                                class="btn btn-sm <?= ($exam['status'] === 'active') ? 'btn-outline-warning' : 'btn-outline-success' ?>">
                                <?= ($exam['status'] === 'active') ? 'Deactivate' : 'Activate' ?>
                            </button>
                        </form>

                        <form action="functions/deleteExam.php" method="POST" style="display:inline;"
                            onsubmit="return confirm('Delete this exam?');">
                            <input type="hidden" name="id" value="<?= $exam['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>

                        <button type="button" class="btn btn-sm btn-outline-primary editExamBtn"
                            data-id="<?= $exam['id'] ?>"
                            data-chapter="<?= htmlspecialchars($exam['chapterId'] ?? '') ?>"
                            data-title="<?= htmlspecialchars($exam['title'] ?? '') ?>"
                            data-description="<?= htmlspecialchars($exam['description'] ?? '') ?>"
                            data-timelimit="<?= htmlspecialchars($exam['timeLimit'] ?? '') ?>"
                            data-status="<?= htmlspecialchars($exam['status'] ?? '') ?>"
                            data-bs-toggle="modal" data-bs-target="#editExamModal">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </td>
                </tr>
        <?php endwhile;
        else: ?>
            <tr>
                <td colspan="8" class="text-center">No exams found</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>



                        <!-- Pagination -->
                        <?php if ($totalPages > 1): ?>
                            <nav>
                                <ul class="pagination">
                                    <!-- Previous -->
                                    <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?page=<?= $page - 1 ?>#examTable">Previous</a>
                                    </li>

                                    <!-- Page Numbers -->
                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                            <a class="page-link" href="?page=<?= $i ?>#examTable"><?= $i ?></a>
                                        </li>
                                    <?php endfor; ?>

                                    <!-- Next -->
                                    <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?page=<?= $page + 1 ?>#examTable">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        <?php endif; ?>



                    </div>


                </div>
            </main>

            <!-- Footer -->
            <footer class="admin-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-0 text-muted">© 2025 Modern Bootstrap Admin Template</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <p class="mb-0 text-muted">Built with Bootstrap 5.3.7</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div> <!-- /.admin-wrapper -->
        </div>

        <!-- Toast Container -->
        <div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0 p-3" style="z-index: 11">
            <div id="toast-container"></div>
        </div>


        <!-- Icon Demo Modal -->
        <div class="modal fade" id="iconDemoModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Course ID</th>
                                <th>Education Level</th>
                                <th>Course Code</th>
                                <th>Course</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result && $result->num_rows > 0):
                                while ($row = $result->fetch_assoc()):
                            ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['courseId']) ?></td>
                                        <td><?= htmlspecialchars($row['educationLevel']) ?></td>
                                        <td><?= htmlspecialchars($row['courseCode']) ?></td>
                                        <td><?= htmlspecialchars($row['course']) ?></td>
                                        <td>
                                            <!-- Edit button -->
                                            <button type="button"
                                                class="btn btn-sm btn-outline-primary editBtn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editCourseModal"
                                                data-id="<?= $row['courseId'] ?>"
                                                data-education="<?= $row['educationId'] ?>"
                                                data-code="<?= htmlspecialchars($row['courseCode']) ?>"
                                                data-course="<?= htmlspecialchars($row['course']) ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <!-- Delete button (opens modal) -->
                                            <button type="button"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Delete"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteCourseModal"
                                                data-id="<?= $row['courseId'] ?>">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </td>
                                    </tr>
                                <?php
                                endwhile;
                            else:
                                ?>
                                <tr>
                                    <td colspan="5" class="text-center">No courses found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <!-- Pagination Controls -->
                    <?php if ($totalPages > 1): ?>
                        <nav aria-label="Course table pagination">
                            <ul class="pagination justify-content-center">
                                <!-- Previous -->
                                <li class="page-item<?= ($page <= 1) ? ' disabled' : '' ?>">
                                    <a class="page-link" href="?page=<?= $page - 1 ?>" tabindex="-1">Previous</a>
                                </li>
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <li class="page-item<?= ($i == $page) ? ' active' : '' ?>">
                                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>
                                <!-- Next -->
                                <li class="page-item<?= ($page >= $totalPages) ? ' disabled' : '' ?>">
                                    <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                                </li>
                            </ul>
                        </nav>
                    <?php endif; ?>
                </div>
                <div class="col-md-3 text-center">
                    <i class="bi bi-heart icon-xl icon-pulse text-danger"></i>
                    <br><small>Pulse</small>
                </div>
                <div class="col-md-3 text-center">
                    <i class="bi bi-star icon-xl icon-hover text-warning"></i>
                    <br><small>Hover Effect</small>
                </div>
                <div class="col-md-3 text-center">
                    <i class="bi bi-check-circle icon-xl text-success"></i>
                    <br><small>Static</small>
                </div>
            </div>
        </div>
        <div class="modal-footer">

        </div>
        </div>
        </div>
        </div>

<!-- add chapter -->
        <div class="modal fade" id="addChapterModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form action="functions/addChapter.php" method="POST" enctype="multipart/form-data" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Chapter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Chapter #</label>
                            <input type="number" name="chapterNum" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Discussion PDF</label>
                            <input type="file" name="pdfFile" class="form-control" accept="application/pdf" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive" selected>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>


<!-- Edit Exam Modal -->
<div class="modal fade" id="editExamModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="functions/updateExam.php" method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Exam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="editExamId">

                <div class="mb-3">
                    <label class="form-label">Chapter</label>
                    <input type="number" name="chapterId" id="editChapterId" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" id="editExamTitle" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" id="editExamDescription" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Time Limit (minutes)</label>
                    <input type="number" name="timeLimit" id="editTimeLimit" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" id="editStatus" class="form-select" required>
                        <option value="inactive">Inactive</option>
                        <option value="active">Active</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>


        <!-- Delete Course Modal -->
        <div class="modal fade" id="deleteCourseModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form action="functions/delete_course.php" method="POST" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this course?</p>
                        <input type="hidden" name="courseId" id="deleteCourseId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ✅ Single Edit Modal -->
        <div class="modal fade" id="editChapterModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form action="functions/editChapter.php" method="POST" enctype="multipart/form-data" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Chapter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="editId">

                        <div class="mb-3">
                            <label class="form-label">Chapter #</label>
                            <input type="number" name="chapterNum" id="editChapterNum" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" id="editTitle" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="editDescription" class="form-control" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Replace PDF (optional)</label>
                            <input type="file" name="pdfFile" class="form-control" accept="application/pdf">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>


<!-- Edit Exam Modal -->
<div class="modal fade" id="editExamModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="functions/updateExam.php" method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Exam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="editExamId">

                <div class="mb-3">
                    <label class="form-label">Chapter</label>
                    <input type="number" name="chapterId" id="editChapterId" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" id="editExamTitle" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" id="editExamDescription" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Time Limit (minutes)</label>
                    <input type="number" name="timeLimit" id="editTimeLimit" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" id="editStatus" class="form-select" required>
                        <option value="inactive">Inactive</option>
                        <option value="active">Active</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Add Exam Modal -->
<div class="modal fade" id="addExamModal" tabindex="-1" aria-labelledby="addExamModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="functions/addExam.php" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="addExamModalLabel">Add New Exam</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
           <div class="modal-body">
          <!-- Chapter Selection -->
          <div class="mb-3">
            <label for="chapterId" class="form-label">Select Chapter</label>
            <select name="chapterId" id="chapterId" class="form-select" required>
              <option value="">-- Choose Chapter --</option>
              <?php while ($row = $chapters->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>">
                  Chapter <?= htmlspecialchars($row['chapterNum']) ?> — <?= htmlspecialchars($row['title']) ?>
                </option>
              <?php endwhile; ?>
            </select>
          </div>

          <!-- Title -->
          <div class="mb-3">
            <label for="title" class="form-label">Exam Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter exam title" required>
          </div>

          <!-- Description -->
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter exam description"></textarea>
          </div>

          <!-- Status -->
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
            </select>
          </div>

          <!-- Time Limit -->
          <div class="mb-3">
            <label for="timeLimit" class="form-label">Time Limit (in minutes)</label>
            <input type="number" name="timeLimit" id="timeLimit" class="form-control" min="1" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Exam</button>
        </div>
      </form>
    </div>
  </div>
</div>



        <!-- Scripts -->
        <script>
            //edit exam modal population
      document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.editExamBtn').forEach(btn => {
        btn.addEventListener('click', function () {
            document.getElementById('editExamId').value = this.dataset.id;
            document.getElementById('editChapterId').value = this.dataset.chapter;
            document.getElementById('editExamTitle').value = this.dataset.title;
            document.getElementById('editExamDescription').value = this.dataset.description;
            document.getElementById('editTimeLimit').value = this.dataset.timelimit;
            document.getElementById('editStatus').value = this.dataset.status;
        });
    });
});


            // Edit Chapter Modal Population
            document.querySelectorAll('.editBtn').forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('editId').value = this.dataset.id;
                    document.getElementById('editChapterNum').value = this.dataset.chapternum;
                    document.getElementById('editTitle').value = this.dataset.title;
                    document.getElementById('editDescription').value = this.dataset.description;
                });
            });
            //search exam
            document.getElementById("examSearch").addEventListener("keyup", function() {
                let filter = this.value.toLowerCase();
                let rows = document.querySelectorAll("#examTable tbody tr");

                rows.forEach(row => {
                    let text = row.innerText.toLowerCase();
                    row.style.display = text.includes(filter) ? "" : "none";
                });
            });

            //search chapter
            document.getElementById("chapterSearch").addEventListener("keyup", function() {
                let filter = this.value.toLowerCase();
                let rows = document.querySelectorAll("#chapterTable tbody tr");

                rows.forEach(row => {
                    let text = row.innerText.toLowerCase();
                    row.style.display = text.includes(filter) ? "" : "none";
                });
            });
        </script>

        <script>
            // Force reload on browser back navigation to trigger PHP session check
            window.addEventListener("pageshow", function(event) {
                if (event.persisted || (window.performance && window.performance.getEntriesByType("navigation")[0].type === "back_forward")) {
                    window.location.reload();
                }
            });
        </script>
    </body>
</body>

</html>