<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Reports & Analytics - SUNHILL Admin</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    * {
      transition: all 0.3s ease;
    }

    body {
      background: #000;
      color: #e0e0e0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      width: 260px;
      background: linear-gradient(180deg, #0a0a0a 0%, #0f0f0f 100%);
      border-right: 1px solid #222;
      padding: 1.5rem 1rem;
      overflow-y: auto;
      z-index: 1001;
      box-shadow: 2px 0 15px rgba(0, 0, 0, 0.5);
    }

    /* Sidebar Toggle - Mobile */
    .sidebar-toggle {
      display: none;
      position: fixed;
      top: 1rem;
      left: 1rem;
      background: #ef4444;
      border: none;
      color: white;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      font-size: 1.25rem;
      cursor: pointer;
      z-index: 1002;
      box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    .sidebar-toggle:hover {
      background: #dc2626;
      transform: scale(1.05);
    }

    .sidebar-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.7);
      z-index: 1000;
    }

    .sidebar-overlay.active {
      display: block;
    }

    .sidebar-brand {
      font-size: 1.9rem;
      font-weight: 700;
      color: #fff;
      text-decoration: none;
      display: block;
      padding: 1.5rem 0 2rem;
      text-align: center;
      border-bottom: 1px solid #333;
      margin-bottom: 1.5rem;
      background: linear-gradient(135deg, transparent, rgba(239, 68, 68, 0.1));
      border-radius: 8px;
    }

    .sidebar-brand span {
      color: #ef4444;
      display: block;
      font-size: 0.8em;
      font-weight: 600;
      margin-top: 0.5rem;
    }

    .nav-link {
      color: #a0a0a0;
      padding: 0.85rem 1.25rem;
      border-radius: 8px;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 0.35rem 0;
      position: relative;
      overflow: hidden;
    }

    .nav-link::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      width: 4px;
      height: 100%;
      background: #ef4444;
      transform: scaleY(0);
      transform-origin: top;
      transition: transform 0.3s ease;
    }

    .nav-link:hover {
      background: rgba(239, 68, 68, 0.1);
      color: #fff;
      padding-left: 1.5rem;
    }

    .nav-link:hover::before {
      transform: scaleY(1);
    }

    .nav-link.active {
      background: rgba(239, 68, 68, 0.15);
      color: #ef4444;
      font-weight: 600;
    }

    .nav-link.active::before {
      transform: scaleY(1);
    }

    .nav-link i {
      font-size: 1.15rem;
      min-width: 24px;
    }

    /* Sidebar Sections */
    .sidebar-section {
      margin-top: 1.5rem;
      padding-top: 1.5rem;
      border-top: 1px solid #222;
    }

    .sidebar-section-title {
      font-size: 0.75rem;
      text-transform: uppercase;
      color: #666;
      font-weight: 700;
      letter-spacing: 1px;
      padding: 0.5rem 1.25rem;
      margin-bottom: 0.5rem;
    }

    .logout-btn {
      background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(239, 68, 68, 0.05));
      border: 1px solid rgba(239, 68, 68, 0.3);
      color: #ef4444;
      width: 100%;
      margin-top: 1rem;
      padding: 0.85rem 1.25rem;
      border-radius: 8px;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 12px;
      transition: all 0.3s;
    }

    .logout-btn:hover {
      background: linear-gradient(135deg, rgba(239, 68, 68, 0.3), rgba(239, 68, 68, 0.1));
      border-color: rgba(239, 68, 68, 0.5);
      transform: translateX(5px);
    }

    .main-content {
      margin-left: 260px;
      padding: 2rem;
    }

    /* Scrollbar styling */
    .sidebar::-webkit-scrollbar {
      width: 6px;
    }

    .sidebar::-webkit-scrollbar-track {
      background: transparent;
    }

    .sidebar::-webkit-scrollbar-thumb {
      background: #333;
      border-radius: 3px;
    }

    .sidebar::-webkit-scrollbar-thumb:hover {
      background: #444;
    }

    @media (max-width: 992px) {
      .sidebar { width: 240px; }
      .main-content { margin-left: 240px; }
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        max-width: 260px;
        height: 100vh;
        left: -100%;
        position: fixed;
        border-right: 1px solid #222;
        border-bottom: none;
      }

      .sidebar.active {
        left: 0;
      }

      .main-content {
        margin-left: 0;
        padding-top: 4rem;
      }

      .sidebar-toggle {
        display: block;
      }

      .nav-link {
        padding: 0.75rem 1rem;
      }
    }

    .card-dark {
      background: #111;
      border: 1px solid #333;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.5);
      transition: transform 0.25s;
    }

    .card-dark:hover {
      transform: translateY(-6px);
    }

    .stat-icon {
      font-size: 2.8rem;
      opacity: 0.85;
    }

    .chart-container {
      position: relative;
      height: 380px;
      width: 100%;
    }

    .form-control-dark {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #fff;
    }

    .form-control-dark:focus {
      border-color: #ef4444;
      box-shadow: 0 0 0 0.25rem rgba(239, 68, 68, 0.25);
      color: #fff;
      background: #1a1a1a;
    }

    .table-dark thead th {
      background: #1a1a1a;
      color: #ccc;
      border-bottom: 1px solid #444;
    }

    .table-dark td {
      border-color: #333;
      vertical-align: middle;
    }
  </style>
</head>
<body>

<!-- Sidebar Toggle Button -->
<button class="sidebar-toggle" id="sidebarToggle">
  <i class="bi bi-list"></i>
</button>

<!-- Sidebar Overlay (for mobile) -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Sidebar Navigation -->
<aside class="sidebar" id="sidebar">
  <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
    TESLA <span>Admin</span>
  </a>

  <nav>
    <ul class="nav flex-column">
      <!-- Dashboard -->
      <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
          <i class="bi bi-speedometer2"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Main Section -->
      <div class="sidebar-section">
        <div class="sidebar-section-title">Management</div>

        <li class="nav-item">
          <a href="{{ route('admin.users') }}" class="nav-link">
            <i class="bi bi-people-fill"></i>
            <span>Users</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.deposits') }}" class="nav-link">
            <i class="bi bi-currency-dollar"></i>
            <span>Deposits</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.withdrawals') }}" class="nav-link">
            <i class="bi bi-cash-stack"></i>
            <span>Withdrawals</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.packages') }}" class="nav-link">
            <i class="bi bi-bag-check"></i>
            <span>Plans / Packages</span>
          </a>
        </li>
      </div>

      <!-- Analytics Section -->
      <div class="sidebar-section">
        <div class="sidebar-section-title">Analytics</div>

        <li class="nav-item">
          <a href="{{ route('admin.transactions') }}" class="nav-link">
            <i class="bi bi-receipt"></i>
            <span>Transactions</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.reports') }}" class="nav-link active">
            <i class="bi bi-graph-up"></i>
            <span>Reports</span>
          </a>
        </li>
      </div>

      <!-- Settings Section -->
      <div class="sidebar-section">
        <div class="sidebar-section-title">System</div>

        <li class="nav-item">
          <a href="{{ route('admin.settings') }}" class="nav-link">
            <i class="bi bi-gear-fill"></i>
            <span>Settings</span>
          </a>
        </li>
      </div>
    </ul>

    <!-- Logout Button -->
    <form method="POST" action="{{ url('/logout') }}" style="display: contents;">
      @csrf
      <button type="submit" class="logout-btn" onclick="return confirm('Are you sure you want to logout?')">
        <i class="bi bi-box-arrow-right"></i>
        <span>Logout</span>
      </button>
    </form>
  </nav>
</aside>

<!-- Main Content -->
<main class="main-content">
  <div class="container-fluid px-0">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
      <h1 class="display-5 fw-bold mb-0">Reports & Analytics</h1>
      <div class="d-flex gap-3 align-items-center flex-wrap">
        <div class="input-group input-group-sm" style="max-width: 100%; min-width: 300px;">
          <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-calendar"></i></span>
          <input type="date" class="form-control form-control-dark" value="2026-02-01">
          <span class="input-group-text bg-dark border-secondary text-white">to</span>
          <input type="date" class="form-control form-control-dark" value="2026-02-24">
        </div>
        <button class="btn btn-outline-light btn-sm px-4">
          <i class="bi bi-download me-2"></i> Export Report
        </button>
      </div>
    </div>

    <!-- Stats Overview -->
    <div class="row g-4 mb-5">
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Revenue</h5>
            <i class="bi bi-currency-dollar stat-icon text-success"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">$6,742,890</h2>
          <p class="text-success small mb-0">+14.8% this month</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Net Profit</h5>
            <i class="bi bi-graph-up-arrow stat-icon text-info"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-info">$4,128,670</h2>
          <p class="text-info small mb-0">61.2% margin</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">User Growth</h5>
            <i class="bi bi-people-fill stat-icon text-primary"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">+1,842</h2>
          <p class="text-primary small mb-0">New users this month</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Retention Rate</h5>
            <i class="bi bi-arrow-repeat stat-icon text-warning"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-warning">78.4%</h2>
          <p class="text-warning small mb-0">30-day retention</p>
        </div>
      </div>
    </div>

    <!-- Charts Row -->
    <div class="row g-4 mb-5">
      <!-- Revenue vs Withdrawals -->
      <div class="col-lg-6">
        <div class="card card-dark p-4">
          <h5 class="fw-bold mb-4">
            <i class="bi bi-bar-chart-fill me-2 text-danger"></i> Revenue vs Withdrawals (Last 30 Days)
          </h5>
          <div class="chart-container">
            <canvas id="revenueVsWithdrawalChart"></canvas>
          </div>
        </div>
      </div>

      <!-- User Registration Trend -->
      <div class="col-lg-6">
        <div class="card card-dark p-4">
          <h5 class="fw-bold mb-4">
            <i class="bi bi-graph-up me-2 text-primary"></i> User Registration Trend
          </h5>
          <div class="chart-container">
            <canvas id="userGrowthChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- Summary Tables -->
    <div class="row g-4">
      <!-- Top Depositors -->
      <div class="col-lg-6">
        <div class="card card-dark p-4">
          <h5 class="fw-bold mb-4">
            <i class="bi bi-trophy-fill me-2 text-warning"></i> Top Depositors (All Time)
          </h5>
          <div class="table-responsive">
            <table class="table table-dark table-hover table-borderless mb-0">
              <thead>
                <tr>
                  <th scope="col">Rank</th>
                  <th scope="col">User</th>
                  <th scope="col">Total Deposited</th>
                  <th scope="col">Last Deposit</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><span class="badge bg-warning text-dark fw-bold">1</span></td>
                  <td>John Doe <br><small class="text-secondary">(USER-001247)</small></td>
                  <td class="text-success fw-bold">$187,420</td>
                  <td>Feb 20, 2026</td>
                </tr>
                <tr>
                  <td><span class="badge bg-secondary fw-bold">2</span></td>
                  <td>Jane Smith <br><small class="text-secondary">(USER-001246)</small></td>
                  <td class="text-success fw-bold">$142,800</td>
                  <td>Feb 18, 2026</td>
                </tr>
                <tr>
                  <td><span class="badge bg-dark fw-bold border border-secondary">3</span></td>
                  <td>Michael Brown <br><small class="text-secondary">(USER-001245)</small></td>
                  <td class="text-success fw-bold">$98,500</td>
                  <td>Feb 15, 2026</td>
                </tr>
                <tr>
                  <td colspan="4" class="text-center text-muted py-3">
                    <a href="#" class="text-info small">View full list →</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Recent High-Value Transactions -->
      <div class="col-lg-6">
        <div class="card card-dark p-4">
          <h5 class="fw-bold mb-4">
            <i class="bi bi-lightning-charge-fill me-2 text-info"></i> Recent High-Value Transactions
          </h5>
          <div class="table-responsive">
            <table class="table table-dark table-hover table-borderless mb-0">
              <thead>
                <tr>
                  <th scope="col">TXN ID</th>
                  <th scope="col">User</th>
                  <th scope="col">Type</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><code class="text-info">TXN-987654321</code></td>
                  <td>John Doe</td>
                  <td><span class="badge bg-success">Deposit</span></td>
                  <td class="text-success fw-bold">+$25,000</td>
                  <td>Feb 20, 2026</td>
                </tr>
                <tr>
                  <td><code class="text-info">TXN-987654320</code></td>
                  <td>Jane Smith</td>
                  <td><span class="badge bg-danger">Withdrawal</span></td>
                  <td class="text-danger fw-bold">-$18,500</td>
                  <td>Feb 18, 2026</td>
                </tr>
                <tr>
                  <td><code class="text-info">TXN-987654319</code></td>
                  <td>Michael Brown</td>
                  <td><span class="badge bg-success">Deposit</span></td>
                  <td class="text-success fw-bold">+$15,000</td>
                  <td>Feb 15, 2026</td>
                </tr>
                <tr>
                  <td colspan="5" class="text-center text-muted py-3">
                    <a href="#" class="text-info small">View full report →</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Sidebar Toggle Functionality
const sidebarToggle = document.getElementById('sidebarToggle');
const sidebar = document.getElementById('sidebar');
const sidebarOverlay = document.getElementById('sidebarOverlay');

// Toggle sidebar on button click
sidebarToggle.addEventListener('click', function() {
  sidebar.classList.toggle('active');
  sidebarOverlay.classList.toggle('active');
});

// Close sidebar when overlay is clicked
sidebarOverlay.addEventListener('click', function() {
  sidebar.classList.remove('active');
  sidebarOverlay.classList.remove('active');
});

// Close sidebar when a nav link is clicked (on mobile)
const navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(link => {
  link.addEventListener('click', function() {
    if (window.innerWidth <= 768) {
      sidebar.classList.remove('active');
      sidebarOverlay.classList.remove('active');
    }
  });
});

// Revenue vs Withdrawals Chart
const ctx1 = document.getElementById('revenueVsWithdrawalChart').getContext('2d');
new Chart(ctx1, {
  type: 'bar',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [{
      label: 'Deposits',
      data: [65000, 72000, 89000, 105000, 98000, 112000, 134000, 145000, 128000, 156000, 172000, 189000],
      backgroundColor: 'rgba(34, 197, 94, 0.6)',
      borderColor: '#22c55e',
      borderWidth: 1
    }, {
      label: 'Withdrawals',
      data: [-42000, -51000, -68000, -75000, -62000, -88000, -95000, -102000, -89000, -110000, -125000, -132000],
      backgroundColor: 'rgba(239, 68, 68, 0.6)',
      borderColor: '#ef4444',
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      y: { 
        beginAtZero: true, 
        grid: { color: '#222' },
        ticks: { color: '#ccc' }
      },
      x: { 
        grid: { display: false },
        ticks: { color: '#ccc' }
      }
    },
    plugins: { 
      legend: { labels: { color: '#ccc' } }
    }
  }
});

// User Registration Trend (Line Chart)
const ctx2 = document.getElementById('userGrowthChart').getContext('2d');
new Chart(ctx2, {
  type: 'line',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [{
      label: 'New Users',
      data: [420, 580, 720, 890, 950, 1120, 1340, 1450, 1280, 1560, 1720, 1890],
      borderColor: '#3b82f6',
      backgroundColor: 'rgba(59, 130, 246, 0.2)',
      borderWidth: 3,
      tension: 0.4,
      fill: true,
      pointBackgroundColor: '#3b82f6',
      pointBorderColor: '#fff',
      pointBorderWidth: 2,
      pointRadius: 5
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      y: { 
        beginAtZero: true, 
        grid: { color: '#222' },
        ticks: { color: '#ccc' }
      },
      x: { 
        grid: { display: false },
        ticks: { color: '#ccc' }
      }
    },
    plugins: { 
      legend: { labels: { color: '#ccc' } }
    }
  }
});
</script>

</body>
</html>