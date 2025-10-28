<?php
// Define base URL for the project
$baseUrl = '/Asly-LMS'; // Change this to your actual base URL when deploying
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ASLY International College Inc">
    <meta name="keywords" content="ASLY, AICI, College, TESDA, Senior High School">
    <meta name="author" content="Shinzuo">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="ASLY International College Inc">
    <meta property="og:description" content="A school where education meets technology for the digital age.">
    <meta property="og:type" content="website">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="<?php echo $baseUrl; ?>/assets/ASLYLOGO3.png">
    <link rel="icon" type="image/png" href="<?php echo $baseUrl; ?>/assets/favicon-B_cwPWBd.png">

    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>



    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Title -->
    <title>Dashboard - Modern Bootstrap Admin</title>

    <!-- Theme Color -->
    <meta name="theme-color" content="#7bdb9bff">

    <link rel="stylesheet" href="assets/bootstrap-icons/font/bootstrap-icons.css">


    <!-- PWA Manifest -->
    <link rel="manifest" href="assets/manifest-DTaoG9pG.json">
    <script type="module" crossorigin src="assets/main-BPhDq89w.js"></script>
    <link rel="stylesheet" crossorigin href="assets/main-D9K-blpF.css">

    <!-- <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
<script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script> -->

</head>

<body class="admin-wrapper">
    <!-- Header -->



    <header class="admin-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
            <div class="container-fluid">
                <!-- Logo/Brand - Now first on the left -->
                <a class="navbar-brand d-flex align-items-center" href="./index.html">
                    <img src="<?php echo $baseUrl; ?>/images/ASLYLOGO4.png" alt="Logo" height="52" class="d-inline-block align-text-top me-2">
                    <h1 class="h4 mb-0 fw-bold text-primary">ASLY</h1>
                </a>

                <!-- Search Bar with Alpine.js -->
                <div class="search-container flex-grow-1 mx-4" x-data="searchComponent">
                    <div class="position-relative">
                        <input type="search"
                            class="form-control"
                            placeholder="Search... (Ctrl+K)"
                            x-model="query"
                            @input="search()"
                            data-search-input
                            aria-label="Search">
                        <i class="bi bi-search position-absolute top-50 end-0 translate-middle-y me-3"></i>

                        <!-- Search Results Dropdown -->
                        <div x-show="results.length > 0"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            class="position-absolute top-100 start-0 w-100 bg-white border rounded-2 shadow-lg mt-1 z-3">
                            <template x-for="result in results" :key="result.title">
                                <a :href="result.url" class="d-block px-3 py-2 text-decoration-none text-dark border-bottom">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-file-text me-2 text-muted"></i>
                                        <span x-text="result.title"></span>
                                        <small class="ms-auto text-muted" x-text="result.type"></small>
                                    </div>
                                </a>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Right Side Icons -->
                <div class="navbar-nav flex-row">
                    <!-- Theme Toggle with Alpine.js -->
                    <div x-data="themeSwitch">
                        <button class="btn btn-outline-secondary me-2"
                            type="button"
                            @click="toggle()"
                            data-bs-toggle="tooltip"
                            data-bs-placement="bottom"
                            title="Toggle theme">
                            <i class="bi bi-sun-fill" x-show="currentTheme === 'light'"></i>
                            <i class="bi bi-moon-fill" x-show="currentTheme === 'dark'"></i>
                        </button>
                    </div>

                    <!-- Fullscreen Toggle -->
                    <button class="btn btn-outline-secondary me-2"
                        type="button"
                        data-fullscreen-toggle
                        data-bs-toggle="tooltip"
                        data-bs-placement="bottom"
                        title="Toggle fullscreen">
                        <i class="bi bi-arrows-fullscreen icon-hover"></i>
                    </button>

                    <!-- Notifications -->
                    <div class="dropdown me-2">
                        <button class="btn btn-outline-secondary position-relative"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-bell"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <h6 class="dropdown-header">Notifications</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">New user registered</a></li>
                            <li><a class="dropdown-item" href="#">Server status update</a></li>
                            <li><a class="dropdown-item" href="#">New message received</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-center" href="#">View all notifications</a></li>
                        </ul>
                    </div>

                    <!-- User Menu -->
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary d-flex align-items-center"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="data:image/svg+xml,%3csvg%20width='32'%20height='32'%20viewBox='0%200%2032%2032'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3c!--%20Background%20circle%20--%3e%3ccircle%20cx='16'%20cy='16'%20r='16'%20fill='url(%23avatarGradient)'/%3e%3c!--%20Person%20silhouette%20--%3e%3cg%20fill='white'%20opacity='0.9'%3e%3c!--%20Head%20--%3e%3ccircle%20cx='16'%20cy='12'%20r='5'/%3e%3c!--%20Body%20--%3e%3cpath%20d='M16%2018c-5.5%200-10%202.5-10%207v1h20v-1c0-4.5-4.5-7-10-7z'/%3e%3c/g%3e%3c!--%20Subtle%20border%20--%3e%3ccircle%20cx='16'%20cy='16'%20r='15.5'%20fill='none'%20stroke='rgba(255,255,255,0.2)'%20stroke-width='1'/%3e%3c!--%20Gradient%20definition%20--%3e%3cdefs%3e%3clinearGradient%20id='avatarGradient'%20x1='0%25'%20y1='0%25'%20x2='100%25'%20y2='100%25'%3e%3cstop%20offset='0%25'%20style='stop-color:%236b7280;stop-opacity:1'%20/%3e%3cstop%20offset='100%25'%20style='stop-color:%234b5563;stop-opacity:1'%20/%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e"
                                alt="User Avatar"
                                width="24"
                                height="24"
                                class="rounded-circle me-2">
                            <span class="d-none d-md-inline">
                                <?= htmlspecialchars($_SESSION['username'] ?? 'Guest') ?>
                            </span>

                            <i class="bi bi-chevron-down ms-1"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?php echo $baseUrl; ?>/auth/logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sidebar -->
    <aside class="admin-sidebar" id="admin-sidebar">
        <div class="sidebar-content">
            <nav class="sidebar-nav">
                <ul class="nav flex-column">
                    <?php
                    $currentPage = basename($_SERVER['PHP_SELF']);
                    function isActive($file)
                    {
                        global $currentPage;
                        return $currentPage === $file ? 'active' : '';
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?= isActive('index.php') ?>" href="./index">
                            <i class="bi bi-speedometer2"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isActive('analytics.php') ?>" href="./analytics">
                            <i class="bi bi-graph-up"></i>
                            <span>Analytics</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isActive('users.php') ?>" href="./users">
                            <i class="bi bi-people"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isActive('products.php') ?>" href="./products">
                            <i class="bi bi-box"></i>
                            <span>Products</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" <?= isActive('userManagement.php') ?> href="#"
                            data-bs-toggle="collapse"
                            data-bs-target="#elementsSubmenu"
                            aria-expanded="false">
                            <i class="bi bi-puzzle"></i>
                            <span>User Management</span>
                            <i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <div class="collapse show" id="elementsSubmenu">
                            <ul class="nav nav-submenu">
                                <li class="nav-item">
                                    <a class="nav-link <?= isActive('userManagement.php') ?>" href="./userManagement">
                                        <i class="bi bi-grid"></i>
                                        <span>Enrollees</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= isActive('students.php') ?>" href="./students">
                                        <i class="bi bi-ui-checks"></i>
                                        <span>Students</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= isActive('teachersManagement.php') ?>" href="./teachersManagement">
                                        <i class="bi bi-ui-checks"></i>
                                        <span>Teachers</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= isActive('userAccounts.php') ?>" href="./userAccounts">
                                        <i class="bi bi-ui-checks"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isActive('subjectManagement.php') ?>" href="./subjectManagement">
                            <i class="bi bi-bag-check"></i>
                            <span>Subject Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isActive('centralSterile.php') ?>" href="./centralSterile">
                            <i class="bi bi-bag-check"></i>
                            <span>Central Sterile Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isActive('courseManagement.php') ?>" href="./courseManagement">
                            <i class="bi bi-ui-checks"></i>
                            <span>Course Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./messages.html">
                            <i class="bi bi-chat-dots"></i>
                            <span>Messages</span>
                            <span class="badge bg-danger rounded-pill ms-auto">3</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <small class="text-muted px-3 text-uppercase fw-bold">Admin</small>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./settings.html">
                            <i class="bi bi-gear"></i>
                            <span>Settings</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./help.html">
                            <i class="bi bi-question-circle"></i>
                            <span>Help & Support</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Floating Hamburger Menu -->
    <button class="hamburger-menu"
        type="button"
        data-sidebar-toggle
        aria-label="Toggle sidebar">
        <i class="bi bi-list"></i>
    </button>

    <!-- Sidebar Toggle and User Management Dropdown Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize Bootstrap collapse for User Management dropdown
            const userManagementLink = document.querySelector('[data-bs-target="#elementsSubmenu"]');
            if (userManagementLink) {
                userManagementLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    const submenu = document.getElementById('elementsSubmenu');
                    if (submenu) {
                        const bsCollapse = new bootstrap.Collapse(submenu, {
                            toggle: false
                        });
                        bsCollapse.toggle();
                    }
                });
            }
        });
    </script>

</body>


</html>
