<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Platform — Tesla Invest</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    :root {
      --accent: #6366f1;
      --accent-dim: rgba(99,102,241,0.10);
      --accent-glow: rgba(99,102,241,0.06);
      --accent-bright: #818cf8;
      --dark: #0c0c0e;
      --dark2: #141416;
      --dark3: #0e0e10;
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
    .platform-hero {
      position: relative;
      min-height: 100vh;
      display: flex;
      align-items: center;
      overflow: hidden;
      background: var(--dark3);
    }
    .hero-bg {
      position: absolute; inset: 0; pointer-events: none;
    }
    .hero-bg::before {
      content: '';
      position: absolute; inset: 0;
      background:
        radial-gradient(ellipse 70% 65% at 55% 50%, rgba(99,102,241,0.07) 0%, transparent 60%),
        radial-gradient(ellipse 40% 50% at 5% 80%, rgba(99,102,241,0.04) 0%, transparent 58%),
        radial-gradient(ellipse 30% 35% at 90% 10%, rgba(139,92,246,0.04) 0%, transparent 55%);
    }

    /* Animated circuit-board grid — tighter, tech feel */
    .grid-overlay {
      position: absolute; inset: 0; pointer-events: none;
      background-image:
        linear-gradient(to right, rgba(99,102,241,0.04) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(99,102,241,0.04) 1px, transparent 1px);
      background-size: 48px 48px;
    }

    /* Scanning line animation */
    .scan-line {
      position: absolute;
      left: 0; right: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(99,102,241,0.3), transparent);
      animation: scanDown 6s linear infinite;
      pointer-events: none;
    }
    @keyframes scanDown {
      0%   { top: -2px; opacity: 0; }
      5%   { opacity: 1; }
      95%  { opacity: 1; }
      100% { top: 100%; opacity: 0; }
    }

    /* Floating data nodes */
    .data-node {
      position: absolute;
      width: 6px; height: 6px;
      border-radius: 50%;
      background: var(--accent);
      pointer-events: none;
      animation: nodePulse ease-in-out infinite;
    }
    @keyframes nodePulse {
      0%,100% { opacity:0.12; transform: scale(1); }
      50%      { opacity:0.35; transform: scale(1.6); }
    }

    .hero-eyebrow {
      font-size: 0.7rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--accent-bright); font-weight: 500;
      display: flex; align-items: center; gap: 12px; margin-bottom: 2rem;
    }
    .hero-eyebrow::before {
      content: ''; display: block; width: 36px; height: 1px;
      background: linear-gradient(90deg, var(--accent), rgba(99,102,241,0.3));
    }
    .hero-title {
      font-size: clamp(3rem, 6.5vw, 5.6rem);
      font-weight: 300; line-height: 1.05; color: #fff; margin-bottom: 2rem;
    }
    .hero-title em {
      font-style: italic;
      background: linear-gradient(135deg, var(--accent-bright), #c4b5fd, var(--accent-bright));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .hero-subtitle {
      font-size: clamp(0.95rem, 2vw, 1.1rem); line-height: 1.85;
      color: var(--muted); max-width: 480px; font-weight: 300;
    }
    .hero-cta-row { display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 2.8rem; }
    .btn-hero-indigo {
      background: var(--accent); color: #fff;
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: none; border-radius: 4px;
      text-decoration: none; transition: background 0.2s; display: inline-block; font-weight: 500;
    }
    .btn-hero-indigo:hover { background: #4f46e5; color: #fff; }
    .btn-hero-ghost {
      background: transparent; color: var(--muted);
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: 1px solid var(--border); border-radius: 4px;
      text-decoration: none; transition: all 0.2s; display: inline-block;
    }
    .btn-hero-ghost:hover { border-color: rgba(255,255,255,0.25); color: #fff; }

    /* ── MOCK TRADING TERMINAL ── */
    .terminal-wrap {
      position: relative;
    }
    .terminal {
      background: var(--dark2);
      border: 1px solid rgba(99,102,241,0.18);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 40px 80px rgba(0,0,0,0.6), 0 0 60px rgba(99,102,241,0.06);
    }
    .terminal-bar {
      padding: 0.9rem 1.4rem;
      background: rgba(99,102,241,0.06);
      border-bottom: 1px solid var(--border);
      display: flex; align-items: center; justify-content: space-between;
      gap: 1rem;
    }
    .terminal-dots { display: flex; gap: 6px; }
    .terminal-dot {
      width: 10px; height: 10px; border-radius: 50%;
    }
    .terminal-title {
      font-size: 0.68rem; letter-spacing: 0.18em; text-transform: uppercase;
      color: var(--muted); flex: 1; text-align: center;
    }
    .terminal-status {
      font-size: 0.65rem; letter-spacing: 0.12em; text-transform: uppercase;
      color: var(--green); display: flex; align-items: center; gap: 5px;
    }
    .terminal-status::before {
      content: ''; display: inline-block; width: 6px; height: 6px;
      border-radius: 50%; background: var(--green);
      animation: pulseDot 2s ease infinite;
    }
    @keyframes pulseDot {
      0%,100% { opacity:1; }
      50%      { opacity:0.4; }
    }

    /* Chart area */
    .chart-area {
      padding: 1.2rem 1.4rem 0.8rem;
      border-bottom: 1px solid var(--border);
    }
    .chart-header {
      display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.8rem;
    }
    .chart-pair {
      font-size: 0.88rem; font-weight: 500; color: #fff; letter-spacing: 0.04em;
    }
    .chart-price {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.6rem; font-weight: 300; color: #fff;
    }
    .chart-change { font-size: 0.72rem; color: var(--green); margin-left: 6px; }
    .chart-timeframes {
      display: flex; gap: 0.3rem;
    }
    .tf-btn {
      font-size: 0.62rem; letter-spacing: 0.1em;
      padding: 0.18rem 0.5rem; border-radius: 4px;
      background: transparent; color: var(--muted); border: 1px solid var(--border);
      cursor: default;
    }
    .tf-btn.active { background: var(--accent-dim); color: var(--accent-bright); border-color: rgba(99,102,241,0.3); }

    /* SVG candlestick chart */
    .mock-chart {
      width: 100%; height: 140px;
    }

    /* Order panel */
    .order-panel {
      display: grid; grid-template-columns: 1fr 1fr; gap: 0;
      border-bottom: 1px solid var(--border);
    }
    .order-side {
      padding: 1rem 1.4rem;
    }
    .order-side:first-child { border-right: 1px solid var(--border); }
    .order-label {
      font-size: 0.62rem; letter-spacing: 0.18em; text-transform: uppercase;
      color: var(--muted); margin-bottom: 0.5rem;
    }
    .order-price {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.6rem; font-weight: 300;
    }
    .order-price.buy  { color: var(--green); }
    .order-price.sell { color: var(--rose); }
    .order-spread {
      font-size: 0.68rem; color: var(--muted); margin-top: 0.2rem;
    }

    /* Trade controls */
    .trade-controls {
      padding: 1rem 1.4rem;
      display: flex; align-items: center; gap: 0.8rem;
    }
    .lot-input {
      background: var(--mid); border: 1px solid var(--border);
      border-radius: 6px; padding: 0.5rem 0.8rem;
      font-size: 0.8rem; color: #fff; flex: 1;
      font-family: 'DM Sans', sans-serif;
    }
    .btn-buy {
      background: rgba(34,197,94,0.15); border: 1px solid rgba(34,197,94,0.3);
      color: var(--green); font-size: 0.72rem; font-weight: 500;
      letter-spacing: 0.12em; text-transform: uppercase;
      padding: 0.55rem 1.2rem; border-radius: 6px; cursor: default;
      transition: background 0.15s;
    }
    .btn-sell {
      background: rgba(244,63,94,0.12); border: 1px solid rgba(244,63,94,0.3);
      color: var(--rose); font-size: 0.72rem; font-weight: 500;
      letter-spacing: 0.12em; text-transform: uppercase;
      padding: 0.55rem 1.2rem; border-radius: 6px; cursor: default;
    }

    /* Positions table inside terminal */
    .positions-mini {
      padding: 0.8rem 1.4rem 1.2rem;
    }
    .positions-title {
      font-size: 0.62rem; letter-spacing: 0.18em; text-transform: uppercase;
      color: var(--muted); margin-bottom: 0.7rem;
    }
    .pos-row {
      display: flex; align-items: center; justify-content: space-between;
      padding: 0.45rem 0; border-bottom: 1px solid rgba(255,255,255,0.04);
      font-size: 0.76rem;
    }
    .pos-row:last-child { border-bottom: none; }
    .pos-symbol { color: #fff; font-weight: 500; min-width: 64px; }
    .pos-dir-buy  { color: var(--green); font-size: 0.65rem; letter-spacing: 0.1em; }
    .pos-dir-sell { color: var(--rose);  font-size: 0.65rem; letter-spacing: 0.1em; }
    .pos-pnl-pos { color: var(--green); }
    .pos-pnl-neg { color: var(--rose); }

    /* Floating mini badge */
    .float-badge {
      position: absolute;
      background: var(--dark2);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 0.8rem 1.1rem;
      font-size: 0.72rem;
      box-shadow: 0 16px 40px rgba(0,0,0,0.5);
    }
    .float-badge.left {
      top: 18%; left: -60px;
      border-color: rgba(34,197,94,0.2);
    }
    .float-badge.bottom {
      bottom: 8%; right: -50px;
      border-color: rgba(99,102,241,0.2);
    }
    .badge-label { font-size: 0.6rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--muted); }
    .badge-val { font-family: 'Cormorant Garamond', serif; font-size: 1.2rem; font-weight: 300; margin-top: 2px; }

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

    /* ── PLATFORM FEATURES ── */
    .feature-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 14px; padding: 2rem; height: 100%;
      position: relative; overflow: hidden;
      transition: border-color 0.25s, transform 0.25s;
    }
    .feature-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0;
      height: 2px;
      background: linear-gradient(90deg, var(--accent), rgba(99,102,241,0.2));
      opacity: 0; transition: opacity 0.25s;
    }
    .feature-card:hover { border-color: rgba(99,102,241,0.28); transform: translateY(-4px); }
    .feature-card:hover::before { opacity: 1; }
    .feature-icon {
      width: 46px; height: 46px; border-radius: 10px;
      background: var(--accent-dim);
      display: flex; align-items: center; justify-content: center;
      color: var(--accent-bright); font-size: 1.35rem; margin-bottom: 1.3rem;
    }
    .feature-title { font-family: 'Cormorant Garamond', serif; font-size: 1.35rem; font-weight: 400; color: #fff; margin-bottom: 0.65rem; }
    .feature-text { font-size: 0.87rem; line-height: 1.8; color: var(--muted); }

    /* ── PLATFORM TOOLS SHOWCASE ── */
    .tools-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }

    .tool-row {
      display: flex; gap: 2rem; align-items: flex-start;
      padding: 2.4rem 0; border-bottom: 1px solid var(--border);
    }
    .tool-row:last-child { border-bottom: none; }
    .tool-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.5rem; font-weight: 300;
      color: rgba(99,102,241,0.2); line-height: 1; min-width: 52px; flex-shrink: 0;
    }
    .tool-icon-wrap {
      width: 48px; height: 48px; border-radius: 12px;
      background: var(--accent-dim);
      display: flex; align-items: center; justify-content: center;
      color: var(--accent-bright); font-size: 1.4rem; flex-shrink: 0; margin-top: 2px;
    }
    .tool-title { font-size: 1.05rem; font-weight: 500; color: #fff; margin-bottom: 0.4rem; }
    .tool-text { font-size: 0.86rem; color: var(--muted); line-height: 1.75; margin: 0; }
    .tool-tags { display: flex; flex-wrap: wrap; gap: 0.4rem; margin-top: 0.8rem; }
    .tool-tag {
      font-size: 0.62rem; letter-spacing: 0.1em; text-transform: uppercase;
      padding: 0.2rem 0.6rem; border-radius: 4px;
      background: var(--accent-dim); color: var(--accent-bright);
      border: 1px solid rgba(99,102,241,0.18);
    }

    /* ── DEVICE AVAILABILITY ── */
    .device-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 14px; padding: 2rem; text-align: center;
      transition: border-color 0.25s, transform 0.22s; height: 100%;
    }
    .device-card:hover { border-color: rgba(99,102,241,0.28); transform: translateY(-4px); }
    .device-icon { font-size: 2.6rem; margin-bottom: 1.1rem; display: block; }
    .device-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.3rem; font-weight: 400; color: #fff; margin-bottom: 0.4rem;
    }
    .device-sub { font-size: 0.8rem; color: var(--muted); margin-bottom: 1.1rem; }
    .device-badge {
      display: inline-block;
      font-size: 0.62rem; letter-spacing: 0.12em; text-transform: uppercase;
      padding: 0.25rem 0.8rem; border-radius: 20px;
      background: var(--green-dim); color: var(--green);
      border: 1px solid rgba(34,197,94,0.2);
    }

    /* ── ACCOUNT TYPES ── */
    .account-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 16px; padding: 2.2rem;
      position: relative; overflow: hidden;
      transition: border-color 0.25s, transform 0.22s; height: 100%;
    }
    .account-card.featured {
      border-color: rgba(99,102,241,0.3);
      background: linear-gradient(180deg, rgba(99,102,241,0.06) 0%, var(--dark2) 50%);
    }
    .account-card:hover { transform: translateY(-4px); }
    .account-card.featured:hover { border-color: rgba(99,102,241,0.5); }
    .account-card:not(.featured):hover { border-color: rgba(255,255,255,0.15); }

    .account-badge {
      position: absolute; top: 1.4rem; right: 1.4rem;
      font-size: 0.6rem; letter-spacing: 0.15em; text-transform: uppercase;
      padding: 0.22rem 0.7rem; border-radius: 4px;
      background: var(--accent-dim); color: var(--accent-bright);
      border: 1px solid rgba(99,102,241,0.25);
    }
    .account-type {
      font-size: 0.68rem; letter-spacing: 0.22em; text-transform: uppercase;
      color: var(--muted); margin-bottom: 0.6rem;
    }
    .account-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.8rem; font-weight: 300; color: #fff; margin-bottom: 0.3rem;
    }
    .account-min {
      font-size: 0.82rem; color: var(--muted); margin-bottom: 1.6rem;
    }
    .account-min span { color: var(--accent-bright); font-weight: 500; }
    .account-features { list-style: none; padding: 0; margin: 0 0 1.8rem; }
    .account-features li {
      font-size: 0.84rem; color: var(--muted); padding: 0.5rem 0;
      border-bottom: 1px solid var(--border);
      display: flex; align-items: center; gap: 0.6rem;
    }
    .account-features li:last-child { border-bottom: none; }
    .account-features li i { color: var(--accent-bright); font-size: 0.9rem; flex-shrink: 0; }
    .account-features li.included { color: var(--text); }
    .btn-account-primary {
      display: block; width: 100%; text-align: center;
      background: var(--accent); color: #fff;
      font-size: 0.75rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.75rem; border: none; border-radius: 6px;
      text-decoration: none; transition: background 0.2s; font-weight: 500;
    }
    .btn-account-primary:hover { background: #4f46e5; color: #fff; }
    .btn-account-ghost {
      display: block; width: 100%; text-align: center;
      background: transparent; color: var(--muted);
      font-size: 0.75rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.75rem; border: 1px solid var(--border); border-radius: 6px;
      text-decoration: none; transition: all 0.2s; font-weight: 400;
    }
    .btn-account-ghost:hover { border-color: rgba(255,255,255,0.2); color: #fff; }

    /* ── FAQ ACCORDION ── */
    .faq-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .accordion-item {
      background: transparent !important;
      border: none !important;
      border-bottom: 1px solid var(--border) !important;
    }
    .accordion-item:last-child { border-bottom: none !important; }
    .accordion-button {
      background: transparent !important;
      color: var(--text) !important;
      font-size: 0.94rem;
      font-weight: 400;
      padding: 1.4rem 0 !important;
      box-shadow: none !important;
      letter-spacing: 0.01em;
    }
    .accordion-button::after {
      filter: invert(1) opacity(0.4);
    }
    .accordion-button:not(.collapsed) {
      color: #fff !important;
    }
    .accordion-body {
      padding: 0 0 1.4rem 0 !important;
      font-size: 0.88rem;
      line-height: 1.8;
      color: var(--muted);
    }

    /* ── CTA ── */
    .cta-band {
      background: linear-gradient(135deg, rgba(99,102,241,0.08) 0%, transparent 55%), var(--dark2);
      border-top: 1px solid rgba(99,102,241,0.14);
      border-bottom: 1px solid rgba(99,102,241,0.14);
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
    .fade-up-5 { animation-delay: 0.58s; }

    @media (max-width: 1199px) {
      .float-badge { display: none; }
    }
    @media (max-width: 991px) {
      .num-item { border-right: none; border-bottom: 1px solid var(--border); }
      .num-item:last-child { border-bottom: none; }
    }
  </style>
</head>
<body>

<!-- ── NAVBAR ── -->
<x-header />

<!-- ── HERO ── -->
<section class="platform-hero pt-5">
  <div class="hero-bg"></div>
  <div class="grid-overlay"></div>
  <div class="scan-line"></div>

  <!-- Floating data nodes -->
  <div class="data-node" style="left:12%;top:22%;animation-duration:3.2s;animation-delay:0s;"></div>
  <div class="data-node" style="left:85%;top:15%;animation-duration:4.1s;animation-delay:1s;"></div>
  <div class="data-node" style="left:92%;top:64%;animation-duration:2.8s;animation-delay:0.5s;"></div>
  <div class="data-node" style="left:6%;top:70%;animation-duration:3.6s;animation-delay:1.5s;"></div>
  <div class="data-node" style="left:48%;top:8%;animation-duration:4.4s;animation-delay:0.8s;"></div>

  <div class="container py-5 mt-5">
    <div class="row align-items-center g-5">

      <!-- Left -->
      <div class="col-lg-5">
        <div class="hero-eyebrow fade-up">Trading — Platform</div>
        <h1 class="hero-title fade-up fade-up-1">
          The platform<br>built for<br><em>precision.</em>
        </h1>
        <p class="hero-subtitle fade-up fade-up-2">
          A next-generation proprietary trading terminal engineered for speed, clarity, and control — available on web, desktop, and mobile. Trade 1,200+ instruments from one unified interface.
        </p>
        <div class="hero-cta-row fade-up fade-up-3">
          <a href="#" class="btn-hero-indigo">Start Trading</a>
          <a href="#" class="btn-hero-ghost">Try Demo Free</a>
        </div>
        <!-- Trust badges -->
        <div class="d-flex gap-3 flex-wrap mt-4 fade-up fade-up-4" style="margin-top:1.8rem!important;">
          <div style="font-size:0.7rem;color:var(--muted);display:flex;align-items:center;gap:6px;">
            <i class="uil uil-shield-check" style="color:var(--green)"></i> FCA Regulated
          </div>
          <div style="font-size:0.7rem;color:var(--muted);display:flex;align-items:center;gap:6px;">
            <i class="uil uil-lock-alt" style="color:var(--accent-bright)"></i> SSL Encrypted
          </div>
          <div style="font-size:0.7rem;color:var(--muted);display:flex;align-items:center;gap:6px;">
            <i class="uil uil-bolt" style="color:var(--gold,#d4a843)"></i> 0.1ms Execution
          </div>
          <div style="font-size:0.7rem;color:var(--muted);display:flex;align-items:center;gap:6px;">
            <i class="uil uil-users-alt" style="color:#fb923c"></i> 1.2M+ Traders
          </div>
        </div>
      </div>

      <!-- Right — Mock Terminal -->
      <div class="col-lg-7 fade-up fade-up-5">
        <div class="terminal-wrap">

          <!-- Floating badges -->
          <div class="float-badge left">
            <div class="badge-label">Win Rate</div>
            <div class="badge-val" style="color:var(--green);">68.4%</div>
          </div>
          <div class="float-badge bottom">
            <div class="badge-label">Execution</div>
            <div class="badge-val" style="color:var(--accent-bright);">0.1ms</div>
          </div>

          <div class="terminal">
            <!-- Title bar -->
            <div class="terminal-bar">
              <div class="terminal-dots">
                <div class="terminal-dot" style="background:#ff5f57"></div>
                <div class="terminal-dot" style="background:#febc2e"></div>
                <div class="terminal-dot" style="background:#28c840"></div>
              </div>
              <div class="terminal-title">TESLA.INVEST — Trading Terminal v4.2</div>
              <div class="terminal-status">Live</div>
            </div>

            <!-- Chart section -->
            <div class="chart-area">
              <div class="chart-header">
                <div>
                  <div class="chart-pair">EUR / USD
                    <span class="chart-change">▲ +0.23%</span>
                  </div>
                </div>
                <div class="chart-timeframes">
                  <span class="tf-btn">1m</span>
                  <span class="tf-btn">5m</span>
                  <span class="tf-btn active">1H</span>
                  <span class="tf-btn">4H</span>
                  <span class="tf-btn">1D</span>
                </div>
              </div>
              <div class="d-flex align-items-baseline gap-2 mb-2">
                <div class="chart-price">1.08742</div>
              </div>
              <!-- SVG Candlestick Chart -->
              <svg class="mock-chart" viewBox="0 0 560 140" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                  <linearGradient id="chartGrad" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0%" stop-color="rgba(99,102,241,0.15)"/>
                    <stop offset="100%" stop-color="rgba(99,102,241,0)"/>
                  </linearGradient>
                </defs>
                <!-- Area fill -->
                <path d="M0,120 L20,110 L40,115 L60,100 L80,108 L100,90 L120,95 L140,80 L160,88 L180,70 L200,78 L220,62 L240,70 L260,55 L280,62 L300,48 L320,55 L340,42 L360,50 L380,38 L400,46 L420,32 L440,40 L460,28 L480,36 L500,24 L520,30 L540,18 L560,22 L560,140 L0,140 Z"
                  fill="url(#chartGrad)"/>
                <!-- Line -->
                <path d="M0,120 L20,110 L40,115 L60,100 L80,108 L100,90 L120,95 L140,80 L160,88 L180,70 L200,78 L220,62 L240,70 L260,55 L280,62 L300,48 L320,55 L340,42 L360,50 L380,38 L400,46 L420,32 L440,40 L460,28 L480,36 L500,24 L520,30 L540,18 L560,22"
                  fill="none" stroke="rgba(99,102,241,0.8)" stroke-width="1.5"/>
                <!-- Candles -->
                <g opacity="0.55">
                  <rect x="16" y="106" width="7" height="8" rx="1" fill="#22c55e"/>
                  <rect x="36" y="112" width="7" height="6" rx="1" fill="#f43f5e"/>
                  <rect x="56" y="96"  width="7" height="8" rx="1" fill="#22c55e"/>
                  <rect x="76" y="104" width="7" height="8" rx="1" fill="#f43f5e"/>
                  <rect x="96" y="86"  width="7" height="8" rx="1" fill="#22c55e"/>
                  <rect x="116" y="91" width="7" height="8" rx="1" fill="#22c55e"/>
                  <rect x="136" y="76" width="7" height="8" rx="1" fill="#22c55e"/>
                  <rect x="156" y="84" width="7" height="7" rx="1" fill="#f43f5e"/>
                  <rect x="176" y="66" width="7" height="8" rx="1" fill="#22c55e"/>
                  <rect x="196" y="74" width="7" height="8" rx="1" fill="#f43f5e"/>
                  <rect x="216" y="58" width="7" height="8" rx="1" fill="#22c55e"/>
                  <rect x="236" y="66" width="7" height="7" rx="1" fill="#f43f5e"/>
                  <rect x="256" y="51" width="7" height="8" rx="1" fill="#22c55e"/>
                  <rect x="276" y="58" width="7" height="8" rx="1" fill="#f43f5e"/>
                  <rect x="296" y="44" width="7" height="8" rx="1" fill="#22c55e"/>
                  <rect x="316" y="51" width="7" height="7" rx="1" fill="#f43f5e"/>
                  <rect x="336" y="38" width="7" height="8" rx="1" fill="#22c55e"/>
                  <rect x="356" y="46" width="7" height="7" rx="1" fill="#22c55e"/>
                  <rect x="376" y="34" width="7" height="8" rx="1" fill="#22c55e"/>
                  <rect x="396" y="42" width="7" height="7" rx="1" fill="#f43f5e"/>
                  <rect x="416" y="28" width="7" height="8" rx="1" fill="#22c55e"/>
                  <rect x="436" y="36" width="7" height="8" rx="1" fill="#22c55e"/>
                  <rect x="456" y="24" width="7" height="7" rx="1" fill="#22c55e"/>
                  <rect x="476" y="32" width="7" height="7" rx="1" fill="#f43f5e"/>
                  <rect x="496" y="20" width="7" height="8" rx="1" fill="#22c55e"/>
                  <rect x="516" y="26" width="7" height="7" rx="1" fill="#22c55e"/>
                  <rect x="536" y="14" width="7" height="8" rx="1" fill="#22c55e"/>
                </g>
                <!-- Price line -->
                <line x1="0" y1="22" x2="560" y2="22" stroke="rgba(99,102,241,0.25)" stroke-width="0.8" stroke-dasharray="4,4"/>
                <!-- Current price label -->
                <rect x="510" y="14" width="48" height="16" rx="3" fill="rgba(99,102,241,0.7)"/>
                <text x="534" y="25" fill="white" font-size="8" text-anchor="middle" font-family="DM Sans, sans-serif">1.08742</text>
              </svg>
            </div>

            <!-- Bid / Ask -->
            <div class="order-panel">
              <div class="order-side">
                <div class="order-label">Sell / Bid</div>
                <div class="order-price sell">1.08731</div>
                <div class="order-spread">Spread: 1.1</div>
              </div>
              <div class="order-side">
                <div class="order-label">Buy / Ask</div>
                <div class="order-price buy">1.08742</div>
                <div class="order-spread">Lot: 0.10</div>
              </div>
            </div>

            <!-- Trade controls -->
            <div class="trade-controls">
              <input class="lot-input" type="text" value="Lot size: 0.10" readonly>
              <button class="btn-sell">Sell</button>
              <button class="btn-buy">Buy</button>
            </div>

            <!-- Open positions -->
            <div class="positions-mini">
              <div class="positions-title">Open Positions (3)</div>
              <div class="pos-row">
                <span class="pos-symbol">EUR/USD</span>
                <span class="pos-dir-buy">BUY · 0.10</span>
                <span style="color:var(--muted);font-size:0.74rem;">1.08510</span>
                <span class="pos-pnl-pos">+$23.20</span>
              </div>
              <div class="pos-row">
                <span class="pos-symbol">GOLD</span>
                <span class="pos-dir-buy">BUY · 0.05</span>
                <span style="color:var(--muted);font-size:0.74rem;">2628.40</span>
                <span class="pos-pnl-pos">+$67.00</span>
              </div>
              <div class="pos-row">
                <span class="pos-symbol">NVDA</span>
                <span class="pos-dir-sell">SELL · 0.20</span>
                <span style="color:var(--muted);font-size:0.74rem;">878.50</span>
                <span class="pos-pnl-neg">−$14.80</span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ── NUMBERS STRIP ── -->
<div class="numbers-strip">
  <div class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">1,200<sup>+</sup></div>
        <div class="num-desc">Instruments</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">0.1<sup>ms</sup></div>
        <div class="num-desc">Execution Speed</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">99.9<sup>%</sup></div>
        <div class="num-desc">Uptime SLA</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">4<sup>+</sup></div>
        <div class="num-desc">Platforms</div>
      </div>
    </div>
  </div>
</div>

<!-- ── PLATFORM FEATURES ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row g-4 align-items-start">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="section-tag">Core Features</div>
        <h2 class="section-title">Everything you<br>need to trade.</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:320px;">
          Our platform was engineered from the ground up for professional traders — combining institutional execution with an interface that anyone can master.
        </p>
      </div>
      <div class="col-lg-8">
        <div class="row g-3">
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-bolt"></i></div>
              <div class="feature-title">0.1ms Execution</div>
              <p class="feature-text">Orders are routed via our co-located matching engine to tier-1 liquidity providers in under a millisecond. No requotes, no slippage on normal markets.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-chart-line"></i></div>
              <div class="feature-title">Advanced Charting</div>
              <p class="feature-text">50+ technical indicators, 12 chart types, drawing tools, multi-timeframe analysis, and customisable layouts — all rendered in real time with zero lag.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-repeat"></i></div>
              <div class="feature-title">One-Click Copy Trading</div>
              <p class="feature-text">Follow expert traders and auto-copy their positions in real time. Filter by ROI, drawdown, and asset class to find the strategy that fits your risk profile.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="feature-icon"><i class="uil uil-robot"></i></div>
              <div class="feature-title">Automated Trading</div>
              <p class="feature-text">Deploy Expert Advisors and algorithmic strategies via our API. Backtest against 10 years of tick data, then run live with full risk controls in place.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── PLATFORM TOOLS ── -->
<section class="tools-section py-5">
  <div class="container py-3">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="section-tag">Built-in Tools</div>
        <h2 class="section-title">Every tool.<br>One terminal.</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:310px;">
          No third-party add-ons needed. Every analytical and execution tool is built directly into the platform and available from day one.
        </p>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="tool-row">
          <div class="tool-num">01</div>
          <div class="tool-icon-wrap"><i class="uil uil-newspaper"></i></div>
          <div>
            <div class="tool-title">Live Economic Calendar</div>
            <p class="tool-text">Real-time feed of macro events — NFP, CPI, FOMC decisions, earnings releases — with market impact ratings and consensus vs actual comparisons.</p>
            <div class="tool-tags">
              <span class="tool-tag">Real-time</span>
              <span class="tool-tag">Filter by Impact</span>
              <span class="tool-tag">Custom Alerts</span>
            </div>
          </div>
        </div>
        <div class="tool-row">
          <div class="tool-num">02</div>
          <div class="tool-icon-wrap"><i class="uil uil-analytics"></i></div>
          <div>
            <div class="tool-title">Market Sentiment Gauge</div>
            <p class="tool-text">See the live long/short ratio of all traders on the platform for any instrument. Contrarian signals, retail positioning data, and volume flow all in one view.</p>
            <div class="tool-tags">
              <span class="tool-tag">Live Positioning</span>
              <span class="tool-tag">Volume Flow</span>
              <span class="tool-tag">Contrarian Signals</span>
            </div>
          </div>
        </div>
        <div class="tool-row">
          <div class="tool-num">03</div>
          <div class="tool-icon-wrap"><i class="uil uil-bell"></i></div>
          <div>
            <div class="tool-title">Smart Price Alerts</div>
            <p class="tool-text">Set price, indicator, and pattern-based alerts that fire as push notifications, email, or SMS. Never miss an entry or exit signal again.</p>
            <div class="tool-tags">
              <span class="tool-tag">Push / Email / SMS</span>
              <span class="tool-tag">Indicator Alerts</span>
              <span class="tool-tag">Pattern Recognition</span>
            </div>
          </div>
        </div>
        <div class="tool-row">
          <div class="tool-num">04</div>
          <div class="tool-icon-wrap"><i class="uil uil-shield"></i></div>
          <div>
            <div class="tool-title">Risk Management Suite</div>
            <p class="tool-text">Set account-level daily loss limits, per-trade maximum exposure, trailing stops, guaranteed stop-losses, and negative balance protection — all enforced automatically.</p>
            <div class="tool-tags">
              <span class="tool-tag">Daily Loss Limit</span>
              <span class="tool-tag">Trailing Stop</span>
              <span class="tool-tag">Guaranteed SL</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── DEVICES ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row align-items-end g-4 mb-5">
      <div class="col-lg-6">
        <div class="section-tag">Availability</div>
        <h2 class="section-title">Trade on any<br>device, anywhere.</h2>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <p style="font-size:0.92rem;color:var(--muted);line-height:1.85;">
          Your account, positions, charts, and alerts sync seamlessly across all your devices in real time. Start a trade on desktop, manage it from your phone.
        </p>
      </div>
    </div>
    <div class="row g-3">
      <div class="col-6 col-lg-3">
        <div class="device-card">
          <span class="device-icon">🖥️</span>
          <div class="device-name">Web Terminal</div>
          <div class="device-sub">No download required. Full platform in your browser.</div>
          <span class="device-badge">Available Now</span>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="device-card">
          <span class="device-icon">💻</span>
          <div class="device-name">Desktop App</div>
          <div class="device-sub">Windows &amp; macOS. Faster, more powerful, always on.</div>
          <span class="device-badge">Available Now</span>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="device-card">
          <span class="device-icon">📱</span>
          <div class="device-name">iOS App</div>
          <div class="device-sub">Full trading suite on iPhone and iPad. Apple Watch alerts.</div>
          <span class="device-badge">Available Now</span>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="device-card">
          <span class="device-icon">🤖</span>
          <div class="device-name">Android App</div>
          <div class="device-sub">Native Android experience. Widget &amp; lock screen prices.</div>
          <span class="device-badge">Available Now</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── ACCOUNT TYPES ── -->
<section class="py-5" style="background:var(--dark2);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
  <div class="container py-3">
    <div class="text-center mb-5">
      <div class="section-tag d-inline-flex">Account Types</div>
      <h2 class="section-title mt-1">Choose your<br>account.</h2>
    </div>
    <div class="row g-4 justify-content-center">

      <!-- Standard -->
      <div class="col-md-4">
        <div class="account-card">
          <div class="account-type">Entry Level</div>
          <div class="account-name">Standard</div>
          <div class="account-min">Min deposit: <span>$100</span></div>
          <ul class="account-features">
            <li class="included"><i class="uil uil-check-circle"></i> 1,200+ instruments</li>
            <li class="included"><i class="uil uil-check-circle"></i> Spreads from 1.0 pip</li>
            <li class="included"><i class="uil uil-check-circle"></i> Leverage up to 500:1</li>
            <li class="included"><i class="uil uil-check-circle"></i> Copy trading access</li>
            <li><i class="uil uil-minus-circle" style="color:rgba(255,255,255,0.2)"></i> <span style="color:var(--muted)">Priority support</span></li>
            <li><i class="uil uil-minus-circle" style="color:rgba(255,255,255,0.2)"></i> <span style="color:var(--muted)">Dedicated account manager</span></li>
          </ul>
          <a href="#" class="btn-account-ghost">Open Standard</a>
        </div>
      </div>

      <!-- Pro (featured) -->
      <div class="col-md-4">
        <div class="account-card featured">
          <div class="account-badge">Most Popular</div>
          <div class="account-type">Professional</div>
          <div class="account-name">Pro</div>
          <div class="account-min">Min deposit: <span>$1,000</span></div>
          <ul class="account-features">
            <li class="included"><i class="uil uil-check-circle"></i> 1,200+ instruments</li>
            <li class="included"><i class="uil uil-check-circle"></i> Raw spreads from 0.0 pip</li>
            <li class="included"><i class="uil uil-check-circle"></i> Leverage up to 500:1</li>
            <li class="included"><i class="uil uil-check-circle"></i> Copy trading access</li>
            <li class="included"><i class="uil uil-check-circle"></i> Priority 24/7 support</li>
            <li><i class="uil uil-minus-circle" style="color:rgba(255,255,255,0.2)"></i> <span style="color:var(--muted)">Dedicated account manager</span></li>
          </ul>
          <a href="#" class="btn-account-primary">Open Pro Account</a>
        </div>
      </div>

      <!-- VIP -->
      <div class="col-md-4">
        <div class="account-card">
          <div class="account-type">Elite</div>
          <div class="account-name">VIP</div>
          <div class="account-min">Min deposit: <span>$25,000</span></div>
          <ul class="account-features">
            <li class="included"><i class="uil uil-check-circle"></i> 1,200+ instruments</li>
            <li class="included"><i class="uil uil-check-circle"></i> Institutional spreads</li>
            <li class="included"><i class="uil uil-check-circle"></i> Leverage up to 500:1</li>
            <li class="included"><i class="uil uil-check-circle"></i> Copy trading access</li>
            <li class="included"><i class="uil uil-check-circle"></i> Priority 24/7 support</li>
            <li class="included"><i class="uil uil-check-circle"></i> Dedicated account manager</li>
          </ul>
          <a href="#" class="btn-account-ghost">Open VIP Account</a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ── FAQ ── -->
<section class="faq-section py-5">
  <div class="container py-3">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="section-tag">FAQ</div>
        <h2 class="section-title">Common<br>questions.</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:300px;">
          Everything you need to know before getting started. Can't find your answer? Chat with our support team 24/7.
        </p>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="accordion" id="faqAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                Is the platform free to use?
              </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Yes — the platform is completely free. Web, desktop, and mobile apps are all included with any account type. There are no software licencing fees or monthly platform charges.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                Can I use automated trading / Expert Advisors?
              </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Yes. Our platform fully supports automated trading via Expert Advisors and our REST API. You can backtest strategies against 10 years of tick data before going live. Our VPS hosting service keeps your EAs running 24/5 with zero downtime.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                How fast is order execution?
              </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Our average execution speed is 0.1 milliseconds for market orders under normal conditions. Orders are routed through our co-located matching engine to tier-1 liquidity providers with no dealing desk intervention.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                Can I switch between account types?
              </button>
            </h2>
            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Yes. You can upgrade from Standard to Pro or VIP at any time by meeting the minimum deposit requirement for your target account tier. Downgrades are also available with no restrictions.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                Is there a demo account available?
              </button>
            </h2>
            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Absolutely. Our demo account is funded with $10,000 in virtual capital and gives you full access to the live platform with real market prices — no deposit required. It never expires and you can reset the balance at any time.
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
    <h2 class="section-title mt-1 mx-auto" style="max-width:560px;">The platform that<br>serious traders choose.</h2>
    <p class="mt-3 mx-auto" style="font-size:0.92rem;color:var(--muted);line-height:1.8;max-width:460px;">
      Open a live account in minutes or explore every feature risk-free with a $10,000 demo account. No deposit. No commitment.
    </p>
    <div class="d-flex gap-3 justify-content-center flex-wrap mt-4">
      <a href="#" class="btn-hero-indigo">Open Live Account</a>
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
      <p>© <span id="year"></span> TESLA INVEST. All rights reserved. CFD trading carries significant risk of loss. This is a fictional demo site for illustrative purposes only.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>document.getElementById("year").textContent = new Date().getFullYear();</script>
</body>
</html>
