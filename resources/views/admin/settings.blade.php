<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>System Settings - SUNHILL Admin</title>

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
    }

    .form-control-dark {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #fff;
      border-radius: 8px;
    }

    .form-control-dark:focus {
      border-color: #ef4444;
      box-shadow: 0 0 0 0.25rem rgba(239, 68, 68, 0.25);
      color: #fff;
      background: #1a1a1a;
    }

    .form-control-dark::placeholder {
      color: #888;
    }

    .form-select-dark {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #fff;
      border-radius: 8px;
    }

    .form-select-dark:focus {
      border-color: #ef4444;
      box-shadow: 0 0 0 0.25rem rgba(239, 68, 68, 0.25);
      color: #fff;
      background: #1a1a1a;
    }

    .form-check-input:checked {
      background-color: #ef4444;
      border-color: #ef4444;
    }

    .form-check-input:focus {
      border-color: #ef4444;
      box-shadow: 0 0 0 0.25rem rgba(239, 68, 68, 0.25);
    }

    .nav-tabs .nav-link {
      color: #a0a0a0;
      padding: 0.75rem 1.25rem;
      border: none;
      border-bottom: 3px solid transparent;
      margin: 0;
      background: transparent;
    }

    .nav-tabs .nav-link:hover {
      background: transparent;
      color: #fff;
      border-bottom-color: rgba(239, 68, 68, 0.5);
      padding-left: 1.25rem;
    }

    .nav-tabs .nav-link.active {
      background: transparent;
      color: #ef4444;
      border-bottom-color: #ef4444;
      font-weight: 600;
    }

    .btn-save {
      background: #ef4444;
      border: none;
      padding: 0.75rem 1.5rem;
      font-weight: 600;
      color: white;
    }

    .btn-save:hover {
      background: #dc2626;
      color: white;
    }

    .btn-outline-success:hover {
      background: #22c55e;
      border-color: #22c55e;
    }

    .alert {
      background: rgba(239, 68, 68, 0.15);
      border: 1px solid rgba(239, 68, 68, 0.3);
      color: #fca5a5;
    }

    .form-label {
      color: #e0e0e0;
    }

    textarea.form-control-dark {
      resize: vertical;
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
          <a href="{{ route('admin.settings') }}" class="nav-link active">
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
        <i class="bi bi-gear-fill me-2 text-danger"></i> System Settings
      </h1>
      <span class="text-secondary">{{ now()->format('F d, Y') }}</span>
    </div>

    <!-- Settings Card -->
    <div class="card card-dark shadow-lg">
      <div class="card-body p-4 p-lg-5">

        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs mb-5 border-bottom border-secondary" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active fw-semibold fs-5" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">
              <i class="bi bi-house-fill me-2"></i> General
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold fs-5" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">
              <i class="bi bi-shield-fill me-2"></i> Security
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold fs-5" id="payments-tab" data-bs-toggle="tab" data-bs-target="#payments" type="button" role="tab" aria-controls="payments" aria-selected="false">
              <i class="bi bi-wallet2 me-2"></i> Payment Gateways
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold fs-5" id="email-tab" data-bs-toggle="tab" data-bs-target="#email" type="button" role="tab" aria-controls="email" aria-selected="false">
              <i class="bi bi-envelope-fill me-2"></i> Email / SMTP
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold fs-5" id="maintenance-tab" data-bs-toggle="tab" data-bs-target="#maintenance" type="button" role="tab" aria-controls="maintenance" aria-selected="false">
              <i class="bi bi-tools me-2"></i> Maintenance
            </button>
          </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">

          <!-- GENERAL TAB -->
          <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
            @if ($errors->any())
              <div class="alert alert-danger mb-4">
                <h5 class="fw-bold mb-2">
                  <i class="bi bi-exclamation-triangle me-2"></i> Validation Errors
                </h5>
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('admin.settings.update') }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row g-4">
                <div class="col-md-6">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-file-text me-2"></i> Site Name
                  </label>
                  <input type="text" class="form-control form-control-lg form-control-dark" value="{{ $user->name ?? '' }}" name="name" placeholder="Your Site Name">
                  @error('name')
                    <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-person-fill me-2"></i> Username
                  </label>
                  <input type="text" class="form-control form-control-lg form-control-dark" value="{{ $user->username ?? '' }}" name="username" placeholder="Admin Username">
                  @error('username')
                    <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-globe me-2"></i> Site URL
                  </label>
                  <input type="url" class="form-control form-control-lg form-control-dark" value="{{ $user->site_url ?? '' }}" name="site_url" placeholder="https://example.com">
                  @error('site_url')
                    <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-envelope-fill me-2"></i> Support Email
                  </label>
                  <input type="email" class="form-control form-control-lg form-control-dark" value="{{ $user->email ?? '' }}" name="email" placeholder="support@example.com">
                  @error('email')
                    <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-currency-dollar me-2"></i> Default Currency
                  </label>
                  <select class="form-select form-select-lg form-select-dark">
                    <option selected>USD - US Dollar</option>
                    <option>EUR - Euro</option>
                    <option>BTC - Bitcoin</option>
                    <option>USDT - Tether</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-clock-history me-2"></i> Timezone
                  </label>
                  <select class="form-select form-select-lg form-select-dark">
                    <option selected>UTC</option>
                    <option>EST - Eastern Standard Time</option>
                    <option>CST - Central Standard Time</option>
                    <option>PST - Pacific Standard Time</option>
                  </select>
                </div>

                <div class="col-md-12 form-check form-switch mt-2">
                  <input class="form-check-input" type="checkbox" id="maintenanceMode" name="maintenance_mode">
                  <label class="form-check-label fs-5" for="maintenanceMode">
                    <i class="bi bi-exclamation-octagon me-2 text-warning"></i> Enable Maintenance Mode
                  </label>
                </div>

                <div class="col-12 text-end mt-5">
                  <button type="submit" class="btn btn-save btn-lg px-5 fw-bold">
                    <i class="bi bi-check-circle me-2"></i> Save General Settings
                  </button>
                </div>
              </div>
            </form>
          </div>

          <!-- SECURITY TAB -->
          <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
            <form>
              <div class="row g-4">
                <div class="col-md-12">
                  <h5 class="fw-bold mb-4">
                    <i class="bi bi-shield-check me-2 text-success"></i> Two-Factor Authentication
                  </h5>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="force2FA" checked>
                    <label class="form-check-label fs-5" for="force2FA">
                      Force 2FA for all users
                    </label>
                  </div>
                </div>

                <div class="col-md-12">
                  <h5 class="fw-bold mb-4">
                    <i class="bi bi-key me-2 text-info"></i> Login Security
                  </h5>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="loginAlert" checked>
                    <label class="form-check-label fs-5" for="loginAlert">
                      Email alert on new login from unknown device
                    </label>
                  </div>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="ipWhitelist">
                    <label class="form-check-label fs-5" for="ipWhitelist">
                      Enable IP Whitelist (admin only)
                    </label>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="suspiciousActivity" checked>
                    <label class="form-check-label fs-5" for="suspiciousActivity">
                      Block suspicious account activity
                    </label>
                  </div>
                </div>

                <div class="col-12 text-end mt-5">
                  <button type="submit" class="btn btn-save btn-lg px-5 fw-bold">
                    <i class="bi bi-check-circle me-2"></i> Save Security Settings
                  </button>
                </div>
              </div>
            </form>
          </div>

          <!-- PAYMENT GATEWAYS TAB -->
          <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">
            <form>
              <div class="row g-4">
                <div class="col-md-12">
                  <h5 class="fw-bold mb-4">
                    <i class="bi bi-currency-bitcoin me-2 text-warning"></i> Bitcoin (BTC)
                  </h5>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="btcEnabled" checked>
                    <label class="form-check-label fs-5" for="btcEnabled">
                      Enable Bitcoin Deposits & Withdrawals
                    </label>
                  </div>
                  <label class="form-label fw-semibold mt-3">Bitcoin Wallet Address</label>
                  <input type="text" class="form-control form-control-lg form-control-dark" value="bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh" placeholder="Bitcoin address">
                </div>

                <div class="col-md-12">
                  <h5 class="fw-bold mb-4">
                    <i class="bi bi-coin me-2 text-info"></i> USDT (TRC20)
                  </h5>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="usdtEnabled" checked>
                    <label class="form-check-label fs-5" for="usdtEnabled">
                      Enable USDT (TRC20)
                    </label>
                  </div>
                  <label class="form-label fw-semibold mt-3">USDT Wallet Address</label>
                  <input type="text" class="form-control form-control-lg form-control-dark" value="TQwerty1234567890abcdef" placeholder="USDT address">
                </div>

                <div class="col-md-12">
                  <h5 class="fw-bold mb-4">
                    <i class="bi bi-credit-card me-2 text-success"></i> Ethereum (ETH)
                  </h5>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="ethEnabled">
                    <label class="form-check-label fs-5" for="ethEnabled">
                      Enable Ethereum
                    </label>
                  </div>
                  <label class="form-label fw-semibold mt-3">Ethereum Wallet Address</label>
                  <input type="text" class="form-control form-control-lg form-control-dark" placeholder="0x..." disabled>
                </div>

                <div class="col-12 text-end mt-5">
                  <button type="submit" class="btn btn-save btn-lg px-5 fw-bold">
                    <i class="bi bi-check-circle me-2"></i> Save Payment Settings
                  </button>
                </div>
              </div>
            </form>
          </div>

          <!-- EMAIL / SMTP TAB -->
          <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
            <form>
              <div class="row g-4">
                <div class="col-md-6">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-server me-2"></i> SMTP Host
                  </label>
                  <input type="text" class="form-control form-control-lg form-control-dark" value="smtp.mailtrap.io" placeholder="smtp.example.com">
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-diagram-3 me-2"></i> SMTP Port
                  </label>
                  <input type="number" class="form-control form-control-lg form-control-dark" value="2525" placeholder="2525">
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-person-badge me-2"></i> SMTP Username
                  </label>
                  <input type="text" class="form-control form-control-lg form-control-dark" value="your_username" placeholder="Username">
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-lock-fill me-2"></i> SMTP Password
                  </label>
                  <input type="password" class="form-control form-control-lg form-control-dark" value="••••••••" placeholder="Password">
                </div>

                <div class="col-md-12">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-envelope-fill me-2"></i> From Email Address
                  </label>
                  <input type="email" class="form-control form-control-lg form-control-dark" value="no-reply@sunhill.com" placeholder="no-reply@example.com">
                </div>

                <div class="col-md-12">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-file-earmark me-2"></i> From Name
                  </label>
                  <input type="text" class="form-control form-control-lg form-control-dark" value="SUNHILL Admin" placeholder="Display name for emails">
                </div>

                <div class="col-12 text-end mt-5">
                  <button type="button" class="btn btn-outline-light btn-lg px-5 me-2">
                    <i class="bi bi-send me-2"></i> Test Email
                  </button>
                  <button type="submit" class="btn btn-save btn-lg px-5 fw-bold">
                    <i class="bi bi-check-circle me-2"></i> Save Email Settings
                  </button>
                </div>
              </div>
            </form>
          </div>

          <!-- MAINTENANCE & BACKUP TAB -->
          <div class="tab-pane fade" id="maintenance" role="tabpanel" aria-labelledby="maintenance-tab">
            <form>
              <div class="row g-4">
                <div class="col-md-12">
                  <h5 class="fw-bold mb-4">
                    <i class="bi bi-exclamation-triangle me-2 text-warning"></i> Maintenance Mode
                  </h5>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="siteMaintenance">
                    <label class="form-check-label fs-5" for="siteMaintenance">
                      Put site in maintenance mode
                    </label>
                  </div>
                  <label class="form-label fw-semibold mt-3">Maintenance Message</label>
                  <textarea class="form-control form-control-lg form-control-dark" rows="4" placeholder="Message shown to users during maintenance...">We're performing scheduled maintenance. Please check back soon!</textarea>
                </div>

                <div class="col-md-12 mt-5 pt-4 border-top border-secondary">
                  <h5 class="fw-bold mb-4">
                    <i class="bi bi-cloud-download me-2 text-success"></i> Database Backup
                  </h5>
                  <p class="text-secondary mb-3">Last backup: <strong>February 23, 2026 at 23:45 UTC</strong></p>
                  <button type="button" class="btn btn-outline-success btn-lg px-5">
                    <i class="bi bi-download me-2"></i> Download Backup Now
                  </button>
                  <button type="button" class="btn btn-outline-light btn-lg px-5 ms-2">
                    <i class="bi bi-arrow-clockwise me-2"></i> Auto Backup
                  </button>
                </div>

                <div class="col-12 text-end mt-5">
                  <button type="submit" class="btn btn-save btn-lg px-5 fw-bold">
                    <i class="bi bi-check-circle me-2"></i> Save Maintenance Settings
                  </button>
                </div>
              </div>
            </form>
          </div>

        </div>

      </div>
    </div>

  </div>
</main>

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

// Tab switching closes sidebar on mobile
const tabButtons = document.querySelectorAll('[data-bs-toggle="tab"]');
tabButtons.forEach(button => {
  button.addEventListener('click', function() {
    if (window.innerWidth <= 768) {
      sidebar.classList.remove('active');
      sidebarOverlay.classList.remove('active');
    }
  });
});
</script>

</body>
</html>