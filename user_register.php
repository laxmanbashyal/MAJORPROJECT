<?php
session_start();
include 'conn.php';

$error = '';
$success = '';

if (isset($_POST['register'])) {
    // Get form data
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $blood_group = mysqli_real_escape_string($conn, $_POST['blood_group']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    
    // Validation
    if (empty($fullname) || empty($email) || empty($phone) || empty($password) || empty($age) || empty($gender) || empty($blood_group)) {
        $error = "Please fill all required fields!";
    } elseif ($password != $confirm_password) {
        $error = "Passwords do not match!";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address!";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
        $error = "Phone number must be 10 digits!";
    } else {
        // Check if email already exists
        $check_sql = "SELECT user_id FROM users WHERE user_email = '$email'";
        $check_result = mysqli_query($conn, $check_sql);
        if (mysqli_num_rows($check_result) > 0) {
            $error = "Email already registered!";
        } else {
            // Check if phone already exists
            $check_phone = "SELECT user_id FROM users WHERE user_phone = '$phone'";
            $check_phone_result = mysqli_query($conn, $check_phone);
            if (mysqli_num_rows($check_phone_result) > 0) {
                $error = "Phone number already registered!";
            } else {
                // Insert user with unverified status
                $sql = "INSERT INTO users (user_name, user_email, user_phone, user_password, user_age, user_gender, blood_group, user_address, user_city, user_state, user_pincode, verification_status, registered_date) 
                        VALUES ('$fullname', '$email', '$phone', '$password', '$age', '$gender', '$blood_group', '$address', '$city', '$state', '$pincode', 'pending', NOW())";
                
                if (mysqli_query($conn, $sql)) {
                    $user_id = mysqli_insert_id($conn);
                    
                    // Send notification to admin
                    $notify_sql = "INSERT INTO admin_notifications (notification_title, notification_message, notification_type, user_id, created_at) 
                                   VALUES ('New User Registration', 'New user $fullname has registered and needs verification.', 'pending_verification', '$user_id', NOW())";
                    mysqli_query($conn, $notify_sql);
                    
                    $success = "Registration successful! Your account is pending admin verification. You will receive an email once verified.";
                    
                    // Clear form data
                    $_POST = array();
                } else {
                    $error = "Registration failed! Please try again.";
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Blood Bank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #D32F2F 0%, #B71C1C 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .register-card {
            background: white;
            border-radius: 24px;
            padding: 40px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.35);
            animation: slideUp 0.6s ease-out;
            max-height: 90vh;
            overflow-y: auto;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .register-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, #D32F2F, #B71C1C);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin: 0 auto 15px;
            box-shadow: 0 8px 25px rgba(211, 47, 47, 0.3);
        }
        .register-card h2 {
            color: #B71C1C;
            font-weight: 700;
            text-align: center;
            font-size: 24px;
        }
        .register-card p {
            text-align: center;
            color: #7f8c8d;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 10px 14px;
            transition: all 0.3s;
            font-size: 14px;
        }
        .form-control:focus, .form-select:focus {
            border-color: #D32F2F;
            box-shadow: 0 0 0 0.2rem rgba(211, 47, 47, 0.15);
        }
        .form-label {
            font-weight: 600;
            font-size: 13px;
            color: #2c3e50;
        }
        .btn-register {
            background: linear-gradient(135deg, #D32F2F, #B71C1C);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px;
            width: 100%;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(211, 47, 47, 0.4);
            color: white;
        }
        .back-login {
            text-align: center;
            margin-top: 15px;
        }
        .back-login a {
            color: #7f8c8d;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s;
        }
        .back-login a:hover { color: #D32F2F; }
        .alert {
            border-radius: 12px;
            border: none;
            font-size: 14px;
        }
        .required { color: #D32F2F; }
        .form-text {
            font-size: 12px;
            color: #7f8c8d;
        }
        .register-card::-webkit-scrollbar {
            width: 5px;
        }
        .register-card::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .register-card::-webkit-scrollbar-thumb {
            background: #D32F2F;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="register-card">
        <div class="register-icon">
            <i class="fas fa-user-plus"></i>
        </div>
        <h2>Create Account</h2>
        <p>Register as a blood donor and save lives</p>
        
        <?php if($error): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle me-2"></i><?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <?php if($success): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i><?php echo $success; ?>
            </div>
        <?php endif; ?>
        
        <form method="post" action="user_register.php">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Full Name <span class="required">*</span></label>
                    <input type="text" name="fullname" class="form-control" placeholder="Enter full name" required value="<?php echo $_POST['fullname'] ?? ''; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email Address <span class="required">*</span></label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required value="<?php echo $_POST['email'] ?? ''; ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone Number <span class="required">*</span></label>
                    <input type="text" name="phone" class="form-control" placeholder="10-digit phone" required value="<?php echo $_POST['phone'] ?? ''; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Age <span class="required">*</span></label>
                    <input type="number" name="age" class="form-control" placeholder="18-65" required value="<?php echo $_POST['age'] ?? ''; ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gender <span class="required">*</span></label>
                    <select name="gender" class="form-select" required>
                        <option value="">Select Gender</option>
                        <option value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                        <option value="Other" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Blood Group <span class="required">*</span></label>
                    <select name="blood_group" class="form-select" required>
                        <option value="">Select Blood Group</option>
                        <?php
                        $blood_sql = "SELECT * FROM blood ORDER BY blood_group";
                        $blood_result = mysqli_query($conn, $blood_sql);
                        while($blood = mysqli_fetch_assoc($blood_result)) {
                            $selected = (isset($_POST['blood_group']) && $_POST['blood_group'] == $blood['blood_group']) ? 'selected' : '';
                            echo "<option value='{$blood['blood_group']}' $selected>{$blood['blood_group']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password <span class="required">*</span></label>
                    <input type="password" name="password" class="form-control" placeholder="Min 6 characters" required>
                    <div class="form-text">Password must be at least 6 characters</div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Confirm Password <span class="required">*</span></label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password" required>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Address <span class="required">*</span></label>
                <textarea name="address" class="form-control" rows="2" placeholder="Enter full address" required><?php echo $_POST['address'] ?? ''; ?></textarea>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">City <span class="required">*</span></label>
                    <input type="text" name="city" class="form-control" placeholder="City" required value="<?php echo $_POST['city'] ?? ''; ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">State <span class="required">*</span></label>
                    <input type="text" name="state" class="form-control" placeholder="State" required value="<?php echo $_POST['state'] ?? ''; ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Pincode</label>
                    <input type="text" name="pincode" class="form-control" placeholder="Pincode" value="<?php echo $_POST['pincode'] ?? ''; ?>">
                </div>
            </div>
            
            <button type="submit" name="register" class="btn-register">
                <i class="fas fa-user-plus me-2"></i>Register
            </button>
        </form>
        
        <div class="back-login">
            <a href="user_login.php"><i class="fas fa-sign-in-alt me-2"></i>Already have an account? Login</a>
        </div>
        <div class="back-login mt-2">
            <a href="home.php"><i class="fas fa-home me-2"></i>Back to Home</a>
        </div>
    </div>
</body>
</html>