<?php

$host="localhost";
$user="root";
$password="";
$db="dasprog";

$conn = new mysqli('localhost', 'root', '', 'dasprog');

if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}
?>
