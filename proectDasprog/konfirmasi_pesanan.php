<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['Username'])) {
    header("Location: ../login.php");
    exit;
}

// Include file koneksi untuk menghubungkan ke database
include '../koneksi.php'; // Pastikan file koneksi.php memiliki koneksi ke database

// Dapatkan data dari form sebelumnya
$ID = $_POST['ID'];
$id_diving = $_POST['id_diving'];
$total_pesanan = $_POST['total_pesanan'];
$tanggal_booking = $_POST['tanggal_booking'];
$metode_pembayaran = $_POST['metode_pembayaran'];
$total_harga = $_POST['total_harga'];

// Inisialisasi variabel diving_data
$diving_data = array();

// Query untuk mendapatkan data diving berdasarkan id_diving
$query_diving = "SELECT * FROM diving WHERE id_diving='$id_diving'";
$result_diving = mysqli_query($mysql, $query_diving); // Gunakan variabel $mysql untuk koneksi

// Periksa apakah data diving ditemukan
if (mysqli_num_rows($result_diving) > 0) {
    $diving_data = mysqli_fetch_assoc($result_diving);
} else {
    $error_message = "Data diving tidak ditemukan.";
}

if (isset($_POST['confirm']) && empty($error_message)) {
    $query_insert = "INSERT INTO transaksi (ID, id_diving, total_pesanan, tanggal_booking, metode_pembayaran, total_harga) VALUES ('$ID', '$id_diving', '$total_pesanan', '$tanggal_booking', '$metode_pembayaran', '$total_harga')";
    if (mysqli_query($mysql, $query_insert)) { // Gunakan variabel $mysql untuk koneksi
        header("Location: riwayat.php");
        exit;
    } else {
        $error_message = "Error: " . mysqli_error($mysql); // Gunakan variabel $mysql untuk koneksi
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan</title>
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

        .order-details {
            text-align: center;
            margin-bottom: 20px;
        }

        .order-details h3 {
            margin-bottom: 10px;
        }

        .order-details p {
            margin-bottom: 5px;
        }

        .confirmation-form {
            text-align: center;
        }

        button, .cancel-button {
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 45%; /* Memberikan lebar yang sama untuk keduanya */
            display: inline-block;
            text-decoration: none; /* Menghapus garis bawah default pada tautan */
            text-align: center;
        }

        button {
            background-color: #007BFF; /* Warna biru untuk tombol Ok */
            color: white;
        }

        button:hover {
            background-color: #0056b3; /* Warna biru gelap saat di-hover */
        }

        .cancel-button {
            background-color: #ccc; /* Warna abu-abu untuk tombol Cancel */
            color: #444; /* Warna teks tombol Cancel */
        }

        .cancel-button:hover {
            background-color: #bbb; /* Warna abu-abu gelap saat di-hover */
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Konfirmasi Pesanan</h2>
    <?php if (isset($error_message)): ?>
        <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
    <?php else: ?>
        <div class="order-details">
            <h3><?php echo htmlspecialchars($diving_data['nama']); ?></h3>
            <p>Total Harga: Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></p>
            <p>Tanggal Booking: <?php echo htmlspecialchars($tanggal_booking); ?></p>
            <p>Metode Pembayaran: <?php echo htmlspecialchars($metode_pembayaran); ?></p>
        </div>
        <div class="confirmation-form">
            <form method="post" action="">
                <input type="hidden" name="ID" value="<?php echo htmlspecialchars($ID); ?>">
                <input type="hidden" name="id_diving" value="<?php echo htmlspecialchars($id_diving); ?>">
                <input type="hidden" name="total_pesanan" value="<?php echo htmlspecialchars($total_pesanan); ?>">
                <input type="hidden" name="tanggal_booking" value="<?php echo htmlspecialchars($tanggal_booking); ?>">
                <input type="hidden" name="metode_pembayaran" value="<?php echo htmlspecialchars($metode_pembayaran); ?>">
                <input type="hidden" name="total_harga" value="<?php echo htmlspecialchars($total_harga); ?>">
                <button type="submit" name="confirm">Ok</button>
                <a href="transaksi.php?ID=<?php echo htmlspecialchars($ID); ?>&id_diving=<?php echo htmlspecialchars($id_diving); ?>&total_pesanan=<?php echo htmlspecialchars($total_pesanan); ?>&tanggal_booking=<?php echo htmlspecialchars($tanggal_booking); ?>&metode_pembayaran=<?php echo htmlspecialchars($metode_pembayaran); ?>&total_harga=<?php echo htmlspecialchars($total_harga); ?>" class="cancel-button">Cancel</a> <!-- Tombol Cancel -->
            </form>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
