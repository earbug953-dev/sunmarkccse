<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Indices — Tesla Invest</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    :root {
      --teal: #14b8a6;
      --teal-dim: rgba(20,184,166,0.10);
      --teal-glow: rgba(20,184,166,0.06);
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
.table{
        bg:var(--dark);
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
    .indices-hero {
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
        radial-gradient(ellipse 60% 55% at 72% 42%, var(--teal-glow) 0%, transparent 62%),
        radial-gradient(ellipse 38% 45% at 8% 78%, rgba(20,184,166,0.04) 0%, transparent 58%),
        radial-gradient(ellipse 28% 32% at 48% 8%, rgba(34,197,94,0.03) 0%, transparent 55%);
    }
    .grid-overlay {
      position: absolute; inset: 0;
      background-image:
        linear-gradient(to right, rgba(255,255,255,0.022) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.022) 1px, transparent 1px);
      background-size: 80px 80px;
      pointer-events: none;
    }

    /* World map dots background */
    .map-dots {
      position: absolute;
      right: -5%;
      top: 50%;
      transform: translateY(-50%);
      width: 55%;
      height: 70%;
      pointer-events: none;
      opacity: 0.025;
      background-image: radial-gradient(circle, rgba(20,184,166,1) 1px, transparent 1px);
      background-size: 22px 22px;
      border-radius: 50%;
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
      animation: tickerScroll 38s linear infinite;
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
      background: var(--teal-dim);
      border: 1px solid rgba(20,184,166,0.22);
      border-radius: 30px;
      padding: 0.35rem 1rem;
      font-size: 0.72rem; letter-spacing: 0.1em;
      color: var(--teal); font-weight: 500;
      margin-bottom: 2rem;
    }
    .live-dot-teal {
      width: 7px; height: 7px; border-radius: 50%;
      background: var(--teal); display: inline-block;
      animation: pulseTeal 2s ease infinite;
    }
    @keyframes pulseTeal {
      0%,100% { opacity:1; box-shadow: 0 0 0 0 rgba(20,184,166,0.4); }
      50%      { opacity:0.8; box-shadow: 0 0 0 5px rgba(20,184,166,0); }
    }

    .hero-eyebrow {
      font-size: 0.7rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--teal); font-weight: 500;
      display: flex; align-items: center; gap: 12px; margin-bottom: 2rem;
    }
    .hero-eyebrow::before {
      content: ''; display: block; width: 36px; height: 1px; background: var(--teal);
    }
    .hero-title {
      font-size: clamp(3rem, 7vw, 5.8rem);
      font-weight: 300; line-height: 1.05; color: #fff; margin-bottom: 2rem;
    }
    .hero-title em { font-style: italic; color: var(--teal); }
    .hero-subtitle {
      font-size: clamp(0.95rem, 2vw, 1.1rem); line-height: 1.85;
      color: var(--muted); max-width: 460px; font-weight: 300;
    }
    .hero-cta-row { display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 2.8rem; }
    .btn-hero-teal {
      background: var(--teal); color: #000;
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: none; border-radius: 4px;
      text-decoration: none; transition: background 0.2s; display: inline-block; font-weight: 500;
    }
    .btn-hero-teal:hover { background: #0d9488; color: #000; }
    .btn-hero-ghost {
      background: transparent; color: var(--muted);
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: 1px solid var(--border); border-radius: 4px;
      text-decoration: none; transition: all 0.2s; display: inline-block;
    }
    .btn-hero-ghost:hover { border-color: rgba(255,255,255,0.25); color: #fff; }

    /* ── INDICES PANEL ── */
    .indices-panel {
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
    .live-label { font-size: 0.68rem; letter-spacing: 0.15em; color: var(--teal); text-transform: uppercase; }

    .index-row {
      padding: 1rem 1.6rem;
      border-bottom: 1px solid var(--border);
      display: grid;
      grid-template-columns: 1fr auto auto auto;
      align-items: center;
      gap: 1.2rem;
      transition: background 0.15s; cursor: default;
    }
    .index-row:last-child { border-bottom: none; }
    .index-row:hover { background: var(--mid); }

    .index-flag { font-size: 1.2rem; line-height: 1; margin-right: 0.5rem; }
    .index-name { font-size: 0.9rem; font-weight: 500; color: #fff; }
    .index-region { font-size: 0.7rem; color: var(--muted); margin-top: 2px; }

    .index-value {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.35rem; font-weight: 400; color: #fff;
      text-align: right;
    }
    .index-pts { font-size: 0.7rem; color: var(--muted); text-align: right; margin-top: 2px; }

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
    .big-num sup { font-size: 1.3rem; color: var(--teal); vertical-align: super; font-weight: 400; }
    .num-desc { font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--muted); margin-top: 0.5rem; }

    /* ── SECTION HELPERS ── */
    .section-tag {
      font-size: 0.68rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--teal); font-weight: 500;
      display: inline-flex; align-items: center; gap: 10px; margin-bottom: 1.2rem;
    }
    .section-tag::after { content: ''; display: block; width: 28px; height: 1px; background: var(--teal); }
    .section-title { font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 300; color: #fff; line-height: 1.1; }

    /* ── REGION CARDS ── */
    .region-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 14px; padding: 1.6rem;
      position: relative; overflow: hidden;
      transition: border-color 0.25s, transform 0.22s;
      height: 100%;
    }
    .region-card::after {
      content: '';
      position: absolute; bottom: 0; left: 0; right: 0;
      height: 2px; background: var(--teal); opacity: 0;
      transition: opacity 0.25s;
    }
    .region-card:hover { border-color: rgba(20,184,166,0.25); transform: translateY(-4px); }
    .region-card:hover::after { opacity: 1; }
    .region-flag { font-size: 2rem; margin-bottom: 1rem; }
    .region-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.25rem; font-weight: 400; color: #fff; margin-bottom: 0.3rem;
    }
    .region-sub { font-size: 0.75rem; color: var(--muted); margin-bottom: 1.1rem; letter-spacing: 0.05em; }
    .region-indices { display: flex; flex-wrap: wrap; gap: 0.4rem; }
    .region-badge {
      font-size: 0.65rem; letter-spacing: 0.08em;
      padding: 0.22rem 0.6rem; border-radius: 4px;
      background: var(--teal-dim); color: var(--teal); border: 1px solid rgba(20,184,166,0.15);
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
      height: 2px; background: var(--teal); opacity: 0; transition: opacity 0.25s;
    }
    .feature-card:hover { border-color: rgba(20,184,166,0.25); transform: translateY(-4px); }
    .feature-card:hover::before { opacity: 1; }
    .feature-icon {
      width: 46px; height: 46px; border-radius: 10px;
      background: var(--teal-dim);
      display: flex; align-items: center; justify-content: center;
      color: var(--teal); font-size: 1.35rem; margin-bottom: 1.3rem;
    }
    .feature-title { font-family: 'Cormorant Garamond', serif; font-size: 1.35rem; font-weight: 400; color: #fff; margin-bottom: 0.65rem; }
    .feature-text { font-size: 0.87rem; line-height: 1.8; color: var(--muted); }

    /* ── INDEX TABLE ── */
    .index-table-wrap {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 16px; overflow: hidden;
    }
    .index-table-wrap table { margin: 0; }
    .index-table-wrap thead tr { background: var(--mid); border-bottom: 1px solid var(--border); }
    .index-table-wrap thead th {
      font-size: 0.68rem; letter-spacing: 0.2em; text-transform: uppercase;
      color: var(--muted); font-weight: 500; padding: 1rem 1.4rem; border: none;
    }
    .index-table-wrap tbody tr { border-bottom: 1px solid var(--border); transition: background 0.15s; }
    .index-table-wrap tbody tr:last-child { border-bottom: none; }
    .index-table-wrap tbody tr:hover { background: var(--mid); }
    .index-table-wrap tbody td {
      font-size: 0.86rem; color: var(--text);
      padding: 0.95rem 1.4rem; border: none; vertical-align: middle;
    }
    .index-table-wrap tbody td:first-child { font-weight: 500; color: #fff; }

    .region-pill {
      font-size: 0.6rem; letter-spacing: 0.1em; text-transform: uppercase;
      padding: 0.2rem 0.55rem; border-radius: 4px; margin-left: 0.4rem;
    }
    .pill-us     { background: rgba(59,130,246,0.12); color: #60a5fa; }
    .pill-eu     { background: rgba(20,184,166,0.10); color: var(--teal); }
    .pill-asia   { background: rgba(245,158,11,0.10); color: #fbbf24; }
    .pill-uk     { background: rgba(244,63,94,0.10); color: #fb7185; }

    /* ── SESSION CLOCK ── */
    .sessions-wrap {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 14px; padding: 1.8rem 2rem;
    }
    .session-row {
      display: flex; align-items: center; gap: 1.2rem;
      padding: 0.9rem 0; border-bottom: 1px solid var(--border);
    }
    .session-row:last-child { border-bottom: none; }
    .session-indicator {
      width: 10px; height: 10px; border-radius: 50%; flex-shrink: 0;
    }
    .session-open { background: var(--green); box-shadow: 0 0 0 3px rgba(34,197,94,0.2); }
    .session-closed { background: rgba(255,255,255,0.15); }
    .session-name { font-size: 0.88rem; font-weight: 500; color: #fff; min-width: 100px; }
    .session-time { font-size: 0.76rem; color: var(--muted); }
    .session-status {
      font-size: 0.65rem; letter-spacing: 0.12em; text-transform: uppercase;
      padding: 0.18rem 0.6rem; border-radius: 4px; margin-left: auto;
    }
    .status-open   { background: var(--green-dim); color: var(--green); }
    .status-closed { background: rgba(255,255,255,0.05); color: rgba(255,255,255,0.25); }

    /* ── STEPS ── */
    .steps-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .step-card { display: flex; gap: 1.4rem; align-items: flex-start; padding: 2rem 0; border-bottom: 1px solid var(--border); }
    .step-card:last-child { border-bottom: none; }
    .step-num {
      font-family: 'Cormorant Garamond', serif; font-size: 2.8rem;
      font-weight: 300; color: rgba(20,184,166,0.22); line-height: 1; min-width: 52px;
    }
    .step-title { font-size: 1.05rem; font-weight: 400; color: #fff; margin-bottom: 0.4rem; }
    .step-text { font-size: 0.86rem; color: var(--muted); line-height: 1.75; margin: 0; }

    /* ── CTA ── */
    .cta-band {
      background: linear-gradient(135deg, rgba(20,184,166,0.07) 0%, transparent 55%), var(--dark2);
      border-top: 1px solid rgba(20,184,166,0.12);
      border-bottom: 1px solid rgba(20,184,166,0.12);
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
      .index-row { grid-template-columns: 1fr auto auto; }
      .index-row .spark { display: none; }
    }
  </style>
</head>
<body>

<!-- ── NAVBAR ── -->
<x-header />

<!-- ── HERO ── -->
<section class="indices-hero pt-5">
  <div class="hero-canvas"></div>
  <div class="grid-overlay"></div>
  <div class="map-dots"></div>

  <div class="container py-5 mt-4" style="padding-bottom:5rem !important;">
    <div class="row align-items-center g-5">

      <!-- Left -->
      <div class="col-lg-6">
        <div class="market-pill fade-up">
          <span class="live-dot-teal"></span> 12 Global Sessions Tracked
        </div>
        <div class="hero-eyebrow fade-up">Markets — Indices</div>
        <h1 class="hero-title fade-up fade-up-1">
          Trade entire<br>economies<br><em>in one move.</em>
        </h1>
        <p class="hero-subtitle fade-up fade-up-2">
          Gain broad market exposure through 30+ major global indices — from the S&amp;P 500 and FTSE 100 to the Nikkei 225 and DAX 40 — all from a single account.
        </p>
        <div class="hero-cta-row fade-up fade-up-3">
          <a href="#" class="btn-hero-teal">Start Trading</a>
          <a href="#" class="btn-hero-ghost">View All Indices</a>
        </div>
      </div>

      <!-- Right — Live Indices Panel -->
      <div class="col-lg-5 offset-lg-1 fade-up fade-up-4">
        <div class="indices-panel">
          <div class="panel-header">
            <div class="panel-title">Major Indices</div>
            <div><span class="live-dot-teal"></span><span class="live-label">Live Prices</span></div>
          </div>

          <!-- S&P 500 -->
          <div class="index-row">
            <div class="d-flex align-items-center gap-2">
              <span class="index-flag">🇺🇸</span>
              <div>
                <div class="index-name">S&amp;P 500</div>
                <div class="index-region">USA · NYSE &amp; NASDAQ</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar dn" style="height:55%"></div>
              <div class="spark-bar up" style="height:65%"></div>
              <div class="spark-bar up" style="height:75%"></div>
              <div class="spark-bar dn" style="height:68%"></div>
              <div class="spark-bar up" style="height:80%"></div>
              <div class="spark-bar up" style="height:92%"></div>
              <div class="spark-bar up" style="height:100%"></div>
            </div>
            <div class="text-end">
              <div class="index-value">5,842.4</div>
              <div class="index-pts">+31.2 pts</div>
            </div>
            <div class="pair-change change-up">+0.54%</div>
          </div>

          <!-- NASDAQ 100 -->
          <div class="index-row">
            <div class="d-flex align-items-center gap-2">
              <span class="index-flag">🇺🇸</span>
              <div>
                <div class="index-name">NASDAQ 100</div>
                <div class="index-region">USA · Technology</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:40%"></div>
              <div class="spark-bar up" style="height:58%"></div>
              <div class="spark-bar up" style="height:72%"></div>
              <div class="spark-bar up" style="height:85%"></div>
              <div class="spark-bar dn" style="height:74%"></div>
              <div class="spark-bar up" style="height:88%"></div>
              <div class="spark-bar up" style="height:100%"></div>
            </div>
            <div class="text-end">
              <div class="index-value">20,341.6</div>
              <div class="index-pts">+214.8 pts</div>
            </div>
            <div class="pair-change change-up">+1.07%</div>
          </div>

          <!-- FTSE 100 -->
          <div class="index-row">
            <div class="d-flex align-items-center gap-2">
              <span class="index-flag">🇬🇧</span>
              <div>
                <div class="index-name">FTSE 100</div>
                <div class="index-region">UK · London Stock Exchange</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:70%"></div>
              <div class="spark-bar dn" style="height:58%"></div>
              <div class="spark-bar dn" style="height:46%"></div>
              <div class="spark-bar dn" style="height:35%"></div>
              <div class="spark-bar up" style="height:44%"></div>
              <div class="spark-bar dn" style="height:32%"></div>
              <div class="spark-bar dn" style="height:22%"></div>
            </div>
            <div class="text-end">
              <div class="index-value">8,214.7</div>
              <div class="index-pts">−38.5 pts</div>
            </div>
            <div class="pair-change change-dn">−0.47%</div>
          </div>

          <!-- DAX 40 -->
          <div class="index-row">
            <div class="d-flex align-items-center gap-2">
              <span class="index-flag">🇩🇪</span>
              <div>
                <div class="index-name">DAX 40</div>
                <div class="index-region">Germany · XETRA</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar dn" style="height:60%"></div>
              <div class="spark-bar up" style="height:72%"></div>
              <div class="spark-bar up" style="height:80%"></div>
              <div class="spark-bar up" style="height:90%"></div>
              <div class="spark-bar dn" style="height:78%"></div>
              <div class="spark-bar up" style="height:86%"></div>
              <div class="spark-bar up" style="height:95%"></div>
            </div>
            <div class="text-end">
              <div class="index-value">19,480.2</div>
              <div class="index-pts">+122.6 pts</div>
            </div>
            <div class="pair-change change-up">+0.63%</div>
          </div>

          <!-- Nikkei 225 -->
          <div class="index-row">
            <div class="d-flex align-items-center gap-2">
              <span class="index-flag">🇯🇵</span>
              <div>
                <div class="index-name">Nikkei 225</div>
                <div class="index-region">Japan · Tokyo Stock Exchange</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:35%"></div>
              <div class="spark-bar dn" style="height:25%"></div>
              <div class="spark-bar up" style="height:38%"></div>
              <div class="spark-bar dn" style="height:28%"></div>
              <div class="spark-bar dn" style="height:20%"></div>
              <div class="spark-bar dn" style="height:15%"></div>
              <div class="spark-bar dn" style="height:10%"></div>
            </div>
            <div class="text-end">
              <div class="index-value">37,628.0</div>
              <div class="index-pts">−410.3 pts</div>
            </div>
            <div class="pair-change change-dn">−1.08%</div>
          </div>

          <!-- Hang Seng -->
          <div class="index-row">
            <div class="d-flex align-items-center gap-2">
              <span class="index-flag">🇭🇰</span>
              <div>
                <div class="index-name">Hang Seng</div>
                <div class="index-region">Hong Kong · HKEX</div>
              </div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:50%"></div>
              <div class="spark-bar up" style="height:62%"></div>
              <div class="spark-bar dn" style="height:52%"></div>
              <div class="spark-bar up" style="height:65%"></div>
              <div class="spark-bar up" style="height:76%"></div>
              <div class="spark-bar up" style="height:84%"></div>
              <div class="spark-bar up" style="height:92%"></div>
            </div>
            <div class="text-end">
              <div class="index-value">18,741.3</div>
              <div class="index-pts">+186.4 pts</div>
            </div>
            <div class="pair-change change-up">+1.00%</div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Ticker -->
  <div class="ticker-bg">
    <div class="ticker-track">
      <span class="ticker-item"><span class="ticker-pair">S&amp;P 500</span><span class="ticker-price">5,842.4</span><span class="ticker-up">▲ 0.54%</span></span>
      <span class="ticker-item"><span class="ticker-pair">NASDAQ 100</span><span class="ticker-price">20,341.6</span><span class="ticker-up">▲ 1.07%</span></span>
      <span class="ticker-item"><span class="ticker-pair">FTSE 100</span><span class="ticker-price">8,214.7</span><span class="ticker-dn">▼ 0.47%</span></span>
      <span class="ticker-item"><span class="ticker-pair">DAX 40</span><span class="ticker-price">19,480.2</span><span class="ticker-up">▲ 0.63%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Nikkei 225</span><span class="ticker-price">37,628.0</span><span class="ticker-dn">▼ 1.08%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Hang Seng</span><span class="ticker-price">18,741.3</span><span class="ticker-up">▲ 1.00%</span></span>
      <span class="ticker-item"><span class="ticker-pair">CAC 40</span><span class="ticker-price">7,384.5</span><span class="ticker-dn">▼ 0.22%</span></span>
      <span class="ticker-item"><span class="ticker-pair">ASX 200</span><span class="ticker-price">8,062.1</span><span class="ticker-up">▲ 0.31%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Dow Jones</span><span class="ticker-price">43,814.2</span><span class="ticker-up">▲ 0.38%</span></span>
      <!-- duplicate -->
      <span class="ticker-item"><span class="ticker-pair">S&amp;P 500</span><span class="ticker-price">5,842.4</span><span class="ticker-up">▲ 0.54%</span></span>
      <span class="ticker-item"><span class="ticker-pair">NASDAQ 100</span><span class="ticker-price">20,341.6</span><span class="ticker-up">▲ 1.07%</span></span>
      <span class="ticker-item"><span class="ticker-pair">FTSE 100</span><span class="ticker-price">8,214.7</span><span class="ticker-dn">▼ 0.47%</span></span>
      <span class="ticker-item"><span class="ticker-pair">DAX 40</span><span class="ticker-price">19,480.2</span><span class="ticker-up">▲ 0.63%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Nikkei 225</span><span class="ticker-price">37,628.0</span><span class="ticker-dn">▼ 1.08%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Hang Seng</span><span class="ticker-price">18,741.3</span><span class="ticker-up">▲ 1.00%</span></span>
      <span class="ticker-item"><span class="ticker-pair">CAC 40</span><span class="ticker-price">7,384.5</span><span class="ticker-dn">▼ 0.22%</span></span>
      <span class="ticker-item"><span class="ticker-pair">ASX 200</span><span class="ticker-price">8,062.1</span><span class="ticker-up">▲ 0.31%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Dow Jones</span><span class="ticker-price">43,814.2</span><span class="ticker-up">▲ 0.38%</span></span>
    </div>
  </div>
</section>

<!-- ── NUMBERS STRIP ── -->
<div class="numbers-strip">
  <div class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">30<sup>+</sup></div>
        <div class="num-desc">Global Indices</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">0.4<sup>pt</sup></div>
        <div class="num-desc">Min Spread</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">100<sup>:1</sup></div>
        <div class="num-desc">Max Leverage</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">12<sup>+</sup></div>
        <div class="num-desc">Sessions Covered</div>
      </div>
    </div>
  </div>
</div>

<!-- ── REGIONS ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row g-4 align-items-start mb-5">
      <div class="col-lg-6">
        <div class="section-tag">Global Coverage</div>
        <h2 class="section-title">Every major<br>market. Every region.</h2>
      </div>
      <div class="col-lg-6">
        <p style="font-size:0.92rem;color:var(--muted);line-height:1.85;padding-top:0.5rem;">
          From Wall Street to Tokyo, Frankfurt to Sydney — our index CFDs span four continents and all major trading sessions, giving you genuine global diversification from a single account.
        </p>
      </div>
    </div>

    <div class="row g-3">
      <div class="col-sm-6 col-lg-3">
        <div class="region-card">
          <div class="region-flag">🇺🇸</div>
          <div class="region-name">Americas</div>
          <div class="region-sub">NYSE · NASDAQ · CME</div>
          <div class="region-indices">
            <span class="region-badge">S&amp;P 500</span>
            <span class="region-badge">NASDAQ 100</span>
            <span class="region-badge">Dow Jones</span>
            <span class="region-badge">Russell 2000</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="region-card">
          <div class="region-flag">🇬🇧</div>
          <div class="region-name">United Kingdom</div>
          <div class="region-sub">London Stock Exchange</div>
          <div class="region-indices">
            <span class="region-badge">FTSE 100</span>
            <span class="region-badge">FTSE 250</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="region-card">
          <div class="region-flag">🇪🇺</div>
          <div class="region-name">Europe</div>
          <div class="region-sub">XETRA · Euronext · SIX</div>
          <div class="region-indices">
            <span class="region-badge">DAX 40</span>
            <span class="region-badge">CAC 40</span>
            <span class="region-badge">Euro Stoxx 50</span>
            <span class="region-badge">SMI</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="region-card">
          <div class="region-flag">🌏</div>
          <div class="region-name">Asia Pacific</div>
          <div class="region-sub">TSE · HKEX · ASX · SGX</div>
          <div class="region-indices">
            <span class="region-badge">Nikkei 225</span>
            <span class="region-badge">Hang Seng</span>
            <span class="region-badge">ASX 200</span>
            <span class="region-badge">CSI 300</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── WHY INDICES ── -->
<section class="py-5" style="background:var(--dark2);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
  <div class="container py-3">
    <div class="row g-5 align-items-start">
      <div class="col-lg-4">
        <div class="section-tag">Why Trade Indices</div>
        <h2 class="section-title">Diversification<br>in one instrument.</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:320px;">
          Rather than picking individual stocks, indices let you trade the performance of an entire economy or sector with a single position.
        </p>

        <!-- Trading session tracker -->
        <div class="sessions-wrap mt-4">
          <div style="font-size:0.68rem;letter-spacing:0.2em;text-transform:uppercase;color:var(--muted);margin-bottom:1rem;">Live Sessions</div>
          <div class="session-row">
            <div class="session-indicator session-open"></div>
            <div class="session-name">New York</div>
            <div class="session-time">09:30 – 16:00 EST</div>
            <span class="session-status status-open">Open</span>
          </div>
          <div class="session-row">
            <div class="session-indicator session-open"></div>
            <div class="session-name">London</div>
            <div class="session-time">08:00 – 16:30 GMT</div>
            <span class="session-status status-open">Open</span>
          </div>
          <div class="session-row">
            <div class="session-indicator session-closed"></div>
            <div class="session-name">Tokyo</div>
            <div class="session-time">09:00 – 15:30 JST</div>
            <span class="session-status status-closed">Closed</span>
          </div>
          <div class="session-row">
            <div class="session-indicator session-closed"></div>
            <div class="session-name">Sydney</div>
            <div class="session-time">10:00 – 16:00 AEST</div>
            <span class="session-status status-closed">Closed</span>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="row g-3">
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-layer-group"></i></div>
              <div class="feature-title">Instant Diversification</div>
              <p class="feature-text">One index position gives you exposure to hundreds of companies simultaneously. The S&amp;P 500 alone covers 80% of US market cap.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-chart-line"></i></div>
              <div class="feature-title">Macro Trend Trading</div>
              <p class="feature-text">Trade interest rate decisions, GDP releases, and geopolitical events through index movements rather than picking individual stocks.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-compress-alt"></i></div>
              <div class="feature-title">Tight Spreads</div>
              <p class="feature-text">Major indices like the S&amp;P 500 and DAX trade with spreads from just 0.4 points — some of the tightest conditions available anywhere.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-arrows-v"></i></div>
              <div class="feature-title">Long &amp; Short</div>
              <p class="feature-text">Hedge your stock portfolio by shorting indices during corrections, or go long in bull runs. CFD structure makes both directions equally accessible.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── INDEX TABLE ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row align-items-start g-5">
      <div class="col-lg-4">
        <div class="section-tag">Instrument Specs</div>
        <h2 class="section-title">Indices &amp;<br>trading conditions</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:310px;">
          Competitive spreads across all major global indices with clearly defined trading hours aligned to each exchange session.
        </p>
        <a href="#" class="btn-hero-teal mt-4 d-inline-block">Open Account</a>
      </div>
      <div class="col-lg-8">
        <div class="index-table-wrap">
          <table class="table table-borderless mb-0">
            <thead>
              <tr>
                <th>Index</th>
                <th>Region</th>
                <th>Spread</th>
                <th>Leverage</th>
                <th>Hours (Local)</th>
                <th>24h</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>S&amp;P 500</td>
                <td><span class="region-pill pill-us">USA</span></td>
                <td>0.4 pts</td>
                <td>1:100</td>
                <td>09:30–16:00</td>
                <td style="color:var(--green)">+0.54%</td>
              </tr>
              <tr>
                <td>NASDAQ 100</td>
                <td><span class="region-pill pill-us">USA</span></td>
                <td>1.0 pts</td>
                <td>1:100</td>
                <td>09:30–16:00</td>
                <td style="color:var(--green)">+1.07%</td>
              </tr>
              <tr>
                <td>Dow Jones 30</td>
                <td><span class="region-pill pill-us">USA</span></td>
                <td>2.0 pts</td>
                <td>1:100</td>
                <td>09:30–16:00</td>
                <td style="color:var(--green)">+0.38%</td>
              </tr>
              <tr>
                <td>FTSE 100</td>
                <td><span class="region-pill pill-uk">UK</span></td>
                <td>1.0 pts</td>
                <td>1:50</td>
                <td>08:00–16:30</td>
                <td style="color:var(--rose)">−0.47%</td>
              </tr>
              <tr>
                <td>DAX 40</td>
                <td><span class="region-pill pill-eu">EU</span></td>
                <td>1.5 pts</td>
                <td>1:50</td>
                <td>09:00–17:30</td>
                <td style="color:var(--green)">+0.63%</td>
              </tr>
              <tr>
                <td>CAC 40</td>
                <td><span class="region-pill pill-eu">EU</span></td>
                <td>1.5 pts</td>
                <td>1:50</td>
                <td>09:00–17:30</td>
                <td style="color:var(--rose)">−0.22%</td>
              </tr>
              <tr>
                <td>Nikkei 225</td>
                <td><span class="region-pill pill-asia">Asia</span></td>
                <td>7.0 pts</td>
                <td>1:25</td>
                <td>09:00–15:30</td>
                <td style="color:var(--rose)">−1.08%</td>
              </tr>
              <tr>
                <td>Hang Seng</td>
                <td><span class="region-pill pill-asia">Asia</span></td>
                <td>8.0 pts</td>
                <td>1:25</td>
                <td>09:30–16:00</td>
                <td style="color:var(--green)">+1.00%</td>
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
        <h2 class="section-title">Trade indices<br>in three steps</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;">
          No fund manager fees. No ETF wrappers. Just direct, leveraged access to the world's most-tracked market benchmarks.
        </p>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="step-card">
          <div class="step-num">01</div>
          <div>
            <div class="step-title">Open &amp; Verify Your Account</div>
            <p class="step-text">Sign up online in under two minutes. Complete KYC verification and gain instant access to 30+ global index CFDs across every major region.</p>
          </div>
        </div>
        <div class="step-card">
          <div class="step-num">02</div>
          <div>
            <div class="step-title">Fund Your Account</div>
            <p class="step-text">Deposit via bank transfer, credit card, or cryptocurrency. All balances are credited immediately — no delays between deposit and trading.</p>
          </div>
        </div>
        <div class="step-card">
          <div class="step-num">03</div>
          <div>
            <div class="step-title">Select an Index &amp; Trade</div>
            <p class="step-text">Choose your index, review live charts and macro calendar events, set your position size and leverage, and execute in one click.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── CTA ── -->
<section class="cta-band py-5">
  <div class="container py-3 text-center">
    <div class="section-tag d-inline-flex">Start Now</div>
    <h2 class="section-title mt-1 mx-auto" style="max-width:560px;">The world's economies.<br>One trading account.</h2>
    <p class="mt-3 mx-auto" style="font-size:0.92rem;color:var(--muted);line-height:1.8;max-width:460px;">
      Open a live account and access 30+ global indices today, or start risk-free with a $10,000 demo account — no deposit required.
    </p>
    <div class="d-flex gap-3 justify-content-center flex-wrap mt-4">
      <a href="#" class="btn-hero-teal">Open Live Account</a>
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
      <p>© <span id="year"></span> TESLA INVEST. All rights reserved. Index CFD trading carries significant risk of loss. This is a fictional demo site for illustrative purposes only.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>document.getElementById("year").textContent = new Date().getFullYear();</script>
</body>
</html>
