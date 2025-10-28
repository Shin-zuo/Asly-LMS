<?php

$requiredRole = 'Admin'; // only Admins can access this page
require_once '../../../auth/auth_check.php';

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require_once '../../../config/database.php';

// Fetch enrollees
// Pagination setup
$limit = 10; // rows per page
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $limit;

// Search logic
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$where = '';
if ($search !== '') {
    $searchEsc = $conn->real_escape_string($search);
    $where = "WHERE (
        s.firstName LIKE '%$searchEsc%' OR
        s.middleName LIKE '%$searchEsc%' OR
        s.lastName LIKE '%$searchEsc%' OR
        c.course LIKE '%$searchEsc%' OR
        s.section LIKE '%$searchEsc%' OR
        s.yearLevel LIKE '%$searchEsc%'
    )";
}

// Get total count (with search)
$countSql = "SELECT COUNT(*) as total 
             FROM students s 
             LEFT JOIN course c ON s.courseId = c.courseId 
             $where";
$countResult = $conn->query($countSql);
$totalRows = ($countResult && $countResult->num_rows > 0) ? $countResult->fetch_assoc()['total'] : 0;
$totalPages = ceil($totalRows / $limit);

// Fetch paginated students (with search + join for course name)
    $sql = "SELECT 
                s.id AS sid, 
                s.firstName, 
                s.middleName, 
                s.lastName, 
                s.section AS Section, 
                s.courseId,
                
                s.email,
                s.contactNumber,
                s.lastSchoolAttended,
                s.lastSchoolYr,
                s.birthDate,
                s.gender,
                s.dateEnrolled,
                s.educationalAttainment,
                s.yrLevel,
                s.studentType,
                c.course AS courseName,
                ea.id ,
                ea.educationLevel AS educationLevel,
                yl.id,
                yl.yearLevel AS yearLevel,
                yl.yearName AS yearName
            FROM students s
            LEFT JOIN course c ON s.courseId = c.courseId
            LEFT JOIN educationlevel ea ON s.educationalAttainment = ea.id
            LEFT Join yearlevel yl ON s.yrLevel = yl.id
            $where
            ORDER BY s.id DESC 
            LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);
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

                        <!-- Search Bar for Enrollees -->

                        <form class="d-flex" method="get" action="userManagement.php">
                            <div class="mb-3">
                                <input type="text" id="enrolleeSearch" class="form-control" placeholder="Search enrollees...">
                            </div>

                        </form>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary">
                                <i class="bi bi-plus-lg me-2"></i>
                                New Item
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

<!-- Student's table -->
                        <span>Students</span>

                        
<table class="table table-striped" id="enrolleeTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Section</th>
            <th>Year Level</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php $modals = ''; ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['sid']) ?></td>
                    <td>
                        <?= htmlspecialchars($row['firstName'] . ' ' . substr($row['middleName'], 0, 1) . '. ' . $row['lastName']) ?>
                    </td>
                    <td><?= htmlspecialchars($row['Section'] ?? '') ?></td>
                    <td><?= htmlspecialchars($row['yearName'] ?? '') ?></td>
                    <td><?= htmlspecialchars($row['courseName'] ?? '') ?></td>
                    <td>
                        

                        <button type="button" class="btn btn-sm btn-outline-danger" title="Delete"
                            onclick="if(confirm('Are you sure you want to delete this enrollee?')) window.location.href='delete.php?id=<?= $row['sid'] ?>';">
                            <i class="bi bi-trash"></i>
                        </button>

                        <button type="button" class="btn btn-outline-primary btn-sm"
                            data-bs-toggle="modal" data-bs-target="#viewModal<?= $row['id'] ?>" title="View">
                            <i class="bi bi-eye"></i>
                        </button>
                    </td>
                </tr>

                <?php
                // build modal
                $modals .= '
                <div class="modal fade" id="viewModal' . $row['id'] . '" tabindex="-1" aria-labelledby="viewModalLabel' . $row['id'] . '" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Enrollee Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>ID:</strong> ' . htmlspecialchars($row['sid']) . '</li>
                                    <li class="list-group-item"><strong>First Name:</strong> ' . htmlspecialchars($row['firstName']) . '</li>
                                    <li class="list-group-item"><strong>Middle Name:</strong> ' . htmlspecialchars($row['middleName']) . '</li>
                                    <li class="list-group-item"><strong>Last Name:</strong> ' . htmlspecialchars($row['lastName']) . '</li>
                                    <li class="list-group-item"><strong>Email:</strong> ' . htmlspecialchars($row['email']) . '</li>
                                    <li class="list-group-item"><strong>Contact Number:</strong> ' . htmlspecialchars($row['contactNumber']) . '</li>
                                    <li class="list-group-item"><strong>Last School Attended:</strong> ' . htmlspecialchars($row['lastSchoolAttended']) . '</li>
                                    <li class="list-group-item"><strong>Last School Year:</strong> ' . htmlspecialchars($row['lastSchoolYr']) . '</li>
                                    <li class="list-group-item"><strong>Birth Date:</strong> ' . htmlspecialchars($row['birthDate']) . '</li>
                                    <li class="list-group-item"><strong>Gender:</strong> ' . htmlspecialchars($row['gender']) . '</li>
                                    <li class="list-group-item"><strong>Date Enrolled:</strong> ' . htmlspecialchars($row['dateEnrolled']) . '</li>
                                    <li class="list-group-item"><strong>Course:</strong> ' . htmlspecialchars($row['courseName']) . '</li>
                                    <li class="list-group-item"><strong>Educational Attainment:</strong> ' . htmlspecialchars($row['educationalAttainment']) . '</li>
                                    
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>';
                ?>
            <?php endwhile; ?>
            <?= $modals ?>
        <?php else: ?>
            <tr><td colspan="6" class="text-center">No enrollees found</td></tr>
        <?php endif; ?>
    </tbody>
</table>


                        <!-- Pagination Controls -->
                        <?php if ($totalPages > 1): ?>
                            <nav aria-label="Enrollee table pagination">
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

                        <?php if (!empty($modals)) echo $modals; ?>
                    </div>

                    
                    <div class="row g-3 align-items-end">

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

            document.getElementById("enrolleeSearch").addEventListener("keyup", function() {
                let filter = this.value.toLowerCase();
                let rows = document.querySelectorAll("#enrolleeTable tbody tr");

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