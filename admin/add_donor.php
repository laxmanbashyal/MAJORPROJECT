<?php 
include 'session.php';
$page_title = 'Add Donor';
$active = 'add';
include 'conn.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: login.php');
    exit();
}

// Display errors from session
$errors = isset($_SESSION['donor_errors']) ? $_SESSION['donor_errors'] : array();
$old_data = isset($_SESSION['donor_data']) ? $_SESSION['donor_data'] : array();
unset($_SESSION['donor_errors']);
unset($_SESSION['donor_data']);
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
                <i class="fas fa-user-plus me-2"></i>Add New Donor
            </div>
            <div class="card-body">
                <?php if(!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <strong>Please fix the following errors:</strong>
                        <ul class="mb-0 mt-2">
                            <?php foreach($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <form name="donor" action="save_donor_data.php" method="post">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="fullname" class="form-control <?php echo in_array('Full name is required', $errors) ? 'is-invalid' : ''; ?>" 
                                   required placeholder="Enter donor name" value="<?php echo htmlspecialchars($old_data['fullname'] ?? ''); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                            <input type="text" name="mobileno" class="form-control <?php echo (in_array('Mobile number is required', $errors) || in_array('Mobile number must be 10 digits', $errors) || in_array('Mobile number already registered!', $errors)) ? 'is-invalid' : ''; ?>" 
                                   required placeholder="Enter 10-digit mobile number" value="<?php echo htmlspecialchars($old_data['mobileno'] ?? ''); ?>">
                            <div class="form-text">Enter 10-digit mobile number</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email ID</label>
                            <input type="email" name="emailid" class="form-control <?php echo in_array('Invalid email format', $errors) ? 'is-invalid' : ''; ?>" 
                                   placeholder="Enter email address" value="<?php echo htmlspecialchars($old_data['emailid'] ?? ''); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Age <span class="text-danger">*</span></label>
                            <input type="number" name="age" class="form-control <?php echo (in_array('Age is required', $errors) || in_array('Age must be between 18 and 65', $errors)) ? 'is-invalid' : ''; ?>" 
                                   required placeholder="Enter age (18-65)" value="<?php echo htmlspecialchars($old_data['age'] ?? ''); ?>">
                            <div class="form-text">Age must be between 18 and 65</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Gender <span class="text-danger">*</span></label>
                            <select name="gender" class="form-select <?php echo in_array('Valid gender is required', $errors) ? 'is-invalid' : ''; ?>" required>
                                <option value="">Select Gender</option>
                                <option value="Male" <?php echo (($old_data['gender'] ?? '') == 'Male') ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo (($old_data['gender'] ?? '') == 'Female') ? 'selected' : ''; ?>>Female</option>
                                <option value="Other" <?php echo (($old_data['gender'] ?? '') == 'Other') ? 'selected' : ''; ?>>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Blood Group <span class="text-danger">*</span></label>
                            <select name="blood" class="form-select <?php echo in_array('Blood group is required', $errors) ? 'is-invalid' : ''; ?>" required>
                                <option value="" selected disabled>Select Blood Group</option>
                                <?php
                                $sql = 'SELECT * FROM blood';
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)):
                                ?>
                                <option value="<?php echo $row['blood_id']; ?>" <?php echo (($old_data['blood'] ?? '') == $row['blood_id']) ? 'selected' : ''; ?>>
                                    <?php echo $row['blood_group']; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Address <span class="text-danger">*</span></label>
                            <textarea class="form-control <?php echo in_array('Address is required', $errors) ? 'is-invalid' : ''; ?>" 
                                      name="address" rows="3" required placeholder="Enter full address"><?php echo htmlspecialchars($old_data['address'] ?? ''); ?></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Save Donor
                            </button>
                            <a href="donor_list.php" class="btn btn-outline-secondary">
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