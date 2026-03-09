<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Withdrawals - SUNHILL Admin</title>

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

    .badge-pending     { background: #f59e0b; color: #000; }
    .badge-processing  { background: #3b82f6; color: white; }
    .badge-completed   { background: #22c55e; color: white; }
    .badge-cancelled   { background: #ef4444; color: white; }

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

    .alert {
      margin-top: 1rem;
      border: 1px solid;
    }

    .alert-success {
      background: rgba(34, 197, 94, 0.15);
      border-color: rgba(34, 197, 94, 0.3);
      color: #86efac;
    }

    .alert-danger {
      background: rgba(239, 68, 68, 0.15);
      border-color: rgba(239, 68, 68, 0.3);
      color: #fca5a5;
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
    SUNHILL <span>Admin</span>
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
          <a href="{{ route('admin.withdrawals') }}" class="nav-link active">
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

    <!-- Alerts -->
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
      <h1 class="display-5 fw-bold mb-0">
        <i class="bi bi-cash-stack me-2 text-danger"></i> Manage Withdrawals
      </h1>
      <span class="text-secondary">{{ now()->format('F d, Y') }}</span>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mb-5">
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Withdrawals</h5>
            <i class="bi bi-cash-stack stat-icon text-danger"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">${{ number_format(\App\Models\Withdrawal::totalWithdrawals(), 2) }}</h2>
          <p class="text-danger small mb-0">Processed this month</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Pending Withdrawals</h5>
            <i class="bi bi-hourglass-split stat-icon text-warning"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-warning">{{ \App\Models\Withdrawal::pendingWithdrawalsCount() }}</h2>
          <p class="text-warning small mb-0">${{ number_format(\App\Models\Withdrawal::pendingWithdrawals(), 2) }} awaiting</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Today's Withdrawals</h5>
            <i class="bi bi-sun-fill stat-icon text-info"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">${{ number_format(\App\Models\Withdrawal::todayWithdrawals(), 2) }}</h2>
          <p class="text-info small mb-0">+{{ \App\Models\Withdrawal::todayVsYesterday() }}% vs yesterday</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Avg. Withdrawal</h5>
            <i class="bi bi-graph-down stat-icon text-primary"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">${{ number_format(\App\Models\Withdrawal::averageWithdrawal(), 2) }}</h2>
          <p class="text-primary small mb-0">Up from ${{ number_format(\App\Models\Withdrawal::averageWithdrawalVsLastMonth(), 2) }} last month</p>
        </div>
      </div>
    </div>

    <!-- Search & Filters -->
    <div class="card card-dark mb-5">
      <div class="card-body">
        <div class="row g-3 align-items-center">
          <div class="col-md-5">
            <div class="input-group input-group-lg">
              <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control search-input" placeholder="Search by user, TXN ID, amount...">
            </div>
          </div>
          <div class="col-md-3">
            <select class="form-select form-select-lg form-select-dark">
              <option selected>All Status</option>
              <option>Completed</option>
              <option>Processing</option>
              <option>Cancelled</option>
            </select>
          </div>
          <div class="col-md-4">
            <div class="d-flex gap-2">
              <button class="btn btn-outline-success flex-grow-1 btn-lg">
                <i class="bi bi-check-circle me-2"></i> Approve Selected
              </button>
              <button class="btn btn-outline-danger flex-grow-1 btn-lg">
                <i class="bi bi-x-circle me-2"></i> Reject Selected
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Withdrawals Table -->
    <div class="card card-dark shadow-lg overflow-hidden">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-dark table-hover table-borderless mb-0">
            <thead>
              <tr>
                <th scope="col"><input type="checkbox" class="form-check-input"></th>
                <th scope="col">TXN ID</th>
                <th scope="col">User</th>
                <th scope="col">Amount</th>
                <th scope="col">Method</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($withdrawals as $withdrawal)
                <tr>
                  <td><input type="checkbox" class="form-check-input"></td>
                  <td><code class="text-info">{{ $withdrawal->txn_id }}</code></td>
                  <td>
                    {{ $withdrawal->user->name }}
                    <br><small class="text-secondary">ID: {{ $withdrawal->user->user_id ?? $withdrawal->user->id }}</small>
                  </td>
                  <td class="text-danger fw-bold">-${{ number_format($withdrawal->amount, 2) }}</td>
                  <td><span class="badge bg-secondary">{{ $withdrawal->payment_method }}</span></td>
                  <td>{{ $withdrawal->created_at->format('M d, Y g:i A') }}</td>
                  <td>
                    <span class="badge badge-{{ $withdrawal->status }}">
                      {{ ucfirst($withdrawal->status) }}
                    </span>
                  </td>
                  <td>
                    <div class="btn-group btn-group-sm" role="group">
                      <button class="btn btn-outline-light"
                              data-bs-toggle="modal"
                              data-bs-target="#viewWithdrawalModal{{ $withdrawal->id }}"
                              title="View Details">
                        <i class="bi bi-eye"></i> View
                      </button>
                      @if ($withdrawal->status == 'processing')
                        <form action="{{ route('admin.withdrawal.approve', $withdrawal->id) }}" method="POST" style="display: contents;">
                          @csrf
                          <button type="submit" class="btn btn-outline-success" 
                                  onclick="return confirm('Approve this withdrawal?')">
                            <i class="bi bi-check-circle"></i>
                          </button>
                        </form>
                        <form action="{{ route('admin.withdrawals.cancel', $withdrawal->id) }}" method="POST" style="display: contents;">
                          @csrf
                          <button type="submit" class="btn btn-outline-danger" 
                                  onclick="return confirm('Cancel this withdrawal?')">
                            <i class="bi bi-x-circle"></i>
                          </button>
                        </form>
                      @endif
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="8" class="text-center text-muted py-5">
                    <i class="bi bi-inbox"></i> No withdrawal requests found.
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

<!-- View Withdrawal Modals -->
@forelse ($withdrawals as $withdrawal)
  <div class="modal fade" id="viewWithdrawalModal{{ $withdrawal->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content card-dark border-0 shadow-lg" style="border: 1px solid #333;">
        <!-- Modal Header -->
        <div class="modal-header border-bottom border-secondary">
          <h5 class="modal-title fw-bold fs-4">
            <i class="bi bi-cash-stack me-2 text-danger"></i> Withdrawal Details
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body p-4">
          <div class="row g-4">
            <!-- Left Column -->
            <div class="col-md-6">
              <div class="mb-4">
                <label class="text-secondary small"><i class="bi bi-person me-1"></i> User</label>
                <p class="fw-bold">{{ $withdrawal->user->name }}</p>
                <small class="text-muted">{{ $withdrawal->user->email }}</small>
              </div>

              <div class="mb-4">
                <label class="text-secondary small"><i class="bi bi-currency-dollar me-1"></i> Amount</label>
                <p class="fs-4 fw-bold text-danger">-${{ number_format($withdrawal->amount, 2) }}</p>
              </div>

              <div class="mb-4">
                <label class="text-secondary small"><i class="bi bi-credit-card me-1"></i> Payment Method</label>
                <p class="fw-bold">{{ ucfirst($withdrawal->payment_method) }}</p>
              </div>

              <div class="mb-4">
                <label class="text-secondary small"><i class="bi bi-wallet2 me-1"></i> Wallet Address</label>
                <p class="text-break font-monospace small">{{ $withdrawal->wallet_details ?? 'N/A' }}</p>
              </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
              <div class="mb-4">
                <label class="text-secondary small"><i class="bi bi-hash me-1"></i> Transaction ID</label>
                <p class="fw-bold"><code class="text-info">{{ $withdrawal->txn_id }}</code></p>
              </div>

              <div class="mb-4">
                <label class="text-secondary small"><i class="bi bi-calendar me-1"></i> Requested On</label>
                <p class="fw-bold">{{ $withdrawal->created_at->format('M d, Y • h:i A') }}</p>
              </div>

              <div class="mb-4">
                <label class="text-secondary small"><i class="bi bi-info-circle me-1"></i> Current Status</label>
                <p>
                  <span class="badge badge-{{ $withdrawal->status }} px-3 py-2">
                    {{ ucfirst($withdrawal->status) }}
                  </span>
                </p>
              </div>

              @if($withdrawal->proof_image)
                <div class="mb-4">
                  <label class="text-secondary small"><i class="bi bi-image me-1"></i> Proof Image</label>
                  <a href="{{ Storage::url($withdrawal->proof_image) }}" target="_blank" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-eye me-1"></i> View
                  </a>
                </div>
              @endif
            </div>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer border-top border-secondary">
          <button type="button" class="btn btn-outline-light px-4" data-bs-dismiss="modal">Close</button>

          @if($withdrawal->status === 'processing')
            <!-- Approve -->
            <form action="{{ route('admin.withdrawal.approve', $withdrawal->id) }}" method="POST" style="display: contents;">
              @csrf
              <button type="submit" class="btn btn-outline-success px-4"
                      onclick="return confirm('Approve this withdrawal? It will be marked as completed.')">
                <i class="bi bi-check-circle me-1"></i> Approve
              </button>
            </form>

            <!-- Cancel -->
            <form action="{{ route('admin.withdrawals.cancel', $withdrawal->id) }}" method="POST" style="display: contents;">
              @csrf
              <button type="submit" class="btn btn-outline-danger px-4"
                      onclick="return confirm('Cancel this withdrawal? Balance will be refunded.')">
                <i class="bi bi-x-circle me-1"></i> Cancel
              </button>
            </form>
          @endif
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