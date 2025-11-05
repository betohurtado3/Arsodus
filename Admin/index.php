<?php
// File: /c:/xampp/htdocs/Arsodus/Admin/index.php
session_start();

// Optional flash message from session.php after a failed login
$flash = '';
if (!empty($_SESSION['login_error'])) {
    $flash = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - Arsodus</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg,#f8f9fa 0%, #e9ecef 100%);
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            border: 0;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        }
        .brand {
            width: 72px;
            height: 72px;
            border-radius: 12px;
            background: linear-gradient(135deg,#0d6efd,#6610f2);
            display:flex;
            align-items:center;
            justify-content:center;
            color: #fff;
            font-weight:700;
            font-size:22px;
            margin: 0 auto 8px;
        }
    </style>
</head>
<body>
    <main class="min-vh-100 d-flex align-items-center justify-content-center">
        <div class="card login-card p-4">
            <div class="card-body">
                <div class="text-center mb-3">
                    <div class="brand">A</div>
                    <h5 class="card-title mb-0">Arsodus Admin</h5>
                    <p class="text-muted small">Sign in to continue</p>
                </div>

                <?php if ($flash): ?>
                    <div class="alert alert-danger alert-sm" role="alert">
                        <?php echo htmlspecialchars($flash, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                <?php endif; ?>

                <form action="session.php" method="post" autocomplete="off" novalidate>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username or Email</label>
                        <input type="text" id="username" name="username" class="form-control" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label d-flex justify-content-between">
                            <span>Password</span>
                            <small><a href="#" class="link-secondary">Forgot?</a></small>
                        </label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember" value="1">
                            <label class="form-check-label small" for="remember">Remember me</label>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>

                <div class="text-center mt-3 small text-muted">
                    &copy; <?php echo date('Y'); ?> Arsodus
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>