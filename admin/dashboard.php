<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard | Blood Bank</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    body { background:#f5f7fb; color:#2c3e50; }
    #sidebar{position:relative;margin-top:-20px}
    #content{position:relative;margin-left:210px}
    @media screen and (max-width: 600px) {
      #content { position:relative;margin-left:auto;margin-right:auto; }
    }
    .panel-card { border-radius:18px; box-shadow:0 6px 18px rgba(0,0,0,0.08); }
    .panel-card .panel-body { border-radius:18px; }
    .page-title { font-size:28px; font-weight:bold; color:#2c3e50; }
    .welcome-box { background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); color:#fff; padding:20px; border-radius:18px; margin-bottom:20px; }
  </style>
</head>
<body>
  <?php
  include 'conn.php';
  include 'session.php';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  ?>

  <div id="header">
    <?php include 'header.php'; ?>
  </div>
  <div id="sidebar">
    <?php $active="dashboard"; include 'sidebar.php'; ?>
  </div>
  <div id="content">
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="welcome-box">
              <h1 class="page-title">Welcome to the Admin Dashboard</h1>
              <p class="mb-0">Manage donors, view blood requests, and handle user queries from one place.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <div class="panel panel-default panel-card">
                  <div class="panel-body text-light" style="background:#D6EAF8;">
                    <div class="stat-panel text-center">
                      <?php
                        $sql = "SELECT * FROM donor_details";
                        $result = mysqli_query($conn, $sql) or die("query failed.");
                        $row = mysqli_num_rows($result);
                      ?>
                      <div class="stat-panel-number h1"><?php echo $row; ?></div>
                      <div class="stat-panel-title text-uppercase">Blood Donors Available</div>
                      <br>
                      <button class="btn btn-danger" onclick="window.location.href='donor_list.php';">Full Detail</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel panel-default panel-card">
                  <div class="panel-body text-light" style="background:#ABEBC6;">
                    <div class="stat-panel text-center">
                      <?php
                        $sql1 = "SELECT * FROM contact_query";
                        $result1 = mysqli_query($conn, $sql1) or die("query failed.");
                        $row1 = mysqli_num_rows($result1);
                      ?>
                      <div class="stat-panel-number h1"><?php echo $row1; ?></div>
                      <div class="stat-panel-title text-uppercase">All User Queries</div>
                      <br>
                      <button class="btn btn-danger" onclick="window.location.href='query.php';">Full Detail</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel panel-default panel-card">
                  <div class="panel-body text-light" style="background:#E8DAEF;">
                    <div class="stat-panel text-center">
                      <?php
                        $sql2 = "SELECT * FROM contact_query WHERE query_status=2";
                        $result2 = mysqli_query($conn, $sql2) or die("query failed.");
                        $row2 = mysqli_num_rows($result2);
                      ?>
                      <div class="stat-panel-number h1"><?php echo $row2; ?></div>
                      <div class="stat-panel-title text-uppercase">Pending Queries</div>
                      <br>
                      <button class="btn btn-danger" onclick="window.location.href='pending_query.php';">Full Detail</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  } else {
  ?>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="panel panel-default panel-card">
          <div class="panel-body" style="padding:30px;">
            <h3 class="text-center">Admin Access Required</h3>
            <p class="text-center">Please log in to view the management panel.</p>
            <div class="text-center">
              <a href="login.php" class="btn btn-danger">Go to Login Page</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php }
  ?>
</body>
</html>
