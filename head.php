<style>
  .bbms-navbar {
    position: sticky;
    top: 0;
    z-index: 1030;
    padding: .7rem 0;
    background: #fff;
    border-bottom: 1px solid #e9ecef;
    box-shadow: 0 3px 14px rgba(17, 24, 39, .08);
  }

  .bbms-navbar .navbar-brand {
    display: inline-flex;
    align-items: center;
    gap: .6rem;
    color: #111827;
    font-size: 1.15rem;
    font-weight: 800;
    letter-spacing: .02em;
  }

  .bbms-logo-mark {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 2.25rem;
    height: 2.25rem;
    border-radius: 50%;
    background: #fff1f2;
    color: #dc2626;
  }

  .bbms-navbar .navbar-nav { gap: .15rem; }
  .bbms-navbar .nav-link {
    padding: .55rem .75rem !important;
    color: #4b5563 !important;
    font-size: .92rem;
    font-weight: 600;
    border-radius: .4rem;
    transition: color .2s ease, background-color .2s ease;
  }

  .bbms-navbar .nav-link:hover,
  .bbms-navbar .nav-link:focus,
  .bbms-navbar .nav-link.act {
    color: #c81e1e !important;
    background: #fef2f2;
  }

  .bbms-navbar .admin-login {
    margin-left: .5rem;
    padding: .55rem .95rem !important;
    color: #fff !important;
    background: #dc2626;
    border: 1px solid #dc2626;
    border-radius: .4rem;
    box-shadow: 0 2px 5px rgba(220, 38, 38, .2);
  }

  .bbms-navbar .admin-login:hover,
  .bbms-navbar .admin-login:focus {
    color: #fff !important;
    background: #b91c1c;
    border-color: #b91c1c;
  }

  .bbms-navbar .navbar-toggler { border-color: #d1d5db; }
  .bbms-navbar .navbar-toggler:focus { outline: 0; }

  @media (max-width: 991.98px) {
    .bbms-navbar .navbar-collapse { padding-top: .75rem; }
    .bbms-navbar .navbar-nav { gap: .2rem; }
    .bbms-navbar .nav-link { padding: .65rem .75rem !important; }
    .bbms-navbar .admin-login { display: inline-block; margin: .45rem 0 .25rem; }
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light bbms-navbar" aria-label="Main navigation">
  <div class="container">
    <a href="home.php" class="navbar-brand" aria-label="BBMS home">
      <span class="bbms-logo-mark" aria-hidden="true">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.2S5 10.1 5 15.2A7 7 0 0 0 19 15.2C19 10.1 12 2.2 12 2.2Zm0 17.1a4.1 4.1 0 0 1-4.1-4.1c0-1.8 1.9-5 4.1-7.9 2.2 2.9 4.1 6.1 4.1 7.9A4.1 4.1 0 0 1 12 19.3Z"/></svg>
      </span>
      <span>BBMS</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bbmsNavigation" aria-controls="bbmsNavigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="bbmsNavigation">
      <div class="navbar-nav ml-auto align-items-lg-center">
        <a href="about_us.php" class="nav-link<?php if($active=='about') echo ' act'; ?>">About Us</a>
        <a href="why_donate_blood.php" class="nav-link<?php if($active=='why') echo ' act'; ?>">Why Donate Blood</a>
        <a href="donate_blood.php" class="nav-link<?php if($active=='donate') echo ' act'; ?>">Become A Donor</a>
        <a href="need_blood.php" class="nav-link<?php if($active=='need') echo ' act'; ?>">Need Blood</a>
        <a href="contact_us.php" class="nav-link<?php if($active=='contact') echo ' act'; ?>">Contact Us</a>
        <a href="admin/login.php" class="nav-link admin-login">Login as Admin</a>
      </div>
    </div>
  </div>
</nav>
