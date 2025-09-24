<?php

session_start();
require_once '../../../config/database.php';

// Fetch enrollees
$sql = "SELECT id, firstName, middleInitial, lastName, email, courseId, dateEnrolled 
        FROM enrollees";
$result = $conn->query($sql);


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


                        <span>Enrollees</span>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Date Enrolled</th>
                                    <th>Actions</th> <!-- New column -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($result && $result->num_rows > 0): ?>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['id']) ?></td>
                                            <td>
                                                <?= htmlspecialchars($row['firstName'] . ' ' . $row['middleInitial'] . '. ' . $row['lastName']) ?>
                                            </td>
                                            <td><?= htmlspecialchars($row['email']) ?></td>
                                            <td><?= htmlspecialchars($row['courseId']) ?></td>
                                            <td><?= htmlspecialchars($row['dateEnrolled']) ?></td>
                                            <td>
                                                <!-- Accept Button -->
                                                <a href="accept.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">
                                                    Accept
                                                </a>
                                                <!-- Delete Button -->
                                                <a href="delete.php?id=<?= $row['id'] ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this enrollee?');">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No enrollees found</td>
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
        </script>
    </body>
</body>

</html>