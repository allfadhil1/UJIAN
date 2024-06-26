<?php
@include '../admin/saran1/config.php';

session_start();

// Cek apakah pengguna sudah login dan levelnya adalah USER
if (!isset($_SESSION['Username']) || $_SESSION['Level'] != 'USER') {
    header("Location: ../login.php");
    exit();
}

// Pesan untuk kesalahan atau keberhasilan
$pesan = [];

// Proses form jika tombol Kirim ditekan
if (isset($_POST['add_saran'])) {
    // Ambil nilai yang dikirimkan dari form
    $ID = $_SESSION['UserID'];
    $Deskripsi = mysqli_real_escape_string($conn, $_POST['Deskripsi']);
   
    // Periksa apakah semua input terisi
    if (empty($Deskripsi)) {
        $pesan[] = 'Harap isi semua kolom';
    } else {
        // Jalankan query untuk memasukkan data saran ke dalam tabel
        $insert_query = "INSERT INTO saran (ID, Deskripsi) VALUES ('$ID','$Deskripsi')";
        $insert_result = mysqli_query($conn, $insert_query);

        if ($insert_result) {
            $pesan[] = 'Saran berhasil ditambahkan';
            // Kosongkan nilai input setelah pengiriman sukses
            $_POST['Deskripsi'] = '';
        } else {
            $pesan[] = 'Gagal menambahkan saran';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Saran User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: rgb(5, 116, 176);
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        nav ul li {
            float: left;
        }
        nav ul li a {
            display: block;
            color: rgb(255, 255, 255);
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        nav ul li a:hover {
            background-color: rgb(6, 154, 234);
        }
        nav ul li .dropdown {
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: rgb(193, 8, 8);
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .dropdown-content a:hover {
            background-color: rgb(0, 0, 0);
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .container {
            margin-top: 100px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .input-field {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            width: calc(100% - 20px);
            background-color: #0574b0;
            color: white;
            padding: 10px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #069aea;
        }
        .message {
            display: block;
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .message.success {
            background-color: #4CAF50;
            color: white;
        }
        .message.error {
            background-color: #f44336;
            color: white;
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
<div class="container">
    <h2>Tambah Saran Ikan, Pantai dan Terumbu Karang</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="Username">Username:</label>
            <input type="text" id="Nama" name="ID" value="<?php echo $_SESSION['Username']; ?>" class="input-field" readonly required>
        </div>
        <div class="form-group">
            <label for="Deskripsi">Deskripsi:</label>
            <input type="text" id="Deskripsi" name="Deskripsi" value="<?php echo isset($_POST['Deskripsi']) ? htmlspecialchars($_POST['Deskripsi']) : ''; ?>" class="input-field" placeholder="Masukkan Deskripsi" required>
        </div><br><br>
        <button type="submit" class="btn" name="add_saran">Kirim Saran</button>
    </form>

    <?php
    // Display messages
    foreach ($pesan as $msg) {
        echo '<div class="message ' . (strpos($msg, 'berhasil') !== false ? 'success' : 'error') . '">' . htmlspecialchars($msg) . '</div>';
    }
    ?>
</div>
</body>
</html>
