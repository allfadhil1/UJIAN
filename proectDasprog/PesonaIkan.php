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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesona Ikan</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
    <link rel="stylesheet" type="text/css" href="2023.css">
    <style>
        .card-image img {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            display: block;
            margin: 0 auto;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            object-fit: cover;
            height: 100%;
            width: 100%;
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
            border: 0px solid #000;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 6px 10px rgba(0, 0, 0);
            margin: 20px;
            padding: 20px;
            height: 100%;
            transition: background-color 0.3s, color 0.3s;
            background-color: rgb(255, 255, 255);
            width: 300px;
            height: 640px;
            margin: 30px;
            box-shadow: 0 0 10px rgb(0, 0, 0);
            border-radius: 15px;
        }

        .card h2 {
            margin-top: 0px;
            font-size: 1.3em;
            color: #333;
            transition: color 0.3s;
            font-family: 'Monserrat', cursive;
        }

        .card p {
            flex-grow: 1;
            margin-top: 0px;
            color: #666;
            transition: color 0.3s;
            font-family: 'Monserrat', cursive;
        }

        .card a {
            font-family: 'Monserrat', cursive;
            display: block;
            margin-top: 10px;
            text-align: center;
            background-color: #0574b0;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .card:hover {
            background-color: #333;
            color: white;
        }

        .card:hover h2,
        .card:hover p {
            color: white;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .search-form {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-form input[type="text"] {
            width: 300px;
            padding: 10px;
            font-size: 16px;
        }

        .search-form button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #0574b0;
            color: white;
            border: none;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #045a8d;
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
<h1><center>DAFTAR IKAN</center></h1><br>

<div class="search-form">
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Cari Ikan...">
        <button type="submit">Cari</button>
    </form>
</div>

<section class="container">
    <?php
    include '../koneksi.php';

    // Check if search query is provided
    $search_query = "";
    if (isset($_GET['search'])) {
        $search_query = mysqli_real_escape_string($mysql, $_GET['search']);
    }

    // Modify the query to search based on the search query
    if ($search_query != "") {
        $query_mysql = mysqli_query($mysql, "SELECT * FROM konten WHERE id_kategori = 1 AND (nama LIKE '%$search_query%' OR deskripsi LIKE '%$search_query%')") or die(mysqli_error($mysql));
    } else {
        $query_mysql = mysqli_query($mysql, "SELECT * FROM konten WHERE id_kategori = 1") or die(mysqli_error($mysql));
    }

    // Check if there are results
    if (mysqli_num_rows($query_mysql) == 0) {
        echo "<p style='text-align: center; font-size: 1.2em; color: #666; font-family: \"Monserrat\", cursive;'> " . htmlspecialchars($search_query) . " Not Found<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p>";
    } else {
        while ($data = mysqli_fetch_array($query_mysql)) {
    ?>
    <div class="card">
        <div class="card-image">
            <img src="../admin/dataikan/uploaded_img/<?php echo $data['gambar']; ?>" alt="<?php echo $data['nama']; ?>">
        </div>
        <h2><?php echo $data['nama']; ?></h2>
        <p><?php echo $data['deskripsi']; ?></p>
        <a href="<?php echo $data['website']; ?>">Read More</a>
    </div>
    <?php 
        }
    }
    ?>
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
