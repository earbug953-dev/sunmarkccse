<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Deposits - SUNHILL Admin</title>

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
      font-size: 0.9rem;
      padding: 0.5em 1em;
    }

    .badge-pending     { background: #f59e0b; color: #000; }
    .badge-processing  { background: #3b82f6; color: white; }
    .badge-completed   { background: #22c55e; color: white; }
    .badge-failed      { background: #ef4444; color: white; }

    .search-input {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #fff;
    }

    .search-input:focus {
      border-color: #22c55e;
      box-shadow: 0 0 0 0.25rem rgba(34,197,94,0.25);
    }

    .form-select-dark {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #fff;
    }

    .form-select-dark:focus {
      border-color: #22c55e;
      box-shadow: 0 0 0 0.25rem rgba(34,197,94,0.25);
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
          <a href="{{ route('admin.deposits') }}" class="nav-link active">
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
      <h1 class="display-5 fw-bold mb-0">Manage Deposits</h1>
      <span class="text-secondary">{{ now()->format('F d, Y') }}</span>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mb-5">
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Deposits</h5>
            <i class="bi bi-currency-dollar stat-icon text-success"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">${{ number_format(App\Models\Deposit::totalDeposits(), 0) }}</h2>
          <p class="text-success small mb-0">+${{ number_format(App\Models\Deposit::totalDepositsThisMonth(), 0) }} this month</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Pending Deposits</h5>
            <i class="bi bi-hourglass-split stat-icon text-warning"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-warning">{{ count($deposits->where('status', 'pending')) }}</h2>
          <p class="text-warning small mb-0">${{ number_format($deposits->where('status', 'pending')->sum('amount'), 0) }} awaiting</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Today's Deposits</h5>
            <i class="bi bi-sun-fill stat-icon text-info"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">${{ number_format(App\Models\Deposit::totalDepositsToday(), 0) }}</h2>
          <p class="text-info small mb-0">{{ count(App\Models\Deposit::whereDate('created_at', today())->get()) }} transactions</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Approved Deposits</h5>
            <i class="bi bi-check-circle stat-icon text-primary"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">{{ count($deposits->where('status', 'approved')) }}</h2>
          <p class="text-primary small mb-0">${{ number_format($deposits->where('status', 'approved')->sum('amount'), 0) }}</p>
        </div>
      </div>
    </div>

    <!-- Search & Filters -->
    <div class="card card-dark mb-5">
      <div class="card-body">
        <div class="row g-3 align-items-center">
          <div class="col-md-5">
            <div class="input-group input-group-lg">
              <span class="input-group-text bg-dark border-secondary"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control search-input" placeholder="Search by user, TXN ID, amount...">
            </div>
          </div>
          <div class="col-md-3">
            <select class="form-select form-select-lg form-select-dark">
              <option value="">All Status</option>
              <option value="approved">Approved</option>
              <option value="pending">Pending</option>
              <option value="rejected">Rejected</option>
            </select>
          </div>
          <div class="col-md-4">
            <div class="d-flex gap-2">
              <button class="btn btn-outline-success w-50 btn-lg">
                <i class="bi bi-check-circle me-2"></i> Approve All
              </button>
              <button class="btn btn-outline-light w-50 btn-lg">
                <i class="bi bi-funnel me-2"></i> Filter
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Deposits Table -->
    <div class="card card-dark shadow-lg overflow-hidden">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-dark table-hover table-borderless mb-0">
            <thead>
              <tr>
                <th>Transaction Ref</th>
                <th>User</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($deposits as $deposit)
                <tr>
                  <td><code class="text-info">{{ $deposit->tx_ref }}</code></td>
                  <td>{{ $deposit->user->name }} <br><small class="text-secondary">@{{ $deposit->user->username }}</small></td>
                  <td class="text-success fw-bold">${{ number_format($deposit->amount, 2) }}</td>
                  <td><span class="badge bg-secondary">{{ $deposit->payment_method }}</span></td>
                  <td>{{ $deposit->created_at->format('M d, Y g:i A') }}</td>
                  <td>
                    <span class="badge bg-{{ $deposit->status == 'approved' ? 'success' : ($deposit->status == 'rejected' ? 'danger' : 'warning text-dark') }}">
                      {{ ucfirst($deposit->status) }}
                    </span>
                  </td>
                  <td>
                    <div class="btn-group btn-group-sm" role="group">
                      <button class="btn btn-outline-light view-deposit-btn"
                              data-bs-toggle="modal"
                              data-bs-target="#viewDepositModal"
                              data-id="{{ $deposit->id }}"
                              data-tx_ref="{{ $deposit->tx_ref }}"
                              data-user="{{ $deposit->user ? $deposit->user->name . ' (@' . $deposit->user->username . ')' : '—' }}"
                              data-amount="{{ number_format($deposit->amount, 2) }}"
                              data-method="{{ $deposit->payment_method }}"
                              data-date="{{ $deposit->created_at->format('M d, Y g:i A') }}"
                              data-status="{{ ucfirst($deposit->status) }}"
                              data-proof="{{ $deposit->proof_image ? asset('storage/proofs/' . $deposit->proof_image) : '' }}"
                              data-proof-fallback="No proof image uploaded"
                              title="View Details">
                        <i class="bi bi-eye"></i> View
                      </button>
                      @if ($deposit->status == 'pending')
                        <form action="{{ route('admin.deposits.approve', $deposit->id) }}" method="POST" style="display: contents;">
                          @csrf
                          <button type="submit" class="btn btn-outline-success" title="Approve Deposit">
                            <i class="bi bi-check-circle"></i>
                          </button>
                        </form>
                        <form action="{{ route('admin.deposits.reject', $deposit->id) }}" method="POST" style="display: contents;">
                          @csrf
                          <button type="submit" class="btn btn-outline-danger" title="Reject Deposit">
                            <i class="bi bi-x-circle"></i>
                          </button>
                        </form>
                      @endif
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center text-muted py-5">
                    <i class="bi bi-inbox"></i> No deposits found.
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

<!-- View Deposit Modal -->
<div class="modal fade" id="viewDepositModal" tabindex="-1" aria-labelledby="viewDepositModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg" style="background: #111; border: 1px solid #333;">
            <div class="modal-header" style="background: #1a1a1a; border-bottom: 1px solid #333;">
                <h5 class="modal-title text-light" id="viewDepositModalLabel">
                  <i class="bi bi-receipt text-success me-2"></i> Deposit Details
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-light" style="background: #111;">
                <div class="row g-4">
                    <div class="col-md-6">
                        <strong class="text-secondary">Transaction Ref:</strong>
                        <p id="modal-tx_ref" class="mb-1 text-info"><code>—</code></p>
                    </div>
                    <div class="col-md-6">
                        <strong class="text-secondary">User:</strong>
                        <p id="modal-user" class="mb-1">—</p>
                    </div>
                    <div class="col-md-6">
                        <strong class="text-secondary">Amount:</strong>
                        <p id="modal-amount" class="mb-1 text-success fw-bold">$0.00</p>
                    </div>
                    <div class="col-md-6">
                        <strong class="text-secondary">Payment Method:</strong>
                        <p id="modal-method" class="mb-1">—</p>
                    </div>
                    <div class="col-md-6">
                        <strong class="text-secondary">Date:</strong>
                        <p id="modal-date" class="mb-1">—</p>
                    </div>
                    <div class="col-md-6">
                        <strong class="text-secondary">Status:</strong>
                        <p id="modal-status" class="mb-1">
                            <span id="modal-status-badge" class="badge bg-secondary">—</span>
                        </p>
                    </div>

                    <!-- Proof Image Section -->
                    <div class="col-12 mt-4">
                        <strong class="text-secondary d-block mb-2">Proof of Payment:</strong>
                        <div class="text-center" id="modal-proof-container" style="background: #0f0f0f; padding: 1.5rem; border-radius: 8px; border: 1px solid #333;">
                            <img id="modal-proof-img"
                                src=""
                                alt="Proof of Payment"
                                class="img-fluid rounded shadow"
                                style="max-height: 400px; display: none; cursor: pointer;">
                            <p id="modal-proof-fallback" class="text-muted mt-3 mb-0" style="display: none;">—</p>
                            <small class="text-muted d-block mt-2" id="modal-proof-hint" style="display: none;">
                                Click image to view full size
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background: #1a1a1a; border-top: 1px solid #333;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

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

// View Deposit Modal
document.addEventListener('DOMContentLoaded', function () {
    const viewModal = document.getElementById('viewDepositModal');

    if (viewModal) {
        viewModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            const txRef   = button.getAttribute('data-tx_ref');
            const user    = button.getAttribute('data-user');
            const amount  = button.getAttribute('data-amount');
            const method  = button.getAttribute('data-method');
            const date    = button.getAttribute('data-date');
            const status  = button.getAttribute('data-status');
            const proofUrl     = button.getAttribute('data-proof');
            const fallbackText = button.getAttribute('data-proof-fallback') || 'No proof image uploaded';

            // Update fields
            document.getElementById('modal-tx_ref').innerHTML = '<code>' + txRef + '</code>';
            document.getElementById('modal-user').textContent   = user;
            document.getElementById('modal-amount').textContent = '$' + amount;
            document.getElementById('modal-method').textContent = method;
            document.getElementById('modal-date').textContent   = date;

            const badge = document.getElementById('modal-status-badge');
            badge.textContent = status;
            if (status.toLowerCase() === 'approved') {
                badge.className = 'badge bg-success';
            } else if (status.toLowerCase() === 'rejected') {
                badge.className = 'badge bg-danger';
            } else {
                badge.className = 'badge bg-warning text-dark';
            }

            // Handle proof image
            const imgElement   = document.getElementById('modal-proof-img');
            const fallbackElem = document.getElementById('modal-proof-fallback');
            const hintElem     = document.getElementById('modal-proof-hint');

            if (proofUrl && proofUrl.trim() !== '') {
                imgElement.src = proofUrl;
                imgElement.style.display = 'block';
                fallbackElem.style.display = 'none';
                hintElem.style.display = 'block';

                imgElement.onclick = function() {
                    window.open(proofUrl, '_blank');
                };
            } else {
                imgElement.style.display = 'none';
                fallbackElem.textContent = fallbackText;
                fallbackElem.style.display = 'block';
                hintElem.style.display = 'none';
            }
        });
    }
});
</script>

</body>
</html>