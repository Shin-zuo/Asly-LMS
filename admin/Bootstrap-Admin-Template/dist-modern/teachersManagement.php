<?php

$requiredRole = 'Admin'; // only Admins can access this page
require_once '../../../auth/auth_check.php';

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require_once '../../../config/database.php';
0



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
                            <h1 class="h3 mb-0">Teachers Management</h1>
            
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTeacherModal">
                                <i class="bi bi-plus-lg me-2"></i>
                                Add Teacher
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


                        <span>Teachers</span>
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

                        <?php if (isset($_SESSION['success'])): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= htmlspecialchars($_SESSION['success']) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php unset($_SESSION['success']); endif; ?>

<?php if (isset($_SESSION['error'])): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= htmlspecialchars($_SESSION['error']) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php unset($_SESSION['error']); endif; ?>

<table class="table table-striped ">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Employee ID</th>
            <th>Teacher Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $sql = "SELECT `id`, `firstName`, `middleName`, `lastName`, `employeeId`, `status` FROM `teachers`";
        $result = $conn->query($sql);
        $i = 1;

        while ($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($row['employeeId']) ?></td>
                <td>
    <?php
    $middleInitial = !empty($row['middleName']) ? strtoupper(substr($row['middleName'], 0, 1)) . '.' : '';
    echo htmlspecialchars(trim($row['firstName'] . ' ' . $middleInitial . ' ' . $row['lastName']));
    ?>
</td>
                <td>
                    <span class="badge <?= $row['status'] === 'active' ? 'bg-success' : 'bg-secondary' ?>">
                        <?= ucfirst($row['status']) ?>
                    </span>
                </td>
                <td>
                    <!-- ✅ Toggle Status -->
                    <form action="functions/updateTeacherStatus.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="status"
                            value="<?= ($row['status'] === 'active') ? 'inactive' : 'active' ?>">
                        <button type="submit"
                            class="btn btn-sm <?= ($row['status'] === 'active') ? 'btn-outline-warning' : 'btn-outline-success' ?>">
                            <?= ($row['status'] === 'active') ? 'Deactivate' : 'Activate' ?>
                        </button>
                    </form>

                    <!-- ✅ Edit Button -->
                    <button type="button" class="btn btn-sm btn-outline-primary editBtn"
                        data-id="<?= $row['id'] ?>"
                        data-firstname="<?= htmlspecialchars($row['firstName']) ?>"
                        data-middlename="<?= htmlspecialchars($row['middleName']) ?>"
                        data-lastname="<?= htmlspecialchars($row['lastName']) ?>"
                        data-employeeid="<?= htmlspecialchars($row['employeeId']) ?>"
                        data-bs-toggle="modal"
                        data-bs-target="#editTeacherModal">
                        <i class="bi bi-pencil-square"></i>
                    </button>

                    <!-- ✅ Delete Button -->
<form action="functions/deleteTeacher.php" method="POST" style="display:inline;"
    onsubmit="return confirm('Are you sure you want to delete this teacher?');">
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


<!-- add teacher modal -->
                <div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="addTeacherModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="functions/addTeacher.php" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addTeacherModalLabel">Add New Teacher</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="firstName" id="firstName" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="middleName" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" name="middleName" id="middleName">
                                    </div>

                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="lastName" id="lastName" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="employeeId" class="form-label">Employee ID</label>
                                        <input type="text" class="form-control" name="employeeId" id="employeeId" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" name="status" id="status" required>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Teacher</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
<!-- edit teacher modal -->

<!-- ✅ Edit Teacher Modal -->
<div class="modal fade" id="editTeacherModal" tabindex="-1" aria-labelledby="editTeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="functions/updateTeacher.php" method="POST" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editTeacherModalLabel">Edit Teacher</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="editTeacherId">

                <div class="mb-3">
                    <label class="form-label">Employee ID</label>
                    <input type="text" class="form-control" name="employeeId" id="editEmployeeId" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="firstName" id="editFirstName" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Middle Name <small class="text-muted">(optional)</small></label>
                    <input type="text" class="form-control" name="middleName" id="editMiddleName">
                </div>

                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lastName" id="editLastName" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
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



        <div class="modal-footer">

        </div>
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

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('.toggleStatusBtn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        const newStatus = this.getAttribute('data-status');
                        const button = this;

                        fetch('updateTeacherStatus.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: `id=${id}&status=${newStatus}`
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    const row = button.closest('tr');
                                    const statusCell = row.querySelector('td:nth-child(4) span');
                                    statusCell.textContent = data.newStatus;
                                    statusCell.className = `badge ${data.newStatus === 'Active' ? 'bg-success' : 'bg-secondary'}`;

                                    // Update button appearance
                                    if (data.newStatus === 'Active') {
                                        button.className = 'btn btn-sm btn-outline-warning toggleStatusBtn';
                                        button.setAttribute('title', 'Deactivate');
                                        button.setAttribute('data-status', 'Inactive');
                                        button.innerHTML = '<i class="bi bi-x-circle"></i>';
                                    } else {
                                        button.className = 'btn btn-sm btn-outline-success toggleStatusBtn';
                                        button.setAttribute('title', 'Activate');
                                        button.setAttribute('data-status', 'Active');
                                        button.innerHTML = '<i class="bi bi-check-circle"></i>';
                                    }

                                    // Toast notification
                                    const toast = document.createElement('div');
                                    toast.className = 'alert alert-success position-fixed top-0 end-0 m-3';
                                    toast.style.zIndex = '1050';
                                    toast.textContent = data.message;
                                    document.body.appendChild(toast);
                                    setTimeout(() => toast.remove(), 2500);
                                } else {
                                    alert(data.message || 'Something went wrong.');
                                }
                            })
                            .catch(() => alert('Failed to connect to server.'));
                    });
                });
            });

            //edit modal trigger
          document.querySelectorAll('.editBtn').forEach(button => {
    button.addEventListener('click', function() {
        document.getElementById('editTeacherId').value = this.dataset.id;
        document.getElementById('editFirstName').value = this.dataset.firstname;
        document.getElementById('editMiddleName').value = this.dataset.middlename;
        document.getElementById('editLastName').value = this.dataset.lastname;
        document.getElementById('editEmployeeId').value = this.dataset.employeeid;
    });
});
        </script>
    </body>
</body>

</html>