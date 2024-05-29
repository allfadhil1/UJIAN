<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesona Terumbu Karang</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
    <link rel="stylesheet" type="text/css" href="2023.css">
    <style>
        .card-image img {
            max-width: 100%; /* Maksimum lebar gambar adalah lebar kotak */
            max-height: 100%; /* Maksimum tinggi gambar adalah tinggi kotak */
            width: auto; /* Lebar gambar otomatis disesuaikan */
            height: auto; /* Tinggi gambar otomatis disesuaikan */
            display: block; /* Agar gambar tetap dalam kotak */
            margin: 0 auto; /* Posisi gambar di tengah kotak */
            border-top-left-radius: 10px; /* Radius sudut kiri atas */
            border-top-right-radius: 10px; /* Radius sudut kanan atas */
            object-fit: cover; /* Gambar akan di-stretch untuk mengisi kotak */
            height: 100%; /* Tinggi gambar mengisi kotak sepenuhnya */
            width: 100%; /* Lebar gambar mengisi kotak sepenuhnya */
        }

        h1 {
            font-family: 'Monserrat', cursive;
            font-size: 3em;
            color: #0056b3;
            text-shadow: 2px 2px #d1e0ff;
        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border: 0px solid #000; /* Menebalkan garis hitam pada box */
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 6px 10px rgba(0, 0, 0); /* Menambahkan box shadow */
            margin: 20px;
            padding: 20px;
            height: 100%;
            transition: background-color 0.3s, color 0.3s; /* Menambahkan transisi untuk perubahan warna */
            background-color: rgb(255, 255, 255);
            width: 300px;
            height: 650px;
    margin: 30px;
    box-shadow: 0 0 10px rgb(0, 0, 0);
    border-radius: 15px;

        }

        .card h2 {
            margin-top: 0px;
            font-size: 1.3em;
            color: #333;
            transition: color 0.3s; /* Menambahkan transisi untuk perubahan warna */
            font-family: 'Monserrat', cursive;
        }

        .card p {
            flex-grow: 1;
            margin-top: 0px;
            color: #666;
            transition: color 0.3s; /* Menambahkan transisi untuk perubahan warna */
            font-family: 'Monserrat', cursive;
        }

        .card a {
            display: block;
            margin-top: 10px;
            text-align: center;
            background-color: #0056b3;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .card:hover {
            background-color: #333; /* Mengubah background menjadi abu-abu gelap saat pointer menyentuh kartu */
            color: white; /* Mengubah warna font menjadi putih */
        }

        .card:hover h2,
        .card:hover p {
            color: white; /* Mengubah warna font menjadi putih saat pointer menyentuh kartu */
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
    </style>
</head>
<body>
<header class="admin-header">
        <div class="logo">
            <a href="project.php">Hello User</a>
        </div>
        <nav class="nav-links">
            <a href="project.php">Home</a>
            <a href="ProjectProfil.php">Profil</a>
            <a href="user_form.php">Saran</a>
           
        </nav>
        <div class="auth-links">
            <a href="../login.php">Login</a>
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



        </style>
    </header>
<br><br><br><br>
<h1><center>DAFTAR TERUMBU KARANG</center></h1><br>
<section class="container">
    <?php
    include '../koneksi.php';
    $query_mysql = mysqli_query($mysql, "SELECT * FROM karang") or die(mysqli_error($mysql));
    while($data = mysqli_fetch_array($query_mysql)) {
    ?>
    <div class="card">
        <div class="card-image">
            <img src="../admin/datakarang/uploaded_img/<?php echo $data['gambar']; ?>" alt="<?php echo $data['nama_karang']; ?>">
        </div>
        <h2><?php echo $data['nama_karang']; ?></h2>
        <p><?php echo $data['deskripsi']; ?></p>
        <a href="<?php echo $data['website']; ?>">Read More</a>
    </div>
    <?php } ?>
</section>
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
