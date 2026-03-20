<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PAMM — Tesla Invest</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    :root {
      --accent: #8b5cf6;
      --accent-dim: rgba(139,92,246,0.10);
      --accent-glow: rgba(139,92,246,0.06);
      --accent-bright: #a78bfa;
      --accent-light: #c4b5fd;
      --dark: #0c0c0e;
      --dark2: #141416;
      --dark3: #0f0d12;
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
    .pamm-hero {
      position: relative;
      min-height: 92vh;
      display: flex;
      align-items: center;
      overflow: hidden;
      padding-bottom: 52px;
      background: var(--dark3);
    }
    .table{
        bg:var(--dark);
    }
    .hero-bg {
      position: absolute; inset: 0; pointer-events: none;
      background:
        radial-gradient(ellipse 72% 65% at 62% 46%, rgba(139,92,246,0.09) 0%, transparent 62%),
        radial-gradient(ellipse 40% 50% at 4% 76%, rgba(139,92,246,0.05) 0%, transparent 55%),
        radial-gradient(ellipse 30% 38% at 92% 12%, rgba(167,139,250,0.05) 0%, transparent 52%),
        radial-gradient(ellipse 20% 20% at 50% 95%, rgba(139,92,246,0.04) 0%, transparent 50%);
    }
    .grid-overlay {
      position: absolute; inset: 0; pointer-events: none;
      background-image:
        linear-gradient(to right, rgba(139,92,246,0.035) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(139,92,246,0.035) 1px, transparent 1px);
      background-size: 54px 54px;
    }

    /* Orbiting node connections — conveying managed money flow */
    .orbit-ring {
      position: absolute;
      border-radius: 50%;
      border: 1px solid rgba(139,92,246,0.08);
      pointer-events: none;
      animation: orbitRotate linear infinite;
    }
    @keyframes orbitRotate {
      from { transform: rotate(0deg); }
      to   { transform: rotate(360deg); }
    }
    .orbit-dot {
      position: absolute;
      width: 7px; height: 7px;
      border-radius: 50%;
      background: var(--accent-bright);
      top: -3.5px; left: 50%;
      margin-left: -3.5px;
      box-shadow: 0 0 8px rgba(167,139,250,0.5);
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
      animation: tickerScroll 42s linear infinite;
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
    .ticker-label { color: rgba(255,255,255,0.42); }
    .ticker-val   { color: #fff; }
    .ticker-pos   { color: var(--accent-bright); }

    /* Hero text */
    .market-pill {
      display: inline-flex; align-items: center; gap: 6px;
      background: var(--accent-dim);
      border: 1px solid rgba(139,92,246,0.24);
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
      0%,100% { opacity:1; box-shadow: 0 0 0 0 rgba(167,139,250,0.5); }
      50%      { opacity:0.8; box-shadow: 0 0 0 7px rgba(167,139,250,0); }
    }
    .hero-eyebrow {
      font-size: 0.7rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--accent-bright); font-weight: 500;
      display: flex; align-items: center; gap: 12px; margin-bottom: 2rem;
    }
    .hero-eyebrow::before {
      content: ''; display: block; width: 36px; height: 1px;
      background: linear-gradient(90deg, var(--accent), rgba(139,92,246,0.3));
    }
    .hero-title {
      font-size: clamp(3rem, 6.8vw, 5.6rem);
      font-weight: 300; line-height: 1.05; color: #fff; margin-bottom: 2rem;
    }
    .hero-title em {
      font-style: italic;
      background: linear-gradient(135deg, var(--accent-bright), var(--accent-light), var(--accent-bright));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .hero-subtitle {
      font-size: clamp(0.95rem, 2vw, 1.08rem); line-height: 1.85;
      color: var(--muted); max-width: 460px; font-weight: 300;
    }
    .hero-cta-row { display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 2.8rem; }
    .btn-hero-violet {
      background: var(--accent); color: #fff;
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: none; border-radius: 4px;
      text-decoration: none; transition: background 0.2s; display: inline-block; font-weight: 500;
    }
    .btn-hero-violet:hover { background: #7c3aed; color: #fff; }
    .btn-hero-ghost {
      background: transparent; color: var(--muted);
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: 1px solid var(--border); border-radius: 4px;
      text-decoration: none; transition: all 0.2s; display: inline-block;
    }
    .btn-hero-ghost:hover { border-color: rgba(255,255,255,0.25); color: #fff; }

    /* ── PAMM MANAGERS LEADERBOARD ── */
    .managers-panel {
      background: var(--dark2);
      border: 1px solid rgba(139,92,246,0.16);
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 36px 72px rgba(0,0,0,0.55), 0 0 55px rgba(139,92,246,0.05);
    }
    .panel-header {
      padding: 1.15rem 1.6rem;
      background: rgba(139,92,246,0.06);
      border-bottom: 1px solid var(--border);
      display: flex; align-items: center; justify-content: space-between;
    }
    .panel-title { font-size: 0.68rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); }
    .panel-sort  { font-size: 0.65rem; letter-spacing: 0.14em; color: var(--accent-bright); text-transform: uppercase; }

    .manager-col-heads {
      display: grid;
      grid-template-columns: auto 1fr auto auto auto auto;
      gap: 0.6rem;
      padding: 0.5rem 1.4rem;
      border-bottom: 1px solid var(--border);
      background: rgba(255,255,255,0.012);
    }
    .mch { font-size: 0.6rem; letter-spacing: 0.16em; text-transform: uppercase; color: rgba(255,255,255,0.28); }
    .mch.right { text-align: right; }

    .manager-row {
      padding: 0.95rem 1.4rem;
      border-bottom: 1px solid var(--border);
      display: grid;
      grid-template-columns: auto 1fr auto auto auto auto;
      align-items: center;
      gap: 0.6rem;
      transition: background 0.15s; cursor: default;
    }
    .manager-row:last-child { border-bottom: none; }
    .manager-row:hover { background: rgba(139,92,246,0.04); }

    .mgr-rank {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.1rem; font-weight: 300; color: rgba(255,255,255,0.28);
      min-width: 22px;
    }
    .mgr-rank.top { color: var(--accent-bright); }

    .mgr-avatar {
      width: 34px; height: 34px; border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 0.72rem; font-weight: 600; letter-spacing: 0.04em;
      flex-shrink: 0;
    }

    .mgr-name  { font-size: 0.86rem; font-weight: 500; color: #fff; }
    .mgr-since { font-size: 0.64rem; color: var(--muted); margin-top: 1px; }

    .mgr-roi {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.25rem; font-weight: 400; text-align: right;
    }
    .roi-pos { color: var(--green); }
    .roi-neg { color: var(--rose); }

    .mgr-aum { font-size: 0.78rem; color: var(--text); text-align: right; }
    .mgr-dd  { font-size: 0.78rem; color: var(--muted); text-align: right; }
    .mgr-inv {
      font-size: 0.62rem; letter-spacing: 0.1em; text-transform: uppercase;
      padding: 0.22rem 0.6rem; border-radius: 4px;
      background: var(--accent-dim); color: var(--accent-bright);
      border: 1px solid rgba(139,92,246,0.2); cursor: default;
      white-space: nowrap;
    }

    /* Mini sparkline in manager row */
    .mgr-spark { display: flex; align-items: flex-end; gap: 1.5px; height: 22px; }
    .ms-bar { width: 3px; border-radius: 1px; }

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

    /* ── HOW IT WORKS (dual role) ── */
    .role-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 18px; padding: 2.4rem;
      position: relative; overflow: hidden; height: 100%;
      transition: border-color 0.25s, transform 0.22s;
    }
    .role-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0;
      height: 2px; opacity: 0; transition: opacity 0.25s;
    }
    .role-card.investor::before  { background: linear-gradient(90deg, var(--accent), rgba(139,92,246,0.2)); }
    .role-card.manager::before   { background: linear-gradient(90deg, var(--green), rgba(34,197,94,0.2)); }
    .role-card:hover { transform: translateY(-4px); }
    .role-card.investor:hover { border-color: rgba(139,92,246,0.28); }
    .role-card.investor:hover::before { opacity: 1; }
    .role-card.manager:hover  { border-color: rgba(34,197,94,0.24); }
    .role-card.manager:hover::before  { opacity: 1; }

    .role-badge {
      display: inline-block; font-size: 0.6rem; letter-spacing: 0.15em; text-transform: uppercase;
      padding: 0.25rem 0.75rem; border-radius: 20px; margin-bottom: 1.4rem;
    }
    .rb-investor { background: var(--accent-dim); color: var(--accent-bright); border: 1px solid rgba(139,92,246,0.2); }
    .rb-manager  { background: var(--green-dim);  color: var(--green);         border: 1px solid rgba(34,197,94,0.2); }

    .role-title { font-family: 'Cormorant Garamond', serif; font-size: 2rem; font-weight: 300; color: #fff; margin-bottom: 0.6rem; }
    .role-desc  { font-size: 0.88rem; color: var(--muted); line-height: 1.8; margin-bottom: 1.8rem; }

    .role-steps { list-style: none; padding: 0; margin: 0 0 1.8rem; }
    .role-steps li {
      display: flex; gap: 1rem; align-items: flex-start;
      padding: 0.7rem 0; border-bottom: 1px solid var(--border);
      font-size: 0.84rem; color: var(--muted); line-height: 1.65;
    }
    .role-steps li:last-child { border-bottom: none; }
    .role-steps li .step-n {
      font-family: 'Cormorant Garamond', serif; font-size: 1.3rem;
      font-weight: 300; line-height: 1; flex-shrink: 0; min-width: 22px;
    }
    .role-steps li.inc { color: var(--text); }
    .step-n.vi { color: rgba(139,92,246,0.5); }
    .step-n.gr { color: rgba(34,197,94,0.5); }

    /* ── FEATURE CARDS ── */
    .feature-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 14px; padding: 2rem; height: 100%;
      position: relative; overflow: hidden;
      transition: border-color 0.25s, transform 0.25s;
    }
    .feature-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0;
      height: 2px;
      background: linear-gradient(90deg, var(--accent), rgba(139,92,246,0.2));
      opacity: 0; transition: opacity 0.25s;
    }
    .feature-card:hover { border-color: rgba(139,92,246,0.26); transform: translateY(-4px); }
    .feature-card:hover::before { opacity: 1; }
    .f-icon {
      width: 46px; height: 46px; border-radius: 10px;
      background: var(--accent-dim);
      display: flex; align-items: center; justify-content: center;
      color: var(--accent-bright); font-size: 1.35rem; margin-bottom: 1.3rem;
    }
    .f-title { font-family: 'Cormorant Garamond', serif; font-size: 1.35rem; font-weight: 400; color: #fff; margin-bottom: 0.65rem; }
    .f-text  { font-size: 0.87rem; line-height: 1.8; color: var(--muted); }

    /* ── DETAILED MANAGER CARDS ── */
    .mgr-detail-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 16px; overflow: hidden;
      transition: border-color 0.25s, transform 0.22s;
    }
    .mgr-detail-card:hover { border-color: rgba(139,92,246,0.24); transform: translateY(-4px); }

    .mgr-card-header {
      padding: 1.6rem 1.6rem 1.2rem;
      border-bottom: 1px solid var(--border);
      display: flex; align-items: center; gap: 1.2rem;
    }
    .mgr-card-avatar {
      width: 48px; height: 48px; border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 1rem; font-weight: 700; flex-shrink: 0;
    }
    .mgr-card-name  { font-size: 1.05rem; font-weight: 500; color: #fff; }
    .mgr-card-strat { font-size: 0.72rem; color: var(--muted); margin-top: 2px; }

    .mgr-chart-area { padding: 1rem 1.6rem; border-bottom: 1px solid var(--border); }

    .mgr-stats-grid {
      display: grid; grid-template-columns: repeat(3, 1fr);
      border-bottom: 1px solid var(--border);
    }
    .mgr-stat {
      padding: 1rem 1.2rem; border-right: 1px solid var(--border); text-align: center;
    }
    .mgr-stat:last-child { border-right: none; }
    .mgr-stat-label { font-size: 0.6rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--muted); }
    .mgr-stat-val   { font-family: 'Cormorant Garamond', serif; font-size: 1.35rem; font-weight: 300; color: #fff; margin-top: 2px; }
    .mgr-stat-val.green { color: var(--green); }
    .mgr-stat-val.violet { color: var(--accent-bright); }

    .mgr-card-footer {
      padding: 1.1rem 1.6rem;
      display: flex; align-items: center; justify-content: space-between; gap: 0.8rem;
    }
    .mgr-tags { display: flex; gap: 0.35rem; flex-wrap: wrap; }
    .mgr-tag {
      font-size: 0.6rem; letter-spacing: 0.08em; text-transform: uppercase;
      padding: 0.2rem 0.5rem; border-radius: 4px;
      background: var(--mid); color: var(--muted); border: 1px solid var(--border);
    }
    .btn-invest {
      font-size: 0.68rem; letter-spacing: 0.12em; text-transform: uppercase;
      padding: 0.5rem 1.2rem; border-radius: 6px; white-space: nowrap;
      background: var(--accent-dim); color: var(--accent-bright);
      border: 1px solid rgba(139,92,246,0.22); transition: all 0.15s;
      text-decoration: none; display: inline-block;
    }
    .btn-invest:hover { background: rgba(139,92,246,0.2); color: var(--accent-light); }

    /* ── PROFIT SHARE VISUAL ── */
    .profit-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .profit-diagram {
      background: rgba(139,92,246,0.04); border: 1px solid rgba(139,92,246,0.14);
      border-radius: 14px; padding: 2rem;
    }
    .profit-row {
      display: flex; align-items: center; gap: 1.4rem;
      padding: 1rem 0; border-bottom: 1px solid var(--border);
    }
    .profit-row:last-child { border-bottom: none; }
    .profit-label { font-size: 0.78rem; font-weight: 500; color: #fff; min-width: 140px; }
    .profit-bar-wrap { flex: 1; height: 8px; background: var(--mid); border-radius: 4px; overflow: hidden; }
    .profit-bar { height: 100%; border-radius: 4px; }
    .profit-pct {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.25rem; font-weight: 300; min-width: 52px; text-align: right;
    }

    /* ── STEPS ── */
    .steps-section { border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .step-row {
      display: flex; gap: 1.6rem; align-items: flex-start;
      padding: 2rem 0; border-bottom: 1px solid var(--border);
    }
    .step-row:last-child { border-bottom: none; }
    .step-num {
      font-family: 'Cormorant Garamond', serif; font-size: 2.8rem;
      font-weight: 300; color: rgba(139,92,246,0.22); line-height: 1; min-width: 52px;
    }
    .step-icon-wrap {
      width: 44px; height: 44px; border-radius: 10px;
      background: var(--accent-dim);
      display: flex; align-items: center; justify-content: center;
      color: var(--accent-bright); font-size: 1.2rem; flex-shrink: 0; margin-top: 2px;
    }
    .step-title { font-size: 1rem; font-weight: 500; color: #fff; margin-bottom: 0.35rem; }
    .step-text  { font-size: 0.86rem; color: var(--muted); line-height: 1.75; margin: 0; }

    /* ── CTA ── */
    .cta-band {
      background: linear-gradient(135deg, rgba(139,92,246,0.08) 0%, transparent 55%), var(--dark2);
      border-top: 1px solid rgba(139,92,246,0.14);
      border-bottom: 1px solid rgba(139,92,246,0.14);
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

    @media (max-width: 1199px) {
      .manager-col-heads, .manager-row { grid-template-columns: auto 1fr auto auto auto; }
      .manager-row .mgr-dd { display: none; }
      .manager-col-heads .mch:nth-child(5) { display: none; }
    }
    @media (max-width: 991px) {
      .num-item { border-right: none; border-bottom: 1px solid var(--border); }
      .num-item:last-child { border-bottom: none; }
      .mgr-spark { display: none; }
    }
  </style>
</head>
<body>

<!-- ── NAVBAR ── -->
<x-header />

<!-- ── HERO ── -->
<section class="pamm-hero pt-5">
  <div class="hero-bg"></div>
  <div class="grid-overlay"></div>

  <!-- Orbiting rings -->
  <div class="orbit-ring" style="width:320px;height:320px;right:-80px;top:8%;animation-duration:32s;">
    <div class="orbit-dot"></div>
  </div>
  <div class="orbit-ring" style="width:180px;height:180px;right:60px;top:20%;animation-duration:18s;animation-direction:reverse;">
    <div class="orbit-dot" style="background:#c4b5fd;box-shadow:0 0 8px rgba(196,181,253,0.5);"></div>
  </div>

  <div class="container py-5 mt-4" style="padding-bottom:5rem !important;">
    <div class="row align-items-center g-5">

      <!-- Left -->
      <div class="col-lg-5">
        <div class="market-pill fade-up">
          <span class="live-dot"></span> Percentage Allocation Management Module
        </div>
        <div class="hero-eyebrow fade-up">Trading — PAMM</div>
        <h1 class="hero-title fade-up fade-up-1">
          Your money.<br>Expert hands.<br><em>Shared returns.</em>
        </h1>
        <p class="hero-subtitle fade-up fade-up-2">
          Invest in verified professional traders through our PAMM system — or register as a money manager and grow your AUM. Profits are distributed proportionally, losses are capped to your allocation.
        </p>
        <div class="hero-cta-row fade-up fade-up-3">
          <a href="#" class="btn-hero-violet">Invest in a Manager</a>
          <a href="#" class="btn-hero-ghost">Become a Manager</a>
        </div>
        <div class="d-flex gap-4 flex-wrap mt-4 fade-up fade-up-4">
          <div style="font-size:0.7rem;color:var(--muted);display:flex;align-items:center;gap:6px;">
            <i class="uil uil-shield-check" style="color:var(--green)"></i> Segregated funds
          </div>
          <div style="font-size:0.7rem;color:var(--muted);display:flex;align-items:center;gap:6px;">
            <i class="uil uil-chart-growth" style="color:var(--accent-bright)"></i> Verified performance
          </div>
          <div style="font-size:0.7rem;color:var(--muted);display:flex;align-items:center;gap:6px;">
            <i class="uil uil-lock-alt" style="color:var(--amber)"></i> Withdraw anytime
          </div>
        </div>
      </div>

      <!-- Right — Manager Leaderboard -->
      <div class="col-lg-7 fade-up fade-up-4">
        <div class="managers-panel">
          <div class="panel-header">
            <div class="panel-title">Top PAMM Managers</div>
            <div class="panel-sort"><i class="uil uil-sort-amount-down" style="margin-right:4px;"></i>Sorted by YTD ROI</div>
          </div>
          <div class="manager-col-heads">
            <div class="mch">#</div>
            <div class="mch">Manager</div>
            <div class="mch right">YTD ROI</div>
            <div class="mch right">AUM</div>
            <div class="mch right">Max DD</div>
            <div class="mch right"></div>
          </div>

          <!-- Manager 1 -->
          <div class="manager-row">
            <div class="mgr-rank top">1</div>
            <div style="display:flex;align-items:center;gap:0.75rem;">
              <div class="mgr-avatar" style="background:linear-gradient(135deg,#a78bfa,#7c3aed);color:#fff;">AK</div>
              <div>
                <div class="mgr-name">Alpha King</div>
                <div class="mgr-since">Since Jan 2022 · FX Majors</div>
              </div>
            </div>
            <div class="mgr-spark">
              <div class="ms-bar" style="height:30%;background:var(--green);"></div>
              <div class="ms-bar" style="height:48%;background:var(--green);"></div>
              <div class="ms-bar" style="height:62%;background:var(--green);"></div>
              <div class="ms-bar" style="height:55%;background:var(--rose);"></div>
              <div class="ms-bar" style="height:74%;background:var(--green);"></div>
              <div class="ms-bar" style="height:88%;background:var(--green);"></div>
              <div class="ms-bar" style="height:100%;background:var(--green);"></div>
            </div>
            <div class="mgr-roi roi-pos">+184.2%</div>
            <div>
              <div class="mgr-aum">$4.8M</div>
              <div class="mgr-dd">DD: 12.4%</div>
            </div>
            <div><span class="mgr-inv">Invest</span></div>
          </div>

          <!-- Manager 2 -->
          <div class="manager-row">
            <div class="mgr-rank top">2</div>
            <div style="display:flex;align-items:center;gap:0.75rem;">
              <div class="mgr-avatar" style="background:linear-gradient(135deg,#34d399,#059669);color:#fff;">TF</div>
              <div>
                <div class="mgr-name">TrendForge</div>
                <div class="mgr-since">Since Mar 2021 · Multi-asset</div>
              </div>
            </div>
            <div class="mgr-spark">
              <div class="ms-bar" style="height:40%;background:var(--green);"></div>
              <div class="ms-bar" style="height:52%;background:var(--green);"></div>
              <div class="ms-bar" style="height:44%;background:var(--rose);"></div>
              <div class="ms-bar" style="height:60%;background:var(--green);"></div>
              <div class="ms-bar" style="height:72%;background:var(--green);"></div>
              <div class="ms-bar" style="height:80%;background:var(--green);"></div>
              <div class="ms-bar" style="height:92%;background:var(--green);"></div>
            </div>
            <div class="mgr-roi roi-pos">+141.8%</div>
            <div>
              <div class="mgr-aum">$8.2M</div>
              <div class="mgr-dd">DD: 9.1%</div>
            </div>
            <div><span class="mgr-inv">Invest</span></div>
          </div>

          <!-- Manager 3 -->
          <div class="manager-row">
            <div class="mgr-rank top">3</div>
            <div style="display:flex;align-items:center;gap:0.75rem;">
              <div class="mgr-avatar" style="background:linear-gradient(135deg,#fbbf24,#d97706);color:#fff;">QT</div>
              <div>
                <div class="mgr-name">QuantTrade Pro</div>
                <div class="mgr-since">Since Jul 2020 · Algorithmic</div>
              </div>
            </div>
            <div class="mgr-spark">
              <div class="ms-bar" style="height:55%;background:var(--green);"></div>
              <div class="ms-bar" style="height:62%;background:var(--green);"></div>
              <div class="ms-bar" style="height:58%;background:var(--rose);"></div>
              <div class="ms-bar" style="height:70%;background:var(--green);"></div>
              <div class="ms-bar" style="height:66%;background:var(--rose);"></div>
              <div class="ms-bar" style="height:78%;background:var(--green);"></div>
              <div class="ms-bar" style="height:88%;background:var(--green);"></div>
            </div>
            <div class="mgr-roi roi-pos">+98.4%</div>
            <div>
              <div class="mgr-aum">$12.1M</div>
              <div class="mgr-dd">DD: 7.6%</div>
            </div>
            <div><span class="mgr-inv">Invest</span></div>
          </div>

          <!-- Manager 4 -->
          <div class="manager-row">
            <div class="mgr-rank">4</div>
            <div style="display:flex;align-items:center;gap:0.75rem;">
              <div class="mgr-avatar" style="background:linear-gradient(135deg,#f472b6,#db2777);color:#fff;">SH</div>
              <div>
                <div class="mgr-name">SilkRoute FX</div>
                <div class="mgr-since">Since Nov 2022 · Carry Trade</div>
              </div>
            </div>
            <div class="mgr-spark">
              <div class="ms-bar" style="height:42%;background:var(--green);"></div>
              <div class="ms-bar" style="height:50%;background:var(--green);"></div>
              <div class="ms-bar" style="height:60%;background:var(--green);"></div>
              <div class="ms-bar" style="height:52%;background:var(--rose);"></div>
              <div class="ms-bar" style="height:64%;background:var(--green);"></div>
              <div class="ms-bar" style="height:72%;background:var(--green);"></div>
              <div class="ms-bar" style="height:80%;background:var(--green);"></div>
            </div>
            <div class="mgr-roi roi-pos">+76.3%</div>
            <div>
              <div class="mgr-aum">$3.4M</div>
              <div class="mgr-dd">DD: 14.2%</div>
            </div>
            <div><span class="mgr-inv">Invest</span></div>
          </div>

          <!-- Manager 5 -->
          <div class="manager-row">
            <div class="mgr-rank">5</div>
            <div style="display:flex;align-items:center;gap:0.75rem;">
              <div class="mgr-avatar" style="background:linear-gradient(135deg,#67e8f9,#0891b2);color:#fff;">NW</div>
              <div>
                <div class="mgr-name">NordWave Capital</div>
                <div class="mgr-since">Since Feb 2023 · Indices &amp; FX</div>
              </div>
            </div>
            <div class="mgr-spark">
              <div class="ms-bar" style="height:35%;background:var(--green);"></div>
              <div class="ms-bar" style="height:44%;background:var(--rose);"></div>
              <div class="ms-bar" style="height:52%;background:var(--green);"></div>
              <div class="ms-bar" style="height:60%;background:var(--green);"></div>
              <div class="ms-bar" style="height:56%;background:var(--rose);"></div>
              <div class="ms-bar" style="height:68%;background:var(--green);"></div>
              <div class="ms-bar" style="height:76%;background:var(--green);"></div>
            </div>
            <div class="mgr-roi roi-pos">+54.1%</div>
            <div>
              <div class="mgr-aum">$1.9M</div>
              <div class="mgr-dd">DD: 18.5%</div>
            </div>
            <div><span class="mgr-inv">Invest</span></div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Ticker -->
  <div class="ticker-bg">
    <div class="ticker-track">
      <span class="ticker-item"><span class="ticker-label">Alpha King</span><span class="ticker-val">+184.2% YTD</span><span class="ticker-pos">▲ AUM $4.8M</span></span>
      <span class="ticker-item"><span class="ticker-label">TrendForge</span><span class="ticker-val">+141.8% YTD</span><span class="ticker-pos">▲ AUM $8.2M</span></span>
      <span class="ticker-item"><span class="ticker-label">QuantTrade Pro</span><span class="ticker-val">+98.4% YTD</span><span class="ticker-pos">▲ AUM $12.1M</span></span>
      <span class="ticker-item"><span class="ticker-label">SilkRoute FX</span><span class="ticker-val">+76.3% YTD</span><span class="ticker-pos">▲ AUM $3.4M</span></span>
      <span class="ticker-item"><span class="ticker-label">NordWave Capital</span><span class="ticker-val">+54.1% YTD</span><span class="ticker-pos">▲ AUM $1.9M</span></span>
      <span class="ticker-item"><span class="ticker-label">Total PAMM AUM</span><span class="ticker-val">$38.6M</span><span class="ticker-pos">▲ 142 Active Managers</span></span>
      <!-- dupe -->
      <span class="ticker-item"><span class="ticker-label">Alpha King</span><span class="ticker-val">+184.2% YTD</span><span class="ticker-pos">▲ AUM $4.8M</span></span>
      <span class="ticker-item"><span class="ticker-label">TrendForge</span><span class="ticker-val">+141.8% YTD</span><span class="ticker-pos">▲ AUM $8.2M</span></span>
      <span class="ticker-item"><span class="ticker-label">QuantTrade Pro</span><span class="ticker-val">+98.4% YTD</span><span class="ticker-pos">▲ AUM $12.1M</span></span>
      <span class="ticker-item"><span class="ticker-label">SilkRoute FX</span><span class="ticker-val">+76.3% YTD</span><span class="ticker-pos">▲ AUM $3.4M</span></span>
      <span class="ticker-item"><span class="ticker-label">NordWave Capital</span><span class="ticker-val">+54.1% YTD</span><span class="ticker-pos">▲ AUM $1.9M</span></span>
      <span class="ticker-item"><span class="ticker-label">Total PAMM AUM</span><span class="ticker-val">$38.6M</span><span class="ticker-pos">▲ 142 Active Managers</span></span>
    </div>
  </div>
</section>

<!-- ── NUMBERS STRIP ── -->
<div class="numbers-strip">
  <div class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">142<sup>+</sup></div>
        <div class="num-desc">Active Managers</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">$38<sup>M</sup></div>
        <div class="num-desc">Total AUM</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">$100</div>
        <div class="num-desc">Min Investment</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">0<sup>%</sup></div>
        <div class="num-desc">Platform Fee</div>
      </div>
    </div>
  </div>
</div>

<!-- ── DUAL ROLE: INVESTOR vs MANAGER ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="text-center mb-5">
      <div class="section-tag d-inline-flex">Two Roles</div>
      <h2 class="section-title mt-1">Choose your side<br>of the table.</h2>
      <p class="mx-auto mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:480px;">
        Whether you want to passively grow your capital or actively manage funds and earn performance fees — the PAMM system is built for both.
      </p>
    </div>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="role-card investor">
          <div class="role-badge rb-investor">Investor</div>
          <div class="role-title">Grow your capital<br>on autopilot.</div>
          <p class="role-desc">Allocate funds to one or more verified managers. Your balance grows when they profit — proportionally, automatically, with full withdrawal rights at any time.</p>
          <ul class="role-steps">
            <li class="inc"><span class="step-n vi">01</span><span>Browse the public manager rankings and filter by ROI, drawdown, strategy, and tenure.</span></li>
            <li class="inc"><span class="step-n vi">02</span><span>Select a manager and allocate any amount from $100. Your funds remain in your account — only trading rights are delegated.</span></li>
            <li class="inc"><span class="step-n vi">03</span><span>Profits are credited proportionally to your balance in real time. Withdraw your funds or profits at any time with no lock-up period.</span></li>
          </ul>
          <a href="#" class="btn-hero-violet d-inline-block" style="font-size:0.75rem;padding:0.7rem 1.8rem;">Browse Managers</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="role-card manager">
          <div class="role-badge rb-manager">Money Manager</div>
          <div class="role-title">Trade others' capital.<br>Earn performance fees.</div>
          <p class="role-desc">Register as a PAMM manager, set your performance fee, and attract investors to your strategy. Trade as normal — fee earnings scale automatically with your AUM.</p>
          <ul class="role-steps">
            <li class="inc"><span class="step-n gr">01</span><span>Apply for manager status. Provide trading history or start a verified live track record from a minimum $500 seed account.</span></li>
            <li class="inc"><span class="step-n gr">02</span><span>Set your performance fee (0–50%), minimum investment, and risk parameters. Your profile is listed publicly in the manager rankings.</span></li>
            <li class="inc"><span class="step-n gr">03</span><span>Trade normally. Performance fees are charged automatically on each profitable period and credited to your account without manual invoicing.</span></li>
          </ul>
          <a href="#" class="btn-hero-ghost d-inline-block" style="font-size:0.75rem;padding:0.7rem 1.8rem;">Apply as Manager</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── FEATURES ── -->
<section class="py-5" style="background:var(--dark2);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
  <div class="container py-3">
    <div class="row g-4 align-items-start">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="section-tag">Platform Features</div>
        <h2 class="section-title">Built for trust.<br>Designed for scale.</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:320px;">
          Our PAMM infrastructure is built on the same institutional execution engine used by the rest of the platform — with added safeguards for both investors and managers.
        </p>
      </div>
      <div class="col-lg-8">
        <div class="row g-3">
          <div class="col-md-6">
            <div class="feature-card">
              <div class="f-icon"><i class="uil uil-percentage"></i></div>
              <div class="f-title">Proportional Allocation</div>
              <p class="f-text">Every trade is allocated across investor accounts by exact equity percentage. No preferential treatment — managers cannot trade their own funds ahead of investor allocations.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="f-icon"><i class="uil uil-shield-check"></i></div>
              <div class="f-title">Capital Protection</div>
              <p class="f-text">Your funds remain in your own trading account at all times. Only the trading rights are delegated — managers cannot withdraw, transfer, or access your underlying capital.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="f-icon"><i class="uil uil-eye"></i></div>
              <div class="f-title">Full Transparency</div>
              <p class="f-text">Every trade placed by a manager is visible in your account history in real time. View open positions, closed trades, and the manager's complete performance record before investing.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="feature-card">
              <div class="f-icon"><i class="uil uil-exit"></i></div>
              <div class="f-title">No Lock-Up Period</div>
              <p class="f-text">Withdraw your investment from any PAMM manager at any time, subject only to any open positions being closed. No minimum holding period, no exit fees, no penalties.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── FEATURED MANAGERS (detailed cards) ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row align-items-end g-4 mb-5">
      <div class="col-lg-6">
        <div class="section-tag">Featured Managers</div>
        <h2 class="section-title">Verified track records.<br>Real results.</h2>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <p style="font-size:0.88rem;color:var(--muted);line-height:1.8;">
          All performance data is verified from live trading accounts. Past performance does not guarantee future returns. Filter 140+ managers by strategy, risk level, and minimum investment.
        </p>
      </div>
    </div>
    <div class="row g-4">

      <!-- Alpha King -->
      <div class="col-md-6 col-lg-4">
        <div class="mgr-detail-card">
          <div class="mgr-card-header">
            <div class="mgr-card-avatar" style="background:linear-gradient(135deg,#a78bfa,#7c3aed);color:#fff;font-size:1rem;font-weight:700;">AK</div>
            <div>
              <div class="mgr-card-name">Alpha King</div>
              <div class="mgr-card-strat">FX Majors · Swing Trading</div>
            </div>
          </div>
          <div class="mgr-chart-area">
            <svg width="100%" height="52" viewBox="0 0 300 52" preserveAspectRatio="none">
              <defs>
                <linearGradient id="g1" x1="0" y1="0" x2="0" y2="1">
                  <stop offset="0%" stop-color="rgba(167,139,250,0.25)"/>
                  <stop offset="100%" stop-color="rgba(167,139,250,0)"/>
                </linearGradient>
              </defs>
              <path d="M0,48 L30,42 L60,38 L90,44 L120,30 L150,24 L180,28 L210,16 L240,10 L270,6 L300,2 L300,52 L0,52Z" fill="url(#g1)"/>
              <path d="M0,48 L30,42 L60,38 L90,44 L120,30 L150,24 L180,28 L210,16 L240,10 L270,6 L300,2" fill="none" stroke="rgba(167,139,250,0.8)" stroke-width="1.5"/>
            </svg>
          </div>
          <div class="mgr-stats-grid">
            <div class="mgr-stat">
              <div class="mgr-stat-label">YTD ROI</div>
              <div class="mgr-stat-val green">+184.2%</div>
            </div>
            <div class="mgr-stat">
              <div class="mgr-stat-label">Max DD</div>
              <div class="mgr-stat-val">12.4%</div>
            </div>
            <div class="mgr-stat">
              <div class="mgr-stat-label">Perf. Fee</div>
              <div class="mgr-stat-val violet">30%</div>
            </div>
          </div>
          <div class="mgr-card-footer">
            <div class="mgr-tags">
              <span class="mgr-tag">FX</span>
              <span class="mgr-tag">Swing</span>
              <span class="mgr-tag">Min $500</span>
            </div>
            <a href="#" class="btn-invest">Invest Now</a>
          </div>
        </div>
      </div>

      <!-- TrendForge -->
      <div class="col-md-6 col-lg-4">
        <div class="mgr-detail-card">
          <div class="mgr-card-header">
            <div class="mgr-card-avatar" style="background:linear-gradient(135deg,#34d399,#059669);color:#fff;font-size:1rem;font-weight:700;">TF</div>
            <div>
              <div class="mgr-card-name">TrendForge</div>
              <div class="mgr-card-strat">Multi-asset · Trend Following</div>
            </div>
          </div>
          <div class="mgr-chart-area">
            <svg width="100%" height="52" viewBox="0 0 300 52" preserveAspectRatio="none">
              <defs>
                <linearGradient id="g2" x1="0" y1="0" x2="0" y2="1">
                  <stop offset="0%" stop-color="rgba(52,211,153,0.22)"/>
                  <stop offset="100%" stop-color="rgba(52,211,153,0)"/>
                </linearGradient>
              </defs>
              <path d="M0,46 L30,40 L60,44 L90,36 L120,32 L150,36 L180,22 L210,18 L240,14 L270,8 L300,4 L300,52 L0,52Z" fill="url(#g2)"/>
              <path d="M0,46 L30,40 L60,44 L90,36 L120,32 L150,36 L180,22 L210,18 L240,14 L270,8 L300,4" fill="none" stroke="rgba(52,211,153,0.8)" stroke-width="1.5"/>
            </svg>
          </div>
          <div class="mgr-stats-grid">
            <div class="mgr-stat">
              <div class="mgr-stat-label">YTD ROI</div>
              <div class="mgr-stat-val green">+141.8%</div>
            </div>
            <div class="mgr-stat">
              <div class="mgr-stat-label">Max DD</div>
              <div class="mgr-stat-val">9.1%</div>
            </div>
            <div class="mgr-stat">
              <div class="mgr-stat-label">Perf. Fee</div>
              <div class="mgr-stat-val violet">25%</div>
            </div>
          </div>
          <div class="mgr-card-footer">
            <div class="mgr-tags">
              <span class="mgr-tag">Multi</span>
              <span class="mgr-tag">Trend</span>
              <span class="mgr-tag">Min $250</span>
            </div>
            <a href="#" class="btn-invest">Invest Now</a>
          </div>
        </div>
      </div>

      <!-- QuantTrade Pro -->
      <div class="col-md-6 col-lg-4">
        <div class="mgr-detail-card">
          <div class="mgr-card-header">
            <div class="mgr-card-avatar" style="background:linear-gradient(135deg,#fbbf24,#d97706);color:#fff;font-size:1rem;font-weight:700;">QT</div>
            <div>
              <div class="mgr-card-name">QuantTrade Pro</div>
              <div class="mgr-card-strat">Algorithmic · Low Drawdown</div>
            </div>
          </div>
          <div class="mgr-chart-area">
            <svg width="100%" height="52" viewBox="0 0 300 52" preserveAspectRatio="none">
              <defs>
                <linearGradient id="g3" x1="0" y1="0" x2="0" y2="1">
                  <stop offset="0%" stop-color="rgba(251,191,36,0.22)"/>
                  <stop offset="100%" stop-color="rgba(251,191,36,0)"/>
                </linearGradient>
              </defs>
              <path d="M0,44 L30,40 L60,36 L90,38 L120,32 L150,28 L180,30 L210,22 L240,16 L270,10 L300,6 L300,52 L0,52Z" fill="url(#g3)"/>
              <path d="M0,44 L30,40 L60,36 L90,38 L120,32 L150,28 L180,30 L210,22 L240,16 L270,10 L300,6" fill="none" stroke="rgba(251,191,36,0.8)" stroke-width="1.5"/>
            </svg>
          </div>
          <div class="mgr-stats-grid">
            <div class="mgr-stat">
              <div class="mgr-stat-label">YTD ROI</div>
              <div class="mgr-stat-val green">+98.4%</div>
            </div>
            <div class="mgr-stat">
              <div class="mgr-stat-label">Max DD</div>
              <div class="mgr-stat-val">7.6%</div>
            </div>
            <div class="mgr-stat">
              <div class="mgr-stat-label">Perf. Fee</div>
              <div class="mgr-stat-val violet">20%</div>
            </div>
          </div>
          <div class="mgr-card-footer">
            <div class="mgr-tags">
              <span class="mgr-tag">Algo</span>
              <span class="mgr-tag">Low DD</span>
              <span class="mgr-tag">Min $1,000</span>
            </div>
            <a href="#" class="btn-invest">Invest Now</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ── PROFIT SHARE DIAGRAM ── -->
<section class="profit-section py-5">
  <div class="container py-3">
    <div class="row g-5 align-items-center">
      <div class="col-lg-4">
        <div class="section-tag">Fee Structure</div>
        <h2 class="section-title">How profits<br>are split.</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:310px;">
          The performance fee is agreed upfront and only charged on net new profits — never on losses. If a manager loses money, they must recover the loss before earning any fees again (high-water mark principle).
        </p>
        <div class="mt-4 p-3" style="background:rgba(139,92,246,0.05);border:1px solid rgba(139,92,246,0.14);border-radius:10px;">
          <div style="font-size:0.72rem;color:var(--muted);line-height:1.7;">
            <i class="uil uil-info-circle" style="color:var(--accent-bright);margin-right:5px;"></i>
            <strong style="color:var(--text);">High-Water Mark:</strong> Fees only apply when the account exceeds its previous peak. Managers must earn back losses before charging new performance fees.
          </div>
        </div>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="profit-diagram">
          <div style="font-size:0.7rem;letter-spacing:0.2em;text-transform:uppercase;color:var(--muted);margin-bottom:1.4rem;">Example: $10,000 profit · 30% performance fee manager</div>

          <div class="profit-row">
            <div class="profit-label">Total Profit Generated</div>
            <div class="profit-bar-wrap">
              <div class="profit-bar" style="width:100%;background:linear-gradient(90deg,var(--accent),rgba(139,92,246,0.4));"></div>
            </div>
            <div class="profit-pct" style="color:#fff;">$10,000</div>
          </div>
          <div class="profit-row">
            <div class="profit-label">Investor Receives (70%)</div>
            <div class="profit-bar-wrap">
              <div class="profit-bar" style="width:70%;background:linear-gradient(90deg,var(--green),rgba(34,197,94,0.4));"></div>
            </div>
            <div class="profit-pct" style="color:var(--green);">$7,000</div>
          </div>
          <div class="profit-row">
            <div class="profit-label">Manager Fee (30%)</div>
            <div class="profit-bar-wrap">
              <div class="profit-bar" style="width:30%;background:linear-gradient(90deg,var(--accent-bright),rgba(167,139,250,0.3));"></div>
            </div>
            <div class="profit-pct" style="color:var(--accent-bright);">$3,000</div>
          </div>
          <div class="profit-row">
            <div class="profit-label">Platform Fee</div>
            <div class="profit-bar-wrap">
              <div class="profit-bar" style="width:0%;background:var(--mid);"></div>
            </div>
            <div class="profit-pct" style="color:var(--green);font-size:1rem;">$0</div>
          </div>
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
        <h2 class="section-title">Invest in your first<br>PAMM in four steps.</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;">
          From account creation to your first PAMM allocation in under 10 minutes.
        </p>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="step-row">
          <div class="step-num">01</div>
          <div class="step-icon-wrap"><i class="uil uil-user-plus"></i></div>
          <div>
            <div class="step-title">Open &amp; Verify Your Account</div>
            <p class="step-text">Register and complete identity verification in under 5 minutes. Your account is approved instantly and funded balances are available to invest immediately.</p>
          </div>
        </div>
        <div class="step-row">
          <div class="step-num">02</div>
          <div class="step-icon-wrap"><i class="uil uil-search"></i></div>
          <div>
            <div class="step-title">Browse &amp; Filter Managers</div>
            <p class="step-text">Explore 140+ verified managers sorted by ROI, drawdown, strategy type, tenure, and minimum investment. All performance data is live and audited from real trading accounts.</p>
          </div>
        </div>
        <div class="step-row">
          <div class="step-num">03</div>
          <div class="step-icon-wrap"><i class="uil uil-wallet"></i></div>
          <div>
            <div class="step-title">Allocate Your Funds</div>
            <p class="step-text">Select a manager, enter your allocation amount (min $100), and confirm. Your funds remain in your account — only trading rights are granted to the manager.</p>
          </div>
        </div>
        <div class="step-row">
          <div class="step-num">04</div>
          <div class="step-icon-wrap"><i class="uil uil-chart-growth"></i></div>
          <div>
            <div class="step-title">Track &amp; Withdraw</div>
            <p class="step-text">Monitor your allocation's performance in real time from your dashboard. Withdraw profits or your full balance at any time with no penalties or lock-up period.</p>
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
    <h2 class="section-title mt-1 mx-auto" style="max-width:540px;">Let the experts trade.<br>You collect the returns.</h2>
    <p class="mt-3 mx-auto" style="font-size:0.92rem;color:var(--muted);line-height:1.8;max-width:460px;">
      Open an account and allocate to your first PAMM manager today — or register as a manager and start building your AUM.
    </p>
    <div class="d-flex gap-3 justify-content-center flex-wrap mt-4">
      <a href="#" class="btn-hero-violet">Invest in a Manager</a>
      <a href="#" class="btn-hero-ghost">Become a Manager</a>
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
      <p>© <span id="year"></span> TESLA INVEST. All rights reserved. Past performance of PAMM managers does not guarantee future returns. Capital is at risk. This is a fictional demo site.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>document.getElementById("year").textContent = new Date().getFullYear();</script>
</body>
</html>
