<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Contact Blood Bank & Donation Management System">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      background: #F8FAFC;
      font-family: 'Inter', Arial, Helvetica, sans-serif;
      margin: 0;
      color: #0B1F3A;
    }

    .contact-hero {
      background: linear-gradient(180deg, #F8FAFC 0%, #FFFFFF 100%);
      color: #0B1F3A;
      padding: 80px 0 90px;
    }

    .contact-container {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 40px;
      align-items: start;
      padding: 0 15px;
    }

    .contact-badge {
      display: inline-block;
      background: rgba(227, 6, 19, 0.08);
      border: 1px solid rgba(227, 6, 19, 0.22);
      color: #E30613;
      padding: 8px 18px;
      border-radius: 999px;
      margin-bottom: 28px;
      font-weight: 700;
      letter-spacing: 0.3px;
    }

    .contact-title {
      font-size: 72px;
      font-weight: 800;
      line-height: 1.05;
      margin-bottom: 24px;
      color: #0B1F3A;
    }

    .contact-subtext {
      font-size: 24px;
      line-height: 1.6;
      color: #667085;
      margin-bottom: 24px;
      max-width: 520px;
    }

    .contact-info-box {
      background: #FFFFFF;
      border: 1px solid #E5E7EB;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(11, 31, 58, 0.06);
      max-width: 520px;
    }

    .contact-info-box p {
      margin: 10px 0;
      font-size: 16px;
      color: #172033;
    }

    .contact-info-box strong {
      color: #0B1F3A;
    }

    .contact-card {
      background: #FFFFFF;
      border-radius: 10px;
      padding: 30px 28px 26px;
      box-shadow: 0 2px 12px rgba(11, 31, 58, 0.08);
      border: 1px solid #E5E7EB;
      max-width: 680px;
      margin-left: auto;
    }

    .contact-card h3 {
      color: #0B1F3A;
      font-weight: 800;
      margin-bottom: 24px;
      font-size: 40px;
    }

    .contact-card label {
      display: block;
      color: #172033;
      font-weight: 600;
      margin-bottom: 8px;
    }

    .contact-card .form-control {
      width: 100%;
      border-radius: 6px;
      padding: 12px 14px;
      border: 1px solid #E5E7EB;
      box-shadow: none;
      margin-bottom: 18px;
      font-size: 16px;
      height: 52px;
      color: #172033;
    }

    .contact-card .form-control::placeholder {
      color: #61718A;
    }

    .contact-card .form-control:focus {
      border-color: #E30613;
      box-shadow: 0 0 0 0.15rem rgba(227, 6, 19, 0.16);
      outline: none;
    }

    .contact-card textarea {
      min-height: 180px;
      resize: vertical;
    }

    .contact-card .btn-primary {
      background: #E30613;
      border: none;
      border-radius: 8px;
      padding: 14px 28px;
      font-weight: 700;
      font-size: 18px;
      min-width: 200px;
    }

    .contact-card .btn-primary:hover {
      background: #BD0510;
    }

    .alert-success,
    .alert-danger,
    #form-error {
      border-radius: 8px;
      padding: 12px 14px;
      margin-bottom: 18px;
      font-size: 14px;
    }

    .alert-success {
      background: rgba(34, 197, 94, 0.12);
      color: #22C55E;
      border: 1px solid rgba(34, 197, 94, 0.30);
    }

    .alert-danger,
    #form-error {
      background: rgba(227, 6, 19, 0.08);
      color: #D6000F;
      border: 1px solid rgba(227, 6, 19, 0.24);
    }

    .success-modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.55);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999;
      padding: 20px;
      animation: fadeInModal 0.25s ease-out;
    }

    .success-modal {
      width: min(100%, 460px);
      background: #ffffff;
      border-radius: 14px;
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
      padding: 28px 24px;
      text-align: center;
      animation: scaleInModal 0.25s ease-out;
    }

    .success-check {
      width: 68px;
      height: 68px;
      margin: 0 auto 16px;
      border-radius: 50%;
      background: rgba(34, 197, 94, 0.14);
      color: #22C55E;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 34px;
      font-weight: 700;
    }

    .success-modal h4 {
      margin: 0 0 10px;
      color: #0B1F3A;
      font-size: 24px;
      font-weight: 700;
    }

    .success-modal p {
      margin: 0 0 22px;
      color: #667085;
      font-size: 16px;
    }

    .success-modal .ok-btn {
      background: #E30613;
      color: #FFFFFF;
      border: none;
      border-radius: 8px;
      padding: 12px 28px;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
    }

    .success-modal .ok-btn:hover {
      background: #BD0510;
    }

    .contact-footer {
      background: #0B1F3A;
      color: #FFFFFF;
      text-align: center;
      padding: 18px 12px;
      font-weight: 700;
      line-height: 1.6;
      margin-top: 0;
    }

    @keyframes fadeInModal {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes scaleInModal {
      from { transform: scale(0.94); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }

    @media (max-width: 991px) {
      .contact-container {
        grid-template-columns: 1fr;
        gap: 24px;
      }

      .contact-card {
        margin-left: 0;
      }

      .contact-hero {
        padding: 50px 0 70px;
      }

      .contact-title {
        font-size: 46px;
      }

      .contact-subtext {
        font-size: 18px;
      }
    }

    @media (max-width: 768px) {
      .contact-title {
        font-size: 38px;
      }

      .contact-subtext {
        font-size: 16px;
      }

      .contact-card {
        padding: 20px;
      }

      .contact-card h3 {
        font-size: 30px;
      }
    }
  </style>
</head>
<body>
<?php
$active = 'contact';
include 'head.php';
include 'conn.php';

$full_name = '';
$phone = '';
$email = '';
$message = '';
$success_message = '';
$error_message = '';

// This block runs only when the contact form is submitted.
if (isset($_POST['send'])) {
    // Read form values and remove extra spaces.
    $full_name = trim($_POST['fullname'] ?? '');
    $phone = trim($_POST['contactno'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Check if all required fields are filled.
    if ($full_name === '' || $phone === '' || $email === '' || $message === '') {
        $error_message = 'Please complete all required fields before sending your message.';
    } else {
        // Validate full name: letter-based name with spaces and simple punctuation.
        if (!preg_match("/^[A-Za-z][A-Za-z\s'-]{1,49}$/", $full_name)) {
            $error_message = 'Please enter a valid full name using letters only.';
        }

        // Normalize the phone number.
        $phone = str_replace(' ', '', $phone);
        if (preg_match('/^\+977/', $phone)) {
            $phone = substr($phone, 4);
        } elseif (preg_match('/^977/', $phone)) {
            $phone = substr($phone, 3);
        }

        // Nepal mobile numbers should start with 96, 97, or 98.
        if (!preg_match('/^9[6-8]\d{8}$/', $phone)) {
            $error_message = 'Please enter a valid Nepal mobile number starting with 96, 97, or 98.';
        }

        // Validate email properly and require Gmail.
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@gmail\.com$/i', $email)) {
            $error_message = 'Please enter a valid Gmail address ending with @gmail.com.';
        }

        // Message should be longer than a short placeholder.
        if (strlen($message) < 5) {
            $error_message = 'Please write a proper message.';
        }
    }

    // If there was no validation error, save the message securely into the database.
    if ($error_message === '') {
        // Use the existing project table structure instead of the missing table.
        $sql = 'INSERT INTO contact_query (query_name, query_mail, query_number, query_message) VALUES (?, ?, ?, ?)';

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, 'ssss', $full_name, $email, $phone, $message);

            if (mysqli_stmt_execute($stmt)) {
                $success_message = 'Your message has been sent successfully. We will contact you soon.';
                $full_name = '';
                $phone = '';
                $email = '';
                $message = '';
            } else {
                $error_message = 'Something went wrong while saving your message. Please try again.';
            }

            mysqli_stmt_close($stmt);
        } else {
            $error_message = 'Database preparation failed. Please try again later.';
        }
    }
}
?>

<div id="page-container" style="position: relative; min-height: 84vh;">
  <div class="contact-hero">
    <div class="contact-container">
      <div class="contact-left">
        <div class="contact-badge">Contact Us</div>
        <h1 class="contact-title">Let’s Talk</h1>
        <p class="contact-subtext">
          Reach out to our blood donation team for support, partnership requests, or any question about becoming a donor.
        </p>


      </div>

      <div class="contact-right">
        <div class="contact-card">
          <h3>Send us a Message</h3>

            <div id="successModalOverlay" class="success-modal-overlay" style="display: <?php echo ($success_message !== '') ? 'flex' : 'none'; ?>;">
              <div class="success-modal" role="dialog" aria-modal="true" aria-labelledby="successModalTitle">
                <div class="success-check">✓</div>
                <h4 id="successModalTitle">Message Sent!</h4>
                <p>Your message has been sent successfully.</p>
                <button type="button" class="ok-btn" id="closeSuccessModal">OK</button>
              </div>
            </div>

            <?php if ($error_message !== ''): ?>
              <div class="alert alert-danger"><?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?></div>
            <?php endif; ?>

            <div id="form-error" style="display:none;"></div>

            <form name="sentMessage" method="post" novalidate>
              <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your full name" value="<?php echo htmlspecialchars($full_name, ENT_QUOTES, 'UTF-8'); ?>" required>
              </div>

              <div class="form-group">
                <label for="contactno">Phone Number:</label>
                <input type="tel" class="form-control" id="contactno" name="contactno" placeholder="98XXXXXXXX" value="<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>" required maxlength="15" inputmode="numeric" pattern="[0-9+]+">
              </div>

              <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="yourname@gmail.com" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>" required>
              </div>

              <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" id="message" name="message" placeholder="Write your message here..." required><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></textarea>
              </div>

              <button type="submit" name="send" class="btn btn-primary">Send Message</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="contact-footer">
  © 2026 BloodCare. All Rights Reserved.<br>
  Made for Blood Donation Management.
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var form = document.forms['sentMessage'];
    if (!form) return;

    var phoneField = document.getElementById('contactno');
    var emailField = document.getElementById('email');
    var errorBox = document.getElementById('form-error');
    var successModalOverlay = document.getElementById('successModalOverlay');
    var closeSuccessModalBtn = document.getElementById('closeSuccessModal');

    if (successModalOverlay && closeSuccessModalBtn) {
      var closeSuccessModal = function () {
        successModalOverlay.style.display = 'none';
      };

      closeSuccessModalBtn.addEventListener('click', closeSuccessModal);

      if (successModalOverlay.style.display === 'flex') {
        setTimeout(closeSuccessModal, 3000);
      }
    }

    // Keep the phone field numeric and short.
    phoneField.addEventListener('input', function () {
      this.value = this.value.replace(/[^0-9+]/g, '');
    });

    function showError(message) {
      errorBox.textContent = message;
      errorBox.style.display = 'block';
    }

    form.addEventListener('submit', function (event) {
      var fullName = form.fullname.value.trim();
      var phone = phoneField.value.trim();
      var email = emailField.value.trim();
      var message = form.message.value.trim();

      errorBox.style.display = 'none';

      if (!fullName || !phone || !email || !message) {
        event.preventDefault();
        showError('Please fill in all required fields.');
        return;
      }

      var cleanedPhone = phone.replace(/\s+/g, '');
      if (/^\+977/.test(cleanedPhone)) {
        cleanedPhone = cleanedPhone.substring(4);
      } else if (/^977/.test(cleanedPhone)) {
        cleanedPhone = cleanedPhone.substring(3);
      }

      if (!/^9[6-8]\d{8}$/.test(cleanedPhone)) {
        event.preventDefault();
        showError('Please enter a valid Nepal mobile number starting with 96, 97, or 98.');
        return;
      }

      if (!/^[^\s@]+@gmail\.com$/i.test(email)) {
        event.preventDefault();
        showError('Please enter a valid Gmail address ending with @gmail.com.');
      }
    });
  });
</script>
</body>
</html>
