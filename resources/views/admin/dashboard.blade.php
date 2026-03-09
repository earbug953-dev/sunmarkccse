<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard - SUNHILL</title>

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

    .badge-admin {
      background: #ef4444;
      color: white;
      font-size: 0.9rem;
      padding: 0.5em 1em;
    }

    .table-dark thead th {
      background: #1a1a1a;
      color: #ccc;
      border-bottom: 1px solid #444;
    }

    .table-dark td {
      border-color: #333;
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
        <a href="{{ route('admin.dashboard') }}" class="nav-link active">
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
          <a href="{{ route('admin.reports') }}" class="nav-link">
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
      <h1 class="display-5 fw-bold mb-0">Admin Dashboard</h1>
      <span class="text-secondary">{{ now()->format('l, d M Y') }}</span>
    </div>

    <!-- Stats Overview Cards -->
    <div class="row g-4 mb-5">
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Users</h5>
            <i class="bi bi-people-fill stat-icon text-primary"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">{{ $user->totalUsers() }}</h2>
          <p class="text-success small mb-0">+{{ $user->newUsersThisWeek() }} this week</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Deposits</h5>
            <i class="bi bi-currency-dollar stat-icon text-success"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">${{ number_format(App\Models\Deposit::totalDeposits(), 2) }}</h2>
          <p class="text-success small mb-0">+${{ number_format(App\Models\Deposit::totalDepositsToday(), 2) }} today</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Active Plans</h5>
            <i class="bi bi-rocket-takeoff-fill stat-icon text-warning"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">3,291</h2>
          <p class="text-warning small mb-0">89 new today</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Pending Withdrawals</h5>
            <i class="bi bi-hourglass-split stat-icon text-danger"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-danger">47</h2>
          <p class="text-danger small mb-0">$218,450 pending</p>
        </div>
      </div>
    </div>

    <!-- Charts & Recent Activity -->
    <div class="row g-4">

      <!-- Revenue Chart -->
      <div class="col-lg-8">
        <div class="card card-dark p-4">
          <h5 class="fw-bold mb-4">Revenue Overview (Last 30 Days)</h5>
          <canvas id="revenueChart" style="max-height: 380px;"></canvas>
        </div>
      </div>

      <!-- Recent Activity -->
      <div class="col-lg-4">
        <div class="card card-dark p-4 h-100">
          <h5 class="fw-bold mb-4">Recent Activity</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item bg-transparent border-bottom border-secondary py-3">
              <div class="d-flex justify-content-between">
                <div>
                  <strong>New User Registration</strong><br>
                  <small class="text-secondary">{{ $user->newestUsers()->first()?->email ?? 'Unknown User' }}</small>
                </div>
                <small class="text-muted">{{ $user->newestUsers()->first()?->createdAtHuman() ?? 'Unknown Time' }}</small>
              </div>
            </li>
            <li class="list-group-item bg-transparent border-bottom border-secondary py-3">
              <div class="d-flex justify-content-between">
                <div>
                  <strong>Withdrawal Request</strong><br>
                  <small class="text-secondary">$4,500 (BTC)</small>
                </div>
                <small class="text-muted">14 min ago</small>
              </div>
            </li>
            <li class="list-group-item bg-transparent border-bottom border-secondary py-3">
              <div class="d-flex justify-content-between">
                <div>
                  <strong>Deposit Completed</strong><br>
                  <small class="text-secondary">${{ number_format(App\Models\Deposit::recentDeposits()->first()?->amount ?? 0, 2) }}</small>
                </div>
                <small class="text-muted">{{ App\Models\Deposit::recentDeposits()->first()?->createdAtHuman() ?? 'Unknown Time' }}</small>
              </div>
            </li>
            <li class="list-group-item bg-transparent py-3">
              <div class="d-flex justify-content-between">
                <div>
                  <strong>Plan Purchased</strong><br>
                  <small class="text-secondary">VIP AI Plan ($15,000)</small>
                </div>
                <small class="text-muted">3 hrs ago</small>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="row g-4 mt-5">
      <div class="col-md-4">
        <a href="#" class="btn btn-outline-danger w-100 py-4 fs-5 fw-bold">
          <i class="bi bi-cash-stack me-2 fs-3"></i> Review Withdrawals
        </a>
      </div>
      <div class="col-md-4">
        <a href="#" class="btn btn-outline-success w-100 py-4 fs-5 fw-bold">
          <i class="bi bi-currency-dollar me-2 fs-3"></i> Approve Deposits
        </a>
      </div>
      <div class="col-md-4">
        <a href="#" class="btn btn-outline-primary w-100 py-4 fs-5 fw-bold">
          <i class="bi bi-people-fill me-2 fs-3"></i> Manage Users
        </a>
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

// Set active nav link based on current page
document.addEventListener('DOMContentLoaded', function() {
  const currentPath = window.location.pathname;
  navLinks.forEach(link => {
    if (link.getAttribute('href').includes(currentPath.split('/')[2])) {
      link.classList.add('active');
    } else {
      link.classList.remove('active');
    }
  });
});

// Revenue Chart (mock data)
const ctx = document.getElementById('revenueChart').getContext('2d');
new Chart(ctx, {
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
    scales: {
      y: { beginAtZero: true, grid: { color: '#222' } },
      x: { grid: { display: false } }
    },
    plugins: { legend: { labels: { color: '#ccc' } } }
  }
});
</script>
</body>
</html>