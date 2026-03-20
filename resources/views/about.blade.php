<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About — Tesla Invest</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

  <!-- Unicons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    :root {
      --red: #e31937;
      --red-dim: rgba(227, 25, 55, 0.12);
      --dark: #0c0c0e;
      --dark2: #141416;
      --mid: #1e1e22;
      --border: rgba(255,255,255,0.08);
      --muted: rgba(255,255,255,0.45);
      --text: rgba(255,255,255,0.88);
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

    h1, h2, h3, h4, h5 { font-family: 'Cormorant Garamond', serif; }

    /* NAVBAR */
    .navbar {
      background: rgba(12,12,14,0.92);
      border-bottom: 1px solid var(--border);
      padding: 1.1rem 0;
    }
    .navbar-brand {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.55rem;
      font-weight: 600;
      letter-spacing: 0.12em;
      color: #fff !important;
    }
    .navbar-brand span { color: var(--red); }
    .nav-link {
      font-size: 0.75rem;
      letter-spacing: 0.14em;
      font-weight: 500;
      color: var(--muted) !important;
      text-transform: uppercase;
      transition: color 0.2s;
    }
    .nav-link:hover, .nav-link.active { color: #fff !important; }
    .dropdown-menu {
      background: var(--dark2);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 0.5rem;
    }
    .dropdown-item {
      color: var(--muted);
      font-size: 0.82rem;
      letter-spacing: 0.05em;
      border-radius: 6px;
      padding: 0.55rem 0.85rem;
      transition: all 0.15s;
    }
    .dropdown-item:hover { background: var(--mid); color: #fff; }
    .btn-outline-ghost {
      border: 1px solid var(--border);
      color: var(--muted);
      background: transparent;
      font-size: 0.75rem;
      letter-spacing: 0.12em;
      padding: 0.5rem 1.4rem;
      border-radius: 4px;
      transition: all 0.2s;
      text-decoration: none;
    }
    .btn-outline-ghost:hover { border-color: rgba(255,255,255,0.25); color: #fff; }
    .btn-red {
      background: var(--red);
      border: none;
      color: #fff;
      font-size: 0.75rem;
      letter-spacing: 0.12em;
      padding: 0.5rem 1.4rem;
      border-radius: 4px;
      transition: background 0.2s;
      text-decoration: none;
    }
    .btn-red:hover { background: #c0152e; color: #fff; }

    /* HERO */
    .about-hero {
      position: relative;
      min-height: 92vh;
      display: flex;
      align-items: center;
      overflow: hidden;
    }
    .about-hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background:
        radial-gradient(ellipse 70% 60% at 65% 50%, rgba(227,25,55,0.08) 0%, transparent 65%),
        radial-gradient(ellipse 40% 40% at 10% 80%, rgba(227,25,55,0.05) 0%, transparent 60%);
      pointer-events: none;
    }
    .grid-overlay {
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(to right, rgba(255,255,255,0.025) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.025) 1px, transparent 1px);
      background-size: 80px 80px;
      pointer-events: none;
    }
    .hero-eyebrow {
      font-size: 0.7rem;
      letter-spacing: 0.3em;
      text-transform: uppercase;
      color: var(--red);
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 2rem;
    }
    .hero-eyebrow::before {
      content: '';
      display: block;
      width: 36px;
      height: 1px;
      background: var(--red);
    }
    .hero-title {
      font-size: clamp(3.2rem, 7vw, 6rem);
      font-weight: 300;
      line-height: 1.05;
      color: #fff;
      margin-bottom: 2rem;
    }
    .hero-title em { font-style: italic; color: var(--red); }
    .hero-subtitle {
      font-size: clamp(1rem, 2vw, 1.15rem);
      line-height: 1.8;
      color: var(--muted);
      max-width: 480px;
      font-weight: 300;
    }
    .hero-cta-row {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
      margin-top: 2.8rem;
    }
    .btn-hero-primary {
      background: var(--red);
      color: #fff;
      font-size: 0.78rem;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      padding: 0.85rem 2.2rem;
      border: none;
      border-radius: 4px;
      text-decoration: none;
      transition: background 0.2s;
      display: inline-block;
    }
    .btn-hero-primary:hover { background: #c0152e; color: #fff; }
    .btn-hero-ghost {
      background: transparent;
      color: var(--muted);
      font-size: 0.78rem;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      padding: 0.85rem 2.2rem;
      border: 1px solid var(--border);
      border-radius: 4px;
      text-decoration: none;
      transition: all 0.2s;
      display: inline-block;
    }
    .btn-hero-ghost:hover { border-color: rgba(255,255,255,0.25); color: #fff; }

    /* Stat cards */
    .hero-card-stack { position: relative; height: 560px; }
    .stat-card {
      background: var(--dark2);
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 2rem;
      position: absolute;
    }
    .stat-card.main { width: 100%; top: 0; left: 0; right: 0; padding: 2.5rem; }
    .stat-card.float-1 {
      width: 52%; bottom: 30px; left: 0;
      border-color: rgba(227,25,55,0.2);
      background: linear-gradient(135deg, rgba(227,25,55,0.06), var(--dark2));
    }
    .stat-card.float-2 { width: 46%; bottom: 0; right: 0; }
    .stat-number {
      font-family: 'Cormorant Garamond', serif;
      font-size: 3.5rem;
      font-weight: 300;
      color: #fff;
      line-height: 1;
    }
    .stat-number span { color: var(--red); }
    .stat-label {
      font-size: 0.72rem;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--muted);
      margin-top: 0.4rem;
    }
    .stat-divider { width: 32px; height: 1px; background: var(--red); margin: 1.4rem 0; }
    .stat-desc { font-size: 0.88rem; line-height: 1.7; color: var(--muted); }

    /* NUMBERS STRIP */
    .numbers-strip { border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .num-item { text-align: center; padding: 3rem 1rem; border-right: 1px solid var(--border); }
    .num-item:last-child { border-right: none; }
    .big-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 3.5rem;
      font-weight: 300;
      color: #fff;
      line-height: 1;
    }
    .big-num sup { font-size: 1.4rem; color: var(--red); vertical-align: super; font-weight: 400; }
    .num-desc {
      font-size: 0.72rem;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--muted);
      margin-top: 0.5rem;
    }

    /* SECTION HELPERS */
    .section-tag {
      font-size: 0.68rem;
      letter-spacing: 0.3em;
      text-transform: uppercase;
      color: var(--red);
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 1.2rem;
    }
    .section-tag::after { content: ''; display: block; width: 28px; height: 1px; background: var(--red); }
    .section-title { font-size: clamp(2.2rem, 4vw, 3.4rem); font-weight: 300; color: #fff; line-height: 1.1; }

    /* PILLARS */
    .pillar-card {
      background: var(--dark2);
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 2.2rem;
      height: 100%;
      position: relative;
      overflow: hidden;
      transition: border-color 0.25s, transform 0.25s;
    }
    .pillar-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 2px;
      background: var(--red);
      opacity: 0;
      transition: opacity 0.25s;
    }
    .pillar-card:hover { border-color: rgba(227,25,55,0.25); transform: translateY(-4px); }
    .pillar-card:hover::before { opacity: 1; }
    .pillar-icon {
      width: 48px; height: 48px;
      border-radius: 10px;
      background: var(--red-dim);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1.4rem;
      color: var(--red);
      font-size: 1.4rem;
    }
    .pillar-title { font-family: 'Cormorant Garamond', serif; font-size: 1.45rem; font-weight: 400; color: #fff; margin-bottom: 0.7rem; }
    .pillar-text { font-size: 0.88rem; line-height: 1.8; color: var(--muted); }

    /* TIMELINE */
    .timeline-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .timeline-item { display: flex; gap: 2rem; padding: 2.2rem 0; border-bottom: 1px solid var(--border); }
    .timeline-item:last-child { border-bottom: none; }
    .timeline-year { font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; font-weight: 300; color: var(--red); min-width: 80px; line-height: 1; padding-top: 0.15rem; }
    .timeline-content h5 { font-size: 1.1rem; font-weight: 400; color: #fff; margin-bottom: 0.5rem; }
    .timeline-content p { font-size: 0.86rem; color: var(--muted); line-height: 1.7; margin: 0; }

    /* TEAM */
    .team-card { background: var(--dark2); border: 1px solid var(--border); border-radius: 14px; overflow: hidden; transition: border-color 0.25s; }
    .team-card:hover { border-color: rgba(227,25,55,0.25); }
    .team-img-wrap { aspect-ratio: 1/1.05; background: var(--mid); overflow: hidden; }
    .team-img-placeholder {
      width: 100%; height: 100%;
      display: flex; align-items: center; justify-content: center;
      background: linear-gradient(135deg, var(--mid), var(--dark2));
    }
    .team-img-placeholder i { font-size: 5rem; color: rgba(255,255,255,0.07); }
    .team-info { padding: 1.4rem 1.6rem; }
    .team-name { font-size: 1.15rem; font-weight: 400; color: #fff; margin-bottom: 0.25rem; }
    .team-role { font-size: 0.72rem; letter-spacing: 0.16em; text-transform: uppercase; color: var(--red); }

    /* FOOTER */
    footer { background: var(--dark2); border-top: 1px solid var(--border); }
    .footer-brand { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 600; letter-spacing: 0.12em; color: #fff; }
    .footer-brand span { color: var(--red); }
    .footer-tagline { font-size: 0.82rem; color: var(--muted); line-height: 1.7; max-width: 260px; margin-top: 0.8rem; }
    .footer-heading { font-size: 0.68rem; letter-spacing: 0.22em; text-transform: uppercase; color: rgba(255,255,255,0.35); margin-bottom: 1.2rem; font-weight: 500; }
    .footer-link { color: var(--muted); text-decoration: none; font-size: 0.85rem; display: block; margin-bottom: 0.65rem; transition: color 0.2s; }
    .footer-link:hover { color: #fff; }
    .footer-bottom { border-top: 1px solid var(--border); padding: 1.4rem 0; }
    .footer-bottom p { font-size: 0.75rem; color: rgba(255,255,255,0.28); margin: 0; }

    /* OFFCANVAS */
    .offcanvas { background: var(--dark2) !important; }

    /* ANIMATIONS */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(28px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .fade-up   { animation: fadeUp 0.7s ease both; }
    .fade-up-1 { animation-delay: 0.1s; }
    .fade-up-2 { animation-delay: 0.22s; }
    .fade-up-3 { animation-delay: 0.34s; }
    .fade-up-4 { animation-delay: 0.46s; }

    @media (max-width: 991px) {
      .hero-card-stack { height: auto; margin-top: 3rem; }
      .stat-card { position: relative !important; width: 100% !important; bottom: auto !important; left: auto !important; right: auto !important; margin-top: 1rem; }
      .num-item { border-right: none; border-bottom: 1px solid var(--border); }
      .num-item:last-child { border-bottom: none; }
    }
    .table{
        bg:var(--dark);
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<x-header />

<!-- HERO -->
<section class="about-hero pt-5">
  <div class="grid-overlay"></div>
  <div class="container py-5 mt-4">
    <div class="row align-items-center g-5">

      <div class="col-lg-6">
        <div class="hero-eyebrow fade-up">About the Firm</div>
        <h1 class="hero-title fade-up fade-up-1">
          Built on<br><em>precision.</em><br>Driven by returns.
        </h1>
        <p class="hero-subtitle fade-up fade-up-2">
          We are a globally recognised FX and CFD investment firm, committed to delivering institutional-grade trading infrastructure to individual investors and professional traders alike.
        </p>
        <div class="hero-cta-row fade-up fade-up-3">
          <a href="#" class="btn-hero-primary">Open Account</a>
          <a href="#" class="btn-hero-ghost">Our Story</a>
        </div>
      </div>

      <div class="col-lg-6 fade-up fade-up-4">
        <div class="hero-card-stack">
          <div class="stat-card main">
            <div class="stat-label">Assets Under Management</div>
            <div class="stat-number mt-2">$4.8<span>B</span></div>
            <div class="stat-divider"></div>
            <p class="stat-desc">
              Our platform manages capital across multiple asset classes with consistent performance benchmarks, offering access to over 1,200 instruments in real time.
            </p>
            <div class="d-flex gap-4 mt-3">
              <div>
                <div style="font-family:'Cormorant Garamond',serif;font-size:1.8rem;color:#fff;line-height:1;">98<span style="color:var(--red)">%</span></div>
                <div class="stat-label mt-1">Client Retention</div>
              </div>
              <div>
                <div style="font-family:'Cormorant Garamond',serif;font-size:1.8rem;color:#fff;line-height:1;">0.1<span style="color:var(--red)">ms</span></div>
                <div class="stat-label mt-1">Avg Execution</div>
              </div>
              <div>
                <div style="font-family:'Cormorant Garamond',serif;font-size:1.8rem;color:#fff;line-height:1;">24<span style="color:var(--red)">/7</span></div>
                <div class="stat-label mt-1">Live Support</div>
              </div>
            </div>
          </div>
          <div class="stat-card float-1">
            <div class="stat-label">Founded</div>
            <div class="stat-number mt-1">2010</div>
            <p class="stat-desc mt-2">Over a decade of navigating global markets.</p>
          </div>
          <div class="stat-card float-2">
            <div class="stat-label">Countries Served</div>
            <div class="stat-number mt-1">170<span style="color:var(--red)">+</span></div>
            <p class="stat-desc mt-2">Truly borderless trading.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- NUMBERS STRIP -->
<div class="numbers-strip">
  <div class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">$4.8<sup>B</sup></div>
        <div class="num-desc">Assets Managed</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">1.2<sup>M</sup></div>
        <div class="num-desc">Active Traders</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">170<sup>+</sup></div>
        <div class="num-desc">Countries</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">1,200<sup>+</sup></div>
        <div class="num-desc">Instruments</div>
      </div>
    </div>
  </div>
</div>

<!-- PILLARS -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="row g-4 align-items-start">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="section-tag">Our Principles</div>
        <h2 class="section-title">What we<br>stand for</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:320px;">
          Our firm was built on a foundation of transparency, technology, and trust. Every decision we make is guided by these core values.
        </p>
      </div>
      <div class="col-lg-8">
        <div class="row g-3">
          <div class="col-md-6">
            <div class="pillar-card">
              <div class="pillar-icon"><i class="uil uil-shield-check"></i></div>
              <div class="pillar-title">Regulatory Integrity</div>
              <p class="pillar-text">Fully licensed and regulated across multiple jurisdictions, we operate under the strictest compliance frameworks to safeguard your capital.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="pillar-card">
              <div class="pillar-icon"><i class="uil uil-bolt"></i></div>
              <div class="pillar-title">Execution Excellence</div>
              <p class="pillar-text">Lightning-fast order execution with no requotes. Our infrastructure processes millions of trades daily with institutional-grade reliability.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="pillar-card">
              <div class="pillar-icon"><i class="uil uil-chart-line"></i></div>
              <div class="pillar-title">Deep Liquidity</div>
              <p class="pillar-text">Access to tier-1 liquidity providers ensures tight spreads and competitive pricing across all asset classes, from forex to commodities.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="pillar-card">
              <div class="pillar-icon"><i class="uil uil-users-alt"></i></div>
              <div class="pillar-title">Client First</div>
              <p class="pillar-text">Our entire operation is structured around the trader. Dedicated account managers, 24/7 support, and tools designed to help you succeed.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TIMELINE -->
<section class="timeline-section py-5">
  <div class="container py-3">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="section-tag">Our Journey</div>
        <h2 class="section-title">Milestones<br>that shaped us</h2>
        <p class="mt-3" style="font-size:0.9rem;color:var(--muted);line-height:1.8;">
          From a boutique trading desk to a globally recognised exchange-listed broker — our story is one of consistent growth and innovation.
        </p>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="timeline-item">
          <div class="timeline-year">2010</div>
          <div class="timeline-content">
            <h5>Foundation</h5>
            <p>Established as a specialist FX brokerage with a mandate to democratise professional trading tools for retail investors worldwide.</p>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-year">2013</div>
          <div class="timeline-content">
            <h5>Exchange Listing</h5>
            <p>Achieved stock exchange listing, marking a major milestone in transparency and raising capital to fund global expansion.</p>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-year">2017</div>
          <div class="timeline-content">
            <h5>1 Million Clients</h5>
            <p>Reached the one million active client milestone across 140+ countries, cementing our position as a truly global broker.</p>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-year">2021</div>
          <div class="timeline-content">
            <h5>Platform Relaunch</h5>
            <p>Unveiled our next-generation proprietary trading platform with AI-powered analytics, one-click copy trading, and advanced risk controls.</p>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-year">2024</div>
          <div class="timeline-content">
            <h5>$4B AUM Milestone</h5>
            <p>Crossed $4 billion in assets under management, reflecting the continued trust of our growing global client base.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TEAM -->
<section class="py-5 my-4">
  <div class="container py-3">
    <div class="text-center mb-5">
      <div class="section-tag d-inline-flex">Leadership</div>
      <h2 class="section-title mt-1">The team behind<br>the platform</h2>
    </div>
    <div class="row g-4 justify-content-center">
      <div class="col-sm-6 col-lg-3">
        <div class="team-card">
          <div class="team-img-wrap">
            <div class="team-img-placeholder"><i class="uil uil-user"></i></div>
          </div>
          <div class="team-info">
            <div class="team-name">Jonathan Mercer</div>
            <div class="team-role">Chief Executive Officer</div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="team-card">
          <div class="team-img-wrap">
            <div class="team-img-placeholder"><i class="uil uil-user"></i></div>
          </div>
          <div class="team-info">
            <div class="team-name">Sophia Ware</div>
            <div class="team-role">Chief Investment Officer</div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="team-card">
          <div class="team-img-wrap">
            <div class="team-img-placeholder"><i class="uil uil-user"></i></div>
          </div>
          <div class="team-info">
            <div class="team-name">Marcus Osei</div>
            <div class="team-role">Head of Technology</div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="team-card">
          <div class="team-img-wrap">
            <div class="team-img-placeholder"><i class="uil uil-user"></i></div>
          </div>
          <div class="team-info">
            <div class="team-name">Leila Hassan</div>
            <div class="team-role">Chief Compliance Officer</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="py-5">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="footer-brand">TESLA<span>.</span>INVEST</div>
        <p class="footer-tagline">
          One of the world's largest exchange-listed FX &amp; CFD brokers. Regulated. Reliable. Results-driven.
        </p>
      </div>
      <x-footer />
    </div>
    <div class="footer-bottom mt-5">
      <p>© <span id="year"></span> TESLA INVEST. All rights reserved. Trading CFDs carries significant risk. This is a fictional demo site for illustrative purposes only.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById("year").textContent = new Date().getFullYear();
</script>
</body>
</html>
