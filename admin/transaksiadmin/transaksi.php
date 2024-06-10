<?php
session_start();

// Cek apakah pengguna sudah login dan levelnya adalah USER
if (!isset($_SESSION['Username']) || $_SESSION['Level'] != 'USER') {
    header("Location: ../login.php");
    exit();
}

include '../../koneksi.php';

// Query untuk mengambil semua data pesanan
$query_mysql = mysqli_query($mysql, "
    SELECT transaksi.id_transaksi, user.Gmail, user.Telepon, user.Username, transaksi.tanggal_booking, transaksi.metode_pembayaran, transaksi.total_harga, transaksi.total_pesanan, diving.nama, diving.gambar
    FROM transaksi
    JOIN user ON transaksi.ID = user.ID
    JOIN diving ON transaksi.id_diving = diving.id_diving
") or die(mysqli_error($mysql));
?>
<!DOCTYPE html>
<html lang="ID">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan Seluruh Pengguna</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Utility classes */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
            background-color: transparent;
        }

        .table th, .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-primary {
            background-color: #cfe2ff;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            text-decoration: none;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-warning {
            color: #212529;
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            color: #212529;
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            color: #fff;
            background-color: #c82333;
            border-color: #bd2130;
        }

        .alert {
            position: relative;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: rgb(5, 116, 176);
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

        /* Column widths */
        .no-col {
            width: 46px;
        }

        .username-col {
            width: 105px;
        }

        .gmail-col {
            width: 130px;
        }

        .telepon-col{
            width: 135px;
        }

        .tanggal-col{
            width: 110px;
        }

        .pesanan-col{
            width: 75px;
        }

        .diving-col{
            width: 95px;
        }

        .metode-col{
            width: 105px;
        }

        .image-col img {
            max-width: 100px;
            height: auto;
        }

        .options a {
            text-decoration: none;
            color: white;
            margin-left: auto;
        }

        .content1 a, .content2 a, .content3 a, .content4 a, .content5 a {
            display: grid;
            height: 40px;
            width: 150px;
            background: linear-gradient(#3a64f0, #4ce2ef);
            position: relative;
            margin: auto;
            place-items: center;
            font-family: "Poppins", sans-serif;
            color: #ffffff;
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;
            letter-spacing: 3px;
            border-radius: 5px;
        }

        .content1 a { left: -200px; top: 20px; }
        .content2 a { top: -20px; }
        .content3 a { left: 200px; top: -60px; }
        .content4 a { left: 400px; top: -100px; }
        .content5 a { left: -400px; top: -140px; }

        .container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            table-layout: fixed;
        }

        th, td {
            word-wrap: break-word;
        }
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
    </style>
</head>
<body>
<header class="admin-header">
    <div class="logo">
        <a href="../homeadmin/homeadmin.php">Hello Admin</a>
    </div>
    <nav class="nav-links">
        <a href="../datauser.php">User</a>
        <a href="../dataikan/dataikan.php">Konten</a>
        <a href="../datakarang/datakarang.php">Kategori</a>
        <a href="../datapantai/datapantai.php">Diving</a>
        <a href="../transaksiadmin/transaksi.php">Transaksi</a>
        <a href="../saran1/admin_page.php">Saran</a>
    </nav>
    <div class="auth-links">
        <a href="../../login.php">Logout</a>
    </div>
</header>
<br>

<div class="container">
    <h2><center>Riwayat Pesanan Seluruh Pengguna</center></h2>
    <br>
    <?php
    if (isset($_GET['id_transaksi'])) {
        $id_transaksi = htmlspecialchars($_GET["id_transaksi"]);

        $sql = "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'";
        $hasil = mysqli_query($mysql, $sql);

        if ($hasil) {
            echo "<div class='alert alert-success'>Data berhasil dihapus.</div>";
        } else {
            echo "<div class='alert alert-danger'>Data gagal dihapus.</div>";
        }
    }
    ?>
    <a href="user_form.php" class="btn btn-primary" role="button">Tambah Data</a><br><br>
    <table class="my-3 table table-bordered">
        <thead>
        <tr class="table-primary">
            <th class="no-col">No</th>
            <th class="username-col">Username</th>
            <th class="gmail-col">Gmail</th>
            <th class="telepon-col">Telepon</th>
            <th class="tanggal-col">Tanggal Booking</th>
            <th class="metode-col">Metode Pembayaran</th>
            <th class="pesanan-col">Total Pesanan</th>
            <th>Total Harga</th>
            <th class="diving-col">Nama Diving</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        if (mysqli_num_rows($query_mysql) > 0) {
            while ($data = mysqli_fetch_array($query_mysql)) {
                echo "<tr>
                    <td class='no-col'>{$no}</td>
                    <td class='username-col'>{$data['Username']}</td>
                    <td class='gmail-col'>{$data['Gmail']}</td>
                    <td class='telepon-col'>{$data['Telepon']}</td>
                    <td class='tanggal-col'>{$data['tanggal_booking']}</td>
                    <td>{$data['metode_pembayaran']}</td>
                    <td>{$data['total_pesanan']}</td>
                    <td>Rp " . number_format($data['total_harga'], 0, ',', '.') . "</td>
                    <td>{$data['nama']}</td>
                    <td class='image-col'><img src='../datapantai/uploaded_img/{$data['gambar']}' alt='{$data['nama']}'></td>
                    <td>
                        <div class='action-buttons'>
                            <a href='admin_update.php?id_transaksi={$data['id_transaksi']}' class='btn btn-warning' role='button'>Update</a>
                            <a href='{$_SERVER["PHP_SELF"]}?id_transaksi={$data['id_transaksi']}' class='btn btn-danger' role='button'>Delete</a>
                        </div>
                    </td>
                </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='11' class='no-data'>Tidak ada riwayat pesanan.</td></tr>";
        }
        ?>
        </tbody>
    </table>
    <br>
</div>
<footer>
    <p>&copy; 2024 Allfadhil_. All rights reserved.</p>
    <p>
        <a href="../../proectDasprog/Project.php">Home</a> | 
        <a href="https://sites.google.com/view/allfadhil/beranda">About Me</a> | 
        <a href="../../proectDasprog/ProjectProfil.php">Profil</a>
    </p>
</footer>
</body>
</html>
