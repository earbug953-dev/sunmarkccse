<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Terms of Service — Tesla Invest</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    :root {
      --accent: #e31937;
      --accent-dim: rgba(227,25,55,0.10);
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
    .policy-hero {
      position: relative;
      min-height: 46vh;
      display: flex; align-items: center;
      overflow: hidden;
      background: var(--dark3);
      border-bottom: 1px solid var(--border);
      padding-top: 72px;
    }
    .hero-bg {
      position: absolute; inset: 0; pointer-events: none;
      background:
        radial-gradient(ellipse 55% 70% at 5% 55%, rgba(227,25,55,0.065) 0%, transparent 60%),
        radial-gradient(ellipse 35% 50% at 92% 25%, rgba(245,158,11,0.04) 0%, transparent 55%);
    }
    .dot-grid {
      position: absolute; inset: 0; pointer-events: none;
      background-image: radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px);
      background-size: 36px 36px;
      mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 20%, transparent 100%);
    }
    /* Diagonal hatch overlay */
    .hatch {
      position: absolute; inset: 0; pointer-events: none; opacity: 0.025;
      background-image: repeating-linear-gradient(
        -45deg,
        rgba(255,255,255,0.6) 0px, rgba(255,255,255,0.6) 1px,
        transparent 1px, transparent 22px
      );
    }
    .vline {
      position: absolute; top: 0; bottom: 0; width: 1px;
      background: linear-gradient(to bottom, transparent, rgba(227,25,55,0.10), transparent);
      pointer-events: none;
    }

    .hero-eyebrow {
      font-size: 0.7rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--accent-bright); font-weight: 500;
      display: flex; align-items: center; gap: 12px; margin-bottom: 1.4rem;
    }
    .hero-eyebrow::before {
      content: ''; width: 36px; height: 1px;
      background: linear-gradient(90deg, var(--red), rgba(227,25,55,0.3));
    }
    .hero-title {
      font-size: clamp(2.8rem, 6vw, 5rem);
      font-weight: 300; line-height: 1.06; color: #fff; margin-bottom: 1.4rem;
    }
    .hero-title em {
      font-style: italic;
      background: linear-gradient(135deg, var(--accent-bright), #ff8096, var(--accent-bright));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .hero-meta {
      display: flex; gap: 1.8rem; flex-wrap: wrap; margin-top: 1.6rem;
    }
    .meta-item {
      font-size: 0.72rem; color: var(--muted); letter-spacing: 0.06em;
      display: flex; align-items: center; gap: 6px;
    }
    .meta-item i { color: var(--accent-bright); }

    /* Important risk banner */
    .risk-banner {
      background: rgba(245,158,11,0.07);
      border: 1px solid rgba(245,158,11,0.18);
      border-left: 3px solid var(--amber);
      border-radius: 0 10px 10px 0;
      padding: 1rem 1.4rem;
      display: flex; align-items: flex-start; gap: 0.8rem;
      font-size: 0.83rem; color: var(--muted); line-height: 1.7;
      margin-top: 1.8rem;
    }
    .risk-banner i { color: var(--amber); font-size: 1.15rem; flex-shrink: 0; margin-top: 2px; }
    .risk-banner strong { color: #fbbf24; }

    /* ── TICKER ── */
    .ticker-bg {
      border-top: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
      height: 46px; overflow: hidden;
      display: flex; align-items: center;
      background: rgba(12,12,14,0.6);
    }
    .ticker-track {
      display: flex; gap: 3rem;
      animation: tickerScroll 44s linear infinite;
      white-space: nowrap;
    }
    @keyframes tickerScroll {
      0%   { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }
    .ticker-item { font-size: 0.7rem; letter-spacing: 0.1em; display: flex; align-items: center; gap: 0.5rem; }
    .tl { color: rgba(255,255,255,0.35); }
    .tv { color: rgba(255,255,255,0.65); }

    /* ── LAYOUT ── */
    .policy-layout { background: var(--dark); }

    /* Sticky TOC sidebar */
    .toc-sidebar { position: sticky; top: 100px; }
    .toc-wrap {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 16px; overflow: hidden;
    }
    .toc-header {
      padding: 1.1rem 1.4rem;
      background: rgba(227,25,55,0.04);
      border-bottom: 1px solid var(--border);
      font-size: 0.65rem; letter-spacing: 0.22em; text-transform: uppercase; color: var(--muted);
    }
    .toc-list { list-style: none; padding: 0.6rem 0; margin: 0; }
    .toc-list li a {
      display: flex; align-items: center; gap: 0.7rem;
      padding: 0.52rem 1.4rem;
      font-size: 0.78rem; color: var(--muted); text-decoration: none;
      transition: color 0.15s, background 0.15s;
      border-left: 2px solid transparent;
    }
    .toc-list li a:hover { color: #fff; background: rgba(255,255,255,0.025); }
    .toc-list li a.active { color: var(--accent-bright); border-left-color: var(--red); background: var(--accent-dim); }
    .toc-list li a .toc-num {
      font-family: 'Cormorant Garamond', serif; font-size: 0.9rem;
      color: rgba(255,255,255,0.18); min-width: 18px;
    }
    .toc-list li a.active .toc-num { color: rgba(227,25,55,0.45); }

    .updated-badge {
      margin: 1rem 1.4rem 1.2rem;
      background: var(--green-dim); border: 1px solid rgba(34,197,94,0.2);
      border-radius: 8px; padding: 0.7rem 0.9rem;
    }
    .ub-label { font-size: 0.6rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--muted); margin-bottom: 2px; }
    .ub-date  { font-size: 0.84rem; color: var(--green); font-weight: 500; }

    /* ── POLICY CONTENT ── */
    .policy-content { max-width: 760px; }

    .policy-section {
      padding: 3rem 0;
      border-bottom: 1px solid var(--border);
    }
    .policy-section:last-child { border-bottom: none; }

    .ps-number {
      font-family: 'Cormorant Garamond', serif;
      font-size: 0.9rem; font-weight: 300;
      color: rgba(227,25,55,0.4); letter-spacing: 0.15em;
      margin-bottom: 0.5rem;
    }
    .ps-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.95rem; font-weight: 300; color: #fff;
      margin-bottom: 1.4rem; line-height: 1.15;
    }
    .ps-body {
      font-size: 0.9rem; color: var(--muted); line-height: 1.9;
    }
    .ps-body p { margin-bottom: 1rem; }
    .ps-body p:last-child { margin-bottom: 0; }
    .ps-body strong { color: var(--text); font-weight: 500; }
    .ps-body a { color: var(--accent-bright); text-decoration: none; }
    .ps-body a:hover { text-decoration: underline; }

    /* Subsection heading */
    .ps-sub {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.3rem; font-weight: 400; color: #fff;
      margin: 1.8rem 0 0.7rem;
    }

    /* Callouts */
    .ps-callout {
      background: rgba(227,25,55,0.05);
      border: 1px solid rgba(227,25,55,0.14);
      border-left: 3px solid var(--red);
      border-radius: 0 10px 10px 0;
      padding: 1.1rem 1.4rem; margin: 1.4rem 0;
      font-size: 0.86rem; color: var(--muted); line-height: 1.75;
    }
    .ps-callout strong { color: var(--accent-bright); }

    .ps-callout-green {
      background: var(--green-dim);
      border: 1px solid rgba(34,197,94,0.15);
      border-left: 3px solid var(--green);
      border-radius: 0 10px 10px 0;
      padding: 1.1rem 1.4rem; margin: 1.4rem 0;
      font-size: 0.86rem; color: var(--muted); line-height: 1.75;
    }
    .ps-callout-green strong { color: var(--green); }

    .ps-callout-amber {
      background: var(--amber-dim);
      border: 1px solid rgba(245,158,11,0.18);
      border-left: 3px solid var(--amber);
      border-radius: 0 10px 10px 0;
      padding: 1.1rem 1.4rem; margin: 1.4rem 0;
      font-size: 0.86rem; color: var(--muted); line-height: 1.75;
    }
    .ps-callout-amber strong { color: #fbbf24; }

    /* Bullet list */
    .ps-list {
      list-style: none; padding: 0; margin: 1rem 0;
    }
    .ps-list li {
      display: flex; align-items: flex-start; gap: 0.75rem;
      padding: 0.5rem 0; border-bottom: 1px solid rgba(255,255,255,0.04);
      font-size: 0.88rem; color: var(--muted); line-height: 1.7;
    }
    .ps-list li:last-child { border-bottom: none; }
    .ps-list li::before {
      content: ''; width: 5px; height: 5px; border-radius: 50%;
      background: var(--red); flex-shrink: 0; margin-top: 8px;
    }
    .ps-list li strong { color: var(--text); }

    /* Numbered list */
    .ps-numlist {
      list-style: none; padding: 0; margin: 1rem 0; counter-reset: psnum;
    }
    .ps-numlist li {
      display: flex; align-items: flex-start; gap: 0.9rem;
      padding: 0.6rem 0; border-bottom: 1px solid rgba(255,255,255,0.04);
      font-size: 0.88rem; color: var(--muted); line-height: 1.7;
      counter-increment: psnum;
    }
    .ps-numlist li:last-child { border-bottom: none; }
    .ps-numlist li::before {
      content: counter(psnum, decimal-leading-zero);
      font-family: 'Cormorant Garamond', serif;
      font-size: 0.85rem; color: rgba(227,25,55,0.45);
      flex-shrink: 0; min-width: 24px; margin-top: 2px;
    }
    .ps-numlist li strong { color: var(--text); }

    /* Data table */
    .data-table {
      width: 100%; border-collapse: collapse; margin: 1.4rem 0;
      font-size: 0.84rem;
    }
    .data-table thead tr { background: rgba(227,25,55,0.05); }
    .data-table thead th {
      font-size: 0.65rem; letter-spacing: 0.18em; text-transform: uppercase;
      color: var(--muted); font-weight: 500; padding: 0.85rem 1rem;
      border-bottom: 1px solid var(--border); text-align: left;
    }
    .data-table tbody td {
      padding: 0.85rem 1rem; border-bottom: 1px solid var(--border);
      color: var(--muted); vertical-align: top; line-height: 1.65;
    }
    .data-table tbody tr:last-child td { border-bottom: none; }
    .data-table tbody tr:hover td { background: rgba(255,255,255,0.015); }
    .data-table tbody td:first-child { color: var(--text); font-weight: 500; }

    /* ── CTA ── */
    .cta-band {
      background: linear-gradient(135deg, rgba(227,25,55,0.07) 0%, transparent 55%), var(--dark2);
      border-top: 1px solid rgba(227,25,55,0.12);
      border-bottom: 1px solid rgba(227,25,55,0.12);
    }
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
    .section-tag {
      font-size: 0.68rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--accent-bright); font-weight: 500;
      display: inline-flex; align-items: center; gap: 10px; margin-bottom: 1.2rem;
    }
    .section-tag::after {
      content: ''; width: 28px; height: 1px;
      background: linear-gradient(90deg, var(--red), transparent);
    }
    .section-title { font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 300; color: #fff; line-height: 1.1; }

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

    .table{
        bg:var(--dark);
    }
    /* ── ANIMATIONS ── */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(22px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .fu  { animation: fadeUp 0.7s ease both; }
    .fu1 { animation-delay: 0.10s; }
    .fu2 { animation-delay: 0.22s; }
    .fu3 { animation-delay: 0.34s; }
    .fu4 { animation-delay: 0.46s; }

    @media (max-width: 991px) {
      .toc-sidebar { position: static; margin-bottom: 2rem; }
    }
  </style>
</head>
<body>

<x-header />

<!-- ── HERO ── -->
<section class="policy-hero">
  <div class="hero-bg"></div>
  <div class="dot-grid"></div>
  <div class="hatch"></div>
  <div class="vline" style="left:25%;"></div>
  <div class="vline" style="left:75%; opacity:0.4;"></div>

  <div class="container py-5">
    <div class="row">
      <div class="col-lg-8">
        <div class="hero-eyebrow fu">Legal — Terms of Service</div>
        <h1 class="hero-title fu fu1">
          Clear terms.<br>Fair <em>rules.</em>
        </h1>
        <p style="font-size:1rem;color:var(--muted);line-height:1.85;max-width:560px;" class="fu fu2">
          These Terms of Service govern your use of the Tesla Invest platform, websites, mobile applications, and all related services. Please read them carefully before opening an account or placing any trade.
        </p>
        <div class="hero-meta fu fu3">
          <div class="meta-item"><i class="uil uil-calendar-alt"></i> Effective: 12 March 2026</div>
          <div class="meta-item"><i class="uil uil-file-alt"></i> Version 6.1</div>
          <div class="meta-item"><i class="uil uil-clock"></i> ~18 min read</div>
        </div>
        <div class="risk-banner fu fu4">
          <i class="uil uil-exclamation-triangle"></i>
          <div><strong>Risk Warning:</strong> CFDs are complex instruments and come with a high risk of losing money rapidly due to leverage. <strong>76% of retail investor accounts lose money</strong> when trading CFDs with this provider. You should consider whether you understand how CFDs work and whether you can afford to take the high risk of losing your money.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── TICKER ── -->
<div class="ticker-bg">
  <div class="ticker-track">
    <span class="ticker-item"><span class="tl">Governing Law</span><span class="tv">England &amp; Wales</span></span>
    <span class="ticker-item"><span class="tl">Dispute Resolution</span><span class="tv">LCIA Arbitration · London</span></span>
    <span class="ticker-item"><span class="tl">Regulatory Framework</span><span class="tv">FCA · MiFID II · EMIR</span></span>
    <span class="ticker-item"><span class="tl">Client Funds</span><span class="tv">Segregated · Protected up to £85,000</span></span>
    <span class="ticker-item"><span class="tl">Leverage</span><span class="tv">Up to 500:1 · Subject to suitability</span></span>
    <span class="ticker-item"><span class="tl">Minimum Age</span><span class="tv">18 years</span></span>
    <span class="ticker-item"><span class="tl">Complaints</span><span class="tv">complaints@teslainvest.com</span></span>
    <!-- dupe -->
    <span class="ticker-item"><span class="tl">Governing Law</span><span class="tv">England &amp; Wales</span></span>
    <span class="ticker-item"><span class="tl">Dispute Resolution</span><span class="tv">LCIA Arbitration · London</span></span>
    <span class="ticker-item"><span class="tl">Regulatory Framework</span><span class="tv">FCA · MiFID II · EMIR</span></span>
    <span class="ticker-item"><span class="tl">Client Funds</span><span class="tv">Segregated · Protected up to £85,000</span></span>
    <span class="ticker-item"><span class="tl">Leverage</span><span class="tv">Up to 500:1 · Subject to suitability</span></span>
    <span class="ticker-item"><span class="tl">Minimum Age</span><span class="tv">18 years</span></span>
    <span class="ticker-item"><span class="tl">Complaints</span><span class="tv">complaints@teslainvest.com</span></span>
  </div>
</div>

<!-- ── MAIN LAYOUT ── -->
<section class="policy-layout py-5">
  <div class="container py-3">
    <div class="row g-5">

      <!-- Sidebar TOC -->
      <div class="col-lg-3">
        <div class="toc-sidebar">
          <div class="toc-wrap">
            <div class="toc-header">Table of Contents</div>
            <ul class="toc-list" id="tocList">
              <li><a href="#s1" class="active"><span class="toc-num">01</span> Definitions</a></li>
              <li><a href="#s2"><span class="toc-num">02</span> Acceptance of Terms</a></li>
              <li><a href="#s3"><span class="toc-num">03</span> Eligibility</a></li>
              <li><a href="#s4"><span class="toc-num">04</span> Account Registration</a></li>
              <li><a href="#s5"><span class="toc-num">05</span> Our Services</a></li>
              <li><a href="#s6"><span class="toc-num">06</span> Orders &amp; Execution</a></li>
              <li><a href="#s7"><span class="toc-num">07</span> Deposits &amp; Withdrawals</a></li>
              <li><a href="#s8"><span class="toc-num">08</span> Fees &amp; Charges</a></li>
              <li><a href="#s9"><span class="toc-num">09</span> Leverage &amp; Margin</a></li>
              <li><a href="#s10"><span class="toc-num">10</span> Risk Disclosure</a></li>
              <li><a href="#s11"><span class="toc-num">11</span> Prohibited Conduct</a></li>
              <li><a href="#s12"><span class="toc-num">12</span> Intellectual Property</a></li>
              <li><a href="#s13"><span class="toc-num">13</span> Limitation of Liability</a></li>
              <li><a href="#s14"><span class="toc-num">14</span> Indemnification</a></li>
              <li><a href="#s15"><span class="toc-num">15</span> Account Termination</a></li>
              <li><a href="#s16"><span class="toc-num">16</span> Complaints &amp; Disputes</a></li>
              <li><a href="#s17"><span class="toc-num">17</span> Amendments</a></li>
              <li><a href="#s18"><span class="toc-num">18</span> Governing Law</a></li>
            </ul>
            <div class="updated-badge">
              <div class="ub-label">Effective Date</div>
              <div class="ub-date">12 March 2026</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Content -->
      <div class="col-lg-9">
        <div class="policy-content">

          <!-- S1 -->
          <div class="policy-section" id="s1">
            <div class="ps-number">01 —</div>
            <h2 class="ps-title">Definitions</h2>
            <div class="ps-body">
              <p>In these Terms of Service, the following definitions apply unless the context requires otherwise:</p>
              <table class="data-table">
                <thead><tr><th>Term</th><th>Meaning</th></tr></thead>
                <tbody>
                  <tr><td>"Tesla Invest", "we", "us", "our"</td><td>Tesla Invest Ltd and all of its regulated subsidiaries as listed in the Privacy Policy.</td></tr>
                  <tr><td>"Client", "you", "your"</td><td>Any individual or legal entity that has registered for and been approved to use the Tesla Invest platform.</td></tr>
                  <tr><td>"Platform"</td><td>The Tesla Invest web trader, desktop application, mobile applications, and all associated APIs and tools.</td></tr>
                  <tr><td>"Services"</td><td>All trading, investment, PAMM, and ancillary services offered by Tesla Invest.</td></tr>
                  <tr><td>"CFD"</td><td>Contract for Difference — a derivative financial instrument that allows speculation on price movements without ownership of the underlying asset.</td></tr>
                  <tr><td>"Instrument"</td><td>Any tradable financial product available on the Platform, including Forex pairs, Crypto CFDs, Share CFDs, Indices, Energies, and Metals.</td></tr>
                  <tr><td>"Margin"</td><td>The collateral required to open and maintain a leveraged position.</td></tr>
                  <tr><td>"Order"</td><td>An instruction submitted by you to buy or sell an Instrument.</td></tr>
                  <tr><td>"Account Balance"</td><td>The net amount of funds in your trading account, excluding unrealised profit or loss.</td></tr>
                  <tr><td>"Business Day"</td><td>Any day other than a Saturday, Sunday, or public holiday in England and Wales.</td></tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- S2 -->
          <div class="policy-section" id="s2">
            <div class="ps-number">02 —</div>
            <h2 class="ps-title">Acceptance of Terms</h2>
            <div class="ps-body">
              <p>By registering an account, accessing the Platform, or using any of our Services, you confirm that you have read, understood, and agree to be legally bound by these Terms of Service, together with our <a href="privacy-policy.html">Privacy Policy</a>, Risk Disclosure Statement, and any other documents incorporated by reference.</p>
              <p>If you do not agree with any part of these Terms, you must not use our Services and should close your account immediately.</p>
              <div class="ps-callout">
                <strong>Note:</strong> These Terms constitute the entire agreement between you and Tesla Invest with respect to your use of the Services and supersede all prior agreements, representations, and understandings.
              </div>
              <p>These Terms apply to all versions of the Platform — web, desktop, iOS, and Android — and to all communications between you and Tesla Invest.</p>
            </div>
          </div>

          <!-- S3 -->
          <div class="policy-section" id="s3">
            <div class="ps-number">03 —</div>
            <h2 class="ps-title">Eligibility</h2>
            <div class="ps-body">
              <p>To be eligible to open and maintain an account with Tesla Invest, you must meet all of the following requirements at all times:</p>
              <ul class="ps-list">
                <li><strong>Age:</strong> You must be at least 18 years of age, or the age of majority in your jurisdiction if higher.</li>
                <li><strong>Legal capacity:</strong> You must have full legal capacity to enter into binding contracts under the laws of your jurisdiction.</li>
                <li><strong>Residency restrictions:</strong> You must not be a resident or citizen of any jurisdiction in which use of our Services is prohibited by law, including but not limited to the United States of America, Iran, North Korea, Syria, and Cuba.</li>
                <li><strong>Sanctions:</strong> You must not be subject to any economic or financial sanctions administered by the United Nations, European Union, HM Treasury, OFAC, or any other relevant authority.</li>
                <li><strong>Legal entities:</strong> If you are registering on behalf of a company or other legal entity, you must have the authority to bind that entity to these Terms.</li>
                <li><strong>Not a politically exposed person (PEP) without disclosure:</strong> If you are or become a PEP, you must notify us immediately and provide the required additional documentation.</li>
              </ul>
              <p>Tesla Invest reserves the right to refuse or revoke account access if you do not meet or cease to meet any of the above eligibility requirements. We may request documentary evidence of eligibility at any time.</p>
            </div>
          </div>

          <!-- S4 -->
          <div class="policy-section" id="s4">
            <div class="ps-number">04 —</div>
            <h2 class="ps-title">Account Registration &amp; KYC</h2>
            <div class="ps-body">
              <p>To access our Services, you must complete our registration process and pass identity verification (KYC — Know Your Customer). This involves:</p>
              <ul class="ps-list">
                <li><strong>Personal information:</strong> Providing accurate and complete details including your full legal name, date of birth, address, email address, and phone number.</li>
                <li><strong>Identity documents:</strong> Submitting a government-issued photo ID (passport or national identity card) and proof of address (utility bill or bank statement dated within 3 months).</li>
                <li><strong>Suitability assessment:</strong> Completing a questionnaire about your financial situation, trading experience, and investment objectives as required under MiFID II.</li>
                <li><strong>Source of funds:</strong> For deposits above certain thresholds, providing documentation to establish the source of the funds being deposited.</li>
              </ul>
              <p>You agree to keep all account information current and accurate. Providing false or misleading information is a material breach of these Terms and may result in immediate account termination and potential legal action.</p>
              <div class="ps-callout-amber">
                <strong>One account per person:</strong> Each individual may hold only one live trading account. Opening multiple accounts to circumvent trading restrictions, take advantage of promotions multiple times, or for any other reason is strictly prohibited and may result in all accounts being closed and funds being withheld pending investigation.
              </div>

              <div class="ps-sub">Account Security</div>
              <p>You are solely responsible for maintaining the confidentiality of your login credentials and for all activities that occur under your account. You must:</p>
              <ul class="ps-list">
                <li>Enable two-factor authentication (2FA) on your account, which we strongly recommend and may require for certain account actions.</li>
                <li>Use a strong, unique password that is not shared with any other service.</li>
                <li>Notify us immediately at <a href="mailto:security@teslainvest.com">security@teslainvest.com</a> if you suspect any unauthorised access or compromise of your account.</li>
                <li>Never share your account credentials with any third party, including employees of Tesla Invest (we will never ask for your password).</li>
              </ul>
            </div>
          </div>

          <!-- S5 -->
          <div class="policy-section" id="s5">
            <div class="ps-number">05 —</div>
            <h2 class="ps-title">Our Services</h2>
            <div class="ps-body">
              <p>Tesla Invest provides the following Services, subject to your eligibility and jurisdiction:</p>
              <ul class="ps-list">
                <li><strong>CFD Trading:</strong> Trading Contracts for Difference on Forex, Cryptocurrencies, Shares, Indices, Energies, and Metals with leverage.</li>
                <li><strong>Spot Crypto:</strong> Buying and selling physical cryptocurrency assets where available in your jurisdiction.</li>
                <li><strong>PAMM Accounts:</strong> Allocating funds to verified third-party money managers who trade on your behalf under a profit-sharing arrangement.</li>
                <li><strong>Earn Programme:</strong> Depositing supported digital assets to earn daily interest returns.</li>
                <li><strong>Market Data &amp; Research:</strong> Access to real-time and delayed market data, economic calendar, news, and analytical tools.</li>
                <li><strong>Demo Account:</strong> A simulated trading environment with virtual funds, available to registered users free of charge.</li>
              </ul>
              <p>We reserve the right to add, modify, suspend, or discontinue any Service at any time with reasonable notice. The availability of specific Services varies by jurisdiction and account type.</p>
              <div class="ps-callout">
                <strong>Not investment advice:</strong> Nothing on the Platform, in our communications, or from our support staff constitutes investment advice, a recommendation, or a solicitation to trade any specific instrument. All trading decisions are made solely by you at your own risk.
              </div>
            </div>
          </div>

          <!-- S6 -->
          <div class="policy-section" id="s6">
            <div class="ps-number">06 —</div>
            <h2 class="ps-title">Orders &amp; Execution Policy</h2>
            <div class="ps-body">
              <p>Tesla Invest operates an STP (Straight-Through Processing) and ECN (Electronic Communications Network) execution model. We act as principal on all CFD trades, meaning we are the counterparty to your trades.</p>

              <div class="ps-sub">Order Types</div>
              <table class="data-table">
                <thead><tr><th>Order Type</th><th>Description</th></tr></thead>
                <tbody>
                  <tr><td>Market Order</td><td>Executed immediately at the best available price. Subject to slippage during high volatility or low liquidity.</td></tr>
                  <tr><td>Limit Order</td><td>Executed at the specified price or better. Not guaranteed to fill if the price is not reached.</td></tr>
                  <tr><td>Stop Order</td><td>Triggered when the market reaches the specified price; executed as a market order thereafter.</td></tr>
                  <tr><td>Stop-Loss</td><td>Automatically closes a position when a specified adverse price level is reached. Not guaranteed to prevent losses beyond the specified level.</td></tr>
                  <tr><td>Take-Profit</td><td>Automatically closes a position when a specified favourable price level is reached.</td></tr>
                  <tr><td>Trailing Stop</td><td>A dynamic stop-loss that moves with the market in your favour by a specified distance.</td></tr>
                </tbody>
              </table>

              <div class="ps-sub">Execution Quality</div>
              <p>We are committed to best execution and aim to achieve the best possible result for your orders. Key execution principles include:</p>
              <ul class="ps-list">
                <li>Orders are processed through our automated system with average execution speeds of 0.1ms under normal market conditions.</li>
                <li>During periods of extreme volatility, liquidity gaps, or market openings, slippage may occur in either direction.</li>
                <li>We do not guarantee execution at the requested price for market orders or stop orders.</li>
                <li>Partial fills may occur for large orders where liquidity is insufficient at a single price level.</li>
                <li>We reserve the right to decline any order that we believe may represent market abuse or that exceeds our risk parameters.</li>
              </ul>
              <div class="ps-callout-amber">
                <strong>Slippage:</strong> Stop-loss orders, including negative balance protection mechanisms, are not guaranteed to prevent losses beyond the stop price in the event of market gaps (e.g., at weekend open, major news events, or extreme market conditions). Tesla Invest provides negative balance protection for retail clients as required by FCA regulations.
              </div>
            </div>
          </div>

          <!-- S7 -->
          <div class="policy-section" id="s7">
            <div class="ps-number">07 —</div>
            <h2 class="ps-title">Deposits &amp; Withdrawals</h2>
            <div class="ps-body">
              <div class="ps-sub">Deposits</div>
              <ul class="ps-list">
                <li><strong>Minimum deposit:</strong> The minimum initial deposit is $100 for Standard accounts and $1,000 for Raw accounts. Specific minimums apply to PAMM allocations.</li>
                <li><strong>Accepted methods:</strong> Bank transfer, Visa, Mastercard, and supported e-wallets and cryptocurrencies. Available methods vary by jurisdiction.</li>
                <li><strong>Processing time:</strong> Card and e-wallet deposits are credited instantly or within a few minutes. Bank transfers may take 1–3 Business Days.</li>
                <li><strong>Currency:</strong> Deposits may be made in any supported base currency. Currency conversion fees may apply at the prevailing rate.</li>
                <li><strong>Third-party deposits:</strong> We do not accept deposits from third-party accounts. Funds must originate from an account in your own name.</li>
              </ul>

              <div class="ps-sub">Withdrawals</div>
              <ul class="ps-list">
                <li><strong>Verification required:</strong> Withdrawals will only be processed to a verified account in your name. Additional verification may be required for large withdrawals.</li>
                <li><strong>Processing time:</strong> Withdrawal requests submitted before 12:00 UTC on a Business Day are processed within 24 hours. E-wallet withdrawals are typically received within 1 Business Day; bank transfers within 2–5 Business Days.</li>
                <li><strong>Minimum withdrawal:</strong> $50, or the equivalent in your account currency.</li>
                <li><strong>Withdrawal restrictions:</strong> Withdrawals may be temporarily restricted if your account is under investigation, if you have outstanding margin calls, or if bonus conditions have not been met.</li>
                <li><strong>Fees:</strong> Tesla Invest does not charge withdrawal fees. Your bank or payment provider may charge their own fees, for which we bear no responsibility.</li>
              </ul>
              <div class="ps-callout-green">
                <strong>Client funds protection:</strong> All client funds are held in segregated accounts at Tier-1 regulated banks, completely separate from Tesla Invest's own operating funds. In the event of Tesla Invest's insolvency, client funds are protected and cannot be used to pay corporate debts.
              </div>
            </div>
          </div>

          <!-- S8 -->
          <div class="policy-section" id="s8">
            <div class="ps-number">08 —</div>
            <h2 class="ps-title">Fees &amp; Charges</h2>
            <div class="ps-body">
              <p>The following fees may apply to your account. A full schedule of fees is maintained on our <a href="spreads-commissions.html">Spreads &amp; Commissions</a> page, which is incorporated into these Terms by reference.</p>
              <table class="data-table">
                <thead><tr><th>Fee Type</th><th>Standard Account</th><th>Raw Account</th></tr></thead>
                <tbody>
                  <tr><td>Spread</td><td>From 0.6 pip (built-in)</td><td>From 0.0 pip</td></tr>
                  <tr><td>Commission</td><td>None</td><td>$3.00 per lot per side</td></tr>
                  <tr><td>Overnight Swap</td><td>Per instrument (see Swaps page)</td><td>Per instrument (see Swaps page)</td></tr>
                  <tr><td>Inactivity Fee</td><td>$10/month after 90 days of no trading activity</td><td>$10/month after 90 days</td></tr>
                  <tr><td>Currency Conversion</td><td>0.5% above interbank rate</td><td>0.3% above interbank rate</td></tr>
                  <tr><td>Deposit Fee</td><td>None</td><td>None</td></tr>
                  <tr><td>Withdrawal Fee</td><td>None (third-party fees may apply)</td><td>None (third-party fees may apply)</td></tr>
                </tbody>
              </table>
              <p>We reserve the right to amend our fee schedule at any time with 14 days' notice. Continued use of the Services following a fee change constitutes acceptance of the new schedule.</p>
            </div>
          </div>

          <!-- S9 -->
          <div class="policy-section" id="s9">
            <div class="ps-number">09 —</div>
            <h2 class="ps-title">Leverage &amp; Margin</h2>
            <div class="ps-body">
              <p>Leveraged trading allows you to control a position larger than your deposited capital. While this can magnify profits, it equally magnifies losses and you may lose more than your initial deposit unless you are a retail client covered by negative balance protection.</p>

              <div class="ps-sub">Margin Requirements</div>
              <p>The margin required to open a position is calculated as: <strong>Position Size × Price ÷ Leverage</strong>. Your account must maintain sufficient free margin at all times. Margin levels are monitored in real time.</p>
              <table class="data-table">
                <thead><tr><th>Margin Level</th><th>Action</th></tr></thead>
                <tbody>
                  <tr><td>Below 100%</td><td>Warning notification sent. Deposit additional funds or reduce exposure.</td></tr>
                  <tr><td>Below 80%</td><td>Margin call. You are required to deposit additional funds immediately.</td></tr>
                  <tr><td>Below 50%</td><td>Stop out. Positions are automatically closed, starting with the largest losing position, until margin level is restored above 50%.</td></tr>
                </tbody>
              </table>

              <div class="ps-sub">Maximum Leverage by Asset Class</div>
              <ul class="ps-list">
                <li><strong>Forex Major Pairs:</strong> Up to 500:1 (professional clients); 30:1 (retail clients under ESMA/FCA rules)</li>
                <li><strong>Forex Minor &amp; Exotic Pairs:</strong> Up to 200:1 (professional); 20:1 (retail)</li>
                <li><strong>Gold:</strong> Up to 500:1 (professional); 20:1 (retail)</li>
                <li><strong>Major Indices:</strong> Up to 100:1 (professional); 20:1 (retail)</li>
                <li><strong>Shares:</strong> Up to 20:1 (professional); 5:1 (retail)</li>
                <li><strong>Cryptocurrencies:</strong> Up to 200:1 (professional); 2:1 (retail)</li>
              </ul>
              <div class="ps-callout-amber">
                <strong>Professional Client Reclassification:</strong> Retail clients may apply to be reclassified as professional clients to access higher leverage. You will lose certain regulatory protections including FSCS compensation and negative balance protection. Reclassification requires meeting at least 2 of 3 quantitative criteria. Contact <a href="mailto:accounts@teslainvest.com" style="color:#fbbf24;">accounts@teslainvest.com</a> for details.
              </div>
            </div>
          </div>

          <!-- S10 -->
          <div class="policy-section" id="s10">
            <div class="ps-number">10 —</div>
            <h2 class="ps-title">Risk Disclosure</h2>
            <div class="ps-body">
              <p>Trading CFDs, Forex, and Cryptocurrencies involves significant risks. You should not invest money you cannot afford to lose. Key risks include:</p>
              <ul class="ps-list">
                <li><strong>Market risk:</strong> Prices can move rapidly and unpredictably in response to economic events, political developments, market sentiment, and other factors beyond our control.</li>
                <li><strong>Leverage risk:</strong> Leverage amplifies both gains and losses. A small adverse price movement can result in a loss significantly greater than your initial margin.</li>
                <li><strong>Liquidity risk:</strong> During periods of low liquidity (e.g., market openings, major news events), spreads may widen significantly and orders may not be filled at requested prices.</li>
                <li><strong>Counterparty risk:</strong> For CFD products, Tesla Invest acts as counterparty. Our ability to perform our obligations depends on our continued financial stability.</li>
                <li><strong>Technology risk:</strong> System failures, connectivity issues, or cyberattacks could result in delays in order execution or loss of access to the Platform.</li>
                <li><strong>Currency risk:</strong> If your account base currency differs from the denomination of the Instrument, exchange rate fluctuations will affect your profit and loss.</li>
                <li><strong>Overnight funding risk:</strong> Positions held overnight are subject to swap charges that may be positive or negative and can accumulate significantly over time.</li>
                <li><strong>Cryptocurrency-specific risk:</strong> Digital assets are highly volatile, largely unregulated, and subject to regulatory changes that may affect their value or tradability.</li>
              </ul>
              <div class="ps-callout">
                <strong>Past performance is not indicative of future results.</strong> Any historical performance data shown on the Platform, in marketing materials, or by PAMM managers does not guarantee equivalent future performance.
              </div>
            </div>
          </div>

          <!-- S11 -->
          <div class="policy-section" id="s11">
            <div class="ps-number">11 —</div>
            <h2 class="ps-title">Prohibited Conduct</h2>
            <div class="ps-body">
              <p>You agree not to engage in any of the following activities, which are expressly prohibited and may result in account termination, withholding of funds, and referral to relevant authorities:</p>
              <ul class="ps-list">
                <li><strong>Market manipulation:</strong> Any conduct designed to create a false or misleading impression of the supply, demand, or price of any Instrument.</li>
                <li><strong>Insider trading:</strong> Trading on the basis of material non-public information in violation of applicable laws.</li>
                <li><strong>Arbitrage abuse:</strong> Exploiting pricing latencies, technical glitches, or data feed errors to generate risk-free or near-risk-free profits. This includes latency arbitrage, freeze-rate arbitrage, and similar strategies.</li>
                <li><strong>Bonus abuse:</strong> Opening multiple accounts or using third-party accounts to claim bonuses or promotions multiple times.</li>
                <li><strong>Money laundering:</strong> Using the Platform to conceal the proceeds of criminal activity or to transfer funds for illegal purposes.</li>
                <li><strong>Automated abuse:</strong> Using bots, scripts, or automated systems that exploit platform vulnerabilities or place excessive numbers of orders designed to degrade platform performance.</li>
                <li><strong>Account sharing:</strong> Allowing any third party to access or trade on your account without our express written consent (with the exception of authorised PAMM managers).</li>
                <li><strong>Misrepresentation:</strong> Providing false information during registration, KYC, or any other interaction with Tesla Invest.</li>
              </ul>
              <p>Tesla Invest reserves the right to void any trades, close any positions, and withhold any funds associated with prohibited conduct pending investigation. We cooperate fully with regulatory and law enforcement authorities.</p>
            </div>
          </div>

          <!-- S12 -->
          <div class="policy-section" id="s12">
            <div class="ps-number">12 —</div>
            <h2 class="ps-title">Intellectual Property</h2>
            <div class="ps-body">
              <p>All content on the Platform — including but not limited to software, algorithms, data feeds, charts, tools, designs, logos, text, images, and documentation — is the exclusive intellectual property of Tesla Invest or its licensors and is protected by applicable copyright, trademark, and other intellectual property laws.</p>
              <p>You are granted a limited, non-exclusive, non-transferable, revocable licence to access and use the Platform for your personal trading purposes only. You may not:</p>
              <ul class="ps-list">
                <li>Copy, reproduce, distribute, or publicly display any Platform content without our express written consent.</li>
                <li>Reverse engineer, decompile, or disassemble any part of the Platform's software or systems.</li>
                <li>Use any automated tool to scrape, index, or harvest data from the Platform.</li>
                <li>Use our trademarks, logos, or brand names without prior written authorisation.</li>
                <li>Create derivative works based on Platform content or functionality.</li>
              </ul>
              <p>Any feedback, suggestions, or ideas you submit regarding the Platform may be used by Tesla Invest without obligation of confidentiality, attribution, or compensation.</p>
            </div>
          </div>

          <!-- S13 -->
          <div class="policy-section" id="s13">
            <div class="ps-number">13 —</div>
            <h2 class="ps-title">Limitation of Liability</h2>
            <div class="ps-body">
              <p>To the maximum extent permitted by applicable law, Tesla Invest shall not be liable for:</p>
              <ul class="ps-list">
                <li>Any trading losses, including losses arising from slippage, market gaps, force majeure events, or the exercise of our risk management controls.</li>
                <li>Losses resulting from delays, interruptions, errors, or failures of the Platform, including those caused by third-party technology providers.</li>
                <li>Loss of profits, loss of revenue, loss of data, or any indirect, consequential, incidental, special, or punitive damages of any kind.</li>
                <li>Actions or omissions of third parties, including liquidity providers, payment processors, or PAMM money managers.</li>
                <li>Events beyond our reasonable control, including natural disasters, pandemics, government actions, exchange closures, or cyberattacks.</li>
              </ul>
              <p>Our total aggregate liability to you in connection with any single event or series of related events shall not exceed the total amount of fees paid by you to Tesla Invest in the three months preceding the event giving rise to the claim.</p>
              <div class="ps-callout">
                <strong>Statutory rights:</strong> Nothing in these Terms shall exclude or limit any liability that cannot be excluded or limited under applicable law, including our liability for fraud, death, or personal injury caused by our negligence.
              </div>
            </div>
          </div>

          <!-- S14 -->
          <div class="policy-section" id="s14">
            <div class="ps-number">14 —</div>
            <h2 class="ps-title">Indemnification</h2>
            <div class="ps-body">
              <p>You agree to indemnify, defend, and hold harmless Tesla Invest and its officers, directors, employees, agents, and licensors from and against any and all claims, damages, losses, liabilities, costs, and expenses (including reasonable legal fees) arising from or relating to:</p>
              <ul class="ps-list">
                <li>Your use of or access to the Platform or Services.</li>
                <li>Your violation of any provision of these Terms.</li>
                <li>Your violation of any applicable law, regulation, or third-party right.</li>
                <li>Any false or misleading information you provide to us.</li>
                <li>Any claim that content you submit to the Platform infringes any third-party intellectual property right.</li>
              </ul>
              <p>Tesla Invest reserves the right to assume exclusive control of any matter subject to indemnification by you, in which case you agree to cooperate fully with our defence of that matter.</p>
            </div>
          </div>

          <!-- S15 -->
          <div class="policy-section" id="s15">
            <div class="ps-number">15 —</div>
            <h2 class="ps-title">Account Suspension &amp; Termination</h2>
            <div class="ps-body">
              <div class="ps-sub">Termination by You</div>
              <p>You may close your account at any time by submitting a written request to <a href="mailto:accounts@teslainvest.com">accounts@teslainvest.com</a>. Before closure, all open positions must be closed and all outstanding charges settled. Remaining balances will be returned to you within 5 Business Days to a verified payment method in your name.</p>

              <div class="ps-sub">Suspension or Termination by Us</div>
              <p>We may suspend, restrict, or terminate your account with immediate effect and without prior notice if:</p>
              <ul class="ps-list">
                <li>You breach any material term of these Terms of Service.</li>
                <li>We have reasonable grounds to suspect fraud, money laundering, or other illegal activity.</li>
                <li>You provide false or misleading information during registration or at any subsequent time.</li>
                <li>You engage in prohibited conduct as defined in Section 11.</li>
                <li>We are required to do so by a regulatory or law enforcement authority.</li>
                <li>You become subject to insolvency proceedings or are declared bankrupt.</li>
                <li>We determine, at our sole discretion, that continuing to provide Services to you poses a regulatory, legal, or reputational risk.</li>
              </ul>
              <div class="ps-callout">
                <strong>Fund recovery upon termination:</strong> In the event of account termination for cause, we may withhold funds pending investigation or legal proceedings. Any funds not subject to an ongoing claim will be returned to you after the conclusion of any such proceedings, less any amounts owed to Tesla Invest.
              </div>
            </div>
          </div>

          <!-- S16 -->
          <div class="policy-section" id="s16">
            <div class="ps-number">16 —</div>
            <h2 class="ps-title">Complaints &amp; Dispute Resolution</h2>
            <div class="ps-body">
              <p>We are committed to resolving all complaints fairly and promptly. Our complaints process is as follows:</p>
              <ol class="ps-numlist">
                <li><strong>Submit your complaint</strong> in writing to <a href="mailto:complaints@teslainvest.com">complaints@teslainvest.com</a>, including your account number, a clear description of your complaint, and any supporting evidence.</li>
                <li><strong>Acknowledgement:</strong> We will acknowledge receipt of your complaint within 2 Business Days.</li>
                <li><strong>Investigation:</strong> We will investigate your complaint thoroughly and provide a final response within 8 weeks, or sooner where possible.</li>
                <li><strong>Final response:</strong> If you are not satisfied with our final response, you may escalate to the Financial Ombudsman Service (FOS) at <a href="https://www.financial-ombudsman.org.uk" target="_blank">financial-ombudsman.org.uk</a> (for UK clients) or to the relevant ADR body in your jurisdiction.</li>
              </ol>
              <div class="ps-callout-green">
                <strong>FOS eligibility:</strong> You may be eligible to refer your complaint to the Financial Ombudsman Service if you are a retail client and we have issued a final response or failed to respond within 8 weeks. The FOS can award compensation of up to £415,000 for complaints upheld.
              </div>
            </div>
          </div>

          <!-- S17 -->
          <div class="policy-section" id="s17">
            <div class="ps-number">17 —</div>
            <h2 class="ps-title">Amendments</h2>
            <div class="ps-body">
              <p>Tesla Invest reserves the right to amend these Terms of Service at any time. When we make material changes, we will:</p>
              <ul class="ps-list">
                <li>Post the updated Terms on this page with a new "Effective Date".</li>
                <li>Send an email notification to all registered clients at the email address on file at least <strong>14 calendar days</strong> before the changes take effect.</li>
                <li>Display a prominent in-platform notice for significant changes.</li>
              </ul>
              <p>If you do not agree with the amended Terms, you must close your account before the effective date of the changes. Your continued use of the Services after the effective date constitutes your acceptance of the revised Terms.</p>
              <p>For minor changes — such as corrections of typographical errors or clarifications that do not materially affect your rights — we may update the Terms without advance notice, though we will always update the effective date.</p>
            </div>
          </div>

          <!-- S18 -->
          <div class="policy-section" id="s18">
            <div class="ps-number">18 —</div>
            <h2 class="ps-title">Governing Law &amp; Jurisdiction</h2>
            <div class="ps-body">
              <p>These Terms of Service and any dispute or claim arising out of or in connection with them (including non-contractual disputes or claims) shall be governed by and construed in accordance with the laws of <strong>England and Wales</strong>.</p>
              <p>Any dispute that cannot be resolved through our complaints process will be subject to the exclusive jurisdiction of the courts of England and Wales, except that:</p>
              <ul class="ps-list">
                <li>Either party may apply for interim or emergency relief from any court of competent jurisdiction.</li>
                <li>Disputes with a value exceeding £100,000 may, at either party's election, be referred to binding arbitration under the rules of the London Court of International Arbitration (LCIA), seated in London, England.</li>
                <li>EU resident clients may also have the right to refer matters to their local courts or applicable EU dispute resolution mechanisms as provided by law.</li>
              </ul>
              <div class="ps-callout">
                <strong>Severability:</strong> If any provision of these Terms is found to be unenforceable or invalid by a court of competent jurisdiction, that provision shall be modified to the minimum extent necessary to make it enforceable, or severed from these Terms, without affecting the enforceability of the remaining provisions.
              </div>
              <p style="margin-top:1.4rem;font-size:0.84rem;color:rgba(255,255,255,0.28);font-style:italic;">These Terms of Service were last updated and are effective as of 12 March 2026. Version 6.1. © Tesla Invest Ltd. All rights reserved.</p>
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
    <div class="section-tag d-inline-flex">Ready to Start?</div>
    <h2 class="section-title mt-1 mx-auto" style="max-width:500px;">Terms agreed.<br>Markets await.</h2>
    <p class="mt-3 mx-auto" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:420px;">
      Open a live account or start with a risk-free $10,000 demo. Full platform access. No deposit required for demo.
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
      <p>© <span id="year"></span> TESLA INVEST. All rights reserved. CFD trading carries significant risk of loss. 76% of retail investor accounts lose money. This is a fictional demo site.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('year').textContent = new Date().getFullYear();

  /* Active TOC on scroll */
  const sections = document.querySelectorAll('.policy-section');
  const tocLinks = document.querySelectorAll('#tocList a');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        tocLinks.forEach(l => l.classList.remove('active'));
        const active = document.querySelector(`#tocList a[href="#${entry.target.id}"]`);
        if (active) active.classList.add('active');
      }
    });
  }, { rootMargin: '-20% 0px -65% 0px' });

  sections.forEach(s => observer.observe(s));
</script>
</body>
</html>
