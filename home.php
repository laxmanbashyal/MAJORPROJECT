<?php
$active = 'home';
$availability = [
  ['type' => 'A+', 'units' => 145, 'status' => 'Available', 'statusClass' => ''],
  ['type' => 'A-', 'units' => 32, 'status' => 'Low', 'statusClass' => 'status--low'],
  ['type' => 'B+', 'units' => 98, 'status' => 'Available', 'statusClass' => ''],
  ['type' => 'B-', 'units' => 18, 'status' => 'Critical', 'statusClass' => 'status--critical'],
  ['type' => 'O+', 'units' => 210, 'status' => 'Available', 'statusClass' => ''],
  ['type' => 'O-', 'units' => 25, 'status' => 'Critical', 'statusClass' => 'status--critical'],
  ['type' => 'AB+', 'units' => 67, 'status' => 'Available', 'statusClass' => ''],
  ['type' => 'AB-', 'units' => 12, 'status' => 'Critical', 'statusClass' => 'status--critical'],
];
$impactStats = [
  ['icon' => '&#9733;', 'value' => '12,480', 'label' => 'Total Donors', 'cardClass' => ''],
  [
    'icon' => '&#128165;',
    'value' => '607',
    'label' => 'Blood Units Available',
    'cardClass' => 'impact-card--red',
  ],
  [
    'icon' => '&#10004;',
    'value' => '1,243',
    'label' => 'Donations This Month',
    'cardClass' => 'impact-card--green',
  ],
  [
    'icon' => '&#9889;',
    'value' => '38,200+',
    'label' => 'Lives Saved',
    'cardClass' => 'impact-card--purple',
  ],
];
$benefits = [
  [
    'icon' => '&#10003;',
    'title' => 'One Donation = 3 Lives Saved',
    'text' => 'Each donation is separated into components that help multiple patients.',
  ],
  [
    'icon' => '&#9679;',
    'title' => 'Takes Only 1 Hour',
    'text' => 'The entire process including registration and recovery takes about 60 minutes.',
  ],
  [
    'icon' => '&#10084;',
    'title' => 'Health Benefits for Donors',
    'text' =>
      'Regular donation reduces risk of heart disease and stimulates blood cell production.',
  ],
];
$requirements = [
  ['value' => '18–65', 'label' => 'Age Range', 'text' => 'Eligible donor age'],
  ['value' => '56 days', 'label' => 'Wait Period', 'text' => 'Between donations'],
  ['value' => '50 kg', 'label' => 'Min. Weight', 'text' => 'Required to donate'],
  ['value' => '475 ml', 'label' => 'Blood Drawn', 'text' => 'Per donation'],
];
$programs = [
  [
    'title' => 'City Hospital Blood Drive',
    'date' => 'June 15, 2026',
    'location' => 'City General Hospital',
    'registered' => '34',
    'capacity' => '50',
    'progress' => 68,
  ],
  [
    'title' => 'Community Health Fair',
    'date' => 'June 22, 2026',
    'location' => 'Central Park Pavilion',
    'registered' => '61',
    'capacity' => '80',
    'progress' => 76,
  ],
  [
    'title' => 'University Campus Drive',
    'date' => 'July 5, 2026',
    'location' => 'State University, Hall A',
    'registered' => '45',
    'capacity' => '120',
    'progress' => 38,
  ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Blood Bank Management System">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'head.php'; ?>
<main>
  <section class="hero">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <div class="hero-copy">
            <h1>Donate Blood,<br>Save Lives</h1>
            <p>Every drop of blood you donate can save up to 3 lives. Join our community of heroes and make a difference today.</p>
            <div class="hero-actions">
              <a class="button-primary" href="donate_blood.php">Become a Donor</a>
              <a class="button-secondary" href="need_blood.php">Check Blood Availability</a>
            </div>
            <div class="hero-stats">
              <div class="hero-stat"><b>12K+</b><span>Donors</span></div>
              <div class="hero-stat"><b>38K+</b><span>Lives Saved</span></div>
              <div class="hero-stat"><b>607</b><span>Units Available</span></div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="hero-visual">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
            <div class="circle circle-3"></div>
            <div class="blood-illustration">
              <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M12 2.1S5.5 9.5 5.5 15.2a6.5 6.5 0 1 0 13 0C18.5 9.5 12 2.1 12 2.1Zm0 16.8a3.7 3.7 0 0 1-3.7-3.7c0-1.6 1.5-4.4 3.7-7.4 2.2 3 3.7 5.8 3.7 7.4a3.7 3.7 0 0 1-3.7 3.7Z"/>
              </svg>
            </div>
            <div class="float-card float-card--one">
              <span>Status</span>
              <b><i aria-hidden="true"></i>Donor Active</b>
            </div>
            <div class="float-card float-card--two">
              <span>Lives Saved</span>
              <b>38,200+</b>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="emergency">
    <div class="container">
      <div class="emergency-inner">
        <div class="emergency-message">
          <span aria-hidden="true">!</span>
          <b>URGENT:</b> Critical shortage of O- and B- blood groups. Immediate donors needed!
        </div>
        <a class="button-primary" href="need_blood.php">Respond Now</a>
      </div>
    </div>
  </section>

  <section class="home-section">
    <div class="container">
      <div class="section-heading">
        <div>
          <h2 class="section-title">Blood Availability</h2>
          <p class="section-text">Current stock levels at our facility</p>
        </div>
        <a class="text-link" href="need_blood.php">View All &rarr;</a>
      </div>
      <div class="row no-gutters">
        <?php foreach ($availability as $stock): ?>
          <div class="col-6 col-md-3 col-lg mb-0 px-1">
            <div class="availability-card">
              <div class="blood-label"><?php echo $stock['type']; ?></div>
              <div class="units"><b><?php echo $stock['units']; ?></b> units</div>
              <span class="status <?php echo $stock['statusClass']; ?>"><?php echo $stock[
  'status'
]; ?></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="home-section home-section--soft">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="section-title">Our Impact</h2>
        <p class="section-text">Together we’re making a difference in our community</p>
      </div>
      <div class="row">
        <?php foreach ($impactStats as $stat): ?>
          <div class="col-6 col-lg-3 mb-3">
            <div class="impact-card <?php echo $stat['cardClass']; ?>">
              <div class="impact-icon"><?php echo $stat['icon']; ?></div>
              <b><?php echo $stat['value']; ?></b>
              <span><?php echo $stat['label']; ?></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="home-section donation-matters">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 matters-copy">
          <h2 class="section-title">Why Blood Donation Matters</h2>
          <p class="section-text">Blood is a critical resource that cannot be manufactured — it can only be donated. Every 2 seconds, someone in the world needs blood, whether for surgery, accidents, cancer treatment, or childbirth complications.</p>
          <div class="benefit-list">
            <?php foreach ($benefits as $benefit): ?>
              <div class="benefit">
                <div class="benefit-icon"><?php echo $benefit['icon']; ?></div>
                <div>
                  <h3><?php echo $benefit['title']; ?></h3>
                  <p><?php echo $benefit['text']; ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <a class="button-primary mt-4" href="why_donate_blood.php">Check Your Eligibility</a>
        </div>
        <div class="col-lg-6 mt-5 mt-lg-0">
          <div class="requirements">
            <?php foreach ($requirements as $requirement): ?>
              <div class="requirement-card">
                <b><?php echo $requirement['value']; ?></b>
                <strong><?php echo $requirement['label']; ?></strong>
                <span><?php echo $requirement['text']; ?></span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="home-section">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="section-title">Upcoming Donation Programs</h2>
        <p class="section-text">Join a local donation drive and make a direct impact.</p>
      </div>
      <div class="row">
        <?php foreach ($programs as $program): ?>
          <div class="col-md-4 mb-3">
            <article class="program-card">
              <div class="program-banner">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                  <path d="M12 2.1S5.5 9.5 5.5 15.2a6.5 6.5 0 1 0 13 0C18.5 9.5 12 2.1 12 2.1Z"/>
                </svg>
              </div>
              <div class="program-body">
                <h3><?php echo $program['title']; ?></h3>
                <div class="program-detail"><span>&#9679;</span><?php echo $program[
                  'date'
                ]; ?></div>
                <div class="program-detail"><span>&#8226;</span><?php echo $program[
                  'location'
                ]; ?></div>
                <div class="program-progress">
                  <span><?php echo $program['registered']; ?> registered</span>
                  <span><?php echo $program['capacity']; ?> slots</span>
                </div>
                <div class="program-progressbar"><i style="width:<?php echo $program[
                  'progress'
                ]; ?>%;"></i></div>
                <a class="button-primary" href="donate_blood.php">Register</a>
              </div>
            </article>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="cta-section">
    <div class="container text-center">
      <h2>Ready to make a difference?</h2>
      <p>Become a blood donor today and help ensure safe blood is there when it is needed.</p>
      <div class="cta-buttons">
        <a class="button-primary" href="donate_blood.php">Register Now</a>
        <a class="button-secondary" href="contact_us.php">Call Us</a>
      </div>
    </div>
  </section>
</main>
<?php include 'footer.php'; ?>
</body>
</html>
