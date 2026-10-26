<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Packages - TESLA Admin</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    * { transition: all 0.3s ease; }
    body { background: #000; color: #e0e0e0; font-family: 'Segoe UI', sans-serif; min-height: 100vh; }

    .sidebar { position: fixed; top: 0; left: 0; bottom: 0; width: 260px; background: linear-gradient(180deg,#0a0a0a,#0f0f0f); border-right: 1px solid #222; padding: 1.5rem 1rem; overflow-y: auto; z-index: 1001; box-shadow: 2px 0 15px rgba(0,0,0,.5); }
    .sidebar-toggle { display: none; position: fixed; top: 1rem; left: 1rem; background: #f59e0b; border: none; color: #000; padding: .75rem 1rem; border-radius: 8px; font-size: 1.25rem; cursor: pointer; z-index: 1002; font-weight: 600; }
    .sidebar-toggle:hover { background: #d97706; transform: scale(1.05); }
    .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.7); z-index: 1000; }
    .sidebar-overlay.active { display: block; }
    .sidebar-brand { font-size: 1.9rem; font-weight: 700; color: #fff; text-decoration: none; display: block; padding: 1.5rem 0 2rem; text-align: center; border-bottom: 1px solid #333; margin-bottom: 1.5rem; background: linear-gradient(135deg,transparent,rgba(245,158,11,.1)); border-radius: 8px; }
    .sidebar-brand span { color: #f59e0b; display: block; font-size: .8em; font-weight: 600; margin-top: .5rem; }
    .nav-link { color: #a0a0a0; padding: .85rem 1.25rem; border-radius: 8px; font-weight: 500; display: flex; align-items: center; gap: 12px; margin: .35rem 0; position: relative; overflow: hidden; }
    .nav-link::before { content: ''; position: absolute; left: 0; top: 0; width: 4px; height: 100%; background: #f59e0b; transform: scaleY(0); transform-origin: top; transition: transform .3s; }
    .nav-link:hover { background: rgba(245,158,11,.1); color: #fff; padding-left: 1.5rem; }
    .nav-link:hover::before, .nav-link.active::before { transform: scaleY(1); }
    .nav-link.active { background: rgba(245,158,11,.15); color: #f59e0b; font-weight: 600; }
    .nav-link i { font-size: 1.15rem; min-width: 24px; }
    .sidebar-section { margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #222; }
    .sidebar-section-title { font-size: .75rem; text-transform: uppercase; color: #666; font-weight: 700; letter-spacing: 1px; padding: .5rem 1.25rem; margin-bottom: .5rem; }
    .logout-btn { background: linear-gradient(135deg,rgba(239,68,68,.2),rgba(239,68,68,.05)); border: 1px solid rgba(239,68,68,.3); color: #ef4444; width: 100%; margin-top: 1rem; padding: .85rem 1.25rem; border-radius: 8px; font-weight: 600; display: flex; align-items: center; gap: 12px; }
    .logout-btn:hover { transform: translateX(5px); }
    .main-content { margin-left: 260px; padding: 2rem; }
    .sidebar::-webkit-scrollbar { width: 6px; }
    .sidebar::-webkit-scrollbar-thumb { background: #333; border-radius: 3px; }

    @media(max-width:992px) { .sidebar { width: 240px; } .main-content { margin-left: 240px; } }
    @media(max-width:768px) {
      .sidebar { width: 100%; max-width: 260px; height: 100vh; left: -100%; position: fixed; }
      .sidebar.active { left: 0; }
      .main-content { margin-left: 0; padding-top: 4rem; }
      .sidebar-toggle { display: block; }
      .nav-link { padding: .75rem 1rem; }
    }

    .card-dark { background: #111; border: 1px solid #333; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,.5); transition: transform .25s; }
    .card-dark:hover { transform: translateY(-6px); }
    .stat-icon { font-size: 2.8rem; opacity: .85; }
    .table-dark thead th { background: #1a1a1a; color: #ccc; border-bottom: 1px solid #444; }
    .table-dark td { border-color: #333; vertical-align: middle; }
    .badge { font-size: .9rem; padding: .5em 1em; }
    .badge-active   { background: #22c55e; color: white; }
    .badge-inactive { background: #6b7280; color: white; }

    .search-input { background: #1a1a1a; border: 1px solid #444; color: #fff; }
    .search-input:focus { border-color: #f59e0b; box-shadow: 0 0 0 .25rem rgba(245,158,11,.25); }
    .form-control-dark { background: #1a1a1a; border: 1px solid #444; color: #fff; }
    .form-control-dark:focus { border-color: #f59e0b; box-shadow: 0 0 0 .25rem rgba(245,158,11,.25); color: #fff; background: #1a1a1a; }
    .form-select-dark { background: #1a1a1a; border: 1px solid #444; color: #fff; }
    .form-select-dark:focus { border-color: #f59e0b; box-shadow: 0 0 0 .25rem rgba(245,158,11,.25); color: #fff; }
    .btn-add-plan { background: #f59e0b; border: none; color: #000; font-weight: 600; }
    .btn-add-plan:hover { background: #d97706; color: #000; }

    /* Bought Packages section */
    .section-divider { display: flex; align-items: center; gap: 1rem; margin: 3rem 0 2rem; }
    .section-divider-line { flex: 1; height: 1px; background: #222; }
    .section-divider-label { font-size: .8rem; letter-spacing: .18em; text-transform: uppercase; color: #555; white-space: nowrap; padding: .4rem 1.2rem; background: #0a0a0a; border: 1px solid #222; border-radius: 20px; }

    .inv-status-active    { background: rgba(34,197,94,.12);  border: 1px solid rgba(34,197,94,.3);  color: #22c55e; padding: .25rem .7rem; border-radius: 6px; font-size: .75rem; font-weight: 600; text-transform: uppercase; }
    .inv-status-completed { background: rgba(99,102,241,.12); border: 1px solid rgba(99,102,241,.3); color: #818cf8; padding: .25rem .7rem; border-radius: 6px; font-size: .75rem; font-weight: 600; text-transform: uppercase; }
    .inv-status-cancelled { background: rgba(239,68,68,.12);  border: 1px solid rgba(239,68,68,.3);  color: #ef4444; padding: .25rem .7rem; border-radius: 6px; font-size: .75rem; font-weight: 600; text-transform: uppercase; }

    .progress-sm { height: 6px; background: #1a1a1a; border-radius: 20px; overflow: hidden; }
    .progress-sm-bar { height: 100%; border-radius: 20px; background: linear-gradient(90deg,#f59e0b,#d97706); }

    .filter-tabs { display: flex; gap: .5rem; flex-wrap: wrap; margin-bottom: 1.5rem; }
    .filter-tab { padding: .4rem 1rem; border-radius: 20px; border: 1px solid #333; background: transparent; color: #666; font-size: .82rem; font-weight: 600; cursor: pointer; transition: all .2s; }
    .filter-tab:hover { border-color: #f59e0b; color: #f59e0b; }
    .filter-tab.active { background: rgba(245,158,11,.15); border-color: #f59e0b; color: #f59e0b; }

    .pagination-compact .page-item .page-link { min-width: 32px; height: 32px; padding: .25rem .5rem; background: #1a1a1a; border: 1px solid #444; color: #bbb; border-radius: 6px !important; margin: 0 3px; }
    .pagination-compact .page-item.active .page-link { background: #f59e0b; border-color: #f59e0b; color: #000; font-weight: 600; }
    .pagination-compact .page-link:hover { background: #222; color: #fff; }
    .pagination-compact .page-item.disabled .page-link { opacity: .45; cursor: not-allowed; }
  </style>
</head>
<body>

  @if(session('success'))
  <script>alert("{{ session('success') }}")</script>
  @endif

<button class="sidebar-toggle" id="sidebarToggle"><i class="bi bi-list"></i></button>
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar" id="sidebar">
  <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
    TESLA <span>Admin</span>
  </a>
  <nav>
    <ul class="nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="bi bi-speedometer2"></i><span>Dashboard</span></a></li>
      <div class="sidebar-section">
        <div class="sidebar-section-title">Management</div>
        <li class="nav-item"><a href="{{ route('admin.users') }}" class="nav-link"><i class="bi bi-people-fill"></i><span>Users</span></a></li>
        <li class="nav-item"><a href="{{ route('admin.deposits') }}" class="nav-link"><i class="bi bi-currency-dollar"></i><span>Deposits</span></a></li>
        <li class="nav-item"><a href="{{ route('admin.withdrawals') }}" class="nav-link"><i class="bi bi-cash-stack"></i><span>Withdrawals</span></a></li>
        <li class="nav-item"><a href="{{ route('admin.packages') }}" class="nav-link active"><i class="bi bi-bag-check"></i><span>Plans / Packages</span></a></li>
      </div>
      <div class="sidebar-section">
        <div class="sidebar-section-title">Analytics</div>
        <li class="nav-item"><a href="{{ route('admin.transactions') }}" class="nav-link"><i class="bi bi-receipt"></i><span>Transactions</span></a></li>
        <li class="nav-item"><a href="{{ route('admin.reports') }}" class="nav-link"><i class="bi bi-graph-up"></i><span>Reports</span></a></li>
      </div>
      <div class="sidebar-section">
        <div class="sidebar-section-title">System</div>
        <li class="nav-item"><a href="{{ route('admin.settings') }}" class="nav-link"><i class="bi bi-gear-fill"></i><span>Settings</span></a></li>
      </div>
    </ul>
    <form method="POST" action="{{ url('/logout') }}" style="display:contents">
      @csrf
      <button type="submit" class="logout-btn" onclick="return confirm('Are you sure you want to logout?')">
        <i class="bi bi-box-arrow-right"></i><span>Logout</span>
      </button>
    </form>
  </nav>
</aside>

<main class="main-content">
  <div class="container-fluid px-0">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
      <h1 class="display-5 fw-bold mb-0">Manage Investment Plans</h1>
      <span class="text-secondary">{{ now()->format('F d, Y') }}</span>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mb-5">
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Plans</h5>
            <i class="bi bi-bag-check stat-icon text-warning"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">{{ count($packages) }}</h2>
          <p class="text-warning small mb-0">Available packages</p>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Active Plans</h5>
            <i class="bi bi-rocket-takeoff-fill stat-icon text-success"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-success">{{ count($packages->where('active', true)) }}</h2>
          <p class="text-success small mb-0">Currently running</p>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Invested</h5>
            <i class="bi bi-currency-dollar stat-icon text-info"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">${{ number_format($investments->sum('amount'), 0) }}</h2>
          <p class="text-info small mb-0">Across all plans</p>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Active Investments</h5>
            <i class="bi bi-graph-up-arrow stat-icon text-primary"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-primary">{{ $investments->where('status','active')->count() }}</h2>
          <p class="text-primary small mb-0">Currently earning</p>
        </div>
      </div>
    </div>

    <!-- Search & Add Button -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
      <div class="input-group input-group-lg" style="max-width:500px;">
        <span class="input-group-text bg-dark border-secondary"><i class="bi bi-search"></i></span>
        <input type="text" class="form-control search-input" placeholder="Search by plan name...">
      </div>
      <button class="btn btn-add-plan btn-lg px-5" data-bs-toggle="modal" data-bs-target="#addPlanModal">
        <i class="bi bi-plus-circle me-2"></i> Add New Plan
      </button>
    </div>

    <!-- Packages Table -->
    <div class="card card-dark shadow-lg overflow-hidden">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-dark table-hover table-borderless mb-0">
            <thead>
              <tr>
                <th>Plan Name</th>
                <th>Min – Max Investment</th>
                <th>Daily Return</th>
                <th>Duration</th>
                <th>Total Return</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($packages as $package)
                <tr>
                  <td class="fw-bold">{{ $package->name }}</td>
                  <td>${{ number_format($package->min_investment) }} – ${{ $package->max_investment ? number_format($package->max_investment) : 'Unlimited' }}</td>
                  <td><span class="badge bg-info">{{ $package->daily_return }}%</span></td>
                  <td>{{ $package->duration_days }} days</td>
                  <td class="fw-bold text-success">{{ $package->total_return }}%</td>
                  <td>
                    <span class="badge badge-{{ $package->active ? 'active' : 'inactive' }}">
                      {{ $package->active ? 'Active' : 'Inactive' }}
                    </span>
                  </td>
                  <td>
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#viewPlanModal{{ $package->id }}">
                        <i class="bi bi-eye"></i> View
                      </button>
                      <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editPlanModal{{ $package->id }}">
                        <i class="bi bi-pencil"></i> Edit
                      </button>
                      <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal"
                              data-plan-name="{{ addslashes($package->name) }}"
                              data-delete-url="{{ route('admin.packages.destroy', $package->id) }}">
                        <i class="bi bi-trash"></i> Delete
                      </button>
                    </div>
                  </td>
                </tr>
              @empty
                <tr><td colspan="7" class="text-center text-muted py-5"><i class="bi bi-inbox"></i> No packages available.</td></tr>
              @endforelse
            </tbody>
          </table>
          @if($packages->hasPages())
            <div class="d-flex justify-content-end p-3">
              <div class="pagination-compact">{{ $packages->links('pagination::bootstrap-5') }}</div>
            </div>
          @endif
        </div>
      </div>
    </div>

    {{-- ════════════════════════════════════════════════════
         BOUGHT PACKAGES — all user investments
    ════════════════════════════════════════════════════ --}}
    <div class="section-divider">
      <div class="section-divider-line"></div>
      <div class="section-divider-label"><i class="bi bi-people-fill me-2"></i>Bought Packages — User Investments</div>
      <div class="section-divider-line"></div>
    </div>

    {{-- Filter tabs --}}
    <div class="filter-tabs">
      <button class="filter-tab active" onclick="filterInvestments('all', this)">
        All <span class="ms-1 badge bg-secondary">{{ $investments->count() }}</span>
      </button>
      <button class="filter-tab" onclick="filterInvestments('active', this)">
        Active <span class="ms-1 badge" style="background:rgba(34,197,94,.2);color:#22c55e;">{{ $investments->where('status','active')->count() }}</span>
      </button>
      <button class="filter-tab" onclick="filterInvestments('completed', this)">
        Completed <span class="ms-1 badge" style="background:rgba(99,102,241,.2);color:#818cf8;">{{ $investments->where('status','completed')->count() }}</span>
      </button>
      <button class="filter-tab" onclick="filterInvestments('cancelled', this)">
        Cancelled <span class="ms-1 badge" style="background:rgba(239,68,68,.2);color:#ef4444;">{{ $investments->where('status','cancelled')->count() }}</span>
      </button>
    </div>

    {{-- Investments table --}}
    <div class="card card-dark shadow-lg overflow-hidden mb-5">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-dark table-hover table-borderless mb-0" id="investmentsTable">
            <thead>
              <tr>
                <th>#</th>
                <th>User</th>
                <th>Plan</th>
                <th>Invested</th>
                <th>Daily Earning</th>
                <th>Total Earned</th>
                <th>Progress</th>
                <th>Days Left</th>
                <th>Ends At</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($investments as $inv)
                @php
                  $daysTotal = $inv->package->duration_days ?? 1;
                  $daysLeft  = $inv->days_remaining ?? 0;
                  $daysDone  = max(0, $daysTotal - $daysLeft);
                  $pct       = $daysTotal > 0 ? round(($daysDone / $daysTotal) * 100) : 0;
                @endphp
                <tr class="inv-row" data-status="{{ $inv->status }}">
                  <td class="text-muted" style="font-size:.82rem;">#{{ $inv->id }}</td>
                  <td>
                    <div style="font-weight:600;color:#fff;">{{ $inv->user->name ?? '—' }}</div>
                    <div style="font-size:.75rem;color:#555;">{{ $inv->user->email ?? '' }}</div>
                  </td>
                  <td>
                    <span style="background:rgba(245,158,11,.1);border:1px solid rgba(245,158,11,.2);color:#f59e0b;padding:.2rem .7rem;border-radius:6px;font-size:.8rem;font-weight:600;">
                      {{ $inv->package->name ?? '—' }}
                    </span>
                  </td>
                  <td class="fw-bold text-warning">${{ number_format($inv->amount, 2) }}</td>
                  <td class="text-success">${{ number_format($inv->daily_earning, 2) }}</td>
                  <td>
                    <span style="color:#22c55e;font-weight:600;">${{ number_format($inv->total_earned, 4) }}</span>
                    <div style="font-size:.7rem;color:#444;">of ${{ number_format($inv->expected_return, 2) }}</div>
                  </td>
                  <td style="min-width:100px;">
                    <div class="progress-sm mb-1">
                      <div class="progress-sm-bar" style="width:{{ $pct }}%;"></div>
                    </div>
                    <div style="font-size:.7rem;color:#555;">{{ $pct }}% done</div>
                  </td>
                  <td>
                    <span style="font-weight:700;color:{{ $daysLeft <= 1 ? '#ef4444' : ($daysLeft <= 3 ? '#f59e0b' : '#fff') }};">
                      {{ $daysLeft }}d
                    </span>
                    <div style="font-size:.7rem;color:#555;">/ {{ $daysTotal }} days</div>
                  </td>
                  <td style="font-size:.82rem;color:#777;">{{ $inv->ends_at ? $inv->ends_at->format('d M Y') : '—' }}</td>
                  <td>
                    @if($inv->status === 'active')
                      <span class="inv-status-active">Active</span>
                    @elseif($inv->status === 'completed')
                      <span class="inv-status-completed">Completed</span>
                    @else
                      <span class="inv-status-cancelled">Cancelled</span>
                    @endif
                  </td>
                  <td>
                    <button class="btn btn-sm btn-outline-light"
                            data-bs-toggle="modal"
                            data-bs-target="#viewInvModal"
                            data-id="{{ $inv->id }}"
                            data-user="{{ $inv->user->name ?? '—' }}"
                            data-email="{{ $inv->user->email ?? '—' }}"
                            data-plan="{{ $inv->package->name ?? '—' }}"
                            data-amount="{{ number_format($inv->amount, 2) }}"
                            data-daily="{{ number_format($inv->daily_earning, 2) }}"
                            data-earned="{{ number_format($inv->total_earned, 4) }}"
                            data-expected="{{ number_format($inv->expected_return, 2) }}"
                            data-days-left="{{ $inv->days_remaining }}"
                            data-days-total="{{ $daysTotal }}"
                            data-ends="{{ $inv->ends_at ? $inv->ends_at->format('d M Y') : '—' }}"
                            data-started="{{ $inv->created_at->format('d M Y') }}"
                            data-status="{{ ucfirst($inv->status) }}"
                            data-pct="{{ $pct }}">
                      <i class="bi bi-eye"></i>
                    </button>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="11" class="text-center text-muted py-5">
                    <i class="bi bi-inbox" style="font-size:2rem;"></i>
                    <p class="mt-2 mb-0">No investments found.</p>
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

{{-- ══ VIEW INVESTMENT MODAL ══ --}}
<div class="modal fade" id="viewInvModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0" style="background:#111;border:1px solid #333 !important;">
      <div class="modal-header" style="background:#1a1a1a;border-bottom:1px solid #333;">
        <h5 class="modal-title text-white fw-bold">
          <i class="bi bi-bar-chart-line text-warning me-2"></i> Investment Details
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-4 text-light" style="background:#111;">
        <div class="row g-4">
          <div class="col-md-6">
            <div style="background:#0a0a0a;border:1px solid #222;border-radius:10px;padding:1rem;">
              <div style="font-size:.7rem;color:#555;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.3rem;">User</div>
              <div id="mi-user" style="font-weight:700;font-size:1rem;"></div>
              <div id="mi-email" style="font-size:.8rem;color:#666;"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div style="background:#0a0a0a;border:1px solid #222;border-radius:10px;padding:1rem;">
              <div style="font-size:.7rem;color:#555;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.3rem;">Plan</div>
              <div id="mi-plan" style="font-weight:700;font-size:1rem;color:#f59e0b;"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div style="background:#0a0a0a;border:1px solid #222;border-radius:10px;padding:1rem;">
              <div style="font-size:.7rem;color:#555;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.3rem;">Amount Invested</div>
              <div id="mi-amount" style="font-weight:800;font-size:1.4rem;color:#f59e0b;"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div style="background:#0a0a0a;border:1px solid #222;border-radius:10px;padding:1rem;">
              <div style="font-size:.7rem;color:#555;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.3rem;">Daily Earning</div>
              <div id="mi-daily" style="font-weight:700;font-size:1.4rem;color:#22c55e;"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div style="background:#0a0a0a;border:1px solid #222;border-radius:10px;padding:1rem;">
              <div style="font-size:.7rem;color:#555;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.3rem;">Total Earned So Far</div>
              <div id="mi-earned" style="font-weight:700;font-size:1.4rem;color:#22c55e;"></div>
              <div style="font-size:.75rem;color:#444;">Expected: <span id="mi-expected"></span></div>
            </div>
          </div>
          <div class="col-md-6">
            <div style="background:#0a0a0a;border:1px solid #222;border-radius:10px;padding:1rem;">
              <div style="font-size:.7rem;color:#555;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.3rem;">Days Remaining</div>
              <div id="mi-days" style="font-weight:700;font-size:1.4rem;"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div style="background:#0a0a0a;border:1px solid #222;border-radius:10px;padding:1rem;">
              <div style="font-size:.7rem;color:#555;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.3rem;">Started</div>
              <div id="mi-started" style="font-weight:600;"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div style="background:#0a0a0a;border:1px solid #222;border-radius:10px;padding:1rem;">
              <div style="font-size:.7rem;color:#555;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.3rem;">Ends</div>
              <div id="mi-ends" style="font-weight:600;"></div>
            </div>
          </div>
          <div class="col-12">
            <div style="background:#0a0a0a;border:1px solid #222;border-radius:10px;padding:1rem;">
              <div style="font-size:.7rem;color:#555;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.6rem;">Progress</div>
              <div class="progress-sm">
                <div class="progress-sm-bar" id="mi-progress" style="width:0%;"></div>
              </div>
              <div class="d-flex justify-content-between mt-1">
                <span style="font-size:.72rem;color:#555;">0%</span>
                <span id="mi-pct" style="font-size:.72rem;color:#f59e0b;font-weight:600;"></span>
                <span style="font-size:.72rem;color:#555;">100%</span>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div style="background:#0a0a0a;border:1px solid #222;border-radius:10px;padding:1rem;">
              <div style="font-size:.7rem;color:#555;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.3rem;">Status</div>
              <div id="mi-status"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="background:#1a1a1a;border-top:1px solid #333;">
        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

{{-- ══ PLAN MODALS (view + edit per package) ══ --}}
@foreach($packages as $package)
<div class="modal fade" id="viewPlanModal{{ $package->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0" style="background:#111;border:1px solid #333 !important;">
      <div class="modal-header border-bottom border-secondary">
        <h5 class="modal-title fw-bold">{{ $package->name }}</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-4 text-center">
        <h2 class="mb-4">{{ $package->name }}</h2>
        <div class="row g-3 text-start">
          <div class="col-md-6"><strong class="text-secondary">Investment Range:</strong><p>${{ number_format($package->min_investment) }} – ${{ $package->max_investment ? number_format($package->max_investment) : 'Unlimited' }}</p></div>
          <div class="col-md-6"><strong class="text-secondary">Daily Return:</strong><p><span class="badge bg-info">{{ $package->daily_return }}%</span></p></div>
          <div class="col-md-6"><strong class="text-secondary">Duration:</strong><p>{{ $package->duration_days }} days</p></div>
          <div class="col-md-6"><strong class="text-secondary">Total Return:</strong><p class="fw-bold text-success fs-5">{{ $package->total_return }}%</p></div>
          @if($package->description)<div class="col-12"><strong class="text-secondary">Description:</strong><p class="text-secondary">{{ $package->description }}</p></div>@endif
          <div class="col-12"><strong class="text-secondary">Status:</strong> <span class="badge badge-{{ $package->active ? 'active' : 'inactive' }} ms-2">{{ $package->active ? 'Active' : 'Inactive' }}</span></div>
        </div>
      </div>
      <div class="modal-footer border-top border-secondary">
        <button type="button" class="btn btn-outline-light px-4" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editPlanModal{{ $package->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0" style="background:#111;border:1px solid #333 !important;">
      <div class="modal-header border-bottom border-secondary">
        <h5 class="modal-title fw-bold">Edit Investment Plan</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-4">
        <form action="{{ route('admin.packages.update', $package->id) }}" method="POST">
          @csrf @method('PUT')
          <div class="row g-4">
            <div class="col-12"><label class="form-label fw-semibold">Plan Name</label><input type="text" name="name" value="{{ $package->name }}" class="form-control form-control-lg form-control-dark" required></div>
            <div class="col-md-6"><label class="form-label fw-semibold">Minimum Investment</label><div class="input-group input-group-lg"><span class="input-group-text bg-dark border-secondary text-white">$</span><input type="number" name="min_investment" value="{{ $package->min_investment }}" class="form-control form-control-dark" required></div></div>
            <div class="col-md-6"><label class="form-label fw-semibold">Maximum Investment</label><div class="input-group input-group-lg"><span class="input-group-text bg-dark border-secondary text-white">$</span><input type="number" name="max_investment" value="{{ $package->max_investment }}" class="form-control form-control-dark" placeholder="Leave empty = Unlimited"></div></div>
            <div class="col-md-6"><label class="form-label fw-semibold">Daily Return (%)</label><input type="number" name="daily_return" step="0.01" value="{{ $package->daily_return }}" class="form-control form-control-lg form-control-dark" required></div>
            <div class="col-md-6"><label class="form-label fw-semibold">Duration (days)</label><input type="number" name="duration_days" value="{{ $package->duration_days }}" class="form-control form-control-lg form-control-dark" required></div>
            <div class="col-12"><label class="form-label fw-semibold">Total Return (%)</label><input type="number" name="total_return" step="0.01" value="{{ $package->total_return }}" class="form-control form-control-lg form-control-dark" required></div>
            <div class="col-12"><label class="form-label fw-semibold">Description</label><textarea name="description" class="form-control form-control-lg form-control-dark" rows="3">{{ $package->description }}</textarea></div>
            <div class="col-12 form-check form-switch mt-2"><input class="form-check-input" type="checkbox" name="active" id="active{{ $package->id }}" value="1" {{ $package->active ? 'checked' : '' }}><label class="form-check-label fs-5" for="active{{ $package->id }}">Activate this plan</label></div>
          </div>
          <div class="modal-footer border-top border-secondary mt-4">
            <button type="button" class="btn btn-outline-light px-5 py-3" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-add-plan px-5 py-3">Update Plan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

{{-- DELETE MODAL --}}
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark border border-danger">
      <div class="modal-header border-bottom border-danger">
        <h5 class="modal-title text-danger fw-bold"><i class="bi bi-exclamation-triangle me-2"></i> Confirm Deletion</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center py-4">
        <p class="fs-5 mb-3">Are you sure you want to delete:</p>
        <h4 class="fw-bold mb-4 text-white" id="deletePlanName"></h4>
        <p class="text-danger small mb-0">This action cannot be undone.</p>
      </div>
      <div class="modal-footer border-top border-secondary">
        <button type="button" class="btn btn-outline-light px-4" data-bs-dismiss="modal">Cancel</button>
        <form id="deleteForm" method="POST" class="d-inline">
          @csrf @method('DELETE')
          <button type="submit" class="btn btn-danger px-4 fw-bold">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- ADD PLAN MODAL --}}
<div class="modal fade" id="addPlanModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0" style="background:#111;border:1px solid #333 !important;">
      <div class="modal-header border-bottom border-secondary">
        <h5 class="modal-title fw-bold fs-4">Add New Investment Plan</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-4">
        <form action="{{ route('admin.packages.store') }}" method="POST">
          @csrf
          <div class="row g-4">
            <div class="col-12"><label class="form-label fw-semibold">Plan Name</label><input type="text" name="name" class="form-control form-control-lg form-control-dark" placeholder="e.g., VIP Plan" required></div>
            <div class="col-md-6"><label class="form-label fw-semibold">Minimum Investment</label><div class="input-group input-group-lg"><span class="input-group-text bg-dark border-secondary text-white">$</span><input type="number" name="min_investment" class="form-control form-control-dark" placeholder="100.00" required></div></div>
            <div class="col-md-6"><label class="form-label fw-semibold">Maximum Investment</label><div class="input-group input-group-lg"><span class="input-group-text bg-dark border-secondary text-white">$</span><input type="number" name="max_investment" class="form-control form-control-dark" placeholder="Leave empty = Unlimited"></div></div>
            <div class="col-md-6"><label class="form-label fw-semibold">Daily Return (%)</label><input type="number" name="daily_return" step="0.01" class="form-control form-control-lg form-control-dark" placeholder="e.g., 5" required></div>
            <div class="col-md-6"><label class="form-label fw-semibold">Duration (days)</label><input type="number" name="duration_days" class="form-control form-control-lg form-control-dark" placeholder="e.g., 7" required></div>
            <div class="col-12"><label class="form-label fw-semibold">Total Return (%)</label><input type="number" name="total_return" step="0.01" class="form-control form-control-lg form-control-dark" placeholder="e.g., 35" required></div>
            <div class="col-12"><label class="form-label fw-semibold">Description</label><textarea name="description" class="form-control form-control-lg form-control-dark" rows="3" placeholder="Brief description..."></textarea></div>
            <div class="col-12 form-check form-switch mt-2"><input class="form-check-input" type="checkbox" name="active" id="planActiveNew" value="1" checked><label class="form-check-label fs-5" for="planActiveNew">Activate immediately</label></div>
          </div>
          <div class="modal-footer border-top border-secondary mt-4">
            <button type="button" class="btn btn-outline-light px-5 py-3" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-add-plan px-5 py-3">Create Plan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Sidebar
const sidebarToggle  = document.getElementById('sidebarToggle');
const sidebar        = document.getElementById('sidebar');
const sidebarOverlay = document.getElementById('sidebarOverlay');
sidebarToggle.addEventListener('click', () => { sidebar.classList.toggle('active'); sidebarOverlay.classList.toggle('active'); });
sidebarOverlay.addEventListener('click', () => { sidebar.classList.remove('active'); sidebarOverlay.classList.remove('active'); });
document.querySelectorAll('.nav-link').forEach(l => l.addEventListener('click', () => {
  if (window.innerWidth <= 768) { sidebar.classList.remove('active'); sidebarOverlay.classList.remove('active'); }
}));

// Delete modal
document.getElementById('deleteConfirmModal').addEventListener('show.bs.modal', e => {
  const btn = e.relatedTarget;
  document.getElementById('deletePlanName').textContent = '"' + btn.getAttribute('data-plan-name') + '"';
  document.getElementById('deleteForm').action = btn.getAttribute('data-delete-url');
});

// Filter investments table
function filterInvestments(status, btn) {
  document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
  btn.classList.add('active');
  document.querySelectorAll('.inv-row').forEach(row => {
    row.style.display = (status === 'all' || row.getAttribute('data-status') === status) ? '' : 'none';
  });
}

// View investment modal
document.getElementById('viewInvModal').addEventListener('show.bs.modal', e => {
  const b = e.relatedTarget;
  document.getElementById('mi-user').textContent    = b.getAttribute('data-user');
  document.getElementById('mi-email').textContent   = b.getAttribute('data-email');
  document.getElementById('mi-plan').textContent    = b.getAttribute('data-plan');
  document.getElementById('mi-amount').textContent  = '$' + b.getAttribute('data-amount');
  document.getElementById('mi-daily').textContent   = '$' + b.getAttribute('data-daily');
  document.getElementById('mi-earned').textContent  = '$' + b.getAttribute('data-earned');
  document.getElementById('mi-expected').textContent= '$' + b.getAttribute('data-expected');
  document.getElementById('mi-started').textContent = b.getAttribute('data-started');
  document.getElementById('mi-ends').textContent    = b.getAttribute('data-ends');
  const pct = b.getAttribute('data-pct');
  document.getElementById('mi-pct').textContent     = pct + '% complete';
  document.getElementById('mi-progress').style.width= pct + '%';

  const dLeft  = b.getAttribute('data-days-left');
  const dTotal = b.getAttribute('data-days-total');
  document.getElementById('mi-days').textContent = dLeft + ' days of ' + dTotal;
  document.getElementById('mi-days').style.color = parseInt(dLeft) <= 1 ? '#ef4444' : (parseInt(dLeft) <= 3 ? '#f59e0b' : '#fff');

  const status  = b.getAttribute('data-status').toLowerCase();
  const statusEl = document.getElementById('mi-status');
  if (status === 'active')    statusEl.innerHTML = '<span class="inv-status-active">Active</span>';
  else if (status === 'completed') statusEl.innerHTML = '<span class="inv-status-completed">Completed</span>';
  else statusEl.innerHTML = '<span class="inv-status-cancelled">Cancelled</span>';
});
</script>

</body>
</html>
