<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Transactions - TESLA Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    * { transition: all 0.3s ease; }
    body { background: #000; color: #e0e0e0; font-family: 'Segoe UI', sans-serif; min-height: 100vh; }

    .sidebar { position: fixed; top: 0; left: 0; bottom: 0; width: 260px; background: linear-gradient(180deg,#0a0a0a,#0f0f0f); border-right: 1px solid #222; padding: 1.5rem 1rem; overflow-y: auto; z-index: 1001; }
    .sidebar-toggle { display: none; position: fixed; top: 1rem; left: 1rem; background: #ef4444; border: none; color: white; padding: .75rem 1rem; border-radius: 8px; font-size: 1.25rem; cursor: pointer; z-index: 1002; }
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

    .card-dark { background: #111; border: 1px solid #333; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,.5); transition: transform .2s; }
    .card-dark:hover { transform: translateY(-4px); }
    .stat-icon { font-size: 2.5rem; opacity: .85; }
    .table-dark thead th { background: #1a1a1a; color: #777; border-bottom: 1px solid #2a2a2a; font-size: .75rem; text-transform: uppercase; letter-spacing: .08em; padding: .9rem 1rem; }
    .table-dark td { border-color: #1a1a1a; vertical-align: middle; padding: .85rem 1rem; }
    .table-dark tbody tr:hover td { background: rgba(255,255,255,.02); }

    /* Type badges */
    .tbadge { padding: .28rem .75rem; border-radius: 6px; font-size: .72rem; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; display: inline-flex; align-items: center; gap: .35rem; }
    .tb-deposit    { background: rgba(34,197,94,.12);  border: 1px solid rgba(34,197,94,.25);  color: #22c55e; }
    .tb-withdrawal { background: rgba(239,68,68,.12);  border: 1px solid rgba(239,68,68,.25);  color: #ef4444; }
    .tb-earning    { background: rgba(245,158,11,.12); border: 1px solid rgba(245,158,11,.25); color: #f59e0b; }
    .tb-investment { background: rgba(99,102,241,.12); border: 1px solid rgba(99,102,241,.25); color: #818cf8; }

    /* Filter tabs */
    .ftab { padding: .4rem 1rem; border-radius: 20px; border: 1px solid #2a2a2a; background: transparent; color: #555; font-size: .8rem; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: .4rem; }
    .ftab:hover { border-color: #ef4444; color: #ef4444; }
    .ftab.active { background: rgba(239,68,68,.1); border-color: rgba(239,68,68,.4); color: #ef4444; }
    .ftab.ft-earn.active  { background: rgba(245,158,11,.1); border-color: rgba(245,158,11,.4); color: #f59e0b; }
    .ftab.ft-dep.active   { background: rgba(34,197,94,.1);  border-color: rgba(34,197,94,.4);  color: #22c55e; }
    .ftab.ft-inv.active   { background: rgba(99,102,241,.1); border-color: rgba(99,102,241,.4); color: #818cf8; }

    .search-input { background: #1a1a1a; border: 1px solid #444; color: #fff; }
    .search-input:focus { border-color: #ef4444; box-shadow: 0 0 0 .25rem rgba(239,68,68,.2); color: #fff; background: #1a1a1a; }
    .form-select-dark { background: #1a1a1a; border: 1px solid #444; color: #fff; }
    .form-select-dark:focus { border-color: #ef4444; color: #fff; }

    .modal-content { background: #111; border: 1px solid #2a2a2a; border-radius: 16px; }
    .modal-header  { background: #1a1a1a; border-bottom: 1px solid #222; border-radius: 15px 15px 0 0; }
    .dbox { background: #0a0a0a; border: 1px solid #1a1a1a; border-radius: 10px; padding: .85rem 1rem; margin-bottom: .7rem; }
    .dlabel { font-size: .68rem; letter-spacing: .12em; text-transform: uppercase; color: #444; margin-bottom: .25rem; }
    .dvalue { font-size: .92rem; color: #e0e0e0; font-weight: 500; }

    .flash-success { background: rgba(34,197,94,.12); border: 1px solid rgba(34,197,94,.3); color: #22c55e; padding: 1rem 1.5rem; border-radius: 10px; margin-bottom: 1.5rem; }
  </style>
</head>
<body>

<button class="sidebar-toggle" id="sidebarToggle"><i class="bi bi-list"></i></button>
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar" id="sidebar">
  <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">TESLA <span>Admin</span></a>
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
        <li><a href="{{ route('admin.transactions') }}" class="nav-link active"><i class="bi bi-receipt"></i><span>Transactions</span></a></li>
        <li><a href="{{ route('admin.reports') }}" class="nav-link"><i class="bi bi-graph-up"></i><span>Reports</span></a></li>
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

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
      <h1 class="display-5 fw-bold mb-0"><i class="bi bi-receipt me-2 text-danger"></i> All Transactions</h1>
      <span class="text-secondary">{{ now()->format('F d, Y') }}</span>
    </div>

    @if(session('success'))
      <div class="flash-success"><i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}</div>
    @endif

    {{-- STATS --}}
    <div class="row g-3 mb-5">
      <div class="col-xl col-lg-6 col-md-6">
        <div class="card card-dark text-center p-3">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="fw-bold mb-0" style="font-size:.82rem;">Total Records</h6>
            <i class="bi bi-receipt stat-icon text-info"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">{{ number_format($totalTransactions) }}</h2>
          <p class="text-info small mb-0">All time</p>
        </div>
      </div>
      <div class="col-xl col-lg-6 col-md-6">
        <div class="card card-dark text-center p-3">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="fw-bold mb-0" style="font-size:.82rem;">Deposits Today</h6>
            <i class="bi bi-arrow-down-circle stat-icon text-success"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-success">${{ number_format($depositsToday,2) }}</h2>
          <p class="text-success small mb-0">Today</p>
        </div>
      </div>
      <div class="col-xl col-lg-6 col-md-6">
        <div class="card card-dark text-center p-3">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="fw-bold mb-0" style="font-size:.82rem;">Withdrawals Today</h6>
            <i class="bi bi-arrow-up-circle stat-icon text-danger"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-danger">${{ number_format($withdrawalsToday,2) }}</h2>
          <p class="text-danger small mb-0">Today</p>
        </div>
      </div>
      <div class="col-xl col-lg-6 col-md-6">
        <div class="card card-dark text-center p-3" style="border-color:rgba(245,158,11,.2);">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="fw-bold mb-0" style="font-size:.82rem;">Earnings Today</h6>
            <i class="bi bi-graph-up-arrow stat-icon text-warning"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-warning">${{ number_format($earningsToday,2) }}</h2>
          <p class="text-warning small mb-0">Profit claimed today</p>
        </div>
      </div>
      <div class="col-xl col-lg-6 col-md-6">
        <div class="card card-dark text-center p-3">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="fw-bold mb-0" style="font-size:.82rem;">Pending</h6>
            <i class="bi bi-hourglass-split stat-icon text-secondary"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1" style="color:#888;">{{ number_format($pendingCount) }}</h2>
          <p class="text-secondary small mb-0">Awaiting review</p>
        </div>
      </div>
    </div>

    {{-- FILTERS --}}
    <div class="card card-dark mb-4">
      <div class="card-body">
        <form method="GET" action="{{ route('admin.transactions') }}" id="fform">

          {{-- Type tabs --}}
          <div class="d-flex gap-2 flex-wrap mb-3">
            <button type="submit" name="type" value="all"        class="ftab {{ $type==='all'        ? 'active' : '' }}"><i class="bi bi-list"></i> All</button>
            <button type="submit" name="type" value="deposit"    class="ftab ft-dep {{ $type==='deposit'    ? 'active' : '' }}"><i class="bi bi-arrow-down-circle"></i> Deposits</button>
            <button type="submit" name="type" value="withdrawal" class="ftab {{ $type==='withdrawal' ? 'active' : '' }}"><i class="bi bi-arrow-up-circle"></i> Withdrawals</button>
            <button type="submit" name="type" value="earning"    class="ftab ft-earn {{ $type==='earning'    ? 'active' : '' }}"><i class="bi bi-graph-up-arrow"></i> Earnings / Profit</button>
            <button type="submit" name="type" value="investment" class="ftab ft-inv {{ $type==='investment' ? 'active' : '' }}"><i class="bi bi-coin"></i> Plan Purchases</button>
          </div>

          <div class="row g-3 align-items-center">
            <div class="col-md-5">
              <div class="input-group input-group-lg">
                <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-search"></i></span>
                <input type="text" name="search" value="{{ $search }}" class="form-control search-input" placeholder="Search user, reference, amount...">
              </div>
            </div>
            <div class="col-md-3">
              <select name="status" class="form-select form-select-lg form-select-dark" onchange="document.getElementById('fform').submit()">
                <option value="" {{ !$status?'selected':'' }}>All Status</option>
                <option value="completed" {{ $status==='completed'?'selected':'' }}>Completed</option>
                <option value="pending"   {{ $status==='pending'  ?'selected':'' }}>Pending</option>
                <option value="approved"  {{ $status==='approved' ?'selected':'' }}>Approved</option>
                <option value="rejected"  {{ $status==='rejected' ?'selected':'' }}>Rejected</option>
              </select>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-danger btn-lg w-100"><i class="bi bi-funnel me-1"></i> Filter</button>
            </div>
            @if($search || $status || $type !== 'all')
            <div class="col-md-2">
              <a href="{{ route('admin.transactions') }}" class="btn btn-outline-secondary btn-lg w-100"><i class="bi bi-x-circle me-1"></i> Clear</a>
            </div>
            @endif
          </div>
        </form>
      </div>
    </div>

    {{-- TABLE --}}
    <div class="card card-dark shadow-lg overflow-hidden">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-dark table-hover table-borderless mb-0">
            <thead>
              <tr>
                <th>Reference</th>
                <th>User</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($transactions as $txn)
                @php $rt = $txn->row_type; @endphp
                <tr>
                  <td>
                    <code style="font-size:.78rem;color:{{ $rt==='earning'?'#f59e0b':($rt==='deposit'?'#22c55e':($rt==='investment'?'#818cf8':'#ef4444')) }}">
                      {{ $txn->row_ref }}
                    </code>
                  </td>
                  <td>
                    <div style="font-weight:600;color:#fff;font-size:.88rem;">{{ $txn->user->name ?? '—' }}</div>
                    <small style="color:#555;">{{ $txn->user->email ?? '—' }}</small>
                  </td>
                  <td>
                    @if($rt==='deposit')    <span class="tbadge tb-deposit"><i class="bi bi-arrow-down"></i> Deposit</span>
                    @elseif($rt==='withdrawal') <span class="tbadge tb-withdrawal"><i class="bi bi-arrow-up"></i> Withdrawal</span>
                    @elseif($rt==='earning')    <span class="tbadge tb-earning"><i class="bi bi-graph-up-arrow"></i> Earnings</span>
                    @else                       <span class="tbadge tb-investment"><i class="bi bi-coin"></i> Plan Purchase</span>
                    @endif
                  </td>
                  <td>
                    @if(in_array($rt,['deposit','earning']))
                      <span style="color:#22c55e;font-weight:700;">+${{ number_format($txn->amount,2) }}</span>
                    @else
                      <span style="color:#ef4444;font-weight:700;">-${{ number_format($txn->amount,2) }}</span>
                    @endif
                  </td>
                  <td style="font-size:.8rem;color:#666;max-width:180px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                    {{ $txn->description }}
                  </td>
                  <td style="font-size:.8rem;">
                    {{ $txn->created_at->format('d M Y') }}<br>
                    <span style="color:#555;">{{ $txn->created_at->format('h:i A') }}</span>
                  </td>
                  <td>
                    @php $s = strtolower($txn->status ?? 'completed'); @endphp
                    @if(in_array($s,['completed','approved'])) <span class="badge bg-success" style="font-size:.72rem;">{{ ucfirst($s) }}</span>
                    @elseif($s==='pending') <span class="badge bg-warning text-dark" style="font-size:.72rem;">Pending</span>
                    @else <span class="badge bg-danger" style="font-size:.72rem;">{{ ucfirst($s) }}</span>
                    @endif
                  </td>
                  <td>
                    <button class="btn btn-sm btn-outline-light"
                            data-bs-toggle="modal" data-bs-target="#txnModal"
                            data-ref="{{ $txn->row_ref }}"
                            data-type="{{ $rt }}"
                            data-user="{{ $txn->user->name ?? '—' }}"
                            data-email="{{ $txn->user->email ?? '—' }}"
                            data-amount="{{ number_format($txn->amount,2) }}"
                            data-desc="{{ $txn->description }}"
                            data-method="{{ $txn->row_method ?? '—' }}"
                            data-status="{{ ucfirst($txn->status ?? 'completed') }}"
                            data-date="{{ $txn->created_at->format('d M Y • h:i A') }}"
                            data-proof="{{ $txn->row_proof ? asset('storage/'.$txn->row_proof) : '' }}">
                      <i class="bi bi-eye"></i> View
                    </button>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="8" class="text-center py-5" style="color:#333;">
                    <i class="bi bi-inbox" style="font-size:3rem;"></i>
                    <p class="mt-3 mb-0">No transactions found.</p>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer bg-transparent" style="border-top:1px solid #1a1a1a;padding:.8rem 1.2rem;">
        <span style="color:#444;font-size:.8rem;">
          {{ $transactions->count() }} record{{ $transactions->count()!==1?'s':'' }}
          @if($type!=='all') · {{ ucfirst($type) }}s @endif
          @if($status) · {{ ucfirst($status) }} @endif
          @if($search) · "{{ $search }}" @endif
        </span>
      </div>
    </div>

  </div>
</main>

{{-- VIEW MODAL --}}
<div class="modal fade" id="txnModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="txnTitle"><i class="bi bi-receipt me-2"></i> Transaction Details</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-4">
        <div id="m-banner" style="border-radius:10px;padding:.7rem 1rem;margin-bottom:1.2rem;text-align:center;font-weight:700;font-size:.82rem;letter-spacing:.06em;text-transform:uppercase;"></div>
        <div class="row g-3">
          <div class="col-md-6"><div class="dbox"><div class="dlabel">Reference</div><div class="dvalue" id="m-ref" style="font-family:monospace;font-size:.82rem;"></div></div></div>
          <div class="col-md-6"><div class="dbox"><div class="dlabel">User</div><div class="dvalue" id="m-user"></div><div style="font-size:.75rem;color:#444;" id="m-email"></div></div></div>
          <div class="col-md-6"><div class="dbox"><div class="dlabel">Amount</div><div class="dvalue" id="m-amount" style="font-size:1.2rem;font-weight:800;"></div></div></div>
          <div class="col-md-6"><div class="dbox"><div class="dlabel">Description</div><div class="dvalue" id="m-desc"></div></div></div>
          <div class="col-md-6"><div class="dbox"><div class="dlabel">Method</div><div class="dvalue" id="m-method"></div></div></div>
          <div class="col-md-6"><div class="dbox"><div class="dlabel">Status</div><div id="m-status"></div></div></div>
          <div class="col-12"><div class="dbox"><div class="dlabel">Date & Time</div><div class="dvalue" id="m-date"></div></div></div>
          <div class="col-12" id="m-proof-wrap" style="display:none;">
            <div class="dbox">
              <div class="dlabel">Proof of Payment</div>
              <img id="m-proof-img" src="" class="img-fluid rounded mt-2" style="max-height:260px;cursor:pointer;">
              <div class="mt-2"><a id="m-proof-link" href="#" target="_blank" class="btn btn-sm btn-outline-light"><i class="bi bi-box-arrow-up-right me-1"></i> Open Full Size</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="border-top:1px solid #1a1a1a;">
        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
const st=document.getElementById('sidebarToggle'),sb=document.getElementById('sidebar'),ov=document.getElementById('sidebarOverlay');
st.addEventListener('click',()=>{sb.classList.toggle('active');ov.classList.toggle('active');});
ov.addEventListener('click',()=>{sb.classList.remove('active');ov.classList.remove('active');});
document.querySelectorAll('.nav-link').forEach(l=>l.addEventListener('click',()=>{if(window.innerWidth<=768){sb.classList.remove('active');ov.classList.remove('active');}}));

const typeConfig = {
  deposit:    {bg:'rgba(34,197,94,.1)',  border:'rgba(34,197,94,.3)',  color:'#22c55e', label:'↓ Deposit'},
  withdrawal: {bg:'rgba(239,68,68,.1)',  border:'rgba(239,68,68,.3)',  color:'#ef4444', label:'↑ Withdrawal'},
  earning:    {bg:'rgba(245,158,11,.1)', border:'rgba(245,158,11,.3)', color:'#f59e0b', label:'📈 Earnings / Profit'},
  investment: {bg:'rgba(99,102,241,.1)', border:'rgba(99,102,241,.3)', color:'#818cf8', label:'💰 Plan Purchase'},
};

document.getElementById('txnModal').addEventListener('show.bs.modal', e => {
  const b=e.relatedTarget, type=b.getAttribute('data-type');
  const cfg = typeConfig[type]||typeConfig.deposit;
  const banner=document.getElementById('m-banner');
  banner.style.cssText=`background:${cfg.bg};border:1px solid ${cfg.border};color:${cfg.color};border-radius:10px;padding:.7rem 1rem;margin-bottom:1.2rem;text-align:center;font-weight:700;font-size:.82rem;letter-spacing:.06em;text-transform:uppercase;`;
  banner.textContent=cfg.label;

  document.getElementById('m-ref').textContent    = b.getAttribute('data-ref');
  document.getElementById('m-user').textContent   = b.getAttribute('data-user');
  document.getElementById('m-email').textContent  = b.getAttribute('data-email');
  document.getElementById('m-date').textContent   = b.getAttribute('data-date');
  document.getElementById('m-desc').textContent   = b.getAttribute('data-desc');
  document.getElementById('m-method').textContent = b.getAttribute('data-method');

  const isCredit = ['deposit','earning'].includes(type);
  document.getElementById('m-amount').innerHTML =
    `<span style="color:${isCredit?'#22c55e':'#ef4444'}">${isCredit?'+':'-'}$${b.getAttribute('data-amount')}</span>`;

  const s=b.getAttribute('data-status').toLowerCase();
  document.getElementById('m-status').innerHTML =
    ['completed','approved'].includes(s) ? `<span class="badge bg-success">${b.getAttribute('data-status')}</span>`
    : s==='pending' ? '<span class="badge bg-warning text-dark">Pending</span>'
    : `<span class="badge bg-danger">${b.getAttribute('data-status')}</span>`;

  const proof=b.getAttribute('data-proof');
  const pw=document.getElementById('m-proof-wrap');
  if(proof&&proof.trim()){document.getElementById('m-proof-img').src=proof;document.getElementById('m-proof-link').href=proof;pw.style.display='block';}
  else{pw.style.display='none';}
});
</script>
</body>
</html>
