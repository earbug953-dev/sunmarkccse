<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Trade Certificate — Tesla Invest</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
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
      --gold: #d4a843;
      --gold-dim: rgba(212,168,67,0.10);
      --gold-bright: #f0c84a;
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
      backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--border);
      padding: 1.1rem 0;
    }
    .navbar-brand {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.55rem; font-weight: 600;
      letter-spacing: 0.12em; color: #fff !important;
    }
    .table{
        bg:var(--dark);
    }
    .navbar-brand span { color: var(--red); }
    .nav-link {
      font-size: 0.75rem; letter-spacing: 0.14em; font-weight: 500;
      color: var(--muted) !important; text-transform: uppercase; transition: color 0.2s;
    }
    .nav-link:hover { color: #fff !important; }
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
    .cert-hero {
      position: relative;
      min-height: 52vh;
      display: flex; align-items: center;
      overflow: hidden;
      background: var(--dark3);
      border-bottom: 1px solid var(--border);
      padding-top: 72px;
    }
    .hero-bg {
      position: absolute; inset: 0; pointer-events: none;
      background:
        radial-gradient(ellipse 55% 70% at 5% 55%, rgba(212,168,67,0.07) 0%, transparent 60%),
        radial-gradient(ellipse 40% 55% at 90% 30%, rgba(227,25,55,0.05) 0%, transparent 55%);
    }
    .dot-grid {
      position: absolute; inset: 0; pointer-events: none;
      background-image: radial-gradient(circle, rgba(255,255,255,0.045) 1px, transparent 1px);
      background-size: 34px 34px;
      mask-image: radial-gradient(ellipse 85% 85% at 50% 50%, black 20%, transparent 100%);
    }
    /* Gold corner ornament lines */
    .corner-ornament {
      position: absolute; pointer-events: none;
    }
    .corner-ornament.tl { top: 90px; left: 0; width: 160px; height: 160px; }
    .corner-ornament.br { bottom: 0; right: 0; width: 160px; height: 160px; transform: rotate(180deg); }
    .corner-ornament svg line { stroke: rgba(212,168,67,0.18); stroke-width: 1; }

    .hero-eyebrow {
      font-size: 0.7rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--gold-bright); font-weight: 500;
      display: flex; align-items: center; gap: 12px; margin-bottom: 1.4rem;
    }
    .hero-eyebrow::before {
      content: ''; width: 36px; height: 1px;
      background: linear-gradient(90deg, var(--gold), rgba(212,168,67,0.3));
    }
    .hero-title {
      font-size: clamp(2.8rem, 6vw, 5.2rem);
      font-weight: 300; line-height: 1.06; color: #fff; margin-bottom: 1.4rem;
    }
    .hero-title em {
      font-style: italic;
      background: linear-gradient(135deg, var(--gold-bright), #f8e08a, var(--gold));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .hero-meta {
      display: flex; gap: 1.8rem; flex-wrap: wrap; margin-top: 1.4rem;
    }
    .meta-item {
      font-size: 0.72rem; color: var(--muted); letter-spacing: 0.06em;
      display: flex; align-items: center; gap: 6px;
    }
    .meta-item i { color: var(--gold-bright); }

    /* ── TICKER ── */
    .ticker-bg {
      border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);
      height: 46px; overflow: hidden; display: flex; align-items: center;
      background: rgba(12,12,14,0.6);
    }
    .ticker-track {
      display: flex; gap: 3rem;
      animation: tickerScroll 44s linear infinite; white-space: nowrap;
    }
    @keyframes tickerScroll {
      0%   { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }
    .ticker-item { font-size: 0.7rem; letter-spacing: 0.1em; display: flex; align-items: center; gap: 0.5rem; }
    .tl { color: rgba(255,255,255,0.35); }
    .tv { color: rgba(255,255,255,0.65); }
    .tg { color: var(--gold-bright); }

    /* ── SECTION HELPERS ── */
    .section-tag {
      font-size: 0.68rem; letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--gold-bright); font-weight: 500;
      display: inline-flex; align-items: center; gap: 10px; margin-bottom: 1.2rem;
    }
    .section-tag::after {
      content: ''; width: 28px; height: 1px;
      background: linear-gradient(90deg, var(--gold), transparent);
    }
    .section-title { font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 300; color: #fff; line-height: 1.1; }

    /* ── NUMBERS STRIP ── */
    .numbers-strip { border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); background: var(--dark2); }
    .num-item { text-align: center; padding: 2.6rem 1rem; border-right: 1px solid var(--border); }
    .num-item:last-child { border-right: none; }
    .big-num {
      font-family: 'Cormorant Garamond', serif; font-size: 3rem; font-weight: 300; color: #fff; line-height: 1;
      background: linear-gradient(135deg, var(--gold-bright), var(--gold));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .num-desc { font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--muted); margin-top: 0.5rem; }

    /* ── CERTIFICATE LOOKUP ── */
    .lookup-section { background: var(--dark); }
    .lookup-card {
      background: var(--dark2);
      border: 1px solid rgba(212,168,67,0.14);
      border-radius: 20px; overflow: hidden;
      box-shadow: 0 0 60px rgba(212,168,67,0.04);
    }
    .lookup-header {
      background: linear-gradient(135deg, rgba(212,168,67,0.07) 0%, transparent 60%);
      border-bottom: 1px solid rgba(212,168,67,0.10);
      padding: 1.8rem 2.2rem;
      display: flex; align-items: center; gap: 1rem;
    }
    .lh-icon {
      width: 48px; height: 48px; border-radius: 12px;
      background: var(--gold-dim); border: 1px solid rgba(212,168,67,0.2);
      display: flex; align-items: center; justify-content: center;
      color: var(--gold-bright); font-size: 1.4rem;
    }
    .lh-title { font-family: 'Cormorant Garamond', serif; font-size: 1.6rem; font-weight: 300; color: #fff; }
    .lh-sub   { font-size: 0.78rem; color: var(--muted); margin-top: 2px; }
    .lookup-body { padding: 2.2rem; }

    .lookup-input-group {
      display: flex; gap: 0.8rem; flex-wrap: wrap;
    }
    .lookup-input {
      flex: 1; min-width: 200px;
      background: var(--mid); border: 1px solid var(--border);
      border-radius: 8px; padding: 0.85rem 1.1rem;
      color: #fff; font-size: 0.9rem; font-family: 'DM Sans', sans-serif;
      transition: border-color 0.2s; outline: none;
      letter-spacing: 0.06em;
    }
    .lookup-input::placeholder { color: var(--muted); }
    .lookup-input:focus { border-color: rgba(212,168,67,0.4); }
    .lookup-btn {
      background: var(--gold); border: none; color: #0c0c0e;
      font-size: 0.75rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 2rem; border-radius: 8px; font-weight: 500;
      cursor: pointer; transition: background 0.2s; white-space: nowrap;
    }
    .lookup-btn:hover { background: var(--gold-bright); }

    /* Result box */
    .lookup-result { margin-top: 1.4rem; display: none; }
    .lookup-result.show { display: block; }
    .result-found {
      background: var(--green-dim); border: 1px solid rgba(34,197,94,0.2);
      border-radius: 12px; padding: 1.4rem 1.6rem;
      display: flex; align-items: center; gap: 1.2rem;
    }
    .result-found i { font-size: 2rem; color: var(--green); flex-shrink: 0; }
    .result-not-found {
      background: rgba(244,63,94,0.06); border: 1px solid rgba(244,63,94,0.18);
      border-radius: 12px; padding: 1.4rem 1.6rem;
      display: flex; align-items: center; gap: 1.2rem;
    }
    .result-not-found i { font-size: 2rem; color: #f43f5e; flex-shrink: 0; }
    .result-title { font-size: 1rem; font-weight: 500; color: #fff; margin-bottom: 0.3rem; }
    .result-sub   { font-size: 0.82rem; color: var(--muted); }

    /* ── CERTIFICATE PREVIEW (the actual certificate) ── */
    .cert-preview-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }

    .cert-wrap {
      max-width: 820px; margin: 0 auto;
      position: relative;
    }

    /* The certificate document */
    .certificate {
      background: #f9f6ef;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 40px 100px rgba(0,0,0,0.6);
      position: relative;
      font-family: 'Cormorant Garamond', serif;
      color: #1a1208;
      padding: 0;
    }

    /* Gold border frame */
    .cert-frame {
      position: absolute; inset: 10px; pointer-events: none; z-index: 3;
      border: 1px solid rgba(212,168,67,0.45);
      border-radius: 2px;
    }
    .cert-frame::before {
      content: ''; position: absolute; inset: 5px;
      border: 1px solid rgba(212,168,67,0.20);
      border-radius: 1px;
    }

    /* Corner ornaments */
    .cert-corner {
      position: absolute; width: 44px; height: 44px; pointer-events: none; z-index: 4;
    }
    .cert-corner.tl { top: 10px; left: 10px; }
    .cert-corner.tr { top: 10px; right: 10px; transform: scaleX(-1); }
    .cert-corner.bl { bottom: 10px; left: 10px; transform: scaleY(-1); }
    .cert-corner.br { bottom: 10px; right: 10px; transform: scale(-1); }

    /* Watermark */
    .cert-watermark {
      position: absolute; inset: 0; z-index: 1; pointer-events: none;
      display: flex; align-items: center; justify-content: center;
      opacity: 0.045;
    }
    .cert-watermark-text {
      font-family: 'Cormorant Garamond', serif;
      font-size: 9rem; font-weight: 700; letter-spacing: 0.1em;
      color: #8a6c1e; transform: rotate(-30deg);
      white-space: nowrap;
    }

    .cert-inner {
      position: relative; z-index: 2;
      padding: 3.5rem 4rem;
    }

    /* Gold top bar */
    .cert-top-bar {
      height: 5px;
      background: linear-gradient(90deg, #8a6c1e, #d4a843, #f0c84a, #d4a843, #8a6c1e);
    }

    .cert-header { text-align: center; margin-bottom: 2rem; }
    .cert-brand {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.1rem; font-weight: 600; letter-spacing: 0.32em;
      text-transform: uppercase; color: #6b4e10; margin-bottom: 0.6rem;
    }
    .cert-divider {
      display: flex; align-items: center; gap: 0.8rem; justify-content: center;
      margin: 0.6rem 0;
    }
    .cert-divider-line {
      flex: 1; height: 1px; max-width: 100px;
      background: linear-gradient(90deg, transparent, #c9a43d, transparent);
    }
    .cert-divider-diamond {
      width: 6px; height: 6px; background: #c9a43d; transform: rotate(45deg);
    }
    .cert-headline {
      font-size: 0.75rem; letter-spacing: 0.28em; text-transform: uppercase;
      color: #8a7040; margin-bottom: 1.4rem;
    }
    .cert-main-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 3.2rem; font-weight: 300; color: #1a1208;
      line-height: 1; letter-spacing: 0.02em;
    }
    .cert-main-title em {
      font-style: italic; color: #8a6010;
    }

    .cert-body { text-align: center; margin: 1.8rem 0; }
    .cert-preamble {
      font-size: 0.85rem; color: #5a4a20; letter-spacing: 0.08em; line-height: 1.8;
      margin-bottom: 1rem;
    }
    .cert-client-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.8rem; font-weight: 300; font-style: italic;
      color: #1a1208; letter-spacing: 0.04em;
      border-bottom: 1px solid rgba(180,140,40,0.35);
      display: inline-block; padding: 0 2rem 0.3rem;
      margin: 0.4rem 0 0.8rem;
    }
    .cert-account-ref {
      font-size: 0.72rem; letter-spacing: 0.22em; color: #8a7040; text-transform: uppercase;
    }

    .cert-statement {
      font-size: 0.9rem; color: #3d2e0a; line-height: 1.95;
      max-width: 520px; margin: 1.4rem auto;
    }

    /* Stats row inside cert */
    .cert-stats {
      display: grid; grid-template-columns: repeat(4, 1fr);
      gap: 0; margin: 2rem 0;
      border: 1px solid rgba(180,140,40,0.3);
      border-radius: 4px; overflow: hidden;
    }
    .cert-stat {
      text-align: center; padding: 1.1rem 0.6rem;
      border-right: 1px solid rgba(180,140,40,0.2);
      background: rgba(212,168,67,0.04);
    }
    .cert-stat:last-child { border-right: none; }
    .cs-val {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.6rem; font-weight: 300; color: #1a1208; line-height: 1;
    }
    .cs-label { font-size: 0.62rem; letter-spacing: 0.16em; text-transform: uppercase; color: #8a7040; margin-top: 0.35rem; }

    /* Signatures row */
    .cert-signatures {
      display: grid; grid-template-columns: 1fr 1fr 1fr;
      gap: 1rem; margin: 2rem 0 1.2rem;
    }
    .cert-sig { text-align: center; }
    .sig-line {
      height: 1px; background: rgba(180,140,40,0.4); margin-bottom: 0.5rem;
      position: relative;
    }
    .sig-name  { font-size: 0.78rem; font-weight: 600; color: #1a1208; letter-spacing: 0.04em; }
    .sig-title { font-size: 0.65rem; letter-spacing: 0.12em; text-transform: uppercase; color: #8a7040; margin-top: 2px; }

    /* Seals */
    .cert-seals {
      display: flex; justify-content: center; gap: 2.4rem;
      margin: 1.2rem 0;
    }
    .cert-seal {
      width: 64px; height: 64px; border-radius: 50%;
      border: 2px solid rgba(180,140,40,0.4);
      display: flex; align-items: center; justify-content: center;
      flex-direction: column; gap: 2px;
      background: rgba(212,168,67,0.05);
    }
    .seal-icon { font-size: 1.3rem; }
    .seal-text { font-size: 0.48rem; letter-spacing: 0.1em; text-transform: uppercase; color: #8a7040; text-align: center; }

    .cert-footer-text {
      text-align: center; font-size: 0.65rem; letter-spacing: 0.12em;
      color: #a08040; margin-top: 1.2rem; line-height: 1.7;
    }
    .cert-cert-id {
      font-size: 0.62rem; letter-spacing: 0.18em; color: #b09050; margin-top: 0.5rem;
    }

    /* Gold bottom bar */
    .cert-bottom-bar {
      height: 5px;
      background: linear-gradient(90deg, #8a6c1e, #d4a843, #f0c84a, #d4a843, #8a6c1e);
    }

    /* Download/Print buttons */
    .cert-actions {
      display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;
      margin-top: 2.2rem;
    }
    .btn-gold {
      background: linear-gradient(135deg, var(--gold), var(--gold-bright));
      color: #0c0c0e; font-size: 0.75rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.8rem 2rem; border: none; border-radius: 6px; font-weight: 600;
      cursor: pointer; transition: opacity 0.2s; display: inline-flex; align-items: center; gap: 0.5rem;
      text-decoration: none;
    }
    .btn-gold:hover { opacity: 0.88; color: #0c0c0e; }
    .btn-ghost-gold {
      background: transparent; color: var(--gold-bright);
      font-size: 0.75rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.8rem 2rem; border: 1px solid rgba(212,168,67,0.3); border-radius: 6px;
      cursor: pointer; transition: all 0.2s; display: inline-flex; align-items: center; gap: 0.5rem;
      text-decoration: none;
    }
    .btn-ghost-gold:hover { border-color: rgba(212,168,67,0.6); color: var(--gold-bright); background: rgba(212,168,67,0.05); }

    /* ── WHAT IS A TRADE CERT section ── */
    .what-section { border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }

    .info-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 16px; padding: 1.8rem; height: 100%;
      position: relative; overflow: hidden; transition: transform 0.25s, border-color 0.25s;
    }
    .info-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
      background: linear-gradient(90deg, var(--gold), rgba(212,168,67,0.2));
      opacity: 0; transition: opacity 0.25s;
    }
    .info-card:hover { transform: translateY(-4px); border-color: rgba(212,168,67,0.22); }
    .info-card:hover::before { opacity: 1; }
    .ic-icon {
      width: 46px; height: 46px; border-radius: 10px;
      background: var(--gold-dim); border: 1px solid rgba(212,168,67,0.2);
      display: flex; align-items: center; justify-content: center;
      color: var(--gold-bright); font-size: 1.3rem; margin-bottom: 1.1rem;
    }
    .ic-title { font-family: 'Cormorant Garamond', serif; font-size: 1.35rem; color: #fff; margin-bottom: 0.5rem; }
    .ic-text  { font-size: 0.86rem; color: var(--muted); line-height: 1.8; }

    /* ── HOW TO OBTAIN ── */
    .steps-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .step-row {
      display: flex; gap: 1.5rem; align-items: flex-start;
      padding: 1.6rem 0; border-bottom: 1px solid var(--border);
    }
    .step-row:last-child { border-bottom: none; }
    .step-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 3rem; font-weight: 300; line-height: 1;
      background: linear-gradient(135deg, var(--gold-bright), var(--gold));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
      flex-shrink: 0; width: 50px; text-align: right;
    }
    .step-content { flex: 1; padding-top: 0.3rem; }
    .step-title { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; color: #fff; margin-bottom: 0.4rem; }
    .step-text  { font-size: 0.88rem; color: var(--muted); line-height: 1.8; }
    .step-tag {
      display: inline-block; font-size: 0.62rem; letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.18rem 0.6rem; border-radius: 4px; margin-top: 0.5rem;
      background: var(--gold-dim); color: var(--gold-bright); border: 1px solid rgba(212,168,67,0.2);
    }

    /* ── VERIFICATION METHODS ── */
    .verify-section { background: var(--dark); border-top: 1px solid var(--border); }
    .verify-card {
      background: var(--dark2); border: 1px solid var(--border);
      border-radius: 14px; padding: 1.6rem; text-align: center; height: 100%;
      transition: border-color 0.2s, transform 0.2s;
    }
    .verify-card:hover { border-color: rgba(212,168,67,0.22); transform: translateY(-3px); }
    .vc-icon { font-size: 2.2rem; margin-bottom: 0.8rem; }
    .vc-title { font-family: 'Cormorant Garamond', serif; font-size: 1.25rem; color: #fff; margin-bottom: 0.4rem; }
    .vc-text  { font-size: 0.82rem; color: var(--muted); line-height: 1.75; }

    /* ── FAQ ── */
    .faq-section { background: var(--dark2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .faq-item { border-bottom: 1px solid var(--border); }
    .faq-item:last-child { border-bottom: none; }
    .faq-q {
      width: 100%; background: none; border: none; text-align: left;
      padding: 1.3rem 0; cursor: pointer;
      display: flex; align-items: center; justify-content: space-between; gap: 1rem;
      font-family: 'Cormorant Garamond', serif; font-size: 1.25rem; color: #fff;
      transition: color 0.15s;
    }
    .faq-q:hover { color: var(--gold-bright); }
    .faq-q .faq-icon {
      width: 28px; height: 28px; border-radius: 50%; flex-shrink: 0;
      background: var(--gold-dim); border: 1px solid rgba(212,168,67,0.2);
      display: flex; align-items: center; justify-content: center;
      color: var(--gold-bright); font-size: 0.9rem; transition: transform 0.25s;
    }
    .faq-q.open .faq-icon { transform: rotate(45deg); background: rgba(212,168,67,0.15); }
    .faq-a {
      font-size: 0.88rem; color: var(--muted); line-height: 1.85;
      max-height: 0; overflow: hidden; transition: max-height 0.35s ease, padding 0.2s;
    }
    .faq-a.open { max-height: 300px; padding-bottom: 1.2rem; }

    /* ── CTA ── */
    .cta-band {
      background: linear-gradient(135deg, rgba(212,168,67,0.06) 0%, transparent 55%), var(--dark3);
      border-top: 1px solid rgba(212,168,67,0.10);
      border-bottom: 1px solid rgba(212,168,67,0.10);
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
      from { opacity: 0; transform: translateY(22px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .fu  { animation: fadeUp 0.7s ease both; }
    .fu1 { animation-delay: 0.10s; }
    .fu2 { animation-delay: 0.22s; }
    .fu3 { animation-delay: 0.34s; }

    /* Gold gleam sweep on certificate */
    @keyframes gleam {
      0%   { transform: translateX(-120%) skewX(-20deg); }
      100% { transform: translateX(220%) skewX(-20deg); }
    }
    .cert-gleam {
      position: absolute; top: 0; left: 0; right: 0; bottom: 0;
      pointer-events: none; z-index: 5; overflow: hidden; border-radius: 8px;
    }
    .cert-gleam::after {
      content: ''; position: absolute; top: -50%; left: 0; width: 40%; height: 200%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.06), transparent);
      animation: gleam 5s ease-in-out 1.5s infinite;
    }

    @media (max-width: 767px) {
      .cert-inner { padding: 2rem 1.5rem; }
      .cert-stats { grid-template-columns: repeat(2, 1fr); }
      .cert-signatures { grid-template-columns: 1fr; gap: 1.5rem; }
      .cert-main-title { font-size: 2.2rem; }
      .cert-client-name { font-size: 2rem; }
      .num-item { border-right: none; border-bottom: 1px solid var(--border); }
      .num-item:last-child { border-bottom: none; }
    }
  </style>
</head>
<body>

<x-header/>

<!-- ── HERO ── -->
<section class="cert-hero">
  <div class="hero-bg"></div>
  <div class="dot-grid"></div>

  <!-- Corner ornaments -->
  <div class="corner-ornament tl">
    <svg width="160" height="160" viewBox="0 0 160 160" fill="none">
      <line x1="0" y1="0" x2="60" y2="0"/><line x1="0" y1="0" x2="0" y2="60"/>
      <line x1="10" y1="10" x2="50" y2="10"/><line x1="10" y1="10" x2="10" y2="50"/>
      <line x1="20" y1="20" x2="40" y2="20"/><line x1="20" y1="20" x2="20" y2="40"/>
    </svg>
  </div>
  <div class="corner-ornament br">
    <svg width="160" height="160" viewBox="0 0 160 160" fill="none">
      <line x1="0" y1="0" x2="60" y2="0"/><line x1="0" y1="0" x2="0" y2="60"/>
      <line x1="10" y1="10" x2="50" y2="10"/><line x1="10" y1="10" x2="10" y2="50"/>
      <line x1="20" y1="20" x2="40" y2="20"/><line x1="20" y1="20" x2="20" y2="40"/>
    </svg>
  </div>

  <div class="container py-5">
    <div class="row">
      <div class="col-lg-7">
        <div class="hero-eyebrow fu">Legal — Trade Certificate</div>
        <h1 class="hero-title fu fu1">
          Your proof of<br>trading <em>excellence.</em>
        </h1>
        <p style="font-size:1rem;color:var(--muted);line-height:1.85;max-width:520px;" class="fu fu2">
          A Tesla Invest Trade Certificate is an official, verifiable document issued to clients upon request that confirms account status, trading activity, and platform credentials — accepted by banks, institutions, and compliance departments worldwide.
        </p>
        <div class="hero-meta fu fu3">
          <div class="meta-item"><i class="uil uil-award"></i> Issued within 24 hours</div>
          <div class="meta-item"><i class="uil uil-shield-check"></i> Cryptographically signed</div>
          <div class="meta-item"><i class="uil uil-globe"></i> Internationally recognised</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── TICKER ── -->
<div class="ticker-bg">
  <div class="ticker-track">
    <span class="ticker-item"><span class="tl">Issued By</span><span class="tv">Tesla Invest (UK) Ltd · FCA Authorised</span></span>
    <span class="ticker-item"><span class="tl">Format</span><span class="tv">PDF · Wet Ink · Digital Seal</span></span>
    <span class="ticker-item"><span class="tl">Issuance Time</span><span class="tg">Within 24 Hours</span></span>
    <span class="ticker-item"><span class="tl">Validity</span><span class="tv">12 Months from Issue Date</span></span>
    <span class="ticker-item"><span class="tl">Verification</span><span class="tv">Online · QR Code · Certificate ID</span></span>
    <span class="ticker-item"><span class="tl">Languages</span><span class="tv">English · Arabic · French · Spanish · Chinese</span></span>
    <span class="ticker-item"><span class="tl">Request</span><span class="tv">certificates@teslainvest.com</span></span>
    <!-- dupe -->
    <span class="ticker-item"><span class="tl">Issued By</span><span class="tv">Tesla Invest (UK) Ltd · FCA Authorised</span></span>
    <span class="ticker-item"><span class="tl">Format</span><span class="tv">PDF · Wet Ink · Digital Seal</span></span>
    <span class="ticker-item"><span class="tl">Issuance Time</span><span class="tg">Within 24 Hours</span></span>
    <span class="ticker-item"><span class="tl">Validity</span><span class="tv">12 Months from Issue Date</span></span>
    <span class="ticker-item"><span class="tl">Verification</span><span class="tv">Online · QR Code · Certificate ID</span></span>
    <span class="ticker-item"><span class="tl">Languages</span><span class="tv">English · Arabic · French · Spanish · Chinese</span></span>
    <span class="ticker-item"><span class="tl">Request</span><span class="tv">certificates@teslainvest.com</span></span>
  </div>
</div>

<!-- ── NUMBERS STRIP ── -->
<div class="numbers-strip">
  <div class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">24hr</div>
        <div class="num-desc">Issuance Time</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">18+</div>
        <div class="num-desc">Accepted Languages</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">170+</div>
        <div class="num-desc">Countries Recognised</div>
      </div>
      <div class="col-6 col-md-3 num-item">
        <div class="big-num">100%</div>
        <div class="num-desc">Digitally Verifiable</div>
      </div>
    </div>
  </div>
</div>

<!-- ── CERTIFICATE PREVIEW ── -->
<section class="cert-preview-section py-5">
  <div class="container py-3">
    <div class="row align-items-end g-4 mb-5">
      <div class="col-lg-6">
        <div class="section-tag">Sample Certificate</div>
        <h2 class="section-title">What your certificate<br>looks like.</h2>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <p style="font-size:0.88rem;color:var(--muted);line-height:1.8;">This is a representative sample of a Tesla Invest Trade Certificate. Your issued certificate will contain your personal account data, trading statistics, and a unique cryptographic seal.</p>
      </div>
    </div>

    <div class="cert-wrap">
      <div class="certificate">
        <div class="cert-gleam"></div>
        <div class="cert-frame"></div>

        <!-- Corner ornaments inside cert -->
        <svg class="cert-corner tl" viewBox="0 0 44 44" fill="none">
          <path d="M2 22 L2 2 L22 2" stroke="#c9a43d" stroke-width="1.5" fill="none"/>
          <path d="M7 22 L7 7 L22 7" stroke="#c9a43d" stroke-width="0.8" fill="none" opacity="0.5"/>
          <rect x="2" y="2" width="4" height="4" fill="#c9a43d" opacity="0.6"/>
        </svg>
        <svg class="cert-corner tr" viewBox="0 0 44 44" fill="none">
          <path d="M2 22 L2 2 L22 2" stroke="#c9a43d" stroke-width="1.5" fill="none"/>
          <path d="M7 22 L7 7 L22 7" stroke="#c9a43d" stroke-width="0.8" fill="none" opacity="0.5"/>
          <rect x="2" y="2" width="4" height="4" fill="#c9a43d" opacity="0.6"/>
        </svg>
        <svg class="cert-corner bl" viewBox="0 0 44 44" fill="none">
          <path d="M2 22 L2 2 L22 2" stroke="#c9a43d" stroke-width="1.5" fill="none"/>
          <path d="M7 22 L7 7 L22 7" stroke="#c9a43d" stroke-width="0.8" fill="none" opacity="0.5"/>
          <rect x="2" y="2" width="4" height="4" fill="#c9a43d" opacity="0.6"/>
        </svg>
        <svg class="cert-corner br" viewBox="0 0 44 44" fill="none">
          <path d="M2 22 L2 2 L22 2" stroke="#c9a43d" stroke-width="1.5" fill="none"/>
          <path d="M7 22 L7 7 L22 7" stroke="#c9a43d" stroke-width="0.8" fill="none" opacity="0.5"/>
          <rect x="2" y="2" width="4" height="4" fill="#c9a43d" opacity="0.6"/>
        </svg>

        <!-- Watermark -->
        <div class="cert-watermark">
          <div class="cert-watermark-text">TESLA INVEST</div>
        </div>

        <div class="cert-top-bar"></div>

        <div class="cert-inner">

          <!-- Header -->
          <div class="cert-header">
            <div class="cert-brand">Tesla · Invest</div>
            <div class="cert-divider">
              <div class="cert-divider-line"></div>
              <div class="cert-divider-diamond"></div>
              <div class="cert-divider-line"></div>
            </div>
            <div class="cert-headline">Certificate of Trade &amp; Account Verification</div>
            <div class="cert-main-title">Trade <em>Certificate</em></div>
          </div>

          <!-- Body -->
          <div class="cert-body">
            <div class="cert-divider" style="margin-bottom:1.2rem;">
              <div class="cert-divider-line" style="max-width:200px;"></div>
              <div class="cert-divider-diamond"></div>
              <div class="cert-divider-line" style="max-width:200px;"></div>
            </div>

            <div class="cert-preamble">This is to certify that the following client has maintained an active account<br>with Tesla Invest and has conducted trading activity on our regulated platform</div>

            <div class="cert-client-name">James A. Richardson</div>
            <div class="cert-account-ref">Account No. TI-2024-048721 &nbsp;·&nbsp; Standard Account &nbsp;·&nbsp; Opened 14 February 2024</div>

            <p class="cert-statement">
              The above-named account holder has been duly verified under KYC/AML procedures, maintains a standing account in good status with Tesla Invest (UK) Ltd, and has engaged in trading activity across Forex, Metals, and Index instruments on our FCA-regulated platform during the period specified herein.
            </p>

            <!-- Stats inside cert -->
            <div class="cert-stats">
              <div class="cert-stat">
                <div class="cs-val">2,841</div>
                <div class="cs-label">Total Trades</div>
              </div>
              <div class="cert-stat">
                <div class="cs-val">$124,600</div>
                <div class="cs-label">Peak Balance</div>
              </div>
              <div class="cert-stat">
                <div class="cs-val">14 Months</div>
                <div class="cs-label">Account Age</div>
              </div>
              <div class="cert-stat">
                <div class="cs-val">Active</div>
                <div class="cs-label">Account Status</div>
              </div>
            </div>
          </div>

          <!-- Signatures -->
          <div class="cert-signatures">
            <div class="cert-sig">
              <div class="sig-line"></div>
              <div class="sig-name">Marcus T. Hargrove</div>
              <div class="sig-title">Chief Compliance Officer</div>
            </div>
            <div class="cert-sig" style="text-align:center;">
              <!-- Seal in centre -->
              <div style="display:flex;justify-content:center;margin-bottom:0.5rem;">
                <div style="width:58px;height:58px;border-radius:50%;border:2px solid rgba(180,140,40,0.5);display:flex;align-items:center;justify-content:center;flex-direction:column;background:rgba(212,168,67,0.07);">
                  <div style="font-size:1.4rem;">⚖️</div>
                  <div style="font-size:0.42rem;letter-spacing:0.08em;text-transform:uppercase;color:#8a7040;margin-top:1px;">FCA Reg.</div>
                </div>
              </div>
              <div class="sig-name" style="color:#8a6010;font-style:italic;">Tesla Invest (UK) Ltd</div>
              <div class="sig-title">FCA No. 123456</div>
            </div>
            <div class="cert-sig">
              <div class="sig-line"></div>
              <div class="sig-name">Dr. Priya Mehta</div>
              <div class="sig-title">Head of Client Relations</div>
            </div>
          </div>

          <!-- Seals row -->
          <div class="cert-seals">
            <div class="cert-seal">
              <span class="seal-icon">🏛️</span>
              <span class="seal-text">FCA<br>Authorised</span>
            </div>
            <div class="cert-seal">
              <span class="seal-icon">🔐</span>
              <span class="seal-text">Digital<br>Signature</span>
            </div>
            <div class="cert-seal">
              <span class="seal-icon">🌐</span>
              <span class="seal-text">Globally<br>Accepted</span>
            </div>
            <div class="cert-seal">
              <span class="seal-icon">📋</span>
              <span class="seal-text">KYC<br>Verified</span>
            </div>
          </div>

          <!-- Footer text -->
          <div class="cert-footer-text">
            Issue Date: 12 March 2026 &nbsp;·&nbsp; Valid Until: 12 March 2027 &nbsp;·&nbsp; Issued by Tesla Invest (UK) Ltd, 1 Canada Square, Canary Wharf, London, E14 5AB
            <br>Authorised and Regulated by the Financial Conduct Authority · FCA Register No. 123456
          </div>
          <div class="cert-cert-id">Certificate ID: TI-CERT-2026-048721-X9K2 &nbsp;·&nbsp; Verify online at teslainvest.com/verify</div>

        </div>

        <div class="cert-bottom-bar"></div>
      </div>

      <!-- Download buttons -->
      <div class="cert-actions">
        <a href="#request" class="btn-gold"><i class="uil uil-file-download-alt"></i> Request Your Certificate</a>
        <button class="btn-ghost-gold" onclick="window.print()"><i class="uil uil-print"></i> Print Sample</button>
      </div>
    </div>
  </div>
</section>

<!-- ── WHAT IS IT ── -->
<section class="what-section py-5" style="background:var(--dark);">
  <div class="container py-3">
    <div class="text-center mb-5">
      <div class="section-tag d-inline-flex">About the Certificate</div>
      <h2 class="section-title mt-1">Everything a Trade Certificate<br>confirms.</h2>
    </div>
    <div class="row g-3">
      <div class="col-md-6 col-lg-3">
        <div class="info-card">
          <div class="ic-icon"><i class="uil uil-user-check"></i></div>
          <div class="ic-title">Account Verification</div>
          <p class="ic-text">Confirms your identity has been fully verified under international KYC and AML standards, your account is in good standing, and you are an active client.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="info-card">
          <div class="ic-icon"><i class="uil uil-chart-line"></i></div>
          <div class="ic-title">Trading Activity</div>
          <p class="ic-text">Documents the volume, frequency, instruments traded, account balance history, and the period of trading activity on the Tesla Invest platform.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="info-card">
          <div class="ic-icon"><i class="uil uil-shield-check"></i></div>
          <div class="ic-title">Regulatory Status</div>
          <p class="ic-text">Confirms Tesla Invest's regulatory standing with the FCA and other authorities, providing assurance to third parties reviewing your certificate.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="info-card">
          <div class="ic-icon"><i class="uil uil-lock-alt"></i></div>
          <div class="ic-title">Cryptographic Seal</div>
          <p class="ic-text">Every certificate carries a unique certificate ID and QR code that enables instant online verification of authenticity by any third party.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── CERTIFICATE LOOKUP ── -->
<section class="lookup-section py-5" id="verify" style="background:var(--dark2);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
  <div class="container py-3">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="text-center mb-4">
          <div class="section-tag d-inline-flex">Verification</div>
          <h2 class="section-title mt-1">Verify a certificate.</h2>
          <p style="font-size:0.9rem;color:var(--muted);margin-top:0.8rem;line-height:1.8;">Enter a Certificate ID below to instantly verify its authenticity and retrieve the associated account details.</p>
        </div>
        <div class="lookup-card">
          <div class="lookup-header">
            <div class="lh-icon"><i class="uil uil-search-alt"></i></div>
            <div>
              <div class="lh-title">Certificate Lookup</div>
              <div class="lh-sub">Enter certificate ID — format: TI-CERT-YYYY-XXXXXX-XXXX</div>
            </div>
          </div>
          <div class="lookup-body">
            <div class="lookup-input-group">
              <input type="text" class="lookup-input" id="certInput" placeholder="e.g. TI-CERT-2026-048721-X9K2" maxlength="30">
              <button class="lookup-btn" onclick="verifyCert()"><i class="uil uil-search"></i> Verify</button>
            </div>
            <div class="lookup-result" id="lookupResult"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── HOW TO REQUEST ── -->
<section class="steps-section py-5" id="request">
  <div class="container py-3">
    <div class="row align-items-start g-5">
      <div class="col-lg-4">
        <div class="section-tag">How to Request</div>
        <h2 class="section-title">Your certificate<br>in four steps.</h2>
        <p style="font-size:0.88rem;color:var(--muted);line-height:1.8;margin-top:1rem;">Certificates are issued within 24 business hours. Urgent same-day issuance is available on request for verified clients.</p>
        <a href="mailto:certificates@teslainvest.com" style="display:inline-flex;align-items:center;gap:0.5rem;margin-top:1.4rem;font-size:0.78rem;letter-spacing:0.12em;text-transform:uppercase;color:var(--gold-bright);text-decoration:none;transition:opacity 0.15s;" onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">
          <i class="uil uil-envelope"></i> certificates@teslainvest.com
        </a>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="step-row">
          <div class="step-num">01</div>
          <div class="step-content">
            <div class="step-title">Log in &amp; verify your account</div>
            <p class="step-text">Ensure your account is fully verified (KYC Level 2 or above) and in good standing. Accounts with outstanding compliance requirements cannot be issued certificates until those are resolved.</p>
            <span class="step-tag">Prerequisite</span>
          </div>
        </div>
        <div class="step-row">
          <div class="step-num">02</div>
          <div class="step-content">
            <div class="step-title">Submit your request</div>
            <p class="step-text">Email <a href="mailto:certificates@teslainvest.com" style="color:var(--gold-bright);">certificates@teslainvest.com</a> from your registered email address, specifying the purpose of the certificate (e.g. visa application, bank, institutional) and your preferred language.</p>
            <span class="step-tag">Via Email</span>
          </div>
        </div>
        <div class="step-row">
          <div class="step-num">03</div>
          <div class="step-content">
            <div class="step-title">Our compliance team prepares your certificate</div>
            <p class="step-text">Our compliance department reviews your account, compiles the relevant trading data, and generates your certificate with a unique cryptographic certificate ID, QR code, and official signatures.</p>
            <span class="step-tag">Within 24 Hours</span>
          </div>
        </div>
        <div class="step-row">
          <div class="step-num">04</div>
          <div class="step-content">
            <div class="step-title">Receive &amp; verify</div>
            <p class="step-text">Your certificate is delivered as a digitally signed, tamper-evident PDF. You can verify its authenticity using the certificate ID on this page, or the third party can scan the embedded QR code.</p>
            <span class="step-tag">PDF · Printable</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── VERIFICATION METHODS ── -->
<section class="verify-section py-5">
  <div class="container py-3">
    <div class="text-center mb-5">
      <div class="section-tag d-inline-flex">Verification Methods</div>
      <h2 class="section-title mt-1">Three ways to confirm<br>authenticity.</h2>
    </div>
    <div class="row g-3">
      <div class="col-md-4">
        <div class="verify-card">
          <div class="vc-icon">🔍</div>
          <div class="vc-title">Online Lookup</div>
          <p class="vc-text">Enter the Certificate ID in the verification tool on this page to instantly retrieve the certificate's status, issue date, and expiry.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="verify-card">
          <div class="vc-icon">📱</div>
          <div class="vc-title">QR Code Scan</div>
          <p class="vc-text">Every certificate contains an embedded QR code that links directly to the verification page — scannable by any smartphone camera app.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="verify-card">
          <div class="vc-icon">📞</div>
          <div class="vc-title">Phone Verification</div>
          <p class="vc-text">Third parties may call our compliance line at +44 20 7946 0800 during business hours to verbally confirm a certificate's validity.</p>
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
        <h2 class="section-title">Common questions<br>answered.</h2>
        <p style="font-size:0.88rem;color:var(--muted);line-height:1.8;margin-top:1rem;">Can't find what you're looking for? Email <a href="mailto:certificates@teslainvest.com" style="color:var(--gold-bright);">certificates@teslainvest.com</a> and our team will respond within one Business Day.</p>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="faq-item">
          <button class="faq-q" onclick="toggleFaq(this)">
            How much does a Trade Certificate cost?
            <span class="faq-icon"><i class="uil uil-plus"></i></span>
          </button>
          <div class="faq-a">Trade Certificates are issued free of charge to all verified Tesla Invest clients in good standing. There is no fee for standard issuance within 24 hours. An express same-day issuance service is available at no additional cost for accounts with a trading history of 6 months or more.</div>
        </div>
        <div class="faq-item">
          <button class="faq-q" onclick="toggleFaq(this)">
            What information does the certificate include?
            <span class="faq-icon"><i class="uil uil-plus"></i></span>
          </button>
          <div class="faq-a">Your certificate includes your full legal name, account number, account type, account opening date, current account status, total number of trades, peak account balance, instruments traded, the period covered by the certificate, Tesla Invest's regulatory details, and a unique Certificate ID and QR verification code. Specific data points can be included or excluded upon request.</div>
        </div>
        <div class="faq-item">
          <button class="faq-q" onclick="toggleFaq(this)">
            Is the certificate accepted for visa applications?
            <span class="faq-icon"><i class="uil uil-plus"></i></span>
          </button>
          <div class="faq-a">Yes. Tesla Invest Trade Certificates are accepted by immigration authorities, embassies, and consulates in over 170 countries as proof of financial activity and trading income. For specific visa requirements, we recommend confirming the exact format required by the relevant embassy and mentioning this in your certificate request so we can tailor the document accordingly.</div>
        </div>
        <div class="faq-item">
          <button class="faq-q" onclick="toggleFaq(this)">
            How long is a certificate valid for?
            <span class="faq-icon"><i class="uil uil-plus"></i></span>
          </button>
          <div class="faq-a">All Tesla Invest Trade Certificates are valid for 12 months from the date of issue. After expiry, you may request a new certificate at no charge. Some institutions may require a certificate issued within the last 3 or 6 months — we recommend checking the recipient's requirements before requesting.</div>
        </div>
        <div class="faq-item">
          <button class="faq-q" onclick="toggleFaq(this)">
            Can I get the certificate in a language other than English?
            <span class="faq-icon"><i class="uil uil-plus"></i></span>
          </button>
          <div class="faq-a">Yes. We issue certificates in 18 languages, including Arabic, French, Spanish, Portuguese, German, Italian, Chinese (Simplified and Traditional), Japanese, Russian, Turkish, Indonesian, and others. Please specify your required language when submitting your request. Translation is handled by our in-house compliance team at no additional cost.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── CTA ── -->
<section class="cta-band py-5">
  <div class="container py-3 text-center">
    <div class="section-tag d-inline-flex">Get Your Certificate</div>
    <h2 class="section-title mt-1 mx-auto" style="max-width:500px;">Official. Signed.<br><em style="font-style:italic;background:linear-gradient(135deg,var(--gold-bright),#f8e08a,var(--gold));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Delivered in 24hrs.</em></h2>
    <p style="font-size:0.9rem;color:var(--muted);line-height:1.8;max-width:400px;margin:1.2rem auto 2rem;">
      Registered clients can request a certificate at any time. Accepted by banks, embassies, and institutions worldwide.
    </p>
    <div class="d-flex gap-3 justify-content-center flex-wrap">
      <a href="mailto:certificates@teslainvest.com" class="btn-gold"><i class="uil uil-envelope"></i> Request Certificate</a>
      <a href="contact.html" class="btn-ghost-gold"><i class="uil uil-phone"></i> Contact Compliance</a>
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
      <p>© <span id="year"></span> TESLA INVEST. All rights reserved. CFD trading carries significant risk of loss. This is a fictional demo site.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('year').textContent = new Date().getFullYear();

  /* ── CERTIFICATE LOOKUP ── */
  const DEMO_CERT = 'TI-CERT-2026-048721-X9K2';

  function verifyCert() {
    const val   = document.getElementById('certInput').value.trim().toUpperCase();
    const box   = document.getElementById('lookupResult');
    box.classList.add('show');

    if (!val) {
      box.innerHTML = `<div class="result-not-found"><i class="uil uil-exclamation-circle"></i><div><div class="result-title">Please enter a Certificate ID</div><div class="result-sub">Format: TI-CERT-YYYY-XXXXXX-XXXX</div></div></div>`;
      return;
    }

    if (val === DEMO_CERT) {
      box.innerHTML = `
        <div class="result-found">
          <i class="uil uil-check-circle"></i>
          <div>
            <div class="result-title">✓ Certificate Verified</div>
            <div class="result-sub">
              <strong style="color:#fff;">James A. Richardson</strong> &nbsp;·&nbsp;
              Account No. TI-2024-048721 &nbsp;·&nbsp; Standard Account<br>
              Issued: 12 March 2026 &nbsp;·&nbsp; Valid Until: 12 March 2027 &nbsp;·&nbsp;
              <span style="color:var(--green);">Status: Valid &amp; Active</span>
            </div>
          </div>
        </div>`;
    } else {
      box.innerHTML = `
        <div class="result-not-found">
          <i class="uil uil-times-circle"></i>
          <div>
            <div class="result-title">Certificate Not Found</div>
            <div class="result-sub">No certificate was found matching ID <strong style="color:#fff;">${val}</strong>. Please check the ID and try again, or contact <a href="mailto:certificates@teslainvest.com" style="color:#f43f5e;">certificates@teslainvest.com</a>.</div>
          </div>
        </div>`;
    }
  }

  /* Allow Enter key */
  document.getElementById('certInput').addEventListener('keydown', e => {
    if (e.key === 'Enter') verifyCert();
  });

  /* ── FAQ ACCORDION ── */
  function toggleFaq(btn) {
    const answer = btn.nextElementSibling;
    const isOpen = answer.classList.contains('open');
    document.querySelectorAll('.faq-a.open').forEach(a => a.classList.remove('open'));
    document.querySelectorAll('.faq-q.open').forEach(q => q.classList.remove('open'));
    if (!isOpen) {
      answer.classList.add('open');
      btn.classList.add('open');
    }
  }
</script>
</body>
</html>
