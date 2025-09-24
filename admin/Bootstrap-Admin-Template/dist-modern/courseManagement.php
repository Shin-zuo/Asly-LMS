<?php

session_start();
require_once '../../../config/database.php';

// Handle Add Course
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addCourse'])) {
    $educationId = $_POST['educationId'];
    $courseCode  = trim($_POST['courseCode']);
    $course      = trim($_POST['course']);

    if (!empty($educationId) && !empty($courseCode) && !empty($course)) {
        $sql = "INSERT INTO course (educationId, courseCode, course) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $educationId, $courseCode, $course);

        if ($stmt->execute()) {
            echo "<script>alert('Course added successfully!'); window.location.href='courseManagement.php';</script>";
            exit();
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('All fields are required!');</script>";
    }
}



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
                            <h1 class="h3 mb-0">Dashboard</h1>
                            <p class="text-muted mb-0">Welcome back! Here's what's happening.</p>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addCourseModal">
                                <i class="bi bi-plus-lg me-2"></i>
                                Add Course
                            </button>
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-toggle="tooltip"
                                title="Refresh data">
                                <i class="bi bi-arrow-clockwise icon-hover"></i>
                            </button>
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-toggle="tooltip"
                                title="Export data">
                                <i class="bi bi-download icon-hover"></i>
                            </button>
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-toggle="tooltip"
                                title="Settings">
                                <i class="bi bi-gear icon-hover"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Stats Cards with Alpine.js -->
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3"></div>


                        <span>Courses</span>
                        <!-- Success/Error alerts -->
                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $_SESSION['success'];
                                unset($_SESSION['success']); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php elseif (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $_SESSION['error'];
                                unset($_SESSION['error']); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

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
                                $sql = "SELECT c.courseId, e.educationLevel, c.courseCode, c.course, c.educationId 
                FROM course c
                JOIN educationlevel e ON c.educationId = e.id";
                                $result = $conn->query($sql);

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
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="bi bi-palette me-2"></i>
                            Icon System Demo
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" x-data="iconDemo">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6>Current Provider: <span class="badge bg-primary" x-text="currentProvider"></span></h6>
                                <div class="btn-group" role="group">
                                    <button type="button"
                                        class="btn btn-outline-primary"
                                        @click="switchProvider('bootstrap')"
                                        :class="{ 'active': currentProvider === 'bootstrap' }">
                                        Bootstrap Icons
                                    </button>
                                    <button type="button"
                                        class="btn btn-outline-primary"
                                        @click="switchProvider('lucide')"
                                        :class="{ 'active': currentProvider === 'lucide' }">
                                        Lucide Icons
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-3 text-center">
                                <div class="p-3 border rounded">
                                    <i class="bi bi-speedometer2 icon-xl text-primary mb-2"></i>
                                    <br><small>Dashboard</small>
                                </div>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="p-3 border rounded">
                                    <i class="bi bi-people icon-xl text-success mb-2"></i>
                                    <br><small>Users</small>
                                </div>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="p-3 border rounded">
                                    <i class="bi bi-graph-up icon-xl text-info mb-2"></i>
                                    <br><small>Analytics</small>
                                </div>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="p-3 border rounded">
                                    <i class="bi bi-gear icon-xl text-warning mb-2"></i>
                                    <br><small>Settings</small>
                                </div>
                            </div>
                        </div>

                        <h6 class="mt-4">Icon Animations</h6>
                        <div class="row g-3">
                            <div class="col-md-3 text-center">
                                <i class="bi bi-arrow-clockwise icon-xl icon-spin text-primary"></i>
                                <br><small>Spin</small>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x me-2"></i>Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Course Modal -->
        <div class="modal fade" id="editCourseModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form action="functions/update_course.php" method="POST" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="courseId" id="editCourseId">

                        <div class="mb-3">
                            <label for="editEducationId" class="form-label">Education Level</label>
                            <select name="educationId" id="editEducationId" class="form-select" required>
                                <?php
                                $eduRes = $conn->query("SELECT id, educationLevel FROM educationlevel");
                                while ($edu = $eduRes->fetch_assoc()):
                                ?>
                                    <option value="<?= $edu['id'] ?>"><?= htmlspecialchars($edu['educationLevel']) ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="editCourseCode" class="form-label">Course Code</label>
                            <input type="text" name="courseCode" id="editCourseCode" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="editCourseName" class="form-label">Course Name</label>
                            <input type="text" name="course" id="editCourseName" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
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


        <!-- Add Course Modal -->
        <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form method="post" action="courseManagement.php">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCourseLabel">Add Course</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Education Level -->
                            <div class="mb-3">
                                <label for="educationId" class="form-label">Education Level</label>
                                <select class="form-select" name="educationId" id="educationId" required>
                                    <option value="">-- Select Education Level --</option>
                                    <?php
                                    $res = $conn->query("SELECT id, educationLevel FROM educationlevel");
                                    while ($row = $res->fetch_assoc()):
                                    ?>
                                        <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['educationLevel']) ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <!-- Course Code -->
                            <div class="mb-3">
                                <label for="courseCode" class="form-label">Course Code</label>
                                <input type="text" class="form-control" name="courseCode" id="courseCode" required>
                            </div>

                            <!-- Course Name -->
                            <div class="mb-3">
                                <label for="course" class="form-label">Course Name</label>
                                <input type="text" class="form-control" name="course" id="course" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="addCourse" class="btn btn-success">
                                <i class="bi bi-check-circle me-2"></i> Save
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="bi bi-x-circle me-2"></i> Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Scripts -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const toggleButton = document.querySelector('[data-sidebar-toggle]');
                const wrapper = document.getElementById('admin-wrapper');

                if (toggleButton && wrapper) {
                    // Set initial state from localStorage
                    const isCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';
                    if (isCollapsed) {
                        wrapper.classList.add('sidebar-collapsed');
                        toggleButton.classList.add('is-active');
                    }

                    // Attach click listener
                    toggleButton.addEventListener('click', () => {
                        const isCurrentlyCollapsed = wrapper.classList.contains('sidebar-collapsed');

                        if (isCurrentlyCollapsed) {
                            wrapper.classList.remove('sidebar-collapsed');
                            toggleButton.classList.remove('is-active');
                            localStorage.setItem('sidebar-collapsed', 'false');
                        } else {
                            wrapper.classList.add('sidebar-collapsed');
                            toggleButton.classList.add('is-active');
                            localStorage.setItem('sidebar-collapsed', 'true');
                        }
                    });
                }
            });

            // Edit Course Modal Population
            document.addEventListener('DOMContentLoaded', function() {
                const editBtns = document.querySelectorAll('.editBtn');
                const editCourseId = document.getElementById('editCourseId');
                const editEducationId = document.getElementById('editEducationId');
                const editCourseCode = document.getElementById('editCourseCode');
                const editCourseName = document.getElementById('editCourseName');

                editBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        editCourseId.value = this.dataset.id;
                        editEducationId.value = this.dataset.education;
                        editCourseCode.value = this.dataset.code;
                        editCourseName.value = this.dataset.course;
                    });
                });
            });

            const deleteModal = document.getElementById('deleteCourseModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const courseId = button.getAttribute('data-id');
                document.getElementById('deleteCourseId').value = courseId;
            });
        </script>
    </body>
</body>

</html>