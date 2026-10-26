<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Transactions - TESLA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">
  <style>
    * { box-sizing: border-box; transition: all 0.3s ease; }
    body { background: #000; color: #e0e0e0; font-family: 'Segoe UI', sans-serif; min-height: 100vh; margin: 0; }

    .sidebar { position: fixed; top: 0; left: 0; bottom: 0; width: 260px; background: linear-gradient(180deg,#0a0a0a,#0f0f0f); border-right: 1px solid #222; padding: 1.5rem 1rem; overflow-y: auto; z-index: 1001; }
    .sidebar-toggle { display: none; position: fixed; top: 1rem; left: 1rem; background: #22c55e; border: none; color: white; padding: .75rem 1rem; border-radius: 8px; font-size: 1.25rem; cursor: pointer; z-index: 1002; }
    .sidebar-toggle:hover { background: #16a34a; transform: scale(1.05); }
    .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.7); z-index: 1000; }
    .sidebar-overlay.active { display: block; }
    .sidebar-brand { display: block; text-align: center; padding: 1.5rem 0 2rem; border-bottom: 1px solid #333; margin-bottom: 1.5rem; text-decoration: none; }
    .nav-link { color: #a0a0a0; padding: .85rem 1.25rem; border-radius: 8px; font-weight: 500; display: flex; align-items: center; gap: 12px; margin: .35rem 0; position: relative; overflow: hidden; }
    .nav-link::before { content: ''; position: absolute; left: 0; top: 0; width: 4px; height: 100%; background: #22c55e; transform: scaleY(0); transform-origin: top; }
    .nav-link:hover { background: rgba(34,197,94,.1); color: #fff; padding-left: 1.5rem; }
    .nav-link:hover::before, .nav-link.active::before { transform: scaleY(1); }
    .nav-link.active { background: rgba(34,197,94,.15); color: #22c55e; font-weight: 600; }
    .nav-link i { font-size: 1.15rem; min-width: 24px; }
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

    .stat-card { background: #0d0d0d; border: 1px solid #1a1a1a; border-radius: 14px; padding: 1.3rem 1.5rem; }
    .stat-label { font-size: .7rem; letter-spacing: .12em; text-transform: uppercase; color: #444; margin-bottom: .3rem; }
    .stat-value { font-size: 1.6rem; font-weight: 800; line-height: 1; }
    .stat-sub { font-size: .75rem; color: #444; margin-top: .3rem; }

    .filter-wrap { display: flex; gap: .5rem; flex-wrap: wrap; margin-bottom: 1.5rem; }
    .filter-tab { padding: .45rem 1.1rem; border-radius: 20px; border: 1px solid #2a2a2a; background: transparent; color: #555; font-size: .82rem; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: .4rem; text-decoration: none; white-space: nowrap; }
    .filter-tab:hover { border-color: #22c55e; color: #22c55e; }
    .filter-tab.active          { background: rgba(34,197,94,.12);  border-color: rgba(34,197,94,.4);  color: #22c55e; }
    .filter-tab.earning-tab.active    { background: rgba(245,158,11,.12); border-color: rgba(245,158,11,.4); color: #f59e0b; }
    .filter-tab.withdrawal-tab.active { background: rgba(239,68,68,.12);  border-color: rgba(239,68,68,.4);  color: #ef4444; }
    .filter-tab.investment-tab.active { background: rgba(99,102,241,.12); border-color: rgba(99,102,241,.4); color: #818cf8; }

    .card-dark { background: #111; border: 1px solid #222; border-radius: 14px; }
    .table-dark thead th { background: #1a1a1a; color: #555; border-bottom: 1px solid #2a2a2a; font-size: .72rem; letter-spacing: .1em; text-transform: uppercase; padding: .9rem 1rem; }
    .table-dark td { border-color: #1a1a1a; vertical-align: middle; padding: .9rem 1rem; }
    .table-dark tbody tr:hover td { background: rgba(34,197,94,.03); }

    .tbadge { padding: .28rem .75rem; border-radius: 6px; font-size: .72rem; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; display: inline-flex; align-items: center; gap: .35rem; }
    .tb-deposit    { background: rgba(34,197,94,.12);  border: 1px solid rgba(34,197,94,.25);  color: #22c55e; }
    .tb-withdrawal { background: rgba(239,68,68,.12);  border: 1px solid rgba(239,68,68,.25);  color: #ef4444; }
    .tb-earning    { background: rgba(245,158,11,.12); border: 1px solid rgba(245,158,11,.25); color: #f59e0b; }
    .tb-investment { background: rgba(99,102,241,.12); border: 1px solid rgba(99,102,241,.25); color: #818cf8; }

    .modal-content { background: #111; border: 1px solid #2a2a2a; border-radius: 16px; }
    .modal-header  { background: #1a1a1a; border-bottom: 1px solid #222; border-radius: 15px 15px 0 0; }
    .detail-row { display: flex; justify-content: space-between; align-items: flex-start; padding: .7rem 0; border-bottom: 1px solid #1a1a1a; gap: 1rem; }
    .detail-row:last-child { border-bottom: none; }
    .detail-key { font-size: .72rem; color: #555; text-transform: uppercase; letter-spacing: .1em; font-weight: 600; flex-shrink: 0; }
    .detail-val { font-size: .9rem; color: #e0e0e0; text-align: right; word-break: break-all; }

    .empty-state { text-align: center; padding: 4rem 2rem; color: #2a2a2a; }
    .empty-state i { font-size: 3.5rem; display: block; margin-bottom: 1rem; }
    .flash-success { background: rgba(34,197,94,.12); border: 1px solid rgba(34,197,94,.3); color: #22c55e; padding: 1rem 1.5rem; border-radius: 10px; margin-bottom: 1.5rem; }
  </style>
</head>
<body>

<button class="sidebar-toggle" id="sidebarToggle"><i class="bi bi-list"></i></button>
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar" id="sidebar">
  <a href="{{ route('user.dashboard') }}" class="sidebar-brand">
    <img src="{{ asset('images/logo.png') }}" width="50%" height="50" alt="TESLA Logo">
  </a>
  <nav class="mt-4">
    <ul class="nav flex-column">
      <li><a class="nav-link" href="{{ route('user.dashboard') }}"><i class="uil uil-home"></i><span>Home</span></a></li>
      <li><a class="nav-link" href="{{ route('user.packages') }}"><i class="uil uil-package"></i><span>Packages</span></a></li>
      <li><a class="nav-link" href="{{ route('user.deposit') }}"><i class="uil uil-dollar-sign"></i><span>Deposit</span></a></li>
      <li><a class="nav-link" href="{{ route('user.withdraw') }}"><i class="uil uil-money-withdraw"></i><span>Withdraw</span></a></li>
      <li><a class="nav-link active" href="{{ route('user.transactions') }}"><i class="uil uil-receipt"></i><span>Transactions</span></a></li>
      <li><a class="nav-link" href="{{ route('profile.edit') }}"><i class="uil uil-user"></i><span>Profile</span></a></li>
      <form method="POST" action="{{ url('/logout') }}" style="display:contents">
        @csrf
        <button type="submit" class="logout-btn" onclick="return confirm('Are you sure you want to logout?')">
          <i class="bi bi-box-arrow-right"></i><span>Logout</span>
        </button>
      </form>
    </ul>
  </nav>
</aside>

<main class="main-content">

  @if(session('success'))
    <div class="flash-success"><i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}</div>
  @endif

  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
    <h1 class="display-5 fw-bold mb-0"><i class="bi bi-receipt me-2 text-success"></i> Transactions</h1>
    <span class="text-secondary">{{ now()->format('l, d M Y') }}</span>
  </div>

  {{-- STAT CARDS --}}
  <div class="row g-3 mb-4">
    <div class="col-md-4">
      <div class="stat-card">
        <div class="stat-label"><i class="bi bi-arrow-down-circle me-1"></i> Total Deposited</div>
        <div class="stat-value text-success">${{ number_format($totalDeposited,2) }}</div>
        <div class="stat-sub">Approved deposits</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat-card">
        <div class="stat-label"><i class="bi bi-graph-up-arrow me-1"></i> Total Earnings</div>
        <div class="stat-value" style="color:#f59e0b;">${{ number_format($totalEarnings,2) }}</div>
        <div class="stat-sub">Investment profits claimed</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat-card">
        <div class="stat-label"><i class="bi bi-arrow-up-circle me-1"></i> Total Withdrawn</div>
        <div class="stat-value" style="color:#ef4444;">${{ number_format($totalWithdrawn,2) }}</div>
        <div class="stat-sub">Approved withdrawals</div>
      </div>
    </div>
  </div>

  {{-- FILTER TABS --}}
  <div class="filter-wrap">
    <a href="{{ route('user.transactions',['type'=>'all']) }}"
       class="filter-tab {{ $type==='all'?'active':'' }}">
      <i class="bi bi-list"></i> All
      <span style="background:#1a1a1a;border:1px solid #2a2a2a;color:#555;padding:.1rem .5rem;border-radius:20px;font-size:.7rem;margin-left:.3rem;">
        {{ $all->count() }}
      </span>
    </a>
    <a href="{{ route('user.transactions',['type'=>'deposit']) }}"
       class="filter-tab {{ $type==='deposit'?'active':'' }}">
      <i class="bi bi-arrow-down-circle"></i> Deposits
    </a>
    <a href="{{ route('user.transactions',['type'=>'withdrawal']) }}"
       class="filter-tab withdrawal-tab {{ $type==='withdrawal'?'active':'' }}">
      <i class="bi bi-arrow-up-circle"></i> Withdrawals
    </a>
    <a href="{{ route('user.transactions',['type'=>'earning']) }}"
       class="filter-tab earning-tab {{ $type==='earning'?'active':'' }}">
      <i class="bi bi-graph-up-arrow"></i> Earnings / Profit
    </a>
    <a href="{{ route('user.transactions',['type'=>'investment']) }}"
       class="filter-tab investment-tab {{ $type==='investment'?'active':'' }}">
      <i class="bi bi-coin"></i> Plan Purchases
    </a>
  </div>

  {{-- TABLE --}}
  <div class="card-dark overflow-hidden">
    <div class="table-responsive">
      <table class="table table-dark table-hover table-borderless mb-0">
        <thead>
          <tr>
            <th>Reference</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Description</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($all as $txn)
            <tr>
              <td>
                <code style="font-size:.78rem;color:{{ $txn->type==='earning'?'#f59e0b':($txn->type==='deposit'?'#22c55e':($txn->type==='investment'?'#818cf8':'#ef4444')) }}">
                  {{ $txn->ref }}
                </code>
              </td>
              <td>
                @if($txn->type==='deposit')    <span class="tbadge tb-deposit"><i class="bi bi-arrow-down"></i> Deposit</span>
                @elseif($txn->type==='withdrawal') <span class="tbadge tb-withdrawal"><i class="bi bi-arrow-up"></i> Withdrawal</span>
                @elseif($txn->type==='earning')    <span class="tbadge tb-earning"><i class="bi bi-graph-up-arrow"></i> Earnings</span>
                @else                              <span class="tbadge tb-investment"><i class="bi bi-coin"></i> Plan Purchase</span>
                @endif
              </td>
              <td>
                @if(in_array($txn->type,['deposit','earning']))
                  <span style="color:#22c55e;font-weight:700;">+${{ number_format($txn->amount,2) }}</span>
                @else
                  <span style="color:#ef4444;font-weight:700;">-${{ number_format($txn->amount,2) }}</span>
                @endif
              </td>
              <td style="font-size:.82rem;color:#666;max-width:180px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                {{ $txn->description }}
              </td>
              <td style="font-size:.82rem;">
                {{ $txn->created_at->format('d M Y') }}<br>
                <span style="color:#444;">{{ $txn->created_at->format('h:i A') }}</span>
              </td>
              <td>
                @php $s = strtolower($txn->status); @endphp
                @if(in_array($s,['completed','approved'])) <span class="badge bg-success" style="font-size:.72rem;">{{ ucfirst($s) }}</span>
                @elseif($s==='pending') <span class="badge bg-warning text-dark" style="font-size:.72rem;">Pending</span>
                @else <span class="badge bg-danger" style="font-size:.72rem;">{{ ucfirst($s) }}</span>
                @endif
              </td>
              <td>
                <button class="btn btn-sm btn-outline-light"
                        data-bs-toggle="modal" data-bs-target="#txnModal"
                        data-ref="{{ $txn->ref }}"
                        data-type="{{ $txn->type }}"
                        data-amount="{{ number_format($txn->amount,2) }}"
                        data-desc="{{ $txn->description }}"
                        data-status="{{ ucfirst($txn->status) }}"
                        data-date="{{ $txn->created_at->format('d M Y • h:i A') }}"
                        data-proof="{{ $txn->proof ? asset('storage/'.$txn->proof) : '' }}">
                  <i class="bi bi-eye"></i>
                </button>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7">
                <div class="empty-state">
                  <i class="bi bi-receipt"></i>
                  <p style="font-size:1rem;margin-bottom:.4rem;">No transactions yet.</p>
                  <p style="font-size:.85rem;">Your deposits, withdrawals and earnings will appear here.</p>
                  <a href="{{ route('user.deposit') }}" class="btn btn-outline-success btn-sm mt-2">
                    <i class="bi bi-plus-circle me-1"></i> Make a Deposit
                  </a>
                </div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    @if($all->count() > 0)
      <div style="padding:.8rem 1.2rem;border-top:1px solid #1a1a1a;">
        <span style="color:#333;font-size:.8rem;">
          {{ $all->count() }} record{{ $all->count()!==1?'s':'' }}
          @if($type!=='all') · {{ ucfirst($type) }}s @endif
        </span>
      </div>
    @endif
  </div>

</main>

{{-- MODAL --}}
<div class="modal fade" id="txnModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold"><i class="bi bi-receipt me-2"></i> Transaction Details</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body px-4 pb-4">
        <div id="m-banner" style="border-radius:10px;padding:.7rem 1rem;margin-bottom:1.2rem;text-align:center;font-weight:700;font-size:.85rem;letter-spacing:.06em;text-transform:uppercase;"></div>
        <div class="detail-row"><span class="detail-key">Reference</span><span class="detail-val" id="m-ref" style="font-family:monospace;font-size:.82rem;"></span></div>
        <div class="detail-row"><span class="detail-key">Amount</span><span class="detail-val fw-bold" id="m-amount" style="font-size:1.2rem;"></span></div>
        <div class="detail-row"><span class="detail-key">Description</span><span class="detail-val" id="m-desc"></span></div>
        <div class="detail-row"><span class="detail-key">Date & Time</span><span class="detail-val" id="m-date"></span></div>
        <div class="detail-row"><span class="detail-key">Status</span><span id="m-status"></span></div>
        <div id="m-proof-section" style="display:none;margin-top:1rem;">
          <div class="detail-key mb-2">Proof of Payment</div>
          <img id="m-proof-img" src="" class="img-fluid rounded" style="max-height:220px;width:100%;object-fit:contain;background:#0a0a0a;border:1px solid #1a1a1a;border-radius:8px;">
          <div class="mt-2"><a id="m-proof-link" href="#" target="_blank" class="btn btn-sm btn-outline-light"><i class="bi bi-box-arrow-up-right me-1"></i> Open Full Size</a></div>
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

const typeConfig={
  deposit:    {bg:'rgba(34,197,94,.1)',  border:'rgba(34,197,94,.3)',  color:'#22c55e', label:'↓  Deposit'},
  withdrawal: {bg:'rgba(239,68,68,.1)',  border:'rgba(239,68,68,.3)',  color:'#ef4444', label:'↑  Withdrawal'},
  earning:    {bg:'rgba(245,158,11,.1)', border:'rgba(245,158,11,.3)', color:'#f59e0b', label:'📈  Earnings / Profit'},
  investment: {bg:'rgba(99,102,241,.1)', border:'rgba(99,102,241,.3)', color:'#818cf8', label:'💰  Plan Purchase'},
};

document.getElementById('txnModal').addEventListener('show.bs.modal', e => {
  const b=e.relatedTarget, type=b.getAttribute('data-type');
  const cfg=typeConfig[type]||typeConfig.deposit;
  const banner=document.getElementById('m-banner');
  banner.style.cssText=`background:${cfg.bg};border:1px solid ${cfg.border};color:${cfg.color};border-radius:10px;padding:.7rem 1rem;margin-bottom:1.2rem;text-align:center;font-weight:700;font-size:.85rem;letter-spacing:.06em;text-transform:uppercase;`;
  banner.textContent=cfg.label;

  document.getElementById('m-ref').textContent  = b.getAttribute('data-ref');
  document.getElementById('m-desc').textContent = b.getAttribute('data-desc');
  document.getElementById('m-date').textContent = b.getAttribute('data-date');

  const isCredit=['deposit','earning'].includes(type);
  document.getElementById('m-amount').innerHTML=`<span style="color:${isCredit?'#22c55e':'#ef4444'}">${isCredit?'+':'-'}$${b.getAttribute('data-amount')}</span>`;

  const s=b.getAttribute('data-status').toLowerCase();
  document.getElementById('m-status').innerHTML=
    ['completed','approved'].includes(s)?`<span class="badge bg-success">${b.getAttribute('data-status')}</span>`
    :s==='pending'?'<span class="badge bg-warning text-dark">Pending</span>'
    :`<span class="badge bg-danger">${b.getAttribute('data-status')}</span>`;

  const proof=b.getAttribute('data-proof');
  const ps=document.getElementById('m-proof-section');
  if(proof&&proof.trim()){document.getElementById('m-proof-img').src=proof;document.getElementById('m-proof-link').href=proof;ps.style.display='block';}
  else{ps.style.display='none';}
});
</script>
</body>
</html>
