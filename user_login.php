<?php
session_start();
include 'conn.php';

$error = '';

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $sql = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_loggedin'] = true;
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['user_name'];
        $_SESSION['user_verified'] = $user['verification_status'];
        header('Location: user_dashboard.php');
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login | Blood Bank</title>
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
        .login-card {
            background: white;
            border-radius: 24px;
            padding: 50px 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.35);
            animation: slideUp 0.6s ease-out;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #D32F2F, #B71C1C);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            margin: 0 auto 20px;
            box-shadow: 0 8px 25px rgba(211, 47, 47, 0.3);
        }
        .login-card h2 {
            color: #B71C1C;
            font-weight: 700;
            text-align: center;
            font-size: 28px;
        }
        .login-card p {
            text-align: center;
            color: #7f8c8d;
            margin-bottom: 30px;
            font-size: 14px;
        }
        .form-control {
            border-radius: 12px;
            border: 2px solid #e9ecef;
            padding: 12px 16px;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #D32F2F;
            box-shadow: 0 0 0 0.2rem rgba(211, 47, 47, 0.15);
        }
        .btn-login {
            background: linear-gradient(135deg, #D32F2F, #B71C1C);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px;
            width: 100%;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(211, 47, 47, 0.4);
            color: white;
        }
        .back-home {
            text-align: center;
            margin-top: 20px;
        }
        .back-home a {
            color: #7f8c8d;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s;
        }
        .back-home a:hover { color: #D32F2F; }
        .alert {
            border-radius: 12px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-icon">
            <i class="fas fa-user"></i>
        </div>
        <h2>User Login</h2>
        <p>Access your donor profile and dashboard</p>
        
        <?php if($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="post" action="user_login.php">
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0"><i class="fas fa-envelope text-danger"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0"><i class="fas fa-lock text-danger"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
            </div>
            <button type="submit" name="login" class="btn-login">
                <i class="fas fa-sign-in-alt me-2"></i>Login
            </button>
        </form>
        
        <div class="back-home">
            <a href="user_register.php"><i class="fas fa-user-plus me-2"></i>Don't have an account? Register</a>
        </div>
        <div class="back-home mt-2">
            <a href="home.php"><i class="fas fa-home me-2"></i>Back to Home</a>
        </div>
    </div>
</body>
</html>