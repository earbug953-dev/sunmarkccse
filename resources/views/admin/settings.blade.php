<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>System Settings - TESLA Admin</title>
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
    .nav-link::before { content: ''; position: absolute; left: 0; top: 0; width: 4px; height: 100%; background: #ef4444; transform: scaleY(0); transform-origin: top; transition: transform .3s; }
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

    .card-dark { background: #111; border: 1px solid #333; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,.5); }
    .form-control-dark { background: #1a1a1a; border: 1px solid #444; color: #fff; border-radius: 8px; }
    .form-control-dark:focus { border-color: #ef4444; box-shadow: 0 0 0 .25rem rgba(239,68,68,.25); color: #fff; background: #1a1a1a; }
    .form-control-dark::placeholder { color: #555; }
    .form-select-dark { background: #1a1a1a; border: 1px solid #444; color: #fff; border-radius: 8px; }
    .form-select-dark:focus { border-color: #ef4444; box-shadow: 0 0 0 .25rem rgba(239,68,68,.25); color: #fff; }
    .form-check-input:checked { background-color: #ef4444; border-color: #ef4444; }
    .btn-save { background: #ef4444; border: none; padding: .75rem 1.5rem; font-weight: 600; color: white; }
    .btn-save:hover { background: #dc2626; color: white; }

    /* Tabs */
    .nav-tabs { border-bottom: 1px solid #222; }
    .nav-tabs .nav-link { color: #666; padding: .75rem 1.25rem; border: none; border-bottom: 3px solid transparent; margin: 0; background: transparent; border-radius: 0; }
    .nav-tabs .nav-link:hover { background: transparent; color: #fff; border-bottom-color: rgba(239,68,68,.4); padding-left: 1.25rem; }
    .nav-tabs .nav-link.active { background: transparent; color: #ef4444; border-bottom-color: #ef4444; font-weight: 600; }

    /* Gateway cards */
    .gateway-card { background: #0d0d0d; border: 1px solid #2a2a2a; border-radius: 14px; padding: 1.4rem; margin-bottom: 1rem; position: relative; transition: border-color .2s; }
    .gateway-card:hover { border-color: #444; }
    .gateway-card.gw-active { border-color: rgba(34,197,94,.3); }
    .gw-symbol { width: 44px; height: 44px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: .85rem; flex-shrink: 0; }
    .gw-name { font-weight: 700; font-size: 1rem; color: #fff; }
    .gw-network { font-size: .75rem; color: #555; }
    .gw-address { font-size: .78rem; color: #888; font-family: monospace; background: #111; border: 1px solid #222; border-radius: 6px; padding: .4rem .7rem; margin-top: .5rem; word-break: break-all; }
    .gw-status-on  { background: rgba(34,197,94,.12); border: 1px solid rgba(34,197,94,.25); color: #22c55e; padding: .2rem .7rem; border-radius: 20px; font-size: .72rem; font-weight: 600; }
    .gw-status-off { background: rgba(107,114,128,.12); border: 1px solid rgba(107,114,128,.25); color: #6b7280; padding: .2rem .7rem; border-radius: 20px; font-size: .72rem; font-weight: 600; }
    .gw-actions { display: flex; gap: .5rem; flex-wrap: wrap; margin-top: .8rem; }

    .flash-success { background: rgba(34,197,94,.12); border: 1px solid rgba(34,197,94,.3); color: #22c55e; padding: 1rem 1.5rem; border-radius: 10px; margin-bottom: 1.5rem; }
    .flash-error   { background: rgba(239,68,68,.1); border: 1px solid rgba(239,68,68,.3); color: #ef4444; padding: 1rem 1.5rem; border-radius: 10px; margin-bottom: 1.5rem; }

    .add-gateway-btn { background: linear-gradient(135deg,#22c55e,#16a34a); border: none; color: #fff; font-weight: 700; padding: .7rem 1.4rem; border-radius: 10px; display: inline-flex; align-items: center; gap: .5rem; cursor: pointer; }
    .add-gateway-btn:hover { opacity: .9; transform: translateY(-1px); }
    .empty-gateways { background: rgba(0,0,0,.3); border: 1px dashed #2a2a2a; border-radius: 12px; padding: 2.5rem; text-align: center; color: #444; }
  </style>
</head>
<body>

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
        <li class="nav-item"><a href="{{ route('admin.packages') }}" class="nav-link"><i class="bi bi-bag-check"></i><span>Plans / Packages</span></a></li>
      </div>
      <div class="sidebar-section">
        <div class="sidebar-section-title">Analytics</div>
        <li class="nav-item"><a href="{{ route('admin.transactions') }}" class="nav-link"><i class="bi bi-receipt"></i><span>Transactions</span></a></li>
        <li class="nav-item"><a href="{{ route('admin.reports') }}" class="nav-link"><i class="bi bi-graph-up"></i><span>Reports</span></a></li>
      </div>
      <div class="sidebar-section">
        <div class="sidebar-section-title">System</div>
        <li class="nav-item"><a href="{{ route('admin.settings') }}" class="nav-link active"><i class="bi bi-gear-fill"></i><span>Settings</span></a></li>
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

    <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
      <h1 class="display-5 fw-bold mb-0">
        <i class="bi bi-gear-fill me-2 text-danger"></i> System Settings
      </h1>
      <span class="text-secondary">{{ now()->format('F d, Y') }}</span>
    </div>

    {{-- Flash messages --}}
    @if(session('success'))
      <div class="flash-success"><i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}</div>
    @endif
    @if($errors->any())
      <div class="flash-error"><i class="bi bi-exclamation-circle-fill me-2"></i> {{ $errors->first() }}</div>
    @endif

    <div class="card card-dark shadow-lg">
      <div class="card-body p-4 p-lg-5">

        {{-- Tabs --}}
        <ul class="nav nav-tabs mb-5" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active fw-semibold fs-5" data-bs-toggle="tab" data-bs-target="#general" type="button">
              <i class="bi bi-house-fill me-2"></i> General
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold fs-5" data-bs-toggle="tab" data-bs-target="#payments" type="button">
              <i class="bi bi-wallet2 me-2"></i> Payment Gateways
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold fs-5" data-bs-toggle="tab" data-bs-target="#security" type="button">
              <i class="bi bi-shield-fill me-2"></i> Security
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold fs-5" data-bs-toggle="tab" data-bs-target="#email" type="button">
              <i class="bi bi-envelope-fill me-2"></i> Email / SMTP
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold fs-5" data-bs-toggle="tab" data-bs-target="#maintenance" type="button">
              <i class="bi bi-tools me-2"></i> Maintenance
            </button>
          </li>
        </ul>

        <div class="tab-content">

          {{-- ══ GENERAL TAB ══ --}}
          <div class="tab-pane fade show active" id="general" role="tabpanel">
            <form action="{{ route('admin.settings.update') }}" method="POST">
              @csrf @method('PUT')
              <div class="row g-4">
                <div class="col-md-6">
                  <label class="form-label fw-semibold"><i class="bi bi-file-text me-2"></i>Site Name</label>
                  <input type="text" class="form-control form-control-lg form-control-dark" name="name" value="{{ $user->name ?? '' }}" placeholder="Your Site Name">
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold"><i class="bi bi-person-fill me-2"></i>Username</label>
                  <input type="text" class="form-control form-control-lg form-control-dark" name="username" value="{{ $user->username ?? '' }}" placeholder="Admin Username">
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold"><i class="bi bi-globe me-2"></i>Site URL</label>
                  <input type="url" class="form-control form-control-lg form-control-dark" name="site_url" value="{{ $user->site_url ?? '' }}" placeholder="https://example.com">
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold"><i class="bi bi-envelope-fill me-2"></i>Support Email</label>
                  <input type="email" class="form-control form-control-lg form-control-dark" name="email" value="{{ $user->email ?? '' }}" placeholder="support@example.com">
                </div>
                <div class="col-12 text-end mt-4">
                  <button type="submit" class="btn btn-save btn-lg px-5 fw-bold">
                    <i class="bi bi-check-circle me-2"></i> Save General Settings
                  </button>
                </div>
              </div>
            </form>
          </div>

          {{-- ══ PAYMENT GATEWAYS TAB ══ --}}
          <div class="tab-pane fade" id="payments" role="tabpanel">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
              <div>
                <h5 class="fw-bold mb-1"><i class="bi bi-wallet2 me-2 text-warning"></i>Payment Gateways</h5>
                <p class="text-secondary mb-0" style="font-size:.85rem;">
                  {{ $gateways->count() }} gateway{{ $gateways->count() !== 1 ? 's' : '' }} configured
                  · {{ $gateways->where('active',true)->count() }} active
                </p>
              </div>
              <button class="add-gateway-btn" data-bs-toggle="modal" data-bs-target="#addGatewayModal">
                <i class="bi bi-plus-circle"></i> Add New Gateway
              </button>
            </div>

            {{-- Gateway list from DB --}}
            @if($gateways->count() > 0)
              @foreach($gateways as $gw)
                <div class="gateway-card {{ $gw->active ? 'gw-active' : '' }}">
                  <div class="d-flex align-items-center gap-3 mb-2" style="flex-wrap:wrap;">

                    {{-- Symbol badge --}}
                    <div class="gw-symbol" style="background:{{ match(strtoupper($gw->symbol ?? '')) {
                      'BTC'  => 'rgba(247,147,26,.15)',
                      'ETH'  => 'rgba(98,126,234,.15)',
                      'USDT' => 'rgba(38,161,123,.15)',
                      'XRP'  => 'rgba(0,153,168,.15)',
                      'BNB'  => 'rgba(243,186,47,.15)',
                      'LTC'  => 'rgba(191,191,191,.15)',
                      default => 'rgba(100,100,100,.15)'
                    } }};color:{{ match(strtoupper($gw->symbol ?? '')) {
                      'BTC'  => '#f7931a',
                      'ETH'  => '#627eea',
                      'USDT' => '#26a17b',
                      'XRP'  => '#0099a8',
                      'BNB'  => '#f3ba2f',
                      'LTC'  => '#bfbfbf',
                      default => '#888'
                    } }};">
                      {{ strtoupper($gw->symbol ?? '?') }}
                    </div>

                    <div style="flex:1;">
                      <div class="d-flex align-items-center gap-2 flex-wrap">
                        <div class="gw-name">{{ $gw->name }}</div>
                        @if($gw->network)
                          <span style="background:#1a1a1a;border:1px solid #333;color:#777;padding:.15rem .6rem;border-radius:4px;font-size:.7rem;">{{ $gw->network }}</span>
                        @endif
                        @if($gw->active)
                          <span class="gw-status-on"><i class="bi bi-circle-fill me-1" style="font-size:.45rem;"></i>Active</span>
                        @else
                          <span class="gw-status-off">Inactive</span>
                        @endif
                      </div>
                      <div class="gw-address">
                        <i class="bi bi-wallet me-1"></i>{{ $gw->wallet_address }}
                        <button type="button" onclick="copyAddress('{{ $gw->wallet_address }}')"
                          style="background:none;border:none;color:#555;cursor:pointer;padding:0 0 0 .4rem;">
                          <i class="bi bi-copy"></i>
                        </button>
                      </div>
                    </div>

                    {{-- QR if exists --}}
                    @if($gw->qr_code)
                      <img src="{{ asset('storage/' . $gw->qr_code) }}" alt="QR"
                           style="width:60px;height:60px;border-radius:8px;border:1px solid #333;object-fit:cover;cursor:pointer;"
                           onclick="window.open('{{ asset('storage/' . $gw->qr_code) }}','_blank')">
                    @endif
                  </div>

                  {{-- Actions --}}
                  <div class="gw-actions">
                    {{-- Edit --}}
                    <button class="btn btn-sm btn-outline-warning"
                            data-bs-toggle="modal"
                            data-bs-target="#editGatewayModal{{ $gw->id }}">
                      <i class="bi bi-pencil me-1"></i> Edit
                    </button>

                    {{-- Toggle --}}
                    <form method="POST" action="{{ route('admin.gateways.toggle', $gw->id) }}" style="display:contents;">
                      @csrf
                      <button type="submit" class="btn btn-sm {{ $gw->active ? 'btn-outline-secondary' : 'btn-outline-success' }}">
                        <i class="bi bi-{{ $gw->active ? 'pause-circle' : 'play-circle' }} me-1"></i>
                        {{ $gw->active ? 'Disable' : 'Enable' }}
                      </button>
                    </form>

                    {{-- Delete --}}
                    <form method="POST" action="{{ route('admin.gateways.destroy', $gw->id) }}" style="display:contents;"
                          onsubmit="return confirm('Delete {{ $gw->name }} gateway?')">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="bi bi-trash me-1"></i> Delete
                      </button>
                    </form>
                  </div>
                </div>

                {{-- Edit modal for this gateway --}}
                <div class="modal fade" id="editGatewayModal{{ $gw->id }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0" style="background:#111;border:1px solid #333 !important;">
                      <div class="modal-header" style="background:#1a1a1a;border-bottom:1px solid #333;">
                        <h5 class="modal-title fw-bold text-white"><i class="bi bi-pencil me-2 text-warning"></i>Edit {{ $gw->name }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body p-4" style="background:#111;">
                        <form action="{{ route('admin.gateways.update', $gw->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf @method('PUT')
                          <div class="row g-4">
                            <div class="col-md-6">
                              <label class="form-label fw-semibold">Gateway Name</label>
                              <input type="text" name="name" value="{{ $gw->name }}" class="form-control form-control-lg form-control-dark" required>
                            </div>
                            <div class="col-md-3">
                              <label class="form-label fw-semibold">Symbol</label>
                              <input type="text" name="symbol" value="{{ $gw->symbol }}" class="form-control form-control-lg form-control-dark" placeholder="BTC">
                            </div>
                            <div class="col-md-3">
                              <label class="form-label fw-semibold">Network</label>
                              <input type="text" name="network" value="{{ $gw->network }}" class="form-control form-control-lg form-control-dark" placeholder="TRC20">
                            </div>
                            <div class="col-12">
                              <label class="form-label fw-semibold">Wallet Address</label>
                              <input type="text" name="wallet_address" value="{{ $gw->wallet_address }}" class="form-control form-control-lg form-control-dark" required>
                            </div>
                            <div class="col-12">
                              <label class="form-label fw-semibold">QR Code Image <span class="text-secondary" style="font-size:.8rem;">(optional — upload new to replace)</span></label>
                              <input type="file" name="qr_code" class="form-control form-control-lg form-control-dark" accept="image/*">
                              @if($gw->qr_code)
                                <div class="mt-2">
                                  <img src="{{ asset('storage/' . $gw->qr_code) }}" alt="Current QR" style="width:80px;height:80px;border-radius:8px;border:1px solid #333;object-fit:cover;">
                                  <small class="text-secondary ms-2">Current QR</small>
                                </div>
                              @endif
                            </div>
                            <div class="col-12 form-check form-switch">
                              <input class="form-check-input" type="checkbox" name="active" id="editActive{{ $gw->id }}" value="1" {{ $gw->active ? 'checked' : '' }}>
                              <label class="form-check-label" for="editActive{{ $gw->id }}">Active (visible to users)</label>
                            </div>
                          </div>
                          <div class="d-flex justify-content-end gap-3 mt-4 pt-3" style="border-top:1px solid #222;">
                            <button type="button" class="btn btn-outline-light px-4" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-save px-5 fw-bold">Save Changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              @endforeach
            @else
              <div class="empty-gateways">
                <i class="bi bi-wallet2" style="font-size:3rem;"></i>
                <p class="mt-3 mb-1" style="font-size:1rem;">No payment gateways yet.</p>
                <p>Click "Add New Gateway" to add your first one.</p>
              </div>
            @endif

          </div>

          {{-- ══ SECURITY TAB ══ --}}
          <div class="tab-pane fade" id="security" role="tabpanel">
            <form>
              <div class="row g-4">
                <div class="col-12">
                  <h5 class="fw-bold mb-4"><i class="bi bi-shield-check me-2 text-success"></i>Two-Factor Authentication</h5>
                  <div class="form-check form-switch mb-3"><input class="form-check-input" type="checkbox" id="force2FA" checked><label class="form-check-label fs-5" for="force2FA">Force 2FA for all users</label></div>
                </div>
                <div class="col-12">
                  <h5 class="fw-bold mb-4"><i class="bi bi-key me-2 text-info"></i>Login Security</h5>
                  <div class="form-check form-switch mb-3"><input class="form-check-input" type="checkbox" id="loginAlert" checked><label class="form-check-label fs-5" for="loginAlert">Email alert on new login from unknown device</label></div>
                  <div class="form-check form-switch mb-3"><input class="form-check-input" type="checkbox" id="ipWhitelist"><label class="form-check-label fs-5" for="ipWhitelist">Enable IP Whitelist (admin only)</label></div>
                  <div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="suspicious" checked><label class="form-check-label fs-5" for="suspicious">Block suspicious account activity</label></div>
                </div>
                <div class="col-12 text-end mt-4">
                  <button type="submit" class="btn btn-save btn-lg px-5 fw-bold"><i class="bi bi-check-circle me-2"></i>Save Security Settings</button>
                </div>
              </div>
            </form>
          </div>

          {{-- ══ EMAIL TAB ══ --}}
          <div class="tab-pane fade" id="email" role="tabpanel">
            <form>
              <div class="row g-4">
                <div class="col-md-6"><label class="form-label fw-semibold">SMTP Host</label><input type="text" class="form-control form-control-lg form-control-dark" value="smtp.mailtrap.io" placeholder="smtp.example.com"></div>
                <div class="col-md-6"><label class="form-label fw-semibold">SMTP Port</label><input type="number" class="form-control form-control-lg form-control-dark" value="2525"></div>
                <div class="col-md-6"><label class="form-label fw-semibold">SMTP Username</label><input type="text" class="form-control form-control-lg form-control-dark" placeholder="Username"></div>
                <div class="col-md-6"><label class="form-label fw-semibold">SMTP Password</label><input type="password" class="form-control form-control-lg form-control-dark" placeholder="Password"></div>
                <div class="col-md-6"><label class="form-label fw-semibold">From Email</label><input type="email" class="form-control form-control-lg form-control-dark" value="no-reply@sunhill.com"></div>
                <div class="col-md-6"><label class="form-label fw-semibold">From Name</label><input type="text" class="form-control form-control-lg form-control-dark" value="SUNHILL Admin"></div>
                <div class="col-12 text-end mt-4">
                  <button type="button" class="btn btn-outline-light btn-lg px-5 me-2"><i class="bi bi-send me-2"></i>Test Email</button>
                  <button type="submit" class="btn btn-save btn-lg px-5 fw-bold"><i class="bi bi-check-circle me-2"></i>Save Email Settings</button>
                </div>
              </div>
            </form>
          </div>

          {{-- ══ MAINTENANCE TAB ══ --}}
          <div class="tab-pane fade" id="maintenance" role="tabpanel">
            <form>
              <div class="row g-4">
                <div class="col-12">
                  <h5 class="fw-bold mb-4"><i class="bi bi-exclamation-triangle me-2 text-warning"></i>Maintenance Mode</h5>
                  <div class="form-check form-switch mb-3"><input class="form-check-input" type="checkbox" id="siteMaintenance"><label class="form-check-label fs-5" for="siteMaintenance">Put site in maintenance mode</label></div>
                  <label class="form-label fw-semibold mt-3">Maintenance Message</label>
                  <textarea class="form-control form-control-lg form-control-dark" rows="4">We're performing scheduled maintenance. Please check back soon!</textarea>
                </div>
                <div class="col-12 mt-4 pt-4" style="border-top:1px solid #222;">
                  <h5 class="fw-bold mb-4"><i class="bi bi-cloud-download me-2 text-success"></i>Database Backup</h5>
                  <p class="text-secondary mb-3">Last backup: <strong>{{ now()->subDay()->format('F d, Y') }}</strong></p>
                  <button type="button" class="btn btn-outline-success btn-lg px-5"><i class="bi bi-download me-2"></i>Download Backup</button>
                </div>
                <div class="col-12 text-end mt-4">
                  <button type="submit" class="btn btn-save btn-lg px-5 fw-bold"><i class="bi bi-check-circle me-2"></i>Save Maintenance Settings</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>

  </div>
</main>

{{-- ══ ADD GATEWAY MODAL ══ --}}
<div class="modal fade" id="addGatewayModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0" style="background:#111;border:1px solid #333 !important;">
      <div class="modal-header" style="background:#1a1a1a;border-bottom:1px solid #333;">
        <h5 class="modal-title fw-bold text-white"><i class="bi bi-plus-circle me-2 text-success"></i>Add New Payment Gateway</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-4" style="background:#111;">
        <form action="{{ route('admin.gateways.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row g-4">
            <div class="col-md-6">
              <label class="form-label fw-semibold">Gateway Name <span class="text-danger">*</span></label>
              <input type="text" name="name" class="form-control form-control-lg form-control-dark" placeholder="e.g. Bitcoin, USDT, XRP" required>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-semibold">Symbol</label>
              <input type="text" name="symbol" class="form-control form-control-lg form-control-dark" placeholder="BTC">
              <small class="text-secondary">e.g. BTC, ETH, USDT</small>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-semibold">Network</label>
              <input type="text" name="network" class="form-control form-control-lg form-control-dark" placeholder="TRC20">
              <small class="text-secondary">e.g. TRC20, ERC20</small>
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold">Wallet Address <span class="text-danger">*</span></label>
              <input type="text" name="wallet_address" class="form-control form-control-lg form-control-dark" placeholder="Enter the deposit wallet address" required>
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold">QR Code Image <span class="text-secondary" style="font-size:.8rem;">(optional)</span></label>
              <input type="file" name="qr_code" class="form-control form-control-lg form-control-dark" accept="image/*">
              <small class="text-secondary">Upload a QR code image for easy scanning</small>
            </div>
            <div class="col-12 form-check form-switch">
              <input class="form-check-input" type="checkbox" name="active" id="newGwActive" value="1" checked>
              <label class="form-check-label fs-5" for="newGwActive">Activate immediately (visible to users on deposit page)</label>
            </div>
          </div>
          <div class="d-flex justify-content-end gap-3 mt-4 pt-3" style="border-top:1px solid #222;">
            <button type="button" class="btn btn-outline-light px-4" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-save px-5 fw-bold">
              <i class="bi bi-plus-circle me-2"></i> Add Gateway
            </button>
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
sidebarToggle.addEventListener('click',  () => { sidebar.classList.toggle('active'); sidebarOverlay.classList.toggle('active'); });
sidebarOverlay.addEventListener('click', () => { sidebar.classList.remove('active'); sidebarOverlay.classList.remove('active'); });
document.querySelectorAll('.nav-link, [data-bs-toggle="tab"]').forEach(el => {
  el.addEventListener('click', () => {
    if (window.innerWidth <= 768) { sidebar.classList.remove('active'); sidebarOverlay.classList.remove('active'); }
  });
});

// Copy address
function copyAddress(addr) {
  navigator.clipboard.writeText(addr).then(() => {
    alert('Address copied!');
  });
}

// If there's a flash message and we came from a gateway action,
// auto-open the payments tab
@if(session('success') && request()->routeIs('admin.settings'))
  document.addEventListener('DOMContentLoaded', () => {
    const paymentsTab = document.querySelector('[data-bs-target="#payments"]');
    if (paymentsTab) new bootstrap.Tab(paymentsTab).show();
  });
@endif
</script>

</body>
</html>
