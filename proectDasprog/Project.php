<?php
session_start();

// Cek apakah pengguna sudah login dan levelnya adalah USER
if (!isset($_SESSION['Username']) || $_SESSION['Level'] != 'USER') {
    header("Location: ../login.php");
    exit();
}

// Isi halaman user di sini
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesona Lautan</title>
    <link rel="stylesheet" type="text/css" href="">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #0574B0;
            color: #ffffff;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
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
            position: relative;
            transition: color 0.3s;
        }

        .nav-links a::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #ffffff;
            transition: width 0.3s;
            position: absolute;
            bottom: -5px;
            left: 0;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a:hover {
            color: #87ceeb;
        }

        .auth-links {
            display: flex;
        }

        .auth-links a {
            text-decoration: none;
            color: #ffffff;
            margin-left: 15px;
            font-size: 16px;
            position: relative;
            transition: color 0.3s;
        }

        .auth-links a::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #ffffff;
            transition: width 0.3s;
            position: absolute;
            bottom: -5px;
            left: 0;
        }

        .auth-links a:hover::after {
            width: 100%;
        }

        .auth-links a:hover {
            color: #87ceeb;
        }

        footer {
            background-color: #0574B0;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        footer a:hover {
            text-decoration: underline;
        }

       

        .content {
            text-align: center;
            color: #fff;
            z-index: 1;
        }

        .content h1 {
            font-size: 120px;
            font-weight: 600;
            transition: 0.5s;
        }

        .content h1:hover {
            -webkit-text-stroke: 2px #fff;
            color: transparent;
        }

        .content a {
            text-decoration: none;
            display: inline-block;
            color: #fff;
            font-size: 24px;
            border: 2px solid #fff;
            padding: 14px 70px;
            border-radius: 50px;
            margin-top: 4px;
        }

        .back-video {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            object-fit: cover;
            z-index: -1;
        }

        @media (max-aspect-ratio: 16/9) {
            .back-video {
                width: 100%;
                height: 100%;
            }
        }

        @media (min-aspect-ratio: 16/9) {
            .back-video {
                width: 100%;
                height: auto;
            }
        }

        .hero {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    position: relative;
    overflow: hidden;
}

.hero::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100px; /* Ubah tinggi gradient sesuai kebutuhan */
    background: linear-gradient(to bottom, transparent, #000); /* Tambahkan gradient hitam */
    z-index: 1;
}

.content {
    text-align: center;
    color: #fff;
    z-index: 2; /* Naikkan z-index agar konten tetap di atas gradient */
}


    </style>
</head>
<body>
    <header class="admin-header">
        <div class="logo">
            <a href="project.php">Hello <?php echo $_SESSION['Username']; ?></a>
        </div>
        <nav class="nav-links">
            <a href="project.php">Home</a>
            <a href="ProjectProfil.php">About Me</a>
            <a href="riwayat.php">Riwayat</a>
            <a href="user_form.php">Masukkan</a>
        </nav>
        <div class="auth-links">
            <a href="../login.php">Logout</a>
            <a href="../register.php">Register</a>
        </div>
    </header>
    <div class="hero">
        <video autoplay loop muted playsinline class="back-video">
            <source src="ASSET/ikanya.mp4" type="video/mp4">
        </video>
        <div class="content">
            <h1>Pesona Lautan</h1>
            <a href="learnmore.php">Learn More</a>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Allfadhil_. All rights reserved.</p>
        <p>
            <a href="Project.php">Home</a> | 
            <a href="https://sites.google.com/view/allfadhil/beranda">About Me</a> | 
            <a href="ProjectProfil.php">Profil</a>
        </p>
    </footer>
</body>
</html>
