<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

.admin-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #343a40;
    color: #ffffff;
}

.logo a {
    text-decoration: none;
    color: #ffffff;
    font-size: 24px;
    font-weight: bold;
}

.nav-links {
    display: flex;
}

.nav-links a {
    text-decoration: none;
    color: #ffffff;
    margin: 0 15px;
    font-size: 16px;
}

.nav-links a:hover {
    text-decoration: underline;
}

.auth-links {
    display: flex;
}

.auth-links a {
    text-decoration: none;
    color: #ffffff;
    margin-left: 15px;
    font-size: 16px;
}

.auth-links a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <header class="admin-header">
        <div class="logo">
            <a href="#">AdminPanel</a>
        </div>
        <nav class="nav-links">
            <a href="#">Dashboard</a>
            <a href="#">Users</a>
            <a href="#">Settings</a>
            <a href="#">Reports</a>
            <a href="#">Reports</a>
        </nav>
        <div class="auth-links">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </header>

    <script src="scripts.js"></script>
</body>
</html>
