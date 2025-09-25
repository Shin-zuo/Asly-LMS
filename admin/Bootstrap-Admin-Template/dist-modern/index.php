<?php

$requiredRole = 'Admin'; // only Admins can access this page
require_once '../../../auth/auth_check.php';

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// If no active session, try auto-login with remember_token
if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_token'])) {
    $token = $_COOKIE['remember_token'];

    $sql = "SELECT ut.user_id, u.username, u.userType
            FROM user_tokens ut
            JOIN users u ON ut.user_id = u.id
            WHERE ut.token = ? AND ut.expires_at > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Restore session
        $_SESSION['user_id']  = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['userType'] = $user['userType'];
    }
}

// If still no session, force login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../auth/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Modern Bootstrap 5 Admin Template - Clean, responsive dashboard">
    <meta name="keywords" content="bootstrap, admin, dashboard, template, modern, responsive">
    <meta name="author" content="Bootstrap Admin Template">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Modern Bootstrap Admin Template">
    <meta property="og:description" content="Clean and modern admin dashboard template built with Bootstrap 5">
    <meta property="og:type" content="website">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="./assets/favicon-CvUZKS4z.svg">
    <link rel="icon" type="image/png" href="./assets/favicon-B_cwPWBd.png">
    
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Title -->
    <title>Dashboard - Modern Bootstrap Admin</title>
    
    <!-- Theme Color -->
    <meta name="theme-color" content="#6366f1">
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="./assets/manifest-DTaoG9pG.json">
  <script type="module" crossorigin src="./assets/main-BPhDq89w.js"></script>
  <link rel="stylesheet" crossorigin href="./assets/main-D9K-blpF.css">
</head>

<body data-page="dashboard" class="admin-layout">
    <!-- Loading Screen -->
    <div id="loading-screen" class="loading-screen">
        <div class="loading-spinner">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    
  <?php if (isset($_SESSION['welcome_msg'])): ?>
    <script>
      alert("<?= htmlspecialchars($_SESSION['welcome_msg']); ?>");
    </script>
    <?php unset($_SESSION['welcome_msg']); // clear after showing ?>
  <?php endif; ?>

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
                <div class="row g-4 mb-4">
                    <div class="col-xl-3 col-lg-6" x-data="statsCounter(12426, 5)">
                        <div class="card stats-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                                            <i class="bi bi-people"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 text-muted">Total Users</h6>
                                        <h3 class="mb-0" x-text="value.toLocaleString()" data-stat-value>12,426</h3>
                                        <small class="text-success">
                                            <i class="bi bi-arrow-up"></i> +12.5%
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6">
                        <div class="card stats-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="stats-icon bg-success bg-opacity-10 text-success">
                                            <i class="bi bi-graph-up"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 text-muted">Revenue</h6>
                                        <h3 class="mb-0">$54,320</h3>
                                        <small class="text-success">
                                            <i class="bi bi-arrow-up"></i> +8.2%
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6">
                        <div class="card stats-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                                            <i class="bi bi-bag-check"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 text-muted">Orders</h6>
                                        <h3 class="mb-0">1,852</h3>
                                        <small class="text-danger">
                                            <i class="bi bi-arrow-down"></i> -2.1%
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6">
                        <div class="card stats-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="stats-icon bg-info bg-opacity-10 text-info">
                                            <i class="bi bi-clock-history"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 text-muted">Avg. Response</h6>
                                        <h3 class="mb-0">2.3s</h3>
                                        <small class="text-success">
                                            <i class="bi bi-arrow-up"></i> +5.4%
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart Section -->
                <div class="row g-4 mb-4">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Revenue Overview</h5>
                                <div class="btn-group btn-group-sm" role="group">
                                    <button type="button" class="btn btn-outline-primary active" data-chart-period="7d">7D</button>
                                    <button type="button" class="btn btn-outline-primary" data-chart-period="30d">30D</button>
                                    <button type="button" class="btn btn-outline-primary" data-chart-period="90d">90D</button>
                                    <button type="button" class="btn btn-outline-primary" data-chart-period="1y">1Y</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="revenueChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Recent Activity</h5>
                            </div>
                            <div class="card-body">
                                <div class="activity-feed">
                                    <div class="activity-item">
                                        <div class="activity-icon bg-primary bg-opacity-10 text-primary">
                                            <i class="bi bi-person-plus"></i>
                                        </div>
                                        <div class="activity-content">
                                            <p class="mb-1">New user registered</p>
                                            <small class="text-muted">2 minutes ago</small>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-icon bg-success bg-opacity-10 text-success">
                                            <i class="bi bi-bag-check"></i>
                                        </div>
                                        <div class="activity-content">
                                            <p class="mb-1">Order #1234 completed</p>
                                            <small class="text-muted">5 minutes ago</small>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-icon bg-warning bg-opacity-10 text-warning">
                                            <i class="bi bi-exclamation-triangle"></i>
                                        </div>
                                        <div class="activity-content">
                                            <p class="mb-1">Server maintenance scheduled</p>
                                            <small class="text-muted">1 hour ago</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Charts Row -->
                <div class="row g-4 mb-4">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">User Growth (Last 7 Days)</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="userGrowthChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Order Status Distribution</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="orderStatusChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- New Widgets Row -->
                <div class="row g-4 mb-4">
                    <!-- Recent Orders -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Recent Orders</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Customer</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="recent-orders-table">
                                            <!-- Orders will be injected here by dashboard.js -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Storage Status -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Storage Status</h5>
                            </div>
                            <div class="card-body">
                                <div id="storageStatusChart"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sales by Location -->
                <div class="row g-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Sales by Location</h5>
                            </div>
                            <div class="card-body">
                                <div id="salesByLocationChart" style="min-height: 400px; width: 100%;"></div>
                            </div>
                        </div>
                    </div>
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
    <script>

        //clear cache on browser
if (window.history && window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
  window.onpopstate = function() {
    window.location.href = '../../../auth/login.php'; // redirect to login
  };
}
</script>
</body>
<script>
// Force reload on browser back navigation to trigger PHP session check
window.addEventListener("pageshow", function(event) {
    if (event.persisted || (window.performance && window.performance.getEntriesByType("navigation")[0].type === "back_forward")) {
        window.location.reload();
    }   
});
</script>
</html>