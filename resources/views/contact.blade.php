<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact — Tesla Invest</title>

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
      --border-strong: rgba(255,255,255,0.12);
      --muted: rgba(255,255,255,0.45);
      --text: rgba(255,255,255,0.88);
      --green: #22c55e;
      --green-dim: rgba(34,197,94,0.10);
      --gold: #d4a843;
      --sky: #0ea5e9;
      --sky-dim: rgba(14,165,233,0.10);
      --violet: #8b5cf6;
      --violet-dim: rgba(139,92,246,0.10);
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
    h1,h2,h3,h4 { font-family: 'Cormorant Garamond', serif; }

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
    .contact-hero {
      position: relative;
      min-height: 56vh;
      display: flex;
      align-items: center;
      overflow: hidden;
      padding-bottom: 0;
      background: var(--dark3);
      border-bottom: 1px solid var(--border);
    }
    .hero-bg {
      position: absolute; inset: 0; pointer-events: none;
      background:
        radial-gradient(ellipse 55% 70% at 14% 50%, rgba(227,25,55,0.07) 0%, transparent 60%),
        radial-gradient(ellipse 35% 45% at 85% 30%, rgba(255,77,103,0.04) 0%, transparent 52%),
        radial-gradient(ellipse 25% 35% at 70% 85%, rgba(14,165,233,0.03) 0%, transparent 50%);
    }
    /* Fine dot grid */
    .dot-grid {
      position: absolute; inset: 0; pointer-events: none;
      background-image: radial-gradient(circle, rgba(255,255,255,0.07) 1px, transparent 1px);
      background-size: 32px 32px;
      mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 30%, transparent 100%);
    }
    /* Vertical lines accent */
    .vline {
      position: absolute; top: 0; bottom: 0; width: 1px;
      background: linear-gradient(to bottom, transparent, rgba(227,25,55,0.15), transparent);
      pointer-events: none;
    }

    /* Animated response-time badge */
    .response-badge {
      display: inline-flex; align-items: center; gap: 8px;
      background: rgba(34,197,94,0.08);
      border: 1px solid rgba(34,197,94,0.2);
      border-radius: 30px; padding: 0.35rem 1rem;
      font-size: 0.7rem; letter-spacing: 0.1em; color: var(--green);
      margin-bottom: 2rem;
    }
    .pulse-green {
      width: 7px; height: 7px; border-radius: 50%; background: var(--green);
      animation: pulseG 2s ease infinite;
    }
    @keyframes pulseG {
      0%,100% { box-shadow: 0 0 0 0 rgba(34,197,94,0.4); }
      50%      { box-shadow: 0 0 0 6px rgba(34,197,94,0); }
    }

    .hero-eyebrow {
      font-size: 0.7rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--accent-bright); font-weight: 500;
      display: flex; align-items: center; gap: 12px; margin-bottom: 1.6rem;
    }
    .hero-eyebrow::before {
      content: ''; display: block; width: 36px; height: 1px;
      background: linear-gradient(90deg, var(--red), rgba(227,25,55,0.3));
    }
    .hero-title {
      font-size: clamp(3rem, 6.5vw, 5.8rem);
      font-weight: 300; line-height: 1.04; color: #fff; margin-bottom: 1.6rem;
    }
    .hero-title em {
      font-style: italic;
      background: linear-gradient(135deg, var(--accent-bright), #ff8096, var(--accent-bright));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .hero-sub {
      font-size: 1rem; line-height: 1.85; color: var(--muted);
      max-width: 420px; font-weight: 300;
    }

    /* ── TICKER ── */
    .ticker-bg {
      border-top: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
      height: 48px; overflow: hidden;
      display: flex; align-items: center;
      background: rgba(12,12,14,0.6);
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
      font-size: 0.7rem; letter-spacing: 0.1em;
      display: flex; align-items: center; gap: 0.5rem;
    }
    .tl { color: rgba(255,255,255,0.38); }
    .tv { color: #fff; }
    .ta { color: var(--accent-bright); }

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

    /* ── MAIN CONTACT LAYOUT ── */
    .contact-main { background: var(--dark); }

    /* Contact channel cards (left column) */
    .channel-card {
      background: var(--dark2);
      border: 1px solid var(--border);
      border-radius: 16px; padding: 1.6rem;
      display: flex; align-items: flex-start; gap: 1.2rem;
      transition: border-color 0.22s, transform 0.22s;
      text-decoration: none; cursor: pointer;
    }
    .channel-card:hover { border-color: rgba(227,25,55,0.24); transform: translateX(4px); }
    .channel-card.available { border-left: 2px solid var(--green); }
    .channel-card.away     { border-left: 2px solid var(--gold); }

    .ch-icon {
      width: 46px; height: 46px; border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.3rem; flex-shrink: 0;
    }
    .chi-red    { background: var(--accent-dim);  color: var(--accent-bright); }
    .chi-green  { background: var(--green-dim);   color: var(--green); }
    .chi-sky    { background: var(--sky-dim);     color: #38bdf8; }
    .chi-violet { background: var(--violet-dim);  color: #a78bfa; }
    .chi-gold   { background: rgba(212,168,67,0.10); color: var(--gold); }
    .chi-wa     { background: rgba(37,211,102,0.10); color: #25d366; }

    .ch-title { font-size: 0.92rem; font-weight: 500; color: #fff; margin-bottom: 0.2rem; }
    .ch-desc  { font-size: 0.78rem; color: var(--muted); line-height: 1.6; margin-bottom: 0.5rem; }
    .ch-status {
      display: inline-flex; align-items: center; gap: 5px;
      font-size: 0.65rem; letter-spacing: 0.1em; text-transform: uppercase;
    }
    .status-dot { width: 6px; height: 6px; border-radius: 50%; }
    .dot-online { background: var(--green); animation: pulseG 2s ease infinite; }
    .dot-away   { background: var(--gold); }
    .st-online  { color: var(--green); }
    .st-away    { color: var(--gold); }

    .ch-arrow {
      margin-left: auto; font-size: 1.1rem; color: rgba(255,255,255,0.18);
      transition: color 0.2s, transform 0.2s;
    }
    .channel-card:hover .ch-arrow { color: var(--accent-bright); transform: translateX(3px); }

    /* Office cards */
    .office-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 14px; padding: 1.6rem;
      transition: border-color 0.2s; height: 100%;
    }
    .office-card:hover { border-color: rgba(255,255,255,0.14); }
    .office-flag { font-size: 1.6rem; margin-bottom: 0.8rem; display: block; }
    .office-city { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 400; color: #fff; margin-bottom: 0.2rem; }
    .office-role { font-size: 0.65rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--accent-bright); margin-bottom: 0.9rem; }
    .office-addr { font-size: 0.82rem; color: var(--muted); line-height: 1.75; }
    .office-divider { height: 1px; background: var(--border); margin: 1rem 0; }
    .office-hours { font-size: 0.75rem; color: var(--muted); display: flex; align-items: center; gap: 6px; }
    .office-hours i { color: var(--green); }

    /* ── CONTACT FORM ── */
    .form-wrap {
      background: var(--dark2);
      border: 1px solid rgba(227,25,55,0.12);
      border-radius: 20px;
      overflow: hidden;
      position: sticky; top: 100px;
    }
    .form-header {
      padding: 1.6rem 2rem;
      background: rgba(227,25,55,0.05);
      border-bottom: 1px solid var(--border);
    }
    .form-header-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.6rem; font-weight: 300; color: #fff; margin-bottom: 0.2rem;
    }
    .form-header-sub { font-size: 0.78rem; color: var(--muted); }

    .form-body { padding: 2rem; }

    /* Department tabs */
    .dept-tabs { display: flex; gap: 0.4rem; margin-bottom: 1.6rem; flex-wrap: wrap; }
    .dept-tab {
      font-size: 0.68rem; letter-spacing: 0.1em; text-transform: uppercase;
      padding: 0.38rem 0.9rem; border-radius: 6px; cursor: pointer;
      background: var(--mid); color: var(--muted); border: 1px solid var(--border);
      transition: all 0.15s;
    }
    .dept-tab.active {
      background: var(--accent-dim); color: var(--accent-bright);
      border-color: rgba(227,25,55,0.24);
    }
    .dept-tab:hover:not(.active) { border-color: rgba(255,255,255,0.14); color: rgba(255,255,255,0.7); }

    /* Form fields */
    .field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 0.9rem; }
    .field-group { margin-bottom: 1.1rem; }
    .field-label {
      font-size: 0.65rem; letter-spacing: 0.18em; text-transform: uppercase;
      color: var(--muted); margin-bottom: 0.4rem; display: block;
    }
    .field-input, .field-select, .field-textarea {
      width: 100%;
      background: var(--mid); border: 1px solid var(--border);
      border-radius: 8px; padding: 0.72rem 1rem;
      font-size: 0.88rem; color: #fff;
      font-family: 'DM Sans', sans-serif; font-weight: 300;
      transition: border-color 0.2s, box-shadow 0.2s;
    }
    .field-input::placeholder, .field-textarea::placeholder { color: rgba(255,255,255,0.22); }
    .field-input:focus, .field-select:focus, .field-textarea:focus {
      outline: none;
      border-color: rgba(227,25,55,0.42);
      box-shadow: 0 0 0 3px rgba(227,25,55,0.07);
    }
    .field-select { appearance: none; cursor: pointer; }
    .field-select option { background: var(--dark2); }
    .field-textarea { resize: none; line-height: 1.6; }

    .field-hint { font-size: 0.68rem; color: var(--muted); margin-top: 0.3rem; }

    .form-submit {
      width: 100%; background: var(--red); color: #fff; border: none;
      border-radius: 8px; padding: 0.9rem;
      font-size: 0.78rem; letter-spacing: 0.16em; text-transform: uppercase;
      font-family: 'DM Sans', sans-serif; font-weight: 500;
      cursor: pointer; transition: background 0.2s;
      display: flex; align-items: center; justify-content: center; gap: 0.6rem;
    }
    .form-submit:hover { background: #c0152e; }
    .form-submit:active { transform: scale(0.99); }

    .form-footer-note {
      text-align: center; font-size: 0.7rem; color: var(--muted);
      margin-top: 1rem; line-height: 1.7;
    }

    /* Success state */
    .form-success {
      display: none; text-align: center; padding: 2rem;
    }
    .success-icon {
      width: 60px; height: 60px; border-radius: 50%;
      background: var(--green-dim); border: 1px solid rgba(34,197,94,0.25);
      display: flex; align-items: center; justify-content: center;
      font-size: 1.6rem; color: var(--green); margin: 0 auto 1.2rem;
    }
    .success-title { font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; color: #fff; margin-bottom: 0.5rem; }
    .success-text  { font-size: 0.88rem; color: var(--muted); line-height: 1.75; }

    /* ── FAQ ── */
    .faq-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .faq-item { border-bottom: 1px solid var(--border); }
    .faq-item:last-child { border-bottom: none; }
    .faq-q {
      width: 100%; background: none; border: none; padding: 1.3rem 0;
      display: flex; align-items: center; justify-content: space-between; gap: 1rem;
      cursor: pointer; text-align: left; transition: color 0.15s;
    }
    .faq-q-text {
      font-size: 0.95rem; font-weight: 500; color: rgba(255,255,255,0.8);
      transition: color 0.15s;
    }
    .faq-q:hover .faq-q-text { color: #fff; }
    .faq-icon {
      width: 28px; height: 28px; border-radius: 50%;
      background: var(--mid); border: 1px solid var(--border);
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0; transition: background 0.2s, transform 0.25s;
      font-size: 0.9rem; color: var(--muted);
    }
    .faq-item.open .faq-icon { background: var(--accent-dim); color: var(--accent-bright); transform: rotate(45deg); border-color: rgba(227,25,55,0.24); }
    .faq-a {
      font-size: 0.87rem; color: var(--muted); line-height: 1.8;
      max-height: 0; overflow: hidden; transition: max-height 0.35s ease, padding 0.25s;
      padding: 0;
    }
    .faq-item.open .faq-a { max-height: 200px; padding-bottom: 1.2rem; }

    /* ── CTA ── */
    .cta-band {
      background: linear-gradient(135deg, rgba(227,25,55,0.08) 0%, transparent 55%), var(--dark2);
      border-top: 1px solid rgba(227,25,55,0.14);
      border-bottom: 1px solid rgba(227,25,55,0.14);
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
      from { opacity: 0; transform: translateY(24px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .fade-up   { animation: fadeUp 0.7s ease both; }
    .fade-up-1 { animation-delay: 0.1s; }
    .fade-up-2 { animation-delay: 0.22s; }
    .fade-up-3 { animation-delay: 0.34s; }
    .fade-up-4 { animation-delay: 0.46s; }

    @media (max-width: 991px) {
      .field-row { grid-template-columns: 1fr; }
      .form-wrap { position: static; }
    }
    @media (max-width: 575px) {
      .dept-tabs { gap: 0.3rem; }
      .dept-tab  { font-size: 0.6rem; padding: 0.3rem 0.7rem; }
    }
  </style>
</head>
<body>

<!-- ── NAVBAR ── -->
<x-header active="contact" />

<!-- ── HERO ── -->
<section class="contact-hero pt-5">
  <div class="hero-bg"></div>
  <div class="dot-grid"></div>
  <div class="vline" style="left:33%;"></div>
  <div class="vline" style="left:66%;opacity:0.5;"></div>

  <div class="container py-5 mt-3">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <div class="response-badge fade-up">
          <span class="pulse-green"></span>
          Support online · Avg. response &lt;2 min
        </div>
        <div class="hero-eyebrow fade-up">Company — Contact</div>
        <h1 class="hero-title fade-up fade-up-1">
          We're always<br>here. <em>Really.</em>
        </h1>
        <p class="hero-sub fade-up fade-up-2">
          Real humans, 24 hours a day, 5 days a week. No bots, no ticket queues, no waiting music. Reach us via live chat, WhatsApp, email, or phone — in 18 languages.
        </p>
      </div>

      <!-- Quick-reach cards -->
      <div class="col-lg-5 offset-lg-1 fade-up fade-up-3">
        <div class="d-flex flex-column gap-3">

          <a href="#" class="channel-card available">
            <div class="ch-icon chi-red"><i class="uil uil-comment-alt-dots"></i></div>
            <div style="flex:1;">
              <div class="ch-title">Live Chat</div>
              <div class="ch-desc">Instant support directly in your browser. No login required to start a conversation.</div>
              <div class="ch-status">
                <span class="status-dot dot-online"></span>
                <span class="st-online">Online now</span>
              </div>
            </div>
            <i class="uil uil-arrow-right ch-arrow"></i>
          </a>

          <a href="https://wa.me/1234567890" class="channel-card available">
            <div class="ch-icon chi-wa"><i class="uil uil-whatsapp"></i></div>
            <div style="flex:1;">
              <div class="ch-title">WhatsApp</div>
              <div class="ch-desc">Message us directly. We respond to WhatsApp within minutes during trading hours.</div>
              <div class="ch-status">
                <span class="status-dot dot-online"></span>
                <span class="st-online">Active · 24/5</span>
              </div>
            </div>
            <i class="uil uil-arrow-right ch-arrow"></i>
          </a>

          <a href="tel:+18001234567" class="channel-card available">
            <div class="ch-icon chi-sky"><i class="uil uil-phone"></i></div>
            <div style="flex:1;">
              <div class="ch-title">Phone</div>
              <div class="ch-desc">+1 800 123 4567 · Toll-free international. Available Mon–Fri, 00:00–22:00 GMT.</div>
              <div class="ch-status">
                <span class="status-dot dot-online"></span>
                <span class="st-online">Lines open</span>
              </div>
            </div>
            <i class="uil uil-arrow-right ch-arrow"></i>
          </a>

          <a href="mailto:support@teslainvest.com" class="channel-card away">
            <div class="ch-icon chi-violet"><i class="uil uil-envelope-alt"></i></div>
            <div style="flex:1;">
              <div class="ch-title">Email</div>
              <div class="ch-desc">support@teslainvest.com · Best for account queries, complaints, and documentation.</div>
              <div class="ch-status">
                <span class="status-dot dot-away"></span>
                <span class="st-away">Response within 4 hours</span>
              </div>
            </div>
            <i class="uil uil-arrow-right ch-arrow"></i>
          </a>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── TICKER ── -->
<div class="ticker-bg">
  <div class="ticker-track">
    <span class="ticker-item"><span class="tl">Live Chat</span><span class="tv">Online Now</span><span class="ta">· &lt;2 min response</span></span>
    <span class="ticker-item"><span class="tl">WhatsApp</span><span class="tv">+1 800 123 4567</span><span class="ta">· 24/5 active</span></span>
    <span class="ticker-item"><span class="tl">Email</span><span class="tv">support@teslainvest.com</span><span class="ta">· &lt;4 hr response</span></span>
    <span class="ticker-item"><span class="tl">Languages</span><span class="tv">18 supported</span><span class="ta">· global team</span></span>
    <span class="ticker-item"><span class="tl">London HQ</span><span class="tv">1 Canada Square, E14 5AB</span><span class="ta">· FCA regulated</span></span>
    <span class="ticker-item"><span class="tl">Limassol</span><span class="tv">EU Operations</span><span class="ta">· CySEC regulated</span></span>
    <span class="ticker-item"><span class="tl">Sydney</span><span class="tv">Asia-Pacific Office</span><span class="ta">· ASIC regulated</span></span>
    <!-- dupe -->
    <span class="ticker-item"><span class="tl">Live Chat</span><span class="tv">Online Now</span><span class="ta">· &lt;2 min response</span></span>
    <span class="ticker-item"><span class="tl">WhatsApp</span><span class="tv">+1 800 123 4567</span><span class="ta">· 24/5 active</span></span>
    <span class="ticker-item"><span class="tl">Email</span><span class="tv">support@teslainvest.com</span><span class="ta">· &lt;4 hr response</span></span>
    <span class="ticker-item"><span class="tl">Languages</span><span class="tv">18 supported</span><span class="ta">· global team</span></span>
    <span class="ticker-item"><span class="tl">London HQ</span><span class="tv">1 Canada Square, E14 5AB</span><span class="ta">· FCA regulated</span></span>
    <span class="ticker-item"><span class="tl">Limassol</span><span class="tv">EU Operations</span><span class="ta">· CySEC regulated</span></span>
    <span class="ticker-item"><span class="tl">Sydney</span><span class="tv">Asia-Pacific Office</span><span class="ta">· ASIC regulated</span></span>
  </div>
</div>

<!-- ── MAIN: FORM + OFFICES ── -->
<section class="contact-main py-5">
  <div class="container py-3">
    <div class="row g-5">

      <!-- Left: Offices + FAQ -->
      <div class="col-lg-5">

        <!-- Offices -->
        <div class="section-tag">Global Offices</div>
        <h2 class="section-title mb-4">Find us<br>worldwide.</h2>

        <div class="row g-3 mb-5">
          <div class="col-sm-6">
            <div class="office-card">
              <span class="office-flag">🇬🇧</span>
              <div class="office-city">London</div>
              <div class="office-role">Global Headquarters</div>
              <div class="office-addr">1 Canada Square<br>Canary Wharf<br>London, E14 5AB</div>
              <div class="office-divider"></div>
              <div class="office-hours"><i class="uil uil-clock"></i> Mon–Fri · 07:00–20:00 GMT</div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="office-card">
              <span class="office-flag">🇨🇾</span>
              <div class="office-city">Limassol</div>
              <div class="office-role">EU Operations</div>
              <div class="office-addr">Arch. Makarios III<br>Avenue 172<br>Limassol, 3027</div>
              <div class="office-divider"></div>
              <div class="office-hours"><i class="uil uil-clock"></i> Mon–Fri · 08:00–18:00 EET</div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="office-card">
              <span class="office-flag">🇦🇺</span>
              <div class="office-city">Sydney</div>
              <div class="office-role">Asia-Pacific</div>
              <div class="office-addr">Level 20, Tower One<br>Barangaroo Ave<br>Sydney, NSW 2000</div>
              <div class="office-divider"></div>
              <div class="office-hours"><i class="uil uil-clock"></i> Mon–Fri · 08:00–17:00 AEST</div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="office-card">
              <span class="office-flag">🇿🇦</span>
              <div class="office-city">Johannesburg</div>
              <div class="office-role">Africa Region</div>
              <div class="office-addr">Sandton City Office<br>Tower, 5th Floor<br>Sandton, 2196</div>
              <div class="office-divider"></div>
              <div class="office-hours"><i class="uil uil-clock"></i> Mon–Fri · 08:00–17:00 SAST</div>
            </div>
          </div>
        </div>

        <!-- Department emails -->
        <div class="section-tag">Department Emails</div>
        <h2 class="section-title mb-4">Direct<br>contacts.</h2>
        <div class="d-flex flex-column gap-2 mb-5">
          <div style="display:flex;align-items:center;gap:1rem;padding:0.9rem 1.2rem;background:var(--dark2);border:1px solid var(--border);border-radius:10px;">
            <div style="width:36px;height:36px;border-radius:9px;background:var(--accent-dim);display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="uil uil-user-circle" style="color:var(--accent-bright);font-size:1.1rem;"></i></div>
            <div style="flex:1;">
              <div style="font-size:0.72rem;text-transform:uppercase;letter-spacing:0.15em;color:var(--muted);">Client Support</div>
              <div style="font-size:0.86rem;color:#fff;">support@teslainvest.com</div>
            </div>
            <div style="font-size:0.65rem;color:var(--green);letter-spacing:0.1em;text-transform:uppercase;">&lt;4 hrs</div>
          </div>
          <div style="display:flex;align-items:center;gap:1rem;padding:0.9rem 1.2rem;background:var(--dark2);border:1px solid var(--border);border-radius:10px;">
            <div style="width:36px;height:36px;border-radius:9px;background:var(--sky-dim);display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="uil uil-briefcase" style="color:#38bdf8;font-size:1.1rem;"></i></div>
            <div style="flex:1;">
              <div style="font-size:0.72rem;text-transform:uppercase;letter-spacing:0.15em;color:var(--muted);">Institutional &amp; Partners</div>
              <div style="font-size:0.86rem;color:#fff;">institutional@teslainvest.com</div>
            </div>
            <div style="font-size:0.65rem;color:var(--green);letter-spacing:0.1em;text-transform:uppercase;">&lt;2 hrs</div>
          </div>
          <div style="display:flex;align-items:center;gap:1rem;padding:0.9rem 1.2rem;background:var(--dark2);border:1px solid var(--border);border-radius:10px;">
            <div style="width:36px;height:36px;border-radius:9px;background:var(--violet-dim);display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="uil uil-shield-check" style="color:#a78bfa;font-size:1.1rem;"></i></div>
            <div style="flex:1;">
              <div style="font-size:0.72rem;text-transform:uppercase;letter-spacing:0.15em;color:var(--muted);">Compliance &amp; Legal</div>
              <div style="font-size:0.86rem;color:#fff;">compliance@teslainvest.com</div>
            </div>
            <div style="font-size:0.65rem;color:var(--gold);letter-spacing:0.1em;text-transform:uppercase;">1 business day</div>
          </div>
          <div style="display:flex;align-items:center;gap:1rem;padding:0.9rem 1.2rem;background:var(--dark2);border:1px solid var(--border);border-radius:10px;">
            <div style="width:36px;height:36px;border-radius:9px;background:rgba(212,168,67,0.10);display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="uil uil-megaphone" style="color:var(--gold);font-size:1.1rem;"></i></div>
            <div style="flex:1;">
              <div style="font-size:0.72rem;text-transform:uppercase;letter-spacing:0.15em;color:var(--muted);">Press &amp; Media</div>
              <div style="font-size:0.86rem;color:#fff;">press@teslainvest.com</div>
            </div>
            <div style="font-size:0.65rem;color:var(--gold);letter-spacing:0.1em;text-transform:uppercase;">1 business day</div>
          </div>
        </div>

      </div>

      <!-- Right: Contact Form -->
      <div class="col-lg-6 offset-lg-1">
        <div class="form-wrap">
          <div class="form-header">
            <div class="form-header-title">Send us a message</div>
            <div class="form-header-sub">We'll respond within 4 hours during trading days.</div>
          </div>
          <div class="form-body" id="formBody">

            <!-- Department tabs -->
            <div class="dept-tabs">
              <div class="dept-tab active" onclick="setDept(this)">General</div>
              <div class="dept-tab" onclick="setDept(this)">Account</div>
              <div class="dept-tab" onclick="setDept(this)">Technical</div>
              <div class="dept-tab" onclick="setDept(this)">Partnerships</div>
              <div class="dept-tab" onclick="setDept(this)">Complaints</div>
            </div>

            <div class="field-row">
              <div class="field-group">
                <label class="field-label">First Name</label>
                <input class="field-input" type="text" placeholder="John">
              </div>
              <div class="field-group">
                <label class="field-label">Last Name</label>
                <input class="field-input" type="text" placeholder="Smith">
              </div>
            </div>

            <div class="field-row">
              <div class="field-group">
                <label class="field-label">Email Address</label>
                <input class="field-input" type="email" placeholder="you@example.com">
              </div>
              <div class="field-group">
                <label class="field-label">Phone (optional)</label>
                <input class="field-input" type="tel" placeholder="+1 000 000 0000">
              </div>
            </div>

            <div class="field-group">
              <label class="field-label">Account Number (if applicable)</label>
              <input class="field-input" type="text" placeholder="TI-000000">
              <div class="field-hint">Leave blank if you don't have an account yet.</div>
            </div>

            <div class="field-group">
              <label class="field-label">Subject</label>
              <select class="field-select">
                <option value="" disabled selected>Select a topic…</option>
                <option>Account opening / KYC</option>
                <option>Deposit / Withdrawal</option>
                <option>Platform issue</option>
                <option>Spreads / Pricing question</option>
                <option>PAMM / Copy trading</option>
                <option>Islamic account</option>
                <option>Partnership / IB enquiry</option>
                <option>Complaint</option>
                <option>Other</option>
              </select>
            </div>

            <div class="field-group">
              <label class="field-label">Message</label>
              <textarea class="field-textarea" rows="5" placeholder="Describe your query in as much detail as possible. The more context you give, the faster we can help."></textarea>
            </div>

            <!-- Priority flag -->
            <div class="field-group">
              <label class="field-label">Priority</label>
              <div class="d-flex gap-2">
                <label style="display:flex;align-items:center;gap:6px;cursor:pointer;font-size:0.8rem;color:var(--muted);padding:0.5rem 0.9rem;background:var(--mid);border:1px solid var(--border);border-radius:7px;flex:1;transition:all 0.15s;" id="prio-normal">
                  <input type="radio" name="priority" value="normal" checked style="accent-color:var(--red);"> Normal
                </label>
                <label style="display:flex;align-items:center;gap:6px;cursor:pointer;font-size:0.8rem;color:var(--muted);padding:0.5rem 0.9rem;background:var(--mid);border:1px solid var(--border);border-radius:7px;flex:1;transition:all 0.15s;" id="prio-urgent">
                  <input type="radio" name="priority" value="urgent" style="accent-color:var(--red);"> Urgent
                </label>
                <label style="display:flex;align-items:center;gap:6px;cursor:pointer;font-size:0.8rem;color:var(--muted);padding:0.5rem 0.9rem;background:var(--mid);border:1px solid var(--border);border-radius:7px;flex:1;transition:all 0.15s;" id="prio-vip">
                  <input type="radio" name="priority" value="vip" style="accent-color:var(--red);"> VIP
                </label>
              </div>
            </div>

            <button class="form-submit" onclick="submitForm()">
              <i class="uil uil-message"></i> Send Message
            </button>

            <p class="form-footer-note">
              By submitting, you agree to our <a href="#" style="color:var(--muted);text-decoration:underline;">Privacy Policy</a>. We never share your details with third parties. Encrypted in transit.
            </p>
          </div>

          <!-- Success state -->
          <div class="form-success" id="formSuccess">
            <div class="success-icon"><i class="uil uil-check"></i></div>
            <div class="success-title">Message sent.</div>
            <p class="success-text">
              Thank you for reaching out. A member of our support team will respond to <strong style="color:#fff;" id="successEmail">your email</strong> within 4 hours.
              <br><br>
              For urgent matters, please use Live Chat or WhatsApp above.
            </p>
            <button onclick="resetForm()" style="margin-top:1.4rem;background:var(--mid);border:1px solid var(--border);color:var(--muted);font-size:0.75rem;letter-spacing:0.12em;text-transform:uppercase;padding:0.6rem 1.4rem;border-radius:7px;cursor:pointer;transition:all 0.15s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--muted)'">Send Another</button>
          </div>
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
        <p class="mt-3" style="font-size:0.88rem;color:var(--muted);line-height:1.8;max-width:290px;">
          Can't find what you need? Our support team is always available via live chat or WhatsApp.
        </p>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div id="faqList">
          <div class="faq-item">
            <button class="faq-q" onclick="toggleFaq(this)">
              <span class="faq-q-text">How quickly can I open a live account?</span>
              <span class="faq-icon"><i class="uil uil-plus"></i></span>
            </button>
            <div class="faq-a">Account registration takes under 3 minutes. Identity verification (KYC) is automated and typically completes within 5–15 minutes during business hours. Once approved, you can deposit and trade immediately. We support bank transfers, cards, and 12+ e-wallets for instant funding.</div>
          </div>
          <div class="faq-item">
            <button class="faq-q" onclick="toggleFaq(this)">
              <span class="faq-q-text">What documents do I need for verification?</span>
              <span class="faq-icon"><i class="uil uil-plus"></i></span>
            </button>
            <div class="faq-a">You'll need a valid government-issued photo ID (passport or national ID card) and a proof of address document dated within the last 3 months (utility bill, bank statement, or official correspondence). All documents can be uploaded directly in the platform — no printing or posting required.</div>
          </div>
          <div class="faq-item">
            <button class="faq-q" onclick="toggleFaq(this)">
              <span class="faq-q-text">How long do withdrawals take?</span>
              <span class="faq-icon"><i class="uil uil-plus"></i></span>
            </button>
            <div class="faq-a">Card and e-wallet withdrawals are typically processed within 24 hours of your request. Bank wire transfers are processed within 1–3 business days depending on your bank. We process all withdrawal requests by 14:00 GMT on business days. There are no withdrawal fees on our end.</div>
          </div>
          <div class="faq-item">
            <button class="faq-q" onclick="toggleFaq(this)">
              <span class="faq-q-text">Do you offer support in my language?</span>
              <span class="faq-icon"><i class="uil uil-plus"></i></span>
            </button>
            <div class="faq-a">Yes — our support team operates in 18 languages including English, Arabic, Spanish, French, Portuguese, German, Italian, Russian, Turkish, Thai, Vietnamese, Indonesian, Chinese (Mandarin &amp; Cantonese), Japanese, Korean, Polish, and Swahili. Simply open live chat and the system will route you to an agent who speaks your language.</div>
          </div>
          <div class="faq-item">
            <button class="faq-q" onclick="toggleFaq(this)">
              <span class="faq-q-text">How do I make a formal complaint?</span>
              <span class="faq-icon"><i class="uil uil-plus"></i></span>
            </button>
            <div class="faq-a">Email compliance@teslainvest.com with your account number, a description of the issue, and any relevant screenshots or trade IDs. All complaints are acknowledged within 24 hours and resolved within 5 business days. If you're an EU or UK client and remain unsatisfied, you may escalate to the FCA or CySEC directly.</div>
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
    <h2 class="section-title mt-1 mx-auto" style="max-width:520px;">Questions answered.<br>Account waiting.</h2>
    <p class="mt-3 mx-auto" style="font-size:0.92rem;color:var(--muted);line-height:1.8;max-width:440px;">
      Open a live account in minutes or try every feature risk-free with a $10,000 demo — no deposit required, no commitment, no time limit.
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
<script>
  document.getElementById('year').textContent = new Date().getFullYear();

  /* ── DEPT TABS ── */
  function setDept(el) {
    document.querySelectorAll('.dept-tab').forEach(t => t.classList.remove('active'));
    el.classList.add('active');
  }

  /* ── FORM SUBMIT ── */
  function submitForm() {
    const emailInput = document.querySelector('input[type="email"]');
    const emailVal   = emailInput ? emailInput.value.trim() : '';
    const successEl  = document.getElementById('successEmail');
    if (successEl) successEl.textContent = emailVal || 'your email address';

    const body    = document.getElementById('formBody');
    const success = document.getElementById('formSuccess');
    if (body && success) {
      body.style.display    = 'none';
      success.style.display = 'block';
    }
  }

  function resetForm() {
    const body    = document.getElementById('formBody');
    const success = document.getElementById('formSuccess');
    if (body && success) {
      body.style.display    = 'block';
      success.style.display = 'none';
    }
  }

  /* ── FAQ ACCORDION ── */
  function toggleFaq(btn) {
    const item = btn.closest('.faq-item');
    const wasOpen = item.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
    if (!wasOpen) item.classList.add('open');
  }
</script>
</body>
</html>
