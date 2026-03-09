<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Users - SUNHILL Admin</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

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

    .table-dark thead th {
      background: #1a1a1a;
      color: #ccc;
      border-bottom: 1px solid #444;
    }

    .table-dark td {
      border-color: #333;
      vertical-align: middle;
    }

    .badge {
      font-size: 0.85rem;
      padding: 0.5em 0.75em;
      font-weight: 600;
    }

    .badge-active   { background: #22c55e; color: white; }
    .badge-pending  { background: #f59e0b; color: #000; }
    .badge-blocked  { background: #ef4444; color: white; }

    .search-input {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #fff;
    }

    .search-input:focus {
      border-color: #ef4444;
      box-shadow: 0 0 0 0.25rem rgba(239, 68, 68, 0.25);
      color: #fff;
      background: #1a1a1a;
    }

    .form-select-dark {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #fff;
    }

    .form-select-dark:focus {
      border-color: #ef4444;
      box-shadow: 0 0 0 0.25rem rgba(239, 68, 68, 0.25);
      color: #fff;
    }

    .btn-outline-primary {
      border-color: #3b82f6;
      color: #3b82f6;
    }

    .btn-outline-primary:hover {
      background: #3b82f6;
      border-color: #3b82f6;
      color: white;
    }

    .user-card {
      transition: all 0.25s ease;
      border: 1px solid #333;
    }

    .user-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 30px rgba(0,0,0,0.6);
    }

    .avatar-circle {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, #3b82f6, #22c55e);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
      font-weight: bold;
      color: white;
      position: relative;
    }

    .avatar-circle.online::after {
      content: '';
      position: absolute;
      bottom: 4px;
      right: 4px;
      width: 16px;
      height: 16px;
      background: #22c55e;
      border: 3px solid #111;
      border-radius: 50%;
      box-shadow: 0 0 8px rgba(34,197,94,0.6);
    }

    .pagination-compact {
      font-size: 0.875rem;
    }

    .pagination-compact .page-item .page-link {
      min-width: 32px;
      height: 32px;
      padding: 0.25rem 0.5rem;
      background: #1a1a1a;
      border: 1px solid #444;
      color: #bbb;
      border-radius: 6px !important;
      margin: 0 3px;
    }

    .pagination-compact .page-item.active .page-link {
      background: #ef4444;
      border-color: #ef4444;
      color: white;
      font-weight: 600;
    }

    .pagination-compact .page-link:hover {
      background: #222;
      color: white;
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
          <a href="{{ route('admin.users') }}" class="nav-link active">
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
      <h1 class="display-5 fw-bold mb-0">
        <i class="bi bi-people-fill me-2 text-danger"></i> Manage Users
      </h1>
      <span class="text-secondary">{{ now()->format('F d, Y') }}</span>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mb-5">
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Users</h5>
            <i class="bi bi-people-fill stat-icon text-primary"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">{{ \App\Models\User::totalUsers() }}</h2>
          <p class="text-success small mb-0">+{{ \App\Models\User::newUsersThisWeek() }} new this week</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Active Users</h5>
            <i class="bi bi-check-circle-fill stat-icon text-success"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">{{ \App\Models\User::onlineUsers() }}</h2>
          <p class="text-success small mb-0">{{ number_format(\App\Models\User::onlinePercentage(), 1) }}% active</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Pending KYC</h5>
            <i class="bi bi-hourglass-split stat-icon text-warning"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-warning">142</h2>
          <p class="text-warning small mb-0">Awaiting verification</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Inactive Users</h5>
            <i class="bi bi-slash-circle-fill stat-icon text-danger"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-danger">{{ \App\Models\User::inactiveUsers() }}</h2>
          <p class="text-danger small mb-0">{{ number_format(\App\Models\User::inactivePercentage(), 1) }}% inactive</p>
        </div>
      </div>
    </div>

    <!-- Search & Filters -->
    <div class="card card-dark mb-5">
      <div class="card-body">
        <div class="row g-3 align-items-center">
          <div class="col-md-6">
            <div class="input-group input-group-lg">
              <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control search-input" placeholder="Search by name, email, username...">
            </div>
          </div>
          <div class="col-md-3">
            <select class="form-select form-select-lg form-select-dark">
              <option selected>All Status</option>
              <option>Active</option>
              <option>Pending KYC</option>
              <option>Blocked</option>
            </select>
          </div>
          <div class="col-md-3">
            <button class="btn btn-outline-primary w-100 btn-lg">
              <i class="bi bi-funnel me-2"></i> Filter
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Users Table -->
    <div class="card card-dark shadow-lg overflow-hidden">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-dark table-hover table-borderless mb-0">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Balance</th>
                <th scope="col">Joined</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($users as $user)
                <tr>
                  <td><code class="text-info">USER-{{ str_pad($user->id, 6, '0', STR_PAD_LEFT) }}</code></td>
                  <td class="fw-bold">{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td class="text-success fw-bold">${{ number_format($user->balance ?? 0, 2) }}</td>
                  <td>{{ $user->created_at->format('M j, Y') }}</td>
                  <td>
                    @if($user->isOnline())
                      <span class="badge badge-active">
                        <i class="bi bi-circle-fill me-1" style="font-size: 0.5rem;"></i> Online
                      </span>
                    @else
                      <span class="badge badge-blocked">
                        <i class="bi bi-circle me-1" style="font-size: 0.5rem;"></i> Offline
                      </span>
                    @endif
                  </td>
                  <td>
                    <div class="btn-group btn-group-sm" role="group">
                      <button class="btn btn-outline-light"
                              data-bs-toggle="modal"
                              data-bs-target="#viewUserModal{{ $user->id }}"
                              title="View Details">
                        <i class="bi bi-eye"></i> View
                      </button>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center text-muted py-5">
                    <i class="bi bi-inbox"></i> No users found.
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      
    </div>

  </div>
</main>

<!-- View User Modals -->
@forelse ($users as $user)
  <div class="modal fade" id="viewUserModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content card-dark border-0 shadow-lg" style="border: 1px solid #333;">
        <div class="modal-header border-bottom border-secondary">
          <h5 class="modal-title fw-bold fs-4">
            <i class="bi bi-person-circle me-2 text-info"></i> {{ $user->name }}
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <div class="row g-4">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="text-secondary small"><i class="bi bi-hash me-1"></i> User ID</label>
                <p class="fw-bold">USER-{{ str_pad($user->id, 6, '0', STR_PAD_LEFT) }}</p>
              </div>
              <div class="mb-3">
                <label class="text-secondary small"><i class="bi bi-envelope me-1"></i> Email</label>
                <p>{{ $user->email }}</p>
              </div>
              <div class="mb-3">
                <label class="text-secondary small"><i class="bi bi-person me-1"></i> Username</label>
                <p>{{ $user->username ?? 'N/A' }}</p>
              </div>
              <div class="mb-3">
                <label class="text-secondary small"><i class="bi bi-telephone me-1"></i> Phone</label>
                <p>{{ $user->phone ?? 'N/A' }}</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="text-secondary small"><i class="bi bi-wallet2 me-1"></i> Balance</label>
                <p class="fw-bold text-success">${{ number_format($user->balance ?? 0, 2) }}</p>
              </div>
              <div class="mb-3">
                <label class="text-secondary small"><i class="bi bi-calendar me-1"></i> Joined</label>
                <p>{{ $user->created_at->format('M j, Y • h:i A') }}</p>
              </div>
              <div class="mb-3">
                <label class="text-secondary small"><i class="bi bi-circle-fill me-1"></i> Status</label>
                <p>
                  @if($user->isOnline())
                    <span class="badge badge-active">Online</span>
                  @else
                    <span class="badge badge-blocked">Offline</span>
                    <br>
                    <small class="text-muted">Last seen {{ $user->lastSeenHuman() }}</small>
                  @endif
                </p>
              </div>
              <div class="mb-3">
                <label class="text-secondary small"><i class="bi bi-shield me-1"></i> Role</label>
                <p><span class="badge bg-secondary">{{ ucfirst($user->role ?? 'user') }}</span></p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer border-top border-secondary">
          <button type="button" class="btn btn-outline-light px-4" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@empty
@endforelse

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
</script>

</body>
</html>