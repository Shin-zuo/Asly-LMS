<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Dashboard - Modern Bootstrap Admin</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Comprehensive analytics dashboard with advanced charts, KPIs, and data visualizations">
    <meta name="keywords" content="bootstrap, admin, dashboard, analytics, charts, data visualization">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="./assets/favicon-CvUZKS4z.svg">
    <link rel="icon" type="image/png" href="./assets/favicon-B_cwPWBd.png">
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="./assets/manifest-DTaoG9pG.json">
    
    <!-- Preload critical fonts -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" as="style">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- ApexCharts CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
    <!-- Custom Styles for Analytics Dashboard -->
  <script type="module" crossorigin src="./assets/main-BPhDq89w.js"></script>
  <script type="module" crossorigin src="./assets/analytics-C7yvD7Vh.js"></script>
  <link rel="stylesheet" crossorigin href="./assets/main-D9K-blpF.css">
</head>

<body data-page="analytics" class="analytics-page">
    <!-- Admin App Container -->
    <div class="admin-app">
        <div class="admin-wrapper" id="admin-wrapper">
                        <?php include 'topAndSidebar.php'; ?>

            <!-- Main Content -->
            <main class="admin-main">
                <div class="container-fluid p-4 p-lg-5">
                    
                    <!-- Page Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4 mb-lg-5">
                        <div>
                            <h1 class="h3 mb-0">Analytics Dashboard</h1>
                            <p class="text-muted mb-0">Comprehensive insights and performance metrics</p>
                        </div>
                        <div class="d-flex gap-2">
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="dateRange" id="today" autocomplete="off" checked>
                                <label class="btn btn-outline-secondary btn-sm" for="today">Today</label>
                                <input type="radio" class="btn-check" name="dateRange" id="week" autocomplete="off">
                                <label class="btn btn-outline-secondary btn-sm" for="week">7D</label>
                                <input type="radio" class="btn-check" name="dateRange" id="month" autocomplete="off">
                                <label class="btn btn-outline-secondary btn-sm" for="month">30D</label>
                                <input type="radio" class="btn-check" name="dateRange" id="quarter" autocomplete="off">
                                <label class="btn btn-outline-secondary btn-sm" for="quarter">90D</label>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm" @click="exportData()">
                                <i class="bi bi-download me-2"></i>Export Report
                            </button>
                        </div>
                    </div>

                    <!-- Analytics Dashboard Container -->
                    <div x-data="analyticsComponent" x-init="init()">
                        
                        <!-- Key Metrics Row -->
                        <div class="row g-4 g-lg-5 g-xl-6 mb-5 mb-lg-5 mb-xl-6">
                            <div class="col-xl-3 col-lg-6">
                                <div class="card metric-card revenue">
                                    <div class="card-body p-3 p-lg-4">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <h6 class="text-muted mb-1">Total Revenue</h6>
                                                <h3 class="mb-0" x-text="formatCurrency(metrics.revenue)">$124,592</h3>
                                                <small class="trend-up">
                                                    <i class="bi bi-arrow-up"></i> +12.5% from last month
                                                </small>
                                            </div>
                                            <div class="stats-icon bg-success bg-opacity-10 text-success">
                                                <i class="bi bi-currency-dollar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card metric-card visitors">
                                    <div class="card-body p-3 p-lg-4">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <h6 class="text-muted mb-1">Total Visitors</h6>
                                                <h3 class="mb-0" x-text="formatNumber(metrics.visitors)">45,672</h3>
                                                <small class="trend-up">
                                                    <i class="bi bi-arrow-up"></i> +8.2% from last month
                                                </small>
                                            </div>
                                            <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                                                <i class="bi bi-people"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card metric-card conversion">
                                    <div class="card-body p-3 p-lg-4">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <h6 class="text-muted mb-1">Conversion Rate</h6>
                                                <h3 class="mb-0" x-text="metrics.conversionRate + '%'">3.45%</h3>
                                                <small class="trend-up">
                                                    <i class="bi bi-arrow-up"></i> +2.1% from last month
                                                </small>
                                            </div>
                                            <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                                                <i class="bi bi-graph-up-arrow"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card metric-card bounce">
                                    <div class="card-body p-3 p-lg-4">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <h6 class="text-muted mb-1">Bounce Rate</h6>
                                                <h3 class="mb-0" x-text="metrics.bounceRate + '%'">24.8%</h3>
                                                <small class="trend-down">
                                                    <i class="bi bi-arrow-down"></i> -1.8% from last month
                                                </small>
                                            </div>
                                            <div class="stats-icon bg-danger bg-opacity-10 text-danger">
                                                <i class="bi bi-arrow-counterclockwise"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Charts Row 1 -->
                        <div class="row g-4 g-lg-5 g-xl-6 mb-5 mb-lg-5 mb-xl-6">
                            <!-- Revenue Chart -->
                            <div class="col-lg-8">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Revenue Analytics</h5>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <input type="radio" class="btn-check" name="revenueView" id="revenue-daily" autocomplete="off" checked>
                                            <label class="btn btn-outline-secondary" for="revenue-daily">Daily</label>
                                            <input type="radio" class="btn-check" name="revenueView" id="revenue-weekly" autocomplete="off">
                                            <label class="btn btn-outline-secondary" for="revenue-weekly">Weekly</label>
                                            <input type="radio" class="btn-check" name="revenueView" id="revenue-monthly" autocomplete="off">
                                            <label class="btn btn-outline-secondary" for="revenue-monthly">Monthly</label>
                                        </div>
                                    </div>
                                    <div class="card-body p-3 p-lg-4">
                                        <div id="revenueChart" style="height: 350px;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Traffic Sources -->
                            <div class="col-lg-4">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Traffic Sources</h5>
                                    </div>
                                    <div class="card-body p-3 p-lg-4">
                                        <div id="trafficSourcesChart" style="height: 200px;" class="mb-4"></div>
                                        <div class="traffic-sources-list">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2" style="width: 12px; height: 12px; background-color: #007bff; border-radius: 50%"></div>
                                                    <span class="text-muted">Organic Search</span>
                                                </div>
                                                <div class="text-end">
                                                    <div class="fw-medium">42.3%</div>
                                                    <small class="text-muted">19,314</small>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2" style="width: 12px; height: 12px; background-color: #28a745; border-radius: 50%"></div>
                                                    <span class="text-muted">Direct</span>
                                                </div>
                                                <div class="text-end">
                                                    <div class="fw-medium">31.8%</div>
                                                    <small class="text-muted">14,519</small>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2" style="width: 12px; height: 12px; background-color: #fd7e14; border-radius: 50%"></div>
                                                    <span class="text-muted">Social Media</span>
                                                </div>
                                                <div class="text-end">
                                                    <div class="fw-medium">16.4%</div>
                                                    <small class="text-muted">7,490</small>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2" style="width: 12px; height: 12px; background-color: #e74c3c; border-radius: 50%"></div>
                                                    <span class="text-muted">Referral</span>
                                                </div>
                                                <div class="text-end">
                                                    <div class="fw-medium">9.5%</div>
                                                    <small class="text-muted">4,349</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Charts Row 2 -->
                        <div class="row g-4 g-lg-5 g-xl-6 mb-5 mb-lg-5 mb-xl-6">
                            <!-- User Behavior -->
                            <div class="col-lg-6">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">User Behavior Flow</h5>
                                    </div>
                                    <div class="card-body p-3 p-lg-4">
                                        <div id="behaviorChart" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Real-time Activity -->
                            <div class="col-lg-6">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <h5 class="card-title mb-0 me-2">Real-time Activity</h5>
                                            <span class="badge bg-success">LIVE</span>
                                        </div>
                                        <span class="text-muted">1,247 active users</span>
                                    </div>
                                    <div class="card-body p-3 p-lg-4">
                                        <div id="realTimeChart" style="height: 200px;" class="mb-4"></div>
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <div class="text-center">
                                                    <h4 class="text-primary mb-1">8,452</h4>
                                                    <small class="text-muted">Page Views</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-center">
                                                    <h4 class="text-success mb-1">2,931</h4>
                                                    <small class="text-muted">Sessions</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Tables & Geographic -->
                        <div class="row g-4 g-lg-5 g-xl-6">
                            <!-- Top Pages -->
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Top Performing Pages</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Page</th>
                                                        <th>Views</th>
                                                        <th>Unique Views</th>
                                                        <th>Avg. Time</th>
                                                        <th>Bounce Rate</th>
                                                        <th>Conversion</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="fw-medium text-primary">/dashboard</div>
                                                            <small class="text-muted">Main Dashboard</small>
                                                        </td>
                                                        <td class="fw-medium">12,847</td>
                                                        <td>8,921</td>
                                                        <td>4m 32s</td>
                                                        <td><span class="badge bg-success">22.1%</span></td>
                                                        <td>8.4%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="fw-medium text-primary">/analytics</div>
                                                            <small class="text-muted">Analytics Page</small>
                                                        </td>
                                                        <td class="fw-medium">9,234</td>
                                                        <td>7,156</td>
                                                        <td>6m 18s</td>
                                                        <td><span class="badge bg-success">18.7%</span></td>
                                                        <td>12.3%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="fw-medium text-primary">/products</div>
                                                            <small class="text-muted">Product Catalog</small>
                                                        </td>
                                                        <td class="fw-medium">7,892</td>
                                                        <td>5,467</td>
                                                        <td>3m 45s</td>
                                                        <td><span class="badge bg-warning">45.2%</span></td>
                                                        <td>6.7%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="fw-medium text-primary">/checkout</div>
                                                            <small class="text-muted">Checkout Process</small>
                                                        </td>
                                                        <td class="fw-medium">4,567</td>
                                                        <td>3,891</td>
                                                        <td>2m 23s</td>
                                                        <td><span class="badge bg-success">15.6%</span></td>
                                                        <td>67.8%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="fw-medium text-primary">/contact</div>
                                                            <small class="text-muted">Contact Form</small>
                                                        </td>
                                                        <td class="fw-medium">3,421</td>
                                                        <td>2,876</td>
                                                        <td>1m 54s</td>
                                                        <td><span class="badge bg-danger">68.4%</span></td>
                                                        <td>3.2%</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Geographic Data -->
                            <div class="col-lg-4">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Geographic Distribution</h5>
                                    </div>
                                    <div class="card-body p-3 p-lg-4">
                                        <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                            <div class="d-flex align-items-center">
                                                <div class="me-2" style="width: 24px; height: 18px; background-image: url('https://flagcdn.com/24x18/us.png'); background-size: cover; border-radius: 2px;"></div>
                                                <span class="fw-medium">United States</span>
                                            </div>
                                            <div class="text-end">
                                                <div class="fw-medium">38.2%</div>
                                                <small class="text-muted">17,446</small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                            <div class="d-flex align-items-center">
                                                <div class="me-2" style="width: 24px; height: 18px; background-image: url('https://flagcdn.com/24x18/gb.png'); background-size: cover; border-radius: 2px;"></div>
                                                <span class="fw-medium">United Kingdom</span>
                                            </div>
                                            <div class="text-end">
                                                <div class="fw-medium">22.7%</div>
                                                <small class="text-muted">10,367</small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                            <div class="d-flex align-items-center">
                                                <div class="me-2" style="width: 24px; height: 18px; background-image: url('https://flagcdn.com/24x18/ca.png'); background-size: cover; border-radius: 2px;"></div>
                                                <span class="fw-medium">Canada</span>
                                            </div>
                                            <div class="text-end">
                                                <div class="fw-medium">15.8%</div>
                                                <small class="text-muted">7,215</small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                            <div class="d-flex align-items-center">
                                                <div class="me-2" style="width: 24px; height: 18px; background-image: url('https://flagcdn.com/24x18/de.png'); background-size: cover; border-radius: 2px;"></div>
                                                <span class="fw-medium">Germany</span>
                                            </div>
                                            <div class="text-end">
                                                <div class="fw-medium">12.4%</div>
                                                <small class="text-muted">5,663</small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="me-2" style="width: 24px; height: 18px; background-image: url('https://flagcdn.com/24x18/au.png'); background-size: cover; border-radius: 2px;"></div>
                                                <span class="fw-medium">Australia</span>
                                            </div>
                                            <div class="text-end">
                                                <div class="fw-medium">10.9%</div>
                                                <small class="text-muted">4,981</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Device & Browser Analytics -->
                        <div class="row g-4 g-lg-5 g-xl-6 mt-4">
                            <!-- Device Analytics -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Device Analytics</h5>
                                    </div>
                                    <div class="card-body p-3 p-lg-4">
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="device-icon me-3 bg-primary bg-opacity-10 text-primary">
                                                        <i class="bi bi-laptop"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between mb-1">
                                                            <span class="fw-medium">Desktop</span>
                                                            <span class="text-muted">68.4%</span>
                                                        </div>
                                                        <div class="progress" style="height: 6px;">
                                                            <div class="progress-bar bg-primary" style="width: 68.4%"></div>
                                                        </div>
                                                        <small class="text-muted">31,247 users</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="device-icon me-3 bg-success bg-opacity-10 text-success">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between mb-1">
                                                            <span class="fw-medium">Mobile</span>
                                                            <span class="text-muted">24.8%</span>
                                                        </div>
                                                        <div class="progress" style="height: 6px;">
                                                            <div class="progress-bar bg-success" style="width: 24.8%"></div>
                                                        </div>
                                                        <small class="text-muted">11,327 users</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="device-icon me-3 bg-warning bg-opacity-10 text-warning">
                                                        <i class="bi bi-tablet"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between mb-1">
                                                            <span class="fw-medium">Tablet</span>
                                                            <span class="text-muted">6.8%</span>
                                                        </div>
                                                        <div class="progress" style="height: 6px;">
                                                            <div class="progress-bar bg-warning" style="width: 6.8%"></div>
                                                        </div>
                                                        <small class="text-muted">3,098 users</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Browser Analytics -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Browser Distribution</h5>
                                    </div>
                                    <div class="card-body p-3 p-lg-4">
                                        <div id="browserChart" style="height: 250px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div> <!-- End Analytics Container -->

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

    <!-- Page-specific Component -->

    <!-- Main App Script -->

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
</html> 