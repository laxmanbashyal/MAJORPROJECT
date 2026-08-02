<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Browse upcoming blood donation programs and learn why donating blood saves lives.">
<title>Donation Programs & Why Donate Blood | BloodBankPro</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700;9..144,900&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  :root {
    --crimson: #cc1622;
    --crimson-deep: #a3121c;
    --paper: #ffffff;
    --paper-2: #ffe6e8;
    --ink: #1f2328;
    --ink-soft: #667085;
    --line: #ececec;
    --gold: #d98a1f;
  }

  * { box-sizing: border-box; }

  body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    color: var(--ink);
    background: var(--paper);
    -webkit-font-smoothing: antialiased;
  }

  h1, h2, h3 { font-family: 'Fraunces', serif; margin: 0; }
  img { max-width: 100%; display: block; }

  a:focus-visible, button:focus-visible, input:focus-visible, select:focus-visible {
    outline: 2px solid var(--gold);
    outline-offset: 2px;
  }

  .wrap { max-width: 1220px; margin: 0 auto; padding: 0 24px; }

  .page-head {
    padding: 40px 0 8px;
  }

  .page-head .eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--crimson);
    font-weight: 700;
    font-size: 0.85rem;
    letter-spacing: 0.4px;
    text-transform: uppercase;
    background: var(--paper-2);
    border-radius: 999px;
    padding: 6px 14px;
  }

  .page-head h1 {
    margin: 14px 0 8px;
    font-size: clamp(1.9rem, 3.6vw, 2.6rem);
    font-weight: 700;
  }

  .page-head p {
    margin: 0;
    color: var(--ink-soft);
    max-width: 620px;
    line-height: 1.6;
  }

  /* ---------------- Toolbar ---------------- */

  .program-toolbar {
    margin: 22px 0 30px;
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
  }

  .search-box {
    flex: 1 1 320px;
    position: relative;
  }

  .search-box::before {
    content: "";
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    width: 16px;
    height: 16px;
    border: 2px solid var(--ink-soft);
    border-radius: 50%;
    box-sizing: border-box;
  }

  .search-box::after {
    content: "";
    position: absolute;
    left: 27px;
    top: 62%;
    width: 7px;
    height: 2px;
    background: var(--ink-soft);
    transform: rotate(45deg);
  }

  .search-box input {
    width: 100%;
    padding: 13px 16px 13px 42px;
    border-radius: 12px;
    border: 1px solid var(--line);
    font-size: 0.98rem;
    font-family: 'Inter', sans-serif;
    color: var(--ink);
    background: #fff;
  }

  .search-box input::placeholder { color: #9aa1ab; }

  .program-toolbar select {
    padding: 13px 16px;
    border-radius: 12px;
    border: 1px solid var(--line);
    background: #fff;
    font-size: 0.96rem;
    font-family: 'Inter', sans-serif;
    color: var(--ink);
    font-weight: 600;
    min-width: 150px;
    cursor: pointer;
  }

  /* ---------------- Program grid ---------------- */

  .program-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-bottom: 50px;
  }

  .program-card {
    background: #fff;
    border: 1px solid var(--line);
    border-radius: 16px;
    overflow: hidden;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    display: flex;
    flex-direction: column;
  }

  .program-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 16px 30px rgba(0,0,0,0.1);
  }

  .program-card.is-hidden { display: none; }

  .program-banner {
    position: relative;
    padding: 20px;
    color: #fff;
    min-height: 108px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
  }

  .program-banner .type-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    background: rgba(255,255,255,0.22);
    border-radius: 999px;
    padding: 4px 11px;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.3px;
  }

  .program-banner .plus {
    position: absolute;
    bottom: 10px;
    right: 14px;
    font-size: 1.6rem;
    font-weight: 300;
    color: rgba(255,255,255,0.45);
    line-height: 1;
  }

  .program-banner .cal-icon {
    width: 30px;
    height: 30px;
    border: 2px solid #fff;
    border-radius: 6px;
    position: relative;
    margin-bottom: 6px;
  }

  .program-banner .cal-icon::before {
    content: "";
    position: absolute;
    top: -6px;
    left: 6px;
    width: 2px;
    height: 8px;
    background: #fff;
    box-shadow: 14px 0 0 #fff;
  }

  .program-banner .cal-icon::after {
    content: "";
    position: absolute;
    top: 8px;
    left: 4px;
    right: 4px;
    height: 2px;
    background: rgba(255,255,255,0.5);
  }

  .program-banner .date-text {
    font-weight: 700;
    font-size: 0.98rem;
  }

  .grad1 { background: linear-gradient(135deg, #e0212f, var(--crimson-deep)); }
  .grad2 { background: linear-gradient(135deg, #3d7bff, #1d4fbe); }
  .grad3 { background: linear-gradient(135deg, #22c07d, #128a54); }
  .grad4 { background: linear-gradient(135deg, #9a5cf2, #6d28d9); }
  .grad5 { background: linear-gradient(135deg, #ff8a3d, #d9541a); }
  .grad6 { background: linear-gradient(135deg, #ec2b83, #a3125a); }

  .program-body {
    padding: 18px 20px 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    flex: 1;
  }

  .program-body h3 {
    font-size: 1.12rem;
    font-weight: 600;
  }

  .program-meta {
    display: flex;
    flex-direction: column;
    gap: 6px;
    font-size: 0.88rem;
    color: var(--ink-soft);
  }

  .program-progress { margin-top: 4px; }

  .progress-track {
    height: 6px;
    border-radius: 999px;
    background: var(--paper-2);
    overflow: hidden;
  }

  .progress-fill { height: 100%; border-radius: 999px; background: var(--gold); }
  .progress-fill.high { background: var(--crimson); }

  .progress-labels {
    display: flex;
    justify-content: space-between;
    font-size: 0.78rem;
    color: var(--ink-soft);
    margin-top: 6px;
  }

  .btn-register {
    margin-top: auto;
    display: block;
    text-align: center;
    text-decoration: none;
    background: var(--crimson);
    color: #fff;
    font-weight: 700;
    font-size: 0.96rem;
    padding: 12px 16px;
    border-radius: 10px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .btn-register:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(204,22,34,0.28);
  }

  .no-results {
    display: none;
    text-align: center;
    padding: 40px 0;
    color: var(--ink-soft);
    font-size: 1rem;
  }

  .no-results.show { display: block; }

  /* ---------------- Why donate (moved below) ---------------- */

  .why-divider {
    max-width: 1220px;
    margin: 0 auto;
    padding: 0 24px;
  }

  .why-divider hr {
    border: none;
    border-top: 1px solid var(--line);
    margin: 10px 0 40px;
  }

  .hero {
    border-radius: 22px;
    max-width: 1220px;
    margin: 0 auto 40px;
    padding: 40px;
    background: var(--crimson);
    color: #fff;
    overflow: hidden;
    position: relative;
  }

  .hero-grid {
    max-width: 1120px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 0.95fr 1.05fr;
    gap: 30px;
    align-items: center;
    position: relative;
    z-index: 1;
  }

  .pill {
    display: inline-block;
    border: 1px solid rgba(255, 255, 255, 0.4);
    border-radius: 999px;
    padding: 7px 14px;
    font-size: 0.9rem;
    font-weight: 600;
    background: rgba(255, 255, 255, 0.12);
  }

  .hero h1 {
    margin: 14px 0 12px;
    font-size: clamp(1.9rem, 3.8vw, 3rem);
    line-height: 1.1;
    font-weight: 700;
  }

  .hero p {
    margin: 0;
    max-width: 560px;
    font-size: 1.05rem;
    line-height: 1.65;
    color: rgba(255,255,255,0.88);
    font-family: 'Inter', sans-serif;
  }

  .impact-panel {
    background: rgba(255, 255, 255, 0.12);
    border: 1px solid rgba(255, 255, 255, 0.24);
    border-radius: 20px;
    padding: 24px;
    backdrop-filter: blur(6px);
  }

  .impact-panel h3 {
    font-size: 0.85rem;
    font-weight: 700;
    letter-spacing: 0.4px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.75);
    font-family: 'Inter', sans-serif;
    margin-bottom: 16px;
  }

  .impact-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
    margin-bottom: 20px;
  }

  .impact-stat {
    background: rgba(255,255,255,0.1);
    border-radius: 14px;
    padding: 14px 8px;
    text-align: center;
    cursor: default;
    transition: background 0.2s ease, transform 0.2s ease;
  }

  .impact-stat:hover { background: rgba(255,255,255,0.18); transform: translateY(-2px); }

  .impact-stat .num {
    font-family: 'Fraunces', serif;
    font-weight: 700;
    font-size: 1.5rem;
  }

  .impact-stat .label {
    font-size: 0.72rem;
    color: rgba(255,255,255,0.75);
    margin-top: 2px;
    font-family: 'Inter', sans-serif;
    line-height: 1.3;
  }

  .fact-ticker {
    background: rgba(0,0,0,0.14);
    border: 1px solid rgba(255,255,255,0.14);
    border-radius: 14px;
    overflow: hidden;
  }

  .fact-track { display: flex; transition: transform 0.5s cubic-bezier(0.65,0,0.35,1); }

  .fact-item {
    flex: 0 0 100%;
    box-sizing: border-box;
    padding: 16px 18px;
    min-height: 62px;
    display: flex;
    align-items: center;
    font-size: 0.92rem;
    line-height: 1.4;
    color: #fff;
    font-family: 'Inter', sans-serif;
  }

  .fact-controls {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 14px 12px;
  }

  .fact-dots { display: flex; gap: 6px; }

  .fact-dot {
    width: 6px; height: 6px; border-radius: 50%;
    background: rgba(255,255,255,0.3);
    border: none; padding: 0; cursor: pointer;
    transition: all 0.3s ease;
  }

  .fact-dot.active { width: 18px; border-radius: 999px; background: #fff; }

  .fact-btn {
    width: 26px; height: 26px;
    display: inline-flex; align-items: center; justify-content: center;
    border: 1px solid rgba(255,255,255,0.25);
    background: rgba(255,255,255,0.1);
    color: #fff;
    border-radius: 50%;
    font-size: 0.85rem;
    cursor: pointer;
    transition: background 0.2s ease;
  }

  .fact-btn:hover { background: rgba(255,255,255,0.24); }

  .steps {
    max-width: 1220px;
    margin: 0 auto 40px;
    padding: 0 24px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
  }

  .step-card {
    background: #fff;
    border: 1px solid var(--line);
    border-radius: 16px;
    padding: 24px;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
  }

  .step-card:hover { transform: translateY(-4px); box-shadow: 0 14px 26px rgba(0,0,0,0.07); }

  .step-no {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--paper-2);
    color: var(--crimson);
    font-weight: 700;
    font-family: 'Fraunces', serif;
    margin-bottom: 12px;
  }

  .step-card h2 { font-size: 1.2rem; font-weight: 600; margin-bottom: 8px; }
  .step-card p { margin: 0; color: var(--ink-soft); line-height: 1.65; font-size: 0.94rem; }

  .section {
    max-width: 1160px;
    margin: 0 auto 30px;
    padding: 0 24px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
  }

  .panel {
    background: #fff;
    border: 1px solid var(--line);
    border-radius: 16px;
    padding: 26px;
  }

  .panel h2 { font-size: 1.4rem; margin-bottom: 12px; font-weight: 600; }
  .panel p { margin: 0 0 10px; color: var(--ink-soft); line-height: 1.7; }

  .principles { margin: 0; padding-left: 18px; color: var(--ink-soft); line-height: 1.8; }

  .actions { margin-top: 14px; display: flex; flex-wrap: wrap; gap: 10px; }

  .btn { display: inline-block; text-decoration: none; border-radius: 12px; padding: 12px 18px; font-weight: 700; transition: transform 0.2s ease; }
  .btn:hover { transform: translateY(-2px); }
  .btn-primary { background: var(--crimson); color: #fff; }
  .btn-secondary { border: 2px solid var(--crimson); color: var(--crimson); background: #fff; }

  .mission { max-width: 1160px; margin: 0 auto 40px; padding: 0 24px; }
  .mission .panel { border-left: 5px solid var(--crimson); background: var(--paper-2); }

  .site-footer { margin-top: 20px; background: var(--ink); color: #cbd5e1; }
  .footer-bottom { padding: 18px 20px; text-align: center; font-size: 0.88rem; color: #9aa1ab; }

  .reveal {
    opacity: 0;
    transform: translateY(16px);
    transition: opacity 0.6s ease, transform 0.6s ease;
  }

  .reveal.in { opacity: 1; transform: translateY(0); }

  @media (prefers-reduced-motion: reduce) {
    .reveal { opacity: 1; transform: none; transition: none; }
    .fact-track { transition: none; }
  }

  @media (max-width: 980px) {
    .program-grid { grid-template-columns: repeat(2, 1fr); }
    .hero-grid, .section, .steps { grid-template-columns: 1fr; }
  }

  @media (max-width: 640px) {
    .program-grid { grid-template-columns: 1fr; }
    .program-toolbar { flex-direction: column; }
    .hero { padding: 26px; }
    .panel { padding: 20px; }
  }
  .footer-inner {
  max-width: 1160px;
  margin: 0 auto;
  padding: 40px 20px 24px;
  display: grid;
  grid-template-columns: 1.4fr 1fr 1.2fr 1fr;
  gap: 24px;
}

.footer-col h4 {
  color: #fff;
  font-family: 'Fraunces', serif;
  font-size: 1rem;
  margin: 0 0 14px;
}

.footer-col a {
  display: block;
  color: #cbd5e1;
  text-decoration: none;
  font-size: 0.94rem;
  margin-bottom: 10px;
  transition: color 0.2s ease;
}

.footer-col a:hover {
  color: #ff8a95;
}

.footer-col p {
  font-size: 0.92rem;
  line-height: 1.6;
  margin: 0 0 10px;
  color: #94a3b8;
}

.footer-brand .footer-logo {
  display: flex;
  align-items: center;
  gap: 10px;
  color: #fff;
  font-family: 'Fraunces', serif;
  font-size: 1.2rem;
  font-weight: 700;
  margin-bottom: 12px;
}

.footer-socials {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.footer-bottom {
  border-top: 1px solid rgba(255, 255, 255, 0.08);
  padding: 16px 20px;
  text-align: center;
  font-size: 0.88rem;
  color: #94a3b8;
}
</style>
</head>
<body>
<?php
$active = "why";
include("head.php");
?>

<div class="wrap page-head">
  <span class="eyebrow">Upcoming Drives</span>
  <h1>Donation Programs</h1>
  <p>Find a blood donation drive near you and reserve your slot in a few clicks.</p>

  <div class="program-toolbar">
    <div class="search-box">
      <input type="text" id="programSearch" placeholder="Search programs by name or location...">
    </div>
    <select id="programFilter">
      <option value="all">All Types</option>
      <option value="Hospital">Hospital</option>
      <option value="Community">Community</option>
      <option value="Campus">Campus</option>
      <option value="Corporate">Corporate</option>
      <option value="Special">Special</option>
    </select>
  </div>
</div>

<div class="wrap">
  <div class="program-grid" id="programGrid">

    <article class="program-card" data-title="city general hospital blood drive" data-location="city general hospital, main lobby" data-type="Hospital">
      <div class="program-banner grad1">
        <span class="type-badge">Hospital</span>
        <div class="cal-icon"></div>
        <div class="date-text">June 15, 2026</div>
        <span class="plus">+</span>
      </div>
      <div class="program-body">
        <h3>City General Hospital Blood Drive</h3>
        <div class="program-meta">
          <span>📍 City General Hospital, Main Lobby</span>
          <span>🕒 9:00 AM – 4:00 PM</span>
          <span>👥 16 slots remaining</span>
        </div>
        <div class="program-progress">
          <div class="progress-track"><div class="progress-fill high" style="width:68%"></div></div>
          <div class="progress-labels"><span>34 registered</span><span>68% full</span></div>
        </div>
        <a href="donate_blood.php" class="btn-register">Register Now &rarr;</a>
      </div>
    </article>

    <article class="program-card" data-title="community health fair" data-location="central park pavilion, north entrance" data-type="Community">
      <div class="program-banner grad2">
        <span class="type-badge">Community</span>
        <div class="cal-icon"></div>
        <div class="date-text">June 22, 2026</div>
        <span class="plus">+</span>
      </div>
      <div class="program-body">
        <h3>Community Health Fair</h3>
        <div class="program-meta">
          <span>📍 Central Park Pavilion, North Entrance</span>
          <span>🕒 10:00 AM – 3:00 PM</span>
          <span>👥 19 slots remaining</span>
        </div>
        <div class="program-progress">
          <div class="progress-track"><div class="progress-fill high" style="width:76%"></div></div>
          <div class="progress-labels"><span>61 registered</span><span>76% full</span></div>
        </div>
        <a href="donate_blood.php" class="btn-register">Register Now &rarr;</a>
      </div>
    </article>

    <article class="program-card" data-title="university campus drive" data-location="state university, hall a" data-type="Campus">
      <div class="program-banner grad3">
        <span class="type-badge">Campus</span>
        <div class="cal-icon"></div>
        <div class="date-text">July 5, 2026</div>
        <span class="plus">+</span>
      </div>
      <div class="program-body">
        <h3>University Campus Drive</h3>
        <div class="program-meta">
          <span>📍 State University, Hall A</span>
          <span>🕒 8:00 AM – 5:00 PM</span>
          <span>👥 75 slots remaining</span>
        </div>
        <div class="program-progress">
          <div class="progress-track"><div class="progress-fill" style="width:38%"></div></div>
          <div class="progress-labels"><span>45 registered</span><span>38% full</span></div>
        </div>
        <a href="donate_blood.php" class="btn-register">Register Now &rarr;</a>
      </div>
    </article>

    <article class="program-card" data-title="corporate blood drive tech hub" data-location="tech hub office park, building b" data-type="Corporate">
      <div class="program-banner grad4">
        <span class="type-badge">Corporate</span>
        <div class="cal-icon"></div>
        <div class="date-text">July 12, 2026</div>
        <span class="plus">+</span>
      </div>
      <div class="program-body">
        <h3>Corporate Blood Drive — Tech Hub</h3>
        <div class="program-meta">
          <span>📍 Tech Hub Office Park, Building B</span>
          <span>🕒 11:00 AM – 3:00 PM</span>
          <span>👥 38 slots remaining</span>
        </div>
        <div class="program-progress">
          <div class="progress-track"><div class="progress-fill" style="width:31%"></div></div>
          <div class="progress-labels"><span>17 registered</span><span>31% full</span></div>
        </div>
        <a href="donate_blood.php" class="btn-register">Register Now &rarr;</a>
      </div>
    </article>

    <article class="program-card" data-title="riverside community camp" data-location="riverside community center" data-type="Community">
      <div class="program-banner grad5">
        <span class="type-badge">Community</span>
        <div class="cal-icon"></div>
        <div class="date-text">July 20, 2026</div>
        <span class="plus">+</span>
      </div>
      <div class="program-body">
        <h3>Riverside Community Camp</h3>
        <div class="program-meta">
          <span>📍 Riverside Community Center</span>
          <span>🕒 9:00 AM – 2:00 PM</span>
          <span>👥 25 slots remaining</span>
        </div>
        <div class="program-progress">
          <div class="progress-track"><div class="progress-fill" style="width:44%"></div></div>
          <div class="progress-labels"><span>20 registered</span><span>44% full</span></div>
        </div>
        <a href="donate_blood.php" class="btn-register">Register Now &rarr;</a>
      </div>
    </article>

    <article class="program-card" data-title="memorial day blood marathon" data-location="city convention center" data-type="Special">
      <div class="program-banner grad6">
        <span class="type-badge">Special</span>
        <div class="cal-icon"></div>
        <div class="date-text">August 1, 2026</div>
        <span class="plus">+</span>
      </div>
      <div class="program-body">
        <h3>Memorial Day Blood Marathon</h3>
        <div class="program-meta">
          <span>📍 City Convention Center</span>
          <span>🕒 7:00 AM – 6:00 PM</span>
          <span>👥 113 slots remaining</span>
        </div>
        <div class="program-progress">
          <div class="progress-track"><div class="progress-fill" style="width:22%"></div></div>
          <div class="progress-labels"><span>32 registered</span><span>22% full</span></div>
        </div>
        <a href="donate_blood.php" class="btn-register">Register Now &rarr;</a>
      </div>
    </article>

  </div>

  <p class="no-results" id="noResults">No programs match your search. Try a different name, location, or type.</p>
</div>

<div class="why-divider"><hr></div>

<section class="hero">
  <div class="hero-grid">
    <div>
      <span class="pill">Humanity in Action</span>
      <h1>Why Donate Blood?</h1>
      <p>
        Donating blood is one of the simplest ways to save lives. A single donation can support trauma patients,
        mothers during delivery, children with anemia, and people undergoing surgery or cancer treatment.
      </p>
    </div>
    <div class="impact-panel">
      <h3>Impact Snapshot</h3>
      <div class="impact-stats">
        <div class="impact-stat"><div class="num">3</div><div class="label">Lives per donation</div></div>
        <div class="impact-stat"><div class="num">10m</div><div class="label">Time to donate</div></div>
        <div class="impact-stat"><div class="num">42d</div><div class="label">Blood shelf life</div></div>
      </div>
      <div class="fact-ticker" id="factTicker">
        <div class="fact-track" id="factTrack"></div>
        <div class="fact-controls">
          <button type="button" class="fact-btn" id="factPrev" aria-label="Previous fact">&lsaquo;</button>
          <div class="fact-dots" id="factDots"></div>
          <button type="button" class="fact-btn" id="factNext" aria-label="Next fact">&rsaquo;</button>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="steps">
  <article class="step-card reveal">
    <div class="step-no">01</div>
    <h2>Save Lives</h2>
    <p>One donation can help multiple patients by providing the blood they urgently need.</p>
  </article>
  <article class="step-card reveal">
    <div class="step-no">02</div>
    <h2>Support Emergencies</h2>
    <p>Accidents, surgeries, childbirth complications, and disaster cases depend on ready blood supply.</p>
  </article>
  <article class="step-card reveal">
    <div class="step-no">03</div>
    <h2>Strengthen Communities</h2>
    <p>Regular voluntary donation builds a reliable blood network for hospitals and care centers.</p>
  </article>
</section>

<section class="section">
  <article class="panel reveal">
    <h2>Who Benefits</h2>
    <p>
      Blood donation helps patients facing trauma, thalassemia, sickle cell disease, severe anemia,
      major surgeries, and emergency transfusions.
    </p>
    <p>
      It is a humanitarian act that reaches far beyond the moment of donation and supports the whole health system.
    </p>
    <div class="actions">
      <a class="btn btn-primary" href="donate_blood.php">Become a Donor</a>
      <a class="btn btn-secondary" href="need_blood.php">Check Blood Availability</a>
    </div>
  </article>

  <article class="panel reveal">
    <h2>How It Helps</h2>
    <ul class="principles">
      <li>Quick access to safe blood in urgent situations.</li>
      <li>Reliable donor support for hospitals and clinics.</li>
      <li>Lower risk of preventable deaths from blood shortage.</li>
      <li>Stronger community awareness and volunteer participation.</li>
    </ul>
  </article>
</section>

<section class="mission">
  <article class="panel reveal">
    <h2>Our Mission in Blood Donation</h2>
    <p>
      We aim to build a dependable donor network that can respond to urgent blood requests, reduce preventable
      deaths, and encourage safe, regular donation habits. By spreading awareness and making donor discovery easier,
      we keep the Red Cross spirit alive through technology and community care.
    </p>
  </article>
</section>

<footer class="site-footer">
  <div class="footer-inner">
    <div class="footer-col footer-brand">
      <div class="footer-logo">
        <span class="brand-badge"><img src="" alt="Logo" style="width:100%;height:100%;border-radius:50%;object-fit:cover;"></span>
        <span>BloodBankPro</span>
      </div>
      <p>Connecting voluntary blood donors with hospitals and patients in real time, inspired by the spirit of the Red Cross.</p>
    </div>

    <div class="footer-col">
      <h4>Quick Links</h4>
      <a href="home.php">Home</a>
      <a href="why_donate_blood.php">Why donate Blood</a>
      <a href="need_blood.php">Blood request</a>
      <a href="contact_us.php">Contact Us</a>
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
        <a href="https://www.facebook.com/bloodbankpro" aria-label="Facebook" target="_blank">Facebook</a>
        <a href="https://www.instagram.com/bloodbankpro" aria-label="Instagram" target="_blank">Instagram</a>
        <a href="https://twitter.com/bloodbankpro" aria-label="Twitter" target="_blank">Twitter</a>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    COPYRIGHT © 2026 Blood Bank and Donation Management. ALL RIGHTS RESERVED.
  </div>
</footer>

<script>
(function () {
  var searchInput = document.getElementById('programSearch');
  var typeFilter = document.getElementById('programFilter');
  var cards = Array.prototype.slice.call(document.querySelectorAll('.program-card'));
  var noResults = document.getElementById('noResults');

  function applyFilters() {
    var query = searchInput.value.trim().toLowerCase();
    var type = typeFilter.value;
    var visibleCount = 0;

    cards.forEach(function (card) {
      var title = card.getAttribute('data-title');
      var location = card.getAttribute('data-location');
      var cardType = card.getAttribute('data-type');

      var matchesQuery = !query || title.indexOf(query) !== -1 || location.indexOf(query) !== -1;
      var matchesType = type === 'all' || type === cardType;

      var visible = matchesQuery && matchesType;
      card.classList.toggle('is-hidden', !visible);
      if (visible) visibleCount++;
    });

    noResults.classList.toggle('show', visibleCount === 0);
  }

  searchInput.addEventListener('input', applyFilters);
  typeFilter.addEventListener('change', applyFilters);

  /* ---- fact ticker ---- */
  var facts = [
    'One donation can be split into red cells, plasma, and platelets to help up to 3 patients.',
    'A healthy adult can safely donate whole blood every 56 days.',
    'Less than 40% of the eligible population donates blood each year.',
    'O-negative blood is the universal donor type used in emergencies.',
    'Donated blood is tested, processed, and ready to use within 24–48 hours.'
  ];

  var factTrack = document.getElementById('factTrack');
  var factDots = document.getElementById('factDots');
  var factPrev = document.getElementById('factPrev');
  var factNext = document.getElementById('factNext');
  var factTicker = document.getElementById('factTicker');
  var factIndex = 0;
  var factTimer = null;
  var factDuration = 3400;

  facts.forEach(function (text, i) {
    var item = document.createElement('div');
    item.className = 'fact-item';
    item.textContent = text;
    factTrack.appendChild(item);

    var dot = document.createElement('button');
    dot.type = 'button';
    dot.className = 'fact-dot' + (i === 0 ? ' active' : '');
    dot.setAttribute('aria-label', 'Go to fact ' + (i + 1));
    dot.addEventListener('click', function () { factGoTo(i); factRestart(); });
    factDots.appendChild(dot);
  });

  function factUpdate() {
    factTrack.style.transform = 'translateX(-' + (factIndex * 100) + '%)';
    factDots.querySelectorAll('.fact-dot').forEach(function (d, i) {
      d.classList.toggle('active', i === factIndex);
    });
  }

  function factGoTo(i) { factIndex = (i + facts.length) % facts.length; factUpdate(); }
  function factGoNext() { factGoTo(factIndex + 1); }
  function factGoPrev() { factGoTo(factIndex - 1); }

  function factStart() { factClear(); factTimer = window.setInterval(factGoNext, factDuration); }
  function factClear() { if (factTimer) window.clearInterval(factTimer); }
  function factRestart() { factStart(); }

  factPrev.addEventListener('click', function () { factGoPrev(); factRestart(); });
  factNext.addEventListener('click', function () { factGoNext(); factRestart(); });
  factTicker.addEventListener('mouseenter', factClear);
  factTicker.addEventListener('mouseleave', factStart);

  factUpdate();
  factStart();

  /* ---- scroll reveal ---- */
  function checkReveal() {
    document.querySelectorAll('.reveal').forEach(function (el) {
      var rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight - 80) el.classList.add('in');
    });
  }
  window.addEventListener('scroll', checkReveal, { passive: true });
  window.addEventListener('resize', checkReveal);
  checkReveal();
})();
</script>
</body>
</html>