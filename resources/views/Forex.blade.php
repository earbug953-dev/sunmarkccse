<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forex — Tesla Invest</title>

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
      font-size: 1.55rem;
      font-weight: 600;
      letter-spacing: 0.12em;
      color: #fff !important;
    }
    .navbar-brand span { color: var(--red); }
    .nav-link {
      font-size: 0.75rem;
      letter-spacing: 0.14em;
      font-weight: 500;
      color: var(--muted) !important;
      text-transform: uppercase;
      transition: color 0.2s;
    }
    .nav-link:hover, .nav-link.active { color: #fff !important; }
    .dropdown-menu {
      background: var(--dark2);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 0.5rem;
    }
    .dropdown-item {
      color: var(--muted);
      font-size: 0.82rem;
      letter-spacing: 0.05em;
      border-radius: 6px;
      padding: 0.55rem 0.85rem;
      transition: all 0.15s;
    }
    .dropdown-item:hover { background: var(--mid); color: #fff; }
    .btn-outline-ghost {
      border: 1px solid var(--border);
      color: var(--muted);
      background: transparent;
      font-size: 0.75rem;
      letter-spacing: 0.12em;
      padding: 0.5rem 1.4rem;
      border-radius: 4px;
      transition: all 0.2s;
      text-decoration: none;
      display: inline-block;
    }
    .btn-outline-ghost:hover { border-color: rgba(255,255,255,0.25); color: #fff; }
    .btn-red {
      background: var(--red);
      border: none;
      color: #fff;
      font-size: 0.75rem;
      letter-spacing: 0.12em;
      padding: 0.5rem 1.4rem;
      border-radius: 4px;
      transition: background 0.2s;
      text-decoration: none;
      display: inline-block;
    }
    .btn-red:hover { background: #c0152e; color: #fff; }
    .offcanvas { background: var(--dark2) !important; }

    /* ── HERO ── */
    .forex-hero {
      position: relative;
      min-height: 88vh;
      display: flex;
      align-items: center;
      overflow: hidden;
    }
    .forex-hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background:
        radial-gradient(ellipse 60% 55% at 70% 45%, rgba(227,25,55,0.07) 0%, transparent 65%),
        radial-gradient(ellipse 35% 45% at 5% 85%, rgba(227,25,55,0.05) 0%, transparent 60%);
      pointer-events: none;
    }
    .grid-overlay {
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(to right, rgba(255,255,255,0.022) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.022) 1px, transparent 1px);
      background-size: 80px 80px;
      pointer-events: none;
    }

    /* Animated ticker line in hero bg */
    .ticker-bg {
      position: absolute;
      bottom: 0; left: 0; right: 0;
      height: 48px;
      overflow: hidden;
      border-top: 1px solid var(--border);
      display: flex;
      align-items: center;
      background: rgba(12,12,14,0.6);
      backdrop-filter: blur(8px);
    }
    .ticker-track {
      display: flex;
      gap: 3rem;
      animation: tickerScroll 30s linear infinite;
      white-space: nowrap;
    }
    .ticker-item {
      font-size: 0.72rem;
      letter-spacing: 0.1em;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .ticker-pair { color: rgba(255,255,255,0.6); }
    .ticker-price { color: #fff; }
    .ticker-up { color: var(--green); }
    .ticker-dn { color: var(--rose); }

    @keyframes tickerScroll {
      0%   { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }

    .hero-eyebrow {
      font-size: 0.7rem;
      letter-spacing: 0.3em;
      text-transform: uppercase;
      color: var(--red);
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 2rem;
    }
    .hero-eyebrow::before {
      content: '';
      display: block;
      width: 36px;
      height: 1px;
      background: var(--red);
    }
    .hero-title {
      font-size: clamp(3rem, 7vw, 5.8rem);
      font-weight: 300;
      line-height: 1.05;
      color: #fff;
      margin-bottom: 2rem;
    }
    .hero-title em { font-style: italic; color: var(--red); }
    .hero-subtitle {
      font-size: clamp(0.95rem, 2vw, 1.1rem);
      line-height: 1.85;
      color: var(--muted);
      max-width: 460px;
      font-weight: 300;
    }
    .hero-cta-row { display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 2.8rem; }
    .btn-hero-primary {
      background: var(--red); color: #fff;
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: none; border-radius: 4px;
      text-decoration: none; transition: background 0.2s; display: inline-block;
    }
    .btn-hero-primary:hover { background: #c0152e; color: #fff; }
    .btn-hero-ghost {
      background: transparent; color: var(--muted);
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: 1px solid var(--border); border-radius: 4px;
      text-decoration: none; transition: all 0.2s; display: inline-block;
    }
    .btn-hero-ghost:hover { border-color: rgba(255,255,255,0.25); color: #fff; }

    /* ── LIVE PAIRS PANEL ── */
    .pairs-panel {
      background: var(--dark2);
      border: 1px solid var(--border);
      border-radius: 18px;
      overflow: hidden;
    }
    .pairs-header {
      padding: 1.2rem 1.6rem;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .pairs-header-title {
      font-size: 0.7rem;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--muted);
      font-weight: 500;
    }
    .live-dot {
      width: 7px; height: 7px;
      border-radius: 50%;
      background: var(--green);
      display: inline-block;
      margin-right: 6px;
      animation: pulse 2s ease infinite;
    }
    @keyframes pulse {
      0%,100% { opacity: 1; box-shadow: 0 0 0 0 rgba(34,197,94,0.4); }
      50%      { opacity: 0.8; box-shadow: 0 0 0 5px rgba(34,197,94,0); }
    }
    .live-label { font-size: 0.68rem; letter-spacing: 0.15em; color: var(--green); text-transform: uppercase; }

    .pair-row {
      padding: 1rem 1.6rem;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1rem;
      transition: background 0.15s;
      cursor: default;
    }
    .pair-row:last-child { border-bottom: none; }
    .pair-row:hover { background: var(--mid); }
    .pair-flag { font-size: 1.3rem; line-height: 1; }
    .pair-name { font-size: 0.9rem; font-weight: 500; color: #fff; letter-spacing: 0.04em; }
    .pair-full { font-size: 0.72rem; color: var(--muted); margin-top: 2px; }
    .pair-price { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 400; color: #fff; }
    .pair-spread { font-size: 0.7rem; color: var(--muted); text-align: right; margin-top: 2px; }
    .pair-change {
      font-size: 0.78rem;
      font-weight: 500;
      padding: 0.25rem 0.65rem;
      border-radius: 5px;
      min-width: 64px;
      text-align: center;
    }
    .change-up { background: var(--green-dim); color: var(--green); }
    .change-dn { background: var(--rose-dim); color: var(--rose); }

    /* Sparkline bars */
    .spark { display: flex; align-items: flex-end; gap: 2px; height: 28px; }
    .spark-bar { width: 3px; border-radius: 2px; background: var(--border); flex-shrink: 0; }
    .spark-bar.up { background: var(--green); }
    .spark-bar.dn { background: var(--rose); }

    /* ── NUMBERS STRIP ── */
    .numbers-strip { border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .num-item { text-align: center; padding: 3rem 1rem; border-right: 1px solid var(--border); }
    .num-item:last-child { border-right: none; }
    .big-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 3.2rem; font-weight: 300; color: #fff; line-height: 1;
    }
    .big-num sup { font-size: 1.3rem; color: var(--red); vertical-align: super; font-weight: 400; }
    .num-desc { font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--muted); margin-top: 0.5rem; }

    /* ── SECTION HELPERS ── */
    .section-tag {
      font-size: 0.68rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--red); font-weight: 500;
      display: inline-flex; align-items: center; gap: 10px; margin-bottom: 1.2rem;
    }
    .section-tag::after { content: ''; display: block; width: 28px; height: 1px; background: var(--red); }
    .section-title { font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 300; color: #fff; line-height: 1.1; }

    /* ── FEATURE CARDS ── */
    .feature-card {
      background: var(--dark2);
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 2rem;
      height: 100%;
      position: relative;
      overflow: hidden;
      transition: border-color 0.25s, transform 0.25s;
    }
    .feature-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 2px;
      background: var(--red);
      opacity: 0;
      transition: opacity 0.25s;
    }
    .feature-card:hover { border-color: rgba(227,25,55,0.25); transform: translateY(-4px); }
    .feature-card:hover::before { opacity: 1; }
    .feature-icon {
      width: 46px; height: 46px;
      border-radius: 10px;
      background: var(--red-dim);
      display: flex; align-items: center; justify-content: center;
      color: var(--red); font-size: 1.35rem;
      margin-bottom: 1.3rem;
    }
    .feature-title { font-family: 'Cormorant Garamond', serif; font-size: 1.35rem; font-weight: 400; color: #fff; margin-bottom: 0.65rem; }
    .feature-text { font-size: 0.87rem; line-height: 1.8; color: var(--muted); }

    /* ── SPREAD TABLE ── */
    .spread-table-wrap {
      background: var(--dark2);
      border: 1px solid var(--border);
      border-radius: 16px;
      overflow: hidden;
    }
    .spread-table-wrap table { margin: 0; }
    .spread-table-wrap thead tr {
      background: var(--mid);
      border-bottom: 1px solid var(--border);
    }
    .spread-table-wrap thead th {
      font-size: 0.68rem;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--muted);
      font-weight: 500;
      padding: 1rem 1.4rem;
      border: none;
    }
    .spread-table-wrap tbody tr {
      border-bottom: 1px solid var(--border);
      transition: background 0.15s;
    }
    .spread-table-wrap tbody tr:last-child { border-bottom: none; }
    .spread-table-wrap tbody tr:hover { background: var(--mid); }
    .spread-table-wrap tbody td {
      font-size: 0.86rem;
      color: var(--text);
      padding: 0.95rem 1.4rem;
      border: none;
      vertical-align: middle;
    }
    .spread-table-wrap tbody td:first-child { font-weight: 500; color: #fff; }
    .badge-major {
      font-size: 0.62rem;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      padding: 0.22rem 0.6rem;
      border-radius: 4px;
      background: var(--red-dim);
      color: var(--red);
      margin-left: 0.5rem;
    }
    .badge-minor {
      font-size: 0.62rem;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      padding: 0.22rem 0.6rem;
      border-radius: 4px;
      background: rgba(99,102,241,0.12);
      color: #818cf8;
      margin-left: 0.5rem;
    }

    /* ── HOW IT WORKS ── */
    .steps-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .step-card {
      display: flex;
      gap: 1.4rem;
      align-items: flex-start;
      padding: 2rem 0;
      border-bottom: 1px solid var(--border);
    }
    .step-card:last-child { border-bottom: none; }
    .step-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.8rem;
      font-weight: 300;
      color: rgba(227,25,55,0.25);
      line-height: 1;
      min-width: 52px;
    }
    .step-title { font-size: 1.05rem; font-weight: 400; color: #fff; margin-bottom: 0.4rem; }
    .step-text { font-size: 0.86rem; color: var(--muted); line-height: 1.75; margin: 0; }

    /* ── CTA BAND ── */
    .cta-band {
      background: linear-gradient(135deg, rgba(227,25,55,0.08) 0%, transparent 50%),
                  var(--dark2);
      border-top: 1px solid rgba(227,25,55,0.15);
      border-bottom: 1px solid rgba(227,25,55,0.15);
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

<x-header active="forex" />
<!-- ── HERO ── -->
<section class="forex-hero pt-5">
  <div class="grid-overlay"></div>

  <div class="container py-5 mt-4" style="padding-bottom: 5rem !important;">
    <div class="row align-items-center g-5">

      <!-- Left -->
      <div class="col-lg-6">
        <div class="hero-eyebrow fade-up">Markets — Forex</div>
        <h1 class="hero-title fade-up fade-up-1">
          Trade the<br>world's most<br><em>liquid market.</em>
        </h1>
        <p class="hero-subtitle fade-up fade-up-2">
          Access 60+ currency pairs with institutional-grade spreads, ultra-fast execution, and deep liquidity — available 24 hours a day, 5 days a week.
        </p>
        <div class="hero-cta-row fade-up fade-up-3">
          <a href="#" class="btn-hero-primary">Start Trading</a>
          <a href="#" class="btn-hero-ghost">View Spreads</a>
        </div>
      </div>

      <!-- Right — Live Pairs Panel -->
      <div class="col-lg-5 offset-lg-1 fade-up fade-up-4">
        <div class="pairs-panel">
          <div class="pairs-header">
            <div class="pairs-header-title">Major Pairs</div>
            <div><span class="live-dot"></span><span class="live-label">Live</span></div>
          </div>

          <!-- EUR/USD -->
          <div class="pair-row">
            <div class="d-flex align-items-center gap-3">
              <div class="pair-flag">🇪🇺🇺🇸</div>
              <div>
                <div class="pair-name">EUR/USD</div>
                <div class="pair-full">Euro / US Dollar</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:40%"></div>
              <div class="spark-bar up" style="height:55%"></div>
              <div class="spark-bar dn" style="height:45%"></div>
              <div class="spark-bar up" style="height:65%"></div>
              <div class="spark-bar up" style="height:80%"></div>
              <div class="spark-bar up" style="height:90%"></div>
              <div class="spark-bar up" style="height:100%"></div>
            </div>
            <div class="text-end">
              <div class="pair-price">1.08742</div>
              <div class="pair-spread">Spread: 0.1</div>
            </div>
            <div class="pair-change change-up">+0.23%</div>
          </div>

          <!-- GBP/USD -->
          <div class="pair-row">
            <div class="d-flex align-items-center gap-3">
              <div class="pair-flag">🇬🇧🇺🇸</div>
              <div>
                <div class="pair-name">GBP/USD</div>
                <div class="pair-full">Pound / US Dollar</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:70%"></div>
              <div class="spark-bar dn" style="height:55%"></div>
              <div class="spark-bar dn" style="height:40%"></div>
              <div class="spark-bar dn" style="height:30%"></div>
              <div class="spark-bar up" style="height:45%"></div>
              <div class="spark-bar dn" style="height:35%"></div>
              <div class="spark-bar dn" style="height:25%"></div>
            </div>
            <div class="text-end">
              <div class="pair-price">1.26318</div>
              <div class="pair-spread">Spread: 0.3</div>
            </div>
            <div class="pair-change change-dn">−0.41%</div>
          </div>

          <!-- USD/JPY -->
          <div class="pair-row">
            <div class="d-flex align-items-center gap-3">
              <div class="pair-flag">🇺🇸🇯🇵</div>
              <div>
                <div class="pair-name">USD/JPY</div>
                <div class="pair-full">US Dollar / Yen</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:30%"></div>
              <div class="spark-bar up" style="height:50%"></div>
              <div class="spark-bar up" style="height:60%"></div>
              <div class="spark-bar up" style="height:75%"></div>
              <div class="spark-bar dn" style="height:65%"></div>
              <div class="spark-bar up" style="height:80%"></div>
              <div class="spark-bar up" style="height:95%"></div>
            </div>
            <div class="text-end">
              <div class="pair-price">151.624</div>
              <div class="pair-spread">Spread: 0.2</div>
            </div>
            <div class="pair-change change-up">+0.18%</div>
          </div>

          <!-- AUD/USD -->
          <div class="pair-row">
            <div class="d-flex align-items-center gap-3">
              <div class="pair-flag">🇦🇺🇺🇸</div>
              <div>
                <div class="pair-name">AUD/USD</div>
                <div class="pair-full">Aussie / US Dollar</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar dn" style="height:80%"></div>
              <div class="spark-bar dn" style="height:65%"></div>
              <div class="spark-bar up" style="height:70%"></div>
              <div class="spark-bar dn" style="height:55%"></div>
              <div class="spark-bar dn" style="height:40%"></div>
              <div class="spark-bar dn" style="height:30%"></div>
              <div class="spark-bar dn" style="height:20%"></div>
            </div>
            <div class="text-end">
              <div class="pair-price">0.64851</div>
              <div class="pair-spread">Spread: 0.4</div>
            </div>
            <div class="pair-change change-dn">−0.62%</div>
          </div>

          <!-- USD/CHF -->
          <div class="pair-row">
            <div class="d-flex align-items-center gap-3">
              <div class="pair-flag">🇺🇸🇨🇭</div>
              <div>
                <div class="pair-name">USD/CHF</div>
                <div class="pair-full">US Dollar / Franc</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:40%"></div>
              <div class="spark-bar up" style="height:55%"></div>
              <div class="spark-bar up" style="height:60%"></div>
              <div class="spark-bar dn" style="height:50%"></div>
              <div class="spark-bar up" style="height:65%"></div>
              <div class="spark-bar up" style="height:72%"></div>
              <div class="spark-bar up" style="height:80%"></div>
            </div>
            <div class="text-end">
              <div class="pair-price">0.90214</div>
              <div class="pair-spread">Spread: 0.5</div>
            </div>
            <div class="pair-change change-up">+0.09%</div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Ticker -->
  <div class="ticker-bg">
    <div class="ticker-track" id="ticker">
      <span class="ticker-item"><span class="ticker-pair">EUR/USD</span><span class="ticker-price">1.08742</span><span class="ticker-up">▲ 0.23%</span></span>
      <span class="ticker-item"><span class="ticker-pair">GBP/USD</span><span class="ticker-price">1.26318</span><span class="ticker-dn">▼ 0.41%</span></span>
      <span class="ticker-item"><span class="ticker-pair">USD/JPY</span><span class="ticker-price">151.624</span><span class="ticker-up">▲ 0.18%</span></span>
      <span class="ticker-item"><span class="ticker-pair">AUD/USD</span><span class="ticker-price">0.64851</span><span class="ticker-dn">▼ 0.62%</span></span>
      <span class="ticker-item"><span class="ticker-pair">USD/CHF</span><span class="ticker-price">0.90214</span><span class="ticker-up">▲ 0.09%</span></span>
      <span class="ticker-item"><span class="ticker-pair">USD/CAD</span><span class="ticker-price">1.37442</span><span class="ticker-up">▲ 0.14%</span></span>
      <span class="ticker-item"><span class="ticker-pair">NZD/USD</span><span class="ticker-price">0.60117</span><span class="ticker-dn">▼ 0.30%</span></span>
      <span class="ticker-item"><span class="ticker-pair">EUR/GBP</span><span class="ticker-price">0.86024</span><span class="ticker-up">▲ 0.07%</span></span>
      <!-- duplicate for seamless loop -->
      <span class="ticker-item"><span class="ticker-pair">EUR/USD</span><span class="ticker-price">1.08742</span><span class="ticker-up">▲ 0.23%</span></span>
      <span class="ticker-item"><span class="ticker-pair">GBP/USD</span><span class="ticker-price">1.26318</span><span class="ticker-dn">▼ 0.41%</span></span>
      <span class="ticker-item"><span class="ticker-pair">USD/JPY</span><span class="ticker-price">151.624</span><span class="ticker-up">▲ 0.18%</span></span>
      <span class="ticker-item"><span class="ticker-pair">AUD/USD</span><span class="ticker-price">0.64851</span><span class="ticker-dn">▼ 0.62%</span></span>
      <span class="ticker-item"><span class="ticker-pair">USD/CHF</span><span class="ticker-price">0.90214</span><span class="ticker-up">▲ 0.09%</span></span>
      <span class="ticker-item"><span class="ticker-pair">USD/CAD</span><span class="ticker-price">1.37442</span><span class="ticker-up">▲ 0.14%</span></span>
      <span class="ticker-item"><span class="ticker-pair">NZD/USD</span><span class="ticker-price">0.60117</span><span class="ticker-dn">▼ 0.30%</span></span>
      <span class="ticker-item"><span class="ticker-pair">EUR/GBP</span><span class="ticker-price">0.86024</span><span class="ticker-up">▲ 0.07%</span></span>
    </div>
  </div>
</section>

<!-- ── NUMBERS STRIP ── -->
<div class="numbers-strip">
  <div class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">60<sup>+</sup></div>
        <div class="num-desc">Currency Pairs</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">0.0<sup>pip</sup></div>
        <div class="num-desc">Min Spread</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">500<sup>:1</sup></div>
        <div class="num-desc">Max Leverage</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">24<sup>/5</sup></div>
        <div class="num-desc">Trading Hours</div>
      </div>
    </div>
  </div>
</div>

<!-- ── WHY FOREX ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row g-4 align-items-start">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="section-tag">Why Forex</div>
        <h2 class="section-title">The largest<br>market on Earth</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:320px;">
          With over $7.5 trillion traded daily, the foreign exchange market is unmatched in size, accessibility, and opportunity. Here's why traders choose it.
        </p>
      </div>
      <div class="col-lg-8">
        <div class="row g-3">
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-clock-three"></i></div>
              <div class="feature-title">24/5 Access</div>
              <p class="feature-text">Forex never sleeps. Trade major, minor, and exotic pairs across all global sessions — from Sydney open to New York close.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-compress-alt"></i></div>
              <div class="feature-title">Razor-Thin Spreads</div>
              <p class="feature-text">Our ECN model connects you directly to tier-1 liquidity providers, giving you institutional pricing from as low as 0.0 pips.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-arrow-growth"></i></div>
              <div class="feature-title">Flexible Leverage</div>
              <p class="feature-text">Amplify your market exposure with leverage up to 500:1 on majors. Customise your risk profile to match your trading style.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-exchange-alt"></i></div>
              <div class="feature-title">Long &amp; Short</div>
              <p class="feature-text">Profit from both rising and falling currency prices. Go long on strength, short on weakness — the market always has an angle.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── SPREAD TABLE ── -->
<section class="py-5" style="background: var(--dark2); border-top:1px solid var(--border); border-bottom:1px solid var(--border);">
  <div class="container py-3">
    <div class="row align-items-start g-5">
      <div class="col-lg-4">
        <div class="section-tag">Trading Conditions</div>
        <h2 class="section-title">Transparent<br>spreads &amp; specs</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:310px;">
          No hidden fees. No markups. Our pricing table reflects real-time conditions across all account types.
        </p>
        <a href="#" class="btn-hero-primary mt-4 d-inline-block">Open Account</a>
      </div>
      <div class="col-lg-8">
        <div class="spread-table-wrap">
          <table class="table table-borderless mb-0">
            <thead>
              <tr>
                <th>Pair</th>
                <th>Spread (avg)</th>
                <th>Leverage</th>
                <th>Min Lot</th>
                <th>Swap Long</th>
                <th>Swap Short</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>EUR/USD <span class="badge-major">Major</span></td>
                <td>0.1</td>
                <td>1:500</td>
                <td>0.01</td>
                <td style="color:var(--rose)">-3.12</td>
                <td style="color:var(--green)">+1.08</td>
              </tr>
              <tr>
                <td>GBP/USD <span class="badge-major">Major</span></td>
                <td>0.3</td>
                <td>1:500</td>
                <td>0.01</td>
                <td style="color:var(--rose)">-4.45</td>
                <td style="color:var(--green)">+1.62</td>
              </tr>
              <tr>
                <td>USD/JPY <span class="badge-major">Major</span></td>
                <td>0.2</td>
                <td>1:500</td>
                <td>0.01</td>
                <td style="color:var(--green)">+1.90</td>
                <td style="color:var(--rose)">-3.70</td>
              </tr>
              <tr>
                <td>AUD/USD <span class="badge-major">Major</span></td>
                <td>0.4</td>
                <td>1:400</td>
                <td>0.01</td>
                <td style="color:var(--rose)">-2.80</td>
                <td style="color:var(--green)">+0.90</td>
              </tr>
              <tr>
                <td>EUR/GBP <span class="badge-minor">Minor</span></td>
                <td>0.8</td>
                <td>1:300</td>
                <td>0.01</td>
                <td style="color:var(--rose)">-1.60</td>
                <td style="color:var(--rose)">-1.10</td>
              </tr>
              <tr>
                <td>USD/CAD <span class="badge-major">Major</span></td>
                <td>0.6</td>
                <td>1:400</td>
                <td>0.01</td>
                <td style="color:var(--rose)">-2.20</td>
                <td style="color:var(--green)">+0.75</td>
              </tr>
              <tr>
                <td>NZD/USD <span class="badge-major">Major</span></td>
                <td>0.7</td>
                <td>1:400</td>
                <td>0.01</td>
                <td style="color:var(--rose)">-2.05</td>
                <td style="color:var(--green)">+0.55</td>
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
        <h2 class="section-title">Trade forex<br>in three steps</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;">
          From registration to your first trade in minutes. No paperwork headaches, no unnecessary delays.
        </p>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="step-card">
          <div class="step-num">01</div>
          <div>
            <div class="step-title">Create Your Account</div>
            <p class="step-text">Register online in under two minutes. Complete KYC verification with a valid ID and proof of address — fully guided and secure.</p>
          </div>
        </div>
        <div class="step-card">
          <div class="step-num">02</div>
          <div>
            <div class="step-title">Fund Your Account</div>
            <p class="step-text">Deposit via bank transfer, credit card, or crypto. Funds are credited instantly so you never miss a market opportunity.</p>
          </div>
        </div>
        <div class="step-card">
          <div class="step-num">03</div>
          <div>
            <div class="step-title">Start Trading</div>
            <p class="step-text">Open the platform, select your currency pair, set your position size and leverage, and execute — it's that straightforward.</p>
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
    <h2 class="section-title mt-1 mx-auto" style="max-width: 560px;">Join over 1.2 million traders<br>worldwide today</h2>
    <p class="mt-3 mx-auto" style="font-size:0.92rem;color:var(--muted);line-height:1.8;max-width:440px;">
      Open a live account in minutes or practise risk-free with a $10,000 demo account. No commitment required.
    </p>
    <div class="d-flex gap-3 justify-content-center flex-wrap mt-4">
      <a href="#" class="btn-hero-primary">Open Live Account</a>
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
      <p>© <span id="year"></span> TESLA INVEST. All rights reserved. Trading Forex carries significant risk of loss. This is a fictional demo site for illustrative purposes only.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById("year").textContent = new Date().getFullYear();
</script>
</body>
</html>
