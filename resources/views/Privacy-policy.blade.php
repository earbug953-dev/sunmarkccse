<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Privacy Policy — Tesla Invest</title>

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
    .policy-hero {
      position: relative;
      min-height: 44vh;
      display: flex; align-items: center;
      overflow: hidden;
      background: var(--dark3);
      border-bottom: 1px solid var(--border);
      padding-top: 72px;
    }
    .hero-bg {
      position: absolute; inset: 0; pointer-events: none;
      background:
        radial-gradient(ellipse 50% 70% at 8% 50%, rgba(227,25,55,0.06) 0%, transparent 58%),
        radial-gradient(ellipse 30% 40% at 90% 30%, rgba(255,77,103,0.04) 0%, transparent 52%);
    }
    .dot-grid {
      position: absolute; inset: 0; pointer-events: none;
      background-image: radial-gradient(circle, rgba(255,255,255,0.055) 1px, transparent 1px);
      background-size: 34px 34px;
      mask-image: radial-gradient(ellipse 75% 75% at 50% 50%, black 20%, transparent 100%);
    }
    .vline {
      position: absolute; top: 0; bottom: 0; width: 1px;
      background: linear-gradient(to bottom, transparent, rgba(227,25,55,0.12), transparent);
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
      animation: tickerScroll 42s linear infinite;
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
    .toc-sidebar {
      position: sticky; top: 100px;
    }
    .toc-wrap {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 16px; overflow: hidden;
    }
    .toc-header {
      padding: 1.1rem 1.4rem;
      background: rgba(227,25,55,0.04);
      border-bottom: 1px solid var(--border);
      font-size: 0.65rem; letter-spacing: 0.22em; text-transform: uppercase;
      color: var(--muted);
    }
    .toc-list { list-style: none; padding: 0.6rem 0; margin: 0; }
    .toc-list li a {
      display: flex; align-items: center; gap: 0.7rem;
      padding: 0.55rem 1.4rem;
      font-size: 0.8rem; color: var(--muted); text-decoration: none;
      transition: color 0.15s, background 0.15s;
      border-left: 2px solid transparent;
    }
    .toc-list li a:hover { color: #fff; background: rgba(255,255,255,0.025); }
    .toc-list li a.active { color: var(--accent-bright); border-left-color: var(--red); background: var(--accent-dim); }
    .toc-list li a .toc-num {
      font-family: 'Cormorant Garamond', serif; font-size: 0.9rem;
      color: rgba(255,255,255,0.18); min-width: 18px;
    }
    .toc-list li a.active .toc-num { color: rgba(227,25,55,0.5); }

    /* Last updated badge */
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

    /* Info callout box */
    .ps-callout {
      background: rgba(227,25,55,0.05);
      border: 1px solid rgba(227,25,55,0.14);
      border-left: 3px solid var(--red);
      border-radius: 0 10px 10px 0;
      padding: 1.1rem 1.4rem; margin: 1.4rem 0;
      font-size: 0.86rem; color: var(--muted); line-height: 1.75;
    }
    .ps-callout strong { color: var(--accent-bright); }

    /* Green callout */
    .ps-callout-green {
      background: var(--green-dim);
      border: 1px solid rgba(34,197,94,0.15);
      border-left: 3px solid var(--green);
      border-radius: 0 10px 10px 0;
      padding: 1.1rem 1.4rem; margin: 1.4rem 0;
      font-size: 0.86rem; color: var(--muted); line-height: 1.75;
    }
    .ps-callout-green strong { color: var(--green); }

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

    /* Rights cards */
    .rights-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0.8rem; margin: 1.4rem 0; }
    .right-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 12px; padding: 1.2rem; transition: border-color 0.2s;
    }
    .right-card:hover { border-color: rgba(227,25,55,0.2); }
    .rc-icon { font-size: 1.3rem; margin-bottom: 0.6rem; }
    .rc-name { font-size: 0.86rem; font-weight: 500; color: #fff; margin-bottom: 0.35rem; }
    .rc-desc { font-size: 0.78rem; color: var(--muted); line-height: 1.65; }

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

    /* ── ANIMATIONS ── */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(22px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .fu  { animation: fadeUp 0.7s ease both; }
    .fu1 { animation-delay: 0.1s; }
    .fu2 { animation-delay: 0.22s; }
    .fu3 { animation-delay: 0.34s; }

    @media (max-width: 991px) {
      .toc-sidebar { position: static; margin-bottom: 2rem; }
      .rights-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<!-- ── NAVBAR ── -->
<x-header/>

<!-- ── HERO ── -->
<section class="policy-hero">
  <div class="hero-bg"></div>
  <div class="dot-grid"></div>
  <div class="vline" style="left:28%;"></div>
  <div class="vline" style="left:72%;opacity:0.4;"></div>

  <div class="container py-5">
    <div class="row">
      <div class="col-lg-7">
        <div class="hero-eyebrow fu">Legal — Privacy Policy</div>
        <h1 class="hero-title fu fu1">
          Your privacy.<br>Our <em>responsibility.</em>
        </h1>
        <p style="font-size:1rem;color:var(--muted);line-height:1.85;max-width:500px;" class="fu fu2">
          We are committed to protecting your personal data and your right to privacy. This policy explains what we collect, why we collect it, and how you stay in control at all times.
        </p>
        <div class="hero-meta fu fu3">
          <div class="meta-item"><i class="uil uil-calendar-alt"></i> Last updated: 12 March 2026</div>
          <div class="meta-item"><i class="uil uil-file-alt"></i> Version 4.2</div>
          <div class="meta-item"><i class="uil uil-clock"></i> ~12 min read</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── TICKER ── -->
<div class="ticker-bg">
  <div class="ticker-track">
    <span class="ticker-item"><span class="tl">Jurisdiction</span><span class="tv">FCA · CySEC · ASIC · FSCA</span></span>
    <span class="ticker-item"><span class="tl">Regulation</span><span class="tv">GDPR · UK GDPR Compliant</span></span>
    <span class="ticker-item"><span class="tl">Data Storage</span><span class="tv">EU-Based Secure Servers</span></span>
    <span class="ticker-item"><span class="tl">Encryption</span><span class="tv">AES-256 · TLS 1.3</span></span>
    <span class="ticker-item"><span class="tl">Your Rights</span><span class="tv">Access · Erasure · Portability · Objection</span></span>
    <span class="ticker-item"><span class="tl">Contact</span><span class="tv">compliance@teslainvest.com</span></span>
    <!-- dupe -->
    <span class="ticker-item"><span class="tl">Jurisdiction</span><span class="tv">FCA · CySEC · ASIC · FSCA</span></span>
    <span class="ticker-item"><span class="tl">Regulation</span><span class="tv">GDPR · UK GDPR Compliant</span></span>
    <span class="ticker-item"><span class="tl">Data Storage</span><span class="tv">EU-Based Secure Servers</span></span>
    <span class="ticker-item"><span class="tl">Encryption</span><span class="tv">AES-256 · TLS 1.3</span></span>
    <span class="ticker-item"><span class="tl">Your Rights</span><span class="tv">Access · Erasure · Portability · Objection</span></span>
    <span class="ticker-item"><span class="tl">Contact</span><span class="tv">compliance@teslainvest.com</span></span>
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
              <li><a href="#s1" class="active"><span class="toc-num">01</span> Who We Are</a></li>
              <li><a href="#s2"><span class="toc-num">02</span> Data We Collect</a></li>
              <li><a href="#s3"><span class="toc-num">03</span> How We Use Your Data</a></li>
              <li><a href="#s4"><span class="toc-num">04</span> Legal Basis</a></li>
              <li><a href="#s5"><span class="toc-num">05</span> Data Sharing</a></li>
              <li><a href="#s6"><span class="toc-num">06</span> Cookies</a></li>
              <li><a href="#s7"><span class="toc-num">07</span> Data Retention</a></li>
              <li><a href="#s8"><span class="toc-num">08</span> Your Rights</a></li>
              <li><a href="#s9"><span class="toc-num">09</span> International Transfers</a></li>
              <li><a href="#s10"><span class="toc-num">10</span> Security</a></li>
              <li><a href="#s11"><span class="toc-num">11</span> Children</a></li>
              <li><a href="#s12"><span class="toc-num">12</span> Changes</a></li>
              <li><a href="#s13"><span class="toc-num">13</span> Contact Us</a></li>
            </ul>
            <div class="updated-badge">
              <div class="ub-label">Last Updated</div>
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
            <h2 class="ps-title">Who We Are</h2>
            <div class="ps-body">
              <p>Tesla Invest Ltd ("Tesla Invest", "we", "us", "our") is a global online trading and investment services company. We operate under the following registered entities:</p>
              <ul class="ps-list">
                <li><strong>Tesla Invest (UK) Ltd</strong> — Registered in England &amp; Wales. Authorised and regulated by the Financial Conduct Authority (FCA). FCA Register No. 123456.</li>
                <li><strong>Tesla Invest (EU) Ltd</strong> — Registered in Cyprus. Authorised and regulated by the Cyprus Securities and Exchange Commission (CySEC). Licence No. 456/22.</li>
                <li><strong>Tesla Invest (AU) Ltd</strong> — Registered in Australia. Holds an Australian Financial Services Licence (AFSL) issued by ASIC. AFSL No. 789012.</li>
                <li><strong>Tesla Invest (ZA) Ltd</strong> — Registered in South Africa. Authorised as a Financial Services Provider by the FSCA. FSP No. 50987.</li>
              </ul>
              <p>For the purposes of GDPR and UK GDPR, the data controller is <strong>Tesla Invest (UK) Ltd</strong>, 1 Canada Square, Canary Wharf, London, E14 5AB. Our Data Protection Officer can be reached at <a href="mailto:dpo@teslainvest.com">dpo@teslainvest.com</a>.</p>
              <div class="ps-callout">
                <strong>Scope:</strong> This Privacy Policy applies to all personal data collected and processed by Tesla Invest across our websites, mobile applications, trading platforms, and all related services, regardless of which entity you are a client of.
              </div>
            </div>
          </div>

          <!-- S2 -->
          <div class="policy-section" id="s2">
            <div class="ps-number">02 —</div>
            <h2 class="ps-title">Data We Collect</h2>
            <div class="ps-body">
              <p>We collect personal data that you provide directly, data generated through your use of our services, and data obtained from third parties. The categories we collect include:</p>
              <table class="data-table">
                <thead>
                  <tr><th>Category</th><th>Examples</th><th>Source</th></tr>
                </thead>
                <tbody>
                  <tr><td>Identity Data</td><td>Full name, date of birth, nationality, government ID number, passport or driving licence copy</td><td>Provided by you during registration or KYC</td></tr>
                  <tr><td>Contact Data</td><td>Email address, phone number, postal address, country of residence</td><td>Provided by you</td></tr>
                  <tr><td>Financial Data</td><td>Bank account details, payment card information, transaction history, account balances, trading activity</td><td>Provided by you or generated through our platform</td></tr>
                  <tr><td>Technical Data</td><td>IP address, browser type, device identifiers, login timestamps, session data</td><td>Automatically collected</td></tr>
                  <tr><td>Usage Data</td><td>Pages visited, features used, clicks, search queries within the platform</td><td>Automatically collected</td></tr>
                  <tr><td>Communications Data</td><td>Support ticket content, chat logs, email correspondence, call recordings</td><td>Provided by you during interactions</td></tr>
                  <tr><td>Risk &amp; Compliance Data</td><td>Suitability assessment responses, PEP status, sanctions screening results</td><td>Provided by you or third-party screening services</td></tr>
                </tbody>
              </table>
              <p>We do not intentionally collect <strong>special category data</strong> (such as health, religion, or biometric data) unless legally required for specific regulatory obligations.</p>
            </div>
          </div>

          <!-- S3 -->
          <div class="policy-section" id="s3">
            <div class="ps-number">03 —</div>
            <h2 class="ps-title">How We Use Your Data</h2>
            <div class="ps-body">
              <p>We use the personal data we collect for the following purposes:</p>
              <ul class="ps-list">
                <li><strong>Account management</strong> — Opening, maintaining, and administering your trading account, including identity verification and KYC compliance.</li>
                <li><strong>Service delivery</strong> — Processing your trades, managing deposits and withdrawals, and operating all platform features.</li>
                <li><strong>Regulatory compliance</strong> — Meeting our obligations under applicable financial regulations including AML, KYC, MiFID II, EMIR, and applicable tax reporting laws.</li>
                <li><strong>Risk management</strong> — Assessing trading suitability, detecting fraud, preventing money laundering, and identifying market abuse.</li>
                <li><strong>Customer support</strong> — Responding to enquiries, resolving complaints, and improving support quality through call recording and case history.</li>
                <li><strong>Marketing communications</strong> — Sending product updates, market analysis, and promotional offers where you have consented or we have a legitimate interest.</li>
                <li><strong>Platform improvement</strong> — Analysing usage patterns to optimise performance, fix bugs, and develop new features.</li>
                <li><strong>Legal proceedings</strong> — Defending or pursuing legal claims, complying with court orders, or cooperating with regulatory investigations.</li>
              </ul>
            </div>
          </div>

          <!-- S4 -->
          <div class="policy-section" id="s4">
            <div class="ps-number">04 —</div>
            <h2 class="ps-title">Legal Basis for Processing</h2>
            <div class="ps-body">
              <p>Under GDPR and UK GDPR, we are required to have a lawful basis for processing your personal data. We rely on the following bases:</p>
              <ul class="ps-list">
                <li><strong>Contractual necessity (Art. 6(1)(b))</strong> — Processing required to perform our contract with you, including account operation, order execution, and withdrawal processing.</li>
                <li><strong>Legal obligation (Art. 6(1)(c))</strong> — Processing required to comply with financial regulation, tax law, AML obligations, and regulatory reporting requirements.</li>
                <li><strong>Legitimate interests (Art. 6(1)(f))</strong> — Processing for fraud prevention, security, platform analytics, and certain marketing communications where our interests do not override your rights.</li>
                <li><strong>Consent (Art. 6(1)(a))</strong> — Where you have explicitly opted in, such as for certain marketing emails or cookies. You may withdraw consent at any time.</li>
                <li><strong>Vital interests (Art. 6(1)(d))</strong> — In rare circumstances where processing is necessary to protect life.</li>
              </ul>
              <div class="ps-callout">
                <strong>Right to object:</strong> Where we rely on legitimate interests as our legal basis, you have the right to object to that processing at any time. We will cease processing unless we can demonstrate compelling legitimate grounds that override your interests.
              </div>
            </div>
          </div>

          <!-- S5 -->
          <div class="policy-section" id="s5">
            <div class="ps-number">05 —</div>
            <h2 class="ps-title">Data Sharing &amp; Disclosure</h2>
            <div class="ps-body">
              <p>We do not sell your personal data. We may share it with the following categories of third parties under appropriate data processing agreements:</p>
              <ul class="ps-list">
                <li><strong>Regulatory bodies</strong> — FCA, CySEC, ASIC, FSCA, HMRC, and other competent authorities where required by law.</li>
                <li><strong>Liquidity providers &amp; prime brokers</strong> — To execute and settle your trades. Only trade-related data is shared.</li>
                <li><strong>Payment processors</strong> — To facilitate deposits and withdrawals. These include card processors, bank transfer services, and e-wallet providers.</li>
                <li><strong>Identity verification providers</strong> — Third-party KYC services used to verify your identity and screen against sanctions lists.</li>
                <li><strong>Cloud &amp; infrastructure providers</strong> — Hosting, database, and security service providers operating under strict data processing agreements.</li>
                <li><strong>Analytics providers</strong> — Aggregated, pseudonymised usage data to help us improve the platform.</li>
                <li><strong>Professional advisors</strong> — Lawyers, auditors, and accountants under confidentiality obligations.</li>
                <li><strong>Law enforcement</strong> — Where required by law, court order, or to protect our legal rights.</li>
              </ul>
              <div class="ps-callout-green">
                <strong>We will never</strong> sell, rent, or trade your personal data to advertisers or data brokers. Any third party we engage is bound by a Data Processing Agreement that prohibits them from using your data for any purpose other than the contracted service.
              </div>
            </div>
          </div>

          <!-- S6 -->
          <div class="policy-section" id="s6">
            <div class="ps-number">06 —</div>
            <h2 class="ps-title">Cookies &amp; Tracking</h2>
            <div class="ps-body">
              <p>We use cookies and similar tracking technologies on our website and platform. Cookies are small text files placed on your device to help us provide a better experience.</p>
              <table class="data-table">
                <thead>
                  <tr><th>Cookie Type</th><th>Purpose</th><th>Duration</th></tr>
                </thead>
                <tbody>
                  <tr><td>Strictly Necessary</td><td>Session management, login authentication, security tokens. Cannot be disabled.</td><td>Session</td></tr>
                  <tr><td>Functional</td><td>Remembering your preferences — language, currency, chart settings, and layout.</td><td>12 months</td></tr>
                  <tr><td>Performance / Analytics</td><td>Measuring page visits, feature usage, and error rates to improve the platform. Data is pseudonymised.</td><td>13 months</td></tr>
                  <tr><td>Marketing</td><td>Tracking referral sources and measuring advertising campaign effectiveness. Only set with your consent.</td><td>30 days</td></tr>
                </tbody>
              </table>
              <p>You can manage your cookie preferences at any time via the cookie settings banner or your browser settings. Note that disabling certain cookies may affect platform functionality.</p>
            </div>
          </div>

          <!-- S7 -->
          <div class="policy-section" id="s7">
            <div class="ps-number">07 —</div>
            <h2 class="ps-title">Data Retention</h2>
            <div class="ps-body">
              <p>We retain your personal data only for as long as necessary to fulfil the purposes for which it was collected, or as required by law. Our standard retention periods are:</p>
              <ul class="ps-list">
                <li><strong>KYC / Identity documents</strong> — 5 years after account closure, as required by AML regulations.</li>
                <li><strong>Transaction records</strong> — 7 years after each transaction, as required under MiFID II and applicable tax law.</li>
                <li><strong>Support communications</strong> — 3 years from the date of last contact.</li>
                <li><strong>Marketing data</strong> — Until you withdraw consent or opt out, plus a 30-day suppression period.</li>
                <li><strong>Call recordings</strong> — 5 years from the date of the recording.</li>
                <li><strong>Technical logs</strong> — 12 months, unless needed for security investigations.</li>
              </ul>
              <p>When retention periods expire, data is securely deleted or anonymised so that it can no longer be linked to any individual.</p>
            </div>
          </div>

          <!-- S8 -->
          <div class="policy-section" id="s8">
            <div class="ps-number">08 —</div>
            <h2 class="ps-title">Your Rights</h2>
            <div class="ps-body">
              <p>Under GDPR and UK GDPR, you have the following rights regarding your personal data. To exercise any of these rights, contact us at <a href="mailto:dpo@teslainvest.com">dpo@teslainvest.com</a>. We will respond within 30 days.</p>
              <div class="rights-grid">
                <div class="right-card">
                  <div class="rc-icon">🔍</div>
                  <div class="rc-name">Right of Access</div>
                  <div class="rc-desc">Request a copy of all personal data we hold about you, free of charge.</div>
                </div>
                <div class="right-card">
                  <div class="rc-icon">✏️</div>
                  <div class="rc-name">Right to Rectification</div>
                  <div class="rc-desc">Request correction of any inaccurate or incomplete personal data.</div>
                </div>
                <div class="right-card">
                  <div class="rc-icon">🗑️</div>
                  <div class="rc-name">Right to Erasure</div>
                  <div class="rc-desc">Request deletion of your data where there is no longer a lawful basis to retain it.</div>
                </div>
                <div class="right-card">
                  <div class="rc-icon">⏸️</div>
                  <div class="rc-name">Right to Restriction</div>
                  <div class="rc-desc">Request that we restrict processing of your data in certain circumstances.</div>
                </div>
                <div class="right-card">
                  <div class="rc-icon">📦</div>
                  <div class="rc-name">Right to Portability</div>
                  <div class="rc-desc">Receive your data in a structured, machine-readable format to transfer elsewhere.</div>
                </div>
                <div class="right-card">
                  <div class="rc-icon">🚫</div>
                  <div class="rc-name">Right to Object</div>
                  <div class="rc-desc">Object to processing based on legitimate interests, including direct marketing.</div>
                </div>
              </div>
              <div class="ps-callout">
                <strong>Complaints:</strong> If you are not satisfied with our response, you have the right to lodge a complaint with the relevant supervisory authority. In the UK, this is the <strong>Information Commissioner's Office (ICO)</strong> at ico.org.uk. In the EU, contact your national Data Protection Authority.
              </div>
            </div>
          </div>

          <!-- S9 -->
          <div class="policy-section" id="s9">
            <div class="ps-number">09 —</div>
            <h2 class="ps-title">International Data Transfers</h2>
            <div class="ps-body">
              <p>Tesla Invest operates globally and may transfer your personal data to countries outside the United Kingdom and European Economic Area (EEA). When we do so, we ensure that appropriate safeguards are in place:</p>
              <ul class="ps-list">
                <li><strong>Adequacy decisions</strong> — Transfers to countries that the UK or European Commission has determined provide an adequate level of data protection.</li>
                <li><strong>Standard Contractual Clauses (SCCs)</strong> — Approved contractual provisions that impose GDPR-equivalent obligations on the recipient.</li>
                <li><strong>Binding Corporate Rules (BCRs)</strong> — For transfers within our corporate group, where applicable.</li>
                <li><strong>Certification schemes</strong> — Such as the UK–US Data Bridge or other approved transfer mechanisms.</li>
              </ul>
              <p>You may request a copy of the specific safeguard documentation applicable to a transfer by contacting our DPO at <a href="mailto:dpo@teslainvest.com">dpo@teslainvest.com</a>.</p>
            </div>
          </div>

          <!-- S10 -->
          <div class="policy-section" id="s10">
            <div class="ps-number">10 —</div>
            <h2 class="ps-title">Security</h2>
            <div class="ps-body">
              <p>We take the security of your personal data seriously and implement appropriate technical and organisational measures to protect it against unauthorised access, loss, or destruction. Our security measures include:</p>
              <ul class="ps-list">
                <li><strong>Encryption in transit</strong> — All data transmitted between your device and our servers is encrypted using TLS 1.3.</li>
                <li><strong>Encryption at rest</strong> — Sensitive data stored in our databases is encrypted using AES-256.</li>
                <li><strong>Access controls</strong> — Role-based access controls limit staff access to only the data necessary for their role.</li>
                <li><strong>Multi-factor authentication</strong> — Required for all platform access and internal administrative systems.</li>
                <li><strong>Penetration testing</strong> — Regular third-party security assessments and vulnerability scanning.</li>
                <li><strong>Incident response</strong> — A documented data breach response plan. In the event of a breach affecting your rights and freedoms, we will notify you and the relevant supervisory authority within 72 hours.</li>
              </ul>
              <div class="ps-callout-green">
                <strong>Your responsibility:</strong> You are responsible for keeping your login credentials confidential. Never share your password. If you suspect unauthorised access to your account, contact us immediately at <a href="mailto:security@teslainvest.com" style="color:var(--green);">security@teslainvest.com</a>.
              </div>
            </div>
          </div>

          <!-- S11 -->
          <div class="policy-section" id="s11">
            <div class="ps-number">11 —</div>
            <h2 class="ps-title">Children's Privacy</h2>
            <div class="ps-body">
              <p>Our services are not directed at or intended for individuals under the age of 18. We do not knowingly collect personal data from children. If you are under 18, please do not use our services or provide any personal information.</p>
              <p>If we become aware that we have inadvertently collected personal data from a child under 18, we will take immediate steps to delete that data and close the associated account. If you believe we may have collected data from a minor, please contact us immediately at <a href="mailto:compliance@teslainvest.com">compliance@teslainvest.com</a>.</p>
            </div>
          </div>

          <!-- S12 -->
          <div class="policy-section" id="s12">
            <div class="ps-number">12 —</div>
            <h2 class="ps-title">Changes to This Policy</h2>
            <div class="ps-body">
              <p>We may update this Privacy Policy from time to time to reflect changes in our practices, technology, legal requirements, or other factors. When we make material changes, we will:</p>
              <ul class="ps-list">
                <li>Update the "Last Updated" date at the top of this page and in the page header.</li>
                <li>Send an email notification to all registered clients at least 14 days before the changes take effect.</li>
                <li>Display a prominent notice in the platform dashboard for significant changes.</li>
                <li>For changes that materially affect your rights, request fresh consent where required by law.</li>
              </ul>
              <p>Your continued use of our services after the effective date of any changes constitutes your acceptance of the updated policy. Previous versions of this policy are available on request from <a href="mailto:dpo@teslainvest.com">dpo@teslainvest.com</a>.</p>
            </div>
          </div>

          <!-- S13 -->
          <div class="policy-section" id="s13">
            <div class="ps-number">13 —</div>
            <h2 class="ps-title">Contact Us</h2>
            <div class="ps-body">
              <p>For any questions, concerns, or requests relating to this Privacy Policy or the processing of your personal data, please contact:</p>
              <ul class="ps-list">
                <li><strong>Data Protection Officer</strong> — <a href="mailto:dpo@teslainvest.com">dpo@teslainvest.com</a></li>
                <li><strong>Compliance Team</strong> — <a href="mailto:compliance@teslainvest.com">compliance@teslainvest.com</a></li>
                <li><strong>Postal address</strong> — Tesla Invest (UK) Ltd, 1 Canada Square, Canary Wharf, London, E14 5AB, United Kingdom</li>
              </ul>
              <p>We aim to respond to all legitimate requests within <strong>30 days</strong>. Occasionally it may take longer if your request is complex or you have made multiple requests — in which case we will notify you and keep you updated.</p>
              <div class="ps-callout">
                <strong>Regulatory escalation:</strong> If you are an EU resident and remain unsatisfied after contacting us, you may escalate to your national Data Protection Authority. A full list is available at <a href="https://edpb.europa.eu" target="_blank">edpb.europa.eu</a>.
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
    <div class="section-tag d-inline-flex">Ready to Trade?</div>
    <h2 class="section-title mt-1 mx-auto" style="max-width:500px;">Privacy protected.<br>Capital ready.</h2>
    <p class="mt-3 mx-auto" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:420px;">
      Open a live account knowing your data is protected by the highest standards of privacy law and security.
    </p>
    <div class="d-flex gap-3 justify-content-center flex-wrap mt-4">
      <a href="#" class="btn-hero-red">Open Live Account</a>
      <a href="contact.html" class="btn-hero-ghost">Contact Us</a>
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
<script>
  document.getElementById('year').textContent = new Date().getFullYear();

  /* ── ACTIVE TOC on scroll ── */
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
