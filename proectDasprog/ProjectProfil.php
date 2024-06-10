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
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="2023.css"
    <style>
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
        }
        footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        footer a:hover {
            text-decoration: underline;
        }

        .detel a {
            text-decoration: none;
            display: inline-block;
            color: #fff;
            font-size: 20px;
            border: 2px solid #0574B0;
            background-color: #0574B0;
            padding: 10px 50px; /* Increased padding for larger button */
            border-radius: 50px;
            margin-top: 20px; /* Added margin-top for spacing */
            transition: background-color 0.3s, border-color 0.3s;
        }

        .detel a:hover {
            background-color: #045a8b;
            border-color: #045a8b;
        }

        </style>
    </header>
    <div class="hero">
        <div class="detel">
            <h1>Hi, Im Fadhil<span> Alghifari</span></h1>
            <p>Ini adalah Project Dasar Pemograman Milik Saya
                <br>Dan Ini adalah Website yang sudah saya buat dengan<br> menggunakan PHP, HTML dan CSS. Dan saya <br>membuat wesite ini murni hasil karya tersendiri<br>
                Saya dari kelas X SIJA 2, Berabsen 18
            </p>
          
            
            <a href="https://sites.google.com/view/allfadhil/beranda">Learn More</a>
        </div>
    </div>
    <div class="images">
        <img src="ASSET/shape.png.png" class="shape">
        <img src="ASSET/foto.crop.png" alt="foto">
    </div>

    </header>
  
 </header>
  </body>
   </html>
