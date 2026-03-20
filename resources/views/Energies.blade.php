<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Energies — Tesla Invest</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    :root {
      --orange: #f97316;
      --orange-dim: rgba(249,115,22,0.10);
      --orange-glow: rgba(249,115,22,0.06);
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
    .energies-hero {
      position: relative;
      min-height: 92vh;
      display: flex;
      align-items: center;
      overflow: hidden;
      padding-bottom: 52px;
    }
    .hero-canvas {
      position: absolute; inset: 0; pointer-events: none;
    }
    .hero-canvas::before {
      content: '';
      position: absolute; inset: 0;
      background:
        radial-gradient(ellipse 65% 60% at 72% 44%, var(--orange-glow) 0%, transparent 62%),
        radial-gradient(ellipse 40% 50% at 5% 75%, rgba(249,115,22,0.04) 0%, transparent 58%),
        radial-gradient(ellipse 30% 35% at 50% 5%, rgba(251,191,36,0.03) 0%, transparent 55%);
    }
    .grid-overlay {
      position: absolute; inset: 0;
      background-image:
        linear-gradient(to right, rgba(255,255,255,0.022) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.022) 1px, transparent 1px);
      background-size: 80px 80px;
      pointer-events: none;
    }

    /* Animated flame-like particles */
    .particle {
      position: absolute;
      border-radius: 50%;
      pointer-events: none;
      animation: riseParticle linear infinite;
      opacity: 0;
    }
    @keyframes riseParticle {
      0%   { transform: translateY(0) scale(1);   opacity: 0; }
      15%  { opacity: 0.06; }
      85%  { opacity: 0.04; }
      100% { transform: translateY(-180px) scale(0.3); opacity: 0; }
    }

    /* Background diagonal lines suggesting heat / energy */
    .heat-lines {
      position: absolute;
      inset: 0;
      pointer-events: none;
      overflow: hidden;
      opacity: 0.025;
    }
    .heat-lines::before {
      content: '';
      position: absolute;
      top: -50%; left: 30%; right: -20%; bottom: -50%;
      background: repeating-linear-gradient(
        70deg,
        transparent,
        transparent 40px,
        rgba(249,115,22,1) 40px,
        rgba(249,115,22,1) 41px
      );
    }

    /* Ticker */
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
      animation: tickerScroll 36s linear infinite;
      white-space: nowrap;
    }
    @keyframes tickerScroll {
      0%   { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }
    .ticker-item {
      font-size: 0.72rem; letter-spacing: 0.1em; font-weight: 500;
      display: flex; align-items: center; gap: 0.5rem;
    }
    .ticker-pair { color: rgba(255,255,255,0.5); }
    .ticker-price { color: #fff; }
    .ticker-up { color: var(--green); }
    .ticker-dn { color: var(--rose); }

    /* Hero text */
    .market-pill {
      display: inline-flex; align-items: center; gap: 6px;
      background: var(--orange-dim);
      border: 1px solid rgba(249,115,22,0.22);
      border-radius: 30px;
      padding: 0.35rem 1rem;
      font-size: 0.72rem; letter-spacing: 0.1em;
      color: var(--orange); font-weight: 500;
      margin-bottom: 2rem;
    }
    .live-dot-orange {
      width: 7px; height: 7px; border-radius: 50%;
      background: var(--orange); display: inline-block;
      animation: pulseOrange 2s ease infinite;
    }
    @keyframes pulseOrange {
      0%,100% { opacity:1; box-shadow: 0 0 0 0 rgba(249,115,22,0.45); }
      50%      { opacity:0.8; box-shadow: 0 0 0 6px rgba(249,115,22,0); }
    }
    .hero-eyebrow {
      font-size: 0.7rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--orange); font-weight: 500;
      display: flex; align-items: center; gap: 12px; margin-bottom: 2rem;
    }
    .hero-eyebrow::before {
      content: ''; display: block; width: 36px; height: 1px; background: var(--orange);
    }
    .hero-title {
      font-size: clamp(3rem, 7vw, 5.8rem);
      font-weight: 300; line-height: 1.05; color: #fff; margin-bottom: 2rem;
    }
    .hero-title em { font-style: italic; color: var(--orange); }
    .hero-subtitle {
      font-size: clamp(0.95rem, 2vw, 1.1rem); line-height: 1.85;
      color: var(--muted); max-width: 460px; font-weight: 300;
    }
    .hero-cta-row { display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 2.8rem; }
    .btn-hero-orange {
      background: var(--orange); color: #fff;
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: none; border-radius: 4px;
      text-decoration: none; transition: background 0.2s; display: inline-block; font-weight: 500;
    }
    .btn-hero-orange:hover { background: #ea6e0b; color: #fff; }
    .btn-hero-ghost {
      background: transparent; color: var(--muted);
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: 1px solid var(--border); border-radius: 4px;
      text-decoration: none; transition: all 0.2s; display: inline-block;
    }
    .btn-hero-ghost:hover { border-color: rgba(255,255,255,0.25); color: #fff; }

    /* ── ENERGY PANEL ── */
    .energy-panel {
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
    .live-label { font-size: 0.68rem; letter-spacing: 0.15em; color: var(--orange); text-transform: uppercase; }

    .energy-row {
      padding: 1.05rem 1.6rem;
      border-bottom: 1px solid var(--border);
      display: grid;
      grid-template-columns: auto 1fr auto auto auto;
      align-items: center;
      gap: 1rem;
      transition: background 0.15s; cursor: default;
    }
    .energy-row:last-child { border-bottom: none; }
    .energy-row:hover { background: var(--mid); }

    .energy-icon {
      width: 38px; height: 38px; border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.25rem; flex-shrink: 0;
    }
    .energy-name { font-size: 0.9rem; font-weight: 500; color: #fff; }
    .energy-sub  { font-size: 0.7rem; color: var(--muted); margin-top: 2px; }
    .energy-price {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.35rem; font-weight: 400; color: #fff; text-align: right;
    }
    .energy-unit { font-size: 0.7rem; color: var(--muted); text-align: right; margin-top: 2px; }

    .spark { display: flex; align-items: flex-end; gap: 2px; height: 26px; }
    .spark-bar { width: 3px; border-radius: 2px; background: var(--border); flex-shrink: 0; }
    .spark-bar.up { background: var(--green); }
    .spark-bar.dn { background: var(--rose); }

    .pair-change {
      font-size: 0.78rem; font-weight: 500;
      padding: 0.25rem 0.65rem; border-radius: 5px;
      min-width: 66px; text-align: center;
    }
    .change-up { background: var(--green-dim); color: var(--green); }
    .change-dn { background: var(--rose-dim); color: var(--rose); }

    /* ── NUMBERS STRIP ── */
    .numbers-strip { border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .num-item { text-align: center; padding: 3rem 1rem; border-right: 1px solid var(--border); }
    .num-item:last-child { border-right: none; }
    .big-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 3.2rem; font-weight: 300; color: #fff; line-height: 1;
    }
    .big-num sup { font-size: 1.3rem; color: var(--orange); vertical-align: super; font-weight: 400; }
    .num-desc { font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--muted); margin-top: 0.5rem; }

    /* ── SECTION HELPERS ── */
    .section-tag {
      font-size: 0.68rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--orange); font-weight: 500;
      display: inline-flex; align-items: center; gap: 10px; margin-bottom: 1.2rem;
    }
    .section-tag::after { content: ''; display: block; width: 28px; height: 1px; background: var(--orange); }
    .section-title { font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 300; color: #fff; line-height: 1.1; }

    /* ── ENERGY TYPE CARDS ── */
    .type-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 14px; padding: 1.8rem;
      position: relative; overflow: hidden;
      transition: border-color 0.25s, transform 0.22s;
      height: 100%;
    }
    .type-card::before {
      content: '';
      position: absolute; top: 0; left: 0; right: 0;
      height: 2px; background: var(--orange); opacity: 0; transition: opacity 0.25s;
    }
    .type-card:hover { border-color: rgba(249,115,22,0.28); transform: translateY(-4px); }
    .type-card:hover::before { opacity: 1; }
    .type-emoji { font-size: 2.2rem; margin-bottom: 1.1rem; display: block; }
    .type-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.35rem; font-weight: 400; color: #fff; margin-bottom: 0.5rem;
    }
    .type-text { font-size: 0.86rem; line-height: 1.8; color: var(--muted); }
    .type-instruments {
      display: flex; flex-wrap: wrap; gap: 0.4rem; margin-top: 1.1rem;
    }
    .instr-badge {
      font-size: 0.65rem; letter-spacing: 0.08em;
      padding: 0.22rem 0.6rem; border-radius: 4px;
      background: var(--orange-dim); color: var(--orange);
      border: 1px solid rgba(249,115,22,0.15);
    }

    /* ── FEATURE CARDS ── */
    .feature-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 14px; padding: 2rem; height: 100%;
      position: relative; overflow: hidden;
      transition: border-color 0.25s, transform 0.25s;
    }
    .feature-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0;
      height: 2px; background: var(--orange); opacity: 0; transition: opacity 0.25s;
    }
    .feature-card:hover { border-color: rgba(249,115,22,0.25); transform: translateY(-4px); }
    .feature-card:hover::before { opacity: 1; }
    .feature-icon {
      width: 46px; height: 46px; border-radius: 10px;
      background: var(--orange-dim);
      display: flex; align-items: center; justify-content: center;
      color: var(--orange); font-size: 1.35rem; margin-bottom: 1.3rem;
    }
    .feature-title { font-family: 'Cormorant Garamond', serif; font-size: 1.35rem; font-weight: 400; color: #fff; margin-bottom: 0.65rem; }
    .feature-text { font-size: 0.87rem; line-height: 1.8; color: var(--muted); }

    /* ── DRIVERS TIMELINE ── */
    .drivers-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .driver-item {
      display: flex; gap: 1.6rem; align-items: flex-start;
      padding: 1.8rem 0; border-bottom: 1px solid var(--border);
    }
    .driver-item:last-child { border-bottom: none; }
    .driver-icon {
      width: 44px; height: 44px; border-radius: 10px;
      background: var(--orange-dim);
      display: flex; align-items: center; justify-content: center;
      color: var(--orange); font-size: 1.2rem; flex-shrink: 0; margin-top: 2px;
    }
    .driver-title { font-size: 1rem; font-weight: 500; color: #fff; margin-bottom: 0.35rem; }
    .driver-text { font-size: 0.86rem; color: var(--muted); line-height: 1.75; margin: 0; }

    /* ── SPECS TABLE ── */
    .specs-table-wrap {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 16px; overflow: hidden;
    }
    .specs-table-wrap table { margin: 0; }
    .specs-table-wrap thead tr { background: var(--mid); border-bottom: 1px solid var(--border); }
    .specs-table-wrap thead th {
      font-size: 0.68rem; letter-spacing: 0.2em; text-transform: uppercase;
      color: var(--muted); font-weight: 500; padding: 1rem 1.4rem; border: none;
    }
    .specs-table-wrap tbody tr { border-bottom: 1px solid var(--border); transition: background 0.15s; }
    .specs-table-wrap tbody tr:last-child { border-bottom: none; }
    .specs-table-wrap tbody tr:hover { background: var(--mid); }
    .specs-table-wrap tbody td {
      font-size: 0.86rem; color: var(--text);
      padding: 0.95rem 1.4rem; border: none; vertical-align: middle;
    }
    .specs-table-wrap tbody td:first-child { font-weight: 500; color: #fff; }

    .cat-pill {
      font-size: 0.6rem; letter-spacing: 0.1em; text-transform: uppercase;
      padding: 0.2rem 0.55rem; border-radius: 4px; margin-left: 0.4rem;
    }
    .pill-oil  { background: rgba(249,115,22,0.12); color: var(--orange); }
    .pill-gas  { background: rgba(99,102,241,0.12); color: #818cf8; }
    .pill-power{ background: rgba(251,191,36,0.12); color: #fbbf24; }

    /* ── STEPS ── */
    .steps-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .step-card { display: flex; gap: 1.4rem; align-items: flex-start; padding: 2rem 0; border-bottom: 1px solid var(--border); }
    .step-card:last-child { border-bottom: none; }
    .step-num {
      font-family: 'Cormorant Garamond', serif; font-size: 2.8rem;
      font-weight: 300; color: rgba(249,115,22,0.22); line-height: 1; min-width: 52px;
    }
    .step-title { font-size: 1.05rem; font-weight: 400; color: #fff; margin-bottom: 0.4rem; }
    .step-text { font-size: 0.86rem; color: var(--muted); line-height: 1.75; margin: 0; }

    /* ── CTA ── */
    .cta-band {
      background: linear-gradient(135deg, rgba(249,115,22,0.07) 0%, transparent 55%), var(--dark2);
      border-top: 1px solid rgba(249,115,22,0.12);
      border-bottom: 1px solid rgba(249,115,22,0.12);
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
      .energy-row { grid-template-columns: auto 1fr auto auto; }
      .energy-row .spark { display: none; }
    }
  </style>
</head>
<body>
<x-header active="energies" />
<!-- ── HERO ── -->
<section class="energies-hero pt-5">
  <div class="hero-canvas"></div>
  <div class="grid-overlay"></div>
  <div class="heat-lines"></div>

  <!-- Rising particles -->
  <div class="particle" style="width:6px;height:6px;background:rgba(249,115,22,1);left:62%;top:80%;animation-duration:8s;animation-delay:0s;"></div>
  <div class="particle" style="width:4px;height:4px;background:rgba(251,191,36,1);left:68%;top:88%;animation-duration:11s;animation-delay:2s;"></div>
  <div class="particle" style="width:8px;height:8px;background:rgba(249,115,22,0.8);left:74%;top:75%;animation-duration:9s;animation-delay:1s;"></div>
  <div class="particle" style="width:5px;height:5px;background:rgba(251,191,36,0.9);left:58%;top:82%;animation-duration:13s;animation-delay:3s;"></div>
  <div class="particle" style="width:3px;height:3px;background:rgba(249,115,22,1);left:79%;top:90%;animation-duration:7s;animation-delay:4s;"></div>
  <div class="particle" style="width:6px;height:6px;background:rgba(234,88,12,0.8);left:71%;top:85%;animation-duration:10s;animation-delay:1.5s;"></div>

  <div class="container py-5 mt-4" style="padding-bottom:5rem !important;">
    <div class="row align-items-center g-5">

      <!-- Left -->
      <div class="col-lg-6">
        <div class="market-pill fade-up">
          <span class="live-dot-orange"></span> Crude Oil Futures: NYMEX &amp; ICE
        </div>
        <div class="hero-eyebrow fade-up">Markets — Energies</div>
        <h1 class="hero-title fade-up fade-up-1">
          Power your<br>portfolio with<br><em>raw energy.</em>
        </h1>
        <p class="hero-subtitle fade-up fade-up-2">
          Trade oil, natural gas, and power commodities through CFDs — with no futures contract rollovers, no physical delivery, and competitive spreads on the world's most geopolitically-sensitive markets.
        </p>
        <div class="hero-cta-row fade-up fade-up-3">
          <a href="#" class="btn-hero-orange">Start Trading</a>
          <a href="#" class="btn-hero-ghost">View All Energies</a>
        </div>
      </div>

      <!-- Right — Live Energy Panel -->
      <div class="col-lg-5 offset-lg-1 fade-up fade-up-4">
        <div class="energy-panel">
          <div class="panel-header">
            <div class="panel-title">Energy Markets</div>
            <div><span class="live-dot-orange"></span><span class="live-label">Live Prices</span></div>
          </div>

          <!-- WTI Crude -->
          <div class="energy-row">
            <div class="energy-icon" style="background:rgba(249,115,22,0.1);">🛢️</div>
            <div>
              <div class="energy-name">WTI Crude Oil</div>
              <div class="energy-sub">NYMEX · USD/barrel</div>
            </div>
            <div class="spark">
              <div class="spark-bar dn" style="height:60%"></div>
              <div class="spark-bar dn" style="height:48%"></div>
              <div class="spark-bar up" style="height:58%"></div>
              <div class="spark-bar up" style="height:72%"></div>
              <div class="spark-bar up" style="height:84%"></div>
              <div class="spark-bar dn" style="height:74%"></div>
              <div class="spark-bar up" style="height:88%"></div>
            </div>
            <div class="text-end">
              <div class="energy-price">$82.14</div>
              <div class="energy-unit">per barrel</div>
            </div>
            <div class="pair-change change-up">+1.28%</div>
          </div>

          <!-- Brent Crude -->
          <div class="energy-row">
            <div class="energy-icon" style="background:rgba(234,88,12,0.1);">🛢️</div>
            <div>
              <div class="energy-name">Brent Crude Oil</div>
              <div class="energy-sub">ICE · USD/barrel</div>
            </div>
            <div class="spark">
              <div class="spark-bar dn" style="height:55%"></div>
              <div class="spark-bar dn" style="height:44%"></div>
              <div class="spark-bar up" style="height:52%"></div>
              <div class="spark-bar up" style="height:65%"></div>
              <div class="spark-bar up" style="height:78%"></div>
              <div class="spark-bar up" style="height:90%"></div>
              <div class="spark-bar up" style="height:100%"></div>
            </div>
            <div class="text-end">
              <div class="energy-price">$86.52</div>
              <div class="energy-unit">per barrel</div>
            </div>
            <div class="pair-change change-up">+1.05%</div>
          </div>

          <!-- Natural Gas -->
          <div class="energy-row">
            <div class="energy-icon" style="background:rgba(99,102,241,0.10);">🔥</div>
            <div>
              <div class="energy-name">Natural Gas</div>
              <div class="energy-sub">NYMEX · USD/MMBtu</div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:80%"></div>
              <div class="spark-bar dn" style="height:65%"></div>
              <div class="spark-bar dn" style="height:50%"></div>
              <div class="spark-bar dn" style="height:38%"></div>
              <div class="spark-bar dn" style="height:28%"></div>
              <div class="spark-bar up" style="height:35%"></div>
              <div class="spark-bar dn" style="height:22%"></div>
            </div>
            <div class="text-end">
              <div class="energy-price">$2.184</div>
              <div class="energy-unit">per MMBtu</div>
            </div>
            <div class="pair-change change-dn">−2.41%</div>
          </div>

          <!-- Gasoline -->
          <div class="energy-row">
            <div class="energy-icon" style="background:rgba(251,191,36,0.10);">⛽</div>
            <div>
              <div class="energy-name">RBOB Gasoline</div>
              <div class="energy-sub">NYMEX · USD/gallon</div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:40%"></div>
              <div class="spark-bar up" style="height:55%"></div>
              <div class="spark-bar up" style="height:68%"></div>
              <div class="spark-bar dn" style="height:58%"></div>
              <div class="spark-bar up" style="height:70%"></div>
              <div class="spark-bar up" style="height:80%"></div>
              <div class="spark-bar up" style="height:90%"></div>
            </div>
            <div class="text-end">
              <div class="energy-price">$2.618</div>
              <div class="energy-unit">per gallon</div>
            </div>
            <div class="pair-change change-up">+0.74%</div>
          </div>

          <!-- Heating Oil -->
          <div class="energy-row">
            <div class="energy-icon" style="background:rgba(244,63,94,0.08);">🌡️</div>
            <div>
              <div class="energy-name">Heating Oil</div>
              <div class="energy-sub">NYMEX · USD/gallon</div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:45%"></div>
              <div class="spark-bar dn" style="height:35%"></div>
              <div class="spark-bar dn" style="height:28%"></div>
              <div class="spark-bar up" style="height:38%"></div>
              <div class="spark-bar dn" style="height:30%"></div>
              <div class="spark-bar dn" style="height:22%"></div>
              <div class="spark-bar dn" style="height:14%"></div>
            </div>
            <div class="text-end">
              <div class="energy-price">$2.741</div>
              <div class="energy-unit">per gallon</div>
            </div>
            <div class="pair-change change-dn">−0.58%</div>
          </div>

          <!-- UK Natural Gas -->
          <div class="energy-row">
            <div class="energy-icon" style="background:rgba(129,140,248,0.10);">💨</div>
            <div>
              <div class="energy-name">UK Natural Gas</div>
              <div class="energy-sub">ICE · GBp/therm</div>
            </div>
            <div class="spark">
              <div class="spark-bar dn" style="height:70%"></div>
              <div class="spark-bar up" style="height:78%"></div>
              <div class="spark-bar dn" style="height:65%"></div>
              <div class="spark-bar up" style="height:72%"></div>
              <div class="spark-bar up" style="height:82%"></div>
              <div class="spark-bar dn" style="height:70%"></div>
              <div class="spark-bar up" style="height:76%"></div>
            </div>
            <div class="text-end">
              <div class="energy-price">68.42p</div>
              <div class="energy-unit">per therm</div>
            </div>
            <div class="pair-change change-up">+0.42%</div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Ticker -->
  <div class="ticker-bg">
    <div class="ticker-track">
      <span class="ticker-item"><span class="ticker-pair">WTI Oil</span><span class="ticker-price">$82.14</span><span class="ticker-up">▲ 1.28%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Brent Crude</span><span class="ticker-price">$86.52</span><span class="ticker-up">▲ 1.05%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Natural Gas</span><span class="ticker-price">$2.184</span><span class="ticker-dn">▼ 2.41%</span></span>
      <span class="ticker-item"><span class="ticker-pair">RBOB Gasoline</span><span class="ticker-price">$2.618</span><span class="ticker-up">▲ 0.74%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Heating Oil</span><span class="ticker-price">$2.741</span><span class="ticker-dn">▼ 0.58%</span></span>
      <span class="ticker-item"><span class="ticker-pair">UK Nat Gas</span><span class="ticker-price">68.42p</span><span class="ticker-up">▲ 0.42%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Carbon Credits</span><span class="ticker-price">€64.30</span><span class="ticker-dn">▼ 0.88%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Ethanol</span><span class="ticker-price">$1.584</span><span class="ticker-up">▲ 0.31%</span></span>
      <!-- duplicate -->
      <span class="ticker-item"><span class="ticker-pair">WTI Oil</span><span class="ticker-price">$82.14</span><span class="ticker-up">▲ 1.28%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Brent Crude</span><span class="ticker-price">$86.52</span><span class="ticker-up">▲ 1.05%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Natural Gas</span><span class="ticker-price">$2.184</span><span class="ticker-dn">▼ 2.41%</span></span>
      <span class="ticker-item"><span class="ticker-pair">RBOB Gasoline</span><span class="ticker-price">$2.618</span><span class="ticker-up">▲ 0.74%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Heating Oil</span><span class="ticker-price">$2.741</span><span class="ticker-dn">▼ 0.58%</span></span>
      <span class="ticker-item"><span class="ticker-pair">UK Nat Gas</span><span class="ticker-price">68.42p</span><span class="ticker-up">▲ 0.42%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Carbon Credits</span><span class="ticker-price">€64.30</span><span class="ticker-dn">▼ 0.88%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Ethanol</span><span class="ticker-price">$1.584</span><span class="ticker-up">▲ 0.31%</span></span>
    </div>
  </div>
</section>

<!-- ── NUMBERS STRIP ── -->
<div class="numbers-strip">
  <div class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">15<sup>+</sup></div>
        <div class="num-desc">Energy CFDs</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">$0<sup>.03</sup></div>
        <div class="num-desc">Min Spread (WTI)</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">500<sup>:1</sup></div>
        <div class="num-desc">Max Leverage</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">23<sup>/5</sup></div>
        <div class="num-desc">Trading Hours</div>
      </div>
    </div>
  </div>
</div>

<!-- ── ENERGY TYPES ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row align-items-end g-4 mb-5">
      <div class="col-lg-6">
        <div class="section-tag">What We Offer</div>
        <h2 class="section-title">Three categories.<br>One platform.</h2>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <p style="font-size:0.92rem;color:var(--muted);line-height:1.85;">
          From crude oil and natural gas to renewable energy certificates — our energy CFD suite covers the full spectrum of global energy markets.
        </p>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="type-card">
          <span class="type-emoji">🛢️</span>
          <div class="type-name">Crude Oil</div>
          <p class="type-text">The world's most traded commodity. WTI and Brent crude are benchmarks for global energy pricing, driven by OPEC decisions, geopolitics, and supply data.</p>
          <div class="type-instruments">
            <span class="instr-badge">WTI Crude</span>
            <span class="instr-badge">Brent Crude</span>
            <span class="instr-badge">Dubai Crude</span>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="type-card">
          <span class="type-emoji">🔥</span>
          <div class="type-name">Natural Gas</div>
          <p class="type-text">Highly volatile and weather-sensitive, natural gas is influenced by seasonal demand, storage reports, and geopolitical supply disruptions.</p>
          <div class="type-instruments">
            <span class="instr-badge">Henry Hub Gas</span>
            <span class="instr-badge">UK Natural Gas</span>
            <span class="instr-badge">TTF Gas</span>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="type-card">
          <span class="type-emoji">⚡</span>
          <div class="type-name">Refined Products</div>
          <p class="type-text">Trade downstream energy products refined from crude oil — including gasoline, heating oil, and ethanol — all priced in real time.</p>
          <div class="type-instruments">
            <span class="instr-badge">RBOB Gasoline</span>
            <span class="instr-badge">Heating Oil</span>
            <span class="instr-badge">Ethanol</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── PRICE DRIVERS ── -->
<section class="drivers-section py-5">
  <div class="container py-3">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="section-tag">Market Movers</div>
        <h2 class="section-title">What moves<br>energy prices</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:310px;">
          Energy markets react sharply to global events. Understanding these drivers is essential to trading them effectively.
        </p>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="driver-item">
          <div class="driver-icon"><i class="uil uil-users-alt"></i></div>
          <div>
            <div class="driver-title">OPEC+ Production Decisions</div>
            <p class="driver-text">Supply cuts or increases from OPEC and its allies are the single biggest driver of crude oil prices. Production announcements move markets by 3–5% within hours.</p>
          </div>
        </div>
        <div class="driver-item">
          <div class="driver-icon"><i class="uil uil-globe"></i></div>
          <div>
            <div class="driver-title">Geopolitical Tensions</div>
            <p class="driver-text">Conflicts in oil-producing regions, sanctions, and political instability directly impact supply chains and create significant price volatility in both oil and gas.</p>
          </div>
        </div>
        <div class="driver-item">
          <div class="driver-icon"><i class="uil uil-cloud-wind"></i></div>
          <div>
            <div class="driver-title">Seasonal &amp; Weather Demand</div>
            <p class="driver-text">Natural gas prices spike in cold winters as heating demand surges. Hurricanes in the Gulf of Mexico routinely disrupt oil production and refining capacity.</p>
          </div>
        </div>
        <div class="driver-item">
          <div class="driver-icon"><i class="uil uil-chart-bar"></i></div>
          <div>
            <div class="driver-title">EIA Inventory Reports</div>
            <p class="driver-text">The US Energy Information Administration releases weekly oil and gas inventory data. Unexpected drawdowns or builds trigger sharp intraday price swings.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── FEATURE CARDS ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row g-4 align-items-start">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="section-tag">Why Trade Energies</div>
        <h2 class="section-title">Volatility is<br>the opportunity.</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:320px;">
          Energy markets offer some of the most explosive trading opportunities available — driven by supply shocks, demand cycles, and global macro events.
        </p>
      </div>
      <div class="col-lg-8">
        <div class="row g-3">
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-box"></i></div>
              <div class="feature-title">No Physical Delivery</div>
              <p class="feature-text">Trade energy CFDs without ever worrying about physical barrel delivery or futures rollover costs. Pure price exposure, managed simply.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-bolt"></i></div>
              <div class="feature-title">High Volatility Plays</div>
              <p class="feature-text">Energy markets can move 3–8% in a single session. With leverage up to 500:1 on WTI crude, even small moves create significant returns.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-shield-check"></i></div>
              <div class="feature-title">Portfolio Hedging</div>
              <p class="feature-text">Energy commodities are natural inflation hedges. Going long on crude when equities sell off provides powerful portfolio protection.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-clock-three"></i></div>
              <div class="feature-title">Extended Hours</div>
              <p class="feature-text">Trade WTI and Brent crude nearly 24 hours a day, 5 days a week — reacting to overnight OPEC announcements or geopolitical breaks in real time.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── SPECS TABLE ── -->
<section class="py-5" style="background:var(--dark2);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
  <div class="container py-3">
    <div class="row align-items-start g-5">
      <div class="col-lg-4">
        <div class="section-tag">Instrument Specs</div>
        <h2 class="section-title">Energy CFDs &amp;<br>trading conditions</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:310px;">
          Transparent pricing on all energy CFDs. No rollover surprises, no hidden markups — just clean spreads on live market prices.
        </p>
        <a href="#" class="btn-hero-orange mt-4 d-inline-block">Open Account</a>
      </div>
      <div class="col-lg-8">
        <div class="specs-table-wrap">
          <table class="table table-borderless mb-0">
            <thead>
              <tr>
                <th>Instrument</th>
                <th>Category</th>
                <th>Spread</th>
                <th>Leverage</th>
                <th>Contract Size</th>
                <th>24h</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>WTI Crude Oil</td>
                <td><span class="cat-pill pill-oil">Oil</span></td>
                <td>$0.03</td>
                <td>1:500</td>
                <td>1,000 bbl</td>
                <td style="color:var(--green)">+1.28%</td>
              </tr>
              <tr>
                <td>Brent Crude Oil</td>
                <td><span class="cat-pill pill-oil">Oil</span></td>
                <td>$0.05</td>
                <td>1:500</td>
                <td>1,000 bbl</td>
                <td style="color:var(--green)">+1.05%</td>
              </tr>
              <tr>
                <td>Natural Gas (Henry Hub)</td>
                <td><span class="cat-pill pill-gas">Gas</span></td>
                <td>$0.004</td>
                <td>1:200</td>
                <td>10,000 MMBtu</td>
                <td style="color:var(--rose)">−2.41%</td>
              </tr>
              <tr>
                <td>UK Natural Gas</td>
                <td><span class="cat-pill pill-gas">Gas</span></td>
                <td>0.12p</td>
                <td>1:200</td>
                <td>1,000 therms</td>
                <td style="color:var(--green)">+0.42%</td>
              </tr>
              <tr>
                <td>RBOB Gasoline</td>
                <td><span class="cat-pill pill-power">Refined</span></td>
                <td>$0.003</td>
                <td>1:100</td>
                <td>42,000 gal</td>
                <td style="color:var(--green)">+0.74%</td>
              </tr>
              <tr>
                <td>Heating Oil</td>
                <td><span class="cat-pill pill-power">Refined</span></td>
                <td>$0.003</td>
                <td>1:100</td>
                <td>42,000 gal</td>
                <td style="color:var(--rose)">−0.58%</td>
              </tr>
              <tr>
                <td>Ethanol</td>
                <td><span class="cat-pill pill-power">Refined</span></td>
                <td>$0.005</td>
                <td>1:50</td>
                <td>29,000 gal</td>
                <td style="color:var(--green)">+0.31%</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── STEPS ── -->
<section class="steps-section py-5">
  <div class="container py-3">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="section-tag">Get Started</div>
        <h2 class="section-title">Trade energies<br>in three steps</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;">
          No futures account. No commodity broker. No barrel of oil in your garage. Just open a CFD account and trade the world's most critical resources.
        </p>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="step-card">
          <div class="step-num">01</div>
          <div>
            <div class="step-title">Open &amp; Verify Your Account</div>
            <p class="step-text">Register in minutes, complete identity verification, and unlock instant access to 15+ energy CFDs including WTI crude, Brent, and natural gas.</p>
          </div>
        </div>
        <div class="step-card">
          <div class="step-num">02</div>
          <div>
            <div class="step-title">Deposit Funds</div>
            <p class="step-text">Add funds via bank transfer, card, or crypto. Your balance is credited immediately — no delays between depositing and trading.</p>
          </div>
        </div>
        <div class="step-card">
          <div class="step-num">03</div>
          <div>
            <div class="step-title">Select an Energy &amp; Trade</div>
            <p class="step-text">Monitor OPEC news, EIA inventory data, and live charts. Set your position size and leverage, go long or short, and manage your trade in real time.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── CTA ── -->
<section class="cta-band py-5">
  <div class="container py-3 text-center">
    <div class="section-tag d-inline-flex">Start Trading</div>
    <h2 class="section-title mt-1 mx-auto" style="max-width:560px;">The world runs<br>on energy. Trade it.</h2>
    <p class="mt-3 mx-auto" style="font-size:0.92rem;color:var(--muted);line-height:1.8;max-width:460px;">
      Open a live account and access global energy markets today, or start with a risk-free $10,000 demo — no deposit required.
    </p>
    <div class="d-flex gap-3 justify-content-center flex-wrap mt-4">
      <a href="#" class="btn-hero-orange">Open Live Account</a>
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
      <p>© <span id="year"></span> TESLA INVEST. All rights reserved. Energy CFD trading carries significant risk of loss. This is a fictional demo site for illustrative purposes only.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>document.getElementById("year").textContent = new Date().getFullYear();</script>
</body>
</html>
