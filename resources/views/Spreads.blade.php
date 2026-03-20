<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Spreads & Commissions — Tesla Invest</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    :root {
      --accent: #10b981;
      --accent-dim: rgba(16,185,129,0.10);
      --accent-glow: rgba(16,185,129,0.05);
      --accent-bright: #34d399;
      --dark: #0c0c0e;
      --dark2: #141416;
      --dark3: #0d0f0e;
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
    .spreads-hero {
      position: relative;
      min-height: 88vh;
      display: flex;
      align-items: center;
      overflow: hidden;
      padding-bottom: 52px;
      background: var(--dark3);
    }
    .hero-bg {
      position: absolute; inset: 0; pointer-events: none;
      background:
        radial-gradient(ellipse 68% 60% at 66% 46%, rgba(16,185,129,0.07) 0%, transparent 60%),
        radial-gradient(ellipse 38% 48% at 4% 78%, rgba(16,185,129,0.04) 0%, transparent 55%),
        radial-gradient(ellipse 28% 32% at 90% 10%, rgba(52,211,153,0.04) 0%, transparent 50%);
    }
    .table{
        bg:var(--dark);
    }
    .grid-overlay {
      position: absolute; inset: 0; pointer-events: none;
      background-image:
        linear-gradient(to right, rgba(16,185,129,0.03) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(16,185,129,0.03) 1px, transparent 1px);
      background-size: 52px 52px;
    }

    /* Animated spread bars floating in background */
    .bg-bar {
      position: absolute;
      height: 2px;
      border-radius: 2px;
      background: linear-gradient(90deg, transparent, rgba(52,211,153,0.12), transparent);
      pointer-events: none;
      animation: barSlide linear infinite;
    }
    @keyframes barSlide {
      0%   { transform: translateX(-100%); opacity: 0; }
      10%  { opacity: 1; }
      90%  { opacity: 0.6; }
      100% { transform: translateX(200%); opacity: 0; }
    }

    /* Ticker */
    .ticker-bg {
      position: absolute; bottom: 0; left: 0; right: 0;
      height: 52px; overflow: hidden;
      border-top: 1px solid var(--border);
      display: flex; align-items: center;
      background: rgba(12,12,14,0.72);
      backdrop-filter: blur(8px);
    }
    .ticker-track {
      display: flex; gap: 3rem;
      animation: tickerScroll 40s linear infinite;
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
    .ticker-pair  { color: rgba(255,255,255,0.45); }
    .ticker-val   { color: #fff; }
    .ticker-green { color: var(--accent-bright); }

    /* Hero text */
    .market-pill {
      display: inline-flex; align-items: center; gap: 6px;
      background: var(--accent-dim);
      border: 1px solid rgba(16,185,129,0.22);
      border-radius: 30px;
      padding: 0.35rem 1rem;
      font-size: 0.72rem; letter-spacing: 0.1em;
      color: var(--accent-bright); font-weight: 500;
      margin-bottom: 2rem;
    }
    .live-dot {
      width: 7px; height: 7px; border-radius: 50%;
      background: var(--accent-bright); display: inline-block;
      animation: pulseDot 2s ease infinite;
    }
    @keyframes pulseDot {
      0%,100% { opacity:1; box-shadow: 0 0 0 0 rgba(52,211,153,0.45); }
      50%      { opacity:0.8; box-shadow: 0 0 0 6px rgba(52,211,153,0); }
    }
    .hero-eyebrow {
      font-size: 0.7rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--accent-bright); font-weight: 500;
      display: flex; align-items: center; gap: 12px; margin-bottom: 2rem;
    }
    .hero-eyebrow::before {
      content: ''; display: block; width: 36px; height: 1px;
      background: linear-gradient(90deg, var(--accent), rgba(16,185,129,0.3));
    }
    .hero-title {
      font-size: clamp(3rem, 6.8vw, 5.6rem);
      font-weight: 300; line-height: 1.05; color: #fff; margin-bottom: 2rem;
    }
    .hero-title em {
      font-style: italic;
      background: linear-gradient(135deg, var(--accent-bright), #6ee7b7, var(--accent-bright));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .hero-subtitle {
      font-size: clamp(0.95rem, 2vw, 1.08rem); line-height: 1.85;
      color: var(--muted); max-width: 460px; font-weight: 300;
    }
    .hero-cta-row { display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 2.8rem; }
    .btn-hero-green {
      background: var(--accent); color: #fff;
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: none; border-radius: 4px;
      text-decoration: none; transition: background 0.2s; display: inline-block; font-weight: 500;
    }
    .btn-hero-green:hover { background: #059669; color: #fff; }
    .btn-hero-ghost {
      background: transparent; color: var(--muted);
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: 1px solid var(--border); border-radius: 4px;
      text-decoration: none; transition: all 0.2s; display: inline-block;
    }
    .btn-hero-ghost:hover { border-color: rgba(255,255,255,0.25); color: #fff; }

    /* ── LIVE SPREAD PANEL ── */
    .spread-panel {
      background: var(--dark2);
      border: 1px solid rgba(16,185,129,0.16);
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 32px 72px rgba(0,0,0,0.55), 0 0 48px rgba(16,185,129,0.04);
    }
    .panel-header {
      padding: 1.15rem 1.6rem;
      background: rgba(16,185,129,0.05);
      border-bottom: 1px solid var(--border);
      display: flex; align-items: center; justify-content: space-between;
    }
    .panel-title { font-size: 0.68rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); }
    .panel-live  { font-size: 0.68rem; letter-spacing: 0.14em; color: var(--accent-bright); text-transform: uppercase; display: flex; align-items: center; gap: 5px; }

    /* Column headers inside panel */
    .panel-col-heads {
      display: grid;
      grid-template-columns: 1fr auto auto auto auto;
      gap: 0.8rem;
      padding: 0.55rem 1.6rem;
      border-bottom: 1px solid var(--border);
      background: rgba(255,255,255,0.015);
    }
    .col-head { font-size: 0.6rem; letter-spacing: 0.18em; text-transform: uppercase; color: rgba(255,255,255,0.28); }
    .col-head.right { text-align: right; }

    .spread-row {
      padding: 0.9rem 1.6rem;
      border-bottom: 1px solid var(--border);
      display: grid;
      grid-template-columns: 1fr auto auto auto auto;
      align-items: center;
      gap: 0.8rem;
      transition: background 0.15s;
    }
    .spread-row:last-child { border-bottom: none; }
    .spread-row:hover { background: rgba(16,185,129,0.03); }

    .sr-symbol { font-size: 0.88rem; font-weight: 500; color: #fff; }
    .sr-bid    { font-family: 'Cormorant Garamond', serif; font-size: 1.05rem; color: var(--rose); text-align: right; }
    .sr-ask    { font-family: 'Cormorant Garamond', serif; font-size: 1.05rem; color: var(--green); text-align: right; }
    .sr-spread {
      font-family: 'Cormorant Garamond', serif; font-size: 1.15rem;
      font-weight: 400; text-align: right;
      background: linear-gradient(135deg, var(--accent-bright), #6ee7b7);
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .sr-comm { font-size: 0.76rem; color: var(--muted); text-align: right; }

    /* Spread bar visual */
    .spread-viz {
      display: flex; align-items: center; gap: 3px; min-width: 60px;
    }
    .sv-bid { height: 4px; border-radius: 2px; background: var(--rose); flex: 1; }
    .sv-gap { height: 4px; border-radius: 2px; background: var(--accent-dim); }
    .sv-ask { height: 4px; border-radius: 2px; background: var(--green); flex: 1; }

    /* ── NUMBERS STRIP ── */
    .numbers-strip { border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .num-item { text-align: center; padding: 3rem 1rem; border-right: 1px solid var(--border); }
    .num-item:last-child { border-right: none; }
    .big-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 3.2rem; font-weight: 300; color: #fff; line-height: 1;
    }
    .big-num sup { font-size: 1.3rem; color: var(--accent-bright); vertical-align: super; font-weight: 400; }
    .num-desc { font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--muted); margin-top: 0.5rem; }

    /* ── SECTION HELPERS ── */
    .section-tag {
      font-size: 0.68rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--accent-bright); font-weight: 500;
      display: inline-flex; align-items: center; gap: 10px; margin-bottom: 1.2rem;
    }
    .section-tag::after {
      content: ''; display: block; width: 28px; height: 1px;
      background: linear-gradient(90deg, var(--accent), transparent);
    }
    .section-title { font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 300; color: #fff; line-height: 1.1; }

    /* ── ACCOUNT MODEL CARDS ── */
    .model-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 18px; padding: 2.2rem;
      position: relative; overflow: hidden;
      transition: border-color 0.25s, transform 0.22s; height: 100%;
    }
    .model-card.featured {
      border-color: rgba(16,185,129,0.28);
      background: linear-gradient(160deg, rgba(16,185,129,0.06) 0%, var(--dark2) 50%);
    }
    .model-card:hover { transform: translateY(-5px); }
    .model-card:not(.featured):hover { border-color: rgba(255,255,255,0.14); }
    .model-card.featured:hover { border-color: rgba(16,185,129,0.44); }
    .model-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0;
      height: 2px; opacity: 0; transition: opacity 0.25s;
    }
    .model-card.featured::before { background: linear-gradient(90deg, var(--accent), rgba(16,185,129,0.3)); opacity: 1; }
    .model-card:not(.featured):hover::before { background: rgba(255,255,255,0.1); opacity: 1; }

    .model-badge {
      display: inline-block;
      font-size: 0.6rem; letter-spacing: 0.15em; text-transform: uppercase;
      padding: 0.22rem 0.7rem; border-radius: 4px; margin-bottom: 1.4rem;
    }
    .badge-standard { background: var(--mid); color: var(--muted); border: 1px solid var(--border); }
    .badge-raw      { background: var(--accent-dim); color: var(--accent-bright); border: 1px solid rgba(16,185,129,0.2); }
    .badge-vip      { background: var(--amber-dim); color: var(--amber); border: 1px solid rgba(245,158,11,0.2); }

    .model-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2rem; font-weight: 300; color: #fff; margin-bottom: 0.3rem;
    }
    .model-tagline { font-size: 0.82rem; color: var(--muted); margin-bottom: 1.8rem; line-height: 1.6; }

    .model-stat-grid {
      display: grid; grid-template-columns: 1fr 1fr; gap: 0.8rem; margin-bottom: 1.8rem;
    }
    .mstat {
      background: rgba(255,255,255,0.03); border: 1px solid var(--border);
      border-radius: 10px; padding: 0.9rem;
    }
    .mstat-label { font-size: 0.6rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--muted); }
    .mstat-val {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.5rem; font-weight: 300; color: #fff; margin-top: 2px;
    }
    .mstat-val.green { color: var(--accent-bright); }
    .mstat-val.amber { color: var(--amber); }

    .model-features { list-style: none; padding: 0; margin: 0 0 1.8rem; }
    .model-features li {
      font-size: 0.84rem; color: var(--muted); padding: 0.45rem 0;
      border-bottom: 1px solid var(--border);
      display: flex; align-items: center; gap: 0.6rem;
    }
    .model-features li:last-child { border-bottom: none; }
    .model-features li.inc { color: var(--text); }
    .model-features li i.yes { color: var(--accent-bright); }
    .model-features li i.no  { color: rgba(255,255,255,0.18); }

    .btn-model-primary {
      display: block; width: 100%; text-align: center;
      background: var(--accent); color: #fff;
      font-size: 0.75rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.78rem; border: none; border-radius: 6px;
      text-decoration: none; transition: background 0.2s; font-weight: 500;
    }
    .btn-model-primary:hover { background: #059669; color: #fff; }
    .btn-model-ghost {
      display: block; width: 100%; text-align: center;
      background: transparent; color: var(--muted);
      font-size: 0.75rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.78rem; border: 1px solid var(--border); border-radius: 6px;
      text-decoration: none; transition: all 0.2s;
    }
    .btn-model-ghost:hover { border-color: rgba(255,255,255,0.2); color: #fff; }

    /* ── FULL SPREADS TABLE ── */
    .spreads-table-wrap {
      background: var(--dark2); border: 1px solid rgba(16,185,129,0.10);
      border-radius: 16px; overflow: hidden;
    }
    .table-tabs {
      display: flex; gap: 0.3rem;
      border-bottom: 1px solid var(--border);
      padding: 0.8rem 1.4rem 0;
      flex-wrap: wrap;
    }
    .tab-btn {
      font-size: 0.7rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.45rem 0.9rem; border-radius: 6px 6px 0 0;
      background: transparent; color: var(--muted); border: 1px solid transparent;
      border-bottom: none; cursor: pointer; transition: all 0.15s;
    }
    .tab-btn.active {
      background: rgba(16,185,129,0.08);
      color: var(--accent-bright);
      border-color: rgba(16,185,129,0.18);
    }
    .tab-panel { display: none; }
    .tab-panel.active { display: block; }

    .spreads-table-wrap table { margin: 0; }
    .spreads-table-wrap thead tr { background: rgba(16,185,129,0.03); border-bottom: 1px solid var(--border); }
    .spreads-table-wrap thead th {
      font-size: 0.68rem; letter-spacing: 0.18em; text-transform: uppercase;
      color: var(--muted); font-weight: 500; padding: 1rem 1.4rem; border: none;
    }
    .spreads-table-wrap tbody tr { border-bottom: 1px solid var(--border); transition: background 0.15s; }
    .spreads-table-wrap tbody tr:last-child { border-bottom: none; }
    .spreads-table-wrap tbody tr:hover { background: rgba(16,185,129,0.025); }
    .spreads-table-wrap tbody td {
      font-size: 0.86rem; color: var(--text);
      padding: 0.9rem 1.4rem; border: none; vertical-align: middle;
    }
    .spreads-table-wrap tbody td:first-child { font-weight: 500; color: #fff; }
    .spread-val { color: var(--accent-bright); font-weight: 500; }
    .comm-val { color: var(--amber); font-weight: 500; }
    .free-val { color: var(--green); font-weight: 500; }

    .type-pill {
      font-size: 0.6rem; letter-spacing: 0.1em; text-transform: uppercase;
      padding: 0.2rem 0.55rem; border-radius: 4px; margin-left: 0.3rem;
    }
    .pill-major  { background: rgba(16,185,129,0.10); color: var(--accent-bright); }
    .pill-minor  { background: rgba(14,165,233,0.10); color: #38bdf8; }
    .pill-exotic { background: rgba(245,158,11,0.10); color: var(--amber); }
    .pill-gold   { background: rgba(212,168,67,0.10); color: #d4a843; }
    .pill-ind    { background: rgba(148,163,184,0.10); color: #94a3b8; }
    .pill-nrg    { background: rgba(249,115,22,0.10); color: #fb923c; }
    .pill-cry    { background: rgba(167,139,250,0.10); color: #a78bfa; }
    .pill-sh     { background: rgba(59,130,246,0.10);  color: #60a5fa; }

    /* ── COMMISSION EXPLAINER ── */
    .comm-explainer {
      background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);
    }
    .comm-row {
      display: flex; gap: 1.6rem; align-items: flex-start;
      padding: 1.8rem 0; border-bottom: 1px solid var(--border);
    }
    .comm-row:last-child { border-bottom: none; }
    .comm-icon {
      width: 44px; height: 44px; border-radius: 10px;
      background: var(--accent-dim);
      display: flex; align-items: center; justify-content: center;
      color: var(--accent-bright); font-size: 1.2rem; flex-shrink: 0; margin-top: 2px;
    }
    .comm-title { font-size: 1rem; font-weight: 500; color: #fff; margin-bottom: 0.35rem; }
    .comm-text  { font-size: 0.86rem; color: var(--muted); line-height: 1.75; margin: 0; }

    /* ── TOTAL COST CALCULATOR ── */
    .cost-calc {
      background: var(--dark2); border: 1px solid rgba(16,185,129,0.14);
      border-radius: 18px; padding: 2.4rem; position: relative; overflow: hidden;
    }
    .cost-calc::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0;
      height: 2px; background: linear-gradient(90deg, var(--accent), rgba(16,185,129,0.2));
    }
    .calc-label {
      font-size: 0.68rem; letter-spacing: 0.2em; text-transform: uppercase;
      color: var(--muted); margin-bottom: 0.4rem;
    }
    .calc-input, .calc-select {
      width: 100%;
      background: var(--mid); border: 1px solid var(--border);
      border-radius: 8px; padding: 0.75rem 1rem;
      font-size: 0.9rem; color: #fff;
      font-family: 'DM Sans', sans-serif;
      margin-bottom: 1.2rem; transition: border-color 0.2s;
    }
    .calc-input:focus  { outline: none; border-color: rgba(16,185,129,0.4); }
    .calc-select { appearance: none; cursor: pointer; }
    .calc-select option { background: var(--dark2); }

    .calc-result-grid {
      display: grid; grid-template-columns: 1fr 1fr; gap: 0.8rem;
      margin-top: 1.4rem;
    }
    .cres {
      background: var(--mid); border: 1px solid var(--border); border-radius: 10px; padding: 1rem;
    }
    .cres-label { font-size: 0.6rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--muted); }
    .cres-val {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.5rem; font-weight: 300; margin-top: 4px;
    }
    .cres-total {
      grid-column: 1 / -1;
      background: rgba(16,185,129,0.06); border-color: rgba(16,185,129,0.18);
    }
    .cres-total .cres-val { font-size: 2rem; color: var(--accent-bright); }

    /* ── CTA ── */
    .cta-band {
      background: linear-gradient(135deg, rgba(16,185,129,0.07) 0%, transparent 55%), var(--dark2);
      border-top: 1px solid rgba(16,185,129,0.12);
      border-bottom: 1px solid rgba(16,185,129,0.12);
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
      .model-stat-grid { grid-template-columns: 1fr 1fr; }
      .calc-result-grid { grid-template-columns: 1fr; }
      .cres-total { grid-column: 1; }
      .panel-col-heads, .spread-row { grid-template-columns: 1fr auto auto auto; }
      .spread-row .spread-viz { display: none; }
    }
  </style>
</head>
<body>

    <x-header />
<!-- ── HERO ── -->
<section class="spreads-hero pt-5">
  <div class="hero-bg"></div>
  <div class="grid-overlay"></div>

  <!-- Animated spread bars -->
  <div class="bg-bar" style="top:28%;width:38%;animation-duration:14s;animation-delay:0s;"></div>
  <div class="bg-bar" style="top:44%;width:24%;animation-duration:18s;animation-delay:4s;"></div>
  <div class="bg-bar" style="top:60%;width:30%;animation-duration:11s;animation-delay:2s;"></div>
  <div class="bg-bar" style="top:72%;width:44%;animation-duration:16s;animation-delay:6s;"></div>
  <div class="bg-bar" style="top:18%;width:20%;animation-duration:20s;animation-delay:8s;"></div>

  <div class="container py-5 mt-4" style="padding-bottom:5rem !important;">
    <div class="row align-items-center g-5">

      <!-- Left -->
      <div class="col-lg-6">
        <div class="market-pill fade-up">
          <span class="live-dot"></span> Spreads from 0.0 pips — Raw pricing
        </div>
        <div class="hero-eyebrow fade-up">Trading — Spreads &amp; Commissions</div>
        <h1 class="hero-title fade-up fade-up-1">
          Know exactly<br>what you pay.<br><em>Every trade.</em>
        </h1>
        <p class="hero-subtitle fade-up fade-up-2">
          We publish every spread and commission rate in full — no markups, no hidden fees, no surprises. Choose between a zero-commission spread model or institutional raw spreads with a flat per-lot fee.
        </p>
        <div class="hero-cta-row fade-up fade-up-3">
          <a href="#" class="btn-hero-green">Open Account</a>
          <a href="#" class="btn-hero-ghost">Compare Models</a>
        </div>
      </div>

      <!-- Right — Live Spread Panel -->
      <div class="col-lg-5 offset-lg-1 fade-up fade-up-4">
        <div class="spread-panel">
          <div class="panel-header">
            <div class="panel-title">Live Spreads</div>
            <div class="panel-live"><span class="live-dot" style="width:6px;height:6px;background:var(--accent-bright);animation:pulseDot 2s ease infinite;display:inline-block;border-radius:50%;"></span>Real-time</div>
          </div>
          <div class="panel-col-heads">
            <div class="col-head">Instrument</div>
            <div class="col-head right">Bid</div>
            <div class="col-head right">Ask</div>
            <div class="col-head right">Spread</div>
            <div class="col-head right">Comm.</div>
          </div>

          <div class="spread-row">
            <div><div class="sr-symbol">EUR/USD</div></div>
            <div class="sr-bid">1.08698</div>
            <div class="sr-ask">1.08701</div>
            <div class="sr-spread">0.3</div>
            <div class="sr-comm">$0</div>
          </div>
          <div class="spread-row">
            <div><div class="sr-symbol">GBP/USD</div></div>
            <div class="sr-bid">1.26814</div>
            <div class="sr-ask">1.26820</div>
            <div class="sr-spread">0.6</div>
            <div class="sr-comm">$0</div>
          </div>
          <div class="spread-row">
            <div><div class="sr-symbol">USD/JPY</div></div>
            <div class="sr-bid">149.840</div>
            <div class="sr-ask">149.848</div>
            <div class="sr-spread">0.8</div>
            <div class="sr-comm">$0</div>
          </div>
          <div class="spread-row">
            <div><div class="sr-symbol">XAU/USD</div></div>
            <div class="sr-bid">2641.60</div>
            <div class="sr-ask">2641.80</div>
            <div class="sr-spread">0.20</div>
            <div class="sr-comm">$0</div>
          </div>
          <div class="spread-row">
            <div><div class="sr-symbol">US500</div></div>
            <div class="sr-bid">5482.4</div>
            <div class="sr-ask">5482.8</div>
            <div class="sr-spread">0.4</div>
            <div class="sr-comm">$0</div>
          </div>
          <div class="spread-row">
            <div><div class="sr-symbol">BTC/USD</div></div>
            <div class="sr-bid">82,414</div>
            <div class="sr-ask">82,432</div>
            <div class="sr-spread">18.0</div>
            <div class="sr-comm">$0</div>
          </div>
          <div class="spread-row">
            <div><div class="sr-symbol">AAPL</div></div>
            <div class="sr-bid">189.20</div>
            <div class="sr-ask">189.24</div>
            <div class="sr-spread">0.04</div>
            <div class="sr-comm">$0</div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Ticker -->
  <div class="ticker-bg">
    <div class="ticker-track">
      <span class="ticker-item"><span class="ticker-pair">EUR/USD</span><span class="ticker-val">0.3 pip</span><span class="ticker-green">spread</span></span>
      <span class="ticker-item"><span class="ticker-pair">GBP/USD</span><span class="ticker-val">0.6 pip</span><span class="ticker-green">spread</span></span>
      <span class="ticker-item"><span class="ticker-pair">USD/JPY</span><span class="ticker-val">0.8 pip</span><span class="ticker-green">spread</span></span>
      <span class="ticker-item"><span class="ticker-pair">XAU/USD</span><span class="ticker-val">$0.20</span><span class="ticker-green">spread</span></span>
      <span class="ticker-item"><span class="ticker-pair">US500</span><span class="ticker-val">0.4 pt</span><span class="ticker-green">spread</span></span>
      <span class="ticker-item"><span class="ticker-pair">BTC/USD</span><span class="ticker-val">$18.00</span><span class="ticker-green">spread</span></span>
      <span class="ticker-item"><span class="ticker-pair">WTI Oil</span><span class="ticker-val">$0.03</span><span class="ticker-green">spread</span></span>
      <span class="ticker-item"><span class="ticker-pair">NVDA</span><span class="ticker-val">$0.05</span><span class="ticker-green">spread</span></span>
      <!-- dupe -->
      <span class="ticker-item"><span class="ticker-pair">EUR/USD</span><span class="ticker-val">0.3 pip</span><span class="ticker-green">spread</span></span>
      <span class="ticker-item"><span class="ticker-pair">GBP/USD</span><span class="ticker-val">0.6 pip</span><span class="ticker-green">spread</span></span>
      <span class="ticker-item"><span class="ticker-pair">USD/JPY</span><span class="ticker-val">0.8 pip</span><span class="ticker-green">spread</span></span>
      <span class="ticker-item"><span class="ticker-pair">XAU/USD</span><span class="ticker-val">$0.20</span><span class="ticker-green">spread</span></span>
      <span class="ticker-item"><span class="ticker-pair">US500</span><span class="ticker-val">0.4 pt</span><span class="ticker-green">spread</span></span>
      <span class="ticker-item"><span class="ticker-pair">BTC/USD</span><span class="ticker-val">$18.00</span><span class="ticker-green">spread</span></span>
      <span class="ticker-item"><span class="ticker-pair">WTI Oil</span><span class="ticker-val">$0.03</span><span class="ticker-green">spread</span></span>
      <span class="ticker-item"><span class="ticker-pair">NVDA</span><span class="ticker-val">$0.05</span><span class="ticker-green">spread</span></span>
    </div>
  </div>
</section>

<!-- ── NUMBERS STRIP ── -->
<div class="numbers-strip">
  <div class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">0.0<sup>pip</sup></div>
        <div class="num-desc">Raw Spread from</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">$3<sup>/lot</sup></div>
        <div class="num-desc">Raw Commission</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">0<sup>%</sup></div>
        <div class="num-desc">Share Commission</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">1,200<sup>+</sup></div>
        <div class="num-desc">Instruments</div>
      </div>
    </div>
  </div>
</div>

<!-- ── ACCOUNT MODELS ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="text-center mb-5">
      <div class="section-tag d-inline-flex">Pricing Models</div>
      <h2 class="section-title mt-1">Two models.<br>Both transparent.</h2>
      <p class="mx-auto mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:480px;">
        Choose the cost structure that fits your trading style — a simple spread-only model with no commissions, or raw institutional pricing with a flat per-lot fee.
      </p>
    </div>
    <div class="row g-4 justify-content-center">

      <!-- Standard -->
      <div class="col-md-4">
        <div class="model-card">
          <div class="model-badge badge-standard">Standard</div>
          <div class="model-name">Spread Only</div>
          <div class="model-tagline">A single all-in spread. No commission ever charged on any trade.</div>
          <div class="model-stat-grid">
            <div class="mstat">
              <div class="mstat-label">EUR/USD from</div>
              <div class="mstat-val">1.0 pip</div>
            </div>
            <div class="mstat">
              <div class="mstat-label">Commission</div>
              <div class="mstat-val green">$0</div>
            </div>
            <div class="mstat">
              <div class="mstat-label">Gold from</div>
              <div class="mstat-val">$0.40</div>
            </div>
            <div class="mstat">
              <div class="mstat-label">Min Deposit</div>
              <div class="mstat-val">$100</div>
            </div>
          </div>
          <ul class="model-features">
            <li class="inc"><i class="uil uil-check-circle yes"></i> All-in spread, zero commission</li>
            <li class="inc"><i class="uil uil-check-circle yes"></i> Simple, predictable costs</li>
            <li class="inc"><i class="uil uil-check-circle yes"></i> Ideal for beginners &amp; swing traders</li>
            <li><i class="uil uil-minus-circle no"></i> <span style="color:var(--muted)">Raw interbank spreads</span></li>
          </ul>
          <a href="#" class="btn-model-ghost">Open Standard</a>
        </div>
      </div>

      <!-- Raw (featured) -->
      <div class="col-md-4">
        <div class="model-card featured">
          <div class="model-badge badge-raw">Most Popular</div>
          <div class="model-name">Raw Spread</div>
          <div class="model-tagline">True interbank pricing from 0.0 pips. Flat $3 commission per standard lot per side.</div>
          <div class="model-stat-grid">
            <div class="mstat">
              <div class="mstat-label">EUR/USD from</div>
              <div class="mstat-val green">0.0 pip</div>
            </div>
            <div class="mstat">
              <div class="mstat-label">Commission</div>
              <div class="mstat-val green">$3/lot</div>
            </div>
            <div class="mstat">
              <div class="mstat-label">Gold from</div>
              <div class="mstat-val green">$0.20</div>
            </div>
            <div class="mstat">
              <div class="mstat-label">Min Deposit</div>
              <div class="mstat-val">$1,000</div>
            </div>
          </div>
          <ul class="model-features">
            <li class="inc"><i class="uil uil-check-circle yes"></i> Raw 0.0 pip interbank spreads</li>
            <li class="inc"><i class="uil uil-check-circle yes"></i> $3 flat commission per lot/side</li>
            <li class="inc"><i class="uil uil-check-circle yes"></i> Ideal for scalpers &amp; high-frequency traders</li>
            <li class="inc"><i class="uil uil-check-circle yes"></i> Lower total cost at high volumes</li>
          </ul>
          <a href="#" class="btn-model-primary">Open Raw Account</a>
        </div>
      </div>

      <!-- VIP -->
      <div class="col-md-4">
        <div class="model-card">
          <div class="model-badge badge-vip">VIP</div>
          <div class="model-name">Institutional</div>
          <div class="model-tagline">Negotiated pricing for high-volume traders. Dedicated liquidity, custom commission tiers.</div>
          <div class="model-stat-grid">
            <div class="mstat">
              <div class="mstat-label">EUR/USD from</div>
              <div class="mstat-val amber">0.0 pip</div>
            </div>
            <div class="mstat">
              <div class="mstat-label">Commission</div>
              <div class="mstat-val amber">Negotiated</div>
            </div>
            <div class="mstat">
              <div class="mstat-label">Gold from</div>
              <div class="mstat-val amber">$0.10</div>
            </div>
            <div class="mstat">
              <div class="mstat-label">Min Deposit</div>
              <div class="mstat-val">$50,000</div>
            </div>
          </div>
          <ul class="model-features">
            <li class="inc"><i class="uil uil-check-circle yes"></i> Custom-negotiated spreads</li>
            <li class="inc"><i class="uil uil-check-circle yes"></i> Volume-based commission rebates</li>
            <li class="inc"><i class="uil uil-check-circle yes"></i> Dedicated institutional liquidity</li>
            <li class="inc"><i class="uil uil-check-circle yes"></i> Assigned account manager</li>
          </ul>
          <a href="#" class="btn-model-ghost">Contact Sales</a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ── FULL SPREADS TABLE ── -->
<section class="py-5" style="background:var(--dark2);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
  <div class="container py-3">
    <div class="row align-items-end g-4 mb-4">
      <div class="col-lg-6">
        <div class="section-tag">Full Spreads Table</div>
        <h2 class="section-title">Every instrument.<br>Every cost.</h2>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <p style="font-size:0.88rem;color:var(--muted);line-height:1.8;">
          Standard spreads shown. Raw account spreads are approximately 60–70% tighter with a flat $3/lot commission. Updated during market hours.
        </p>
      </div>
    </div>

    <div class="spreads-table-wrap">
      <div class="table-tabs">
        <button class="tab-btn active" onclick="switchTab(event,'stab-fx')">Forex</button>
        <button class="tab-btn" onclick="switchTab(event,'stab-metals')">Metals</button>
        <button class="tab-btn" onclick="switchTab(event,'stab-indices')">Indices</button>
        <button class="tab-btn" onclick="switchTab(event,'stab-energy')">Energies</button>
        <button class="tab-btn" onclick="switchTab(event,'stab-shares')">Shares</button>
        <button class="tab-btn" onclick="switchTab(event,'stab-crypto')">Cryptos</button>
      </div>

      <!-- Forex -->
      <div id="stab-fx" class="tab-panel active">
        <table class="table table-borderless mb-0">
          <thead><tr><th>Pair</th><th>Type</th><th>Std Spread</th><th>Raw Spread</th><th>Commission (Raw)</th><th>Leverage</th><th>Min Trade</th></tr></thead>
          <tbody>
            <tr><td>EUR/USD</td><td><span class="type-pill pill-major">Major</span></td><td class="spread-val">1.0</td><td class="spread-val">0.0</td><td class="comm-val">$3/lot</td><td>500:1</td><td>0.01 lot</td></tr>
            <tr><td>GBP/USD</td><td><span class="type-pill pill-major">Major</span></td><td class="spread-val">1.2</td><td class="spread-val">0.1</td><td class="comm-val">$3/lot</td><td>500:1</td><td>0.01 lot</td></tr>
            <tr><td>USD/JPY</td><td><span class="type-pill pill-major">Major</span></td><td class="spread-val">1.4</td><td class="spread-val">0.2</td><td class="comm-val">$3/lot</td><td>500:1</td><td>0.01 lot</td></tr>
            <tr><td>AUD/USD</td><td><span class="type-pill pill-major">Major</span></td><td class="spread-val">1.6</td><td class="spread-val">0.3</td><td class="comm-val">$3/lot</td><td>500:1</td><td>0.01 lot</td></tr>
            <tr><td>USD/CHF</td><td><span class="type-pill pill-major">Major</span></td><td class="spread-val">1.8</td><td class="spread-val">0.4</td><td class="comm-val">$3/lot</td><td>500:1</td><td>0.01 lot</td></tr>
            <tr><td>EUR/GBP</td><td><span class="type-pill pill-minor">Minor</span></td><td class="spread-val">2.0</td><td class="spread-val">0.8</td><td class="comm-val">$3/lot</td><td>200:1</td><td>0.01 lot</td></tr>
            <tr><td>GBP/JPY</td><td><span class="type-pill pill-minor">Minor</span></td><td class="spread-val">2.8</td><td class="spread-val">1.2</td><td class="comm-val">$3/lot</td><td>200:1</td><td>0.01 lot</td></tr>
            <tr><td>USD/TRY</td><td><span class="type-pill pill-exotic">Exotic</span></td><td class="spread-val">38.0</td><td class="spread-val">22.0</td><td class="comm-val">$3/lot</td><td>50:1</td><td>0.01 lot</td></tr>
            <tr><td>USD/ZAR</td><td><span class="type-pill pill-exotic">Exotic</span></td><td class="spread-val">80.0</td><td class="spread-val">55.0</td><td class="comm-val">$3/lot</td><td>50:1</td><td>0.01 lot</td></tr>
          </tbody>
        </table>
      </div>

      <!-- Metals -->
      <div id="stab-metals" class="tab-panel">
        <table class="table table-borderless mb-0">
          <thead><tr><th>Instrument</th><th>Type</th><th>Std Spread</th><th>Raw Spread</th><th>Commission (Raw)</th><th>Leverage</th><th>Contract</th></tr></thead>
          <tbody>
            <tr><td>XAU/USD (Gold)</td><td><span class="type-pill pill-gold">Precious</span></td><td class="spread-val">$0.40</td><td class="spread-val">$0.20</td><td class="comm-val">$3/lot</td><td>500:1</td><td>100 oz</td></tr>
            <tr><td>XAG/USD (Silver)</td><td><span class="type-pill pill-gold">Precious</span></td><td class="spread-val">$0.04</td><td class="spread-val">$0.02</td><td class="comm-val">$3/lot</td><td>500:1</td><td>5,000 oz</td></tr>
            <tr><td>XPT/USD (Platinum)</td><td><span class="type-pill pill-gold">PGM</span></td><td class="spread-val">$4.00</td><td class="spread-val">$2.00</td><td class="comm-val">$3/lot</td><td>100:1</td><td>50 oz</td></tr>
            <tr><td>XPD/USD (Palladium)</td><td><span class="type-pill pill-gold">PGM</span></td><td class="spread-val">$10.00</td><td class="spread-val">$5.00</td><td class="comm-val">$3/lot</td><td>100:1</td><td>100 oz</td></tr>
            <tr><td>Copper</td><td><span class="type-pill pill-ind">Industrial</span></td><td class="spread-val">$0.006</td><td class="spread-val">$0.003</td><td class="comm-val">$3/lot</td><td>100:1</td><td>25,000 lbs</td></tr>
          </tbody>
        </table>
      </div>

      <!-- Indices -->
      <div id="stab-indices" class="tab-panel">
        <table class="table table-borderless mb-0">
          <thead><tr><th>Index</th><th>Region</th><th>Std Spread</th><th>Raw Spread</th><th>Commission (Raw)</th><th>Leverage</th><th>Hours</th></tr></thead>
          <tbody>
            <tr><td>US500 (S&amp;P 500)</td><td><span class="type-pill pill-ind">Americas</span></td><td class="spread-val">0.8 pt</td><td class="spread-val">0.4 pt</td><td class="free-val">$0</td><td>100:1</td><td>23/5</td></tr>
            <tr><td>US30 (Dow Jones)</td><td><span class="type-pill pill-ind">Americas</span></td><td class="spread-val">2.0 pt</td><td class="spread-val">1.0 pt</td><td class="free-val">$0</td><td>100:1</td><td>23/5</td></tr>
            <tr><td>USTEC (NASDAQ)</td><td><span class="type-pill pill-ind">Americas</span></td><td class="spread-val">1.6 pt</td><td class="spread-val">0.8 pt</td><td class="free-val">$0</td><td>100:1</td><td>23/5</td></tr>
            <tr><td>UK100 (FTSE)</td><td><span class="type-pill pill-ind">Europe</span></td><td class="spread-val">2.0 pt</td><td class="spread-val">1.0 pt</td><td class="free-val">$0</td><td>100:1</td><td>Session</td></tr>
            <tr><td>GER40 (DAX)</td><td><span class="type-pill pill-ind">Europe</span></td><td class="spread-val">1.6 pt</td><td class="spread-val">0.8 pt</td><td class="free-val">$0</td><td>100:1</td><td>Session</td></tr>
            <tr><td>JP225 (Nikkei)</td><td><span class="type-pill pill-ind">Asia</span></td><td class="spread-val">10 pt</td><td class="spread-val">5 pt</td><td class="free-val">$0</td><td>100:1</td><td>Session</td></tr>
          </tbody>
        </table>
      </div>

      <!-- Energies -->
      <div id="stab-energy" class="tab-panel">
        <table class="table table-borderless mb-0">
          <thead><tr><th>Instrument</th><th>Type</th><th>Std Spread</th><th>Raw Spread</th><th>Commission (Raw)</th><th>Leverage</th><th>Contract</th></tr></thead>
          <tbody>
            <tr><td>WTI Crude Oil</td><td><span class="type-pill pill-nrg">Oil</span></td><td class="spread-val">$0.06</td><td class="spread-val">$0.03</td><td class="free-val">$0</td><td>500:1</td><td>1,000 bbl</td></tr>
            <tr><td>Brent Crude Oil</td><td><span class="type-pill pill-nrg">Oil</span></td><td class="spread-val">$0.10</td><td class="spread-val">$0.05</td><td class="free-val">$0</td><td>500:1</td><td>1,000 bbl</td></tr>
            <tr><td>Natural Gas</td><td><span class="type-pill pill-nrg">Gas</span></td><td class="spread-val">$0.008</td><td class="spread-val">$0.004</td><td class="free-val">$0</td><td>200:1</td><td>10,000 MMBtu</td></tr>
            <tr><td>RBOB Gasoline</td><td><span class="type-pill pill-nrg">Refined</span></td><td class="spread-val">$0.006</td><td class="spread-val">$0.003</td><td class="free-val">$0</td><td>100:1</td><td>42,000 gal</td></tr>
          </tbody>
        </table>
      </div>

      <!-- Shares -->
      <div id="stab-shares" class="tab-panel">
        <table class="table table-borderless mb-0">
          <thead><tr><th>Stock</th><th>Exchange</th><th>Std Spread</th><th>Commission</th><th>Leverage</th><th>Min Trade</th><th>Hours</th></tr></thead>
          <tbody>
            <tr><td>Apple (AAPL)</td><td><span class="type-pill pill-sh">NASDAQ</span></td><td class="spread-val">$0.04</td><td class="free-val">0%</td><td>20:1</td><td>0.1 share</td><td>Session</td></tr>
            <tr><td>Microsoft (MSFT)</td><td><span class="type-pill pill-sh">NASDAQ</span></td><td class="spread-val">$0.05</td><td class="free-val">0%</td><td>20:1</td><td>0.1 share</td><td>Session</td></tr>
            <tr><td>NVIDIA (NVDA)</td><td><span class="type-pill pill-sh">NASDAQ</span></td><td class="spread-val">$0.05</td><td class="free-val">0%</td><td>20:1</td><td>0.1 share</td><td>Session</td></tr>
            <tr><td>Tesla (TSLA)</td><td><span class="type-pill pill-sh">NASDAQ</span></td><td class="spread-val">$0.06</td><td class="free-val">0%</td><td>20:1</td><td>0.1 share</td><td>Session</td></tr>
            <tr><td>Amazon (AMZN)</td><td><span class="type-pill pill-sh">NASDAQ</span></td><td class="spread-val">$0.06</td><td class="free-val">0%</td><td>20:1</td><td>0.1 share</td><td>Session</td></tr>
            <tr><td>Lloyds (LLOY)</td><td><span class="type-pill pill-minor">LSE</span></td><td class="spread-val">0.6p</td><td class="free-val">0%</td><td>10:1</td><td>1 share</td><td>Session</td></tr>
            <tr><td>HSBC (HSBA)</td><td><span class="type-pill pill-minor">LSE</span></td><td class="spread-val">1.0p</td><td class="free-val">0%</td><td>10:1</td><td>1 share</td><td>Session</td></tr>
          </tbody>
        </table>
      </div>

      <!-- Crypto -->
      <div id="stab-crypto" class="tab-panel">
        <table class="table table-borderless mb-0">
          <thead><tr><th>Coin</th><th>Type</th><th>Std Spread</th><th>Commission</th><th>Leverage</th><th>Min Trade</th><th>Hours</th></tr></thead>
          <tbody>
            <tr><td>BTC/USD</td><td><span class="type-pill pill-cry">Crypto</span></td><td class="spread-val">$36.00</td><td class="free-val">0%</td><td>200:1</td><td>0.001 BTC</td><td>24/7</td></tr>
            <tr><td>ETH/USD</td><td><span class="type-pill pill-cry">Crypto</span></td><td class="spread-val">$3.00</td><td class="free-val">0%</td><td>200:1</td><td>0.01 ETH</td><td>24/7</td></tr>
            <tr><td>SOL/USD</td><td><span class="type-pill pill-cry">Crypto</span></td><td class="spread-val">$1.60</td><td class="free-val">0%</td><td>200:1</td><td>0.1 SOL</td><td>24/7</td></tr>
            <tr><td>BNB/USD</td><td><span class="type-pill pill-cry">Crypto</span></td><td class="spread-val">$1.20</td><td class="free-val">0%</td><td>200:1</td><td>0.1 BNB</td><td>24/7</td></tr>
            <tr><td>XRP/USD</td><td><span class="type-pill pill-cry">Crypto</span></td><td class="spread-val">$0.008</td><td class="free-val">0%</td><td>200:1</td><td>10 XRP</td><td>24/7</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- ── COST EXPLAINER ── -->
<section class="comm-explainer py-5">
  <div class="container py-3">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="section-tag">How Costs Work</div>
        <h2 class="section-title">Spread vs<br>commission.</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:310px;">
          Understanding the difference between a spread and a commission helps you choose the right account type and calculate the true cost of any trade before you place it.
        </p>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="comm-row">
          <div class="comm-icon"><i class="uil uil-arrows-h"></i></div>
          <div>
            <div class="comm-title">What is a Spread?</div>
            <p class="comm-text">The spread is the difference between the buy (ask) and sell (bid) price of an instrument. It is the primary cost of entering a trade on a standard account. A 1.0 pip spread on EUR/USD at 1 standard lot = $10 entry cost.</p>
          </div>
        </div>
        <div class="comm-row">
          <div class="comm-icon"><i class="uil uil-dollar-sign"></i></div>
          <div>
            <div class="comm-title">What is a Commission?</div>
            <p class="comm-text">On Raw accounts, the spread is reduced to near-zero but a flat fee is charged per lot traded. Our fee is $3 per standard lot per side — meaning $6 round-trip on a 1-lot EUR/USD trade. Total cost is typically lower than a standard spread account at high volumes.</p>
          </div>
        </div>
        <div class="comm-row">
          <div class="comm-icon"><i class="uil uil-chart-bar"></i></div>
          <div>
            <div class="comm-title">Which is Cheaper?</div>
            <p class="comm-text">At low volumes (less than 5 lots/day), the spread-only account often works out cheaper due to simplicity. High-frequency traders and scalpers benefit from raw spreads — even a 0.6-pip saving on EUR/USD equals $6 per lot, beating the $6 commission once spreads were above 0.6.</p>
          </div>
        </div>
        <div class="comm-row">
          <div class="comm-icon"><i class="uil uil-share-alt"></i></div>
          <div>
            <div class="comm-title">Zero Commission on Shares &amp; Cryptos</div>
            <p class="comm-text">Shares and crypto CFDs carry zero commission on both Standard and Raw accounts. The only cost is the quoted spread. This applies to all 500+ share and 50+ crypto CFDs on the platform.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── TOTAL COST CALCULATOR ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row align-items-start g-5">
      <div class="col-lg-5">
        <div class="section-tag">Cost Calculator</div>
        <h2 class="section-title">Calculate your<br>true trade cost.</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:360px;">
          Enter your trade details to see the exact spread and commission cost before you place a single order. Results shown for both Standard and Raw account models.
        </p>
        <div class="mt-4 p-3" style="background:var(--dark2);border:1px solid var(--border);border-radius:10px;font-size:0.82rem;color:var(--muted);line-height:1.75;">
          <p style="margin-bottom:0.5rem;"><i class="uil uil-lightbulb-alt" style="color:var(--accent-bright);margin-right:6px;"></i><strong style="color:var(--text);">Pro tip:</strong> For EUR/USD at 10+ lots/day, a Raw account saves an average of $28 daily versus Standard spread pricing.</p>
          <p style="margin-bottom:0;"><i class="uil uil-info-circle" style="color:var(--accent-bright);margin-right:6px;"></i>All results are indicative based on typical spread conditions during London session hours.</p>
        </div>
      </div>
      <div class="col-lg-6 offset-lg-1">
        <div class="cost-calc">
          <div class="calc-label">Instrument</div>
          <select class="calc-select" id="ccInstrument" onchange="calcCost()">
            <option value="eurusd">EUR/USD</option>
            <option value="gbpusd">GBP/USD</option>
            <option value="usdjpy">USD/JPY</option>
            <option value="xauusd">XAU/USD (Gold)</option>
            <option value="us500">US500 (S&amp;P 500)</option>
            <option value="btcusd">BTC/USD</option>
            <option value="aapl">Apple (AAPL)</option>
          </select>

          <div class="calc-label">Lot Size (Standard Lots)</div>
          <input class="calc-input" type="number" id="ccLots" value="1.00" min="0.01" step="0.01" oninput="calcCost()">

          <div class="calc-result-grid" id="ccResults">
            <div class="cres">
              <div class="cres-label">Standard — Spread Cost</div>
              <div class="cres-val" id="ccStdSpread">$10.00</div>
            </div>
            <div class="cres">
              <div class="cres-label">Raw — Spread Cost</div>
              <div class="cres-val" id="ccRawSpread">$0.00</div>
            </div>
            <div class="cres">
              <div class="cres-label">Standard — Commission</div>
              <div class="cres-val" style="color:var(--accent-bright);" id="ccStdComm">$0.00</div>
            </div>
            <div class="cres">
              <div class="cres-label">Raw — Commission</div>
              <div class="cres-val" id="ccRawComm">$6.00</div>
            </div>
            <div class="cres cres-total">
              <div class="cres-label">Raw Total vs Standard Total</div>
              <div style="display:flex;align-items:baseline;gap:1.4rem;flex-wrap:wrap;">
                <div>
                  <div style="font-size:0.6rem;letter-spacing:0.12em;text-transform:uppercase;color:var(--muted);margin-bottom:2px;">Standard</div>
                  <div class="cres-val" id="ccStdTotal" style="color:rgba(255,255,255,0.6);">$10.00</div>
                </div>
                <div style="font-size:1.4rem;color:var(--muted);align-self:center;">vs</div>
                <div>
                  <div style="font-size:0.6rem;letter-spacing:0.12em;text-transform:uppercase;color:var(--muted);margin-bottom:2px;">Raw</div>
                  <div class="cres-val" id="ccRawTotal">$6.00</div>
                </div>
                <div style="font-size:0.78rem;color:var(--muted);align-self:flex-end;padding-bottom:4px;" id="ccSaving">Raw saves $4.00/trade</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── CTA ── -->
<section class="cta-band py-5">
  <div class="container py-3 text-center">
    <div class="section-tag d-inline-flex">Get Started</div>
    <h2 class="section-title mt-1 mx-auto" style="max-width:540px;">Tight spreads.<br>Zero surprises.</h2>
    <p class="mt-3 mx-auto" style="font-size:0.92rem;color:var(--muted);line-height:1.8;max-width:440px;">
      Open a live account and experience institutional-grade pricing from day one — or test every spread live on a free $10,000 demo account.
    </p>
    <div class="d-flex gap-3 justify-content-center flex-wrap mt-4">
      <a href="#" class="btn-hero-green">Open Live Account</a>
      <a href="#" class="btn-hero-ghost">Try Demo Free</a>
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
      <p>© <span id="year"></span> TESLA INVEST. All rights reserved. Spreads are indicative only and may widen during low-liquidity periods. This is a fictional demo site.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById("year").textContent = new Date().getFullYear();

  /* ── TAB SWITCHER ── */
  function switchTab(e, id) {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
    e.target.classList.add('active');
    document.getElementById(id).classList.add('active');
  }

  /* ── COST CALCULATOR ── */
  // stdSpread = pips (FX), pts (indices), $ (commodities/shares/crypto)
  // pipValue = $ per pip per standard lot
  // rawSpread = fraction of std
  // rawComm = $6 round trip for FX/metals, $0 for everything else
  const costData = {
    eurusd: { label:'EUR/USD',     stdSpread:1.0,   rawSpread:0.0,  pipValue:10,    rawComm:6, unit:'pip'  },
    gbpusd: { label:'GBP/USD',     stdSpread:1.2,   rawSpread:0.1,  pipValue:10,    rawComm:6, unit:'pip'  },
    usdjpy: { label:'USD/JPY',     stdSpread:1.4,   rawSpread:0.2,  pipValue:9.2,   rawComm:6, unit:'pip'  },
    xauusd: { label:'Gold',        stdSpread:0.40,  rawSpread:0.20, pipValue:100,   rawComm:6, unit:'$'    },
    us500:  { label:'US500',       stdSpread:0.8,   rawSpread:0.4,  pipValue:50,    rawComm:0, unit:'pt'   },
    btcusd: { label:'BTC/USD',     stdSpread:36,    rawSpread:36,   pipValue:1,     rawComm:0, unit:'$'    },
    aapl:   { label:'Apple (AAPL)',stdSpread:0.04,  rawSpread:0.04, pipValue:1,     rawComm:0, unit:'$'    },
  };

  function calcCost() {
    const instr = document.getElementById('ccInstrument').value;
    const lots  = parseFloat(document.getElementById('ccLots').value) || 1;
    const d     = costData[instr];

    const stdSpreadCost = (d.stdSpread * d.pipValue * lots).toFixed(2);
    const rawSpreadCost = (d.rawSpread * d.pipValue * lots).toFixed(2);
    const stdComm       = 0;
    const rawComm       = (d.rawComm * lots).toFixed(2);
    const stdTotal      = (parseFloat(stdSpreadCost) + stdComm).toFixed(2);
    const rawTotal      = (parseFloat(rawSpreadCost) + parseFloat(rawComm)).toFixed(2);
    const saving        = (parseFloat(stdTotal) - parseFloat(rawTotal)).toFixed(2);

    document.getElementById('ccStdSpread').textContent = '$' + stdSpreadCost;
    document.getElementById('ccRawSpread').textContent = '$' + rawSpreadCost;
    document.getElementById('ccStdComm').textContent   = '$0.00';
    document.getElementById('ccRawComm').textContent   = '$' + rawComm;
    document.getElementById('ccStdTotal').textContent  = '$' + stdTotal;
    document.getElementById('ccRawTotal').textContent  = '$' + rawTotal;

    const savEl = document.getElementById('ccSaving');
    if (parseFloat(saving) > 0) {
      savEl.textContent = 'Raw saves $' + saving + '/trade';
      savEl.style.color = 'var(--accent-bright)';
    } else if (parseFloat(saving) < 0) {
      savEl.textContent = 'Standard saves $' + Math.abs(saving) + '/trade';
      savEl.style.color = 'var(--amber)';
    } else {
      savEl.textContent = 'Both models cost the same';
      savEl.style.color = 'var(--muted)';
    }
  }

  calcCost();
</script>
</body>
</html>
