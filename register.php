<?php
ob_start(); // Mulai buffering output

if (isset($_POST['Submit'])) {
    $gmails = $_POST['Gmail'];
    $telepons = $_POST['Telepon'];
    $usernames = $_POST['Username'];
    $passwords = $_POST['Password'];
    $levels = $_POST['Level'];

    // Sertakan file koneksi database
    include_once("koneksi.php");

    // Masukkan data pengguna ke dalam tabel
    $result = mysqli_query($mysql, "INSERT INTO user(Gmail, Telepon, Username, Password, Level) VALUES ('$gmails', '$telepons', '$usernames', '$passwords', '$levels')");

    // Alihkan ke halaman login setelah berhasil menambahkan data
    header("Location: login.php");
    exit(); // Pastikan untuk keluar setelah mengirim header
}

ob_end_flush(); // Selesaikan buffering dan kirim output
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
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

        .glass-containerr {
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

        .login-box label {
            align-self: flex-start;
            color: #fff;
            font-weight: bold;
            width: 100%;
        }

        .login-box input[type="text"],
        .login-box input[type="password"],
        .login-box select {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            width: 100%;
            box-sizing: border-box;
        }

        .login-box input[type="text"]::placeholder,
        .login-box input[type="password"]::placeholder,
        .login-box select::placeholder {
            color: #fff;
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
    <div class="glass-containerr">
        <div class="login-box">
            <h2>Registrasi</h2>
            <form action="register.php" method="post">
                <div>
                    <label for="Gmail">Gmail :</label>
                    <input type="text" id="Gmail" name="Gmail" required placeholder="Gmail">
                </div>
                <div>
                    <label for="Telepon">No Telepon :</label>
                    <input type="text" id="Telepon" name="Telepon" required placeholder="No Telepon">
                </div>
                <div>
                    <label for="Username">Username :</label>
                    <input type="text" id="Username" name="Username" required placeholder="Username">
                </div>
                <div>
                    <label for="Password">Password :</label>
                    <input type="password" id="Password" name="Password" required placeholder="Password">
                </div>
                <div>
                    <label for="Level">Level :</label>
                    <select name="Level" id="Level" required>
                        <option disabled selected>Pilih</option>
                        <option value="USER">User</option>
                    </select>
                </div>
                <div class="options">
                    <a href="forgot_password.php">Lupa Password?</a> |
                    <label>
                        <input type="checkbox" id="Remember" name="remember">
                        Ingat saya
                    </label>
                </div>
                <button name="Submit">Registrasi</button>
                <p>Sudah memiliki akun? <a href="login.php" id="login">Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>
