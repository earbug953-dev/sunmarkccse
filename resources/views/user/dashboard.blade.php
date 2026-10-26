<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - SUNHILL</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    *, *::before, *::after { box-sizing: border-box; }
    body { font-family: 'Inter', sans-serif; background: #000; color: #fff; min-height: 100vh; margin: 0; }

    /* ── SIDEBAR ── */
    .sidebar { position: fixed; top: 0; left: 0; bottom: 0; width: 260px; background: linear-gradient(180deg,#0a0a0a,#0f0f0f); border-right: 1px solid #1a1a1a; padding: 1.5rem 1rem; overflow-y: auto; z-index: 1001; }
    .sidebar-toggle { display: none; position: fixed; top: 1rem; left: 1rem; background: #22c55e; border: none; color: #fff; padding: .75rem 1rem; border-radius: 10px; font-size: 1.25rem; cursor: pointer; z-index: 1002; box-shadow: 0 4px 16px rgba(34,197,94,.3); }
    .sidebar-toggle:hover { background: #16a34a; transform: scale(1.05); }
    .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.8); z-index: 1000; backdrop-filter: blur(4px); }
    .sidebar-overlay.active { display: block; }
    .sidebar-brand { display: block; text-align: center; padding: 1.5rem 0 2rem; border-bottom: 1px solid #1a1a1a; margin-bottom: 1.5rem; text-decoration: none; }
    .nav-link { color: #666; padding: .8rem 1.25rem; border-radius: 10px; font-weight: 500; display: flex; align-items: center; gap: 12px; margin: .25rem 0; position: relative; overflow: hidden; font-size: .92rem; transition: all .2s; }
    .nav-link::before { content: ''; position: absolute; left: 0; top: 0; width: 3px; height: 100%; background: #22c55e; transform: scaleY(0); transform-origin: top; transition: transform .25s; border-radius: 0 2px 2px 0; }
    .nav-link:hover { background: rgba(34,197,94,.08); color: #fff; padding-left: 1.5rem; }
    .nav-link:hover::before, .nav-link.active::before { transform: scaleY(1); }
    .nav-link.active { background: rgba(34,197,94,.12); color: #22c55e; font-weight: 600; }
    .nav-link i { font-size: 1.1rem; min-width: 22px; }
    .logout-btn { background: rgba(239,68,68,.08); border: 1px solid rgba(239,68,68,.2); color: #ef4444; width: 100%; margin-top: 1rem; padding: .8rem 1.25rem; border-radius: 10px; font-weight: 600; display: flex; align-items: center; gap: 12px; cursor: pointer; font-size: .9rem; transition: all .2s; }
    .logout-btn:hover { background: rgba(239,68,68,.15); transform: translateX(4px); }
    .main-content { margin-left: 260px; padding: 2rem; }
    .sidebar::-webkit-scrollbar { width: 4px; }
    .sidebar::-webkit-scrollbar-thumb { background: #222; border-radius: 4px; }

    @media(max-width:992px) { .sidebar { width: 240px; } .main-content { margin-left: 240px; } }
    @media(max-width:768px) {
      .sidebar { width: 280px; height: 100vh; left: -100%; position: fixed; transition: left .3s; }
      .sidebar.active { left: 0; }
      .main-content { margin-left: 0; padding: 1rem; padding-top: 4.5rem; }
      .sidebar-toggle { display: block; }
    }

    /* ── WELCOME BANNER ── */
    .welcome-banner {
      background: linear-gradient(135deg, #0d1f12 0%, #0a1a0e 50%, #000 100%);
      border: 1px solid rgba(34,197,94,.15);
      border-radius: 20px;
      padding: 2rem 2.5rem;
      margin-bottom: 2rem;
      position: relative;
      overflow: hidden;
    }
    .welcome-banner::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -10%;
      width: 300px;
      height: 300px;
      background: radial-gradient(circle, rgba(34,197,94,.08) 0%, transparent 70%);
      pointer-events: none;
    }
    .welcome-name { font-size: 1.8rem; font-weight: 800; color: #fff; margin-bottom: .3rem; }
    .welcome-sub { color: #555; font-size: .9rem; }
    .welcome-date { font-size: .82rem; color: #444; }

    /* ── BALANCE CARD ── */
    .balance-card {
      background: linear-gradient(135deg, #0d1f12, #091408);
      border: 1px solid rgba(34,197,94,.2);
      border-radius: 20px;
      padding: 2rem;
      position: relative;
      overflow: hidden;
    }
    .balance-card::after {
      content: '';
      position: absolute;
      bottom: -30px;
      right: -30px;
      width: 160px;
      height: 160px;
      background: radial-gradient(circle, rgba(34,197,94,.1) 0%, transparent 70%);
      pointer-events: none;
    }
    .balance-label { font-size: .72rem; letter-spacing: .16em; text-transform: uppercase; color: #555; margin-bottom: .5rem; }
    .balance-amount { font-size: 2.8rem; font-weight: 800; color: #fff; line-height: 1; margin-bottom: .5rem; }
    .balance-amount span { color: #22c55e; }
    .balance-sub { font-size: .82rem; color: #444; }

    /* ── STAT CARDS ── */
    .stat-card {
      background: #0d0d0d;
      border: 1px solid #1a1a1a;
      border-radius: 16px;
      padding: 1.3rem 1.5rem;
      display: flex;
      align-items: center;
      gap: 1rem;
      transition: all .2s;
      cursor: default;
    }
    .stat-card:hover { border-color: #2a2a2a; transform: translateY(-3px); }
    .stat-icon-wrap { width: 46px; height: 46px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; flex-shrink: 0; }
    .stat-label { font-size: .68rem; letter-spacing: .1em; text-transform: uppercase; color: #444; margin-bottom: .2rem; }
    .stat-value { font-size: 1.25rem; font-weight: 800; line-height: 1; }
    .stat-sub { font-size: .72rem; color: #444; margin-top: .2rem; }

    /* ── ACTIVE INVESTMENT CARDS ── */
    .inv-card {
      background: linear-gradient(135deg, #0d1a12, #091208);
      border: 1px solid rgba(34,197,94,.15);
      border-radius: 16px;
      padding: 1.5rem;
      position: relative;
      overflow: hidden;
    }
    .inv-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: linear-gradient(90deg,#22c55e,#16a34a); }
    .inv-plan-name { font-size: 1.1rem; font-weight: 700; color: #22c55e; }
    .inv-amount { font-size: 1.6rem; font-weight: 800; color: #fff; }
    .inv-meta { font-size: .78rem; color: #555; }
    .inv-earnings { font-size: 1.4rem; font-weight: 800; color: #22c55e; font-variant-numeric: tabular-nums; }
    .inv-prog-track { height: 6px; background: #1a1a1a; border-radius: 20px; overflow: hidden; margin: .8rem 0 .3rem; }
    .inv-prog-bar { height: 100%; border-radius: 20px; background: linear-gradient(90deg,#22c55e,#16a34a); transition: width 1s ease; }
    .live-dot { width: 8px; height: 8px; border-radius: 50%; background: #22c55e; animation: pulse 2s infinite; display: inline-block; margin-right: .4rem; }
    @keyframes pulse { 0%,100% { box-shadow: 0 0 0 0 rgba(34,197,94,.5); } 70% { box-shadow: 0 0 0 8px rgba(34,197,94,0); } }

    /* ── NO INVESTMENT ── */
    .no-inv {
      background: #0a0a0a;
      border: 1px dashed #1a1a1a;
      border-radius: 16px;
      padding: 3rem 2rem;
      text-align: center;
    }
    .no-inv-icon { font-size: 3rem; color: #1a1a1a; margin-bottom: 1rem; }

    /* ── CHART CARD ── */
    .chart-card { background: #0d0d0d; border: 1px solid #1a1a1a; border-radius: 16px; padding: 1.5rem; }

    /* ── SECTION HEADER ── */
    .section-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.2rem; flex-wrap: wrap; gap: .5rem; }
    .section-title { font-size: 1rem; font-weight: 700; color: #fff; display: flex; align-items: center; gap: .5rem; }
    .section-link { font-size: .78rem; color: #22c55e; text-decoration: none; }
    .section-link:hover { color: #16a34a; }

    /* ── QUICK ACTIONS ── */
    .quick-action {
      background: #0d0d0d;
      border: 1px solid #1a1a1a;
      border-radius: 14px;
      padding: 1.2rem;
      text-align: center;
      text-decoration: none;
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: .5rem;
      transition: all .2s;
    }
    .quick-action:hover { border-color: #22c55e; background: rgba(34,197,94,.06); color: #22c55e; transform: translateY(-3px); }
    .qa-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; }
    .qa-label { font-size: .8rem; font-weight: 600; }

    /* ── RECENT TRANSACTIONS ── */
    .txn-item { display: flex; align-items: center; gap: 1rem; padding: .85rem 0; border-bottom: 1px solid #0f0f0f; }
    .txn-item:last-child { border-bottom: none; }
    .txn-icon { width: 38px; height: 38px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; }
    .txn-label { font-size: .88rem; font-weight: 600; color: #e0e0e0; }
    .txn-sub { font-size: .72rem; color: #444; margin-top: .1rem; }
    .txn-amount { font-size: .95rem; font-weight: 700; margin-left: auto; white-space: nowrap; }

    /* ── MARKET WIDGETS ── */
    .market-card { background: #0d0d0d; border: 1px solid #1a1a1a; border-radius: 16px; overflow: hidden; }
    .market-card-header { padding: 1.2rem 1.5rem; border-bottom: 1px solid #1a1a1a; font-weight: 700; font-size: .95rem; color: #fff; }

    /* ── SEND TO BALANCE BTN ── */
    .btn-claim { background: linear-gradient(135deg,#22c55e,#16a34a); border: none; color: #fff; font-weight: 700; padding: .55rem 1.2rem; border-radius: 8px; font-size: .78rem; text-transform: uppercase; letter-spacing: .05em; cursor: pointer; display: inline-flex; align-items: center; gap: .4rem; transition: all .2s; white-space: nowrap; }
    .btn-claim:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(34,197,94,.3); }
    .btn-claim:disabled { opacity: .4; cursor: not-allowed; transform: none; }

    .btn-green { background: linear-gradient(135deg,#22c55e,#16a34a); border: none; color: #fff; font-weight: 700; padding: .75rem 2rem; border-radius: 10px; text-decoration: none; display: inline-flex; align-items: center; gap: .5rem; transition: all .2s; font-size: .9rem; }
    .btn-green:hover { opacity: .9; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(34,197,94,.3); color: #fff; }

    .text-green { color: #22c55e; }
    .text-red   { color: #ef4444; }
    .text-gold  { color: #f59e0b; }
    .text-muted-custom { color: #444; }
  </style>
</head>
<body>

<button class="sidebar-toggle" id="sidebarToggle"><i class="bi bi-list"></i></button>
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar" id="sidebar">
  <a href="{{ route('user.dashboard') }}" class="sidebar-brand">
    <img src="{{ asset('images/logo.png') }}" width="55%" height="50" alt="SUNHILL Logo">
  </a>
  <nav class="mt-3">
    <ul class="nav flex-column">
      <li><a class="nav-link active" href="{{ route('user.dashboard') }}"><i class="uil uil-home"></i><span>Home</span></a></li>
      <li><a class="nav-link" href="{{ route('user.packages') }}"><i class="uil uil-package"></i><span>Packages</span></a></li>
      <li><a class="nav-link" href="{{ route('user.deposit') }}"><i class="uil uil-dollar-sign"></i><span>Deposit</span></a></li>
      <li><a class="nav-link" href="{{ route('user.withdraw') }}"><i class="uil uil-money-withdraw"></i><span>Withdraw</span></a></li>
      <li><a class="nav-link" href="{{ route('user.transactions') }}"><i class="uil uil-receipt"></i><span>Transactions</span></a></li>
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

  {{-- ── WELCOME BANNER ── --}}
  <div class="welcome-banner mb-4">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
      <div>
        <div class="welcome-name">Welcome back, {{ $user->name }} 👋</div>
        <div class="welcome-sub">Here's what's happening with your portfolio today.</div>
      </div>
      <div class="welcome-date text-end">
        <div style="font-size:.9rem;color:#888;">{{ now()->format('l') }}</div>
        <div style="font-size:.82rem;color:#444;">{{ now()->format('d M Y') }}</div>
      </div>
    </div>
  </div>

  {{-- ── TOP ROW: Balance + Stats ── --}}
  <div class="row g-3 mb-4">

    {{-- Balance --}}
    <div class="col-lg-4 col-md-6">
      <div class="balance-card h-100">
        <div class="balance-label"><i class="bi bi-wallet2 me-1"></i> Wallet Balance</div>
        <div class="balance-amount">$<span>{{ number_format($user->balance, 2) }}</span></div>
        <div class="balance-sub">Available to invest or withdraw</div>
        <div class="d-flex gap-2 mt-3">
          <a href="{{ route('user.deposit') }}" class="btn-green" style="flex:1;justify-content:center;padding:.6rem;">
            <i class="bi bi-plus-circle"></i> Deposit
          </a>
          <a href="{{ route('user.withdraw') }}" style="flex:1;background:rgba(239,68,68,.1);border:1px solid rgba(239,68,68,.2);color:#ef4444;font-weight:700;padding:.6rem;border-radius:10px;text-decoration:none;display:flex;align-items:center;justify-content:center;gap:.4rem;font-size:.9rem;transition:all .2s;"
             onmouseover="this.style.background='rgba(239,68,68,.2)'" onmouseout="this.style.background='rgba(239,68,68,.1)'">
            <i class="bi bi-arrow-up-circle"></i> Withdraw
          </a>
        </div>
      </div>
    </div>

    {{-- Stat Cards --}}
    <div class="col-lg-8 col-md-6">
      <div class="row g-3 h-100">
        <div class="col-6 col-xl-3">
          <div class="stat-card h-100">
            <div class="stat-icon-wrap" style="background:rgba(34,197,94,.1);color:#22c55e;">
              <i class="bi bi-arrow-down-circle-fill"></i>
            </div>
            <div>
              <div class="stat-label">Total Deposited</div>
              <div class="stat-value text-green">${{ number_format($totalDeposited, 2) }}</div>
              <div class="stat-sub">Approved</div>
            </div>
          </div>
        </div>
        <div class="col-6 col-xl-3">
          <div class="stat-card h-100">
            <div class="stat-icon-wrap" style="background:rgba(245,158,11,.1);color:#f59e0b;">
              <i class="bi bi-graph-up-arrow"></i>
            </div>
            <div>
              <div class="stat-label">Total Earnings</div>
              <div class="stat-value text-gold">${{ number_format($totalEarnings, 2) }}</div>
              <div class="stat-sub">Profits claimed</div>
            </div>
          </div>
        </div>
        <div class="col-6 col-xl-3">
          <div class="stat-card h-100">
            <div class="stat-icon-wrap" style="background:rgba(239,68,68,.1);color:#ef4444;">
              <i class="bi bi-arrow-up-circle-fill"></i>
            </div>
            <div>
              <div class="stat-label">Total Withdrawn</div>
              <div class="stat-value text-red">${{ number_format($totalWithdrawn, 2) }}</div>
              <div class="stat-sub">Approved</div>
            </div>
          </div>
        </div>
        <div class="col-6 col-xl-3">
          <div class="stat-card h-100">
            <div class="stat-icon-wrap" style="background:rgba(99,102,241,.1);color:#818cf8;">
              <i class="bi bi-briefcase-fill"></i>
            </div>
            <div>
              <div class="stat-label">Active Plans</div>
              <div class="stat-value" style="color:#818cf8;">{{ $activeInvestments->count() }}</div>
              <div class="stat-sub">Currently earning</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- ── QUICK ACTIONS ── --}}
  <div class="row g-3 mb-4">
    <div class="col-12">
      <div style="background:#0a0a0a;border:1px solid #1a1a1a;border-radius:16px;padding:1.2rem;">
        <div class="section-header mb-3">
          <div class="section-title"><i class="bi bi-lightning-charge-fill text-green"></i> Quick Actions</div>
        </div>
        <div class="row g-2">
          <div class="col-6 col-md-3 col-lg-2">
            <a href="{{ route('user.deposit') }}" class="quick-action">
              <div class="qa-icon" style="background:rgba(34,197,94,.1);color:#22c55e;"><i class="bi bi-plus-circle-fill"></i></div>
              <div class="qa-label">Deposit</div>
            </a>
          </div>
          <div class="col-6 col-md-3 col-lg-2">
            <a href="{{ route('user.withdraw') }}" class="quick-action">
              <div class="qa-icon" style="background:rgba(239,68,68,.1);color:#ef4444;"><i class="bi bi-cash-stack"></i></div>
              <div class="qa-label">Withdraw</div>
            </a>
          </div>
          <div class="col-6 col-md-3 col-lg-2">
            <a href="{{ route('user.packages') }}" class="quick-action">
              <div class="qa-icon" style="background:rgba(245,158,11,.1);color:#f59e0b;"><i class="bi bi-coin"></i></div>
              <div class="qa-label">Invest</div>
            </a>
          </div>
          <div class="col-6 col-md-3 col-lg-2">
            <a href="{{ route('user.transactions') }}" class="quick-action">
              <div class="qa-icon" style="background:rgba(99,102,241,.1);color:#818cf8;"><i class="bi bi-receipt"></i></div>
              <div class="qa-label">Transactions</div>
            </a>
          </div>
          <div class="col-6 col-md-3 col-lg-2">
            <a href="{{ route('profile.edit') }}" class="quick-action">
              <div class="qa-icon" style="background:rgba(14,165,233,.1);color:#38bdf8;"><i class="bi bi-person-fill"></i></div>
              <div class="qa-label">Profile</div>
            </a>
          </div>
          <div class="col-6 col-md-3 col-lg-2">
            <a href="{{ route('user.packages') }}" class="quick-action">
              <div class="qa-icon" style="background:rgba(168,85,247,.1);color:#a855f7;"><i class="bi bi-graph-up"></i></div>
              <div class="qa-label">View Plans</div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- ── ACTIVE INVESTMENTS ── --}}
  <div class="mb-4">
    <div class="section-header">
      <div class="section-title">
        <span class="live-dot"></span> Active Investments
        @if($activeInvestments->count() > 0)
          <span style="background:rgba(34,197,94,.1);border:1px solid rgba(34,197,94,.2);color:#22c55e;padding:.1rem .6rem;border-radius:20px;font-size:.72rem;font-weight:700;margin-left:.4rem;">
            {{ $activeInvestments->count() }} Running
          </span>
        @endif
      </div>
      <a href="{{ route('user.packages') }}" class="section-link">+ Buy Plan</a>
    </div>

    @if($activeInvestments->count() > 0)
      <div class="row g-3">
        @foreach($activeInvestments as $inv)
          @php
            $pct       = $inv->package->duration_days > 0
                         ? round((($inv->package->duration_days - $inv->days_remaining) / $inv->package->duration_days) * 100)
                         : 0;
            $perSecond = round($inv->daily_earning / 24 / 3600, 10);
          @endphp
          <div class="col-lg-6">
            <div class="inv-card">
              <div class="d-flex justify-content-between align-items-start mb-3" style="flex-wrap:wrap;gap:.5rem;">
                <div>
                  <div class="inv-plan-name">{{ $inv->package->name }}</div>
                  <div class="inv-meta">{{ $inv->created_at->format('d M Y') }} · {{ $inv->days_remaining }}d left</div>
                </div>
                <div class="inv-amount">${{ number_format($inv->amount, 2) }}</div>
              </div>

              <div class="row g-2 mb-3">
                <div class="col-4">
                  <div style="background:#0a0a0a;border:1px solid #1a1a1a;border-radius:10px;padding:.7rem;text-align:center;">
                    <div style="font-size:.65rem;color:#444;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.2rem;">Daily</div>
                    <div style="font-size:.95rem;font-weight:700;color:#22c55e;">${{ number_format($inv->daily_earning, 2) }}</div>
                  </div>
                </div>
                <div class="col-4">
                  <div style="background:#0a0a0a;border:1px solid #1a1a1a;border-radius:10px;padding:.7rem;text-align:center;">
                    <div style="font-size:.65rem;color:#444;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.2rem;">Pending</div>
                    <div class="inv-earnings" id="earn-{{ $inv->id }}" style="font-size:.95rem;">${{ number_format($inv->total_earned, 4) }}</div>
                  </div>
                </div>
                <div class="col-4">
                  <div style="background:#0a0a0a;border:1px solid #1a1a1a;border-radius:10px;padding:.7rem;text-align:center;">
                    <div style="font-size:.65rem;color:#444;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.2rem;">Payout</div>
                    <div style="font-size:.95rem;font-weight:700;color:#f59e0b;">${{ number_format($inv->expected_return, 2) }}</div>
                  </div>
                </div>
              </div>

              <div class="inv-prog-track">
                <div class="inv-prog-bar" data-w="{{ $pct }}" style="width:0%"></div>
              </div>
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span style="font-size:.7rem;color:#444;">{{ $pct }}% complete</span>
                <span style="font-size:.7rem;color:#444;">Ends {{ $inv->ends_at->format('d M Y') }}</span>
              </div>

              <form method="POST" action="{{ route('user.earnings.claim') }}">
                @csrf
                <input type="hidden" name="investment_id" value="{{ $inv->id }}">
                <button type="submit" class="btn-claim w-100"
                  {{ $inv->total_earned <= 0 ? 'disabled' : '' }}
                  onclick="return confirm('Send ${{ number_format($inv->total_earned, 4) }} to your wallet?')">
                  <i class="bi bi-send-fill"></i> Send to Balance
                </button>
              </form>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="no-inv">
        <div class="no-inv-icon"><i class="bi bi-briefcase"></i></div>
        <p style="color:#444;font-size:1rem;margin-bottom:.5rem;">No active investments yet.</p>
        <p style="color:#333;font-size:.85rem;margin-bottom:1.5rem;">Start investing to earn daily returns automatically.</p>
        <a href="{{ route('user.packages') }}" class="btn-green">
          <i class="bi bi-plus-circle"></i> Invest Now
        </a>
      </div>
    @endif
  </div>

  {{-- ── CHART + RECENT TRANSACTIONS ── --}}
  <div class="row g-3 mb-4">

    {{-- Portfolio chart --}}
    <div class="col-lg-7">
      <div class="chart-card h-100">
        <div class="section-header mb-3">
          <div class="section-title"><i class="bi bi-bar-chart-fill text-green"></i> Deposit History</div>
        </div>
        <canvas id="portfolioChart" style="max-height:240px;"></canvas>
      </div>
    </div>

    {{-- Recent Transactions --}}
    <div class="col-lg-5">
      <div class="chart-card h-100">
        <div class="section-header mb-2">
          <div class="section-title"><i class="bi bi-clock-history text-green"></i> Recent Activity</div>
          <a href="{{ route('user.transactions') }}" class="section-link">View all</a>
        </div>

        @if($recentTxns->count() > 0)
          @foreach($recentTxns as $txn)
            <div class="txn-item">
              <div class="txn-icon" style="background:{{ $txn->type==='deposit'?'rgba(34,197,94,.1)':($txn->type==='earning'?'rgba(245,158,11,.1)':($txn->type==='investment'?'rgba(99,102,241,.1)':'rgba(239,68,68,.1)')) }};color:{{ $txn->type==='deposit'?'#22c55e':($txn->type==='earning'?'#f59e0b':($txn->type==='investment'?'#818cf8':'#ef4444')) }};">
                <i class="bi bi-{{ $txn->type==='deposit'?'arrow-down':($txn->type==='earning'?'graph-up-arrow':($txn->type==='investment'?'coin':'arrow-up')) }}"></i>
              </div>
              <div style="flex:1;min-width:0;">
                <div class="txn-label">{{ ucfirst($txn->type) }}</div>
                <div class="txn-sub">{{ $txn->created_at->diffForHumans() }}</div>
              </div>
              <div class="txn-amount" style="color:{{ in_array($txn->type,['deposit','earning'])?'#22c55e':'#ef4444' }}">
                {{ in_array($txn->type,['deposit','earning'])?'+':'-' }}${{ number_format($txn->amount,2) }}
              </div>
            </div>
          @endforeach
        @else
          <div style="text-align:center;padding:2rem;color:#2a2a2a;">
            <i class="bi bi-receipt" style="font-size:2rem;display:block;margin-bottom:.8rem;"></i>
            <p style="margin:0;font-size:.85rem;">No transactions yet</p>
          </div>
        @endif
      </div>
    </div>
  </div>

  {{-- ── MARKET WIDGETS ── --}}
  <div class="row g-3 mb-4">
    <div class="col-lg-6">
      <div class="market-card">
        <div class="market-card-header"><i class="bi bi-graph-up me-2 text-green"></i> Live Market Overview</div>
        <div style="height:380px;">
          <div class="tradingview-widget-container" style="height:100%;">
            <div class="tradingview-widget-container__widget" style="height:100%;"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
            {"colorTheme":"dark","dateRange":"1D","showChart":false,"locale":"en","isTransparent":true,"showSymbolLogo":true,"width":"100%","height":"100%","tabs":[{"title":"Crypto","symbols":[{ "s": "NASDAQ:TSLA", "d": "Tesla" },{"s":"BITSTAMP:BTCUSD","d":"Bitcoin"},{"s":"BITSTAMP:ETHUSD","d":"Ethereum"},{"s":"BINANCE:USDTUSD","d":"USDT"},{"s":"BINANCE:BNBUSD","d":"BNB"},{"s":"BINANCE:XRPUSD","d":"XRP"},{"s":"BINANCE:SOLUSD","d":"Solana"},{"s":"BINANCE:DOGEUSD","d":"Dogecoin"}]}]}
            </script>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="market-card">
        <div class="market-card-header"><i class="bi bi-newspaper me-2 text-green"></i> Crypto News</div>
        <div style="height:380px;">
          <div class="tradingview-widget-container" style="height:100%;">
            <div class="tradingview-widget-container__widget" style="height:100%;"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>
{
  "feedMode": "symbol",
  "symbol": "NASDAQ:TSLA",
  "colorTheme": "dark",
  "isTransparent": true,
  "displayMode": "regular",
  "width": "100%",
  "height": "100%",
  "locale": "en"
}
</script>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- ── TRADING CHART ── --}}
  <div class="market-card mb-4">
    <div class="market-card-header"><i class="bi bi-activity me-2 text-green"></i> Live Trading Chart</div>
    <div style="height:400px;">
      <div class="tradingview-widget-container" style="height:100%;">
        <div class="tradingview-widget-container__widget" style="height:100%;"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
        {"width":"100%","height":"100%","symbol":"NASDAQ:TSLA","interval":"D","timezone":"Etc/UTC","theme":"dark","style":"1","locale":"en","enable_publishing":false,"hide_top_toolbar":false,"save_image":false}
        </script>
      </div>
    </div>
  </div>

</main>

<footer style="background:#000;text-align:center;padding:1.5rem;border-top:1px solid #0d0d0d;color:#222;font-size:.8rem;margin-left:260px;">
  © <span id="yr"></span> SUNHILL. All rights reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('yr').textContent = new Date().getFullYear();

// Sidebar
const st=document.getElementById('sidebarToggle'),sb=document.getElementById('sidebar'),ov=document.getElementById('sidebarOverlay');
st.addEventListener('click',()=>{sb.classList.toggle('active');ov.classList.toggle('active');});
ov.addEventListener('click',()=>{sb.classList.remove('active');ov.classList.remove('active');});
document.querySelectorAll('.nav-link').forEach(l=>l.addEventListener('click',()=>{if(window.innerWidth<=768){sb.classList.remove('active');ov.classList.remove('active');}}));

// Progress bars
document.addEventListener('DOMContentLoaded',()=>{
  document.querySelectorAll('.inv-prog-bar').forEach(b=>{
    const w=b.getAttribute('data-w')+'%';
    b.style.width='0%';
    setTimeout(()=>{b.style.width=w;},400);
  });
});

// Earnings counters
const counters = [
  @foreach($activeInvestments as $inv)
  { id: {{ $inv->id }}, base: {{ (float)$inv->total_earned }}, ps: {{ round($inv->daily_earning/24/3600, 10) }} },
  @endforeach
];
counters.forEach(c=>{
  const el = document.getElementById('earn-'+c.id);
  if (!el) return;
  let cur = c.base;
  setInterval(()=>{
    cur += c.ps;
    el.textContent = '$'+cur.toFixed(4);
  }, 1000);
});

// Portfolio chart — monthly deposits
const monthLabels = {!! json_encode($chartLabels) !!};
const monthData   = {!! json_encode($chartData) !!};

new Chart(document.getElementById('portfolioChart').getContext('2d'), {
  type: 'bar',
  data: {
    labels: monthLabels,
    datasets: [{
      label: 'Deposits ($)',
      data: monthData,
      backgroundColor: 'rgba(34,197,94,.25)',
      borderColor: '#22c55e',
      borderWidth: 2,
      borderRadius: 6,
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: { legend: { display: false } },
    scales: {
      y: { grid: { color: '#0f0f0f' }, ticks: { color: '#444', font: { size: 11 } } },
      x: { grid: { display: false }, ticks: { color: '#444', font: { size: 11 } } }
    }
  }
});

// Responsive footer margin
function fixFooter() {
  const footer = document.querySelector('footer');
  if (footer) footer.style.marginLeft = window.innerWidth <= 768 ? '0' : '260px';
}
fixFooter();
window.addEventListener('resize', fixFooter);
</script>

</body>
</html>
