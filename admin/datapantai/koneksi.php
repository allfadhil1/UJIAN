<?php

$host="localhost";
$user="root";
$password="";
$db="dasprog";


// Membuat koneksi
$conn = new mysqli($host, $user, $password, $db);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
