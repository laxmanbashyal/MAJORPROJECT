<?php 
include 'session.php';
$page_title = 'Update Contact';
$active = 'contact';
include 'conn.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: login.php');
    exit();
}

if(isset($_POST['update'])) {
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['contactno']);
    
    $sql = "UPDATE contact_info SET contact_address='{$address}', contact_mail='{$email}', contact_phone='{$phone}' WHERE contact_id='1'";
    mysqli_query($conn, $sql);
    $success = "Contact information updated successfully!";
}

// Get current data
$sql = "SELECT * FROM contact_info WHERE contact_id='1'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
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
                <i class="fas fa-address-card me-2"></i>Update Contact Information
            </div>
            <div class="card-body">
                <?php if(isset($success)): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>
                
                <form method="post">
                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label">Address <span class="text-danger">*</span></label>
                            <textarea name="address" class="form-control" rows="3" required><?php echo $row['contact_address'] ?? ''; ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email ID <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" value="<?php echo $row['contact_mail'] ?? ''; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                            <input type="text" name="contactno" class="form-control" value="<?php echo $row['contact_phone'] ?? ''; ?>" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="update" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Contact Info
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>