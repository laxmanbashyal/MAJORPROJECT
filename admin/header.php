<?php
// Include database connection first
include 'conn.php';

// Get admin info
$username = $_SESSION['username'];
$sql = "SELECT * FROM admin_info WHERE admin_username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Count pending users for badge
$pending_count = 0;
$pending_count_sql = "SELECT COUNT(*) as count FROM users WHERE verification_status = 'pending'";
$pending_count_result = mysqli_query($conn, $pending_count_sql);
if($pending_count_result) {
    $pending_count_data = mysqli_fetch_assoc($pending_count_result);
    $pending_count = $pending_count_data['count'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel | Blood Bank</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/admin-style.css">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<!-- Mobile Toggle Button -->
<button class="btn btn-light d-md-none position-fixed top-0 start-0 m-3" id="sidebarToggle" style="z-index: 1100; border-radius: 12px; box-shadow: var(--shadow);">
    <i class="fas fa-bars"></i>
</button>

<!-- ===== SIDEBAR ===== -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <h2>🩸 Blood<span>Bank</span></h2>
        <small>Admin Panel</small>
    </div>
    
    <nav class="nav flex-column">
        <div class="nav-item">
            <a href="dashboard.php" class="nav-link <?php echo ($active == 'dashboard') ? 'active' : ''; ?>">
                <i class="fas fa-chart-pie"></i> Dashboard
            </a>
        </div>
        <div class="nav-item">
            <a href="add_donor.php" class="nav-link <?php echo ($active == 'add') ? 'active' : ''; ?>">
                <i class="fas fa-user-plus"></i> Add Donor
            </a>
        </div>
        <div class="nav-item">
            <a href="donor_list.php" class="nav-link <?php echo ($active == 'list') ? 'active' : ''; ?>">
                <i class="fas fa-users"></i> Donor List
            </a>
        </div>
        <div class="nav-item">
            <a href="user_verification.php" class="nav-link <?php echo ($active == 'verification') ? 'active' : ''; ?>">
                <i class="fas fa-user-check"></i> User Verification
                <?php if($pending_count > 0): ?>
                    <span class="badge bg-warning ms-2" style="font-size: 10px; color: #000;">
                        <?php echo $pending_count; ?>
                    </span>
                <?php endif; ?>
            </a>
        </div>
        <div class="nav-item">
            <a href="query.php" class="nav-link <?php echo ($active == 'query') ? 'active' : ''; ?>">
                <i class="fas fa-envelope"></i> User Queries
            </a>
        </div>
        <div class="nav-item">
            <a href="pending_query.php" class="nav-link <?php echo ($active == 'pending') ? 'active' : ''; ?>">
                <i class="fas fa-clock"></i> Pending Queries
            </a>
        </div>
        <div class="nav-item">
            <a href="pages.php" class="nav-link <?php echo ($active == 'pages') ? 'active' : ''; ?>">
                <i class="fas fa-file-alt"></i> Manage Pages
            </a>
        </div>
        <div class="nav-item">
            <a href="update_contact.php" class="nav-link <?php echo ($active == 'contact') ? 'active' : ''; ?>">
                <i class="fas fa-address-card"></i> Contact Info
            </a>
        </div>
        <div class="nav-item mt-3 border-top pt-3">
            <a href="change_password.php" class="nav-link <?php echo ($active == 'password') ? 'active' : ''; ?>">
                <i class="fas fa-key"></i> Change Password
            </a>
        </div>
        <div class="nav-item">
            <a href="logout.php" class="nav-link text-danger" onclick="return confirmLogout();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </nav>
</div>

<!-- ===== MAIN CONTENT ===== -->
<div class="main-content">

<!-- ===== TOP NAVBAR ===== -->
<div class="top-navbar">
    <h1 class="page-title">
        <i class="fas fa-tint text-danger"></i> 
        <?php echo $page_title ?? 'Dashboard'; ?>
    </h1>
    
    <div class="user-dropdown">
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" style="border-radius: 12px; padding: 8px 16px;">
                <div class="avatar d-inline-block me-2"><?php echo strtoupper(substr($row['admin_name'], 0, 1)); ?></div>
                <span><?php echo $row['admin_name']; ?></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="change_password.php"><i class="fas fa-key text-danger"></i> Change Password</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Confirm logout function
    function confirmLogout() {
        Swal.fire({
            title: 'Logout?',
            text: 'Are you sure you want to logout?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: '<i class="fas fa-sign-out-alt me-2"></i>Yes, logout'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'logout.php';
            }
        });
        return false;
    }

    // Sidebar toggle for mobile
    document.getElementById('sidebarToggle')?.addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('open');
    });
</script>