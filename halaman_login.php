<?php
session_start(); // Mulai sesi

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // Query untuk cek username dan password
    $login = mysqli_query($mysql, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);

        // Set sesi berdasarkan level pengguna
        $_SESSION['Username'] = $username;
        $_SESSION['UserID'] = $data['id']; // Asumsikan ada kolom 'id' di tabel user
        $_SESSION['Level'] = $data['Level'];

        if ($data['Level'] == "ADMIN") {
            header("Location: admin/homeadmin/homeadmin.php");
        } elseif ($data['Level'] == "USER") {
            header("Location: proectDasprog/Project.php");
        } else {
            header("Location: Project.php");
        }
    } else {
        // Redirect ke halaman login dengan pesan kesalahan
        header("Location: login.php?error=invalid_credentials");
    }
}
?>