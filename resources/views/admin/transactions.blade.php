<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Transactions - SUNHILL Admin</title>

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

    .badge-deposit    { background: #22c55e; color: white; }
    .badge-withdrawal { background: #ef4444; color: white; }
    .badge-bonus      { background: #f59e0b; color: #000; }
    .badge-pending    { background: #3b82f6; color: white; }

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

    .filter-btn {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #ccc;
      font-weight: 500;
      transition: all 0.3s;
    }

    .filter-btn.active,
    .filter-btn:hover {
      background: #ef4444;
      color: white;
      border-color: #ef4444;
    }

    .btn-outline-light:hover {
      background: rgba(255, 255, 255, 0.1);
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
          <a href="{{ route('admin.transactions') }}" class="nav-link active">
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
        <i class="bi bi-receipt me-2 text-danger"></i> Manage Transactions
      </h1>
      <span class="text-secondary">{{ now()->format('F d, Y') }}</span>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mb-5">
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Transactions</h5>
            <i class="bi bi-receipt stat-icon text-info"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">48,921</h2>
          <p class="text-info small mb-0">All time</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Deposits Today</h5>
            <i class="bi bi-currency-dollar stat-icon text-success"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-success">$142,870</h2>
          <p class="text-success small mb-0">+14% vs yesterday</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Withdrawals Today</h5>
            <i class="bi bi-cash-stack stat-icon text-danger"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-danger">$87,420</h2>
          <p class="text-danger small mb-0">8 pending</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Pending Transactions</h5>
            <i class="bi bi-hourglass-split stat-icon text-warning"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-warning">193</h2>
          <p class="text-warning small mb-0">Awaiting review</p>
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
              <input type="text" class="form-control search-input" placeholder="Search by TXN ID, user, amount...">
            </div>
          </div>
          <div class="col-md-4">
            <div class="btn-group w-100" role="group">
              <button type="button" class="btn filter-btn active flex-grow-1">
                <i class="bi bi-list me-1"></i> All
              </button>
              <button type="button" class="btn filter-btn flex-grow-1">
                <i class="bi bi-plus-circle me-1"></i> Deposits
              </button>
              <button type="button" class="btn filter-btn flex-grow-1">
                <i class="bi bi-dash-circle me-1"></i> Withdrawals
              </button>
              <button type="button" class="btn filter-btn flex-grow-1">
                <i class="bi bi-gift me-1"></i> Bonuses
              </button>
            </div>
          </div>
          <div class="col-md-3">
            <select class="form-select form-select-lg form-select-dark">
              <option selected>All Status</option>
              <option>Completed</option>
              <option>Pending</option>
              <option>Failed</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <!-- Transactions Table -->
    <div class="card card-dark shadow-lg overflow-hidden">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-dark table-hover table-borderless mb-0">
            <thead>
              <tr>
                <th scope="col">TXN ID</th>
                <th scope="col">User</th>
                <th scope="col">Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Method</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($transactions as $transaction)
                <tr>
                  <!-- TXN ID -->
                  <td>
                    <code class="text-info">
                      {{ $transaction->tx_ref ?? 'TXN-' . str_pad($transaction->id, 8, '0', STR_PAD_LEFT) }}
                    </code>
                  </td>

                  <!-- User -->
                  <td>
                    <strong>{{ $transaction->user->name ?? 'N/A' }}</strong>
                    <br>
                    <small class="text-secondary">{{ $transaction->user->email ?? 'N/A' }}</small>
                  </td>

                  <!-- Type -->
                  <td>
                    @if($transaction->type === 'deposit')
                      <span class="badge badge-deposit">
                        <i class="bi bi-arrow-down me-1"></i> Deposit
                      </span>
                    @elseif($transaction->type === 'withdrawal')
                      <span class="badge badge-withdrawal">
                        <i class="bi bi-arrow-up me-1"></i> Withdrawal
                      </span>
                    @else
                      <span class="badge bg-secondary">
                        {{ ucfirst($transaction->type) }}
                      </span>
                    @endif
                  </td>

                  <!-- Amount -->
                  <td>
                    @if($transaction->type === 'deposit')
                      <span class="text-success fw-bold">
                        +₦{{ number_format($transaction->amount, 2) }}
                      </span>
                    @else
                      <span class="text-danger fw-bold">
                        -₦{{ number_format($transaction->amount, 2) }}
                      </span>
                    @endif
                  </td>

                  <!-- Description (Method) -->
                  <td>
                    <small>{{ $transaction->description ?? 'N/A' }}</small>
                  </td>

                  <!-- Date -->
                  <td>
                    <small>
                      {{ $transaction->created_at->format('M d, Y') }}
                      <br>
                      <span class="text-secondary">{{ $transaction->created_at->format('h:i A') }}</span>
                    </small>
                  </td>

                  <!-- Status -->
                  <td>
                    @if($transaction->status === 'completed')
                      <span class="badge bg-success">
                        <i class="bi bi-check-circle me-1"></i> Completed
                      </span>
                    @elseif($transaction->status === 'pending')
                      <span class="badge bg-warning text-dark">
                        <i class="bi bi-hourglass-split me-1"></i> Pending
                      </span>
                    @elseif($transaction->status === 'failed')
                      <span class="badge bg-danger">
                        <i class="bi bi-x-circle me-1"></i> Failed
                      </span>
                    @else
                      <span class="badge bg-secondary">
                        {{ ucfirst($transaction->status) }}
                      </span>
                    @endif
                  </td>

                  <!-- Actions -->
                  <td>
                    <button class="btn btn-sm btn-outline-light"
                            data-bs-toggle="modal"
                            data-bs-target="#viewTransactionModal{{ $transaction->id }}"
                            title="View Details">
                      <i class="bi bi-eye"></i> View
                    </button>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="8" class="text-center py-5">
                    <i class="bi bi-inbox text-secondary" style="font-size: 2rem;"></i>
                    <p class="text-secondary mt-3">No transactions found</p>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      <!-- Pagination -->

      <div class="card-footer bg-transparent border-top border-secondary">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
          <div class="text-secondary small">
            Displaying transactions from all sources
          </div>
          <div>
            {{-- {{ $transactions->links('pagination::bootstrap-5') }} --}}
          </div>
        </div>
      </div>
    </div>

  </div>
</main>

<!-- View Transaction Modals -->
  @forelse ($transactions  as $transaction)
    <div class="modal fade" id="viewTransactionModal{{ $transaction->id }}" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content card-dark border-0 shadow-lg" style="border: 1px solid #333;">
          <div class="modal-header border-bottom border-secondary">
            <h5 class="modal-title fw-bold fs-4">
              <i class="bi bi-receipt me-2 {{ $transaction instanceof \App\Models\Deposit ? 'text-success' : 'text-danger' }}"></i>
              {{ $transaction instanceof \App\Models\Deposit ? 'Deposit' : 'Withdrawal' }} Details
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-4">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="text-secondary small"><i class="bi bi-person me-1"></i> User</label>
                  <p class="fw-bold">{{ $transaction->user->name ?? 'N/A' }}</p>
                </div>
                <div class="mb-3">
                  <label class="text-secondary small"><i class="bi bi-envelope me-1"></i> Email</label>
                  <p>{{ $transaction->user->email ?? 'N/A' }}</p>
                </div>
                <div class="mb-3">
                  <label class="text-secondary small"><i class="bi bi-currency-dollar me-1"></i> Amount</label>
                  <p class="fw-bold {{ $transaction instanceof \App\Models\Deposit ? 'text-success' : 'text-danger' }}">
                    {{ $transaction instanceof \App\Models\Deposit ? '+' : '-' }}${{ number_format($transaction->amount, 2) }}
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="text-secondary small"><i class="bi bi-credit-card me-1"></i> Payment Method</label>
                  <p class="fw-bold">{{ ucfirst($transaction->payment_method) }}</p>
                </div>
                <div class="mb-3">
                  <label class="text-secondary small"><i class="bi bi-info-circle me-1"></i> Status</label>
                  <p>
                    <span class="badge bg-{{ $transaction->status == 'approved' || $transaction->status == 'completed' ? 'success' : ($transaction->status == 'rejected' || $transaction->status == 'cancelled' ? 'danger' : 'warning text-dark') }}">
                      {{ ucfirst($transaction->status) }}
                    </span>
                  </p>
                </div>
                <div class="mb-3">
                  <label class="text-secondary small"><i class="bi bi-calendar me-1"></i> Date & Time</label>
                  <p>{{ $transaction->created_at->format('M d, Y • h:i A') }}</p>
                </div>
              </div>
            </div>

            @if($transaction->proof_image)
              <div class="mt-4 pt-4 border-top border-secondary">
                <label class="fw-semibold text-secondary mb-3"><i class="bi bi-image me-1"></i> Proof of Payment</label>
                <a href="{{ Storage::url($transaction->proof_image) }}" target="_blank" class="btn btn-outline-light btn-sm">
                  <i class="bi bi-eye me-1"></i> View Proof Image
                </a>
              </div>
            @endif
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

// Filter button functionality
const filterButtons = document.querySelectorAll('.filter-btn');
filterButtons.forEach(button => {
  button.addEventListener('click', function() {
    filterButtons.forEach(btn => btn.classList.remove('active'));
    this.classList.add('active');
  });
});
</script>

</body>
</html>
