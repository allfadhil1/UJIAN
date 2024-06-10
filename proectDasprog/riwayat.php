<?php
session_start();

// Cek apakah pengguna sudah login dan levelnya adalah USER
if (!isset($_SESSION['Username']) || $_SESSION['Level'] != 'USER') {
    header("Location: ../login.php");
    exit();
}

include '../koneksi.php';

// Ambil Username dari sesi
$Username = $_SESSION['Username'];

// Query untuk mengambil data pesanan berdasarkan Username
$query_mysql = mysqli_query($mysql, "
    SELECT user.Gmail, user.Telepon, user.Username, transaksi.tanggal_booking, transaksi.metode_pembayaran, transaksi.total_harga, transaksi.total_pesanan, diving.nama, diving.gambar, diving.harga
    FROM transaksi
    JOIN user ON transaksi.ID = user.ID
    JOIN diving ON transaksi.id_diving = diving.id_diving
    WHERE user.Username = '$Username'
") or die(mysqli_error($mysql));

// Ambil nama user dari sesi
$user_data = mysqli_fetch_assoc(mysqli_query($mysql, "SELECT Username FROM user WHERE Username = '$Username'"));
$Username = $user_data['Username'];
?>
<!DOCTYPE html>
<html lang="ID">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    <link rel="stylesheet" type="text/css" href="2023.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #0574B0;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin: 0;
            font-size: 2.5em;
            font-weight: 700;
        }

        h2 {
            font-size: 1.5em;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            font-weight: 500;
        }

        th.gmail, td.gmail {
            width: 20%;
        }

        th.harga, td.harga {
            width: 20%;
        }

        th.telepon, td.telepon {
            width: 15%;
        }

        th.tanggal, td.tanggal {
            width: 20%;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .no-data {
            text-align: center;
            color: #666;
            font-size: 1.2em;
        }

        .image {
            max-width: 100px;
            max-height: 100px;
            border-radius: 5px;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #0574B0;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .footer p {
            margin: 0;
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
        <a href="ProjectProfil.php">Profil</a>
        <a href="riwayat.php">Riwayat</a>
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

        .button-container {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}
  
        
        
        
        


    </style>
</header>
<br><br><br>
<div class="container">
    <h2>Riwayat Pesanan <?php echo $Username; ?></h2>
    <table>
        <thead>
            <tr>
                <th class="gmail">Gmail</th>
                <th class="telepon">Telepon</th>
                <th>Username</th>
                <th class="tanggal">Tanggal Booking</th>
                <th>Metode Pembayaran</th>
                <th>Total Pesanan</th>
                <th class="harga">Total Harga</th>
                <th>Nama Diving</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($query_mysql) > 0) {
                while ($data = mysqli_fetch_array($query_mysql)) {
                    echo "<tr>
                        <td class='gmail'>{$data['Gmail']}</td>
                        <td class='telepon'>{$data['Telepon']}</td>
                        <td>{$data['Username']}</td>
                        <td class='tanggal'>{$data['tanggal_booking']}</td>
                        <td>{$data['metode_pembayaran']}</td>
                        <td>{$data['total_pesanan']}</td>
                        <td>Rp " . number_format($data['total_harga'], 0, ',', '.') . "</td>
                        <td>{$data['nama']}</td>
                        <td><img src='../admin/datapantai/uploaded_img/{$data['gambar']}' alt='{$data['nama']}' class='image'></td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='9' class='no-data'>Tidak ada riwayat pesanan.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</div>
<br>
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
