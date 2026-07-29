<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login | Blood Bank</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #f44336 0%, #c62828 100%);
      min-height: 100vh;
      font-family: Arial, sans-serif;
    }
    .login-card {
      border: 0;
      border-radius: 20px;
      box-shadow: 0 12px 30px rgba(0,0,0,0.2);
      overflow: hidden;
    }
    .login-header {
      background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
      color: #fff;
      padding: 30px 25px;
      text-align: center;
    }
    .login-body {
      padding: 30px 25px 25px;
      background: #fff;
    }
    .btn-login {
      background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
      border: 0;
      width: 100%;
      padding: 10px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <?php
  session_start();
  include 'conn.php';

  if (isset($_POST["login"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql = "SELECT * FROM admin_info WHERE admin_username='$username' AND admin_password='$password'";
    $result = mysqli_query($conn, $sql) or die("query failed.");

    if (mysqli_num_rows($result) > 0) {
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;
      header("Location: dashboard.php");
      exit;
    } else {
      echo '<div class="alert alert-danger mt-3">Username and password do not match.</div>';
    }
  }
  ?>

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="login-card">
          <div class="login-header">
            <h2 class="mb-2">Admin Login</h2>
            <p class="mb-0">Access the Blood Bank Management Panel</p>
          </div>
          <div class="login-body">
            <form method="post" action="login.php">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
              </div>
              <button type="submit" name="login" class="btn btn-login text-white">Login</button>
            </form>
            <div class="text-center mt-3">
              <a href="../home.php" class="text-decoration-none">← Back to Home</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
