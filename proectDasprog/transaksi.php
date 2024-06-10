<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['Username'])) {
    header("Location: ../login.php");
    exit;
}

// Include file koneksi untuk menghubungkan ke database
include '../koneksi.php'; // Pastikan file koneksi.php memiliki koneksi ke database

// Dapatkan Username dari session
$Username = $_SESSION['Username'];

// Query untuk mendapatkan data user berdasarkan Username
$query = "SELECT * FROM user WHERE Username='$Username'";
$result = mysqli_query($mysql, $query); // Gunakan variabel $mysql untuk koneksi

// Periksa apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    // Ambil data dari hasil query
    $user_data = mysqli_fetch_assoc($result);
    $ID = $user_data['ID'];
} else {
    // Tampilkan pesan jika data tidak ditemukan
    echo "Data user tidak ditemukan.";
    exit;
}

// Periksa apakah id_diving sudah diset di URL
if(isset($_GET['id_diving'])) {
    $id_diving = $_GET['id_diving'];
    $query_diving = "SELECT * FROM diving WHERE id_diving='$id_diving'";
    $result_diving = mysqli_query($mysql, $query_diving); // Gunakan variabel $mysql untuk koneksi

    // Periksa apakah data diving ditemukan
    if(mysqli_num_rows($result_diving) > 0) {
        $diving_data = mysqli_fetch_assoc($result_diving);
    } else {
        echo "Data diving tidak ditemukan.";
        exit;
    }
} else {
    echo "ID Diving tidak tersedia.";
    exit;
}

// Inisialisasi total_pesanan dan total harga
$total_pesanan = isset($_GET['total_pesanan']) ? (int)$_GET['total_pesanan'] : 1; // Default total_pesanan adalah 1
$total_harga = $diving_data['harga'] * $total_pesanan;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Diving</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .product-details {
            text-align: center;
        }

        .product-details img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 15px; /* Border radius untuk gambar */
        }

        .purchase-form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="number"],
        input[type="date"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #007BFF; /* Warna biru untuk tombol */
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3; /* Warna biru gelap saat di-hover */
        }

        .input-field {
            background-color: #f0f0f0;
            cursor: not-allowed;
        }

        .input-field:read-only {
            background-color: #f0f0f0;
            cursor: not-allowed;
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
    </style>
</header>
<br><br>
<div class="container">
    <h2>Transaksi Diving</h2>
    <div class="product-details">
        <h3><?php echo htmlspecialchars($diving_data['nama']); ?></h3>
        <img src="../admin/datapantai/uploaded_img/<?php echo htmlspecialchars($diving_data['gambar']); ?>" alt="<?php echo htmlspecialchars($diving_data['nama']); ?>">
        <p>Harga per unit: Rp <?php echo number_format($diving_data['harga'], 0, ',', '.'); ?></p>
    </div>
    <div class="purchase-form">
        <form method="get">
            <input type="hidden" name="id_diving" value="<?php echo htmlspecialchars($id_diving); ?>">
            <label for="total_pesanan">Jumlah:</label>
            <input type="number" name="total_pesanan" id="total_pesanan" value="<?php echo $total_pesanan; ?>" required onchange="this.form.submit()">
        </form>
        <form method="post" action="konfirmasi_pesanan.php">
            <input type="hidden" name="ID" value="<?php echo htmlspecialchars($ID); ?>">
            <input type="hidden" name="id_diving" value="<?php echo htmlspecialchars($id_diving); ?>">
            <input type="hidden" name="total_pesanan" value="<?php echo $total_pesanan; ?>">
            <input type="hidden" name="total_harga" value="<?php echo $total_harga; ?>">
            <label for="Username">Username:</label>
            <input type="text" id="Username" name="Username" value="<?php echo htmlspecialchars($Username); ?>" class="input-field" readonly required>
            
            <label for="tanggal_booking">Tanggal Booking:</label>
            <input type="date" name="tanggal_booking" id="tanggal_booking" required>
            
            <label for="metode_pembayaran">Metode Pembayaran:</label>
            <select name="metode_pembayaran" id="metode_pembayaran" required>
                <option value="transfer_bank">Transfer Bank</option>
                <option value="tunai">Tunai</option>
                <option value="e_wallet">E-Wallet</option>
            </select>
            
            <label for="total">Total Harga (Rp):</label>
            <input type="text" name="total" id="total" value="<?php echo number_format($total_harga, 0, ',', '.'); ?>" readonly required>
            
            <button type="submit" name="submit" class="button">Konfirmasi Pembelian</button>
        </form>
    </div>
</div>

</body>
</html>
