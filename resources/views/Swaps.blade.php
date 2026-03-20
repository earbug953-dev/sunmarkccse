<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Swaps — Tesla Invest</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    :root {
      --accent: #0ea5e9;
      --accent-dim: rgba(14,165,233,0.10);
      --accent-glow: rgba(14,165,233,0.05);
      --accent-bright: #38bdf8;
      --dark: #0c0c0e;
      --dark2: #141416;
      --dark3: #0e0e11;
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
    .swaps-hero {
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
        radial-gradient(ellipse 65% 60% at 70% 45%, rgba(14,165,233,0.07) 0%, transparent 60%),
        radial-gradient(ellipse 40% 50% at 5% 80%, rgba(14,165,233,0.04) 0%, transparent 55%),
        radial-gradient(ellipse 30% 35% at 88% 12%, rgba(56,189,248,0.04) 0%, transparent 55%);
    }
    .grid-overlay {
      position: absolute; inset: 0; pointer-events: none;
      background-image:
        linear-gradient(to right, rgba(14,165,233,0.032) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(14,165,233,0.032) 1px, transparent 1px);
      background-size: 56px 56px;
    }

    /* Floating rate particles — gentle upward drift */
    .rate-float {
      position: absolute;
      font-family: 'Cormorant Garamond', serif;
      font-size: 0.78rem;
      color: rgba(56,189,248,0.18);
      pointer-events: none;
      animation: floatUp linear infinite;
      white-space: nowrap;
      letter-spacing: 0.08em;
    }
    @keyframes floatUp {
      0%   { transform: translateY(0);     opacity: 0; }
      10%  { opacity: 1; }
      90%  { opacity: 0.6; }
      100% { transform: translateY(-320px); opacity: 0; }
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
    .ticker-pair  { color: rgba(255,255,255,0.45); }
    .ticker-price { color: #fff; }
    .ticker-pos   { color: var(--green); }
    .ticker-neg   { color: var(--rose); }

    /* Hero text */
    .market-pill {
      display: inline-flex; align-items: center; gap: 6px;
      background: var(--accent-dim);
      border: 1px solid rgba(14,165,233,0.22);
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
      0%,100% { opacity:1; box-shadow: 0 0 0 0 rgba(56,189,248,0.45); }
      50%      { opacity:0.8; box-shadow: 0 0 0 6px rgba(56,189,248,0); }
    }
    .hero-eyebrow {
      font-size: 0.7rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--accent-bright); font-weight: 500;
      display: flex; align-items: center; gap: 12px; margin-bottom: 2rem;
    }
    .hero-eyebrow::before {
      content: ''; display: block; width: 36px; height: 1px;
      background: linear-gradient(90deg, var(--accent), rgba(14,165,233,0.3));
    }
    .hero-title {
      font-size: clamp(3rem, 6.8vw, 5.6rem);
      font-weight: 300; line-height: 1.05; color: #fff; margin-bottom: 2rem;
    }
    .hero-title em {
      font-style: italic;
      background: linear-gradient(135deg, var(--accent-bright), #7dd3fc, var(--accent-bright));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .hero-subtitle {
      font-size: clamp(0.95rem, 2vw, 1.08rem); line-height: 1.85;
      color: var(--muted); max-width: 460px; font-weight: 300;
    }
    .hero-cta-row { display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 2.8rem; }
    .btn-hero-sky {
      background: var(--accent); color: #fff;
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: none; border-radius: 4px;
      text-decoration: none; transition: background 0.2s; display: inline-block; font-weight: 500;
    }
    .btn-hero-sky:hover { background: #0284c7; color: #fff; }
    .btn-hero-ghost {
      background: transparent; color: var(--muted);
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2.2rem; border: 1px solid var(--border); border-radius: 4px;
      text-decoration: none; transition: all 0.2s; display: inline-block;
    }
    .btn-hero-ghost:hover { border-color: rgba(255,255,255,0.25); color: #fff; }

    /* ── SWAP FORMULA CARD ── */
    .formula-card {
      background: var(--dark2);
      border: 1px solid rgba(14,165,233,0.16);
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 32px 72px rgba(0,0,0,0.55), 0 0 50px rgba(14,165,233,0.04);
    }
    .formula-header {
      padding: 1.1rem 1.6rem;
      background: rgba(14,165,233,0.05);
      border-bottom: 1px solid var(--border);
      display: flex; align-items: center; justify-content: space-between;
    }
    .formula-title { font-size: 0.68rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); }
    .formula-live  { font-size: 0.68rem; letter-spacing: 0.14em; color: var(--accent-bright); text-transform: uppercase; }

    /* Formula display */
    .formula-body { padding: 1.8rem 1.6rem; border-bottom: 1px solid var(--border); }
    .formula-eq {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.05rem; font-weight: 300; color: rgba(255,255,255,0.5);
      margin-bottom: 1rem; letter-spacing: 0.04em;
    }
    .formula-eq span { color: var(--accent-bright); font-weight: 400; }
    .formula-result {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.4rem; font-weight: 300; color: #fff; line-height: 1;
    }
    .formula-result small { font-size: 0.9rem; color: var(--muted); margin-left: 8px; }
    .formula-vars {
      display: grid; grid-template-columns: 1fr 1fr; gap: 0.8rem; margin-top: 1.2rem;
    }
    .fvar {
      background: var(--mid); border-radius: 8px; padding: 0.7rem 1rem;
    }
    .fvar-label { font-size: 0.62rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--muted); }
    .fvar-val   { font-size: 0.94rem; color: #fff; font-weight: 500; margin-top: 2px; }

    /* Swap rate rows */
    .swap-row {
      padding: 0.9rem 1.6rem;
      border-bottom: 1px solid var(--border);
      display: grid;
      grid-template-columns: 1fr auto auto auto;
      align-items: center;
      gap: 1rem;
      transition: background 0.15s;
    }
    .swap-row:last-child { border-bottom: none; }
    .swap-row:hover { background: var(--mid); }
    .swap-symbol { font-size: 0.88rem; font-weight: 500; color: #fff; }
    .swap-cat    { font-size: 0.62rem; letter-spacing: 0.1em; text-transform: uppercase; padding: 0.18rem 0.55rem; border-radius: 4px; }
    .swap-cat.fx   { background: rgba(14,165,233,0.1);  color: var(--accent-bright); }
    .swap-cat.xau  { background: rgba(212,168,67,0.1);  color: #d4a843; }
    .swap-cat.idx  { background: rgba(20,184,166,0.10); color: #2dd4bf; }
    .swap-cat.cry  { background: rgba(245,158,11,0.1);  color: var(--amber); }
    .swap-val { font-family: 'Cormorant Garamond', serif; font-size: 1.1rem; text-align: right; min-width: 72px; }
    .swap-val.pos { color: var(--green); }
    .swap-val.neg { color: var(--rose); }
    .swap-label { font-size: 0.6rem; letter-spacing: 0.12em; text-transform: uppercase; color: var(--muted); text-align: right; }

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

    /* ── EXPLAINER CARDS ── */
    .explainer-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 14px; padding: 2rem; height: 100%;
      position: relative; overflow: hidden;
      transition: border-color 0.25s, transform 0.25s;
    }
    .explainer-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0;
      height: 2px;
      background: linear-gradient(90deg, var(--accent), rgba(14,165,233,0.2));
      opacity: 0; transition: opacity 0.25s;
    }
    .explainer-card:hover { border-color: rgba(14,165,233,0.26); transform: translateY(-4px); }
    .explainer-card:hover::before { opacity: 1; }
    .exp-icon {
      width: 46px; height: 46px; border-radius: 10px;
      background: var(--accent-dim);
      display: flex; align-items: center; justify-content: center;
      color: var(--accent-bright); font-size: 1.35rem; margin-bottom: 1.3rem;
    }
    .exp-title { font-family: 'Cormorant Garamond', serif; font-size: 1.35rem; font-weight: 400; color: #fff; margin-bottom: 0.65rem; }
    .exp-text  { font-size: 0.87rem; line-height: 1.8; color: var(--muted); }

    /* ── SWAP TABLE (full) ── */
    .swap-table-wrap {
      background: var(--dark2); border: 1px solid rgba(14,165,233,0.1);
      border-radius: 16px; overflow: hidden;
    }
    .swap-table-wrap table { margin: 0; }
    .swap-table-wrap thead tr { background: rgba(14,165,233,0.04); border-bottom: 1px solid var(--border); }
    .swap-table-wrap thead th {
      font-size: 0.68rem; letter-spacing: 0.2em; text-transform: uppercase;
      color: var(--muted); font-weight: 500; padding: 1rem 1.4rem; border: none;
    }
    .swap-table-wrap tbody tr { border-bottom: 1px solid var(--border); transition: background 0.15s; }
    .swap-table-wrap tbody tr:last-child { border-bottom: none; }
    .swap-table-wrap tbody tr:hover { background: rgba(14,165,233,0.025); }
    .swap-table-wrap tbody td {
      font-size: 0.86rem; color: var(--text);
      padding: 0.9rem 1.4rem; border: none; vertical-align: middle;
    }
    .swap-table-wrap tbody td:first-child { font-weight: 500; color: #fff; }
    .val-pos { color: var(--green); font-weight: 500; }
    .val-neg { color: var(--rose);  font-weight: 500; }

    .cat-pill {
      font-size: 0.6rem; letter-spacing: 0.1em; text-transform: uppercase;
      padding: 0.2rem 0.55rem; border-radius: 4px; margin-left: 0.3rem;
    }
    .pill-fx   { background: rgba(14,165,233,0.1);  color: var(--accent-bright); }
    .pill-xau  { background: rgba(212,168,67,0.1);  color: #d4a843; }
    .pill-idx  { background: rgba(20,184,166,0.10); color: #2dd4bf; }
    .pill-nrg  { background: rgba(249,115,22,0.1);  color: #fb923c; }
    .pill-cry  { background: rgba(245,158,11,0.1);  color: var(--amber); }

    /* Tab nav for the table */
    .table-tabs {
      display: flex; gap: 0.3rem;
      border-bottom: 1px solid var(--border);
      padding: 0.8rem 1.4rem 0;
    }
    .tab-btn {
      font-size: 0.7rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.45rem 0.9rem; border-radius: 6px 6px 0 0;
      background: transparent; color: var(--muted); border: 1px solid transparent;
      border-bottom: none; cursor: pointer; transition: all 0.15s;
    }
    .tab-btn.active {
      background: rgba(14,165,233,0.08);
      color: var(--accent-bright);
      border-color: rgba(14,165,233,0.18);
    }
    .tab-panel { display: none; }
    .tab-panel.active { display: block; }

    /* ── SWAP-FREE SECTION ── */
    .swapfree-section {
      background: linear-gradient(135deg, rgba(14,165,233,0.06) 0%, transparent 55%), var(--dark2);
      border-top: 1px solid rgba(14,165,233,0.12); border-bottom: 1px solid rgba(14,165,233,0.12);
    }
    .swapfree-badge {
      display: inline-flex; align-items: center; gap: 8px;
      background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.2);
      border-radius: 6px; padding: 0.4rem 0.9rem;
      font-size: 0.7rem; letter-spacing: 0.12em; text-transform: uppercase;
      color: var(--green); margin-bottom: 1.5rem;
    }
    .sf-row {
      display: flex; align-items: flex-start; gap: 1.4rem;
      padding: 1.6rem 0; border-bottom: 1px solid var(--border);
    }
    .sf-row:last-child { border-bottom: none; }
    .sf-icon {
      width: 42px; height: 42px; border-radius: 10px;
      background: var(--green-dim);
      display: flex; align-items: center; justify-content: center;
      color: var(--green); font-size: 1.2rem; flex-shrink: 0;
    }
    .sf-title { font-size: 0.96rem; font-weight: 500; color: #fff; margin-bottom: 0.3rem; }
    .sf-text  { font-size: 0.86rem; color: var(--muted); line-height: 1.75; margin: 0; }

    /* ── CALCULATOR ── */
    .calc-card {
      background: var(--dark2); border: 1px solid rgba(14,165,233,0.14);
      border-radius: 18px; padding: 2.4rem; overflow: hidden; position: relative;
    }
    .calc-card::before {
      content: '';
      position: absolute; top: 0; left: 0; right: 0;
      height: 2px;
      background: linear-gradient(90deg, var(--accent), rgba(14,165,233,0.3));
    }
    .calc-label {
      font-size: 0.68rem; letter-spacing: 0.2em; text-transform: uppercase;
      color: var(--muted); margin-bottom: 0.4rem;
    }
    .calc-input {
      width: 100%;
      background: var(--mid); border: 1px solid var(--border);
      border-radius: 8px; padding: 0.75rem 1rem;
      font-size: 0.9rem; color: #fff;
      font-family: 'DM Sans', sans-serif;
      margin-bottom: 1.2rem; transition: border-color 0.2s;
    }
    .calc-input:focus { outline: none; border-color: rgba(14,165,233,0.4); }
    .calc-select {
      width: 100%;
      background: var(--mid); border: 1px solid var(--border);
      border-radius: 8px; padding: 0.75rem 1rem;
      font-size: 0.9rem; color: #fff;
      font-family: 'DM Sans', sans-serif;
      margin-bottom: 1.2rem;
      appearance: none; cursor: pointer;
    }
    .calc-select option { background: var(--dark2); }
    .btn-calc {
      width: 100%; background: var(--accent); color: #fff;
      font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem; border: none; border-radius: 8px;
      font-weight: 500; cursor: pointer; transition: background 0.2s;
      font-family: 'DM Sans', sans-serif;
    }
    .btn-calc:hover { background: #0284c7; }
    .calc-result {
      margin-top: 1.4rem;
      padding: 1.2rem;
      background: var(--mid); border-radius: 10px;
      border: 1px solid var(--border);
    }
    .calc-result-label { font-size: 0.65rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--muted); margin-bottom: 0.4rem; }
    .calc-result-value {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2rem; font-weight: 300; color: #fff;
    }
    .calc-result-value.neg { color: var(--rose); }
    .calc-result-value.pos { color: var(--green); }
    .calc-note { font-size: 0.72rem; color: var(--muted); margin-top: 0.5rem; line-height: 1.6; }

    /* ── STEPS ── */
    .steps-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .step-card { display: flex; gap: 1.4rem; align-items: flex-start; padding: 2rem 0; border-bottom: 1px solid var(--border); }
    .step-card:last-child { border-bottom: none; }
    .step-num {
      font-family: 'Cormorant Garamond', serif; font-size: 2.8rem;
      font-weight: 300; color: rgba(14,165,233,0.2); line-height: 1; min-width: 52px;
    }
    .step-title { font-size: 1.05rem; font-weight: 400; color: #fff; margin-bottom: 0.4rem; }
    .step-text  { font-size: 0.86rem; color: var(--muted); line-height: 1.75; margin: 0; }

    /* ── CTA ── */
    .cta-band {
      background: linear-gradient(135deg, rgba(14,165,233,0.07) 0%, transparent 55%), var(--dark2);
      border-top: 1px solid rgba(14,165,233,0.12);
      border-bottom: 1px solid rgba(14,165,233,0.12);
    }
    .table{
        bg:var(--dark);
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
      .formula-vars { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<!-- ── NAVBAR ── -->
<x-header />

<!-- ── HERO ── -->
<section class="swaps-hero pt-5">
  <div class="hero-bg"></div>
  <div class="grid-overlay"></div>

  <!-- Floating rate numbers -->
  <div class="rate-float" style="left:62%;top:85%;animation-duration:12s;animation-delay:0s;">−1.42 pts</div>
  <div class="rate-float" style="left:72%;top:90%;animation-duration:15s;animation-delay:3s;">+0.87 pts</div>
  <div class="rate-float" style="left:80%;top:80%;animation-duration:10s;animation-delay:1s;">−3.21 pts</div>
  <div class="rate-float" style="left:66%;top:78%;animation-duration:13s;animation-delay:5s;">+2.14 pts</div>
  <div class="rate-float" style="left:76%;top:88%;animation-duration:11s;animation-delay:2s;">−0.55 pts</div>
  <div class="rate-float" style="left:58%;top:82%;animation-duration:14s;animation-delay:4s;">+1.08 pts</div>

  <div class="container py-5 mt-4" style="padding-bottom:5rem !important;">
    <div class="row align-items-center g-5">

      <!-- Left -->
      <div class="col-lg-6">
        <div class="market-pill fade-up">
          <span class="live-dot"></span> Rates updated daily at 00:00 server time
        </div>
        <div class="hero-eyebrow fade-up">Trading — Swaps</div>
        <h1 class="hero-title fade-up fade-up-1">
          Understand every<br>cost of holding<br><em>overnight.</em>
        </h1>
        <p class="hero-subtitle fade-up fade-up-2">
          Swap rates — also called rollover fees — are applied to positions held past the daily close. We publish all rates transparently, updated every day, so you always know the exact cost of holding any position.
        </p>
        <div class="hero-cta-row fade-up fade-up-3">
          <a href="#" class="btn-hero-sky">Open Account</a>
          <a href="#" class="btn-hero-ghost">View Swap Rates</a>
        </div>
      </div>

      <!-- Right — Swap Formula Card -->
      <div class="col-lg-5 offset-lg-1 fade-up fade-up-4">
        <div class="formula-card">
          <div class="formula-header">
            <div class="formula-title">Daily Swap Calculator</div>
            <div class="formula-live"><span class="live-dot" style="margin-right:5px;background:var(--accent-bright);box-shadow:none;animation:pulseDot 2s ease infinite;display:inline-block;width:6px;height:6px;border-radius:50%;"></span>Live Rates</div>
          </div>

          <!-- Formula -->
          <div class="formula-body">
            <div class="formula-eq">
              Swap = <span>Lot Size</span> × <span>Swap Rate</span> × <span>Point Value</span>
            </div>
            <div class="formula-result">−$4.32 <small>per night</small></div>
            <div class="formula-vars">
              <div class="fvar">
                <div class="fvar-label">Instrument</div>
                <div class="fvar-val">EUR/USD</div>
              </div>
              <div class="fvar">
                <div class="fvar-label">Lot Size</div>
                <div class="fvar-val">1.00 standard</div>
              </div>
              <div class="fvar">
                <div class="fvar-label">Swap Long</div>
                <div class="fvar-val" style="color:var(--rose)">−4.32 pts</div>
              </div>
              <div class="fvar">
                <div class="fvar-label">Swap Short</div>
                <div class="fvar-val" style="color:var(--green)">+1.18 pts</div>
              </div>
            </div>
          </div>

          <!-- Sample swap rows -->
          <div class="swap-row">
            <div>
              <div class="swap-symbol">EUR/USD <span class="swap-cat fx">FX</span></div>
            </div>
            <div class="text-end">
              <div class="swap-label">Long</div>
              <div class="swap-val neg">−4.32</div>
            </div>
            <div class="text-end">
              <div class="swap-label">Short</div>
              <div class="swap-val pos">+1.18</div>
            </div>
            <div class="text-end">
              <div class="swap-label">3× Day</div>
              <div style="font-size:0.78rem;color:var(--muted);">Wed</div>
            </div>
          </div>
          <div class="swap-row">
            <div>
              <div class="swap-symbol">XAU/USD <span class="swap-cat xau">Gold</span></div>
            </div>
            <div class="text-end">
              <div class="swap-label">Long</div>
              <div class="swap-val neg">−6.88</div>
            </div>
            <div class="text-end">
              <div class="swap-label">Short</div>
              <div class="swap-val neg">−2.14</div>
            </div>
            <div class="text-end">
              <div class="swap-label">3× Day</div>
              <div style="font-size:0.78rem;color:var(--muted);">Wed</div>
            </div>
          </div>
          <div class="swap-row">
            <div>
              <div class="swap-symbol">US30 <span class="swap-cat idx">Index</span></div>
            </div>
            <div class="text-end">
              <div class="swap-label">Long</div>
              <div class="swap-val pos">+1.42</div>
            </div>
            <div class="text-end">
              <div class="swap-label">Short</div>
              <div class="swap-val neg">−5.20</div>
            </div>
            <div class="text-end">
              <div class="swap-label">3× Day</div>
              <div style="font-size:0.78rem;color:var(--muted);">Fri</div>
            </div>
          </div>
          <div class="swap-row">
            <div>
              <div class="swap-symbol">BTC/USD <span class="swap-cat cry">Crypto</span></div>
            </div>
            <div class="text-end">
              <div class="swap-label">Long</div>
              <div class="swap-val neg">−28.50</div>
            </div>
            <div class="text-end">
              <div class="swap-label">Short</div>
              <div class="swap-val neg">−14.20</div>
            </div>
            <div class="text-end">
              <div class="swap-label">3× Day</div>
              <div style="font-size:0.78rem;color:var(--muted);">Fri</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Ticker -->
  <div class="ticker-bg">
    <div class="ticker-track">
      <span class="ticker-item"><span class="ticker-pair">EUR/USD Long</span><span class="ticker-price">−4.32 pts</span><span class="ticker-neg">▼</span></span>
      <span class="ticker-item"><span class="ticker-pair">GBP/USD Long</span><span class="ticker-price">−3.86 pts</span><span class="ticker-neg">▼</span></span>
      <span class="ticker-item"><span class="ticker-pair">USD/JPY Long</span><span class="ticker-price">+1.24 pts</span><span class="ticker-pos">▲</span></span>
      <span class="ticker-item"><span class="ticker-pair">XAU/USD Long</span><span class="ticker-price">−6.88 pts</span><span class="ticker-neg">▼</span></span>
      <span class="ticker-item"><span class="ticker-pair">US30 Long</span><span class="ticker-price">+1.42 pts</span><span class="ticker-pos">▲</span></span>
      <span class="ticker-item"><span class="ticker-pair">WTI Long</span><span class="ticker-price">−2.18 pts</span><span class="ticker-neg">▼</span></span>
      <span class="ticker-item"><span class="ticker-pair">BTC/USD Long</span><span class="ticker-price">−28.50 pts</span><span class="ticker-neg">▼</span></span>
      <span class="ticker-item"><span class="ticker-pair">AAPL Long</span><span class="ticker-price">−0.84 pts</span><span class="ticker-neg">▼</span></span>
      <!-- dupe -->
      <span class="ticker-item"><span class="ticker-pair">EUR/USD Long</span><span class="ticker-price">−4.32 pts</span><span class="ticker-neg">▼</span></span>
      <span class="ticker-item"><span class="ticker-pair">GBP/USD Long</span><span class="ticker-price">−3.86 pts</span><span class="ticker-neg">▼</span></span>
      <span class="ticker-item"><span class="ticker-pair">USD/JPY Long</span><span class="ticker-price">+1.24 pts</span><span class="ticker-pos">▲</span></span>
      <span class="ticker-item"><span class="ticker-pair">XAU/USD Long</span><span class="ticker-price">−6.88 pts</span><span class="ticker-neg">▼</span></span>
      <span class="ticker-item"><span class="ticker-pair">US30 Long</span><span class="ticker-price">+1.42 pts</span><span class="ticker-pos">▲</span></span>
      <span class="ticker-item"><span class="ticker-pair">WTI Long</span><span class="ticker-price">−2.18 pts</span><span class="ticker-neg">▼</span></span>
      <span class="ticker-item"><span class="ticker-pair">BTC/USD Long</span><span class="ticker-price">−28.50 pts</span><span class="ticker-neg">▼</span></span>
      <span class="ticker-item"><span class="ticker-pair">AAPL Long</span><span class="ticker-price">−0.84 pts</span><span class="ticker-neg">▼</span></span>
    </div>
  </div>
</section>

<!-- ── NUMBERS STRIP ── -->
<div class="numbers-strip">
  <div class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">1,200<sup>+</sup></div>
        <div class="num-desc">Published Rates</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">00<sup>:00</sup></div>
        <div class="num-desc">Daily Update Time</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">3<sup>×</sup></div>
        <div class="num-desc">Triple Swap Days</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">0<sup>%</sup></div>
        <div class="num-desc">Swap-Free Eligible</div>
      </div>
    </div>
  </div>
</div>

<!-- ── WHAT IS A SWAP ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row g-4 align-items-start">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="section-tag">Understanding Swaps</div>
        <h2 class="section-title">What is a<br>swap rate?</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:320px;">
          A swap — or rollover — is a fee paid or earned for holding a CFD position open overnight. It reflects the interest rate differential between the two currencies in a pair, or the cost of financing a leveraged position.
        </p>
      </div>
      <div class="col-lg-8">
        <div class="row g-3">
          <div class="col-md-6">
            <div class="explainer-card">
              <div class="exp-icon"><i class="uil uil-exchange"></i></div>
              <div class="exp-title">Interest Rate Differential</div>
              <p class="exp-text">For forex pairs, swaps reflect the difference in interest rates between the two currencies. Holding EUR/USD long means you earn EUR rates but pay USD rates — the net is your swap.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="explainer-card">
              <div class="exp-icon"><i class="uil uil-clock-three"></i></div>
              <div class="exp-title">When Swaps Are Applied</div>
              <p class="exp-text">Swaps are charged or credited at 00:00 server time (GMT+2). Positions opened and closed within the same trading day incur no swap. On Wednesday, a triple swap is applied to cover the weekend.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="explainer-card">
              <div class="exp-icon"><i class="uil uil-plus-circle"></i></div>
              <div class="exp-title">Positive Swaps</div>
              <p class="exp-text">When the rate differential favours your position direction, you receive a positive swap — meaning you are paid to hold the trade overnight. This is common in carry trades like long USD/JPY.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="explainer-card">
              <div class="exp-icon"><i class="uil uil-minus-circle"></i></div>
              <div class="exp-title">Negative Swaps</div>
              <p class="exp-text">When the rate differential or financing cost works against you, a negative swap is deducted from your balance. Most long positions on high-yielding assets carry a negative rollover.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── FULL SWAP RATES TABLE ── -->
<section class="py-5" style="background:var(--dark2);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
  <div class="container py-3">
    <div class="row align-items-end g-4 mb-4">
      <div class="col-lg-6">
        <div class="section-tag">Swap Rates</div>
        <h2 class="section-title">Full rates table.<br>Updated daily.</h2>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <p style="font-size:0.88rem;color:var(--muted);line-height:1.8;">
          All rates are shown in points per standard lot (100,000 units for FX). Updated at 00:00 server time. Triple swap applies on the day shown.
        </p>
      </div>
    </div>

    <div class="swap-table-wrap">
      <!-- Tabs -->
      <div class="table-tabs">
        <button class="tab-btn active" onclick="switchTab(event,'tab-forex')">Forex</button>
        <button class="tab-btn" onclick="switchTab(event,'tab-metals')">Metals</button>
        <button class="tab-btn" onclick="switchTab(event,'tab-indices')">Indices</button>
        <button class="tab-btn" onclick="switchTab(event,'tab-energies')">Energies</button>
        <button class="tab-btn" onclick="switchTab(event,'tab-crypto')">Cryptos</button>
      </div>

      <!-- Forex -->
      <div id="tab-forex" class="tab-panel active">
        <table class="table table-borderless mb-0" data-bs-theme="dark">
          <thead><tr>
            <th>Symbol</th><th>Category</th><th>Swap Long (pts)</th><th>Swap Short (pts)</th><th>Triple Swap Day</th><th>Spread From</th>
          </tr></thead>
          <tbody>
            <tr><td>EUR/USD</td><td><span class="cat-pill pill-fx">Major</span></td><td class="val-neg">−4.32</td><td class="val-pos">+1.18</td><td>Wednesday</td><td>0.0</td></tr>
            <tr><td>GBP/USD</td><td><span class="cat-pill pill-fx">Major</span></td><td class="val-neg">−3.86</td><td class="val-pos">+0.94</td><td>Wednesday</td><td>0.0</td></tr>
            <tr><td>USD/JPY</td><td><span class="cat-pill pill-fx">Major</span></td><td class="val-pos">+1.24</td><td class="val-neg">−5.40</td><td>Wednesday</td><td>0.0</td></tr>
            <tr><td>AUD/USD</td><td><span class="cat-pill pill-fx">Major</span></td><td class="val-neg">−2.10</td><td class="val-neg">−0.88</td><td>Wednesday</td><td>0.2</td></tr>
            <tr><td>USD/CHF</td><td><span class="cat-pill pill-fx">Major</span></td><td class="val-pos">+0.62</td><td class="val-neg">−3.74</td><td>Wednesday</td><td>0.2</td></tr>
            <tr><td>EUR/GBP</td><td><span class="cat-pill pill-fx">Minor</span></td><td class="val-neg">−1.44</td><td class="val-neg">−0.72</td><td>Wednesday</td><td>0.4</td></tr>
            <tr><td>USD/CAD</td><td><span class="cat-pill pill-fx">Major</span></td><td class="val-neg">−1.88</td><td class="val-neg">−1.22</td><td>Wednesday</td><td>0.3</td></tr>
            <tr><td>GBP/JPY</td><td><span class="cat-pill pill-fx">Minor</span></td><td class="val-pos">+2.10</td><td class="val-neg">−8.30</td><td>Wednesday</td><td>0.6</td></tr>
            <tr><td>EUR/JPY</td><td><span class="cat-pill pill-fx">Minor</span></td><td class="val-pos">+1.64</td><td class="val-neg">−6.80</td><td>Wednesday</td><td>0.4</td></tr>
            <tr><td>NZD/USD</td><td><span class="cat-pill pill-fx">Major</span></td><td class="val-neg">−2.44</td><td class="val-neg">−0.60</td><td>Wednesday</td><td>0.4</td></tr>
          </tbody>
        </table>
      </div>

      <!-- Metals -->
      <div id="tab-metals" class="tab-panel">
        <table class="table table-borderless mb-0">
          <thead><tr>
            <th>Symbol</th><th>Category</th><th>Swap Long (pts)</th><th>Swap Short (pts)</th><th>Triple Swap Day</th><th>Spread From</th>
          </tr></thead>
          <tbody>
            <tr><td>XAU/USD (Gold)</td><td><span class="cat-pill pill-xau">Precious</span></td><td class="val-neg">−6.88</td><td class="val-neg">−2.14</td><td>Wednesday</td><td>$0.20</td></tr>
            <tr><td>XAG/USD (Silver)</td><td><span class="cat-pill pill-xau">Precious</span></td><td class="val-neg">−3.40</td><td class="val-neg">−1.08</td><td>Wednesday</td><td>$0.02</td></tr>
            <tr><td>XPT/USD (Platinum)</td><td><span class="cat-pill pill-xau">PGM</span></td><td class="val-neg">−4.12</td><td class="val-neg">−1.60</td><td>Wednesday</td><td>$2.00</td></tr>
            <tr><td>XPD/USD (Palladium)</td><td><span class="cat-pill pill-xau">PGM</span></td><td class="val-neg">−8.50</td><td class="val-neg">−3.20</td><td>Wednesday</td><td>$5.00</td></tr>
            <tr><td>Copper (HG)</td><td><span class="cat-pill pill-xau">Industrial</span></td><td class="val-neg">−2.80</td><td class="val-neg">−1.10</td><td>Wednesday</td><td>$0.003</td></tr>
          </tbody>
        </table>
      </div>

      <!-- Indices -->
      <div id="tab-indices" class="tab-panel">
        <table class="table table-borderless mb-0">
          <thead><tr>
            <th>Symbol</th><th>Region</th><th>Swap Long (pts)</th><th>Swap Short (pts)</th><th>Triple Swap Day</th><th>Spread From</th>
          </tr></thead>
          <tbody>
            <tr><td>US30 (Dow Jones)</td><td><span class="cat-pill pill-idx">Americas</span></td><td class="val-pos">+1.42</td><td class="val-neg">−5.20</td><td>Friday</td><td>1.0 pt</td></tr>
            <tr><td>US500 (S&amp;P 500)</td><td><span class="cat-pill pill-idx">Americas</span></td><td class="val-pos">+0.88</td><td class="val-neg">−4.10</td><td>Friday</td><td>0.4 pt</td></tr>
            <tr><td>USTEC (NASDAQ 100)</td><td><span class="cat-pill pill-idx">Americas</span></td><td class="val-pos">+0.62</td><td class="val-neg">−3.80</td><td>Friday</td><td>0.8 pt</td></tr>
            <tr><td>UK100 (FTSE 100)</td><td><span class="cat-pill pill-idx">Europe</span></td><td class="val-neg">−2.14</td><td class="val-neg">−1.06</td><td>Friday</td><td>1.0 pt</td></tr>
            <tr><td>GER40 (DAX 40)</td><td><span class="cat-pill pill-idx">Europe</span></td><td class="val-neg">−1.88</td><td class="val-neg">−0.94</td><td>Friday</td><td>0.8 pt</td></tr>
            <tr><td>JP225 (Nikkei)</td><td><span class="cat-pill pill-idx">Asia</span></td><td class="val-neg">−3.60</td><td class="val-pos">+2.10</td><td>Friday</td><td>5.0 pt</td></tr>
            <tr><td>HK50 (Hang Seng)</td><td><span class="cat-pill pill-idx">Asia</span></td><td class="val-neg">−4.20</td><td class="val-pos">+1.80</td><td>Friday</td><td>4.0 pt</td></tr>
          </tbody>
        </table>
      </div>

      <!-- Energies -->
      <div id="tab-energies" class="tab-panel">
        <table class="table table-borderless mb-0">
          <thead><tr>
            <th>Symbol</th><th>Category</th><th>Swap Long (pts)</th><th>Swap Short (pts)</th><th>Triple Swap Day</th><th>Spread From</th>
          </tr></thead>
          <tbody>
            <tr><td>WTI Crude Oil</td><td><span class="cat-pill pill-nrg">Oil</span></td><td class="val-neg">−2.18</td><td class="val-neg">−1.04</td><td>Wednesday</td><td>$0.03</td></tr>
            <tr><td>Brent Crude Oil</td><td><span class="cat-pill pill-nrg">Oil</span></td><td class="val-neg">−2.44</td><td class="val-neg">−1.22</td><td>Wednesday</td><td>$0.05</td></tr>
            <tr><td>Natural Gas</td><td><span class="cat-pill pill-nrg">Gas</span></td><td class="val-neg">−3.80</td><td class="val-neg">−1.90</td><td>Wednesday</td><td>$0.004</td></tr>
            <tr><td>UK Natural Gas</td><td><span class="cat-pill pill-nrg">Gas</span></td><td class="val-neg">−3.20</td><td class="val-neg">−1.60</td><td>Wednesday</td><td>0.12p</td></tr>
            <tr><td>RBOB Gasoline</td><td><span class="cat-pill pill-nrg">Refined</span></td><td class="val-neg">−1.88</td><td class="val-neg">−0.94</td><td>Wednesday</td><td>$0.003</td></tr>
          </tbody>
        </table>
      </div>

      <!-- Crypto -->
      <div id="tab-crypto" class="tab-panel">
        <table class="table table-borderless mb-0">
          <thead><tr>
            <th>Symbol</th><th>Category</th><th>Swap Long (pts)</th><th>Swap Short (pts)</th><th>Triple Swap Day</th><th>Spread From</th>
          </tr></thead>
          <tbody>
            <tr><td>BTC/USD</td><td><span class="cat-pill pill-cry">Crypto</span></td><td class="val-neg">−28.50</td><td class="val-neg">−14.20</td><td>Friday</td><td>$18.00</td></tr>
            <tr><td>ETH/USD</td><td><span class="cat-pill pill-cry">Crypto</span></td><td class="val-neg">−14.80</td><td class="val-neg">−7.40</td><td>Friday</td><td>$1.50</td></tr>
            <tr><td>SOL/USD</td><td><span class="cat-pill pill-cry">Crypto</span></td><td class="val-neg">−8.20</td><td class="val-neg">−4.10</td><td>Friday</td><td>$0.80</td></tr>
            <tr><td>BNB/USD</td><td><span class="cat-pill pill-cry">Crypto</span></td><td class="val-neg">−6.40</td><td class="val-neg">−3.20</td><td>Friday</td><td>$0.60</td></tr>
            <tr><td>XRP/USD</td><td><span class="cat-pill pill-cry">Crypto</span></td><td class="val-neg">−2.80</td><td class="val-neg">−1.40</td><td>Friday</td><td>$0.004</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- ── SWAP CALCULATOR ── -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row align-items-start g-5">
      <div class="col-lg-5">
        <div class="section-tag">Swap Calculator</div>
        <h2 class="section-title">Calculate your<br>overnight cost.</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:360px;">
          Enter your position details below to see the exact swap fee charged or credited per night. Results are indicative based on current published rates.
        </p>
        <div class="mt-4" style="font-size:0.84rem;color:var(--muted);line-height:1.8;">
          <p style="margin-bottom:0.6rem;"><i class="uil uil-info-circle" style="color:var(--accent-bright);margin-right:6px;"></i>Triple swap applies on Wednesday (FX/Metals) or Friday (Indices/Crypto) and equals 3× the standard daily rate to cover the weekend.</p>
          <p style="margin-bottom:0;"><i class="uil uil-calendar-alt" style="color:var(--accent-bright);margin-right:6px;"></i>Rates are set by our liquidity providers and change daily based on central bank policy.</p>
        </div>
      </div>
      <div class="col-lg-6 offset-lg-1">
        <div class="calc-card">
          <div class="calc-label">Instrument</div>
          <select class="calc-select" id="calcInstrument" onchange="calcSwap()">
            <option value="eurusd">EUR/USD</option>
            <option value="gbpusd">GBP/USD</option>
            <option value="usdjpy">USD/JPY</option>
            <option value="xauusd">XAU/USD (Gold)</option>
            <option value="us30">US30 (Dow Jones)</option>
            <option value="btcusd">BTC/USD</option>
          </select>

          <div class="calc-label">Direction</div>
          <select class="calc-select" id="calcDir" onchange="calcSwap()">
            <option value="long">Long (Buy)</option>
            <option value="short">Short (Sell)</option>
          </select>

          <div class="calc-label">Lot Size (Standard Lots)</div>
          <input class="calc-input" type="number" id="calcLot" value="1.00" min="0.01" step="0.01" oninput="calcSwap()">

          <div class="calc-label">Number of Nights</div>
          <input class="calc-input" type="number" id="calcNights" value="1" min="1" max="365" oninput="calcSwap()">

          <div class="calc-result" id="calcResult">
            <div class="calc-result-label">Estimated Total Swap Cost</div>
            <div class="calc-result-value neg" id="calcResultValue">−$4.32</div>
            <div class="calc-note" id="calcResultNote">Based on EUR/USD long swap rate of −4.32 pts/lot/night × 1 lot × 1 night.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── SWAP-FREE ACCOUNTS ── -->
<section class="swapfree-section py-5">
  <div class="container py-3">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="swapfree-badge"><i class="uil uil-moon"></i> Islamic Finance</div>
        <div class="section-tag">Swap-Free Accounts</div>
        <h2 class="section-title">Trade without<br>overnight interest.</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:310px;">
          Our Islamic swap-free account removes all overnight interest charges in compliance with Sharia principles — with no compromise on spreads or execution quality.
        </p>
        <a href="#" class="btn-hero-sky mt-4 d-inline-block">Apply for Swap-Free</a>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="sf-row">
          <div class="sf-icon"><i class="uil uil-ban"></i></div>
          <div>
            <div class="sf-title">Zero Overnight Interest</div>
            <p class="sf-text">All rollover fees and swap charges are completely removed on both long and short positions. Hold any CFD overnight without incurring any interest-based cost.</p>
          </div>
        </div>
        <div class="sf-row">
          <div class="sf-icon"><i class="uil uil-balance-scale"></i></div>
          <div>
            <div class="sf-title">Sharia-Compliant Structure</div>
            <p class="sf-text">Our swap-free account structure has been reviewed and certified under Islamic finance principles. No riba (interest) is charged or paid in any form.</p>
          </div>
        </div>
        <div class="sf-row">
          <div class="sf-icon"><i class="uil uil-chart-line"></i></div>
          <div>
            <div class="sf-title">Same Spreads &amp; Execution</div>
            <p class="sf-text">Swap-free accounts access identical spreads, leverage tiers, and execution infrastructure as standard accounts. No hidden fees or markups are applied to compensate.</p>
          </div>
        </div>
        <div class="sf-row">
          <div class="sf-icon"><i class="uil uil-file-check-alt"></i></div>
          <div>
            <div class="sf-title">Simple Application Process</div>
            <p class="sf-text">Request swap-free status directly from your client portal. Approval is typically granted within one business day upon verification of account eligibility.</p>
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
        <div class="section-tag">Minimise Swap Costs</div>
        <h2 class="section-title">Three ways to<br>manage rollovers.</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;">
          Savvy traders actively manage their exposure to swap costs as part of their overall trading strategy.
        </p>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="step-card">
          <div class="step-num">01</div>
          <div>
            <div class="step-title">Trade Intraday to Avoid Swaps</div>
            <p class="step-text">Positions closed before 00:00 server time incur zero swap. For short-term strategies, simply ensure all trades are closed before rollover time to avoid any overnight charges entirely.</p>
          </div>
        </div>
        <div class="step-card">
          <div class="step-num">02</div>
          <div>
            <div class="step-title">Exploit Positive Carry Trades</div>
            <p class="step-text">Certain pairs offer positive swaps in one direction — such as long USD/JPY or long USD/TRY. Carry traders deliberately hold these positions overnight to earn the interest differential as income.</p>
          </div>
        </div>
        <div class="step-card">
          <div class="step-num">03</div>
          <div>
            <div class="step-title">Apply for Swap-Free Status</div>
            <p class="step-text">If you hold positions for days or weeks, our Islamic account removes all swap charges entirely. Apply once through your portal and all eligible instruments are automatically swap-free.</p>
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
    <h2 class="section-title mt-1 mx-auto" style="max-width:540px;">No hidden costs.<br>Full transparency.</h2>
    <p class="mt-3 mx-auto" style="font-size:0.92rem;color:var(--muted);line-height:1.8;max-width:440px;">
      Open a live account and access all 1,200+ swap rates in real time — or try everything risk-free with a $10,000 demo.
    </p>
    <div class="d-flex gap-3 justify-content-center flex-wrap mt-4">
      <a href="#" class="btn-hero-sky">Open Live Account</a>
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
      <p>© <span id="year"></span> TESLA INVEST. All rights reserved. CFD trading carries significant risk. Swap rates are indicative only. This is a fictional demo site.</p>
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

  /* ── SWAP CALCULATOR ── */
  const swapData = {
    eurusd: { long: -4.32, short: +1.18, label: 'EUR/USD' },
    gbpusd: { long: -3.86, short: +0.94, label: 'GBP/USD' },
    usdjpy: { long: +1.24, short: -5.40, label: 'USD/JPY' },
    xauusd: { long: -6.88, short: -2.14, label: 'XAU/USD (Gold)' },
    us30:   { long: +1.42, short: -5.20, label: 'US30' },
    btcusd: { long: -28.50, short: -14.20, label: 'BTC/USD' },
  };

  function calcSwap() {
    const instr   = document.getElementById('calcInstrument').value;
    const dir     = document.getElementById('calcDir').value;
    const lot     = parseFloat(document.getElementById('calcLot').value) || 1;
    const nights  = parseInt(document.getElementById('calcNights').value) || 1;

    const data  = swapData[instr];
    const rate  = dir === 'long' ? data.long : data.short;
    const total = (rate * lot * nights).toFixed(2);
    const totalNum = parseFloat(total);

    const resEl   = document.getElementById('calcResultValue');
    const noteEl  = document.getElementById('calcResultNote');

    resEl.textContent = (totalNum >= 0 ? '+$' : '−$') + Math.abs(totalNum).toFixed(2);
    resEl.className   = 'calc-result-value ' + (totalNum >= 0 ? 'pos' : 'neg');
    noteEl.textContent = `Based on ${data.label} ${dir} swap rate of ${rate > 0 ? '+' : ''}${rate} pts/lot/night × ${lot} lot${lot !== 1 ? 's' : ''} × ${nights} night${nights !== 1 ? 's' : ''}.`;
  }

  calcSwap();
</script>
</body>
</html>
