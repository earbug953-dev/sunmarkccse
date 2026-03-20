<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tesla Invest — Next Generation Trading Platform</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    :root {
      --red: #e31937;
      --red-dim: rgba(227,25,55,0.10);
      --red-bright: #ff4d67;
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
      --gold: #d4a843;
      --gold-dim: rgba(212,168,67,0.10);
      --violet: #8b5cf6;
      --violet-dim: rgba(139,92,246,0.10);
      --sky: #0ea5e9;
      --sky-dim: rgba(14,165,233,0.10);
      --amber: #f59e0b;
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

    /* ─────────────────────────────── PRELOADER */
    .preloader {
      position: fixed; inset: 0;
      background: rgba(12,12,14,0.95);
      z-index: 9999;
      display: flex; align-items: center; justify-content: center;
      flex-direction: column; gap: 1.6rem;
    }
    .pre-brand {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2rem; font-weight: 600; letter-spacing: 0.2em; color: #fff;
    }
    .pre-brand span { color: var(--red); }
    .pre-bars { display: flex; gap: 5px; align-items: flex-end; height: 40px; }
    .pre-bar {
      width: 4px; border-radius: 3px;
      animation: preBarPulse 1.2s ease-in-out infinite;
    }
    @keyframes preBarPulse {
      0%,100% { transform: scaleY(0.3); opacity: 0.4; }
      50%      { transform: scaleY(1); opacity: 1; }
    }

    /* ─────────────────────────────── NAVBAR */
    .navbar {
      background: rgba(12,12,14,0.94);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--border);
      padding: 1.1rem 0;
    }
    .navbar-brand {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.6rem; font-weight: 600;
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

    /* ─────────────────────────────── HERO CAROUSEL */
    .hero-carousel { position: relative; overflow: hidden; }
    .hero-slide {
      position: relative;
      min-height: 96vh;
      display: flex; align-items: center;
      background-size: cover; background-position: center;
    }
    .hero-slide::before {
      content: ''; position: absolute; inset: 0;
      background: linear-gradient(135deg, rgba(12,12,14,0.88) 0%, rgba(12,12,14,0.55) 50%, rgba(12,12,14,0.72) 100%);
    }
    /* Per-slide accent glow */
    .hero-slide::after {
      content: ''; position: absolute; inset: 0; pointer-events: none;
    }
    .slide-1::after { background: radial-gradient(ellipse 50% 60% at 80% 50%, rgba(227,25,55,0.08) 0%, transparent 60%); }
    .slide-2::after { background: radial-gradient(ellipse 50% 60% at 80% 50%, rgba(139,92,246,0.08) 0%, transparent 60%); }
    .slide-3::after { background: radial-gradient(ellipse 50% 60% at 80% 50%, rgba(14,165,233,0.08) 0%, transparent 60%); }
    .slide-4::after { background: radial-gradient(ellipse 50% 60% at 80% 50%, rgba(34,197,94,0.08) 0%, transparent 60%); }

    /* Grid overlay */
    .hero-slide .grid-overlay {
      position: absolute; inset: 0; pointer-events: none; z-index: 1;
      background-image:
        linear-gradient(to right, rgba(255,255,255,0.016) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.016) 1px, transparent 1px);
      background-size: 58px 58px;
    }

    .hero-content {
      position: relative; z-index: 2;
      padding-top: 100px; padding-bottom: 80px;
    }
    .hero-tag {
      display: inline-flex; align-items: center; gap: 8px;
      background: var(--red-dim); border: 1px solid rgba(227,25,55,0.22);
      border-radius: 30px; padding: 0.32rem 0.9rem;
      font-size: 0.68rem; letter-spacing: 0.12em; text-transform: uppercase;
      color: var(--red-bright); margin-bottom: 1.8rem;
    }
    .hero-tag-dot {
      width: 6px; height: 6px; border-radius: 50%; background: var(--red-bright);
      animation: pDot 2s ease infinite;
    }
    @keyframes pDot {
      0%,100% { box-shadow: 0 0 0 0 rgba(255,77,103,0.5); }
      50%      { box-shadow: 0 0 0 6px rgba(255,77,103,0); }
    }
    .hero-eyebrow {
      font-size: 0.68rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--red-bright); display: flex; align-items: center; gap: 12px; margin-bottom: 1.6rem;
    }
    .hero-eyebrow::before {
      content: ''; width: 32px; height: 1px;
      background: linear-gradient(90deg, var(--red), rgba(227,25,55,0.3));
    }
    .hero-title {
      font-size: clamp(2.8rem, 7vw, 6rem);
      font-weight: 300; line-height: 1.04; color: #fff; margin-bottom: 1.8rem;
    }
    .hero-title em {
      font-style: italic;
      background: linear-gradient(135deg, var(--red-bright), #ff8096, var(--red-bright));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .hero-title.violet em {
      background: linear-gradient(135deg, #a78bfa, #c4b5fd, #a78bfa);
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .hero-title.sky em {
      background: linear-gradient(135deg, #38bdf8, #7dd3fc, #38bdf8);
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .hero-title.green em {
      background: linear-gradient(135deg, #34d399, #6ee7b7, #34d399);
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .hero-sub {
      font-size: clamp(0.95rem, 2vw, 1.1rem); line-height: 1.85;
      color: var(--muted); max-width: 480px; margin-bottom: 2.4rem;
    }
    .hero-btns { display: flex; gap: 1rem; flex-wrap: wrap; }
    .btn-hero-primary {
      background: var(--red); color: #fff;
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.9rem 2.4rem; border: none; border-radius: 4px;
      text-decoration: none; transition: background 0.2s; display: inline-block; font-weight: 500;
    }
    .btn-hero-primary:hover { background: #c0152e; color: #fff; }
    .btn-hero-outline {
      background: transparent; color: var(--muted);
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.9rem 2.4rem; border: 1px solid var(--border); border-radius: 4px;
      text-decoration: none; transition: all 0.2s; display: inline-block;
    }
    .btn-hero-outline:hover { border-color: rgba(255,255,255,0.25); color: #fff; }

    /* Slide trust badges */
    .trust-row {
      display: flex; gap: 1.4rem; flex-wrap: wrap; margin-top: 2.6rem;
    }
    .trust-badge {
      font-size: 0.7rem; color: var(--muted); letter-spacing: 0.06em;
      display: flex; align-items: center; gap: 6px;
    }
    .trust-badge i { font-size: 0.95rem; }

    /* Hero right panel — mini market widget */
    .hero-market-card {
      background: rgba(20,20,22,0.82);
      border: 1px solid rgba(255,255,255,0.09);
      border-radius: 18px; overflow: hidden;
      backdrop-filter: blur(20px);
      box-shadow: 0 30px 60px rgba(0,0,0,0.5);
    }
    .hmc-header {
      padding: 1.1rem 1.5rem;
      background: rgba(227,25,55,0.05);
      border-bottom: 1px solid var(--border);
      display: flex; align-items: center; justify-content: space-between;
    }
    .hmc-title { font-size: 0.68rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); }
    .hmc-live  { font-size: 0.65rem; color: var(--green); display: flex; align-items: center; gap: 4px; }
    .live-dot  { width: 6px; height: 6px; border-radius: 50%; background: var(--green); animation: pDot 2s ease infinite; }

    .market-row {
      padding: 0.85rem 1.5rem;
      border-bottom: 1px solid var(--border);
      display: grid; grid-template-columns: 1fr auto auto;
      align-items: center; gap: 0.8rem;
      transition: background 0.15s;
    }
    .market-row:last-child { border-bottom: none; }
    .market-row:hover { background: rgba(255,255,255,0.02); }
    .mr-sym  { font-size: 0.86rem; font-weight: 500; color: #fff; }
    .mr-name { font-size: 0.65rem; color: var(--muted); margin-top: 1px; }
    .mr-price { font-family: 'Cormorant Garamond', serif; font-size: 1.1rem; text-align: right; }
    .mr-chg {
      font-size: 0.72rem; font-weight: 500; text-align: right;
      padding: 0.18rem 0.5rem; border-radius: 4px;
    }
    .up   { color: var(--green); background: var(--green-dim); }
    .down { color: var(--rose);  background: rgba(244,63,94,0.10); }

    /* Carousel dots */
    .carousel-dots {
      position: absolute; bottom: 88px; left: 50%;
      transform: translateX(-50%);
      display: flex; gap: 8px; z-index: 10;
    }
    .cdot {
      width: 28px; height: 3px; border-radius: 2px;
      background: rgba(255,255,255,0.2); cursor: pointer;
      transition: background 0.3s, width 0.3s;
    }
    .cdot.active { background: var(--red); width: 44px; }

    /* Carousel controls */
    .carousel-ctrl {
      position: absolute; top: 50%; transform: translateY(-50%);
      z-index: 10; width: 44px; height: 44px; border-radius: 50%;
      background: rgba(255,255,255,0.06); border: 1px solid var(--border);
      display: flex; align-items: center; justify-content: center;
      color: rgba(255,255,255,0.5); font-size: 1.1rem; cursor: pointer;
      transition: all 0.2s;
    }
    .carousel-ctrl:hover { background: rgba(255,255,255,0.12); color: #fff; }
    .carousel-ctrl.prev { left: 24px; }
    .carousel-ctrl.next { right: 24px; }

    /* ── TICKER */
    .ticker-bg {
      border-top: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
      height: 52px; overflow: hidden;
      display: flex; align-items: center;
      background: rgba(12,12,14,0.7);
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
    .ticker-item { font-size: 0.72rem; letter-spacing: 0.1em; display: flex; align-items: center; gap: 0.5rem; }
    .tl { color: rgba(255,255,255,0.38); }
    .tv { color: #fff; }
    .tu { color: var(--green); }
    .td { color: var(--rose); }

    /* ── SECTION HELPERS */
    .section-tag {
      font-size: 0.68rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--red-bright); font-weight: 500;
      display: inline-flex; align-items: center; gap: 10px; margin-bottom: 1.2rem;
    }
    .section-tag::after {
      content: ''; width: 28px; height: 1px;
      background: linear-gradient(90deg, var(--red), transparent);
    }
    .section-title { font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 300; color: #fff; line-height: 1.1; }

    /* ── NUMBERS STRIP */
    .numbers-strip { border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); background: var(--dark2); }
    .num-item { text-align: center; padding: 3rem 1rem; border-right: 1px solid var(--border); }
    .num-item:last-child { border-right: none; }
    .big-num { font-family: 'Cormorant Garamond', serif; font-size: 3.2rem; font-weight: 300; color: #fff; line-height: 1; }
    .big-num sup { font-size: 1.3rem; color: var(--red-bright); vertical-align: super; }
    .num-desc { font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--muted); margin-top: 0.5rem; }

    /* ── MARKET OVERVIEW */
    .market-overview { background: var(--dark3); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .market-table-wrap {
      background: var(--dark2); border: 1px solid rgba(227,25,55,0.10);
      border-radius: 16px; overflow: hidden;
    }
    .market-table-wrap .tab-bar {
      display: flex; gap: 0.3rem; padding: 0.8rem 1.2rem 0;
      border-bottom: 1px solid var(--border); background: rgba(227,25,55,0.03);
      flex-wrap: wrap;
    }
    .tab-btn {
      font-size: 0.68rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.42rem 0.85rem; border-radius: 6px 6px 0 0;
      background: transparent; color: var(--muted);
      border: 1px solid transparent; border-bottom: none; cursor: pointer; transition: all 0.15s;
    }
    .tab-btn.active { background: rgba(227,25,55,0.08); color: var(--red-bright); border-color: rgba(227,25,55,0.18); }
    .tab-panel { display: none; }
    .tab-panel.active { display: block; }
    .market-table-wrap table { margin: 0; }
    .market-table-wrap thead th {
      font-size: 0.66rem; letter-spacing: 0.18em; text-transform: uppercase;
      color: var(--muted); font-weight: 500; padding: 0.9rem 1.2rem; border: none;
      background: rgba(255,255,255,0.015); border-bottom: 1px solid var(--border);
    }
    .market-table-wrap tbody td {
      font-size: 0.86rem; padding: 0.88rem 1.2rem; border: none; border-bottom: 1px solid var(--border);
      vertical-align: middle;
    }
    .market-table-wrap tbody tr:last-child td { border-bottom: none; }
    .market-table-wrap tbody tr:hover td { background: rgba(255,255,255,0.015); }
    .sym-cell { font-weight: 500; color: #fff; }
    .price-cell { font-family: 'Cormorant Garamond', serif; font-size: 1.05rem; color: #fff; }
    .chg-pill {
      font-size: 0.72rem; font-weight: 500; padding: 0.2rem 0.55rem; border-radius: 4px;
    }

    /* Inline sparkline */
    .spark { height: 28px; }

    /* ── PRODUCT CARDS */
    .product-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 18px; overflow: hidden; height: 100%;
      transition: transform 0.25s, border-color 0.25s;
      position: relative;
    }
    .product-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
      opacity: 0; transition: opacity 0.25s;
    }
    .product-card:hover { transform: translateY(-5px); }
    .product-card:hover::before { opacity: 1; }
    .pc-red::before    { background: linear-gradient(90deg, var(--red), rgba(227,25,55,0.2)); }
    .pc-red:hover      { border-color: rgba(227,25,55,0.26); }
    .pc-violet::before { background: linear-gradient(90deg, var(--violet), rgba(139,92,246,0.2)); }
    .pc-violet:hover   { border-color: rgba(139,92,246,0.26); }
    .pc-sky::before    { background: linear-gradient(90deg, var(--sky), rgba(14,165,233,0.2)); }
    .pc-sky:hover      { border-color: rgba(14,165,233,0.26); }
    .pc-green::before  { background: linear-gradient(90deg, var(--green), rgba(34,197,94,0.2)); }
    .pc-green:hover    { border-color: rgba(34,197,94,0.26); }

    .pc-img {
      width: 100%; height: 200px; object-fit: cover;
      filter: brightness(0.55) saturate(0.7);
      transition: filter 0.3s;
    }
    .product-card:hover .pc-img { filter: brightness(0.7) saturate(0.85); }

    .pc-body { padding: 1.8rem; }
    .pc-badge {
      display: inline-block; font-size: 0.6rem; letter-spacing: 0.15em; text-transform: uppercase;
      padding: 0.22rem 0.7rem; border-radius: 4px; margin-bottom: 1rem;
    }
    .pb-red    { background: var(--red-dim);    color: var(--red-bright);  border: 1px solid rgba(227,25,55,0.2); }
    .pb-violet { background: var(--violet-dim); color: #a78bfa;            border: 1px solid rgba(139,92,246,0.2); }
    .pb-sky    { background: var(--sky-dim);    color: #38bdf8;            border: 1px solid rgba(14,165,233,0.2); }
    .pb-green  { background: var(--green-dim);  color: var(--green);       border: 1px solid rgba(34,197,94,0.2); }

    .pc-title { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 400; color: #fff; margin-bottom: 0.7rem; }
    .pc-text  { font-size: 0.86rem; color: var(--muted); line-height: 1.8; margin-bottom: 1.4rem; }
    .pc-btn {
      display: inline-block; font-size: 0.72rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.65rem 1.6rem; border-radius: 5px; text-decoration: none; transition: all 0.15s;
    }
    .pcb-red    { background: var(--red); color: #fff; }
    .pcb-red:hover { background: #c0152e; color: #fff; }
    .pcb-ghost  { background: transparent; border: 1px solid var(--border); color: var(--muted); }
    .pcb-ghost:hover { border-color: rgba(255,255,255,0.2); color: #fff; }

    /* ── COPY TRADING */
    .copy-trading { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .copy-trader-row {
      background: rgba(255,255,255,0.025); border: 1px solid var(--border);
      border-radius: 14px; padding: 1.2rem 1.4rem; margin-bottom: 0.8rem;
      display: flex; align-items: center; gap: 1.1rem;
      transition: border-color 0.2s;
    }
    .copy-trader-row:hover { border-color: rgba(255,255,255,0.14); }
    .ct-avatar {
      width: 42px; height: 42px; border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 0.85rem; font-weight: 700; flex-shrink: 0;
    }
    .ct-name  { font-size: 0.9rem; font-weight: 500; color: #fff; }
    .ct-strat { font-size: 0.68rem; color: var(--muted); margin-top: 1px; }
    .ct-roi {
      font-family: 'Cormorant Garamond', serif; font-size: 1.4rem;
      font-weight: 300; color: var(--green); margin-left: auto;
    }
    .ct-copy {
      font-size: 0.62rem; letter-spacing: 0.1em; text-transform: uppercase;
      padding: 0.28rem 0.75rem; border-radius: 4px; border: 1px solid rgba(227,25,55,0.22);
      background: var(--red-dim); color: var(--red-bright); cursor: pointer;
      transition: all 0.15s; text-decoration: none; white-space: nowrap;
    }
    .ct-copy:hover { background: rgba(227,25,55,0.2); }

    /* ── WHY US CARDS */
    .why-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 16px; padding: 2rem; height: 100%;
      position: relative; overflow: hidden;
      transition: transform 0.25s, border-color 0.25s;
    }
    .why-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
      background: linear-gradient(90deg, var(--red), rgba(227,25,55,0.2));
      opacity: 0; transition: opacity 0.25s;
    }
    .why-card:hover { transform: translateY(-5px); border-color: rgba(227,25,55,0.24); }
    .why-card:hover::before { opacity: 1; }
    .wc-icon {
      width: 48px; height: 48px; border-radius: 12px;
      background: var(--red-dim); display: flex; align-items: center; justify-content: center;
      color: var(--red-bright); font-size: 1.4rem; margin-bottom: 1.3rem;
    }
    .wc-title { font-family: 'Cormorant Garamond', serif; font-size: 1.45rem; font-weight: 400; color: #fff; margin-bottom: 0.6rem; }
    .wc-text  { font-size: 0.87rem; color: var(--muted); line-height: 1.8; }

    /* ── PERFORMANCE STRIP */
    .perf-strip { background: var(--dark3); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .perf-item { text-align: center; padding: 3rem 1rem; border-right: 1px solid var(--border); }
    .perf-item:last-child { border-right: none; }
    .perf-num { font-family: 'Cormorant Garamond', serif; font-size: 2.8rem; font-weight: 300; color: #fff; line-height: 1; }
    .perf-sub { font-size: 0.72rem; letter-spacing: 0.16em; text-transform: uppercase; color: var(--muted); margin-top: 0.5rem; }

    /* ── PLATFORMS ROW */
    .platforms-section { border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .platform-badge {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 14px; padding: 1.6rem;
      display: flex; align-items: center; gap: 1rem;
      transition: border-color 0.2s, transform 0.2s; height: 100%;
    }
    .platform-badge:hover { border-color: rgba(227,25,55,0.22); transform: translateY(-3px); }
    .plat-icon { font-size: 2rem; flex-shrink: 0; }
    .plat-name { font-size: 0.92rem; font-weight: 500; color: #fff; margin-bottom: 0.2rem; }
    .plat-desc { font-size: 0.75rem; color: var(--muted); line-height: 1.6; }

    /* ── AS SEEN ON */
    .seen-on { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .seen-logo {
      height: 36px; opacity: 0.32; filter: grayscale(1);
      transition: opacity 0.2s, filter 0.2s;
    }
    .seen-logo:hover { opacity: 0.65; filter: grayscale(0.3); }
    .seen-logo-text {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.55rem; font-weight: 600; letter-spacing: 0.18em;
      color: rgba(255,255,255,0.28); transition: color 0.2s; text-transform: uppercase;
    }
    .seen-logo-text:hover { color: rgba(255,255,255,0.55); }

    /* ── CTA BAND */
    .cta-band {
      background: linear-gradient(135deg, rgba(227,25,55,0.09) 0%, transparent 55%), var(--dark3);
      border-top: 1px solid rgba(227,25,55,0.14);
      border-bottom: 1px solid rgba(227,25,55,0.14);
      padding: 6rem 0; text-align: center; position: relative; overflow: hidden;
    }
    .cta-grid {
      position: absolute; inset: 0; pointer-events: none;
      background-image:
        linear-gradient(to right, rgba(255,255,255,0.014) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.014) 1px, transparent 1px);
      background-size: 52px 52px;
    }

    /* ── FOOTER */
    footer { background: var(--dark3); border-top: 1px solid var(--border); }
    .footer-brand { font-family: 'Cormorant Garamond', serif; font-size: 1.55rem; font-weight: 600; letter-spacing: 0.12em; color: #fff; }
    .footer-brand span { color: var(--red); }
    .footer-tagline { font-size: 0.82rem; color: var(--muted); line-height: 1.7; max-width: 260px; margin-top: 0.8rem; }
    .footer-heading { font-size: 0.68rem; letter-spacing: 0.22em; text-transform: uppercase; color: rgba(255,255,255,0.28); margin-bottom: 1.2rem; font-weight: 500; }
    .footer-link { color: var(--muted); text-decoration: none; font-size: 0.85rem; display: block; margin-bottom: 0.65rem; transition: color 0.2s; }
    .footer-link:hover { color: #fff; }
    .footer-bottom { border-top: 1px solid var(--border); padding: 1.4rem 0; }
    .footer-bottom p { font-size: 0.75rem; color: rgba(255,255,255,0.22); margin: 0; }

    /* ── FADE UP */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(26px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .fu  { animation: fadeUp 0.7s ease both; }
    .fu1 { animation-delay: 0.10s; }
    .fu2 { animation-delay: 0.22s; }
    .fu3 { animation-delay: 0.34s; }
    .fu4 { animation-delay: 0.46s; }
    .fu5 { animation-delay: 0.60s; }

    @media (max-width: 991px) {
      .num-item, .perf-item { border-right: none; border-bottom: 1px solid var(--border); }
      .num-item:last-child, .perf-item:last-child { border-bottom: none; }
      .carousel-ctrl { display: none; }
    }
  </style>
</head>
<body>

<!-- ── PRELOADER ── -->
<div class="preloader" id="preloader">
  <div class="pre-brand">TESLA<span>.</span>INVEST</div>
  <div class="pre-bars">
    <div class="pre-bar" style="height:100%;background:var(--red);animation-delay:0s;"></div>
    <div class="pre-bar" style="height:100%;background:#a78bfa;animation-delay:0.12s;"></div>
    <div class="pre-bar" style="height:100%;background:var(--sky);animation-delay:0.24s;"></div>
    <div class="pre-bar" style="height:100%;background:var(--green);animation-delay:0.36s;"></div>
    <div class="pre-bar" style="height:100%;background:var(--gold);animation-delay:0.48s;"></div>
  </div>
</div>

<x-header />

<!-- ── HERO CAROUSEL ── -->
<section class="hero-carousel" style="padding-top:72px;">
  <div id="heroSlides">

    <!-- Slide 1 -->
    <div class="hero-slide slide-1" style="background-image:url('https://picsum.photos/seed/trading1/1600/900');" data-slide="0">
      <div class="grid-overlay"></div>
      <div class="container hero-content">
        <div class="row align-items-center g-5">
          <div class="col-lg-6">
            <div class="hero-tag fu"><span class="hero-tag-dot"></span>Award-winning platform</div>
            <h1 class="hero-title fu fu1">
              Next generation<br>crypto &amp; CFD<br><em>trading.</em>
            </h1>
            <p class="hero-sub fu fu2">
              Tesla Invest is an award-winning platform that lets you trade global financial markets across Forex, Crypto, Shares, Indices, Energies, and Metals — from one account.
            </p>
            <div class="hero-btns fu fu3">
              <a href="#" class="btn-hero-primary">Get Started Free</a>
              <a href="#" class="btn-hero-outline">View Markets</a>
            </div>
            <div class="trust-row fu fu4">
              <div class="trust-badge"><i class="uil uil-shield-check" style="color:var(--green);"></i> FCA Regulated</div>
              <div class="trust-badge"><i class="uil uil-lock-alt" style="color:var(--gold);"></i> Segregated Funds</div>
              <div class="trust-badge"><i class="uil uil-bolt" style="color:var(--sky);"></i> 0.1ms Execution</div>
            </div>
          </div>
          <div class="col-lg-5 offset-lg-1 d-none d-lg-block fu fu5">
            <div class="hero-market-card">
              <div class="hmc-header">
                <div class="hmc-title">Live Markets</div>
                <div class="hmc-live"><span class="live-dot"></span> Real-time</div>
              </div>
              <div class="market-row">
                <div><div class="mr-sym">EUR/USD</div><div class="mr-name">Euro / US Dollar</div></div>
                <div class="mr-price" style="color:#fff;">1.08701</div>
                <div class="mr-chg up">+0.18%</div>
              </div>
              <div class="market-row">
                <div><div class="mr-sym">BTC/USD</div><div class="mr-name">Bitcoin</div></div>
                <div class="mr-price" style="color:#fff;">82,431</div>
                <div class="mr-chg up">+2.14%</div>
              </div>
              <div class="market-row">
                <div><div class="mr-sym">XAU/USD</div><div class="mr-name">Gold Spot</div></div>
                <div class="mr-price" style="color:#fff;">2,641.80</div>
                <div class="mr-chg up">+0.44%</div>
              </div>
              <div class="market-row">
                <div><div class="mr-sym">US500</div><div class="mr-name">S&amp;P 500</div></div>
                <div class="mr-price" style="color:#fff;">5,482.8</div>
                <div class="mr-chg down">−0.22%</div>
              </div>
              <div class="market-row">
                <div><div class="mr-sym">TSLA</div><div class="mr-name">Tesla Inc.</div></div>
                <div class="mr-price" style="color:#fff;">189.24</div>
                <div class="mr-chg up">+1.08%</div>
              </div>
              <div class="market-row">
                <div><div class="mr-sym">WTI</div><div class="mr-name">Crude Oil</div></div>
                <div class="mr-price" style="color:#fff;">72.48</div>
                <div class="mr-chg down">−0.61%</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="hero-slide slide-2" style="background-image:url('https://picsum.photos/seed/trading2/1600/900');display:none;" data-slide="1">
      <div class="grid-overlay"></div>
      <div class="container hero-content">
        <div class="row">
          <div class="col-lg-6">
            <div class="hero-eyebrow">PAMM &amp; Copy Trading</div>
            <h1 class="hero-title violet fu fu1">
              Let top traders<br>work for<br><em>you.</em>
            </h1>
            <p class="hero-sub fu fu2">Copy-trading and PAMM accounts let you automatically follow the strategies of the platform's best-performing managers — and earn the same returns they do.</p>
            <div class="hero-btns fu fu3">
              <a href="pamm.html" class="btn-hero-primary">Explore PAMM</a>
              <a href="#copy" class="btn-hero-outline">Browse Managers</a>
            </div>
            <div class="trust-row fu fu4">
              <div class="trust-badge"><i class="uil uil-percentage" style="color:#a78bfa;"></i> Up to 50% perf. fee</div>
              <div class="trust-badge"><i class="uil uil-chart-growth" style="color:var(--green);"></i> 142+ active managers</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="hero-slide slide-3" style="background-image:url('https://picsum.photos/seed/trading3/1600/900');display:none;" data-slide="2">
      <div class="grid-overlay"></div>
      <div class="container hero-content">
        <div class="row">
          <div class="col-lg-6">
            <div class="hero-eyebrow">Refer &amp; Earn</div>
            <h1 class="hero-title sky fu fu1">
              Invite friends.<br>Earn up to<br><em>5% forever.</em>
            </h1>
            <p class="hero-sub fu fu2">Our referral programme pays you a percentage of every trading fee your invitees generate — for as long as they trade. No cap, no expiry.</p>
            <div class="hero-btns fu fu3">
              <a href="#" class="btn-hero-primary">Start Referring</a>
              <a href="#" class="btn-hero-outline">View Programme</a>
            </div>
            <div class="trust-row fu fu4">
              <div class="trust-badge"><i class="uil uil-users-alt" style="color:#38bdf8;"></i> Unlimited referrals</div>
              <div class="trust-badge"><i class="uil uil-money-withdraw" style="color:var(--green);"></i> Paid weekly</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 4 -->
    <div class="hero-slide slide-4" style="background-image:url('https://picsum.photos/seed/trading4/1600/900');display:none;" data-slide="3">
      <div class="grid-overlay"></div>
      <div class="container hero-content">
        <div class="row">
          <div class="col-lg-6">
            <div class="hero-eyebrow">Earn on Your Crypto</div>
            <h1 class="hero-title green fu fu1">
              Earn up to<br>14% APY on<br><em>your deposits.</em>
            </h1>
            <p class="hero-sub fu fu2">Deposit your crypto and earn attractive daily returns. Interest is credited every 24 hours and your assets are never locked — add or withdraw at any time.</p>
            <div class="hero-btns fu fu3">
              <a href="#" class="btn-hero-primary">Start Earning</a>
              <a href="#" class="btn-hero-outline">View Rates</a>
            </div>
            <div class="trust-row fu fu4">
              <div class="trust-badge"><i class="uil uil-clock" style="color:#34d399;"></i> Paid daily</div>
              <div class="trust-badge"><i class="uil uil-exit" style="color:var(--green);"></i> No lock-up period</div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Dots & Controls -->
  <div class="carousel-dots">
    <div class="cdot active" onclick="goSlide(0)"></div>
    <div class="cdot" onclick="goSlide(1)"></div>
    <div class="cdot" onclick="goSlide(2)"></div>
    <div class="cdot" onclick="goSlide(3)"></div>
  </div>
  <div class="carousel-ctrl prev" onclick="prevSlide()"><i class="uil uil-angle-left"></i></div>
  <div class="carousel-ctrl next" onclick="nextSlide()"><i class="uil uil-angle-right"></i></div>
</section>

<!-- ── TICKER ── -->
<div class="ticker-bg">
  <div class="ticker-track">
    <span class="ticker-item"><span class="tl">EUR/USD</span><span class="tv">1.08701</span><span class="tu">+0.18%</span></span>
    <span class="ticker-item"><span class="tl">GBP/USD</span><span class="tv">1.26820</span><span class="td">−0.09%</span></span>
    <span class="ticker-item"><span class="tl">BTC/USD</span><span class="tv">82,431</span><span class="tu">+2.14%</span></span>
    <span class="ticker-item"><span class="tl">ETH/USD</span><span class="tv">3,124</span><span class="tu">+1.82%</span></span>
    <span class="ticker-item"><span class="tl">XAU/USD</span><span class="tv">2,641.80</span><span class="tu">+0.44%</span></span>
    <span class="ticker-item"><span class="tl">US500</span><span class="tv">5,482.8</span><span class="td">−0.22%</span></span>
    <span class="ticker-item"><span class="tl">WTI</span><span class="tv">72.48</span><span class="td">−0.61%</span></span>
    <span class="ticker-item"><span class="tl">NVDA</span><span class="tv">876.40</span><span class="tu">+3.41%</span></span>
    <span class="ticker-item"><span class="tl">USD/JPY</span><span class="tv">149.848</span><span class="tu">+0.32%</span></span>
    <span class="ticker-item"><span class="tl">SOL/USD</span><span class="tv">168.22</span><span class="tu">+4.18%</span></span>
    <!-- dupe -->
    <span class="ticker-item"><span class="tl">EUR/USD</span><span class="tv">1.08701</span><span class="tu">+0.18%</span></span>
    <span class="ticker-item"><span class="tl">GBP/USD</span><span class="tv">1.26820</span><span class="td">−0.09%</span></span>
    <span class="ticker-item"><span class="tl">BTC/USD</span><span class="tv">82,431</span><span class="tu">+2.14%</span></span>
    <span class="ticker-item"><span class="tl">ETH/USD</span><span class="tv">3,124</span><span class="tu">+1.82%</span></span>
    <span class="ticker-item"><span class="tl">XAU/USD</span><span class="tv">2,641.80</span><span class="tu">+0.44%</span></span>
    <span class="ticker-item"><span class="tl">US500</span><span class="tv">5,482.8</span><span class="td">−0.22%</span></span>
    <span class="ticker-item"><span class="tl">WTI</span><span class="tv">72.48</span><span class="td">−0.61%</span></span>
    <span class="ticker-item"><span class="tl">NVDA</span><span class="tv">876.40</span><span class="tu">+3.41%</span></span>
    <span class="ticker-item"><span class="tl">USD/JPY</span><span class="tv">149.848</span><span class="tu">+0.32%</span></span>
    <span class="ticker-item"><span class="tl">SOL/USD</span><span class="tv">168.22</span><span class="tu">+4.18%</span></span>
  </div>
</div>

<!-- ── NUMBERS STRIP ── -->
<div class="numbers-strip">
  <div class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">1.2<sup>M</sup></div>
        <div class="num-desc">Active Traders</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">$4.8<sup>B</sup></div>
        <div class="num-desc">Assets Under Management</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">1,200<sup>+</sup></div>
        <div class="num-desc">Tradable Instruments</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">170<sup>+</sup></div>
        <div class="num-desc">Countries Served</div>
      </div>
    </div>
  </div>
</div>

<!-- ── MARKET OVERVIEW ── -->
<section class="market-overview py-5">
  <div class="container py-3">
    <div class="row align-items-end g-4 mb-4">
      <div class="col-lg-6">
        <div class="section-tag">Markets</div>
        <h2 class="section-title">Trade Bitcoin, Gold,<br>S&amp;P 500 &amp; 1,200+ assets.</h2>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <p style="font-size:0.9rem;color:var(--muted);line-height:1.8;">Access Forex, Crypto, Shares, Indices, Energies, and Metals from a single account. Quick registration. Start trading in minutes.</p>
        <a href="#" class="btn-hero-primary d-inline-block mt-3" style="font-size:0.75rem;padding:0.65rem 1.6rem;">Open Free Account</a>
      </div>
    </div>
    <div class="market-table-wrap">
      <div class="tab-bar">
        <button class="tab-btn active" onclick="switchMTab(event,'mt-crypto')">Crypto</button>
        <button class="tab-btn" onclick="switchMTab(event,'mt-forex')">Forex</button>
        <button class="tab-btn" onclick="switchMTab(event,'mt-indices')">Indices</button>
        <button class="tab-btn" onclick="switchMTab(event,'mt-metals')">Metals</button>
        <button class="tab-btn" onclick="switchMTab(event,'mt-shares')">Shares</button>
      </div>
      <!-- Crypto -->
      <div id="mt-crypto" class="tab-panel active">
        <table class="table table-borderless mb-0">
          <thead><tr><th>Asset</th><th>Price</th><th>24h Change</th><th>Market Cap</th><th>Spread</th><th>Leverage</th></tr></thead>
          <tbody>
            <tr><td class="sym-cell">BTC/USD <span style="font-size:0.68rem;color:var(--muted);">Bitcoin</span></td><td class="price-cell">$82,431</td><td><span class="chg-pill up">+2.14%</span></td><td style="color:var(--muted);font-size:0.84rem;">$1.62T</td><td style="color:#22c55e;font-size:0.84rem;">$36</td><td style="color:var(--muted);font-size:0.82rem;">200:1</td></tr>
            <tr><td class="sym-cell">ETH/USD <span style="font-size:0.68rem;color:var(--muted);">Ethereum</span></td><td class="price-cell">$3,124</td><td><span class="chg-pill up">+1.82%</span></td><td style="color:var(--muted);font-size:0.84rem;">$375B</td><td style="color:#22c55e;font-size:0.84rem;">$3.00</td><td style="color:var(--muted);font-size:0.82rem;">200:1</td></tr>
            <tr><td class="sym-cell">SOL/USD <span style="font-size:0.68rem;color:var(--muted);">Solana</span></td><td class="price-cell">$168.22</td><td><span class="chg-pill up">+4.18%</span></td><td style="color:var(--muted);font-size:0.84rem;">$77B</td><td style="color:#22c55e;font-size:0.84rem;">$1.60</td><td style="color:var(--muted);font-size:0.82rem;">200:1</td></tr>
            <tr><td class="sym-cell">BNB/USD <span style="font-size:0.68rem;color:var(--muted);">BNB</span></td><td class="price-cell">$412.80</td><td><span class="chg-pill down">−0.44%</span></td><td style="color:var(--muted);font-size:0.84rem;">$61B</td><td style="color:#22c55e;font-size:0.84rem;">$1.20</td><td style="color:var(--muted);font-size:0.82rem;">200:1</td></tr>
            <tr><td class="sym-cell">XRP/USD <span style="font-size:0.68rem;color:var(--muted);">Ripple</span></td><td class="price-cell">$0.6142</td><td><span class="chg-pill up">+1.12%</span></td><td style="color:var(--muted);font-size:0.84rem;">$34B</td><td style="color:#22c55e;font-size:0.84rem;">$0.008</td><td style="color:var(--muted);font-size:0.82rem;">200:1</td></tr>
          </tbody>
        </table>
      </div>
      <!-- Forex -->
      <div id="mt-forex" class="tab-panel">
        <table class="table table-borderless mb-0">
          <thead><tr><th>Pair</th><th>Bid</th><th>Ask</th><th>Spread</th><th>Daily Change</th><th>Leverage</th></tr></thead>
          <tbody>
            <tr><td class="sym-cell">EUR/USD</td><td class="price-cell">1.08698</td><td class="price-cell" style="color:var(--green);">1.08701</td><td style="color:var(--green);font-size:0.84rem;">0.3</td><td><span class="chg-pill up">+0.18%</span></td><td style="color:var(--muted);font-size:0.82rem;">500:1</td></tr>
            <tr><td class="sym-cell">GBP/USD</td><td class="price-cell">1.26814</td><td class="price-cell" style="color:var(--green);">1.26820</td><td style="color:var(--green);font-size:0.84rem;">0.6</td><td><span class="chg-pill down">−0.09%</span></td><td style="color:var(--muted);font-size:0.82rem;">500:1</td></tr>
            <tr><td class="sym-cell">USD/JPY</td><td class="price-cell">149.840</td><td class="price-cell" style="color:var(--green);">149.848</td><td style="color:var(--green);font-size:0.84rem;">0.8</td><td><span class="chg-pill up">+0.32%</span></td><td style="color:var(--muted);font-size:0.82rem;">500:1</td></tr>
            <tr><td class="sym-cell">AUD/USD</td><td class="price-cell">0.65312</td><td class="price-cell" style="color:var(--green);">0.65318</td><td style="color:var(--green);font-size:0.84rem;">0.6</td><td><span class="chg-pill down">−0.14%</span></td><td style="color:var(--muted);font-size:0.82rem;">500:1</td></tr>
            <tr><td class="sym-cell">USD/CHF</td><td class="price-cell">0.89102</td><td class="price-cell" style="color:var(--green);">0.89110</td><td style="color:var(--green);font-size:0.84rem;">0.8</td><td><span class="chg-pill up">+0.06%</span></td><td style="color:var(--muted);font-size:0.82rem;">500:1</td></tr>
          </tbody>
        </table>
      </div>
      <!-- Indices -->
      <div id="mt-indices" class="tab-panel">
        <table class="table table-borderless mb-0">
          <thead><tr><th>Index</th><th>Price</th><th>Change</th><th>Spread</th><th>Leverage</th><th>Hours</th></tr></thead>
          <tbody>
            <tr><td class="sym-cell">US500</td><td class="price-cell">5,482.8</td><td><span class="chg-pill down">−0.22%</span></td><td style="color:var(--green);font-size:0.84rem;">0.8 pt</td><td style="color:var(--muted);font-size:0.82rem;">100:1</td><td style="color:var(--muted);font-size:0.82rem;">23/5</td></tr>
            <tr><td class="sym-cell">US30</td><td class="price-cell">38,840</td><td><span class="chg-pill up">+0.14%</span></td><td style="color:var(--green);font-size:0.84rem;">2.0 pt</td><td style="color:var(--muted);font-size:0.82rem;">100:1</td><td style="color:var(--muted);font-size:0.82rem;">23/5</td></tr>
            <tr><td class="sym-cell">USTEC</td><td class="price-cell">19,244</td><td><span class="chg-pill up">+0.62%</span></td><td style="color:var(--green);font-size:0.84rem;">1.6 pt</td><td style="color:var(--muted);font-size:0.82rem;">100:1</td><td style="color:var(--muted);font-size:0.82rem;">23/5</td></tr>
            <tr><td class="sym-cell">UK100</td><td class="price-cell">8,124</td><td><span class="chg-pill down">−0.38%</span></td><td style="color:var(--green);font-size:0.84rem;">2.0 pt</td><td style="color:var(--muted);font-size:0.82rem;">100:1</td><td style="color:var(--muted);font-size:0.82rem;">Session</td></tr>
            <tr><td class="sym-cell">GER40</td><td class="price-cell">17,882</td><td><span class="chg-pill up">+0.28%</span></td><td style="color:var(--green);font-size:0.84rem;">1.6 pt</td><td style="color:var(--muted);font-size:0.82rem;">100:1</td><td style="color:var(--muted);font-size:0.82rem;">Session</td></tr>
          </tbody>
        </table>
      </div>
      <!-- Metals -->
      <div id="mt-metals" class="tab-panel">
        <table class="table table-borderless mb-0">
          <thead><tr><th>Metal</th><th>Price</th><th>Change</th><th>Spread</th><th>Leverage</th><th>Session</th></tr></thead>
          <tbody>
            <tr><td class="sym-cell">XAU/USD <span style="font-size:0.68rem;color:var(--muted);">Gold</span></td><td class="price-cell">$2,641.80</td><td><span class="chg-pill up">+0.44%</span></td><td style="color:var(--green);font-size:0.84rem;">$0.40</td><td style="color:var(--muted);font-size:0.82rem;">500:1</td><td style="color:var(--muted);font-size:0.82rem;">24/5</td></tr>
            <tr><td class="sym-cell">XAG/USD <span style="font-size:0.68rem;color:var(--muted);">Silver</span></td><td class="price-cell">$29.44</td><td><span class="chg-pill down">−0.22%</span></td><td style="color:var(--green);font-size:0.84rem;">$0.04</td><td style="color:var(--muted);font-size:0.82rem;">500:1</td><td style="color:var(--muted);font-size:0.82rem;">24/5</td></tr>
            <tr><td class="sym-cell">XPT/USD <span style="font-size:0.68rem;color:var(--muted);">Platinum</span></td><td class="price-cell">$980.20</td><td><span class="chg-pill up">+0.88%</span></td><td style="color:var(--green);font-size:0.84rem;">$4.00</td><td style="color:var(--muted);font-size:0.82rem;">100:1</td><td style="color:var(--muted);font-size:0.82rem;">24/5</td></tr>
            <tr><td class="sym-cell">Copper</td><td class="price-cell">$4.22</td><td><span class="chg-pill up">+1.14%</span></td><td style="color:var(--green);font-size:0.84rem;">$0.006</td><td style="color:var(--muted);font-size:0.82rem;">100:1</td><td style="color:var(--muted);font-size:0.82rem;">24/5</td></tr>
          </tbody>
        </table>
      </div>
      <!-- Shares -->
      <div id="mt-shares" class="tab-panel">
        <table class="table table-borderless mb-0">
          <thead><tr><th>Stock</th><th>Price</th><th>Change</th><th>Exchange</th><th>Commission</th><th>Leverage</th></tr></thead>
          <tbody>
            <tr><td class="sym-cell">AAPL <span style="font-size:0.68rem;color:var(--muted);">Apple</span></td><td class="price-cell">$189.24</td><td><span class="chg-pill up">+0.54%</span></td><td style="color:var(--muted);font-size:0.82rem;">NASDAQ</td><td style="color:var(--green);font-size:0.84rem;">0%</td><td style="color:var(--muted);font-size:0.82rem;">20:1</td></tr>
            <tr><td class="sym-cell">MSFT <span style="font-size:0.68rem;color:var(--muted);">Microsoft</span></td><td class="price-cell">$414.62</td><td><span class="chg-pill up">+0.22%</span></td><td style="color:var(--muted);font-size:0.82rem;">NASDAQ</td><td style="color:var(--green);font-size:0.84rem;">0%</td><td style="color:var(--muted);font-size:0.82rem;">20:1</td></tr>
            <tr><td class="sym-cell">NVDA <span style="font-size:0.68rem;color:var(--muted);">NVIDIA</span></td><td class="price-cell">$876.40</td><td><span class="chg-pill up">+3.41%</span></td><td style="color:var(--muted);font-size:0.82rem;">NASDAQ</td><td style="color:var(--green);font-size:0.84rem;">0%</td><td style="color:var(--muted);font-size:0.82rem;">20:1</td></tr>
            <tr><td class="sym-cell">TSLA <span style="font-size:0.68rem;color:var(--muted);">Tesla</span></td><td class="price-cell">$189.24</td><td><span class="chg-pill up">+1.08%</span></td><td style="color:var(--muted);font-size:0.82rem;">NASDAQ</td><td style="color:var(--green);font-size:0.84rem;">0%</td><td style="color:var(--muted);font-size:0.82rem;">20:1</td></tr>
            <tr><td class="sym-cell">AMZN <span style="font-size:0.68rem;color:var(--muted);">Amazon</span></td><td class="price-cell">$192.08</td><td><span class="chg-pill down">−0.32%</span></td><td style="color:var(--muted);font-size:0.82rem;">NASDAQ</td><td style="color:var(--green);font-size:0.84rem;">0%</td><td style="color:var(--muted);font-size:0.82rem;">20:1</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- ── PRODUCT CARDS ── -->
<section class="py-5" style="background:var(--dark);">
  <div class="container py-3">
    <div class="text-center mb-5">
      <div class="section-tag d-inline-flex">Get Started</div>
      <h2 class="section-title mt-1">Choose the product<br>that fits your goals.</h2>
    </div>
    <div class="row g-3">
      <div class="col-md-6 col-lg-3">
        <div class="product-card pc-red">
          <img src="https://picsum.photos/seed/crypto/600/400" class="pc-img" alt="Buy Crypto">
          <div class="pc-body">
            <div class="pc-badge pb-red">Crypto</div>
            <div class="pc-title">Buy crypto at real price</div>
            <p class="pc-text">Purchase BTC, ETH, SOL and 50+ digital currencies instantly with card or bank transfer.</p>
            <a href="#" class="pc-btn pcb-red">Buy Crypto</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="product-card pc-violet">
          <img src="https://picsum.photos/seed/chart/600/400" class="pc-img" alt="Trade">
          <div class="pc-body">
            <div class="pc-badge pb-violet">CFD Trading</div>
            <div class="pc-title">Trade with low fees</div>
            <p class="pc-text">1,200+ instruments, 0.0 pip raw spreads, 500:1 leverage, and 0.1ms execution.</p>
            <a href="#" class="pc-btn pcb-ghost">Start Trading</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="product-card pc-sky">
          <img src="https://picsum.photos/seed/pamm/600/400" class="pc-img" alt="Copy">
          <div class="pc-body">
            <div class="pc-badge pb-sky">PAMM</div>
            <div class="pc-title">Copy top traders</div>
            <p class="pc-text">Allocate to verified managers and receive the same returns automatically. Min $100.</p>
            <a href="pamm.html" class="pc-btn pcb-ghost">Explore PAMM</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="product-card pc-green">
          <img src="https://picsum.photos/seed/earn/600/400" class="pc-img" alt="Earn">
          <div class="pc-body">
            <div class="pc-badge pb-green">Earn</div>
            <div class="pc-title">Earn 14% APY on crypto</div>
            <p class="pc-text">Interest paid daily. No lock-up. No minimum holding period. Add or withdraw freely.</p>
            <a href="#" class="pc-btn pcb-ghost">Start Earning</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── PERFORMANCE STRIP ── -->
<section class="perf-strip">
  <div class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-6 col-md-3 perf-item">
        <div class="perf-num">0.1<span style="font-size:1.4rem;color:var(--red-bright);">ms</span></div>
        <div class="perf-sub">Order execution speed</div>
      </div>
      <div class="col-6 col-md-3 perf-item">
        <div class="perf-num">12<span style="font-size:1.4rem;color:var(--red-bright);">K</span></div>
        <div class="perf-sub">Orders per second</div>
      </div>
      <div class="col-6 col-md-3 perf-item">
        <div class="perf-num">12<span style="font-size:1.4rem;color:var(--red-bright);">+</span></div>
        <div class="perf-sub">Liquidity providers</div>
      </div>
      <div class="col-6 col-md-3 perf-item">
        <div class="perf-num">99.9<span style="font-size:1.4rem;color:var(--red-bright);">%</span></div>
        <div class="perf-sub">Platform uptime</div>
      </div>
    </div>
  </div>
</section>

<!-- ── COPY TRADING ── -->
<section class="copy-trading py-5" id="copy">
  <div class="container py-3">
    <div class="row align-items-center g-5">
      <div class="col-lg-5">
        <div class="section-tag">PAMM &amp; Copy Trading</div>
        <h2 class="section-title">Copy leading traders.<br>Same returns.</h2>
        <div class="mt-4" style="display:flex;flex-direction:column;gap:1.8rem;">
          <div>
            <div style="font-size:1.05rem;font-weight:500;color:#fff;margin-bottom:0.4rem;">New to trading?</div>
            <p style="font-size:0.88rem;color:var(--muted);line-height:1.8;">Browse 140+ verified managers, pick a strategy, and automatically mirror their trades. Get the same returns without placing a single order yourself.</p>
          </div>
          <div>
            <div style="font-size:1.05rem;font-weight:500;color:#fff;margin-bottom:0.4rem;">Experienced trader?</div>
            <p style="font-size:0.88rem;color:var(--muted);line-height:1.8;">Register as a PAMM manager, set your performance fee, and grow your AUM. Earn up to 50% of every profit you generate for your investors.</p>
          </div>
        </div>
        <div class="d-flex gap-3 mt-4">
          <a href="pamm.html" class="btn-hero-primary">Explore PAMM</a>
          <a href="#" class="btn-hero-outline">Become a Manager</a>
        </div>
      </div>
      <div class="col-lg-6 offset-lg-1">
        <div style="font-size:0.68rem;letter-spacing:0.2em;text-transform:uppercase;color:var(--muted);margin-bottom:1rem;">Top Performing Managers — YTD</div>
        <div class="copy-trader-row">
          <div class="ct-avatar" style="background:linear-gradient(135deg,#a78bfa,#7c3aed);color:#fff;">AK</div>
          <div><div class="ct-name">Alpha King</div><div class="ct-strat">FX Majors · Swing · AUM $4.8M</div></div>
          <div class="ct-roi">+184.2%</div>
          <a href="pamm.html" class="ct-copy">Invest</a>
        </div>
        <div class="copy-trader-row">
          <div class="ct-avatar" style="background:linear-gradient(135deg,#34d399,#059669);color:#fff;">TF</div>
          <div><div class="ct-name">TrendForge</div><div class="ct-strat">Multi-asset · Trend · AUM $8.2M</div></div>
          <div class="ct-roi">+141.8%</div>
          <a href="pamm.html" class="ct-copy">Invest</a>
        </div>
        <div class="copy-trader-row">
          <div class="ct-avatar" style="background:linear-gradient(135deg,#fbbf24,#d97706);color:#fff;">QT</div>
          <div><div class="ct-name">QuantTrade Pro</div><div class="ct-strat">Algorithmic · Low DD · AUM $12.1M</div></div>
          <div class="ct-roi">+98.4%</div>
          <a href="pamm.html" class="ct-copy">Invest</a>
        </div>
        <div class="copy-trader-row">
          <div class="ct-avatar" style="background:linear-gradient(135deg,#f472b6,#db2777);color:#fff;">SH</div>
          <div><div class="ct-name">SilkRoute FX</div><div class="ct-strat">Carry Trade · AUM $3.4M</div></div>
          <div class="ct-roi">+76.3%</div>
          <a href="pamm.html" class="ct-copy">Invest</a>
        </div>
        <div style="text-align:right;margin-top:1rem;">
          <a href="pamm.html" style="font-size:0.75rem;letter-spacing:0.12em;text-transform:uppercase;color:var(--muted);text-decoration:none;display:inline-flex;align-items:center;gap:6px;transition:color 0.15s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--muted)'">
            View all 142 managers <i class="uil uil-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── WHY US ── -->
<section class="py-5" style="background:var(--dark);border-top:1px solid var(--border);">
  <div class="container py-3">
    <div class="text-center mb-5">
      <div class="section-tag d-inline-flex">Why Tesla Invest</div>
      <h2 class="section-title mt-1">Everything serious<br>traders demand.</h2>
    </div>
    <div class="row g-3">
      <div class="col-md-6 col-lg-3">
        <div class="why-card">
          <div class="wc-icon"><i class="uil uil-bolt"></i></div>
          <div class="wc-title">0.1ms Execution</div>
          <p class="wc-text">Co-located matching engine. No requotes. No dealing desk. Every fill logged and auditable.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="why-card">
          <div class="wc-icon"><i class="uil uil-shield-check"></i></div>
          <div class="wc-title">4 Regulatory Licences</div>
          <p class="wc-text">FCA · CySEC · ASIC · FSCA. All client funds segregated. Compensation up to £85,000.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="why-card">
          <div class="wc-icon"><i class="uil uil-money-bill"></i></div>
          <div class="wc-title">0.0 Pip Spreads</div>
          <p class="wc-text">Raw interbank pricing from 0.0 pips. No markup, no artificial widening, ever.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="why-card">
          <div class="wc-icon"><i class="uil uil-headphones-alt"></i></div>
          <div class="wc-title">24/5 Human Support</div>
          <p class="wc-text">18 languages. Live chat, WhatsApp, email, phone. &lt;2 min avg. first response time.</p>
        </div>
      </div>
    </div>
    <div class="text-center mt-4">
      <a href="why-us.html" class="btn-hero-outline">See All Reasons</a>
    </div>
  </div>
</section>

<!-- ── PLATFORMS ── -->
<section class="platforms-section py-5" style="background:var(--dark2);">
  <div class="container py-3">
    <div class="row align-items-end g-4 mb-4">
      <div class="col-lg-5">
        <div class="section-tag">Available On</div>
        <h2 class="section-title">One platform.<br>Every device.</h2>
      </div>
      <div class="col-lg-5 offset-lg-2">
        <p style="font-size:0.88rem;color:var(--muted);line-height:1.8;">Trade from anywhere — your browser, desktop, iPhone, or Android. Full feature parity across all devices.</p>
      </div>
    </div>
    <div class="row g-3">
      <div class="col-sm-6 col-lg-3">
        <div class="platform-badge">
          <div class="plat-icon">🌐</div>
          <div>
            <div class="plat-name">Web Trader</div>
            <div class="plat-desc">Full platform in any browser. No download required.</div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="platform-badge">
          <div class="plat-icon">🖥️</div>
          <div>
            <div class="plat-name">Desktop App</div>
            <div class="plat-desc">Windows &amp; macOS. Advanced charting &amp; alerts.</div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="platform-badge">
          <div class="plat-icon">📱</div>
          <div>
            <div class="plat-name">iOS App</div>
            <div class="plat-desc">iPhone &amp; iPad. Trade, monitor, manage from anywhere.</div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="platform-badge">
          <div class="plat-icon">🤖</div>
          <div>
            <div class="plat-name">Android App</div>
            <div class="plat-desc">All Android devices. Real-time push notifications.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── AS SEEN ON ── -->
<section class="seen-on py-5">
  <div class="container py-2">
    <p style="font-size:0.68rem;letter-spacing:0.3em;text-transform:uppercase;color:rgba(255,255,255,0.2);text-align:center;margin-bottom:2.4rem;">As Seen On</p>
    <div class="d-flex align-items-center justify-content-center flex-wrap gap-5">
      <span class="seen-logo-text">Bloomberg</span>
      <span class="seen-logo-text">Reuters</span>
      <span class="seen-logo-text">Forbes</span>
      <span class="seen-logo-text">FT</span>
      <span class="seen-logo-text">CoinDesk</span>
      <span class="seen-logo-text">Finance Magnates</span>
    </div>
  </div>
</section>

<!-- ── CTA BAND ── -->
<section class="cta-band">
  <div class="cta-grid"></div>
  <div class="container" style="position:relative;z-index:1;">
    <div class="section-tag d-inline-flex">Start Today</div>
    <h2 class="section-title mt-1 mx-auto" style="max-width:560px;text-align:center;">
      1,200+ markets.<br>One account. <em style="font-style:italic;background:linear-gradient(135deg,var(--red-bright),#ff8096,var(--red-bright));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">No limits.</em>
    </h2>
    <p style="font-size:0.95rem;color:var(--muted);line-height:1.8;max-width:420px;margin:1.2rem auto 2.2rem;text-align:center;">
      Open a live account in under 5 minutes, or start risk-free with a $10,000 demo — no deposit, no commitment, no time limit.
    </p>
    <div class="d-flex gap-3 justify-content-center flex-wrap">
      <a href="#" class="btn-hero-primary">Open Live Account</a>
      <a href="#" class="btn-hero-outline">Try Demo Free</a>
    </div>
    <div class="d-flex gap-5 justify-content-center flex-wrap mt-4">
      <div class="trust-badge"><i class="uil uil-shield-check" style="color:var(--green);"></i> FCA Regulated</div>
      <div class="trust-badge"><i class="uil uil-lock-alt" style="color:var(--gold);"></i> Segregated Funds</div>
      <div class="trust-badge"><i class="uil uil-clock" style="color:var(--sky);"></i> 5-min account opening</div>
      <div class="trust-badge"><i class="uil uil-heart" style="color:var(--red-bright);"></i> 1.2M+ happy traders</div>
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
        <div class="d-flex gap-3 mt-3">
          <a href="#" style="width:34px;height:34px;border-radius:50%;background:var(--mid);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;color:var(--muted);font-size:1rem;transition:all 0.15s;text-decoration:none;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--muted)'"><i class="uil uil-twitter-alt"></i></a>
          <a href="#" style="width:34px;height:34px;border-radius:50%;background:var(--mid);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;color:var(--muted);font-size:1rem;transition:all 0.15s;text-decoration:none;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--muted)'"><i class="uil uil-instagram"></i></a>
          <a href="#" style="width:34px;height:34px;border-radius:50%;background:var(--mid);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;color:var(--muted);font-size:1rem;transition:all 0.15s;text-decoration:none;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--muted)'"><i class="uil uil-linkedin"></i></a>
          <a href="#" style="width:34px;height:34px;border-radius:50%;background:var(--mid);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;color:var(--muted);font-size:1.1rem;transition:all 0.15s;text-decoration:none;" onmouseover="this.style.color='#25d366'" onmouseout="this.style.color='var(--muted)'"><i class="uil uil-whatsapp"></i></a>
        </div>
      </div>
      <x-footer />
    </div>
    <div class="footer-bottom mt-5">
      <p>© <span id="year"></span> TESLA INVEST. All rights reserved. CFD trading carries significant risk of loss. 76% of retail investor accounts lose money. This is a fictional demo site.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  /* ── PRELOADER ── */
  window.addEventListener('load', () => {
    setTimeout(() => {
      const pre = document.getElementById('preloader');
      pre.style.transition = 'opacity 0.5s ease';
      pre.style.opacity = '0';
      setTimeout(() => pre.style.display = 'none', 500);
    }, 900);
  });

  document.getElementById('year').textContent = new Date().getFullYear();

  /* ── HERO CAROUSEL ── */
  let currentSlide = 0;
  const slides = document.querySelectorAll('#heroSlides .hero-slide');
  const dots   = document.querySelectorAll('.cdot');
  let autoTimer;

  function goSlide(n) {
    slides[currentSlide].style.display = 'none';
    dots[currentSlide].classList.remove('active');
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].style.display = 'flex';
    dots[currentSlide].classList.add('active');
  }
  function nextSlide() { clearInterval(autoTimer); goSlide(currentSlide + 1); startAuto(); }
  function prevSlide() { clearInterval(autoTimer); goSlide(currentSlide - 1); startAuto(); }
  function startAuto() { autoTimer = setInterval(() => goSlide(currentSlide + 1), 5000); }
  startAuto();

  /* ── MARKET TABS ── */
  function switchMTab(e, id) {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
    e.target.classList.add('active');
    document.getElementById(id).classList.add('active');
  }
</script>
</body>
</html>
