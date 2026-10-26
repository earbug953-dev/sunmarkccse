<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Reports & Analytics - SUNHILL Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    * { transition: all 0.3s ease; }
    body { background: #000; color: #e0e0e0; font-family: 'Segoe UI', sans-serif; min-height: 100vh; }

    .sidebar { position: fixed; top: 0; left: 0; bottom: 0; width: 260px; background: linear-gradient(180deg,#0a0a0a,#0f0f0f); border-right: 1px solid #222; padding: 1.5rem 1rem; overflow-y: auto; z-index: 1001; }
    .sidebar-toggle { display: none; position: fixed; top: 1rem; left: 1rem; background: #ef4444; border: none; color: white; padding: .75rem 1rem; border-radius: 8px; font-size: 1.25rem; cursor: pointer; z-index: 1002; }
    .sidebar-toggle:hover { background: #dc2626; transform: scale(1.05); }
    .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.7); z-index: 1000; }
    .sidebar-overlay.active { display: block; }
    .sidebar-brand { font-size: 1.9rem; font-weight: 700; color: #fff; text-decoration: none; display: block; padding: 1.5rem 0 2rem; text-align: center; border-bottom: 1px solid #333; margin-bottom: 1.5rem; }
    .sidebar-brand span { color: #ef4444; display: block; font-size: .8em; font-weight: 600; margin-top: .5rem; }
    .nav-link { color: #a0a0a0; padding: .85rem 1.25rem; border-radius: 8px; font-weight: 500; display: flex; align-items: center; gap: 12px; margin: .35rem 0; position: relative; overflow: hidden; }
    .nav-link::before { content: ''; position: absolute; left: 0; top: 0; width: 4px; height: 100%; background: #ef4444; transform: scaleY(0); transform-origin: top; }
    .nav-link:hover { background: rgba(239,68,68,.1); color: #fff; padding-left: 1.5rem; }
    .nav-link:hover::before, .nav-link.active::before { transform: scaleY(1); }
    .nav-link.active { background: rgba(239,68,68,.15); color: #ef4444; font-weight: 600; }
    .nav-link i { font-size: 1.15rem; min-width: 24px; }
    .sidebar-section { margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #222; }
    .sidebar-section-title { font-size: .75rem; text-transform: uppercase; color: #666; font-weight: 700; letter-spacing: 1px; padding: .5rem 1.25rem; margin-bottom: .5rem; }
    .logout-btn { background: linear-gradient(135deg,rgba(239,68,68,.2),rgba(239,68,68,.05)); border: 1px solid rgba(239,68,68,.3); color: #ef4444; width: 100%; margin-top: 1rem; padding: .85rem 1.25rem; border-radius: 8px; font-weight: 600; display: flex; align-items: center; gap: 12px; cursor: pointer; }
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

    .card-dark { background: #111; border: 1px solid #2a2a2a; border-radius: 14px; box-shadow: 0 4px 20px rgba(0,0,0,.5); transition: transform .2s; }
    .card-dark:hover { transform: translateY(-4px); }
    .stat-icon { font-size: 2.5rem; opacity: .85; }
    .chart-container { position: relative; height: 320px; width: 100%; }
    .table-dark thead th { background: #1a1a1a; color: #777; border-bottom: 1px solid #2a2a2a; font-size: .78rem; text-transform: uppercase; letter-spacing: .07em; }
    .table-dark td { border-color: #1a1a1a; vertical-align: middle; }
    .table-dark tbody tr:hover td { background: rgba(239,68,68,.03); }

    .form-control-dark { background: #1a1a1a; border: 1px solid #444; color: #fff; }
    .form-control-dark:focus { border-color: #ef4444; box-shadow: 0 0 0 .25rem rgba(239,68,68,.2); color: #fff; background: #1a1a1a; }

    /* Mini stat inside card */
    .mini-stat { background: #0a0a0a; border: 1px solid #1a1a1a; border-radius: 10px; padding: .8rem 1rem; }
    .mini-stat-label { font-size: .68rem; letter-spacing: .12em; text-transform: uppercase; color: #444; margin-bottom: .2rem; }
    .mini-stat-value { font-size: 1.3rem; font-weight: 800; }

    /* Plan bar */
    .plan-bar { height: 8px; background: #1a1a1a; border-radius: 20px; overflow: hidden; margin-top: .4rem; }
    .plan-bar-fill { height: 100%; border-radius: 20px; background: linear-gradient(90deg,#ef4444,#dc2626); }

    /* Rank badges */
    .rank-1 { background: linear-gradient(135deg,#f59e0b,#d97706); color: #000; }
    .rank-2 { background: #6b7280; color: #fff; }
    .rank-3 { background: #92400e; color: #fff; }
  </style>
</head>
<body>

<button class="sidebar-toggle" id="sidebarToggle"><i class="bi bi-list"></i></button>
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar" id="sidebar">
  <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">SUNHILL <span>Admin</span></a>
  <nav>
    <ul class="nav flex-column">
      <li><a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="bi bi-speedometer2"></i><span>Dashboard</span></a></li>
      <div class="sidebar-section">
        <div class="sidebar-section-title">Management</div>
        <li><a href="{{ route('admin.users') }}" class="nav-link"><i class="bi bi-people-fill"></i><span>Users</span></a></li>
        <li><a href="{{ route('admin.deposits') }}" class="nav-link"><i class="bi bi-currency-dollar"></i><span>Deposits</span></a></li>
        <li><a href="{{ route('admin.withdrawals') }}" class="nav-link"><i class="bi bi-cash-stack"></i><span>Withdrawals</span></a></li>
        <li><a href="{{ route('admin.packages') }}" class="nav-link"><i class="bi bi-bag-check"></i><span>Plans / Packages</span></a></li>
      </div>
      <div class="sidebar-section">
        <div class="sidebar-section-title">Analytics</div>
        <li><a href="{{ route('admin.transactions') }}" class="nav-link"><i class="bi bi-receipt"></i><span>Transactions</span></a></li>
        <li><a href="{{ route('admin.reports') }}" class="nav-link active"><i class="bi bi-graph-up"></i><span>Reports</span></a></li>
      </div>
      <div class="sidebar-section">
        <div class="sidebar-section-title">System</div>
        <li><a href="{{ route('admin.settings') }}" class="nav-link"><i class="bi bi-gear-fill"></i><span>Settings</span></a></li>
      </div>
    </ul>
    <form method="POST" action="{{ url('/logout') }}" style="display:contents">
      @csrf
      <button type="submit" class="logout-btn" onclick="return confirm('Logout?')">
        <i class="bi bi-box-arrow-right"></i><span>Logout</span>
      </button>
    </form>
  </nav>
</aside>

<main class="main-content">
  <div class="container-fluid px-0">

    {{-- PAGE HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
      <h1 class="display-5 fw-bold mb-0">
        <i class="bi bi-graph-up me-2 text-danger"></i> Reports & Analytics
      </h1>
      <span class="text-secondary">{{ now()->format('F d, Y') }}</span>
    </div>

    {{-- ── OVERVIEW STATS (all real) ── --}}
    <div class="row g-4 mb-5">
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0" style="font-size:.95rem;">Total Deposits</h5>
            <i class="bi bi-arrow-down-circle stat-icon text-success"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-success">${{ number_format($totalDeposits,2) }}</h2>
          <p class="text-success small mb-0">All approved deposits</p>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0" style="font-size:.95rem;">Total Withdrawn</h5>
            <i class="bi bi-arrow-up-circle stat-icon text-danger"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-danger">${{ number_format($totalWithdrawals,2) }}</h2>
          <p class="text-danger small mb-0">All approved withdrawals</p>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0" style="font-size:.95rem;">Earnings Paid Out</h5>
            <i class="bi bi-graph-up-arrow stat-icon text-warning"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-warning">${{ number_format($totalEarningsPaid,2) }}</h2>
          <p class="text-warning small mb-0">Investment profits claimed</p>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0" style="font-size:.95rem;">Total Users</h5>
            <i class="bi bi-people-fill stat-icon text-info"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-info">{{ number_format($totalUsers) }}</h2>
          <p class="text-info small mb-0">+{{ $newUsersThisMonth }} this month</p>
        </div>
      </div>
    </div>

    {{-- SECONDARY STATS --}}
    <div class="row g-3 mb-5">
      <div class="col-md-3">
        <div class="mini-stat">
          <div class="mini-stat-label">Total Invested</div>
          <div class="mini-stat-value text-warning">${{ number_format($totalInvested,2) }}</div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="mini-stat">
          <div class="mini-stat-label">Active Plans</div>
          <div class="mini-stat-value text-success">{{ number_format($activeInvestments) }}</div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="mini-stat">
          <div class="mini-stat-label">Completed Plans</div>
          <div class="mini-stat-value" style="color:#818cf8;">{{ number_format($completedInvestments) }}</div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="mini-stat">
          <div class="mini-stat-label">Net Balance</div>
          <div class="mini-stat-value {{ $netProfit >= 0 ? 'text-success' : 'text-danger' }}">
            ${{ number_format(abs($netProfit),2) }}
          </div>
        </div>
      </div>
    </div>

    {{-- CHARTS ROW --}}
    <div class="row g-4 mb-5">

      {{-- Deposits vs Withdrawals Bar Chart --}}
      <div class="col-lg-7">
        <div class="card card-dark p-4">
          <h5 class="fw-bold mb-4">
            <i class="bi bi-bar-chart-fill me-2 text-danger"></i>
            Deposits vs Withdrawals vs Earnings (Last 12 Months)
          </h5>
          <div class="chart-container">
            <canvas id="revenueChart"></canvas>
          </div>
        </div>
      </div>

      {{-- User Growth Line Chart --}}
      <div class="col-lg-5">
        <div class="card card-dark p-4">
          <h5 class="fw-bold mb-4">
            <i class="bi bi-people-fill me-2 text-info"></i>
            User Registrations (Last 12 Months)
          </h5>
          <div class="chart-container">
            <canvas id="userChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    {{-- PLAN POPULARITY + TOP DEPOSITORS --}}
    <div class="row g-4 mb-5">

      {{-- Plan popularity --}}
      <div class="col-lg-5">
        <div class="card card-dark p-4" style="height:100%;">
          <h5 class="fw-bold mb-4">
            <i class="bi bi-bag-check me-2 text-warning"></i> Plan Popularity
          </h5>
          @php $maxPlanTotal = $planStats->max('total') ?: 1; @endphp
          @forelse($planStats as $plan)
            <div style="margin-bottom:1.2rem;">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span style="font-weight:600;font-size:.9rem;">{{ $plan->package->name ?? '—' }}</span>
                <span style="font-size:.8rem;color:#555;">{{ $plan->count }} investor{{ $plan->count !== 1 ? 's' : '' }} · ${{ number_format($plan->total,2) }}</span>
              </div>
              <div class="plan-bar">
                <div class="plan-bar-fill" style="width:{{ round(($plan->total/$maxPlanTotal)*100) }}%;"></div>
              </div>
            </div>
          @empty
            <p style="color:#444;">No investment data yet.</p>
          @endforelse
        </div>
      </div>

      {{-- Top Depositors --}}
      <div class="col-lg-7">
        <div class="card card-dark p-4">
          <h5 class="fw-bold mb-4">
            <i class="bi bi-trophy-fill me-2 text-warning"></i> Top Depositors (All Time)
          </h5>
          <div class="table-responsive">
            <table class="table table-dark table-hover table-borderless mb-0">
              <thead>
                <tr>
                  <th>Rank</th>
                  <th>User</th>
                  <th>Total Deposited</th>
                  <th>Last Deposit</th>
                </tr>
              </thead>
              <tbody>
                @forelse($topDepositors as $i => $dep)
                  <tr>
                    <td>
                      <span class="badge rank-{{ $i+1 <= 3 ? $i+1 : '' }} {{ $i+1 > 3 ? 'bg-secondary' : '' }} fw-bold">
                        {{ $i+1 }}
                      </span>
                    </td>
                    <td>
                      <div style="font-weight:600;color:#fff;">{{ $dep->user->name ?? '—' }}</div>
                      <small style="color:#555;">{{ $dep->user->email ?? '—' }}</small>
                    </td>
                    <td class="text-success fw-bold">${{ number_format($dep->total,2) }}</td>
                    <td style="font-size:.82rem;color:#777;">{{ \Carbon\Carbon::parse($dep->last_deposit)->format('d M Y') }}</td>
                  </tr>
                @empty
                  <tr><td colspan="4" class="text-center py-4" style="color:#444;">No deposits yet.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    {{-- TOP EARNERS + HIGH VALUE TRANSACTIONS --}}
    <div class="row g-4 mb-5">

      {{-- Top Earners --}}
      <div class="col-lg-5">
        <div class="card card-dark p-4">
          <h5 class="fw-bold mb-4">
            <i class="bi bi-graph-up-arrow me-2 text-warning"></i> Top Earners (Investment Profits)
          </h5>
          <div class="table-responsive">
            <table class="table table-dark table-hover table-borderless mb-0">
              <thead>
                <tr>
                  <th>Rank</th>
                  <th>User</th>
                  <th>Total Earned</th>
                </tr>
              </thead>
              <tbody>
                @forelse($topEarners as $i => $earner)
                  <tr>
                    <td>
                      <span class="badge rank-{{ $i+1 <= 3 ? $i+1 : '' }} {{ $i+1 > 3 ? 'bg-secondary' : '' }} fw-bold">
                        {{ $i+1 }}
                      </span>
                    </td>
                    <td>
                      <div style="font-weight:600;color:#fff;">{{ $earner->user->name ?? '—' }}</div>
                      <small style="color:#555;">{{ $earner->user->email ?? '—' }}</small>
                    </td>
                    <td style="color:#f59e0b;font-weight:700;">${{ number_format($earner->total,2) }}</td>
                  </tr>
                @empty
                  <tr><td colspan="3" class="text-center py-4" style="color:#444;">No earnings claimed yet.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- High Value Transactions --}}
      <div class="col-lg-7">
        <div class="card card-dark p-4">
          <h5 class="fw-bold mb-4">
            <i class="bi bi-lightning-charge-fill me-2 text-info"></i> Highest Value Transactions
          </h5>
          <div class="table-responsive">
            <table class="table table-dark table-hover table-borderless mb-0">
              <thead>
                <tr>
                  <th>Reference</th>
                  <th>User</th>
                  <th>Type</th>
                  <th>Amount</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @forelse($highValueTxns as $txn)
                  <tr>
                    <td><code style="font-size:.75rem;color:#22c55e;">{{ $txn->ref }}</code></td>
                    <td style="font-weight:600;color:#fff;font-size:.88rem;">{{ $txn->user }}</td>
                    <td>
                      @if($txn->type === 'Deposit')
                        <span class="badge bg-success" style="font-size:.72rem;">Deposit</span>
                      @else
                        <span class="badge bg-danger" style="font-size:.72rem;">Withdrawal</span>
                      @endif
                    </td>
                    <td>
                      @if($txn->type === 'Deposit')
                        <span class="text-success fw-bold">+${{ number_format($txn->amount,2) }}</span>
                      @else
                        <span class="text-danger fw-bold">-${{ number_format($txn->amount,2) }}</span>
                      @endif
                    </td>
                    <td style="font-size:.8rem;color:#555;">{{ $txn->created_at->format('d M Y') }}</td>
                  </tr>
                @empty
                  <tr><td colspan="5" class="text-center py-4" style="color:#444;">No transactions yet.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Sidebar
const st=document.getElementById('sidebarToggle'),sb=document.getElementById('sidebar'),ov=document.getElementById('sidebarOverlay');
st.addEventListener('click',()=>{sb.classList.toggle('active');ov.classList.toggle('active');});
ov.addEventListener('click',()=>{sb.classList.remove('active');ov.classList.remove('active');});
document.querySelectorAll('.nav-link').forEach(l=>l.addEventListener('click',()=>{if(window.innerWidth<=768){sb.classList.remove('active');ov.classList.remove('active');}}));

// ── REAL DATA FROM PHP ──
const monthLabels    = {!! json_encode($monthLabels->values()) !!};
const monthDeposits  = {!! json_encode($monthlyDeposits->values()) !!};
const monthWithdraws = {!! json_encode($monthlyWithdrawals->values()) !!};
const monthEarnings  = {!! json_encode($monthlyEarnings->values()) !!};
const monthUsers     = {!! json_encode($monthlyUsers->values()) !!};

const chartDefaults = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: { legend: { labels: { color: '#888', font: { size: 12 } } } },
  scales: {
    y: { grid: { color: '#1a1a1a' }, ticks: { color: '#666' } },
    x: { grid: { display: false }, ticks: { color: '#666' } }
  }
};

// ── DEPOSITS vs WITHDRAWALS vs EARNINGS ──
new Chart(document.getElementById('revenueChart').getContext('2d'), {
  type: 'bar',
  data: {
    labels: monthLabels,
    datasets: [
      {
        label: 'Deposits',
        data: monthDeposits,
        backgroundColor: 'rgba(34,197,94,.5)',
        borderColor: '#22c55e',
        borderWidth: 1,
        borderRadius: 4,
      },
      {
        label: 'Withdrawals',
        data: monthWithdraws,
        backgroundColor: 'rgba(239,68,68,.5)',
        borderColor: '#ef4444',
        borderWidth: 1,
        borderRadius: 4,
      },
      {
        label: 'Earnings Paid',
        data: monthEarnings,
        backgroundColor: 'rgba(245,158,11,.5)',
        borderColor: '#f59e0b',
        borderWidth: 1,
        borderRadius: 4,
      }
    ]
  },
  options: { ...chartDefaults }
});

// ── USER GROWTH LINE ──
new Chart(document.getElementById('userChart').getContext('2d'), {
  type: 'line',
  data: {
    labels: monthLabels,
    datasets: [{
      label: 'New Users',
      data: monthUsers,
      borderColor: '#3b82f6',
      backgroundColor: 'rgba(59,130,246,.15)',
      borderWidth: 2,
      tension: 0.4,
      fill: true,
      pointBackgroundColor: '#3b82f6',
      pointBorderColor: '#000',
      pointBorderWidth: 2,
      pointRadius: 5
    }]
  },
  options: { ...chartDefaults }
});
</script>
</body>
</html>
