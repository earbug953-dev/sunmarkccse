<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Shares — Tesla Invest</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    :root {
      --blue: #3b82f6;
      --blue-dim: rgba(59,130,246,0.10);
      --blue-glow: rgba(59,130,246,0.06);
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
      --red: #e31937;
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

    .table{
        bg:var(--dark);
    }
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
    .shares-hero {
      position: relative;
      min-height: 92vh;
      display: flex;
      align-items: center;
      overflow: hidden;
      padding-bottom: 52px;
    }
    .hero-canvas {
      position: absolute; inset: 0; pointer-events: none; overflow: hidden;
    }
    .hero-canvas::before {
      content: '';
      position: absolute; inset: 0;
      background:
        radial-gradient(ellipse 60% 55% at 70% 40%, var(--blue-glow) 0%, transparent 60%),
        radial-gradient(ellipse 40% 45% at 5% 80%, rgba(59,130,246,0.04) 0%, transparent 60%),
        radial-gradient(ellipse 25% 30% at 45% 10%, rgba(34,197,94,0.03) 0%, transparent 55%);
    }
    .grid-overlay {
      position: absolute; inset: 0;
      background-image:
        linear-gradient(to right, rgba(255,255,255,0.022) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.022) 1px, transparent 1px);
      background-size: 80px 80px;
      pointer-events: none;
    }

    /* Animated chart line in background */
    .bg-chart {
      position: absolute;
      bottom: 52px; left: 0; right: 0;
      height: 200px;
      pointer-events: none;
      opacity: 0.04;
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
      animation: tickerScroll 40s linear infinite;
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

    .market-pill {
      display: inline-flex; align-items: center; gap: 6px;
      background: var(--blue-dim);
      border: 1px solid rgba(59,130,246,0.2);
      border-radius: 30px;
      padding: 0.35rem 1rem;
      font-size: 0.72rem; letter-spacing: 0.1em;
      color: var(--blue); font-weight: 500;
      margin-bottom: 2rem;
    }

    .hero-eyebrow {
      font-size: 0.7rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--blue); font-weight: 500;
      display: flex; align-items: center; gap: 12px; margin-bottom: 2rem;
    }
    .hero-eyebrow::before {
      content: ''; display: block; width: 36px; height: 1px; background: var(--blue);
    }
    .hero-title {
      font-size: clamp(3rem, 7vw, 5.8rem);
      font-weight: 300; line-height: 1.05; color: #fff; margin-bottom: 2rem;
    }
    .hero-title em { font-style: italic; color: var(--blue); }
    .hero-subtitle {
      font-size: clamp(0.95rem, 2vw, 1.1rem); line-height: 1.85;
      color: var(--muted); max-width: 460px; font-weight: 300;
    }
    .hero-cta-row { display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 2.8rem; }
    .btn-hero-blue {
      background: var(--blue); color: #fff;
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: none; border-radius: 4px;
      text-decoration: none; transition: background 0.2s; display: inline-block; font-weight: 500;
    }
    .btn-hero-blue:hover { background: #2563eb; color: #fff; }
    .btn-hero-ghost {
      background: transparent; color: var(--muted);
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: 1px solid var(--border); border-radius: 4px;
      text-decoration: none; transition: all 0.2s; display: inline-block;
    }
    .btn-hero-ghost:hover { border-color: rgba(255,255,255,0.25); color: #fff; }

    /* ── SHARES PANEL ── */
    .shares-panel {
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
    .panel-title { font-size: 0.7rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); font-weight: 500; }

    /* Market status tabs */
    .market-tabs {
      display: flex; gap: 0.4rem;
    }
    .mkt-tab {
      font-size: 0.65rem; letter-spacing: 0.12em; text-transform: uppercase;
      padding: 0.22rem 0.7rem; border-radius: 4px; font-weight: 500;
      border: 1px solid var(--border); color: var(--muted); cursor: default;
    }
    .mkt-tab.open { border-color: rgba(34,197,94,0.3); color: var(--green); background: var(--green-dim); }
    .mkt-tab.closed { border-color: rgba(255,255,255,0.1); color: rgba(255,255,255,0.3); }

    .live-dot-blue {
      width: 7px; height: 7px; border-radius: 50%;
      background: var(--blue); display: inline-block; margin-right: 6px;
      animation: pulseBlue 2s ease infinite;
    }
    @keyframes pulseBlue {
      0%,100% { opacity:1; box-shadow: 0 0 0 0 rgba(59,130,246,0.4); }
      50%      { opacity:0.8; box-shadow: 0 0 0 5px rgba(59,130,246,0); }
    }
    .live-label { font-size: 0.68rem; letter-spacing: 0.15em; color: var(--blue); text-transform: uppercase; }

    .share-row {
      padding: 0.9rem 1.6rem;
      border-bottom: 1px solid var(--border);
      display: flex; align-items: center; justify-content: space-between; gap: 1rem;
      transition: background 0.15s; cursor: default;
    }
    .share-row:last-child { border-bottom: none; }
    .share-row:hover { background: var(--mid); }

    .share-logo {
      width: 36px; height: 36px; border-radius: 8px;
      display: flex; align-items: center; justify-content: center;
      font-size: 0.75rem; font-weight: 700; letter-spacing: 0.04em;
      flex-shrink: 0; font-family: 'DM Sans', sans-serif;
    }
    .share-name { font-size: 0.88rem; font-weight: 500; color: #fff; }
    .share-ticker-label { font-size: 0.7rem; color: var(--muted); margin-top: 2px; }
    .share-price { font-family: 'Cormorant Garamond', serif; font-size: 1.35rem; font-weight: 400; color: #fff; }
    .share-vol { font-size: 0.7rem; color: var(--muted); text-align: right; margin-top: 2px; }

    .pair-change {
      font-size: 0.78rem; font-weight: 500;
      padding: 0.25rem 0.65rem; border-radius: 5px;
      min-width: 64px; text-align: center;
    }
    .change-up { background: var(--green-dim); color: var(--green); }
    .change-dn { background: var(--rose-dim); color: var(--rose); }

    .spark { display: flex; align-items: flex-end; gap: 2px; height: 26px; }
    .spark-bar { width: 3px; border-radius: 2px; background: var(--border); flex-shrink: 0; }
    .spark-bar.up { background: var(--green); }
    .spark-bar.dn { background: var(--rose); }

    /* ── EXCHANGE BADGES ── */
    .exchange-strip {
      border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);
      overflow: hidden;
    }
    .exchange-track {
      display: flex; align-items: center; gap: 3rem;
      animation: tickerScroll 25s linear infinite;
      white-space: nowrap; padding: 1.2rem 0;
    }
    .exchange-badge {
      display: inline-flex; align-items: center; gap: 8px;
      font-size: 0.72rem; letter-spacing: 0.15em; text-transform: uppercase;
      color: rgba(255,255,255,0.3); font-weight: 500; flex-shrink: 0;
    }
    .exchange-dot { width: 6px; height: 6px; border-radius: 50%; background: var(--border); }

    /* ── NUMBERS STRIP ── */
    .numbers-strip { border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .num-item { text-align: center; padding: 3rem 1rem; border-right: 1px solid var(--border); }
    .num-item:last-child { border-right: none; }
    .big-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 3.2rem; font-weight: 300; color: #fff; line-height: 1;
    }
    .big-num sup { font-size: 1.3rem; color: var(--blue); vertical-align: super; font-weight: 400; }
    .num-desc { font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--muted); margin-top: 0.5rem; }

    /* ── SECTION HELPERS ── */
    .section-tag {
      font-size: 0.68rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--blue); font-weight: 500;
      display: inline-flex; align-items: center; gap: 10px; margin-bottom: 1.2rem;
    }
    .section-tag::after { content: ''; display: block; width: 28px; height: 1px; background: var(--blue); }
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
      height: 2px; background: var(--blue); opacity: 0; transition: opacity 0.25s;
    }
    .feature-card:hover { border-color: rgba(59,130,246,0.25); transform: translateY(-4px); }
    .feature-card:hover::before { opacity: 1; }
    .feature-icon {
      width: 46px; height: 46px; border-radius: 10px;
      background: var(--blue-dim);
      display: flex; align-items: center; justify-content: center;
      color: var(--blue); font-size: 1.35rem; margin-bottom: 1.3rem;
    }
    .feature-title { font-family: 'Cormorant Garamond', serif; font-size: 1.35rem; font-weight: 400; color: #fff; margin-bottom: 0.65rem; }
    .feature-text { font-size: 0.87rem; line-height: 1.8; color: var(--muted); }

    /* ── SECTOR GRID ── */
    .sector-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 0.75rem; }
    .sector-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 12px; padding: 1.2rem;
      transition: border-color 0.2s, transform 0.2s;
      cursor: default;
    }
    .sector-card:hover { border-color: rgba(59,130,246,0.25); transform: translateY(-3px); }
    .sector-icon { font-size: 1.4rem; margin-bottom: 0.6rem; }
    .sector-name { font-size: 0.8rem; font-weight: 500; color: #fff; margin-bottom: 0.2rem; }
    .sector-count { font-size: 0.68rem; color: var(--muted); letter-spacing: 0.05em; }

    /* ── STOCKS TABLE ── */
    .stocks-table-wrap {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 16px; overflow: hidden;
    }
    .stocks-table-wrap table { margin: 0; }
    .stocks-table-wrap thead tr { background: var(--mid); border-bottom: 1px solid var(--border); }
    .stocks-table-wrap thead th {
      font-size: 0.68rem; letter-spacing: 0.2em; text-transform: uppercase;
      color: var(--muted); font-weight: 500; padding: 1rem 1.4rem; border: none;
    }
    .stocks-table-wrap tbody tr { border-bottom: 1px solid var(--border); transition: background 0.15s; }
    .stocks-table-wrap tbody tr:last-child { border-bottom: none; }
    .stocks-table-wrap tbody tr:hover { background: var(--mid); }
    .stocks-table-wrap tbody td {
      font-size: 0.86rem; color: var(--text);
      padding: 0.95rem 1.4rem; border: none; vertical-align: middle;
    }
    .stocks-table-wrap tbody td:first-child { font-weight: 500; color: #fff; }

    .exch-pill {
      font-size: 0.6rem; letter-spacing: 0.1em; text-transform: uppercase;
      padding: 0.2rem 0.55rem; border-radius: 4px; margin-left: 0.4rem;
    }
    .exch-nyse { background: rgba(59,130,246,0.12); color: var(--blue); }
    .exch-nasdaq { background: rgba(99,102,241,0.12); color: #818cf8; }
    .exch-lse { background: rgba(245,158,11,0.1); color: #fbbf24; }

    /* ── STEPS ── */
    .steps-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .step-card { display: flex; gap: 1.4rem; align-items: flex-start; padding: 2rem 0; border-bottom: 1px solid var(--border); }
    .step-card:last-child { border-bottom: none; }
    .step-num {
      font-family: 'Cormorant Garamond', serif; font-size: 2.8rem;
      font-weight: 300; color: rgba(59,130,246,0.22); line-height: 1; min-width: 52px;
    }
    .step-title { font-size: 1.05rem; font-weight: 400; color: #fff; margin-bottom: 0.4rem; }
    .step-text { font-size: 0.86rem; color: var(--muted); line-height: 1.75; margin: 0; }

    /* ── CTA ── */
    .cta-band {
      background: linear-gradient(135deg, rgba(59,130,246,0.07) 0%, transparent 55%), var(--dark2);
      border-top: 1px solid rgba(59,130,246,0.12);
      border-bottom: 1px solid rgba(59,130,246,0.12);
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
      .sector-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 575px) {
      .sector-grid { grid-template-columns: repeat(2, 1fr); }
    }
  </style>
</head>
<body>

<!-- ── NAVBAR ── -->
<x-header />
<!-- ── HERO ── -->
<section class="shares-hero pt-5">
  <div class="hero-canvas"></div>
  <div class="grid-overlay"></div>

  <!-- Subtle background SVG chart line -->
  <svg class="bg-chart" viewBox="0 0 1440 200" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <polyline points="0,160 80,140 160,150 240,110 320,120 400,90 480,100 560,70 640,80 720,55 800,65 880,40 960,50 1040,30 1120,42 1200,20 1280,28 1360,10 1440,18"
      fill="none" stroke="#3b82f6" stroke-width="2"/>
  </svg>

  <div class="container py-5 mt-4" style="padding-bottom:5rem !important;">
    <div class="row align-items-center g-5">

      <!-- Left -->
      <div class="col-lg-6">
        <div class="market-pill fade-up">
          <span class="live-dot-blue"></span> NYSE &amp; NASDAQ Markets Open
        </div>
        <div class="hero-eyebrow fade-up">Markets — Shares</div>
        <h1 class="hero-title fade-up fade-up-1">
          Own a slice of<br>the world's<br><em>best companies.</em>
        </h1>
        <p class="hero-subtitle fade-up fade-up-2">
          Trade CFDs on 500+ global shares — from Apple and Tesla to HSBC and Nestlé — with zero commission, flexible leverage, and real-time pricing from the world's top exchanges.
        </p>
        <div class="hero-cta-row fade-up fade-up-3">
          <a href="#" class="btn-hero-blue">Start Trading</a>
          <a href="#" class="btn-hero-ghost">Browse Stocks</a>
        </div>
      </div>

      <!-- Right — Live Shares Panel -->
      <div class="col-lg-5 offset-lg-1 fade-up fade-up-4">
        <div class="shares-panel">
          <div class="panel-header">
            <div class="panel-title">Top Shares</div>
            <div class="market-tabs">
              <span class="mkt-tab open">NYSE ●</span>
              <span class="mkt-tab open">NASDAQ ●</span>
              <span class="mkt-tab closed">LSE ○</span>
            </div>
          </div>

          <!-- AAPL -->
          <div class="share-row">
            <div class="d-flex align-items-center gap-3">
              <div class="share-logo" style="background:rgba(255,255,255,0.06);color:#fff;">AAPL</div>
              <div>
                <div class="share-name">Apple Inc.</div>
                <div class="share-ticker-label">NASDAQ · Technology</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar dn" style="height:50%"></div>
              <div class="spark-bar up" style="height:62%"></div>
              <div class="spark-bar up" style="height:74%"></div>
              <div class="spark-bar dn" style="height:65%"></div>
              <div class="spark-bar up" style="height:78%"></div>
              <div class="spark-bar up" style="height:90%"></div>
              <div class="spark-bar up" style="height:100%"></div>
            </div>
            <div class="text-end">
              <div class="share-price">$224.30</div>
              <div class="share-vol">Vol 48.2M</div>
            </div>
            <div class="pair-change change-up">+1.34%</div>
          </div>

          <!-- MSFT -->
          <div class="share-row">
            <div class="d-flex align-items-center gap-3">
              <div class="share-logo" style="background:rgba(0,120,212,0.15);color:#4da3ff;">MSFT</div>
              <div>
                <div class="share-name">Microsoft</div>
                <div class="share-ticker-label">NASDAQ · Technology</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:80%"></div>
              <div class="spark-bar dn" style="height:65%"></div>
              <div class="spark-bar dn" style="height:52%"></div>
              <div class="spark-bar up" style="height:60%"></div>
              <div class="spark-bar dn" style="height:48%"></div>
              <div class="spark-bar dn" style="height:38%"></div>
              <div class="spark-bar dn" style="height:28%"></div>
            </div>
            <div class="text-end">
              <div class="share-price">$415.72</div>
              <div class="share-vol">Vol 21.5M</div>
            </div>
            <div class="pair-change change-dn">−0.88%</div>
          </div>

          <!-- NVDA -->
          <div class="share-row">
            <div class="d-flex align-items-center gap-3">
              <div class="share-logo" style="background:rgba(118,185,0,0.15);color:#84cc16;">NVDA</div>
              <div>
                <div class="share-name">NVIDIA</div>
                <div class="share-ticker-label">NASDAQ · Semiconductors</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:30%"></div>
              <div class="spark-bar up" style="height:48%"></div>
              <div class="spark-bar up" style="height:62%"></div>
              <div class="spark-bar up" style="height:78%"></div>
              <div class="spark-bar up" style="height:88%"></div>
              <div class="spark-bar up" style="height:95%"></div>
              <div class="spark-bar up" style="height:100%"></div>
            </div>
            <div class="text-end">
              <div class="share-price">$875.40</div>
              <div class="share-vol">Vol 62.1M</div>
            </div>
            <div class="pair-change change-up">+3.12%</div>
          </div>

          <!-- TSLA -->
          <div class="share-row">
            <div class="d-flex align-items-center gap-3">
              <div class="share-logo" style="background:rgba(227,25,55,0.12);color:#f87171;">TSLA</div>
              <div>
                <div class="share-name">Tesla Inc.</div>
                <div class="share-ticker-label">NASDAQ · Automotive</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:70%"></div>
              <div class="spark-bar dn" style="height:55%"></div>
              <div class="spark-bar up" style="height:65%"></div>
              <div class="spark-bar dn" style="height:50%"></div>
              <div class="spark-bar dn" style="height:38%"></div>
              <div class="spark-bar up" style="height:48%"></div>
              <div class="spark-bar dn" style="height:35%"></div>
            </div>
            <div class="text-end">
              <div class="share-price">$182.60</div>
              <div class="share-vol">Vol 95.3M</div>
            </div>
            <div class="pair-change change-dn">−1.57%</div>
          </div>

          <!-- AMZN -->
          <div class="share-row">
            <div class="d-flex align-items-center gap-3">
              <div class="share-logo" style="background:rgba(255,153,0,0.12);color:#fb923c;">AMZN</div>
              <div>
                <div class="share-name">Amazon</div>
                <div class="share-ticker-label">NASDAQ · E-Commerce</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar dn" style="height:60%"></div>
              <div class="spark-bar up" style="height:70%"></div>
              <div class="spark-bar up" style="height:80%"></div>
              <div class="spark-bar up" style="height:88%"></div>
              <div class="spark-bar dn" style="height:75%"></div>
              <div class="spark-bar up" style="height:85%"></div>
              <div class="spark-bar up" style="height:95%"></div>
            </div>
            <div class="text-end">
              <div class="share-price">$196.85</div>
              <div class="share-vol">Vol 34.7M</div>
            </div>
            <div class="pair-change change-up">+2.05%</div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Ticker -->
  <div class="ticker-bg">
    <div class="ticker-track">
      <span class="ticker-item"><span class="ticker-pair">AAPL</span><span class="ticker-price">$224.30</span><span class="ticker-up">▲ 1.34%</span></span>
      <span class="ticker-item"><span class="ticker-pair">MSFT</span><span class="ticker-price">$415.72</span><span class="ticker-dn">▼ 0.88%</span></span>
      <span class="ticker-item"><span class="ticker-pair">NVDA</span><span class="ticker-price">$875.40</span><span class="ticker-up">▲ 3.12%</span></span>
      <span class="ticker-item"><span class="ticker-pair">TSLA</span><span class="ticker-price">$182.60</span><span class="ticker-dn">▼ 1.57%</span></span>
      <span class="ticker-item"><span class="ticker-pair">AMZN</span><span class="ticker-price">$196.85</span><span class="ticker-up">▲ 2.05%</span></span>
      <span class="ticker-item"><span class="ticker-pair">GOOGL</span><span class="ticker-price">$175.14</span><span class="ticker-up">▲ 0.72%</span></span>
      <span class="ticker-item"><span class="ticker-pair">META</span><span class="ticker-price">$527.93</span><span class="ticker-up">▲ 1.61%</span></span>
      <span class="ticker-item"><span class="ticker-pair">JPM</span><span class="ticker-price">$210.44</span><span class="ticker-dn">▼ 0.45%</span></span>
      <span class="ticker-item"><span class="ticker-pair">BABA</span><span class="ticker-price">$82.17</span><span class="ticker-dn">▼ 1.20%</span></span>
      <span class="ticker-item"><span class="ticker-pair">WMT</span><span class="ticker-price">$68.50</span><span class="ticker-up">▲ 0.38%</span></span>
      <!-- duplicate for loop -->
      <span class="ticker-item"><span class="ticker-pair">AAPL</span><span class="ticker-price">$224.30</span><span class="ticker-up">▲ 1.34%</span></span>
      <span class="ticker-item"><span class="ticker-pair">MSFT</span><span class="ticker-price">$415.72</span><span class="ticker-dn">▼ 0.88%</span></span>
      <span class="ticker-item"><span class="ticker-pair">NVDA</span><span class="ticker-price">$875.40</span><span class="ticker-up">▲ 3.12%</span></span>
      <span class="ticker-item"><span class="ticker-pair">TSLA</span><span class="ticker-price">$182.60</span><span class="ticker-dn">▼ 1.57%</span></span>
      <span class="ticker-item"><span class="ticker-pair">AMZN</span><span class="ticker-price">$196.85</span><span class="ticker-up">▲ 2.05%</span></span>
      <span class="ticker-item"><span class="ticker-pair">GOOGL</span><span class="ticker-price">$175.14</span><span class="ticker-up">▲ 0.72%</span></span>
      <span class="ticker-item"><span class="ticker-pair">META</span><span class="ticker-price">$527.93</span><span class="ticker-up">▲ 1.61%</span></span>
      <span class="ticker-item"><span class="ticker-pair">JPM</span><span class="ticker-price">$210.44</span><span class="ticker-dn">▼ 0.45%</span></span>
      <span class="ticker-item"><span class="ticker-pair">BABA</span><span class="ticker-price">$82.17</span><span class="ticker-dn">▼ 1.20%</span></span>
      <span class="ticker-item"><span class="ticker-pair">WMT</span><span class="ticker-price">$68.50</span><span class="ticker-up">▲ 0.38%</span></span>
    </div>
  </div>
</section>

<!-- ── EXCHANGE STRIP ── -->
<div class="exchange-strip" style="background:var(--dark2);">
  <div class="container-fluid px-4">
    <div class="exchange-track">
      <span class="exchange-badge"><span class="exchange-dot" style="background:#3b82f6;"></span>NYSE</span>
      <span class="exchange-badge"><span class="exchange-dot" style="background:#818cf8;"></span>NASDAQ</span>
      <span class="exchange-badge"><span class="exchange-dot" style="background:#fbbf24;"></span>London Stock Exchange</span>
      <span class="exchange-badge"><span class="exchange-dot" style="background:#34d399;"></span>Frankfurt (XETRA)</span>
      <span class="exchange-badge"><span class="exchange-dot" style="background:#f87171;"></span>Tokyo (TSE)</span>
      <span class="exchange-badge"><span class="exchange-dot" style="background:#a78bfa;"></span>Hong Kong (HKEX)</span>
      <span class="exchange-badge"><span class="exchange-dot" style="background:#fb923c;"></span>Paris (Euronext)</span>
      <span class="exchange-badge"><span class="exchange-dot" style="background:#22d3ee;"></span>Sydney (ASX)</span>
      <!-- duplicate -->
      <span class="exchange-badge"><span class="exchange-dot" style="background:#3b82f6;"></span>NYSE</span>
      <span class="exchange-badge"><span class="exchange-dot" style="background:#818cf8;"></span>NASDAQ</span>
      <span class="exchange-badge"><span class="exchange-dot" style="background:#fbbf24;"></span>London Stock Exchange</span>
      <span class="exchange-badge"><span class="exchange-dot" style="background:#34d399;"></span>Frankfurt (XETRA)</span>
      <span class="exchange-badge"><span class="exchange-dot" style="background:#f87171;"></span>Tokyo (TSE)</span>
      <span class="exchange-badge"><span class="exchange-dot" style="background:#a78bfa;"></span>Hong Kong (HKEX)</span>
      <span class="exchange-badge"><span class="exchange-dot" style="background:#fb923c;"></span>Paris (Euronext)</span>
      <span class="exchange-badge"><span class="exchange-dot" style="background:#22d3ee;"></span>Sydney (ASX)</span>
    </div>
  </div>
</div>

<!-- ── NUMBERS STRIP ── -->
<div class="numbers-strip">
  <div class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">500<sup>+</sup></div>
        <div class="num-desc">Global Shares</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">0<sup>%</sup></div>
        <div class="num-desc">Commission</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">20<sup>:1</sup></div>
        <div class="num-desc">Max Leverage</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">8<sup>+</sup></div>
        <div class="num-desc">Global Exchanges</div>
      </div>
    </div>
  </div>
</div>

<!-- ── WHY SHARES ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row g-4 align-items-start">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="section-tag">Why Trade Shares</div>
        <h2 class="section-title">Blue-chip access.<br>Zero commission.</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:320px;">
          Share CFDs let you trade price movements of the world's most iconic companies without ever owning the underlying stock.
        </p>
        <div class="mt-4">
          <div class="sector-grid">
            <div class="sector-card">
              <div class="sector-icon">💻</div>
              <div class="sector-name">Technology</div>
              <div class="sector-count">120+ stocks</div>
            </div>
            <div class="sector-card">
              <div class="sector-icon">🏦</div>
              <div class="sector-name">Finance</div>
              <div class="sector-count">80+ stocks</div>
            </div>
            <div class="sector-card">
              <div class="sector-icon">⚡</div>
              <div class="sector-name">Energy</div>
              <div class="sector-count">45+ stocks</div>
            </div>
            <div class="sector-card">
              <div class="sector-icon">🏥</div>
              <div class="sector-name">Healthcare</div>
              <div class="sector-count">65+ stocks</div>
            </div>
            <div class="sector-card">
              <div class="sector-icon">🛒</div>
              <div class="sector-name">Consumer</div>
              <div class="sector-count">70+ stocks</div>
            </div>
            <div class="sector-card">
              <div class="sector-icon">🚀</div>
              <div class="sector-name">Aerospace</div>
              <div class="sector-count">30+ stocks</div>
            </div>
            <div class="sector-card">
              <div class="sector-icon">🏗️</div>
              <div class="sector-name">Industrial</div>
              <div class="sector-count">55+ stocks</div>
            </div>
            <div class="sector-card">
              <div class="sector-icon">🌐</div>
              <div class="sector-name">Telecom</div>
              <div class="sector-count">35+ stocks</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="row g-3">
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-ban"></i></div>
              <div class="feature-title">Zero Commission</div>
              <p class="feature-text">Trade any share CFD without paying brokerage commissions. Our revenue comes from the spread — no hidden transaction fees ever.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-globe"></i></div>
              <div class="feature-title">Global Access</div>
              <p class="feature-text">Access shares listed on NYSE, NASDAQ, LSE, XETRA, HKEX, and more — all from a single account in your home currency.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-chart-bar"></i></div>
              <div class="feature-title">Fractional Exposure</div>
              <p class="feature-text">Gain exposure to high-priced stocks like Amazon or Google without buying a full share. Control your position size precisely.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-arrows-v"></i></div>
              <div class="feature-title">Long &amp; Short</div>
              <p class="feature-text">Profit whether a company's share price rises or falls. Short overvalued stocks during downturns just as easily as going long.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── STOCKS TABLE ── -->
<section class="py-5" style="background:var(--dark2);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
  <div class="container py-3">
    <div class="row align-items-start g-5">
      <div class="col-lg-4">
        <div class="section-tag">Trading Conditions</div>
        <h2 class="section-title">Popular stocks<br>&amp; specifications</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:310px;">
          Zero commission on all share CFDs. Spreads reflect real market conditions with no additional markup from us.
        </p>
        <a href="#" class="btn-hero-blue mt-4 d-inline-block">Open Account</a>
      </div>
      <div class="col-lg-8">
        <div class="stocks-table-wrap">
          <table class="table table-borderless mb-0" data-bs-theme="dark">
            <thead>
              <tr>
                <th>Company</th>
                <th>Exchange</th>
                <th>Spread</th>
                <th>Leverage</th>
                <th>Min Lots</th>
                <th>24h</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Apple (AAPL)</td>
                <td><span class="exch-pill exch-nasdaq">NASDAQ</span></td>
                <td>0.10%</td>
                <td>1:20</td>
                <td>0.1</td>
                <td style="color:var(--green)">+1.34%</td>
              </tr>
              <tr>
                <td>Microsoft (MSFT)</td>
                <td><span class="exch-pill exch-nasdaq">NASDAQ</span></td>
                <td>0.10%</td>
                <td>1:20</td>
                <td>0.1</td>
                <td style="color:var(--rose)">−0.88%</td>
              </tr>
              <tr>
                <td>NVIDIA (NVDA)</td>
                <td><span class="exch-pill exch-nasdaq">NASDAQ</span></td>
                <td>0.15%</td>
                <td>1:20</td>
                <td>0.1</td>
                <td style="color:var(--green)">+3.12%</td>
              </tr>
              <tr>
                <td>Tesla (TSLA)</td>
                <td><span class="exch-pill exch-nasdaq">NASDAQ</span></td>
                <td>0.20%</td>
                <td>1:10</td>
                <td>0.1</td>
                <td style="color:var(--rose)">−1.57%</td>
              </tr>
              <tr>
                <td>Amazon (AMZN)</td>
                <td><span class="exch-pill exch-nasdaq">NASDAQ</span></td>
                <td>0.15%</td>
                <td>1:20</td>
                <td>0.1</td>
                <td style="color:var(--green)">+2.05%</td>
              </tr>
              <tr>
                <td>JPMorgan (JPM)</td>
                <td><span class="exch-pill exch-nyse">NYSE</span></td>
                <td>0.12%</td>
                <td>1:20</td>
                <td>0.1</td>
                <td style="color:var(--rose)">−0.45%</td>
              </tr>
              <tr>
                <td>HSBC Holdings</td>
                <td><span class="exch-pill exch-lse">LSE</span></td>
                <td>0.18%</td>
                <td>1:10</td>
                <td>1</td>
                <td style="color:var(--green)">+0.61%</td>
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
        <h2 class="section-title">Trade shares<br>in three steps</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;">
          No stockbroker needed. No share registry. Just open an account and start trading the world's most recognisable companies in minutes.
        </p>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="step-card">
          <div class="step-num">01</div>
          <div>
            <div class="step-title">Create &amp; Verify Your Account</div>
            <p class="step-text">Register with your email, complete identity verification in minutes, and gain instant access to 500+ global share CFDs across all major exchanges.</p>
          </div>
        </div>
        <div class="step-card">
          <div class="step-num">02</div>
          <div>
            <div class="step-title">Fund Your Account</div>
            <p class="step-text">Deposit via card, bank transfer, or crypto. No minimum deposit on standard accounts. Funds are credited instantly and ready to deploy.</p>
          </div>
        </div>
        <div class="step-card">
          <div class="step-num">03</div>
          <div>
            <div class="step-title">Find Your Stock &amp; Trade</div>
            <p class="step-text">Search by name, ticker, or sector. Review the live chart, set your position size, choose your leverage, and place your trade in one click.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── CTA BAND ── -->
<section class="cta-band py-5">
  <div class="container py-3 text-center">
    <div class="section-tag d-inline-flex">Start Investing</div>
    <h2 class="section-title mt-1 mx-auto" style="max-width:560px;">The world's biggest<br>companies. One platform.</h2>
    <p class="mt-3 mx-auto" style="font-size:0.92rem;color:var(--muted);line-height:1.8;max-width:460px;">
      Open a live account and start trading zero-commission share CFDs today, or practise risk-free with our $10,000 demo account.
    </p>
    <div class="d-flex gap-3 justify-content-center flex-wrap mt-4">
      <a href="#" class="btn-hero-blue">Open Live Account</a>
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
      <p>© <span id="year"></span> TESLA INVEST. All rights reserved. Share CFD trading carries significant risk of loss. This is a fictional demo site for illustrative purposes only.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>document.getElementById("year").textContent = new Date().getFullYear();</script>
</body>
</html>
