<?php 
include 'session.php';
$page_title = 'Change Password';
$active = 'password';
include 'conn.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: login.php');
    exit();
}

if(isset($_POST['submit'])) {
    $username = $_SESSION['username'];
    $password = mysqli_real_escape_string($conn, $_POST['currpassword']);
    $newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
    $confpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
    
    $sql = "SELECT * FROM admin_info WHERE admin_username='$username' AND admin_password='$password'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        if($newpassword == $confpassword) {
            if($newpassword != $password) {
                $update = "UPDATE admin_info SET admin_password='{$newpassword}' WHERE admin_username='{$username}'";
                mysqli_query($conn, $update);
                $success = "Password changed successfully!";
            } else {
                $error = "New password cannot be same as current password.";
            }
        } else {
            $error = "New password and confirm password do not match.";
        }
    } else {
        $error = "Current password is incorrect.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'header.php'; ?>
</head>
<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-key me-2"></i>Change Password
            </div>
            <div class="card-body">
                <?php if(isset($success)): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <form method="post" name="chngpwd">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Current Password <span class="text-danger">*</span></label>
                            <input type="password" name="currpassword" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">New Password <span class="text-danger">*</span></label>
                            <input type="password" name="newpassword" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" name="confirmpassword" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Password
                            </button>
                            <a href="dashboard.php" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>