<?php
// This is the standalone sidebar - only use if you prefer not to use the integrated header.php
// Otherwise, the sidebar is already included in the new header.php
?>
<aside class="sidebar" id="sidebar">
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
</aside>

<script>
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
</script>