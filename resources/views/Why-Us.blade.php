<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Why Us — Tesla Invest</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    :root {
      --accent: #e31937;
      --accent-dim: rgba(227,25,55,0.10);
      --accent-glow: rgba(227,25,55,0.06);
      --accent-bright: #ff4d67;
      --dark: #0c0c0e;
      --dark2: #141416;
      --dark3: #0f0d0d;
      --mid: #1e1e22;
      --border: rgba(255,255,255,0.08);
      --muted: rgba(255,255,255,0.45);
      --text: rgba(255,255,255,0.88);
      --green: #22c55e;
      --green-dim: rgba(34,197,94,0.10);
      --rose: #f43f5e;
      --rose-dim: rgba(244,63,94,0.10);
      --gold: #d4a843;
      --gold-dim: rgba(212,168,67,0.10);
      --violet: #8b5cf6;
      --violet-dim: rgba(139,92,246,0.10);
      --sky: #0ea5e9;
      --sky-dim: rgba(14,165,233,0.10);
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
    .whyus-hero {
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
        radial-gradient(ellipse 60% 55% at 52% 48%, rgba(227,25,55,0.07) 0%, transparent 60%),
        radial-gradient(ellipse 40% 45% at 4% 72%, rgba(227,25,55,0.04) 0%, transparent 55%),
        radial-gradient(ellipse 28% 32% at 92% 14%, rgba(255,77,103,0.04) 0%, transparent 52%);
    }
    .grid-overlay {
      position: absolute; inset: 0; pointer-events: none;
      background-image:
        linear-gradient(to right, rgba(255,255,255,0.018) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.018) 1px, transparent 1px);
      background-size: 60px 60px;
    }

    /* Diagonal cross-hatch texture */
    .hatch-overlay {
      position: absolute; inset: 0; pointer-events: none; opacity: 0.018;
      background-image: repeating-linear-gradient(
        45deg,
        rgba(255,255,255,1) 0px,
        rgba(255,255,255,1) 1px,
        transparent 1px,
        transparent 28px
      );
    }

    /* Floating stat pills that drift upward */
    .stat-float {
      position: absolute;
      background: var(--dark2);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 30px;
      padding: 0.4rem 1rem;
      font-size: 0.72rem; letter-spacing: 0.08em;
      color: rgba(255,255,255,0.5);
      pointer-events: none;
      white-space: nowrap;
      animation: floatPill ease-in-out infinite;
    }
    @keyframes floatPill {
      0%,100% { transform: translateY(0); opacity: 0.5; }
      50%      { transform: translateY(-12px); opacity: 0.8; }
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
    .ticker-label { color: rgba(255,255,255,0.42); }
    .ticker-val   { color: #fff; }
    .ticker-red   { color: var(--accent-bright); }

    /* Hero text */
    .hero-eyebrow {
      font-size: 0.7rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--accent-bright); font-weight: 500;
      display: flex; align-items: center; gap: 12px; margin-bottom: 2rem;
    }
    .hero-eyebrow::before {
      content: ''; display: block; width: 36px; height: 1px;
      background: linear-gradient(90deg, var(--red), rgba(227,25,55,0.3));
    }
    .hero-title {
      font-size: clamp(3.2rem, 7vw, 6.2rem);
      font-weight: 300; line-height: 1.02; color: #fff; margin-bottom: 2rem;
    }
    .hero-title em {
      font-style: italic;
      background: linear-gradient(135deg, var(--accent-bright), #ff8096, var(--accent-bright));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .hero-subtitle {
      font-size: clamp(0.95rem, 2vw, 1.1rem); line-height: 1.85;
      color: var(--muted); max-width: 520px; font-weight: 300;
    }
    .hero-cta-row { display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 2.8rem; }
    .btn-hero-red {
      background: var(--red); color: #fff;
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: none; border-radius: 4px;
      text-decoration: none; transition: background 0.2s; display: inline-block; font-weight: 500;
    }
    .btn-hero-red:hover { background: #c0152e; color: #fff; }
    .btn-hero-ghost {
      background: transparent; color: var(--muted);
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: 1px solid var(--border); border-radius: 4px;
      text-decoration: none; transition: all 0.2s; display: inline-block;
    }
    .btn-hero-ghost:hover { border-color: rgba(255,255,255,0.25); color: #fff; }

    /* ── HERO STATS GRID ── */
    .hero-stats {
      display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.8rem;
    }
    .hstat {
      background: rgba(255,255,255,0.03);
      border: 1px solid var(--border);
      border-radius: 14px; padding: 1.4rem 1.6rem;
      position: relative; overflow: hidden;
      transition: border-color 0.2s;
    }
    .hstat:hover { border-color: rgba(255,255,255,0.14); }
    .hstat-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.4rem; font-weight: 300; line-height: 1; color: #fff;
    }
    .hstat-num sup { font-size: 1rem; vertical-align: super; }
    .hstat-label { font-size: 0.68rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--muted); margin-top: 0.4rem; }
    .hstat-accent-bar {
      position: absolute; bottom: 0; left: 0; right: 0; height: 2px;
      opacity: 0; transition: opacity 0.2s;
    }
    .hstat:hover .hstat-accent-bar { opacity: 1; }

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
      background: linear-gradient(90deg, var(--red), transparent);
    }
    .section-title { font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 300; color: #fff; line-height: 1.1; }

    /* ── REASONS GRID — multi-colour accent cards ── */
    .reason-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 16px; padding: 2rem;
      position: relative; overflow: hidden;
      transition: transform 0.25s, border-color 0.25s;
      height: 100%;
    }
    .reason-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0;
      height: 2px; opacity: 0; transition: opacity 0.25s;
    }
    .reason-card:hover { transform: translateY(-5px); }
    .reason-card:hover::before { opacity: 1; }

    /* Individual accent colours per card */
    .rc-red::before    { background: linear-gradient(90deg, var(--red), rgba(227,25,55,0.2)); }
    .rc-red:hover      { border-color: rgba(227,25,55,0.26); }
    .rc-violet::before { background: linear-gradient(90deg, var(--violet), rgba(139,92,246,0.2)); }
    .rc-violet:hover   { border-color: rgba(139,92,246,0.26); }
    .rc-green::before  { background: linear-gradient(90deg, var(--green), rgba(34,197,94,0.2)); }
    .rc-green:hover    { border-color: rgba(34,197,94,0.26); }
    .rc-sky::before    { background: linear-gradient(90deg, var(--sky), rgba(14,165,233,0.2)); }
    .rc-sky:hover      { border-color: rgba(14,165,233,0.26); }
    .rc-gold::before   { background: linear-gradient(90deg, var(--gold), rgba(212,168,67,0.2)); }
    .rc-gold:hover     { border-color: rgba(212,168,67,0.26); }
    .rc-amber::before  { background: linear-gradient(90deg, #f97316, rgba(249,115,22,0.2)); }
    .rc-amber:hover    { border-color: rgba(249,115,22,0.26); }

    .r-icon {
      width: 48px; height: 48px; border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.4rem; margin-bottom: 1.3rem; flex-shrink: 0;
    }
    .ri-red    { background: var(--accent-dim);  color: var(--accent-bright); }
    .ri-violet { background: var(--violet-dim);  color: #a78bfa; }
    .ri-green  { background: var(--green-dim);   color: var(--green); }
    .ri-sky    { background: var(--sky-dim);     color: #38bdf8; }
    .ri-gold   { background: var(--gold-dim);    color: var(--gold); }
    .ri-amber  { background: rgba(249,115,22,0.10); color: #fb923c; }

    .r-title { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 400; color: #fff; margin-bottom: 0.65rem; }
    .r-text  { font-size: 0.87rem; line-height: 1.8; color: var(--muted); }

    /* ── COMPARISON TABLE ── */
    .compare-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .compare-wrap {
      background: var(--dark2); border: 1px solid rgba(227,25,55,0.10);
      border-radius: 16px; overflow: hidden;
    }
    .compare-wrap table { margin: 0; }
    .compare-wrap thead tr { background: rgba(227,25,55,0.04); border-bottom: 1px solid var(--border); }
    .compare-wrap thead th {
      font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase;
      color: var(--muted); font-weight: 500; padding: 1.1rem 1.4rem; border: none;
      text-align: center;
    }
    .compare-wrap thead th:first-child { text-align: left; }
    .compare-wrap thead th.us-col { color: var(--accent-bright); }
    .compare-wrap tbody tr { border-bottom: 1px solid var(--border); transition: background 0.15s; }
    .compare-wrap tbody tr:last-child { border-bottom: none; }
    .compare-wrap tbody tr:hover { background: rgba(227,25,55,0.025); }
    .compare-wrap tbody td {
      font-size: 0.86rem; color: var(--text);
      padding: 0.95rem 1.4rem; border: none; vertical-align: middle;
      text-align: center;
    }
    .compare-wrap tbody td:first-child { text-align: left; font-weight: 500; color: #fff; }
    .compare-wrap tbody td.us-col { background: rgba(227,25,55,0.03); }
    .check-yes { color: var(--green); font-size: 1.1rem; }
    .check-no  { color: rgba(255,255,255,0.2); font-size: 1.1rem; }
    .check-part { color: var(--gold); font-size: 0.8rem; }

    /* ── REGULATION & AWARDS ── */
    .trust-section { border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }

    .reg-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 14px; padding: 1.8rem; text-align: center;
      transition: border-color 0.2s, transform 0.2s; height: 100%;
    }
    .reg-card:hover { border-color: rgba(227,25,55,0.2); transform: translateY(-3px); }
    .reg-flag { font-size: 2rem; margin-bottom: 0.8rem; display: block; }
    .reg-body { font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; font-weight: 400; color: #fff; margin-bottom: 0.3rem; }
    .reg-name { font-size: 0.7rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--muted); margin-bottom: 0.7rem; }
    .reg-badge {
      display: inline-block; font-size: 0.62rem; letter-spacing: 0.1em; text-transform: uppercase;
      padding: 0.22rem 0.7rem; border-radius: 4px;
      background: var(--green-dim); color: var(--green); border: 1px solid rgba(34,197,94,0.2);
    }

    .award-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 14px; padding: 1.8rem;
      display: flex; align-items: center; gap: 1.2rem;
      transition: border-color 0.2s, transform 0.2s; height: 100%;
    }
    .award-card:hover { border-color: rgba(212,168,67,0.22); transform: translateY(-3px); }
    .award-trophy { font-size: 2.2rem; flex-shrink: 0; }
    .award-title { font-size: 0.92rem; font-weight: 500; color: #fff; margin-bottom: 0.2rem; }
    .award-year  { font-size: 0.72rem; color: var(--gold); letter-spacing: 0.1em; margin-bottom: 0.2rem; }
    .award-body  { font-size: 0.78rem; color: var(--muted); line-height: 1.6; }

    /* ── TESTIMONIALS ── */
    .testimonials-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .testi-card {
      background: rgba(255,255,255,0.02); border: 1px solid var(--border);
      border-radius: 16px; padding: 2rem; height: 100%;
      transition: border-color 0.22s, transform 0.22s;
      position: relative;
    }
    .testi-card:hover { border-color: rgba(227,25,55,0.18); transform: translateY(-4px); }
    .testi-quote {
      font-family: 'Cormorant Garamond', serif;
      font-size: 3rem; line-height: 1; color: rgba(227,25,55,0.3);
      margin-bottom: 0.6rem;
    }
    .testi-text {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.15rem; font-style: italic; font-weight: 300;
      color: rgba(255,255,255,0.82); line-height: 1.65; margin-bottom: 1.4rem;
    }
    .testi-stars { color: var(--gold); font-size: 0.78rem; letter-spacing: 2px; margin-bottom: 1rem; }
    .testi-author { display: flex; align-items: center; gap: 0.9rem; }
    .testi-avatar {
      width: 40px; height: 40px; border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 0.8rem; font-weight: 600; flex-shrink: 0;
    }
    .testi-name   { font-size: 0.86rem; font-weight: 500; color: #fff; }
    .testi-detail { font-size: 0.72rem; color: var(--muted); margin-top: 2px; }

    /* ── FULL-WIDTH MANIFESTO ── */
    .manifesto {
      position: relative; overflow: hidden;
      background: linear-gradient(135deg, rgba(227,25,55,0.08) 0%, transparent 50%), var(--dark3);
      border-top: 1px solid rgba(227,25,55,0.14);
      border-bottom: 1px solid rgba(227,25,55,0.14);
      padding: 6rem 0;
      text-align: center;
    }
    .manifesto-bg {
      position: absolute; inset: 0; pointer-events: none;
      background-image:
        linear-gradient(to right, rgba(255,255,255,0.014) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.014) 1px, transparent 1px);
      background-size: 48px 48px;
    }
    .manifesto-quote {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(1.8rem, 4.5vw, 3.4rem);
      font-weight: 300; font-style: italic;
      color: #fff; line-height: 1.25;
      max-width: 840px; margin: 0 auto 1.8rem;
      position: relative; z-index: 1;
    }
    .manifesto-attr {
      font-size: 0.72rem; letter-spacing: 0.25em; text-transform: uppercase;
      color: var(--muted); position: relative; z-index: 1;
    }
    .manifesto-line {
      width: 60px; height: 1px;
      background: linear-gradient(90deg, transparent, var(--red), transparent);
      margin: 1.4rem auto;
      position: relative; z-index: 1;
    }

    /* ── CTA ── */
    .cta-band {
      background: linear-gradient(135deg, rgba(227,25,55,0.08) 0%, transparent 55%), var(--dark2);
      border-top: 1px solid rgba(227,25,55,0.14);
      border-bottom: 1px solid rgba(227,25,55,0.14);
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

    @media (max-width: 991px) {
      .num-item { border-right: none; border-bottom: 1px solid var(--border); }
      .num-item:last-child { border-bottom: none; }
      .hero-stats { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 575px) {
      .hero-stats { grid-template-columns: 1fr 1fr; }
    }
  </style>
</head>
<body>

<!-- ── NAVBAR ── -->
<x-header />

<!-- ── HERO ── -->
<section class="whyus-hero pt-5">
  <div class="hero-bg"></div>
  <div class="grid-overlay"></div>
  <div class="hatch-overlay"></div>

  <!-- Floating stat pills -->
  <div class="stat-float" style="left:60%;top:28%;animation-duration:5s;animation-delay:0s;">0.1ms execution</div>
  <div class="stat-float" style="left:72%;top:44%;animation-duration:6.5s;animation-delay:1.2s;">FCA regulated</div>
  <div class="stat-float" style="left:64%;top:60%;animation-duration:4.8s;animation-delay:2.5s;">1.2M+ traders</div>
  <div class="stat-float" style="left:78%;top:36%;animation-duration:7s;animation-delay:0.8s;">0.0 pip spreads</div>
  <div class="stat-float" style="left:56%;top:52%;animation-duration:5.5s;animation-delay:3s;">14 years regulated</div>

  <div class="container py-5 mt-4" style="padding-bottom:5rem !important;">
    <div class="row align-items-center g-5">

      <!-- Left -->
      <div class="col-lg-6">
        <div class="hero-eyebrow fade-up">Company — Why Us</div>
        <h1 class="hero-title fade-up fade-up-1">
          The broker<br>that puts you<br><em>first.</em>
        </h1>
        <p class="hero-subtitle fade-up fade-up-2">
          In a market crowded with brokers making the same promises, Tesla Invest is built differently. Regulated in 4 jurisdictions, operating since 2010, trusted by 1.2 million traders across 170 countries — our track record speaks louder than our claims.
        </p>
        <div class="hero-cta-row fade-up fade-up-3">
          <a href="#" class="btn-hero-red">Open Account</a>
          <a href="#" class="btn-hero-ghost">View Our Story</a>
        </div>
      </div>

      <!-- Right — Stats grid -->
      <div class="col-lg-5 offset-lg-1 fade-up fade-up-4">
        <div class="hero-stats">
          <div class="hstat">
            <div class="hstat-num" style="color:var(--accent-bright);">1.2<sup>M</sup></div>
            <div class="hstat-label">Active Traders</div>
            <div class="hstat-accent-bar" style="background:linear-gradient(90deg,var(--red),transparent);"></div>
          </div>
          <div class="hstat">
            <div class="hstat-num" style="color:#a78bfa;">170<sup>+</sup></div>
            <div class="hstat-label">Countries Served</div>
            <div class="hstat-accent-bar" style="background:linear-gradient(90deg,var(--violet),transparent);"></div>
          </div>
          <div class="hstat">
            <div class="hstat-num" style="color:#34d399;">$4.8<sup>B</sup></div>
            <div class="hstat-label">AUM Under Management</div>
            <div class="hstat-accent-bar" style="background:linear-gradient(90deg,var(--green),transparent);"></div>
          </div>
          <div class="hstat">
            <div class="hstat-num" style="color:#38bdf8;">14<sup>yr</sup></div>
            <div class="hstat-label">Years Regulated</div>
            <div class="hstat-accent-bar" style="background:linear-gradient(90deg,var(--sky),transparent);"></div>
          </div>
          <div class="hstat">
            <div class="hstat-num" style="color:var(--gold);">4</div>
            <div class="hstat-label">Regulatory Licences</div>
            <div class="hstat-accent-bar" style="background:linear-gradient(90deg,var(--gold),transparent);"></div>
          </div>
          <div class="hstat">
            <div class="hstat-num" style="color:#fb923c;">99.9<sup>%</sup></div>
            <div class="hstat-label">Platform Uptime</div>
            <div class="hstat-accent-bar" style="background:linear-gradient(90deg,#f97316,transparent);"></div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Ticker -->
  <div class="ticker-bg">
    <div class="ticker-track">
      <span class="ticker-item"><span class="ticker-label">Founded</span><span class="ticker-val">2010</span><span class="ticker-red">14 years of trust</span></span>
      <span class="ticker-item"><span class="ticker-label">Traders</span><span class="ticker-val">1,200,000+</span><span class="ticker-red">170 countries</span></span>
      <span class="ticker-item"><span class="ticker-label">Execution</span><span class="ticker-val">0.1ms</span><span class="ticker-red">no requotes</span></span>
      <span class="ticker-item"><span class="ticker-label">Spreads from</span><span class="ticker-val">0.0 pip</span><span class="ticker-red">raw pricing</span></span>
      <span class="ticker-item"><span class="ticker-label">Instruments</span><span class="ticker-val">1,200+</span><span class="ticker-red">6 asset classes</span></span>
      <span class="ticker-item"><span class="ticker-label">Support</span><span class="ticker-val">24 / 5</span><span class="ticker-red">multilingual</span></span>
      <span class="ticker-item"><span class="ticker-label">Regulation</span><span class="ticker-val">FCA · CySEC · ASIC · FSCA</span><span class="ticker-red">4 licences</span></span>
      <!-- dupe -->
      <span class="ticker-item"><span class="ticker-label">Founded</span><span class="ticker-val">2010</span><span class="ticker-red">14 years of trust</span></span>
      <span class="ticker-item"><span class="ticker-label">Traders</span><span class="ticker-val">1,200,000+</span><span class="ticker-red">170 countries</span></span>
      <span class="ticker-item"><span class="ticker-label">Execution</span><span class="ticker-val">0.1ms</span><span class="ticker-red">no requotes</span></span>
      <span class="ticker-item"><span class="ticker-label">Spreads from</span><span class="ticker-val">0.0 pip</span><span class="ticker-red">raw pricing</span></span>
      <span class="ticker-item"><span class="ticker-label">Instruments</span><span class="ticker-val">1,200+</span><span class="ticker-red">6 asset classes</span></span>
      <span class="ticker-item"><span class="ticker-label">Support</span><span class="ticker-val">24 / 5</span><span class="ticker-red">multilingual</span></span>
      <span class="ticker-item"><span class="ticker-label">Regulation</span><span class="ticker-val">FCA · CySEC · ASIC · FSCA</span><span class="ticker-red">4 licences</span></span>
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
        <div class="big-num">$4.8<sup>B</sup></div>
        <div class="num-desc">Assets Under Management</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">24<sup>/5</sup></div>
        <div class="num-desc">Support Hours</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">30<sup>+</sup></div>
        <div class="num-desc">Industry Awards</div>
      </div>
    </div>
  </div>
</div>

<!-- ── 6 REASONS ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row align-items-end g-4 mb-5">
      <div class="col-lg-5">
        <div class="section-tag">Six Reasons</div>
        <h2 class="section-title">Why serious traders<br>choose Tesla Invest.</h2>
      </div>
      <div class="col-lg-5 offset-lg-2">
        <p style="font-size:0.92rem;color:var(--muted);line-height:1.85;">
          Every broker promises fast execution, tight spreads, and great support. Here is what actually sets us apart — verifiable, measurable, and built into every trade you make.
        </p>
      </div>
    </div>
    <div class="row g-3">
      <div class="col-md-6 col-lg-4">
        <div class="reason-card rc-red">
          <div class="r-icon ri-red"><i class="uil uil-bolt"></i></div>
          <div class="r-title">0.1ms Execution — Verified</div>
          <p class="r-text">Our co-located matching engine processes orders in under 0.1 milliseconds under normal conditions. No dealing desk, no manual intervention, no requotes. Every fill is logged and auditable from your trade history.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="reason-card rc-violet">
          <div class="r-icon ri-violet"><i class="uil uil-shield-check"></i></div>
          <div class="r-title">Regulated in 4 Jurisdictions</div>
          <p class="r-text">Tesla Invest holds active licences from the FCA (UK), CySEC (EU), ASIC (Australia), and FSCA (South Africa). All client funds are held in segregated accounts and covered by compensation schemes up to £85,000.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="reason-card rc-green">
          <div class="r-icon ri-green"><i class="uil uil-money-bill"></i></div>
          <div class="r-title">Raw 0.0 Pip Spreads</div>
          <p class="r-text">Our Raw account delivers true interbank pricing from 0.0 pips on EUR/USD. No markup, no artificial widening. The spread you see in the platform is the spread you trade at — always.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="reason-card rc-sky">
          <div class="r-icon ri-sky"><i class="uil uil-headphones-alt"></i></div>
          <div class="r-title">24/5 Human Support</div>
          <p class="r-text">Every support channel — live chat, email, WhatsApp, and phone — is staffed by trained humans, not bots. Average first response time is under 2 minutes. Available in 18 languages across all time zones.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="reason-card rc-gold">
          <div class="r-icon ri-gold"><i class="uil uil-lock-alt"></i></div>
          <div class="r-title">Negative Balance Protection</div>
          <p class="r-text">Your loss on any account can never exceed your deposit. Automatic margin close-out prevents your balance from going below zero — protecting you from extreme market gaps, even on leveraged positions.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="reason-card rc-amber">
          <div class="r-icon ri-amber"><i class="uil uil-desktop"></i></div>
          <div class="r-title">One Platform. Everything.</div>
          <p class="r-text">1,200+ instruments, 50+ indicators, copy trading, PAMM, automated strategies, economic calendar, sentiment tools, and real-time alerts — all in a single platform across web, desktop, iOS, and Android.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── COMPARISON TABLE ── -->
<section class="compare-section py-5">
  <div class="container py-3">
    <div class="row align-items-end g-4 mb-5">
      <div class="col-lg-5">
        <div class="section-tag">Honest Comparison</div>
        <h2 class="section-title">Us vs the<br>competition.</h2>
      </div>
      <div class="col-lg-5 offset-lg-2">
        <p style="font-size:0.88rem;color:var(--muted);line-height:1.8;">
          We believe in transparency. Here's how Tesla Invest compares against the industry average across the metrics that actually matter to traders.
        </p>
      </div>
    </div>
    <div class="compare-wrap">
      <table class="table table-borderless mb-0" data-bs-theme="dark">
        <thead>
          <tr>
            <th style="width:34%;">Feature</th>
            <th class="us-col">Tesla Invest</th>
            <th>Industry Average</th>
            <th>Discount Brokers</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Minimum Spread (EUR/USD)</td>
            <td class="us-col" style="color:var(--green);font-weight:500;">0.0 pip</td>
            <td>0.6–1.2 pip</td>
            <td>1.5–3.0 pip</td>
          </tr>
          <tr>
            <td>Order Execution Speed</td>
            <td class="us-col" style="color:var(--green);font-weight:500;">0.1ms</td>
            <td>50–200ms</td>
            <td>200–800ms</td>
          </tr>
          <tr>
            <td>Regulatory Licences</td>
            <td class="us-col" style="color:var(--green);font-weight:500;">4 (FCA, CySEC, ASIC, FSCA)</td>
            <td>1–2</td>
            <td>0–1 (offshore)</td>
          </tr>
          <tr>
            <td>Segregated Client Funds</td>
            <td class="us-col"><i class="uil uil-check-circle check-yes"></i></td>
            <td><span class="check-part">Varies</span></td>
            <td><i class="uil uil-times-circle check-no"></i></td>
          </tr>
          <tr>
            <td>Negative Balance Protection</td>
            <td class="us-col"><i class="uil uil-check-circle check-yes"></i></td>
            <td><span class="check-part">EU only</span></td>
            <td><i class="uil uil-times-circle check-no"></i></td>
          </tr>
          <tr>
            <td>Share &amp; Crypto Commission</td>
            <td class="us-col" style="color:var(--green);font-weight:500;">0%</td>
            <td>0.1–0.5%</td>
            <td>0.2–1.0%</td>
          </tr>
          <tr>
            <td>PAMM / Copy Trading</td>
            <td class="us-col"><i class="uil uil-check-circle check-yes"></i></td>
            <td><span class="check-part">Limited</span></td>
            <td><i class="uil uil-times-circle check-no"></i></td>
          </tr>
          <tr>
            <td>24/5 Human Support</td>
            <td class="us-col"><i class="uil uil-check-circle check-yes"></i></td>
            <td><span class="check-part">Bot-first</span></td>
            <td><i class="uil uil-times-circle check-no"></i></td>
          </tr>
          <tr>
            <td>Islamic / Swap-Free Account</td>
            <td class="us-col"><i class="uil uil-check-circle check-yes"></i></td>
            <td><span class="check-part">Select only</span></td>
            <td><i class="uil uil-times-circle check-no"></i></td>
          </tr>
          <tr>
            <td>Demo Account (unlimited)</td>
            <td class="us-col"><i class="uil uil-check-circle check-yes"></i></td>
            <td><span class="check-part">30-day limit</span></td>
            <td><span class="check-part">30-day limit</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- ── REGULATION & AWARDS ── -->
<section class="trust-section py-5">
  <div class="container py-3">
    <div class="row align-items-end g-4 mb-5">
      <div class="col-lg-5">
        <div class="section-tag">Trust &amp; Recognition</div>
        <h2 class="section-title">Regulated. Awarded.<br>Recognised.</h2>
      </div>
      <div class="col-lg-5 offset-lg-2">
        <p style="font-size:0.88rem;color:var(--muted);line-height:1.8;">
          Our regulatory standing and industry recognition are not marketing claims — they are independently verified, publicly registered, and renewed annually.
        </p>
      </div>
    </div>

    <!-- Regulation cards -->
    <div class="row g-3 mb-5">
      <div class="col-6 col-md-3">
        <div class="reg-card">
          <span class="reg-flag">🇬🇧</span>
          <div class="reg-body">FCA</div>
          <div class="reg-name">Financial Conduct Authority</div>
          <span class="reg-badge">Active Licence</span>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="reg-card">
          <span class="reg-flag">🇨🇾</span>
          <div class="reg-body">CySEC</div>
          <div class="reg-name">Cyprus Securities Exchange Commission</div>
          <span class="reg-badge">Active Licence</span>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="reg-card">
          <span class="reg-flag">🇦🇺</span>
          <div class="reg-body">ASIC</div>
          <div class="reg-name">Australian Securities &amp; Investments Commission</div>
          <span class="reg-badge">Active Licence</span>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="reg-card">
          <span class="reg-flag">🇿🇦</span>
          <div class="reg-body">FSCA</div>
          <div class="reg-name">Financial Sector Conduct Authority</div>
          <span class="reg-badge">Active Licence</span>
        </div>
      </div>
    </div>

    <!-- Awards -->
    <div class="row g-3">
      <div class="col-md-6 col-lg-3">
        <div class="award-card">
          <div class="award-trophy">🏆</div>
          <div>
            <div class="award-title">Best CFD Broker</div>
            <div class="award-year">Finance Magnates · 2024</div>
            <div class="award-body">Global Award for Excellence in CFD Trading Infrastructure</div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="award-card">
          <div class="award-trophy">🥇</div>
          <div>
            <div class="award-title">Tightest Spreads</div>
            <div class="award-year">ForexBrokers.com · 2024</div>
            <div class="award-body">Ranked #1 for raw spread pricing across major FX pairs</div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="award-card">
          <div class="award-trophy">⭐</div>
          <div>
            <div class="award-title">Best Trading Platform</div>
            <div class="award-year">DailyForex · 2023</div>
            <div class="award-body">Outstanding platform design, execution speed &amp; mobile experience</div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="award-card">
          <div class="award-trophy">🎖️</div>
          <div>
            <div class="award-title">Most Trusted Broker</div>
            <div class="award-year">Trustpilot · 4.8 / 5</div>
            <div class="award-body">Over 24,000 verified reviews. Excellence in client service.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── MANIFESTO ── -->
<section class="manifesto">
  <div class="manifesto-bg"></div>
  <div class="container">
    <div class="manifesto-line"></div>
    <p class="manifesto-quote">
      "We built Tesla Invest on a single conviction: that retail traders deserve the same execution quality, pricing transparency, and capital protections as institutional desks — without paying institutional minimums."
    </p>
    <div class="manifesto-line"></div>
    <div class="manifesto-attr">— Tesla Invest Founding Team, 2010</div>
  </div>
</section>

<!-- ── TESTIMONIALS ── -->
<section class="testimonials-section py-5">
  <div class="container py-3">
    <div class="text-center mb-5">
      <div class="section-tag d-inline-flex">Testimonials</div>
      <h2 class="section-title mt-1">What our traders say.</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="testi-card">
          <div class="testi-quote">"</div>
          <p class="testi-text">I've traded with six different brokers over the past decade. The execution speed and spread consistency at Tesla Invest is genuinely in a different league. I stopped requote-hunting after my first week.</p>
          <div class="testi-stars">★★★★★</div>
          <div class="testi-author">
            <div class="testi-avatar" style="background:linear-gradient(135deg,#a78bfa,#7c3aed);color:#fff;">JM</div>
            <div>
              <div class="testi-name">James M.</div>
              <div class="testi-detail">FX Trader · London, UK · 8 years</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testi-card">
          <div class="testi-quote">"</div>
          <p class="testi-text">As a PAMM manager, the platform gives me everything I need — from the allocation engine to investor reporting. My AUM grew from $80k to $2.4M in 14 months. The infrastructure just works.</p>
          <div class="testi-stars">★★★★★</div>
          <div class="testi-author">
            <div class="testi-avatar" style="background:linear-gradient(135deg,#34d399,#059669);color:#fff;">AO</div>
            <div>
              <div class="testi-name">Adewale O.</div>
              <div class="testi-detail">PAMM Manager · Lagos, NG · 3 years</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testi-card">
          <div class="testi-quote">"</div>
          <p class="testi-text">The Islamic account feature was the reason I joined, but the raw spreads and platform quality are the reason I stayed. Zero compromise on either front — genuinely impressive for a regulated broker.</p>
          <div class="testi-stars">★★★★★</div>
          <div class="testi-author">
            <div class="testi-avatar" style="background:linear-gradient(135deg,#fbbf24,#d97706);color:#fff;">KA</div>
            <div>
              <div class="testi-name">Khalid A.</div>
              <div class="testi-detail">Gold &amp; FX Trader · Dubai, UAE · 5 years</div>
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
    <h2 class="section-title mt-1 mx-auto" style="max-width:540px;">14 years of trust.<br>One account away.</h2>
    <p class="mt-3 mx-auto" style="font-size:0.92rem;color:var(--muted);line-height:1.8;max-width:460px;">
      Join 1.2 million traders in 170 countries. Open a live account in minutes or start risk-free with a $10,000 demo — no deposit, no commitment.
    </p>
    <div class="d-flex gap-3 justify-content-center flex-wrap mt-4">
      <a href="#" class="btn-hero-red">Open Live Account</a>
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
