<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="">
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background: url('proectDasprog/ASSET/diving.jpg') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #fff;
}

.glass-container {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    padding: 20px;
    max-width: 400px;
    width: 100%;
}

.login-box {
    text-align: center;
}

.login-box h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #fff;
}

.login-box form {
    display: grid;
    gap: 15px;
}

.login-box input[type="text"],
.login-box input[type="password"] {
    padding: 10px;
    border: none;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
    width: 100%;
    box-sizing: border-box;
}

.login-box input[type="text"]::placeholder,
.login-box input[type="password"]::placeholder {
    color: #fff;
}

.login-box .options {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.login-box .options input {
    margin-right: 5px;
}

.login-box .options label {
    margin: 0;
    color: #fff;
}

.login-box .options a {
    color: #fff;
    text-decoration: none;
    margin-left: auto;
}

.login-box button {
    padding: 10px;
    border: none;
    border-radius: 5px;
    background: #007BFF;
    color: #fff;
    cursor: pointer;
    width: 100%;
}

.login-box button:hover {
    background: #0056b3;
}

.login-box p {
    margin-top: 20px;
}

.login-box p a {
    color: #007BFF;
    text-decoration: none;
    margin-left: auto;
}

.login-box p a:hover {
    text-decoration: underline;
}
    </style>
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