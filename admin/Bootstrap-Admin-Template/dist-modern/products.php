<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management - Modern Bootstrap Admin</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Comprehensive product management with inventory tracking, categories, and analytics">
    <meta name="keywords" content="bootstrap, admin, dashboard, products, inventory, e-commerce">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="./assets/favicon-CvUZKS4z.svg">
    <link rel="icon" type="image/png" href="./assets/favicon-B_cwPWBd.png">
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="./assets/manifest-DTaoG9pG.json">
    
    <!-- Preload critical fonts -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" as="style">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- ApexCharts CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>  <script type="module" crossorigin src="./assets/main-BPhDq89w.js"></script>
  <script type="module" crossorigin src="./assets/products-CUCmWXbQ.js"></script>
  <link rel="stylesheet" crossorigin href="./assets/main-D9K-blpF.css">
</head>

<body data-page="products" class="product-management">
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
                            <h1 class="h3 mb-0">Product Management</h1>
                            <p class="text-muted mb-0">Manage your product catalog and inventory</p>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-outline-secondary" @click="exportProducts()">
                                <i class="bi bi-download me-2"></i>Export
                            </button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#importModal">
                                <i class="bi bi-upload me-2"></i>Import
                            </button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal">
                                <i class="bi bi-plus-lg me-2"></i>Add Product
                            </button>
                        </div>
                    </div>

                    <!-- Product Management Container -->
                    <div x-data="productTable" x-init="init()">
                        
                        <!-- Product Stats Widgets -->
                        <div class="row g-4 g-lg-5 mb-5">
                            <div class="col-xl-3 col-lg-6">
                                <div class="card stats-card">
                                    <div class="card-body p-3 p-lg-4">
                                        <div class="d-flex align-items-center">
                                            <div class="stats-icon bg-primary bg-opacity-10 text-primary me-3">
                                                <i class="bi bi-box"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-muted">Total Products</h6>
                                                <h3 class="mb-0" x-text="stats.total"></h3>
                                                <small class="text-success">
                                                    <i class="bi bi-arrow-up"></i> +5% from last month
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card stats-card">
                                    <div class="card-body p-3 p-lg-4">
                                        <div class="d-flex align-items-center">
                                            <div class="stats-icon bg-success bg-opacity-10 text-success me-3">
                                                <i class="bi bi-check-circle"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-muted">In Stock</h6>
                                                <h3 class="mb-0" x-text="stats.inStock"></h3>
                                                <small class="text-success">
                                                    <i class="bi bi-arrow-up"></i> Well stocked
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card stats-card">
                                    <div class="card-body p-3 p-lg-4">
                                        <div class="d-flex align-items-center">
                                            <div class="stats-icon bg-warning bg-opacity-10 text-warning me-3">
                                                <i class="bi bi-exclamation-triangle"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-muted">Low Stock</h6>
                                                <h3 class="mb-0" x-text="stats.lowStock"></h3>
                                                <small class="text-warning">
                                                    <i class="bi bi-exclamation-circle"></i> Needs attention
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card stats-card">
                                    <div class="card-body p-3 p-lg-4">
                                        <div class="d-flex align-items-center">
                                            <div class="stats-icon bg-info bg-opacity-10 text-info me-3">
                                                <i class="bi bi-currency-dollar"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-muted">Total Value</h6>
                                                <h3 class="mb-0" x-text="`$${stats.totalValue.toLocaleString()}`"></h3>
                                                <small class="text-info">
                                                    <i class="bi bi-info-circle"></i> Inventory value
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Charts Row -->
                        <div class="row g-4 g-lg-5 mb-5">
                            <!-- Sales Performance Chart -->
                            <div class="col-lg-8">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Sales Performance</h5>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <input type="radio" class="btn-check" name="salesPeriod" id="sales7d" autocomplete="off" checked>
                                            <label class="btn btn-outline-secondary" for="sales7d">7D</label>
                                            <input type="radio" class="btn-check" name="salesPeriod" id="sales30d" autocomplete="off">
                                            <label class="btn btn-outline-secondary" for="sales30d">30D</label>
                                            <input type="radio" class="btn-check" name="salesPeriod" id="sales90d" autocomplete="off">
                                            <label class="btn btn-outline-secondary" for="sales90d">90D</label>
                                        </div>
                                    </div>
                                    <div class="card-body p-3 p-lg-4">
                                        <div id="salesChart" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Category Distribution -->
                            <div class="col-lg-4">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Category Distribution</h5>
                                    </div>
                                    <div class="card-body p-3 p-lg-4">
                                        <div id="categoryChart" style="height: 200px;"></div>
                                        <div class="mt-3">
                                            <template x-for="category in categoryStats" :key="category.name">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span class="small" x-text="category.name"></span>
                                                    <div class="d-flex align-items-center">
                                                        <span class="small text-muted me-2" x-text="`${category.percentage}%`"></span>
                                                        <span class="small fw-medium" x-text="category.count"></span>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Products Table -->
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="card-title mb-0">Product Catalog</h5>
                                    </div>
                                    <div class="col-auto">
                                        <div class="d-flex gap-2">
                                            <!-- Search -->
                                            <div class="position-relative">
                                                <input type="search" 
                                                       class="form-control form-control-sm" 
                                                       placeholder="Search products..."
                                                       x-model="searchQuery"
                                                       @input="filterProducts()"
                                                       style="width: 200px;">
                                                <i class="bi bi-search position-absolute top-50 end-0 translate-middle-y me-2 text-muted"></i>
                                            </div>
                                            
                                            <!-- Category Filter -->
                                            <select class="form-select form-select-sm" 
                                                    x-model="categoryFilter" 
                                                    @change="filterProducts()"
                                                    style="width: 150px;">
                                                <option value="">All Categories</option>
                                                <option value="electronics">Electronics</option>
                                                <option value="clothing">Clothing</option>
                                                <option value="books">Books</option>
                                                <option value="home">Home & Garden</option>
                                            </select>
                                            
                                            <!-- Stock Filter -->
                                            <select class="form-select form-select-sm" 
                                                    x-model="stockFilter" 
                                                    @change="filterProducts()"
                                                    style="width: 150px;">
                                                <option value="">All Stock</option>
                                                <option value="in-stock">In Stock</option>
                                                <option value="low-stock">Low Stock</option>
                                                <option value="out-of-stock">Out of Stock</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <!-- Bulk Actions Bar -->
                                <div class="bulk-actions-bar p-3 bg-light border-bottom" x-show="selectedProducts.length > 0" x-transition>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted">
                                            <span x-text="selectedProducts.length"></span> product(s) selected
                                        </span>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm btn-outline-secondary" @click="bulkAction('publish')">
                                                <i class="bi bi-eye me-1"></i>Publish
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" @click="bulkAction('unpublish')">
                                                <i class="bi bi-eye-slash me-1"></i>Unpublish
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" @click="bulkAction('delete')">
                                                <i class="bi bi-trash me-1"></i>Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 40px;">
                                                    <input type="checkbox" 
                                                           class="form-check-input" 
                                                           @change="toggleAll($event.target.checked)"
                                                           :checked="selectedProducts.length === filteredProducts.length && filteredProducts.length > 0">
                                                </th>
                                                <th>Product</th>
                                                <th @click="sortBy('category')" class="sortable">Category</th>
                                                <th @click="sortBy('price')" class="sortable">Price</th>
                                                <th @click="sortBy('stock')" class="sortable">Stock</th>
                                                <th>Status</th>
                                                <th @click="sortBy('created')" class="sortable">Created</th>
                                                <th style="width: 120px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="product in paginatedProducts" :key="product.id">
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" 
                                                               class="form-check-input" 
                                                               :value="product.id"
                                                               x-model="selectedProducts">
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img :src="product.image" 
                                                                 class="product-image me-3" 
                                                                 :alt="product.name">
                                                            <div>
                                                                <div class="fw-medium" x-text="product.name"></div>
                                                                <small class="text-muted" x-text="'SKU: ' + product.sku"></small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-light text-dark" x-text="product.category"></span>
                                                    </td>
                                                    <td x-text="`$${product.price}`"></td>
                                                    <td>
                                                        <span class="badge stock-badge" 
                                                              :class="{
                                                                  'in-stock': product.stock > 20,
                                                                  'low-stock': product.stock > 0 && product.stock <= 20,
                                                                  'out-of-stock': product.stock === 0
                                                              }"
                                                              x-text="product.stock + ' units'"></span>
                                                    </td>
                                                    <td>
                                                        <span class="badge" 
                                                              :class="{
                                                                  'bg-success': product.status === 'published',
                                                                  'bg-secondary': product.status === 'draft',
                                                                  'bg-warning': product.status === 'pending'
                                                              }"
                                                              x-text="product.status"></span>
                                                    </td>
                                                    <td x-text="product.created"></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" 
                                                                    type="button" 
                                                                    data-bs-toggle="dropdown">
                                                                <i class="bi bi-three-dots"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#" @click="editProduct(product)">
                                                                    <i class="bi bi-pencil me-2"></i>Edit
                                                                </a></li>
                                                                <li><a class="dropdown-item" href="#" @click="viewProduct(product)">
                                                                    <i class="bi bi-eye me-2"></i>View Details
                                                                </a></li>
                                                                <li><a class="dropdown-item" href="#" @click="duplicateProduct(product)">
                                                                    <i class="bi bi-copy me-2"></i>Duplicate
                                                                </a></li>
                                                                <li><hr class="dropdown-divider"></li>
                                                                <li><a class="dropdown-item text-danger" href="#" @click="deleteProduct(product)">
                                                                    <i class="bi bi-trash me-2"></i>Delete
                                                                </a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                <div class="d-flex justify-content-between align-items-center p-3">
                                    <div class="text-muted">
                                        Showing <span x-text="(currentPage - 1) * itemsPerPage + 1"></span> to 
                                        <span x-text="Math.min(currentPage * itemsPerPage, filteredProducts.length)"></span> of 
                                        <span x-text="filteredProducts.length"></span> results
                                    </div>
                                    <nav>
                                        <ul class="pagination pagination-sm mb-0">
                                            <li class="page-item" :class="{ 'disabled': currentPage === 1 }">
                                                <a class="page-link" href="#" @click.prevent="goToPage(currentPage - 1)">Previous</a>
                                            </li>
                                            <template x-for="(page, index) in visiblePages" :key="`page-${index}`">
                                                <li class="page-item" :class="{ 'active': page === currentPage }">
                                                    <a class="page-link" href="#" @click.prevent="page !== '...' && goToPage(page)" x-text="page"></a>
                                                </li>
                                            </template>
                                            <li class="page-item" :class="{ 'disabled': currentPage === totalPages }">
                                                <a class="page-link" href="#" @click.prevent="goToPage(currentPage + 1)">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        
                    </div> <!-- End Product Management Container -->

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

    <!-- Product Modal (Add/Edit) -->
    <div class="modal fade" id="productModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form x-data="productForm">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" x-model="form.name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">SKU</label>
                                <input type="text" class="form-control" x-model="form.sku" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Category</label>
                                <select class="form-select" x-model="form.category" required>
                                    <option value="">Select Category</option>
                                    <option value="electronics">Electronics</option>
                                    <option value="clothing">Clothing</option>
                                    <option value="books">Books</option>
                                    <option value="home">Home & Garden</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" x-model="form.price" step="0.01" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Stock Quantity</label>
                                <input type="number" class="form-control" x-model="form.stock" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" x-model="form.description" rows="3"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select class="form-select" x-model="form.status" required>
                                    <option value="">Select Status</option>
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                    <option value="pending">Pending Review</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Product Image</label>
                                <input type="file" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" @click="saveProduct()">Save Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Import Modal -->
    <div class="modal fade" id="importModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Upload CSV File</label>
                        <input type="file" class="form-control" accept=".csv">
                        <div class="form-text">Upload a CSV file with columns: name, sku, category, price, stock, status</div>
                    </div>
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        <strong>CSV Format:</strong> name, sku, category, price, stock, status<br>
                        <small>Example: iPhone 14, IPHONE14-128, electronics, 799.99, 50, published</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Import Products</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Page-specific Component -->

    <!-- Main App Script -->

    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const toggleButton = document.querySelector('[data-sidebar-toggle]');
        const wrapper = document.getElementById('admin-wrapper');

        if (toggleButton && wrapper) {
          const isCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';
          if (isCollapsed) {
            wrapper.classList.add('sidebar-collapsed');
            toggleButton.classList.add('is-active');
          }

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