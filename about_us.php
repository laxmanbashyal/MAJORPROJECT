<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="About Red Cross Society and blood donation mission.">
  <title>About Us | BloodBankPro</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Sora:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --red-900: #a30013;
      --red-700: #d9041f;
      --red-100: #ffe8ec;
      --ink-900: #1f2937;
      --ink-600: #4b5563;
      --line: #eceef3;
      --white: #ffffff;
      --bg: #f7f9fc;
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Outfit', sans-serif;
      color: var(--ink-900);
      background: radial-gradient(circle at top left, #fff0f3 0%, var(--bg) 45%, #eef3fa 100%);
    }

    .topbar {
      position: sticky;
      top: 0;
      z-index: 20;
      background: rgba(255, 255, 255, 0.95);
      border-bottom: 1px solid var(--line);
      backdrop-filter: blur(8px);
    }

    .topbar-inner {
      max-width: 1280px;
      margin: 0 auto;
      min-height: 72px;
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
      color: #111827;
      text-decoration: none;
      font-size: 1.65rem;
      font-weight: 700;
      letter-spacing: 0.1px;
      flex-shrink: 0;
    }

    .brand-badge {
      border-radius: 50%;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(145deg, #ff4f61, var(--red-700));
      color: var(--white);
      font-size: 0.82rem;
      font-weight: 700;
    }

    .menu {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      flex: 1 1 auto;
    }

    .menu a {
      text-decoration: none;
      color: var(--ink-600);
      font-size: 1.08rem;
      font-weight: 600;
      padding: 10px 14px;
      border-radius: 12px;
      transition: background 0.2s ease, color 0.2s ease;
      white-space: nowrap;
    }

    .menu a:hover {
      background: #fff1f4;
      color: var(--red-700);
    }

    .menu a.active {
      background: var(--red-100);
      color: var(--red-900);
    }

    .auth {
      display: flex;
      align-items: center;
      gap: 10px;
      flex-shrink: 0;
    }

    .auth a {
      text-decoration: none;
      border-radius: 12px;
      font-size: 1.02rem;
      font-weight: 700;
      padding: 10px 22px;
      line-height: 1;
    }

    .auth .login {
      color: #334155;
      border: 1px solid #dbe2ea;
      background: #fff;
    }

    .auth .register {
      background: var(--red-700);
      border: 1px solid var(--red-700);
      color: #fff;
    }

    .hero {
      border-radius: 18px;
      max-width: 1220px;
      margin: 90px auto 0;
      padding: 48px 18px;
      background: linear-gradient(135deg, var(--red-900), var(--red-700));
      color: var(--white);
      overflow: hidden;
      position: relative;
    }

    .hero::before,
    .hero::after {
      content: "";
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.08);
      pointer-events: none;
    }

    .hero::before {
      width: 300px;
      height: 300px;
      right: -90px;
      top: -90px;
    }

    .hero::after {
      width: 190px;
      height: 190px;
      left: -70px;
      bottom: -70px;
    }

    .hero-grid {
      max-width: 1120px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1.2fr 0.8fr;
      gap: 20px;
      align-items: center;
      position: relative;
      z-index: 1;
    }

    .pill {
      display: inline-block;
      border: 1px solid rgba(255, 255, 255, 0.36);
      border-radius: 999px;
      padding: 7px 14px;
      font-size: 0.93rem;
      font-weight: 600;
      background: rgba(255, 255, 255, 0.12);
    }

    .hero h1 {
      
      margin: 14px 0 12px;
      font-family: 'Sora', sans-serif;
      font-size: clamp(2rem, 4vw, 3.3rem);
      line-height: 1.1;
    }

    .hero p {
      margin: 0;
      max-width: 640px;
      font-size: 1.1rem;
      line-height: 1.65;
      color: #ffe9ec;
    }


    .hero-card {
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.25);
      border-radius: 18px;
      padding: 22px;
      backdrop-filter: blur(6px);
      overflow: hidden;
    }

    .hero-card h3 {
      margin: 0 0 6px;
      font-family: 'Sora', sans-serif;
      font-size: 1.2rem;
     
    }

    .hero-card > p {
      margin: 0 0 16px;
      font-size: 0.98rem;
      color: #ffeff1;
    }

    .focus-orbit {
       border-radius: 50%;
      position: relative;
      border-radius: 14px;
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.18);
      overflow: hidden;
    }

    .focus-track {
      display: flex;
      transition: transform 0.55s cubic-bezier(0.65, 0, 0.35, 1);
    }

    .focus-item {
      flex: 0 0 100%;
      box-sizing: border-box;
      padding: 26px 22px;
      min-height: 140px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      gap: 8px;
      color: #fff;
    }

    .focus-item small {
      display: inline-block;
      width: fit-content;
      font-size: 0.7rem;
      font-weight: 700;
      letter-spacing: 0.6px;
      text-transform: uppercase;
      color: var(--red-900);
      background: #fff;
      padding: 3px 10px;
      border-radius: 999px;
    }

    .focus-item strong {
      font-family: 'Sora', sans-serif;
      font-size: 1.15rem;
      line-height: 1.35;
    }

    .focus-controls {
      margin-top: 14px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
    }

    .focus-btn {
      width: 34px;
      height: 34px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border: 1px solid rgba(255, 255, 255, 0.3);
      background: rgba(255, 255, 255, 0.14);
      color: #fff;
      border-radius: 50%;
      font-size: 1rem;
      font-weight: 700;
      cursor: pointer;
      transition: background 0.2s ease, transform 0.2s ease;
    }

    .focus-btn:hover {
      background: rgba(255, 255, 255, 0.3);
      transform: scale(1.08);
    }

    .focus-dots {
      display: flex;
      gap: 7px;
    }

    .focus-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.35);
      cursor: pointer;
      transition: all 0.3s ease;
      border: none;
      padding: 0;
    }

    .focus-dot.active {
      width: 22px;
      border-radius: 999px;
      background: #fff;
    }

    .section {
      max-width: 1160px;
      margin: 22px auto 26px;
      padding: 0 16px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
    }

    .panel {
      background: var(--white);
      border: 1px solid var(--line);
      border-radius: 16px;
      padding: 22px;
      box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
    }

    .panel h2 {
      margin: 0 0 12px;
      font-family: 'Sora', sans-serif;
      font-size: 1.45rem;
    }

    .panel p {
      margin: 0 0 10px;
      color: var(--ink-600);
      line-height: 1.7;
    }

    .principles {
      margin: 0;
      padding-left: 18px;
      color: var(--ink-600);
      line-height: 1.8;
    }

    .mission {
      max-width: 1160px;
      margin: 0 auto 28px;
      padding: 0 16px;
    }

    .mission .panel {
      border-left: 5px solid var(--red-700);
    }

    .actions {
      margin-top: 12px;
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .btn {
      display: inline-block;
      text-decoration: none;
      border-radius: 12px;
      padding: 11px 16px;
      font-weight: 700;
      transition: transform 0.2s ease;
    }

    .btn-primary {
      background: var(--red-700);
      color: var(--white);
    }

    .btn-secondary {
      border: 2px solid var(--red-700);
      color: var(--red-700);
      background: #fff;
    }

    .btn:hover {
      transform: translateY(-2px);
    }

    .site-footer {
  margin-top: 26px;
  background: #0f172a;
  color: #cbd5e1;
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
  font-family: 'Sora', sans-serif;
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
  font-family: 'Sora', sans-serif;
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

@media (max-width: 900px) {
  .footer-inner {
    grid-template-columns: 1fr 1fr;
  }
}

@media (max-width: 560px) {
  .footer-inner {
    grid-template-columns: 1fr;
  }
}

    @media (max-width: 900px) {
      .topbar-inner {
        min-height: 68px;
        padding: 10px 16px;
        flex-wrap: wrap;
      }

      .brand {
        font-size: 1.35rem;
      }

      .menu {
        order: 3;
        width: 100%;
        justify-content: flex-start;
        overflow-x: auto;
        padding-bottom: 4px;
      }

      .menu a {
        font-size: 0.98rem;
        padding: 8px 11px;
      }

      .auth a {
        padding: 9px 14px;
      }

      .hero-grid,
      .section {
        grid-template-columns: 1fr;
      }

      .hero {
        padding: 36px 16px;
      }

      .hero-card {
        max-width: 420px;
      }
    }

    @media (max-width: 560px) {
      .topbar-inner {
        padding: 10px 12px;
      }

      .brand {
        font-size: 1.08rem;
      }

      .menu {
        width: 100%;
      }

      .menu a {
        font-size: 0.93rem;
        padding: 7px 10px;
      }

      .auth {
        margin-left: auto;
      }

      .auth a {
        font-size: 0.92rem;
        padding: 8px 10px;
      }

      .panel {
        padding: 18px;
      }
    }
  </style>
</head>
<body>
<?php
$active = "about";
include("head.php");
?>
  

  <section class="hero">
    <div class="hero-grid">
      <div>
        <span class="pill">Humanity in Action</span>
        <h1>About Us</h1>
        <p>
          Welcome to our Blood Bank Management System —
          a platform dedicated to bridging the gap between blood
          donors and those in urgent need of blood.
          Every year, thousands of lives are lost due to
          the unavailability of blood at critical moments.
          Our mission is to make blood donation simple, accessible,
          and efficient by connecting voluntary donors with hospitals,
          patients, and blood banks in real time.
        </p>
      </div>
      <aside class="hero-card">
        <h3>Our Focus</h3>
        <div class="focus-orbit" id="focusOrbit">
          <div class="focus-track" id="focusTrack"></div>
        </div>
        <div class="focus-controls">
          <button type="button" class="focus-btn" id="focusPrev" aria-label="Previous">&lsaquo;</button>
          <div class="focus-dots" id="focusDots"></div>
          <button type="button" class="focus-btn" id="focusNext" aria-label="Next">&rsaquo;</button>
        </div>
      </aside>
    </div>
  </section>

  <section class="section">
    <article class="panel">
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

    <article class="panel">
      <h2>Core Principles</h2>
      <ul class="principles">
        <li>Humanity: Supporting and protecting life in every situation.</li>
        <li>Impartiality: Helping people based on need, without discrimination.</li>
        <li>Neutrality: Building trust by staying independent of conflicts.</li>
        <li>Voluntary Service: Promoting selfless community participation.</li>
        <li>Unity and Universality: Working together across all regions and backgrounds.</li>
      </ul>
    </article>
  </section>

  <section class="mission">
    <article class="panel">
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
      var focusItems = [
  'Fast Emergency Blood Access',
  'Verified & Safe Donors',
  'Live Blood Stock Updates',
  'Nearby Donation Camps',
  '24/7 Support for Patients'
];

      var track = document.getElementById('focusTrack');
      var dotsWrap = document.getElementById('focusDots');
      var prevBtn = document.getElementById('focusPrev');
      var nextBtn = document.getElementById('focusNext');
      var orbit = document.getElementById('focusOrbit');
      var index = 0;
      var autoTimer = null;
      var duration = 2500;

      focusItems.forEach(function (text, i) {
        var card = document.createElement('div');
        card.className = 'focus-item';
        card.innerHTML = '<strong>' + text + '</strong>';          track.appendChild(card);

        var dot = document.createElement('button');
        dot.type = 'button';
        dot.className = 'focus-dot' + (i === 0 ? ' active' : '');
        dot.addEventListener('click', function () {
          goTo(i);
          restartAuto();
        });
        dotsWrap.appendChild(dot);
      });

      function updateUI() {
        track.style.transform = 'translateX(-' + (index * 100) + '%)';
        var dots = dotsWrap.querySelectorAll('.focus-dot');
        dots.forEach(function (d, i) {
          d.classList.toggle('active', i === index);
        });
      }

      function goTo(i) {
        index = (i + focusItems.length) % focusItems.length;
        updateUI();
      }

      function goNext() { goTo(index + 1); }
      function goPrev() { goTo(index - 1); }

      function startAuto() {
        clearTimers();
        autoTimer = window.setInterval(function () {
          goNext();
        }, duration);
      }

      function clearTimers() {
        if (autoTimer) window.clearInterval(autoTimer);
      }

      function restartAuto() {
        startAuto();
      }

      prevBtn.addEventListener('click', function () { goPrev(); restartAuto(); });
      nextBtn.addEventListener('click', function () { goNext(); restartAuto(); });

      orbit.addEventListener('mouseenter', function () {
        clearTimers();
      });

      orbit.addEventListener('mouseleave', function () {
        startAuto();
      });

      updateUI();
      startAuto();
    })();
  </script>
</body>
</html>