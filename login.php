<?php
require_once 'config.php';
require_once 'auth.php';

if (isLoggedIn()) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitizeInput($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT user_id, username, password, email_verified FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        if ($user['email_verified'] == 1) {
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
			$_SESSION['username'] = $user['username'];
            header("Location: /");
            exit();
        } else {
            $error = "Please verify your email address before logging in.";
        }
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - matSFX</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="32x32" href="https://matsfx.com/app-images/matsfx-logo.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="upload-form">
            <h2>Login</h2>

            <?php if (isset($error)): ?>
                <div class="alert error"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="btn">Login</button>
            </form>
  
            <p>Don't have an account? <a href="register">Sign up</a></p>
			<p>Forgot Password? <a href="resetpassword">Reset Password</a></p>
		
        </div>
    </div>
</body>
</html>