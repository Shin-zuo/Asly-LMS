<?php

$requiredRole = 'Admin'; // only Admins can access this page
require_once '../../../auth/auth_check.php';

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
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

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ASLY International College Inc">
    <meta name="keywords" content="ASLY, AICI, College, TESDA, Senior High School">
    <meta name="author" content="Shinzuo">
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Modern Bootstrap Admin Template">
    <meta property="og:description" content="Clean and modern admin dashboard template built with Bootstrap 5">
    <meta property="og:type" content="website">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="./assets/ASLYLOGO3.png">
    <link rel="icon" type="image/png" href="./assets/ASLYLOGO3.png">

    <!-- PWA Manifest -->
    <link rel="manifest" href="./assets/manifest-DTaoG9pG.json">
    <script type="module" crossorigin src="./assets/main-BPhDq89w.js"></script>
    <link rel="stylesheet" crossorigin href="./assets/main-D9K-blpF.css">

    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        /* Change active nav link color */
        .nav-link.active {
            color: #ffffff !important;
            /* text color when active */
            background-color: #6366f1 !important;
            /* background color when active */
            border-radius: 0.375rem;
            /* optional: adds rounded corners */
        }

        /* Optional: make hover consistent */
        .nav-link:hover {
            color: #ffffff !important;
            background-color: #6366f1 !important;
        }
    </style>


    <title>Course Management</title>
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

        <!-- Fallback Loading Screen Hide -->
        <script>
            // Hide loading screen after 5 seconds as fallback
            setTimeout(() => {
                const loadingScreen = document.getElementById('loading-screen');
                if (loadingScreen && loadingScreen.style.display !== 'none') {
                    loadingScreen.style.display = 'none';
                }
            }, 5000);
        </script>

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
                            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addUserModal">
                                <i class="bi bi-plus-lg me-2"></i>
                                Add User
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


                        <span>Users</span>
                        <select name="" id="" class="form-select form-select-sm">User Type</select>
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
                                    <th>ID</th>
                                    <th>User Type</th>
                                    <th>Username</th>
                                    <th>User Id</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                // Pagination setup
                                $limit = 10; // rows per page
                                $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
                                $offset = ($page - 1) * $limit;

                                // Get total count
                                $countSql = "SELECT COUNT(*) as total FROM users";
                                $countResult = $conn->query($countSql);
                                $totalRows = ($countResult && $countResult->num_rows > 0) ? $countResult->fetch_assoc()['total'] : 0;
                                $totalPages = ceil($totalRows / $limit);

                                // Fetch paginated courses
                                $sql = "SELECT 
                                u.id AS ID, u.userType AS userType, u.username AS username, u.userId AS userId, u.status,
                                s.id, s.firstName, s.lastName
                                    FROM users u
                                    JOIN students s ON u.userId = s.id
                                    ORDER BY u.id DESC
                                    LIMIT $limit OFFSET $offset";
                                $result = $conn->query($sql);

                                if ($result && $result->num_rows > 0):
                                    while ($row = $result->fetch_assoc()):
                                ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['ID']) ?></td>
                                            <td><?= htmlspecialchars($row['userType']) ?></td>
                                            <td><?= htmlspecialchars($row['username']) ?></td>
                                            <td><?= htmlspecialchars($row['userId']) ?></td>
                                            <td><?= htmlspecialchars($row['status']) ?></td>
                                            <td>
                                                <!-- Edit button -->
                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-outline-primary editBtn"
                                                    style="border-radius: 10px; padding: 2px 8px;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editCourseModal"
                                                    data-id="<?= $row['ID'] ?>">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <!-- Delete button (opens modal) -->
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Delete"
                                                    style="border-radius: 10px; padding: 2px 8px;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteCourseModal"
                                                    data-id="<?= $row['ID'] ?>">
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                            </td>
                                        </tr>
                                    <?php
                                    endwhile;
                                else:
                                    ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No users00 found</td>
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
                            <p class="mb-0 text-muted">© 2025 ASLY International College Inc.</p>
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
      
        <div class="modal-footer">

        </div>
        </div>
        </div>
        </div>

        <!-- Edit Course Modal -->
        <div class="modal fade" id="editCourseModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form action="functions/update_course.php" method="POST" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
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
                            <label for="editCourseCode" class="form-label">Username</label>
                            <input type="text" name="courseCode" id="editCourseCode" class="form-control" required>
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