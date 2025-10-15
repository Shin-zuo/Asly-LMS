<?php

$requiredRole = 'Admin'; // only Admins can access this page
require_once '../../../auth/auth_check.php';

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require_once '../../../config/database.php';



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
                            <h1 class="h3 mb-0">Subject Management</h1>
                       
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addSubjectModal">
                                <i class="bi bi-plus-lg me-2"></i>
                                Add Subject
                            </button>
                            <button type="button"
                                class="btn btn-outline-secondary"
                                data-bs-toggle="tooltip"
                                title="Refresh data"
                                onclick="location.reload();">
                                <i class="bi bi-arrow-clockwise icon-hover"></i>
                            </button>


                        </div>
                    </div>

                    <!-- Stats Cards with Alpine.js -->
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3"></div>

                        <!-- Success/Error Alerts -->
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

                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger"> <?= htmlspecialchars($_GET['error']) ?></div>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= htmlspecialchars($_SESSION['success']) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php unset($_SESSION['success']);
                        endif; ?>

                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= htmlspecialchars($_SESSION['error']) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php unset($_SESSION['error']);
                        endif; ?>


                        <span>Senior High School Subjects</span>

                        <table class="table table-striped ">
                            <thead class="">
                                <tr>
                                    <th>id</th>
                                    <th>Subject</th>
                                    <th>Course Code</th>
                                    <th>Education Level</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql = "SELECT 
    s.id,
    s.subject,
    s.courseCode,
    s.educationId,
    s.description,
    e.educationLevel
FROM subjects AS s
LEFT JOIN educationlevel AS e 
    ON s.educationId = e.id
WHERE e.educationLevel = 'Senior High School';";
                                $result = $conn->query($sql);


                                $result = $conn->query($sql);
                                $i = 1;

                                while ($row = $result->fetch_assoc()):
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= htmlspecialchars($row['subject']) ?></td>
                                        <td><?= htmlspecialchars($row['courseCode']); ?></td>
                                        <td><?= htmlspecialchars($row['educationLevel']) ?></td>
                                        <td><?= htmlspecialchars($row['description']) ?></td>

                                        <td>
                                            <!-- ✅ Edit Button -->
                                            <button type="button" class="btn btn-sm btn-outline-primary editBtn"
                                                data-id="<?= $row['id'] ?>"
                                                data-subject="<?= htmlspecialchars($row['subject']) ?>"
                                                data-code="<?= htmlspecialchars($row['courseCode']) ?>"
                                                data-educationId="<?= htmlspecialchars($row['educationId']) ?>"
                                                data-description="<?= htmlspecialchars($row['description']) ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editSubjectModal">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <!-- ✅ Delete Button -->
                                            <form action="functions/deleteSubject.php" method="POST" style="display:inline;"
                                                onsubmit="return confirm('Are you sure you want to delete this subject?');">
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>


                    </div>


                </div>

                <div class="container-fluid p-4 p-lg-5">
                    <div class="row g-3 align-items-end">
                        <span>College Subjects</span>
                        <table class="table table-striped ">
                            <thead class="">
                                <tr>
                                    <th>id</th>
                                    <th>Subject</th>
                                    <th>Course Code</th>
                                    <th>Education Level</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql = "SELECT 
    s.id,
    s.subject,
    s.courseCode,
    s.educationId,
    s.description,
    e.educationLevel
FROM subjects AS s
LEFT JOIN educationlevel AS e 
    ON s.educationId = e.id
WHERE e.educationLevel = 'College';";
                                $result = $conn->query($sql);


                                $result = $conn->query($sql);
                                $i = 1;

                                while ($row = $result->fetch_assoc()):
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= htmlspecialchars($row['subject']) ?></td>
                                        <td><?= htmlspecialchars($row['courseCode']); ?></td>
                                        <td><?= htmlspecialchars($row['educationLevel']) ?></td>
                                        <td><?= htmlspecialchars($row['description']) ?></td>

                                        <td>
                                            <!-- ✅ Edit Button -->
                                            <button type="button" class="btn btn-sm btn-outline-primary editBtn"
                                                data-id="<?= $row['id'] ?>"
                                                data-subject="<?= htmlspecialchars($row['subject']) ?>"
                                                data-code="<?= htmlspecialchars($row['courseCode']) ?>"
                                                data-educationId="<?= htmlspecialchars($row['educationId']) ?>"
                                                data-description="<?= htmlspecialchars($row['description']) ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editSubjectModal">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <!-- ✅ Delete Button -->
                                            <form action="functions/deleteSubject.php" method="POST" style="display:inline;"
                                                onsubmit="return confirm('Are you sure you want to delete this subject?');">
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>



                <!-- add subject modal -->
                <div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="functions/addSubject.php" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addSubjectModalLabel">Add New Subject</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label">Subject Name</label>
                                        <input type="text" class="form-control" name="subjectName" id="subjectName" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="middleName" class="form-label">Course Code</label>
                                        <input type="text" class="form-control" name="courseCode" id="courseCode">
                                    </div>
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
                                    <div class="mb-3">
                                        <label for="middleName" class="form-label">Description</label>
                                        <input type="text" class="form-control" name="description" id="description">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Subject</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- edit subject modal -->
                <div class="modal fade" id="editSubjectModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="functions/update_subject.php" method="POST" class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Course</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="courseId" id="editCourseId">

                                <div class="mb-3">
                                    <label for="editCourseCode" class="form-label">Subject</label>
                                    <input type="text" name="courseCode" id="editSubjectName" class="form-control" required>
                                </div>


                                <div class="mb-3">
                                    <label for="editCourseCode" class="form-label">Course Code</label>
                                    <input type="text" name="courseCode" id="editCourseCode" class="form-control" required>
                                </div>

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
                                    <label for="editCourseName" class="form-label">Description</label>
                                    <input type="text" name="course" id="editDescription" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
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

            // Edit Subject Modal Population
            document.addEventListener('DOMContentLoaded', function() {
                const editBtns = document.querySelectorAll('.editBtn');

                // Get modal input fields
                const editCourseId = document.getElementById('editCourseId');
                const editSubjectName = document.getElementById('editSubjectName');
                const editCourseCode = document.getElementById('editCourseCode');
                const editEducationId = document.getElementById('editEducationId');
                const editDescription = document.getElementById('editDescription');

                // Loop through all edit buttons
                editBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        // Populate modal fields with data attributes from the clicked button
                        editCourseId.value = this.dataset.id;
                        editSubjectName.value = this.dataset.subject;
                        editCourseCode.value = this.dataset.code;
                        editEducationId.value = this.dataset.educationId;
                        editDescription.value = this.dataset.description;
                    });
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