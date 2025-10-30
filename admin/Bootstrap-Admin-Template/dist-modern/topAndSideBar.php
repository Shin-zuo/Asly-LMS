<?php
// Define base URL for the project
$baseUrl = '/Asly-LMS';
?>

<!-- ======= HEADER ======= -->
<header class="admin-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <div class="container-fluid">
            <!-- Logo/Brand -->
            <a class="navbar-brand d-flex align-items-center" href="./index.php">
                <img src="<?php echo $baseUrl; ?>/images/ASLYLOGO4.png" alt="Logo" height="52" class="d-inline-block align-text-top me-2">
                <h1 class="h4 mb-0 fw-bold " style="color:#6366f1">ASLY</h1>
            </a>

            <!-- Search Bar -->
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

                    <!-- Search Results -->
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
                <!-- Theme Toggle -->
                <div x-data="themeSwitch">
                    <button class="btn btn-outline-secondary me-2"
                        type="button"
                        @click="toggle()"
                        data-bs-toggle="tooltip"
                        title="Toggle theme">
                        <i class="bi bi-sun-fill" x-show="currentTheme === 'light'"></i>
                        <i class="bi bi-moon-fill" x-show="currentTheme === 'dark'"></i>
                    </button>
                </div>

                <!-- Fullscreen -->
                <button class="btn btn-outline-secondary me-2"
                    type="button"
                    data-fullscreen-toggle
                    title="Toggle fullscreen">
                    <i class="bi bi-arrows-fullscreen icon-hover"></i>
                </button>

                <!-- Notifications -->
                <div class="dropdown me-2">
                    <button class="btn btn-outline-secondary position-relative" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><h6 class="dropdown-header">Notifications</h6></li>
                        <li><a class="dropdown-item" href="#">New user registered</a></li>
                        <li><a class="dropdown-item" href="#">Server status update</a></li>
                        <li><a class="dropdown-item" href="#">New message received</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-center" href="#">View all</a></li>
                    </ul>
                </div>

                <!-- User Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-outline-secondary d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                        <img src="data:image/svg+xml,%3csvg%20width='32'%20height='32'%20viewBox='0%200%2032%2032'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3ccircle%20cx='16'%20cy='16'%20r='16'%20fill='url(%23avatarGradient)'/%3e%3cg%20fill='white'%20opacity='0.9'%3e%3ccircle%20cx='16'%20cy='12'%20r='5'/%3e%3cpath%20d='M16%2018c-5.5%200-10%202.5-10%207v1h20v-1c0-4.5-4.5-7-10-7z'/%3e%3c/g%3e%3cdefs%3e%3clinearGradient%20id='avatarGradient'%20x1='0%25'%20y1='0%25'%20x2='100%25'%20y2='100%25'%3e%3cstop%20offset='0%25'%20style='stop-color:%236b7280;stop-opacity:1'%20/%3e%3cstop%20offset='100%25'%20style='stop-color:%234b5563;stop-opacity:1'%20/%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e"
                             alt="User Avatar" width="24" height="24" class="rounded-circle me-2">
                        <span class="d-none d-md-inline">
                            <?= htmlspecialchars($_SESSION['username'] ?? 'Guest') ?>
                        </span>
                        <i class="bi bi-chevron-down ms-1"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?php echo $baseUrl; ?>/auth/logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- ======= SIDEBAR ======= -->
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
                        <i class="bi bi-speedometer2"></i><span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= isActive('analytics.php') ?>" href="./analytics">
                        <i class="bi bi-graph-up"></i><span>Analytics</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= isActive('users.php') ?>" href="./users">
                        <i class="bi bi-people"></i><span>Users</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#elementsSubmenu" aria-expanded="false">
                        <i class="bi bi-puzzle"></i><span>User Management</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse" id="elementsSubmenu">
                        <ul class="nav nav-submenu">
                            <li><a class="nav-link <?= isActive('userManagement.php') ?>" href="./userManagement"><i class="bi bi-grid"></i> Enrollees</a></li>
                            <li><a class="nav-link <?= isActive('students.php') ?>" href="./students"><i class="bi bi-ui-checks"></i> Students</a></li>
                            <li><a class="nav-link <?= isActive('teachersManagement.php') ?>" href="./teachersManagement"><i class="bi bi-ui-checks"></i> Teachers</a></li>
                            <li><a class="nav-link <?= isActive('userAccounts.php') ?>" href="./userAccounts"><i class="bi bi-ui-checks"></i> Users</a></li>
                        </ul>
                    </div>
                </li>

                <li><a class="nav-link <?= isActive('subjectManagement.php') ?>" href="./subjectManagement"><i class="bi bi-bag-check"></i> Subject Management</a></li>
                <li><a class="nav-link <?= isActive('centralSterile.php') ?>" href="./centralSterile"><i class="bi bi-bag-check"></i> Central Sterile Management</a></li>
                <li><a class="nav-link <?= isActive('courseManagement.php') ?>" href="./courseManagement"><i class="bi bi-ui-checks"></i> Course Management</a></li>
                <li><a class="nav-link" href="./messages.html"><i class="bi bi-chat-dots"></i> Messages <span class="badge bg-danger rounded-pill ms-auto">3</span></a></li>

                <li class="nav-item mt-3">
                    <small class="text-muted px-3 text-uppercase fw-bold">Admin</small>
                </li>
                <li><a class="nav-link" href="./settings.html"><i class="bi bi-gear"></i> Settings</a></li>
                <li><a class="nav-link" href="./help.html"><i class="bi bi-question-circle"></i> Help & Support</a></li>
            </ul>
        </nav>
    </div>
</aside>

<!-- Floating Hamburger -->
<button class="hamburger-menu" type="button" data-sidebar-toggle aria-label="Toggle sidebar">
    <i class="bi bi-list"></i>
</button>



<!-- ======= SCRIPTS ======= -->
<!-- Bootstrap Bundle (includes Popper.js) -->
<script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Alpine.js (for x-data, @click, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>



