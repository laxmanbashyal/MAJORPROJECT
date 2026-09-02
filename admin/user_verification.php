<?php
include 'session.php';
$page_title = 'User Verification';
$active = 'verification';
include 'conn.php';

// Handle verification actions
if (isset($_GET['action']) && isset($_GET['id'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['id']);
    $action = $_GET['action'];
    
    if ($action == 'verify') {
        $sql = "UPDATE users SET verification_status = 'verified' WHERE user_id = '$user_id'";
        if (mysqli_query($conn, $sql)) {
            // Update notification
            $notify_sql = "UPDATE admin_notifications SET notification_status = 'read', notification_type = 'verified' WHERE user_id = '$user_id'";
            mysqli_query($conn, $notify_sql);
            
            // Get user email for notification
            $user_sql = "SELECT user_name, user_email FROM users WHERE user_id = '$user_id'";
            $user_result = mysqli_query($conn, $user_sql);
            $user = mysqli_fetch_assoc($user_result);
            
            $success = "User " . $user['user_name'] . " has been verified successfully!";
        }
    } elseif ($action == 'reject') {
        $sql = "UPDATE users SET verification_status = 'rejected' WHERE user_id = '$user_id'";
        if (mysqli_query($conn, $sql)) {
            $success = "User verification request has been rejected.";
        }
    } elseif ($action == 'delete') {
        $sql = "DELETE FROM users WHERE user_id = '$user_id'";
        if (mysqli_query($conn, $sql)) {
            $success = "User has been deleted.";
        }
    }
}

// Fetch pending users
$pending_sql = "SELECT * FROM users WHERE verification_status = 'pending' ORDER BY registered_date DESC";
$pending_result = mysqli_query($conn, $pending_sql);

// Fetch verified users
$verified_sql = "SELECT * FROM users WHERE verification_status = 'verified' ORDER BY registered_date DESC";
$verified_result = mysqli_query($conn, $verified_sql);

// Count statistics
$total_users = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));
$pending_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE verification_status = 'pending'"));
$verified_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE verification_status = 'verified'"));
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'header.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .status-badge {
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .status-badge.pending { background: #FFF3E0; color: #E65100; }
        .status-badge.verified { background: #E8F5E9; color: #2E7D32; }
        .status-badge.rejected { background: #FFEBEE; color: #B71C1C; }
        .user-card {
            transition: transform 0.3s;
            border-radius: 16px;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        }
        .user-card:hover {
            transform: translateY(-3px);
        }
        .btn-action {
            border-radius: 10px;
            padding: 6px 16px;
            font-size: 13px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-0"><i class="fas fa-user-check me-2"></i>User Verification</h4>
                <small class="text-muted">Manage user registrations and verification</small>
            </div>
        </div>

        <!-- Statistics -->
        <div class="row g-4 mb-4">
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $total_users; ?></div>
                    <div class="stat-label">Total Users</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card" style="border-left-color: #FF9800;">
                    <div class="stat-number" style="color: #FF9800;"><?php echo $pending_count; ?></div>
                    <div class="stat-label">Pending Verification</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card" style="border-left-color: #4CAF50;">
                    <div class="stat-number" style="color: #4CAF50;"><?php echo $verified_count; ?></div>
                    <div class="stat-label">Verified Users</div>
                </div>
            </div>
        </div>

        <?php if(isset($success)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> <?php echo $success; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Pending Users -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-clock me-2"></i>Pending Verification
                <span class="badge bg-warning ms-2"><?php echo $pending_count; ?></span>
            </div>
            <div class="card-body p-0">
                <?php if(mysqli_num_rows($pending_result) > 0): ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Blood Group</th>
                                    <th>Registered</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; while($row = mysqli_fetch_assoc($pending_result)): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><strong><?php echo htmlspecialchars($row['user_name']); ?></strong></td>
                                    <td><?php echo htmlspecialchars($row['user_email']); ?></td>
                                    <td><?php echo $row['user_phone']; ?></td>
                                    <td><span class="badge bg-danger"><?php echo $row['blood_group']; ?></span></td>
                                    <td><?php echo date('d M Y', strtotime($row['registered_date'])); ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="?action=verify&id=<?php echo $row['user_id']; ?>" 
                                               class="btn btn-success btn-action" 
                                               onclick="return confirmVerify('<?php echo $row['user_name']; ?>')">
                                                <i class="fas fa-check me-1"></i>Verify
                                            </a>
                                            <a href="?action=reject&id=<?php echo $row['user_id']; ?>" 
                                               class="btn btn-warning btn-action"
                                               onclick="return confirmReject('<?php echo $row['user_name']; ?>')">
                                                <i class="fas fa-times me-1"></i>Reject
                                            </a>
                                            <a href="?action=delete&id=<?php echo $row['user_id']; ?>" 
                                               class="btn btn-danger btn-action"
                                               onclick="return confirmDelete('<?php echo $row['user_name']; ?>')">
                                                <i class="fas fa-trash me-1"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="text-center py-4">
                        <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                        <p class="text-muted">No pending verification requests.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Verified Users -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-check-circle me-2"></i>Verified Users
                <span class="badge bg-success ms-2"><?php echo $verified_count; ?></span>
            </div>
            <div class="card-body p-0">
                <?php if(mysqli_num_rows($verified_result) > 0): ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Blood Group</th>
                                    <th>Verified</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; while($row = mysqli_fetch_assoc($verified_result)): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><strong><?php echo htmlspecialchars($row['user_name']); ?></strong></td>
                                    <td><?php echo htmlspecialchars($row['user_email']); ?></td>
                                    <td><?php echo $row['user_phone']; ?></td>
                                    <td><span class="badge bg-danger"><?php echo $row['blood_group']; ?></span></td>
                                    <td><?php echo date('d M Y', strtotime($row['registered_date'])); ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="text-center py-4">
                        <i class="fas fa-users fa-2x text-muted mb-2"></i>
                        <p class="text-muted">No verified users yet.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        function confirmVerify(name) {
            Swal.fire({
                title: 'Verify User?',
                html: `Are you sure you want to verify <strong>${name}</strong>?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-check me-2"></i>Yes, Verify'
            }).then((result) => {
                if (result.isConfirmed) {
                    return true;
                }
                return false;
            });
            return false;
        }

        function confirmReject(name) {
            Swal.fire({
                title: 'Reject User?',
                html: `Are you sure you want to reject <strong>${name}</strong>'s verification?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ff9800',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-times me-2"></i>Yes, Reject'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '?action=reject&id=<?php echo $row['user_id'] ?? 0; ?>';
                }
            });
            return false;
        }

        function confirmDelete(name) {
            Swal.fire({
                title: 'Delete User?',
                html: `Delete <strong>${name}</strong>? This action cannot be undone!`,
                icon: 'danger',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-trash me-2"></i>Yes, Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '?action=delete&id=<?php echo $row['user_id'] ?? 0; ?>';
                }
            });
            return false;
        }
    </script>
</body>
</html>