<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Deposit Funds - Tesla Invest</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    * { transition: all 0.3s ease; }
    body { background: #000; color: #fff; font-family: 'Segoe UI', sans-serif; min-height: 100vh; }

    .sidebar { position: fixed; top: 0; left: 0; bottom: 0; width: 260px; background: linear-gradient(180deg,#0a0a0a,#0f0f0f); border-right: 1px solid #222; padding: 1.5rem 1rem; overflow-y: auto; z-index: 1001; }
    .sidebar-toggle { display: none; position: fixed; top: 1rem; left: 1rem; background: #22c55e; border: none; color: white; padding: .75rem 1rem; border-radius: 8px; font-size: 1.25rem; cursor: pointer; z-index: 1002; }
    .sidebar-toggle:hover { background: #16a34a; transform: scale(1.05); }
    .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.7); z-index: 1000; }
    .sidebar-overlay.active { display: block; }
    .sidebar-brand { font-size: 1.75rem; font-weight: 700; color: #fff; text-decoration: none; display: block; padding: 1.5rem 0 2rem; text-align: center; border-bottom: 1px solid #333; margin-bottom: 1.5rem; }
    .nav-link { color: #a0a0a0; padding: .85rem 1.25rem; border-radius: 8px; font-weight: 500; display: flex; align-items: center; gap: 12px; margin: .35rem 0; position: relative; overflow: hidden; }
    .nav-link::before { content: ''; position: absolute; left: 0; top: 0; width: 4px; height: 100%; background: #22c55e; transform: scaleY(0); transform-origin: top; transition: transform .3s; }
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

    /* Payment method cards */
    .gateway-card {
      background: #111; border: 2px solid #2a2a2a; border-radius: 14px;
      padding: 1.1rem 1.3rem; cursor: pointer; user-select: none;
      display: flex; align-items: center; justify-content: space-between; gap: 1rem;
    }
    .gateway-card:hover { border-color: #555; background: #1a1a1a; transform: translateY(-3px); box-shadow: 0 6px 20px rgba(34,197,94,.1); }
    .gateway-card.selected { border-color: #22c55e; background: rgba(34,197,94,.06); box-shadow: 0 0 0 3px rgba(34,197,94,.2); }
    .gateway-card input[type="radio"] { accent-color: #22c55e; cursor: pointer; flex-shrink: 0; }
    .gw-symbol-badge { width: 38px; height: 38px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: .75rem; flex-shrink: 0; }
    .gw-info { flex: 1; }
    .gw-name-text { font-weight: 600; font-size: .95rem; color: #fff; }
    .gw-network-text { font-size: .72rem; color: #555; }

    .no-gateways { background: rgba(0,0,0,.3); border: 1px dashed #2a2a2a; border-radius: 12px; padding: 2.5rem; text-align: center; color: #444; }

    .form-control-dark { background: #1a1a1a; border: 1px solid #444; color: #fff; border-radius: 8px; }
    .form-control-dark:focus { border-color: #22c55e; box-shadow: 0 0 0 .25rem rgba(34,197,94,.25); background: #1a1a1a; color: #fff; }
    .form-control-dark::placeholder { color: #555; }
    .card-dark { background: #111; border: 1px solid #333; border-radius: 16px; }
    .modal-content { background: #111; border: 1px solid #333; border-radius: 16px; }
    .modal-header { background: linear-gradient(135deg,#1a1a1a,#0f0f0f); border-bottom: 1px solid #333; border-radius: 15px 15px 0 0; }

    /* Wallet address box */
    .wallet-box { background: #0a0a0a; border: 1px solid #2a2a2a; border-radius: 12px; padding: 1.2rem; word-break: break-all; font-family: monospace; font-size: .9rem; color: #22c55e; letter-spacing: .02em; }

    /* QR box */
    .qr-box { background: #fff; padding: 1rem; border-radius: 12px; display: inline-block; }
    .qr-placeholder { width: 180px; height: 180px; background: #0a0a0a; border: 1px dashed #2a2a2a; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #333; font-size: .82rem; }

    .alert-warning { background: rgba(245,158,11,.12); border: 1px solid rgba(245,158,11,.3); color: #fde68a; }
    .alert-warning strong { color: #f59e0b; }
    .badge-success-subtle { background: rgba(34,197,94,.15); color: #86efac; }
    .btn-success { background: #22c55e; border-color: #22c55e; font-weight: 600; }
    .btn-success:hover { background: #16a34a; border-color: #16a34a; }
    .btn-outline-success { color: #22c55e; border-color: #22c55e; }
    .btn-outline-success:hover { background: #22c55e; color: #000; }

    .flash-success { background: rgba(34,197,94,.12); border: 1px solid rgba(34,197,94,.3); color: #22c55e; padding: 1rem 1.5rem; border-radius: 10px; margin-bottom: 1.5rem; }
    .flash-error   { background: rgba(239,68,68,.1);  border: 1px solid rgba(239,68,68,.3);  color: #ef4444; padding: 1rem 1.5rem; border-radius: 10px; margin-bottom: 1.5rem; }
  </style>
</head>
<body>

<button class="sidebar-toggle" id="sidebarToggle"><i class="bi bi-list"></i></button>
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar" id="sidebar">
  <a href="{{ route('user.dashboard') }}" class="sidebar-brand">
    <img src="{{ asset('images/logo.png') }}" width="50%" height="50" alt="Tesla Invest Logo">
  </a>
  <nav class="mt-4">
    <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link" href="{{ route('user.dashboard') }}"><i class="uil uil-home"></i><span>Home</span></a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('user.packages') }}"><i class="uil uil-package"></i><span>Packages</span></a></li>
      <li class="nav-item"><a class="nav-link active" href="{{ route('user.deposit') }}"><i class="uil uil-dollar-sign"></i><span>Deposit</span></a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('user.withdraw') }}"><i class="uil uil-money-withdraw"></i><span>Withdraw</span></a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('user.transactions') }}"><i class="uil uil-receipt"></i><span>Transactions</span></a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('profile.edit') }}"><i class="uil uil-user"></i><span>Profile</span></a></li>
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
  @if(session('error'))
    <div class="flash-error"><i class="bi bi-exclamation-circle-fill me-2"></i> {{ session('error') }}</div>
  @endif
  @if($errors->any())
    <div class="flash-error"><i class="bi bi-exclamation-circle-fill me-2"></i> {{ $errors->first() }}</div>
  @endif

  <section class="py-4">
    <div class="container-xl">

      <div class="text-center mb-5">
        <h1 class="display-4 fw-bold mb-3">
          <i class="bi bi-cash-coin me-2 text-success"></i> Deposit Funds
        </h1>
        <p class="lead text-secondary mb-2">Quickly and securely add funds to your account</p>
        <p class="text-muted">Choose your preferred payment method and enter the amount.</p>
      </div>

      <div class="row justify-content-center">
        <div class="col-xl-9 col-lg-10">
          <div class="card card-dark shadow-lg">
            <div class="card-body p-4 p-md-5">

              {{-- Amount --}}
              <div class="mb-5">
                <label class="form-label fs-5">
                  <i class="bi bi-currency-dollar me-2"></i> Deposit Amount
                </label>
                <input type="number" class="form-control form-control-lg form-control-dark"
                       id="amount" placeholder="Enter amount (minimum $50)"
                       min="50" step="0.01">
                <div class="form-text text-muted mt-2">
                  <i class="bi bi-info-circle me-1"></i> Minimum deposit: <strong>$50</strong>
                </div>
              </div>

              {{-- Payment Methods from DB --}}
              <div class="mb-5">
                <p class="fs-5 fw-semibold mb-4"><i class="bi bi-wallet2 me-2"></i> Choose Payment Method</p>

                @if(isset($gateways) && $gateways->count() > 0)
                  <div class="row g-3" id="gatewayList">
                    @foreach($gateways as $gw)
                      @php
                        $color = match(strtoupper($gw->symbol ?? '')) {
                          'BTC'  => '#f7931a',
                          'ETH'  => '#627eea',
                          'USDT' => '#26a17b',
                          'XRP'  => '#0099a8',
                          'BNB'  => '#f3ba2f',
                          'LTC'  => '#bfbfbf',
                          'TRX'  => '#eb0029',
                          'SOL'  => '#9945ff',
                          'DOGE' => '#c1a633',
                          default => '#888'
                        };
                      @endphp
                      <div class="col-md-6 col-lg-4">
                        <div class="gateway-card"
                             data-id="{{ $gw->id }}"
                             data-name="{{ $gw->name }}"
                             data-symbol="{{ strtoupper($gw->symbol ?? $gw->name) }}"
                             data-network="{{ $gw->network ?? '' }}"
                             data-address="{{ $gw->wallet_address }}"
                             data-qr="{{ $gw->qr_code ? asset('storage/' . $gw->qr_code) : '' }}"
                             onclick="selectGateway(this)">
                          <div class="gw-symbol-badge" style="background:{{ $color }}22;color:{{ $color }};">
                            {{ strtoupper(substr($gw->symbol ?? $gw->name, 0, 4)) }}
                          </div>
                          <div class="gw-info">
                            <div class="gw-name-text">{{ $gw->name }}</div>
                            @if($gw->network)
                              <div class="gw-network-text">{{ $gw->network }}</div>
                            @endif
                          </div>
                          <input type="radio" name="payment_method_display" value="{{ $gw->id }}">
                        </div>
                      </div>
                    @endforeach
                  </div>
                @else
                  <div class="no-gateways">
                    <i class="bi bi-wallet2" style="font-size:2.5rem;"></i>
                    <p class="mt-3 mb-0">No payment methods available yet.</p>
                    <small>Please contact support.</small>
                  </div>
                @endif
              </div>

              {{-- Proceed Button --}}
              <button type="button" class="btn btn-success btn-lg w-100 py-3 fw-bold fs-5"
                      id="proceedBtn" data-bs-toggle="modal" data-bs-target="#depositModal">
                <i class="bi bi-arrow-right-circle me-2"></i> Proceed To Payment
              </button>

              {{-- Summary --}}
              <div class="card mt-5" style="background:#0a0a0a;border:1px solid #1a1a1a;border-radius:12px;">
                <div class="card-body text-center py-4">
                  <p class="text-muted mb-1 fs-5"><i class="bi bi-info-circle me-2"></i>Total Deposit</p>
                  <h2 class="fw-bold mb-0 fs-2 text-success">$</h2>
                  <a href="{{ route('user.transactions') }}" class="text-success text-decoration-none d-block mt-3 fs-5">
                    View deposit history <i class="bi bi-arrow-right ms-1"></i>
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

{{-- ══ DEPOSIT MODAL ══ --}}
<div class="modal fade" id="depositModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content card-dark">
      <div class="modal-header border-0">
        <div>
          <h4 class="modal-title fw-bold fs-3">
            <i class="bi bi-wallet2 me-2 text-success"></i> Complete Your Deposit
          </h4>
          <small style="color:#555;">Send funds to the address below then upload your proof</small>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body p-4">

        {{-- Summary row --}}
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <div style="background:#0a0a0a;border:1px solid #1a1a1a;border-radius:12px;padding:1.3rem;text-align:center;">
              <div style="font-size:.75rem;color:#555;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.4rem;">Deposit Amount</div>
              <div class="text-success fw-bold" style="font-size:2rem;" id="confirmAmount">$0.00</div>
              <small style="color:#444;">No hidden fees</small>
            </div>
          </div>
          <div class="col-md-6">
            <div style="background:#0a0a0a;border:1px solid #1a1a1a;border-radius:12px;padding:1.3rem;text-align:center;">
              <div style="font-size:.75rem;color:#555;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.4rem;">Payment Method</div>
              <div class="fw-bold text-uppercase" style="font-size:1.2rem;" id="confirmMethod">—</div>
              <span id="confirmNetwork" style="font-size:.75rem;color:#555;"></span>
            </div>
          </div>
        </div>

        {{-- Wallet address --}}
        <div style="background:#0a0a0a;border:1px solid #1a1a1a;border-radius:14px;padding:1.5rem;margin-bottom:1.5rem;">
          <div style="font-size:.75rem;color:#555;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.8rem;">
            <i class="bi bi-wallet2 me-2"></i> Send To This Wallet Address
          </div>
          <div class="wallet-box" id="walletAddressDisplay">—</div>
          <button type="button" class="btn btn-outline-success mt-3 w-100" onclick="copyAddress()">
            <i class="bi bi-clipboard me-2"></i> Copy Address
          </button>
        </div>

        {{-- QR Code --}}
        <div style="text-align:center;margin-bottom:1.5rem;" id="qrSection">
          <div style="font-size:.75rem;color:#555;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.8rem;">Scan QR Code</div>
          <div id="qrContainer">
            <div class="qr-placeholder mx-auto"><span>Select a payment method</span></div>
          </div>
          <small style="color:#444;margin-top:.5rem;display:block;">Scan to send payment</small>
        </div>

        {{-- Proof upload form --}}
        <form action="{{ route('user.deposit.confirm') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="amount" id="hiddenAmount">
          <input type="hidden" name="payment_method" id="hiddenMethod">
          <input type="hidden" name="gateway_id" id="hiddenGatewayId">

          <div style="background:#0a0a0a;border:1px solid #1a1a1a;border-radius:14px;padding:1.5rem;margin-bottom:1.5rem;">
            <div style="font-size:.75rem;color:#555;text-transform:uppercase;letter-spacing:.1em;margin-bottom:1rem;">
              <i class="bi bi-image me-2"></i> Proof of Payment
            </div>
            <p style="color:#555;font-size:.88rem;margin-bottom:1rem;">Upload a screenshot or receipt of your transfer:</p>

            <input type="file" name="proof_of_payment" id="proofInput" accept="image/*" class="form-control form-control-dark mb-3" required>

            <div class="text-center d-none mt-3" id="previewBox">
              <img id="proofPreview" class="img-fluid rounded" style="max-height:220px;object-fit:contain;" alt="Proof">
              <small style="color:#444;display:block;margin-top:.5rem;">Preview</small>
            </div>
          </div>

          {{-- Warning notice --}}
          <div class="alert alert-warning mb-4">
            <div class="d-flex align-items-start gap-3">
              <i class="bi bi-exclamation-triangle-fill fs-4 mt-1"></i>
              <div>
                <strong class="d-block mb-2">Important Instructions:</strong>
                <ul class="mb-0 ps-3">
                  <li>Send the <strong>exact amount</strong> shown above</li>
                  <li>Upload a clear screenshot of your transfer</li>
                  <li>Confirmation takes <strong>5–30 minutes</strong></li>
                  <li>Double-check the wallet address before sending</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-success btn-lg px-5 py-3 fw-bold">
              <i class="bi bi-check-circle-fill me-2"></i> I Have Sent the Payment
            </button>
            <p style="color:#444;font-size:.78rem;margin-top:.8rem;">
              <i class="bi bi-shield-check me-1"></i> Your transaction is protected
            </p>
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
document.querySelectorAll('.nav-link').forEach(l => l.addEventListener('click', () => {
  if (window.innerWidth <= 768) { sidebar.classList.remove('active'); sidebarOverlay.classList.remove('active'); }
}));

// Selected gateway data
let selectedGateway = null;

function selectGateway(card) {
  // Remove selection from all
  document.querySelectorAll('.gateway-card').forEach(c => c.classList.remove('selected'));
  card.classList.add('selected');
  card.querySelector('input[type="radio"]').checked = true;

  selectedGateway = {
    id:      card.getAttribute('data-id'),
    name:    card.getAttribute('data-name'),
    symbol:  card.getAttribute('data-symbol'),
    network: card.getAttribute('data-network'),
    address: card.getAttribute('data-address'),
    qr:      card.getAttribute('data-qr'),
  };
}

// Proceed button
document.getElementById('proceedBtn').addEventListener('click', function(e) {
  const amount = document.getElementById('amount').value;

  if (!amount || parseFloat(amount) < 50) {
    e.stopImmediatePropagation();
    alert('Please enter a valid amount (minimum $50)');
    return false;
  }

  if (!selectedGateway) {
    e.stopImmediatePropagation();
    alert('Please select a payment method first.');
    return false;
  }

  // Fill modal
  document.getElementById('confirmAmount').textContent  = '$' + parseFloat(amount).toFixed(2);
  document.getElementById('totalDeposit').textContent   = '$' + parseFloat(amount).toFixed(2);
  document.getElementById('confirmMethod').textContent  = selectedGateway.name;
  document.getElementById('confirmNetwork').textContent = selectedGateway.network || '';
  document.getElementById('walletAddressDisplay').textContent = selectedGateway.address;

  // Hidden inputs for form
  document.getElementById('hiddenAmount').value     = amount;
  document.getElementById('hiddenMethod').value     = selectedGateway.symbol;
  document.getElementById('hiddenGatewayId').value  = selectedGateway.id;

  // QR code
  const qrContainer = document.getElementById('qrContainer');
  if (selectedGateway.qr && selectedGateway.qr.trim() !== '') {
    // Use uploaded QR image from admin
    qrContainer.innerHTML = `
      <div class="qr-box mx-auto" style="display:inline-block;">
        <img src="${selectedGateway.qr}" alt="QR Code" style="width:180px;height:180px;object-fit:contain;border-radius:8px;">
      </div>`;
  } else {
    // Auto-generate QR from address
    const qrUrl = `https://chart.googleapis.com/chart?chs=180x180&cht=qr&chl=${encodeURIComponent(selectedGateway.address)}&choe=UTF-8`;
    qrContainer.innerHTML = `
      <div class="qr-box mx-auto" style="display:inline-block;">
        <img src="${qrUrl}" alt="QR Code" style="width:180px;height:180px;">
      </div>`;
  }
});

// Copy address
function copyAddress() {
  const addr = document.getElementById('walletAddressDisplay').textContent;
  navigator.clipboard.writeText(addr).then(() => {
    alert('Wallet address copied!');
  }).catch(() => {
    // Fallback
    const el = document.createElement('textarea');
    el.value = addr;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
    alert('Wallet address copied!');
  });
}

// Amount live update
document.getElementById('amount').addEventListener('input', function() {
  document.getElementById('totalDeposit').textContent = '$' + parseFloat(this.value || 0).toFixed(2);
});

// Proof image preview
document.getElementById('proofInput').addEventListener('change', function() {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = e => {
      document.getElementById('proofPreview').src = e.target.result;
      document.getElementById('previewBox').classList.remove('d-none');
    };
    reader.readAsDataURL(file);
  }
});
</script>

</body>
</html>
