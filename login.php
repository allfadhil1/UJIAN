<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="glass-container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="halaman_login.php" method="post">
                <input type="text" id="Username" name="Username" required placeholder="Username">
                <input type="password" id="Password" name="Password" required placeholder="Password">
                <div class="options">
                    <input type="checkbox" id="Remember" name="remember">
                    <label for="Remember">Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit">Login</button>
                <p>Don't have an account? <a href="register.php" id="register">Register</a></p>
            </form>
        </div>
    </div>
</body>
</html>