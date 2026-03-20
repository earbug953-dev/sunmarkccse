<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Investment Plans - SUNHILL</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  {{-- Pusher/Echo for Reverb WebSocket --}}
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

  <style>
    * { box-sizing: border-box; }
    body { background: #000; color: #fff; font-family: 'Segoe UI', sans-serif; min-height: 100vh; margin: 0; }

    /* SIDEBAR */
    .sidebar { position: fixed; top: 0; left: 0; bottom: 0; width: 260px; background: linear-gradient(180deg,#0a0a0a,#0f0f0f); border-right: 1px solid #222; padding: 1.5rem 1rem; overflow-y: auto; z-index: 1001; }
    .sidebar-toggle { display: none; position: fixed; top: 1rem; left: 1rem; background: #f59e0b; border: none; color: #fff; padding: .75rem 1rem; border-radius: 8px; font-size: 1.25rem; cursor: pointer; z-index: 1002; }
    .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.7); z-index: 1000; }
    .sidebar-overlay.active { display: block; }
    .sidebar-brand { display: block; text-align: center; padding: 1.5rem 0 2rem; border-bottom: 1px solid #333; margin-bottom: 1.5rem; text-decoration: none; }
    .nav-link { color: #a0a0a0; padding: .85rem 1.25rem; border-radius: 8px; font-weight: 500; display: flex; align-items: center; gap: 12px; margin: .35rem 0; position: relative; overflow: hidden; transition: all .3s; }
    .nav-link::before { content: ''; position: absolute; left: 0; top: 0; width: 4px; height: 100%; background: #f59e0b; transform: scaleY(0); transform-origin: top; transition: transform .3s; }
    .nav-link:hover, .nav-link.active { background: rgba(245,158,11,.15); color: #f59e0b; }
    .nav-link:hover::before, .nav-link.active::before { transform: scaleY(1); }
    .nav-link i { font-size: 1.15rem; min-width: 24px; }
    .logout-btn { background: linear-gradient(135deg,rgba(239,68,68,.2),rgba(239,68,68,.05)); border: 1px solid rgba(239,68,68,.3); color: #ef4444; width: 100%; margin-top: 1rem; padding: .85rem 1.25rem; border-radius: 8px; font-weight: 600; display: flex; align-items: center; gap: 12px; cursor: pointer; transition: all .3s; }
    .logout-btn:hover { transform: translateX(5px); }
    .main-content { margin-left: 260px; padding: 2rem; }

    @media(max-width:768px) {
      .sidebar { left: -100%; max-width: 260px; height: 100vh; position: fixed; transition: left .3s; }
      .sidebar.active { left: 0; }
      .main-content { margin-left: 0; padding-top: 4rem; }
      .sidebar-toggle { display: block; }
    }

    /* FLASH */
    .flash { padding: 1rem 1.5rem; border-radius: 10px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: .6rem; }
    .flash.success { background: rgba(34,197,94,.12); border: 1px solid rgba(34,197,94,.3); color: #22c55e; }
    .flash.error   { background: rgba(239,68,68,.1);  border: 1px solid rgba(239,68,68,.3);  color: #ef4444; }
    .flash.warning { background: rgba(245,158,11,.1); border: 1px solid rgba(245,158,11,.3); color: #f59e0b; }

    /* PAGE HEADER */
    .page-header { text-align: center; margin-bottom: 3rem; }
    .page-header h1 { background: linear-gradient(135deg,#f59e0b,#d97706); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 2.8rem; font-weight: 800; }
    .page-header p { color: #888; font-size: 1.1rem; max-width: 600px; margin: 0 auto; }

    /* ACTIVE PLAN SECTION */
    .plan-section { background: linear-gradient(135deg,rgba(245,158,11,.06),rgba(245,158,11,.01)); border: 1px solid rgba(245,158,11,.25); border-radius: 20px; padding: 2rem; margin-bottom: 1.5rem; position: relative; overflow: hidden; }
    .plan-section::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: linear-gradient(90deg,#f59e0b,#d97706,#f59e0b); }
    .plan-header { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.5rem; }
    .plan-title-row { display: flex; align-items: center; gap: .6rem; font-size: 1.1rem; font-weight: 700; color: #f59e0b; }
    .pulse-dot { width: 10px; height: 10px; border-radius: 50%; background: #22c55e; animation: pulse 2s infinite; flex-shrink: 0; }
    @keyframes pulse { 0%,100% { box-shadow: 0 0 0 0 rgba(34,197,94,.5); } 70% { box-shadow: 0 0 0 10px rgba(34,197,94,0); } }
    .live-badge { background: rgba(34,197,94,.15); border: 1px solid rgba(34,197,94,.3); color: #22c55e; padding: .3rem .85rem; border-radius: 20px; font-size: .75rem; font-weight: 600; text-transform: uppercase; display: flex; align-items: center; gap: .4rem; }

    /* STATS */
    .stats-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 1rem; margin-bottom: 1.5rem; }
    .stat-box { background: rgba(0,0,0,.35); border: 1px solid #222; border-radius: 12px; padding: 1rem; text-align: center; transition: border-color .2s; }
    .stat-box:hover { border-color: rgba(245,158,11,.3); }
    .stat-label { font-size: .68rem; letter-spacing: .12em; text-transform: uppercase; color: #555; margin-bottom: .3rem; }
    .stat-value { font-size: 1.35rem; font-weight: 700; line-height: 1; }
    .stat-value.green { color: #22c55e; }
    .stat-value.gold  { color: #f59e0b; }
    .stat-sub { font-size: .7rem; color: #444; margin-top: .2rem; }

    /* EARNINGS TRACKER */
    .earnings-box { background: linear-gradient(135deg,rgba(34,197,94,.07),rgba(34,197,94,.02)); border: 1px solid rgba(34,197,94,.2); border-radius: 16px; padding: 1.5rem 2rem; margin-bottom: 1.5rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1.2rem; position: relative; }
    .earnings-box::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px; background: linear-gradient(90deg,#22c55e,#16a34a,#22c55e); border-radius: 16px 16px 0 0; }
    .earnings-left { display: flex; align-items: center; gap: 1.2rem; }
    .earnings-icon { width: 50px; height: 50px; border-radius: 12px; background: rgba(34,197,94,.12); border: 1px solid rgba(34,197,94,.25); display: flex; align-items: center; justify-content: center; font-size: 1.4rem; color: #22c55e; flex-shrink: 0; }
    .earnings-label { font-size: .7rem; letter-spacing: .14em; text-transform: uppercase; color: #555; margin-bottom: .2rem; }
    .earnings-amount { font-size: 2.4rem; font-weight: 800; color: #22c55e; line-height: 1; font-variant-numeric: tabular-nums; }
    .earnings-rate { font-size: .78rem; color: #555; margin-top: .25rem; }
    .earnings-rate span { color: #22c55e; font-weight: 600; }
    .earnings-note { font-size: .73rem; color: #3a3a3a; margin-top: .3rem; }

    /* WebSocket status indicator */
    .ws-status { display: inline-flex; align-items: center; gap: .35rem; font-size: .7rem; margin-top: .4rem; }
    .ws-dot { width: 7px; height: 7px; border-radius: 50%; background: #444; }
    .ws-dot.connected { background: #22c55e; animation: pulse 2s infinite; }
    .ws-dot.error { background: #ef4444; }
    .ws-text { color: #444; }
    .ws-text.connected { color: #22c55e; }

    .btn-claim { background: linear-gradient(135deg,#22c55e,#16a34a); color: #fff; font-weight: 700; padding: .9rem 1.8rem; border-radius: 10px; border: none; font-size: .88rem; text-transform: uppercase; letter-spacing: .06em; display: inline-flex; align-items: center; gap: .6rem; cursor: pointer; box-shadow: 0 4px 20px rgba(34,197,94,.25); transition: all .2s; white-space: nowrap; }
    .btn-claim:hover { transform: translateY(-2px); box-shadow: 0 8px 28px rgba(34,197,94,.35); }
    .btn-claim:disabled { opacity: .4; cursor: not-allowed; transform: none; }
    .claim-available { font-size: .72rem; color: #3a3a3a; margin-top: .4rem; text-align: center; }
    .claim-available strong { color: #22c55e; }

    /* PROGRESS */
    .progress-wrap { margin-bottom: 1.2rem; }
    .progress-labels { display: flex; justify-content: space-between; align-items: center; margin-bottom: .4rem; font-size: .78rem; color: #666; }
    .progress-labels strong { color: #f59e0b; }
    .prog-track { height: 10px; background: #111; border-radius: 20px; overflow: visible; }
    .prog-bar { height: 100%; border-radius: 20px; background: linear-gradient(90deg,#f59e0b,#d97706); position: relative; transition: width 1.2s ease; box-shadow: 0 0 12px rgba(245,158,11,.4); min-width: 14px; }
    .prog-bar::after { content: ''; position: absolute; right: -1px; top: 50%; transform: translateY(-50%); width: 14px; height: 14px; border-radius: 50%; background: #f59e0b; border: 2px solid #000; }

    /* ACTION BUTTONS */
    .action-row { display: flex; gap: .8rem; flex-wrap: wrap; margin-top: 1.2rem; }
    .btn-withdraw { background: linear-gradient(135deg,#22c55e,#16a34a); color: #fff; font-weight: 700; padding: .7rem 1.4rem; border-radius: 8px; border: none; font-size: .85rem; text-transform: uppercase; display: inline-flex; align-items: center; gap: .5rem; text-decoration: none; transition: all .2s; }
    .btn-withdraw:hover { transform: translateY(-2px); color: #fff; }
    .btn-history { background: transparent; border: 1px solid #333; color: #888; padding: .7rem 1.4rem; border-radius: 8px; font-size: .85rem; text-transform: uppercase; display: inline-flex; align-items: center; gap: .5rem; text-decoration: none; transition: all .2s; }
    .btn-history:hover { border-color: #f59e0b; color: #f59e0b; }

    /* NO PLAN */
    .no-plan { background: rgba(0,0,0,.3); border: 1px dashed #2a2a2a; border-radius: 16px; padding: 2.5rem; text-align: center; margin-bottom: 2rem; }
    .no-plan .icon { font-size: 3rem; color: #2a2a2a; margin-bottom: 1rem; }
    .no-plan p { color: #444; margin: 0; }

    /* BALANCE */
    .balance-box { background: linear-gradient(135deg,#1a1a1a,#0f0f0f); border: 1px solid #2a2a2a; border-radius: 16px; padding: 2rem; text-align: center; margin-bottom: 2rem; }
    .balance-label { color: #666; font-size: .85rem; letter-spacing: .1em; text-transform: uppercase; margin-bottom: .5rem; }
    .balance-amount { font-size: 2.8rem; font-weight: 800; background: linear-gradient(135deg,#f59e0b,#d97706); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .balance-sub { color: #444; font-size: .8rem; margin-top: .4rem; }

    /* RUNNING BADGE */
    .running-badge { display: inline-flex; align-items: center; gap: .5rem; background: rgba(34,197,94,.1); border: 1px solid rgba(34,197,94,.25); color: #22c55e; padding: .4rem 1rem; border-radius: 20px; font-size: .8rem; font-weight: 600; margin-bottom: 1.5rem; }

    /* DIVIDER */
    .divider { display: flex; align-items: center; gap: 1rem; margin: 2rem 0; }
    .divider-line { flex: 1; height: 1px; background: #1a1a1a; }
    .divider-label { font-size: .78rem; letter-spacing: .18em; text-transform: uppercase; color: #444; white-space: nowrap; padding: .35rem .9rem; background: #0a0a0a; border: 1px solid #1a1a1a; border-radius: 20px; }

    /* PLAN CARDS */
    .plan-card { background: linear-gradient(135deg,#111,#1a1a1a); border: 2px solid #2a2a2a; border-radius: 16px; padding: 2rem 1.8rem; position: relative; overflow: hidden; display: flex; flex-direction: column; height: 100%; transition: all .3s; }
    .plan-card::before { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg,transparent,rgba(245,158,11,.08),transparent); transition: left .5s; }
    .plan-card:hover::before { left: 100%; }
    .plan-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(245,158,11,.15); border-color: #f59e0b; }
    .plan-card.featured { border-color: #f59e0b; background: linear-gradient(135deg,rgba(245,158,11,.1),rgba(245,158,11,.04)); }
    .plan-card.active-card { border-color: #22c55e; background: linear-gradient(135deg,rgba(34,197,94,.08),rgba(34,197,94,.02)); }
    .card-badge { position: absolute; top: 16px; right: 16px; padding: .4rem .9rem; border-radius: 6px; font-size: .8rem; font-weight: 600; }
    .card-badge.gold-badge   { background: linear-gradient(135deg,#f59e0b,#d97706); color: #000; }
    .card-badge.active-badge { background: linear-gradient(135deg,#22c55e,#16a34a); color: #fff; }
    .card-name { font-size: 1.6rem; font-weight: 700; color: #fff; margin-bottom: 1.2rem; }
    .card-name i { color: #f59e0b; margin-right: .4rem; }
    .card-detail { font-size: .95rem; color: #888; margin-bottom: .85rem; display: flex; align-items: flex-start; gap: .6rem; line-height: 1.4; }
    .card-detail i { color: #f59e0b; min-width: 20px; margin-top: 2px; }
    .card-detail.highlight { color: #f59e0b; font-weight: 600; font-size: 1.05rem; }
    .form-control-dark { background: #111; border: 1px solid #333; color: #fff; border-radius: 8px; padding: .85rem 1.1rem; font-size: .95rem; width: 100%; transition: border-color .2s; }
    .form-control-dark:focus { border-color: #f59e0b; outline: none; box-shadow: 0 0 0 3px rgba(245,158,11,.15); }
    .form-control-dark::placeholder { color: #444; }
    .btn-invest-now { background: linear-gradient(135deg,#f59e0b,#d97706); color: #000; font-weight: 700; padding: .95rem; border-radius: 8px; border: none; width: 100%; text-transform: uppercase; letter-spacing: .04em; font-size: .95rem; cursor: pointer; transition: all .2s; }
    .btn-invest-now:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(245,158,11,.3); }
    .input-hint { font-size: .75rem; color: #555; margin-top: .4rem; }

    /* CONFIRM MODAL */
    .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.85); z-index: 9999; align-items: center; justify-content: center; backdrop-filter: blur(4px); }
    .modal-overlay.show { display: flex; }
    .modal-box { background: #141414; border: 1px solid rgba(245,158,11,.3); border-radius: 20px; padding: 2.5rem; max-width: 440px; width: 90%; position: relative; }
    .modal-box::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: linear-gradient(90deg,#f59e0b,#d97706); border-radius: 20px 20px 0 0; }
    .modal-icon { width: 56px; height: 56px; border-radius: 14px; background: rgba(245,158,11,.1); display: flex; align-items: center; justify-content: center; font-size: 1.6rem; margin: 0 auto 1.2rem; }
    .modal-title { font-size: 1.3rem; font-weight: 700; text-align: center; margin-bottom: .5rem; }
    .modal-body { font-size: .88rem; color: #777; text-align: center; line-height: 1.7; margin-bottom: 1.2rem; }
    .modal-body strong { color: #f59e0b; }
    .modal-warn { background: rgba(245,158,11,.07); border: 1px solid rgba(245,158,11,.2); border-radius: 10px; padding: .8rem 1rem; font-size: .82rem; color: #f59e0b; text-align: center; margin-bottom: 1.5rem; }
    .modal-btns { display: flex; gap: .8rem; }
    .modal-cancel { flex: 1; background: transparent; border: 1px solid #2a2a2a; color: #777; padding: .8rem; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all .2s; }
    .modal-cancel:hover { border-color: #555; color: #fff; }
    .modal-confirm { flex: 2; background: linear-gradient(135deg,#f59e0b,#d97706); border: none; color: #000; padding: .8rem; border-radius: 8px; font-weight: 700; cursor: pointer; text-transform: uppercase; }

    /* PAGINATION */
    .pagination-compact .page-link { min-width: 36px; height: 36px; background: #1a1a1a; border: 1px solid #333; color: #777; border-radius: 6px !important; margin: 0 3px; font-weight: 500; display: flex; align-items: center; justify-content: center; }
    .pagination-compact .page-item.active .page-link { background: linear-gradient(135deg,#f59e0b,#d97706); border-color: #f59e0b; color: #000; }
    .pagination-compact .page-link:hover { background: #222; color: #f59e0b; border-color: #f59e0b; }

    @media(max-width:768px) { .stats-grid { grid-template-columns: repeat(2,1fr); } .earnings-box { flex-direction: column; } }
  </style>
</head>
<body>

{{-- CONFIRM MODAL --}}
<div class="modal-overlay" id="confirmModal">
  <div class="modal-box">
    <div class="modal-icon">⚠️</div>
    <div class="modal-title">You Have Active Plans</div>
    <div class="modal-body">
      You already have <strong id="modal-count">—</strong> active plan(s) running.<br>
      This new plan runs <strong>alongside</strong> them — each earns independently.
    </div>
    <div class="modal-warn">
      <i class="bi bi-info-circle me-1"></i>
      Your existing plans will <strong>not be cancelled</strong>.
    </div>
    <div class="modal-btns">
      <button class="modal-cancel" onclick="closeModal()">Cancel</button>
      <button class="modal-confirm" onclick="submitForm()">
        <i class="bi bi-play-circle me-1"></i> Yes, Invest Now
      </button>
    </div>
  </div>
</div>

<button class="sidebar-toggle" id="sidebarToggle"><i class="bi bi-list"></i></button>
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar" id="sidebar">
  <a href="{{ route('user.dashboard') }}" class="sidebar-brand">
    <img src="{{ asset('images/logo.png') }}" width="50%" height="50" alt="SUNHILL">
  </a>
  <nav class="mt-4">
    <ul class="nav flex-column">
      <li><a class="nav-link" href="{{ route('user.dashboard') }}"><i class="uil uil-home"></i><span>Home</span></a></li>
      <li><a class="nav-link active" href="{{ route('user.packages') }}"><i class="uil uil-package"></i><span>Packages</span></a></li>
      <li><a class="nav-link" href="{{ route('user.deposit') }}"><i class="uil uil-dollar-sign"></i><span>Deposit</span></a></li>
      <li><a class="nav-link" href="{{ route('user.withdraw') }}"><i class="uil uil-money-withdraw"></i><span>Withdraw</span></a></li>
      <li><a class="nav-link" href="{{ route('user.transactions') }}"><i class="uil uil-receipt"></i><span>Transactions</span></a></li>
      <li><a class="nav-link" href="{{ route('profile.edit') }}"><i class="uil uil-user"></i><span>Profile</span></a></li>
      <form method="POST" action="{{ url('/logout') }}" style="display:contents">
        @csrf
        <button type="submit" class="logout-btn" onclick="return confirm('Logout?')">
          <i class="bi bi-box-arrow-right"></i><span>Logout</span>
        </button>
      </form>
    </ul>
  </nav>
</aside>

<main class="main-content">

  @if(session('success'))
    <div class="flash success"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
  @endif
  @if(session('warning'))
    <div class="flash warning"><i class="bi bi-exclamation-triangle-fill"></i> {{ session('warning') }}</div>
  @endif
  @if($errors->any())
    <div class="flash error"><i class="bi bi-exclamation-circle-fill"></i> {{ $errors->first() }}</div>
  @endif

  <div class="container-xl px-0">
    <div class="page-header">
      <h1><i class="bi bi-briefcase-fill"></i> Investment Plans</h1>
      <p>Make your money work for you. Invest and earn daily returns automatically.</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-xl-11">

        @if(isset($activeInvestments) && $activeInvestments->count() > 0)

          <div class="running-badge">
            <div class="pulse-dot"></div>
            {{ $activeInvestments->count() }} Active Plan{{ $activeInvestments->count() > 1 ? 's' : '' }} Running
          </div>

          @foreach($activeInvestments as $inv)
            @php
              $daysTotal = $inv->package->duration_days;
              $daysLeft  = $inv->days_remaining;
              $daysDone  = max(0, $daysTotal - $daysLeft);
              $pct       = $daysTotal > 0 ? round(($daysDone / $daysTotal) * 100) : 0;
              $perSecond = round($inv->daily_earning / 24 / 3600, 10);
            @endphp

            <div class="plan-section">
              <div class="plan-header">
                <div class="plan-title-row">
                  <div class="pulse-dot"></div>
                  <i class="bi bi-lightning-charge-fill" style="color:#f59e0b;"></i>
                  {{ $inv->package->name }}
                  <span style="color:#444;font-size:.8rem;font-weight:400;">&nbsp;·&nbsp; #{{ $inv->id }}</span>
                </div>
                <div class="live-badge">
                  <i class="bi bi-circle-fill" style="font-size:.45rem;"></i> Live
                </div>
              </div>

              <div class="d-flex align-items-center gap-2 mb-3" style="flex-wrap:wrap;">
                <span style="font-size:1.7rem;font-weight:800;color:#f59e0b;">${{ number_format($inv->amount, 2) }}</span>
                <span style="background:rgba(245,158,11,.1);border:1px solid rgba(245,158,11,.2);color:#f59e0b;padding:.25rem .8rem;border-radius:6px;font-size:.78rem;font-weight:600;">invested</span>
              </div>

              <div class="stats-grid">
                <div class="stat-box">
                  <div class="stat-label">Daily Earning</div>
                  <div class="stat-value green">${{ number_format($inv->daily_earning, 2) }}</div>
                  <div class="stat-sub">{{ $inv->package->daily_return }}% per day</div>
                </div>
                <div class="stat-box">
                  <div class="stat-label">Hourly Earning</div>
                  <div class="stat-value green">${{ number_format($inv->daily_earning / 24, 4) }}</div>
                  <div class="stat-sub">Every hour</div>
                </div>
                <div class="stat-box">
                  <div class="stat-label">Days Left</div>
                  <div class="stat-value">{{ $inv->days_remaining }}</div>
                  <div class="stat-sub">of {{ $daysTotal }} days</div>
                </div>
                <div class="stat-box">
                  <div class="stat-label">Final Payout</div>
                  <div class="stat-value gold">${{ number_format($inv->expected_return, 2) }}</div>
                  <div class="stat-sub">{{ $inv->package->total_return }}% total</div>
                </div>
              </div>

              {{-- EARNINGS TRACKER --}}
              <div class="earnings-box">
                <div class="earnings-left">
                  <div class="earnings-icon"><i class="bi bi-graph-up-arrow"></i></div>
                  <div>
                    <div class="earnings-label">Pending Earnings — Ready to Claim</div>

                    {{-- This number comes from DB on page load --}}
                    {{-- Reverb updates it in real time every minute --}}
                    {{-- Visual counter fills the gap every second --}}
                    <div class="earnings-amount" id="earn-{{ $inv->id }}">
                      ${{ number_format($inv->total_earned, 4) }}
                    </div>

                    <div class="earnings-rate">
                      +<span>${{ number_format($perSecond, 6) }}</span> per second
                      &nbsp;·&nbsp;
                      +<span>${{ number_format($inv->daily_earning / 24, 4) }}</span> per hour
                    </div>

                    {{-- WebSocket connection status --}}
                    <div class="ws-status" id="ws-status-{{ $inv->id }}">
                      <div class="ws-dot" id="ws-dot-{{ $inv->id }}"></div>
                      <span class="ws-text" id="ws-text-{{ $inv->id }}">Connecting...</span>
                    </div>

                    <div class="earnings-note">
                      <i class="bi bi-info-circle me-1"></i>
                      Real-time via WebSocket. Saved to database every minute.
                    </div>
                  </div>
                </div>

                <div>
                  <form method="POST" action="{{ route('user.earnings.claim') }}">
                    @csrf
                    <input type="hidden" name="investment_id" value="{{ $inv->id }}">
                    <button type="submit" class="btn-claim"
                      id="claim-btn-{{ $inv->id }}"
                      {{ $inv->total_earned <= 0 ? 'disabled' : '' }}
                      onclick="return confirm('Move earnings to your wallet?')">
                      <i class="bi bi-send-fill"></i> Send to Balance
                    </button>
                  </form>
                  <div class="claim-available">
                    Available: <strong id="earn-avail-{{ $inv->id }}">${{ number_format($inv->total_earned, 4) }}</strong>
                  </div>
                </div>
              </div>

              <div class="progress-wrap">
                <div class="progress-labels">
                  <span>Started: <strong style="color:#fff;">{{ $inv->created_at->format('d M Y') }}</strong></span>
                  <strong>Day {{ $daysDone }} of {{ $daysTotal }}</strong>
                  <span>Ends: <strong style="color:#fff;">{{ $inv->ends_at->format('d M Y') }}</strong></span>
                </div>
                <div class="prog-track">
                  <div class="prog-bar" data-width="{{ $pct }}" style="width:0%"></div>
                </div>
                <div style="text-align:right;margin-top:.3rem;">
                  <small style="color:#444;font-size:.72rem;">{{ $pct }}% complete</small>
                </div>
              </div>

              <div class="action-row">
                <a href="{{ route('user.withdraw') }}" class="btn-withdraw">
                  <i class="bi bi-cash-stack"></i> Withdraw from Wallet
                </a>
                <a href="{{ route('user.transactions') }}" class="btn-history">
                  <i class="bi bi-receipt"></i> History
                </a>
              </div>
            </div>
          @endforeach

        @else
          <div class="no-plan">
            <div class="icon"><i class="bi bi-bar-chart-line"></i></div>
            <p style="font-size:1rem;margin-bottom:.4rem;">No active investment plans yet.</p>
            <p>Choose a plan below to start earning. 👇</p>
          </div>
        @endif

        <div class="balance-box">
          <div class="balance-label"><i class="bi bi-wallet2 me-2"></i>Wallet Balance</div>
          <div class="balance-amount">${{ number_format($user->balance, 2) }}</div>
          <div class="balance-sub">Send earnings here, then withdraw anytime</div>
        </div>

        <div class="divider">
          <div class="divider-line"></div>
          <div class="divider-label">
            <i class="bi bi-plus-circle me-1"></i>
            {{ isset($activeInvestments) && $activeInvestments->count() > 0 ? 'Buy Another Plan' : 'Choose a Plan' }}
          </div>
          <div class="divider-line"></div>
        </div>

        <div class="row g-4 mb-5">
          @forelse($packages as $package)
            @php
              $isActive    = isset($activeInvestments) && $activeInvestments->where('package_id',$package->id)->count() > 0;
              $hasAny      = isset($activeInvestments) && $activeInvestments->count() > 0;
              $activeCount = $hasAny ? $activeInvestments->count() : 0;
            @endphp
            <div class="col-lg-6 col-xl-3">
              <div class="plan-card {{ $loop->iteration==3 && !$isActive ? 'featured':'' }} {{ $isActive ? 'active-card':'' }}">
                @if($isActive)
                  <span class="card-badge active-badge"><i class="bi bi-check-circle-fill me-1"></i>Active</span>
                @elseif($loop->iteration==3)
                  <span class="card-badge gold-badge"><i class="bi bi-star-fill me-1"></i>Popular</span>
                @endif

                <div class="card-name"><i class="bi bi-coin"></i>{{ $package->name }}</div>
                <div style="flex-grow:1;margin-bottom:1.2rem;">
                  <div class="card-detail"><i class="bi bi-graph-up"></i><span>${{ number_format($package->min_investment) }} – {{ $package->max_investment ? '$'.number_format($package->max_investment) : 'Unlimited' }}</span></div>
                  <div class="card-detail"><i class="bi bi-percent"></i><span>{{ $package->daily_return }}% daily · {{ $package->duration_days }} days</span></div>
                  <div class="card-detail highlight"><i class="bi bi-trophy-fill"></i><span>{{ $package->total_return }}% total return</span></div>
                  @if($package->description)
                    <div class="card-detail" style="font-size:.85rem;"><i class="bi bi-info-circle"></i><span>{{ $package->description }}</span></div>
                  @endif
                </div>

                <form method="POST" action="{{ route('user.invest',$package->id) }}" id="form-{{ $package->id }}">
                  @csrf
                  <div style="margin-bottom:.8rem;">
                    <input type="number" name="amount" class="form-control-dark"
                           placeholder="Amount (Min: ${{ number_format($package->min_investment) }})"
                           min="{{ $package->min_investment }}" max="{{ $package->max_investment ?? '' }}"
                           step="0.01" required>
                    <div class="input-hint">Min: ${{ number_format($package->min_investment) }}@if($package->max_investment) · Max: ${{ number_format($package->max_investment) }}@endif</div>
                  </div>
                  @if($hasAny)
                    <button type="button" class="btn-invest-now" onclick="showModal('{{ $package->id }}',{{ $activeCount }})">
                      <i class="bi bi-play-circle me-1"></i> {{ $isActive ? 'Buy Again' : 'Invest Now' }}
                    </button>
                  @else
                    <button type="submit" class="btn-invest-now">
                      <i class="bi bi-play-circle me-1"></i> Invest Now
                    </button>
                  @endif
                </form>
              </div>
            </div>
          @empty
            <div class="col-12 text-center py-5" style="color:#444;">
              <i class="bi bi-inbox" style="font-size:3rem;"></i>
              <p class="mt-3">No packages available.</p>
            </div>
          @endforelse
        </div>

        @if($packages->hasPages())
          <div class="d-flex justify-content-center mt-4 mb-5">
            <div class="pagination-compact">{{ $packages->links('pagination::bootstrap-5') }}</div>
          </div>
        @endif

      </div>
    </div>
  </div>
</main>

<footer style="background:#000;text-align:center;padding:1.5rem;border-top:1px solid #111;color:#333;font-size:.82rem;">
  <span id="yr"></span> &copy; SUNHILL. All rights reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('yr').textContent = new Date().getFullYear();

// SIDEBAR
const toggle  = document.getElementById('sidebarToggle');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('sidebarOverlay');
toggle.addEventListener('click',  () => { sidebar.classList.toggle('active'); overlay.classList.toggle('active'); });
overlay.addEventListener('click', () => { sidebar.classList.remove('active'); overlay.classList.remove('active'); });
document.querySelectorAll('.nav-link').forEach(l => l.addEventListener('click', () => {
  if (window.innerWidth <= 768) { sidebar.classList.remove('active'); overlay.classList.remove('active'); }
}));

// PROGRESS BARS
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.prog-bar').forEach(bar => {
    const w = bar.getAttribute('data-width') + '%';
    bar.style.width = '0%';
    setTimeout(() => { bar.style.width = w; }, 400);
  });
});

// CONFIRM MODAL
let pendingForm = null;
function showModal(pkgId, count) {
  const form   = document.getElementById('form-' + pkgId);
  const amount = form.querySelector('input[name="amount"]');
  if (!amount.value || parseFloat(amount.value) <= 0) {
    amount.focus();
    amount.style.borderColor = '#ef4444';
    setTimeout(() => amount.style.borderColor = '#333', 2000);
    return;
  }
  pendingForm = pkgId;
  document.getElementById('modal-count').textContent = count;
  document.getElementById('confirmModal').classList.add('show');
}
function closeModal() { document.getElementById('confirmModal').classList.remove('show'); pendingForm = null; }
function submitForm() { if (pendingForm) document.getElementById('form-' + pendingForm).submit(); }
document.getElementById('confirmModal').addEventListener('click', e => {
  if (e.target === document.getElementById('confirmModal')) closeModal();
});

// ════════════════════════════════════════════════════════════
// REAL-TIME EARNINGS — Reverb WebSocket + visual counter
//
// Flow:
//  1. Page loads → display reads real total_earned from DB
//  2. Visual counter ticks every second (smooth display)
//  3. Cron runs every minute → DB total_earned += perMinute
//                            → broadcasts real value via Reverb
//  4. Reverb delivers real DB value to browser instantly
//  5. Counter snaps to real DB value silently
//  6. User refreshes → always shows real DB value (never 0)
//  7. User offline → DB still grows via cron, counter ticks locally
// ════════════════════════════════════════════════════════════

const userId = {{ auth()->id() }};

// Investment data from DB
const investments = [
  @foreach($activeInvestments ?? [] as $inv)
  {
    id:        {{ $inv->id }},
    fromDB:    {{ (float) $inv->total_earned }},
    perSecond: {{ round($inv->daily_earning / 24 / 3600, 10) }}
  },
  @endforeach
];

// ── Setup Pusher (Reverb uses Pusher protocol) ──
const pusher = new Pusher('{{ env("REVERB_APP_KEY") }}', {
  wsHost:            '{{ env("REVERB_HOST", "localhost") }}',
  wsPort:            {{ env("REVERB_PORT", 8080) }},
  wssPort:           {{ env("REVERB_PORT", 8080) }},
  forceTLS:          false,
  enabledTransports: ['ws'],
  cluster:           'mt1',

  // Authorize private channel
  authorizer: (channel) => ({
    authorize: (socketId, callback) => {
      fetch('/broadcasting/auth', {
        method:  'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({
          socket_id:    socketId,
          channel_name: channel.name,
        }),
      })
      .then(r => r.json())
      .then(data => callback(null, data))
      .catch(err => callback(err));
    }
  })
});

// ── Subscribe to private earnings channel ──
const channel = pusher.subscribe('private-earnings.' + userId);

// Update WS status dots
pusher.connection.bind('connected', () => {
  investments.forEach(inv => {
    const dot  = document.getElementById('ws-dot-'  + inv.id);
    const text = document.getElementById('ws-text-' + inv.id);
    if (dot)  { dot.classList.add('connected'); }
    if (text) { text.textContent = 'Real-time connected'; text.classList.add('connected'); }
  });
});

pusher.connection.bind('disconnected', () => {
  investments.forEach(inv => {
    const dot  = document.getElementById('ws-dot-'  + inv.id);
    const text = document.getElementById('ws-text-' + inv.id);
    if (dot)  { dot.classList.remove('connected'); dot.classList.add('error'); }
    if (text) { text.textContent = 'Offline — using local counter'; text.classList.remove('connected'); }
  });
});

// ── Start a counter per investment ──
investments.forEach(inv => {
  const display  = document.getElementById('earn-'       + inv.id);
  const avail    = document.getElementById('earn-avail-' + inv.id);
  const claimBtn = document.getElementById('claim-btn-'  + inv.id);

  if (!display) return;

  // Start from real DB value — NEVER from 0
  let current = inv.fromDB;

  // Visual tick every second
  setInterval(() => {
    current += inv.perSecond;
    const fmt = '$' + current.toFixed(4);
    display.textContent = fmt;
    if (avail) avail.textContent = fmt;
    // Enable claim button once earnings > 0
    if (claimBtn && current > 0) claimBtn.disabled = false;
  }, 1000);

  // Listen for real DB value broadcast from server (every minute via cron)
  // When received — silently snap counter to real DB value
  channel.bind('earnings.tick', (data) => {
    if (data.investment_id === inv.id) {
      // Sync to real DB value — counter continues from here
      current = parseFloat(data.total_earned);
      const fmt = '$' + current.toFixed(4);
      display.textContent = fmt;
      if (avail) avail.textContent = fmt;
    }
  });
});
</script>

</body>
</html>
