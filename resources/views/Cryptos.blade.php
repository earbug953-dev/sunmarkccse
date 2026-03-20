<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cryptos — Tesla Invest</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    :root {
      --red: #e31937;
      --red-dim: rgba(227,25,55,0.10);
      --dark: #0c0c0e;
      --dark2: #141416;
      --mid: #1e1e22;
      --border: rgba(255,255,255,0.08);
      --muted: rgba(255,255,255,0.45);
      --text: rgba(255,255,255,0.88);
      --green: #22c55e;
      --green-dim: rgba(34,197,94,0.10);
      --rose: #f43f5e;
      --rose-dim: rgba(244,63,94,0.10);
      --amber: #f59e0b;
      --amber-dim: rgba(245,158,11,0.10);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body {
      background: var(--dark);
      color: var(--text);
      font-family: 'DM Sans', sans-serif;
      font-weight: 300;
      overflow-x: hidden;
    }
    h1,h2,h3,h4,h5 { font-family: 'Cormorant Garamond', serif; }

    /* ── NAVBAR ── */
    .navbar {
      background: rgba(12,12,14,0.92);
      border-bottom: 1px solid var(--border);
      padding: 1.1rem 0;
    }
    .navbar-brand {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.55rem; font-weight: 600;
      letter-spacing: 0.12em; color: #fff !important;
    }
    .navbar-brand span { color: var(--red); }
    .nav-link {
      font-size: 0.75rem; letter-spacing: 0.14em; font-weight: 500;
      color: var(--muted) !important; text-transform: uppercase; transition: color 0.2s;
    }
    .nav-link:hover, .nav-link.active { color: #fff !important; }
    .dropdown-menu {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 10px; padding: 0.5rem;
    }
    .dropdown-item {
      color: var(--muted); font-size: 0.82rem; letter-spacing: 0.05em;
      border-radius: 6px; padding: 0.55rem 0.85rem; transition: all 0.15s;
    }
    .dropdown-item:hover { background: var(--mid); color: #fff; }
    .btn-outline-ghost {
      border: 1px solid var(--border); color: var(--muted); background: transparent;
      font-size: 0.75rem; letter-spacing: 0.12em; padding: 0.5rem 1.4rem;
      border-radius: 4px; transition: all 0.2s; text-decoration: none; display: inline-block;
    }
    .btn-outline-ghost:hover { border-color: rgba(255,255,255,0.25); color: #fff; }
    .btn-red {
      background: var(--red); border: none; color: #fff;
      font-size: 0.75rem; letter-spacing: 0.12em; padding: 0.5rem 1.4rem;
      border-radius: 4px; transition: background 0.2s; text-decoration: none; display: inline-block;
    }
    .btn-red:hover { background: #c0152e; color: #fff; }
    .offcanvas { background: var(--dark2) !important; }

    /* ── HERO ── */
    .crypto-hero {
      position: relative;
      min-height: 92vh;
      display: flex;
      align-items: center;
      overflow: hidden;
      padding-bottom: 52px;
    }

    /* Animated crypto particle bg */
    .hero-canvas {
      position: absolute;
      inset: 0;
      pointer-events: none;
      overflow: hidden;
    }
    .hero-canvas::before {
      content: '';
      position: absolute; inset: 0;
      background:
        radial-gradient(ellipse 55% 65% at 75% 40%, rgba(245,158,11,0.06) 0%, transparent 60%),
        radial-gradient(ellipse 40% 50% at 15% 70%, rgba(227,25,55,0.06) 0%, transparent 60%),
        radial-gradient(ellipse 30% 30% at 50% 10%, rgba(34,197,94,0.04) 0%, transparent 55%);
    }
    .grid-overlay {
      position: absolute; inset: 0;
      background-image:
        linear-gradient(to right, rgba(255,255,255,0.022) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.022) 1px, transparent 1px);
      background-size: 80px 80px;
      pointer-events: none;
    }

    /* floating coin icons */
    .floating-icon {
      position: absolute;
      font-size: 1.4rem;
      opacity: 0.06;
      animation: floatRandom linear infinite;
      pointer-events: none;
      user-select: none;
    }

    @keyframes floatRandom {
      0%   { transform: translateY(0) rotate(0deg); opacity: 0.06; }
      50%  { opacity: 0.09; }
      100% { transform: translateY(-120px) rotate(20deg); opacity: 0; }
    }

    /* ticker */
    .ticker-bg {
      position: absolute; bottom: 0; left: 0; right: 0;
      height: 52px; overflow: hidden;
      border-top: 1px solid var(--border);
      display: flex; align-items: center;
      background: rgba(12,12,14,0.7);
      backdrop-filter: blur(8px);
    }
    .ticker-track {
      display: flex; gap: 3rem;
      animation: tickerScroll 35s linear infinite;
      white-space: nowrap;
    }
    .ticker-item {
      font-size: 0.72rem; letter-spacing: 0.1em; font-weight: 500;
      display: flex; align-items: center; gap: 0.5rem;
    }
    .ticker-pair { color: rgba(255,255,255,0.5); }
    .ticker-price { color: #fff; }
    .ticker-up { color: var(--green); }
    .ticker-dn { color: var(--rose); }
    @keyframes tickerScroll {
      0%   { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }

    .hero-eyebrow {
      font-size: 0.7rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--amber); font-weight: 500;
      display: flex; align-items: center; gap: 12px; margin-bottom: 2rem;
    }
    .hero-eyebrow::before {
      content: ''; display: block; width: 36px; height: 1px; background: var(--amber);
    }
    .hero-title {
      font-size: clamp(3rem, 7vw, 5.8rem);
      font-weight: 300; line-height: 1.05; color: #fff; margin-bottom: 2rem;
    }
    .hero-title em { font-style: italic; color: var(--amber); }
    .hero-subtitle {
      font-size: clamp(0.95rem, 2vw, 1.1rem); line-height: 1.85;
      color: var(--muted); max-width: 460px; font-weight: 300;
    }
    .hero-cta-row { display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 2.8rem; }
    .btn-hero-amber {
      background: var(--amber); color: #000;
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: none; border-radius: 4px;
      text-decoration: none; transition: background 0.2s; display: inline-block; font-weight: 500;
    }
    .btn-hero-amber:hover { background: #d97706; color: #000; }
    .btn-hero-ghost {
      background: transparent; color: var(--muted);
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: 1px solid var(--border); border-radius: 4px;
      text-decoration: none; transition: all 0.2s; display: inline-block;
    }
    .btn-hero-ghost:hover { border-color: rgba(255,255,255,0.25); color: #fff; }

    /* ── CRYPTO CARDS PANEL ── */
    .crypto-panel {
      background: var(--dark2);
      border: 1px solid var(--border);
      border-radius: 18px;
      overflow: hidden;
    }
    .panel-header {
      padding: 1.2rem 1.6rem;
      border-bottom: 1px solid var(--border);
      display: flex; align-items: center; justify-content: space-between;
    }
    .panel-title {
      font-size: 0.7rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); font-weight: 500;
    }
    .live-dot {
      width: 7px; height: 7px; border-radius: 50%;
      background: var(--amber); display: inline-block; margin-right: 6px;
      animation: pulse 2s ease infinite;
    }
    @keyframes pulse {
      0%,100% { opacity:1; box-shadow: 0 0 0 0 rgba(245,158,11,0.4); }
      50%      { opacity:0.8; box-shadow: 0 0 0 5px rgba(245,158,11,0); }
    }
    .live-label { font-size: 0.68rem; letter-spacing: 0.15em; color: var(--amber); text-transform: uppercase; }

    .crypto-row {
      padding: 1rem 1.6rem;
      border-bottom: 1px solid var(--border);
      display: flex; align-items: center; justify-content: space-between; gap: 1rem;
      transition: background 0.15s; cursor: default;
    }
    .crypto-row:last-child { border-bottom: none; }
    .crypto-row:hover { background: var(--mid); }

    .coin-icon {
      width: 36px; height: 36px; border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.3rem; flex-shrink: 0;
    }
    .coin-name { font-size: 0.9rem; font-weight: 500; color: #fff; letter-spacing: 0.04em; }
    .coin-symbol { font-size: 0.72rem; color: var(--muted); margin-top: 2px; }
    .coin-price { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 400; color: #fff; }
    .coin-mcap { font-size: 0.7rem; color: var(--muted); text-align: right; margin-top: 2px; }

    .pair-change {
      font-size: 0.78rem; font-weight: 500;
      padding: 0.25rem 0.65rem; border-radius: 5px;
      min-width: 64px; text-align: center;
    }
    .change-up { background: var(--green-dim); color: var(--green); }
    .change-dn { background: var(--rose-dim); color: var(--rose); }

    .spark { display: flex; align-items: flex-end; gap: 2px; height: 28px; }
    .spark-bar { width: 3px; border-radius: 2px; background: var(--border); flex-shrink: 0; }
    .spark-bar.up { background: var(--green); }
    .spark-bar.dn { background: var(--rose); }

    /* ── MARKET CAP PILL ── */
    .mcap-pill {
      display: inline-flex; align-items: center; gap: 6px;
      background: var(--amber-dim);
      border: 1px solid rgba(245,158,11,0.2);
      border-radius: 30px;
      padding: 0.35rem 1rem;
      font-size: 0.72rem; letter-spacing: 0.1em;
      color: var(--amber); font-weight: 500;
      margin-bottom: 2rem;
    }

    /* ── NUMBERS STRIP ── */
    .numbers-strip { border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .num-item { text-align: center; padding: 3rem 1rem; border-right: 1px solid var(--border); }
    .num-item:last-child { border-right: none; }
    .big-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 3.2rem; font-weight: 300; color: #fff; line-height: 1;
    }
    .big-num sup { font-size: 1.3rem; color: var(--amber); vertical-align: super; font-weight: 400; }
    .num-desc { font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--muted); margin-top: 0.5rem; }

    /* ── SECTION HELPERS ── */
    .section-tag {
      font-size: 0.68rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--amber); font-weight: 500;
      display: inline-flex; align-items: center; gap: 10px; margin-bottom: 1.2rem;
    }
    .section-tag::after { content: ''; display: block; width: 28px; height: 1px; background: var(--amber); }
    .section-title { font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 300; color: #fff; line-height: 1.1; }

    /* ── FEATURE CARDS ── */
    .feature-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 14px; padding: 2rem; height: 100%;
      position: relative; overflow: hidden;
      transition: border-color 0.25s, transform 0.25s;
    }
    .feature-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0;
      height: 2px; background: var(--amber); opacity: 0; transition: opacity 0.25s;
    }
    .feature-card:hover { border-color: rgba(245,158,11,0.25); transform: translateY(-4px); }
    .feature-card:hover::before { opacity: 1; }
    .feature-icon {
      width: 46px; height: 46px; border-radius: 10px;
      background: var(--amber-dim);
      display: flex; align-items: center; justify-content: center;
      color: var(--amber); font-size: 1.35rem; margin-bottom: 1.3rem;
    }
    .feature-title { font-family: 'Cormorant Garamond', serif; font-size: 1.35rem; font-weight: 400; color: #fff; margin-bottom: 0.65rem; }
    .feature-text { font-size: 0.87rem; line-height: 1.8; color: var(--muted); }

    /* ── COIN TABLE ── */
    .coin-table-wrap {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 16px; overflow: hidden;
    }
    .coin-table-wrap table { margin: 0; }
    .coin-table-wrap thead tr {
      background: var(--mid); border-bottom: 1px solid var(--border);
    }
    .coin-table-wrap thead th {
      font-size: 0.68rem; letter-spacing: 0.2em; text-transform: uppercase;
      color: var(--muted); font-weight: 500; padding: 1rem 1.4rem; border: none;
    }
    .coin-table-wrap tbody tr {
      border-bottom: 1px solid var(--border); transition: background 0.15s;
    }
    .coin-table-wrap tbody tr:last-child { border-bottom: none; }
    .coin-table-wrap tbody tr:hover { background: var(--mid); }
    .coin-table-wrap tbody td {
      font-size: 0.86rem; color: var(--text);
      padding: 1rem 1.4rem; border: none; vertical-align: middle;
    }
    .coin-table-wrap tbody td:first-child { font-weight: 500; color: #fff; }

    .coin-badge {
      display: inline-flex; align-items: center; gap: 6px;
    }
    .coin-dot {
      width: 8px; height: 8px; border-radius: 50; display: inline-block;
    }

    /* ── STEPS ── */
    .steps-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .step-card { display: flex; gap: 1.4rem; align-items: flex-start; padding: 2rem 0; border-bottom: 1px solid var(--border); }
    .step-card:last-child { border-bottom: none; }
    .step-num {
      font-family: 'Cormorant Garamond', serif; font-size: 2.8rem;
      font-weight: 300; color: rgba(245,158,11,0.22); line-height: 1; min-width: 52px;
    }
    .step-title { font-size: 1.05rem; font-weight: 400; color: #fff; margin-bottom: 0.4rem; }
    .step-text { font-size: 0.86rem; color: var(--muted); line-height: 1.75; margin: 0; }

    /* ── RISK BANNER ── */
    .risk-banner {
      background: rgba(245,158,11,0.05);
      border: 1px solid rgba(245,158,11,0.15);
      border-radius: 12px;
      padding: 1.2rem 1.6rem;
      display: flex; gap: 1rem; align-items: flex-start;
    }
    .risk-icon { color: var(--amber); font-size: 1.3rem; flex-shrink: 0; margin-top: 2px; }
    .risk-text { font-size: 0.82rem; color: var(--muted); line-height: 1.7; }
    .risk-text strong { color: var(--amber); font-weight: 500; }

    /* ── CTA BAND ── */
    .cta-band {
      background: linear-gradient(135deg, rgba(245,158,11,0.07) 0%, transparent 55%), var(--dark2);
      border-top: 1px solid rgba(245,158,11,0.12);
      border-bottom: 1px solid rgba(245,158,11,0.12);
    }

    /* ── FOOTER ── */
    footer { background: var(--dark2); border-top: 1px solid var(--border); }
    .footer-brand { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 600; letter-spacing: 0.12em; color: #fff; }
    .footer-brand span { color: var(--red); }
    .footer-tagline { font-size: 0.82rem; color: var(--muted); line-height: 1.7; max-width: 260px; margin-top: 0.8rem; }
    .footer-heading { font-size: 0.68rem; letter-spacing: 0.22em; text-transform: uppercase; color: rgba(255,255,255,0.3); margin-bottom: 1.2rem; font-weight: 500; }
    .footer-link { color: var(--muted); text-decoration: none; font-size: 0.85rem; display: block; margin-bottom: 0.65rem; transition: color 0.2s; }
    .footer-link:hover { color: #fff; }
    .footer-bottom { border-top: 1px solid var(--border); padding: 1.4rem 0; }
    .footer-bottom p { font-size: 0.75rem; color: rgba(255,255,255,0.25); margin: 0; }
    .table{
        bg:var(--dark);
    }
    /* ── ANIMATIONS ── */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(28px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .fade-up   { animation: fadeUp 0.7s ease both; }
    .fade-up-1 { animation-delay: 0.10s; }
    .fade-up-2 { animation-delay: 0.22s; }
    .fade-up-3 { animation-delay: 0.34s; }
    .fade-up-4 { animation-delay: 0.46s; }

    @media (max-width: 991px) {
      .num-item { border-right: none; border-bottom: 1px solid var(--border); }
      .num-item:last-child { border-bottom: none; }
    }
  </style>
</head>
<body>

<x-header active="cryptos" />

<!-- ── HERO ── -->
<section class="crypto-hero pt-5">
  <div class="hero-canvas"></div>
  <div class="grid-overlay"></div>

  <!-- Floating coin symbols (decorative) -->
  <span class="floating-icon" style="left:8%;top:25%;animation-duration:12s;animation-delay:0s;">₿</span>
  <span class="floating-icon" style="left:82%;top:18%;animation-duration:15s;animation-delay:2s;">Ξ</span>
  <span class="floating-icon" style="left:55%;top:60%;animation-duration:10s;animation-delay:4s;">◎</span>
  <span class="floating-icon" style="left:22%;top:70%;animation-duration:13s;animation-delay:1s;">Ł</span>
  <span class="floating-icon" style="left:90%;top:55%;animation-duration:11s;animation-delay:3s;">₿</span>
  <span class="floating-icon" style="left:38%;top:15%;animation-duration:16s;animation-delay:5s;">Ξ</span>

  <div class="container py-5 mt-4" style="padding-bottom: 5rem !important;">
    <div class="row align-items-center g-5">

      <!-- Left -->
      <div class="col-lg-6">
        <div class="mcap-pill fade-up">
          <span class="live-dot"></span> Global Crypto Market Cap: $2.84T
        </div>
        <div class="hero-eyebrow fade-up">Markets — Crypto</div>
        <h1 class="hero-title fade-up fade-up-1">
          Ride the<br>digital asset<br><em>revolution.</em>
        </h1>
        <p class="hero-subtitle fade-up fade-up-2">
          Trade 50+ cryptocurrency CFDs — including Bitcoin, Ethereum, Solana, and more — with no wallet required, competitive spreads, and up to 200:1 leverage.
        </p>
        <div class="hero-cta-row fade-up fade-up-3">
          <a href="#" class="btn-hero-amber">Start Trading</a>
          <a href="#" class="btn-hero-ghost">View All Coins</a>
        </div>
      </div>

      <!-- Right — Live Crypto Panel -->
      <div class="col-lg-5 offset-lg-1 fade-up fade-up-4">
        <div class="crypto-panel">
          <div class="panel-header">
            <div class="panel-title">Top Cryptos</div>
            <div><span class="live-dot"></span><span class="live-label">Live</span></div>
          </div>

          <!-- BTC -->
          <div class="crypto-row">
            <div class="d-flex align-items-center gap-3">
              <div class="coin-icon" style="background:rgba(247,147,26,0.12);">₿</div>
              <div>
                <div class="coin-name">Bitcoin</div>
                <div class="coin-symbol">BTC / USD</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar dn" style="height:60%"></div>
              <div class="spark-bar dn" style="height:45%"></div>
              <div class="spark-bar up" style="height:55%"></div>
              <div class="spark-bar up" style="height:70%"></div>
              <div class="spark-bar up" style="height:85%"></div>
              <div class="spark-bar up" style="height:95%"></div>
              <div class="spark-bar up" style="height:100%"></div>
            </div>
            <div class="text-end">
              <div class="coin-price">$94,280</div>
              <div class="coin-mcap">MCap $1.86T</div>
            </div>
            <div class="pair-change change-up">+2.41%</div>
          </div>

          <!-- ETH -->
          <div class="crypto-row">
            <div class="d-flex align-items-center gap-3">
              <div class="coin-icon" style="background:rgba(98,126,234,0.12);">Ξ</div>
              <div>
                <div class="coin-name">Ethereum</div>
                <div class="coin-symbol">ETH / USD</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:75%"></div>
              <div class="spark-bar dn" style="height:60%"></div>
              <div class="spark-bar dn" style="height:45%"></div>
              <div class="spark-bar up" style="height:55%"></div>
              <div class="spark-bar dn" style="height:40%"></div>
              <div class="spark-bar dn" style="height:30%"></div>
              <div class="spark-bar dn" style="height:22%"></div>
            </div>
            <div class="text-end">
              <div class="coin-price">$3,412</div>
              <div class="coin-mcap">MCap $410B</div>
            </div>
            <div class="pair-change change-dn">−1.83%</div>
          </div>

          <!-- SOL -->
          <div class="crypto-row">
            <div class="d-flex align-items-center gap-3">
              <div class="coin-icon" style="background:rgba(153,69,255,0.12);">◎</div>
              <div>
                <div class="coin-name">Solana</div>
                <div class="coin-symbol">SOL / USD</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:30%"></div>
              <div class="spark-bar up" style="height:50%"></div>
              <div class="spark-bar up" style="height:65%"></div>
              <div class="spark-bar up" style="height:80%"></div>
              <div class="spark-bar dn" style="height:70%"></div>
              <div class="spark-bar up" style="height:88%"></div>
              <div class="spark-bar up" style="height:100%"></div>
            </div>
            <div class="text-end">
              <div class="coin-price">$186.54</div>
              <div class="coin-mcap">MCap $88B</div>
            </div>
            <div class="pair-change change-up">+4.07%</div>
          </div>

          <!-- BNB -->
          <div class="crypto-row">
            <div class="d-flex align-items-center gap-3">
              <div class="coin-icon" style="background:rgba(243,186,47,0.12);">B</div>
              <div>
                <div class="coin-name">BNB</div>
                <div class="coin-symbol">BNB / USD</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar dn" style="height:80%"></div>
              <div class="spark-bar dn" style="height:65%"></div>
              <div class="spark-bar dn" style="height:50%"></div>
              <div class="spark-bar up" style="height:60%"></div>
              <div class="spark-bar dn" style="height:48%"></div>
              <div class="spark-bar dn" style="height:35%"></div>
              <div class="spark-bar dn" style="height:28%"></div>
            </div>
            <div class="text-end">
              <div class="coin-price">$612.30</div>
              <div class="coin-mcap">MCap $89B</div>
            </div>
            <div class="pair-change change-dn">−0.95%</div>
          </div>

          <!-- XRP -->
          <div class="crypto-row">
            <div class="d-flex align-items-center gap-3">
              <div class="coin-icon" style="background:rgba(0,170,228,0.12);">✕</div>
              <div>
                <div class="coin-name">XRP</div>
                <div class="coin-symbol">XRP / USD</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:40%"></div>
              <div class="spark-bar up" style="height:55%"></div>
              <div class="spark-bar up" style="height:70%"></div>
              <div class="spark-bar dn" style="height:60%"></div>
              <div class="spark-bar up" style="height:72%"></div>
              <div class="spark-bar up" style="height:82%"></div>
              <div class="spark-bar up" style="height:90%"></div>
            </div>
            <div class="text-end">
              <div class="coin-price">$0.5841</div>
              <div class="coin-mcap">MCap $33B</div>
            </div>
            <div class="pair-change change-up">+1.22%</div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Ticker -->
  <div class="ticker-bg">
    <div class="ticker-track">
      <span class="ticker-item"><span class="ticker-pair">BTC/USD</span><span class="ticker-price">$94,280</span><span class="ticker-up">▲ 2.41%</span></span>
      <span class="ticker-item"><span class="ticker-pair">ETH/USD</span><span class="ticker-price">$3,412</span><span class="ticker-dn">▼ 1.83%</span></span>
      <span class="ticker-item"><span class="ticker-pair">SOL/USD</span><span class="ticker-price">$186.54</span><span class="ticker-up">▲ 4.07%</span></span>
      <span class="ticker-item"><span class="ticker-pair">BNB/USD</span><span class="ticker-price">$612.30</span><span class="ticker-dn">▼ 0.95%</span></span>
      <span class="ticker-item"><span class="ticker-pair">XRP/USD</span><span class="ticker-price">$0.5841</span><span class="ticker-up">▲ 1.22%</span></span>
      <span class="ticker-item"><span class="ticker-pair">ADA/USD</span><span class="ticker-price">$0.4512</span><span class="ticker-up">▲ 0.88%</span></span>
      <span class="ticker-item"><span class="ticker-pair">DOGE/USD</span><span class="ticker-price">$0.1624</span><span class="ticker-dn">▼ 2.14%</span></span>
      <span class="ticker-item"><span class="ticker-pair">AVAX/USD</span><span class="ticker-price">$38.72</span><span class="ticker-up">▲ 3.50%</span></span>
      <!-- duplicate -->
      <span class="ticker-item"><span class="ticker-pair">BTC/USD</span><span class="ticker-price">$94,280</span><span class="ticker-up">▲ 2.41%</span></span>
      <span class="ticker-item"><span class="ticker-pair">ETH/USD</span><span class="ticker-price">$3,412</span><span class="ticker-dn">▼ 1.83%</span></span>
      <span class="ticker-item"><span class="ticker-pair">SOL/USD</span><span class="ticker-price">$186.54</span><span class="ticker-up">▲ 4.07%</span></span>
      <span class="ticker-item"><span class="ticker-pair">BNB/USD</span><span class="ticker-price">$612.30</span><span class="ticker-dn">▼ 0.95%</span></span>
      <span class="ticker-item"><span class="ticker-pair">XRP/USD</span><span class="ticker-price">$0.5841</span><span class="ticker-up">▲ 1.22%</span></span>
      <span class="ticker-item"><span class="ticker-pair">ADA/USD</span><span class="ticker-price">$0.4512</span><span class="ticker-up">▲ 0.88%</span></span>
      <span class="ticker-item"><span class="ticker-pair">DOGE/USD</span><span class="ticker-price">$0.1624</span><span class="ticker-dn">▼ 2.14%</span></span>
      <span class="ticker-item"><span class="ticker-pair">AVAX/USD</span><span class="ticker-price">$38.72</span><span class="ticker-up">▲ 3.50%</span></span>
    </div>
  </div>
</section>

<!-- ── NUMBERS STRIP ── -->
<div class="numbers-strip">
  <div class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">50<sup>+</sup></div>
        <div class="num-desc">Crypto CFDs</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">200<sup>:1</sup></div>
        <div class="num-desc">Max Leverage</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">24<sup>/7</sup></div>
        <div class="num-desc">Trading Hours</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">0%<sup> </sup></div>
        <div class="num-desc">Commission</div>
      </div>
    </div>
  </div>
</div>

<!-- ── WHY CRYPTO ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row g-4 align-items-start">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="section-tag">Why Crypto CFDs</div>
        <h2 class="section-title">Digital assets,<br>no digital wallet.</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:320px;">
          Trade crypto price movements through CFDs — no wallets, no private keys, no exchange hacks. Just pure price exposure with full trading tools.
        </p>
        <div class="mt-4">
          <div class="risk-banner">
            <div class="risk-icon"><i class="uil uil-exclamation-triangle"></i></div>
            <div class="risk-text"><strong>Volatility Notice:</strong> Crypto markets can move significantly. Use stop-loss orders and only trade what you can afford to lose.</div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="row g-3">
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-wallet"></i></div>
              <div class="feature-title">No Wallet Needed</div>
              <p class="feature-text">Trade crypto prices directly — no blockchain wallets, no seed phrases, no custody risk. Your funds stay in your trading account.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-moon"></i></div>
              <div class="feature-title">24/7 Markets</div>
              <p class="feature-text">Unlike forex and equities, crypto never closes. Trade Bitcoin at midnight on a Sunday or Solana on Christmas day — the market is always open.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-arrows-v"></i></div>
              <div class="feature-title">Long &amp; Short</div>
              <p class="feature-text">Go long in bull markets or short during crashes. CFD trading lets you profit from both directions, giving you twice the opportunity.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-layer-group"></i></div>
              <div class="feature-title">Wide Selection</div>
              <p class="feature-text">From Bitcoin and Ethereum to Solana, Avalanche, Polkadot and beyond — access 50+ crypto CFDs all from one unified platform.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── COIN TABLE ── -->
<section class="py-5" style="background:var(--dark2);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
  <div class="container py-3">
    <div class="row align-items-start g-5">
      <div class="col-lg-4">
        <div class="section-tag">Instrument Specs</div>
        <h2 class="section-title">Coins &amp;<br>conditions</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:310px;">
          Zero commission on all crypto CFDs. Spreads are competitive and fully transparent with no hidden markups.
        </p>
        <a href="#" class="btn-hero-amber mt-4 d-inline-block">Open Account</a>
      </div>
      <div class="col-lg-8">
        <div class="coin-table-wrap">
          <table class="table table-borderless mb-0">
            <thead>
              <tr>
                <th>Coin</th>
                <th>Spread (avg)</th>
                <th>Leverage</th>
                <th>Min Trade</th>
                <th>24h Change</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="coin-badge"><span class="coin-dot" style="background:#f7931a;border-radius:50%"></span>Bitcoin (BTC)</span></td>
                <td>0.50%</td>
                <td>1:200</td>
                <td>0.001 BTC</td>
                <td style="color:var(--green)">+2.41%</td>
              </tr>
              <tr>
                <td><span class="coin-badge"><span class="coin-dot" style="background:#627eea;border-radius:50%"></span>Ethereum (ETH)</span></td>
                <td>0.60%</td>
                <td>1:150</td>
                <td>0.01 ETH</td>
                <td style="color:var(--rose)">−1.83%</td>
              </tr>
              <tr>
                <td><span class="coin-badge"><span class="coin-dot" style="background:#9945ff;border-radius:50%"></span>Solana (SOL)</span></td>
                <td>0.80%</td>
                <td>1:100</td>
                <td>0.1 SOL</td>
                <td style="color:var(--green)">+4.07%</td>
              </tr>
              <tr>
                <td><span class="coin-badge"><span class="coin-dot" style="background:#f3ba2f;border-radius:50%"></span>BNB (BNB)</span></td>
                <td>0.75%</td>
                <td>1:100</td>
                <td>0.01 BNB</td>
                <td style="color:var(--rose)">−0.95%</td>
              </tr>
              <tr>
                <td><span class="coin-badge"><span class="coin-dot" style="background:#00aae4;border-radius:50%"></span>XRP (XRP)</span></td>
                <td>0.90%</td>
                <td>1:75</td>
                <td>10 XRP</td>
                <td style="color:var(--green)">+1.22%</td>
              </tr>
              <tr>
                <td><span class="coin-badge"><span class="coin-dot" style="background:#e84142;border-radius:50%"></span>Avalanche (AVAX)</span></td>
                <td>1.20%</td>
                <td>1:50</td>
                <td>0.1 AVAX</td>
                <td style="color:var(--green)">+3.50%</td>
              </tr>
              <tr>
                <td><span class="coin-badge"><span class="coin-dot" style="background:#c2a633;border-radius:50%"></span>Dogecoin (DOGE)</span></td>
                <td>1.50%</td>
                <td>1:50</td>
                <td>100 DOGE</td>
                <td style="color:var(--rose)">−2.14%</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── HOW TO START ── -->
<section class="steps-section py-5">
  <div class="container py-3">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="section-tag">Get Started</div>
        <h2 class="section-title">Trade crypto<br>in three steps</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;">
          No crypto exchange account needed. No gas fees. No technical setup. Just open your trading account and go.
        </p>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="step-card">
          <div class="step-num">01</div>
          <div>
            <div class="step-title">Register &amp; Verify</div>
            <p class="step-text">Sign up in minutes with your email and complete our streamlined KYC process. We verify identities quickly so you can get trading fast.</p>
          </div>
        </div>
        <div class="step-card">
          <div class="step-num">02</div>
          <div>
            <div class="step-title">Deposit Funds</div>
            <p class="step-text">Fund your account via bank transfer, card, or even crypto. Your balance is credited instantly and ready to deploy across all markets.</p>
          </div>
        </div>
        <div class="step-card">
          <div class="step-num">03</div>
          <div>
            <div class="step-title">Open Your First Trade</div>
            <p class="step-text">Choose your coin, set your position size, choose leverage, and hit buy or sell. Set stop-loss and take-profit levels to manage your risk automatically.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── CTA BAND ── -->
<section class="cta-band py-5">
  <div class="container py-3 text-center">
    <div class="section-tag d-inline-flex">Ready to Trade</div>
    <h2 class="section-title mt-1 mx-auto" style="max-width:560px;">The crypto market<br>never sleeps. Neither do we.</h2>
    <p class="mt-3 mx-auto" style="font-size:0.92rem;color:var(--muted);line-height:1.8;max-width:440px;">
      Open a live account now or test your strategy risk-free with a $10,000 virtual demo. No commitment, no deposit required.
    </p>
    <div class="d-flex gap-3 justify-content-center flex-wrap mt-4">
      <a href="#" class="btn-hero-amber">Open Live Account</a>
      <a href="#" class="btn-hero-ghost">Try Demo Account</a>
    </div>
  </div>
</section>

<!-- ── FOOTER ── -->
<footer class="py-5">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="footer-brand">TESLA<span>.</span>INVEST</div>
        <p class="footer-tagline">One of the world's largest exchange-listed FX &amp; CFD brokers. Regulated. Reliable. Results-driven.</p>
      </div>
      <x-footer />
    </div>
    <div class="footer-bottom mt-5">
      <p>© <span id="year"></span> TESLA INVEST. All rights reserved. Crypto CFD trading carries significant risk of loss. This is a fictional demo site for illustrative purposes only.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>document.getElementById("year").textContent = new Date().getFullYear();</script>
</body>
</html>
