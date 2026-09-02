<?php
session_start();
include 'conn.php';

// Check if user is logged in
if (!isset($_SESSION['user_loggedin']) || $_SESSION['user_loggedin'] !== true) {
    header('Location: user_login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

$is_verified = ($user['verification_status'] == 'verified');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard | Blood Bank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #f8f9fa;
        }
        .navbar-custom {
            background: linear-gradient(135deg, #D32F2F 0%, #B71C1C 100%);
            padding: 15px 0;
        }
        .navbar-custom .navbar-brand {
            color: white;
            font-weight: 700;
            font-size: 24px;
        }
        .navbar-custom .navbar-brand span { color: #FFD54F; }
        .navbar-custom .nav-link {
            color: rgba(255,255,255,0.85) !important;
            font-weight: 500;
        }
        .navbar-custom .nav-link:hover {
            color: white !important;
        }
        .dashboard-container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }
        .profile-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            margin-bottom: 25px;
        }
        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            border-bottom: 2px solid #f1f3f5;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #D32F2F, #B71C1C);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: 700;
            flex-shrink: 0;
        }
        .profile-name {
            flex: 1;
        }
        .profile-name h3 {
            margin: 0;
            color: #2c3e50;
            font-weight: 700;
        }
        .profile-name .email {
            color: #7f8c8d;
            font-size: 14px;
        }
        .verification-badge {
            display: inline-block;
            padding: 6px 18px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 13px;
        }
        .verification-badge.verified {
            background: #E8F5E9;
            color: #2E7D32;
        }
        .verification-badge.pending {
            background: #FFF3E0;
            color: #E65100;
        }
        .verification-badge.rejected {
            background: #FFEBEE;
            color: #B71C1C;
        }
        .detail-row {
            display: flex;
            padding: 12px 0;
            border-bottom: 1px solid #f1f3f5;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .detail-label {
            width: 140px;
            font-weight: 600;
            color: #2c3e50;
            flex-shrink: 0;
        }
        .detail-value {
            flex: 1;
            color: #34495e;
        }
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            transition: transform 0.3s;
            height: 100%;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-card .icon {
            font-size: 32px;
            color: #D32F2F;
            margin-bottom: 10px;
        }
        .stat-card .number {
            font-size: 28px;
            font-weight: 700;
            color: #2c3e50;
        }
        .stat-card .label {
            color: #7f8c8d;
            font-size: 13px;
        }
        .btn-logout {
            background: transparent;
            border: 2px solid rgba(255,255,255,0.3);
            color: white;
            border-radius: 10px;
            padding: 6px 18px;
            transition: all 0.3s;
        }
        .btn-logout:hover {
            background: white;
            color: #D32F2F;
        }
        .status-message {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
        }
        .status-message.warning {
            background: #FFF3E0;
            border-left: 4px solid #FF9800;
            color: #E65100;
        }
        .status-message.success {
            background: #E8F5E9;
            border-left: 4px solid #4CAF50;
            color: #2E7D32;
        }
        @media (max-width: 768px) {
            .profile-header { flex-direction: column; text-align: center; }
            .detail-row { flex-direction: column; }
            .detail-label { width: 100%; margin-bottom: 5px; }
            .dashboard-container { padding: 0 15px; }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="home.php">🩸 Blood<span>Bank</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php"><i class="fas fa-home me-1"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="user_dashboard.php"><i class="fas fa-user me-1"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_logout.php"><i class="fas fa-sign-out-alt me-1"></i>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="dashboard-container">
    <!-- Status Message -->
    <?php if(!$is_verified): ?>
        <div class="status-message warning">
            <i class="fas fa-clock me-2"></i>
            <strong>Account Pending Verification!</strong> 
            Your account is under review by the admin. You will be notified once verified.
        </div>
    <?php else: ?>
        <div class="status-message success">
            <i class="fas fa-check-circle me-2"></i>
            <strong>Verified Account!</strong> 
            Your account has been verified by the admin.
        </div>
    <?php endif; ?>

    <!-- Profile Card -->
    <div class="profile-card">
        <div class="profile-header">
            <div class="profile-avatar">
                <?php echo strtoupper(substr($user['user_name'], 0, 1)); ?>
            </div>
            <div class="profile-name">
                <h3><?php echo htmlspecialchars($user['user_name']); ?></h3>
                <div class="email"><?php echo htmlspecialchars($user['user_email']); ?></div>
            </div>
            <div>
                <?php if($is_verified): ?>
                    <span class="verification-badge verified">
                        <i class="fas fa-check-circle me-1"></i>Verified
                    </span>
                <?php else: ?>
                    <span class="verification-badge pending">
                        <i class="fas fa-clock me-1"></i>Pending Verification
                    </span>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-phone me-2 text-danger"></i>Phone</div>
                    <div class="detail-value"><?php echo htmlspecialchars($user['user_phone']); ?></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-calendar me-2 text-danger"></i>Age</div>
                    <div class="detail-value"><?php echo $user['user_age']; ?> years</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-venus-mars me-2 text-danger"></i>Gender</div>
                    <div class="detail-value"><?php echo $user['user_gender']; ?></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-tint me-2 text-danger"></i>Blood Group</div>
                    <div class="detail-value">
                        <span class="badge bg-danger"><?php echo $user['blood_group']; ?></span>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-map-marker-alt me-2 text-danger"></i>Location</div>
                    <div class="detail-value">
                        <?php echo htmlspecialchars($user['user_city'] . ', ' . $user['user_state']); ?>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-calendar-plus me-2 text-danger"></i>Registered</div>
                    <div class="detail-value"><?php echo date('d M Y', strtotime($user['registered_date'])); ?></div>
                </div>
            </div>
        </div>
        
        <div class="mt-3">
            <div class="detail-row">
                <div class="detail-label"><i class="fas fa-home me-2 text-danger"></i>Full Address</div>
                <div class="detail-value"><?php echo htmlspecialchars($user['user_address'] . ', ' . $user['user_city'] . ', ' . $user['user_state'] . ' - ' . $user['user_pincode']); ?></div>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="row g-4">
        <div class="col-md-3 col-6">
            <div class="stat-card">
                <div class="icon"><i class="fas fa-tint"></i></div>
                <div class="number"><?php echo $user['blood_group']; ?></div>
                <div class="label">Blood Group</div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card">
                <div class="icon"><i class="fas fa-calendar-check"></i></div>
                <div class="number"><?php echo $is_verified ? 'Yes' : 'No'; ?></div>
                <div class="label">Verified</div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card">
                <div class="icon"><i class="fas fa-calendar-day"></i></div>
                <div class="number"><?php echo date('d M', strtotime($user['registered_date'])); ?></div>
                <div class="label">Joined</div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card">
                <div class="icon"><i class="fas fa-heart"></i></div>
                <div class="number"><?php echo $user['user_age']; ?></div>
                <div class="label">Age</div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-4 text-center">
        <a href="user_logout.php" class="btn btn-danger">
            <i class="fas fa-sign-out-alt me-2"></i>Logout
        </a>
        <a href="home.php" class="btn btn-outline-danger ms-2">
            <i class="fas fa-home me-2"></i>Back to Home
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>