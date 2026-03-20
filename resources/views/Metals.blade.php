<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Metals — Tesla Invest</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    :root {
      --silver: #94a3b8;
      --silver-bright: #cbd5e1;
      --silver-dim: rgba(148,163,184,0.10);
      --silver-glow: rgba(148,163,184,0.05);
      --gold: #d4a843;
      --gold-dim: rgba(212,168,67,0.10);
      --dark: #0c0c0e;
      --dark2: #141416;
      --dark3: #111113;
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
    .table{
        bg:var(--dark);
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
    .metals-hero {
      position: relative;
      min-height: 92vh;
      display: flex;
      align-items: center;
      overflow: hidden;
      padding-bottom: 52px;
      background: var(--dark3);
    }

    /* Metallic sheen gradient overlay — the signature look */
    .hero-sheen {
      position: absolute; inset: 0; pointer-events: none;
      background:
        radial-gradient(ellipse 70% 60% at 68% 44%, rgba(212,168,67,0.055) 0%, transparent 58%),
        radial-gradient(ellipse 42% 50% at 8% 78%, rgba(148,163,184,0.04) 0%, transparent 58%),
        radial-gradient(ellipse 35% 40% at 88% 15%, rgba(212,168,67,0.03) 0%, transparent 50%),
        radial-gradient(ellipse 25% 25% at 30% 5%, rgba(255,255,255,0.02) 0%, transparent 50%);
    }

    /* Fine metal texture grid — tighter, more refined */
    .grid-overlay {
      position: absolute; inset: 0; pointer-events: none;
      background-image:
        linear-gradient(to right, rgba(255,255,255,0.018) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.018) 1px, transparent 1px);
      background-size: 60px 60px;
    }

    /* Gleam sweep animation */
    .gleam {
      position: absolute;
      top: 0; bottom: 0;
      width: 180px;
      background: linear-gradient(90deg, transparent, rgba(212,168,67,0.04), transparent);
      animation: gleamSweep 8s ease-in-out infinite;
      pointer-events: none;
    }
    @keyframes gleamSweep {
      0%   { left: -20%; }
      50%  { left: 110%; }
      100% { left: 110%; }
    }

    /* Ticker */
    .ticker-bg {
      position: absolute; bottom: 0; left: 0; right: 0;
      height: 52px; overflow: hidden;
      border-top: 1px solid var(--border);
      display: flex; align-items: center;
      background: rgba(12,12,14,0.75);
      backdrop-filter: blur(8px);
    }
    .ticker-track {
      display: flex; gap: 3rem;
      animation: tickerScroll 34s linear infinite;
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
    .ticker-pair { color: rgba(255,255,255,0.45); }
    .ticker-price { color: #fff; }
    .ticker-up { color: var(--green); }
    .ticker-dn { color: var(--rose); }

    /* Hero text */
    .market-pill {
      display: inline-flex; align-items: center; gap: 6px;
      background: var(--gold-dim);
      border: 1px solid rgba(212,168,67,0.22);
      border-radius: 30px;
      padding: 0.35rem 1rem;
      font-size: 0.72rem; letter-spacing: 0.1em;
      color: var(--gold); font-weight: 500;
      margin-bottom: 2rem;
    }
    .live-dot-gold {
      width: 7px; height: 7px; border-radius: 50%;
      background: var(--gold); display: inline-block;
      animation: pulseGold 2s ease infinite;
    }
    @keyframes pulseGold {
      0%,100% { opacity:1; box-shadow: 0 0 0 0 rgba(212,168,67,0.45); }
      50%      { opacity:0.8; box-shadow: 0 0 0 6px rgba(212,168,67,0); }
    }
    .hero-eyebrow {
      font-size: 0.7rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--gold); font-weight: 500;
      display: flex; align-items: center; gap: 12px; margin-bottom: 2rem;
    }
    .hero-eyebrow::before {
      content: ''; display: block; width: 36px; height: 1px;
      background: linear-gradient(90deg, var(--gold), rgba(212,168,67,0.3));
    }
    .hero-title {
      font-size: clamp(3rem, 7vw, 5.8rem);
      font-weight: 300; line-height: 1.05; color: #fff; margin-bottom: 2rem;
    }
    .hero-title em {
      font-style: italic;
      background: linear-gradient(135deg, var(--gold), #f0c060, var(--gold));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .hero-subtitle {
      font-size: clamp(0.95rem, 2vw, 1.1rem); line-height: 1.85;
      color: var(--muted); max-width: 460px; font-weight: 300;
    }
    .hero-cta-row { display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 2.8rem; }
    .btn-hero-gold {
      background: linear-gradient(135deg, var(--gold), #c89830);
      color: #000;
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: none; border-radius: 4px;
      text-decoration: none; transition: opacity 0.2s; display: inline-block; font-weight: 500;
    }
    .btn-hero-gold:hover { opacity: 0.88; color: #000; }
    .btn-hero-ghost {
      background: transparent; color: var(--muted);
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: 1px solid var(--border); border-radius: 4px;
      text-decoration: none; transition: all 0.2s; display: inline-block;
    }
    .btn-hero-ghost:hover { border-color: rgba(255,255,255,0.25); color: #fff; }

    /* ── METALS PANEL ── */
    .metals-panel {
      background: var(--dark2);
      border: 1px solid rgba(212,168,67,0.12);
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 0 60px rgba(212,168,67,0.04);
    }
    .panel-header {
      padding: 1.2rem 1.6rem;
      border-bottom: 1px solid var(--border);
      display: flex; align-items: center; justify-content: space-between;
      background: linear-gradient(90deg, rgba(212,168,67,0.04), transparent);
    }
    .panel-title { font-size: 0.7rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); font-weight: 500; }
    .live-label { font-size: 0.68rem; letter-spacing: 0.15em; color: var(--gold); text-transform: uppercase; }

    .metal-row {
      padding: 1.05rem 1.6rem;
      border-bottom: 1px solid var(--border);
      display: grid;
      grid-template-columns: auto 1fr auto auto auto;
      align-items: center;
      gap: 1rem;
      transition: background 0.15s; cursor: default;
    }
    .metal-row:last-child { border-bottom: none; }
    .metal-row:hover { background: rgba(212,168,67,0.03); }

    .metal-icon {
      width: 38px; height: 38px; border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.1rem; font-weight: 700;
      flex-shrink: 0; font-family: 'Cormorant Garamond', serif;
      letter-spacing: 0.04em;
    }
    .metal-name { font-size: 0.9rem; font-weight: 500; color: #fff; }
    .metal-sub  { font-size: 0.7rem; color: var(--muted); margin-top: 2px; }
    .metal-price {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.35rem; font-weight: 400; color: #fff; text-align: right;
    }
    .metal-unit { font-size: 0.7rem; color: var(--muted); text-align: right; margin-top: 2px; }

    .spark { display: flex; align-items: flex-end; gap: 2px; height: 26px; }
    .spark-bar { width: 3px; border-radius: 2px; background: var(--border); flex-shrink: 0; }
    .spark-bar.up { background: var(--green); }
    .spark-bar.dn { background: var(--rose); }
    .spark-bar.gold { background: var(--gold); }

    .pair-change {
      font-size: 0.78rem; font-weight: 500;
      padding: 0.25rem 0.65rem; border-radius: 5px;
      min-width: 66px; text-align: center;
    }
    .change-up { background: var(--green-dim); color: var(--green); }
    .change-dn { background: var(--rose-dim); color: var(--rose); }

    /* ── GOLD FEATURE BAR ── */
    .gold-bar {
      background: linear-gradient(135deg, rgba(212,168,67,0.08) 0%, rgba(212,168,67,0.03) 100%);
      border: 1px solid rgba(212,168,67,0.18);
      border-radius: 16px;
      padding: 2.2rem 2.5rem;
      display: flex; align-items: center; justify-content: space-between;
      gap: 2rem; flex-wrap: wrap;
    }
    .gold-bar-stat { text-align: center; }
    .gold-bar-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.4rem; font-weight: 300; color: var(--gold); line-height: 1;
    }
    .gold-bar-label {
      font-size: 0.7rem; letter-spacing: 0.18em; text-transform: uppercase;
      color: var(--muted); margin-top: 0.4rem;
    }
    .gold-bar-divider {
      width: 1px; height: 52px; background: rgba(212,168,67,0.2); flex-shrink: 0;
    }

    /* ── NUMBERS STRIP ── */
    .numbers-strip { border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .num-item { text-align: center; padding: 3rem 1rem; border-right: 1px solid var(--border); }
    .num-item:last-child { border-right: none; }
    .big-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 3.2rem; font-weight: 300; color: #fff; line-height: 1;
    }
    .big-num sup { font-size: 1.3rem; color: var(--gold); vertical-align: super; font-weight: 400; }
    .num-desc { font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--muted); margin-top: 0.5rem; }

    /* ── SECTION HELPERS ── */
    .section-tag {
      font-size: 0.68rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--gold); font-weight: 500;
      display: inline-flex; align-items: center; gap: 10px; margin-bottom: 1.2rem;
    }
    .section-tag::after {
      content: ''; display: block; width: 28px; height: 1px;
      background: linear-gradient(90deg, var(--gold), transparent);
    }
    .section-title { font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 300; color: #fff; line-height: 1.1; }

    /* ── METAL CATEGORY CARDS ── */
    .metal-cat-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 14px; padding: 1.8rem;
      position: relative; overflow: hidden;
      transition: border-color 0.25s, transform 0.22s;
      height: 100%;
    }
    .metal-cat-card::before {
      content: '';
      position: absolute; top: 0; left: 0; right: 0;
      height: 2px; opacity: 0; transition: opacity 0.25s;
    }
    .metal-cat-card.precious::before { background: linear-gradient(90deg, var(--gold), #f0c060); }
    .metal-cat-card.industrial::before { background: linear-gradient(90deg, var(--silver), #e2e8f0); }
    .metal-cat-card:hover { transform: translateY(-4px); }
    .metal-cat-card.precious:hover { border-color: rgba(212,168,67,0.28); }
    .metal-cat-card.precious:hover::before { opacity: 1; }
    .metal-cat-card.industrial:hover { border-color: rgba(148,163,184,0.28); }
    .metal-cat-card.industrial:hover::before { opacity: 1; }

    .cat-symbol {
      font-family: 'Cormorant Garamond', serif;
      font-size: 3rem; font-weight: 300; line-height: 1;
      margin-bottom: 1rem;
    }
    .cat-symbol.gold-text {
      background: linear-gradient(135deg, var(--gold), #f0c060);
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .cat-symbol.silver-text { color: var(--silver-bright); }
    .cat-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.35rem; font-weight: 400; color: #fff; margin-bottom: 0.5rem;
    }
    .cat-text { font-size: 0.86rem; line-height: 1.8; color: var(--muted); margin-bottom: 1.1rem; }
    .cat-instruments { display: flex; flex-wrap: wrap; gap: 0.4rem; }
    .instr-badge-gold {
      font-size: 0.65rem; letter-spacing: 0.08em; padding: 0.22rem 0.6rem;
      border-radius: 4px; background: var(--gold-dim); color: var(--gold);
      border: 1px solid rgba(212,168,67,0.18);
    }
    .instr-badge-silver {
      font-size: 0.65rem; letter-spacing: 0.08em; padding: 0.22rem 0.6rem;
      border-radius: 4px; background: var(--silver-dim); color: var(--silver-bright);
      border: 1px solid rgba(148,163,184,0.18);
    }

    /* ── SAFE HAVEN SECTION ── */
    .safe-section {
      background: linear-gradient(180deg, var(--dark2) 0%, var(--dark3) 100%);
      border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);
    }
    .safe-card {
      background: rgba(255,255,255,0.02); border: 1px solid var(--border);
      border-radius: 14px; padding: 2rem; height: 100%;
      position: relative; overflow: hidden;
      transition: border-color 0.25s, transform 0.25s;
    }
    .safe-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0;
      height: 2px;
      background: linear-gradient(90deg, var(--gold), rgba(212,168,67,0.2));
      opacity: 0; transition: opacity 0.25s;
    }
    .safe-card:hover { border-color: rgba(212,168,67,0.22); transform: translateY(-4px); }
    .safe-card:hover::before { opacity: 1; }
    .safe-icon {
      width: 46px; height: 46px; border-radius: 10px;
      background: var(--gold-dim);
      display: flex; align-items: center; justify-content: center;
      color: var(--gold); font-size: 1.35rem; margin-bottom: 1.3rem;
    }
    .safe-title { font-family: 'Cormorant Garamond', serif; font-size: 1.35rem; font-weight: 400; color: #fff; margin-bottom: 0.65rem; }
    .safe-text { font-size: 0.87rem; line-height: 1.8; color: var(--muted); }

    /* ── SPECS TABLE ── */
    .specs-table-wrap {
      background: var(--dark2); border: 1px solid rgba(212,168,67,0.1);
      border-radius: 16px; overflow: hidden;
    }
    .specs-table-wrap table { margin: 0; }
    .specs-table-wrap thead tr { background: rgba(212,168,67,0.04); border-bottom: 1px solid var(--border); }
    .specs-table-wrap thead th {
      font-size: 0.68rem; letter-spacing: 0.2em; text-transform: uppercase;
      color: var(--muted); font-weight: 500; padding: 1rem 1.4rem; border: none;
    }
    .specs-table-wrap tbody tr { border-bottom: 1px solid var(--border); transition: background 0.15s; }
    .specs-table-wrap tbody tr:last-child { border-bottom: none; }
    .specs-table-wrap tbody tr:hover { background: rgba(212,168,67,0.03); }
    .specs-table-wrap tbody td {
      font-size: 0.86rem; color: var(--text);
      padding: 0.95rem 1.4rem; border: none; vertical-align: middle;
    }
    .specs-table-wrap tbody td:first-child { font-weight: 500; color: #fff; }

    .type-pill {
      font-size: 0.6rem; letter-spacing: 0.1em; text-transform: uppercase;
      padding: 0.2rem 0.55rem; border-radius: 4px; margin-left: 0.4rem;
    }
    .pill-precious   { background: var(--gold-dim); color: var(--gold); }
    .pill-industrial { background: var(--silver-dim); color: var(--silver-bright); }
    .pill-pgm        { background: rgba(167,139,250,0.10); color: #a78bfa; }

    /* ── STEPS ── */
    .steps-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .step-card { display: flex; gap: 1.4rem; align-items: flex-start; padding: 2rem 0; border-bottom: 1px solid var(--border); }
    .step-card:last-child { border-bottom: none; }
    .step-num {
      font-family: 'Cormorant Garamond', serif; font-size: 2.8rem;
      font-weight: 300; color: rgba(212,168,67,0.2); line-height: 1; min-width: 52px;
    }
    .step-title { font-size: 1.05rem; font-weight: 400; color: #fff; margin-bottom: 0.4rem; }
    .step-text { font-size: 0.86rem; color: var(--muted); line-height: 1.75; margin: 0; }

    /* ── CTA ── */
    .cta-band {
      background:
        linear-gradient(135deg, rgba(212,168,67,0.06) 0%, transparent 50%),
        var(--dark2);
      border-top: 1px solid rgba(212,168,67,0.12);
      border-bottom: 1px solid rgba(212,168,67,0.12);
    }

    /* ── FOOTER ── */
    footer { background: var(--dark3); border-top: 1px solid var(--border); }
    .footer-brand { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 600; letter-spacing: 0.12em; color: #fff; }
    .footer-brand span { color: var(--red); }
    .footer-tagline { font-size: 0.82rem; color: var(--muted); line-height: 1.7; max-width: 260px; margin-top: 0.8rem; }
    .footer-heading { font-size: 0.68rem; letter-spacing: 0.22em; text-transform: uppercase; color: rgba(255,255,255,0.28); margin-bottom: 1.2rem; font-weight: 500; }
    .footer-link { color: var(--muted); text-decoration: none; font-size: 0.85rem; display: block; margin-bottom: 0.65rem; transition: color 0.2s; }
    .footer-link:hover { color: #fff; }
    .footer-bottom { border-top: 1px solid var(--border); padding: 1.4rem 0; }
    .footer-bottom p { font-size: 0.75rem; color: rgba(255,255,255,0.22); margin: 0; }

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
      .metal-row { grid-template-columns: auto 1fr auto auto; }
      .metal-row .spark { display: none; }
      .gold-bar { justify-content: center; }
      .gold-bar-divider { display: none; }
    }
  </style>
</head>
<body>

<!-- ── NAVBAR ── -->
<x-header />

<!-- ── HERO ── -->
<section class="metals-hero pt-5">
  <div class="hero-sheen"></div>
  <div class="grid-overlay"></div>
  <div class="gleam"></div>

  <div class="container py-5 mt-4" style="padding-bottom:5rem !important;">
    <div class="row align-items-center g-5">

      <!-- Left -->
      <div class="col-lg-6">
        <div class="market-pill fade-up">
          <span class="live-dot-gold"></span> Gold Spot: COMEX &amp; LBMA
        </div>
        <div class="hero-eyebrow fade-up">Markets — Metals</div>
        <h1 class="hero-title fade-up fade-up-1">
          Preserve wealth.<br>Trade the<br><em>eternal assets.</em>
        </h1>
        <p class="hero-subtitle fade-up fade-up-2">
          Trade precious and industrial metals CFDs — gold, silver, platinum, palladium, copper and more — the assets that have stored value for millennia and driven industrial civilisation.
        </p>
        <div class="hero-cta-row fade-up fade-up-3">
          <a href="#" class="btn-hero-gold">Start Trading</a>
          <a href="#" class="btn-hero-ghost">View All Metals</a>
        </div>
      </div>

      <!-- Right — Live Metals Panel -->
      <div class="col-lg-5 offset-lg-1 fade-up fade-up-4">
        <div class="metals-panel">
          <div class="panel-header">
            <div class="panel-title">Metals Markets</div>
            <div><span class="live-dot-gold"></span><span class="live-label">Live Prices</span></div>
          </div>

          <!-- Gold -->
          <div class="metal-row">
            <div class="metal-icon" style="background:linear-gradient(135deg,rgba(212,168,67,0.18),rgba(212,168,67,0.06));color:var(--gold);font-size:0.85rem;">AU</div>
            <div>
              <div class="metal-name">Gold</div>
              <div class="metal-sub">XAU/USD · COMEX · troy oz</div>
            </div>
            <div class="spark">
              <div class="spark-bar gold" style="height:45%"></div>
              <div class="spark-bar gold" style="height:58%"></div>
              <div class="spark-bar gold" style="height:70%"></div>
              <div class="spark-bar dn"   style="height:62%"></div>
              <div class="spark-bar gold" style="height:76%"></div>
              <div class="spark-bar gold" style="height:88%"></div>
              <div class="spark-bar gold" style="height:100%"></div>
            </div>
            <div class="text-end">
              <div class="metal-price" style="color:var(--gold);">$2,641.80</div>
              <div class="metal-unit">per troy oz</div>
            </div>
            <div class="pair-change change-up">+0.82%</div>
          </div>

          <!-- Silver -->
          <div class="metal-row">
            <div class="metal-icon" style="background:rgba(148,163,184,0.10);color:var(--silver-bright);font-size:0.85rem;">AG</div>
            <div>
              <div class="metal-name">Silver</div>
              <div class="metal-sub">XAG/USD · COMEX · troy oz</div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:80%"></div>
              <div class="spark-bar dn" style="height:65%"></div>
              <div class="spark-bar dn" style="height:50%"></div>
              <div class="spark-bar up" style="height:60%"></div>
              <div class="spark-bar dn" style="height:46%"></div>
              <div class="spark-bar dn" style="height:34%"></div>
              <div class="spark-bar dn" style="height:24%"></div>
            </div>
            <div class="text-end">
              <div class="metal-price">$30.142</div>
              <div class="metal-unit">per troy oz</div>
            </div>
            <div class="pair-change change-dn">−1.14%</div>
          </div>

          <!-- Platinum -->
          <div class="metal-row">
            <div class="metal-icon" style="background:rgba(167,139,250,0.10);color:#a78bfa;font-size:0.85rem;">PT</div>
            <div>
              <div class="metal-name">Platinum</div>
              <div class="metal-sub">XPT/USD · NYMEX · troy oz</div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:35%"></div>
              <div class="spark-bar up" style="height:50%"></div>
              <div class="spark-bar up" style="height:64%"></div>
              <div class="spark-bar dn" style="height:55%"></div>
              <div class="spark-bar up" style="height:68%"></div>
              <div class="spark-bar up" style="height:78%"></div>
              <div class="spark-bar up" style="height:88%"></div>
            </div>
            <div class="text-end">
              <div class="metal-price">$964.50</div>
              <div class="metal-unit">per troy oz</div>
            </div>
            <div class="pair-change change-up">+1.23%</div>
          </div>

          <!-- Palladium -->
          <div class="metal-row">
            <div class="metal-icon" style="background:rgba(34,211,238,0.08);color:#67e8f9;font-size:0.85rem;">PD</div>
            <div>
              <div class="metal-name">Palladium</div>
              <div class="metal-sub">XPD/USD · NYMEX · troy oz</div>
            </div>
            <div class="spark">
              <div class="spark-bar dn" style="height:75%"></div>
              <div class="spark-bar dn" style="height:60%"></div>
              <div class="spark-bar dn" style="height:48%"></div>
              <div class="spark-bar up" style="height:55%"></div>
              <div class="spark-bar dn" style="height:44%"></div>
              <div class="spark-bar dn" style="height:32%"></div>
              <div class="spark-bar dn" style="height:20%"></div>
            </div>
            <div class="text-end">
              <div class="metal-price">$1,042.00</div>
              <div class="metal-unit">per troy oz</div>
            </div>
            <div class="pair-change change-dn">−2.08%</div>
          </div>

          <!-- Copper -->
          <div class="metal-row">
            <div class="metal-icon" style="background:rgba(251,146,60,0.10);color:#fb923c;font-size:0.85rem;">CU</div>
            <div>
              <div class="metal-name">Copper</div>
              <div class="metal-sub">HG · COMEX · USD/lb</div>
            </div>
            <div class="spark">
              <div class="spark-bar up" style="height:42%"></div>
              <div class="spark-bar up" style="height:56%"></div>
              <div class="spark-bar up" style="height:68%"></div>
              <div class="spark-bar up" style="height:80%"></div>
              <div class="spark-bar dn" style="height:70%"></div>
              <div class="spark-bar up" style="height:82%"></div>
              <div class="spark-bar up" style="height:92%"></div>
            </div>
            <div class="text-end">
              <div class="metal-price">$4.214</div>
              <div class="metal-unit">per pound</div>
            </div>
            <div class="pair-change change-up">+0.55%</div>
          </div>

          <!-- Gold / Silver Ratio -->
          <div class="metal-row" style="background:rgba(212,168,67,0.02);">
            <div class="metal-icon" style="background:linear-gradient(135deg,rgba(212,168,67,0.12),rgba(148,163,184,0.08));color:var(--gold);font-size:0.7rem;letter-spacing:0;">Au/Ag</div>
            <div>
              <div class="metal-name">Gold / Silver Ratio</div>
              <div class="metal-sub">Precious metals spread</div>
            </div>
            <div class="spark">
              <div class="spark-bar gold" style="height:50%"></div>
              <div class="spark-bar gold" style="height:62%"></div>
              <div class="spark-bar gold" style="height:72%"></div>
              <div class="spark-bar gold" style="height:80%"></div>
              <div class="spark-bar gold" style="height:88%"></div>
              <div class="spark-bar gold" style="height:92%"></div>
              <div class="spark-bar gold" style="height:100%"></div>
            </div>
            <div class="text-end">
              <div class="metal-price" style="font-size:1.1rem;">87.64×</div>
              <div class="metal-unit">oz silver per oz gold</div>
            </div>
            <div class="pair-change change-up">+1.98%</div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Ticker -->
  <div class="ticker-bg">
    <div class="ticker-track">
      <span class="ticker-item"><span class="ticker-pair">XAU/USD</span><span class="ticker-price">$2,641.80</span><span class="ticker-up">▲ 0.82%</span></span>
      <span class="ticker-item"><span class="ticker-pair">XAG/USD</span><span class="ticker-price">$30.142</span><span class="ticker-dn">▼ 1.14%</span></span>
      <span class="ticker-item"><span class="ticker-pair">XPT/USD</span><span class="ticker-price">$964.50</span><span class="ticker-up">▲ 1.23%</span></span>
      <span class="ticker-item"><span class="ticker-pair">XPD/USD</span><span class="ticker-price">$1,042.00</span><span class="ticker-dn">▼ 2.08%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Copper</span><span class="ticker-price">$4.214</span><span class="ticker-up">▲ 0.55%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Aluminium</span><span class="ticker-price">$2,318.50</span><span class="ticker-dn">▼ 0.42%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Nickel</span><span class="ticker-price">$16,840</span><span class="ticker-up">▲ 0.98%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Zinc</span><span class="ticker-price">$2,880.00</span><span class="ticker-dn">▼ 0.30%</span></span>
      <!-- duplicate -->
      <span class="ticker-item"><span class="ticker-pair">XAU/USD</span><span class="ticker-price">$2,641.80</span><span class="ticker-up">▲ 0.82%</span></span>
      <span class="ticker-item"><span class="ticker-pair">XAG/USD</span><span class="ticker-price">$30.142</span><span class="ticker-dn">▼ 1.14%</span></span>
      <span class="ticker-item"><span class="ticker-pair">XPT/USD</span><span class="ticker-price">$964.50</span><span class="ticker-up">▲ 1.23%</span></span>
      <span class="ticker-item"><span class="ticker-pair">XPD/USD</span><span class="ticker-price">$1,042.00</span><span class="ticker-dn">▼ 2.08%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Copper</span><span class="ticker-price">$4.214</span><span class="ticker-up">▲ 0.55%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Aluminium</span><span class="ticker-price">$2,318.50</span><span class="ticker-dn">▼ 0.42%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Nickel</span><span class="ticker-price">$16,840</span><span class="ticker-up">▲ 0.98%</span></span>
      <span class="ticker-item"><span class="ticker-pair">Zinc</span><span class="ticker-price">$2,880.00</span><span class="ticker-dn">▼ 0.30%</span></span>
    </div>
  </div>
</section>

<!-- ── GOLD STATS BAR ── -->
<div style="background:var(--dark2);border-bottom:1px solid var(--border);padding:2rem 0;">
  <div class="container">
    <div class="gold-bar">
      <div class="gold-bar-stat">
        <div class="gold-bar-num">$2,641</div>
        <div class="gold-bar-label">Gold Spot Price</div>
      </div>
      <div class="gold-bar-divider"></div>
      <div class="gold-bar-stat">
        <div class="gold-bar-num">$20.4T</div>
        <div class="gold-bar-label">Total Gold Market Cap</div>
      </div>
      <div class="gold-bar-divider"></div>
      <div class="gold-bar-stat">
        <div class="gold-bar-num">+8.4%</div>
        <div class="gold-bar-label">Gold YTD Return</div>
      </div>
      <div class="gold-bar-divider"></div>
      <div class="gold-bar-stat">
        <div class="gold-bar-num">87.6×</div>
        <div class="gold-bar-label">Gold / Silver Ratio</div>
      </div>
      <div class="gold-bar-divider"></div>
      <div class="gold-bar-stat">
        <div class="gold-bar-num">$0.20</div>
        <div class="gold-bar-label">Min Gold Spread</div>
      </div>
    </div>
  </div>
</div>

<!-- ── NUMBERS STRIP ── -->
<div class="numbers-strip">
  <div class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">15<sup>+</sup></div>
        <div class="num-desc">Metal CFDs</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">$0<sup>.20</sup></div>
        <div class="num-desc">Gold Spread</div>
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

<!-- ── METAL CATEGORIES ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row align-items-end g-4 mb-5">
      <div class="col-lg-6">
        <div class="section-tag">What We Offer</div>
        <h2 class="section-title">Precious &amp; industrial.<br>Both in one place.</h2>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <p style="font-size:0.92rem;color:var(--muted);line-height:1.85;">
          From the safe-haven lustre of gold to the industrial demand of copper and nickel — our metals suite covers every segment of the global commodity market.
        </p>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="metal-cat-card precious">
          <div class="cat-symbol gold-text">Au</div>
          <div class="cat-name">Precious Metals</div>
          <p class="cat-text">Safe-haven assets with millennia of proven value. Gold and silver act as inflation hedges, portfolio diversifiers, and crisis shields — moving independently of equities and bonds.</p>
          <div class="cat-instruments">
            <span class="instr-badge-gold">Gold (XAU)</span>
            <span class="instr-badge-gold">Silver (XAG)</span>
            <span class="instr-badge-gold">Platinum (XPT)</span>
            <span class="instr-badge-gold">Palladium (XPD)</span>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="metal-cat-card industrial">
          <div class="cat-symbol silver-text">Cu</div>
          <div class="cat-name">Industrial Metals</div>
          <p class="cat-text">The backbone of global manufacturing and infrastructure. Copper, aluminium, nickel, and zinc are demand barometers for the world economy — especially China's industrial cycle.</p>
          <div class="cat-instruments">
            <span class="instr-badge-silver">Copper (HG)</span>
            <span class="instr-badge-silver">Aluminium</span>
            <span class="instr-badge-silver">Nickel</span>
            <span class="instr-badge-silver">Zinc</span>
            <span class="instr-badge-silver">Lead</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── WHY METALS ── -->
<section class="safe-section py-5">
  <div class="container py-3">
    <div class="row g-4 align-items-start">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="section-tag">Why Trade Metals</div>
        <h2 class="section-title">The original<br>store of value.</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:320px;">
          Metals have been humanity's most enduring asset class. Today they offer some of the most powerful trading opportunities across both macro and industrial themes.
        </p>
      </div>
      <div class="col-lg-8">
        <div class="row g-3">
          <div class="col-md-6">
            <div class="safe-card">
              <div class="safe-icon"><i class="uil uil-shield-check"></i></div>
              <div class="safe-title">Safe Haven Demand</div>
              <p class="safe-text">Gold surges during market crashes, geopolitical crises, and currency debasement cycles. It is the world's original risk-off asset — and always will be.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="safe-card">
              <div class="safe-icon"><i class="uil uil-chart-growth"></i></div>
              <div class="safe-title">Inflation Hedge</div>
              <p class="safe-text">Precious metals historically outperform during inflationary periods. As purchasing power erodes, gold and silver preserve real wealth across generations.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="safe-card">
              <div class="safe-icon"><i class="uil uil-circuit"></i></div>
              <div class="safe-title">Green Economy Play</div>
              <p class="safe-text">Copper, nickel, and lithium-adjacent metals are critical for EV batteries, solar panels, and power grids — driving structural long-term demand growth.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="safe-card">
              <div class="safe-icon"><i class="uil uil-building"></i></div>
              <div class="safe-title">Portfolio Diversification</div>
              <p class="safe-text">Metals have low correlation with equities and fixed income. Adding gold to a portfolio has historically reduced overall volatility while preserving upside.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── SPECS TABLE ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row align-items-start g-5">
      <div class="col-lg-4">
        <div class="section-tag">Instrument Specs</div>
        <h2 class="section-title">Metals CFDs &amp;<br>trading conditions</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:310px;">
          Institutional-grade spreads on all precious and industrial metals. No storage costs, no physical settlement — pure price exposure.
        </p>
        <a href="#" class="btn-hero-gold mt-4 d-inline-block">Open Account</a>
      </div>
      <div class="col-lg-8">
        <div class="specs-table-wrap">
          <table class="table table-borderless mb-0">
            <thead>
              <tr>
                <th>Metal</th>
                <th>Category</th>
                <th>Spread</th>
                <th>Leverage</th>
                <th>Contract Size</th>
                <th>24h</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Gold (XAU/USD)</td>
                <td><span class="type-pill pill-precious">Precious</span></td>
                <td>$0.20</td>
                <td>1:500</td>
                <td>100 troy oz</td>
                <td style="color:var(--green)">+0.82%</td>
              </tr>
              <tr>
                <td>Silver (XAG/USD)</td>
                <td><span class="type-pill pill-precious">Precious</span></td>
                <td>$0.02</td>
                <td>1:500</td>
                <td>5,000 troy oz</td>
                <td style="color:var(--rose)">−1.14%</td>
              </tr>
              <tr>
                <td>Platinum (XPT/USD)</td>
                <td><span class="type-pill pill-pgm">PGM</span></td>
                <td>$2.00</td>
                <td>1:100</td>
                <td>50 troy oz</td>
                <td style="color:var(--green)">+1.23%</td>
              </tr>
              <tr>
                <td>Palladium (XPD/USD)</td>
                <td><span class="type-pill pill-pgm">PGM</span></td>
                <td>$5.00</td>
                <td>1:100</td>
                <td>100 troy oz</td>
                <td style="color:var(--rose)">−2.08%</td>
              </tr>
              <tr>
                <td>Copper (HG)</td>
                <td><span class="type-pill pill-industrial">Industrial</span></td>
                <td>$0.003</td>
                <td>1:100</td>
                <td>25,000 lbs</td>
                <td style="color:var(--green)">+0.55%</td>
              </tr>
              <tr>
                <td>Aluminium</td>
                <td><span class="type-pill pill-industrial">Industrial</span></td>
                <td>$0.50</td>
                <td>1:50</td>
                <td>25 tonnes</td>
                <td style="color:var(--rose)">−0.42%</td>
              </tr>
              <tr>
                <td>Nickel</td>
                <td><span class="type-pill pill-industrial">Industrial</span></td>
                <td>$5.00</td>
                <td>1:50</td>
                <td>6 tonnes</td>
                <td style="color:var(--green)">+0.98%</td>
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
        <h2 class="section-title">Trade metals<br>in three steps</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;">
          No vault. No storage fees. No physical delivery. Just open a CFD account and trade the precious and industrial metals markets directly from your screen.
        </p>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="step-card">
          <div class="step-num">01</div>
          <div>
            <div class="step-title">Open &amp; Verify Your Account</div>
            <p class="step-text">Register in minutes, complete secure identity verification, and gain instant access to gold, silver, platinum, copper and the full metals suite.</p>
          </div>
        </div>
        <div class="step-card">
          <div class="step-num">02</div>
          <div>
            <div class="step-title">Deposit Funds</div>
            <p class="step-text">Fund your account instantly via bank transfer, card, or crypto. All balances are credited immediately with no waiting period before trading.</p>
          </div>
        </div>
        <div class="step-card">
          <div class="step-num">03</div>
          <div>
            <div class="step-title">Select a Metal &amp; Trade</div>
            <p class="step-text">Monitor USD strength, inflation data, and geopolitical news. Select your metal, set your leverage and lot size, go long or short, and manage in real time.</p>
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
    <h2 class="section-title mt-1 mx-auto" style="max-width:580px;">5,000 years of value.<br>Trade it today.</h2>
    <p class="mt-3 mx-auto" style="font-size:0.92rem;color:var(--muted);line-height:1.8;max-width:460px;">
      Open a live account and access gold, silver, platinum, and industrial metals today — or start risk-free with a $10,000 demo account.
    </p>
    <div class="d-flex gap-3 justify-content-center flex-wrap mt-4">
      <a href="#" class="btn-hero-gold">Open Live Account</a>
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
      <p>© <span id="year"></span> TESLA INVEST. All rights reserved. Metals CFD trading carries significant risk of loss. This is a fictional demo site for illustrative purposes only.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>document.getElementById("year").textContent = new Date().getFullYear();</script>
</body>
</html>
