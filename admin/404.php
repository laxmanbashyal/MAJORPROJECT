<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - Page Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #D32F2F 0%, #B71C1C 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .error-card {
            background: white;
            border-radius: 24px;
            padding: 60px 40px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            box-shadow: 0 30px 80px rgba(0,0,0,0.3);
            animation: slideUp 0.6s ease-out;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .error-icon {
            font-size: 80px;
            color: var(--primary-red);
            margin-bottom: 20px;
        }
        .error-card h1 {
            font-size: 72px;
            font-weight: 700;
            color: var(--primary-dark);
            margin: 0;
        }
        .error-card h2 {
            color: #2c3e50;
            margin-bottom: 15px;
        }
        .error-card p {
            color: #7f8c8d;
            margin-bottom: 30px;
        }
        .btn-go-home {
            background: linear-gradient(135deg, #D32F2F, #B71C1C);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-go-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(211, 47, 47, 0.4);
            color: white;
        }
    </style>
</head>
<body>
    <div class="error-card">
        <div class="error-icon">
            <i class="fas fa-tint"></i>
        </div>
        <h1>404</h1>
        <h2>Page Not Found</h2>
        <p>Oops! The page you're looking for doesn't exist or has been moved.</p>
        <a href="dashboard.php" class="btn-go-home">
            <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
        </a>
    </div>
</body>
</html>