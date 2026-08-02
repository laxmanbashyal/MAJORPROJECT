<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="About BloodBankPro — connecting voluntary blood donors with hospitals and patients in real time.">
<title>About Us | BloodBankPro</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700;9..144,900&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  :root {
    --paper: #ffffff;
    --paper-2: #ffe6e8;
    --ink: #1f2328;
    --ink-soft: #667085;
    --crimson: #cc1622;
    --crimson-deep: #a3121c;
    --crimson-bright: #cc1622;
    --gold: #d98a1f;
    --line: #ececec;
    --white: #ffffff;
  }

  * { box-sizing: border-box; }

  html { scroll-behavior: smooth; }

  body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    color: var(--ink);
    background: var(--paper);
    -webkit-font-smoothing: antialiased;
  }

  a:focus-visible,
  button:focus-visible {
    outline: 2px solid var(--gold);
    outline-offset: 3px;
  }

  h1, h2, h3, h4 {
    font-family: 'Fraunces', serif;
    margin: 0;
  }

  img { max-width: 100%; display: block; }

  /* ---------------- Nav ---------------- */

  .topbar {
    position: sticky;
    top: 0;
    z-index: 30;
    background: rgba(251, 246, 239, 0.92);
    border-bottom: 1px solid var(--line);
    backdrop-filter: blur(10px);
  }

  .topbar-inner {
    max-width: 1280px;
    margin: 0 auto;
    min-height: 76px;
    padding: 10px 26px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
  }

  .brand {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: var(--ink);
    text-decoration: none;
    font-size: 1.5rem;
    font-weight: 700;
    flex-shrink: 0;
  }

  .brand-badge {
    width: 34px;
    height: 34px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: var(--crimson);
    overflow: hidden;
    flex-shrink: 0;
  }

  .brand-badge svg { width: 18px; height: 18px; }

  .menu {
    display: flex;
    align-items: center;
    gap: 4px;
    flex: 1 1 auto;
    justify-content: center;
  }

  .menu a {
    text-decoration: none;
    color: var(--ink-soft);
    font-size: 1rem;
    font-weight: 600;
    padding: 9px 16px;
    border-radius: 999px;
    transition: background 0.2s ease, color 0.2s ease;
    white-space: nowrap;
  }

  .menu a:hover { background: var(--paper-2); color: var(--crimson); }
  .menu a.active { background: var(--paper-2); color: var(--crimson); }

  .auth { display: flex; align-items: center; gap: 10px; flex-shrink: 0; }

  .auth a {
    text-decoration: none;
    border-radius: 10px;
    font-size: 0.96rem;
    font-weight: 700;
    padding: 10px 20px;
    line-height: 1;
    transition: transform 0.15s ease, box-shadow 0.15s ease;
  }

  .auth .login { color: var(--ink); border: 1px solid var(--line); background: #fff; }
  .auth .register { background: var(--crimson); border: 1px solid var(--crimson); color: #fff; }
  .auth a:hover { transform: translateY(-1px); }

  .nav-toggle {
    display: none;
    width: 40px;
    height: 40px;
    border-radius: 10px;
    border: 1px solid var(--line);
    background: #fff;
    cursor: pointer;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .nav-toggle span,
  .nav-toggle span::before,
  .nav-toggle span::after {
    content: "";
    display: block;
    width: 18px;
    height: 2px;
    background: var(--ink);
    position: relative;
    transition: transform 0.25s ease, opacity 0.25s ease;
  }

  .nav-toggle span::before { position: absolute; top: -6px; }
  .nav-toggle span::after { position: absolute; top: 6px; }

  .topbar.open .nav-toggle span { background: transparent; }
  .topbar.open .nav-toggle span::before { transform: translateY(6px) rotate(45deg); background: var(--ink); }
  .topbar.open .nav-toggle span::after { transform: translateY(-6px) rotate(-45deg); background: var(--ink); }

  /* ---------------- Hero ---------------- */

  .hero {
    max-width: 1220px;
    margin: 22px auto 0;
    padding: 54px 40px;
    background: var(--crimson);
    color: #fff;
    border-radius: 26px;
    overflow: hidden;
    position: relative;
  }

  .ekg-wrap {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    height: 64px;
    opacity: 0.35;
    pointer-events: none;
  }

  .ekg-wrap svg { width: 200%; height: 100%; }

  .ekg-line {
    fill: none;
    stroke: #fff;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
  }

  .ekg-wrap .ekg-line {
    animation: ekgFlow 6s linear infinite;
  }

  @keyframes ekgFlow {
    to { transform: translateX(-50%); }
  }

  .hero-grid {
    max-width: 1120px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 34px;
    align-items: center;
    position: relative;
    z-index: 1;
  }

  .eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    border: 1px solid rgba(255, 255, 255, 0.4);
    border-radius: 999px;
    padding: 7px 14px;
    font-size: 0.85rem;
    font-weight: 600;
    background: rgba(255, 255, 255, 0.1);
    letter-spacing: 0.3px;
  }

  .eyebrow .dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #ff8a95;
    animation: dotPulse 1.6s ease-in-out infinite;
  }

  @keyframes dotPulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.4; transform: scale(0.7); }
  }

  .hero h1 {
    margin: 16px 0 14px;
    font-size: clamp(2.2rem, 4.4vw, 3.6rem);
    font-weight: 600;
    line-height: 1.05;
  }

  .hero p.lead {
    margin: 0 0 22px;
    max-width: 600px;
    font-size: 1.08rem;
    line-height: 1.7;
    color: #ffe2e6;
  }

  .hero-actions { display: flex; flex-wrap: wrap; gap: 12px; }

  .btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    border-radius: 12px;
    padding: 13px 20px;
    font-weight: 700;
    font-size: 0.98rem;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    border: 1px solid transparent;
  }

  .btn:hover { transform: translateY(-2px); }

  .btn-light { background: #fff; color: var(--crimson-deep); }
  .btn-light:hover { box-shadow: 0 10px 22px rgba(0,0,0,0.18); }

  .btn-outline { background: transparent; color: #fff; border-color: rgba(255,255,255,0.5); }
  .btn-outline:hover { background: rgba(255,255,255,0.12); }

  /* ---------- Vitals card (signature) ---------- */

  .vitals-card {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.22);
    border-radius: 20px;
    padding: 22px;
    backdrop-filter: blur(8px);
    position: relative;
    z-index: 1;
  }

  .vitals-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 6px;
  }

  .vitals-head h3 {
    font-size: 1rem;
    font-weight: 600;
    letter-spacing: 0.3px;
    text-transform: uppercase;
    color: #ffe2e6;
  }

  .vitals-live {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.6px;
    color: #ffb9c0;
  }

  .vitals-live .dot {
    width: 6px; height: 6px; border-radius: 50%;
    background: #ff8a95;
    animation: dotPulse 1.6s ease-in-out infinite;
  }

  .vitals-monitor {
    position: relative;
    border-radius: 14px;
    background: rgba(0, 0, 0, 0.16);
    border: 1px solid rgba(255, 255, 255, 0.14);
    overflow: hidden;
    height: 70px;
  }

  .vitals-monitor svg { position: absolute; inset: 0; width: 200%; height: 100%; opacity: 0.55; }
  .vitals-monitor svg .ekg-line { animation: ekgFlow 5s linear infinite; }

  .vitals-track { display: flex; transition: transform 0.5s cubic-bezier(0.65,0,0.35,1); }

  .vitals-item {
    flex: 0 0 100%;
    box-sizing: border-box;
    padding: 22px 20px;
    min-height: 96px;
    display: flex;
    align-items: center;
    color: #fff;
    font-family: 'Fraunces', serif;
    font-weight: 600;
    font-size: 1.12rem;
    line-height: 1.3;
    position: relative;
    z-index: 1;
  }

  .vitals-controls {
    margin-top: 14px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
  }

  .vitals-btn {
    width: 34px; height: 34px;
    display: inline-flex; align-items: center; justify-content: center;
    border: 1px solid rgba(255, 255, 255, 0.3);
    background: rgba(255, 255, 255, 0.12);
    color: #fff;
    border-radius: 50%;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.2s ease, transform 0.2s ease;
  }

  .vitals-btn:hover { background: rgba(255, 255, 255, 0.28); transform: scale(1.07); }

  .vitals-dots { display: flex; gap: 7px; }

  .vitals-dot {
    width: 8px; height: 8px; border-radius: 50%;
    background: rgba(255, 255, 255, 0.32);
    border: none; padding: 0; cursor: pointer;
    transition: all 0.3s ease;
  }

  .vitals-dot.active { width: 22px; border-radius: 999px; background: #fff; }

  /* ---------------- Stats strip ---------------- */

  .stats {
    max-width: 1160px;
    margin: 30px auto;
    padding: 0 16px;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
  }

  .stat {
    background: #fff;
    border: 1px solid var(--line);
    border-radius: 16px;
    padding: 22px 18px;
    text-align: center;
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
  }

  .stat:hover {
    transform: translateY(-4px);
    box-shadow: 0 14px 28px rgba(163, 18, 28, 0.12);
    border-color: var(--crimson-bright);
  }

  .stat .num {
    font-family: 'Fraunces', serif;
    font-weight: 700;
    font-size: 2.1rem;
    color: var(--crimson);
  }

  .stat .label {
    margin-top: 4px;
    font-size: 0.88rem;
    color: var(--ink-soft);
    font-weight: 600;
  }

  /* ---------------- Content sections ---------------- */

  .section {
    max-width: 1160px;
    margin: 20px auto 26px;
    padding: 0 16px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
  }

  .panel {
    background: var(--white);
    border: 1px solid var(--line);
    border-left: 4px solid transparent;
    border-radius: 16px;
    padding: 26px;
    box-shadow: 0 8px 22px rgba(31, 35, 40, 0.05);
    transition: border-color 0.25s ease, transform 0.25s ease;
  }

  .panel:hover { border-left-color: var(--crimson); }

  .panel h2 {
    margin: 0 0 12px;
    font-size: 1.5rem;
    font-weight: 600;
  }

  .panel p { margin: 0 0 10px; color: var(--ink-soft); line-height: 1.75; }

  .principles { margin: 0; padding: 0; list-style: none; }

  .principles li {
    display: flex;
    gap: 12px;
    padding: 10px 0;
    border-bottom: 1px solid var(--line);
    color: var(--ink-soft);
    line-height: 1.6;
  }

  .principles li:last-child { border-bottom: none; }

  .principles b { color: var(--ink); font-family: 'Fraunces', serif; font-weight: 600; flex-shrink: 0; }

  .actions { margin-top: 14px; display: flex; flex-wrap: wrap; gap: 10px; }

  .btn-primary { background: var(--crimson); color: #fff; }
  .btn-primary:hover { box-shadow: 0 10px 22px rgba(204, 22, 34, 0.28); }

  .btn-secondary { border: 2px solid var(--crimson); color: var(--crimson); background: #fff; padding: 11px 19px; }
  .btn-secondary:hover { background: var(--paper-2); }

  /* ---------------- Mission (pull quote) ---------------- */

  .mission {
    max-width: 1160px;
    margin: 0 auto 30px;
    padding: 0 16px;
  }

  .mission .panel {
    border-left: none;
    background: linear-gradient(160deg, var(--paper-2), #fff 60%);
    position: relative;
    padding: 40px;
  }

  .mission .quote-mark {
    font-family: 'Fraunces', serif;
    font-size: 4.2rem;
    color: var(--crimson-bright);
    opacity: 0.35;
    line-height: 1;
    margin-bottom: -10px;
  }

  .mission h2 { font-size: 1.6rem; margin-bottom: 12px; }
  .mission p { font-size: 1.05rem; color: var(--ink-soft); line-height: 1.8; max-width: 820px; }

  /* ---------------- Footer ---------------- */

  .site-footer {
    margin-top: 30px;
    background: var(--crimson-deep);
    color: #f3e2e0;
  }

  .footer-inner {
    max-width: 1160px;
    margin: 0 auto;
    padding: 44px 20px 22px;
    display: grid;
    grid-template-columns: 1.4fr 1fr 1.2fr 1fr;
    gap: 26px;
  }

  .footer-col h4 {
    color: #fff;
    font-family: 'Fraunces', serif;
    font-size: 1.05rem;
    margin: 0 0 14px;
    font-weight: 600;
  }

  .footer-col a {
    display: block;
    color: #f0d3d1;
    text-decoration: none;
    font-size: 0.94rem;
    margin-bottom: 10px;
    transition: color 0.2s ease;
  }

  .footer-col a:hover { color: #fff; }

  .footer-col p {
    font-size: 0.92rem;
    line-height: 1.65;
    margin: 0 0 10px;
    color: #e3bcb9;
  }

  .footer-brand .footer-logo {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #fff;
    font-family: 'Fraunces', serif;
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 12px;
  }

  .footer-socials { display: flex; gap: 10px; }

  .footer-socials a {
    margin-bottom: 0;
    width: 36px; height: 36px;
    display: inline-flex; align-items: center; justify-content: center;
    border-radius: 50%;
    background: rgba(255,255,255,0.1);
    font-size: 0.78rem;
  }

  .footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.14);
    padding: 16px 20px;
    text-align: center;
    font-size: 0.86rem;
    color: #e3bcb9;
  }

  /* ---------------- Scroll reveal ---------------- */

  .reveal {
    opacity: 0;
    transform: translateY(16px);
    transition: opacity 0.6s ease, transform 0.6s ease;
  }

  .reveal.in { opacity: 1; transform: translateY(0); }

  @media (prefers-reduced-motion: reduce) {
    html { scroll-behavior: auto; }
    .ekg-line, .eyebrow .dot, .vitals-live .dot { animation: none !important; }
    .reveal { opacity: 1; transform: none; transition: none; }
    .vitals-track { transition: none; }
  }

  /* ---------------- Responsive ---------------- */

  @media (max-width: 980px) {
    .hero-grid, .section, .stats { grid-template-columns: 1fr; }
    .stats { grid-template-columns: repeat(2, 1fr); }
  }

  @media (max-width: 900px) {
    .topbar-inner { padding: 10px 16px; }
    .nav-toggle { display: inline-flex; }
    .menu {
      order: 4;
      width: 100%;
      flex-direction: column;
      align-items: stretch;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease;
    }
    .topbar.open .menu { max-height: 400px; padding-bottom: 10px; }
    .menu a { padding: 12px 14px; }
    .auth { order: 3; margin-left: auto; }
    .hero { padding: 40px 20px; border-radius: 18px; }
  }

  @media (max-width: 560px) {
    .brand { font-size: 1.15rem; }
    .auth a { font-size: 0.88rem; padding: 9px 14px; }
    .panel { padding: 20px; }
    .mission .panel { padding: 26px 20px; }
    .stats { grid-template-columns: 1fr 1fr; }
    .footer-inner { grid-template-columns: 1fr 1fr; }
  }

  @media (max-width: 420px) {
    .stats { grid-template-columns: 1fr; }
    .footer-inner { grid-template-columns: 1fr; }
  }
</style>
</head>
<body>

<header class="topbar" id="topbar">
  <div class="topbar-inner">
    <a href="home.php" class="brand">
      <span class="brand-badge">
        <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 2C12 2 5 11 5 15.5C5 19.09 8.13 22 12 22C15.87 22 19 19.09 19 15.5C19 11 12 2 12 2Z"/>
        </svg>
      </span>
      <span>BloodBankPro</span>
    </a>

    <nav class="menu" id="mainMenu">
      <a href="about_us.php" class="active">About Us</a>
      <a href="home.php">Home</a>
      <a href="need_blood.php">Blood Availability</a>
      <a href="donate_blood.php">Donation Programs</a>
      <a href="why_donate_blood.php">Eligibility Test</a>
    </nav>

    <div class="auth">
      <a class="login" href="admin/login.php">Login</a>
      <a class="register" href="donate_blood.php">Register</a>
    </div>

    <button type="button" class="nav-toggle" id="navToggle" aria-label="Toggle menu" aria-expanded="false">
      <span></span>
    </button>
  </div>
</header>

<section class="hero">
  <div class="hero-grid">
    <div>
      <span class="eyebrow"><span class="dot"></span> Humanity in Action</span>
      <h1>About Us</h1>
      <p class="lead">
        We connect voluntary blood donors with hospitals, patients, and blood banks in real time —
        so that no life is lost waiting for blood that was there all along, just hard to find.
      </p>
      <div class="hero-actions">
        <a class="btn btn-light" href="donate_blood.php">Donate Blood</a>
        <a class="btn btn-outline" href="need_blood.php">Find Blood</a>
      </div>
    </div>

    <aside class="vitals-card">
      <div class="vitals-head">
        <h3>Our Focus</h3>
        <span class="vitals-live"><span class="dot"></span> LIVE</span>
      </div>
      <div class="vitals-monitor" id="vitalsMonitor">
        <svg viewBox="0 0 600 70" preserveAspectRatio="none">
          <path class="ekg-line" d="M0,35 L60,35 L78,35 L92,10 L106,58 L120,4 L134,35 L160,35
            L660,35 L678,35 L692,10 L706,58 L720,4 L734,35 L760,35" />
        </svg>
        <div class="vitals-track" id="vitalsTrack"></div>
      </div>
      <div class="vitals-controls">
        <button type="button" class="vitals-btn" id="vitalsPrev" aria-label="Previous">&lsaquo;</button>
        <div class="vitals-dots" id="vitalsDots"></div>
        <button type="button" class="vitals-btn" id="vitalsNext" aria-label="Next">&rsaquo;</button>
      </div>
    </aside>
  </div>

  <div class="ekg-wrap">
    <svg viewBox="0 0 1200 70" preserveAspectRatio="none">
      <path class="ekg-line" d="M0,35 L120,35 L156,35 L184,10 L212,58 L240,4 L268,35 L320,35
        L1320,35 L1356,35 L1384,10 L1412,58 L1440,4 L1468,35 L1520,35" />
    </svg>
  </div>
</section>

<section class="stats reveal" id="statsSection">
  <div class="stat">
    <div class="num" data-target="3" data-suffix="">0</div>
    <div class="label">Lives saved per donation</div>
  </div>
  <div class="stat">
    <div class="num" data-target="500" data-suffix="+">0</div>
    <div class="label">Registered donors</div>
  </div>
  <div class="stat">
    <div class="num" data-target="24" data-suffix="/7">0</div>
    <div class="label">Emergency support</div>
  </div>
  <div class="stat">
    <div class="num" data-target="50" data-suffix="+">0</div>
    <div class="label">Donation camps held</div>
  </div>
</section>

<section class="section">
  <article class="panel reveal">
    <h2>Who We Are</h2>
    <p>
      Inspired by the International Red Cross and Red Crescent Movement, our platform supports the same spirit of
      service by connecting voluntary donors with people who need blood quickly and safely.
    </p>
    <p>
      We believe that every donation can save lives, strengthen communities, and bring hope to families during
      critical moments.
    </p>
    <div class="actions">
      <a class="btn btn-primary" href="donate_blood.php">Donate Blood</a>
      <a class="btn btn-secondary" href="need_blood.php">Find Blood</a>
    </div>
  </article>

  <article class="panel reveal">
    <h2>Core Principles</h2>
    <ul class="principles">
      <li><b>Humanity</b><span>Supporting and protecting life in every situation.</span></li>
      <li><b>Impartiality</b><span>Helping people based on need, without discrimination.</span></li>
      <li><b>Neutrality</b><span>Building trust by staying independent of conflicts.</span></li>
      <li><b>Voluntary Service</b><span>Promoting selfless community participation.</span></li>
      <li><b>Unity</b><span>Working together across all regions and backgrounds.</span></li>
    </ul>
  </article>
</section>

<section class="mission">
  <article class="panel reveal">
    <div class="quote-mark">&ldquo;</div>
    <h2>Our Mission in Blood Donation</h2>
    <p>
      We aim to build a reliable donor network that can respond to urgent blood requests, reduce preventable deaths,
      and encourage regular, safe donation habits. By spreading awareness and making donor discovery easier, we keep
      the Red Cross spirit alive through technology and community care.
    </p>
  </article>
</section>

<footer class="site-footer">
  <div class="footer-inner">
    <div class="footer-col footer-brand">
      <div class="footer-logo">
        <span class="brand-badge">
        <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 2C12 2 5 11 5 15.5C5 19.09 8.13 22 12 22C15.87 22 19 19.09 19 15.5C19 11 12 2 12 2Z"/>
        </svg>
      </span>
        <span>BloodBankPro</span>
      </div>
      <p>Connecting voluntary blood donors with hospitals and patients in real time, inspired by the spirit of the Red Cross.</p>
    </div>

    <div class="footer-col">
      <h4>Quick Links</h4>
      <a href="home.php">Home</a>
      <a href="need_blood.php">Blood Availability</a>
      <a href="donate_blood.php">Donation Programs</a>
      <a href="why_donate_blood.php">Eligibility Test</a>
    </div>

    <div class="footer-col">
      <h4>Contact Us</h4>
      <p>📍 Butwal Blood Bank</p>
      <p>📞 +977 98X-XXXXXXX</p>
      <p>✉️ support@bloodbankpro.com</p>
      <p>🕒 Available 24/7 for emergencies</p>
    </div>

    <div class="footer-col">
      <h4>Follow Us</h4>
      <div class="footer-socials">
        <a href="https://www.facebook.com/bloodbankpro" aria-label="Facebook" target="_blank">f</a>
        <a href="https://www.instagram.com/bloodbankpro" aria-label="Instagram" target="_blank">ig</a>
        <a href="https://twitter.com/bloodbankpro" aria-label="Twitter" target="_blank">x</a>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    COPYRIGHT © 2026 Blood Bank and Donation Management. ALL RIGHTS RESERVED.
  </div>
</footer>

<script>
(function () {
  /* ---- mobile nav toggle ---- */
  var topbar = document.getElementById('topbar');
  var navToggle = document.getElementById('navToggle');
  navToggle.addEventListener('click', function () {
    var isOpen = topbar.classList.toggle('open');
    navToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
  });
  document.getElementById('mainMenu').addEventListener('click', function (e) {
    if (e.target.tagName === 'A') {
      topbar.classList.remove('open');
      navToggle.setAttribute('aria-expanded', 'false');
    }
  });

  /* ---- vitals carousel ---- */
  var focusItems = [
    'Fast Emergency Blood Access',
    'Verified & Safe Donors',
    'Live Blood Stock Updates',
    'Nearby Donation Camps',
    '24/7 Support for Patients'
  ];

  var track = document.getElementById('vitalsTrack');
  var dotsWrap = document.getElementById('vitalsDots');
  var prevBtn = document.getElementById('vitalsPrev');
  var nextBtn = document.getElementById('vitalsNext');
  var monitor = document.getElementById('vitalsMonitor');
  var index = 0;
  var autoTimer = null;
  var duration = 2800;

  focusItems.forEach(function (text, i) {
    var card = document.createElement('div');
    card.className = 'vitals-item';
    card.textContent = text;
    track.appendChild(card);

    var dot = document.createElement('button');
    dot.type = 'button';
    dot.className = 'vitals-dot' + (i === 0 ? ' active' : '');
    dot.setAttribute('aria-label', 'Go to focus ' + (i + 1));
    dot.addEventListener('click', function () { goTo(i); restartAuto(); });
    dotsWrap.appendChild(dot);
  });

  function updateUI() {
    track.style.transform = 'translateX(-' + (index * 100) + '%)';
    dotsWrap.querySelectorAll('.vitals-dot').forEach(function (d, i) {
      d.classList.toggle('active', i === index);
    });
  }

  function goTo(i) { index = (i + focusItems.length) % focusItems.length; updateUI(); }
  function goNext() { goTo(index + 1); }
  function goPrev() { goTo(index - 1); }

  function startAuto() {
    clearTimers();
    autoTimer = window.setInterval(goNext, duration);
  }
  function clearTimers() { if (autoTimer) window.clearInterval(autoTimer); }
  function restartAuto() { startAuto(); }

  prevBtn.addEventListener('click', function () { goPrev(); restartAuto(); });
  nextBtn.addEventListener('click', function () { goNext(); restartAuto(); });
  monitor.addEventListener('mouseenter', clearTimers);
  monitor.addEventListener('mouseleave', startAuto);

  updateUI();
  startAuto();

  /* ---- stat count-up on scroll ---- */
  var statsSection = document.getElementById('statsSection');
  var nums = document.querySelectorAll('.stat .num');
  var counted = false;

  function animateCount(el) {
    var target = parseInt(el.getAttribute('data-target'), 10);
    var suffix = el.getAttribute('data-suffix') || '';
    var steps = 40;
    var stepTime = 700 / steps;
    var current = 0;
    var increment = target / steps;

    var timer = setInterval(function () {
      current += increment;
      if (current >= target) {
        el.textContent = target + suffix;
        clearInterval(timer);
      } else {
        el.textContent = Math.floor(current) + suffix;
      }
    }, stepTime);
  }

  function checkReveal() {
    document.querySelectorAll('.reveal').forEach(function (el) {
      var rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight - 80) {
        el.classList.add('in');
      }
    });

    if (!counted) {
      var rect = statsSection.getBoundingClientRect();
      if (rect.top < window.innerHeight - 80) {
        counted = true;
        nums.forEach(animateCount);
      }
    }
  }

  window.addEventListener('scroll', checkReveal, { passive: true });
  window.addEventListener('resize', checkReveal);
  checkReveal();
})();
</script>
</body>
</html>